<?php


if(!isset($_GET['url']))exit();

require_once 'functions.php';
require_once 'phpQuery.php';
$url = $_GET['url'];

$data = get_content($url);

$selector1 = '#game_area_purchase > div.game_area_purchase_game_wrapper > div > div.game_purchase_action > div > div.discount_block.game_purchase_discount > div.discount_prices > div.discount_final_price';

$selector2 = '#game_area_purchase > div.game_area_purchase_game_wrapper > div > div.game_purchase_action > div > div.game_purchase_price.price';

$doc = phpQuery::newDocument($data);

if($doc->find($selector1)){
    $answer = $doc->find($selector1)->text();
} else
    $answer = $doc->find($selector2)->text();


echo $answer;