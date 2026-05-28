<?php

namespace Deg540\KataExamen;

class Command
{

    private array $command = [];
    private float  $totalPrice = 0;

    public function __construct(private Menu $menu)
    {
    }

    public function handle($instruction): string{
        $instruction = explode(" ", $instruction);
        $food = $instruction[1];
        $amount = 1;
        if(isset($instruction[2])){
            $amount = $instruction[2];
        }

        $price = $this->menu->getPrice($food);
        if(!isset($price)){
            return "El plato seleccionado no existe en el menú";
        }

        $this->totalPrice += $price * $amount;

        $this->command[$food] = $this->command[$food] + $amount;

        $fullCommand = [];
        forEach($this->command as $key => $value){
            $fullCommand[] = $key . " x" . $value;
        }
        return implode(", ",$fullCommand) . " | Total: " . number_format($this->totalPrice, 2);
    }
}