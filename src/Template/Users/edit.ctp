<div class="columns large-10 small-10">
	<h1>ユーザー情報編集</h1>
	<?= $this->Form->create($user)?><!-- disabled browser validation by setting novalidate=> true -->
	<?= $this->Form->input("username",["label"=>"ユーザー名","class"=>"form-control"])?>
	<h4>※パスワードを変更する場合のみ以下を記入してください。</h4>
	<?= $this->Form->input("current_password",["label"=>"現在のパスワード","class"=>"form-control"])?>
	<?= $this->Form->input("new_password",["label"=>"新しいパスワード","class"=>"form-control"])?>
	<?= $this->Form->input("new_password_confirm",["label"=>"新しいパスワード確認","class"=>"form-control"])?>
	<?= $this->Form->input("email",["label"=>"メールアドレス","class"=>"form-control"])?>
	<?= $this->Form->button("変更")?>
	<?= $this->Form->end()?>
</div>
