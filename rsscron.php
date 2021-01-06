<?php
$path = realpath(__DIR__);
$dbfile = 'last.db';

include $path.'/config.php';

date_default_timezone_set("Europe/Istanbul"); // set PDT
$x = simplexml_load_file($rssurl);

$file = 'last.db';

if(!is_file($file)){
    $contents = '';           // Some simple example content.
    file_put_contents($file, $contents);     // Save our content to the file.
}

class OneSignal{
	private $app_id;
	private $auth_key;
	private $api_logo;
	public function __construct($app_id, $auth_key, $api_logo){
		$this->app_id = $app_id;
		$this->auth_key = $auth_key;
		$this->api_logo = $api_logo;
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
}


$i = 1;
foreach ($x->channel->item as $item) {
  $reallink = readnow($dbfile);
 
  $title = $item->title;
  $guid = $item->link;
  $desc = $item->description;
  $postDate = $item->pubDate;
  
  if($reallink != base64_encode($guid)) {
	  PushOSNotification($title, $desc, $guid);
	  writenow($dbfile, $guid);
  } 
  if($i >= 1 ) { break; }
  $i++;
}

function writenow($file,$lnk) {
	$my_file = $file;
	$lnk64 = base64_encode($lnk);
	$myfile = file_put_contents($my_file, $lnk64 , LOCK_EX);
}

function readnow($file) {
	$my_file = $file;
	$handle = fopen($my_file, 'r');
	$data = '';
	if(filesize($my_file) > 0)
		$data = fread($handle,filesize($my_file));
	return $data;
	fclose($handle);
}

function PushOSNotification($title, $msg, $guid){

		$on = new OneSignal($app_id, $auth_key, $api_logo);

		$content = $msg;
		$url = $guid;
		$res = $on->sendMessage($title, $content, $url , $lang = 'en');

		$book = json_decode($res, true);
		print_r ($book['recipients']);
		
} 