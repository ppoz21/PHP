<?php

  session_start();
  if (!isset($_SESSION['autoryzacja'])) {
    header('Location: ./../../');
  }
  else {
    session_destroy();
    header('Location: ./../../');
  }

?>
