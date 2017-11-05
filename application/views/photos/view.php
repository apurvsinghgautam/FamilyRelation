<h2><?= $title ?></h2>
<?php foreach($photos as $photo) : ?>
    <img src="<?php echo site_url(); ?>assets/images/<?php echo $photo['Location']; ?>" alt="..." class="img-responsive">
    <h4><?php echo $photo['Caption']; ?></h4>
<?php endforeach; ?>