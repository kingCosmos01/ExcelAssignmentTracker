<?php 

    session_start();

    if(isset($_SESSION['user']))
    {
        header("Location: http://localhost/extracker/home/");
    }


    if(isset($_POST['create_account'])) {

        $matric_number = htmlentities($_POST['matric']);
        $fullname = htmlentities($_POST['fullname']);
        $email = htmlentities($_POST['email']);
        $password = htmlentities($_POST['password']);
        $c_pass = htmlentities($_POST['c_pass']);


    
        require '../../app/Database.php';
        require '../../app/Register.php';

        $RegisterManager = new Register($matric_number, $fullname, $email, $password, $c_pass);
        $RegisterManager->signupUser();   

        $RegisterManager->redirect('http://localhost/extracker/home/', ['success', 'Account Created Successfully!']);

    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyTraks - Create Account</title>
    <link rel="stylesheet" href="../css/register.css">
</head>
<body>
    
    <div class="register-container">
        <h2>Create Account</h2>
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
                <label>Matric Number</label><br>
                <input type="text" name="matric" autocomplete="off" placeholder="Enter Matric Number" required>
            </div>
            <div class="input-group">
                <label>Fullname</label><br>
                <input type="text" name="fullname" autocomplete="off" placeholder="Enter Fullname" required>
            </div>
            <div class="input-group">
                <label>Email</label><br>
                <input type="email" name="email" placeholder="Someone@mail.com" required>
            </div>
            <div class="input-group">
                <label>Password</label><br>
                <input type="password" name="password" autocomplete="off" placeholder="Enter Password" required>
            </div>
            <div class="input-group">
                <label>Confirm Password</label><br>
                <input type="password" name="c_pass" autocomplete="off" placeholder="Confirm Password" required>
            </div>
            <div class="cta">
                <button type="submit" class="reg-button" name="create_account">Create Account</button>
                <p><a href="./login.php">Login Here </a>If you Already Have an Account</p>
            </div>
        </form>
    </div>

    <script src="../js/home.js"></script>
</body>
</html>