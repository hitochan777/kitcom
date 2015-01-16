<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Module'), ['action' => 'edit', $module->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Module'), ['action' => 'delete', $module->id], ['confirm' => __('Are you sure you want to delete # %s?', $module->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Modules'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Module'), ['action' => 'add']) ?> </li>
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
<div class="modules view large-10 medium-9 columns">
	<h2><?= h($module->name) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Name') ?></h6>
			<p><?= h($module->name) ?></p>
			<h6 class="subheader"><?= __('Group') ?></h6>
			<p><?= $module->has('group') ? $this->Html->link($module->group->name, ['controller' => 'Groups', 'action' => 'view', $module->group->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Grade') ?></h6>
			<p><?= h($module->grade) ?></p>
			<h6 class="subheader"><?= __('Class') ?></h6>
			<p><?= h($module->class) ?></p>
			<h6 class="subheader"><?= __('Class Type') ?></h6>
			<p><?= $module->has('class_type') ? $this->Html->link($module->class_type->name, ['controller' => 'ClassTypes', 'action' => 'view', $module->class_type->id]) : '' ?></p>
		</div>
		<div class="large-2 large-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($module->id) ?></p>
			<h6 class="subheader"><?= __('Credit') ?></h6>
			<p><?= $this->Number->format($module->credit) ?></p>
		</div>
		<div class="large-2 columns dates end">
			<h6 class="subheader"><?= __('Created') ?></h6>
			<p><?= h($module->created) ?></p>
			<h6 class="subheader"><?= __('Modified') ?></h6>
			<p><?= h($module->modified) ?></p>
		</div>
	</div>
</div>
<div class="related row">
	<div class="column large-12">
	<h4 class="subheader"><?= __('Related TimeTables') ?></h4>
	<?php if (!empty($module->time_tables)): ?>
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
		<?php foreach ($module->time_tables as $timeTables): ?>
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
	</div>
</div>
<div class="related row">
	<div class="column large-12">
	<h4 class="subheader"><?= __('Related Posts') ?></h4>
	<?php if (!empty($module->posts)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id') ?></th>
			<th><?= __('User Id') ?></th>
			<th><?= __('Module Id') ?></th>
			<th><?= __('Title') ?></th>
			<th><?= __('Content') ?></th>
			<th><?= __('Created') ?></th>
			<th><?= __('Modified') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
		<?php foreach ($module->posts as $posts): ?>
		<tr>
			<td><?= h($posts->id) ?></td>
			<td><?= h($posts->user_id) ?></td>
			<td><?= h($posts->module_id) ?></td>
			<td><?= h($posts->title) ?></td>
			<td><?= h($posts->content) ?></td>
			<td><?= h($posts->created) ?></td>
			<td><?= h($posts->modified) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['controller' => 'Posts', 'action' => 'view', $posts->id]) ?>
				<?= $this->Html->link(__('Edit'), ['controller' => 'Posts', 'action' => 'edit', $posts->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['controller' => 'Posts', 'action' => 'delete', $posts->id], ['confirm' => __('Are you sure you want to delete # %s?', $posts->id)]) ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>
	</div>
</div>
