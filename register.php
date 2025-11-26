<?php include('db.php'); ?>
<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-5">
<div class="container col-md-4">
<h3 class="mb-3 text-center">Register</h3>
<form method="POST">
  <input type="text" name="name" class="form-control mb-2" placeholder="Name" required>
  <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
  <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
  <select name="role" class="form-select mb-2" required>
    <option value="student">Student</option>
    <option value="teacher">Teacher</option>
  </select>
  <button name="register" class="btn btn-success w-100">Register</button>
</form>
</div>
</body>
</html>

<?php
if(isset($_POST['register'])){
  $n=$_POST['name']; $e=$_POST['email']; $p=$_POST['password']; $r=$_POST['role'];
  mysqli_query($con,"INSERT INTO users(name,email,password,role) VALUES('$n','$e','$p','$r')");
  echo "<script>alert('Registered Successfully!'); window.location='index.php';</script>";
}
?>
