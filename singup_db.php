<?php
session_start();
require_once("./condb.php");

if(isset($_POST['singup'])){
    $firstname =$_POST['firstname'];
    $lastname =$_POST['lastname'];
    $email =$_POST['email'];
    $password =$_POST['password'];
    $c_password =$_POST['c_password'];
    $urole ='user';

    if(empty($firstname)){
        $_SESSION['error'] = 'ກະລຸນາປ້ອນຊື່';
        header("location:singup.php");
    }elseif(empty($lastname)){
        $_SESSION['error'] = 'ກະລຸນາປ້ອນນາມສະກຸນ';
        header("location:singup.php"); 
    }elseif(empty($email)){
        $_SESSION['error'] = 'ກະລຸນາປ້ອນອີເມວ';
        header("location:singup.php"); 
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $_SESSION['error'] = 'ຮູບແບບອີເມວບໍຖືກຕ້ອງ';
        header("location:singup.php"); 
    }elseif(empty($password)){
        $_SESSION['error'] = 'ກະລຸນາປ້ອນລະຫັດຜ່ານ';
        header("location:singup.php"); 
    }elseif(strlen($_POST['password'])>20 || strlen($_POST['password'])<5){
        $_SESSION['error'] = 'ລະຫັດຜ່ານຕ້ອງມີຄວາມຍາວລະຫວ່າງ 5 -20 ຕົວອັກສອນ';
        header("location:singup.php"); 
    }elseif(empty($c_password)){
        $_SESSION['error'] = 'ກະລຸນາຢືນຢັນລະຫັດຜ່ານ';
        header("location:singup.php"); 
    }elseif($password!=$c_password){
        $_SESSION['error'] = 'ລະຫັດຜ່ານບໍ່ກົງກັນ';
        header("location:singup.php"); 
    }else{
        try{
            $check_mail = $conn->prepare("SELECT email FROM users WHERE email=:email");
            $check_mail->bindParam(":email",$email);
            $check_mail->execute();
            $row = $check_mail->fetch(PDO::FETCH_ASSOC);

            if($row['email']==$email){
                $_SESSION['warning'] = "ມີອີເມວນີ້ຢູ່ໃນລະບົບແລ້ວ <p>ເປັນສະມາຊິກແລ້ວບໍ່ ຄລິກທີ່ນີ້ເພື່ອ <a href='index.php'>ເຂົ້າສູລະບົບ</a></p>";
                header("location:singup.php"); 
            }elseif(!isset($_SESSION['error'])){
                $passwordhash = password_hash($password,PASSWORD_DEFAULT);
                $sql = $conn->prepare("INSERT INTO users(firstname, lastname,email,password,urole)
                                        VALUES(:firstname, :lastname,:email,:password,:urole)");
                $sql->bindParam(":firstname",$firstname);
                $sql->bindParam(":lastname",$lastname);
                $sql->bindParam(":email",$email);
                $sql->bindParam(":password",$passwordhash);
                $sql->bindParam(":urole",$urole);
                $sql->execute();
                $_SESSION['success'] = "ສະໝັກສະມາຊິສຳເລັດ <p>ເປັນສະມາຊິກແລ້ວບໍ່ ຄລິກທີ່ນີ້ເພື່ອ <a href='index.php' class='alert-link'>ເຂົ້າສູລະບົບ</a></p>";
                header("location:singup.php");
            }else{
                $_SESSION['error'] = 'ເກິດຂໍ້ຜິດພາດ';
                header("location:singup.php"); 
            }

        } catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}
?>