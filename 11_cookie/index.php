<?php
  if (isset($_GET['usun'])) {
    setcookie('wiek', '');
    header('location: index.php');
  }
  elseif (empty($_COOKIE['wiek']) && empty($_GET['wiek'])) {
    require_once './header.html';
    require_once './form.html';
    require_once './footer.html';
  }
  elseif (!empty($_GET['wiek'])) {
    setcookie('wiek', $_GET['wiek'], time()+60*60*24*30);
    require_once './header.html';
    echo "<p>Dziękujemy za podanie danycyh</p>";
    echo "<a href=\"index.php?usun=\">Powrót do formularza</a>";
    require_once './footer.html';
  }
  else {
    require_once './header.html';
    echo "Twój wiek: $_COOKIE[wiek]<br>";
    echo "<a href=\"usunWiek.php?usunWiek=1\">Usuń wiek</a>";
    require_once './footer.html';
  }

  if(isset($_GET['cookie'])){
    echo "<span style=\"color:red\">Usunąłeś swoje dane</span>";
  }
?>
