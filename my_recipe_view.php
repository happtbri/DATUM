<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>레시피 내용 보기</title>
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
	    <h3 class="title">
			내 레시피 > 레시피 내용보기
		</h3>
<?php

    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"]; //로그인 한 아이디와 이름 가져옴
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";

    if ( !$userid ) //로그인 여부 검사
    {
        echo("
                    <script>
                    alert('게시판 보기는 로그인 후 이용해 주세요!');
                    history.go(-1)
                    </script>
        ");
                exit;
    }

	$num  = $_GET["num"];
	$page  = $_GET["page"];

	$con = mysqli_connect("localhost", "user1", "12345", "yocom");
	$sql = "select * from recipe where num=$num";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	
	$id      = $row["writer_id"];
	$name      = $row["writer_name"];
	$type      = $row["type"];
	$regist_day = $row["regist_day"];
	$cooktime      = $row["cooktime"];
	$allergy = $row["allergy"];
	$alcohol      = $row["alcohol"];
	$subject    = $row["title"];
	$content    = $row["content"];
	$point          = $row["point"];

	$content = str_replace(" ", "&nbsp;", $content);
	$content = str_replace("\n", "<br>", $content);
	
	//좋아요 표시 어케할지
	//$new_hit = $point + 1;
	//$sql = "update board set point=$new_hit where num=$num";   
	//mysqli_query($con, $sql);
?>		
	    <ul id="view_content">
			<li>
				<span class="col1"><b>제목 :</b> <?=$subject?></span>
				<span class="col2"><?=$name?> | <?=$type?> | <?=$regist_day?> | [조리시간]: <?=$cooktime?> | [알러지]: <?=$allergy?> | [어울리는 술]: <?=$alcohol?></span>	
			
			</li>

			<li>
				<?=$content?>
			</li>
	    </ul>
	    <ul class="buttons">
		        <li><button style="background:#FFC0CB" onclick="location.href='recipe_like_insert.php?num=<?=$num?>&page=<?=$page?>&id=<?=$userid?>'">좋아요</button></li> <!--좋아용-->
				<li><button onclick="location.href='my_recipe_list.php?page=<?=$page?>'">목록</button></li>
				<li><button onclick="location.href='recipe_modify_form.php?num=<?=$num?>&page=<?=$page?>'">수정</button></li>
				<li><button onclick="location.href='recipe_delete.php?num=<?=$num?>&page=<?=$page?>'">삭제</button></li>
				<li><button onclick="location.href='recipe_form.php'">글쓰기</button></li>
		</ul>
	</div> <!-- board_box -->
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
