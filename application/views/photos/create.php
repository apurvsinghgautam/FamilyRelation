<h2><?= $title; ?></h2>
<?php echo validation_errors(); ?>
<?php echo form_open_multipart('photos/create'); ?>
  <div class="form-group">
    <label>Caption</label>
    <input type="text" class="form-control" name="caption" placeholder="Add Caption">
  </div>
 
  <div class="form-group">
	  <label>Upload Image</label>
	  <input type="file" name="userfile">  
  </div>
  <input type="submit" class="btn btn-default"></input>

</form>