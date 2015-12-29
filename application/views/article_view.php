


<div class="article_container">

<div class="common_title title"><?php echo $article_title ?></div>

<?php if (count($authors) > 0) { ?>

<div class="author_list"> By
<?php
$i = 0;
$num_authors = count($authors);
foreach ($authors as $author)
{
    // HACK(kayvonf): English punctuation rules are annoying
    if ($i < $num_authors-2) {
        echo $author['username'] . ', ';
    } else if ($i == $num_authors-2 && $num_authors == 2) {
        echo $author['username'] . ' and ';
    } else if ($i == $num_authors-2) {
        echo $author['username'] . ', and ';
    } else {
        echo $author['username'];
    }
    $i++;
}
?>
</div>

<?php } ?>

<?php  if (isset($deadline)) {  ?>
<div class="deadline">Due on <?= $deadline ?></div>
<?php } ?>

<hr size="1">

<?php
     if (isset($view_mode) && $view_mode == 'preview') {
?>

<div class="warning_message">
<div>THIS IS A PREVIEW OF YOUR EDITS DISPLAYED IN A NEW WINDOW.</div>
<div>YOUR CHANGES HAVE NOT BEEN COMMITTED</div>
</div>

<?php
     }
?>

<div class="markdown article-content">
<?php echo $parsed_result; ?>
</div>

<?php if (isset($comments_html)) { echo $comments_html; } ?>

<?php
     if (isset($view_mode) && $view_mode == 'preview') {
?>

<div class="warning_message">
<div>THIS IS A PREVIEW OF YOUR EDITS DISPLAYED IN A NEW WINDOW.</div>
<div>YOUR CHANGES HAVE NOT BEEN COMMITTED</div>
</div>

<hr size="1">

 <?php } else if ($can_edit) { ?>

<hr size="1">
 <p><?= kayvon_button("Edit Article", "article/" . $article_id . "/edit") ?></p>

<?php
}
?>


</div>
