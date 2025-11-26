<?php include('db.php'); session_start(); ?>
<!DOCTYPE html>
<html><head><title>Student Dashboard</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"></head>
<body class="p-4">
<h3>Welcome Student</h3>
<a href="logout.php" class="btn btn-danger mb-2">Logout</a>
<table class="table table-bordered">
<tr><th>Title</th><th>Deadline</th><th>Submit</th></tr>
<?php
$res = mysqli_query($con,"SELECT * FROM assignments ORDER BY deadline ASC");
$student_id = intval($_SESSION['user_id']);

while($r = mysqli_fetch_assoc($res)){
    $aid = intval($r['id']);
    $check = mysqli_query($con, "SELECT * FROM submissions WHERE assignment_id=$aid AND student_id=$student_id");
    echo "<tr><td>".htmlspecialchars($r['title'])."</td><td>".htmlspecialchars($r['deadline'])."</td><td>";
    if(mysqli_num_rows($check) > 0){
        $sub_row = mysqli_fetch_assoc($check);
        echo "<a href='view_submission.php?id={$sub_row['id']}' class='btn btn-success btn-sm'>View</a>";

    } else {
        echo "<a href='submit_assignment.php?id={$r['id']}' class='btn btn-primary btn-sm'>Submit</a>";
    }
    echo "</td></tr>";
}

?>

</table>
</body></html>
