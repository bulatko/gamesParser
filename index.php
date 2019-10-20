<head>
    <link rel="stylesheet" type="text/css" href="index_class.css">
</head>
<script src="jquery-3.4.1.js"></script>
<script src="adder.js"></script>

<?php

require 'bd.php';
require 'game.php';
require 'consts.php';

if (!isset($_GET['game_id'])) {
    echo "<div class='add_div'><h3>Добавить игру</h3>" .
        "<input type = \"text\"  name = \"game_add_name\" id = \"game_add_name\" placeholder=\"Название игры\"> <button id='add_game_button'>Добавить</button> <br></div>";
    $q = $mysqli->query("select * from games limit 0,10");

    while ($row = mysqli_fetch_array($q)) {
        $game_id = $row[0];
        $game_name = $row[1];
        echo "<p class='game_name' game_id='$game_id'>$game_name</p>";
    }
} else {
    $game_id = $_GET['game_id'];
    $game = new game($mysqli, $game_id);
    $game_name = $game->name;
    echo "<h3>$game_name</h3>";
    $t = '';
    for ($i = 0; $i < count($PARSER); $i++) {
        $t .= "<option value='$i'>" . $PARSER[$i]['name'] . "</option>\n";
    }
    echo "<div class='add_div'><h3>Добавить ссылку</h3>" .
        "<input type = \"text\" id = \"link_add_name\" placeholder=\"Место для ссылки\">" .
        "<select id='choose_site' game_id='$game_id'>$t</select>" .
        " <button id='add_link_button'>Добавить</button> <br></div>";

    $links = $game->get_links(1);
    $k = 0;
    echo "<div id='links'>";
    foreach ($links as $link) {
        $k = 1;
        $link_id = $link['link_id'];
        $game_id = $link['game_id'];
        $type = $link['type'];
        $cost = $link['cost'];
        $link = $link['link'];
        $name = $PARSER[(int)$type]['name'];
        echo "<label><input type=\"checkbox\" name=\"cheks\" value=\"$link_id\"></label><a href='$link' target=\"_blank\" >$name</a> ($cost)<br>";
    }
    if($k)echo "<br><label><input type=\"checkbox\" id='super_checkbox' >Отметить все/снять выделение</label><br>" .
        "<br>" .
        "С отмеченными: <select>" .
        "<option value='1'>Удалить</option>" .
        "<option value='2'>Обновить</option>" .
        "</select> <button>OK</button>";
    echo "</div>";
}
