<div class="categories view">
	<h2><?= __('Category') ?></h2>
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
<div class="actions">
	<h3><?= __('Actions'); ?></h3>
	<ul>
		<li><?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # %s?', $category->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Categories'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Category'), ['action' => 'add']) ?> </li>
	</ul>
</div>
