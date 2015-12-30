<div class="narrow_container">

<p style="font-size: 16pt; font-weight: bold; color: #ff0000;">
<?php echo validation_errors(); ?>
</p>

<h1>Upload your lecture pdf here.</h1>

<?php echo form_open_multipart('lecture/do_create');?>

<p><label class="form_label" for="title">Lecture Title</label> <input type="input" name="title" class="form_input_box"></p>
<p><label class="form_label" for="shortname">Short name</label> <input type="input" name="shortname" class="form_input_box"></p>
<p><label class="form_label" for="number">Lecture Number</label> <input type="input" name="number" class="form_input_box"></p>
<p><label class="form_label" for="lecture_date">Lecture Date (mm/dd/yy)</label> <input type="input" name="lecture_date" class="form_input_box"></p>
<p><label class="form_label" for="aspect_ratio">Slide Aspect Ratio</label>
<select name="aspect_ratio">
<option value="4-3">4x3</option>
<option value="16-9">16x9</option>
<option value="85-11">8.5x11</option>
</select>
</p>
<p><input type="file" name="userfile" size="20" /></p>

<p class="form_help_text">Note: Lecture upload triggers image
processing operations to rip apart the pdf and generate slide pages
and slide thumbnails.  Please be patient, this operation can take
nearly a minute, especially for large pdfs.</p>

<p class="form_submit_button"><input type="submit" value="Create Lecture" /></p>

</form>

</div>
