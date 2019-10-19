<?php

if(!isset($_GET['url']))exit();

require_once 'functions.php';
require_once 'phpQuery.php';
$url = $_GET['url'];

$data = get_content($url);

$selector1 = 'body > div.r-wrap > div.r-content-wrap > div > div > div:nth-child(2) > section > article > div.r-buy-wrap > div:nth-child(2)';


$selector = 'body > div.r-wrap > div.r-content-wrap > div > div > div:nth-child(2) > section > article > div.r-buy-wrap > div.r-prices > div';

$doc = phpQuery::newDocument($data);
if($doc->find($selector1)->text()=='нет в наличии'){
    $answer = '';
}
else
    $answer = $doc->find($selector)->text() . " Р";

echo $answer;