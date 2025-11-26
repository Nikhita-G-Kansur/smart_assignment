<?php 
include('db.php'); 
session_start(); 

if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
    exit;
}

$aid = intval($_GET['id']);
$sid = intval($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Submit Assignment</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
<h3>Submit Assignment</h3>

<?php

$q = mysqli_query($con,"SELECT * FROM assignment_questions WHERE assignment_id=$aid");
if(mysqli_num_rows($q) == 0){
    echo "<p class='text-danger'>No questions found for this assignment.</p>";
    exit;
}
?>

<form method="POST" enctype="multipart/form-data">
<?php
while($row = mysqli_fetch_assoc($q)){
    $qid = $row['id'];
    echo "
    <div class='mb-3'>
      <label class='form-label'><b>".htmlspecialchars($row['question_text'])."</b> (".intval($row['max_marks'])." marks)</label>
      <input type='file' name='ans{$qid}' class='form-control' required>
    </div>
    ";
}
?>
<button name="submit" class="btn btn-success">Upload All</button>
</form>
</body>
</html>

<?php
if(isset($_POST['submit'])){

    mysqli_query($con,"INSERT INTO submissions(assignment_id, student_id, submitted_at) VALUES($aid, $sid, NOW())");
    $submission_id = mysqli_insert_id($con);

    $folder = "uploads/";
    if(!is_dir($folder)) mkdir($folder, 0775, true);

    $q2 = mysqli_query($con,"SELECT id FROM assignment_questions WHERE assignment_id=$aid");
    while($r = mysqli_fetch_assoc($q2)){
        $qid = $r['id'];
        $inputName = "ans{$qid}";
        if(isset($_FILES[$inputName]) && $_FILES[$inputName]['error'] == 0){
            $safeName = time() . "_" . preg_replace('/[^A-Za-z0-9_\-\.]/', '_', basename($_FILES[$inputName]['name']));
            $target = $folder . $safeName;
            move_uploaded_file($_FILES[$inputName]['tmp_name'], $target);
            $target_esc = mysqli_real_escape_string($con, $target);
            mysqli_query($con,"INSERT INTO submission_answers(submission_id, question_id, answer_file) VALUES($submission_id, $qid, '$target_esc')");
        }
    }

    echo "<script>alert('Submitted Successfully!'); window.location='dashboard_student.php';</script>";
}
?>
