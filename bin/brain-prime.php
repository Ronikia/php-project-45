#!/usr/bin/env php
<?php

use cli\Tree;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/Cli.php';

use function cli\line;
use function cli\prompt;
use function Saying\sayHello;


//Тест на натурала
function isPrime($n)
{
    if ($n < 2) {
        return false;
    }

    for ($i = 2; $i * $i <= $n; $i++) {
        if ($n % $i === 0) {
            return false;
        }
    }
    return true;
}

function Prime()
{
    $number = rand(1, 100);

    line("Question: %d", $number);

    $correctAnswer = isPrime($number) ? "yes" : "no";
    $userAnswer = prompt("Your answer");

    if ($userAnswer === $correctAnswer) {
        line("Correct!");
        return true;
    } else {
        line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
        return false;
    }
}
// Начало игры
sayHello();
line('Find the greatest common divisor of given numbers.');

$correct = 0;

for ($i = 0; $i < 3; $i++) {

    if (Prime() === false) {
        line("Let's try again, %s!", $GLOBALS['global_name']);
        break;
    }

    $correct++;

    if ($correct === 3) {
        line("Congratulations, %s!", $GLOBALS['global_name']);
        break;
    }
}