<?php echo validation_errors(); ?>
<?php echo form_open('users/user_register'); ?>
<fieldset>
  <legend><?=$title;?></legend> 
  <div class="jumbotron">
    <div class="col-md-5 col-md-offset-4">
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
      <label for="inputName" class="col-lg-2 control-label">Name</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="name" placeholder="Name">
      </div>
    </div>

    <div class="form-group">
      <label for="inputMobile" class="col-lg-2 control-label">Mobile No</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="mobile" placeholder="Mobile No">
      </div>
    </div>

    <div class="form-group">
      <label for="inputMobileAlt" class="col-lg-2 control-label">Alternate Mobile No</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="alt_mobile" placeholder="Alternate Mobile No">
      </div>
    </div>

    <div class="form-group">
      <label for="inputBirthday" class="col-lg-2 control-label">Date of Birth</label>
      <div class="col-lg-10">
        <input type="date" class="form-control" name="birthday">
      </div>
    </div>

    <div class="form-group">
      <label for="inputAddress" class="col-lg-2 control-label">Address</label>
      <div class="col-lg-10">
        <textarea class="form-control" rows="3" name="address"></textarea>
      </div>
    </div>

    <div class="form-group">
      <label for="inputPassword1" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-10">
        <input type="password" class="form-control" name="password" placeholder="Password">
      </div>
    </div>

    <div class="form-group">
      <label for="inputPassword2" class="col-lg-2 control-label">Confirm Password</label>
      <div class="col-lg-10">
        <input type="password" class="form-control" name="password_match" placeholder="Confirm Password">
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