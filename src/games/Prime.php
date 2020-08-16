<?php

namespace Brain\Games\Prime;

use function cli\line;
use function cli\prompt;

function getDescription(): string
{
    return 'Answer "yes" if the number is even, otherwise answer "no".';
}

function checkPrime(int $number): bool
{
    for ($i = 2; $i < floor($number / 2); $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}

function getQuestion(): array
{
    $randomNumber = rand(0, 100); // случайное число от 0 до 100
    $isPrime = $randomNumber % 2 === 0;
    $correctAnswer = (checkPrime($randomNumber)) ? 'yes' : 'no';

    return [$randomNumber, $correctAnswer];
}

function generateQuestions(int $questionsNum): array
{
    $questions = [];

    for ($i = 0; $i < $questionsNum; $i++) {
        $questions[] = getQuestion();
    }

    return $questions;
}
