<?php

include 'dbconn.php';

if (isset($_POST['submit'])) {
  $query = "select username from userdata";
  $result = mysqli_query($conn, $query);
  while ($row = mysqli_fetch_assoc($result)) {
    $username_id[] = $row['username'];
  }

  if (in_array($_POST['username'], $username_id)) {
    echo '<script> alert("Username Already exists..") </script>';
  } else {

    if ($_POST["password"] === $_POST["cpassword"]) {

      $name = $_POST['name'];
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $cpassword = $_POST['cpassword'];
      $hash_password = md5($password);
      $access_type = $_POST['accesstype'];

      $sql = "INSERT INTO userdata (name, username, email, password, image) VALUES ('$name', '$username' ,'$email', '$hash_password', '')";

      if (mysqli_query($conn, $sql)) {
        $userid = mysqli_insert_id($conn);
        $query1 = "SELECT id FROM accesstype WHERE user_type = '$access_type'";
        $result2 = mysqli_query($conn, $query1);

        $row = mysqli_fetch_assoc($result2);
        $access_id = $row['id'];
        // print_r($access_id);
        $query2 = "INSERT INTO usertype (user_id, accesstype_id) VALUES ( '$userid', '$access_id')";
        $result3 = mysqli_query($conn, $query2);
        // print_r($result3);
        if (!$result) {
          die('Query Failed!!' . mysqli_error($conn));
        } 
        echo "Form details inserted successfully!";
        header('Location: index.php');

      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    } else {
      echo "<script> alert(' Enter password and confirm password same..') </script>";
    }
  }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
  <title>Registration Page</title>
  <link rel="stylesheet" href="register.css">

</head>

<body>
  <div class="container">
    <h2>Registration Form</h2>
    <form method="post" accept="">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="username">User Name:</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="form-group">
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="cpassword" name="cpassword" required>
      </div>
      <div class="form-group">
        <label for="user_type">User Type:</label>
        <select name="accesstype">
      </div>
      <?php
      $conn = mysqli_connect('localhost', 'root', 'root', 'user');


      $query = "SELECT user_type FROM accesstype";

      $result = mysqli_query($conn, $query);

      if (!$result) {
        die('Try again');
      }

      while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['user_type'];
        echo "<option value='$id'>$id</option>";
      }
      ?>
      </select>
      <br><br>
      <div class="form-group">
        <input type="submit" name="submit" value="Register">
      </div>

    </form>
    <div id="create-account-wrap">
      <p>Already have an account? <a href="index.php">Login Account</a>
      <p>
    </div>
  </div>
</body>

</html>