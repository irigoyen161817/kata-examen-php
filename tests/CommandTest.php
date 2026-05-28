<?php

namespace Deg540\KataExamen\Test;

use Deg540\KataExamen\Command;
use Deg540\KataExamen\Menu;
use Mockery;
use PHPUnit\Framework\TestCase;

class CommandTest extends TestCase
{
    /**
     * @test
     */
    public function givenAddPizzaWithAmountReturnsPizzaXAmount(): void{
        $command = new Command(new MenuStub());

        $result = $command->handle("añadir pizza 2");

        $this->assertEquals("pizza x2 | Total: 20.00", $result);
    }

    /**
     * @test
     */
    public function givenInstructionWithRandomCapitalLettersDoesntAffect(): void{
        $command = new Command(new MenuStub());

        $result = $command->handle("AñAdIr PiZzA");

        $this->assertEquals("pizza x1 | Total: 10.00", $result);
    }

    /**
     * @test
     */
    public function givenMultipleAddInstructionsReturnsFullCommand(): void{
        $command = new Command(new MenuStub());

        $command->handle("añadir chistorra");
        $result = $command->handle("añadir pizza");

        $this->assertEquals("chistorra x1, pizza x1 | Total: 20.00", $result);

    }

    /**
     * @test
     */
    public function givenNonExistantFoodInMenuReturnErrorMessage(): void{
        $menuMock = Mockery::mock(Menu::class);
        $command = new Command($menuMock);

        $menuMock->shouldReceive("getPrice")->with("chistorra")->andReturn(null);

        $result = $command->handle("añadir chistorra");

        $this->assertEquals("El plato seleccionado no existe en el menú", $result);
    }

    /**
     * @test
     */
    public function givenAddInstructionReturnsCommandWithTotalPrice(): void{
        $command = new Command(new MenuStub());

        $result = $command->handle("añadir pizza");

        $this->assertEquals("pizza x1 | Total: 10.00", $result);
    }

    /**
     * @test
     */
    public function givenDeleteInstructionDeletesFoodFromCommand(): void{
        $command = new Command(new MenuStub());

        $command->handle("añadir pizza");
        $command->handle("añadir chistorra");

        $result = $command->handle("eliminar pizza");
        $this->assertEquals("chistorra x1 | Total: 10.00", $result);
    }

}