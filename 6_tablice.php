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
  $tablica_3_2ymiarowa = array(
    'imie' => array(
      '1-imie' => array('Jan', 'Hubert'),
      '2-imie' => array('Piotr', 'Szymon')
    ),
    'nazwisko' => array(
      'nazwisko' => array ('Adamowicz', 'Jankowski'),
      'nazwisko rodowe' => array ('-', 'Prowansalski')
    )
  );


  foreach ($tablica_3_2ymiarowa as $klucz => $tablicapodstawowa) {
    foreach ($tablicapodstawowa as $klucz2 => $tablica2wymiar) {
      foreach ($tablica2wymiar as $klucz3 => $wartosc) {
        echo "$wartosc";
      }
    }
  }
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

  //sortowanie tablicy asocjacyjnej

  $tabasoc = [
    'imie' => 'Jan',
    'pseudonim' => 'Kulson',
    'wiek' => 24,
    'nazwisko' => 'Kowalski',
  ];

  wyswietl($tabasoc);
  echo "<hr>";

  //sortowanie wg zawartości
  asort($tabasoc);

  wyswietl($tabasoc);
  echo "<hr>";

  arsort($tabasoc);
  wyswietl($tabasoc);
  echo "<hr>";

  //sortowanie wg klucza

  ksort($tabasoc);
  wyswietl($tabasoc);
  echo "<hr>";

  krsort($tabasoc);
  wyswietl($tabasoc);
  echo "<hr>";

  //wyświetlanie danych z tablicy

  var_dump($tabasoc);

  echo "<hr>";
  echo("<pre>");
  var_dump($tabasoc);
  echo "</pre>";
  echo "<hr>";

  print_r($tabasoc);
  echo "<hr>";

  echo "<pre>";
  print_r($tabasoc);
  echo "</pre>";

  echo "<hr>";

  //****************************************************************************

  //range

  $liczby = range(0,10);

  wyswietl($liczby);
  echo "<hr>";
  echo "<pre>";
  print_r($liczby);
  echo "</pre>";
  echo "<hr>";

  $liczby1 = range(2,15,2);

  wyswietl($liczby1);
  echo "<hr>";
  echo "<pre>";
  print_r($liczby1);
  echo "</pre>";
  echo "<hr>";

  $tekst = range("a","k");

  wyswietl($tekst);
  echo "<hr>";
  echo "<pre>";
  print_r($tekst);
  echo "</pre>";
  echo "<hr>";

  $tekst1 = range("c","m",3);

  wyswietl($tekst1);
  echo "<hr>";
  echo "<pre>";
  print_r($tekst1);
  echo "</pre>";
  echo "<hr>";

  //****************************************************************************

  //shuffle

  $liczby2 = range(1,20);

  wyswietl($liczby2);
  echo "<hr>";
  shuffle($liczby2);
  wyswietl($liczby2);
  echo "<hr>";
  //losowanie liczb

  $x = rand(1,10);
  echo "$x";
  echo "<hr>";

  $arrSrc = range(0, 100);
  shuffle($arrSrc);
  wyswietl(array_slice($arrSrc, 95));
?>
