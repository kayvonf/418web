<!doctype html>
<html>
<head>
<link rel="icon" href="<?=base_url()?>assets/images/favicon/dragon.png" type="image/png">
<?php
   $page_title = $page_name;
   if (strlen($page_name) == 0)
       $page_title = $course_name;
   else
       $page_title = $page_name . ' : ' . $course_name; 
?>
<title><?php echo $page_title; ?></title>

<script src="http://use.edgefonts.net/open-sans:n3,i3,n4,i4,n6,i6,n7,i7,n8,i8.js"></script>
<script src="http://use.edgefonts.net/open-sans-condensed:n3,i3,n7.js"></script>

<script src="<?php echo base_url(); ?>assets/third_party/jquery/1.8.3/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/third_party/jquery/timeago/jquery.timeago.js"></script>
<script src="<?php echo base_url(); ?>assets/third_party/jquery/cookie/jquery.cookie.js"></script>

<script src="<?php echo base_url(); ?>assets/third_party/codemirror-3.0/lib/codemirror.js"></script>
<script src="<?php echo base_url(); ?>assets/third_party/codemirror-3.0/mode/markdown/markdown.js"></script>

<script type="text/javascript"
  src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML">
</script>

<script type="text/x-mathjax-config">
MathJax.Hub.Config({
  skipStartupTypeset: true,
  showProcessingMessages: false,
  tex2jax: {
    inlineMath: [['$','$'], ['\\(','\\)']],
    processEscapes: true
  }
});
</script>


<link rel="stylesheet" type="text/css" href=" <?php echo base_url(); ?>assets/third_party/codemirror-3.0/lib/codemirror.css">

<script src="<?php echo base_url(); ?>assets/third_party/google-code-prettify/prettify.js"></script>
<link rel="stylesheet" type="text/css" href=" <?php echo base_url(); ?>assets/third_party/google-code-prettify/prettify.css">

<!-- NOTE(kayvonf): place at end to override 3rd party tools -->
<link rel="stylesheet" type="text/css" href=" <?php echo base_url(); ?>assets/css/main.css">

<script type="text/javascript">
var edit_comment_url = "<?php echo site_url("comments/ajax_edit_comment")?>";
var delete_comment_url = "<?php echo site_url("comments/ajax_delete_comment")?>";
var archive_comment_url = "<?php echo site_url("comments/ajax_archive_comment")?>";
var add_private_comment_url = "<?php echo site_url("comments/ajax_add_private_comment"); ?>";
var add_instructor_comment_url = "<?php echo site_url("comments/ajax_add_instructor_comment"); ?>";
var add_comment_url = "<?php echo site_url("comments/ajax_add_comment"); ?>";
var comment_vote_url = "<?php echo site_url("comments/ajax_comment_vote"); ?>";
var toggle_subscribe_url = "<?php echo site_url("comments/ajax_toggle_subscribe"); ?>";
var prompt_students_url = "<?php echo site_url("comments/ajax_prompt_students"); ?>";
var keep_alive_url = "<?php echo site_url("keep_alive"); ?>";
</script>

<?php // TODO(awreece) Only include comments.js if required? ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/main.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/comments.js"></script>

</head>
<body>

<div id="modal_overlay"></div>

<div class="main_container">

<div class="topbar">
<div class="topbar_left"><a href="<?php echo site_url('home'); ?>">[Home]</a></div>
<div class="topbar_left"><a href="<?php echo site_url('newsfeed'); ?>">[Feed]</a></div>
<div class="topbar_left"><a href="<?php echo site_url('lectures'); ?>">[Lectures]</a></div>
<div class="topbar_left"><a href="<?php echo site_url('exercises'); ?>">[Exercises]</a></div>
<div class="topbar_left"><a href="<?php echo site_url('competition'); ?>">[Competition]</a></div>

<?php // TODO(mburman) use check_privileged
    if (isset($logged_in_user) &&
    ($logged_in_user->type == USER_TYPE_INSTRUCTOR ||
    $logged_in_user->type == USER_TYPE_TA)) { ?>
<div class="topbar_left"><a href="<?php echo site_url('admin') ?>">[Admin Console]</a></div>
<? }
?>


<div class="topbar_right">

<?php if (isset($logged_in_user)) { ?>

Welcome, <a href="<?php echo site_url('users/edit'); ?>"><?php echo $logged_in_user->firstname; ?></a><?php echo "&nbsp <img class='topbar_profile_picture' src='" . $logged_in_user->profile_picture_url ."' align='top' />";
?>

<a href="<?php echo site_url('users/logout') ?>">[Logout]</a>

<?php
} else {
?>
<a href="<?php echo site_url('users/login') ?>">[Login]</a>
<?php } ?>

</div>

</div>

<div class="content_container">

<!-- end of header -->

