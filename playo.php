<?php

if(!isset($_GET['url']))exit();

require_once 'functions.php';
require_once 'phpQuery.php';
$url = $_GET['url'];

$data = get_content($url);

$selector = 'body > div.overfl > div.wrapper.on_item > div.content > div.main > div > div.right_col > div > div.price_bl > span.price';

$doc = phpQuery::newDocument($data);

$answer = $doc->find($selector)->text();
if (is_numeric(clearStr($answer)))
echo $answer." Р";