<script type="text/javascript">
// TODO(awreece) Coallesce all the js for this page.
var counter = 1;
function add_file_input() {
    if (counter == 10)  {
        var text = document.createTextNode("You can only upload 10 images at a time");
        document.getElementById("images").appendChild(text);
        document.getElementById("add_file_button").disabled = true;
    }
    else {
        var file_upload = document.createElement('input');
        file_upload.type='file';
        file_upload.name='counter';
        document.getElementById("images").appendChild(file_upload);
        var br = document.createElement('br');
        document.getElementById("images").appendChild(br);
    }
    counter++;
}
</script>

<h1>Edit Article</h1>

<div class="article_edit_border">

<?php
$attributes = array('id' => 'edit-article-form');
echo form_open_multipart(site_url('article/' . $article_id . '/do_edit/'. $version),
                         $attributes);
?>

<input type="hidden" id="edit-article-form-keep-editing" name="keep_editing" value=""></input>

<p>
<p class="bold_text">Title</p>
<p><input id="real_form_title" class="article_text_input" size="80" type="input" name="title" value="<?php echo $starting_title_text; ?>"></p>
</p>

<p class="bold_text">Article Content</p>
<p><textarea id="real_form_content" class="article_text_input" rows="20" cols="90" name="article_content" /><?php echo $starting_text; ?></textarea><p>

<p class="bold_text">Upload More Images</p>

<p>
   You can attach images to the article using the upload button below and then reference them in the text.  A list of currently attached images is given at the bottom of this page.
</p>

<div id="images">
<input type='file' name='0'><br />
</div>
<input type="button" id="add_file_button" value="Add Another Image" onclick="add_file_input()" />


<p class="bold_text">Who Can View/Edit this Article</p>

<p><input type="checkbox" name="is_public" value="public" <?php echo $public;?>> Public article (visible to all)</p>
<p><input type="checkbox" name="comments_enabled" value="allowcomments" <?php echo $comments_enabled;?>> Allow comments on this article</p>

<?php
if (count($authors) > 0) { ?>

<p>The following users are authors for this article.  Only authors can edit/view private articles. (Note: instructors and TAs can view and edit any article.)</p>
<p>
<?php
    foreach($authors as $author) { ?>
       <div id="article-author-id-<?php echo $author['id']; ?>">
          <?php echo $author['username']; ?>
          <button type="button" class="basic_button" onclick="delete_author('<?php echo $author['id'] ?>')">[remove]</a>
       </div>

<?php
        }

} else {
    echo 'The article has no desigated authors at this time.';
}
?>
</p>

<p><div class"bold_text">Add Additional Authors: (comma separated usernames)</div>
<input class="article_text_input" style="width: 360px;" type="input" name="authors" value="<?php echo $starting_additional_authors; ?>">
</p>

<hr size=1>

<p>
<a href="<?= site_url("article/" . $article_id) ?>">[ Cancel ]</a> |
<button type="button" class="basic_button" onclick="refresh_preview()" target="preview_target">[ Preview ]</button> |
<button type="button" class="basic_button" onclick="save_article(false)">[ Save ]</button> |
<button type="button" class="basic_button" onclick="save_article(true)">[ Save and Keep Editing ]</button>
</p>

</form>
</div>


<?php echo form_open_multipart('article/' . $article_id . '/do_preview', array('target' => 'preview_target', 'id' => 'preview_form') );?>
<input id="preview_form_title" type="hidden" name="title" value=""></input>

<!-- NOTE(kayvonf): I'm hoping a hidden input field can handle the entire article text -->
<input id="preview_form_content" type="hidden" name="article_content" value=""></input>
</form>



<h3>
    Currently Attached Images
</h3>

<?php if (count($article_images) == 0) { ?>

<p>This article has no attached images.</p>

<?php
    } else {
?>

<p>Right-click images to obtain a url for use in a Markdown image reference in the above article.</p>

<?php
        foreach ($article_images as $article_image) {

    // NOTE(kayvonf): Below I convert the '.' in the filename to a '-'.
    // The dot throws off CSS selectors
    $dom_id = 'image-id-' . str_replace('.', '-',$article_image->file_name);
?>

<p id="<?php echo $dom_id; ?>">

<img src="<?php echo $attached_images_dir . '/' . $article_image->file_name; ?>"
    width="125" align="middle" class="article_attached_image_preview" />

<button type="button" class="basic_button" onclick="delete_image('<?php echo $dom_id; ?>','<?php echo $article_image->file_name; ?>')">[delete]</button>

</p>

<?php
        }
    }
?>

<script>
var editor = CodeMirror.fromTextArea($("#real_form_content").get(0), {
    lineNumbers: true,
    lineWrapping: true,
    mode: 'markdown'
});

editor.on("focus", function (editor) {
    $(".CodeMirror").addClass("input-focused");
});

editor.on("blur", function (editor) {
    $(".CodeMirror").removeClass("input-focused");
});

function save_article(keep_editing) {

    var more_edits = (keep_editing) ? 'true' : 'false';
    $('#edit-article-form-keep-editing').val(more_edits);
    $('#edit-article-form').submit();
}

