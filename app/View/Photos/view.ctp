<!-- File: /app/View/Photos/view.ctp -->

<h1><?php echo h($photo['Photo']['title']); ?></h1>

<p><small>Created: <?php echo $photo['Photo']['created']; ?></small></p>

<p><?php echo h($photo['Photo']['body']); ?></p>

<div id='Photo'>
    <div class='img'>
        <?php echo $this->Html->image($photo['Photo']['filename'], array('alt' => $photo['Photo']['title'], 
        'width' => '500px', 'height' => '500px')); ?>
    </div>
</div>