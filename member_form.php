<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>회원가입</title>
<link rel="shortcut icon" type="image⁄x-icon" href="./img/YO.jpg">
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/member.css?after">
<script>
   function check_input()
   {
      if (!document.member_form.id.value) {
          alert("아이디를 입력하세요!");    
          document.member_form.id.focus();
          return;
      }

      if (!document.member_form.pass.value) {
          alert("비밀번호를 입력하세요!");    
          document.member_form.pass.focus();
          return;
      }

      if (!document.member_form.pass_confirm.value) {
          alert("비밀번호확인을 입력하세요!");    
          document.member_form.pass_confirm.focus();
          return;
      }

      if (!document.member_form.name.value) {
          alert("이름을 입력하세요!");    
          document.member_form.name.focus();
          return;
      }

      if (!document.member_form.memtype.value) {
          alert("유형을 선택하세요!");    
          document.member_form.memtype.focus();
          return;
      }

      if (!document.member_form.luvcook.value) {
          alert("관심있는 분야를 선택하세요!");    
          document.member_form.luvcook.focus();
          return;
      }
	  

      if (document.member_form.pass.value != 
            document.member_form.pass_confirm.value) {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!");
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }

      document.member_form.submit();
   }

function check_type()
{
	var check=document.member_form.memtype.value;
	if(check==3)
	{
		alert("요리 경력 및 운영 식당은 요리사 회원만 입력해주세요."); 
		document.member_form.annual.value=0;
		document.member_form.restaurant.value='';
	}
}
   function reset_form() {
      document.member_form.id.value = "";  
      document.member_form.pass.value = "";
      document.member_form.pass_confirm.value = "";
      document.member_form.name.value = "";
      document.member_form.id.focus();
      return;
   }

   function check_id() {
     window.open("member_check_id.php?id=" + document.member_form.id.value,
         "IDcheck",
          "left=700,top=300,width=450,height=200,scrollbars=no,resizable=yes");
   }
</script>
</head>
<body> 
	<header>
    	<?php include "header.php";?>
    </header>
	
	<section>
		<div id="main_img_bar">
            <img src="./img/main_img.png">
        </div>
        <div id="main_content">
      		<div id="join_box">
          	<form  name="member_form" method="post" action="member_insert.php">
			<br>
			    <h2>회원 가입</h2>
    		    	<div class="form id">
				        <div class="col1">아이디</div>
				        <div class="col2">
							<input type="text" name="id">
				        </div>  
				        <div class="col3">
				        	<a href="#"><img src="./img/check_id.gif" 
				        		onclick="check_id()"></a>
				        </div>                 
			       	</div>
			       	<div class="clear"></div>

			       	<div class="form">
				        <div class="col1">비밀번호</div>
				        <div class="col2">
							<input type="password" name="pass">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">비밀번호 확인</div>
				        <div class="col2">
							<input type="password" name="pass_confirm">
				        </div>                 
			       	</div>
					<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">유형 선택</div>
				        <div class="col2">
							<select name = "memtype">
								<option value='3'>일반</option>
								<option value='2'>요리사</option>
							</select>
				        </div>
					</div>
						
						<div class="form">
						<div class="col1">요리 경력</div>
						<div class="col2">
							<input type="number" style="width:60px" name="annual" min="0"  onclick="check_type()">
						</div>
						</div>
						
						<div class="form">
						<div class="col1">운영 식당</div>
						<div class="col2">
							<input type="text" name="restaurant" placeholder="요리사인 경우만 작성" onclick="check_type()">
						</div>
						</div>
						
			       	
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">이름</div>
				        <div class="col2">
							<input type="text" name="name">
				        </div>                 
			       	</div>
					<div class="clear"></div>
					<div class="form">
				        <div class="col1">관심있는 분야</div>
				        <div class="col2">
							<select name = "luvcook">
								<option value='한식'>한식</option>
								<option value='양식'>양식</option>
								<option value='일식'>일식</option>
								<option value='중식'>중식</option>
							</select>
				        </div>                 
			       	</div>
					<div class="clear"></div>
					<div class="form">
				        <div class="col1">알러지</div>
				        <div class="col2">
							<select name = "aller">
								<option value='NULL'>없음</option>
								<option value='갑각류'>갑각류</option>
								<option value='견과류'>견과류</option>
								<option value='생선류'>생선류</option>
								<option value='과채류'>과채류</option>
								<option value='과일류'>과일류</option>
								<option value='난류'>난류</option>
								<option value='육류'>육류</option>
								<option value='밀가루류'>밀가루류</option>
								<option value='유제품류'>유제품류</option>
							</select>
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
	</section> <br><br><br><br><br><br>
	<footer>
    	<?php include "footer.php";?>
    </footer>
</body>
</html>

