create database pokemondatabase
    default character set utf8
    collate utf8_unicode_ci;

use pokemondatabase;

create table pokemon (
  id bigint(20) not null auto_increment primary key,
  name varchar(100) not null unique,
  weight int(4,2) not null,
  height int(3,2) not null,
  type varchar(100) not null,
  evolution int(1) not null
) engine=innodb default charset=utf8 collate=utf8_unicode_ci;

create user pokemontrainer@localhost
    identified by 'pokemonpassword';

grant all
    on pokemondatabase.*
    to pokemontrainer@localhost;

flush privileges;