<?php

namespace Brain\Games\GameManager;

use Brain\Games\Even;

use function cli\line;
use function cli\prompt;

function showGreeting($message)
{
    line('Welcome to the Brain Games!');
    line($message);
}

function getUserName(): string
{
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    return $name;
}

function startGame(string $description, array $questions)
{
    showGreeting($description);
    $userName = getUserName();

    $questionCount = count($questions); // количество вопросов
    for ($i = $questionCount - 1; $i >= 0; $i--) {
        [$question, $correctAnswer] = $questions[$i];
        $userAnswer = prompt("Question: {$question}");

        line("Your answer: {$userAnswer}");

        if ($userAnswer !== $correctAnswer) {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$userName}!");
            break;
        }

        line('Correct!');
        $questionCount--;
    }

    if (0 === $questionCount) {
        line("Congratulations, {$userName}!");
    }
}

function startEven()
{
    $numberOfQuestion = 3; // magic number
    $description = Even\getDescription();
    $questions = Even\generateQuestions($numberOfQuestion);

    startGame($description, $questions);
}
