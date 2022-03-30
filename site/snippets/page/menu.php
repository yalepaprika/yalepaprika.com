<ul class="page-menu font-heading">
  <li class="d-inline page-menu__home"><a <?php e($home->isOpen(), 'aria-current ') ?> href="<?= $home->url() ?>"><em><?= $home->title()->html() ?></em></a></li>
  <?php foreach ($menu as $item): ?>
    <li class="d-inline"><a <?php e($item->isOpen(), 'aria-current ') ?> href="<?= $item->url() ?>"><?= $item->title()->html() ?></a></li>
  <?php endforeach ?>
  <?php foreach ($submenu as $item): ?>
    <li class="d-inline"><a <?php e($item->isOpen(), 'aria-current ') ?> href="<?= $item->url() ?>"><?= $item->title()->html() ?></a></li>
  <?php endforeach ?>
</ul>

