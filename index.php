<?php
session_start();
include_once("db.php");
?>

<!Doctype html>
<html>
  <head>
    <title>Blog</title>

  </head>
  <body>
    <?php
      require_once("nbbc/nbbc.php");
      $bbcode = new BBcode;
      $sql = "SELECT * FROM posts ORDER BY id DESC";
      $res = mysqli_query($db, $sql) or die(mysqli_error());
      $posts = "";

      if(mysqli_num_rows($res) > 0) {
        while($row = mysqli_fetch_assoc($res)) {
          $id = $row['id'];
          $title = $row['title'];
          $content = $row['content'];
          $date = $row['date'];

          $admin = "<div><a href = 'del_post.php?pid=$id'>Delete</a>&nbsp;<a href = 'edit_post.php?pid=$id'>Edit</a</div";

          $output = $bbcode->Parse($content);
          $posts .= "<div><h2><a href= 'view_post.php?id=$id'>$title</a></h2><h3>$date</h3><p>$output</p>$admin<hr /></div>";
          }

          echo $posts;
        } else {
          echo "Er zijn geen posts";
        }


     ?>

  </body>
<html>
