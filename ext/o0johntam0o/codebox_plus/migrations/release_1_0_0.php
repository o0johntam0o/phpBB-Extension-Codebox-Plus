<?php

/**
*
* @package phpBB Extension - Codebox Plus
* @copyright (c) 2014 o0johntam0o
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace o0johntam0o\codebox_plus\migrations;

class release_1_0_0 extends \phpbb\db\migration\migration
{
    public function effectively_installed()
    {
        return isset($this->config['codebox_plus_version']) && version_compare($this->config['codebox_plus_version'], '1.0.0', '>=');
    }

    static public function depends_on()
    {
        return array('\phpbb\db\migration\data\v310\dev');
    }

    public function update_data()
    {
        return array(
            array('config.add', array('codebox_plus_enable', 1)),
            array('config.add', array('codebox_plus_download', 1)),
            array('config.add', array('codebox_plus_login_required', 0)),
            array('config.add', array('codebox_plus_prevent_bots', 1)),
            array('config.add', array('codebox_plus_captcha', 1)),
            array('config.add', array('codebox_plus_max_attempt', 3)),

            array('module.add', array(
                'acp',
                'ACP_CAT_DOT_MODS',
                'CODEBOX_PLUS_TITLE_ACP'
            )),
			
            array('module.add', array(
                'acp',
                'CODEBOX_PLUS_TITLE_ACP',
                array(
                    'module_basename'   => '\o0johntam0o\codebox_plus\acp\main_module',
                    'modes'             => array('config_codebox_plus'),
                ),
            )),

            array('config.add', array('codebox_plus_version', '1.0.0')),
        );
    }
}
