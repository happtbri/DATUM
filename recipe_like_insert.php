<?php

    $num   = $_GET["num"];
	$page  = $_GET["page"];
	$userid = $_GET["id"];
	
    $con = mysqli_connect("localhost", "user1", "12345", "yocom");
	//좋아요 누른적 있는지 검사
    $sql = "select * from recipe_like where recipe_num =$num";
    $result = mysqli_query($con, $sql);
  	$total_record = mysqli_num_rows($result); // 전체 글 수

	$check=0;
   for ($i=0; $i < $total_record; $i++)
   {
      mysqli_data_seek($result, $i);
      // 가져올 레코드로 위치(포인터) 이동
      $row = mysqli_fetch_array($result);
      // 하나의 레코드 가져오기
	if($userid == $row["mem_id"])
	{
		echo "<script>alert(\"이미 좋아요를 누르셨습니다\");</script>";
		$check=1;
		break;
	}

   }
   if(!$check){
		$sql = "insert into recipe_like (recipe_num,mem_id) values ('$num','$userid')";
		mysqli_query($con, $sql);
		
		$sql = "select point from recipe where num = $num";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
		$new_point=$row["point"]+1;
		
        $sql = "update recipe set point=$new_point where num = $num";
        mysqli_query($con, $sql);
   }
    mysqli_close($con);
	echo "
	   <script>
	    location.href = 'All_recipe_list.php'; 
	   </script>
	";
  
	 
?>
