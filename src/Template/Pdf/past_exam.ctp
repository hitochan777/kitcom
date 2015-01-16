<?php
$Pandoc = new Pandoc\Pandoc();
$text = $pastExam->content;
$text = $Pandoc->convert($text,"markdown_strict","html5");
$text = $this->Text->autoParagraph($text);
echo $text;
?>
