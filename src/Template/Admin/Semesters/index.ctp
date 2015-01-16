<div class="semesters index">
	<h2><?= __('Semesters') ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?= $this->Paginator->sort('id') ?></th>
		<th><?= $this->Paginator->sort('name') ?></th>
		<th><?= $this->Paginator->sort('created') ?></th>
		<th><?= $this->Paginator->sort('modified') ?></th>
		<th class="actions"><?= __('Actions') ?></th>
	</tr>
	<?php foreach ($semesters as $semester): ?>
	<tr>
		<td><?= h($semester->id) ?>&nbsp;</td>
		<td><?= h($semester->name) ?>&nbsp;</td>
		<td><?= h($semester->created) ?>&nbsp;</td>
		<td><?= h($semester->modified) ?>&nbsp;</td>
		<td class="actions">
			<?= $this->Html->link(__('View'), ['action' => 'view', $semester->id]) ?>
			<?= $this->Html->link(__('Edit'), ['action' => 'edit', $semester->id]) ?>
			<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $semester->id], ['confirm' => __('Are you sure you want to delete # {0}?', $semester->id)]) ?>
		</td>
	</tr>
	<?php endforeach; ?>
	</table>
	<p><?= $this->Paginator->counter() ?></p>
	<ul class="pagination">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'));
		echo $this->Paginator->numbers();
		echo $this->Paginator->next(__('next') . ' >');
	?>
	</ul>
</div>
<div class="actions">
	<h3><?= __('Actions') ?></h3>
	<ul>
		<li><?= $this->Html->link(__('New Semester'), ['action' => 'add']) ?></li>
	</ul>
</div>
