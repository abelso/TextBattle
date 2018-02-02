<?php

require(dirname(__FILE__).'/../Entity/Army.php');
require(dirname(__FILE__).'/../Entity/Soldier.php');
require(dirname(__FILE__).'/../Entity/General.php');

function create_battle($army1_count, $army2_count) {
    $army1 = create_army($army1_count);
    $army2 = create_army($army2_count);
    
    // Print results
    if ($army1->damage > $army2->damage) {
        echo "army1 has won.\n\n";

        echo $army1->damage . " > " . $army2->damage . "\n\n";

        print_reasons($army1, $army2);

    } else if ($army2->damage > $army1->damage) {
        echo "army2 has won.\n\n";

        echo $army2->damage . " > " . $army1->damage . "\n\n";
        
        print_reasons($army2, $army1);

    } else {
        echo "IT'S A TIE!";
    }
}

function create_army($army_count) {
    $army = new Army();
    $army->create_ground_level();

    $army->soldiers = create_soldiers($army_count);

    $army->general = new General();
    $army->general->create_years_of_experience();
    $army->general->create_num_of_stars();

    $army->base_damage = calculate_base_damage($army);

    $army->damage = calculate_damage($army);

    return $army;
}

function create_soldiers($army_count) {
    $soldiers = [];

    for ($i = 0; $i < $army_count; $i++) {
        $soldier = new Soldier();
        $soldier->create_years_of_experience();

        array_push($soldiers, $soldier);
    }

    return $soldiers;
}

// Calculate damage only by soldiers
function calculate_base_damage($army) {
    $base_damage = 0;

    foreach ($army->soldiers as &$soldier) {
        $base_damage += $soldier->calculate_soldier_damage();
    }

    return $base_damage;
}

// Calculate end damage by adding general's experience and ground level
function calculate_damage($army) {
    $added_percentage = $army->general->calculate_damage_percentage() + $army->ground_level;

    return $army->base_damage + $army->base_damage * $added_percentage / 100;
}

function print_reasons($winning_army, $losing_army) {
    echo "REASONS:\n";
    
    if ($winning_army->base_damage > $losing_army->base_damage) {
        echo "Higher base damage!\n";
    }
    if ($winning_army->general->calculate_damage_percentage() > $losing_army->general->calculate_damage_percentage()) {
        echo "More experienced general!\n";
    }
    if ($winning_army->ground_level > $losing_army->ground_level) {
        echo "Higher ground level!";
    }
}

?>