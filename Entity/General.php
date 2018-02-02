<?php

include_once 'person.php';

class General extends Person {
    public $num_of_stars;

    public function create_years_of_experience() {
        $this->years_of_experience = mt_rand(10, 25);
    }

    public function create_num_of_stars() {
        $this->num_of_stars = mt_rand(1, 5);
    }

    public function calculate_damage_percentage() {
        // Add 0.5% per year of experience and 3% per star
        return $this->years_of_experience * 0.5 + $this->num_of_stars * 3;
    }
}

?>