<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";
?>      
        <div id="top">
            <h3>
                <a href="main.php">YO!COM</a>
            </h3>
            <ul id="top_menu">  
<?php
    if(!$userid) {
?>                
                <li><a href="member_form.php">회원 가입</a> </li>
                <li> | </li>
                <li><a href="login_form.php">로그인</a></li>
<?php
    } else {
      $con = mysqli_connect("localhost", "user1", "12345", "yocom");
       $sql = "select memtype from DBmember  where id='$userid';";
       $result = mysqli_query($con, $sql);
       $row = mysqli_fetch_array($result);
       $memtype = $row["memtype"];
      if($memtype==1) $logged = $username."(".$userid.")님[Level:관리자]";
      elseif($memtype==2) $logged = $username."(".$userid.")님[Level:요리사]";
      elseif($memtype==3) $logged = $username."(".$userid.")님[Level:New]";
      elseif($memtype==4) $logged = $username."(".$userid.")님[Level:White]";
      elseif($memtype==5) $logged = $username."(".$userid.")님[Level:Bronze]";
      elseif($memtype==6) $logged = $username."(".$userid.")님[Level:Silver]";
       elseif($memtype==7) $logged = $username."(".$userid.")님[Level:Gold]";
      elseif($memtype==8) $logged = $username."(".$userid.")님[Level:Diamond]";
      ?>
                <li><?=$logged?> </li>
                <li> | </li>
                <li><a href="logout.php">로그아웃</a> </li>
                <li> | </li>
                <li><a href="member_modify_form.php">정보 수정</a></li>
<?php
    if($memtype==1) {
?>
                <li> | </li>
                <li><a href="admin.php">관리자 모드</a></li>
<?php
    }
   }
?>
            </ul>
        </div>
        <div id="menu_bar">
            <ul>  
                <li><a href="main.php">HOME</a></li>
                <li><a href="log_check.php">마이페이지</a></li>                                
                <li><a href="All_recipe_list.php">레시피</a></li>
            </ul>
        </div>