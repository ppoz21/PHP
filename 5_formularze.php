<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <fieldset>
      <legend>Ile lubisz kolorów?</legend>
      <form method="post">
        <input type="number" name="i">
        <br>
        <br>
        <input type="submit" name="ok" value="Zatwierdź">
      </form>
    </fieldset>
    <?php
    if(isset($_POST['ok'])&& $_POST['i']>0)
    {
      $ile = $_POST['i'];
    ?>
    <fieldset>
      <legend>Wpisz swoje ulubione kolory</legend>
      <form method="post">
        <?php
          for ($j=1; $j <= $ile; $j++) {
            echo "<input type=\"text\" name=\"kolor$j\"><br>";
          }
        ?>
        <input type="submit" name="ok1" value="Zatwierdź">
        <input type="hidden" name="ile" value="<?php echo $ile; ?>">
      </form>
    </fieldset>

    </form>
    <?php
    }
    if (isset($_POST['ok1'])) {
      echo "<h2>Twoje ulubione kolory:</h2>";
      $ile = $_POST['ile'];
      for ($i=1; $i <= $ile ; $i++) {
        $kolor = "kolor$i";
        echo "Kolor $i: ".$_POST[$kolor]."<br>";
      }
    }
    ?>
  </body>
</html>
