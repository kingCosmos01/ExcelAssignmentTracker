<?php 
    session_start();

    if(isset($_SESSION['user']))
    {
        header("Location: http://localhost/extracker/home/");
    }

    if(isset($_POST['login_account'])) {

        $email = htmlentities($_POST['email']);
        $password = htmlentities($_POST['password']);

        require '../../app/Database.php';
        require '../../app/Login.php';

        $RegisterManager = new Login($email, $password);
        $RegisterManager->LoginUser();

        $RegisterManager->redirect('http://localhost/extracker/home/', ['success', 'Login Successful!']);
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment Tracker - Login to Account</title>
    <link rel="stylesheet" href="../css/register.css">
</head>
<body>
    
    <div class="register-container">
        <h2>Login Account</h2>
        <hr>

        <?php if ( isset($_GET['param']) && isset($_GET['m']) ) : ?>
            <?php 
                $param = $_GET['param'];
                $message = $_GET['m'];
                if($param == 'err') { ?>
                <div class="alert" id="alertModal">
                    <?php echo $message; ?>
                </div>
            <?php } ?>
        <?php endif; ?>

        <form action="" method="post">
            <div class="input-group">
                <label>Email</label><br>
                <input type="text" name="email" autocomplete="off" placeholder="Someone@mail.com" required>
            </div>

            <div class="input-group">
                <label>Password</label><br>
                <input type="password" name="password" autocomplete="off" placeholder="Enter Password" required>
            </div>

            <div class="cta">
                <button type="submit" class="reg-button" name="login_account">Login</button>
                <p><a href="./register.php">Register Here </a>If you Don't Have an Account</p>
            </div>
        </form>
    </div>

    <script src="../js/home.js"></script>
</body>
</html>