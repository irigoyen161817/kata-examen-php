<?php

namespace Deg540\KataExamen\Test;

use MongoDB\Driver\Command;
use PHPUnit\Framework\TestCase;

class CommandTest extends TestCase
{
    /**
     * @test
     */
    public function givenAddPizzaReturnsPizza(): void{
        $command = new Command();

        $result = $command->handle("añadir pizza");

        $this->assertEquals("pizza", $result);
    }

}