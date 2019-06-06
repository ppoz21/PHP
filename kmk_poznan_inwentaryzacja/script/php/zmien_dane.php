<?php
  function zabezpiecz($var, $polaczenie)
  {
    $var = htmlspecialchars(trim($var));
    if(!empty($var))
      $var = $polaczenie->real_escape_string($var);
    return $var;
  }
  session_start();
  if(!empty($_POST['haslo']))
  {
    require_once './connect_mysql.php';
    $login = $_SESSION['login'];
    $haslo = (hash('sha512', $_POST['haslo']);
    $sql = "SELECT password from users where username = \"$login\"";
    $kw = $conn->query($sql);
    $wiersz = $kw->fetch_row();
    if ($haslo == $wiersz[0])
    {
      $imie = zabezpiecz($_POST['imie'], $conn);
      $nazwisko = zabezpiecz($_POST['nazwisko'], $conn);
      $email = zabezpiecz(base64_encode($_POST['email']), $conn);
      $telefon = zabezpiecz(base64_encode($_POST['telefon']), $conn);
      $sql = "UPDATE users set imie = \"$imie\", nazwisko = \"$nazwisko\", email = \"$email\",telefon = \"$telefon\" where username = \"$login\" ";
      $conn->query($sql);
      $conn->close();
      header('Location: ./../../?tresc=ustawienia&sukces=2');
    }
    else {
      $conn->close();
      header('Location: ./../../?tresc=ustawienia&opcja=2&blad=1');
    }
  }
  else {
    header('Location: ./../../?tresc=ustawienia&opcja=2&blad=2');
  }

?>
