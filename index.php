<?php
include_once 'config/database.php';

if (isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

     $req = mysqli_query($conn,"SELECT * FROM `admin` WHERE `user` = '" . $username . "' AND `pass` = '" . $password . "'");

                                $user = mysqli_fetch_array($req);
                                $nb = mysqli_num_rows($req);
                                if ($nb != 0) {
                                    $_SESSION['username'] = $username;
                                        header('Location: dash_board.php');
                                         } else {
									 echo "Your Password is wrong";
								} 
                                
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>المجلس الأعلى للسلطة القضائية</title>
<link rel="shortcut icon" href="assets/car.ico" />
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
.login-form {
    width: 340px;
    margin: 50px auto;
  	font-size: 15px;
}
.login-form form {
    margin-bottom: 15px;
    background: #f7f7f7;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
}
.login-form h2 {
    margin: 0 0 15px;
}
.form-control, .btn {
    min-height: 38px;
    border-radius: 2px;
}
.btn {        
    font-size: 15px;
    font-weight: bold;
}
.err-msg{
      color:red;
}
</style>
</head>
<body>
<header>
    <div class="row">
        <div class="col">
          <div class="text-centers" style="background-image: url('assets/4.jpg');"></div>
        </div>
      </div>      
</header>
<div class="login-form">
  
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <h2 class="text-center">تسجيل الدخول</h2> 
        <p class="text-success text-center"><?php echo $call_login; ?></p>      
        <div class="form-group">
            <input type="text" class="form-control" placeholder="اسم المستخدم" name="username" value="<?php echo $set_email; ?>" required="required">
            <p class="err-msg">
              <?php if($emailErr!=1){ echo $emailErr; } ?>
              </p>
          </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="كلمة المرور" name="password" required="required">
            <p class="err-msg">
              <?php if($passErr!=1){ echo $passErr; } ?>
              </p>
        </div>
        <div class="form-group">
            <button type="submit" name="login" class="btn btn-primary btn-block">تسجيل الدخول</button>
        </div>      
    </form>
</div>
</body>
</html>