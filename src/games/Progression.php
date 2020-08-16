<?php

namespace Brain\Games\Progression;

use function cli\line;
use function cli\prompt;

function getDescription(): string
{
    return 'What number is missing in the progression?';
}

function getQuestion(): array
{
    $startNumber = rand(0, 10); // случайное стартовое число от 0 до 10.
    $commonDifference = rand(1, 10); // случайная разность прогрессии от 1 до 10.
    $progressionLength = 10; // длина прогрессии
    $missingNumberIndex = rand(0, $progressionLength - 1); // случайный индекс спрятанного числа

    $progression = [];
    $current = $startNumber;
    for ($i = 0; $i < $progressionLength - 1; $i++) {
        $progression[] = $current;
        $current += $commonDifference;
    }

    $correctAnswer = $progression[$missingNumberIndex];
    $progression[$missingNumberIndex] = '..';

    return [implode(' ', $progression), (string) $correctAnswer];
}

function generateQuestions(int $questionsNum): array
{
    $questions = [];

    for ($i = 0; $i < $questionsNum; $i++) {
        $questions[] = getQuestion();
    }

    return $questions;
}
