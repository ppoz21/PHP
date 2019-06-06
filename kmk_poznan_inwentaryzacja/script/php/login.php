<?php

  session_start();

  if(isset($_POST['przycisk']))
  {
    if(empty($_POST['login']) || empty($_POST['haslo']))
    {
      header('location: ./../../?blad=1');
    }
    else {
      require './connect_mysql.php';
      $login = $conn->real_escape_string(htmlspecialchars(trim($_POST['login'])));
      $haslo = $conn->real_escape_string(htmlspecialchars(trim(hash('sha512', $_POST['haslo']))));
      $pobierzhaslo = "SELECT password from users where username = \"$login\"";
      $kwerenda = $conn->query($pobierzhaslo);
      $pobranehaslo = $kwerenda->fetch_row();
      if ($pobranehaslo[0] == $haslo) {
        $pobierz_aut_stac = "SELECT autorisation, stacja from users where username = \"$login\"";
        $kwerenda = $conn->query($pobierz_aut_stac);
        $pobrane = $kwerenda->fetch_row();
        if ($_POST['remember'] == 1) {
          $login_cookie = base64_encode($login);
          setcookie("login", "$login_cookie", time()+86400*365, "/");
          setcookie("haslo", "$haslo", time()+86400*365, "/");
        }
        $_SESSION['autoryzacja'] = $pobrane[0];
        $_SESSION['stacja'] = $pobrane[1];
        $_SESSION['login'] = $login;
        $conn->close();
        header('location: ./../../');
      }
      else {
        $conn->close();
        header('location: ./../../?blad=2');
      }
    }
  }
  else {
    header('location: ./../../');
  }
?>
