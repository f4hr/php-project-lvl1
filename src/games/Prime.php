<?php

namespace Brain\Games\Prime;

use function cli\line;
use function cli\prompt;

function getDescription(): string
{
    return 'Answer "yes" if given number is prime. Otherwise answer "no".';
}

function isPrime(int $number): bool
{
    for ($i = 2; $i <= floor($number / 2); $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}

function generateQuestion(): array
{
    $randomNumber = rand(2, 100);
    $correctAnswer = (isPrime($randomNumber)) ? 'yes' : 'no';

    return [(string) $randomNumber, $correctAnswer];
}

function getQuestions(int $questionsNum): array
{
    $questions = [];

    for ($i = 0; $i < $questionsNum; $i++) {
        $questions[] = generateQuestion();
    }

    return $questions;
}
