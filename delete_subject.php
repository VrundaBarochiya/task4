<?php

include 'dbconn.php';

$id = $_GET['delete'];
$query = "Delete FROM subject WHERE id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if ($result){
    echo "<script> alert ('Subject delete sucessfully..'); window.location.href='subject.php'</script>";
}
?>