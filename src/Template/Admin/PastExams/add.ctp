<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('List Past Exams'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Modules'), ['controller' => 'Modules', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Module'), ['controller' => 'Modules', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List PastExamSolutions'), ['controller' => 'PastExamSolutions', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Past Exam Solution'), ['controller' => 'PastExamSolutions', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="pastExams form large-10 medium-9 columns">
<?= $this->Form->create($pastExam) ?>
	<fieldset>
		<legend><?= __('Add Past Exam') ?></legend>
	<?php
		echo $this->Form->input('module_id', ['options' => $modules]);
		echo $this->Form->input('user_id', ['options' => $users]);
		echo $this->Form->input('content');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
