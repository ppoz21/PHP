    <?php
    $login = "";
    $haslo = "";
    if (isset($_COOKIE['login']) || isset($_COOKIE['haslo'])) {
      $login = base64_decode($_COOKIE['login']);
      $haslo = base64_decode($_COOKIE['haslo']);
    }

    ?>
    <div class="jumbotron" id="logowanie">
      <h1 class="display-4">Poznański Klub Modelarzy Kolejowych</h1>
      <p class="lead">Serwis inwentaryzacyjny</p>
      <hr class="my-4">
      <form method="post" action="./script/php/login.php">
        <div class="form-group">
          <label for="login">Login:</label>
          <input type="text" name="login" class="form-control" id="login" autocomplete="off" placeholder="Tu wpisz swój login" value="<?php echo "$login"; ?>" required>
        </div>
        <div class="form-group">
          <label for="haslo">Hasło:</label>
          <input type="password" name="haslo" class="form-control" id="haslo" placeholder="Tu wpisz hasło" value="<?php echo "$haslo"; ?>" required>
        </div>
        <div class="form-group form-check">
          <?php if (isset($_COOKIE['login']) || isset($_COOKIE['haslo'])) { ?>
          <input type="checkbox" name="remember" class="form-check-input" id="zapamietaj" value="1" checked>
        <?php }else{ ?>
          <input type="checkbox" name="remember" class="form-check-input" id="zapamietaj" value="1">
        <?php } ?>
          <label class="form-check-label" for="zapamietaj">Zapamiętaj mnie</label>
        </div>
        <?php
          if(isset($_GET['blad'])){
          if ($_GET['blad'] == 1) {
        ?>
          <hr>
          <span style="color:red;">Wpisz login i hasło</span>
          <hr>
        <?php
          }
          else if ($_GET['blad'] == 2) {

        ?>
        <hr>
        <span style="color:red;">Błędny login lub hasło</span>
        <hr>
      <?php } }?>
        <input type="submit" name="przycisk" class="btn btn-success" value="Zaloguj się"></input>
      </form>
      <hr class="my-4">

    </div>
