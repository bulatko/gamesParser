<?php

if(!isset($_GET['url']))exit();

require_once 'functions.php';
require_once 'phpQuery.php';
$url = $_GET['url'];

$data = get_content($url);

$selector = 'body > main > div.product__main.container-fluid > div.product__content > div.product__right > div.product__header > div.product__cart-block > div.product__price-block > div.product__price > div.product__current-price';

$doc = phpQuery::newDocument($data);

$answer = $doc->find($selector)->text();

echo $answer;