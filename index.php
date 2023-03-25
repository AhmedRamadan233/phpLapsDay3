
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">	<!-- JS Bundle -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    <title>Document</title>
    <!-- <link rel="stylesheet" href="task2.css"> -->
</head>
<body>
<div class="container mt-3">
    <h2>lab3 Form</h2>
    <form method="post" action="insertionData.php"  enctype="multipart/form-data">
    <?php if (isset($_GET['error'])) { ?>
	 		<div class="alert alert-danger" role="alert">
			  <?php echo htmlspecialchars($_GET['error']);?>
			</div>
			<?php }
              if (isset($_GET['name'])) {
              	$name = $_GET['name'];
              }else $name = '';

              if (isset($_GET['email'])) {
              	$email = $_GET['email'];
              }else $email = '';
			?>
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php echo $name?>">
      </div>
      <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $email?>">
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
      </div>
      <div class="form-group">
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" class="form-control" id="confirm_password" placeholder="Confirm password" name="confirmPassword">
      </div>
      <div class="form-group">
        <label for="room_number">Room Number:</label>
        <input type="text" class="form-control" id="room_number" placeholder="Enter room number" name="roomNumber">
      </div>
      <div class="form-group">
        <label for="exit">Exit:</label>
        <select class="form-control" id="exit" name="exitt">
          <option>Option 1</option>
          <option>Option 2</option>
          <option>Option 3</option>
          <option>Option 4</option>
        </select>
      </div>
      <div class="form-group py-3">
        <label for="profile_pic">Profile Picture:</label>
        <input type="file" class="form-control-file" id="profile_pic" name="pic">
      </div>
      <hr />
      <button type="submit" class="btn btn-primary">Save</button>
      <button type="reset" class="btn btn-secondary">Reset</button>
    </form>
  </div>


































<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>