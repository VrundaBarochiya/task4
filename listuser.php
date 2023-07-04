<html>

<head>
    <title>Import csv file</title>

    <style>
        table {
            border: 1px solid black;
            border-spacing: 0;
        }

        th,
        td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }

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

        a {
            text-decoration: none;
            background-color: linear-gradient(to right, whitesmoke, lightgrey);
            color: black;
            margin: 10px;
        }
    </style>
</head>

</html>

<?php

include 'dbconn.php';
include 'header.php';

session_start();
if (!(isset($_SESSION['loggein'])) || $_SESSION['loggein'] != true) {
    header("Location: index.php");
    exit;
}

$sqlSelect = "select * from userdata";

$result = mysqli_query($conn, $sqlSelect);

if (mysqli_num_rows($result) > 0) {
    ?>
    <br><br>
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>User Name</th>
            <th>Email</th>
            <th>Options</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td>
                    <?php echo $row['user_id']; ?>
                </td>
                <td>
                    <?php echo $row['name']; ?>
                </td>
                <td>
                    <?php echo $row['username']; ?>
                </td>
                <td>
                    <?php echo $row['email']; ?>
                </td>
                <td><button><a href="view_user.php?view= <?php echo $row["user_id"]; ?>">View</a></button>
                    <button><a href="edit_user.php?view= <?php echo $row["user_id"]; ?>">Edit</a></button>
                    <button><a href="delete_user.php?delete= <?php echo $row["user_id"]; ?>">Delete</a></button>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <br>
    <a href="home.php"><button>Back</button></a>
    <?php

}
?>