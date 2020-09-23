<div class="subscription-bundles box-block box-block-ruled cluster">
    <div class="_cluster">
      <?php foreach ($subscriptions as $subscription): ?>
        <div class="subscription-bundle box-card box-card-inverted stack">
          <div class="subscription-bundle-content stack">
            <h2><?= $subscription->title() ?></h2>
            <h3><?= $subscription->subtitle() ?></h3>
            <div class="description">
              <p><?= $subscription->description() ?></p>
            </div>
          </div>
          <div class="subscription-bundle-details cluster">
            <div class="_cluster">
              <div>
                <a class="button" href="<?= $subscription->button_link() ?>" target="_blank">Subscribe</a>
              </div>
              <div class="prices">
                <h4>$<?= $subscription->total_cost() ?></h4>
                <?php if ($subscription->cost_per_issue()->isNotEmpty()): ?>
                  <h4>($<?= $subscription->cost_per_issue() ?> per copy)</h4>
                <?php endif ?>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>


