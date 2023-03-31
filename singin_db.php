<?php 
session_start();
require_once('./condb.php');

if(isset($_POST['singin'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email)){
        $_SESSION['error']= 'ກະລະນາປ້ອນອີເມວ';
        header("location:index.php");
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $_SESSION['error'] = 'ຮູບແບບອີເມວບໍຖືກຕ້ອງ';
        header("location:index.php"); 
    }elseif(empty($password)){
        $_SESSION['error'] = 'ກະລຸນາປ້ອນລະຫັດຜ່ານ';
        header("location:index.php"); 
    }elseif(strlen($_POST['password'])>20 || strlen($_POST['password'])<5){
        $_SESSION['error'] = 'ລະຫັດຜ່ານຕ້ອງມີຄວາມຍາວລະຫວ່າງ 5 -20 ຕົວອັກສອນ';
        header("location:index.php"); 
    }else{
        try{
            $check = $conn->prepare("SELECT * FROM users WHERE email =:email");
            $check->bindParam(':email',$email);
            $check->execute();
            $row = $check->fetch(PDO::FETCH_ASSOC);

            if($check->rowCount()>0){
               if($email == $row['email']){
                 if(password_verify($password, $row['password'])){
                    if($row['urole'] == 'admin'){
                        $_SESSION['admin_login'] = $row['id'];
                        header("location:admin.php");
                    }else{
                        $_SESSION['user_login'] = $row['id'];
                        header("location:user.php");
                    }
                 }else{
                    $_SESSION['error'] = 'ລະຫັດຜ່ານຜິດ';
                    header("location:index.php"); 
                 }
               }else{
                    $_SESSION['error'] = 'ອີເມວຜິດ';
                    header("location:index.php");
               }
            }else{
                    $_SESSION['error'] = 'ບໍ່ມີຂໍ້ມູນໃນລະບົບ';
                    header("location:index.php");
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}

?>