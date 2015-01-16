<div class="semesters form">
<?= $this->Form->create($semester) ?>
	<fieldset>
		<legend><?= __('Add Semester'); ?></legend>
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
		<li><?= $this->Html->link(__('List Semesters'), ['action' => 'index']) ?></li>
	</ul>
</div>
