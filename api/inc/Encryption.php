<?php
namespace project;

class Encryption
{

    private $method;
    private $secret_key;
    private $secret_iv;
    private $key;
    private $iv;


    function __construct()
    {

        $this->method = "AES-256-CBC";
        $this->secret_key = "4DV4NC3DK3Y1";

        $this->key = hash('sha256', $this->secret_key);
        //$this->iv = substr(hash('sha256', $this->secret_iv), 0, 16);
        $this->iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($this->method));

    }

    public function safe_b64encode($string)
    {
        $data = base64_encode($string);
        $data = str_replace(array('+', '/', '='), array('-', '_', ''), $data);
        return $data;
    }

    public function safe_b64decode($string)
    {
        $data = str_replace(array('-', '_'), array('+', '/'), $string);
        $mod4 = strlen($data) % 4;
        if ($mod4) {
            $data .= substr('====', $mod4);
        }
        return base64_decode($data);
    }

    public function encode($string)
    {
        $output = openssl_encrypt($string, $this->method, $this->key, 0, $this->iv);
        return $this->safe_b64encode($output. '::' . $this->iv);
    }

    public function decode($string)
    {
        // To decrypt, split the encrypted data from our IV - our unique separator used was "::"
        list($encrypted_data, $this->iv) = explode('::', $this->safe_b64decode($string), 2);
        return openssl_decrypt($encrypted_data, $this->method, $this->key, 0, $this->iv);
    }
}
