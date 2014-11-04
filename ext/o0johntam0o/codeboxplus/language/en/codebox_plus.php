<?php
/**
*
* Codebox Plus extension for the phpBB Forum Software package [British English]
*
* @copyright (c) 2014 o0johntam0o
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'CODEBOX_PLUS_ERROR_GENERAL'				=> 'General error',
	'CODEBOX_PLUS_ERROR_POST_NOT_FOUND'			=> 'Post not found',
	'CODEBOX_PLUS_ERROR_FILE_EMPTY'				=> 'This is a empty file',
	'CODEBOX_PLUS_ERROR_CODE_NOT_FOUND'			=> 'Code contents not found',
	'CODEBOX_PLUS_ERROR_LOGIN_REQUIRED'			=> 'Please login to download this file',
	'CODEBOX_PLUS_ERROR_CONFIRM'				=> 'You have exceeded the maximum number of submittion attempts for this session. Please try again later.',
	'CODEBOX_PLUS_ERROR_CODEBOX_PLUS_DISABLED'	=> 'Codebox Plus MOD was disabled by the administrator',
	'CODEBOX_PLUS_ERROR_DOWNLOAD_DISABLED'		=> 'Download function was disabled by the administrator',
	'CODEBOX_PLUS_ERROR_NO_PERMISSION'			=> 'You do not have the necessary permissions to complete this operation',
	'CODEBOX_PLUS_CONFIRM'						=> 'Please enter the confirmation code to download this file',
	'CODEBOX_PLUS_CODE'							=> 'Code',
	'CODEBOX_PLUS_DOWNLOAD'						=> 'Download',
	'CODEBOX_PLUS_EXPAND'						=> 'Expand',
	'CODEBOX_PLUS_COLLAPSE'						=> 'Collapse',
	'CODEBOX_PLUS_SELECT'						=> 'Select code',
	'CODEBOX_PLUS_DEFAULT_FILENAME'				=> 'Untitled',
	'CODEBOX_PLUS_NO_PREVIEW'					=> 'Preview is not available',
	
	'CODEBOX_PLUS_TITLE'						=> 'Codebox Plus Extension',
	'CODEBOX_PLUS_TITLE_SETTINGS'				=> 'General settings',
	'CODEBOX_PLUS_WARNING'						=> 'DO NOT MODIFY THE BBCODE [CODEBOX=]',
	'CODEBOX_PLUS_ENABLE'						=> 'Enable Codebox Plus',
	'CODEBOX_PLUS_ENABLE_EXPLAIN'				=> 'Do you want to use this mod now?',
	'CODEBOX_PLUS_ENABLE_DOWNLOAD'				=> 'Enable download feature',
	'CODEBOX_PLUS_ENABLE_DOWNLOAD_EXPLAIN'		=> '',
	'CODEBOX_PLUS_LOGIN_REQUIRED'				=> 'Requires login to download',
	'CODEBOX_PLUS_LOGIN_REQUIRED_EXPLAIN'		=> '',
	'CODEBOX_PLUS_PREVENT_BOTS'					=> 'Prevent Bots',
	'CODEBOX_PLUS_PREVENT_BOTS_EXPLAIN'			=> 'Prevent Bots from downloading code.',
	'CODEBOX_PLUS_CAPTCHA'						=> 'Enable CAPTCHA function',
	'CODEBOX_PLUS_CAPTCHA_EXPLAIN'				=> 'To block automated form submissions by spambots ("Spambot countermeasures" must be enabled first)',
	'CODEBOX_PLUS_MAX_ATTEMPT'					=> 'Max attempt',
	'CODEBOX_PLUS_MAX_ATTEMPT_EXPLAIN'			=> 'Number of attempts users can make at solving the anti-spambot task before being locked out of that session',
	'CODEBOX_PLUS_SAVED'						=> 'Codebox Plus settings updated',
	'CODEBOX_PLUS_LOG_MSG'						=> '<strong>Altered Codebox Plus settings</strong>',
));
