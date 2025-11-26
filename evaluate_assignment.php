<?php 
include('db.php'); 
session_start(); 


if(isset($_POST['save'])){
    $said = intval($_POST['said']);
    $marks = intval($_POST['marks']);
    $feedback = mysqli_real_escape_string($con, $_POST['feedback']);

    mysqli_query($con,
        "UPDATE submission_answers 
         SET marks=$marks, feedback='$feedback' 
         WHERE id=$said"
    );

    echo "<script>
            alert('Saved!');
            window.location='evaluate_assignment.php?id=".$_GET['id']."';
          </script>";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Evaluate Submissions</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="p-4">
<h3>Evaluate Submissions</h3>

<?php
$aid = intval($_GET['id']); 

// get all submissions
$subs = mysqli_query($con, "
    SELECT s.id AS sid, u.name 
    FROM submissions s
    JOIN users u ON u.id = s.student_id
    WHERE s.assignment_id = $aid
");

while($s = mysqli_fetch_assoc($subs)){
    $sid = $s['sid'];
?>

    <h5 class="mt-4">Student: <?= htmlspecialchars($s['name']); ?></h5>

    <table class="table table-bordered">
        <tr>
            <th>Question</th>
            <th>Answer</th>
            <th>Marks</th>
            <th>Feedback</th>
            <th>Save</th>
        </tr>

<?php
    $ans = mysqli_query($con, "
        SELECT sa.id AS said, aq.question_text, aq.max_marks, 
               sa.answer_file, sa.marks, sa.feedback
        FROM submission_answers sa
        JOIN assignment_questions aq ON sa.question_id = aq.id
        WHERE sa.submission_id = $sid
    ");

    while($a = mysqli_fetch_assoc($ans)){
?>
        <tr>
            <td>
                <?= htmlspecialchars($a['question_text']); ?><br>
                <small>(<?= $a['max_marks']; ?> marks)</small>
            </td>

            <td>
                <a href="<?= htmlspecialchars($a['answer_file']); ?>" target="_blank">Open File</a>
            </td>

            <td>
                <form method="POST">
                    <input type="hidden" name="said" value="<?= $a['said']; ?>">
                    <input type="number" name="marks" value="<?= htmlspecialchars($a['marks']); ?>" class="form-control">
            </td>

            <td>
                <input type="text" name="feedback" value="<?= htmlspecialchars($a['feedback']); ?>" class="form-control">
            </td>

            <td>
                <button class="btn btn-success btn-sm" name="save">Save</button>
                </form>
            </td>
        </tr>
<?php } ?>
    </table>

<?php } ?>

</body>
</html>
