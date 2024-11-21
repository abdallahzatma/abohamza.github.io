<?php
include 'db/config.php';

if (isset($_POST['save'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['pnumber'];
    $center = $_POST['center'];

    mysqli_query($conn, "UPDATE users SET name='$name',pnumber='$phone' ,center='$center' WHERE id=$id");
    
    header('location: index.php');
}

$result = mysqli_query($conn,"SELECT * FROM users WHERE id='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>تعديل بيانات المستفيد</title>
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
            <h1>تعديل بيانات المستفيد</h1>
            <form action="editUsers.php" method="POST" class="login-form">
                <input type="hidden" name="id" class="txtField" value="<?php echo $row['id']; ?>">
              
                <div class="form-group">
                    <input type="text" placeholder="الأسم" class="form-control" name="name" required="" value="<?php echo $row['name']; ?>">
                </div>


                <div class="form-group">
                    <input type="phone" placeholder="رقم الجوال"  class="form-control" name="pnumber" required="" value="<?php echo $row['pnumber']; ?>">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="المركز"  class="form-control" name="center" required="" value="<?php echo $row['center']; ?>">
                </div>
                <button type="submit" class="btnsave" name="save">تعديل</button>
                <button><a href="index.php" class="btn btn-primary">رجوع</a></button>
            </form>
        </div>
        
    </div>
</body>
</html>

