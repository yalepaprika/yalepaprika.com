<div class="banner-link box-card stack stack-small">
  <div class="cluster">
    <div class="_cluster">
      <div class="banner-link-description box-block-small stack stack-small stack-space-between">
        <h6>Link</h6>
        <p><?= $banner->description()->kirbytext() ?></p>
      </div>
      <div class="banner-subscribe-icon">
        <?= file_get_contents("assets/icons/link.svg"); ?>
      </div>
    </div>
  </div>
  <div>
    <a class="button button-primary" href="<?= $banner->link() ?>" target="_blank"><?= $banner->text() ?> ↗</a>
  </div>
</div>
