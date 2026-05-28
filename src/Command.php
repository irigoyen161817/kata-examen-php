<?php

namespace Deg540\KataExamen;

class Command
{
    public function handle($instruction): string{
        $instruction = explode(" ", $instruction);
        return $instruction[1];
    }
}