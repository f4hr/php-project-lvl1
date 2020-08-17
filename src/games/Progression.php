<?php

namespace BrainGames\Game\Progression;

use function BrainGames\GameEngine\startGame;

use const BrainGames\GameEngine\ROUNDS_COUNTER;

const GAME_DESCRIPTION = 'What number is missing in the progression?';

function generateQuestion(): array
{
    $startNumber = rand(0, 10);
    $commonDifference = rand(1, 10);
    $progressionLength = 10;
    $missingNumberIndex = rand(0, $progressionLength - 1);

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

function startProgressionGame()
{
    $gameData = [];

    for ($i = 0; $i < ROUNDS_COUNTER; $i++) {
        $gameData[] = generateQuestion();
    }

    startGame(GAME_DESCRIPTION, $gameData);
}
