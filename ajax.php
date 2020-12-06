<!--
###############################################
###KDE 2020
#################################################
#-->

<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.ui.js"></script>
<script language="javascript">

function action(act){
	document.getElementById("status").innerHTML ='<img src="img/chart.gif" width="200" height="200">';

	$.get(
		'apicall.php',
	{act: act},
	function(data){

		var res=data;
		var position = res.search("WAIT"); 
		if (position == "-1"){
			document.getElementById("status").innerHTML ='<pre>' + res + '</pre><br>';
		}else{
			action("EST");
		}
	}
);
}


function img(device){
	document.getElementById("img").innerHTML ='<img src="img/chart.gif" width="50" height="50">';

	$.get(
		'img.php',
	{act: "SRV",device: device},
	function(data){

		var res=data;
		//alert(res);

		document.getElementById("img").innerHTML ='<pre>' + res + '</pre><br>';
		//alert("ok");

	}
);
}



function ip(act){
	document.getElementById("local").innerHTML ='<img src="img/chart.gif" width="50" height="50">';

	$.get(
		'ip.php',
	{ip: act},
	function(data){

		var res=data;

		document.getElementById("local").innerHTML ='<pre>' + res + '</pre><br>';

	}
);
}


function caction(act){

	if (act == "ARM"){
		var typealarm = "<?php echo strtolower($ActiveAlarmComplete); ?>";
	}

	if (act == "DARM"){
		var typealarm = "<?php echo strtolower($DesactiveAlarm); ?>";
	}

	if (act == "ARMNIGHT"){
		var typealarm = "<?php echo strtolower($ActiveAlarmPartial); ?>";
	}       
	if (confirm("<?php echo $DemandAct; ?> " + typealarm + ' ?')) {
		action(act);
	}
}

function cimg(act){

	if (confirm('<?php echo $DemandAct . " ". strtolower($ImgDemand) ?> ?')) {
		img(act);
	}
}


</script>
