<?php

/**
*
* @package phpBB Extension - Codebox Plus
* @copyright (c) 2014 o0johntam0o
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace o0johntam0o\codebox_plus\event;

/**
* @ignore
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class main_listener implements EventSubscriberInterface
{
	protected $helper, $template, $user, $config, $request, $root_path, $php_ext;
	protected $codebox_plus_enabled, $download_enabled, $find, $find_code, $find_lang, $find_file;
	
	public function __construct(\phpbb\controller\helper $helper, \phpbb\template\template $template, \phpbb\user $user, \phpbb\config\config $config, \phpbb\request\request $request, $root_path, $php_ext)
	{
		$this->helper = $helper;
		$this->template = $template;
		$this->user = $user;
		$this->config = $config;
		$this->request = $request;
		$this->php_ext = $php_ext;
		
		$this->codebox_plus_enabled = isset($this->config['codebox_plus_enable']) ? $this->config['codebox_plus_enable'] : 0;
		$this->download_enabled = isset($this->config['codebox_plus_download']) ? $this->config['codebox_plus_download'] : 0;
	}
	
	static public function getSubscribedEvents()
    {
        return array(
            'core.user_setup'						=> 'load_language_on_setup',
            'core.viewtopic_post_rowset_data'		=> 'viewtopic_correct_download_link',
            'core.memberlist_view_profile'			=> 'memberlist_correct_download_link',
        );
    }
	
    public function load_language_on_setup($event)
    {
        $lang_set_ext = $event['lang_set_ext'];
        $lang_set_ext[] = array(
            'ext_name' => 'o0johntam0o/codebox_plus',
            'lang_set' => 'codebox_plus',
        );
        $event['lang_set_ext'] = $lang_set_ext;
		
		if ($this->codebox_plus_enabled)
		{
			$this->template->assign_vars(array(
				'CODEBOX_PLUS_AVAILABLE'				=> true,
			));
		}
		
		if ($this->download_enabled)
		{
			$this->template->assign_vars(array(
				'CODEBOX_PLUS_DOWNLOAD_AVAILABLE'		=> true,
			));
		}
    }

	/*
	* Require: ($this->codebox_plus_enabled == true)
	* POST & SIGNATURE => OK
	*/
    public function viewtopic_correct_download_link($event)
    {
		if (!$this->codebox_plus_enabled)
		{
			return;
		}
		
		// POSTS <<<<<<<<
		if (isset($event['rowset_data']))
		{
			$rowset_data = $event['rowset_data'];
			$post_text = isset($rowset_data['post_text']) ? $rowset_data['post_text'] : '';
			$bbcode_uid = isset($rowset_data['bbcode_uid']) ? $rowset_data['bbcode_uid'] : '';
			$post_id = isset($rowset_data['post_id']) ? $rowset_data['post_id'] : 0;
			$part = 0;
			
			while (preg_match("#\[codebox=[a-z0-9_-]+ file=(.*?):" . $bbcode_uid . "\](.*?)\[/codebox:" . $bbcode_uid . "\]#msi", $post_text))
			{
				$part++;
				$post_text = preg_replace("#\[codebox=[a-z0-9_-]+ file=(.*?):" . $bbcode_uid . "\](.*?)\[/codebox:" . $bbcode_uid . "\]#msie", "\$this->codebox_template('\$2', '\$0', '\$1', \$this->helper->route('codebox_plus_download_controller', array('mode' => 0, 'id' => \$post_id, 'part' => \$part)), \$bbcode_uid)", $post_text, 1);
			}
			
			if (isset($rowset_data['post_text']) && $part > 0)
			{
				$rowset_data['post_text'] = $post_text;
				$event['rowset_data'] = $rowset_data;
			}
		}
		
		// SIGNATURE <<<<<<<<
		if (isset($event['row']))
		{
			$row = $event['row'];
			$user_sig = isset($row['user_sig']) ? $row['user_sig'] : '';
			$user_sig_bbcode_uid = isset($row['user_sig_bbcode_uid']) ? $row['user_sig_bbcode_uid'] : '';
			$user_id = isset($row['user_id']) ? $row['user_id'] : 0;
			$part = 0;
			
			while (preg_match("#\[codebox=[a-z0-9_-]+ file=(.*?):" . $user_sig_bbcode_uid . "\](.*?)\[/codebox:" . $user_sig_bbcode_uid . "\]#msi", $user_sig))
			{
				$part++;
				$user_sig = preg_replace("#\[codebox=[a-z0-9_-]+ file=(.*?):" . $user_sig_bbcode_uid . "\](.*?)\[/codebox:" . $user_sig_bbcode_uid . "\]#msie", "\$this->codebox_template('\$2', '\$0', '\$1', \$this->helper->route('codebox_plus_download_controller', array('mode' => 2, 'id' => \$user_id, 'part' => \$part)), \$user_sig_bbcode_uid)", $user_sig, 1);
			}
			
			if (isset($row['user_sig']) && $part > 0)
			{
				$row['user_sig'] = $user_sig;
				$event['row'] = $row;
			}
		}
	}
	
	/*
	* Require: ($this->codebox_plus_enabled == true)
	* SIGNATURE
	*/
	public function memberlist_correct_download_link($event)
	{
		if (!$this->codebox_plus_enabled)
		{
			return;
		}
		
		if (isset($event['member']))
		{
			$member = $event['member'];
			$user_sig = isset($member['user_sig']) ? $member['user_sig'] : '';
			$user_sig_bbcode_uid = isset($member['user_sig_bbcode_uid']) ? $member['user_sig_bbcode_uid'] : '';
			//$user_id = $this->request->variable('u', 0);
			$user_id = isset($member['user_id']) ? $member['user_id'] : 0;
			$part = 0;
			
			while (preg_match("#\[codebox=[a-z0-9_-]+ file=(.*?):" . $user_sig_bbcode_uid . "\](.*?)\[/codebox:" . $user_sig_bbcode_uid . "\]#msi", $user_sig))
			{
				$part++;
				$user_sig = preg_replace("#\[codebox=[a-z0-9_-]+ file=(.*?):" . $user_sig_bbcode_uid . "\](.*?)\[/codebox:" . $user_sig_bbcode_uid . "\]#msie", "\$this->codebox_template('\$2', '\$0', '\$1', \$this->helper->route('codebox_plus_download_controller', array('mode' => 2, 'id' => \$user_id, 'part' => \$part)), \$user_sig_bbcode_uid)", $user_sig, 1);
			}
			
			if (isset($member['user_sig']) && $part > 0)
			{
				$member['user_sig'] = $user_sig;
				$event['member'] = $member;
			}
		}
	}
	
	/*
	* Require: ($this->codebox_plus_enabled == true)
	* MESSAGE & SIGNATURE
	*/
	public function ucp_correct_download_link($event)
	{
		if (!$this->codebox_plus_enabled)
		{
			return;
		}
	}
	
	/*
	* Require: ($this->codebox_plus_enabled == true)
	* REVIEW & POST & SIGNATURE
	*/
	public function posting_correct_download_link($event)
	{
		if (!$this->codebox_plus_enabled)
		{
			return;
		}
    }
	
	/*
	* Return: Template
	*/
	public function codebox_template($code = '', $lang = '', $file = '', $link = '', $bbcode_uid = '')
	{
		if (strlen($code) == 0 || strlen($lang) == 0 || strlen($file) == 0 || strlen($link) == 0 || strlen($bbcode_uid) == 0)
		{
			return '';
		}
		
		$re = '<dl class="codebox_plus"><dt><b>' . $this->user->lang['CODEBOX_PLUS_CODE'] . ':</b> ';
		$re .= '<a href="#" onclick="selectCodebox(this); return false;">';
		$re .= '[' . $this->user->lang['SELECT_ALL_CODE'] . ']';
		$re .= '</a> <a href="#" onclick="showHideCodebox(this); return false;">';
		$re .= '[' . $this->user->lang['CODEBOX_PLUS_EXPAND'] . '/' . $this->user->lang['CODEBOX_PLUS_COLLAPSE'] . ']</a> ';
		
		if ($this->download_enabled)
		{
			$re .= '<a href="' . $link . '" onclick="window.open(this.href); return false;">';
			$re .= '[' . $this->user->lang['CODEBOX_PLUS_DOWNLOAD'] . ']</a> ' . '('. $file . ')';
		}
		
		$re .= '</dt><dd>' . $this->codebox_parse_code($code, $lang, $bbcode_uid);
		$re .= '</dd><dd style="text-align:right; border-top:solid 1px #cccccc;"><a href="http://qbnz.com/highlighter/">GeSHi</a> &copy; <a href="https://www.phpbb.com/customise/db/mod/codebox_plus/">Codebox Plus</a></dd></dl>';
		
		return $re;
	}
	
	/*
	* Return: Code
	*/
	private function codebox_parse_code($code = '', $lang = '', $bbcode_uid = '')
	{
		if (strlen($code) == 0 || strlen($lang) == 0 || strlen($bbcode_uid) == 0)
		{
			return $code;
		}
		// Remove newline at the beginning
		if (!empty($code) && $code[0] == "\n")
		{
			$code = substr($code, 1);
		}
		
		// Remove BBCodes & Smilies
		$code = $this->codebox_clean_code($code, $bbcode_uid);
		
		// GeSHi
		if (!class_exists("GeSHi"))
		{
			include($this->root_path . 'ext/o0johntam0o/codebox_plus/includes/geshi/geshi.php');
		}
		
		$geshi = new \GeSHi($code, $lang);
		$geshi->set_header_type(GESHI_HEADER_DIV);
		$geshi->enable_line_numbers(GESHI_NORMAL_LINE_NUMBERS);
		$geshi->set_line_style('margin-left:20px;', false);
		$geshi->set_code_style('border-bottom: dotted 1px #cccccc; font-size:100%;', false);
		$code = str_replace("\n", "", $geshi->parse_code());
		
		return $code;
	}
	
	/*
	* Return: Code
	*/
	private function codebox_clean_code($code = '', $bbcode_uid = '')
	{
		if (strlen($code) == 0 || strlen($bbcode_uid) == 0)
		{
			return $code;
		}
		// Email
		$code = preg_replace('#<!-- e --><a href=\\\\"mailto:(?:.*?)\\\\">(.*?)</a><!-- e -->#msi', '$1', $code);
		// Smilies
		$code = preg_replace('#<!-- s(.*?) --><img src=\\\\"{SMILIES_PATH}/(?:.*?)\\\\" /><!-- s(?:.*?) -->#msi', '$1', $code);
		// To prevent -> [CODE1][CODE2]TEXT[/CODE2][/CODE1]
		// BBCodes with no param
		$code = preg_replace('#\[b:' . $bbcode_uid . '\](.*?)\[/b:' . $bbcode_uid . '\]#msi', '[b]$1[/b]', $code);
		$code = preg_replace('#\[i:' . $bbcode_uid . '\](.*?)\[/i:' . $bbcode_uid . '\]#msi', '[i]$1[/i]', $code);
		$code = preg_replace('#\[u:' . $bbcode_uid . '\](.*?)\[/u:' . $bbcode_uid . '\]#msi', '[u]$1[/u]', $code);
		$code = preg_replace('#\[img:' . $bbcode_uid . '\](.*?)\[/img:' . $bbcode_uid . '\]#msi', '[img]$1[/img]', $code);
		$code = preg_replace('#\[\*:' . $bbcode_uid . '\](.*?)\[/\*:' . $bbcode_uid . '\]#msi', '[*]$1[/*]', $code);
		$code = preg_replace('#\[code:' . $bbcode_uid . '\](.*?)\[/code:' . $bbcode_uid . '\]#msi', '[code]$1[/code]', $code);
		$code = preg_replace('#\[quote:' . $bbcode_uid . '\](.*?)\[/quote:' . $bbcode_uid . '\]#msi', '[quote]$1[/quote]', $code);
		$code = preg_replace('#\[url:' . $bbcode_uid . '\](.*?)\[/url:' . $bbcode_uid . '\]#msi', '[url]$1[/url]', $code);
		$code = preg_replace('#\[list:' . $bbcode_uid . '\](.*?)\[/list:u:' . $bbcode_uid . '\]#msi', '[list]$1[/list]', $code);
		// BBCodes with params
		$code = preg_replace('#\[code=([a-z]+):' . $bbcode_uid . '\](.*?)\[/code:' . $bbcode_uid . '\]#msi', '[code=$1]$2[/code]', $code);
		$code = preg_replace('#\[quote=&quot;(.*?)&quot;:' . $bbcode_uid . '\](.*?)\[/quote:' . $bbcode_uid . '\]#msi', '[quote="$1"]$2[/quote]', $code);
		$code = preg_replace('#\[url=(.*?):' . $bbcode_uid . '\](.*?)\[/url:' . $bbcode_uid . '\]#msi', '[url=$1]$2[/url]', $code);
		$code = preg_replace('#\[list=([a-z0-9]|disc|circle|square):' . $bbcode_uid . '\](.*)\[/list:u:' . $bbcode_uid . '\]#msi', '[list=$1]$2[/list]', $code);
		$code = preg_replace('#\[size=([\-\+]?\d+):' . $bbcode_uid . '\](.*?)\[/size:' . $bbcode_uid . '\]#msi', '[size=$1]$2[/size]', $code);
		$code = preg_replace('!\[color=(#[0-9a-f]{3}|#[0-9a-f]{6}|[a-z\-]+):' . $bbcode_uid . '\](.*?)\[/color:' . $bbcode_uid . '\]!msi', '[color=$1]$2[/color]', $code);
		$code = preg_replace('#\[flash=([0-9]+,[0-9]+):' . $bbcode_uid . '\](.*?)\[/flash:' . $bbcode_uid . '\]#msi', '[flash=$1]$2[/flash]', $code);
		$code = preg_replace('#\[attachment=([0-9]+):' . $bbcode_uid . '\]<(?:.*?)>(.*?)<(?:.*?)>\[/attachment:' . $bbcode_uid . '\]#msi', '[attachment=$1]$2[/attachment]', $code);
		// A trouble with [CODE=PHP][/CODE]
		$code = preg_replace('#<(.*?)>#msi', '', $code);
		$code = preg_replace('#&nbsp;#msi', ' ', $code);
		// Some characters was encoded before. We have to decode it
		$str_from = array('<br />', '\"', '&lt;', '&gt;', '&#91;', '&#93;', '&#40;', '&#41;', '&#46;', '&#58;', '&#058;', '&#39;', '&#039;', '&quot;', '&amp;');
		$str_to = array("\n", '"', '<', '>', '[', ']', '(', ')', '.', ':', ':', "'", "'", '"', '&');
		$code = str_replace($str_from, $str_to, $code);
		
		return $code;
	}
}
