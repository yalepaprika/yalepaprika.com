<?php if ($contributors->isNotEmpty()): ?>
  <div class="contributors-list">
    <?php snippet('utilities/heading', [
      'title' => $title ?? 'Contributors',
      'subtitle' => quantify('Contributor', $contributors->count())
    ]) ?>
    <div class="container-xxxl">
      <div class="row row-cols-2 row-cols-md-4">
        <?php $i = 0; ?>
        <?php $cols = [];?>
        <?php foreach ($contributors as $contributor): ?>
          <?php $cols[$i % 4][] = $contributor ?>
          <?php $i++; ?>
        <?php endforeach ?>
        <?php foreach ($cols as $col): ?>
          <div class="col">
            <div class="overflow-hidden">
              <div class="rule space-after-80">
                <?php foreach ($col as $contributor): ?>
                  <?php snippet('contributor/list-item', [
                    'contributor' => $contributor
                  ]) ?>
                <?php endforeach ?>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </div>
<?php endif ?>