<?php 
include('db.php'); 
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'teacher') {
    header("Location: index.php");
    exit;
}

$teacher_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create Assignment</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <script>
    function addQuestion() {
        let box = document.getElementById("question_box");

        let qHTML = `
            <div class="card p-3 mb-2">
                <label><b>Question Text</b></label>
                <input type="text" name="q_text[]" class="form-control mb-2" required>

                <label><b>Max Marks</b></label>
                <input type="number" name="q_marks[]" class="form-control" required>
            </div>
        `;

        box.insertAdjacentHTML('beforeend', qHTML);
    }
    </script>
</head>

<body class="p-4">
<h3>Create Assignment</h3>

<form method="POST">

    <label><b>Assignment Title</b></label>
    <input type="text" name="title" class="form-control mb-3" required>

    <label><b>Deadline</b></label>
    <input type="date" name="deadline" class="form-control mb-3" required>

    <h4>Questions</h4>

    <div id="question_box">
        <div class="card p-3 mb-2">
            <label><b>Question Text</b></label>
            <input type="text" name="q_text[]" class="form-control mb-2" required>

            <label><b>Max Marks</b></label>
            <input type="number" name="q_marks[]" class="form-control" required>
        </div>
    </div>

    <button type="button" onclick="addQuestion()" class="btn btn-secondary mt-2">Add Question</button>
    <br><br>

    <button name="create" class="btn btn-success">Create Assignment</button>
</form>

<?php
if (isset($_POST['create'])) {

    $title = mysqli_real_escape_string($con, $_POST['title']);
    $deadline = $_POST['deadline'];

    mysqli_query($con, "
        INSERT INTO assignments(title, deadline, teacher_id)
        VALUES('$title', '$deadline', $teacher_id)
    ");

    $aid = mysqli_insert_id($con);


    for ($i = 0; $i < count($_POST['q_text']); $i++) {

        $q = mysqli_real_escape_string($con, $_POST['q_text'][$i]);
        $m = intval($_POST['q_marks'][$i]);

        mysqli_query($con, "
            INSERT INTO assignment_questions(assignment_id, question_text, max_marks)
            VALUES($aid, '$q', $m)
        ");
    }

    echo "<script>alert('Assignment Created!'); window.location='dashboard_teacher.php';</script>";
}
?>
</body>
</html>
