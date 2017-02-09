<h1>List of Users</h1>

<table cellpadding="2" cellspacing="0" border="1">
<tr>
    <td>&nbsp;</td>
    <td><a href="<?php echo site_url('users'); ?>">Id</a></td>
    <td>Username</td>
    <td>Type</td>
    <td>First name</td>
    <td>Last Name</td>
    <td><a href="<?php echo site_url('users/sortbyandrew'); ?>">Andrew Id</a></td>
    <td>Department</td>
    <td>Year</td>
<!--    <td>Condition</td> -->
    <td><a href="<?php echo site_url('users/sortbycomments'); ?>">Num Comments</a></td>
    <td>Num Upvotes</td>
    <td>Num Downvotes</td>
<!--
    <td>Num Times Prompted</td>
    <td>Encouragement Type</td>
-->
    <td>Delete</td>
</tr>

<?php
if (count($users) > 0) {
    $count = 1;
    foreach ($users as $user) {
?>
    <tr>
        <td><?php echo $count; ?></td>
        <td><?php echo $user->id; ?></td>
        <td><a href="<?php echo site_url('user/' . $user->username); ?>"><?php echo $user->username; ?></a></td>
        <td><?php echo $user->type; ?></td>
        <td><?php echo $user->firstname; ?></td>
        <td><?php echo $user->lastname; ?></td>
        <td><?php echo $user->andrewid; ?></td>
        <td><?php echo $user->department; ?></td>
        <td><?php echo $user->year; ?></td>
<!--        <td><?php echo $user->group; ?></td>  -->
        <td><?php echo $user->num_comments ?></td>
        <td><?php echo $user->num_upvotes ?></td>
        <td><?php echo $user->num_downvotes ?></td>
<!--        <td><?php echo $user->num_prompted ?></td> -->
<!--       <td><?php echo $user->encouragement_segment; ?></td> -->
        <td><?php echo '<a href="' . site_url("users/delete/$user->id") . '"
        onclick="return confirm(\'Are you sure you want to delete this user?\');">Delete</a>'; ?></td>
    </tr>
<?php $count = $count + 1;
    }
}
?>

</table>

