/*요리사 테이블*/
create table chef (
num int not null,
name char(10) not null,
dept char(10) not null,
annual int not null,
restaurant char(20),
foreign key (num) references DBmember(num) /*일단 회원 table 이름 member로 둠 -> 부모키 이름도 mem_no으로 둠 (수정 )*/
);

/*요리사*/
insert into chef (num, name, dept, annual, restaurant) values (1,'김소희','한식',26,'Kim kocht' );
insert into chef (num, name, dept, annual, restaurant) values (2,'오세득','양식',18,'친밀' );
insert into chef (num, name, dept, annual, restaurant) values (31,'레이먼 킴','양식',26,'시리얼 고메2.0' );
insert into chef (num, name, dept, annual, restaurant) values (32,'이연복','중식',44,'목란' );
insert into chef (num, name, dept, annual, restaurant) values (33,'이원일','한식',12,'이원일 식탁' );
insert into chef (num, name, dept, annual, restaurant) values (34,'정창욱','일식',20,'금산제면소' );
insert into chef (num, name, dept, annual, restaurant) values (35,'샘킴','양식',21,'보나세라' );
insert into chef (num, name, dept, annual, restaurant) values (36,'최현석','양식',26,'쵸이닷' );
insert into chef (num, name, dept, annual, restaurant) values (37,'김훈이','한식',15,'DANJI' );
insert into chef (num, name, dept, annual, restaurant) values (9,'이병우','한식',30,'이병우 설렁탕' );
insert into chef (num, name, dept, annual, restaurant) values (10,'여경래','중식',32,'루이키친 M' );
insert into chef (num, name, dept, annual, restaurant) values (11,'유방녕','중식',27,'유방녕' );
insert into chef (num, name, dept, annual, restaurant) values (15,'정호영','일식',19,'이자카야 로바다야 카덴' );
insert into chef (num, name, dept, annual, restaurant) values (16,'이혜정','한식',29,NULL);
insert into chef (num, name, dept, annual, restaurant) values (17,'심영순','한식',18,'일상담미' );
insert into chef (num, name, dept, annual, restaurant) values (18,'송훈','양식',19,'더훈' );
insert into chef (num, name, dept, annual, restaurant) values (19,'남성렬','한식',20,'시유' );
insert into chef (num, name, dept, annual, restaurant) values (38,'백종원','한식',28,NULL);
insert into chef (num, name, dept, annual, restaurant) values (39,'강레오','양식',22,'화수목 바이 강레오');
insert into chef (num, name, dept, annual, restaurant) values (40,'에드워드 권','양식',24,'에디스키친');