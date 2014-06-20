phpBB Extension - Codebox Plus
============================

Syntax highlighting extension for phpBB

## Author

https://github.com/o0johntam0o/

https://www.phpbb.com/customise/db/author/o0johntam0o/

## Description

Codebox Plus alow you to:

* Syntax highlighting 200+ programming languages (using GeSHi)

* Expand/collapse code block

* Downloading code contents

(Previous version: https://github.com/o0johntam0o/phpBB-Codebox-Plus)

## Requirement

php: >=5.3.3

phpbb: 3.1.*@dev

## Installation

Copy ```./ext/o0johntam0o/codebox_plus/*``` to ```<phpBB root>/ext/o0johntam0o/codebox_plus/*```

## Note

* For security purpose, please don't put any private infomation into the BBCode [CODE][/CODE]

* Usage:

[CODE={language} file={filename}]{code}[/CODE] (with specified filename and language)

[CODE={language}]{code}[/CODE] (without filename, default filename is "Untitled.txt")

[CODE file={filename}]{code}[/CODE] (without language, default language is "Plain text")

[CODE]{code}[/CODE] (using default filename - Untitled.txt and default language - Plain text)


{language} is as the same with the filename of the language file (in root/includes/geshi/geshi/)


To update the GeSHi parser, just replace the folder ./includes/geshi/ with the new one (current version is 1.0.8.11).

I do not own any files under the folder root/includes/geshi/. More information about the authors can be found at http://qbnz.com/highlighter/

## License

[GPLv2](license.txt)

## Task

* Planing