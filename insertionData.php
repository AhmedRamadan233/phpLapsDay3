 
<?php

function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
// confirmPassword
// roomNumber
// exitt
// pic
if(isset($_POST['name']) &&
   isset($_POST['email']) &&
   isset($_POST['password']) &&
   isset($_POST['confirmPassword']) &&
   isset($_POST['roomNumber']) &&
   isset($_POST['exitt'])&&
   isset($_FILES['pic'])){

    $name = validate($_POST["name"]);
    $email = validate($_POST["email"]);
    $password =md5(validate($_POST["password"]));
    $confirmPassword =md5(validate($_POST["confirmPassword"]));
    $roomNumber = validate($_POST["roomNumber"]);
    $exitt = validate($_POST["exitt"]);
    
    $data = 'email='.$email . '&name='.$name;

    if(empty($email)){
      $em = "email is required";
      header("Location: index.php?error=$em&$data");
      exit;
    }else if(empty($name)){
      $em = "Name is required";
      header("Location: index.php?error=$em&$data");
      exit;
    }else if(empty($password)){
      $em = "password is required";
      header("Location: index.php?error=$em&$data");
      exit;
    }else if(empty($confirmPassword)){
      $em = "confirm password is required";
      header("Location: index.php?error=$em&$data");
      exit;
    }else if( $password != $confirmPassword ){
      $em = "confirm password not equal password";
      header("Location: index.php?error=$em&$data");
      exit;
    } else {
      $file_name = $_FILES['pic']['name'];
      $file_size = $_FILES['pic']['size'];
      $file_tmp = $_FILES['pic']['tmp_name'];
      $file_type = $_FILES['pic']['type'];
      $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
      $extensions = array("jpeg", "jpg", "png");
  
      if(in_array($file_ext, $extensions) === false) {
          $em = "extension not allowed, please choose a JPEG, JPG, or PNG file.";
          header("Location: index.php?error=$em");
          exit;
      }
  
      if($file_size > 2097152) {
          $em = 'File size must be excately 2 MB';
          header("Location: index.php?error=$em");
          exit;
      }
  
      $pic = uniqid() . "." . $file_ext;
      move_uploaded_file($file_tmp, "uploads/" . $pic);
    
      $data = "Name: $name\nEmail: $email\nPassword: $password\nRoom Number: $roomNumber\nExitt: $exitt\nPic Path: uploads/$pic\n";
      file_put_contents('data.txt', $data, FILE_APPEND);
      $sm = "account created successfully";
      header("Location: login.php?success=$sm");
      exit;
    }
}else{
  header("Location: index.php");
  exit;
}
?>