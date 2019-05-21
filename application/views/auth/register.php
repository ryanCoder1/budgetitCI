<h3 class="form-header max-width-form ml-auto mr-auto p-2 bg-light" >Register Account </h3>
<p class="text-danger col-sm-11 col-md-9 col-lg-6 ml-auto mr-auto p-2"><?= (isset($emailTaken)) ? $emailTaken.'<a href="login">Log in page</a>': ''; ?> </p>
<div class="form-container mx-auto max-width-form p-4 bg-light">

  <form method="post" action="registeruser">
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" required>
      </div>
        <small class="text-danger"> <?php echo form_error('email'); ?> </small>
      <div class="form-group ">
        <label for="fName">First Name:</label>
        <input type="text" class="form-control" id="fName" name="fname" placeholder="First Name" value="<?= set_value('fname') ?>" required>
          <div class="text-danger"> <?php echo form_error('fname'); ?> </div>
      </div>
        <div class="form-group ">
          <label for="lName">Last Name:</label>
          <input type="text" class="form-control" id="lName" name="lname" placeholder="Last Name" value="<?= set_value('lname') ?>" required>
        </div>
        <small> <?php echo form_error('lname'); ?> </small>
        <div class="form-group ">
          <label for="reset-pwd">Password:</label>
          <input type="password" class="form-control" id="reset-pwd" name="password" placeholder="Password" required>
        </div>
        <small class="text-danger"><?= form_error('re-enter-password'); ?></small>
        <div class="form-group">
          <label for="pwd">Re-enter Password:</label>
          <input type="password" class="form-control" id="pwd" name="re-enter-password" placeholder="Re-enter Password" required>
        </div>

        <div class="form-group">
           <button type="submit" class="form-control mt-4 pt-2 pb-2 btn btn-primary">Register Account</button>
       </div>
</form>
