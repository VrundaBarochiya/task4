<?php

include 'dbconn.php';

$id = $_GET['delete'];
$query = "Delete FROM standard WHERE id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if ($result){
    echo "<script> alert ('standard delete sucessfully..'); window.location.href='standard.php'</script>";
}
?>