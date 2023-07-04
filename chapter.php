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
    <title>chapter page</title>
    <link rel="stylesheet" href="register.css">
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

<body>

    <body>
        <div class="container" style= "float: left;margin-left: 100px;">
            <h2>Chapter</h2>
            <form method="post" accept="">
                <div class="form-group">
                    <label for="name">Add Chapter:</label>
                    <input type="text" id="chapter" name="chapter" >
                </div>
                <br><br>
                <div class="form-group">
                    <input type="submit" name="submit" value="Add Chapter" required>
                </div>
            </form>
            <a href="education.php"><button>Back</button></a>
        </div>
    </body>
</html>

<?php

if (isset($_POST['submit'])) {
    $chapter = $_POST['chapter'];

    if (empty($chapter)) {
        echo "<script> alert ('Please correct the fields..'); window.location.href='chapter.php'</script>";
        return false;
    }
    else{
    
    $sql = "INSERT INTO chapter (chapter_name) VALUES ('$chapter')";
    if (mysqli_query($conn, $sql)) {
        echo "<script> alert ('Subject add successfully..');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
}
?>

<?php

$sqlSelect = "select * from chapter";

$result = mysqli_query($conn, $sqlSelect);

if (mysqli_num_rows($result) > 0) {
    ?>
    <br><br>
    <table style= "float: right; margin-right: 100px;">
        <tr>
            <th>ID</th>
            <th>chapter Name</th>
            <th>Options</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td>
                    <?php echo $row['id']; ?>
                </td>
                <td>
                    <?php echo $row['chapter_name']; ?>
                </td>
                <td>
                    <button><a href="edit_chapter.php?view= <?php echo $row["id"]; ?>">Edit</a></button>
                    <button><a href="delete_chapter.php?delete= <?php echo $row["id"]; ?>">Delete</a></button>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <?php

}
?>