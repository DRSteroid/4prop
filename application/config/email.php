<?php defined('BASEPATH') OR exit('No direct script access allowed.');

$config['useragent']        = 'CodeIgniter';              // Mail engine switcher: 'CodeIgniter' or 'PHPMailer'
$config['protocol']         = 'smtp';                   // 'mail', 'sendmail', or 'smtp'
//$config['mailpath']         = 'C:\xampp\sendmail';
$config['smtp_host']        = 'mail.gluon.hu';
$config['smtp_user']        = 'noreply@legends4ever.hu';
$config['smtp_pass']        = '13,%,tResev';
$config['smtp_port']        = 587;
$config['smtp_timeout']     = 10;                        // (in seconds)
$config['smtp_crypto']      = 'tls';                       // '' or 'tls' or 'ssl'
$config['smtp_debug']       = 0;                        // PHPMailer's SMTP debug info level: 0 = off, 1 = commands, 2 = commands and data, 3 = as 2 plus connection status, 4 = low level data output.
$config['wordwrap']         = true;
$config['wrapchars']        = 76;
$config['mailtype']         = 'html';                   // 'text' or 'html'
$config['charset']          = 'UTF-8';                     // 'UTF-8', 'ISO-8859-15', ...; NULL (preferable) means config_item('charset'), i.e. the character set of the site.
$config['validate']         = true;
$config['priority']         = 3;                        // 1, 2, 3, 4, 5; on PHPMailer useragent NULL is a possible option, it means that X-priority header is not set at all, see https://github.com/PHPMailer/PHPMailer/issues/449
$config['newline'] = "\r\n";
$config['crlf']    = "\r\n";
$config['bcc_batch_mode']   = false;
$config['bcc_batch_size']   = 200;
$config['encoding']         = '8bit';                   // The body encoding. For CodeIgniter: '8bit' or '7bit'. For PHPMailer: '8bit', '7bit', 'binary', 'base64', or 'quoted-printable'.
