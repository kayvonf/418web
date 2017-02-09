
<div class="narrow_container">

<h1>Welcome to 15-418/618</h1>

<h2>
Step 1: Create an account on the course web site (or <a href="<?php echo site_url('users/login'); ?>">login</a>)
</h2>

<?php echo form_open_multipart('users/do_create', array('id' => 'create_user_form'));?>

<?php if ($needs_code == TRUE) {  ?>

<p>
    <div class="form_label">Secret Code</div>
    <div class="form_help_text">You can only sign up with the secret code</div>
    <div><input type="input" class="form_input_box" name="secretcode"></div>
</p>

<?php } ?>

<p class="form_top_dashed">
     <div class="form_label">Username</div>
     <div class="form_help_text">Your username can be anything you like (minimum three characters).  It does not need to be your andrew id
(although your andrew username is fine too).  Keep in mind your comments on this site may be seen by the rest of
the class and the public internet at large, so if you wish to remain anonymous, please choose your username accordingly.</div>
     <div><input type="input" class="form_input_box" name="username"></div>
</p>

<p>
     <div style="float: left; margin-right: 25px;">
     <div class="form_label">First Name</div>
     <div><input type="input" class="form_input_box" name="firstname"></div>
     </div>

     <div style="float:left;">
     <div class="form_label">Last Name</div>
     <div><input type="input" class="form_input_box" name="lastname"></div>
     </div>
</p>

<div style="clear:both;"></div>

<p>
     <div class="form_label">Password</div>
     <div class="form_help_text">This will be your password for the 15-418/618 site.  It is not your andrew password. (and probably should not be)</div>
     <div><input type="password" class="form_input_box" name="password1"></div>
</p>
<p>
     <div class="form_label">Confirm Password</div>
     <div><input type="password" class="form_input_box" name="password2"></div>
</p>
<p>
     <div class="form_label">Preferred Email</div>
     <div><input type="email" class="form_input_box" name="email"></div>
</p>

<p>
     <div class="form_label">Andrew ID</div>
     <div><input type="input" class="form_input_box" name="andrewid"></div>
     </p>
<p>


     <p class="form_label form_top_dashed">And... please tell us a bit about yourself:</p>
     <div style="float: left; padding-right: 25px;">
     <div class="form_label">Department</div>
     <div class="form_help_text">(e.g., CS, ECE, ISR)</div>
     <div><input type="input" class="form_input_box" name="department"></div>
     </div>
     <div class="float: left;">
     <div class="form_label">Year</div>
     <div class="form_help_text">(e.g., junior, senior, MS, PhD)</div>
     <div><input type="input" class="form_input_box" name="year"></div>
     </div>
</p>

<div style="clear:both;"></div>

<p>
     <div class="form_label">Profile Picture</div>
     <div class="form_help_text">Profile pictures are just for fun.  You need not upload a photo of yourself, or even anything at all. If you don't upload a profile photo, you'll temporarily be assigned a random picture of a cute robot (because CMU likes robots).  You can always change it later. (Images must be JPGs.)</div>
     <div><input type="file" name="picture"></div>

     <div class="overview_main_item form_submit_button"><button type="submit">[ Sign Me Up! ]</button></div>
</p>

</form>

</div>
