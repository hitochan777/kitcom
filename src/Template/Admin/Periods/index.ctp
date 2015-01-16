<div class="periods index">
	<h2><?= __('Periods') ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?= $this->Paginator->sort('id') ?></th>
		<th><?= $this->Paginator->sort('name') ?></th>
		<th><?= $this->Paginator->sort('start_time') ?></th>
		<th><?= $this->Paginator->sort('end_time') ?></th>
		<th><?= $this->Paginator->sort('created') ?></th>
		<th><?= $this->Paginator->sort('modified') ?></th>
		<th class="actions"><?= __('Actions') ?></th>
	</tr>
	<?php foreach ($periods as $period): ?>
	<tr>
		<td><?= h($period->id) ?>&nbsp;</td>
		<td><?= h($period->name) ?>&nbsp;</td>
		<td><?= h($period->start_time) ?>&nbsp;</td>
		<td><?= h($period->end_time) ?>&nbsp;</td>
		<td><?= h($period->created) ?>&nbsp;</td>
		<td><?= h($period->modified) ?>&nbsp;</td>
		<td class="actions">
			<?= $this->Html->link(__('View'), ['action' => 'view', $period->id]) ?>
			<?= $this->Html->link(__('Edit'), ['action' => 'edit', $period->id]) ?>
			<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $period->id], ['confirm' => __('Are you sure you want to delete # {0}?', $period->id)]) ?>
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
		<li><?= $this->Html->link(__('New Period'), ['action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List TimeTables'), ['controller' => 'TimeTables', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Time Table'), ['controller' => 'TimeTables', 'action' => 'add']) ?> </li>
	</ul>
</div>
