<?php      
    setcookie("Id", $currentUserID, time()-3600, "/");
    header("Location: https://localhost/coffee-web/index.php");
?>  