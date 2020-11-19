<?php if ($pages->isNotEmpty()): ?>
  <dl class="cluster cluster-stack">
    <div class="_cluster">
      <dt class="detail-title"><h6><?= $title ?></h6></dt>
      <div class="detail-group">
        <?php foreach ($pages as $page): ?>
          <dd>
            <a href="<?= $page->url() ?>"><?= $page->title() ?></a>
          </dd>
        <?php endforeach ?>
      </div>
    </div>
  </dl>
<?php endif ?>
