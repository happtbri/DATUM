<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">

<title>레시피 작성</title> 
<link rel="shortcut icon" type="image⁄x-icon" href="./img/YO.jpg">
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
<script>
/*폼에 입력 됐는지 확인 ->  null이면 오류메시지 출력*/
  function check_input() { 
      if (!document.recipe_form.subject.value)
      {
          alert("제목을 입력하세요!");
          document.recipe_form.subject.focus();
          return;
      }
      if (!document.recipe_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.recipe_form.content.focus();
          return;
      }
      document.recipe_form.submit();
   }

</script>
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
	    <h3 id="board_title">
	    		마이페이지 > 레시피 작성
		</h3>
		<!--게시판 글쓰기 양식 부분-->
	    <form  name="recipe_form" method="post" action="recipe_insert.php" enctype="multipart/form-data"> <!--글작성한게 recipe_insert.php 여기로 넘어감 -->
	    	 <ul id="recipe_form">
				<li>
					<span class="col1">아이디 : </span>
					<span class="col2"><?=$userid?></span> <!-- 현재 로그인한 user id를 받아오는게 더 좋을듯) (수정 완료) -->
				</li>		
	    		<li>
	    			<span class="col1">제목 : </span>
	    			<span class="col2"><input name="subject" type="text" value='<?=$_POST["subject1"]?>'></span>
	    		</li>
								<li>
	    			<span class="col1">요리 분류 : </span>
	    			<span class="col2"><select name="type">
					<option value="한식" selected> 한식</option>
					<option value="중식">중식</option>
					<option value="일식">일식</option>
					<option value="양식">양식</option>
					</select></span>
	    		</li>
				<li>
	    			<span class="col1">조리시간 : </span>
	    			<span class="col2"><input name="cooktime" type="text" value='<?=$_POST["cooktime1"]?>'></span>
	    		</li>
	    		<li>
	    			<span class="col1">알러지 : </span>
	    			<span class="col2">
<?php
					$allergy=$_POST["allergy_big"];
					echo "<select name=\"allergy_big\">";
					echo "<option value=\"NULL\" >없음</option>";
							
						    $aller_kind=array('없음','갑각류','견과류','과일류','과채류','난류','밀가루류','생선류','유제품류','육류');
							for($i=0;$i<count($aller_kind);$i++)
							{
								if($aller_kind[$i]==$allergy)
								{
									if ($aller_kind[$i]=='없음')
										echo "<option value='NULL' selected> 없음 </option>";
									else
										echo "<option value='$aller_kind[$i]' selected> $aller_kind[$i] </option>";
								}
								else {
									if($aller_kind[$i]=='없음')
										echo "<option value='NULL' selected> 없음 </option>";
									else
										echo "<option value='$aller_kind[$i]'> $aller_kind[$i] </option>";
								}
							}
							
					echo "</select>";	
					?>
					</span>
	    		</li>			
	    		<li>
	    			<span class="col1">어울리는 주류 : </span>
					<span class="col2">
					<?php
					$big_alcohol=$_POST["alcohol_kinds"];
					echo $big_alcohol;
					echo ">";
					$con = mysqli_connect("localhost", "user1", "12345", "yocom");
					$sql = "select name from alcohol where kinds='$big_alcohol';";
					$result = mysqli_query($con, $sql);
					$total_record = mysqli_num_rows($result);
					
					echo "<select name=\"alcohol_name\">";
					for($i=0;$i<$total_record;$i++)	
					{
						mysqli_data_seek($result, $i);
						// 가져올 레코드로 위치(포인터) 이동
						$row = mysqli_fetch_array($result);
						// 하나의 레코드 가져오기
					echo "<option value=\"{$row["name"]}\" selected>{$row["name"]}</option>";
					}
					echo "</select>";	
					?>
	    			</span>	
					<!--<button type="button">></button>-->			
	    		</li>					
	    		<li id="text_area">	
	    			<span class="col1">내용 : </span>
	    			<span class="col2">
	    				<textarea name="content" ><?=$_POST["content1"]?></textarea>
	    			</span>
	    		</li>
	    	    </ul>
	    	<ul class="buttons">
				<li><button type="button" onclick="check_input()">완료</button></li>
				<li><button type="button" onclick="location.href='my_page.php'">목록</button></li>
			</ul>
	    </form>
	</div> <!-- board_box -->
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
