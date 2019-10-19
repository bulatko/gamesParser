<?php
require_once 'consts.php';


class link
{

    /** @var Mysqli $mysqli */
    private $mysqli;
    public $id, $game_id, $type, $link, $cost;

    function __construct($mysqli, $id = null, $game_id = null, $type = null, $link = null)
    {
        $this->mysqli = $mysqli;
        if ($id) {
            $this->id = $id;
            $row = mysqli_fetch_row($this->mysqli->query("select * from links where link_id = '$id'"));
            $this->game_id = $row[1];
            $this->type = $row[2];
            $this->link = $row[3];
            $this->cost = $row[4];
        } else {
            $this->game_id = $game_id;
            $this->type = $type;
            $this->link = $link;
            $cost = file_get_contents($MAIN_URL.$PARSER[$this->type]);
            $this->mysqli->query("insert into links values(0,'$game_id','$type','$link','$cost')");
            $id = mysqli_fetch_row($this->mysqli->query("select link_id from links order by link_id desc"))[0];
            $this->id = $id;
        }
    }

}