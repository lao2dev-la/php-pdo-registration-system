
<?php 
session_start();
require_once('./condb.php');
if(!isset($_SESSION['admin_login'])){
    $_SESSION['error']= 'ກະລຸນາເຂົ້າສູ່ລະບົບ!';
    header("location:index.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>admin page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">

    <?php 
    if(isset($_SESSION['admin_login'])){
        $admin_id = $_SESSION['admin_login'];
        $sql = $conn->prepare("SELECT * FROM users WHERE id = $admin_id");
        $sql->execute();
        $row =$sql->fetch(PDO::FETCH_ASSOC);
    }
    ?>
        <h3>welcome Admin,<?php echo $row['firstname'].' '.$row['lastname'] ?> </h3>
        <hr>
        <a href="logout.php" class="btn btn-danger">ອອກລະບົບ</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  </body>
</html>