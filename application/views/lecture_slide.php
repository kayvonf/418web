
<div class="lecture_title">
<a href="<?php echo $lecture_summary_url; ?>"><?php echo $lecture->title; ?></a>
</div>

<!-- this is the big image of the slide -->

<div>
<a href="<?php echo $next_slide_url; ?>">
     <img src="<?php echo $slide->image_url; ?>" width="<?php echo $slide_image_width; ?>" height="<?php echo $slide_image_height; ?>" class="lecture_slide_img"></a>
</div>

<!-- begin slide navigation elements -->

<div style="width: <?php echo $slide_image_width; ?>px; border-bottom: #c0c0c0 3px solid; padding-top: 6px; padding-bottom: 10px; margin-bottom: 10px;">

<div style="float: left;">
<?php if (isset($prev_slide_url)) { ?>
    <a id="previous-slide" href="<?php echo $prev_slide_url ?>">Previous</a>
<?php } ?> 
|
<?php if (isset($next_slide_url)) { ?>
    <a id="next-slide" href="<?php echo $next_slide_url ?>">Next</a>
<?php } ?>

--- Slide <?php echo ($slide->slide_number); ?> of <?php echo $lecture->num_slides; ?>
</div>

<script>
$(document).keydown(function (e) {
    // Let textareas handle their own keypresses.
    if ( $("*:focus").is("textarea, input") ) return;

<?php if (isset($prev_slide_url)) { ?>
    if (e.keyCode == 37) { // Left
        document.location = "<?= $prev_slide_url ?>";
        return false;
    }
<?php } ?> 
<?php if (isset($next_slide_url)) { ?>
    if (e.keyCode == 39) { // Right
        document.location = "<?= $next_slide_url ?>";
        return false;
    }
<?php } ?> 
});
</script>

<div style="text-align: right;">Back to <a href="<?php echo $lecture_summary_url; ?>">Lecture Thumbnails</a></div>

</div>


<!-- end slide navigation elements  -->

<div class="slide_comments_container">
<?php if (isset($comments_html)) { echo $comments_html; } ?>
</div>
