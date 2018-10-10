<?php
  session_start();
  if(isset($_SESSION['login']))
  {
    header('Location: ./zalogowany.php');
  }
?>

<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <title>Logowanie</title>
  </head>
  <body>
    <form method="post">
      <input type="text" name="login" placeholder="login"><br><br>
      <input type="password" name="haslo" placeholder="hasło"><br><br>
      <input type="submit" name="przycisk" value="Zaloguj">
    </form>
    <?php

    if (isset($_POST['przycisk'])) {
      if (empty($_POST['login']) || empty($_POST['haslo'])) {
        echo "<br><span style=\"color:red;\">Uzupełnij wszystkie pola!</span>";
      }
      else {
        if ($_POST['login'] == 'jan' && $_POST['haslo'] == 'tajne') {
          $_SESSION['login'] = $_POST['login'];
          header('Location: ./zalogowany.php');
        }
        else {
          echo "<br><span style=\"color:red;\">Błędny login lub hasło!</span>";
        }
      }
    }


    ?>
  </body>
</html>
