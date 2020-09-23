<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="noindex">
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#ff5722">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ff5722">
  <?php if ($page->isHomePage()): ?>
    <title><?= $site->title() ?></title>
  <?php else: ?>
    <title><?= $page->title() . ' | ' . $site->title() ?></title>
  <?php endif ?>
  <meta name="description" content="Paprika! is the often-weekly broadsheet published by the students of the Yale School of Architecture and Yale School of Art."/>
  <?= Bnomei\Fingerprint::css('/assets/css/main.css') ?>
</head>
<body>
