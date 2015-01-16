<div class="categories form">
<?= $this->Form->create($category) ?>
	<fieldset>
		<legend><?= __('Add Category'); ?></legend>
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
		<li><?= $this->Html->link(__('List Categories'), ['action' => 'index']) ?></li>
	</ul>
</div>
