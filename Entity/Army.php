<?php

class Army {
    public $general;
    public $soldiers = [];
    public $ground_level;   // Higher ground level gives an advantage
    public $base_damage;    // Only soldier damage
    public $damage;         // Added damage by other factors

    public function create_ground_level() {
        $this->ground_level = mt_rand(1, 5);
    }
}

?>