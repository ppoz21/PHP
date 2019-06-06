<div id="container">
  <aside>
    <nav class="menu_boczne">
      <ul>
        <a href="?tresc=sklady"><li>Moje składy</li></a>
        <a href="?tresc=inwentura"><li>Inwentaryzacja</li></a>
        <a href="?tresc=ustawienia"><li>Ustawienia konta</li></a>
        <a href="./script/php/logout.php"><li>Wyloguj</li></a>
      </ul>
    </nav>
  </aside>
  <article>
    <?php
      if (isset($_GET['tresc'])) {
        switch ($_GET['tresc']) {
          case 'sklady':
            require_once './script/php/sklady.php';
          break;
          case 'inwentura':
            require_once './script/php/inwentura.php';
          break;
          case 'ustawienia':
            require_once './script/php/ustawienia.php';
          break;
        }
      }
      else {
        require './script/php/default.php';
      }

    ?>
  </article>
  <div style="clear:both;">

  </div>
</div>
