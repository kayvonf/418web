<?php 
if (count($top_comments) > 0) { 
?>
<h3> Highest-rated comments </h3>
<table cellpadding="2" cellspacing="0" border="1">
<tr>
<td>Id</td>
<td>Num Upvotes</td>
<td>Num Downvotes</td>
<td>Author</td>
<td>Comment</td>
</tr>

<?php foreach($top_comments as $comment) { ?>
<tr>
<td><?= $comment->id ?></td>
<td><?= $comment->total_upvotes ?></td>
<td><?= $comment->total_downvotes ?></td>
<td><?= $comment->author_username ?></td>
<td><?= $comment->body_html ?></td>
</tr>

<?php } ?>
</table>
<?php } ?>

<?php 
if (count($top_users) > 0) { 
?>
<h3> Most liked users</h3>

<p>Where <q>site wide upvotes</q> is the number of times a comment by this user
has been upvoted anywhere on the site and <q>upvoted comments</q> is the number of
distinct comments by this user that have been upvoted</p>


<table cellpadding="2" cellspacing="0" border="1">
<tr>
<td>Username</td>
<td>Site Wide Upvotes</td>
<td>Upvoted Comments</td>
</tr>

<?php foreach($top_users as $user) { ?>
<tr>
<td><?= $user->username ?></td>
<td><?= $user->num_upvotes ?></td>
<td><?= $user->upvoted_comments ?></td>
</tr>

<?php } ?>
</table>
<?php } ?>


