
<?php echo $this->Html->link('Add goal', array('controller' => 'goals', 'action' => 'add')); ?>
<table class="goalstable">
    <tr>
        <th>Id</th>
        <th>Goal</th>
        <th>Actions</th>
        <th>Created</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out goal info -->

    <?php foreach ($goals as $goal): ?>
    <tr>
        <td><?php echo $goal['goals']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($goal['goals']['goal'],
array('controller' => 'goals', 'action' => 'view', $goal['goals']['id'])); ?>
        </td>
        <td>
            <?php echo $this->Form->postLink('Delete',array('action' => 'delete', $goal['goals']['id']),array('confirm' => 'Are you sure?')); ?>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $goal['goals']['id'])); ?>
        </td>
        <td><?php echo $goal['goals']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($goal); ?>
</table>