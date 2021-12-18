        <div id="main_img_bar">
            <img src="./img/main_img.png">
        </div><br><br><br><br>
        <div id="main_content">
            <div id="latest">
                <h4>최근 게시글</h4>
                <ul>
<!-- 최근 게시 글 DB에서 불러오기 -->
<?php
    $con = mysqli_connect("localhost", "user1", "12345", "yocom");
    $sql = "select * from recipe order by regist_day desc limit 6"; //board
    $result = mysqli_query($con, $sql);

    if (!$result)
        echo "게시글 recipe 테이블이 생성 전이거나 아직 게시글이 없습니다!";
    else
    {
        while( $row = mysqli_fetch_array($result) )
        {
            //$regist_day = substr($row["regist_day"], 0, 10);
?>
                <li>
                    <span><?=$row["title"]?></span>
                    <span><?=$row["writer_id"]?></span>
                    <span><?=$row["regist_day"]?></span>
                </li>
<?php
        }
    }
?>			</ul> 
            </div>
            <div id="point_rank">
                <h4>평점 랭킹</h4>
                <ul>
<!-- 포인트 랭킹 표시하기 -->
<?php
    $rank = 1;
    $sql = "select * from recipe order by point desc limit 6";
    $result = mysqli_query($con, $sql);
	$n = 0; 
	
    if (!$result)
        echo "recipe 테이블이 생성 전이거나 아직 게시글이 없습니다!";
    else
    {
        while( $row = mysqli_fetch_array($result) )
        {	$n++;
            $point  = $row["point"];        
            $title    = $row["title"];
            $type = $row["type"];
			$writer_type = $row["writer_type"];
            //$name = mb_substr($name, 0, 1)." * ".mb_substr($name, 2, 1);
			
			if ($writer_type==3){
				$kk = '일반회원';
			}elseif($writer_type==2){
				$kk = '요리사';
			}elseif($writer_type==1){
				$kk = '관리자';
			}else{
				$kk = '알 수 없음';
			}
?>			
                <li>
                    <?=$n?> : 
					<span style="width:150px;"><?=$title?></span>
					<span style="width:50px;"><?=$type?></span>
					<span style="width:120px;"><?=$kk?>레시피</span>
                </li>
<?php
            $rank++;
        }
    }

    mysqli_close($con);
?>
                </ul>
            </div>
        </div>
