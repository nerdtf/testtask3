<?php
namespace Tournament;
require ('Warrior.php');
class Swordsman extends Warrior
{
    private $is_vicious;
    public function __construct(string $is_vicious = '')
    {
        parent::__construct();
        $this->weapon = 'sword';
        $this->hp = 100;
        $this->dmg = self::SWORD_DMG;
        $this->is_vicious = $is_vicious == 'Vicious';
    }

    public function attack(): int
    {
        $this->attacked_times++;
        $damage = parent::attack();
        if ($this->is_vicious && $this->attacked_times <= 2) {
            return $damage + 20;
        }
        return $damage;
    }

}
