<?php
include 'dbconn.php';
include 'header.php';

session_start();
if(!(isset($_SESSION['loggein'])) || $_SESSION['loggein'] != true){
    header("Location: index.php");
    exit;
}

$id = $_GET['view'];
$query = "SELECT * FROM userdata WHERE user_id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>

<html>
    <head>
        <title>
            Edit User Data
        </title>
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
        <br><br>
       <form action="" method="post" enctype="multipart/form-data">
       <label for="">
            ID :
        </label>
        <input type="text" disabled="disabled" value="<?php
        echo $row['user_id'];
        ?>">
        <br><br>
            <label for="">
                Name :
            </label>
            <input type="text" name="name"value="<?php
                                        echo $row['name'];
                                        ?>">
            <br><br>
            <label for="">
                User Name :
            </label>
            <input type="text" name="username" value="<?php
                                        echo $row['username'];
                                        ?>">
            <br><br>
            <label for="">
                Email :
            </label>
            <input type="email" name="email" value="<?php
                                        echo $row['email'];
                                        ?>">
            <br><br>
            <label for="">
                Image :
            </label>
            <input type="file" name="image" accept=".jpeg,.png,.jpg">
            <br><br>
            <button type="submit" name="update">Update</button>
       </form>
            <a href="listuser.php"><button>Back</button></a>

    </body>
</html>
<?php
if(isset($_POST['update'])){


    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    if(isset($_FILES['image'])){

        $img_name = $_FILES['image']['name'];
        $img_tmp = $_FILES['image']['tmp_name'];

        $img_extension = pathinfo($img_name,PATHINFO_EXTENSION);
        $new_filename = $username. '.' .$img_extension;

        $destination = './image/' . $new_filename;
        move_uploaded_file($img_tmp, $destination);
        
    $query3 = "UPDATE userdata SET name='$name',username='$username',
    email='$email', image='$new_filename' WHERE user_id =$id ";

    $result = mysqli_query($conn, $query3);

    if($result){
        echo "<script> alert ('Your Data Updated Successfully'); window.location.href='listuser.php'</script>";

    }
}
}
?>