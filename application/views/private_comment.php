<?php if ($comment == NULL) {
    $attributes = array(
        'class' => 'private-comment-form',
        'style' => 'display: none;'
    );
    $hidden_vals = array(
        'parent_type' => $parent_type,
        'parent_id' => $parent_id
    );
    if (isset($parent_item)) {
        $hidden_vals['parent_item'] = $parent_item;
    }
?>
<div class="private-comment-button-container">
    <button class="add-private-comment">Add Private Note</button>
</div>
<?php echo form_open('', $attributes, $hidden_vals); ?>
    <div class="add-private-comment-area">
        <?php echo form_textarea(array(
            'name' => 'body_markdown',
            'placeholder' => "Add private notes here. These notes will only be visible to you.",
            'rows' => 10
        )); ?>
    </div>
    <div class="submit_button_container">
        <?php echo form_submit(array('name' => 'mysubmit', 'class' => 'submit_button'), 'Add Private Note'); ?>
        <button type="button" class="cancel-private-btn">Cancel</button>
    </div>
    <?php // Clearfix ?>
    <div style="clear: both;"></div>
<?php echo form_close(''); ?>
<?php } else { ?>
<div class="comment" data-id="<?php echo $comment->id ?>">
    <div class="about">
        <span class="user">My Notes</span>
    </div>
    <div class="comment-data">
        <?= $comment->body_html ?>
    </div>
    <form class="edit-comment-form" style="display: none;">
        <textarea name="body_markdown" rows="10"><?= $comment->body_markdown ?></textarea>
        <input type="submit" name="submit" value="Submit changes"  />
    </form>

     <div class="button-container">
        <button class="edit-button" type="button">Edit</button>
        <button class="delete-button" type="button">Delete</button>  
    </div>
</div>
<?php } // $comment == NULL ?>
