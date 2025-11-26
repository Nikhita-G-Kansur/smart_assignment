<?php include('db.php'); session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>Add Questions</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4">

<h3>Add Questions for Assignment</h3>

<form method="POST">
<textarea name="question_text" class="form-control mb-2" placeholder="Enter Question" required></textarea>
<input type="number" name="max_marks" class="form-control mb-2" placeholder="Max Marks" required>
<button name="add" class="btn btn-primary">Add Question</button>
<a href="dashboard_teacher.php" class="btn btn-secondary">Finish</a>
</form>

<hr>

<h4>Existing Questions</h4>
<table class="table table-bordered">
<tr><th>Question</th><th>Marks</th></tr>

<?php
$id = $_GET['id'];
$res = mysqli_query($con,"SELECT * FROM assignment_questions WHERE assignment_id=$id");
while($r=mysqli_fetch_assoc($res)){
    echo "<tr><td>{$r['question_text']}</td><td>{$r['max_marks']}</td></tr>";
}
?>

</table>

</body>
</html>

<?php
if(isset($_POST['add'])){
    $q=$_POST['question_text'];
    $m=$_POST['max_marks'];
    mysqli_query($con,"INSERT INTO assignment_questions(assignment_id,question_text,max_marks)
    VALUES($id,'$q',$m)");
    echo "<script>window.location.reload();</script>";
}
?>
