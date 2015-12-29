<?php

// The following config variables will likely need to be modified on a
// per-site basis. However, they are set by deploy.py so there is no
// reason to edit this file.

// ----------------------------------------------------------------------

$config['course_name'] = 'MY_WEBSITE_NAME';

// If this is not the empty string, then the site will require this
// code to be entered upon user creation.  It's a poor man's way to
// restrict registration.
$config['signup_code'] = 'MY_WEBSITE_SIGNUP_CODE';

// Absolute path in local filesystem to content directory
$config['content_base_path'] = 'MY_CONTENT_PATH';

// Note the absolute path from the hostname base (the location of
// content can (and should) be independent from the CI tree)
$config['content_base_url']  = 'MY_CONTENT_BASE_URL';

// The email address with which the system will send emails
// ex. 15418-noreply@cs.cmu.edu
$config['course_email'] = 'MY_COURSE_EMAIL';

// The name that will show up in the from: field of emails
// ex. 15418 Staff
$config['email_display_name'] = 'MY_EMAIL_DISPLAY_NAME';

// id for google analytics integration
$config['google_analytics_id'] = 'MY_GOOGLE_ANALYTICS_ID';


// You should probably not need anything below this line on a per-site basis.
// ----------------------------------------------------------------------

// Assets (e.g., UI elements) are going to sit inside the CI tree, so
// we'll use a relative reference (build paths with base_url())
$config['css_base_url'] = 'assets/css';
$config['images_base_url'] = 'assets/images';

$config['lectures_rel_path'] = 'lectures';
$config['uploads_rel_path'] = 'uploads';
$config['article_images_rel_path'] = 'article_images';
$config['profile_pictures_rel_path'] = 'profile_pictures';

// TODO(mburman): Maybe expand to allowing other filetypes.
$config['allowed_image_types'] = 'jpg';
$config['max_image_size'] = '2048';
$config['max_image_width']  = '2048';
$config['max_image_height']  = '2048';

$config['prompt_email_title'] = "You've been prompted by the 15-418 staff";
$config['num_students_prompted'] = 2;
$config['neutral_prefixes'] = array(
    "This is a discussion you can participate in.",
    "Here is a discussion you can participate in.",
    "This is a thread you can participate in.",
    "Here's a thread you can comment on.",
    "Here's a conversation you can comment on.",
    "Here's a conversation you can participate in.",
    "Here is a discussion in which you can participate.",
    "This is an opportunity to engage in the class discussion.",
    "Here is an opportunity for you to engage in the class discussion.",
    "Here's a chance to engage in the discussion.",
    "Here's a chance to jump into the discussion.",
    "Here's an opportunity to jump in.",
    "This is a thread you can respond to.",
    "Here is a discussion you can respond to.",
    "Here's a conversation to jump in on.",
    "Here's a conversation you can respond to."
);
$config['positive_prefixes'] = array(
    "Participating in class discussions increases exposure to new ideas.",
    "Our class discussion forums increase exposure to new ideas.",
    "Exposure to new ideas is one benefit to the class discussion forums.",
    "Take some time to explore some new ideas in the class forums.",
    "Writing down your thoughts will help you think through complex ideas.",
    "Class discussions help you understand concepts, not just memorize them.",
    "Participating in class discussions will help you understand the concepts, and not just memorize them.",
    "Contributing to the course discussion forums is a good way to learn new things.",
    "Participation in course discussions will increase your learning.",
    "Expanding on others' ideas is a great way to learn new things.",
    "Participating in the class discussions online will help you learn the concepts better.",
    "Asynchronous discussions allow for more thought-processing time.",
    "Class discussion forums get you to think through your thoughts.",
    "Participation from all students is key to everyone's learning.",
    "Expanding on others' ideas is a great way to check your own understanding.",
    "Writing things down is a great way to check your own understanding."
);
$config['restate_comment_contexts'] = array(
    "Summarize, in your own words, what @<<<NAME>>> was trying to say in the following comment in [this thread](%s).",
    "Restate, in your own words, what @<<<NAME>>> was trying to say in the following comment on [this slide](%s).",
    "Try restating, in your own words, what @<<<NAME>>> was saying in the following comment in [this discussion](%s)."
);
$config['restate_lecture_contexts'] = array(
    "Try to describe what was said on [this slide](%s) in your own words.",
    "Summarize the main point of [this slide](%s).",
    "Summarize the topic of <<<Insert concept related to slide here>>> on [this slide](%s).",
    "Restate, in your own words, the idea of <<<Insert concept related to slide here>>> from [this slide](%s).",
    "Restate, in your own words, what I was trying to explain on [this slide](%s).",
    "Try and describe the main idea in [this slide](%s).",
    "Can you summarize the discussion happening [here](%s)?"
);
$config['question_contexts'] = array(
    "Can you answer the question in [this discussion](%s)?",
    "Try to answer the question in [this discussion](%s).",
    "What's your answer to this question in [this thread](%s)?",
    "How would you answer this question in [this discussion](%s)?"
);

// DO NOT CHANGE THE DEFINES!
// Resource types.
define('ARTICLE', 'ARTICLE');
define('LECTURE', 'LECTURE');
define('SLIDE', 'SLIDE');
define('PARAGRAPH', 'PARAGRAPH');

// Newsfeed
define('NEWSFEED', 'NEWSFEED');
define('USER_ACTIVITY_FEED', 'USER_ACTIVITY_FEED');

// Permission levels/Actions.
define('CREATE', 'CREATE');
define('EDIT', 'EDIT');
define('DELETE', 'DELETE');
define('VIEW', 'VIEW');
define('PRIVILEGED_CREATE', 'PRIVILEGED_CREATE');
define('COMMENT', 'COMMENT');
define('UPVOTE', 'UPVOTE');
define('DOWNVOTE', 'DOWNVOTE');

define('USER_TYPE_INSTRUCTOR', 'INSTRUCTOR');
define('USER_TYPE_TA', 'TA');
define('USER_TYPE_STUDENT', 'STUDENT');
define('USER_TYPE_OTHER', 'OTHER');
define('USER_TYPE_ANONYMOUS', 'ANONYMOUS');

// Comment display styles.
define('VISIBLE', 101);
define('LIGHTBOX', 102);
define('EXPAND', 103);
define('HISTORY', 104);

define('SLIDE_NAME_FORMAT_STRING', 'slide_%03d');

define('ACTIVE', 'ACTIVE');
define('REVISED', 'REVISED');
define('ARCHIVED', 'ARCHIVED');
define('DELETED', 'DELETED');
define('PRIVATE_COMMENT', 'PRIVATE');

define('NOVOTE_GROUP', 'NOVOTE_GROUP');
define('UPVOTE_GROUP', 'UPVOTE_GROUP');
define('UPDOWNVOTE_GROUP', 'UPDOWNVOTE_GROUP');

define('NEUTRAL_ENCOURAGEMENT', 'NEUTRAL');
define('POSITIVE_ENCOURAGEMENT', 'POSITIVE');
