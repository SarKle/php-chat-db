<?php
session_start();
include"dbh.php";

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Home</title>
</head>
<body>
  <div id="main">
    <h1> Online </h1>

    <?php echo $_SESSION["pseudo"]; ?>

      <div class="output">
        <?php
          $sql=('SELECT * FROM messages');
            $result=$bd->query($sql);
              if($result->num_rows >0){
                while($row=$result->fetch_assoc()){
                  echo "".$row["pseudo"].""."::".$row["send"]."".$row["date"]."<br>";
                  echo "<br>";
                }
              }
              else{
                echo "0 results";
              }
              $bd->close();
        ?>

      </div>

        <form action="send.php" method="post">
          <textarea name="msg" placeholder="Ecrivez votre message..."> </textarea>
          <input type="submit" name="send" value="Envoi">
        </form>

        <form action"logout.php">
          <input type="submit" value="logout">
        </form>
  </div>
</body>
</html>
