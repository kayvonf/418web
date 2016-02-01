<?php  // Dont display anything if there is nothing for them to click on 
if ($can_comment || count($comment_htmls) > 0) {
?>

<div class="comments-wrap"
    data-lightbox="<?php echo ($display_style == LIGHTBOX ? $lightbox_selector : '') ?>">

<?php if ($display_style == EXPAND || $display_style == LIGHTBOX) { ?>
<button class="show-comments-button">
[<span class="show-comments-verb">Show comments</span>]
<?php // TODO(awreece) Start with correct text here, (same for elsewhere on page. ?>
</button>
<?php } ?>

<div class="comments-container">

<?php if ($display_style == LIGHTBOX) { ?>
<button class="show-comments-button">
[<span class="show-comments-verb">Show</span>]
</button>
<?php } ?>

<div class="instructor-comment">
     <?php echo $instructor_html; ?>
</div>

<?php if ($can_comment) { ?>
<div class="private-comment">
    <?php echo $private_html; ?>
</div>
<?php } ?>

<div class="container">
<?php foreach($comment_htmls as $comment_html) {
    echo $comment_html;
} ?>
</div>

<?php if ($can_comment) {
    $attributes = array('class' => 'comment-form');
    $hidden_vals = array('parent_type' => $parent_type,
                         'parent_id' => $parent_id);
    if (isset($parent_item)) {
        $hidden_vals['parent_item'] = $parent_item;
    }
    echo form_open('', $attributes, $hidden_vals);
?>
    <div class="add-comment-area">
        <?php echo form_textarea(array(
            'name' => 'body_markdown', // TODO(kayvonf) Prettify this.
            'placeholder' => 'Add a comment',
            'rows' => 10
        )); ?>
    </div>
    <?php if ($is_privileged) { ?>
    <div class="slide-prompt-area" style="display: none;">
        <?php echo form_textarea(array(
            'name' => 'prompt_context',
            'value' => $restate_msg,
            'rows' => 3
        )); ?>
    </div>
    <?php } ?>
    <div>
        <div class="submit_button_container">
            <? echo form_submit(array('name' => 'mysubmit', 'class' => 'submit_button'), 'Submit Comment!'); ?>
            <?php if ($is_privileged) { ?>
            <button class="slide-prompt-button" type="button">Prompt</button>
            <?php } ?>
        </div>
        <?php // TODO(caryy) This will only show up if the user can comment.
              //   This is currently acceptable because any logged in user can
              //   comment if the thread has comments enabled, and if the thread
              //   does not have comments enabled, then it doesn't make sense to
              //   subscribe to it. Change this if the COMMENT permission
              //   changes in the future ?>
        <?php if ($is_subscribed) { ?>
        <div class="subscription_container subscribed">
        <?php } else { ?>
        <div class="subscription_container">
        <?php } ?>
            <span class="text_subscribed">You are currently subscribed to this thread!</span>
            <span class="text_unsubscribed">You are not currently subscribed to this thread.</span>
            <button class="subscribe_button" type="button">
                <span class="text_subscribed">Unsubscribe</span>
                <span class="text_unsubscribed">Subscribe</span>
            </button>
        </div>
        <?php // Clearfix ?>
        <div style="clear: both;"></div>
	</div>
<? echo form_close(''); ?>
<? } // end if $can_comment ?>

<?php if ($display_style != VISIBLE) { ?>
<button class="show-comments-button">
[<span class="show-comments-verb">Show</span>]
</button>
<?php } ?>

</div>

</div>

<?php } // end if can_comment ||  count(comments) > 0. ?>
