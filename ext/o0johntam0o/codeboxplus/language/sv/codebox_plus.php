<?php
/**
*
* Codebox Plus extension for the phpBB Forum Software package [Swedish]
* Swedish translation by Holger (http://www.maskinisten.net)
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
	'CODEBOX_PLUS_ERROR_GENERAL'				=> 'Generellt fel',
	'CODEBOX_PLUS_ERROR_POST_NOT_FOUND'			=> 'Inlägget kunde ej hittas',
	'CODEBOX_PLUS_ERROR_FILE_EMPTY'				=> 'Detta är en tom fil',
	'CODEBOX_PLUS_ERROR_CODE_NOT_FOUND'			=> 'Kod-innehållet kunde ej hittas',
	'CODEBOX_PLUS_ERROR_LOGIN_REQUIRED'			=> 'Logga in för att ladda ner denna fil',
	'CODEBOX_PLUS_ERROR_CONFIRM'				=> 'Du har överskridit det maximala antalet försök för denna session. Försök igen senare.',
	'CODEBOX_PLUS_ERROR_CODEBOX_PLUS_DISABLED'	=> 'Codebox Plus tillägget har deaktiverats av en administratör',
	'CODEBOX_PLUS_ERROR_DOWNLOAD_DISABLED'		=> 'Nerladdningsfunktionen har deaktiverats av en administratör',
	'CODEBOX_PLUS_ERROR_NO_PERMISSION'			=> 'Du är ej behörig att utföra denna aktion',
	'CODEBOX_PLUS_CONFIRM'						=> 'Mata in bekräftelsekoden för att ladda ner denna fil',
	'CODEBOX_PLUS_CODE'							=> 'Kod',
	'CODEBOX_PLUS_DOWNLOAD'						=> 'Ladda ner',
	'CODEBOX_PLUS_EXPAND'						=> 'Utöka',
	'CODEBOX_PLUS_COLLAPSE'						=> 'Reducera',
	'CODEBOX_PLUS_SELECT'						=> 'Välj kod',
	'CODEBOX_PLUS_DEFAULT_FILENAME'				=> 'Obenämnd',
	'CODEBOX_PLUS_NO_PREVIEW'					=> 'Förhandsgranskning är ej tillgänglig',
	
	'CODEBOX_PLUS_TITLE'						=> 'Codebox Plus tillägg',
	'CODEBOX_PLUS_TITLE_SETTINGS'				=> 'Inställningar',
	'CODEBOX_PLUS_WARNING'						=> 'FÖRÄNDRA EJ BBCODEN [CODEBOX=]',
	'CODEBOX_PLUS_SYNTAX_HIGHLIGHTING'			=> 'Aktivera syntax highlighting',
	'CODEBOX_PLUS_SYNTAX_HIGHLIGHTING_EXPLAIN'	=> '',
	'CODEBOX_PLUS_ENABLE_DOWNLOAD'				=> 'Aktivera nerladdningsfunktionen',
	'CODEBOX_PLUS_ENABLE_DOWNLOAD_EXPLAIN'		=> '',
	'CODEBOX_PLUS_LOGIN_REQUIRED'				=> 'Inloggning erforderlig för nerladdning',
	'CODEBOX_PLUS_LOGIN_REQUIRED_EXPLAIN'		=> '',
	'CODEBOX_PLUS_PREVENT_BOTS'					=> 'Spärra botar',
	'CODEBOX_PLUS_PREVENT_BOTS_EXPLAIN'			=> 'Hindra botar från att ladda ner kod.',
	'CODEBOX_PLUS_CAPTCHA'						=> 'Aktivera CAPTCHA-funktionen',
	'CODEBOX_PLUS_CAPTCHA_EXPLAIN'				=> 'Blockerar autamatiserade formulär-överföringar av spambotar ("Spambot åtgärder" måste vara aktiverade)',
	'CODEBOX_PLUS_MAX_ATTEMPT'					=> 'Max antal försök',
	'CODEBOX_PLUS_MAX_ATTEMPT_EXPLAIN'			=> 'Antal antispambot-försök en användare kan göra innan användaren spärras för denna session',
	'CODEBOX_PLUS_SAVED'						=> 'Codebox Plus inställningarna har uppdaterats',
	'CODEBOX_PLUS_LOG_MSG'						=> '<strong>Ändrade Codebox Plus inställningarna</strong>',
));
