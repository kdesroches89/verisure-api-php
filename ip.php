<?php
###############################################
#KDE 2020
###############################################
include("config.php");
if ((empty($_GET["ip"]))||(strstr($_GET["ip"],"192.168"))){
	echo "IP LOCAL";
	exit();
}else{
	$myip = file_get_contents("http://api.ipstack.com/".$_GET["ip"]."?access_key=".KEYIP."");
	$pit = json_decode($myip);
	echo $pit->city."(".$pit->zip.")<br>";
	echo $pit->location->capital."<br>";
	echo $pit->continent_name."(".$pit->country_name.")<br>";
	
	
}	


?>
