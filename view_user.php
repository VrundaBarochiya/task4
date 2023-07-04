<?php
include 'dbconn.php';
include 'header.php';

session_start();
if (!(isset($_SESSION['loggein'])) || $_SESSION['loggein'] != true) {
    header("Location: index.php");
    exit;
}

$id = $_GET['view'];
$query = "SELECT * FROM userdata WHERE user_id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$image = $row['image'];
$img_name = $_FILES['image']['name'];
?>

<html>

<head>
    <title>
        View user data
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
    <form action="" method="post">
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
        <input type="text" disabled="disabled" value="<?php
        echo $row['name'];
        ?>">
        <br><br>
        <label for="">
            User Name :
        </label>
        <input type="text" disabled="disabled" value="<?php
        echo $row['username'];
        ?>">
        <br><br>
        <label for="">
            Email :
        </label>
        <input type="email" disabled="disabled" value="<?php
        echo $row['email'];
        ?>">
        <br><br>
        <label for="">
                Image :
            </label>
            <img class="img" src="../Vrunda_task2/image/<?php echo $image; ?>" alt="<?php echo $username . '`sProfile Image'; ?>">
    </form>
    <a href="home.php"><button>Back</button></a>

</body>

</html>