<h1>ログインしてください</h1>
<?= $this->Form->create($user,["class"=>"form-signin","role"=>"form"]);?>
<?= $this->Form->input("username",["label"=>"ユーザー名","class"=>"form-control"]);?>
<?= $this->Form->input("password",["label"=>"パスワード","class"=>"form-control","type"=>"password"]);?>
<?= $this->Form->button("ログイン",["class"=>"btn btn-default"]);?>
<?= $this->Form->end(); ?>
<?= $this->Html->link("新規登録はこちら",["action"=>"register"]); ?>
