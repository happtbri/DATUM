/*회원 테이블 */
CREATE TABLE DBmember (
    	num int not null auto_increment,
   	id char(20) not null,
    	pass char(20) not null,
	memtype int not null,
    	name char(10) not null,
	luvcook char(20) not null,
	cnt int not null,
    	aller char(20),
    	PRIMARY KEY(num),
	FOREIGN KEY(aller) REFERENCES allergy(big) ON DELETE CASCADE ON UPDATE CASCADE
);

/*회원*/
INSERT INTO DBmember (id, pass, memtype, name, luvcook, cnt, aller) VALUES ('kimso2', 'hfkxcn38', 2, '김소희', '한식', 0, '밀가루류');
INSERT INTO DBmember (id, pass, memtype, name, luvcook, cnt, aller) VALUES ('osseduck', 'husjkvnx8', 2, '오세득', '양식', 0, NULL);
INSERT INTO DBmember (id, pass, memtype, name, luvcook, cnt, aller) VALUES ('jprioo', 'uyhtg8', 3, '양선주', '한식', 1, '견과류');
INSERT INTO DBmember (id, pass, memtype, name, luvcook, cnt, aller) VALUES ('ryuha', 'qawerty', 3, '류진하', '중식', 1, NULL);
INSERT INTO DBmember (id, pass, memtype, name, luvcook, cnt, aller) VALUES ('kborim', 'polikjh5', 1, '김보명', '양식', 0, NULL);
INSERT INTO DBmember (id, pass, memtype, name, luvcook, cnt, aller) VALUES ('1hesong', 'f98kijm', 3, '송혜원', '일식', 1, '과일류');
INSERT INTO DBmember (id, pass, memtype, name, luvcook, cnt, aller) VALUES ('si0hong', '57dfhgj', 3, '홍시영', '양식', 0, '과채류');
INSERT INTO DBmember (id, pass, memtype, name, luvcook, cnt, aller) VALUES ('suuulin', '98dfgh8', 3, '이수린', '중식', 1, NULL);
INSERT INTO DBmember (id, pass, memtype, name, luvcook, cnt, aller) VALUES ('woo2', '2356ghjk', 2, '이병우', '한식', 1, NULL);
INSERT INTO DBmember (id, pass, memtype, name, luvcook, cnt, aller) VALUES ('ykr135', '987poihg', 2, '여경래', '중식', 1, NULL);
INSERT INTO DBmember (id, pass, memtype, name, luvcook, cnt, aller) VALUES ('bnu998', '6ojh56ihv', 2, '유방녕', '중식', 0, NULL);
INSERT INTO DBmember (id, pass, memtype, name, luvcook, cnt, aller) VALUES ('hotyellow', '2345ikjnb', 3, '권민식', '중식', 1, '생선류');
INSERT INTO DBmember (id, pass, memtype, name, luvcook, cnt, aller) VALUES ('jonjal1', '098dfgh', 3, '이주연', '양식', 0, NULL);
INSERT INTO DBmember (id, pass, memtype, name, luvcook, cnt, aller) VALUES ('socutebb', '5678ijh', 3, '김영훈', '한식', 0, '견과류');
INSERT INTO DBmember (id, pass, memtype, name, luvcook, cnt, aller) VALUES ('ho0j', '98ghb98', 2, '정호영', '일식', 1, NULL);
INSERT INTO DBmember (id, pass, memtype, name, luvcook, cnt, aller) VALUES ('hehej2', 'xcvb07', 2, '이혜정', '한식', 1, NULL);
INSERT INTO DBmember (id, pass, memtype, name, luvcook, cnt, aller) VALUES ('0soon9', 'nbv238kjb', 2, '심영순', '한식', 0, NULL);
INSERT INTO DBmember (id, pass, memtype, name, luvcook, cnt, aller) VALUES ('songhs2', 'vbnm96', 2, '송훈', '양식', 1, NULL);
INSERT INTO DBmember (id, pass, memtype, name, luvcook, cnt, aller) VALUES ('imamen', 'cvbn098', 2, '남성렬', '한식', 0, NULL);
INSERT INTO DBmember (id, pass, memtype, name, luvcook, cnt, aller) VALUES ('jpark', 'fghj4356', 3, '박재범', '한식', 1, '갑각류');
INSERT INTO DBmember (id, pass, memtype, name, luvcook, cnt, aller) VALUES ('jkoball', '5gub98fv', 3, '김선우', '한식', 0, NULL);
INSERT INTO DBmember (id, pass, memtype, name, luvcook, cnt, aller) VALUES ('pigyboy', '456j987f', 3, '주학년', '양식', 0, NULL);
INSERT INTO DBmember (id, pass, memtype, name, luvcook, cnt, aller) VALUES ('jonjal222', 'fgh98ef12', 3, '이재현', '중식', 0, NULL);
INSERT INTO DBmember (id, pass, memtype, name, luvcook, cnt, aller) VALUES ('hiselgi', 'asdf4948', 3, '강슬기', '일식', 1, NULL);
INSERT INTO DBmember (id, pass, memtype, name, luvcook, cnt, aller) VALUES ('jonye1', 'fdh5u85', 3, '배주현', '양식', 0, NULL);
INSERT INTO DBmember (id, pass, memtype, name, luvcook, cnt, aller) VALUES ('soojoy0', '3touljs', 3, '박수영', '양식', 0, NULL);
INSERT INTO DBmember (id, pass, memtype, name, luvcook, cnt, aller) VALUES ('wendy', '2t8ywpisd', 3, '손승완', '중식', 0, '육류');
INSERT INTO DBmember (id, pass, memtype, name, luvcook, cnt, aller) VALUES ('jonye22', '376bwg8', 3, '김예림', '일식', 1, '밀가루류');
INSERT INTO DBmember (id, pass, memtype, name, luvcook, cnt, aller) VALUES ('daram_g', 'y45beb7y', 3, '지창민', '한식', 1, NULL);
INSERT INTO DBmember (id, pass, memtype, name, luvcook, cnt, aller) VALUES ('8kitty', '85bye98', 3, '최찬희', '양식', 1, NULL);
INSERT INTO DBmember (id, pass, memtype, name, luvcook, cnt, aller) VALUES ('layk1m', '67suhf', 2, '레이먼 킴', '양식', 1, '과채류');
INSERT INTO DBmember (id, pass, memtype, name, luvcook, cnt, aller) VALUES ('8bok2', 'owhbv9', 2, '이연복', '중식', 1, NULL);
INSERT INTO DBmember (id, pass, memtype, name, luvcook, cnt, aller) VALUES ('one12', 'r62bksv', 2, '이원일', '한식', 1, NULL);
INSERT INTO DBmember (id, pass, memtype, name, luvcook, cnt, aller) VALUES ('jungc', '247jsb', 2, '정창욱', '일식', 0, NULL);
INSERT INTO DBmember (id, pass, memtype, name, luvcook, cnt, aller) VALUES ('samK1m', '4y9ns48', 2, '샘킴', '양식', 1, NULL);
INSERT INTO DBmember (id, pass, memtype, name, luvcook, cnt, aller) VALUES ('sukhc', 'fhivb4', 2, '최현석', '양식', 0, '갑각류');
INSERT INTO DBmember (id, pass, memtype, name, luvcook, cnt, aller) VALUES ('kh234', 'brty482', 2, '김훈이', '한식', 0, NULL);
INSERT INTO DBmember (id, pass, memtype, name, luvcook, cnt, aller) VALUES ('100jong1', 'wde902', 2, '백종원', '한식', 1, NULL);
INSERT INTO DBmember (id, pass, memtype, name, luvcook, cnt, aller) VALUES ('le5kang', 'vdj642d', 2, '강레오', '양식', 1, NULL);
INSERT INTO DBmember (id, pass, memtype, name, luvcook, cnt, aller) VALUES ('wordwk', 'svj238gg', 2, '에드워드 권', '양식', 1, '유제품류');
