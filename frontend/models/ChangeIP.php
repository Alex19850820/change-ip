<?php
/**
 * Created by PhpStorm.
 * User: Neo
 * Date: 19.09.2018
 * Time: 13:44
 */

namespace frontend\models;

use Yii;
use yii\base\Model;


class ChangeIP extends Model{
	
	public $url;
	public $proxy;
	
	public function rules()
	{
		return [
			[['url','proxy'], 'string']];
			
	}
	
	public function attributeLabels()
	{
		return [
			"url" => "Адресс сайта",
		];
	}
	
	public function newIP( $url, $proxy=NULL)
	{
		$uagent = "Opera/9.80 (Windows NT 6.1; WOW64) Presto/2.12.388 Version/12.14";
		
		
		$root = dirname(__FILE__) . '/file/';
		
		$ch = curl_init( $url );
		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);   // возвращает веб-страницу
		curl_setopt($ch, CURLOPT_HEADER, 0);           // не возвращает заголовки
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);   // переходит по редиректам
		curl_setopt($ch, CURLOPT_ENCODING, "");        // обрабатывает все кодировки
		curl_setopt($ch, CURLOPT_USERAGENT, $uagent);  // useragent
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 120); // таймаут соединения
		curl_setopt($ch, CURLOPT_TIMEOUT, 120);        // таймаут ответа
		curl_setopt($ch, CURLOPT_MAXREDIRS, 10);       // останавливаться после 10-ого редиректа (не много ли!?)
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

//		curl_setopt($ch, CURLOPT_COOKIEFILE, $root . "cookie_j_{$id}.txt");
//		curl_setopt($ch, CURLOPT_COOKIEJAR, $root . "cookie_f_{$id}.txt");
		
		if(isset($proxy)){
			curl_setopt($ch, CURLOPT_PROXY, $proxy);
		}
		
		$content = curl_exec( $ch );

//		$content = mb_convert_encoding($content,'HTML-ENTITIES','Windows-1251');
		$err     = curl_errno( $ch );
		$errmsg  = curl_error( $ch );
		$header  = curl_getinfo( $ch );
		curl_close( $ch );
		$header['errno']   = $err;
		$header['errmsg']  = $errmsg;
		$header['content'] = $content;

		return $header['content'];
	}
	
	public function randProxy() {
		$content = file(Yii::getAlias('@webroot/proxy/proxy'));
		$arr = [];
		foreach ($content as $string) {
			$arr[] = $string;
		}
		return $arr[rand(1, 12000)];
	}
}