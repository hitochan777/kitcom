<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('List Modules'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List ClassTypes'), ['controller' => 'ClassTypes', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Class Type'), ['controller' => 'ClassTypes', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List TimeTables'), ['controller' => 'TimeTables', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Time Table'), ['controller' => 'TimeTables', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Posts'), ['controller' => 'Posts', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Post'), ['controller' => 'Posts', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="modules form large-10 medium-9 columns">
<?= $this->Form->create($module) ?>
	<fieldset>
		<legend><?= __('Add Module') ?></legend>
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
