<?php
include('connection.php');
$name = $_POST['kullaniciAdi'];
$password = $_POST['sifre'];
$tip = $_POST['tip'];


//to prevent from mysqli injection  
$name = stripcslashes($name);
$password = stripcslashes($password);
$username = mysqli_real_escape_string($con, $name);
$password = mysqli_real_escape_string($con, $password);


// blog id yi bul son blog id ye bir ekle.
$maxid = $con->query("select MAX(kullanici_id) from `kullanici`");
$maxid = $maxid->fetch_assoc();
$maxid = $maxid['MAX(kullanici_id)'];
$maxid = $maxid + 1;



$sql = "INSERT INTO `kullanici`(`kullanici_id`, `kullanici_adi`, `sifre`, `tip`) VALUES ('$maxid','$username','$password','$tip')";
$result = mysqli_query($con, $sql);



if ($result == 1) {
    header("Location: https://localhost/coffee-web/login.html");

} else {
    echo "<h1> Hata! Bi şey oldu? </h1>";
}
