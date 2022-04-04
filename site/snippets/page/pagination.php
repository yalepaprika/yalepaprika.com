<?php if ($pagination->hasPages()): ?>
  <div id="page-pagination" class="page-pagination container-xxxl space-after-80">
    <div id="page-pagination__controls" class="page-pagination__controls row align-items-stretch">
      <?php if ($pagination->hasNextPage()): ?>
        <div class="page-pagination__next col">
          <div class="rule card h-100">
            <div>
              <h2 class="font--secondary">More</h2>
              <div>
                <a id="page-pagination__next-link" href="<?= $pagination->nextPageUrl() ?>" class="page-more__next-link card-target">
                  <?= pluralize($model, 2) ?>
                </a>
              </div>
            </div>
          </div>
        </div>
      <?php endif ?>
    </div>
    <div id="page-pagination__status" class="page-pagination__status">
      <div class="infinite-scroll-request" style="display: none;">
        <div class="font--secondary d-flex justify-content-center">
          <div class="loading-bounce" style="animation-duration: 0.8s;">
            <div style="animation-delay: -0.3s;"></div>
            <div style="animation-delay: -0.2s;"></div>
            <div style="animation-delay: -0.1s;"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif ?>
