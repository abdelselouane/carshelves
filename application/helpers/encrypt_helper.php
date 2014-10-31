<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('encryptIt'))
{
    function encryptIt( $q ) {
        $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
        $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
        return( $qEncoded );
    }
 
}

if ( ! function_exists('decryptIt'))
{
    function decryptIt( $q ) {
        $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
        $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
        return( $qDecoded );
    }
 
}

if ( ! function_exists('url_encrypt'))
{
	function url_encrypt($pure_string) {
		$cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
	    $dirty = array("+", "/", "=");
	    $clean = array("p1uS", "s10Sh", "E0u01s");
	    $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
	    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
	    $encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, $cryptKey, utf8_encode($pure_string), MCRYPT_MODE_ECB, $iv);
	    $encrypted_string = base64_encode($encrypted_string);
	    return str_replace($dirty, $clean, $encrypted_string);
	}
}

if ( ! function_exists('url_decrypt'))
{
	function url_decrypt($encrypted_string) {
		$cryptKey  = 'qJB0rGtIn5UB1xG03efyCp'; 
	    $dirty = array("+", "/", "=");
	    $clean = array("p1uS", "s10Sh", "E0u01s");
		$iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
	    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
	    $string = base64_decode(str_replace($clean, $dirty, $encrypted_string));
	
	    $decrypted_string = mcrypt_decrypt(MCRYPT_BLOWFISH, $cryptKey,$string, MCRYPT_MODE_ECB, $iv);
	    return $decrypted_string;
	}
}

if ( ! function_exists('encrypt_decrypt'))
{
	function encrypt_decrypt($action, $string) {
	    $output = false;
		
		$dirty = array("+", "/", "=");
	    $clean = array("p1uS", "s10Sh", "E0u01s");
	
	    $encrypt_method = "AES-256-CBC";
	    $secret_key = 'qJB0rGtIn5UB1xG03efyCp';
		
		
	    $secret_iv = 'qJB0rGtIn5UB1xG03efyCp';
	   
	
	    // hash
	    $key = hash('sha256', $secret_key);
	    
	    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
	    $iv = substr(hash('sha256', $secret_iv), 0, 16);
	
	    if( $action == 'encrypt' ) {
	        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
	        $output = base64_encode($output);
	    }
	    else if( $action == 'decrypt' ){
	        $output = openssl_decrypt(base64_decode(str_replace($clean, $dirty, $string)), $encrypt_method, $key, 0, $iv);
	    }
	
		
	   // return $output;
		 return str_replace($dirty, $clean, $output);
	}
}

if ( ! function_exists('randomCode'))
{
    function randomCode($digits){
        if(isset($digits) && is_int($digits)){
            return str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
        }else{
            return FALSE;
        }
    }
 
}

if ( ! function_exists('rand_string'))
{
    function rand_string( $length ) {
        if(isset($length) && !empty($length)){
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            return substr(str_shuffle($chars),0,$length);
        }else{
            return FALSE;
        }
    }
 
}