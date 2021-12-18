<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">

<title>마이페이지</title> 
<link rel="shortcut icon" type="image⁄x-icon" href="./img/YO.jpg">
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">

</head>
<body> 
<header>
    <?php include "header.php";?>
</header>  

   	
	
<section>
	<div id="main_img_bar">
	<img src="./img/main_img.png">
    </div>
    <div id="board_box">
	    <h3 id="board_title">마이페이지</h3>

		<ul style=" list-style-type:square; padding:20px; font-size:18px;">
		<li><a href="recipe_form.php">레시피 작성하기</li>
		
		<li><a href="my_recipe_list.php">내가 쓴 레시피 모아보기</li>
		
		<li><a href="my_like_recipe.php">내가 좋아요한 레시피 모아보기</li>
		</ul>
	</div> <!-- board_box -->
</section> 

<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
