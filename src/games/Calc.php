<?php

namespace Brain\Games\Calc;

use function cli\line;
use function cli\prompt;

function getDescription(): string
{
    return 'What is the result of the expression?';
}

function getQuestion(): array
{
    $randomNumber1 = rand(0, 20); // случайное число от 0 до 20.
    $randomNumber2 = rand(0, 20); // случайное число от 0 до 20.
    /**
     * Случайный выбор операции над числами.
     *
     * 0 - сложение  (+)
     * 1 - вычитание (-)
     * 2 - умножение (*)
     */
    $operation = rand(0, 2);

    switch ($operation) {
        case 0: // сложение
            $question = "{$randomNumber1} + {$randomNumber2}";
            $correctAnswer = $randomNumber1 + $randomNumber2;
            break;
        case 1: // вычитание
            $question = "{$randomNumber1} - {$randomNumber2}";
            $correctAnswer = $randomNumber1 - $randomNumber2;
            break;
        case 2: // умножение
            $question = "{$randomNumber1} * {$randomNumber2}";
            $correctAnswer = $randomNumber1 * $randomNumber2;
            break;
    }

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
