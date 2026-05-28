<?php

namespace Deg540\KataExamen;

interface Menu
{
    public function getPrice(string $dish): ?float;
}