
<div class="lecture_title">Lecture <?php echo $lecture->number; ?>: <?php echo $lecture->title; ?></div>

<?php if (isset($lecture->video_url) && $lecture->video_url != '') { ?>
<div><a href="<?=$lecture->video_url?>">Watch the Lecture Video</a></div>
<?php } ?>
<div><a href="<?php echo $lecture_pdf_url;  ?>">Download slides as PDF</a></div>
<?php if (isset($lecture->summary_article_id)) { 
    // TODO(awreece) Use lecture_summary_url? 
    // TODO(awreece) Check if public?
?>
<div><a href="<?=article_url($lecture->summary_article_id)?>">Read the Explanation</a></div>
<?php } ?>

<p>
<div class="lecture_summary_thumbnail_block">

<?php
foreach ($slides as $slide)
{
?>
    <div class="slide-thumbnail" style="width: <?php echo $slide_thumbnail_horiz_spacing; ?>px;">
    <a href="<?php echo $slide['link_url']; ?>">
    <img width="<?php echo $slide_thumbnail_width; ?>"
     height="<?php echo $slide_thumbnail_height; ?>"
     src="<?php echo $slide['image_url']; ?>"
     class="lecture_summary_thumbnail_img">
    </a>
<?php if ($slide['num_comments'] > 0) { ?>
    <a href="<?php echo $slide['link_url']; ?>" class="slide-comments-link">
        [ <?php echo $slide['num_comments']; ?> comment<?php echo $slide['num_comments'] === 1 ? '' : 's' ?> ]
    </a>
<?php } ?>
    </div>
<?php
 }
?>

</div>
</p>

<div class="summary_comments_container">
<?php if (isset($comments_html)) { echo $comments_html; } ?>
</div>
