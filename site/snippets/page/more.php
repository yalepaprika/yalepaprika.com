<?php if ($pagination->hasPages()): ?>
  <div id="page-more" class="page-more container-xxxl space-after-40">
    <div class="row align-items-stretch">
      <?php if ($pagination->hasNextPage()): ?>
        <div class="page-more__next col">
          <div class="rule card h-100">
            <div>
              <h2 class="font--secondary">More</h2>
              <div>
                <a id="page-more__next-link" href="<?= $pagination->nextPageUrl() ?>" class="page-more__next-link card-target">
                  <?= pluralize($model, 2) ?>
                </a>
              </div>
            </div>
          </div>
        </div>
      <?php endif ?>
    </div>
  </div>
<?php endif ?>
