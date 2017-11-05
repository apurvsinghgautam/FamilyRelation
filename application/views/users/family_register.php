<?php echo validation_errors(); ?>
<?php echo form_open('users/family_register'); ?>
<fieldset>
  <legend><?=$title;?></legend>
  <div class="jumbotron">
    <div class="col-md-5 col-md-offset-4">

    <div class="form-group">
      <label for="inputFamiyName" class="col-lg-2 control-label">Family Name</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="family_name" placeholder="Family Name">
      </div>
    </div>

    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Clear</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
  </div>
</fieldset>
<?php echo form_close(); ?>