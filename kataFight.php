<?php

class Fighter {
    public $name;
    public $health;
    public $strength;
    public $defense;

    public function __construct($name, $strength, $defense) {
        $this->name = $name;
        $this->health = 10; 
        $this->strength = $strength;
        $this->defense = $defense;
    }

    public function applyDamage($damage) {
        $this->health -= $damage;
        if ($this->health < 0) {
            $this->health = 0;
        }
    }

}

function battle ($fighter1, $fighter2) {
    while ($fighter1->health > 0 && $fighter2->health > 0) {
        $chance = mt_rand(1, 100); 

        if ($fighter1->strength == $fighter2->strength) {
            if ($chance <= 50) {
                $attacker = $fighter1;
                $defender = $fighter2;
            } else {
                $attacker = $fighter2;
                $defender = $fighter1;
            }
        } elseif ($fighter1->strength > $fighter2->strength) {
            if ($chance <= 70) {
                $attacker = $fighter1;
                $defender = $fighter2;
            } else {
                $attacker = $fighter2;
                $defender = $fighter1;
            }
        } else { 
            if ($chance <= 70) {
                $attacker = $fighter2;
                $defender = $fighter1;
            } else {
                $attacker = $fighter1;
                $defender = $fighter2;
            }
        }

        $damage = max(1, $attacker->strength - $defender->defense);
        $defender->applyDamage($damage);
        echo $attacker->name . " ataca " . $defender->name . " i li fa " . $damage . " de dany. <br>";

        if ($fighter1->health <= 0) {
            echo "El guanyador es $fighter2->name \n";
            return;
        } elseif ($fighter2->health <= 0) {
            echo "El guanyador es $fighter1->name \n";
            return;
        }
    }
}

$fighter1 = new Fighter("Joan", 10, 3);
$fighter2 = new Fighter("Adria", 10, 5);

battle($fighter1, $fighter2);