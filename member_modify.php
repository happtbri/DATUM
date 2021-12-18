<?php
    $id = $_GET["id"];

    $pass = $_POST["pass"];
    $name = $_POST["name"];
    $memtype  = $_POST["memtype"];
    $luvcook  = $_POST["luvcook"];
	$aller  = $_POST["aller"];

          
    $con = mysqli_connect("localhost", "user1", "12345", "yocom");
    $sql = "update dbmember set pass='$pass', name='$name' , memtype='$memtype', luvcook='$luvcook', aller='$aller'";
    $sql .= " where id='$id'";
    mysqli_query($con, $sql);

    mysqli_close($con);     

    echo "
	      <script>
	          location.href = 'main.php';
	      </script>
	  ";
?>

   
