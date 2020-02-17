<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" type="text/css" href="../css/forum.css">
    <link rel="stylesheet" type="text/css" href="../css/index.css">
    <meta charset="utf-8">
    <title>Forum</title>
  </head>
  <body>
    <div id="container">
      <?php
        include_once("sidebar.php");
      ?>

      <div id="forum_content">

        <h1>Forum</h1>
        <form id="new_topic" action="" method="post">
          <a>Subject</a>
          <input type="text" name="subject">
          <a>Description</a>
          <textarea type="text" name="description"></textarea>
          <a>Date</a>
          <input type="date" name="date">
          <a>User</a>
          <input type="text" name="user">
          <button type="submit">Submit</button>
        </form>



        <?php

        // CONECTION
          $hostname = "localhost";
          $username = "user_php";
          $password = "passwordToDbPhp";
          $db = "gsl";

          $dbconnect=mysqli_connect($hostname,$username,$password,$db);

          if ($dbconnect->connect_error) {
            die("Database connection failed: " . $dbconnect->connect_error);
          }


        // ADD DATA
          $subject = $_POST['subject'];
          $description = $_POST['description'];
          $date = $_POST['date'];
          $user = $_POST['user'];

          if (strlen($subject) > 5 && strlen($description) > 10) {
            $add = mysqli_query($dbconnect, "INSERT INTO topics (subject, description, date, user)
            VALUES ('$subject', '$description', '$date', '$user')")
               or die (mysqli_error($dbconnect));
          } else {
            echo '<script type="text/JavaScript">
              alert("Subject has to be greater than 25 characters and Description 20");
            </script>';
          }


        // SHOW DATA
          $query = mysqli_query($dbconnect, "SELECT * FROM topics")
             or die (mysqli_error($dbconnect));

          foreach ($query as $post) {
            echo "<table border=\"1\" align=\"center\">";
              echo "<tr>";
                echo "<th>{$post['subject']}</th>";
              echo "</tr>";
              echo "<tr>";
                echo "<th>{$post['description']}</th>";
              echo "</tr>";
              echo "<tr>";
                echo "<th>{$post['date']} | {$post['user']}</th>";
              echo "</tr>";
            echo "</table>";
          }

        ?>
      </div>
      <div id="forum_info">
        <table>
          <tr>
            <th>Foruns</th>
          </tr>
          <tr>
            <th>forum_list 1 312</th>
          </tr>
          <tr>
            <th>forum_list 32131</th>
          </tr>
          <tr>
            <th>131231 </th>
          </tr>
          <tr>
            <th>forum_listasdada</th>
          </tr>
          <tr>
            <th>f_list</th>
          </tr>
          <tr>
            <th>st 2313131</th>
          </tr>
          <tr>
            <th>isdasdat</th>
          </tr>
        </table>
      </div>
    </div>

</body>
</html>
