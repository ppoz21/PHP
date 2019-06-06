<?php
session_start();
if(isset($_POST['username']) && isset($_POST['adminpass']) && isset($_POST['userpass']))
{
  require_once './connect_mysql.php';
  $sql = "SELECT password from users where username = \"$_SESSION[login]\"";
  $kwerenda = $conn->query($sql);
  $wynik = $kwerenda->fetch_row();
  if(hash('sha512', $_POST['adminpass']) == $wynik[0])
  {
    if (empty($_POST['username']) || empty($_POST['userpass'])) {
      header('Location: ./../../?tresc=zarzadzanie&funkcja=zmien_haslo&blad=1');
    }
    else {
      $username = htmlspecialchars(trim($_POST['username']));
      $userpass = hash('sha512', $_POST['userpass']);
      $sql2 = "SELECT username from users where username = \"$username\"";
      $zapytanie = $conn->query($sql2);
      if($zapytanie->fetch_row())
      {
        $sql3 = "UPDATE users SET password = \"$userpass\" WHERE username = \"$username\"";
        $conn->query($sql3);
        $conn->close();
        header('Location: ./../../?tresc=zarzadzanie&funkcja=zmien_haslo&sukces=');
      }
      else {
        $conn->close();
        header('Location: ./../../?tresc=zarzadzanie&funkcja=zmien_haslo&blad=2');
      }
    }
  }
  else
  {
    $conn->close();
    header('Location: ./../../?tresc=zarzadzanie&funkcja=zmien_haslo&blad=0');
  }
}
else
{
  header('Location: ./../../?tresc=zarzadzanie&funkcja=zmien_haslo');
}

?>
