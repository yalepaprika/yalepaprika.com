<div id="support-viewer" class="support-viewer font--inverted background-black space-inside-before-20">
  <div class="container-xxxl">
    <div class="row">
      <div class="support-viewer__content col-12 col-md-3">
        <div class="space-after-40">
          <h2>Support</h2>
        </div>
      </div>
      <div class="support-viewer__details col-12 col-md-9">
        <div class="row">
          <?php foreach ($support as $item): ?>
            <?php snippet("page-subscribe/support-item", ["support" => $item])?>
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>
</div>
