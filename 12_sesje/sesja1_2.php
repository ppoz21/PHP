<?php

  session_start();
  unset($_SESSION['imie']);

?>

<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <title>Sesja strona 1_2</title>
  </head>
  <body>
    <h3>Strona 1_1</h3>
    Witamy
    <?php
      echo $_SESSION['imie'], " na 3 stronie!<br>";
      echo "Identyfikator sesji: ", session_id();
    ?>
    <hr>
    <a href="./sesja1.php">Strona 1</a>
  </body>
</html>
