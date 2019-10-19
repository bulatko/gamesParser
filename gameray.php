<?php

if(!isset($_GET['url']))exit();

require_once 'functions.php';
require_once 'phpQuery.php';
$url = $_GET['url'];

$data = get_content($url);

$selector = '#price_block_offer > div.pricing_content > div.pricing > strong > span:nth-child(1)';

$doc = phpQuery::newDocument($data);

$answer = $doc->find($selector)->text();

echo $answer . " Р";