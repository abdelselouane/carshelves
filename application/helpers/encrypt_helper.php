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