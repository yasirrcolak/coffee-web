<?php
include('connection.php');

$yorumMetni=$_POST['YorumMetni'];

$adminID=$_POST["adminID"];


$result= $con->query("delete from `yorum` where yorum.mesaj='$yorumMetni'");

if($result==1){

      header("Location: https://localhost/coffee-web/admin.php?kullanici=$adminID");

}
else{
    echo "Silinemedi!";
}






/*
include('connection.php');

$kullaniciadi=$_POST['kullaniciAdi'];

$result= $con->query("delete from `kullanici` where kullanici.kullanici_adi='$kullaniciadi'");

// kullaniciya ait tüm yorum ve blogları sil.




*/

?>
