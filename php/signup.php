<?php      
    include('connection.php');  
    $name = $_POST['kullaniciAdi'];  
    $password = $_POST['sifre'];  
      
        $maxid = $con->query("select * from `kullanici`");

        //to prevent from mysqli injection  
        $name = stripcslashes($name);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $name);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $maxid = $maxid->num_rows + 1;

        $sql = "INSERT INTO `kullanici`(`kullanici_id`, `kullanici_adi`, `sifre`, `tip`) VALUES ('$maxid->num_rows','$username','$password','K')";  
        $result = mysqli_query($con, $sql);  
        
        if($result == 1){  
            echo "<h1><center> Kayıt Başarılı <center></h1>"; 
            header("Location: https://localhost/coffee-web/login.html");
        }  
        else{  
            echo "<h1> Hata! Bi şey oldu? </h1>";  
        }     
        
?>  