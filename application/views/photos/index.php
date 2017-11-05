<h2><?= $title ?></h2>
<?php foreach($photos as $photo) : ?>
<div class="row" style="display:inline-block;">

<form action="photos/view" method="get">
	<div class="col-sm-6 col-md-3">
		<div class="thumbnail">
			<img src="<?php echo site_url(); ?>assets/images/<?php echo $photo['Location']; ?>" alt="..." class="img-responsive">
			<div class="caption">
		    	<h4><?php echo $photo['Caption']; ?></h4><small> Posted by <?php echo $photo['Email_id']; ?></small>
		    	<input type="hidden" name="photoId" value="<?php echo $photo['Photo_id']; ?>"></input>
	    	</div>
			<input type="submit" class="btn btn-success" value="View photo"/>	
		  </div>
		</div>  
</form>
</div>

<?php endforeach; ?>