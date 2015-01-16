<div class="semesters view">
	<h2><?= __('Semester') ?></h2>
	<dl>
		<dt><?= __('Id') ?></dt>
		<dd>
			<?= h($semester->id) ?>
			&nbsp;
		</dd>
		<dt><?= __('Name') ?></dt>
		<dd>
			<?= h($semester->name) ?>
			&nbsp;
		</dd>
		<dt><?= __('Created') ?></dt>
		<dd>
			<?= h($semester->created) ?>
			&nbsp;
		</dd>
		<dt><?= __('Modified') ?></dt>
		<dd>
			<?= h($semester->modified) ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?= __('Actions'); ?></h3>
	<ul>
		<li><?= $this->Html->link(__('Edit Semester'), ['action' => 'edit', $semester->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Semester'), ['action' => 'delete', $semester->id], ['confirm' => __('Are you sure you want to delete # %s?', $semester->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Semesters'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Semester'), ['action' => 'add']) ?> </li>
	</ul>
</div>
