<div id="subscription-viewer" class="subscription-viewer font--inverted background-black space-inside-before-20">
  <div class="container-xxxl">
    <div class="row">
      <div class="subscription-viewer__content col-12 col-md-3">
        <div class="space-after-40">
          <h2>Subscription Tiers</h2>
        </div>
      </div>
      <div class="subscription-viewer__details col-12 col-md-9">
        <div class="row row-cols-3">
          <?php foreach ($subscriptions as $subscription): ?>
            <?php snippet("page-subscribe/subscription-tier", ["subscription" => $subscription])?>
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>
</div>
