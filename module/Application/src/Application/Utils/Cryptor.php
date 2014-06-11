<?php
namespace Application\Utils;

use Zend\Crypt\BlockCipher;


class Cryptor
{

	protected  $keyphrase = '!dfb4DR3)>>Syh8a7g+O~~ftF874fg232vVc874fg23';


   	public function encrypt($field){
			$blockCipher = BlockCipher::factory('mcrypt', array('algo' => 'aes'));
			$blockCipher->setKey($this->keyphrase);
			$encrypted = $blockCipher->encrypt($field);
	return $encrypted;
}

	public function decrypt($field){
			$blockCipher = BlockCipher::factory('mcrypt', array('algo' => 'aes'));
			$blockCipher->setKey($this->keyphrase);
			$encrypted = $blockCipher->encrypt($field);
			$decrypted = $blockCipher->decrypt($field);
	return $decrypted;
	}



}