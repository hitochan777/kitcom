<div class="categories view">
	<h2><?= __('カテゴリー') ?></h2>
	<dl>
		<dt><?= __('Id') ?></dt>
		<dd>
			<?= h($category->id) ?>
			&nbsp;
		</dd>
		<dt><?= __('Name') ?></dt>
		<dd>
			<?= h($category->name) ?>
			&nbsp;
		</dd>
		<dt><?= __('Created') ?></dt>
		<dd>
			<?= h($category->created) ?>
			&nbsp;
		</dd>
		<dt><?= __('Modified') ?></dt>
		<dd>
			<?= h($category->modified) ?>
			&nbsp;
		</dd>
	</dl>
</div>
