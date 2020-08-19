<?php

namespace BrainGames\Games\Even;

use function BrainGames\GameEngine\startGame;

use const BrainGames\GameEngine\ROUNDS_COUNTER;

const GAME_DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function generateRoundData(): array
{
    $randomNumber = rand(0, 100);
    $isEven = $randomNumber % 2 === 0;
    $correctAnswer = ($isEven) ? 'yes' : 'no';

    return [(string) $randomNumber, $correctAnswer];
}

function startEvenGame()
{
    $gameData = [];

    for ($i = 0; $i < ROUNDS_COUNTER; $i++) {
        $gameData[] = generateRoundData();
    }

    startGame(GAME_DESCRIPTION, $gameData);
}
