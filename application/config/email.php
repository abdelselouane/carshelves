<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Email
| -------------------------------------------------------------------------
| This file lets you define parameters for sending emails.
| Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/libraries/email.html
|
*/
$config['useragent']	= 'none';
$config['protocol']		= 'smtp';
$config['mailpath']		= 'none';
$config['stmp_host']	= 'p3plcpnl0517.prod.phx3.secureserver.net';
$config['stmp_user']	= 'support@carshelves.com';
$config['stmp_pass']	= 'Support1985007';
$config['stmp_port']	= '465';
$config['stmp_timeout'] = 'none';
$config['priority']		= '1';
$config['mailtype']		= 'html';
$config['charset']		= 'utf-8';
$config['newline']		= "\r\n";


/* End of file email.php */
/* Location: ./application/config/email.php */