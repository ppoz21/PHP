<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <title>Operatory</title>
  </head>
  <body>
    <?php

      $potegowanie = 2**10; //1024
      $modulo = 11%3; //2
      $dodawanie = 2+2; //4
      $odejmowanie = 10-5; //5
      $mnożenie = 6*6; //36
      $dzielenie = 6/6;//1
      echo "$potegowanie<br>$modulo<br>$dodawanie<br>$odejmowanie<br>$mnożenie<br>$dzielenie<br>";

      //Operatory bitowe & (and), | (or), ~ (not), ^ (xor)
      //przesunięcie bitowe w lewo >>
      //przesunięcie bitowe w prawo <<

      $dziesięć = 0b1010;
      echo "$dziesięć<br>";
      $dziesięć = $dziesięć >> 1;
      echo "$dziesięć<br>"; //101 5
      $dziesięć = $dziesięć << 2;
      echo "$dziesięć<br>"; //10100 20

      //operatory logiczne

      //&& || ! (negacja) and or xor

      //zad. 1

      $sklep = 'otwarty';
      $pieniądze = 1800;
      $romet = false;

      if($sklep == 'otwarty' && $pieniądze >=900 && $romet)
      {
        echo "Kupiłeś rower<br>";
      }else {
        echo "Nie kupiłeś roweru<br>";
      }
    ?>
    <fieldset>
      <legend>Rower</legend>
      <form method="post">
        <select name="sklep">
          <option value="o">otwarty</option>
          <option value="z">zamknięty</option>
        </select><br><br>
        <input type="number" name="pieniadze"><br><br>
        <select name="romet">
          <option value="d">Dostępny</option>
          <option value="b">Brak towaru</option>
        </select><br><br>
        <input type="submit" name="przycisk" value="Kup rower">
      </form>
    </fieldset>
    <?php

      if(isset($_POST['przycisk']) && !empty($_POST['pieniadze']))
      {
        $sklep = $_POST['sklep'];
        $pieniądze = $_POST['pieniadze'];
        $romet = $_POST['romet'];
        //echo "$sklep $pieniądze $romet";
        if ($sklep == 'o' && $pieniądze >= 900 && $romet = 'd')
        {
          echo "<h4>Kupiłeś rower</h4>";
        }else {
          echo "<h4>Nie Kupiłeś roweru</h4>";
        }
      }

    ?>
  </body>
</html>
