<?php
require_once("Defenseable.php");
require_once("Atackable.php");
class Armor extends Item implements Atackable, Defenseable {

    public function checkAvailability() :bool
    {
        return true;
    }

    public function attack(int $outcomingDamage) : int
    {
        return $outcomingDamage - 1;
    }

    public function defense(int $comingDamage, $weapon) : int
    {
        return $comingDamage - 3;
    }
}