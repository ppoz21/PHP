<div class="jumbotron">
  <h1 class="display-4">Poznański Klub Modelarzy Kolejowych</h1>
  <p class="lead">Serwis inwentaryzacyjny</p>
  <hr class="my-4">
  <p>Witaj w serwisie inwentaryzacyjnym Poznańskiego Klubu Modelarzy Kolejowych!
  <br>
  Obecnie jesteś zalogowany jako <?php echo $_SESSION['login'];?>
  <br>
  Dla Twojego typu konta serwis umożliwia:
  <?php $autoryzacja = $_SESSION['autoryzacja'];
    switch ($autoryzacja) {
      case '0':

  ?>
  <ul>
    <li>dostęp do składów,</li>
    <li>dokonanie inwentaryzacji,</li>
    <li>zarządzanie swoim kontem.</li>
  </ul>
  <?php break;
  case '1': ?>
  <ul>
    <li>dostęp do składów,</li>
    <li>dostęp do danych Ekipy Makiety Stacjonarnej,</li>
    <li>dostęp do danych o wykonanych inwentaryzacjach,</li>
    <li>zarządzanie swoim kontem.</li>
  </ul>
  <?php break;
  case '2': ?>
  <ul>
  <li>dostęp do składów,</li>
  <li>dokonanie inwentaryzacji,</li>
  <li>dostęp do danych o wykonanych inwentaryzacjach,</li>
  <li>dostęp do danych Ekipy Makiety Stacjonarnej,</li>
  <li>zarządzanie kontami,</li>
  <li>zarządzanie swoim kontem.</li>
  </ul>
  <?php break;  } ?>
  </p>
</div>
