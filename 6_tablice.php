<?php

  //tablice indeksowane numerycznie

  $kolory = array('czerwony', 'zielony', 'żółty');
  echo "Początkowa zawartość tablicy:<br>";

  for ($i=0; $i < count($kolory); $i++) {
    $element = $i + 1;
    echo "Element $element: $kolory[$i]<br>";
  }
  $kolory[0] = "aqua";
  $kolory[1] = "orange";
  $kolory[2] = "magenta";

  function wypisz($tablica)
  {
    for ($i=0; $i < count($tablica); $i++) {
      $element = $i + 1;
      echo "Element $element: $tablica[$i]<br>";
    }
  }
  echo "<hr>";
  wypisz($kolory);

  //**********************************************************

  //tablice asocjacyjne

  $dane = array(
    'imie' => 'Janusz',
    'nazwisko' => 'Nowak',
    'wiek' => 20,
    'narodowość' => 'polska'
  );

  echo "<hr>Zawartość tablicy o nazwie \$dane:<br>";
  echo <<<TABLICA
  Imię: $dane[imie]<br>
  Nazwisko: $dane[nazwisko]<br>
  Wiek: $dane[wiek]<br>
  Narodowość: $dane[narodowość]<hr>
TABLICA;


//****************************************************************

//foreach

  foreach ($dane as $wartosc) {
    echo "Wartość: $wartosc<br>";
  }
  echo "<hr>";
  foreach ($dane as $klucz => $wartosc) {
    echo "$klucz: $wartosc<br>";
  }

  echo "<hr>";

  //****************************************************************

  //tablice wielowymiarowe

  $uczen = array(
    array('Janusz', 'Kowal', '20'),
    array('Anna', 'Nowak', '17'),
    array('Paweł', 'Tomczak', '35')
  );

  for ($i=0; $i < count($uczen); $i++) {
    for ($j=0; $j < count($uczen[$i]); $j++) {
    echo "{$uczen[$i][$j]} ";
    }
    echo "<br>";
  }
  echo "<hr>";

  foreach ($uczen as $klucz => $tablica) {
    foreach ($tablica as $klucz2 => $wartosc) {
      //echo $uczen[$klucz][$klucz2], " ";
      echo "$wartosc ";
    }
    echo "<br>";
  }
  echo "<hr>";
  /*zad.dom
  utwóz tablicę 3-wymiarową i napisz dla niej funkcję
  wyświetlającą zawartość (wykorzystaj funkcję foreach)
  */

  //***************************************************
  echo "<hr>";

  $cyfry = array(
    array(1,2,3,4),
    array(5,6,7),
    array(8),
    array(9,10,11,12)
  );

  foreach ($cyfry as $x) {
    foreach ($x as $wartosc) {
      echo "$wartosc ";
    }
    echo "<br>";
  }

  //***************************************************
  echo "<hr>";
  //sortowanie

  $tab = array(10,1,5,88,-5,101);

  function wyswietl($tab)
  {
    foreach ($tab as $x) {
      echo "$x ";
    }
    echo "<br>";
  }

  wyswietl ($tab);

  //sortowanie rosnaco
  echo "<hr>";
  sort($tab);
  wyswietl($tab);

  //sortowanie malejąco
  echo "<hr>";
  rsort($tab);
  wyswietl($tab);

  //****************************************************************************
  echo "<hr>";
  $tab1 = ['Julia', 'anna', 'zenon', 'Krystian'];

  wyswietl($tab1);
  echo "<hr>";
  sort($tab1);
  wyswietl($tab1);
  echo "<hr>";
  rsort($tab1);
  wyswietl($tab1);
  echo "<hr>";

  //****************************************************************************

  $tab2 = ['Julia', 'anna', 'zenon', 'krystian'];

  wyswietl($tab2);
  echo "<hr>";

  foreach ($tab2 as $klucz => $x) {
    $x = mb_strtolower($x);
    $tab2[$klucz] = $x;
  }

  wyswietl($tab2);
  echo "<hr>";

  sort($tab2);
  wyswietl($tab2);
  echo "<hr>";

  foreach ($tab2 as $klucz => $x) {
    $x = ucwords($x);
    $tab2[$klucz] = $x;
  }

  wyswietl($tab2);
  echo "<hr>";


?>
