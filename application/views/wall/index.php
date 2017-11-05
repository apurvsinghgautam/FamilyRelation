<h2><?= $title ?></h2>
<?php foreach($posts as $post) : ?>
	<div class="row">
		<div class="col-md-9">
			<small class="post-date">Posted on: <?php echo $post['Time']; ?> by <h6><?php echo $post['Email_id']; ?> 
			</h6></small><br>
		</div>
	</div>
		<div class="card text-white bg-info">
			<div class="card-body" style="font-size: 1.5em;float: left;">
				<p><?php echo $post['Content']; ?><p>
			</div>
		</div>
		<br><br>
	
<?php endforeach; ?>