<footer id="page-footer" class="page-footer">
  <div class="page-footer__content font-heading background-gray-100 space-inside-before-20 space-inside-after-20">
    <div class="font--secondary space-after-100 container-xxxl">
      <?= $site->description()->kt() ?>
    </div>
    <div class="page-footer__menu">
      <?php snippet('page/menu', ['home' => $home, 'menu' => $menu, 'submenu' => $submenu]) ?>
    </div>
  </div>
</footer>
<?php snippet('utilities/admin-edit') ?>
