<?php
	header("Content-type: application/json; charset=utf-8");
	if (!isset($_GET['ip'], $_GET['port'])) {
		die('{"error":"IP/Port not found!"}');
	}
	require 'data/license.class.php';
	$l = new License();
	if (!$l->hasLicense($_GET['ip'], $_GET['port'])) {
		die('{"error":"IP/Port no has a license!"}');
	}
	echo $l->getJSON();
?>