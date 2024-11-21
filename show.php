<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    include 'db/config.php';;
    
    // Prepare a select statement
    $sql = "SELECT * FROM users WHERE id = ?";
    

        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = trim($_GET["id"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
        
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $id= $row["id"];
                    $name= $row["name"];
                    $phone= $row["pnumber"];
                    $phone= $row["center"];
                    
               ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>عرض بيانات المستفيد </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>.wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">عرض بيانات المستفيد  </h1>
                    <div class="form-group">




                        </table>
                        <label>رقم الهوية </label>
                        <p><b><?php echo $row["id"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>الأسم رباعي</label>
                        <p><b><?php echo $row["name"]; ?></b></p>
                    </div>
                    
                    <div class="form-group">
                        <label>رقم الجوال</label>
                        <p><b><?php echo $row["pnumber"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>المركز</label>
                        <p><b><?php echo $row["center"]; ?></b></p>
                    </div>

                   <?php       echo '<a href="editUsers.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="btn btn-warning fas fa-edit">تعديل</span></a>';
                                echo "   "; ?>
                <button><a href="index.php" class="btn btn-primary">رجوع</a></button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
            <?php
            } else{
                echo "No Found.";
                ?>
                <button><a href="index.php" class="btn btn-primary">رجوع</a></button>
<?php
            }
        }
    }

     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($conn);
} 
?>
