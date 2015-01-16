<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Module'), ['action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List ClassTypes'), ['controller' => 'ClassTypes', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Class Type'), ['controller' => 'ClassTypes', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List TimeTables'), ['controller' => 'TimeTables', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Time Table'), ['controller' => 'TimeTables', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Posts'), ['controller' => 'Posts', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Post'), ['controller' => 'Posts', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="modules index large-10 medium-9 columns">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('name') ?></th>
			<th><?= $this->Paginator->sort('group_id') ?></th>
			<th><?= $this->Paginator->sort('grade') ?></th>
			<th><?= $this->Paginator->sort('class') ?></th>
			<th><?= $this->Paginator->sort('class_type_id') ?></th>
			<th><?= $this->Paginator->sort('credit') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($modules as $module): ?>
		<tr>
			<td><?= $this->Number->format($module->id) ?></td>
			<td><?= h($module->name) ?></td>
			<td>
				<?= $module->has('group') ? $this->Html->link($module->group->name, ['controller' => 'Groups', 'action' => 'view', $module->group->id]) : '' ?>
			</td>
			<td><?= h($module->grade) ?></td>
			<td><?= h($module->class) ?></td>
			<td>
				<?= $module->has('class_type') ? $this->Html->link($module->class_type->name, ['controller' => 'ClassTypes', 'action' => 'view', $module->class_type->id]) : '' ?>
			</td>
			<td><?= $this->Number->format($module->credit) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $module->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $module->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $module->id], ['confirm' => __('Are you sure you want to delete # {0}?', $module->id)]) ?>
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
