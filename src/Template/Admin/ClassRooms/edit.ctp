<div class="classRooms form">
<?= $this->Form->create($classRoom) ?>
	<fieldset>
		<legend><?= __('Edit Class Room'); ?></legend>
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
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $classRoom->id], ['confirm' => __('Are you sure you want to delete # %s?', $classRoom->id)]) ?></li>
		<li><?= $this->Html->link(__('List Class Rooms'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List TimeTables'), ['controller' => 'TimeTables', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Time Table'), ['controller' => 'TimeTables', 'action' => 'add']) ?> </li>
	</ul>
</div>
