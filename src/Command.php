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
        $instruction = strtolower($instruction);
        $instruction = explode(" ", $instruction);
        $action = $instruction[0];
        $food = $instruction[1];
        if($action == "añadir"){
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

        }

        if($action == "eliminar"){
            $price = $this->menu->getPrice($food);
            $amount = $this->command[$food];
            $totalToSubstract = $price * $amount;
            unset($this->command[$food]);
            $this->totalPrice -= $totalToSubstract;
            $fullCommand = [];
            forEach($this->command as $key => $value){
                $fullCommand[] = $key . " x" . $value;
            }
            return implode(", ",$fullCommand);
        }
        if($action == "vaciar"){
            $this->command = [];
        }

        if(empty($this->command)){
            return "La comanda ha sido vaciada";
        }

        $fullCommand = [];
        forEach($this->command as $key => $value){
            $fullCommand[] = $key . " x" . $value;
        }
        $commandResult = implode(", ",$fullCommand);
        if($action == "eliminar"){
            $commandResult .= " | Total: " . number_format($this->totalPrice, 2);
        }
        return $commandResult;
    }
}