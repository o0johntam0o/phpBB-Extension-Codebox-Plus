<?php
/**
*
* Codebox Plus extension for the phpBB Forum Software package [Vietnamese]
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
	'CODEBOX_PLUS_ERROR_GENERAL'				=> 'Lỗi tổng quát',
	'CODEBOX_PLUS_ERROR_POST_NOT_FOUND'			=> 'Không tìm thấy bài viết',
	'CODEBOX_PLUS_ERROR_FILE_EMPTY'				=> 'Đây là một tập tin rỗng',
	'CODEBOX_PLUS_ERROR_CODE_NOT_FOUND'			=> 'Không tìm thấy nội dung cú pháp',
	'CODEBOX_PLUS_ERROR_LOGIN_REQUIRED'			=> 'Vui lòng đăng nhập để tải tập tin này',
	'CODEBOX_PLUS_ERROR_CONFIRM'				=> 'Bạn đã gửi yêu cầu vượt quá số lần quy định trong phiên truy cập này. Vui lòng thử lại sau.',
	'CODEBOX_PLUS_ERROR_CODEBOX_PLUS_DISABLED'	=> 'Tùy chỉnh Codebox Plus đã được ngưng kích hoạt bởi người quản trị',
	'CODEBOX_PLUS_ERROR_DOWNLOAD_DISABLED'		=> 'Tính năng tải về đã được ngưng kích hoạt bởi người quản trị',
	'CODEBOX_PLUS_ERROR_NO_PERMISSION'			=> 'Bạn không được cấp phép đầy đủ để hoàn tất quá trình này',
	'CODEBOX_PLUS_CONFIRM'						=> 'Vui lòng nhập mã xác nhận để tải tập tin này',
	'CODEBOX_PLUS_CODE'							=> 'Mã',
	'CODEBOX_PLUS_DOWNLOAD'						=> 'Tải về',
	'CODEBOX_PLUS_EXPAND'						=> 'Mở rộng',
	'CODEBOX_PLUS_COLLAPSE'						=> 'Thu hẹp',
	'CODEBOX_PLUS_SELECT'						=> 'Chọn mã',
	'CODEBOX_PLUS_DEFAULT_FILENAME'				=> 'Không tên',
	'CODEBOX_PLUS_NO_PREVIEW'					=> 'Xem trước không khả dụng',
	
	'CODEBOX_PLUS_TITLE'						=> 'Codebox Plus Extension',
	'CODEBOX_PLUS_TITLE_SETTINGS'				=> 'Cài đặt tổng quát',
	'CODEBOX_PLUS_WARNING'						=> 'KHÔNG ĐƯỢC CHỈNH SỬA BBCODE [CODEBOX=]',
	'CODEBOX_PLUS_ENABLE'						=> 'Kích hoạt Codebox Plus',
	'CODEBOX_PLUS_ENABLE_EXPLAIN'				=> 'Bạn có muốn sử dụng tùy chỉnh này ngay bây giờ?',
	'CODEBOX_PLUS_ENABLE_DOWNLOAD'				=> 'Kích hoạt chức năng tải về',
	'CODEBOX_PLUS_ENABLE_DOWNLOAD_EXPLAIN'		=> '',
	'CODEBOX_PLUS_LOGIN_REQUIRED'				=> 'Yêu cầu đăng nhập để tải về',
	'CODEBOX_PLUS_LOGIN_REQUIRED_EXPLAIN'		=> '',
	'CODEBOX_PLUS_PREVENT_BOTS'					=> 'Chặn các máy tìm kiếm',
	'CODEBOX_PLUS_PREVENT_BOTS_EXPLAIN'			=> 'Chặn các máy tìm kiếm tải về các đoạn mã',
	'CODEBOX_PLUS_CAPTCHA'						=> 'Kích hoạt chức năng CAPTCHA',
	'CODEBOX_PLUS_CAPTCHA_EXPLAIN'				=> 'Nhầm chặn các máy SpamBots tự động tải về các tập tin ("Thiết lập mã xác nhận" cần được kích hoạt trước)',
	'CODEBOX_PLUS_MAX_ATTEMPT'					=> 'Số lần nhập sai CAPTCHA tối đa',
	'CODEBOX_PLUS_MAX_ATTEMPT_EXPLAIN'			=> 'Nếu vượt quá giới hạn này, chức năng tải về sẽ tạm khóa trong phiên truy cập đó.',
	'CODEBOX_PLUS_SAVED'						=> 'Đã cập nhật các tùy chỉnh cho Codebox Plus',
	'CODEBOX_PLUS_LOG_MSG'						=> '<strong>Thay đổi cài đặt Codebox Plus</strong>',
));
