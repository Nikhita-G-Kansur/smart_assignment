<?php include('db.php'); session_start(); ?>
<!DOCTYPE html>
<html>
<head><title>Teacher Dashboard</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"></head>
<body class="p-4">
<h3>Welcome Teacher</h3>
<a href="create_assignment.php" class="btn btn-primary mb-2">Create Assignment</a>
<a href="logout.php" class="btn btn-danger mb-2">Logout</a>
<table class="table table-bordered">
<tr><th>Title</th><th>Deadline</th><th>Action</th></tr>
<?php
$id = intval($_SESSION['user_id']);
$res=mysqli_query($con,"SELECT * FROM assignments WHERE teacher_id=$id");
while($r=mysqli_fetch_assoc($res)){
echo "<tr><td>{$r['title']}</td><td>{$r['deadline']}</td><td><a href='evaluate_assignment.php?id={$r['id']}' class='btn btn-sm btn-success'>Evaluate</a></td></tr>";
}
?>
</table>
</body></html>
