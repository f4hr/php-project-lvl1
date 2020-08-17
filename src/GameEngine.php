<?php

namespace BrainGames\GameEngine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNTER = 3;

function showGreeting($message)
{
    line('Welcome to the Brain Games!');
    line($message);
    line();
}

function getUserName(): string
{
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line();

    return $name;
}

function startGame(string $gameDescription, array $gameData)
{
    showGreeting($gameDescription);
    $userName = getUserName();

    for ($i = 0; $i < ROUNDS_COUNTER; $i++) {
        [$question, $correctAnswer] = $gameData[$i];
        $userAnswer = prompt("Question: {$question}");

        line("Your answer: {$userAnswer}");

        if ($userAnswer !== $correctAnswer) {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$userName}!");
            exit;
        }

        line('Correct!');
    }
    line("Congratulations, {$userName}!");
}
