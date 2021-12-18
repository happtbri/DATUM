<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>레시피</title>
		<link rel="shortcut icon" type="image⁄x-icon" href="./img/YO.jpg">
        <link rel="stylesheet" type="text/css" href="./css/common.css">
        <link rel="stylesheet" type="text/css" href="./css/board.css?after">
    </head>
    <body>
        <header>
            <?php include "header.php";?>
        </header>  
        <section>
	        <div id="main_img_bar">
                <img src="./img/main_img.png">
            </div>
        	<div id="board_box">
	        <h3>
	    	    게시판 > 
            <?php
            $catagory = $_GET['catgo'];
            $search_con = $_GET['search'];

            $mode = 0;
            if($catagory == 'title')
                $catname = '제목 > ';
            else if($catagory == 'writer_name')
                $catname = '작성자 > ';
            else if($catagory == 'content')
                $catname = '내용 > ';
            else if($catagory == 'chef'){
                $catname = '요리사 정보 > ';
                $mode = 1;
            }
            else if($catagory == 'allergy'){
                $catname = '알러지 정보 > ';
                $mode = 2;
            }
            else if($catagory == 'alcohol'){
                $catname = '주종 정보 > ';
                $mode = 3;
            }
            echo $catname;
            echo $search_con;
            ?>
            검색 결과
            </h3>
    
            <ul id="board_list">
            <?php
                if($mode==0){
				    echo "<li>
					<span class='col1'>번호</span>
					<span class='col2'>제목</span>
					<span class='col3'>작성자</span>
					<span class='col4'>작성자 타입</span>
					<span class='col5'>등록일</span>
					<span class='col6'>평점</span>
				</li>";
                }
                else if($mode == 1){
                    echo "<li>
					<span class='col1'>번호</span>
					<span class='col2'>이름</span>
					<span class='col3'>분야</span>
					<span class='col4'>경력</span>
					<span class='col5'>운영중인 가게</span>
				</li>";
                }
                else if($mode == 2){
                    echo "<li>
					<span class='col1'>분류</span>
					<span class='col2'>소분류</span>
					<span class='col3'>대체식품</span>
					<span class='col4'>관련 음식 예</span>
				</li>";
                }
                else if($mode == 3){
                    echo "<li>
					<span class='col1'>번호</span>
					<span class='col2'>이름</span>
					<span class='col3'>주종</span>
					<span class='col4'>도수</span>
					<span class='col5'>원산지</span>
				</li>";
                }
                ?>
