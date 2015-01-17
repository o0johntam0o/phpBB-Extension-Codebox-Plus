<?php
/**
*
* Codebox Plus extension for the phpBB Forum Software package [British English]
*
* @copyright (c) 2014 o0johntam0o
* @license GNU General Public License, version 2 (GPL-2.0)
*
* German translation by tas2580 (https://tas2580.net)
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
	'CODEBOX_PLUS_ERROR_GENERAL'				=> 'Allgemeiner Fehler',
	'CODEBOX_PLUS_ERROR_POST_NOT_FOUND'			=> 'Beitrag nicht gefunden',
	'CODEBOX_PLUS_ERROR_FILE_EMPTY'				=> 'Die Datei ist leer',
	'CODEBOX_PLUS_ERROR_CODE_NOT_FOUND'			=> 'Code Inhalt nicht gefunden',
	'CODEBOX_PLUS_ERROR_LOGIN_REQUIRED'			=> 'Bitte melde dich an um die Datei runter zu laden',
	'CODEBOX_PLUS_ERROR_CONFIRM'				=> 'Du hast die maximale Anzahl der Versuche zur Einreichung für diese Sitzung überschritten. Bitte versuche es später noch einmal.',
	'CODEBOX_PLUS_ERROR_CODEBOX_PLUS_DISABLED'	=> 'Codebox Plus MOD wurde vom Administrator deaktiviert',
	'CODEBOX_PLUS_ERROR_DOWNLOAD_DISABLED'		=> 'Die Download Funktion wurde vom Administrator deaktiviert',
	'CODEBOX_PLUS_ERROR_NO_PERMISSION'			=> 'Du hast nicht die nötigen Rechte um die Aktion abzuschließen',
	'CODEBOX_PLUS_CONFIRM'						=> 'Bitte gib den Bestätigungscode ein um die Datei runter zu laden',
	'CODEBOX_PLUS_CODE'							=> 'Code',
	'CODEBOX_PLUS_DOWNLOAD'						=> 'Download',
	'CODEBOX_PLUS_EXPAND'						=> 'Erweitern',
	'CODEBOX_PLUS_COLLAPSE'						=> 'Minimieren',
	'CODEBOX_PLUS_SELECT'						=> 'Code auswählen',
	'CODEBOX_PLUS_DEFAULT_FILENAME'				=> 'Unbenannt',
	'CODEBOX_PLUS_NO_PREVIEW'					=> 'Die Vorschau ist nicht verfügbar',
	
	'CODEBOX_PLUS_TITLE'						=> 'Codebox Plus Extension',
	'CODEBOX_PLUS_TITLE_SETTINGS'				=> 'Einstellungen',
	'CODEBOX_PLUS_WARNING'						=> 'ÄNDERE DEN BB-CODE [CODEBOX=] NICHT!',
	'CODEBOX_PLUS_ENABLE'						=> 'Aktiviere Codebox Plus',
	'CODEBOX_PLUS_ENABLE_EXPLAIN'				=> 'Möchtest du diesen Mod jetzt nutzen?',
	'CODEBOX_PLUS_ENABLE_DOWNLOAD'				=> 'Download Funktion aktivieren',
	'CODEBOX_PLUS_ENABLE_DOWNLOAD_EXPLAIN'		=> '',
	'CODEBOX_PLUS_LOGIN_REQUIRED'				=> 'Benötigt Login zum Download',
	'CODEBOX_PLUS_LOGIN_REQUIRED_EXPLAIN'		=> '',
	'CODEBOX_PLUS_PREVENT_BOTS'					=> 'Bots verhindern',
	'CODEBOX_PLUS_PREVENT_BOTS_EXPLAIN'			=> 'Verhindert das Bots Code downloaden können.',
	'CODEBOX_PLUS_CAPTCHA'						=> 'CAPTCHA aktivieren',
	'CODEBOX_PLUS_CAPTCHA_EXPLAIN'				=> 'Automatisches ausfüllen von Formularen durch Spambots blockieren(Es muss ein CAPTCHA konfiguriert sein)',
	'CODEBOX_PLUS_MAX_ATTEMPT'					=> 'Max versuche',
	'CODEBOX_PLUS_MAX_ATTEMPT_EXPLAIN'			=> 'Anzahl der Versuche die ein Benutzer hat um das CAPTCHA zu lösen bevor er für die Session gesperrt wird.',
	'CODEBOX_PLUS_SAVED'						=> 'Codebox Plus Einstellungen aktualisiert',
	'CODEBOX_PLUS_LOG_MSG'						=> '<strong>Erweitere Codebox Plus Einstellungen</strong>',
));