create table departments
(
    id              int auto_increment,
    department_name varchar(255) not null,
    constraint departments_department_name_uindex
        unique (department_name),
    constraint departments_id_uindex
        unique (id)
);

alter table departments
    add primary key (id);

create table regions
(
    id          int auto_increment,
    region_name varchar(255) not null,
    constraint regions_id_uindex
        unique (id),
    constraint regions_region_name_uindex
        unique (region_name)
);

alter table regions
    add primary key (id);

create table users
(
    id        int          not null,
    username  varchar(255) not null,
    email     varchar(255) not null,
    firstname varchar(255) not null,
    lastname  varchar(255) not null,
    constraint users_email_uindex
        unique (email),
    constraint users_id_uindex
        unique (id)
);

create index email_index
    on users (email);

create index fullname_index
    on users (firstname, lastname);

create index username_index
    on users (username);

alter table users
    add primary key (id);

create table users_departments
(
    id            int auto_increment,
    user_id       int null,
    department_id int null,
    constraint users_departments_id_uindex
        unique (id),
    constraint users_departments___fk1
        foreign key (user_id) references users (id),
    constraint users_departments___fk2
        foreign key (department_id) references departments (id)
);

alter table users_departments
    add primary key (id);

create table users_regions
(
    id        int auto_increment,
    user_id   int null,
    region_id int null,
    constraint users_regions_id_uindex
        unique (id),
    constraint users_regions___fk1
        foreign key (user_id) references users (id),
    constraint users_regions___fk2
        foreign key (region_id) references regions (id)
);

alter table users_regions
    add primary key (id);


