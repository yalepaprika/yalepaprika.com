<?php if ($subscription->isNotEmpty()): ?>
  <div class="subscription-tier">
    <div class="col rule space-after-40">
      <div class="space-after-40">
        <div><?= $subscription->title() ?></div>
        <div><?= $subscription->subtitle() ?></div>
        <div class="font--secondary">
          <?= $subscription->description()->kirbytext() ?>
        </div>
      </div>
      <div class="prices" >
        <div>$<?= $subscription->total_cost() ?></div>
        <?php if ($subscription->cost_per_issue()->isNotEmpty()): ?>
          <div class="font--secondary">($<?= $subscription->cost_per_issue() ?> per copy)</div>
        <?php endif ?>
      </div>
      <div>
        <a class="button button-primary" href="<?= $subscription->button_link() ?>" target="_blank">Subscribe</a>
      </div>
    </div>
  </div>
<?php endif ?>
