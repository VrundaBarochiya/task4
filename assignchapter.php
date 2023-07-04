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
  <title>Assign Chap to subject</title>
  <style>
    .form-group {
      width: 50%;
      float: left;
      margin: 100px 10px;
    }

    table {
      border: 1px solid black;
      border-spacing: 0;
      float: right;
      margin-top: 50px;
      margin-right: 100px;
    }

    th,
    td {
      border: 1px solid black;
      padding: 5px;
      text-align: center;
    }

    input[type="submit"] {
      border: 1px solid black;
      margin: 10px 10px 0px 0px;
      background: lightgray;
      text-transform: uppercase;
      cursor: pointer;
      font-size: 18px;
      position: relative;
      text-align: center;
    }

    .sclt {
      margin: 0px 30px 0px 10px;
      outline: 0;
      background: lightgrey;
      width: 100%;
      height: 100%;
      color: black;
      cursor: pointer;
      border: 1px solid black;
      border-radius: 3px;
      text-align: center;
      position: relative;
      display: inline-block;
      width: 10em;
      height: 2.5em;
      line-height: 3;
      border-radius: .25em;
      padding-bottom: 10px;
    }

    h1 {
      color: green;
    }
  </style>
</head>

<body>
  <form action="" method="post">
    <div class="form-group">
      <label for="user_type"><b>Select Subject:</b></label>
      <select class="sclt" name="subjectname">
        <?php

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

      <b><label>Add Chapters:</label><b>
          <select class="sclt" name="chaptername">

            <?php
            include 'dbconn.php';

            $query = "SELECT chapter_name FROM chapter";

            $result = mysqli_query($conn, $query);

            if (!$result) {
              die('Try again');
            }
            

            while ($row = mysqli_fetch_assoc($result)) {
              $id = $row['chapter_name'];
              echo "<option value='$id'>$id</option>";
            }
            ?>
          </select>
          <br><br>
          <input type="submit" name="submitchap" value="Add Chapters">
          <input type="submit" name="back" value="Back">
    </div>
  </form>
</body>

</html>

<?php
include 'dbconn.php';
if (isset($_POST['submitchap'])) {

  $chapter_name = $_POST['chaptername'];
  $subject_name = $_POST['subjectname'];

  $chapterid = mysqli_insert_id($conn);
  $query = "SELECT id FROM chapter WHERE chapter_name = '$chapter_name'";
  $result1 = mysqli_query($conn, $query);


  $row = mysqli_fetch_assoc($result1);
  $chapterid = $row['id'];

  $subjectid = mysqli_insert_id($conn);
  $query1 = "SELECT id FROM subject WHERE subject_name = '$subject_name'";
  $result2 = mysqli_query($conn, $query1);

  $row = mysqli_fetch_assoc($result2);
  $subjectid = $row['id'];
  // print_r($access_id);
  $query2 = "INSERT INTO assignchap (chap_id, subject_id) VALUES ( '$chapterid', '$subjectid')";
  $result3 = mysqli_query($conn, $query2);
  // print_r($result3);
  if (!$result) {
    die('Query Failed!!' . mysqli_error($conn));
  }
  echo "<script> alert('Form details inserted successfully!');</script>";
}
?>

<?php

$sqlSelect = "select * from assignchap";

$result = mysqli_query($conn, $sqlSelect);

if (mysqli_num_rows($result) > 0) {
  ?>
  <br><br>
  <table>
    <tr>
      <th>ID</th>
      <th>chapter ID</th>
      <th>Subject ID</th>
    </tr>
    <?php
    while ($row = mysqli_fetch_array($result)) {
      ?>
      <tr>
        <td>
          <?php echo $row['id']; ?>
        </td>
        <td>
          <?php echo $row['chap_id']; ?>
        </td>
        <td>
          <?php echo $row['subject_id']; ?>
        </td>
      </tr>
      <?php
    }
    ?>
  </table>
  <?php

}
?>