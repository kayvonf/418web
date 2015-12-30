<div class="narrow_container">

<h1>Edit Lecture Info</h1>

<?php echo form_open_multipart('lecture/' . $lecture->shortname . '/do_editmeta');?>

<p><div><label class="form_label" for="title">Title: </label></div>
<div><input type="input" style="width: 550px;" name="title" class="form_input_box" value="<?php echo $lecture->title; ?>"></div></p>
<p>
<div><label class="form_label" for="video_url">Video URL: (this is optional, in case lecture is taped)</label></div>
<div><input type="input" style="width: 550px;" name="video_url" class="form_input_box" value="<?php echo $lecture->video_url ?>"></div></p>

<p><input type="checkbox" name="comments_enabled" value="allowcomments" <?php echo ($lecture->comments_enabled == 1 ? 'checked' : ''); ?>> Allow comments on this lecture</p>

<p><input type="checkbox" name="instructor_notes_enabled" value="shownotes" <?php echo ($lecture->instructor_notes_enabled == 1 ? 'checked' : ''); ?>> Show instructor notes (comments must be enabled)</p>

<p class="form_submit_button"><input type="submit" value="Edit Lecture Info" /></p>
</form>

<h1>Update Lecture Slides</h1>

<?php echo form_open_multipart('lecture/' . $lecture->shortname . '/do_editslides');?>

<p class="form_help_text">Note: Lecture upload triggers image
processing operations to rip apart the pdf and generate slide pages
and slide thumbnails.  Please be patient, this operation will take a
few seconds, especially for large pdfs.</p>

<p class="bold_text">
The pdf you upload MUST have the same number of slides as the current
lecture.  You cannot add or remove slides from the lecture by uploading a new pdf.
</p>

<p><input type="file" name="userfile" size="20" /></p>

<p class="form_submit_button"><input type="submit" value="Update Lecture Slides" /></p>

</form>

<h1>Additional Lecture Properties (not editable)</h1>

<p>
<div>Number: <?php echo $lecture->number; ?></div>
<div>Shortname: <?php echo $lecture->shortname; ?></div>   
<div>Num slides: <?php echo $lecture->num_slides; ?></div>
</p>


</div>  
