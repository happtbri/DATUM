<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>레시피 수정</title>
<link rel="shortcut icon" type="image⁄x-icon" href="./img/YO.jpg">
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css?after">
<script>
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
	    		내 레시피 > 수정하기
		</h3>
<?php
	$num  = $_GET["num"];
	$page = $_GET["page"];
	
	$con = mysqli_connect("localhost", "user1", "12345", "yocom");
	$sql = "select * from recipe where num=$num";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	$name       = $row["writer_name"];
	$cooktime       = $row["cooktime"];
	$allergy=$row["allergy"];
	$alcohol=$row["alcohol"];
	$subject    = $row["title"];
	$content    = $row["content"];		
	$type    = $row["type"];
?>
	    <form  name="recipe_form" method="post" action="recipe_modify.php?num=<?=$num?>&page=<?=$page?>" enctype="multipart/form-data">
	    	 <ul id="recipe_form">
				<li>
					<span class="col1">이름 : </span>
					<span class="col2"><?=$name?></span>
				</li>		
	    		<li>
	    			<span class="col1">제목 : </span>
	    			<span class="col2"><input name="subject" type="text" value="<?=$subject?>"></span>
	    		</li>	    
				<li>
	    			<span class="col1">요리 분류 : </span>
	    			<span class="col2"><select name="type">
					<?php
						    $cook_kind=array('한식','중식','일식','양식');
							for($i=0;$i<count($cook_kind);$i++)
							{
								if($cook_kind[$i]==$type) echo "<option value='$cook_kind[$i]' selected> $cook_kind[$i] </option>";
								else echo "<option value='$cook_kind[$i]'> $cook_kind[$i] </option>";
							}
							?>
					</select></span>
	    		</li>
				<li>
	    			<span class="col1">조리시간 : </span>
	    			<span class="col2"><input name="cooktime" type="text" value='<?=$cooktime?>'></span>
	    		</li>
				<li>
	    			<span class="col1">알러지 : </span>
	    			<span class="col2">
					<?php
					$sql = "select big from allergy";
					$result = mysqli_query($con, $sql);
					$total_record = mysqli_num_rows($result);
					
					echo "<select name=\"allergy_big\">";
					for($i=0;$i<$total_record;$i++)	
					{
						mysqli_data_seek($result, $i);
						// 가져올 레코드로 위치(포인터) 이동
						$row = mysqli_fetch_array($result);
						// 하나의 레코드 가져오기
						if($row["big"]==$allergy){
							echo "<option value=\"{$row["big"]}\" selected>{$row["big"]}</option>";
						}
					else{
						echo "<option value=\"{$row["big"]}\" >{$row["big"]}</option>";
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
					$sql = "select kinds from alcohol where name='$alcohol';";
					$result = mysqli_query($con, $sql);
					$row = mysqli_fetch_array($result);
					$kinds=$row["kinds"];
					echo $kinds;
					echo ">";
					$sql = "select name from alcohol where kinds='$kinds';";
					$result1 = mysqli_query($con, $sql);
					$total_record = mysqli_num_rows($result1);
					
					echo "<select name=\"alcohol_name\">";
					for($i=0;$i<$total_record;$i++)	
					{
						mysqli_data_seek($result1, $i);
						// 가져올 레코드로 위치(포인터) 이동
						$row = mysqli_fetch_array($result1);
						// 하나의 레코드 가져오기
					echo "<option value=\"{$row["name"]}\" selected>{$row["name"]}</option>";
					}
					echo "</select>";	
					?>
	    			</span>			
	    		</li>
	    		<li id="text_area">	
	    			<span class="col1">내용 : </span>
	    			<span class="col2">
	    				<textarea name="content"><?=$content?></textarea>
	    			</span>
	    		</li>
	    	    </ul>
	    	<ul class="buttons">
				<li><button type="button" onclick="check_input()">수정하기</button></li>
				<li><button type="button" onclick="location.href='my_recipe_list.php?page=<?=$page?>'">목록</button></li>
			</ul>
	    </form>
	</div> <!-- board_box -->
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
