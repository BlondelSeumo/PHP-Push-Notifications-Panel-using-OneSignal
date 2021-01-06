<?php
session_start();
if(!isset($_SESSION['logged'])){
        header("Location: login.php");
        exit();
}

ini_set("log_errors", 1);
ini_set("error_log", "./error.log");

include 'config.php';

class OneSignal{
	private $app_id;
	private $auth_key;
	private $api_logo;
	public function __construct($app_id, $auth_key, $api_logo){
		$this->app_id = $app_id;
		$this->auth_key = $auth_key;
		$this->api_logo = $api_logo;
	}
	
	public function singleMessage($title, $content, $url, $userid, $lang = 'en'){
		
		$content = array(
			$lang => $content,
		);
			
		$heading = array(
			$lang => $title,
		);
		
		$fields = array(
			'app_id' => $this->app_id,
			//'included_segments' => array('Active Users'),
			'include_player_ids' => array( $userid ),
			'contents' => $content,
			'url' => $url,
			'headings' => $heading,
			'chrome_web_icon' => $this->api_logo,
		);
		
		$headers = array(
			'Content-Type: application/json; charset=utf-8',
			'Authorization: Basic '.$this->auth_key,
		);
		
		$fields = json_encode($fields);

		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

		$response = curl_exec($ch);
		curl_close($ch);
		
		return $response;
	}	

	public function sendMessage($title, $content, $url, $lang = 'en'){
		
		$content = array(
			$lang => $content,
		);
			
		$heading = array(
			$lang => $title,
		);
		
		$fields = array(
			'app_id' => $this->app_id,
			'included_segments' => array('Active Users'),
			'contents' => $content,
			'url' => $url,
			'headings' => $heading,
			'chrome_web_icon' => $this->api_logo,
		);
		
		$headers = array(
			'Content-Type: application/json; charset=utf-8',
			'Authorization: Basic '.$this->auth_key,
		);
		
		$fields = json_encode($fields);

		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

		$response = curl_exec($ch);
		curl_close($ch);
		
		return $response;
	}	

	public function sendAfter($title, $content, $url, $sendaft, $lang = 'en'){
		
		$content = array(
			$lang => $content,
		);
			
		$heading = array(
			$lang => $title,
		);
		
		$fields = array(
			'app_id' => $this->app_id,
			'included_segments' => array('Active Users'),
			'contents' => $content,
			'url' => $url,
			'headings' => $heading,
			'chrome_web_icon' => $this->api_logo,
			'send_after' => $sendaft
		);
		
		$headers = array(
			'Content-Type: application/json; charset=utf-8',
			'Authorization: Basic '.$this->auth_key,
		);
		
		$fields = json_encode($fields);

		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

		$response = curl_exec($ch);
		curl_close($ch);
		
		return $response;
	}	
}

if(isset($_POST['send'])) {
	
		$on = new OneSignal($app_id, $auth_key, $api_logo);

		$title = $_POST['title'];
		$content = $_POST['content'];
		$url = $_POST['url'];
		$res = $on->sendMessage($title, $content, $url , $lang = 'en');

		$book = json_decode($res, true);
		echo $book['recipients'];
		
}
if(isset($_POST['single'])) {
	
		$on = new OneSignal($app_id, $auth_key, $api_logo);

		$title = $_POST['title'];
		$content = $_POST['content'];
		$url = $_POST['url'];
		$userid = $_POST['devicesid'];
		$res = $on->singleMessage($title, $content, $url, $userid, $lang = 'en');

		$book = json_decode($res, true);
		echo $book['recipients'];
		
}
if(isset($_POST['sendafter'])) {
	
		$on = new OneSignal($app_id, $auth_key, $api_logo);
		$sendaft = $_POST['send_after'];
		$title = $_POST['title'];
		$content = $_POST['content'];
		$url = $_POST['url'];
		$res = $on->sendAfter($title, $content, $url, $sendaft, $lang = 'en');

		$book = json_decode($res, true);
		echo $book['recipients'];
		
}