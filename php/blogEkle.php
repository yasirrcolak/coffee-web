<?php
include('connection.php');
$resim = $_POST['blogResim'];
$baslik = $_POST['blogBaslik'];
$icerik = $_POST['blogIcerik'];

$tarihSaat = date("Y-m-d h:i:s"); // bilgiyi al ! dene çalışıyor mu diye.

$currentUserID = 3; // id yi bul bir yerden artık!

// resim için gelen değeri kontrol et eğer varsayılan ise atama yap.

// blog id yi bul son blog id ye bir ekle.

$sql = "INSERT INTO `bloglar`(`blog_id`, `resim`, `baslik`, `icerik`, `kullanici_id`, `tarihSaat`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]')";
$result = mysqli_query($con, $sql);

if ($result == 1) {
    echo "<h1><center> Kayıt Başarılı <center></h1>";
    header("Location: https://localhost/coffee-web/login.html");
} else {
    echo "<h1> Hata! Bi şey oldu? </h1>";
}
