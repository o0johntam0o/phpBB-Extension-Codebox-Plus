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

class main_info
{
	function module()
	{
		return array(
			'filename'	=> '\o0johntam0o\codeboxplus\acp\main_module',
			'title'		=> 'CODEBOX_PLUS_TITLE',
			'modes'		=> array(
				'config_codebox_plus'	=> array(
					'title' => 'CODEBOX_PLUS_TITLE_SETTINGS',
					'auth' => 'ext_o0johntam0o/codeboxplus && acl_a_board',
					'cat' => array('CODEBOX_PLUS_TITLE_SETTINGS')
				),
			),
		);
	}
}
