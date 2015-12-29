<?php
$can_edit_comment = $is_privileged ||
    // We can't use id here because it has already been cleaned.
    $logged_in_username == $comment->author->username;
?>

<div class="comment"
     data-id="<?php echo $comment->id ?>"
<?php if (isset($comment->current_user_vote)) { ?>
     data-vote="<?php echo $comment->current_user_vote ?>"
<?php } ?>
<?php if ($comment->points) { ?>
     data-points="<?php echo $comment->points ?>"
<?php } ?>
>
    <div class="about">
        <div><img src="<?=$comment->author->profile_picture_url?>"/></div>
        <div><span class="user"><?=$comment->author->username?></span> <time class="timeago" datetime="<?=date(DATE_ISO8601, strtotime($comment->created))?>"></time></div>
    </div>
    <div class="comment-data">
        <?= $comment->body_html ?>
<?php if ($is_privileged && $comment->edit_reason) { ?>
        <div class="edit-reason-text colored_text">
<?php // Have more compact text for revised comments because the edit
      // author is already displayed elsewhere ?>
<?php if ($comment->state === REVISED) { ?>
            Edit reason:
            <em><?php echo $comment->edit_reason ?></em>
<?php } else { ?>
            Edited by <strong><?php echo $comment->edit_author->username ?></strong>,
            reason: <em><?php echo $comment->edit_reason ?></em>
<?php } ?>
        </div>
<?php } ?>
    </div>
<?php // Do not make the comment editing form or buttons for non-active comments ?>
<?php if ($comment->state === ACTIVE) { ?>
<?php if ($can_edit_comment) { ?>
    <form class="edit-comment-form" style="display: none;">
        <textarea name="body_markdown" rows="10"><?= $comment->body_markdown ?></textarea>
<?php // We can't use id here because it has already been cleaned. ?>
<?php if ($logged_in_username != $comment->author->username) { ?>
        <label>
            Reason for edit (required):
<?php // Default value here because most instructor edits are Kayvon changing grammar. ?>
            <input name="edit_reason" type="text" value="Kayvon; grammar">
        </label>
<?php } ?>
        <input type="submit" name="submit" value="Submit changes"  />
    </form>
<?php } ?>

     <div class="button-container">
<?php if ($is_privileged) { ?>
        <button class="prompt-button" type="button">Prompt</button>
<?php } ?>
<?php if (isset($comment->revision_history) && count($comment->revision_history) > 0) { ?>
        <button class="history-button" type="button">
            <span class="history-text">History</span> (<?php echo count($comment->revision_history) ?>)
        </button>
<?php } ?>
<?php if ($can_edit_comment) { ?>
        <button class="edit-button" type="button">Edit</button>
        <button class="delete-button" type="button">Delete</button>
<?php } ?>
<?php if ($is_privileged) { ?>
        <button class="archive-button" type="button">Archive</button>
<?php } ?>

<?php if ($is_privileged || $logged_in_group !== NOVOTE_GROUP) { ?>
        <span class="colored_text">[</span>
        <span class="points-text colored_text"><?php echo $comment->points ?></span>
<?php $upvote_active = $comment->current_user_vote === UPVOTE ? ' active' : ''; ?>
        <button class="upvote-button<?php echo $upvote_active ?>" type="button">Upvote</button>
<?php if ($is_privileged || $logged_in_group === UPDOWNVOTE_GROUP) { ?>
<?php $downvote_active = $comment->current_user_vote === DOWNVOTE ? ' active' : ''; ?>
        <button class="downvote-button<?php echo $downvote_active ?>" type="button">Downvote</button>
<?php } ?>
        <span class="colored_text">]</span>
<?php } ?>
    </div>

<?php if ($is_privileged) { ?>
    <form class="prompt-students-form" style="display: none;">
        <label>
            Request that student:
            <select name="prompt_type">
                <option value="restate">Restate</option>
                <option value="question">Answer a question</option>
            </select>
        </label>
        <label>
            Context:
            <textarea name="prompt_context" rows="3"
                data-restate-msg="<?php echo $restate_msg; ?>"
                data-question-msg="<?php echo $question_msg; ?>">
<?php echo $restate_msg; ?>
            </textarea>
        </label>
        <label>
            Sample email Markdown preview (the actual emails might be slightly different):
            <pre class="prompt-preview">
Here is an opportunity to engage in the class discussion.

<span class="preview-context"><?php echo htmlspecialchars($restate_msg); ?></span>
<?php echo '> ' . str_replace("\n", "\n> ", htmlspecialchars($comment->body_markdown)); ?>
            </pre>
        </label>
        <input type="submit" name="submit" value="Prompt some students!"  />
    </form>
<?php } ?>

<?php if (isset($comment->revision_history) && count($comment->revision_history) > 0) { ?>
    <div class="history-container">
<?php echo $comment->revision_history_html; ?>
    </div>
<?php } ?>

<?php // Only admins can see REVISED posts, so it's safe to show points ?>
<?php } else if ($comment->state === REVISED) { ?>
    <div class="button-container">
        <span class="colored_text">[</span>
        <span class="points-text colored_text"><?php echo $comment->points ?></span>
        <span class="colored_text">]</span>
    </div>
<?php } // $comment->state === ACTIVE ?>

</div>
