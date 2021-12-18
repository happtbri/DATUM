<?php
    $num = $_GET["num"];
    $page = $_GET["page"];

    $subject = $_POST["subject"]; //recipe_modify_form.php 에서 레시피 제목
    $content = $_POST["content"]; //recipe_modify_form.php 에서 레시피 내용
	$cooktime = $_POST["cooktime"]; //recipe_modify_form.php 에서 조리시간
	$type = $_POST["type"]; //recipe_modify_form.php 에서 요리 분류
	
    $allergy = $_POST["allergy_big"]; // 알러지 
	$alcohol=$_POST["alcohol_name"]; // 주류 선택 값
          
    $con = mysqli_connect("localhost", "user1", "12345", "yocom");
    $sql = "update recipe set subject='$subject', content='$content' where num=$num"; 
    mysqli_query($con, $sql);
	$sql = "update recipe set cooktime='$cooktime', type='$type' where num=$num"; 
    mysqli_query($con, $sql);
		$sql = "update recipe set allergy='$allergy', alcohol='$alcohol' where num=$num"; 
    mysqli_query($con, $sql);

    mysqli_close($con);     

    echo "
	      <script>
	          location.href = 'my_recipe_list.php?page=$page';
	      </script>
	  ";
?>
