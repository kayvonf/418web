
<hr size="1">

<div class="footer">
     Copyright 2020 Stanford University
</div>

<?php if (isset($debug_value)) { ?>
<div>Debug: <span><?php echo $debug_value ?></span></div>
<?php } ?>

</div>  <!-- end of content_container (defined in header.php) -->
</div>  <!-- end main_container (defined in header.php) -->

<?php if (!empty($google_analytics_id)) { ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', '<?php echo $google_analytics_id; ?>', 'auto');
  ga('send', 'pageview');

</script>

<?php } ?>

</body>
</html>

