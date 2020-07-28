create database if not exists  test_ua_gis;
use test_ua_gis;

create table if not exists `user`
(
	`id` int auto_increment primary key,
    `email` varchar(255) not null,
    `password` varchar(255) not null
);

create table if not exists `post`
(
	`id` int auto_increment primary key,
    `post` text not null,
    `date` date not null,
    `autor_id` int not null,
    `approval` boolean default false
);

CREATE OR REPLACE VIEW `post_view` as 
	select `p`.`id` as `id`, `p`.`date` as `date`, `u`.`email` as `autor`, `p`.`post` as `post`, `p`.`approval`
    from `post` as p
    	LEFT JOIN `user` as u
        ON `p`.`autor_id` = `u`.`id`;