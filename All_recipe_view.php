<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">

<title>레시피</title>
<link rel="shortcut icon" type="image⁄x-icon" href="./img/YO.jpg">
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css?after">
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
			게시판 > 내용보기
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

	$num  = $_GET["num"]; //All_recipe_list에서 페이지 일련번호 전달받음
	$page  = $_GET["page"]; //All_recipe_list에서 페이지 번호 전달받음
	$type = $_GET["type"]; //All_recipe_list에서 회원 등급 전달받음

	$con = mysqli_connect("localhost", "user1", "12345", "yocom"); 
	$sql = "select * from recipe where num=$num";
	$result = mysqli_query($con, $sql);

	$row = mysqli_fetch_array($result);

	$id         = $row["writer_id"];
	$name       = $row["writer_name"];
	$regist_day = $row["regist_day"];
	$title      = $row["title"];
	$cooktime   =$row["cooktime"];
	$allergy     =$row["allergy"];
	$alcohol    =$row["alcohol"];
	$content    = $row["content"];
	$point        = $row["point"];

	$content = str_replace(" ", "&nbsp;", $content); // 공백  html 상 기호로 바꿈
	$content = str_replace("\n", "<br>", $content);  // 줄바꿈  html 상 태그로 바꿈

	//$new_hit = $hit + 1;
	//$sql = "update board set hit=$new_hit where num=$num";   
	//mysqli_query($con, $sql);
?>		
	    <ul id="view_content">
			<li>
				<span class="col1"><b>제목 :</b> <?=$title?></span>
				<span class="col2"><?=$name?> | <?=$type?> | <?=$regist_day?> | [조리시간]: <?=$cooktime?> | [알러지]: <?=$allergy?> | [어울리는 술]: <?=$alcohol?></span>
			</li>
			<li>
				<?=$content?>
			</li>		
	    </ul>
	    <ul class="buttons">
		<li><button style="background:#FFC0CB" onclick="location.href='recipe_like_insert.php?num=<?=$num?>&page=<?=$page?>&id=<?=$userid?>'">좋아요</button></li> <!--좋아용-->
				<li><button onclick="location.href='All_recipe_list.php?page=<?=$page?>'">목록</button></li>
				
		</ul>
	</div> <!-- board_box -->
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
