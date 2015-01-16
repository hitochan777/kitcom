<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Past Exam Solution Comment'), ['action' => 'edit', $pastExamSolutionComment->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Past Exam Solution Comment'), ['action' => 'delete', $pastExamSolutionComment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pastExamSolutionComment->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Past Exam Solution Comments'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Past Exam Solution Comment'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Past Exam Solutions'), ['controller' => 'PastExamSolutions', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Past Exam Solution'), ['controller' => 'PastExamSolutions', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="pastExamSolutionComments view large-10 medium-9 columns">
	<h2><?= h($pastExamSolutionComment->id) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('User') ?></h6>
			<p><?= $pastExamSolutionComment->has('user') ? $this->Html->link($pastExamSolutionComment->user->username, ['controller' => 'Users', 'action' => 'view', $pastExamSolutionComment->user->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Past Exam Solution') ?></h6>
			<p><?= $pastExamSolutionComment->has('past_exam_solution') ? $this->Html->link($pastExamSolutionComment->past_exam_solution->id, ['controller' => 'PastExamSolutions', 'action' => 'view', $pastExamSolutionComment->past_exam_solution->id]) : '' ?></p>
		</div>
		<div class="large-2 large-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($pastExamSolutionComment->id) ?></p>
		</div>
		<div class="large-2 columns dates end">
			<h6 class="subheader"><?= __('Created') ?></h6>
			<p><?= h($pastExamSolutionComment->created) ?></p>
			<h6 class="subheader"><?= __('Modified') ?></h6>
			<p><?= h($pastExamSolutionComment->modified) ?></p>
		</div>
	</div>
	<div class="row texts">
		<div class="columns large-9">
			<h6 class="subheader"><?= __('Text') ?></h6>
			<?= $this->Text->autoParagraph(h($pastExamSolutionComment->text)); ?>
		</div>
	</div>
</div>
