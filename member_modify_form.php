<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>정보수정</title>
<link rel="shortcut icon" type="image⁄x-icon" href="./img/YO.jpg">
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/member.css?after">
<script type="text/javascript" src="./js/member_modify.js?after"></script>
</head>
<body> 
	<header>
    	<?php include "header.php";?>
    </header>
<?php    
   	$con = mysqli_connect("localhost", "user1", "12345", "yocom");
    $sql    = "select * from dbmember where id='$userid'";
    $result = mysqli_query($con, $sql);
    $row    = mysqli_fetch_array($result);

    $pass = $row["pass"];
    $name = $row["name"];

    $memtype  = $row["memtype"];
    $luvcook  = $row["luvcook"];
	$aller  = $row["aller"];

?>
	<section>
		<div id="main_img_bar">
            <img src="./img/main_img.png">
        </div>
        <div id="main_content">
      		<div id="join_box">
          	<form  name="member_form" method="post" action="member_modify.php?id=<?=$userid?>">
			    <h2>회원 정보수정</h2>
    		    	<div class="form id">
				        <div class="col1">아이디</div>
				        <div class="col2">
							<?=$userid?>
				        </div>                 
			       	</div>
			       	<div class="clear"></div>

			       	<div class="form">
				        <div class="col1">비밀번호</div>
				        <div class="col2">
							<input type="password" name="pass" value="<?=$pass?>">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">비밀번호 확인</div>
				        <div class="col2">
							<input type="password" name="pass_confirm" value="<?=$pass?>">
				        </div>                 
			       	</div>
					<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">유형 선택</div>
				        <div class="col2">
							<select name = "memtype" value="<?=$memtype?>">
								<option value='3'>일반</option>
								<option value='2'>요리사</option>
							</select>
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">이름</div>
				        <div class="col2">
							<input type="text" name="name" value="<?=$name?>">
				        </div>                 
			       	</div>
					<div class="clear"></div>
					<div class="form">
				        <div class="col1">관심있는 분야</div>
				        <div class="col2">
							<select name = "luvcook">
							<?php
						    $cook_kind=array('한식','중식','일식','양식');
							for($i=0;$i<count($cook_kind);$i++)
							{
								if($cook_kind[$i]==$luvcook) echo "<option value='$cook_kind[$i]' selected> $cook_kind[$i] </option>";
								else echo "<option value='$cook_kind[$i]'> $cook_kind[$i] </option>";
							}
							?>
							</select>
				        </div>                 
			       	</div>
					<div class="clear"></div>
					<div class="form">
				        <div class="col1">알러지</div>
				        <div class="col2">
					<?php
					$sql = "select big from allergy";
					$result = mysqli_query($con, $sql);
					$total_record = mysqli_num_rows($result);
					
					echo "<select name=\"aller\">";
					echo "<option value=\"NULL\" >없음</option>";
					for($i=0;$i<$total_record;$i++)	
					{
						mysqli_data_seek($result, $i);
						// 가져올 레코드로 위치(포인터) 이동
						$row = mysqli_fetch_array($result);
						// 하나의 레코드 가져오기
						if($row["big"]==$aller){
							echo "<option value=\"{$row["big"]}\" selected>{$row["big"]}</option>";
						}
					else{
						echo "<option value=\"{$row["big"]}\" >{$row["big"]}</option>";
					}
					}
					echo "</select>";	
					?>
				        </div>                 
			       	</div>
			       	
			       	<div class="clear"></div>
			       	<div class="bottom_line"> </div>
			       	<div class="buttons">
	                	<img style="cursor:pointer" src="./img/button_save.gif" onclick="check_input()">&nbsp;
                  		<img id="reset_button" style="cursor:pointer" src="./img/button_reset.gif"
                  			onclick="reset_form()">
	           		</div>
           	</form>
        	</div> <!-- join_box -->
        </div> <!-- main_content -->
	</section> 
	<footer>
    	<?php include "footer.php";?>
    </footer>
</body>
</html>
