<?php
  session_start();
  include_once("db.php");
  if(!isset($_USERNAME)) {
    header("Location: login.php");
    return;
  }

  if(!isset($_GET['pid'])) {
    header("Location: index.php");
  }else {
    $pid = $_GET['pid1'];
    $sql = "DELETE FROM posts where id=$pid";
    mysqli_query($db, $sql);
    header("Location: index.php");
  }

 ?>
