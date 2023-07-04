<?php

include 'dbconn.php';


if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $username = mysqli_real_escape_string($conn, $username);
  $password = mysqli_real_escape_string($conn, $password);

  $query = "SELECT * FROM userdata WHERE username = '$username'";
  $result = mysqli_query($conn, $query);


  if ($result) {
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $storedPassword = $row['password'];

      if ($password == $storedPassword) {
        session_start();
        $_SESSION['loggein'] = true;
        $_SESSION['username'] = $username;

        header('Location: home.php');
      } else {
        echo "Invalid password";
      }
    } else {
      echo "Invalid username";
    }
  } else {
    echo "Query failed: " . mysqli_error($conn);
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>HTML5 Login Form with validation Example</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="style.css">

</head>

<body>

  <div id="login-form-wrap">
    <h2>Login</h2>
    <form id="login-form" method="post" action="">
      <p>
        <input type="text" id="username" name="username" placeholder="Username" required><i
          class="validation"><span></span><span></span></i>
      </p>
      <p>
        <input type="password" id="password" name="password" placeholder="Password" required><i
          class="validation"><span></span><span></span></i>
      </p>
      <p>
        <input type="submit" name="submit" id="login" value="Login">
      </p>
    </form>
    <div id="create-account-wrap">
      <p>Not a member? <a href="register.php">Create Account</a>
      <p>
    </div>
  </div>

</body>

</html>