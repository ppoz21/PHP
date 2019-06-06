<?php
session_start();
if(isset($_POST['username']) && isset($_POST['adminpass']))
{
  require_once './connect_mysql.php';
  $sql = "SELECT password from users where username = \"$_SESSION[login]\"";
  $kwerenda = $conn->query($sql);
  $wynik = $kwerenda->fetch_row();
  if(hash('sha512', $_POST['adminpass']) == $wynik[0])
  {
    if (empty($_POST['username'])) {
      header('Location: ./../../?tresc=zarzadzanie&funkcja=usun&blad=1');
    }
    else {
      $username = $conn->real_escape_string(htmlspecialchars(trim($_POST['username'])));
      $sql2 = "SELECT username from users where username = \"$username\"";
      $zapytanie = $conn->query($sql2);
      if($zapytanie->fetch_row())
      {
        $sql3 = "DELETE FROM users WHERE username = \"$username\"";
        $conn->query($sql3);
        $conn->close();
        header('Location: ./../../?tresc=zarzadzanie&funkcja=usun&sukces=');
      }
      else {
        $conn->close();
        header('Location: ./../../?tresc=zarzadzanie&funkcja=usun&blad=2');
      }
    }
  }
  else
  {
    $conn->close();
    header('Location: ./../../?tresc=zarzadzanie&funkcja=usun&blad=0');
  }
}
else
{
  header('Location: ./../../?tresc=zarzadzanie&funkcja=usun');
}

?>
