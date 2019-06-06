<h2>Nie posiadasz przypisanej na stałę stacji!</h2>
<h3>Możesz wybrać jedną z poniższych</h3>
<form action="./?tresc=sklady" method="post">
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
<br>
<?php

if(!empty($_POST['stacja']))
{
  require './script/php/connect_mysql.php';
  $stacja = $_POST['stacja'];
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
  <h2>Składy na wybranej stacji:</h2>
  <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">Lp.</th>
          <th scope="col">Lokomotywa</th>
          <th scope="col">Malowanie</th>
          <th scope="col">Wagony</th>
        </tr>
      </thead>
      <tbody>
        <?php
        require './script/php/connect_mysql.php';
        $i = 1;
        $loko_db = "SELECT id_skladu, id_lokomotywy, malowanie, obraz from sklady left join lokomotywa on sklady.id_lokomotywy = lokomotywa.typ_i_nr_lok where stoi = \"$stacja\"";
        $kwerenda = $conn->query($loko_db);
        while ($wiersz = $kwerenda->fetch_row()) {
          $sklad = $wiersz[0];
          $wagon_db = "SELECT nr_wagonu, uwagi, obraz from wagony where id_skladu = \"$sklad\"";
          $kw2 = $conn->query($wagon_db);
          echo <<< WIERSZ
          <tr>
          <th scope="col">$i</th>
          <td class="screenshot"><a class="thumbnail bez_podkr" style="color: black;">$wiersz[1]<span><img src="$wiersz[3]" />$wiersz[1]</span></a></td>
          <td>$wiersz[2]</td>
          <td>
          <table class="table table-striped table-bordered">
WIERSZ;
          while ($wiersz_wag = $kw2->fetch_row()) {
            echo <<< WIERSZ2
            <tr>
            <td><a class="thumbnail bez_podkr" style="color: black;">$wiersz_wag[0]<span><img src="$wiersz_wag[2]" />$wiersz_wag[0]</span></a></td>
            <td>$wiersz_wag[1]</td>
            </tr>
WIERSZ2;
          }
          echo "</table></td></tr>";
        $i++;
        }
        $conn->close();
        ?>
      </tbody>
  </table>
<?php
}

?>
