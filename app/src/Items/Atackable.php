<?php
interface Atackable
{
    public function attack(int $outcomingDamage) : int;
}