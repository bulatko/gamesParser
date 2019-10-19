<?php
if(!isset($_GET['url']))exit();

require_once 'functions.php';
require_once 'phpQuery.php';
$url = $_GET['url'];

$data = get_content($url);

$selector = 'body > div:nth-child(5) > div.product-detail > div.product-main > div.specification > div.buy-zone > div.price';

$doc = phpQuery::newDocument($data);

$answer = $doc->find($selector)->text();
$answer = str_replace('c','Р',$answer);
echo $answer;