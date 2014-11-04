<?php
/**
*
* Codebox Plus extension for the phpBB Forum Software package
*
* @copyright (c) 2014 o0johntam0o
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace o0johntam0o\codeboxplus\controller;

class main
{
	protected $enable_codebox_plus, $enable_download, $enable_login_required, $enable_prevent_bots, $enable_captcha, $max_attempt;
	protected $helper, $template, $user, $config, $auth, $request, $db, $captcha, $root_path, $php_ext;

	public function __construct(\phpbb\controller\helper $helper, \phpbb\template\template $template, \phpbb\user $user, \phpbb\config\config $config, \phpbb\auth\auth $auth, \phpbb\request\request $request, \phpbb\captcha\factory $captcha, \phpbb\db\driver\driver_interface $db, $root_path, $php_ext)
	{
		$this->helper = $helper;
		$this->template = $template;
		$this->user = $user;
		$this->config = $config;
		$this->auth = $auth;
		$this->request = $request;
		$this->db = $db;
		$this->captcha = $captcha;
		$this->root_path = $root_path;
		$this->php_ext = $php_ext;
		
		$this->user->session_begin();
		$this->auth->acl($this->user->data);
		
		$this->enable_codebox_plus = isset($this->config['codebox_plus_enable']) ? $this->config['codebox_plus_enable'] : 0;
		$this->enable_download = isset($this->config['codebox_plus_download']) ? $this->config['codebox_plus_download'] : 0;
		$this->enable_login_required = isset($this->config['codebox_plus_login_required']) ? $this->config['codebox_plus_login_required'] : 0;
		$this->enable_prevent_bots = isset($this->config['codebox_plus_prevent_bots']) ? $this->config['codebox_plus_prevent_bots'] : 0;
		$this->enable_captcha = isset($this->config['codebox_plus_captcha']) ? $this->config['codebox_plus_captcha'] : 0;
		$this->max_attempt = isset($this->config['codebox_plus_max_attempt']) ? $this->config['codebox_plus_max_attempt'] : 0;
	}

	public function base()
	{
		$this->template->assign_vars(array(
			'CODEBOX_PLUS_AVAILABLE'				=> false,
			));

		return $this->helper->render('codebox_plus.html', $this->user->lang['CODEBOX_PLUS_DOWNLOAD']);
	}
	
	public function downloader($id = 0, $part = 0)
	{
		// If Codebox Plus was disabled
		if (!$this->enable_codebox_plus)
		{
			trigger_error($this->user->lang['CODEBOX_PLUS_ERROR_CODEBOX_PLUS_DISABLED']);
		}
		// If download function was disabled
		if (!$this->enable_download)
		{
			trigger_error($this->user->lang['CODEBOX_PLUS_ERROR_DOWNLOAD_DISABLED']);
		}
		// Prevent bots
		if ($this->enable_prevent_bots && $this->user->data['is_bot'])
		{
			redirect(append_sid("{$this->root_path}index.$this->php_ext"));
		}
		// Check permission
		$sql = 'SELECT forum_id FROM ' . POSTS_TABLE . ' WHERE post_id = ' . $id;
		$result = $this->db->sql_query($sql);
		$row = $this->db->sql_fetchrow($result);
		$this->db->sql_freeresult($result);
		
		if (!$this->auth->acl_get('f_read', $row['forum_id']))
		{
			trigger_error($this->user->lang['CODEBOX_PLUS_ERROR_NO_PERMISSION']);
		}
		// Login to download
		if ($this->enable_login_required && !$this->user->data['is_registered'])
		{
			login_box($this->helper->route('o0johntam0o_codeboxplus_download_controller', array('id' => $id, 'part' => $part)), $this->user->lang['CODEBOX_PLUS_ERROR_LOGIN_REQUIRED']);
		}
		
		// Captcha
		if ($this->enable_captcha)
		{
			$tmp_captcha = $this->captcha->get_instance($this->config['captcha_plugin']);
			$tmp_captcha->init(CONFIRM_LOGIN);
			$ok = false;
			
			if ($this->request->is_set_post('submit'))
			{
				$tmp_captcha->validate();
				if ($tmp_captcha->is_solved())
				{
					$tmp_captcha->reset();
					// Everything is ok, start download
					$this->codebox_output($id, $part);
					$ok = true;
				}
			}
			
			// If the form was not submitted yet or the CAPTCHA was not solved
			if (!$ok)
			{
				// Too many request...
				if ($tmp_captcha->get_attempt_count() >= $this->max_attempt)
				{
					trigger_error($this->user->lang['CODEBOX_PLUS_ERROR_CONFIRM']);
				}
				
				$this->template->assign_vars(array(
					'S_CODE_DOWNLOADER_ACTION'		=> $this->helper->route('o0johntam0o_codeboxplus_download_controller', array('id' => $id, 'part' => $part)),
					'S_CONFIRM_CODE'                => true,
					'CAPTCHA_TEMPLATE'              => $tmp_captcha->get_template(),
				));

				return $this->helper->render('codebox_plus.html', $this->user->lang['CODEBOX_PLUS_DOWNLOAD']);
			}
			else
			{
				garbage_collection();
				exit_handler();
			}
		}
		else
		{
			// Everything is ok, start download
			$this->codebox_output($id, $part);
			garbage_collection();
			exit_handler();
		}
	}
	
	private function codebox_output($id = 0, $part = 0)
	{
		$id = (int) $id;
		$part = (int) $part;
		$code = '';
		$filename = $this->user->lang['CODEBOX_PLUS_DEFAULT_FILENAME'];
		$post_data = array();
		$code_data = array();

		// CHECK REQUEST
		if ($id <= 0 || $part <= 0)
		{
			trigger_error($this->user->lang['CODEBOX_PLUS_ERROR_GENERAL']);
		}

		// PROCESS REQUEST

		$sql = 'SELECT post_text, bbcode_uid FROM ' . POSTS_TABLE . ' WHERE post_id = ' . $id;
		$result = $this->db->sql_query($sql);
		$post_data = $this->db->sql_fetchrow($result);
		$this->db->sql_freeresult($result);

		if ($post_data === false)
		{
			trigger_error($this->user->lang['CODEBOX_PLUS_ERROR_POST_NOT_FOUND']);
		}

		//- Process post data
		// Collect code
		preg_match_all("#\[codebox=[a-z0-9_-]+ file=(.*?):" . $post_data['bbcode_uid'] . "\](.*?)\[/codebox:" . $post_data['bbcode_uid'] . "\]#msi", $post_data['post_text'], $code_data);
		
		if (count($code_data[2]) >= $part)
		{
			$part--;
			$code = $code_data[2][$part];
			
			if ($code != '')
			{
				// Decode some special characters
				$code = $this->codebox_decode_code($code);
				
				if ($code_data[1][$part] != '')
				{
					$filename = $code_data[1][$part];
				}
			}
			else
			{
				trigger_error($this->user->lang['CODEBOX_PLUS_ERROR_FILE_EMPTY']);
			}
		}
		else
		{
			trigger_error($this->user->lang['CODEBOX_PLUS_ERROR_CODE_NOT_FOUND']);
		}

		// RESPOND
		header('Content-Type: application/force-download');
		header('Content-Length: ' . strlen($code));
		header('Expires: ' . gmdate('D, d M Y H:i:s') . ' GMT');
		header('Content-Disposition: attachment; filename="' . $filename . '"');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');

		echo $code;
	}
	
	// From main_listener.php
	private function codebox_decode_code($code = '', $bbcode_uid = '')
	{
		if (strlen($code) == 0)
		{
			return $code;
		}
		
		$str_from = array('&lt;', '&gt;', '&#91;', '&#93;', '&#40;', '&#41;', '&#46;', '&#58;', '&#058;', '&#39;', '&#039;', '&quot;', '&amp;');
		$str_to = array('<', '>', '[', ']', '(', ')', '.', ':', ':', "'", "'", '"', '&');
		$code = str_replace($str_from, $str_to, $code);
		
		if (strlen($bbcode_uid) == 0)
		{
			return $code;
		}
		else
		{
			return '[code:' . $bbcode_uid . ']' . $code . '[/code:' . $bbcode_uid . ']';
		}
	}
}
