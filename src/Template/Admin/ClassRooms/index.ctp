<div class="classRooms index">
	<h2><?= __('Class Rooms') ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?= $this->Paginator->sort('id') ?></th>
		<th><?= $this->Paginator->sort('name') ?></th>
		<th><?= $this->Paginator->sort('created') ?></th>
		<th><?= $this->Paginator->sort('modified') ?></th>
		<th class="actions"><?= __('Actions') ?></th>
	</tr>
	<?php foreach ($classRooms as $classRoom): ?>
	<tr>
		<td><?= h($classRoom->id) ?>&nbsp;</td>
		<td><?= h($classRoom->name) ?>&nbsp;</td>
		<td><?= h($classRoom->created) ?>&nbsp;</td>
		<td><?= h($classRoom->modified) ?>&nbsp;</td>
		<td class="actions">
			<?= $this->Html->link(__('View'), ['action' => 'view', $classRoom->id]) ?>
			<?= $this->Html->link(__('Edit'), ['action' => 'edit', $classRoom->id]) ?>
			<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $classRoom->id], ['confirm' => __('Are you sure you want to delete # {0}?', $classRoom->id)]) ?>
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
		<li><?= $this->Html->link(__('New Class Room'), ['action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List TimeTables'), ['controller' => 'TimeTables', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Time Table'), ['controller' => 'TimeTables', 'action' => 'add']) ?> </li>
	</ul>
</div>
