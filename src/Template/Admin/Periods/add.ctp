<div class="periods form">
<?= $this->Form->create($period) ?>
	<fieldset>
		<legend><?= __('Add Period'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('start_time');
		echo $this->Form->input('end_time');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
<div class="actions">
	<h3><?= __('Actions') ?></h3>
	<ul>
		<li><?= $this->Html->link(__('List Periods'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List TimeTables'), ['controller' => 'TimeTables', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Time Table'), ['controller' => 'TimeTables', 'action' => 'add']) ?> </li>
	</ul>
</div>
