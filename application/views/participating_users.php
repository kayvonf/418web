<h1>List of Users Who Participated</h1>

<table cellpadding="2" cellspacing="0" border="1">
<tr>
<td>&nbsp;</td>
<td>Username</td>
<td>Andrew Id</td>
<td>Total Comments</td>
<td>Total Upvotes</td>
<td>Total Downvotes</td>
<td>Num Comments This Week</td>
<td>Num Recent Upvotes</td>
<td>Num Recent Downvotes</td>
</tr>

<?php
     $count = 1;
if (count($users) > 0) {
    foreach ($users as $user) {
        ?>
            <tr>
            <td><?php echo $count; ?></td>
            <td><a href="<?= site_url("user/" . $user->username) ?>"><?php echo $user->username; ?></a></td>
            <td><?php echo $user->andrewid; ?></td>
            <td><?php echo $user->num_comments; ?></td>
            <td><?php echo $user->num_upvotes; ?></td>
            <td><?php echo $user->num_downvotes; ?></td>
            <td><?php echo $user->num_recent_comments; ?></td>
            <td><?php echo $user->num_recent_upvotes; ?></td>
            <td><?php echo $user->num_recent_downvotes; ?></td>
            </tr>
            <?php
        $count++;
    }
}
?>

</table>

