#!/usr/bin/env php
<?php

use cli\Tree;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/Cli.php';

use function cli\line;
use function cli\prompt;
use function Saying\sayHello;


function brCalck() {
    $randomEx = rand(0, 2);
    $random1 = rand(0, 10);
    $random2 = rand(0, 10);
    $extru = "+-*";
    $extru = $extru[$randomEx];
    $plusis = 0;
    if ($extru === "+") {
        $plusis = $random1 + $random2;
    } elseif ($extru === "-"){
        $plusis = $random1 - $random2;
    } elseif ($extru === "*"){
        $plusis = $random1 * $random2;
    }
    line("Question: %d %s %d", $random1, $extru, $random2);
    $otvet = prompt("Your answer");
    if ((int)$otvet === $plusis) {
        line("Correct!");
        return true;
    } else {
        line("'%d' is wrong answer ;(. Correct answer was '%d'.", $otvet, $plusis);
        return false;   
    }

}

// Начало игры
sayHello();
line('What is the result of the expression?');
$correct = 0;
for($i = 0; $i < 3; $i++){
    if (brCalck() === false) {
        $i = 22;
        break;
    } else {
        $correct++;
    }

    if ($correct === 3) {
        line("Congratulations, %s", $GLOBALS['global_name']);
        break;
    }
}