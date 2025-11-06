#!/usr/bin/env php
<?php

use cli\Tree;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/Cli.php';

use function cli\line;
use function cli\prompt;
use function Saying\sayHello;


//Randomnaja progression 
function makeProgression($start, $step, $length)
{
    $arr = [];
    for ($i = 0; $i < $length; $i++) {
        $arr[] = $start + $step * $i;
    }
    return $arr;
}
//GAME

function brProgression()
{
    $start = rand(1, 20);
    $step = rand(1, 10);
    $length = rand(5, 10); 
    $progression = makeProgression($start, $step, $length);
    
    $hiddenIndex = rand(0, $length - 1);
    $correctAnswer = $progression[$hiddenIndex];

    $hiddenIndex = rand(0, $length - 1);
    $correctAnswer = $progression[$hiddenIndex];
    //Цигане уралали число
    $progression[$hiddenIndex] = '..';
    //Цигане трубют выкуп
    $question = implode(' ', $progression);
    line("Question: %s", $question);
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

    if (brProgression() === false) {
        line("Let's try again, %s!", $GLOBALS['global_name']);
        break;
    }

    $correct++;

    if ($correct === 3) {
        line("Congratulations, %s!", $GLOBALS['global_name']);
        break;
    }
}