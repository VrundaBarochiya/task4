<html>

<head>
    <title>Assign student to Standard</title>
</head>

<body>
    <form action="" method="post">
        <div class="form-group">

        <label for="user_type">select Student:</label>
        <select name="studentname">
            <?php
            include 'dbconn.php';

            $query = "SELECT userdata.user_id, userdata.name
            From userdata join usertype on usertype.user_id = userdata.user_id 
            Where usertype.accesstype_id = 3";

            $result = mysqli_query($conn, $query);

            if (!$result) {
                die('Try again');
            }

            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['name'];
                echo "<option value='$id'>$id</option>";
            }
            ?>
        </select>
        <br><br>

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
       

        <div class="form-group">
            <input type="submit" name="submitstandard" value="Assign subject to standard">
        </div>
    </form>
</body>

</html>

<?php
include 'dbconn.php';
if (isset($_POST['submitstandard'])) {
    
    $student_name = $_POST['studentname'];
    $standard_name = $_POST['standardname'];

    $studentid = mysqli_insert_id($conn);
    $query1 = "SELECT user_id FROM userdata WHERE name = '$student_name'";
    $result2 = mysqli_query($conn, $query1);

    $row = mysqli_fetch_assoc($result2);
    $studentid = $row['user_id'];


    $standardrid = mysqli_insert_id($conn);
    $query = "SELECT id FROM standard WHERE standard_name = '$standard_name'";
    $result1 = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($result1);
    $standardid= $row['id'];

    $query2 = "INSERT INTO assignstudent (student_id, standard_id) VALUES ( '$studentid', '$standardid')";
    $result3 = mysqli_query($conn, $query2);

    if (!$result) {
        die('Query Failed!!' . mysqli_error($conn));
    }
    echo "<script> alert('Form details inserted successfully!');</script>";
}

?>