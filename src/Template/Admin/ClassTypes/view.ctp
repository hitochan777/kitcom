<div class="classTypes view">
	<h2><?= __('Class Type') ?></h2>
	<dl>
		<dt><?= __('Id') ?></dt>
		<dd>
			<?= h($classType->id) ?>
			&nbsp;
		</dd>
		<dt><?= __('Name') ?></dt>
		<dd>
			<?= h($classType->name) ?>
			&nbsp;
		</dd>
		<dt><?= __('Created') ?></dt>
		<dd>
			<?= h($classType->created) ?>
			&nbsp;
		</dd>
		<dt><?= __('Modified') ?></dt>
		<dd>
			<?= h($classType->modified) ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?= __('Actions'); ?></h3>
	<ul>
		<li><?= $this->Html->link(__('Edit Class Type'), ['action' => 'edit', $classType->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Class Type'), ['action' => 'delete', $classType->id], ['confirm' => __('Are you sure you want to delete # %s?', $classType->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Class Types'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Class Type'), ['action' => 'add']) ?> </li>
	</ul>
</div>
