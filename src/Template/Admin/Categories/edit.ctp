<div class="categories form">
<?= $this->Form->create($category) ?>
	<fieldset>
		<legend><?= __('Edit Category'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
<div class="actions">
	<h3><?= __('Actions') ?></h3>
	<ul>
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # %s?', $category->id)]) ?></li>
		<li><?= $this->Html->link(__('List Categories'), ['action' => 'index']) ?></li>
	</ul>
</div>
