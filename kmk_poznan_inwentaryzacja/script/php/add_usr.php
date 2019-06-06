<?php
  session_start();
  function niepuste($var, $conn)
  {
    $var = htmlspecialchars(trim($var));
    if (!empty($var)){
    return $conn->real_escape_string($var);
    }
    else{
    return addslashes(NULL);
    }
  }
  if(isset($_POST['username']) && isset($_POST['userpass']) && isset($_POST['adminpass']))
  {
    require_once './connect_mysql.php';
    $sql = "SELECT password from users where username = \"$_SESSION[login]\"";
    $kwerenda = $conn->query($sql);
    $wynik =  $kwerenda->fetch_row();
    if(hash('sha512', $_POST['adminpass']) == $wynik[0])
    {
      if (empty($_POST['username']) || empty($_POST['userpass'])) {
        header('Location: ./../../?tresc=zarzadzanie&funkcja=dodaj&blad=1');
      }
      else
      {
        $username = $_POST['username'];
        $sql2 = "SELECT username from users where username = \"$username\"";
        $zapytanie = $conn->query($sql2);
        $polaczenie = $conn;
        if($zapytanie->fetch_row())
        {
          $conn->close();
          header('Location: ./../../?tresc=zarzadzanie&funkcja=dodaj&blad=2');
        }
        else
        {
          $pass = hash('sha512', $_POST['userpass']);
          $typ = $_POST['typ'];
          $imie = niepuste($_POST['imie'], $polaczenie);
          $nazwisko = niepuste($_POST['nazwisko'], $polaczenie);
          $email = niepuste(base64_encode($_POST['email']), $polaczenie);
          $telefon = niepuste(base64_encode($_POST['telefon']), $polaczenie);
          $sql3 = "INSERT INTO users(username, password, imie, nazwisko, email, telefon, autorisation) VALUES (\"$username\", \"$pass\", \"$imie\", \"$nazwisko\", \"$email\", \"$telefon\", \"$typ\")";
          $conn->query($sql3);
          $conn->close();
          header('Location: ./../../?tresc=zarzadzanie&funkcja=dodaj&sukces=');
        }
      }
    }
    else
    {
      $conn->close();
      header('Location: ./../../?tresc=zarzadzanie&funkcja=dodaj&blad=0');
    }
  }
  else
  {
    header('Location: ./../../?tresc=zarzadzanie&funkcja=dodaj');
  }

?>
