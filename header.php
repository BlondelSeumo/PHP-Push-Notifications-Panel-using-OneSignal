<?php
session_start();
if(!isset($_SESSION['logged'])){
        header("Location: login.php");
        exit();
}
include 'allfunc.php'; 

?>
<!doctype html>
<html lang="en">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <meta charset="UTF-8">
    <title>OneSignal PHP Push Panel</title>

    <!--styles-->
	<link rel="stylesheet" type="text/css" href="./assets/datebuild/jquery.datetimepicker.css"/>
    <link rel="stylesheet" href="assets/styles/main.css">

    <!--scripts-->
    <script src="assets/scripts/jquery-1.12.2.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.5.7/basic/ckeditor.js"></script>
    <script src="assets/scripts/admin.js"></script>

	  <link rel="manifest" href="/manifest.json">
	  <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async></script>
	  <script>
		var OneSignal = window.OneSignal || [];
		OneSignal.push(["init", {
		  appId: "b599bc3a-5567-42f0-9ff0-1b13cd8c6fe7",
		  autoRegister: true,
		   welcomeNotification: {
				disable: true
			}
		}]);
		
		OneSignal.push(function() {
		  OneSignal.getUserId(function(userId) {
			console.log("OneSignal User ID:", userId);
			// (Output) OneSignal User ID: 270a35cd-4dda-4b3f-b04e-41d7463a2316    
		  $("#test").text(userId);
		  });
		 
		});
	  </script>

</head>
<body>
<!--navbar-->
<div class="navbar">
    <ul dropdown>
        <li>
            <a href="#">
                <span class="fa fa-home"></span>
                <span class="title">
                    OneSignal PHP Push Panel 
                </span>
            </a>
        </li>
 
       <li<?=($activePage == 'sendnotifi') ? ' class="active"':''; ?>>
            <a href="./sendnotifi.php">
                <span class="fa fa-plus"></span>
                <span class="title">Send Notification</span> 
            </a>
        </li>
    </ul>
</div>