
<?php 
session_start();
require_once('./condb.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>sign in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h3>ເຂົ້າສູລະບົບ</h3>
        <hr>
        <form action="singin_db.php" method="post">
            <?php if(isset($_SESSION['error'])){ ?>
                <div class="alert alert-danger" role="alert">
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </div> 

                <?php }?>
                <?php if(isset($_SESSION['success'])){ ?>
                <div class="alert alert-success" role="alert">
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </div> 

                <?php }?>
            <div class="bm-3">
                <label for="email" class="form-label">email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="bm-3">
                <label for="password" class="form-label">password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <br>
            <button type="submit" name="singin" class="btn btn-primary">Sing In</button>
        </form>
        <br>
        <p>ຍັງບໍ່ທັນເປັນສະມາຊິກ ຄລິກທີ່ນີ້ເພື່ອ <a href="singup.php">ລົງທະບຽນ</a></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  </body>
</html>