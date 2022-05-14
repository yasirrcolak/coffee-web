<?php
include('connection.php');

$kullaniciadi=$_POST['kullaniciAdi'];
$adminID=$_POST["adminID"];

$result= $con->query("delete from `kullanici` where kullanici.kullanici_adi='$kullaniciadi'");

// kullaniciya ait tüm yorum ve blogları sil.

if($result==1){

      header("Location: https://localhost/coffee-web/admin.php?kullanici=$adminID");

}
else{
    echo "Silinemedi!";
}




?>