<?php

/**
*
* @package phpBB Extension - Codebox Plus
* @copyright (c) 2014 o0johntam0o
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace o0johntam0o\codebox_plus\acp;

class main_info
{
	function module()
	{
		return array(
			'filename'	=> '\o0johntam0o\codebox_plus\acp\main_module',
			'title'		=> 'CODEBOX_PLUS_TITLE_ACP',
			'version'	=> '1.0.0',
			'modes'		=> array(
				'config_codebox_plus'	=> array(
					'title' => 'CODEBOX_PLUS_TITLE_ACP',
					'auth' => 'acl_a_board',
					'cat' => array('CODEBOX_PLUS_TITLE_ACP')
				),
			),
		);
	}
}
