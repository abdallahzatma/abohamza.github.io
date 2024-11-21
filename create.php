<?php
include 'db/config.php';

session_start();
$_SESSION['message'] = "";
if(isset($_POST['save'])){

    // Escape user inputs for security
    $id = mysqli_real_escape_string($conn, $_REQUEST['id']);
    $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
    $pnumber = mysqli_real_escape_string($conn, $_REQUEST['pnumber']);
    $center = mysqli_real_escape_string($conn, $_REQUEST['center']);

    $sql = "INSERT INTO users_new (id,name,pnumber,center) VALUES ('$id', '$name','$pnumber','$center')";

    if(mysqli_query($conn, $sql)){
        $_SESSION['message'] = "تم ألإضافة بنجاح";
        header('location: create.php'); 
        
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
}
 
// Close connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>إضافة مستفيد جديد</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <style type="text/css">
    * {
        margin: 0px;
        padding: 0px;
    }
    </style>

</head>
<body>
    <div class="login">
        <div class="account-login">
            <h1 >إضافة مستفيد جديد</h1>
            <form action="create.php" method="POST" class="login-form">
                <div class="form-group">
                    <input type="number" placeholder=" رقم الهوية" class="form-control" name="id" required="">
                </div>

                <div class="form-group">
                    <input type="text" placeholder="الأسم رباعي" class="form-control" name="name" required="" >
                </div>

              
                <div class="form-group">
                    <input type="phone" placeholder="رقم الجوال"  class="form-control" name="pnumber" required="">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="المركز" value="احمد أبو يوسف"  class="form-control" name="center"            required="">
                </div>
                <button type="submit" class="btnsave" name="save">إضافة</button>
                <?php echo "<h1 > ".$_SESSION['message'] ."</h1>"?>
                <button class="btn btn-primary"><a href="index.php" >رجوع</a></button>
            </form>
           
        </div>
    </div>
</body>
</html>

