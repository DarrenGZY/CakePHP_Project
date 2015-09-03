<!-- File: /app/View/Photos/add.ctp -->

<h1>Add Photo</h1>
<?php
	echo $this->Form->create('Photo', array('type'=>'file'));
	echo $this->Form->input('title');
	echo $this->Form->input('body', array('rows' => '3'));
	echo $this->Form->input('upload', array('type'=>'file'));
	echo $this->Form->end('Save Photo');
?>