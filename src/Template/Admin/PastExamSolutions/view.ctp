<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Past Exam Solution'), ['action' => 'edit', $pastExamSolution->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Past Exam Solution'), ['action' => 'delete', $pastExamSolution->id], ['confirm' => __('Are you sure you want to delete # %s?', $pastExamSolution->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Past Exam Solutions'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Past Exam Solution'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List PastExams'), ['controller' => 'PastExams', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Past Exam'), ['controller' => 'PastExams', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="pastExamSolutions view large-10 medium-9 columns">
	<h2><?= h($pastExamSolution->id) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('User') ?></h6>
			<p><?= $pastExamSolution->has('user') ? $this->Html->link($pastExamSolution->user->username, ['controller' => 'Users', 'action' => 'view', $pastExamSolution->user->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Past Exam') ?></h6>
			<p><?= $pastExamSolution->has('past_exam') ? $this->Html->link($pastExamSolution->past_exam->id, ['controller' => 'PastExams', 'action' => 'view', $pastExamSolution->past_exam->id]) : '' ?></p>
		</div>
		<div class="large-2 large-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($pastExamSolution->id) ?></p>
		</div>
		<div class="large-2 columns dates end">
			<h6 class="subheader"><?= __('Modified') ?></h6>
			<p><?= h($pastExamSolution->modified) ?></p>
			<h6 class="subheader"><?= __('Created') ?></h6>
			<p><?= h($pastExamSolution->created) ?></p>
		</div>
	</div>
	<div class="row texts">
		<div class="columns large-9">
			<h6 class="subheader"><?= __('Content') ?></h6>
			<?= $this->Text->autoParagraph(h($pastExamSolution->content)); ?>
		</div>
	</div>
</div>
