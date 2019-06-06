<?php

  session_start();

  if(isset($_POST['biezace_haslo']) && isset($_POST['nowe_haslo']) && isset($_POST['pow_haslo']))
  {
    if (empty($_POST['biezace_haslo']) || empty($_POST['nowe_haslo']) || empty($_POST['pow_haslo'])) {
      header('Location: ./../../?tresc=ustawienia&opcja=1&blad=0');
    }
    else {
      $stare = hash('sha512', $_POST['biezace_haslo']);
      $nowe = hash('sha512', $_POST['nowe_haslo']);
      $powt = hash('sha512',$_POST['pow_haslo']);
      require_once './connect_mysql.php';
      $login = $_SESSION['login'];
      $haslo = hash('sha512', $_POST['haslo']);
      $sql = "SELECT password from users where username = \"$login\"";
      $kw = $conn->query($sql);
      $wiersz = $kw->fetch_row();
      if ($stare == $wiersz[0])
      {
        if ($nowe == $stare) {
          header('Location: ./../../?tresc=ustawienia&opcja=1&blad=3');
        }
        else {
          if ($nowe == $powt) {
            $sql = "UPDATE users set password = \"$nowe\" where username = \"$login\"";
            $conn->query($sql);
            $conn->close();
            header('Location: ./../../?tresc=ustawienia&sukces=1');
          }
          else {
            $conn->close();
            header('Location: ./../../?tresc=ustawienia&opcja=1&blad=2');
          }
        }
      }
      else {
        header('Location: ./../../?tresc=ustawienia&opcja=1&blad=1');
      }

    }
  }
  else {
    header('Location: ./../../?tresc=ustawienia&opcja=1');
  }

?>
