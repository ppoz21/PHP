<?php

  if (isset($_POST['przycisk'])) {
    if($_POST['opcja'] == 1)
    {
      header('Location: ./../../?tresc=ustawienia&opcja=1');
    }
    else {
      header('Location: ./../../?tresc=ustawienia&opcja=2');
    }
  }
  else {
    header('Location: ./../../?tresc=ustawienia');
  }

 ?>
