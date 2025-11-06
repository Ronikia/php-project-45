<?php

namespace Saying;

require_once __DIR__ . '/../vendor/autoload.php';

use function cli\line;
use function cli\prompt;

function sayHello()
{
    global $global_name;

    line('Welcome to the Brain Game!');
    $GLOBALS['global_name'] = prompt('May I have your name?');
    line("Hello, %s!", $GLOBALS['global_name']);
}
