<?php
$ok = "";
if(isset($_POST['save'])){

	$fname = "config.php";
	$fhandle = fopen($fname,"r");
	$content = fread($fhandle,filesize($fname));
	 
	$content = preg_replace("#app_id \= '(.*?)'#i", "app_id = '".$_POST['api_key']."'", $content);
	$content = preg_replace("#auth_key \= '(.*?)'#i", "auth_key = '".$_POST['auth_key']."'", $content);
	$content = preg_replace("#admin \= '(.*?)'#i", "admin = '".$_POST['admin']."'", $content);
	$content = preg_replace("#passw \= '(.*?)'#i", "passw = '".$_POST['password']."'", $content);
	$content = preg_replace("#api_logo \= '(.*?)'#i", "api_logo = '".$_POST['api_logo']."'", $content);

	$fhandle = fopen($fname,"w");
	fwrite($fhandle,$content);
	fclose($fhandle);
	if($fhandle) {
		$ok .= "<h3>   Changes saved.   </h3>";
	} else {
		$ok .= "<h3>Error with file</h3>";
	}

}
if(isset($_POST['rsssave'])){

	$fname = "config.php";
	$fhandle = fopen($fname,"r");
	$content = fread($fhandle,filesize($fname));
	 
	$content = preg_replace("#rssurl \= '(.*?)'#i", "rssurl = '".$_POST['rssurl']."'", $content);

	$fhandle = fopen($fname,"w");
	fwrite($fhandle,$content);
	fclose($fhandle);
	if($fhandle) {
		$ok .= "<h3>   Changes saved.   </h3>";
	} else {
		$ok .= "<h3>Error with file</h3>";
	}

}

include 'config.php';

$activePage = basename($_SERVER['PHP_SELF'], ".php");

function getDevices(){ 
		global $app_id;
		global $auth_key;
		
		$ch = curl_init(); 
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/players?app_id=" . $app_id); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 
												 'Authorization: Basic '.$auth_key.'')); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		$response = curl_exec($ch); 
		curl_close($ch); 
		$return = json_decode( $response, true); 
		$response = $return['total_count'];
  
		return $response; 
}


function showDevices($limit="30", $offset="1"){ 
		global $app_id;
		global $auth_key;
		
		$ch = curl_init(); 
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/players?app_id=" . $app_id ."&limit=".$limit."&offset=".$offset); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 
												 'Authorization: Basic '.$auth_key.'')); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		$response = curl_exec($ch); 
		curl_close($ch); 
		return $response; 
}


function oneNotifications($id){ 
		global $app_id;
		global $auth_key;
		
		$ch = curl_init(); 
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications/".$id."?app_id=" . $app_id); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 
												 'Authorization: Basic '.$auth_key.'')); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		$response = curl_exec($ch); 
		curl_close($ch); 
		return $response; 
}

function Notifications($limit = 50, $offset = 0){
		global $app_id;
		global $auth_key;
		
        $query = [
            'limit' => max(1, min(50, filter_var($limit, FILTER_VALIDATE_INT))),
            'offset' => max(0, filter_var($offset, FILTER_VALIDATE_INT)),
            'app_id' => $app_id,
        ];
		
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://onesignal.com/api/v1/notifications?view_notification_type=api&".http_build_query($query),
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
			"Authorization: Basic ".$auth_key."",
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		return $response;
    }
	

					
?>