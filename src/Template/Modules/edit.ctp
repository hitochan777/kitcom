<div class="modules form">
<?= $this->Form->create($module) ?>
	<fieldset>
		<legend><?= __('Edit Module'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('group_id', ['options' => $groups]);
		echo $this->Form->input('grade');
		echo $this->Form->input('class');
		echo $this->Form->input('class_type_id', ['options' => $classTypes]);
		echo $this->Form->input('credit');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
<div class="actions">
	<h3><?= __('Actions') ?></h3>
	<ul>
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $module->id], ['confirm' => __('Are you sure you want to delete # %s?', $module->id)]) ?></li>
		<li><?= $this->Html->link(__('List Modules'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List ClassTypes'), ['controller' => 'ClassTypes', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Class Type'), ['controller' => 'ClassTypes', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List TimeTables'), ['controller' => 'TimeTables', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Time Table'), ['controller' => 'TimeTables', 'action' => 'add']) ?> </li>
	</ul>
</div>
