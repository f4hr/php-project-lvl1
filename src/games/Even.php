<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;

function getDescription(): string
{
    return 'Answer "yes" if the number is even, otherwise answer "no".';
}

function getQuestion(): array
{
    $randomNumber = rand(0, 100); // случайное число от 0 до 100
    $isEven = $randomNumber % 2 === 0;
    $correctAnswer = ($isEven) ? 'yes' : 'no';

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
