<h1>新規登録</h1>
<?= $this->Form->create($user,["context"=>["validator"=>"register"]])?>
<?= $this->Form->input("username",["label"=>"ユーザー名","class"=>"form-control"]);?>
<?= $this->Form->input("password",["label"=>"パスワード","type"=>"password","class"=>"form-control"]);?>
<?= $this->Form->input("new_password_confirm",["label"=>"パスワード確認","type"=>"password","class"=>"form-control"]);?>
<?= $this->Form->input("email",["label"=>"大学のメールアドレス","type"=>"text","class"=>"form-control"]);?>
<?= $this->Form->button("登録",["class"=>"btn btn-default"]);?>
<?= $this->Form->end(); ?>
