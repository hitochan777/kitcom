<div class="modules index columns large-10 small-9">
	<h2><?= __('科目') ?></h2>
	<table class="table table-striped">
	<tr>
		<th><?= $this->Paginator->sort('name',"科目名") ?></th>
		<th><?= $this->Paginator->sort('group_id',"グループ") ?></th>
		<th><?= $this->Paginator->sort('grade',"学年") ?></th>
		<th><?= $this->Paginator->sort('class',"クラス") ?></th>
		<th><?= $this->Paginator->sort('class_type_id',"授業形式") ?></th>
		<th><?= $this->Paginator->sort('credit',"単位") ?></th>
	</tr>
	<?php foreach ($modules as $module): ?>
	<tr>
		<td><?= $this->Html->link($module->name,["controller"=>"Modules","action"=>"view",$module->id]) ?>&nbsp;</td>
		<td>
			<?= $module->has('group') ? $this->Html->link($module->group->name, ['controller' => 'Groups', 'action' => 'view', $module->group->id]) : '' ?>
		</td>
		<td><?= h($module->grade) ?>&nbsp;</td>
		<td><?= h($module->class) ?>&nbsp;</td>
		<td>
			<?= $module->has('class_type') ? $module->class_type->name: '' ?>
		</td>
		<td><?= h($module->credit) ?>&nbsp;</td>
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
