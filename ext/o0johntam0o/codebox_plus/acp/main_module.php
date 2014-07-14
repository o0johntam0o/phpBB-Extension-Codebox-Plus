<?php

/**
*
* @package phpBB Extension - Codebox Plus
* @copyright (c) 2014 o0johntam0o
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace o0johntam0o\codebox_plus\acp;

class main_module
{
	var $u_action;
	
	function main($id, $mode)
	{
		global $user, $template, $config, $request, $phpbb_log;

		$this->tpl_name = 'acp_codebox_plus';
		$this->page_title = $user->lang['CODEBOX_PLUS_TITLE'];
		add_form_key('o0johntam0o/acp_codebox_plus');

		if ($request->is_set_post('submit'))
		{
			if (!check_form_key('o0johntam0o/acp_codebox_plus'))
			{
				trigger_error('FORM_INVALID');
			}
			
			$config->set('codebox_plus_enable', $request->variable('codebox_plus_enable', 0));
			$config->set('codebox_plus_download', $request->variable('codebox_plus_download', 0));
			$config->set('codebox_plus_login_required', $request->variable('codebox_plus_login_required', 0));
			$config->set('codebox_plus_prevent_bots', $request->variable('codebox_plus_prevent_bots', 0));
			$config->set('codebox_plus_captcha', $request->variable('codebox_plus_captcha', 0));
			$config->set('codebox_plus_max_attempt', $request->variable('codebox_plus_max_attempt', 0));
			
			$phpbb_log->add('admin', $user->data['user_id'], $user->ip, 'CODEBOX_PLUS_LOG_MSG');
			trigger_error($user->lang('CODEBOX_PLUS_SAVED') . adm_back_link($this->u_action));
		}
		
		$template->assign_vars(array(
			'U_ACTION'							=> $this->u_action,
			'S_CODEBOX_PLUS_VERSION'			=> isset($config['codebox_plus_version']) ? $config['codebox_plus_version'] : 0,
			'S_CODEBOX_PLUS_ENABLE'				=> isset($config['codebox_plus_enable']) ? $config['codebox_plus_enable'] : 0,
			'S_CODEBOX_PLUS_DOWNLOAD'			=> isset($config['codebox_plus_download']) ? $config['codebox_plus_download'] : 0,
			'S_CODEBOX_PLUS_LOGIN_REQUIRED'		=> isset($config['codebox_plus_login_required']) ? $config['codebox_plus_login_required'] : 0,
			'S_CODEBOX_PLUS_PREVENT_BOTS'		=> isset($config['codebox_plus_prevent_bots']) ? $config['codebox_plus_prevent_bots'] : 0,
			'S_CODEBOX_PLUS_CAPTCHA'			=> isset($config['codebox_plus_captcha']) ? $config['codebox_plus_captcha'] : 0,
			'S_CODEBOX_PLUS_MAX_ATTEMPT'		=> isset($config['codebox_plus_max_attempt']) ? $config['codebox_plus_max_attempt'] : 0,
		));
	}
}
