<div class="groups form">
<?= $this->Form->create($group) ?>
	<fieldset>
		<legend><?= __('Add Group'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('parent_id', ['options' => $list]);
		echo $this->Form->input('is_dummy');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
<div class="actions">
	<h3><?= __('Actions') ?></h3>
	<ul>
		<li><?= $this->Html->link(__('List Groups'), ['action' => 'index']) ?></li>
	</ul>
</div>
