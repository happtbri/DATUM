<?php
  session_start();
  unset($_SESSION["userid"]);
  unset($_SESSION["username"]);
  unset($_SESSION["memtype"]);
  unset($_SESSION["cnt"]);
  
  echo("
       <script>
          location.href = 'main.php';
         </script>
       ");
?>
