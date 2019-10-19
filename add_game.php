<?php
require "bd.php";
$ret = ['status' => false];
if (!isset($_GET['game_name'])) {
    exit();
}
if (!$_GET['game_name']) {
    echo json_encode($ret);
    exit();
}

$game_name = $_GET['game_name'];

$game = new game($mysqli);
$game->create_game($game_name);

$game_id = $game->id;
$ret['status'] = true;
$ret['result'] = [
    'game_id' => $game_id,
    'game_name' => $game_name
];
echo json_encode($ret);

