create database noteFlix;

use noteFlix;

create table notes (
id_note int not null auto_increment primary key,
movie_name varchar(30) not null,
movie_note int(2) not null,
movie_description varchar(500) not null,
id_user int not null
)engine=innodb;

create table users (
id_user int not null auto_increment primary key,
email_user varchar(60) not null,
name_user varchar(60) not null,
password_user varchar(200) not null
)engine=innodb;

alter table notes
add constraint fk_users_notes
foreign key (id_user)
references users (id_user)
on delete cascade;


