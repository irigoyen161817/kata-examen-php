<?php

namespace Deg540\KataExamen;

class Command
{
    private array $command = [];
    public function handle($instruction): string{
        $instruction = explode(" ", $instruction);
        $food = $instruction[1];
        $amount = 1;
        if(isset($instruction[2])){
            $amount = $instruction[2];
        }

        $this->command[$food] = $this->command[$food] + $amount;

        $fullCommand = [];
        forEach($this->command as $key => $value){
            $fullCommand[] = $key . " x" . $value;
        }
        return implode(", ",$fullCommand);
    }
}