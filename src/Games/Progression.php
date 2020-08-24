<?php

namespace BrainGames\Games\Progression;

use function BrainGames\GameEngine\startGame;

use const BrainGames\GameEngine\ROUNDS_COUNT;

const GAME_DESCRIPTION = 'What number is missing in the progression?';

function generateProgression(int $startNumber, int $commonDifference, int $progressionLength): array
{
    $progression = [];
    $currentNumber = $startNumber;
    for ($i = 0; $i < $progressionLength; $i++) {
        $progression[] = $currentNumber;
        $currentNumber += $commonDifference;
    }

    return $progression;
}

function generateRoundData(): array
{
    $startNumber = rand(0, 10);
    $commonDifference = rand(1, 10);
    $progressionLength = 10;
    $missingNumberIndex = rand(0, $progressionLength - 1);

    $progression = generateProgression($startNumber, $commonDifference, $progressionLength);

    $correctAnswer = $progression[$missingNumberIndex];
    $progression[$missingNumberIndex] = '..';

    return [implode(' ', $progression), (string) $correctAnswer];
}

function startProgressionGame()
{
    $gameData = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $gameData[] = generateRoundData();
    }

    startGame(GAME_DESCRIPTION, $gameData);
}
