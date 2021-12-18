<meta charset="utf-8">
<?php
    $id   = $_POST["id"];
    $pass = $_POST["pass"];
    $name = $_POST["name"];
    $memtype  = $_POST["memtype"];
    $luvcook  = $_POST["luvcook"];
	$aller  = $_POST["aller"];
	
	$annual  = $_POST["annual"];
	$restaurant  = $_POST["restaurant"];

    $con = mysqli_connect("localhost", "user1", "12345", "yocom");

	$sql = "select * from DBmember order by num desc"; 
	$dbmemeber = mysqli_query($con, $sql); //DBmember 테이블
	$num = mysqli_num_rows($dbmemeber); // 전체 레코드 수
	$num = $num + 1;

	if($aller == 'NULL'){
		$sql2 = "insert into DBmember(num, id, pass, memtype, name, luvcook, cnt, aller) ";
		$sql2 .= "values($num, '$id', '$pass', '$memtype', '$name', '$luvcook', 0, NULL)";

		mysqli_query($con, $sql2);  // $sql 에 저장된 명령 실행
	}
	else{
		$sql2 = "insert into DBmember(num, id, pass, memtype, name, luvcook, cnt, aller) ";
		$sql2 .= "values($num, '$id', '$pass', '$memtype', '$name', '$luvcook', 0, '$aller')";

		mysqli_query($con, $sql2);  // $sql 에 저장된 명령 실행
	}

	if($memtype == 2){
		$sql3 = "insert into chef(num, name, dept, annual, restaurant)";
		$sql3 .= "values($num, '$name', '$luvcook', '$annual', '$restaurant')";
		mysqli_query($con, $sql3);
	}
	
    mysqli_close($con);     

    echo "
	      <script>
	          location.href = 'main.php';
	      </script>
	  ";
?>

   
