<?php

include_once 'person.php';

class Soldier extends Person {
    public $damage_points = 100;    // Base damage points

    public function create_years_of_experience() {
        $this->years_of_experience = mt_rand (1, 5);
    }

    public function calculate_soldier_damage() {
        // Add 1% for each year of experience
        return $this->damage_points + $this->damage_points * $this->years_of_experience / 100;
    }
}

?>