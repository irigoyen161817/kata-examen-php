<?php

namespace Deg540\KataExamen;

class Command
{
    public function handle($instruction): string{
        $instruction = explode(" ", $instruction);

        if(isset($instruction[2])){
            return $instruction[1] . " x$instruction[2]";
        }
        return $instruction[1];
    }
}