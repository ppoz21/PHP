<?php

  $a = 1.0;
  $b = 1;

  if($a == $b)
  {
    echo "równe<br>";
  }else {
    echo "różne<br>";
  }
  if($a === $b)
  {
    echo "Identyczne<br>";
  }else {
    echo "różne<br>";
  }
  echo gettype($a),"<br>",gettype($b),"<br>";

  //**********************************
  $x =2;
  echo $x++; //2
  echo ++$x; //4
  echo $x; //4
  $y = $x++;
  echo $y; //4
  $y = ++$x;
  echo $y; //6
  echo ++$y."<hr>"; //7


  //**********************************

  $tekst1 = "4abc";
  $tekst2 = "tekst";
  $tekst3 = "7";
  $liczba1 = 14;
  $j = -1;
  $c = 100;

  //operatory rzutowania

  //bool, int, float, string, array, object, unset

  $dwa =(int)$tekst1;
  echo "$dwa<br>";//4

  $trzy = (int)$tekst3;
  echo "$trzy<br>";//7

  $j = (bool)$j;
  echo "$j<br>"; //1

  $c = (unset)$c;
  echo "$c<br>"; //nic nie wyświetla

  echo gettype($c)."<br>";

  $tekst1 = (int)$tekst2;
  echo "$tekst1<br>";//0

  $liczba1 = (float)$liczba1."<br>";
  echo "$liczba1";//14
  echo gettype($liczba1)."<br>"; //double

  //rozmiar typu integer

  echo PHP_INT_SIZE.'<br>'; //4

  //kontrola typu zmiennych

  $test = 'szkola';
  $x = 10;
  $a = 20.5;
  $y = true;
  $z = null;
  $w;

  echo gettype($test).'<br>';//string
  echo gettype($x).'<br>';//integer
  echo gettype($a).'<br>';//double
  echo gettype($y).'<br>';//boolean
  echo gettype($z).'<br>';//null
  echo @gettype($w).'<br><hr><br>';//Undefined variable NULL

  echo is_string($test)."<br>";//true
  echo is_string($x)."<br>";//false
  echo is_bool($y)."<br>";//true
  echo is_string($x)."<br>";//false
  echo is_float($a)."<br>";//true
  echo is_int($x)."<br>";//true
  echo @is_null($w)."<br>";//true

  //****************************************

  //zmienne superglobalne

  //$_GET, $_POST, $_COOKIE, $_FILES, $_SESSION

  echo $_SERVER['SERVER_PORT']."<br>";//80
  echo $_SERVER['SCRIPT_NAME']."<br>";// /4tb/3_1_operatory.php
  echo $_SERVER['SERVER_PROTOCOL']."<br>";//HTTP/1.1
  echo $_SERVER['DOCUMENT_ROOT']."<br>";// C:/xampp/htdocs

  $lokalizacjaPliku = $_SERVER['DOCUMENT_ROOT'];
  $lokalizacjaPliku .= $_SERVER['SCRIPT_NAME'];

  echo "$lokalizacjaPliku<hr>";// C:/xampp/htdocs/4tb/3_1_operatory.php

  //****************************************

  //stałe

  //nazwy stałych z dużych liter!!!

  define('NAZWISKO', 'Kowal');

  echo NAZWISKO."<br>"; //Kowal
  //NAZWISKO = 'Nowak' //Parse error: syntax error, unexpected '=' in C:\xampp\htdocs\4tb\3_1_operatory.php on line 119

  define('imie','Janusz');
  echo imie."<br>"; //Janusz

  define('WIEK',20,true);//nie sprawdza wielkości liter
  echo wiek;//20

  define('PI',3.14159265359);
  echo PI."<hr>";

  //stałe predefiniowane

  echo PHP_VERSION.'<br>';//7.2.9
  echo gettype(PHP_VERSION).'<br>';//string

  $ver = PHP_VERSION;

  if($ver >7.1){
    echo "Nowa wersja PHP<br>";
  }else {
    echo "Stara wersja PHP<br>";
  }

  echo PHP_OS.'<br>';//WINNT

  echo __LINE__.'<br>'; //145

  echo __FILE__.'<br>';

  echo __DIR__.'<br>';

?>
