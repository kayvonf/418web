// Wrap the entire comments code in a closure to minimize leakage into the
// global namespace. Also, by calling jQuery and passing in the function, the
// function will only be run after the document is ready, which is what we
// want.
jQuery(function($) {
    function update_display_comments_verb(comments_container, is_visible) {
        // We can now nest containers in containers (revision history),
        // so have to use children function.
        var count = comments_container.children('.container').children().length;
        var is_history = comments_container.closest('.history-container').length > 0;

        var text;
        if (!is_history) {
            if (count == 0) {
                text = (is_visible) ? "Cancel" : "Add comment";
            } else if (is_visible) {
                text = "Hide comment" + ((count == 1) ? "" : "s");
            } else {
                text = count + " comment" + ((count == 1) ? "" : "s");
            }
            comments_container.closest('.comments-wrap')
                .find('.show-comments-verb:not(.history-container .show-comments-verb)')
                .text(text);
        } else {
            text = is_visible ? 'Hide History' : 'History';
            comments_container.closest('.history-container')
                .closest('.comment')
                .find('.history-text')
                .text(text);
            comments_container.find('.show-comments-verb').text(text);
        }
    }

    function update_vote_display(comment_tag) {
        var state = comment_tag.data('vote');
        var points = comment_tag.data('points');

        comment_tag.find('.upvote-button, .downvote-button').removeClass('active');

        // Make it an empty jQuery object by default
        var button = $();
        if (state === 'UPVOTE') {
            button = comment_tag.find('.upvote-button');
        } else if (state === 'DOWNVOTE') {
            button = comment_tag.find('.downvote-button');
        }
        button.addClass('active');
        comment_tag.find('.points-text:not(.history-container .points-text)')
            .text(points);
    }

    function comment_vote(comment_tag, vote_type) {
        $.ajax({
            type: 'POST',
            url: comment_vote_url,
            data: $.param({
                id: comment_tag.data('id'),
                vote_type: vote_type,
                csrf_token: $.cookie('csrf_cookie'),
            }),
            dataType: 'json',
            success: function (resp) {
                if (resp.error) {
                    alert(resp.error);
                    return false;
                }
                comment_tag.data('vote', vote_type);
                comment_tag.data('points', resp.num_points);
                update_vote_display(comment_tag);
            } 
        });
    }

    function toggle_edit_view(comment_tag) {
        comment_tag.children(".comment-data").toggle();
        var edit_form = comment_tag.children(".edit-comment-form");
        edit_form.toggle();

        if (edit_form.is(":visible")) {
            comment_tag.find(".edit-button").html("Cancel edit");
            var old_markdown = edit_form.find("textarea[name=body_markdown]").val();
            comment_tag.data('old-markdown', old_markdown);
        } else {
            // Reset the textarea to discard the changes.
            var old_markdown = comment_tag.data('old-markdown');
            edit_form.find("textarea[name=body_markdown]").val(old_markdown);
            comment_tag.find(".edit-button").html("Edit");

            var edit_reason_box = comment_tag.find("input[name=edit_reason]");
            if (edit_reason_box.length > 0) {
                edit_reason_box.val(edit_reason_box[0].defaultValue);
            }
        }
    }

    function edit_submit_handler() {
        var comment_tag = $(this).closest('.comment');
        $.ajax({
            type: 'POST',
            url:  edit_comment_url,
            data: $.param({
                id: comment_tag.data('id'),
                csrf_token: $.cookie("csrf_cookie"),
                body_markdown: $(this).find("textarea[name=body_markdown]").val(),
                edit_reason: $(this).find("input[name=edit_reason]").val()
            }),
            dataType: 'json',
            success: function (resp) {
                if (resp.error) {
                    alert(resp.error);
                    return false;
                }
                var new_comment = $(resp.comment_html);
                new_comment.postProcess();
                comment_tag.replaceWith(new_comment);
            },
            error: function(jdXHR, text, error) {
                alert('Error: ' + text + ' ' + error);
            }
        });
        return false;
    }

    function make_comment_remove_handler(msg, url) {
        var actual_handler = function() {
            if (!window.confirm(msg)) {
                return false;
            }

            var comment_tag = $(this).closest('.comment');
            $.ajax({
                type: 'POST',
                url: url,
                data: $.param({
                    id: comment_tag.data('id'),
                    csrf_token: $.cookie("csrf_cookie")
                }),
                success: function () {
                    comment_tag.remove();
                    // When we remove comments, we don't want to change the
                    // button from Hide Comments -> Cancel, so we don't call
                    // `update_display_comments_verb`.
                },
                error: function(jdXHR, text, error) {
                    alert('Error: ' + text + ' ' + error);
                }
            });
            return false;
        };
        return actual_handler;
    }

    function toggle_instructor_comment() {
        var private_comment = $(this).closest('.instructor-comment');
        var form = private_comment.find('.instructor-comment-form');
        var btn = private_comment.find('.add-instructor-comment');
        form.toggle();
        btn.toggle();
    }
    
    function toggle_private_comment() {
        var private_comment = $(this).closest('.private-comment');
        var form = private_comment.find('.private-comment-form');
        var btn = private_comment.find('.add-private-comment');
        form.toggle();
        btn.toggle();
    }

    function instructor_comment_form_handler() {
        var text_area = $(this).find("textarea[name='body_markdown']");
        if (text_area.val().length == 0) {
            alert("You can't submit an empty instructor comment");
            return false;
        }
        $.ajax({
            type: 'POST',
            url: add_instructor_comment_url,
            data: $(this).serialize(),
            dataType: "json",
            context: this,
            success: function (resp) {
                if (resp.error) {
                    alert(resp.error);
                    return false;
                }
                var container = $(this).closest('.instructor-comment');
                var comment_tag = $(resp.html);

                container.html(comment_tag);
                comment_tag.postProcess();
            },
            error: function(jdXHR, text, error) {
                alert('Error: ' + text + ' ' + error);
            }
        });
        // TODO(awreece) Show loading icon?
        return false;
    }
    
    function private_comment_form_handler() {
        var text_area = $(this).find("textarea[name='body_markdown']");
        if (text_area.val().length == 0) {
            alert("Comment is empty.");
            return false;
        }
        $.ajax({
            type: 'POST',
            url: add_private_comment_url,
            data: $(this).serialize(),
            dataType: "json",
            context: this,
            success: function (resp) {
                if (resp.error) {
                    alert(resp.error);
                    return false;
                }
                var container = $(this).closest('.private-comment');
                var comment_tag = $(resp.html);

                container.html(comment_tag);
                comment_tag.postProcess();
            },
            error: function(jdXHR, text, error) {
               alert('Error: ' + text + ' ' + error); 
            }
        });
        // TODO(awreece) Show loading icon?
        return false;
    }

    function subscription_handler(form_id) {
        // NOTE(caryy): This handler relies on the fact that the "Subscribe"
        // button is *inside* the add comment form.
        $(this).prop('disabled', true)
        $.ajax({
            type: 'POST',
            url:  toggle_subscribe_url,
            // TODO(caryy) Sending unnecessary data here...
            data: $(this).closest('form').serialize(),
            dataType: "json",
            context: this,
            success: function (resp) {
                if (resp.error) {
                    alert(resp.error);
                    return false;
                }

                // To make sure we don't become out of sync with the server
                $(this).closest('.subscription_container').toggleClass('subscribed', resp.subscribed);
            },
            complete: function() {
                $(this).prop('disabled', false);
            }
        });
    }

    function comment_form_handler() {
        if ($(this).find('.add-comment-area').is(':visible')) {
            var text_area = $(this).find("textarea[name='body_markdown']");
            if (text_area.val().length == 0) {
                alert("Comment is empty.");
                return false;
            }
            $.ajax({
                type: 'POST',
                url: add_comment_url,
                data: $(this).serialize(),
                dataType: "json",
                context: this,
                success: function (resp) {
                    if (resp.error) {
                        alert(resp.error);
                        return false;
                    }
                    var comments_container = $(this).closest('.comments-container');
                    var comment_tag = $(resp.html);

                    // We can now nest containers in containers (revision history),
                    // so have to use children function.
                    comments_container.children(".container").append(comment_tag);
                    comment_tag.postProcess();
                    update_display_comments_verb(comments_container, true);

                    // To make sure we don't become out of sync with the server
                    $(this).find('.subscription_container').toggleClass('subscribed', resp.subscribed);
                },
                error: function(jdXHR, text, error) {
                    alert('Error: ' + text + ' ' + error);
                }
            });
            text_area.val("");
            // TODO(awreece) Show loading icon?
        } else {
            $.ajax({
                type: 'POST',
                url: prompt_students_url,
                data: $(this).serialize(),
                dataType: 'json',
                context: this,
                success: function (resp) {
                    if (resp.error) {
                        alert(resp.error);
                        return false;
                    }
                    debugger;
                    toggle_slide_prompt_view($(this));
                    alert(resp.message);
                },
                error: function(jdXHR, text, error) {
                    alert('Error: ' + text + ' ' + error);
                }
            });
        }
        return false;
    }

    function hide_comments(comments_wrap, container) {
        var lightbox_selector = comments_wrap.data('lightbox');

        container.slideUp(function() {
            update_display_comments_verb(container, false);
            if (lightbox_selector) {
                $("#modal_overlay").hide();
                container.removeClass("modal");
            }
        });
    }

    function show_comments(comments_wrap, container) {
        var lightbox_selector = comments_wrap.data('lightbox');

        container.slideDown();
        update_display_comments_verb(container, true);
        if (lightbox_selector) {
            container.addClass("modal");
            $("#modal_overlay").show().off('click').click(function() {
                hide_comments(comments_wrap, container);
            });
        }
    }

    function toggle_comments_display(comments_wrap) {
        // We can now nest containers in containers (revision history),
        // so have to use children function.
        var container = comments_wrap.children('.comments-container');

        // We can't just toggle everything, because we want the modal overlay
        // to appear before slide down and after slide up.
        if (container.is(":visible")) {
            hide_comments(comments_wrap, container);
        } else {
            show_comments(comments_wrap, container);
        }
        return false;
    }

    function toggle_prompt_view(comment_tag) {
        var prompt_form = comment_tag.children(".prompt-students-form");
        prompt_form.toggle();

        if (prompt_form.is(":visible")) {
            comment_tag.find(".prompt-button").html("Cancel prompt");
            var old_prompt = prompt_form.find("textarea[name=prompt_context]").val();
            comment_tag.data('old-prompt', old_prompt);
        } else {
            // Reset the textarea to discard the changes.
            var old_prompt = comment_tag.data('old-prompt');
            prompt_form.find("textarea[name=prompt_context]").val(old_prompt).trigger('input');
            comment_tag.find(".prompt-button").html("Prompt");
        }
    }

    function change_prompt_type() {
        var selected = this.value;
        var context = $(this).closest('form').find('textarea[name=prompt_context]');
        if (selected === 'restate') {
            context.val(context.data('restate-msg'));
        } else {
            context.val(context.data('question-msg'));
        }
        context.trigger('input');
    }

    function prompt_submit_handler() {
        var comment_tag = $(this).closest('.comment');
        $.ajax({
            type: 'POST',
            url: prompt_students_url,
            data: $.param({
                parent_type: 'COMMENT',
                parent_id: comment_tag.data('id'),
                prompt_type: $(this).find('select[name=prompt_type]').val(),
                prompt_context: $(this).find('textarea[name=prompt_context]').val(),
                csrf_token: $.cookie('csrf_cookie')
            }),
            dataType: 'json',
            success: function (resp) {
                if (resp.error) {
                    alert(resp.error);
                    return false;
                }
                toggle_prompt_view(comment_tag);
                alert(resp.message);
            },
            error: function(jdXHR, text, error) {
                alert('Error: ' + text + ' ' + error);
            }
        });
        return false;
    }

    function toggle_slide_prompt_view(comments_form) {
        comments_form.find('.add-comment-area').toggle();
        var prompt_form = comments_form.find(".slide-prompt-area");
        prompt_form.toggle();

        if (prompt_form.is(":visible")) {
            comments_form.find('input[type="submit"]').val("Prompt some students!")
            comments_form.find(".slide-prompt-button").text("Cancel prompt");
            var old_prompt = prompt_form.find("textarea[name=prompt_context]").val();
            comments_form.data('old-prompt', old_prompt);
        } else {
            // Reset the textarea to discard the changes.
            var old_prompt = comments_form.data('old-prompt');
            prompt_form.find("textarea[name=prompt_context]").val(old_prompt)
            comments_form.find(".slide-prompt-button").text("Prompt");
            comments_form.find('input[type=submit]').val("Submit Comment!")
        }
    }

    function initialize_comments() {
        // Bind any event handlers related to comments

        // private comments
        $('.add-private-comment').on('click', toggle_private_comment);
        $('.cancel-private-btn').on('click', toggle_private_comment);
        $('.private-comment-form').on('submit', private_comment_form_handler);

        // instructor comments
        $('.add-instructor-comment').on('click', toggle_instructor_comment);
        $('.cancel-instructor-btn').on('click', toggle_instructor_comment);
        $('.instructor-comment-form').on('submit', instructor_comment_form_handler);

        // rest of comments
        
        $('.slide-prompt-button').on('click', function() {
            return toggle_slide_prompt_view($(this).closest('form'));
        });
        $('.subscribe_button').on('click', subscription_handler);
        $('.comment-form').on('submit', comment_form_handler);
        $('.show-comments-button').on('click', function() {
            var wrap = $(this).closest('.comments-wrap');
            toggle_comments_display(wrap);
        });

        $('.comments-container').on('click', '.comment .upvote-button', function() {
            var comment_tag = $(this).closest('.comment');
            var vote_state = comment_tag.data('vote');
            var next_vote_state;
            if (vote_state === 'UPVOTE') {
                next_vote_state = null;
            } else {
                next_vote_state = 'UPVOTE';
            }
            comment_vote(comment_tag, next_vote_state);
        });

        $('.comments-container').on('click', '.comment .downvote-button', function() {
            var comment_tag = $(this).closest('.comment');
            var vote_state = comment_tag.data('vote');
            var next_vote_state;
            if (vote_state === 'DOWNVOTE') {
                next_vote_state = null;
            } else {
                next_vote_state = 'DOWNVOTE';
            }
            comment_vote(comment_tag, next_vote_state);
        });

        var archive_msg = "Are you sure you want to archive this comment?";
        $('.comments-container').on('click', '.comment .archive-button',
                make_comment_remove_handler(archive_msg, archive_comment_url));

        var delete_msg = "Are you sure you want to delete this comment?";
        $('.comments-container').on('click', '.comment .delete-button',
                make_comment_remove_handler(delete_msg, delete_comment_url));

        $('.comments-container').on('click', '.comment .edit-button', function() {
            return toggle_edit_view($(this).closest('.comment'));
        });

        $('.comments-container').on('submit', '.comment .edit-comment-form',
            edit_submit_handler);

        $('.comments-container').on('click', '.comment .history-button', function() {
            var historical_wrap = $(this).closest('.comment').find('.history-container .comments-wrap');
            return toggle_comments_display(historical_wrap);
        });

        $('.comments-container').on('click', '.comment .prompt-button', function() {
            return toggle_prompt_view($(this).closest('.comment'));
        });

        $('.comments-container').on('change',
                '.comment select[name=prompt_type]', change_prompt_type);

        $('.comments-container').on('submit', '.comment .prompt-students-form',
            prompt_submit_handler);

        $('.comments-container').on('input propertychange',
                '.comment .prompt-students-form textarea[name=prompt_context]',
                function() {
                    $(this).closest('form').find('.preview-context').text(this.value);
                }
        );

        // Initialize all the show comment buttons
        $('.comments-container').each(function() {
            update_display_comments_verb($(this), false);
        });

        // Initialize all of the comments
        $('.comment').postProcess();

        // Extend the duration of the CSRF token every hour.
        setInterval($.get, 1000 * 60 * 60, keep_alive_url);
    }

    // We're in a function right now!
    initialize_comments();
});
