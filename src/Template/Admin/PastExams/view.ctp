<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Past Exam'), ['action' => 'edit', $pastExam->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Past Exam'), ['action' => 'delete', $pastExam->id], ['confirm' => __('Are you sure you want to delete # %s?', $pastExam->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Past Exams'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Past Exam'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Modules'), ['controller' => 'Modules', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Module'), ['controller' => 'Modules', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List PastExamSolutions'), ['controller' => 'PastExamSolutions', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Past Exam Solution'), ['controller' => 'PastExamSolutions', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="pastExams view large-10 medium-9 columns">
	<h2><?= h($pastExam->id) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Module') ?></h6>
			<p><?= $pastExam->has('module') ? $this->Html->link($pastExam->module->name, ['controller' => 'Modules', 'action' => 'view', $pastExam->module->id]) : '' ?></p>
			<h6 class="subheader"><?= __('User') ?></h6>
			<p><?= $pastExam->has('user') ? $this->Html->link($pastExam->user->username, ['controller' => 'Users', 'action' => 'view', $pastExam->user->id]) : '' ?></p>
		</div>
		<div class="large-2 large-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($pastExam->id) ?></p>
		</div>
		<div class="large-2 columns dates end">
			<h6 class="subheader"><?= __('Modified') ?></h6>
			<p><?= h($pastExam->modified) ?></p>
			<h6 class="subheader"><?= __('Created') ?></h6>
			<p><?= h($pastExam->created) ?></p>
		</div>
	</div>
	<div class="row texts">
		<div class="columns large-9">
			<h6 class="subheader"><?= __('Content') ?></h6>
			<?= $this->Text->autoParagraph(h($pastExam->content)); ?>
		</div>
	</div>
</div>
<div class="related row">
	<div class="column large-12">
	<h4 class="subheader"><?= __('Related PastExamSolutions') ?></h4>
	<?php if (!empty($pastExam->past_exam_solutions)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id') ?></th>
			<th><?= __('User Id') ?></th>
			<th><?= __('Past Exam Id') ?></th>
			<th><?= __('Content') ?></th>
			<th><?= __('Modified') ?></th>
			<th><?= __('Created') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
		<?php foreach ($pastExam->past_exam_solutions as $pastExamSolutions): ?>
		<tr>
			<td><?= h($pastExamSolutions->id) ?></td>
			<td><?= h($pastExamSolutions->user_id) ?></td>
			<td><?= h($pastExamSolutions->past_exam_id) ?></td>
			<td><?= h($pastExamSolutions->content) ?></td>
			<td><?= h($pastExamSolutions->modified) ?></td>
			<td><?= h($pastExamSolutions->created) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['controller' => 'PastExamSolutions', 'action' => 'view', $pastExamSolutions->id]) ?>
				<?= $this->Html->link(__('Edit'), ['controller' => 'PastExamSolutions', 'action' => 'edit', $pastExamSolutions->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['controller' => 'PastExamSolutions', 'action' => 'delete', $pastExamSolutions->id], ['confirm' => __('Are you sure you want to delete # %s?', $pastExamSolutions->id)]) ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>
	</div>
</div>
