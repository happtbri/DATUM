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
                    alert('마이페이지는 로그인 후 이용해 주세요!');
                    history.go(-1)
                    </script>
        ");
                exit;
    }
	else
	{
	//마이페이지의 레시피 목록으로 가기
	echo "
	   <script>
	    location.href = 'my_page.php'; 
	   </script>
	";
	}
?>

  
