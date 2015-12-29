
<div class="narrow_container">


<link rel="stylesheet" media="screen" href="<?php echo base_url(); ?>assets/third_party/jquery/jquery-ui-1.9.2.custom/css/blitzer/jquery-ui-1.9.2.custom.min.css" type="text/css" />
<script src="<?php echo base_url(); ?>assets/third_party/jquery/jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.min.js"></script>
<link rel="stylesheet" media="screen" href="<?php echo base_url(); ?>assets/third_party/jquery/timepicker/jquery-ui-timepicker-addon.css" type="text/css" />

<?php
if (isset($parsed_result)) {
?>

<div class="article_preview_pane">
<?php echo $parsed_result; ?>
</div>

<hr size="1">

<?php
}
?>

<h2>Create a New Article</h2>

<hr size="1">

<?php if(isset($privileged)) {
    echo form_open_multipart('article/do_create_privileged');
}
else {
    echo form_open_multipart('article/do_create');
}?>
<p class="form_label">Title
<input class="article_text_input" size="80" type="input" name="title">
</p>

<p>
<textarea class="article_text_input" rows="20" cols="90" name="article_content" />
<?php echo $starting_text; ?>
</textarea>
</p>

<p class="form_top_dashed"></p>

<p class="form_label"><input type="checkbox" name="is_public" value="public" checked>Public Article</p>

<p class="form_label"><input type="checkbox" name="comments_enabled" value="allowcomments">Allow Comments</p>

<p>
<div class="form_label">Add Additional Authors </div>
<div class="form_help_text">(comma separated usernames)</div>
<input class="form_input_box" type="input" name="authors">
</p>

<div class="overview_main_item form_submit_button"><button type="submit"
value="Submit"/>[ Create ]</button></div>

</form>
</div>
