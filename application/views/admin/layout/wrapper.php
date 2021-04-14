<?php 

// PROTEKSI HALAMAN LOGIN
$this->simple_login->auth_check();
// TOTAL PRODUCTm
$total = $this->model_config->countRow();
// logo
$img = $this->model_config->listing();
// ALL LAYOUT ADMIN PAGE
require_once('head.php');
require_once('header.php');
require_once('nav.php');
require_once('content.php');
require_once('footer.php');