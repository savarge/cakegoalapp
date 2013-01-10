<?php
/*
 * @copyright Copyright (c) 2013 SAVAGEBYTES
 */

class Goal extends AppModel {
    public $validate = array(
        'goal' => array(
            'rule' => 'notEmpty'
        ),
        'description' => array(
            'rule' => 'notEmpty'
        )
    );
    
    public function isOwnedBy($post, $user) {
    return $this->field('id', array('id' => $post, 'user_id' => $user)) === $post;
}
    }