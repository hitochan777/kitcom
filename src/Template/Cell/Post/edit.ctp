<?= $this->Form->create($post)?>
<?= $this->Form->input("title",["class"=>"form-control"])?>
<?= $this->Form->input("content",["class"=>"form-control"])?>
<?= $this->Form->button(__("Submit"),["class"=>"form-control"])?>
<?= $this->Form->end() ?>
