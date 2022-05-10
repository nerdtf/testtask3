<?php
namespace Tournament;
class Viking extends Warrior
{
    public function __construct() {
        parent::__construct();
        $this->weapon = 'axe';
        $this->hp = 120;
        $this->dmg = self::AXE_DMG;
    }
}