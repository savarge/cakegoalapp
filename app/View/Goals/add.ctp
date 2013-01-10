<!-- File: /app/View/Posts/add.ctp -->
<fieldset id="addgoal">
<legend><?php echo __('Add Goal'); ?></legend>
<?php
echo $this->Form->create('Goal');
echo $this->Form->input('goal');
echo $this->Form->input('description', array('rows' => '3'));
echo $this->Form->end('Save Goal');
?>
</fieldset>