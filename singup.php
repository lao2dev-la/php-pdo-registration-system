
<?php 
session_start();
require_once('./condb.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>sign up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h3>ສະໝັກສະມາຊິກ</h3>
        <hr>
        <form action="singup_db.php" method="post">
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
                <?php if(isset($_SESSION['warning'])){ ?>
                <div class="alert alert-warning" role="alert">
                    <?php 
                        echo $_SESSION['warning'];
                        unset($_SESSION['warning']);
                    ?>
                </div> 

                <?php }?>
            <div class="bm-3">
                <label for="firstname" class="form-label">firstname</label>
                <input type="text" name="firstname" class="form-control">
            </div>
            <div class="bm-3">
                <label for="lastname" class="form-label">lastname</label>
                <input type="text" name="lastname" class="form-control">
            </div>
            <div class="bm-3">
                <label for="email" class="form-label">email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="bm-3">
                <label for="password" class="form-label">password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="bm-3">
                <label for="comfirm password" class="form-label">comfirm password</label>
                <input type="password" name="c_password" class="form-control">
            </div>
            <br>
            <button type="submit" name="singup" class="btn btn-primary">Sing UP</button>
        </form>
        <br>
        <p>ເປັນສະມາຊິກແລ້ວບໍ່ ຄລິກທີ່ນີ້ເພື່ອ <a href="index.php">ເຂົ້າສູລະບົບ</a></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  </body>
</html>