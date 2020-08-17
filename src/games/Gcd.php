<?php

namespace BrainGames\Game\Gcd;

use function BrainGames\GameEngine\startGame;

use const BrainGames\GameEngine\ROUNDS_COUNTER;

const GAME_DESCRIPTION = 'Find the greatest common divisor of given numbers.';

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

function startGcdGame()
{
    $gameData = [];

    for ($i = 0; $i < ROUNDS_COUNTER; $i++) {
        $gameData[] = generateQuestion();
    }

    startGame(GAME_DESCRIPTION, $gameData);
}
