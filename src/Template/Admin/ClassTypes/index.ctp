<div class="classTypes index">
	<h2><?= __('Class Types') ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?= $this->Paginator->sort('id') ?></th>
		<th><?= $this->Paginator->sort('name') ?></th>
		<th><?= $this->Paginator->sort('created') ?></th>
		<th><?= $this->Paginator->sort('modified') ?></th>
		<th class="actions"><?= __('Actions') ?></th>
	</tr>
	<?php foreach ($classTypes as $classType): ?>
	<tr>
		<td><?= h($classType->id) ?>&nbsp;</td>
		<td><?= h($classType->name) ?>&nbsp;</td>
		<td><?= h($classType->created) ?>&nbsp;</td>
		<td><?= h($classType->modified) ?>&nbsp;</td>
		<td class="actions">
			<?= $this->Html->link(__('View'), ['action' => 'view', $classType->id]) ?>
			<?= $this->Html->link(__('Edit'), ['action' => 'edit', $classType->id]) ?>
			<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $classType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $classType->id)]) ?>
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
		<li><?= $this->Html->link(__('New Class Type'), ['action' => 'add']) ?></li>
	</ul>
</div>
