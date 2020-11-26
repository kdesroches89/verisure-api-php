<?php
###############################################
##KDE 2020
################################################
#
include("config.php");

function call($http_method, $param, $get = array(), $post = array())
{
	$token = "IPH_________________________".$_SESSION["token"];


	if (!empty($get)) {
		$argum = '?' . http_build_query($get);
	}

	if (!empty($post)){
		$argum = "?request=".$param."&ID=".$token."&user=".LOGIN."&pwd=".PASSWD."&numinst=".INSTALL."&hash=".$_SESSION["HASH"]."";
	}


	$call = curl_init();
	curl_setopt($call, CURLOPT_VERBOSE, true);
	curl_setopt($call, CURLOPT_URL, URL . $argum);
	curl_setopt($call, CURLOPT_RETURNTRANSFER, true);

	if ($http_method == 'POST') {
		curl_setopt($call, CURLOPT_POST, true);
		curl_setopt($call, CURLOPT_POSTFIELDS, http_build_query($post));
	}


	$retour = curl_exec($call);
	$xml = simplexml_load_string($retour);
	return $xml;
}
?>
