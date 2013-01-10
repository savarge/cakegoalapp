<h1>Edit Post</h1>
<?php
    echo $this->Form->create('Goal');
    echo $this->Form->input('goal');
    echo $this->Form->input('description', array('rows' => '3'));
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->end('Save Goal');
    ?>