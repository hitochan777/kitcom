<div class="groups view">
	<h2><?= __('Group') ?></h2>
	<dl>
		<dt><?= __('グループ名') ?></dt>
		<dd>
			<?= h($group->name) ?>
			&nbsp;
		</dd>
		<dt><?= __('所属グループ') ?></dt>
		<dd>
			<?= isset($parent)?$this->Html->link($parent->name,["controller"=>"Groups","action"=>"view",$parent->id]):"なし"?>	
			&nbsp;
		</dd>
		<dt><?= __('ダミーグループかどうか') ?></dt>
		<dd>
			<?= h($group->is_dummy?"YES":"NO") ?>
			&nbsp;
		</dd>
		<dt><?= __("サブグループ")?></dt>
		<dd>
		<?php foreach($children as $child):?>
		<?= $this->Html->link($child->name,["controller"=>"Groups","action"=>"view",$child->id])?></br>
		<?php endforeach;?>	
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?= __('Actions'); ?></h3>
	<ul>
		<li><?= $this->Html->link(__('Edit Group'), ['action' => 'edit', $group->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Group'), ['action' => 'delete', $group->id], ['confirm' => __('Are you sure you want to delete # %s?', $group->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Groups'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Group'), ['action' => 'add']) ?> </li>
	</ul>
</div>
