<?php
require_once("Defenseable.php");
require_once("Item.php");
class Buckler extends Item implements Defenseable {

    private $cracked;

    public function __construct() {
        parent::__construct();
        $this->cracked = 0;
    }

    public function checkAvailability() :bool
    {
        if ($this->cracked == 3) {
            return false;
        }
        return true;
    }

    public function defense (int $comingDamage, $weapon) : int
    {
        if ($this->cracked < 4) {
            if ($this->on_user_times%2 == 0) {
                if ($weapon == 'axe') {
                $this->cracked++;
                }
                $comingDamage = 0;
            }

        }
        $this->on_user_times++;
        return $comingDamage;
    }
}