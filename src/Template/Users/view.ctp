<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Department'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Department']['name'], array('controller' => 'departments', 'action' => 'view', $user['Department']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($user['User']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Departments'), array('controller' => 'departments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Department'), array('controller' => 'departments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Book Selling Post Comments'), array('controller' => 'book_selling_post_comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Book Selling Post Comment'), array('controller' => 'book_selling_post_comments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Book Selling Posts'), array('controller' => 'book_selling_posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Book Selling Post'), array('controller' => 'book_selling_posts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comments'), array('controller' => 'comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comment'), array('controller' => 'comments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Solutions'), array('controller' => 'solutions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Solution'), array('controller' => 'solutions', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Book Selling Post Comments'); ?></h3>
	<?php if (!empty($user['BookSellingPostComment'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Book Selling Post Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Info'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['BookSellingPostComment'] as $bookSellingPostComment): ?>
		<tr>
			<td><?php echo $bookSellingPostComment['id']; ?></td>
			<td><?php echo $bookSellingPostComment['book_selling_post_id']; ?></td>
			<td><?php echo $bookSellingPostComment['user_id']; ?></td>
			<td><?php echo $bookSellingPostComment['title']; ?></td>
			<td><?php echo $bookSellingPostComment['info']; ?></td>
			<td><?php echo $bookSellingPostComment['created']; ?></td>
			<td><?php echo $bookSellingPostComment['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'book_selling_post_comments', 'action' => 'view', $bookSellingPostComment['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'book_selling_post_comments', 'action' => 'edit', $bookSellingPostComment['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'book_selling_post_comments', 'action' => 'delete', $bookSellingPostComment['id']), array(), __('Are you sure you want to delete # %s?', $bookSellingPostComment['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Book Selling Post Comment'), array('controller' => 'book_selling_post_comments', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Book Selling Posts'); ?></h3>
	<?php if (!empty($user['BookSellingPost'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Module Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Info'); ?></th>
		<th><?php echo __('Is Sold'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['BookSellingPost'] as $bookSellingPost): ?>
		<tr>
			<td><?php echo $bookSellingPost['id']; ?></td>
			<td><?php echo $bookSellingPost['module_id']; ?></td>
			<td><?php echo $bookSellingPost['user_id']; ?></td>
			<td><?php echo $bookSellingPost['title']; ?></td>
			<td><?php echo $bookSellingPost['info']; ?></td>
			<td><?php echo $bookSellingPost['is_sold']; ?></td>
			<td><?php echo $bookSellingPost['created']; ?></td>
			<td><?php echo $bookSellingPost['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'book_selling_posts', 'action' => 'view', $bookSellingPost['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'book_selling_posts', 'action' => 'edit', $bookSellingPost['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'book_selling_posts', 'action' => 'delete', $bookSellingPost['id']), array(), __('Are you sure you want to delete # %s?', $bookSellingPost['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Book Selling Post'), array('controller' => 'book_selling_posts', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Comments'); ?></h3>
	<?php if (!empty($user['Comment'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Solution Id'); ?></th>
		<th><?php echo __('Question Id'); ?></th>
		<th><?php echo __('Content'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Comment'] as $comment): ?>
		<tr>
			<td><?php echo $comment['id']; ?></td>
			<td><?php echo $comment['user_id']; ?></td>
			<td><?php echo $comment['solution_id']; ?></td>
			<td><?php echo $comment['question_id']; ?></td>
			<td><?php echo $comment['content']; ?></td>
			<td><?php echo $comment['created']; ?></td>
			<td><?php echo $comment['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'comments', 'action' => 'view', $comment['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'comments', 'action' => 'edit', $comment['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'comments', 'action' => 'delete', $comment['id']), array(), __('Are you sure you want to delete # %s?', $comment['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Comment'), array('controller' => 'comments', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Questions'); ?></h3>
	<?php if (!empty($user['Question'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Module Id'); ?></th>
		<th><?php echo __('Department Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Content'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Question'] as $question): ?>
		<tr>
			<td><?php echo $question['id']; ?></td>
			<td><?php echo $question['user_id']; ?></td>
			<td><?php echo $question['module_id']; ?></td>
			<td><?php echo $question['department_id']; ?></td>
			<td><?php echo $question['title']; ?></td>
			<td><?php echo $question['content']; ?></td>
			<td><?php echo $question['created']; ?></td>
			<td><?php echo $question['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'questions', 'action' => 'view', $question['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'questions', 'action' => 'edit', $question['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'questions', 'action' => 'delete', $question['id']), array(), __('Are you sure you want to delete # %s?', $question['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Solutions'); ?></h3>
	<?php if (!empty($user['Solution'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Question Id'); ?></th>
		<th><?php echo __('Content'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Solution'] as $solution): ?>
		<tr>
			<td><?php echo $solution['id']; ?></td>
			<td><?php echo $solution['user_id']; ?></td>
			<td><?php echo $solution['question_id']; ?></td>
			<td><?php echo $solution['content']; ?></td>
			<td><?php echo $solution['created']; ?></td>
			<td><?php echo $solution['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'solutions', 'action' => 'view', $solution['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'solutions', 'action' => 'edit', $solution['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'solutions', 'action' => 'delete', $solution['id']), array(), __('Are you sure you want to delete # %s?', $solution['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Solution'), array('controller' => 'solutions', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
