<?php

include 'dbconn.php';

$id = $_GET['delete'];
$query = "Delete FROM userdata WHERE user_id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if ($result){
    echo "<script> alert ('user delete sucessfully..'); window.location.href='listuser.php'</script>";
}
?>