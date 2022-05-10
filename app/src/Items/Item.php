<?php
abstract class Item
{
    protected $on_user_times;
    public function __construct()
    {
        $this->on_user_times = 0;
    }
    public function checkAvailability(){}

}