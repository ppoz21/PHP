<?php
if($_SESSION['stacja'] == "")
{
  require_once 'sklady_bez_sesji.php';
}
else {
  require './script/php/connect_mysql.php';
  $stacja = $_SESSION['stacja'];
  $stacja_db = "SELECT nazwa, opis from stacja where id_stacji = \"$stacja\"";
  $kwerenda = $conn->query($stacja_db);
  while ($wiersz = $kwerenda->fetch_row()) {
    echo <<< TYTUL

    <h1>Przypisana do Ciebie stacja to: $wiersz[0]</h1>
    <br>
    <h2>Krótki opis tej stacji:</h2>
    <p>$wiersz[1]</p>


TYTUL;
  }
  $conn->close();
  ?>
<h2>Składy na Twojej stacji:</h2>
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
        $wagon_db = "SELECT nr_wagonu, uwagi from wagony where id_skladu = \"$sklad\"";
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
