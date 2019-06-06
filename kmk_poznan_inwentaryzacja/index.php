<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <title>Poznański Klub Modelarzy Kolejowych | Serwis inwentaryzacyjny</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="./img/logo.jpg">
  </head>
  <body>
    <?php
      session_start();
      require './script/php/baner.php';
      if(!isset($_SESSION['autoryzacja']))
      {
        require './script/php/logowanie.php';
      }
      elseif ($_SESSION['autoryzacja'] == 0) {
        require './script/php/user.php';
      }
      elseif ($_SESSION['autoryzacja'] == 1) {
        require './script/php/prezes.php';
      }
      elseif ($_SESSION['autoryzacja'] == 2) {
        require './script/php/admin.php';
      }

      require './script/php/stopka.php';
    ?>

    <div id="myModal" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="my-4">Pliki Cookies</h2>
          <span class="close">&times;</span>

        </div>
        <div class="modal-body">
          <h4 class="my-4">Nasza witryna korzysta z plików Cookies.</h4>
          <p>Aby zaakceptować przechowywanie ciasteczek na Twoim komputerze kliknij przycisk poniżej. Jeżeli nie zgadzasz się na przechowywanie Ciasteczek, zamknij to powiadomienie (może to utrudnić korzystanie z witryny).</p>
          <a class="bez_podkr" href="./script/php/akceptuje.php" style="color: white;"><button class="btn btn-success" style="float: right;">Akceptuję pliki cookies</button></a>
          <br>
          <br>
        </div>
      </div>

    </div>
    <?php if (!isset($_COOKIE['zgoda'])) {
    ?>
    <script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    window.onload = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>
  <?php }?>
    <script src="./script/js/bootstrap.bundle.js"></script>
    <script src="./script/js/bootstrap.js"></script>
    <script src="./script/js/jquery.js"></script>
    <script src="./script/js/j.js"></script>
    <script src="./script/js/main.js"></script>
  </body>
</html>