<?php
    // 페이지 넘버 = 몇번째 게시글인지 나타내는거임 
    if (isset($_GET["page"]))
		$page = $_GET["page"];
	else
		$page = 1;

    if($mode==0){
        $con = mysqli_connect("localhost", "user1", "12345", "yocom"); // db 연결하는 부분 이거 다같이 통일하자 아이디랑 비번이랑 데베이름 통일!
        $sql = "select * from recipe where $catagory like '%$search_con%' order by num desc"; 
        $search_result = mysqli_query($con, $sql); //recipe테이블
        $total_record = mysqli_num_rows($search_result); // 전체 글 수
        
        $sql = "select * from DBmember"; 
        $member = mysqli_query($con, $sql); //DBmember테이블
        $total_member = mysqli_num_rows($member);

        $scale = 10;  // 한페이지에 표시되는 게시글 수

        // 전체 페이지 수($total_page) 계산 
        if ($total_record % $scale == 0)     
            $total_page = floor($total_record/$scale); //반올림 안한다~
        else
            $total_page = floor($total_record/$scale) + 1; 
    
        // 표시할 페이지($page)에 따라 $start 계산  
        $start = ($page - 1) * $scale;      

        $number = $total_record - $start;

        for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)
        {
            mysqli_data_seek($search_result, $i);
            // 가져올 레코드로 위치(포인터) 이동
            $row = mysqli_fetch_array($search_result);
            // 하나의 레코드 가져오기
            $num         = $row["num"];
            $id          = $row["writer_id"];
            $name        = $row["writer_name"];
            $title	   = $row["title"];
            $cooktime    =$row["cooktime"];
            $allergy    =$row["allergy"];
            $alcohol     =$row["alcohol"];
            $regist_day  = $row["regist_day"];
            $point       = $row["point"]; //조회수 빼고 평점 표시
            
            for($j=0; $j < $total_member; $j++){

                mysqli_data_seek($member, $j);
                $row2 = mysqli_fetch_array($member);
                
                $id2=$row2["id"];
                $memtype=$row2["memtype"];

                if($id2==$id){  //작성자 id와 같은 회원 찾으면 type지정
                // 회원 타입에 따라 출력
                    if($memtype == 1)
                        $type = "관리자";
                    else if($memtype == 2)
                        $type = "요리사";
                    else if($memtype == 3)
                        $type = "NEW";
                    else if($memtype == 4)
                        $type = "WHITE";
                    else if($memtype == 5)
                        $type = "BRONZE";
                    else if($memtype == 6)
                        $type = "SILVER";
                    else if($memtype == 7)
                        $type = "GOLD";
                    else if($memtype == 8)
                        $type = "DIAMOND";
                }
            }
            echo"<li>
                    <span class='col1'>$number</span>
                    <span class='col2'><a href='All_recipe_view.php?num=$num&page=$page&type=$type'> $title </a></span> <!--레시피 제목에 레시피 보는 php 링크 해둠 -->
                    <span class='col3'>$name</span>
                    <span class='col4'>$type</span>
                    <span class='col5'>$regist_day</span>
                    <span class='col6'>$point</span> <!-- 고민 -->
                </li>";
            $number--;
        }
    }
    else if($mode == 1){
        $con = mysqli_connect("localhost", "user1", "12345", "yocom");
        $sql = "select * from $catagory where name like '%$search_con%' order by num desc"; 
        $search_result = mysqli_query($con, $sql); //recipe테이블
        $total_record = mysqli_num_rows($search_result); // 전체 글 수

        $scale = 10;  // 한페이지에 표시되는 게시글 수

        // 전체 페이지 수($total_page) 계산 
        if ($total_record % $scale == 0)     
            $total_page = floor($total_record/$scale); 
        else
            $total_page = floor($total_record/$scale) + 1; 
    
        // 표시할 페이지($page)에 따라 $start 계산  
        $start = ($page - 1) * $scale;      

        $number = $total_record - $start;

        for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)
        {
            mysqli_data_seek($search_result, $i);
            // 가져올 레코드로 위치(포인터) 이동
            $row = mysqli_fetch_array($search_result);
            // 하나의 레코드 가져오기
            $num         = $row["num"];
            $name        = $row["name"];
            $dept        = $row["dept"];
            $annual      = $row["annual"];
            $restuarant  = $row["restaurant"];
            
            echo"<li>
                    <span class='col1'>$number</span>
                    <span class='col2'>$name</span>
                    <span class='col3'>$dept</span>
                    <span class='col4'>$annual</span>
                    <span class='col5'>$restuarant</span>
                </li>";
            $number--;
        }
    }
    else if($mode == 2){
        $con = mysqli_connect("localhost", "user1", "12345", "yocom"); 
        $sql = "select * from $catagory where big like '%$search_con%' OR small like '%$search_con%'"; 
        $search_result = mysqli_query($con, $sql); //recipe테이블
        $total_record = mysqli_num_rows($search_result); // 전체 글 수

        $scale = 10;  // 한페이지에 표시되는 게시글 수

        // 전체 페이지 수($total_page) 계산 
        if ($total_record % $scale == 0)     
            $total_page = floor($total_record/$scale); 
        else
            $total_page = floor($total_record/$scale) + 1; 
    
        // 표시할 페이지($page)에 따라 $start 계산  
        $start = ($page - 1) * $scale;      

        $number = $total_record - $start;

        for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)
        {
            mysqli_data_seek($search_result, $i);
            // 가져올 레코드로 위치(포인터) 이동
            $row = mysqli_fetch_array($search_result);
            // 하나의 레코드 가져오기
            $big     = $row["big"];
            $small   = $row["small"];
            $sub     = $row["sub"];
            $food    = $row["food"];
            
            echo"<li>
                    <span class='col1'>$big</span>
                    <span class='col2'>$small</span>
                    <span class='col3'>$sub</span>
                    <span class='col4'>$food</span>
                </li>";
            $number--;
        }
    }
    else if($mode == 3){
        $con = mysqli_connect("localhost", "user1", "12345", "yocom"); 
        $sql = "select * from $catagory where kinds like '%$search_con%'"; 
        $search_result = mysqli_query($con, $sql); //recipe테이블
        $total_record = mysqli_num_rows($search_result); // 전체 글 수

        $scale = 10;  // 한페이지에 표시되는 게시글 수

        // 전체 페이지 수($total_page) 계산 
        if ($total_record % $scale == 0)     
            $total_page = floor($total_record/$scale); 
        else
            $total_page = floor($total_record/$scale) + 1; 
    
        // 표시할 페이지($page)에 따라 $start 계산  
        $start = ($page - 1) * $scale;      

        $number = $total_record - $start;

        for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)
        {
            mysqli_data_seek($search_result, $i);
            // 가져올 레코드로 위치(포인터) 이동
            $row = mysqli_fetch_array($search_result);
            // 하나의 레코드 가져오기
            $name            = $row["name"];
            $kinds           = $row["kinds"];
            $alcohol_content = $row["alcohol_content"];
            $origin          = $row["origin"];
            
            echo"<li>
                    <span class='col1'>$number</span>
                    <span class='col2'>$name</span>
                    <span class='col3'>$kinds</span>
                    <span class='col4'>$alcohol_content</span>
                    <span class='col5'>$origin</span>
                </li>";
            $number--;
        }
    }
    mysqli_close($con);
