<?php

namespace BrainGames\GameEngine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNTER = 3;

function startGame(string $gameDescription, array $gameData)
{
    line('Welcome to the Brain Games!');
    line($gameDescription);
    line();
    $userName = prompt('May I have your name?');
    line("Hello, %s!", $userName);
    line();

    for ($i = 0; $i < ROUNDS_COUNTER; $i++) {
        [$question, $correctAnswer] = $gameData[$i];
        line("Question: {$question}");
        $userAnswer = prompt("Your answer");

        if ($userAnswer !== $correctAnswer) {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$userName}!");
            exit;
        }

        line('Correct!');
    }
    line("Congratulations, {$userName}!");
}
