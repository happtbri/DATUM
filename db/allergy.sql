/*알러지 테이블*/
create table allergy(
	big char(20) not null,
	small char(20) not null, 
	sub char(90) not null, 
	food char(30) not null,
	primary key(big)
);

/*알러지*/
insert into allergy(big, small, sub, food) values ('갑각류','새우,조개','육류, 두부, 달걀','감바스');
insert into allergy(big, small, sub, food) values ('견과류','땅콩,대두(콩)','견과류 이외의 식물성 기름','땅콩버터');
insert into allergy(big, small, sub, food) values ('생선류','고등어','두부, 달걀, 쇠고기, 닭고기','땅콩조림');
insert into allergy(big, small, sub, food) values ('과채류','토마토','다른 야채(미량원소, 식이 섬유 포함)','토마토 스파게티');
insert into allergy(big, small, sub, food) values ('과일류','복숭아','다른 과일(비타민, 미네랄 포함)','복숭아 파이');
insert into allergy(big, small, sub, food) values ('난류','달걀','두부, 콩나물','간장계란밥');
insert into allergy(big, small, sub, food) values ('육류','돼지고기','소고기, 흰살생선','불고기');
insert into allergy(big, small, sub, food) values ('밀가루류','밀','감자, 쌀, 옥수수, 당면, 보리','파스타');
insert into allergy(big, small, sub, food) values ('유제품류','우유','두유','로제 떡볶이');
