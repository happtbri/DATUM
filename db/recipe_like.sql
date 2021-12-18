/*좋아요 */
CREATE TABLE recipe_like(
    	recipe_num int not null,
   	mem_id char(20) not null,
	FOREIGN KEY (recipe_num) REFERENCES recipe(num) ON DELETE CASCADE ON UPDATE CASCADE
);