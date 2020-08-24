<?php

namespace BrainGames\Games\Prime;

use function BrainGames\GameEngine\startGame;

use const BrainGames\GameEngine\ROUNDS_COUNT;

const GAME_DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $number): bool
{
    for ($i = 2; $i <= floor($number / 2); $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}

function generateRoundData(): array
{
    $randomNumber = rand(2, 100);
    $correctAnswer = (isPrime($randomNumber)) ? 'yes' : 'no';

    return [(string) $randomNumber, $correctAnswer];
}

function startPrimeGame()
{
    $gameData = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $gameData[] = generateRoundData();
    }

    startGame(GAME_DESCRIPTION, $gameData);
}
