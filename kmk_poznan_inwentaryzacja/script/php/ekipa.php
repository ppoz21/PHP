<h1>Ekipa makiety stacjonarnej</h1>
<br>

<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col">Lp.</th>
      <th scope="col">Nazwa użytkownika</th>
      <th scope="col">Imię</th>
      <th scope="col">Nazwisko</th>
      <th scope="col">Adres e-mail</th>
      <th scope="col">Numer telefonu</th>
    </tr>
  </thead>
  <tbody>
    <?php
      require './script/php/connect_mysql.php';
      $i = 1;
      $sql = "SELECT username, imie, nazwisko, email, telefon from users where username not like \"$_SESSION[login]\"";
      $kwerenda = $conn->query($sql);
      while ($wiersz = $kwerenda->fetch_row())
      {
        $w3 = base64_decode($wiersz[3]);
        $w4 = base64_decode($wiersz[4]);
        echo <<< WIERSZ
        <tr>
          <th scope="row">$i</th>
          <td>$wiersz[0]</td>
          <td>$wiersz[1]</td>
          <td>$wiersz[2]</td>
          <td>$w3</td>
          <td>$w4</td>
        </tr>
WIERSZ;
      $i++;
      }
      $conn->close();
    ?>
  </tbody>
</table>
