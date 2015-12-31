<?php
if ($user_can_make_instructor_comment && $comment === NULL) {

    $attributes = array(
        'class' => 'instructor-comment-form',
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
<div class="instructor-comment-button-container">
    <button class="add-instructor-comment">Add Instructor Note</button>
</div>
<?php echo form_open('', $attributes, $hidden_vals); ?>
    <div class="add-instructor-comment-area">
        <?php echo form_textarea(array(
            'name' => 'body_markdown',
            'placeholder' => 'Add an instructor note.',
            'rows' => 10
        )); ?>
    </div>
    <div class="submit_button_container">
        <?php echo form_submit(array('name' => 'mysubmit', 'class' => 'submit_button'), 'Add Instructor Note'); ?>
        <button type="button" class="cancel-instructor-btn">Cancel</button>
    </div>
    <?php // Clearfix ?>
    <div style="clear: both;"></div>
<?php echo form_close(''); ?>

<?php } else {

  if ($comment !== NULL) {
      // so we need to show the instructor comment, but *how* we show
      // it depends on whether this user can edit instructor comments     
?>
  
<div class="comment" data-id="<?php echo $comment->id ?>">
    <div class="about">
        <span class="user">Instructor Note</span>
    </div>
    <div class="comment-data">
        <?= $comment->body_html ?>
    </div>

    <?php if ($user_can_make_instructor_comment) { ?>
    
    <form class="edit-comment-form" style="display: none;">
        <textarea name="body_markdown" rows="10"><?= $comment->body_markdown ?></textarea>
        <input name="edit_reason" type="hidden" value="general instructor note edit" /> 
        <input type="submit" name="submit" value="Submit changes"  />
    </form>

     <div class="button-container">
        <button class="edit-button" type="button">Edit</button>
        <button class="delete-button" type="button">Delete</button> 
    </div>

    <?php } ?>
    
</div>

<?php
  }  // if the comment exists
}
?>


