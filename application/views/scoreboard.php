<div class="scoreboard">
<?php foreach($data as $machine) { ?>
<?php foreach($machine->data as $program) { ?>
<h3>Scoreboard for <?=$program->program_name?> on <?=$machine->machine?></h3>

<?php foreach ($program->data as $data) { ?>
<div>
<table>
<tr>
<td colspan=3>
<!-- TODO(awreece) This smells like using a table for layout to me ... -->
<a href="<?= site_url(). "/scoreboard/" .$machine->machine . "/" . $program->program_name . "/" . $data->instance ?>">Scoreboard for <?= $data->instance ?></a>
</td>
</tr>
<tr>
<td><strong>Time</strong></td>
<td><strong>User</strong></td>
<td><strong>Cores</strong></td>
</tr>

<?php foreach ($data->data as $score) { ?>
<tr>
<td><?= sprintf("%.4f", $score->score) ?>s</td>
<td><?= $score->username ?></td>
<td><?= $score->cores ?></td>
</tr>
<?php } ?>
</table>
</div>
<?php } ?>

<?php } ?>
<?php } ?>

</div>
