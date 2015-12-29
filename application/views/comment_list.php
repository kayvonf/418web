<h1>List of Comments</h1>

<p><?= kayvon_button("Download as CSV", 'comments/download') ?></p>

<table cellpadding="2" cellspacing="0" border="1">
<tr>
<td style="width: 80px;">ID</td>
<td style="width: 120px;">State</td>
<td style="width: 120px;">Created</td>
<td style="width: 80px;">Author</td>
<td style="width: 100px;">Type</td>
<td style="width: 80px;">Parent</td>
<td style="width: 100%;">Data</td>
</tr>

<?php
if (count($comments) > 0) {
  foreach ($comments as $comment) {
?>

<tr valign="top">
<td><?php echo $comment->id; ?></td>
<td><?php echo $comment->state; ?></td>
<td><?php echo $comment->created; ?></td>
<td><?php echo $comment->author; ?></td>
<td><?php echo $comment->parent_type; ?></td>
<td><?php echo $comment->parent_id; ?></td>
<td><?php echo $comment->body_markdown; ?></td>
</tr>

<?php
  }
}
?>

</table>

