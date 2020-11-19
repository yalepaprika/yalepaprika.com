<nav id="page-menu" class="menu cluster">
  <div class="_cluster">
    <div class="cluster">
      <ul class="_cluster">
        <li><a <?php e($home->isOpen(), 'aria-current ') ?> href="<?= $home->url() ?>"><em><?= $home->title()->html() ?></em></a></li>
        <?php foreach ($menu as $item): ?>
          <li><a <?php e($item->isOpen(), 'aria-current ') ?> href="<?= $item->url() ?>"><?= $item->title()->html() ?></a></li>
        <?php endforeach ?>
      </ul>
    </div>
    <div class="cluster">
      <ul class="_cluster">
        <?php foreach ($submenu as $item): ?>
          <li><a <?php e($item->isOpen(), 'aria-current ') ?> href="<?= $item->url() ?>"><?= $item->title()->html() ?></a></li>
        <?php endforeach ?>
      </ul>
    </div>
  </div>
</nav>
