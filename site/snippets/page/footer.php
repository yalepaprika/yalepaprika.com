<footer class="stack stack-small">
  <div class="box-block box-card cluster cluster-stack cluster-1-1-1-1-column cluster-switcher">
    <div class="_cluster">
      <div class="stack">
        <div class="footer-logo"><?= $home->title()->html() ?></div>
      </div>
      <ul>
        <?php foreach ($menu as $item): ?>
          <li><a <?php e($item->isOpen(), 'aria-current ') ?> href="<?= $item->url() ?>"><?= $item->title()->html() ?></a></li>
        <?php endforeach ?>
        <?php foreach ($submenu as $item): ?>
          <li><a <?php e($item->isOpen(), 'aria-current ') ?> href="<?= $item->url() ?>"><?= $item->title()->html() ?></a></li>
        <?php endforeach ?>
      </ul>
      <div class="footer-about box-narrower stack">
        <p class="dfooter-about-description"><em>Paprika!</em> is the often-weekly broadsheet published by the students of the Yale School of Architecture and Yale School of Art.</p>
        <p class="footer-about-status"><em>Paprika!</em> is a 501(c)(3) nonprofit organization.</p>
        <address>
          Rudolph Hall<br/>
          180 York St, New Haven, CT 06511
        </address>
      </div>
      <div>
          Newsletter
      </div>
    </div>
  </div>
  <div class="footer-furniture cluster">
    <div class="_cluster">
      <div class="circles">
      </div>
      <div class="dots"></div>
      <div class="footer-copyright"><em>Paprika!</em> © <?= date("Y"); ?></div>
    </div>
  </div>
</footer>
