<?php if ($page->intro()): ?>
  <div class="page-intro box-block box-block-ruled">
    <div class="page-intro-content">
      <?= $page->intro()->kirbytext() ?>
    </div>
  </div>
<?php endif ?>
