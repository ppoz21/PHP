<div id="container">
  <aside>
    <nav class="menu_boczne">
      <ul>
        <a href="?tresc=sklady"><li>Składy</li></a>
        <a href="?tresc=ekipa"><li>Ekipa makiety</li></a>
        <a href="?tresc=dokonane_inw"><li>Dokonane Inwentaryzacje</li></a>
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
          case 'ekipa':
            require_once './script/php/ekipa.php';
          break;
          case 'ustawienia':
            require_once './script/php/ustawienia.php';
          break;
          case 'dokonane_inw':
            require_once './script/php/dokonane_inw.php';
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
