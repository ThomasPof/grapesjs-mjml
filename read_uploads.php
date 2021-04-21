<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/";
$files = glob('uploads/*.{jpg,png,gif,jpeg}', GLOB_BRACE);

$gjs_assets = array();
foreach($files as $file) {

	$image = array();
	$image['type'] = "image";
	$image['src'] = $actual_link.$file;
	$image['unitDim'] = "px";
	$image['height'] = getimagesize($actual_link.$file)[0];
	$image['width'] = getimagesize($actual_link.$file)[1];
	array_push ($gjs_assets, $image);
}
echo json_encode($gjs_assets);
