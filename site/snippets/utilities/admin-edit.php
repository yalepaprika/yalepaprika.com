<?php if ($kirby->user()): ?>
  <div class="admin-edit">
    <div>
    Logged in as
      <a href="<?= $kirby->user()->panelUrl() ?>"><?= $kirby->user()->name() ?></a> ·
      <a href="<?= $page->panelUrl() ?>">Edit this page</a> ·
      <a href="<?= $site->panelUrl() ?>">Panel home</a> ·
      <a href="<?= url('logout') ?>">Logout</a>
    </div>
  </div>
<?php endif ?>
