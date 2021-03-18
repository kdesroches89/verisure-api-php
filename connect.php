<?php
###############################################
##KDE 2020
################################################
#
session_start();
include("function.api.php");
include("auth.php");
ini_get('register_globals');
if (LANG == "en"){
	define("REGION","GB");
}else{
	define("REGION",strtoupper(LANG));
}

$_SESSION["TAB"] = array();
if (!isset($_SESSION["HASH"])){
	$_SESSION["TAB"] = $_SESSION["HASH"];


	$datetime = strftime(date("YmdHis"));
	$token = "vericlient".$datetime;
	$_SESSION["token"] = $token;

	$getLog = array(
		'request' => "LOGIN",
		'ID' =>  "AND_________________________".$_SESSION["token"],
		'Country' => REGION,
		'lang' => LANG,
		'CALLBY' => 'AND_61',
		'user' => LOGIN,
		'pwd' => PASSWD,
		'numinst' => INSTALL
	);


	$hashret = call("GET","LOGIN", $getLog,null);
	$reponse = $hashret->RES;
	$errcode = $hashret->ERR;
	$message = $hashret->MSG;
	$hash = $hashret->HASH;


	if (!empty($errcode)){
		if ($errcode == "60057"){
			echo "<h1>Check the language of your country</h1><br>";
		}
		echo "<br>ERROR SYSTEM : $message";
	}

	if ($reponse == "OK"){
		$_SESSION["HASH"] = $hash;
	}else{
		echo "<br>Hash Error<br>";
	}
}else{
	echo "NO";
}

if (strstr($_GET["act"],"ACT_V2")){
	$envget = 1;
	$ids = $_GET["ids"];
	$post = array(
		'request' => $_GET["act"].$_GET["ids"],
		'ID' => $_GET["ID"],
		'Country' => REGION,
		'lang' => LANG,
		//'panel' => 'SDVFAST',
		'CALLBY' => 'AND_61',
		'user' => LOGIN,
		'idservice' => "1",
		'instibs' => $_GET["instibs"],
		'device' => $_GET["device"],
		'pwd' => PASSWD,
		'numinst' => INSTALL,
		#'hash' => trim($_SESSION["HASH"])
		'hash' => $_GET["hash"]
	);

}


if (strstr($_GET["act"],"IMG")){

	$envget = 1;
	$ids = $_GET["ids"];
	$post = array(
		'request' => $_GET["act"].$_GET["ids"],
		'ID' => $_GET["ID"],
		'Country' => REGION,
		'lang' => LANG,
		'panel' => 'SDVFAST',
		'CALLBY' => 'AND_61',
		'user' => LOGIN,
		'idservice' => "1",
		'instibs' => $_GET["instibs"],
		'device' => $_GET["device"],
		'pwd' => PASSWD,
		'numinst' => INSTALL,
		'hash' => $_GET["hash"]
	);

}



if ((strstr($_GET["act"],"SRV"))||(strstr($_GET["act"],"INF"))){

	$envget = 1;
	$post = array(
		'request' => $_GET["act"],
		'ID' =>  "AND_________________________".$_SESSION["token"],
		'Country' => REGION,
		'lang' => LANG,
		'panel' => 'SDVFAST',
		'CALLBY' => 'AND_61',
		'user' => LOGIN,
		'pwd' => PASSWD,
		'numinst' => INSTALL,
		'hash' => trim($_SESSION["HASH"])
	);

}

sleep(5);

if ((strstr($_GET["act"],"EST"))||(strstr($_GET["act"],"ARM"))||(strstr($_GET["act"],"DARM"))||(strstr($_GET["act"],"ARMDAY"))||(strstr($_GET["act"],"ARMNIGHT"))){

	#echo $_SESSION["HASH"];
	$mul = 1;
	$post1 = array(
		'request' => $_GET["act"]."1",
		'ID' =>  "AND_________________________".$_SESSION["token"],
		'Country' => REGION,
		'lang' => LANG,
		'panel' => 'SDVFAST',
		'callby' => 'AND_61',
		'user' => LOGIN,
		'pwd' => PASSWD,
		'numinst' => INSTALL,
		'hash' => trim($_SESSION["HASH"])
	);

	$post2 = array(
		'request' => $_GET["act"]."2",
		'ID' =>  "AND_________________________".$_SESSION["token"],
		'Country' => REGION,
		'lang' => LANG,
		'panel' => 'SDVFAST',
		'callby' => 'AND_61',
		'user' => LOGIN,
		'pwd' => PASSWD,
		'numinst' => INSTALL,
		'hash' => trim($_SESSION["HASH"])
	);

}

if ((strstr($_GET["act"],"MYINSTALLATION"))||($index==1)){
	$get = "MYINSTALLATION";
	$envpost = 1;
	$post = array(
		'request' => $get,
		'ID' =>  "AND_________________________".$_SESSION["token"],
		'Country' => REGION,
		'lang' => LANG,
		//'panel' => 'SDVFAST',
		'CALLBY' => 'AND_61',
		'user' => LOGIN,
		'pwd' => PASSWD,
		'numinst' => INSTALL,
		'hash' => trim($_SESSION["HASH"])
	);

}

?>
