<?php 
include('db.php'); 
session_start(); 

if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
    exit;
}

$submission_id = intval($_GET['id']);
$student_id = intval($_SESSION['user_id']);


$check = mysqli_query($con, "
    SELECT s.*, a.title 
    FROM submissions s 
    JOIN assignments a ON a.id = s.assignment_id
    WHERE s.id=$submission_id AND s.student_id=$student_id
");

if(mysqli_num_rows($check) == 0){
    echo "<h3>Invalid submission.</h3>";
    exit;
}

$sub = mysqli_fetch_assoc($check);
$aid = $sub['assignment_id'];
?>
<!DOCTYPE html>
<html>
<head>
<title>My Submission</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4">

<h3><?php echo htmlspecialchars($sub['title']); ?></h3>
<p><b>Submitted At:</b> <?php echo $sub['submitted_at']; ?></p>

<hr>

<h4>Evaluation</h4>

<table class="table table-bordered">
<tr>
    <th>Question</th>
    <th>Your File</th>
    <th>Marks</th>
    <th>Feedback</th>
</tr>

<?php
$answers = mysqli_query($con, "
    SELECT aq.question_text, aq.max_marks,
           sa.answer_file, sa.marks, sa.feedback
    FROM submission_answers sa
    JOIN assignment_questions aq ON aq.id = sa.question_id
    WHERE sa.submission_id = $submission_id
");

$total_scored = 0;
$total_max = 0;
$any_mark_given = false;

while($a = mysqli_fetch_assoc($answers)){

    if($a['marks'] !== null){
        $total_scored += $a['marks'];   
        $any_mark_given = true; 
    }

    $total_max += $a['max_marks'];

    echo "
    <tr>
        <td>".htmlspecialchars($a['question_text'])." 
            <br><small>(".$a['max_marks']." marks)</small>
        </td>
        <td><a href='".$a['answer_file']."' target='_blank'>Open</a></td>
        <td>".($a['marks'] === null ? 
            "<span class='text-warning'>Pending</span>" 
            : $a['marks'])."</td>
        <td>".htmlspecialchars($a['feedback'])."</td>
    </tr>";
}
?>
</table>

<hr>

<h4>Status: 
<?php 
if($any_mark_given){
    echo "<span class='text-success'><b>Evaluated</b></span>";
} else {
    echo "<span class='text-warning'><b>Waiting for Evaluation</b></span>";
}
?>
</h4>

<h4>Total: <?php echo $total_scored; ?> / <?php echo $total_max; ?></h4>

</body>
</html>
