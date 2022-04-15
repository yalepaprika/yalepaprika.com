<nav id="page-nav" class="page-nav background-paprika font-nav space-before-10 space-after-10 d-flex justify-content-between">
  <div class="page-nav__controls font--inverted d-sm-none">
    <button id="page-nav__toggle" aria-expanded="false" aria-controls="menu" class="page-nav__toggle">Menu</button>
  </div>
  <div class="page-nav__menu font--inverted d-sm-inline-flex overflow-hidden">
    <ul class="flex-shrink-0">
      <li class="d-sm-inline-block page-nav__home"><a <?php e($home->isOpen(), 'aria-current ') ?> href="<?= $home->url() ?>"><em><?= $home->title()->html() ?></em></a></li>
      <?php foreach ($menu as $item): ?>
        <li class="d-sm-inline-block"><a <?php e($item->isOpen(), 'aria-current ') ?> href="<?= $item->url() ?>"><?= $item->title()->html() ?></a></li>
      <?php endforeach ?>
      <?php foreach ($submenu as $item): ?>
        <li class="d-sm-inline-block"><a <?php e($item->isOpen(), 'aria-current ') ?> href="<?= $item->url() ?>"><?= $item->title()->html() ?></a></li>
      <?php endforeach ?>
    </ul>
    <ul class="d-none d-sm-inline-block flex-shrink-0" aria-hidde="true">
      <li class="d-sm-inline-block page-nav__home"><a <?php e($home->isOpen(), 'aria-current ') ?> href="<?= $home->url() ?>"><em><?= $home->title()->html() ?></em></a></li>
      <?php foreach ($menu as $item): ?>
        <li class="d-sm-inline-block"><a <?php e($item->isOpen(), 'aria-current ') ?> href="<?= $item->url() ?>"><?= $item->title()->html() ?></a></li>
      <?php endforeach ?>
      <?php foreach ($submenu as $item): ?>
        <li class="d-sm-inline-block"><a <?php e($item->isOpen(), 'aria-current ') ?> href="<?= $item->url() ?>"><?= $item->title()->html() ?></a></li>
      <?php endforeach ?>
    </ul>
    <ul class="d-none d-sm-inline-block flex-shrink-0" aria-hidde="true">
      <li class="d-sm-inline-block page-nav__home"><a <?php e($home->isOpen(), 'aria-current ') ?> href="<?= $home->url() ?>"><em><?= $home->title()->html() ?></em></a></li>
      <?php foreach ($menu as $item): ?>
        <li class="d-sm-inline-block"><a <?php e($item->isOpen(), 'aria-current ') ?> href="<?= $item->url() ?>"><?= $item->title()->html() ?></a></li>
      <?php endforeach ?>
      <?php foreach ($submenu as $item): ?>
        <li class="d-sm-inline-block"><a <?php e($item->isOpen(), 'aria-current ') ?> href="<?= $item->url() ?>"><?= $item->title()->html() ?></a></li>
      <?php endforeach ?>
    </ul>
    <ul class="d-none d-sm-inline-block flex-shrink-0" aria-hidde="true">
      <li class="d-sm-inline-block page-nav__home"><a <?php e($home->isOpen(), 'aria-current ') ?> href="<?= $home->url() ?>"><em><?= $home->title()->html() ?></em></a></li>
      <?php foreach ($menu as $item): ?>
        <li class="d-sm-inline-block"><a <?php e($item->isOpen(), 'aria-current ') ?> href="<?= $item->url() ?>"><?= $item->title()->html() ?></a></li>
      <?php endforeach ?>
      <?php foreach ($submenu as $item): ?>
        <li class="d-sm-inline-block"><a <?php e($item->isOpen(), 'aria-current ') ?> href="<?= $item->url() ?>"><?= $item->title()->html() ?></a></li>
      <?php endforeach ?>
    </ul>
  </div>
</nav>
