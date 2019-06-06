<?php

  if (isset($_COOKIE['zgoda'])) {
    header('Location: ./../../');
  }
  else {
    setcookie("zgoda", "zgoda", time()+86400*365, "/");
    header('Location: ./../../');
  }

?>
