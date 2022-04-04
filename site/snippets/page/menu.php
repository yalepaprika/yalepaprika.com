<div class="page-menu font-nav background-black font--inverted d-sm-inline-flex overflow-hidden">
  <ul class="flex-shrink-0">
    <li class="d-sm-inline-block page-menu__home"><a <?php e($home->isOpen(), 'aria-current ') ?> href="<?= $home->url() ?>"><em><?= $home->title()->html() ?></em></a></li>
    <?php foreach ($menu as $item): ?>
      <li class="d-sm-inline-block"><a <?php e($item->isOpen(), 'aria-current ') ?> href="<?= $item->url() ?>"><?= $item->title()->html() ?></a></li>
    <?php endforeach ?>
    <?php foreach ($submenu as $item): ?>
      <li class="d-sm-inline-block"><a <?php e($item->isOpen(), 'aria-current ') ?> href="<?= $item->url() ?>"><?= $item->title()->html() ?></a></li>
    <?php endforeach ?>
  </ul>
  <ul class="d-none d-sm-inline-block flex-shrink-0" aria-hidde="true">
    <li class="d-sm-inline-block page-menu__home"><a <?php e($home->isOpen(), 'aria-current ') ?> href="<?= $home->url() ?>"><em><?= $home->title()->html() ?></em></a></li>
    <?php foreach ($menu as $item): ?>
      <li class="d-sm-inline-block"><a <?php e($item->isOpen(), 'aria-current ') ?> href="<?= $item->url() ?>"><?= $item->title()->html() ?></a></li>
    <?php endforeach ?>
    <?php foreach ($submenu as $item): ?>
      <li class="d-sm-inline-block"><a <?php e($item->isOpen(), 'aria-current ') ?> href="<?= $item->url() ?>"><?= $item->title()->html() ?></a></li>
    <?php endforeach ?>
  </ul>
  <ul class="d-none d-sm-inline-block flex-shrink-0" aria-hidde="true">
    <li class="d-sm-inline-block page-menu__home"><a <?php e($home->isOpen(), 'aria-current ') ?> href="<?= $home->url() ?>"><em><?= $home->title()->html() ?></em></a></li>
    <?php foreach ($menu as $item): ?>
      <li class="d-sm-inline-block"><a <?php e($item->isOpen(), 'aria-current ') ?> href="<?= $item->url() ?>"><?= $item->title()->html() ?></a></li>
    <?php endforeach ?>
    <?php foreach ($submenu as $item): ?>
      <li class="d-sm-inline-block"><a <?php e($item->isOpen(), 'aria-current ') ?> href="<?= $item->url() ?>"><?= $item->title()->html() ?></a></li>
    <?php endforeach ?>
  </ul>
  <ul class="d-none d-sm-inline-block flex-shrink-0" aria-hidde="true">
    <li class="d-sm-inline-block page-menu__home"><a <?php e($home->isOpen(), 'aria-current ') ?> href="<?= $home->url() ?>"><em><?= $home->title()->html() ?></em></a></li>
    <?php foreach ($menu as $item): ?>
      <li class="d-sm-inline-block"><a <?php e($item->isOpen(), 'aria-current ') ?> href="<?= $item->url() ?>"><?= $item->title()->html() ?></a></li>
    <?php endforeach ?>
    <?php foreach ($submenu as $item): ?>
      <li class="d-sm-inline-block"><a <?php e($item->isOpen(), 'aria-current ') ?> href="<?= $item->url() ?>"><?= $item->title()->html() ?></a></li>
    <?php endforeach ?>
  </ul>
</div>