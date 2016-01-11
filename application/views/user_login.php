
<div class="narrow_container">

<div class="main_title">Parallel Computer Architecture and Programming</div>
<div>CMU 15-418/618</div>

<div style="padding-top: 20px; padding-bottom: 10px;">

<?php if(isset($prev_url)) { ?>
    <p class="form_label">You must be logged in to access this page. No account? Then <a href="<?php echo site_url('users/create'); ?>">sign up</a>!</p>
<?php } else { ?>
    <p>No account? Then <a href="<?php echo site_url('users/create'); ?>">sign up</a>!</p>
<?php } ?>

</div>

<?php echo form_open_multipart('users/do_login', array('id' => 'login_form'));?>

    <p>
        <div class="form_label">Username:</div>
        <div><input type="input" class="form_input_box" name="username" ></div>
    </p>

    <p>
        <div class="form_label">Password:</div>
        <div><input type="password" class="form_input_box" name="password"></div>
    </p>

    <p><a href="<?php echo site_url('users/reset_password') ?>">Forgot Password?</a></p>

    <div class="form_submit_button"><button type="submit">[ Login ]</div></button></div>

</form>



</div>
