<?php

namespace BrainGames\Games\Calc;

use function BrainGames\GameEngine\startGame;

use const BrainGames\GameEngine\ROUNDS_COUNT;

const GAME_DESCRIPTION = 'What is the result of the expression?';
const OPERATORS = ['+', '-', '*'];

function getExpressionResult(int $num1, int $num2, string $operator): ?int
{
    switch ($operator) {
        case '+': // сложение
            return $num1 + $num2;
            break;
        case '-': // вычитание
            return $num1 - $num2;
            break;
        case '*': // умножение
            return $num1 * $num2;
            break;
        default:
            return null;
    }
}

function generateRoundData(): ?array
{
    $randomNumber1 = rand(0, 20);
    $randomNumber2 = rand(0, 20);

    $operator = OPERATORS[array_rand(OPERATORS, 1)];

    $question = "{$randomNumber1} {$operator} {$randomNumber2}";
    $correctAnswer = getExpressionResult($randomNumber1, $randomNumber2, $operator);

    return [$question, (string) $correctAnswer];
}

function startCalcGame()
{
    $gameData = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $gameData[] = generateRoundData();
    }

    startGame(GAME_DESCRIPTION, $gameData);
}
