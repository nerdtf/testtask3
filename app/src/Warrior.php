<?php
namespace Tournament;
use Atackable;
use Defenseable;
require_once("Items/Buckler.php");
require_once("Items/Armor.php");
abstract class Warrior {
    protected $hp;
    protected $dmg;
    protected $inventory;
    protected $weapon;
    protected $attacked_times;
    const AXE_DMG = 6;
    const SWORD_DMG = 5;


    public function __construct()
    {
        $this->inventory = [];
        $this->attacked_times = 0;
    }

    public function equip($name) :object
    {
        switch ($name) {
            case "buckler":
                $this->addToInventory(new \Buckler());
                break;
            case "armor":
                $this->addToInventory(new \Armor());
                break;
            case "axe":
                $this->weapon = $name;
                $this->dmg = self::AXE_DMG;
                break;
            case "sword":
                $this->weapon = $name;
                $this->dmg = self::SWORD_DMG;
                break;
        }
        return $this;
    }

    public function engage(Warrior $warrior)
    {
        while ($this->hitPoints() > 0 && $warrior->hitPoints() > 0) {
            $this->checkInventory();
            $warrior->checkInventory();

            $warrior->defend($this->attack(), $this->weapon);
            if ($warrior->hp > 0) {
                $this->defend($warrior->attack(), $warrior->weapon);
            }
        }
    }

    public function checkInventory()
    {
        foreach ($this->inventory as $key => $item){
            if (!$item->checkAvailability()){
                unset($this->inventory[$key]);
            }
        }
    }

    public function attack() :int
    {
        foreach($this->inventory as $item) {
            if ($item instanceof Atackable) {
                $damage = $item->attack($this->dmg);
            }
        }
        return $damage ?? $this->dmg;
    }

    public function defend(int $comingDamage, $weapon)
    {
        foreach($this->inventory as $item){
            if ($comingDamage > 0 && $item instanceof Defenseable) {
                $comingDamage = $item->defense($comingDamage, $weapon);
            }
        }
        $this->hp -= $comingDamage;
    }

    public function addToInventory(object $item)
    {
        in_array($item, $this->inventory) ?: array_push($this->inventory,$item);
    }

    public function hitPoints(): int
    {
        return max($this->hp, 0);
    }

}