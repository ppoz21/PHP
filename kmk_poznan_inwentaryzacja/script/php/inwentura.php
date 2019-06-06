<?php
  if(empty($_SESSION['stacja']) && empty($_POST['stacja']))
  {
    if (isset($_GET['sukces'])) {
      echo "<h1 style=\"color: green\">Inwentaryzacja poprawna</h1>";
    }
?>
<h2>Nie posiadasz przypisanej na stałę stacji!</h2>
<h3>Możesz wybrać jedną z poniższych</h3>
<form action="./?tresc=inwentura" method="post">
  <div class="input-group">
    <select class="custom-select" name="stacja">
      <option selected value="">Wybierz opcję</option>
      <option value="1">Podgórzyn</option>
      <option value="2">Nadgórzyn</option>
      <option value="3">Cyfra</option>
      <option value="4">Kraków</option>
      <option value="5">Duża stacja</option>
      <option value="6">Parowozownia</option>
      <option value="7">Podgórzyn - Bocznica</option>
      <option value="8">Parowozownia - Bocznica</option>
      <option value="9">Duża Stacja - Bocznica</option>
      <option value="10">Gablota 1</option>
      <option value="11">Gablota 2</option>
      <option value="12">Gablota 3</option>
      <option value="13">Gablota 4</option>
    </select>
    <div class="input-group-append">
      <button class="btn btn-outline-secondary" type="submit">Zatwierdź</button>
    </div>
  </div>
</form>
<?php }else{
  if (isset($_GET['sukces'])) {
    echo "<h1 style=\"color: green\">Inwentaryzacja poprawna</h1>";
  }
  require './script/php/connect_mysql.php';
  if(isset($_SESSION['stacja']))
  {
    $stacja = $_SESSION['stacja'];
  }
  else {
    $stacja = $_POST['stacja'];
  }
  $stacja_db = "SELECT nazwa, opis from stacja where id_stacji = \"$stacja\"";
  $kwerenda = $conn->query($stacja_db);
  while ($wiersz = $kwerenda->fetch_row()) {
    echo <<< TYTUL

    <h1>Wybrana przez Ciebie stacja to: $wiersz[0]</h1>
    <br>
    <h2>Krótki opis tej stacji:</h2>
    <p>$wiersz[1]</p>


TYTUL;
  }
  $conn->close();
?>
<form action="./script/php/inwentaryzuj.php" method="post">
  <h2>Lokomotywy na wybranej stacji:</h2>
  <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">Lp.</th>
          <th scope="col">Lokomotywa</th>
          <th scope="col">Malowanie</th>
          <th scope="col">Stan</th>
          <th scope="col">Uwagi inwentaryzacyjne</th>
        </tr>
      </thead>
      <tbody>
        <?php
        echo "<input type=\"hidden\" name=\"stacja\" value=\"$stacja\"";
        require './script/php/connect_mysql.php';
        $i = 1;
        $loko_db = "SELECT id_lokomotywy, malowanie, obraz from sklady left join lokomotywa on sklady.id_lokomotywy = lokomotywa.typ_i_nr_lok where stoi = \"$stacja\"";
        $kwerenda = $conn->query($loko_db);
        while ($wiersz = $kwerenda->fetch_row()) {
          if ($wiersz[0] == "") {
          }
          else{
          echo <<< WIERSZ
          <tr>
          <th scope="col">$i</th>
          <td><a class="thumbnail bez_podkr" style="color: black;"><input type="text" name="nr_lok$i" value="$wiersz[0]" disabled class="form-control"><span><img src="$wiersz[2]" />$wiersz[0]</span></a></td>
          <td><input type="text" name="mal_lok$i" value="$wiersz[1]" disabled class="form-control"></td>
          <td>
          <div class="custom-control custom-radio">
            <input type="radio" id="loko.$i.tak" name="loko$i" class="custom-control-input tak" value="jest">
            <label class="custom-control-label" for="loko.$i.tak">Jest</label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" id="loko.$i.nie" name="loko$i" class="custom-control-input nie" checked value="nie ma">
            <label class="custom-control-label" for="loko.$i.nie">Nie ma</label>
          </div>
          </td>
          <td><input type="text" name="uwagi_lok$i" value="" class="form-control" autocomplete="off"></td>
          </tr>
WIERSZ;
        $i++;
        }
        $j = $i - 1;
        echo "<input type=\"hidden\" name=\"loko_iteracje\" value=\"$j\"";}
        $conn->close();
        ?>
      </tbody>
  </table>
    <h2>Wagony na wybranej stacji:</h2>
  <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">Lp.</th>
          <th scope="col">Wagon</th>
          <th scope="col">Malowanie</th>
          <th scope="col">Uwagi</th>
          <th scope="col">Stan</th>
          <th scope="col">Uwagi inwentaryzacyjne</th>
        </tr>
      </thead>
      <tbody>
        <?php
        require './script/php/connect_mysql.php';
        $i = 1;
        $wag_db = "SELECT nr_wagonu, malowanie, uwagi, obraz FROM wagony WHERE wagony.id_skladu in (select sklady.id_skladu from sklady where stoi = \"$stacja\")";
        $kwerenda = $conn->query($wag_db);
        while ($wiersz = $kwerenda->fetch_row()) {
          if ($wiersz[0] == "") {
          }else{
          echo <<< WIERSZ
          <tr>
          <th scope="col">$i</th>
          <td><a class="thumbnail bez_podkr" style="color: black;"><input type="text" name="nr_wag$i" value="$wiersz[0]" disabled class="form-control"><span><img src="$wiersz[3]" />$wiersz[0]</span></a></td>
          <td><input type="text" name="mal_wag$i" value="$wiersz[1]" disabled class="form-control"></td>
          <td><input type="text" name="uwagi$i" value="$wiersz[2]" disabled class="form-control"></td>
          <td>
          <div class="custom-control custom-radio">
            <input type="radio" id="$i.tak" name="wago$i" class="custom-control-input tak" value="jest">
            <label class="custom-control-label" for="$i.tak">Jest</label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" id="$i.nie" name="wago$i" class="custom-control-input nie" value="nie ma" checked>
            <label class="custom-control-label" for="$i.nie">Nie ma</label>
          </div>
          </td>
          <td><input type="text" name="uwagi_wag$i" value="" class="form-control" autocomplete="off"></td>
          </tr>
WIERSZ;
        $i++;
        }
        $j = $i - 1;
        echo "<input type=\"hidden\" name=\"wago_iteracje\" value=\"$j\"";}
        $conn->close();
        ?>
      </tbody>
  </table>


  <button class="btn btn-warning"type="submit" name="przycisk">Zatwierdź</button>
</form>

<?php }?>
