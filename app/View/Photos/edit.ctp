<h1>Edit Photo</h1>
<?php
	echo $this->Form->create('Photo');
	echo $this->Form->input('title');
	echo $this->Form->input('body', array('rows' => '3'));
	echo $this->Form->input('id', array('type' => 'hidden'));
	echo $this->Form->end('Save Photo');
?>