#!/usr/bin/env php
<?php

use cli\Tree;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/Cli.php';

use function cli\line;
use function cli\prompt;
use function Saying\sayHello;


function gcd($a, $b)
{
    while ($b != 0) {
        $t = $b;
        $b = $a % $b;
        $a = $t;
    }
    return $a;
}

function brGcd()
{
    $random1 = rand(1, 100);
    $random2 = rand(1, 100);

    line("Question: %d %d", $random1, $random2);

    $correctAnswer = gcd($random1, $random2);
    $userAnswer = prompt("Your answer");

    if ((int)$userAnswer === $correctAnswer) {
        line("Correct!");
        return true;
    } else {
        line("'%s' is wrong answer ;(. Correct answer was '%d'.", $userAnswer, $correctAnswer);
        return false;
    }
}
// Начало игры
sayHello();
line('Find the greatest common divisor of given numbers. ');
$correct = 0;
for ($i = 0; $i < 3; $i++) {

    if (brGcd() === false) {
        line("Let's try again, %s!", $GLOBALS['global_name']);
        break;
    }

    $correct++;

    if ($correct === 3) {
        line("Congratulations, %s!", $GLOBALS['global_name']);
        break;
    }
}