<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pastExamSolutionComment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pastExamSolutionComment->id)]) ?></li>
		<li><?= $this->Html->link(__('List Past Exam Solution Comments'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Past Exam Solutions'), ['controller' => 'PastExamSolutions', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Past Exam Solution'), ['controller' => 'PastExamSolutions', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="pastExamSolutionComments form large-10 medium-9 columns">
<?= $this->Form->create($pastExamSolutionComment) ?>
	<fieldset>
		<legend><?= __('Edit Past Exam Solution Comment') ?></legend>
	<?php
		echo $this->Form->input('user_id', ['options' => $users]);
		echo $this->Form->input('past_exam_solution_id', ['options' => $pastExamSolutions]);
		echo $this->Form->input('text');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
