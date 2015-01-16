<div class="semesters form">
<?= $this->Form->create($semester) ?>
	<fieldset>
		<legend><?= __('Edit Semester'); ?></legend>
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
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $semester->id], ['confirm' => __('Are you sure you want to delete # %s?', $semester->id)]) ?></li>
		<li><?= $this->Html->link(__('List Semesters'), ['action' => 'index']) ?></li>
	</ul>
</div>
