<?php

namespace Brain\Games\Gcd;

use function cli\line;
use function cli\prompt;

function getDescription(): string
{
    return 'Find the greatest common divisor of given numbers.';
}

function gcd($a, $b)
{
    return ($a % $b) ? gcd($b, $a % $b) : abs($b);
}

function getQuestion(): array
{
    $randomNumber1 = rand(0, 50); // случайное число от 0 до 20.
    $randomNumber2 = rand(0, 50); // случайное число от 0 до 20.
    $question = "{$randomNumber1} {$randomNumber2}";
    $correctAnswer = gcd($randomNumber1, $randomNumber2);

    return [$question, (string) $correctAnswer];
}

function generateQuestions(int $questionsNum): array
{
    $questions = [];

    for ($i = 0; $i < $questionsNum; $i++) {
        $questions[] = getQuestion();
    }

    return $questions;
}
