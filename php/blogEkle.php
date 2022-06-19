<?php
include('connection.php');

// blog ekleme sayfasından gelen değerler
$currentUserName = $_POST["blogYazarName"];
$resim = $_POST["blogResim"];
$baslik = $_POST["blogBaslik"];
$icerik = $_POST["blogIcerik"];

// kullanıcı adından kullanıcı id alma.
$currentUserID = $con->query("select kullanici.kullanici_id from `kullanici` where kullanici_adi = '$currentUserName'");
$sonuc = $currentUserID->fetch_assoc();
$currentUserID = $sonuc['kullanici_id'];

// tarih saat bilgisi. 

date_default_timezone_set('Europe/Istanbul');
$tarihSaat= date("Y-m-d H:i:s"); // ayarlı zaman

// resim için gelen değeri kontrol et eğer varsayılan ise atama yap.
if ($resim == "Varsayılan blog resmi...") {
    $resim = "b1.jpg"; // or b2.jpg 
}

// blog id yi bul son blog id ye bir ekle.
$maxid = $con->query("select MAX(blog_id) from `bloglar`");
$maxid = $maxid->fetch_assoc();
$maxid = $maxid['MAX(blog_id)'];
$maxid = $maxid + 1;

// veritabanına blog eklemesi
$sql = "INSERT INTO `bloglar`(`blog_id`, `resim`, `baslik`, `icerik`, `kullanici_id`, `tarihSaat`) VALUES ('$maxid','$resim','$baslik','$icerik','$currentUserID','$tarihSaat')";
$result = mysqli_query($con, $sql);

if ($result == 1) {
    echo "<h1><center> Kayıt Başarılı <center></h1>";

    header("Location: https://localhost/coffee-web/bloglar.php");
} else {
    echo "<h1> Hata! Bi şey oldu? </h1>";
}
?>