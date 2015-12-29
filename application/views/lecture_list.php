
<h2>List of Uploaded Lectures</h2>

<p><a href="<?php echo site_url('lecture/create') ?>">Upload New</a></p>

<?php
foreach ($lectures as $lecture) {
?>

<p>
<div>Title: <a href="<?php echo lecture_url($lecture->shortname); ?>"><?php echo $lecture->title; ?></a></div>
<div>Number: <?php echo $lecture->number; ?></div>
<div>Shortname: <?php echo $lecture->shortname; ?></div>
<div>Date: <?php echo $lecture->lecture_date; ?></div>
<div>Num slides: <?php echo $lecture->num_slides; ?></div>
<div>Aspect ratio: <?php echo $lecture->aspect_ratio; ?></div>
<div>Modified date: <?php echo $lecture->last_modified; ?><div>
<div>Internal id: <?php echo $lecture->id; ?></div>
<div>[<a href="<?php echo site_url('lecture/' . $lecture->shortname . '/edit') ?>">edit</a>] 
[<a href="<?php echo site_url('lecture/' . $lecture->shortname .
'/delete'); ?>" onclick="return confirm('Are you sure you want to delete this lecture?');">delete</a>]</div>

</p>

<?php
}
?>

