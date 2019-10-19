


<script src="jquery-3.4.1.js"></script>
<script src="adder.js"></script>

<?php

require_once 'bd.php';
echo "<h3>Добавить игру</h3><input type = \"text\"  name = \"game_add_name\" id = \"game_add_name\" value =  \"Введите название игры\"> <br>" .
    "<button id='add_game_button'>Добавить</button> <br>";
$q = $mysqli->query("select * from games limit 0,10");

while($row = mysqli_fetch_array($q)){
    $game_id = $row[0];
    $game_name = $row[1];
    echo "<br>" .
        "<p class='game_name' game_id='$game_id'>$game_name</p>" .
        "<br>" .
        "<div id='links_container' game_id='$game_id'></div>" .
        "<br>";
}
