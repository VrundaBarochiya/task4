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
    <title>Home page</title>
    <style>
        button {
            background-color: #3ca9e2;
            border: 1px solid transparent;
            border-radius: 3px;
            box-shadow: rgba(255, 255, 255, .4) 0 1px 0 0 inset;
            box-sizing: border-box;
            color: black;
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

        h1 {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="sec">
        <br>
        <?php if (isset($_SESSION['username'])): ?>
            <h1>
                Welcome
                <strong>
                    <?php echo $_SESSION['username']; ?>
                </strong>
                <?php
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

                            echo $accessType;
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
            </h1>
        <?php endif ?>
        <br>
</body>

</html>