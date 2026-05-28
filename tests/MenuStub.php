<?php

namespace Deg540\KataExamen\Test;

use Deg540\KataExamen\Menu;

class MenuStub implements Menu
{
    public function getPrice(string $dish): ?float{
        return 10;
    }
}