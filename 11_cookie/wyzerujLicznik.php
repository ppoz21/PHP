<?php

  if(isset($_GET['usun']) && $_GET['usun'] == 1){
  setcookie('licznik', null, time()-1);
  header('location: ./licznik.php');
  }
  else {
    header('location: ./licznik.php');
  }
?>
