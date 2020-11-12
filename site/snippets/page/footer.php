<footer class="stack stack-small">
  <div class="box-block box-card cluster cluster-stack cluster-1-1-1-1-column cluster-switcher">
    <div class="_cluster">
      <div class="box-block stack">
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
        <form action="https://yalepaprika.us1.list-manage.com/subscribe/post?u=4ca966a132d110cd3f44a5d47&amp;id=5281aa2685" class="validate" id="mc-embedded-subscribe-form" method="post" name="mc-embedded-subscribe-form" novalidate="" target="_blank">
          <div class="stack" id="mc_embed_signup_scroll">
            <label for="mce-EMAIL">Sign up to receive new <em>Paprika!</em> issues by email.</label>
            <div class="footer-subscribe-input cluster cluster-stack cluster-stack-small">
              <div class="_cluster">
                <input name="EMAIL" value="" class="email" id="mce-EMAIL" type="email" required="" placeholder="Email">
                <div style="position:absolute;left:-5000px" aria-hidden="true">
                  <input name="b_4ca966a132d110cd3f44a5d47_5281aa2685" value="" tabindex="-1" type="text">
                </div>
                <input name="subscribe" value="Sign Up" class="button" id="mc-embedded-subscribe" type="submit">
              </div>
            </div>
          </div>
        </form>
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
