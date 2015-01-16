<div class="classRooms view">
	<h2><?= __('Class Room') ?></h2>
	<dl>
		<dt><?= __('Id') ?></dt>
		<dd>
			<?= h($classRoom->id) ?>
			&nbsp;
		</dd>
		<dt><?= __('Name') ?></dt>
		<dd>
			<?= h($classRoom->name) ?>
			&nbsp;
		</dd>
		<dt><?= __('Created') ?></dt>
		<dd>
			<?= h($classRoom->created) ?>
			&nbsp;
		</dd>
		<dt><?= __('Modified') ?></dt>
		<dd>
			<?= h($classRoom->modified) ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?= __('Actions'); ?></h3>
	<ul>
		<li><?= $this->Html->link(__('Edit Class Room'), ['action' => 'edit', $classRoom->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Class Room'), ['action' => 'delete', $classRoom->id], ['confirm' => __('Are you sure you want to delete # %s?', $classRoom->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Class Rooms'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Class Room'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List TimeTables'), ['controller' => 'TimeTables', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Time Table'), ['controller' => 'TimeTables', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?= __('Related TimeTables') ?></h3>
	<?php if (!empty($classRoom->time_tables)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id') ?></th>
			<th><?= __('Class Room Id') ?></th>
			<th><?= __('Module Id') ?></th>
			<th><?= __('Day') ?></th>
			<th><?= __('Period Id') ?></th>
			<th><?= __('Semester Id') ?></th>
			<th><?= __('Is Open') ?></th>
			<th><?= __('Created') ?></th>
			<th><?= __('Modified') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
		<?php foreach ($classRoom->time_tables as $timeTables): ?>
		<tr>
			<td><?= h($timeTables->id) ?></td>
			<td><?= h($timeTables->class_room_id) ?></td>
			<td><?= h($timeTables->module_id) ?></td>
			<td><?= h($timeTables->day) ?></td>
			<td><?= h($timeTables->period_id) ?></td>
			<td><?= h($timeTables->semester_id) ?></td>
			<td><?= h($timeTables->is_open) ?></td>
			<td><?= h($timeTables->created) ?></td>
			<td><?= h($timeTables->modified) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['controller' => 'TimeTables', 'action' => 'view', $timeTables->id]) ?>
				<?= $this->Html->link(__('Edit'), ['controller' => 'TimeTables', 'action' => 'edit', $timeTables->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['controller' => 'TimeTables', 'action' => 'delete', $timeTables->id], ['confirm' => __('Are you sure you want to delete # %s?', $timeTables->id)]) ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>
	<div class="actions">
		<ul>
			<li><?= $this->Html->link(__('New Time Table'), ['controller' => 'TimeTables', 'action' => 'add']) ?> </li>
		</ul>
	</div>
</div>
