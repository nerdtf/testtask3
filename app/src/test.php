<?php
namespace Tournament;
require('Swordsman.php');
require('Highlander.php');
require('Viking.php');
$swordsman = (new Swordsman("Vicious"))
    ->equip("axe")
    ->equip("buckler")
    ->equip("armor");

$highlander = new Highlander("Veteran");

$swordsman->engage($highlander);
echo $swordsman->hitPoints() . PHP_EOL;
echo $highlander->hitPoints();
//echo $highlander->hitPoints();




