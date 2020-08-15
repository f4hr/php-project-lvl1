<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;

function run()
{
    line('Welcome to the Brain Games!');
    line('Answer "yes" if the number is even, otherwise answer "no".');
    line(''); // пустая строка
    $userName = prompt('May I have your name?');
    line("Hello, {$userName}!");
    line(''); // пустая строка

    $questionCount = 3; // количество вопросов

    while ($questionCount > 0) {
        $randomNumber = rand(0, 100); // случайное число от 0 до 100
        $userAnswer = prompt("Question: {$randomNumber}");
        $isEven = $randomNumber % 2 === 0;
        $correctAnswer = ($isEven) ? 'yes' : 'no';

        line("Your answer: {$userAnswer}");

        if ($userAnswer !== $correctAnswer) {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$userName}!");
            break;
        }

        line('Correct!');
        $questionCount--;
    }

    if (0 === $questionCount) {
        line("Congratulations, {$userName}!");
    }
}
