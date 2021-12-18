<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>관리자 페이지</title>
<link rel="shortcut icon" type="image⁄x-icon" href="./img/YO.jpg">
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/admin.css?after">
</head>
<body> 
<header>
    <?php include "header.php";?>
</header>  
<section>
   	<div id="admin_box">
	    <h3 id="member_title">
	    	관리자 모드 > 회원 관리
		</h3>
	    <ul id="member_list">
				<li>
					<span class="col1">번호</span>
					<span class="col2">아이디</span>
					<span class="col3">이름</span>
					<span class="col4">회원유형</span>
					<span class="col5">게시글 수</span>
					<span class="col7">수정</span>
					<span class="col8">삭제</span>
				</li>
<?php
	$con = mysqli_connect("localhost", "user1", "12345", "yocom");
	$sql = "select * from dbmember order by num desc";
	$result = mysqli_query($con, $sql);
	$total_record = mysqli_num_rows($result); // 전체 회원 수

	$number = $total_record;

   while ($row = mysqli_fetch_array($result))
   {
      $num         = $row["num"];
	  $id          = $row["id"];
	  $name        = $row["name"];
	  $memtype     = $row["memtype"];
      $cnt       = $row["cnt"];
?>
			
		<li>
		<form method="post" action="admin_member_update.php?num=<?=$num?>">
			<span class="col1"><?=$number?></span>
			<span class="col2"><?=$id?></a></span>
			<span class="col3"><?=$name?></span>
			<span class="col4"><input type="text" name="memtype" value="<?=$memtype?>"></span>
			<span class="col5"><input type="text" name="cnt" value="<?=$cnt?>"></span>
			<span class="col7"><button type="submit">수정</button></span>
			<span class="col8"><button type="button" onclick="location.href='admin_member_delete.php?num=<?=$num?>'">삭제</button></span>
		</form>
		</li>	
			
<?php
   	   $number--;
   }
?>
	    </ul>
	    <h3 id="member_title">
	    	관리자 모드 > 레시피 관리
		</h3>
	    <ul id="board_list">
		<li class="title">
			<span class="col1">선택</span>
			<span class="col2">번호</span>
			<span class="col3">이름</span>
			<span class="col4">제목</span>
			<span class="col5">요리 유형</span>
			<span class="col6">내용</span>
			
		</li>
		<form method="post" action="admin_recipe_delete.php">
<?php
	$sql = "select * from recipe order by num desc";
	$result = mysqli_query($con, $sql);
	$total_record = mysqli_num_rows($result); // 전체 글의 수

	$number = $total_record;

   while ($row = mysqli_fetch_array($result))
   {
      $num         = $row["num"];
	  $writer_name  = $row["writer_name"];
	  $title     = $row["title"];
	  $type     = $row["type"];
	  $content     = $row["content"];
      
?>
		<li>
			<span class="col1"><input type="checkbox" name="item[]" value="<?=$num?>"></span>
			<span class="col2"><?=$num?></span>
			<span class="col3"><?=$writer_name?></span>
			<span class="col4"><?=$title?></span>
			<span class="col5"><?=$type?></span>
			<span class="col6"><?=$content?></span>

		</li>	
<?php
   	   $number--;
   }
   mysqli_close($con);
?>
				<button type="submit">선택된 글 삭제</button>
			</form>
	    </ul>
	</div> <!-- admin_box -->
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
