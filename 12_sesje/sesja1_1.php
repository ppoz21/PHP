<?php

  session_start();

?>

<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <title>Sesja strona 1_1</title>
  </head>
  <body>
    <h3>Strona 1_1</h3>
    Witamy
    <?php
      echo $_SESSION['imie'], " na 2 stronie!<br>";
      echo "Identyfikator sesji: ", session_id();
    ?>
    <hr>
    <a href="./sesja1_2.php">Strona 3</a>
  </body>
</html>
