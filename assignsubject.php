<html>

<head>
    <title>Assign subject to Standard</title>
</head>

<body>
    <form action="" method="post">
        <div class="form-group">

            <label>Add Standard:</label>
            <select name="standardname">
                <?php
                include 'dbconn.php';

                $query = "SELECT standard_name FROM standard";

                $result = mysqli_query($conn, $query);

                if (!$result) {
                    die('Try again');
                }

                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['standard_name'];
                    echo "<option value='$id'>$id</option>";
                }
                ?>
            </select>
       
        <label for="user_type">select Subject:</label>
        <select name="subjectname">
            <?php
            include 'dbconn.php';

            $query = "SELECT subject_name FROM subject";

            $result = mysqli_query($conn, $query);

            if (!$result) {
                die('Try again');
            }

            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['subject_name'];
                echo "<option value='$id'>$id</option>";
            }
            ?>
        </select>
        <br><br>

        <div class="form-group">
            <input type="submit" name="submitstandard" value="Assign subject to standard">
        </div>
    </form>
</body>

</html>

<?php
include 'dbconn.php';
if (isset($_POST['submitstandard'])) {

    $standard_name = $_POST['standardname'];
    $subject_name = $_POST['subjectname'];

    $standardrid = mysqli_insert_id($conn);
    $query = "SELECT id FROM standard WHERE standard_name = '$standard_name'";
    $result1 = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($result1);
    $standardid= $row['id'];

    $subjectid = mysqli_insert_id($conn);
    $query1 = "SELECT id FROM subject WHERE subject_name = '$subject_name'";
    $result2 = mysqli_query($conn, $query1);

    $row = mysqli_fetch_assoc($result2);
    $subjectid = $row['id'];
    // print_r($access_id);
    $query2 = "INSERT INTO assignsub (standard_id, subject_id) VALUES ( '$standardid', '$subjectid')";
    $result3 = mysqli_query($conn, $query2);
    // print_r($result3);
    if (!$result) {
        die('Query Failed!!' . mysqli_error($conn));
    }
    echo "<script> alert('Form details inserted successfully!');</script>";
}

?>