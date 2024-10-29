create table cars
(
    make        varchar(255) null,
    model       varchar(255) null,
    year        int          null,
    price       float        null,
    id          int auto_increment
        primary key,
    description varchar(255) null
);

create table films
(
    name        varchar(255) null,
    director    varchar(255) null,
    year        int          null,
    id          int auto_increment
        primary key,
    description varchar(255) null
);
