<meta charset="utf-8">
<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"]; //로그인 한 아이디와 이름 가져옴
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";

    if ( !$userid ) //로그인 여부 검사
    {
        echo("
                    <script>
                    alert('게시판 글쓰기는 로그인 후 이용해 주세요!');
                    history.go(-1)
                    </script>
        ");
                exit;
    }

    $subject = $_POST["subject"]; //recipe_form2.php 에서 레시피 제목
    $content = $_POST["content"]; //recipe_form2.php 에서 레시피 내용
	$cooktime = $_POST["cooktime"]; //recipe_form2.php 에서 조리시간
	$type = $_POST["type"]; //recipe_form2.php 에서 요리 분류
	
    $allergy = $_POST["allergy_big"]; // 알러지 
	$alcohol=$_POST["alcohol_name"]; // 주류 선택 값

	$subject = htmlspecialchars($subject, ENT_QUOTES); //문자열에서 특정한 특수 문자를 HTML 엔티티로 변환하는 함수
	$content = htmlspecialchars($content, ENT_QUOTES);

	$regist_day = date("Y-m-d");  // 현재의 '년-월-일-시-분'을 저장
	
	$con = mysqli_connect("localhost", "user1", "12345", "yocom"); 
	$sql = "select memtype,cnt from DBmember  where id='$userid';";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	$writer_type = $row["memtype"];
	$new_cnt = $row["cnt"]+1;

        $sql = "insert into recipe(title, writer_id, writer_name, writer_type, regist_day, type, cooktime, allergy, alcohol, content) ";  
	$sql .= "values('$subject','$userid', '$username', '$writer_type','$regist_day','$type','$cooktime','$allergy','$alcohol', '$content');";
	mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행

	
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
	$sql = "update DBmember set cnt=$new_cnt where id='$userid';";
	mysqli_query($con, $sql);
		$sql = "update DBmember set memtype=$writer_type where id='$userid';";
	mysqli_query($con, $sql);

	mysqli_close($con);                // DB 연결 끊기
	//마이페이지의 레시피 목록으로 가기
	echo "
	   <script>
	    location.href = 'recipe_form.php'; 
	   </script>
	";
?>
