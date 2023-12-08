<?php
$json = file_get_contents('questions.json');
$data = json_decode($json, true);

if (!isset($_POST)) {
    echo 'Aucune donnée reçue';
    exit;
}

$correctCount = 0;

foreach ($_POST as $questionId => $answerId) {
    foreach ($data['answers'] as $answer) {
        if ($answer['id'] == $answerId && $answer['correct'] == true) {
            $correctCount++;
        }
    }
}

echo "Vous avez répondu correctement à $correctCount questions.";
?>
