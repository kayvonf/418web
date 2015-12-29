<div class="narrow_container">

<h1>Edit Lecture Info</h1>

<p>
<div class="bold_text">Number: <?php echo $lecture->number; ?></div>
<div class="bold_text">Shortname: <?php echo $lecture->shortname; ?></div>
<div class="bold_text">Num slides: <?php echo $lecture->num_slides; ?></div>
</p>

<?php echo form_open_multipart('lecture/' . $lecture->shortname . '/do_editmeta');?>

<p><div><label class="form_label" for="title">Title: </label></div>
<div><input type="input" style="width: 550px;" name="title" class="form_input_box" value="<?php echo $lecture->title; ?>"></div></p>
<p>
<div><label class="form_label" for="video_url">Video URL: (this is optional, in case lecture is taped)</label></div>
<div><input type="input" style="width: 550px;" name="video_url" class="form_input_box" value="<?php echo $lecture->video_url ?>"></div></p>
<p class="form_submit_button"><input type="submit" value="Edit Lecture Info" /></p>
</form>

<h1>Update Lecture Slides</h1>

<?php echo form_open_multipart('lecture/' . $lecture->shortname . '/do_editslides');?>

<p class="form_help_text">Note: Lecture upload triggers image
processing operations to rip apart the pdf and generate slide pages
and slide thumbnails.  Please be patient, this operation will take a
few seconds, especially for large pdfs.</p>

<p><input type="file" name="userfile" size="20" /></p>

<p class="form_submit_button"><input type="submit" value="Update Lecture Slides" /></p>

</form>

</div>  
