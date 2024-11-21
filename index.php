

<!DOCTYPE html>
<html lang="en">
<head>
    <title>إضافة مستخدم جديد</title>
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
        <h1>نقطة المختار أحمد أبو يوسف</h1>
    <form action="show.php"  class="login-form">
    <div class="form-group">
<input class="form-control" type="text" name="id" placeholder="ادخل رقم الهوية" required="" >
</div>
<button class="btnsave" type="submit">استعلام</button><br><br>


    </form>
    <?php                                  echo '
<button  >
<a href="create.php" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="btn btn-warning fas fa-edit">إضافة مستفيد جديد</span></a>
</button>
';
?>
    <?php                                  echo '
<button>
<a href="showAllNewData.php" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="btn btn-warning fas fa-edit">عرض المستفيدين الجدد</span></a>
</button>
';
?>

        </div>
    </div>


</body>
</html>