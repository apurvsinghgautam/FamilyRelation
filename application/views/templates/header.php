<!DOCTYPE html>
<html>
<head>
	<title>FamilyRelation</title>
	<link rel="stylesheet" href="https://bootswatch.com/4/darkly/bootstrap.min.css">
	<link rel="stylesheet" href="./assets/css/style.css">
	<script src="http://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-pimary">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
  <a class="navbar-brand" href="<?php echo base_url(); ?>">Family Relation</a>
  <div class="navbar-collapse collapse show" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>wall/index">Wall</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>photos">Gallery</a>
      </li>
    </ul>
    <?php if($this->session->userdata('logged_in')): ?>
	<ul class="navbar-nav navbar-right">
		<li><a class="nav-link" href="<?php echo base_url();?>wall/create">Create Post</a>
		</li>
	</ul>
	<ul class="navbar-nav navbar-right">
		<li><a class="nav-link" href="<?php echo base_url();?>photos/create">Upload Photo</a>
		</li>
	</ul>
	<?php endif; ?>
	<?php if(!$this->session->userdata('logged_in')): ?>
	<ul class="navbar-nav navbar-right">
		<li><a class="nav-link" href="<?php echo base_url();?>users/register">Register</a>
		</li>
	</ul>
	<ul class="nav navbar-nav navbar-right">
		<li><a class="nav-link" href="<?php echo base_url();?>users/login">Login</a>
		</li>
	</ul>
	<?php endif; ?>
	<?php if($this->session->userdata('logged_in')): ?>
	<ul class="nav navbar-nav navbar-right">
		<li><a class="nav-link" href="<?php echo base_url();?>users/logout">Logout</a>
		</li>
	</ul>
	<?php endif; ?>
  </div>
</nav>
<br>
<div class="jumbotron">

 	<?php if ($this->session->flashdata('family_registered')): ?>
 		<?php echo '<div class="alert alert-dismissible alert-success">'.$this->session->flashdata('family_registered').'</div>'; ?>
 	<?php endif; ?>

 	<?php if ($this->session->flashdata('user_registered')): ?>
 		<?php echo '<div class="alert alert-dismissible alert-success">'.$this->session->flashdata('user_registered').'</div>'; ?>
 	<?php endif; ?>

 	<?php if ($this->session->flashdata('user_loggedin')): ?>
 		<?php echo '<div class="alert alert-dismissible alert-success">'.$this->session->flashdata('user_loggedin').'</div>'; ?>
 	<?php endif; ?>

 	<?php if ($this->session->flashdata('login_failed')): ?>
 		<?php echo '<div class="alert alert-dismissible alert-warning">'.$this->session->flashdata('login_failed').'</div>'; ?>
 	<?php endif; ?>

 	<?php if ($this->session->flashdata('post_created')): ?>
 		<?php echo '<div class="alert alert-dismissible alert-info">'.$this->session->flashdata('post_created').'</div>'; ?>
 	<?php endif; ?>


 	<?php if ($this->session->flashdata('image_uploaded')): ?>
 		<?php echo '<div class="alert alert-dismissible alert-info">'.$this->session->flashdata('image_uploaded').'</div>'; ?>
 	<?php endif; ?>

 	<?php if ($this->session->flashdata('user_loggedout')): ?>
 		<?php echo '<div class="alert alert-dismissible alert-info">'.$this->session->flashdata('user_loggedout').'</div>'; ?>
 	<?php endif; ?>

