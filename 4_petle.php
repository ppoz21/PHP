<?php
  //for
  for ($i=1; $i <= 100; $i++) {
    if($i%2==0){
    echo "<b>$i</b> ";
    }else {
      echo $i." ";
    }
  }
  echo "<hr>";
?>
<table>
  <?php

  $wiersz = 3; //wiersze
  $kolumna = 4; //kolumny

  for ($j=0; $j < $wiersz; $j++) {
    echo "<tr>";
    for ($k=0; $k < $kolumna; $k++) {
      echo "<td>";
      echo "test";
      echo "</td>";
    }
    echo "</tr>";
  }

  ?>
</table>

<table>
  <tr>
    <th>Odległość</th>
    <th>Koszt</th>
  </tr>
  <?php

  for ($i=50; $i <= 200; $i+=50) {
    echo "<tr>";
    echo "<td style=\"text-align: right\">$i</td>";
    echo "<td style=\"text-align: right\">".($i/10)."</td>";
    echo "</tr>";
  }

  ?>
</table>

<?php

  //pętla while
  $cyfra = 50;
  while ($cyfra < 100) {
    echo "$cyfra ";
    $cyfra++;
  }

  echo "<br>";

  //pętla do while
  $a =4;
  do {
    echo "$a ";
    $a++;
  } while ($a <= 10);
?>
