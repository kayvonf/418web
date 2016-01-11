<div class="narrow_container">

<?php if (isset($token)) { ?>
    <div class="main_title">Change Password</div>
    <div>CMU 15-418/618</div>

<?php echo form_open('users/do_password_change', '', array('token' => $token));?>
        <p>
            <div class="form_label">New Password:</div>
            <div><input type="password" class="form_input_box" name="password1" ></div>
        </p>

        <p>
            <div class="form_label">Confirm New Password:</div>
            <div><input type="password" class="form_input_box" name="password2" ></div>
        </p>

        <div class="form_submit_button"><button type="submit">[ Change Password ]</button></div>
    </form>
<?php } else { ?>
    <div class="main_title">Reset Password</div>
    <div>CMU 15-418/618</div>

<?php echo form_open('users/do_reset');?>
        <p>
            <div class="form_label">Username:</div>
            <div><input type="input" class="form_input_box" name="username" ></div>
        </p>

        <div class="form_submit_button"><button type="submit">[ Request Password Reset ]</button></div>
    </form>
<?php } ?>

</div>
