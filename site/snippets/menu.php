<nav class="menu cluster">
  <div>
    <div class="cluster">
      <ul>
        <li><a <?php e($home->isOpen(), 'aria-current ') ?> href="<?= $home->url() ?>"><?= $home->title()->html() ?></a></li>
        <?php foreach ($menu as $item): ?>
          <li><a <?php e($item->isOpen(), 'aria-current ') ?> href="<?= $item->url() ?>"><?= $item->title()->html() ?></a></li>
        <?php endforeach ?>
      </ul>
    </div>
    <div class="cluster">
      <ul>
        <?php foreach ($submenu as $item): ?>
          <li><a <?php e($item->isOpen(), 'aria-current ') ?> href="<?= $item->url() ?>"><?= $item->title()->html() ?></a></li>
        <?php endforeach ?>
      </ul>
    </div>
  </div>
</nav>
