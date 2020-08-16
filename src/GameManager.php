<?php

namespace Brain\Games\GameManager;

use Brain\Games\Even;
use Brain\Games\Calc;
use Brain\Games\Gcd;
use Brain\Games\Progression;
use Brain\Games\Prime;

use function cli\line;
use function cli\prompt;

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

function startGame(string $description, array $questions)
{
    showGreeting($description);
    $userName = getUserName();

    $questionsCount = count($questions); // количество вопросов
    for ($i = $questionsCount - 1; $i >= 0; $i--) {
        [$question, $correctAnswer] = $questions[$i];
        $userAnswer = prompt("Question: {$question}");

        line("Your answer: {$userAnswer}");

        if ($userAnswer !== $correctAnswer) {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$userName}!");
            break;
        }

        line('Correct!');
        $questionsCount--;
    }

    if (0 === $questionsCount) {
        line("Congratulations, {$userName}!");
    }
}

function startEven()
{
    $numberOfQuestion = 3;
    $description = Even\getDescription();
    $questions = Even\getQuestions($numberOfQuestion);

    startGame($description, $questions);
}

function startCalc()
{
    $numberOfQuestion = 3;
    $description = Calc\getDescription();
    $questions = Calc\getQuestions($numberOfQuestion);

    startGame($description, $questions);
}

function startGcd()
{
    $numberOfQuestion = 3;
    $description = Gcd\getDescription();
    $questions = Gcd\getQuestions($numberOfQuestion);

    startGame($description, $questions);
}

function startProgression()
{
    $numberOfQuestion = 3;
    $description = Progression\getDescription();
    $questions = Progression\getQuestions($numberOfQuestion);

    startGame($description, $questions);
}

function startPrime()
{
    $numberOfQuestion = 3;
    $description = Prime\getDescription();
    $questions = Prime\getQuestions($numberOfQuestion);

    startGame($description, $questions);
}
