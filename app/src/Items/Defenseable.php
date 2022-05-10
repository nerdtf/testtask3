<?php
interface Defenseable
{
    public function defense(int $comingDamage, $weapon) :int;
}