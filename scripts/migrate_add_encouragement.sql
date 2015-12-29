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

ALTER TABLE `users` ADD `encouragement_segment` enum('NEUTRAL', 'POSITIVE') NOT NULL;
UPDATE `users` SET encouragement_segment = FLOOR(1 + RAND() * 2);
