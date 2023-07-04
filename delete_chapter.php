<?php

include 'dbconn.php';

$id = $_GET['delete'];
$query = "Delete FROM chapter WHERE id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if ($result){
    echo "<script> alert ('Chapter delete sucessfully..'); window.location.href='chapter.php'</script>";
}
?>