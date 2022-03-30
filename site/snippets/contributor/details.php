<?php if ($page->titles()->isNotEmpty() || $page->degrees()->toStructure()->isNotEmpty()): ?>
  <div id="contributor-details" class="contributor-details font-heading space-after-100 rule">
    <div class="container-xxxl">
      <h2 class="sr-only">Contributor Details</h2>
      <?php if ($page->titles()->toStructure()->isNotEmpty()): ?>
        <h3 class="sr-only">Titles</h3>
        <ul>
          <?php foreach ($page->titles()->toStructure() as $title): ?>
            <?php if ($title->title()->isNotEmpty()): ?>
                <li><?= $page->formatTitle($title) ?></li>
              <?php endif ?>
          <?php endforeach ?>
        </ul>
      <?php endif ?>
      <div class="<?= $page->titles()->toStructure()->isNotEmpty() ? 'font--secondary' : '' ?>">
        <?php if ($page->degrees()->toStructure()->isNotEmpty()): ?>
          <h3 class="sr-only">Degrees</h3>
          <ul>
            <?php foreach ($page->degrees()->toStructure() as $degree): ?>
              <?php if ($degree->degree()->isNotEmpty()): ?>
                <li><?= $page->formatDegree($degree) ?></li>
              <?php endif ?>
            <?php endforeach ?>
          </ul>
        <?php endif ?>
      </div>
    </div>
  </div>
<?php endif ?>
