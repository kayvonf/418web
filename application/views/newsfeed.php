<script>

jQuery(document).ready(function() {
    jQuery("time.timeago").timeago();
});

</script>


<div class="home_container">

<div class="feed_title"><? echo $type; ?></div>

<div id="newsfeed">

<?php foreach($strings as $string) {

    $created = date(DATE_ISO8601, strtotime($string['created']));
?>
<div class="news_item">
    <img src="<?= $string['image'] ?>" />
    <div class="news_item_body">
        <div class="headline">
            <?=$string['text']?> (<time class="timeago" datetime="<?= $created ?>"></time>)
        </div>
            <?php if (isset($string['html'])) {
                echo '<div class="comment">';
                echo $string['html'];
            } ?>
            <?php if(isset($string['like_count'])) { ?>
                <?php if($string['like_count'] == 1) { ?>
            <div class="like"><?php echo 'Liked by ' . $string['like_count'] .
                ' person!';?></div>
                <?php } else {?>
            <div class="like"><?php echo 'Liked by ' . $string['like_count'] .
                ' people!';?></div>
                <?php } ?>
            <?php } ?>

            <?php if (isset($string['html'])) {
                echo '</div>';
            } ?>
    </div>
    <div style="clear: both;"></div>
</div> <br />
<?php } ?>

</div>  <!-- newsfeed -->

<script>
$(document).ready(function () {
    $("#newsfeed .comment").postProcess();
});
</script>

</div>  <!-- home_container -->


