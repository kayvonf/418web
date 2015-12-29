<html>
<head>
<title>Slide Upload Form: SUCCESS</title>
</head>
<body>

<h3>Your file was successfully uploaded!</h3>

<ul>
<?php foreach ($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
</ul>

<p><a href="<?php echo site_url('lectures'); ?>">To Main List</a></p>
</body>
</html>