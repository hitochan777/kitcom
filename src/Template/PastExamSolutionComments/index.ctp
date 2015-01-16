<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Past Exam Solution Comment'), ['action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Past Exam Solutions'), ['controller' => 'PastExamSolutions', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Past Exam Solution'), ['controller' => 'PastExamSolutions', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="pastExamSolutionComments index large-10 medium-9 columns">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('user_id') ?></th>
			<th><?= $this->Paginator->sort('past_exam_solution_id') ?></th>
			<th><?= $this->Paginator->sort('created') ?></th>
			<th><?= $this->Paginator->sort('modified') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($pastExamSolutionComments as $pastExamSolutionComment): ?>
		<tr>
			<td><?= $this->Number->format($pastExamSolutionComment->id) ?></td>
			<td>
				<?= $pastExamSolutionComment->has('user') ? $this->Html->link($pastExamSolutionComment->user->username, ['controller' => 'Users', 'action' => 'view', $pastExamSolutionComment->user->id]) : '' ?>
			</td>
			<td>
				<?= $pastExamSolutionComment->has('past_exam_solution') ? $this->Html->link($pastExamSolutionComment->past_exam_solution->id, ['controller' => 'PastExamSolutions', 'action' => 'view', $pastExamSolutionComment->past_exam_solution->id]) : '' ?>
			</td>
			<td><?= h($pastExamSolutionComment->created) ?></td>
			<td><?= h($pastExamSolutionComment->modified) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $pastExamSolutionComment->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $pastExamSolutionComment->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pastExamSolutionComment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pastExamSolutionComment->id)]) ?>
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
