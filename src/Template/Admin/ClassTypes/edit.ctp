<div class="classTypes form">
<?= $this->Form->create($classType) ?>
	<fieldset>
		<legend><?= __('Edit Class Type'); ?></legend>
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
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $classType->id], ['confirm' => __('Are you sure you want to delete # %s?', $classType->id)]) ?></li>
		<li><?= $this->Html->link(__('List Class Types'), ['action' => 'index']) ?></li>
	</ul>
</div>
