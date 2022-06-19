<?php
include('connection.php');

$blogAdi=$_POST['blogName'];

$adminID=$_POST["adminID"];

// blok adından blog id alma.
$blogID = $con->query("select bloglar.blog_id from `bloglar` where baslik = '$blogAdi'");
$sonuc = $blogID->fetch_assoc();
$blogID = $sonuc['blog_id'];

$result1= $con->query("delete from `bloglar` where bloglar.baslik='$blogAdi'");

$result2= $con->query("delete from `yorum` where yorum.blog_id='$blogID'");

if($result1==1 && $result2==1){

      header("Location: https://localhost/coffee-web/admin.php");

}
else{
    echo "Silinemedi!";
}
?>