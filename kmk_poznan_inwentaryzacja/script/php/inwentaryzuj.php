<?php

if (isset($_POST['przycisk'])) {
  session_start();
  require_once './connect_mysql.php';
  $stacja = mysqli_fetch_row(mysqli_query($conn, "SELECT nazwa from stacja where id_stacji = $_POST[stacja]"));
  $index = "inwentura-".date("Y-m-d,H:i")."-".$stacja[0].'-'.$_SESSION['login'];
  if(!empty($_POST['loko_iteracje']))
  {
    $sql = "CREATE TABLE IF NOT EXISTS `$index lokomotywa` (typ_i_nr_lok varchar(255) null, malowanie varchar(255) null, stan varchar(10) null, uwagi text null)";
    if(mysqli_query($conn, $sql)){
      $maxi = $_POST['loko_iteracje'];
      $sql = "SELECT id_lokomotywy, malowanie from sklady left join lokomotywa on sklady.id_lokomotywy = lokomotywa.typ_i_nr_lok where stoi = $_POST[stacja]";
      $kw = mysqli_query($conn, $sql);
      for ($i=1; $i <= $maxi; $i++) {
        $wiersz = mysqli_fetch_row($kw);
        $loko = $wiersz[0];
        $malowanie = $wiersz[1];
        $stan = "loko$i";
        $stan1 = $_POST["$stan"];
        $uwagi = "uwagi_lok$i";
        $uwagi1 = $_POST["$uwagi"];
        $sql = "INSERT INTO `$index lokomotywa` (typ_i_nr_lok, malowanie, stan, uwagi) values (\"$loko\", \"$malowanie\", \"$stan1\", \"$uwagi1\")";
        if(mysqli_query($conn, $sql))
        {
          $loko_add = 'loko_sukces=1';
        }
        else {
          $loko_add = 'loko_blad=1';
        }
      }
    }
    else {
      $loko_add = 'loko_blad=0';
    }
  }
  else {

  }
  if(!empty($_POST['wago_iteracje']))
  {
    $sql = "CREATE TABLE IF NOT EXISTS `$index wagon` (nr_wagonu varchar(255), malowanie varchar(255) null, uwagi varchar(255) null, stan varchar(10) null, uwagi_inw text null)";
    if(mysqli_query($conn, $sql)){
      $maxi = $_POST['wago_iteracje'];
      $sql = "SELECT nr_wagonu, malowanie, uwagi FROM wagony WHERE wagony.id_skladu in (select sklady.id_skladu from sklady where stoi = $_POST[stacja])";
      $kw = mysqli_query($conn, $sql);
      for ($i=1; $i <= $maxi; $i++) {
        $wiersz = mysqli_fetch_row($kw);
        $nr_wag = $wiersz[0];
        $malowanie = $wiersz[1];
        $uwagi = $wiersz[2];
        $stan = "wago$i";
        $stan1 = $_POST["$stan"];
        $uwagi_inw = "uwagi_wag$i";
        $uwagi_inw1 = $_POST["$uwagi_inw"];
        $sql = "INSERT INTO `$index wagon` (nr_wagonu, malowanie, uwagi, stan, uwagi_inw) values (\"$nr_wag\", \"$malowanie\", \"$uwagi\", \"$stan1\", \"$uwagi_inw1\")";
        if(mysqli_query($conn, $sql))
        {
          $loko_add = 'wago_sukces=1';
        }
        else {
          $loko_add = "wago_blad=1";
        }
      }
    }
    else {
      $wago_add = 'wago_blad=0';
    }
    mysqli_close($conn);
  }
  header("Location:./../../?tresc=inwentura&sukces=1");
}
else {
  header('Location:./../../?tresc=inwentura');
}


?>
