<?php

if(!isset($_GET['url']))exit();

require_once 'functions.php';

$url = $_GET['url'];

$data = get_content($url);

$selector = '#eprice';

$doc = phpQuery::newDocument($data);

$answer = $doc->find($selector)->text();

