
/*
	user �û���Ϣ��
*/

CREATE TABLE user(
id int auto_increment primary key,
username char(20) not null unique,
password char(40) not null,
email char(40) not null unique,
photo char(88) default 'img/nophoto.gif',
reg_date TIMESTAMP  default CURRENT_TIMESTAMP  
-- �Զ���ȡĬ�ϴ���ʱ�䣬����Ҫ�������
)character set utf8;

/*
	good ��Ʒ��
*/

CREATE TABLE good(
id int auto_increment primary key,
title char(20) not null,
descr varchar(500) not null,
newOld char(20) not null,
wanted char(80) not null,
qq char(20) not null,
tel char(20),
city char(20),
image char(60),
username char(40) not null,
insert_date TIMESTAMP  default CURRENT_TIMESTAMP  
)character set utf8;

/*
	message ���Ա�	
*/

CREATE TABLE message(
mid int auto_increment primary key,
username char(40) not null,
content varchar(100) not null,
insert_date TIMESTAMP  default CURRENT_TIMESTAMP,
pid int not null 
)character set utf8;

/*
	favorite �ղر�
*/
CREATE TABLE favorite(
id int auto_increment primary key,
username char(40) not null,
pid int not null
)character set utf8;