<?php

require "bd.php";
require "game.php";
require 'consts.php';


if (!(isset($_GET['link'])&&$_GET['link']&&isset($_GET['game_id'])&&isset($_GET['type']))) {

    $game_id = $_GET['game_id'];
    $type = $_GET['type'];
    $link = $_GET['link'];
    echo 'error\n' .
        "$game_id\n" .
        "$type\n" .
        "$link";
    exit();
}

$game_id = $_GET['game_id'];
$type = $_GET['type'];
$link = $_GET['link'];
$cost = file_get_contents($MAIN_URL . $PARSER[$type]['file'] . "?url=$link");
$mysqli->query("insert into links values(0,$game_id,$type,'$link','$cost')");
echo "ok";
