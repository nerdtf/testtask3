<?php
namespace Tournament;
class Highlander extends Warrior
{
    private $is_veteran;

    public function __construct(string $is_veteran = '') {
        parent::__construct();
        $this->weapon = 'sword';
        $this->hp = 150;
        $this->dmg = 12;
        $this->is_veteran = $is_veteran == 'Veteran';
    }

    public function attack(): int
    {
        $this->attacked_times++;
        $damage =  $this->attacked_times%3 == 0 ?  0 : parent::attack();
        if ($this->is_veteran && $this->hitPoints() < 45) {
            $damage *= 2;
        }
        return $damage;
    }
}