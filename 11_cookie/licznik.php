<?php

  if (!isset($_COOKIE['licznik'])) {
    $licznik = 1;
  }
  else {
    $licznik = $_COOKIE['licznik'];
    $licznik++;
  }
  $dni = 10;
  setcookie('licznik', $licznik, time()+60*60*24*$dni);
?>
<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <title>Licznik</title>
  </head>
  <body>
    <?php
      //echo $licznik;
      if ($licznik == 1) {
        echo "Liczba odwiedzin w ciągu ostatnich $dni dni: <span style=\"color:red\">$licznik</span> raz.";
      }
      else {
        echo "Liczba odwiedzin w ciągu ostatnich $dni dni: <span style=\"color:red\">$licznik</span> razy.";
      }
    ?>
    <br>
    <a href="./wyzerujLicznik.php?usun=1">Wyzeruj licznik!</a>
  </body>
</html>
