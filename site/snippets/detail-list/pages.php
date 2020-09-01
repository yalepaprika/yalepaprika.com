<?php if ($pages->isNotEmpty()): ?>
  <dl>
    <dt><?= $title ?></dt>
    <?php foreach ($pages as $page): ?>
      <dd>
        <a href="<?= $page->url() ?>"><?= $page->title() ?></a>
      </dd>
    <?php endforeach ?>
  </dl>
<?php endif ?>
