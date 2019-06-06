<div class="jumbotron">
  <?php
    if (isset($_GET['sukces'])) {
      if($_GET['sukces'] == 1) {
  ?>
  <h1 class="display-4">Poprawnie zmieniono hasło!</h1>
  <hr class="my-4">
  <form action="./script/php/ust_opcje.php" method="post">
    <div class="input-group">
      <select class="custom-select" id="inputGroupSelect04" aria-label="Wybór opcji" name="opcja">
        <option value="1" selected>Zmiana hasła</option>
        <option value="2">Zmiana danych</option>
      </select>
      <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="submit" name="przycisk">Wybierz opcję</button>
      </div>
    </div>
  </form>
  <hr class="my-4">
<?php  }elseif ($_GET['sukces'] == 2) {
  ?>
  <h1 class="display-4">Poprawnie zmieniono dane!</h1>
  <hr class="my-4">
  <form action="./script/php/ust_opcje.php" method="post">
    <div class="input-group">
      <select class="custom-select" id="inputGroupSelect04" aria-label="Wybór opcji" name="opcja">
        <option value="1" selected>Zmiana hasła</option>
        <option value="2">Zmiana danych</option>
      </select>
      <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="submit" name="przycisk">Wybierz opcję</button>
      </div>
    </div>
  </form>
  <hr class="my-4">
<?php }}else{ ?>
  <h1 class="display-4">Ustawienia konta</h1>
  <hr class="my-4">
  <form action="./script/php/ust_opcje.php" method="post">
    <div class="input-group">
      <select class="custom-select" id="inputGroupSelect04" aria-label="Wybór opcji" name="opcja">
        <option value="1" selected>Zmiana hasła</option>
        <option value="2">Zmiana danych</option>
      </select>
      <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="submit" name="przycisk">Wybierz opcję</button>
      </div>
    </div>
  </form>
  <hr class="my-4">
  <?php  if(isset($_GET['opcja'])){if($_GET['opcja'] == 1){?>
  <h2 class="my-4">Zmień hasło</h2>
  <hr class="my-4">
  <p>Aby zmienić hasło skorzystaj z poniższego formularza:</p>
  <form action="script/php/zmien_haslo.php" method="post">
    <div class="form-group">
      <label for="biezace_haslo">Bieżące hasło</label>
      <input type="password" class="form-control" id="biezace_haslo" aria-describedby="pomoc1" placeholder="Wpisz obecne hasło" name="biezace_haslo" autocomplete="off">
      <small id="pomoc1" class="form-text text-muted">Domyślne hasło to 'kmkpoznan', jeśli nie pamiętasz hasła skontaktuj się z administratorem</small>
    </div>
    <div class="form-group">
      <label for="nowe_haslo">Nowe hasło</label>
      <input type="text" class="form-control" id="nowe_haslo" aria-describedby="pomoc2" placeholder="Wpisz nowe hasło" name="nowe_haslo" autocomplete="off">
      <small id="pomoc2" class="form-text text-muted">Wpisz nowe hasło</small>
      <label for="pow_haslo">Powtórz hasło</label>
      <input type="text" class="form-control" id="pow_haslo" aria-describedby="pomoc3" placeholder="Wpisz nowe hasło" name="pow_haslo" autocomplete="off">
      <small id="pomoc3" class="form-text text-muted">Powtórz hasło</small>
    </div>
    <?php
        if(isset($_GET['blad']))
        {
          if ($_GET['blad'] == 1) {
    ?>
    <hr>
    <span style="color:red;">Błędne hasło bieżące!</span>
    <hr>
    <?php }elseif ($_GET['blad'] == 2) {
    ?>
    <hr>
    <span style="color:red;">Wprowadzone hasła są różne!</span>
    <hr>
    <?php
  }elseif ($_GET['blad'] ==3) {
    ?>
    <hr>
    <span style="color:red;">Stare i nowe hasło nie może być identyczne!</span>
    <hr>
    <?php
  }elseif ($_GET['blad'] ==0) {
    ?>
    <hr>
    <span style="color:red;">Nie wprowadzono wszystkich danych</span>
    <hr>
    <?php  }}?>
    <button type="submit" name="zmien" class="btn btn-danger">Zmień hasło</button>
  </form>
<?php }elseif ($_GET['opcja'] == 2) {
  require_once './script/php/connect_mysql.php';
  $username = $_SESSION['login'];
  $sql = "SELECT imie, nazwisko, email, telefon from users where username = \"$username\"";
  $kwerenda = $conn->query($sql);
  $wiersz = $kwerenda->fetch_row();
  $imie = $wiersz[0];
  $nazwisko = $wiersz[1];
  $email = base64_decode($wiersz[2]);
  $telefon = base64_decode($wiersz[3]);
?>
<h2 class="my-4">Zmień swoje dane</h2>
<hr class="my-4">
<p>Aby zmienić dane skorzystaj z poniższego formularza (formularz zawiera obecne dane):</p>
<form action="script/php/zmien_dane.php" method="post">
  <div class="form-group">
    <label for="imie">Imię</label>
    <input type="text" class="form-control" id="imie" aria-describedby="imie" placeholder="Imię" name="imie" value="<?php echo $imie?>" autocomplete="off">
    <label for="nazwisko">Nazwisko</label>
    <input type="text" class="form-control" id="nazwisko" aria-describedby="nazwisko" placeholder="Nazwisko" name="nazwisko" value="<?php echo $nazwisko?>" autocomplete="off">
    <label for="email">Adres e-mail</label>
    <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="jan@kowalski.pl" name="email" value="<?php echo $email?>" autocomplete="off">
    <label for="telefon">Numer telefonu</label>
    <input type="text" class="form-control" id="telefon" aria-describedby="telefon" placeholder="123456789" name="telefon" value="<?php echo $telefon?>" autocomplete="off">
  </div>
  <div class="form-group">
    <label for="haslo">Hasło</label>
    <input type="password" class="form-control" id="haslo" aria-describedby="pomoc1" placeholder="Wpisz obecne hasło" name="haslo" autocomplete="off">
    <small id="pomoc1" class="form-text text-muted">Aby zmienić dane musisz podać swoje obecne hasło!</small>
  </div>
  <?php
      if(isset($_GET['blad']))
      {
        if ($_GET['blad'] == 1) {
  ?>
    <hr>
    <span style="color:red;">Błędne hasło!</span>
    <hr>
  <?php }if ($_GET['blad'] == 2){ ?>
    <hr>
    <span style="color:red;">Musisz wpisać hasło!!</span>
    <hr>
  <?php }} ?>
  <button type="submit" name="zmien" class="btn btn-warning">Zmień dane</button>
</form>
<?php $conn->close();}} ?>
<?php } ?>
</div>
