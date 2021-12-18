<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>좋아요한 레시피</title>
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
	    <h3>
	    	마이 페이지 > 좋아요
		</h3>
	    <ul id="board_list">
				<li>
					<span class="col1">번호</span>
					<span class="col2">제목</span>
					<span class="col3">작성자</span>
					<span class="col4">작성자 타입</span>
					<span class="col5">등록일</span>
					<span class="col6">평점</span>
				</li>
<?php
	if (isset($_GET["page"]))
		$page = $_GET["page"];
	else
		$page = 1;
	
	$userid = $_SESSION["userid"];
	//내가 좋요 누른 레시피 테이블 출력
	$con = mysqli_connect("localhost", "user1", "12345", "yocom");
	$sql = "SELECT * FROM recipe natural JOIN (recipe_like) WHERE mem_id = '$userid' and recipe_num=num order by num desc;";
	$result = mysqli_query($con, $sql);
	$total_record = mysqli_num_rows($result); // 전체 글 수

	$sql = "select * from DBmember"; 
	$member = mysqli_query($con, $sql); //DBmember테이블
	$total_member = mysqli_num_rows($member);
	
	$scale = 10;

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      

	$number = $total_record - $start;

   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)
   {
      mysqli_data_seek($result, $i);
      // 가져올 레코드로 위치(포인터) 이동
      $row = mysqli_fetch_array($result);
      // 하나의 레코드 가져오기
	  $num         = $row["num"];
	  $id          = $row["writer_id" ];
	  $name        = $row["writer_name"];
	  $title      = $row["title"];
      $regist_day  = $row["regist_day"];
      $point          = $row["point"];
	  	  
	for($j=0; $j < $total_member; $j++){

	  	mysqli_data_seek($member, $j);
	  	$row2 = mysqli_fetch_array($member);
	 	
		$id2=$row2["id"];
	  	$memtype=$row2["memtype"];

		if($id2==$id){  //작성자 id와 같은 회원 찾으면 type지정
	  	// 회원 타입에 따라 출력
	  		if($memtype == 1)
	  			$type = "관리자";
	  		else if($memtype == 2)
	  			$type = "요리사";
	  		else if($memtype == 3)
	  			$type = "NEW";
	  		else if($memtype == 4)
				$type = "WHITE";
	  		else if($memtype == 5)
				$type = "BRONZE";
	  		else if($memtype == 6)
				$type = "SILVER";
	  		else if($memtype == 7)
				$type = "GOLD";
	  		else if($memtype == 8)
				$type = "DIAMOND";
		}
	}


?>
				<li>
					<span class="col1"><?=$number?></span>
					<span class="col2"><a href="my_like_recipe_view.php?num=<?=$num?>&page=<?=$page?>"><?=$title?></a></span> <!--전체 레시피 뷰로 바꿔야함 -->
					<span class="col3"><?=$name?></span>
					<span class="col4"><?=$type?></span>
					<span class="col5"><?=$regist_day?></span>
					<span class="col6"><?=$point?></span>
				</li>	
<?php
   	   $number--;
   }
   mysqli_close($con);

?>
	    	</ul>
			<ul id="page_num"> 	
<?php
	if ($total_page>=2 && $page >= 2)	
	{
		$new_page = $page-1;
		echo "<li><a href='my_like_recipe.php?page=$new_page'>◀ 이전</a> </li>";
	}		
	else 
		echo "<li>&nbsp;</li>";

   	// 게시판 목록 하단에 페이지 링크 번호 출력
   	for ($i=1; $i<=$total_page; $i++)
   	{
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<li><b> $i </b></li>";
		}
		else
		{
			echo "<li><a href='my_like_recipe.php?page=$i'> $i </a><li>";
		}
   	}
   	if ($total_page>=2 && $page != $total_page)		
   	{
		$new_page = $page+1;	
		echo "<li> <a href='my_like_recipe.php?page=$new_page'>다음 ▶</a> </li>";
	}
	else 
		echo "<li>&nbsp;</li>";
?>
			</ul> <!-- page -->	    	
			<ul class="buttons">
				<li><button onclick="location.href='my_page.php'">목록</button></li>
				<li>

				</li>
			</ul>
	</div> <!-- board_box -->
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
