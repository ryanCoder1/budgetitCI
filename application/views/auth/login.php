<h3 class="form-header  max-width-form mx-auto p-2 bg-light" >Log in</h3>
<p class="text-success  max-width-form mx-auto p-2"><?= (isset($login)) ? $login : ''; ?> </p>
<p class="text-danger  max-width-form mx-auto  p-2"><?= (isset($notInDb)) ? $notInDb : ''; ?> </p>
<div class="form-container  max-width-form mx-auto p-4 bg-light">

  <?php echo form_open('loginuser'); ?>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" required>
    </div>
      <small class="text-danger"> <?php echo form_error('email'); ?> </small>
    <div class="form-group ">
      <label for="reset-pwd">Password:</label>
      <input type="password" class="form-control" id="reset-pwd" name="password" placeholder="Password" required>
    </div>
      <small class="text-danger"><?= form_error('password'); ?></small>

    <div class="form-group">
       <div>
         <button type="submit" class="form-control mt-4 pt-2 pb-2 btn btn-primary">Log in</button>
       </div>
    </div>
