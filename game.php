<?php

require 'consts.php';

class game
{

    /** @var Mysqli $mysqli */
    private $mysqli;
    public $id, $name;

    function __construct($mysqli, $id = null)
    {
        $this->mysqli = $mysqli;
        if ($id) {
            $this->id = $id;

            $row = mysqli_fetch_row($this->mysqli->query("select game_name from games where game_id = '$id'"));
            $this->name = $row[0];
        }
    }

    public function create_game($game_name)
    {

        $this->name = $game_name;
        $this->mysqli->query("insert into games values(0,'$game_name')");
        $row = mysqli_fetch_row($this->mysqli->query("select game_id from games order by game_id desc limit 1"));
        $this->id = $row[0];
    }

    public function delete_game()
    {
        $id = $this->id;
        $this->mysqli->query("delete from games where game_id = $id");
    }

    public function get_links($order = 0)
    {
        $id = $this->id;
        if($order == 1)$order = 'cost';
        else $order = 'link_id';
        $q = $this->mysqli->query("select * from links where game_id = '$id' order by $order");
        $arr = [];
        while ($row = mysqli_fetch_array($q)) {
            $arr[] =
                [
                    'link_id' => $row[0],
                    'game_id' => $row[1],
                    'type' => $row[2],
                    'link' => $row[3],
                    'cost' => $row[4]
                ];
        }
        return $arr;
    }
}