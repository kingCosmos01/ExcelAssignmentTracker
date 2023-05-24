<?php 
    require_once '../app/ExcelInstruction.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor Area</title>
    <link rel="stylesheet" href="../public/css/admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" crossorigin="anonymous">
</head>
<body>
    
    <?php include_once './includes/sidebar.php'; ?>
    <?php include_once './includes/navbar.php'; ?>
    <?php include_once './includes/aside.php'; ?>


    <div class="container" id="adminContainer">
        <div class="wrapper">
            <div class="card">
                <div class="head">
                    <h2>Send Assignment</h2>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="file" name="excel" id="" required>
                    <button type="submit" name="submit_document">Send Assignment</button>
                </form>
            </div>
            <div class="card">
                <div class="head">
                    <h2>Send Instruction</h2>
                </div>
                <form action="" method="post">
                    <textarea name="instruction" id="instructionForm" placeholder="Give an Instruction to Students" required></textarea>
                    <button type="submit" name="submit_instruction">Send Instruction</button>
                </form>
            </div>
            
        </div>
    </div>

    <?php require_once './includes/footer.php'; ?>
    <script src="../public/js/admin.js"></script>
</body>
</html>