function refresh_preview() {
    $('#preview_form_title').val($('#real_form_title').val());
    $('#preview_form_content').val(editor.getValue());
    $('#preview_form').submit();
}

$(document).ready(function () {


    $("#edit-article-form").submit(function() {

        // Before saving the article changes, perform sanity checking to look for unused,
        // orphaned, or duplicate command tags.

        var body_markdown = editor.getValue();

        // read all the comments tags that the DB knowns about into an array
        // Just because the tag exists, it doesn't mean it's used in the document.
        var tags = [];
        $("#paragraph_tags tt").each(function () {
            tags.push($(this).text());
        });

        // Check that all tags are used.
        alert_text = [];
        $.each(tags, function (i, tag) {
            var regex = new RegExp(tag, "g");
            var match = body_markdown.match(regex);
            if (!match) {
                // FIXME(kayvonf): this is and should not be fatal.
                alert_text.push("Unused comment tag " + tag);
            } else if (match.length > 1) {
                // but this is bad, and we should kick out the submit
                alert_text.push("Multiple occurences of comment tag " + tag);
            }
        });

        // TODO(awreece) Use config.
        used_tags = body_markdown.match(/@coursecomments:\w+@/g);
        if (!<?= $article->comments_enabled ?> && used_tags) {
            // FIXME(kayvonf): I don't think we should complain about this
            alert_text.push("Comment tags used but comment disabled!");
        }

        // used_tags will be null at this point if there are no tags are in
        // the document
        if (used_tags != null) {
            $.each(used_tags, function (i, tag) {
               if ($.inArray(tag, tags) == -1) {
                  alert_text.push("Using invalid tag " + tag);
               }
             });
        }

        if (alert_text.length > 0) {
            alert(alert_text.join("\n"));
            return false;
        }

        return true;
    });
});

function delete_author(author_id) {
    if (!window.confirm("Are you sure you want to remove this user from the author list?")) {
        return false;
    }

    $.ajax({
        type: 'POST',
            url:  "<?= site_url("article/ajax_delete_author") ?>",
            data: $.param({
                article_id: <?= $article_id ?>,
                author_id: author_id,
                csrf_token: $.cookie("csrf_cookie")
            }),
            success: function () {
                $("#article-author-id-" + author_id).remove();
            },
            error: function(jdXHR, text, error) {
                alert('Error: ' + text + error);
            }
    });
    return false;
}


function delete_image(image_dom_id, image_filename) {
    if (!window.confirm("Are you sure you want to delete this image?\n(This will break all links to the image in the article)")) {
        return false;
    }

    $.ajax({
        type: 'POST',
            url:  "<?= site_url("article/ajax_delete_image") ?>",
            data: $.param({
                article_id: <?= $article_id ?>,
                filename: image_filename,
                csrf_token: $.cookie("csrf_cookie")
            }),
            success: function () {
                $("#" + image_dom_id).remove();
            },
            error: function(jdXHR, text, error) {
                alert('Error: ' + text + error);
            }
    });
    return false;
}

</script>

<?php if ($article->comments_enabled) { ?>
<hr size="1">

<h3>Comment blocks for this article</h3>

<p> The following are a list of comment tags associated with this
article. To enable users to make comments on a particular part of the
article, insert a tag into the article markdown source. When the
article is displayed you will see a comments block appear at that
place in the article.  We recommend you place comment tags at the end
of a paragraph, so that it's clear to users that comment made in that block should be about the
above paragraph.  However, you can also place comment tags on their
own line.  </p>

<script>



function delete_tag(name) {
    if (!window.confirm("Are you sure you want to delete this comment?")) {
        return false;
    }
    $.ajax({
        type: 'POST',
            url:  "<?= site_url("paragraphs/ajax_delete_paragraph") ?>",
            data: $.param({
                article_id: <?= $article_id ?>,
                name: name,
                csrf_token: $.cookie("csrf_cookie")
            }),
            dataType: "json",
            success: function (resp) {
                if (resp.error) {
                    alert(resp.error);
                    return false;
                }
                $("#paragraph-tag-" + name).remove();
            },
            error: function(jdXHR, text, error) {
                alert('Error: ' + text + error);
            }
    });
    return false;
}
</script>

<div id="paragraph_tags">
<?php foreach ($paragraphs as $paragraph) {
$this->load->view('paragraph_tag_template', $paragraph);
} ?>
</div>

<?= kayvon_button("Generate comment tag", NULL, array('id' => 'add_paragraph')) ?>

<script>
$(document).ready(function () {
    $("#add_paragraph").click(function () {
        $.ajax({
            type: 'POST',
                url:  "<?= site_url("paragraphs/ajax_add_paragraph") ?>",
            data: $.param({
                article_id: <?= $article_id ?>,
                csrf_token: $.cookie("csrf_cookie"),
                use_random_name: true
            }),
            dataType: "json",
            success: function (resp) {
                if (resp.error) {
                    alert(error);
                    return false;
                }
                $(resp.html).appendTo("#paragraph_tags");
            },
        });
        return false;
    });
});
</script>

<?php } // end if article->comments_enabled ?>
