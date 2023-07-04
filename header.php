<html>

<head>
    <style>
        .topnav {
            background-color: white;
            overflow: hidden;
            box-shadow: 0 6px 10px 5px rgba(0, 0, 0, 0.3);
            margin: 5px 0px;
        }

        .topnav a {
            float: left;
            background-color: #3ca9e2;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
            margin: 0px 15px;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        .topnav a.active {
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<?php
include 'dbconn.php';

session_start();
if (!(isset($_SESSION['loggein'])) || $_SESSION['loggein'] != true) {
    header("Location: index.php");
    exit;
}

if (isset($_SESSION['username'])): 

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $logIdQuery = "SELECT user_id FROM userdata WHERE username = '$username'";
    $logIdResult = mysqli_query($conn, $logIdQuery);

    if ($logIdResult && mysqli_num_rows($logIdResult) > 0) {
        $logIdRow = mysqli_fetch_assoc($logIdResult);
        $logId = $logIdRow['user_id'];

        $accessTypeQuery = "SELECT user_type FROM accesstype INNER JOIN usertype ON accesstype.id = accesstype_id WHERE usertype.user_id = '$logId'";
        $accessTypeResult = mysqli_query($conn, $accessTypeQuery);

        if ($accessTypeResult && mysqli_num_rows($accessTypeResult) > 0) {
            $accessTypeRow = mysqli_fetch_assoc($accessTypeResult);
            $accessType = $accessTypeRow['user_type'];

           //echo $accessType;
        } else {
            echo "N/A";
        }
    } else {
        echo "N/A";
    }
} else {
    echo "N/A";
}
?>
</h2>
<?php endif ?>
<body>
    <header>
        <div class="topnav">
        <a href="adduser.php">Add User</a>
        <a href="listuser.php">View User</a>
        <?php
        if ($accessType == "admin" || $accessType == "teacher") {
            ?>
        <a href="education.php">Education dashboard</a>
        <?php
        }
        ?>
          <?php
        if ($accessType == "admin") {
            ?>
        <a href="assignchapter.php">Assign chapters</a>
        <?php
        }
        ?>
        <?php
        if ($accessType == "admin" || $accessType == "teacher") {
            ?>
        <a href="assignsubject.php">Assign subject</a>
        <?php
        }
        ?>
        <?php
        if ($accessType == "admin" || $accessType == "teacher") {
            ?>
        <a href="assignstudent.php">Assign student</a>
        <?php
        }
        ?>
            <a href="logout.php" style="float: right; margin-right: 50px;">Log Out</a>
        </div>
        </div>
    </header>
</body>

</html>