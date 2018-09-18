<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <title>Hobby - przekierowanie</title>
  </head>
  <body>
    <form method="post">
      <input type="radio" name="hobby" value="f" checked>Film<br>
      <input type="radio" name="hobby" value="m">Muzyka<br>
      <input type="radio" name="hobby" value="s">Sport<br>
      <input type="submit" name="przycisk" value="Wyślij"><br>
    </form>
    <?php

      if(isset($_POST['przycisk']))
      {
        $hobby = $_POST['hobby'];
        //echo "$hobby";
        switch ($hobby) {
          case 'f':
            header('Location: ./5/film.php');
            break;
          case 'm':
            header('Location: ./5/muzyka.php');
            break;
          case 's':
            header('Location: ./5/sport.php');
            break;

          /*default:
            // code...
            break;*/
        }
      }

    ?>
  </body>
</html>
