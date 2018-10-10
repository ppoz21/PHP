<?php

  session_start();
  $_SESSION['imie'] = 'Janusz';

?>

<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <title>Sesja strona 1</title>
  </head>
  <body>
    <h3>Strona 1</h3>
    Witamy
    <?php
      echo $_SESSION['imie'], " na stronie!<br>";
      echo "Identyfikator sesji: ", session_id();
    ?>
    <hr>
    <a href="./sesja1_1.php">Strona 2</a>
    <br>
    <a href="?usunSesje=1">Usuń sesję</a>
    <?php

      if(isset($_GET['usunSesje']) && $_GET['usunSesje'] == 1)
      {
        session_destroy();
        header('Location: ./sesja1.php');
      }

    ?>
  </body>
</html>