?>
	    	</ul>
			<ul id="page_num"> 	
<?php
	if ($total_page>=2 && $page >= 2)	
	{
		$new_page = $page-1;
		echo "<li><a href='All_recipe_list.php?page=$new_page'>◀ 이전</a> </li>";
	}
	else 
		echo "<li>&nbsp;</li>";

   	// 게시판 목록 하단에 페이지 링크 번호 출력
   	for ($i=1; $i<=$total_page; $i++)
   	{
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<li><b> $i </b></li>";
		}
		else
		{
			echo "<li><a href='All_recipe_list.php?page=$i'> $i </a><li>";
		}
   	}
   	if ($total_page>=2 && $page != $total_page)		
   	{
		$new_page = $page+1;	
		echo "<li> <a href='All_recipe_list.php?page=$new_page'>다음 ▶</a> </li>";
	}
	else 
		echo "<li>&nbsp;</li>";
?>
			</ul> <!-- page -->	    	
			<ul class="buttons">
				<!--검색 기능 추가-->
				<li>
					<div id="search_box">
						<form action="search_result.php" method="get">
							<select name="catgo">
								<option value="title">레시피</option>
								<option value="writer_name">작성자</option>
								<option value="content">내용</option>
								<option value="chef">요리사 정보</option>
								<option value="allergy">알러지 정보</option>
								<option value="alcohol">주종 정보</option>
							</select>
							<input type="text" name="search" size="20" required="required" placeholder="검색"/> <button>검색</button>
						</form>
					</div>
					</li><br><br>

				<li><button onclick="location.href='All_recipe_list.php'">목록</button></li>
				<li>
<?php 
    if($userid) {
?>
					<button onclick="location.href='recipe_form.php'">글쓰기</button> 
<?php
	} else {
?>
					<a href="javascript:alert('로그인 후 이용해 주세요!')"><button>글쓰기</button></a>
<?php
	}
?>
				</li>
			</ul>
	</div> <!-- board_box -->
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
