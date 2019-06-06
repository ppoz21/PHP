<h1 class="my-4">Aby zobaczyć szczegóły wybierz inwentaryzację</h1>
<form action="?tresc=dokonane_inw" method="post">
  <div class="input-group">
    <select class="custom-select" aria-label="Wybór inwentury do wyświetlenia" name="inwentura">
      <option selected value="">Wybierz inwenturę</option>
      <?php
      require_once './script/php/connect_mysql.php';
      $sql = "SHOW tables like \"%inwentura%\"";
      $kw = $conn->query($sql);
      while ($wiersz = $kw->fetch_row()) {
        echo "<option value=\"$wiersz[0]\">$wiersz[0]</option>";
      }
      ?>
    </select>
    <div class="input-group-append">
      <button class="btn btn-outline-secondary" type="submit">Zatwierdź</button>
    </div>
  </div>
</form>
<?php

  if(!empty($_POST['inwentura']))
  {
    $inwentura = $_POST['inwentura'];
    if(strpos($inwentura, 'lokomotywa') !== false){
      $sql = "SELECT typ_i_nr_lok, malowanie, stan, uwagi from `$inwentura`";
      $kw = $conn->query($sql);
?>
<br>
<h2>Inwentaryzacja nr: <?php echo "$inwentura"; ?></h2>
<br>
  <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">Lokomotywa</th>
          <th scope="col">Malowanie</th>
          <th scope="col">Stan</th>
          <th scope="col">Uwagi inwentaryzacyjne</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($wiersz = $kw->fetch_row()) {
          echo <<< WIERSZ
          <tr>
          <th scope="col">$wiersz[0]</th>
          <td>$wiersz[1]</td>
          <td>$wiersz[2]</td>
          <td>$wiersz[3]</td>
WIERSZ;
}
        ?>
      </tbody>
  </table>
<?php
}elseif (strpos($inwentura, 'wagon') !== false) {
  $sql = "SELECT nr_wagonu, malowanie, uwagi, stan, uwagi_inw from `$inwentura`";
  $kw = $conn->query($sql);
?>
<br>
<h2>Inwentaryzacja nr: <?php echo "$inwentura"; ?></h2>
<br>
  <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">Wagon</th>
          <th scope="col">Malowanie</th>
          <th scope="col">Uwagi</th>
          <th scope="col">Stan</th>
          <th scope="col">Uwagi inwentaryzacyjne</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($wiersz = $kw->fetch_row()) {
          echo <<< WIERSZ
          <tr>
          <th scope="col">$wiersz[0]</th>
          <td>$wiersz[1]</td>
          <td>$wiersz[2]</td>
          <td>$wiersz[3]</td>
          <td>$wiersz[4]</td>
WIERSZ;
}
        ?>
      </tbody>
  </table>
<?php
$conn->close();

}}
  else {
    echo "<h2>Nie dokonano wyboru lub dana inwentaryzacja nie istnieje!</h2>";
  }

?>
