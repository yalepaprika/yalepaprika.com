<?php if ($page->intro()->isNotEmpty()): ?>
  <div id="page-intro" class="page-intro font-heading">
    <?= $page->intro()->kirbytext() ?>
  </div>
<?php endif ?>
