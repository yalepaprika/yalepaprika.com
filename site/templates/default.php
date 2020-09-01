<?php snippet('header') ?>
<?php snippet('menu', ['items' => collection('menu')->add(collection('submenu'))]) ?>

<h1><?= $page->title() ?></h1>

<?php snippet('footer') ?>
