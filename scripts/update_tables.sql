update events left join event_types on event_types.id = events.event_type set events.verb_id = event_types.pid;

alter table events change event_type event_type_id int(11) NOT NULL;

alter table event_types add noun_item varchar(16) DEFAULT NULL COMMENT 'If not null, (paragraph / slide) of noun';

alter table event_types change verb verb_type enum('CREATE','EDIT','DELETE','VIEW','PRIVILEGED_CREATE','COMMENT') NOT NULL;

update event_types 
left join comments
on event_types.pid = comments.id
set event_types.type = comments.parent_type,
    event_types.pid = comments.parent_id,
    event_types.noun_item = comments.parent_item;

alter table event_types change type noun_type enum('ARTICLE','LECTURE','COMMENT');

alter table event_types change pid noun_id int(11) NOT NULL;

alter table event_types drop index `verb`;

update events 
left join event_types a 
on a.id = events.event_type_id 
set events.event_type_id = (select id from event_types b 
                            where a.verb_type = b.verb_type 
                            and a.noun_type = b.noun_type 
                            and a.noun_id = b.noun_id 
                            and a.noun_item <=> b.noun_item 
                            limit 1);

delete from event_types where id not in (select event_type_id from events);

alter table event_types add UNIQUE KEY `unique_types` (`verb_type`,`noun_type`,`noun_id`, `noun_item`);
