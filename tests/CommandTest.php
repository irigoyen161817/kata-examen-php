<?php

namespace Deg540\KataExamen\Test;

use Deg540\KataExamen\Command;
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

    /**
     * @test
     */
    public function givenAddPizzaWithAmountReturnsPizzaXAmount(): void{
        $command = new Command();

        $result = $command->handle("añadir pizza 2");

        $this->assertEquals("pizza x2", $result);
    }

    public function givenMultipleAddInstructionsReturnsFullCommand(): void{
        $command = new Command();

        $command->handle("añadir chistorra");
        $result = $command->handle("añadir pizza");

        $this->assertEquals("chistorra x1, pizza x1", $result);

    }

}