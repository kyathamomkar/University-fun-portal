create schema if not exists UBS collate utf8mb4_0900_ai_ci;

create table if not exists advertisement
(
	id int auto_increment
		primary key,
	title varchar(100) null,
	description varchar(200) charset utf8 null,
	location varchar(45) null,
	email varchar(45) charset utf8 not null,
	image varchar(255) null,
	`like` int(20) default 0 null,
	dislike int(20) default 0 null
);

create index email
	on advertisement (email);

create table if not exists checkout
(
	id int auto_increment
		primary key,
	firstname varchar(45) null,
	lastname varchar(45) null,
	email varchar(45) null,
	adress varchar(255) null,
	country varchar(45) null,
	state varchar(45) null,
	zipcode int null,
	payment_type varchar(50) null,
	payment_name varchar(255) null,
	card_number varchar(50) null,
	expiration varchar(45) null,
	cvv int null,
	item_selected_id varchar(50) null,
	purchasetime datetime default CURRENT_TIMESTAMP null,
	user varchar(50) charset utf8 null,
	flag enum('false', 'true') default 'false' not null
);

create table if not exists exchange
(
	id int auto_increment
		primary key,
	title varchar(100) null,
	description varchar(200) null,
	email varchar(45) null,
	image varchar(100) null,
	posttime datetime default CURRENT_TIMESTAMP null,
	`like` int(20) default 0 null,
	dislike int(20) default 0 null
);

create table if not exists messages
(
	messageid int auto_increment
		primary key,
	messagetitle varchar(50) charset utf8 not null,
	messagedescription varchar(100) charset utf8 null,
	sender varchar(50) charset utf8 not null,
	senderemail varchar(50) charset utf8 null,
	recipient varchar(50) charset utf8 not null,
	messagetime datetime default CURRENT_TIMESTAMP null,
	clubmessage tinyint(1) default 0 null,
	clubname varchar(50) charset utf8 null
);

create table if not exists users
(
	id int auto_increment
		primary key,
	firstname varchar(30) charset utf8 not null,
	lastname varchar(30) charset utf8 not null,
	password varchar(80) charset utf8 not null,
	email varchar(30) charset utf8 not null,
	city varchar(30) charset utf8 not null,
	states varchar(30) charset utf8 not null,
	zipcode varchar(30) charset utf8 not null,
	constraint email
		unique (email)
);

create table if not exists clubs
(
	clubid int auto_increment
		primary key,
	description varchar(150) charset utf8 null,
	clubname varchar(50) charset utf8 not null,
	clubowner varchar(50) charset utf8 null,
	constraint clubs_clubname_uindex
		unique (clubname),
	constraint clubownerfk
		foreign key (clubowner) references users (email)
);

create table if not exists clubmemberships
(
	membershipid int auto_increment
		primary key,
	clubname varchar(50) charset utf8 null,
	useremail varchar(50) charset utf8 null,
	constraint clubfk
		foreign key (clubname) references clubs (clubname)
			on update cascade on delete cascade,
	constraint userfk
		foreign key (useremail) references users (email)
			on update cascade on delete cascade
);

create table if not exists sales
(
	id int auto_increment
		primary key,
	email varchar(45) charset utf8 null,
	description varchar(255) null,
	price int default 0 null,
	salefeature varchar(20) null,
	itemname varchar(45) null,
	image varchar(255) null,
	constraint sales_ibfk_1
		foreign key (email) references users (email)
			on update cascade on delete cascade
);

create index email
	on sales (email);

