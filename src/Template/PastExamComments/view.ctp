<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Past Exam Comment'), ['action' => 'edit', $pastExamComment->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Past Exam Comment'), ['action' => 'delete', $pastExamComment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pastExamComment->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Past Exam Comments'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Past Exam Comment'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Past Exams'), ['controller' => 'PastExams', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Past Exam'), ['controller' => 'PastExams', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="pastExamComments view large-10 medium-9 columns">
	<h2><?= h($pastExamComment->id) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('User') ?></h6>
			<p><?= $pastExamComment->has('user') ? $this->Html->link($pastExamComment->user->username, ['controller' => 'Users', 'action' => 'view', $pastExamComment->user->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Past Exam') ?></h6>
			<p><?= $pastExamComment->has('past_exam') ? $this->Html->link($pastExamComment->past_exam->id, ['controller' => 'PastExams', 'action' => 'view', $pastExamComment->past_exam->id]) : '' ?></p>
		</div>
		<div class="large-2 large-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($pastExamComment->id) ?></p>
		</div>
		<div class="large-2 columns dates end">
			<h6 class="subheader"><?= __('Created') ?></h6>
			<p><?= h($pastExamComment->created) ?></p>
			<h6 class="subheader"><?= __('Modified') ?></h6>
			<p><?= h($pastExamComment->modified) ?></p>
		</div>
	</div>
	<div class="row texts">
		<div class="columns large-9">
			<h6 class="subheader"><?= __('Content') ?></h6>
			<?= $this->Text->autoParagraph(h($pastExamComment->content)); ?>
		</div>
	</div>
</div>
