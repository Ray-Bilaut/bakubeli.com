<?php
// Loading Config Web
$site = $this->model_config->listing();
?>
<!doctype html>
<html lang="en">
	<head>
	<title><?=$title?></title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="theme-color" content="#ffcc00">
	<meta name="msapplication-navbutton-color" content="#ffcc00">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="#ffcc00">
	<!-- SEO Google -->
	<meta name="keywords" content="<?=$site->keywords?>">
	<meta name="description" content="<?=$title?>, <?=$site->description?>">
<!-- ===================================================================================================== -->
	<link rel="icon" type="image/png" href="<?=base_url('assets/upload/image/' . $site->icon);?>" width="100%"/>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?=base_url()?>/assets/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<!-- font-awesome -->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/css/style.css">
	</head>
<body>
