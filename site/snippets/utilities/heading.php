<div class="rule font-heading space-after-80">
  <div class="container-xxxl">
    <div class="row">
      <?php if (isset($children)): ?>
        <?= $children ?>
      <?php else: ?>
        <?php $element = $as ?? 'h2'; ?>
        <<?= $element ?> class="col-sm-9"><?= $title ?></<?= $element ?>>
        <?php if (isset($subtitle)): ?>
          <div class="col-sm-3 font--secondary">
            <span><?= $subtitle ?></span>
          </div>
        <?php endif ?>
      <?php endif ?>
    </div>
  </div>
</div>