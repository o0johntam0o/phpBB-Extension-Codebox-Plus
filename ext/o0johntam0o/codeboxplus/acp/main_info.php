<?php

/**
*
* @package phpBB Extension - Codebox Plus
* @copyright (c) 2014 o0johntam0o
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
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
			'version'	=> '1.0.0',
			'modes'		=> array(
				'config_codebox_plus'	=> array(
					'title' => 'CODEBOX_PLUS_TITLE_SETTINGS',
					'auth' => 'acl_a_board',
					'cat' => array('CODEBOX_PLUS_TITLE_SETTINGS')
				),
			),
		);
	}
}
