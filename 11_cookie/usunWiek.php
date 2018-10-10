<?php

  if(isset($_GET['usunWiek']) && $_GET['usunWiek'] == 1){
  setcookie('wiek', null, time()-1);
  header('location: ./index.php?cookie=')
  }
  else {
    header('location: ./index.php')
  }
?>
