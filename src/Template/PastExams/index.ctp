<div class="columns large-10 small-9">
<table class="table table-striped">
<?php 
	echo $this->Html->tableHeaders([
		$this->Paginator->sort('id'),
		$this->Paginator->sort('module_id'),
		$this->Paginator->sort('user_id'),
		$this->Paginator->sort('modified'),
		$this->Paginator->sort("created"),
		__("Actions")=>["class"=>"actions"]
	]);
?>

		<?php foreach ($pastExams as $pastExam): ?>
		<?= $this->Html->tableCells([
			$this->Number->format($pastExam->id),
			$pastExam->has('module') ? $this->Html->link($pastExam->module->name, ['controller' => 'Modules', 'action' => 'view', $pastExam->module->id]) : '',
			$pastExam->has('user') ? $this->Html->link($pastExam->user->username, ['controller' => 'Users', 'action' => 'view', $pastExam->user->id]) : '', 
			h($pastExam->modified),
			h($pastExam->created),
			$this->Html->link(__('View'), ['action' => 'view', $pastExam->id]).
			$this->Html->link(__('Edit'), ['action' => 'edit', $pastExam->id]).
			$this->Form->postLink(__('Delete'), ['action' => 'delete', $pastExam->id],['confirm' => __('Are you sure you want to delete # {0}?', $pastExam->id)])
		])?>	
		<?php endforeach; ?>
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
