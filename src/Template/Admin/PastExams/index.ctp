<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Past Exam'), ['action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List Modules'), ['controller' => 'Modules', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Module'), ['controller' => 'Modules', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List PastExamSolutions'), ['controller' => 'PastExamSolutions', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Past Exam Solution'), ['controller' => 'PastExamSolutions', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="pastExams index large-10 medium-9 columns">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('module_id') ?></th>
			<th><?= $this->Paginator->sort('user_id') ?></th>
			<th><?= $this->Paginator->sort('modified') ?></th>
			<th><?= $this->Paginator->sort('created') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($pastExams as $pastExam): ?>
		<tr>
			<td><?= $this->Number->format($pastExam->id) ?></td>
			<td>
				<?= $pastExam->has('module') ? $this->Html->link($pastExam->module->name, ['controller' => 'Modules', 'action' => 'view', $pastExam->module->id]) : '' ?>
			</td>
			<td>
				<?= $pastExam->has('user') ? $this->Html->link($pastExam->user->username, ['controller' => 'Users', 'action' => 'view', $pastExam->user->id]) : '' ?>
			</td>
			<td><?= h($pastExam->modified) ?></td>
			<td><?= h($pastExam->created) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $pastExam->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $pastExam->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pastExam->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pastExam->id)]) ?>
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
