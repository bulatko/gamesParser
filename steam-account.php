<?php
if(!isset($_GET['url']))exit();

require_once 'functions.php';
require_once 'phpQuery.php';
$url = $_GET['url'];

$data = get_content($url);

$selector1 = '#item-content-section > div > div.full-item-block > div:nth-child(1) > div > div > div.col-12.col-lg.pt-1.pt-lg-0 > div > div > div.col-12.col-sm-auto > div > div.presense-info > span';


$selector = '#item-content-section > div > div.full-item-block > div:nth-child(1) > div > div > div.col-12.col-lg.pt-1.pt-lg-0 > div > div > div.col-12.col-sm-auto > div > div.sale-info > div.price-span.sale';

$doc = phpQuery::newDocument($data);
if($doc->find($selector1)->text()=='Нет в наличии'){
    $answer = '';
}
else
    $answer = $doc->find($selector)->text();

echo $answer;