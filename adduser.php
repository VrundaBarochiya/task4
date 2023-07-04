<?php

include 'dbconn.php';
include 'header.php';

session_start();
if (!(isset($_SESSION['loggein'])) || $_SESSION['loggein'] != true) {
    header("Location: index.php");
    exit;
}

?>
<html>

<head>
    <link rel="stylesheet" href="register.css">
    <style>
        button {
            background-color: #3ca9e2;
            border: 1px solid transparent;
            border-radius: 3px;
            box-shadow: rgba(255, 255, 255, .4) 0 1px 0 0 inset;
            box-sizing: border-box;
            color: #fff;
            cursor: pointer;
            display: inline-block;
            font-size: 13px;
            font-weight: 400;
            line-height: 1.15385;
            margin: 0;
            outline: none;
            padding: 8px 0.8em;
            position: relative;
            text-align: center;
            text-decoration: none;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            vertical-align: baseline;
            white-space: nowrap;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Add User</h2>
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
      <label for="user_type">User Type:</label>
      <select name="id" id="">
</div>
      <?php
        $conn = mysqli_connect('localhost', 'root', 'root', 'user');


        $query = "SELECT user_type FROM accesstype";
         
        $result = mysqli_query($conn, $query);
        
        if(!$result){
         die('Try again');
        }
        
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['user_type'];
            echo "<option value='$id'>$id</option>";
        }
        ?>
      </select>
      <br><br>
            <div class="form-group">
                <input type="submit" name="submit" value="Add User">
            </div>
        </form>
    </div>
    <a href="home.php"><button>Back</button></a>

</body>

</html>

<?php
if (isset($_POST['submit'])) {
    $query = "select username from userdata";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $username_id[] = $row['username'];
    }
    if (in_array($_POST['username'], $username_id)) {
        echo '<script> alert("Username Already exists..") </script>';
    } else {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $sql = "INSERT INTO userdata (name, username, email, password, image) VALUES ('$name', '$username' ,'$email', '$password', '')";

        if (mysqli_query($conn, $sql)) {
            echo "<script> alert ('User add sucessfully..'); window.location.href='home.php'</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>