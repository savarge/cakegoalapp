<!-- File: /app/View/Posts/view.ctp -->

<h1><?php echo h($goal['Goal']['goal']); ?></h1>

<p><small>Created: <?php echo $goal['Goal']['created']; ?></small></p>

<p><?php echo h($goal['Goal']['description']); ?></p>