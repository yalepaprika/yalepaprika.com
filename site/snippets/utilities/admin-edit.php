<?php if ($kirby->user()): ?>
  <div class="admin-edit">
    <div class="box-card">
    Logged in as
      <a href="<?= $kirby->user()->panelUrl() ?>"><?= $kirby->user()->name() ?></a>
      <span class="separator">•</span>
      <a href="<?= $page->panelUrl() ?>">Edit this page</a>
      <span class="separator">•</span>
      <a href="<?= $site->panelUrl() ?>">Panel home</a>
      <span class="separator">•</span>
      <a href="<?= url('logout') ?>">Logout</a>
    </div>
  </div>
<?php endif ?>
