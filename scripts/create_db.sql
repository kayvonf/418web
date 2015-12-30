DROP TABLE IF EXISTS `pageviews`;
CREATE TABLE `pageviews` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `session_id` varchar(40) NOT NULL,
    `ip_address` varchar(45) NOT NULL,
    `user_agent` varchar(120) NOT NULL,
    `last_activity` int(10) unsigned NOT NULL COMMENT 'Last activity time stamp',
    `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `site_url` varchar(256) NOT NULL,
    `user_id` int(11),
    PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `article_images`;
CREATE TABLE `article_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `file_name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE (`file_name`)
);

DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `text` mediumtext,
  `public` tinyint(1) NOT NULL DEFAULT '1',
  `comments_enabled` tinyint(1) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `version` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `authors`;
CREATE TABLE `authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `scores`;
CREATE TABLE `scores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `program_name` varchar(32) NOT NULL,
  `machine` varchar(50) NOT NULL,
  `instance` varchar(20) NOT NULL,
  `cores` int(11) NOT NULL,
  `score` float not null,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `trolls`;
CREATE TABLE `trolls` (
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
);

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state` enum('INSTRUCTOR', 'PRIVATE', 'DELETED', 'ARCHIVED', 'REVISED', 'ACTIVE') NOT NULL DEFAULT 'ACTIVE',
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `author` int(11) NOT NULL COMMENT 'Primary key of users table',
  `parent_type` enum('ARTICLE','LECTURE') NOT NULL,
  `parent_id` int(11) NOT NULL COMMENT 'Primary key of relevant table',
  `parent_item` varchar(16) NULL COMMENT 'If not null, (paragraph/slide) of parent',
  `body_markdown` text NOT NULL COMMENT 'The unprocessed markdown for the comment',
  `total_upvotes` int(11) NOT NULL DEFAULT 0,
  `total_downvotes` int(11) NOT NULL DEFAULT 0,
  `edit_timestamp` timestamp,
  `edit_author` int(11) COMMENT 'Primary key of users table',
  `edit_reason` text COMMENT 'Reason for edit if done by instructor',
  -- TODO(caryy) The below should have been implemented by adding parent_type
  -- COMMENT and using parent_id to better use the existing framework
  `original_comment` int(11) COMMENT 'Primary key of comments table, only for revised comments',
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `subscriptions`;
CREATE TABLE `subscriptions` (
  `id` int (11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `parent_type` enum('ARTICLE','LECTURE') NOT NULL,
  `parent_id` int(11) NOT NULL COMMENT 'Primary key of relevant table',
  `parent_item` varchar(16) NULL COMMENT 'If not null, (paragraph/slide) of parent',
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `event_types`;
CREATE TABLE `event_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `verb_type` enum ("CREATE", "EDIT", "DELETE", "VIEW", "PRIVILEGED_CREATE", "COMMENT", "UPVOTE") NOT NULL COMMENT 'The action performed',
  `noun_type` enum ('ARTICLE', 'LECTURE', 'COMMENT') NOT NULL COMMENT 'The noun on which the action is performed, if applicable',
  `noun_id` int(11) NULL COMMENT 'Primary key of relevant table',
  `noun_item` varchar(16) DEFAULT NULL COMMENT 'If not null, (paragraph / slide) of noun',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_types` (`verb_type`,`noun_type`,`noun_id`, `noun_item`)
);

DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `event_type_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `verb_id` int(11) COMMENT 'If not null, primary key of verb database (probably comments or votes)',
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `lectures`;
CREATE TABLE `lectures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NULL,
  `number` int(11) NOT NULL,
  `num_slides` int(11) NOT NULL,
  `lecture_date` date DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `shortname` varchar(32) NOT NULL,
  `comments_enabled` tinyint(1) NOT NULL DEFAULT '1',
  `instructor_notes_enabled` tinyint(1) NOT NULL DEFAULT '1',
  `video_url` varchar(256),
  `summary_article_id` int(11),
  `aspect_ratio` enum('4-3','16-9','85-11') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE (`shortname`)
);


DROP TABLE IF EXISTS `paragraphs`;
CREATE TABLE `paragraphs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL COMMENT 'Index of parent article in articles table',
  `name` varchar(16) NOT NULL COMMENT 'Short name of paragraph, should be unique for the article',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_paragraph_names` (`parent_id`,`name`)
);


DROP TABLE IF EXISTS `slides`;
CREATE TABLE `slides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL COMMENT 'Index of parent lecture in lectures table',
  `name` varchar(16) NOT NULL COMMENT 'Short name of slide, typically "000_name", used for image retrieval and sorting',
  `next_name` varchar(16) NULL COMMENT 'Next slide name or NULL if last slide',
  `previous_name` varchar(16) NULL COMMENT 'Next slide name or NULL if last slide',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_slide_names` (`parent_id`,`name`)
);

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(64) NOT NULL DEFAULT '',
  `lastname` varchar(64) NOT NULL DEFAULT '',
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `password_salt` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL DEFAULT '',
  `andrewid` varchar(64) NOT NULL DEFAULT '',
  `department` varchar(64) NOT NULL DEFAULT '',
  `type` enum('STUDENT','INSTRUCTOR','TA','OTHER') NOT NULL,
  `year` varchar(32) NULL,
  `group` enum('NOVOTE_GROUP', 'UPVOTE_GROUP', 'UPDOWNVOTE_GROUP') NOT NULL,
  `encouragement_segment` enum('NEUTRAL', 'POSITIVE', 'NO_PROMPT') NOT NULL COMMENT 'NO_PROMPT is a special group of students who have dropped the class who we should not prompt',
  PRIMARY KEY (`id`),
  UNIQUE (`username`)
);

DROP TABLE IF EXISTS `votes`;
CREATE TABLE `votes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `vote_type` enum ('UPVOTE', 'DOWNVOTE') NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_votes` (`author_id`, `comment_id`)
);

DROP TABLE IF EXISTS `sent_prompts`;
CREATE TABLE `sent_prompts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_type` enum('LECTURE', 'COMMENT') NOT NULL,
  `parent_id` int(11) NOT NULL COMMENT 'Primary key of relevant table',
  `parent_item` varchar(16) NULL COMMENT 'If not null, slide of parent',
  `author_id` int(11) NOT NULL COMMENT 'User ID of instructor who wrote the prompt',
  `message` text NOT NULL COMMENT 'Text of message in Markdown.',
  `prompt_type` enum('RESTATE', 'QUESTION') NOT NULL,
  `encouragement_segment` enum('NEUTRAL', 'POSITIVE') NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `students_prompted`;
CREATE TABLE `students_prompted` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prompt_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL COMMENT 'User ID of student receiving prompt',
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `password_reset_requests`;
CREATE TABLE `password_reset_requests` (
  `user_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
);
