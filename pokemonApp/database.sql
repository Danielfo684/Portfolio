/*  
 drop database if exists pokemondatabase;
    drop user if exists pokemontrainer@localhost;
    */

    create database pokemondatabase
        default character set utf8
        collate utf8_unicode_ci;

    use pokemondatabase;

    create table pokemon (
    id bigint(20) not null auto_increment primary key,
    name varchar(100) not null unique,
    level int(3) not null,
    weight decimal(4,2) not null,
    height decimal(3,2) not null,
    type varchar(100) not null,
    evolution int(1) not null
    ) engine=innodb default charset=utf8 collate=utf8_unicode_ci;

    create user pokemontrainer@localhost
        identified by 'pokemonpassword';

    grant all
        on pokemondatabase.*
        to pokemontrainer@localhost;

    flush privileges;