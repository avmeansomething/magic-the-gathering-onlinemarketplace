<?php  
include('db.php');
require 'head.php';
?>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">Teleport.net</h5>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="/diplom_mtg/">Главная</a>
    <?php 
    if (isset($_SESSION['logged_user'])) : ?>
      <a class="p-2 text-dark" href="/diplom_mtg/rinok.php">Рынок</a>
      <a class="p-2 text-dark" href="/diplom_mtg/article.php">Добавить</a>
      <a class="btn btn-primary" href="/diplom_mtg/include/auth.php">Личный кабинет <?php echo $_SESSION['logged_user']->login ?></a>
<?php else : ?>
  <a class="btn btn-outline-primary" href="/diplom_mtg/include/reg.php">Присоединяйся</a>
<?php endif; ?>
  </nav>
</div>