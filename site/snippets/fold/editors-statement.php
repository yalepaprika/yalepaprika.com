<div id="fold-editors-statement">
  <div class="font-heading space-after-80 rule">
    <div class="container-xxxl">
      <h2>Editor's Statement</h2>
      <div class="font--secondary">
        <?php if ($fold->coordinating_editors()->toPages()->isNotEmpty()): ?>
          <ul class="fold-editors-statement__contributors">
            <?php foreach ($fold->coordinating_editors()->toPages() as $contributor): ?>
              <li class="d-inline"><a href="<?= $contributor->url() ?>"><?= $contributor->title() ?></a></li>
            <?php endforeach ?>
          </ul>
        <?php endif ?>
      </div>
    </div>
  </div>
  <?php snippet('page/body', ['page' => $page]) ?>
</div>
