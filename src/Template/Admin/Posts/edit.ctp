<div class="posts form">
<?= $this->Form->create($post) ?>
	<fieldset>
		<legend><?= __('Edit Post'); ?></legend>
	<?php
		echo $this->Form->input('user_id', ['options' => $users]);
		echo $this->Form->input('module_id', ['options' => $modules]);
		echo $this->Form->input('title');
		echo $this->Form->input('content');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
<div class="actions">
	<h3><?= __('Actions') ?></h3>
	<ul>
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $post->id], ['confirm' => __('Are you sure you want to delete # %s?', $post->id)]) ?></li>
		<li><?= $this->Html->link(__('List Posts'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Modules'), ['controller' => 'Modules', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Module'), ['controller' => 'Modules', 'action' => 'add']) ?> </li>
	</ul>
</div>
