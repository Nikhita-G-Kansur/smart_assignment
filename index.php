<?php include('db.php'); ?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-5">
<div class="container col-md-4">
<h3 class="mb-3 text-center">Login</h3>
<form method="POST">
  <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
  <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
  <button name="login" class="btn btn-primary w-100">Login</button>
  <p class="mt-2 text-center"><a href="register.php">Register</a></p>
</form>
</div>
</body>
</html>

<?php
if(isset($_POST['login'])){
  $email=$_POST['email']; $pass=$_POST['password'];
  $q=mysqli_query($con,"SELECT * FROM users WHERE email='$email' AND password='$pass'");
  if(mysqli_num_rows($q)==1){
    $u=mysqli_fetch_assoc($q);
    session_start();
    $_SESSION['user_id'] = $u['id'];
    $_SESSION['role'] = $u['role'];
    if($u['role']=='teacher') header("Location: dashboard_teacher.php");
    else header("Location: dashboard_student.php");
  } else echo "<script>alert('Invalid credentials');</script>";
}
?>
