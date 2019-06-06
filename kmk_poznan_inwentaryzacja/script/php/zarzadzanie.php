<div class="jumbotron">
  <h1 class="display-4">Zarządzanie użytkownikami</h1>
  <p class="lead">Za pomocą tego panelu możesz dodawać lub usuwac konta użytkowników, a także zmieniać ich hasła</p>
  <hr class="my-4">
  <?php
    if (isset($_GET['funkcja'])) {
      if ($_GET['funkcja'] == 'dodaj') {
  ?>
  <form method="post" action="./script/php/add_usr.php">
    <h2 class="display-4">Dodaj użytkownika</h2>
    <div class="form-group">
      <label for="username">Nazwa użytkownika</label>
      <input type="text" class="form-control" id="username" aria-describedby="username" placeholder="Nazwa użytkownika" name="username" autocomplete="off">
      <small id="username" class="form-text text-muted">Wprowadź nazwę użytkownika</small>
      <br>
      <label for="userpass">Hasło dla użytkownika</label>
      <input type="text" class="form-control" id="userpass" aria-describedby="pass" placeholder="Wpisz hasło użytkownika" name="userpass" value="kmkpoznan" autocomplete="off">
      <small id="pass" class="form-text text-muted">Hasło wymagane dla użytkownika (domyslnie kmkpoznan)</small>
      <br>
      <label for="imie">Imię</label>
      <input type="text" class="form-control" id="imie"  placeholder="Jan" name="imie" value="" autocomplete="off">
      <br>
      <label for="nazwisko">Nazwisko</label>
      <input type="text" class="form-control" id="nazwisko"  placeholder="Kowalski" name="nazwisko" value="" autocomplete="off">
      <br>
      <label for="email">Adres e-mail</label>
      <input type="email" class="form-control" id="email" placeholder="osoba@domena.pl" name="email" value="" autocomplete="off">
      <br>
      <label for="telefon">Numer telefonu</label>
      <input type="text" class="form-control" id="telefon"  placeholder="123456789" name="telefon" value="" autocomplete="off">
      <br>
      <label for="typ">Typ konta</label><br>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="customRadioInline1" name="typ" class="custom-control-input" value="0" checked>
        <label class="custom-control-label" for="customRadioInline1">Użytkownik</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="customRadioInline2" name="typ" class="custom-control-input" value="1">
        <label class="custom-control-label" for="customRadioInline2">Prezes</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="customRadioInline3" name="typ" class="custom-control-input" value="2">
        <label class="custom-control-label" for="customRadioInline3">Administrator</label>
      </div>
      <br>
      <br>
      <label for="userpass">Hasło administratora</label>
      <input type="password" class="form-control" id="adminpass" aria-describedby="admin" placeholder="Wpisz hasło administratora" name="adminpass" autocomplete="off">
      <small id="admin" class="form-text text-muted">Hasło wymagane do potwierdzenia operacji</small>
    </div>
    <?php
      if (isset($_GET['blad'])) {
        $blad = $_GET['blad'];
    ?>
    <hr class="my-4">
    <?php
      switch ($blad) {
        case '0':
          echo "<span style=\"color:red;\">Błędne hasło administratora!</span>";
          break;
        case '1':
          echo "<span style=\"color:red;\">Nazwa użytkownika lub hasło nie może być puste!</span>";
          break;
        case '2':
          echo "<span style=\"color:red;\">Podany użytkownik już istnieje!</span>";
          break;
      }
    ?>

    <hr class="my-4">
    <?php } ?>
    <?php
      if (isset($_GET['sukces'])) {
    ?>
    <hr class="my-4">
      <span style="color: green;">Poprawne utworzenie użytkownika!</span>
    <hr class="my-4">
    <?php } ?>
    <input type="submit" class="btn btn-success" name="dodaj" value="Dodaj użytkownika">
  </form>
  <?php
    }elseif ($_GET['funkcja'] == 'usun') {

?>
  <form method="post" action="./script/php/del_usr.php">
    <h2 class="display-4">Usuń użytkownika</h2>
    <div class="form-group">
      <label for="username">Nazwa użytkownika</label>
      <input type="text" class="form-control" id="username" aria-describedby="username" placeholder="Nazwa użytkownika" name="username" autocomplete="off">
      <small id="username" class="form-text text-muted">Wprowadź nazwę użytkownika</small>
      <br>
      <label for="userpass">Hasło administratora</label>
      <input type="password" class="form-control" id="adminpass" aria-describedby="admin" placeholder="Wpisz hasło administratora" name="adminpass" autocomplete="off">
      <small id="admin" class="form-text text-muted">Hasło wymagane do potwierdzenia operacji</small>
    </div>
    <?php
      if (isset($_GET['blad'])) {
        $blad = $_GET['blad'];
    ?>
    <hr class="my-4">
    <?php
      switch ($blad) {
        case '0':
          echo "<span style=\"color:red;\">Błędne hasło administratora!</span>";
          break;
        case '1':
          echo "<span style=\"color:red;\">Nazwa użytkownika nie może być pusta!</span>";
          break;
        case '2':
          echo "<span style=\"color:red;\">Podany użytkownik nie istnieje!</span>";
          break;
      }
    ?>

    <hr class="my-4">
    <?php } ?>
    <?php
      if (isset($_GET['sukces'])) {
    ?>
    <hr class="my-4">
      <span style="color: green;">Poprawne usunięcie użytkownika!</span>
    <hr class="my-4">
    <?php } ?>
    <input type="submit" class="btn btn-danger" name="usun" value="Usuń użytkownika">
  </form>
  <?php
    }elseif ($_GET['funkcja'] == 'zmien_haslo') {
  ?>
  <form method="post" action="./script/php/chg_usr_pass.php">
    <h2 class="display-4">Zmień hasło użytkownika</h2>
    <div class="form-group">
      <label for="username">Nazwa użytkownika</label>
      <input type="text" class="form-control" id="username" aria-describedby="username" placeholder="Nazwa użytkownika" name="username" autocomplete="off">
      <small id="username" class="form-text text-muted">Wprowadź nazwę użytkownika</small>
      <br>
      <label for="userpass">Hasło użytkownika</label>
      <input type="text" class="form-control" id="userpass" aria-describedby="user" placeholder="Wpisz nowe hasło dla użytkownika" name="userpass" value="kmkpoznan" autocomplete="off">
      <small id="user" class="form-text text-muted">Nowe hasło dla użytkownika</small>
      <br>
      <label for="adminpass">Hasło administratora</label>
      <input type="password" class="form-control" id="adminpass" aria-describedby="admin" placeholder="Wpisz hasło administratora" name="adminpass" autocomplete="off">
      <small id="admin" class="form-text text-muted">Hasło wymagane do potwierdzenia operacji</small>
    </div>
    <?php
      if (isset($_GET['blad'])) {
        $blad = $_GET['blad'];
    ?>
    <hr class="my-4">
    <?php
      switch ($blad) {
        case '0':
          echo "<span style=\"color:red;\">Błędne hasło administratora!</span>";
          break;
        case '1':
          echo "<span style=\"color:red;\">Nazwa użytkownika i hasło nie mogą być puste!</span>";
          break;
        case '2':
          echo "<span style=\"color:red;\">Podany użytkownik nie istnieje!</span>";
          break;
      }
    ?>

    <hr class="my-4">
    <?php } ?>
    <?php
      if (isset($_GET['sukces'])) {
    ?>
    <hr class="my-4">
      <span style="color: green;">Poprawna zmiana hasła!</span>
    <hr class="my-4">
    <?php } ?>
    <input type="submit" class="btn btn-warning" name="zmien" value="Zmień hasło użytkownika" style="color: white;">
  </form>
<?php
      }
    }
    else {
  ?>
  <a href="./?tresc=zarzadzanie&funkcja=dodaj" class="bez_podkr" style="color:white;"><button type="button" class="btn btn-success" >Dodaj użytkownika</button></a>
  <hr class="my-4">
  <a class="bez_podkr" href="./?tresc=zarzadzanie&funkcja=usun" style="color:white;"><button type="button" class="btn btn-danger">Usuń użytkownika</button></a>
  <hr class="my-4">
  <a class="bez_podkr" href="./?tresc=zarzadzanie&funkcja=zmien_haslo" style="color:white;"><button type="button" class="btn btn-warning" style="color: white;">Zmień hasło użytkownika</button></a>
  <hr class="my-4">
<?php } ?>

</div>
