<html>
<head>
<title>Slide Upload Form: SUCCESS</title>
</head>
<body>

<h3>The lecture was created!</h3>

<p>
<div>Title: <a href="<?php echo lecture_url($lecture->shortname); ?>"><?php echo $lecture->title; ?></a></div>
<div>Number: <?php echo $lecture->number; ?></div>
<div>Shortname: <?php echo $lecture->shortname; ?></div>
<div>Date: <?php echo $lecture->lecture_date; ?></div>
<div>Num slides: <?php echo $lecture->num_slides; ?></div>
<div>Aspect ratio: <?php echo $lecture->aspect_ratio; ?></div>
<div>Internal id: <?php echo $lecture->id; ?></div>
</p>

<p><a href="<?php echo site_url('lectures'); ?>">To Main Lecture List</a></p>
</body>
</html>
