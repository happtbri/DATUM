<?php

    $num   = $_GET["num"];
    $page   = $_GET["page"];

    $con = mysqli_connect("localhost", "user1", "12345", "yocom");
    $sql = "select * from recipe where num = $num";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
	$writer_id = $row["writer_id"];
    $sql = "delete from recipe where num = $num";
    mysqli_query($con, $sql);
	
	$sql = "select memtype,cnt from DBmember  where id='$writer_id';";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	$writer_type = $row["memtype"];
	$new_cnt = $row["cnt"]-1;
	
	//회원 등급
	if($writer_type>2){
	if ($new_cnt>=100)
		$writer_type=8; //다이아몬드 등급
	elseif ($new_cnt>=50)
	    $writer_type=7; //골드 등급
	elseif ($new_cnt>=30)
	    $writer_type=6; //실버 등급
	elseif ($new_cnt>=10)
	    $writer_type=5; //브론즈 등급
	elseif ($new_cnt>=5)
	    $writer_type=4; //화이트 등급
	elseif ($new_cnt>=0)
	    $writer_type=3; //신규 등급
	}
	$sql = "update DBmember set cnt=$new_cnt where id='$writer_id';";
	mysqli_query($con, $sql);
		$sql = "update DBmember set memtype=$writer_type where id='$writer_id';";
	mysqli_query($con, $sql);
	
	
    mysqli_close($con);

    echo "
	     <script>
	         location.href = 'my_recipe_list.php?page=$page';
	     </script>
	   ";
?>

