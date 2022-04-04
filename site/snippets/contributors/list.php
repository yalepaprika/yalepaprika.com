<?php if ($contributors->isNotEmpty()): ?>
  <div class="contributors-list">
    <?php snippet('utilities/heading', [
      'title' => $title ?? 'Contributors',
      'subtitle' => quantify('Contributor', $contributors->count())
    ]) ?>
    <div class="container-xxxl">
      <div class="row row-cols-2 row-cols-md-4">
        <?php $i = 0 ?>
        <?php $count = $contributors->count() ?>
        <?php $columns = $contributors->groupBy(function ($contributor) use (&$i, $count) {
          $column = floor($i / ceil($count / 4)) + 1;
          $i++;
          return $column;
        }) ?>
        <?php foreach ($columns as $column): ?>
          <div class="col">
            <div class="overflow-hidden">
              <div class="rule space-after-80">
                <?php foreach ($column as $contributor): ?>
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