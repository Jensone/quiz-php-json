<?php
$json = file_get_contents('questions.json');
$data = json_decode($json, true);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Questionnaire</title>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <form method="post" action="submit.php">
            <?php
            foreach ($data['questions'] as $question) {
                echo '<div class="form-group mb-5">';
                echo '<label for="question' . $question['id'] . '">' . $question['question'] . '</label>';
                echo '<select name="question' . $question['id'] . '">';
                foreach ($data['answers'] as $answer) {
                    if ($answer['id_question'] == $question['id']) {
                        echo '<option value="' . $answer['id'] . '">' . $answer['answer'] . '</option>';
                    }
                }
                echo '</select>';
                echo '</div>';
            }
            ?>

            <input type="submit" value="Soumettre">
        </form>
    </div>
</body>

</html>
