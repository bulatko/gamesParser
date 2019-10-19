<?php


if(!isset($_GET['url']))exit();

require_once 'functions.php';
require_once 'phpQuery.php';
$url = $_GET['url'];

$data = get_content($url);

$selector = '#base > div.view_product > div.singe_product_info > div.product_card_detail > div.product_card_buy > div.product_price.element__section.js-unwrap.js-wrap-2 > div > div.product_card_price > div.product_card_price_current > ins';

$doc = phpQuery::newDocument($data);

$answer = $doc->find($selector)->text();

echo $answer;
