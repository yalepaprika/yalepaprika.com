<?php if ($support->isNotEmpty()): ?>
  <div class="support-tier">
    <div class="col rule space-after-40">
      <div class="space-after-40">
        <div><?= $support->title() ?></div>
        <div class="font--secondary">
          <?= $support->description()->kirbytext() ?>
        </div>
      </div>
      <div>
        <a class="button button-primary" href="<?= $support->button_link() ?>" target="_blank">Donate</a>
      </div>
    </div>
  </div>
<?php endif ?>
