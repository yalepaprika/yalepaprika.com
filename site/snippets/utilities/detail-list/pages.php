<?php $element = $as ?? 'h4' ?>
<?php $inline = $inline ?? false ?>
<?php $show_title = $show_title ?? true ?>
<?php if ($pages->isNotEmpty()): ?>
  <<?= $element ?> class="<?= $show_title ? '' : 'sr-only'?> font--secondary"><?= $title ?></<?= $element ?>>
  <ul class="detail-list">
    <?php foreach ($pages as $page): ?>
      <li class="<?= $inline ? 'd-inline' : '' ?>"><a href="<?= $page->url() ?>"><?= $page->title() ?></a></li>
    <?php endforeach ?>
  </ul>
<?php endif ?>