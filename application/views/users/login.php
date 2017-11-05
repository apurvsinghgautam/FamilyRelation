<?php echo validation_errors(); ?>
<?php echo form_open('users/login'); ?>
<fieldset>
  <legend><?=$title;?></legend>
  <div class="jumbotron">
    <div class="col-md-4 col-md-offset-4">
	<div class="form-group">
      <label for="inputFid" class="col-lg-2 control-label">Family ID</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="family_id" placeholder="Family ID">
      </div>
    </div> 

	<div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Email ID</label>
      <div class="col-lg-10">
        <input type="email" class="form-control" name="email_id" placeholder="Email ID" pattern="^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$">
      </div>
    </div>

    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-10">
        <input type="password" class="form-control" name="password" placeholder="Password">
      </div>
    </div>

    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
    </div>

  </div>
</div>
</fieldset>
<?php echo form_close(); ?>