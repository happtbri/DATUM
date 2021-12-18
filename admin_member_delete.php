<?php
    session_start();
    if (isset($_SESSION["memtype"])) $memtype = $_SESSION["memtype"];
    else $memtype = "";

    if ( $memtype != 1 )
    {
        echo("
            <script>
            alert('관리자가 아닙니다! 회원 삭제는 관리자만 가능합니다!');
            history.go(-1)
            </script>
        ");
                exit;
    }

    $num   = $_GET["num"];

    $con = mysqli_connect("localhost", "user1", "12345", "yocom");
    $sql = "delete from dbmember where num = $num";
    mysqli_query($con, $sql);

    mysqli_close($con);

    echo "
	     <script>
	         location.href = 'admin.php';
	     </script>
	   ";
?>

