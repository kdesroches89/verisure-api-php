<?php
###############################################
##KDE 2020
################################################
#
session_start();
include("config.php");
include("connect.php");


function img($argum){

	$callimg = curl_init();
	curl_setopt($callimg, CURLOPT_URL, URL ."?". $argum);
	curl_setopt($callimg, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $token, 'X-Pretty-JSON: 1'));
	curl_setopt($callimg, CURLOPT_RETURNTRANSFER, true);
	$retor = curl_exec($callimg);
	$xmlret = simplexml_load_string($retor);
	return $xmlret;
}                                 


$ret = call("GET","SRV", $post,null);

echo "<br><br>";


$instibs = $ret->INSTALATION->INSTIBS;

$balimg = str_replace("act","request",$_SERVER['QUERY_STRING']);
$balimg = str_replace("SRV","IMG1",$balimg);

$retimg = img($balimg."&ID=IPH_________________________".$_SESSION["token"]."&panel=SDVFAST&callby=AND_61&Country=FR&lang=fr&idservice=1&numinst=".INSTALL."&user=".LOGIN."&pwd=".PASSWD."&hash=".$_SESSION["HASH"]."&instibs=".$instibs."");


sleep(5);

$balimg = str_replace("IMG1","IMG2",$balimg);

$retimgn = img($balimg."&ID=IPH_________________________".$_SESSION["token"]."&panel=SDVFAST&callby=AND_61&Country=FR&lang=fr&idservice=1&numinst=".INSTALL."&user=".LOGIN."&pwd=".PASSWD."&hash=".$_SESSION["HASH"]."&instibs=".$instibs."");


sleep(60);


$balimg = str_replace("IMG2","ACT_V2",$balimg);


$retimgact = img($balimg."&ID=IPH_________________________".$_SESSION["token"]."&panel=SDVFAST&callby=AND_61&Country=FR&lang=fr&idservice=1&numinst=".INSTALL."&user=".LOGIN."&pwd=".PASSWD."&hash=".$_SESSION["HASH"]."&instibs=".$instibs."&timefilter=3&activityfilter=0");

if ($retimgact->RES == "OK"){
	echo "Les images ont été tranmise par mail";
	echo $retimgact->MSG;
}else{
	echo "Une erreur est survenue : ".$retimgact->MSG."";
}

?>
