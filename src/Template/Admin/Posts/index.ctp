<div class="posts index">
	<h2><?= __('Posts') ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?= $this->Paginator->sort('id') ?></th>
		<th><?= $this->Paginator->sort('user_id') ?></th>
		<th><?= $this->Paginator->sort('module_id') ?></th>
		<th><?= $this->Paginator->sort('title') ?></th>
		<th><?= $this->Paginator->sort('content') ?></th>
		<th><?= $this->Paginator->sort('created') ?></th>
		<th><?= $this->Paginator->sort('modified') ?></th>
		<th class="actions"><?= __('Actions') ?></th>
	</tr>
	<?php foreach ($posts as $post): ?>
	<tr>
		<td><?= h($post->id) ?>&nbsp;</td>
		<td>
			<?= $post->has('user') ? $this->Html->link($post->user->id, ['controller' => 'Users', 'action' => 'view', $post->user->id]) : '' ?>
		</td>
		<td>
			<?= $post->has('module') ? $this->Html->link($post->module->name, ['controller' => 'Modules', 'action' => 'view', $post->module->id]) : '' ?>
		</td>
		<td><?= h($post->title) ?>&nbsp;</td>
		<td><?= h($post->content) ?>&nbsp;</td>
		<td><?= h($post->created) ?>&nbsp;</td>
		<td><?= h($post->modified) ?>&nbsp;</td>
		<td class="actions">
			<?= $this->Html->link(__('View'), ['action' => 'view', $post->id]) ?>
			<?= $this->Html->link(__('Edit'), ['action' => 'edit', $post->id]) ?>
			<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $post->id], ['confirm' => __('Are you sure you want to delete # {0}?', $post->id)]) ?>
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
		<li><?= $this->Html->link(__('New Post'), ['action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Modules'), ['controller' => 'Modules', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Module'), ['controller' => 'Modules', 'action' => 'add']) ?> </li>
	</ul>
</div>
