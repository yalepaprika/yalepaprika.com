<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="noindex">

  <?php if ($page->isHomePage()): ?>
    <title><?= $site->title() ?></title>
  <?php else: ?>
    <title><?= $page->title() . ' | ' . $site->title() ?></title>
  <?php endif ?>
  <meta name="description" content="Paprika! is a window into emerging discourse from Yale School of Architecture and Yale School of Art."/>
  <?= css('assets/css/main.css') ?>
</head>
<body>
