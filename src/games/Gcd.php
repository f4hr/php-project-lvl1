<?php

namespace Brain\Games\Gcd;

use function cli\line;
use function cli\prompt;

function getDescription(): string
{
    return 'Find the greatest common divisor of given numbers.';
}

function gcd($a, $b): int
{
    return ($a % $b) ? gcd($b, $a % $b) : abs($b);
}

function generateQuestion(): array
{
    $randomNumber1 = rand(0, 50);
    $randomNumber2 = rand(0, 50);
    $question = "{$randomNumber1} {$randomNumber2}";
    $correctAnswer = gcd($randomNumber1, $randomNumber2);

    return [$question, (string) $correctAnswer];
}

function getQuestions(int $questionsNum): array
{
    $questions = [];

    for ($i = 0; $i < $questionsNum; $i++) {
        $questions[] = generateQuestion();
    }

    return $questions;
}
