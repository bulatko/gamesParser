<?php

if(!isset($_GET['url']))exit();

require_once 'functions.php';
require_once 'phpQuery.php';
$url = $_GET['url'];

$data = get_content($url);

$selector = 'body > div.page.page-game-view > div > div > div.main-wr > div > div > div.game-body__column.game-body__column--right > div > section.game-body__stationary.game-body__stationary--first > section.game-available > div.game-deal > div.game-deal__column > div.game-deal__col.game-deal__col--price > div > div > span';

$doc = phpQuery::newDocument($data);

$answer = $doc->find($selector)->text();

echo $answer;