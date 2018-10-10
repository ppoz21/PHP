<?php
  session_start();
  if(!isset($_SESSION['login']))
  {
    header('Location: ./login.php');
  }
?>
<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <title>Zalogowany</title>
  </head>
  <body>
    Witaj <?php echo($_SESSION['login']); ?>!<br><br>
    <a href="wyloguj.php">Wyloguj się!</a>
  </body>
</html>
