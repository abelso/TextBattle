<?php

include 'Controller/BattleController.php';

$army1_count = $_GET["army1"];
$army2_count = $_GET["army2"];

create_battle($army1_count, $army2_count);

?>