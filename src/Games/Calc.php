<?php

namespace BrainGames\Games\Calc;

use function BrainGames\GameEngine\startGame;

use const BrainGames\GameEngine\ROUNDS_COUNTER;

const GAME_DESCRIPTION = 'What is the result of the expression?';

function generateData(): ?array
{
    $randomNumber1 = rand(0, 20);
    $randomNumber2 = rand(0, 20);
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
        default:
            return null;
    }

    return [$question, (string) $correctAnswer];
}

function startCalcGame()
{
    $gameData = [];

    for ($i = 0; $i < ROUNDS_COUNTER; $i++) {
        $gameData[] = generateData();
    }

    startGame(GAME_DESCRIPTION, $gameData);
}
