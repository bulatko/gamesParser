<?php

if(!isset($_GET['url']))exit();

require_once 'functions.php';
require_once 'phpQuery.php';
$url = $_GET['url'];

$data = get_content($url);

$selector = 'body > div.wrapper > div.container > div.product-wrap > div.product-main > div.product-main__foot > div > div.product-price__cost';

$doc = phpQuery::newDocument($data);

$answer = $doc->find($selector)->text();

echo $answer;
