<?php


if(!isset($_GET['url']))exit();

require_once 'functions.php';
require_once 'phpQuery.php';
$url = $_GET['url'];

$data = get_content($url);

$selector = '#tygh_main_container > div.tygh-content.clearfix > div > div:nth-child(1) > div.span13.main-content-grid.product-details > div.product-main-info.ecl-detailed-page > div.clearfix.product-left-bar > div.product-info > div > div.product_detail_right_1 > form > div.prices-container.price-wrap.clearfix > div.product-info-counter > div.product-prices > p > span > span';

$doc = phpQuery::newDocument($data);

$answer = $doc->find($selector)->text();

echo $answer;