<?php
include 'dbconn.php';
include 'header.php';

session_start();
if(!(isset($_SESSION['loggein'])) || $_SESSION['loggein'] != true){
    header("Location: index.php");
    exit;
}

$id = $_GET['view'];
$query = "SELECT * FROM chapter WHERE id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>

<html>
    <head>
        <title>
            Edit Chapter
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
        echo $row['id'];
        ?>">
        <br><br>
            <label for="">
                Chapter Name :
            </label>
            <input type="text" name="chapter_name"value="<?php
                                        echo $row['chapter_name'];
                                        ?>">
            <br><br>
            <button type="submit" name="update">Update</button>
       </form>
            <a href="chapter.php"><button>Back</button></a>

    </body>
</html>
<?php
if(isset($_POST['update'])){


    $chapter = $_POST['chapter_name'];

    $query3 = "UPDATE chapter SET chapter_name='$chapter' WHERE id =$id ";

    $result = mysqli_query($conn, $query3);

    if($result){
        echo "<script> alert ('Your Data Updated Successfully'); window.location.href='chapter.php'</script>";

    }
}