<?php

namespace BrainGames\Games\Even;

use function BrainGames\GameEngine\startGame;

use const BrainGames\GameEngine\ROUNDS_COUNT;

const GAME_DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function generateRoundData(): array
{
    $randomNumber = rand(0, 100);
    $correctAnswer = (isEven($randomNumber)) ? 'yes' : 'no';

    return [(string) $randomNumber, $correctAnswer];
}

function startEvenGame()
{
    $gameData = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $gameData[] = generateRoundData();
    }

    startGame(GAME_DESCRIPTION, $gameData);
}
