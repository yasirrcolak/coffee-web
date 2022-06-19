<?php
include('connection.php');

$yorumMetni=$_POST['YorumMetni'];

$adminID=$_POST["adminID"];

$result= $con->query("delete from `yorum` where yorum.mesaj='$yorumMetni'");

if($result==1){
    header("Location: https://localhost/coffee-web/admin.php");
}
else{
    echo "Silinemedi!";
}
?>
