<h1>List of Prompts</h1>

<p><?= kayvon_button("Download as CSV", 'comments/prompts/download') ?></p>

<table cellpadding="2" cellspacing="0" border="1">
<tr>
<td style="width: 80px;">ID</td>
<td style="width: 120px;">Prompt Type</td>
<td style="width: 120px;">Encouragement</td>
<td style="width: 80px;">From</td>
<td style="width: 240px;">To</td>
<td style="width: 240px;">Source URL</td>
<td style="width: 600px;">Message</td>
<td style="width: 120px;">Timestamp</td>
</tr>

<?php foreach ($prompts as $prompt) { ?>

<tr valign="top">
<td><?php echo $prompt->id; ?></td>
<td><?php echo $prompt->prompt_type; ?></td>
<td><?php echo $prompt->encouragement_segment; ?></td>
<td><?php echo $prompt->author; ?></td>
<td><?php echo $prompt->recipients; ?></td>
<td><?php echo $prompt->source_url; ?></td>
<td><?php echo $prompt->message; ?></td>
<td><?php echo $prompt->timestamp; ?></td>
</tr>

<?php } ?>

</table>

