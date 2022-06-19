<?php
include('connection.php');

$kullaniciadi=$_POST['kullaniciAdi'];
$adminID=$_POST["adminID"];

// kullanıcı adından kullanıcı id alma.
$currentUserID = $con->query("select kullanici.kullanici_id from `kullanici` where kullanici_adi = '$kullaniciadi'");
$sonuc = $currentUserID->fetch_assoc();
$currentUserID = $sonuc['kullanici_id'];

$result1= $con->query("delete from `kullanici` where kullanici.kullanici_adi='$kullaniciadi'");

$result2= $con->query("delete from `yorum` where yorum.kullanici_id='$currentUserID'");

$result3= $con->query("delete from `yorum` where yorum.yazar_id='$currentUserID'");

$result4= $con->query("delete from `bloglar` where bloglar.kullanici_id='$currentUserID'");

// kullaniciya ait tüm yorum ve blogları sil.
if($result1==1 && $result2==1 && $result3==1 && $result4==1){

      header("Location: https://localhost/coffee-web/admin.php");

}
else{
    echo "Silinemedi!";
}
?>