<!-- File: /app/View/Posts/view.ctp -->

<h1><?php echo h($post['Post']['title']); ?></h1>


<body id='postBody'>
	<p><small>Created: <?php echo $post['Post']['created']; ?></small></p>

	<p><?php echo h($post['Post']['body']); ?></p>
</body>