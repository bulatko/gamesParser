<?php

require 'bd.php';
require 'consts.php';

if(!(isset($_GET['link_id'])&&isset($_GET['action'])))exit();

$link_id = $_GET['link_id'];
$action = $_GET['action'];

if($action == 1){
    $mysqli->query("delete from links where link_id='$link_id'");
} else if($action == 2){
    $row = mysqli_fetch_row($mysqli->query("select link,type from links where link_id = $link_id"));
    $link = $row[0];
    $type = $row[1];
    $cost = file_get_contents($MAIN_URL . $PARSER[$type]['file'] . "?url=$link");

}