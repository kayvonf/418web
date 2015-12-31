<div class="narrow_container">

<?php if(isset($updated)) { ?>
<p>
Profile successfully updated!
</p>
<?php } ?>

<h2>User Information for <?php echo $user->username; ?></h2>

<p>You have made <?php echo $num_comments; ?> comments. (<a href="<?php echo site_url('user/' . $logged_in_user->username) ?>">seem them all here</a>)</p>
<p>You have made <?php echo $num_private_comments; ?> private comments.</p>

<?php echo form_open_multipart('users/do_edit');?>

<div class="form_label form_top_dashed">
<div style="float: left; margin-right: 25px;">
<div class="form_label">First Name</div>
<div><input type="input" class="form_input_box" name="firstname" value="<?php echo $user->firstname;?>"></div>
</div>

<div style="float:left;">
<div class="form_label">Last Name</div>
<div><input type="input" class="form_input_box" name="lastname" value="<?php echo $user->lastname;?>"></div>
</div>
</div>

<div style="clear:both;"></div>
<p>
     <div class="form_label">Preferred Email</div>
     <div><input type="input" class="form_input_box" name="email" value="<?php echo $user->email; ?>"></div>
</p>

<p>
     <div class="form_label">Andrew ID</div>
     <div><input type="input" class="form_input_box" name="andrewid" value="<?php echo $user->andrewid; ?>"></div>
</p>

<p>
<p class="form_label form_top_dashed">And... please tell us a bit about yourself:</p>

<div style="float: left; padding-right: 25px;">
<div class="form_label">Department</div>
<div class="form_help_text">(e.g., CS, ECE, ISR, CMUQ)</div>
<div><input type="input" class="form_input_box" name="department" value="<?php echo $user->department?>"></div>
</div>

<div class="float: left;">
<div class="form_label">Year</div>
<div class="form_help_text">(e.g., junior, senior, MS, PhD)</div>
<div><input type="input" class="form_input_box" name="year" value="<?php echo $user->year?>"></div>
</div>
</p>



<div style="clear:both;"></div>

<p>
<div class="form_label">Profile Picture</div>
<div class="form_help_text">Profile pictures are just for fun.  You need not upload a photo of yourself, or even anything at all. If you don't upload a profile photo, you'll temporarily be assigned a random picture of a cute robot (because CMU likes robots).  You can always change it later.</div>
     </p>

<p>
<img src="<?php echo $profile_pictures_dir . '/' . $user->username . '.jpg'; ?>" align="middle" class="profile_pic_preview" />

<input type="file" name="picture">
<div class="overview_main_item form_submit_button"><button type="submit">[ Save
]</button></div>
</p>

</form>

</div>
