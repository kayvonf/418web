ALTER TABLE `comments` CHANGE `state` `state` enum('PRIVATE', 'DELETED', 'ARCHIVED', 'REVISED', 'ACTIVE') NOT NULL DEFAULT 'ACTIVE';
