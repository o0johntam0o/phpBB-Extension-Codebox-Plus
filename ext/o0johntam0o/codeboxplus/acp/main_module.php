<?php
/**
*
* Codebox Plus extension for the phpBB Forum Software package
*
* @copyright (c) 2014 o0johntam0o
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace o0johntam0o\codeboxplus\acp;

class main_module
{
	/** @var ContainerInterface */
	protected $phpbb_container;

	/** @var \phpbb\user */
	protected $user;

	/** @var \phpbb\template\template */
	protected $template;
	
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\request\request */
	protected $request;

	/** @var \phpbb\log\log */
	protected $log;

	/** @var string */
	public $u_action;
	
	function main($id, $mode)
	{
		global $phpbb_container, $user, $template, $config, $request;

		$this->phpbb_container = $phpbb_container;
		
		$this->user = $user;
		$this->template = $template;
		$this->config = $config;
		$this->request = $request;
		$this->log = $this->phpbb_container->get('log');
		
		$this->tpl_name = 'acp_codebox_plus';
		$this->page_title = $this->user->lang('CODEBOX_PLUS_TITLE');
		add_form_key('o0johntam0o/acp_codebox_plus');

		if ($this->request->is_set_post('submit'))
		{
			if (!check_form_key('o0johntam0o/acp_codebox_plus'))
			{
				trigger_error('FORM_INVALID');
			}
			
			$this->config->set('codebox_plus_syntax_highlighting', $request->variable('codebox_plus_syntax_highlighting', 0));
                        $this->config->set('codebox_plus_expanded', $request->variable('codebox_plus_expanded', 0));
			$this->config->set('codebox_plus_download', $request->variable('codebox_plus_download', 0));
			$this->config->set('codebox_plus_login_required', $request->variable('codebox_plus_login_required', 0));
			$this->config->set('codebox_plus_prevent_bots', $request->variable('codebox_plus_prevent_bots', 0));
			$this->config->set('codebox_plus_captcha', $request->variable('codebox_plus_captcha', 0));
			$this->config->set('codebox_plus_max_attempt', $request->variable('codebox_plus_max_attempt', 0));
			
			$this->log->add('admin', $this->user->data['user_id'], $this->user->ip, 'CODEBOX_PLUS_LOG_MSG');
			trigger_error($this->user->lang('CODEBOX_PLUS_SAVED') . adm_back_link($this->u_action));
		}
		
		$this->template->assign_vars(array(
			'U_ACTION'									=> $this->u_action,
			'S_CODEBOX_PLUS_VERSION'					=> isset($this->config['codebox_plus_version']) ? $this->config['codebox_plus_version'] : 0,
			'S_CODEBOX_PLUS_SYNTAX_HIGHLIGHTING'		=> isset($this->config['codebox_plus_syntax_highlighting']) ? $this->config['codebox_plus_syntax_highlighting'] : 0,
                        'S_CODEBOX_PLUS_EXPANDED'                                       => isset($this->config['codebox_plus_expanded']) ? $this->config['codebox_plus_expanded'] : 0,
			'S_CODEBOX_PLUS_DOWNLOAD'					=> isset($this->config['codebox_plus_download']) ? $this->config['codebox_plus_download'] : 0,
			'S_CODEBOX_PLUS_LOGIN_REQUIRED'				=> isset($this->config['codebox_plus_login_required']) ? $this->config['codebox_plus_login_required'] : 0,
			'S_CODEBOX_PLUS_PREVENT_BOTS'				=> isset($this->config['codebox_plus_prevent_bots']) ? $this->config['codebox_plus_prevent_bots'] : 0,
			'S_CODEBOX_PLUS_CAPTCHA'					=> isset($this->config['codebox_plus_captcha']) ? $this->config['codebox_plus_captcha'] : 0,
			'S_CODEBOX_PLUS_MAX_ATTEMPT'				=> isset($this->config['codebox_plus_max_attempt']) ? $this->config['codebox_plus_max_attempt'] : 0,
		));
	}
}
