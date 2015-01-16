<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Past Exam Comment'), ['action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Past Exams'), ['controller' => 'PastExams', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Past Exam'), ['controller' => 'PastExams', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="pastExamComments index large-10 medium-9 columns">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('user_id') ?></th>
			<th><?= $this->Paginator->sort('past_exam_id') ?></th>
			<th><?= $this->Paginator->sort('created') ?></th>
			<th><?= $this->Paginator->sort('modified') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($pastExamComments as $pastExamComment): ?>
		<tr>
			<td><?= $this->Number->format($pastExamComment->id) ?></td>
			<td>
				<?= $pastExamComment->has('user') ? $this->Html->link($pastExamComment->user->username, ['controller' => 'Users', 'action' => 'view', $pastExamComment->user->id]) : '' ?>
			</td>
			<td>
				<?= $pastExamComment->has('past_exam') ? $this->Html->link($pastExamComment->past_exam->id, ['controller' => 'PastExams', 'action' => 'view', $pastExamComment->past_exam->id]) : '' ?>
			</td>
			<td><?= h($pastExamComment->created) ?></td>
			<td><?= h($pastExamComment->modified) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $pastExamComment->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $pastExamComment->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pastExamComment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pastExamComment->id)]) ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
	<div class="paginator">
		<ul class="pagination">
		<?php
			echo $this->Paginator->prev('< ' . __('previous'));
			echo $this->Paginator->numbers();
			echo $this->Paginator->next(__('next') . ' >');
		?>
		</ul>
		<p><?= $this->Paginator->counter() ?></p>
	</div>
</div>
