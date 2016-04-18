create table article_type (
id int not null auto_increment, 
name varchar(255), 
primary key (id)
);
create table article (
id int not null auto_increment, 
title varchar(255) not null, 
createtime timestamp not null default current_timestamp,
modifytime timestamp not null default current_timestamp on update current_timestamp,
body text,
primary key (id)
);
create table article_article_type (
aid int not null,
tid int not null,
foreign key (aid) references article(id) on delete cascade,
foreign key (tid) references article_type(id) on delete cascade
);
create table album (
id int not null auto_increment,
name varchar(255) not null,
primary key(id)
);
create table photo (
id int not null auto_increment,
intro varchar(255) not null,
file varchar(255) not null,
aid int not null,
primary key (id),
foreign key (aid) references album(id) on delete  cascade
);
create table hyperlink (
id int not null auto_increment,
title varchar(255) not null,
http varchar(255) not null,
primary key (id)
);