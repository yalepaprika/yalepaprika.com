<nav id="page-nav" class="page-nav background-paprika font-nav space-before-10 space-after-10 d-flex justify-content-between">
  <div class="page-nav__controls font--inverted d-sm-none">
    <button id="page-nav__toggle" aria-expanded="false" aria-controls="menu" class="page-nav__toggle">Menu</button>
  </div>
  <?php snippet('page/menu', ['home' => $home, 'menu' => $menu, 'submenu' => $submenu]) ?>
</nav>