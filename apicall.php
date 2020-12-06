<?php
###############################################
###KDE 2020
#################################################
#
include("connect.php");

if ($mul == 1){
	$gret = call("GET",$_GET["act"], $post1,null);
	sleep(10);
	$ret = call("GET",$_GET["act"], $post2,null);

	if ($ret->RES == "WAIT"){
		echo "<div style='display:none'>WAIT</div><span>RETENTATIVE AUTOMATIQUE</span>";
		exit();
	}

	if ($ret->RES == "OK"){
		echo $ret->MSG;
		if (strstr($ret->MSG,"sactiv")){
			echo "<h2>[<strong><a href='#' alt='$ActiveAlarmComplete' onclick='caction(\"ARM\")'><font color='red'>$ActiveAlarmComplete</font></a></strong>]</h3>";
			echo "<h2>[<strong><a href='#' alt='$ActiveAlarmPartial' onclick='caction(\"ARMNIGHT\")'><font color='red'>$ActiveAlarmPartial</font></a></strong>]</h3>";
		}else{

			echo "<br><h2>[<a href='#' alt='$DesactiveAlarm' onclick='caction(\"DARM\")'><font color='red'><strong>$DesactiveAlarm</strong></font></a>]</h3>";
		}




	}else{
		echo "<div style='display:none'>WAIT</div>";
		echo "ERROR SYSTEM <br>".$ret->MSG;
		echo "<br><a href='#' alt='relancer' onclick='caction(\"".$_GET['act']."\")'><font color='red'>[ $Relaunch ]</font></a>";
		exit();
	}



	exit();
}

if ($envpost == 1){

	$ret = call("POST",$_GET["act"], null,$post);
	if ($ret->RES == "OK"){


		$iplist = explode(",",apache_getenv("HTTP_X_FORWARDED_FOR"));
		$myip = $iplist[0];


		include("head.php");

		echo "<body onload='action(\"EST\"); ip(\"".$myip."\")'>";

		echo "<center><h1> <font color='#FFF'>$TitreAlarm : ". $ret->INSTALLATION["alias"]."</font> </h1></center>";
		echo "<center><font color='#FFF'><center>$DesIP : ".$myip." (".gethostbyaddr($myip).")</font></center><br>";
		echo "<center><font color='#FFF'> <span id='local'></span></font></center><br>";
		echo "<br><br>";
		echo "<br><center><h3><font color='red'><span id='status'></span><span id='img'></span></font></h3> </center><br>";
		print '<center><font color="#FFF">:: <strong>'.$ListDetecteurMouv.'</strong> ::</font> <br><table width="100%" border="1" cellspacing="1" cellpadding="5">';

		foreach ($ret->INSTALLATION->DEVICES->DEVICE as $al){

			if (strstr($al["aliasType"],"image")){
				echo "<tr><td>";
				echo "<li><b> ".$al["alias"]." (".$al["aliasType"].")</b></li></td>";
				echo "<td> <center><a href='#".$al["idDev"]."' onclick='cimg(".$al["idDev"].")'><img src='img/pict.png'  alt='$ImgDemand' width='50' height='50'></a></center>";
				echo "</td></tr>";
			}

		}

		print '</table></center>';


		print '<br><center><font color="#FFF">:: <strong>'.$OtherDetector.'</strong> ::</font> <br><table width="100%" border="1" cellspacing="1" cellpadding="5">';

		foreach ($ret->INSTALLATION->DEVICES->DEVICE as $al){

			if (! strstr($al["aliasType"],"image")){
				echo "<tr><td>";
				echo "<li><b> ".$al["alias"]." (".$al["aliasType"].")</b></li></td>";
				echo "</td></tr>";
			}

		}

		print '</table></center>';


		echo "</body>";

	}else{
		echo "SYSTEM ERROR ".$ret->MSG;
		exit();
	}
}

if ($envget == 1){
	$ret = call("GET",$_GET["act"], $post,null);
	if ($ret->RES == "OK"){

		echo "<br><br>";

		if (($_GET["act"] == "IMG")||($_GET["act"] == "SRV")){

			if (!empty($ret->INSTALATION->INSTIBS)){
				$_SESSION["instibs"] = $ret->INSTALATION->INSTIBS;
				$balimg = str_replace("SRV","IMG",$_SERVER['QUERY_STRING']);
				sleep(5);
				$_SESSION["sim"] = $ret->INSTALATION->SIM;
				$_SESSION["timebox"] = $ret->INSTALATION->TIMEBOX;
			}

			$balimg = str_replace("IMG","INF",$_SERVER['QUERY_STRING']);
		}
	}else{
		echo "SYSTEM ERROR ".$ret->MSG;
		exit();
	}

}

unset($_SESSION["TAB"]);
unset($_SESSION["HASH"]);
unset($_SESSION["token"]);

?>
