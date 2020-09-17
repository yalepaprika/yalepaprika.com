<nav class="menu cluster">
  <ul class="cluster">
    <li><a <?php e($home->isOpen(), 'aria-current ') ?> href="<?= $home->url() ?>"><em><?= $home->title()->html() ?></em></a></li>
    <?php foreach ($menu as $item): ?>
      <li><a <?php e($item->isOpen(), 'aria-current ') ?> href="<?= $item->url() ?>"><?= $item->title()->html() ?></a></li>
    <?php endforeach ?>
  </ul>
  <ul class="cluster">
    <?php foreach ($submenu as $item): ?>
      <li><a <?php e($item->isOpen(), 'aria-current ') ?> href="<?= $item->url() ?>"><?= $item->title()->html() ?></a></li>
    <?php endforeach ?>
  </ul>
</nav>
