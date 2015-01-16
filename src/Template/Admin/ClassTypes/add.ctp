<div class="classTypes form">
<?= $this->Form->create($classType) ?>
	<fieldset>
		<legend><?= __('Add Class Type'); ?></legend>
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
		<li><?= $this->Html->link(__('List Class Types'), ['action' => 'index']) ?></li>
	</ul>
</div>
