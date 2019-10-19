<?php

if(!isset($_GET['url']))exit();

require_once 'functions.php';
require_once 'phpQuery.php';
$url = $_GET['url'];

$data = get_content($url);

$selector = 'body > div.page-wrap > div.catalog-detail > div.detail-right.container-detail-js_36331 > ' .
    'div.price.detail-right__price > div > div.price__val';
$doc = phpQuery::newDocument($data);

$answer = $doc->find($selector)->text();

echo $answer;