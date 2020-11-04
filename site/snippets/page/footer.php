<footer class="box-block box-card cluster cluster-stack cluster-1-1-2-column cluster-switcher">
  <div class="_cluster">
    <div class="stack">
      <a href="<?= $home->url() ?>"><em><?= $home->title()->html() ?></em></a>
    </div>
    <ul>
      <?php foreach ($menu as $item): ?>
        <li><a <?php e($item->isOpen(), 'aria-current ') ?> href="<?= $item->url() ?>"><?= $item->title()->html() ?></a></li>
      <?php endforeach ?>
      <?php foreach ($submenu as $item): ?>
        <li><a <?php e($item->isOpen(), 'aria-current ') ?> href="<?= $item->url() ?>"><?= $item->title()->html() ?></a></li>
      <?php endforeach ?>
    </ul>
    <div>

    </div>
  </div>
</footer>
