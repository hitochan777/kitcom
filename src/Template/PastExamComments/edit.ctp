<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pastExamComment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pastExamComment->id)]) ?></li>
		<li><?= $this->Html->link(__('List Past Exam Comments'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Past Exams'), ['controller' => 'PastExams', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Past Exam'), ['controller' => 'PastExams', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="pastExamComments form large-10 medium-9 columns">
<?= $this->Form->create($pastExamComment) ?>
	<fieldset>
		<legend><?= __('Edit Past Exam Comment') ?></legend>
	<?php
		echo $this->Form->input('user_id', ['options' => $users]);
		echo $this->Form->input('past_exam_id', ['options' => $pastExams]);
		echo $this->Form->input('content');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
