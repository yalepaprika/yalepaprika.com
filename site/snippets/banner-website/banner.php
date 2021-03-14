<div class="banner-website box-card stack stack-small">
  <div class="cluster">
    <div class="_cluster">
      <div class="banner-website-description box-block-small stack stack-small stack-space-between">
        <h6>Website</h6>
        <p><?= $description ?></p>
      </div>
      <div class="banner-subscribe-icon">
        <?= file_get_contents("assets/icons/link.svg"); ?>
      </div>
    </div>
  </div>
  <div>
    <a class="button button-primary" href="<?= $url ?>" target="_blank"><?= $title ?> ↗</a>
  </div>
</div>
