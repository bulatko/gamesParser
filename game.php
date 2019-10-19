<?php


class game
{
private $mysqli;
public $id, $name;

    function __construct($mysqli, $id = null) {
        $this->mysqli=$mysqli;
        if ($id){
            $this->id = $id;

            $row = mysqli_fetch_row($this->mysqli->query("select game_name from games where game_id = '$id'"));
            $this->name = $row[0];
        }
    }
    public function create_game($game_name){

        $this->name = $game_name;
        $this->mysqli->query("insert into games values(0,'$game_name')");
        $row = mysqli_fetch_row($this->mysqli->query("select game_id from games order by game_id desc limit 1"));
        $this->id = $row[0];
    }
}