<?php
    session_start();
    if (isset($_SESSION["memtype"])) $memtype = $_SESSION["memtype"];
    else $memtype = "";

    if ( $memtype != 1 )
    {
        echo("
            <script>
            alert('관리자가 아닙니다! 회원정보 수정은 관리자만 가능합니다!');
            history.go(-1)
            </script>
        ");
        exit;
    }

    $num   = $_GET["num"];
    $memtype = $_POST["memtype"];
    $cnt = $_POST["cnt"];

    $con = mysqli_connect("localhost", "user1", "12345", "yocom");
    $sql = "update dbmember set memtype=$memtype, cnt=$cnt where num=$num";
    mysqli_query($con, $sql);

    mysqli_close($con);

    echo "
	     <script>
	         location.href = 'admin.php';
	     </script>
	   ";
?>

