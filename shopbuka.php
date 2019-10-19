<?php


if(!isset($_GET['url']))exit();

require_once 'functions.php';
require_once 'phpQuery.php';
$url = $_GET['url'];

$data = get_content($url);

$selector = 'body > div.body-bg > div > div > div > div.col-md-3.col-sm-4 > div.game-pay > div:nth-child(1) > div';

$doc = phpQuery::newDocument($data);

$answer = $doc->find($selector)->text();

echo $answer;
