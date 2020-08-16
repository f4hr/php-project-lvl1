<?php

namespace Brain\Games\Progression;

use function cli\line;
use function cli\prompt;

function getDescription(): string
{
    return 'What number is missing in the progression?';
}

function generateQuestion(): array
{
    $startNumber = rand(0, 10); // случайное стартовое число от 0 до 10.
    $commonDifference = rand(1, 10); // случайная разность прогрессии от 1 до 10.
    $progressionLength = 10; // длина прогрессии
    $missingNumberIndex = rand(0, $progressionLength - 1); // случайный индекс спрятанного числа

    $progression = [];
    $currentNumber = $startNumber;
    for ($i = 0; $i < $progressionLength - 1; $i++) {
        $progression[] = $currentNumber;
        $currentNumber += $commonDifference;
    }

    $correctAnswer = $progression[$missingNumberIndex];
    $progression[$missingNumberIndex] = '..';

    return [implode(' ', $progression), (string) $correctAnswer];
}

function getQuestions(int $questionsNum): array
{
    $questions = [];

    for ($i = 0; $i < $questionsNum; $i++) {
        $questions[] = generateQuestion();
    }

    return $questions;
}
