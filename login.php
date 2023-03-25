<?php
session_start();

if (isset($_POST['email']) && isset($_POST['password'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];

      $data = file_get_contents('data.txt');

    preg_match("/Email: $email\nPassword: ([a-f0-9]{32})\n/", $data, $matches);

    if (!empty($matches) && md5($password) === $matches[1]) {
        $_SESSION['email'] = $email;
        header("Location: home.php");
        exit();
    } else {
        $error = "Invalid email or password";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">  <!-- JS Bundle -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    <title>Document</title>
  <!-- <link rel="stylesheet" href="task2.css"> -->
</head>
<body>
<div class="container mt-3">
  <h2>Login Form</h2>

  <?php if (isset($errorMessage)) { ?>
    <div class="alert alert-danger" role="alert">
      <?php echo $errorMessage; ?>
    </div>
  <?php } ?>

  <form method="post" action="">
    <div class="form-group">
      <label for="email">Email address:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
    </div>
    <hr />
    <button type="submit" class="btn btn-primary">Login</button>
    <button type="reset" class="btn btn-secondary">Reset</button>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
