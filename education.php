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
    <title>Education desk</title>
    <style>
        button {
            background-color: #3ca9e2;
            border: 1px solid transparent;
            border-radius: 3px;
            box-shadow: rgba(255, 255, 255, .4) 0 1px 0 0 inset;
            box-sizing: border-box;
            color: black;
            cursor: pointer;
            display: inline-block;
            font-size: 20px;
            font-weight: 500;
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
            width: 250px;
        }

        .sec a {
            display: inline-block;
            padding: 50px 80px;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <div class="sec">
    <h1>Education Options</h1>
    <br>
    <a href="standard.php" name="addstandard"><button>Add Standard</button></a>
    <a href="subject.php" name="addsubject"><button>Add Subject</button></a>
    <a href="chapter.php" name="addchapter"><button>Add Chapters </button></a>
    </div>
</body>

</html>