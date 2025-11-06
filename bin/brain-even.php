#!/usr/bin/env php
<?php

use cli\Tree;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/Cli.php';

use function cli\line;
use function cli\prompt;
use function Saying\sayHello;


function ifEven($number) :bool
{
    if ($number % 2 === 0) {
        return true;
    } else {
        return false;
    }
}

function even()
{
    $random = rand(1, 20);
    line("Question: %d", $random);
    $otvet = prompt('Your answer');

    if (ifEven($random)) {
        if (($otvet === 'yes')) {
            line('Correct!');
            return true;
        } else {
            line("'no' is wrong answer ;(. Correct answer was 'yes'.");
            line("Let's try again, %s", $GLOBALS['global_name']);
            return false;
        }
    }

    if (!ifEven($random)) {
        if (($otvet === 'no')) {
            line('Correct!');
            return true;
        } else {
            line("'yes' is wrong answer ;(. Correct answer was 'no'.");
            line("Let's try again, %s", $GLOBALS['global_name']);
            return false;
        }
    }
}
// Начало игры
sayHello();
line('Answer "yes" if the number is even, otherwise answer "no".');
for($i = 0; $i < 3; $i++){
    if (even() === false) {
        $i = 22;
        break;
    } elseif ((even() === true) || ($i === 3)) {
        line("Congratulations, %s", $GLOBALS['global_name']);
        break;
    }

}