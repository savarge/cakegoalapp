<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('style');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
<div id="holder">
<div class="headercontainer">
<div class="headercontent">
    <?php echo $this->Html->image('main_logo.png', array('class' => 'logo', 'url' => 'http://cakephp', 'alt' => 'LOGO') ); ?>
    
<p class="reg"><span class="regspan"><?php echo $this->Html->link('Register', array('controller' => 'users', 'action' => 'add')); ?> | 
    <?php if($this->Session->read('Auth.User')) { echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); } else { echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login')); } ?></span></p>
		<form class="search" method="get" id="searchform" action="">
				<label style="color:#FFF" for="s">Search:</label>
				<input class="searchbox" type="text" value="" name="s" id="s" size="14" />
				<input type="hidden" id="searchsubmit" value="Search" />
		</form>
        <div class="clear"></div>
		<ul class="nav">
                        <li><?php echo $this->Html->link('MY GOALS', array('controller' => 'goals', 'action' => 'index')); ?></li>
			<li><?php echo $this->Html->link('FRIENDS GOALS', array('controller' => 'goals', 'action' => 'friendsgoals')); ?></li>
			<li><?php echo $this->Html->link('SETTINGS', array('controller' => 'goals', 'action' => 'settings')); ?></li>
			<li><?php echo $this->Html->link('ABOUT', array('controller' => 'goals', 'action' => 'about')); ?></li>
		</ul>
</div>
<div class="clear"></div>
</div>
    
  
<div class="mainconainer">
<div class="maincontent">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>


</div>
</div>		

<div class ="footercontainer">
<div class ="footercontent">
<p><span class="credits">&copy; 2012 Goal Setter | <a style="color:#fff; text-decoration:none" href="#"></a><a style="color:#fff; text-decoration:none"  href="#">App Settings</a> | <a style="color:#fff; text-decoration:none" href="#">About</a></span><br /></p>
</div>
</div>
  </div>
</body>
</html>
