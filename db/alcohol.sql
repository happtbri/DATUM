/*주류 테이블*/
create table alcohol(
	name char(40) not null,
	kinds char(20) not null,
	alcohol_content float not null,
	origin char(20) not null,
	primary key(name)
);

/*주류*/
insert into alcohol(name, kinds, alcohol_content, origin) values ('호메세라 브뤼','스파클링 와인',11.5,'스페인');
insert into alcohol(name, kinds, alcohol_content, origin) values ('모나스테리오 호벤','레드와인',13,'스페인');
insert into alcohol(name, kinds, alcohol_content, origin) values ('화이트 진판델','화이트와인',10,'미국');
insert into alcohol(name, kinds, alcohol_content, origin) values ('돈레이 소비뇽 블랑','화이트와인',13.5,'');
insert into alcohol(name, kinds, alcohol_content, origin) values ('카니버 까베르네 소비뇽','레드와인',14,'미국');
insert into alcohol(name, kinds, alcohol_content, origin) values ('카스 프레쉬','라거 맥주',4.5,'한국');
insert into alcohol(name, kinds, alcohol_content, origin) values ('맥스','라거 맥주',4.5,'한국');
insert into alcohol(name, kinds, alcohol_content, origin) values ('칭따오','페일 라거 맥주',4.7,'중국');
insert into alcohol(name, kinds, alcohol_content, origin) values ('버드와이저','라거 맥주',5,'미국');
insert into alcohol(name, kinds, alcohol_content, origin) values ('지평 막걸리','막걸리',5,'한국');
insert into alcohol(name, kinds, alcohol_content, origin) values ('밀러','라거 맥주',4.7,'미국');
insert into alcohol(name, kinds, alcohol_content, origin) values ('하이네켄','라거 맥주',5,'네덜란드');
insert into alcohol(name, kinds, alcohol_content, origin) values ('기네스','에일 맥주',4.2,'영국');
insert into alcohol(name, kinds, alcohol_content, origin) values ('테라','라거 맥주',4.6,'한국');
insert into alcohol(name, kinds, alcohol_content, origin) values ('인생 막걸리','막걸리',5,'한국');
insert into alcohol(name, kinds, alcohol_content, origin) values ('장수 생 막걸리','막걸리',6,'한국');
insert into alcohol(name, kinds, alcohol_content, origin) values ('처음처럼','소주',17.5,'한국');
insert into alcohol(name, kinds, alcohol_content, origin) values ('O2린','소주',17.8,'한국');
insert into alcohol(name, kinds, alcohol_content, origin) values ('한라산','소주',21,'한국');
insert into alcohol(name, kinds, alcohol_content, origin) values ('느린마을','막걸리',6,'한국');
insert into alcohol(name, kinds, alcohol_content, origin) values ('메를로','레드와인',13,'프랑스');
insert into alcohol(name, kinds, alcohol_content, origin) values ('쉬라즈','레드와인',14.5,'프랑스');