<?php



if(!isset($_GET['url']))exit();

require_once 'functions.php';
require_once 'phpQuery.php';
$url = $_GET['url'];

$data = get_content($url);

$num = strpos($data,'PurchaseButton-price_');

echo $data."<BR>";


$doc = phpQuery::newDocument($data);

$answer = $doc->find($selector)->text();

//echo $answer;