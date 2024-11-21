<!DOCTYPE html>
<html lang="ar">

<head>
<meta charset="UTF-8">
    <title>عرض كل المستفيدين الجدد</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <style type="text/css">
   
    </style>

</head>

<body>
    <?php if (isset($_SESSION['message'])): ?>
    <div class="msg">
        <?php 
            echo $_SESSION['message']; 
            unset($_SESSION['message']);
        ?>
    </div>
<?php endif ?>
    <div class="container">
        <!-- <a href="create.php"><button type="button" class="btn btn-labeled btn-success"> -->
            <!-- <span class="btn-label"> <i class="fa fa-plus"></i></span>Add New Record</button></a> -->
        <div class="row">
            <div class="col-20">
                <?php
                    // Include config file
                    include 'db/config.php';
                    // Attempt select query execution
                    $sql = "SELECT * FROM users_new";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                    echo '<table class="">';
                        echo "<thead>";
                            echo "<tr>";
                                echo "<th>رقم الهوية</th>";
                                echo "<th>الأسم رباعي</th>";
                                echo "<th>رقم الجوال</th>";
                                echo "<th>المركز</th>";
                                echo "<th>العملية</th>";
                            echo "</tr>";
                        echo "</thead>";

                    echo "<tbody>";
                    while($row = mysqli_fetch_array($result)){
                        echo "<tr>";
                            echo "<td>". $row['id'] ."</td>";
                            echo "<td>". $row['name'] ."</td>";
                            echo "<td>". $row['pnumber'] ."</td>";
                            echo "<td>". $row['center'] ."</td>";
                            echo "<td>";
                           

                                echo '
                                
                                <a href="edit.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="btn btn-warning fas fa-edit">تعديل</span></a>
                                
                                ';
                                echo " ";

                                echo '
                                <a  href="delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="btn btn-danger fa fa-trash">حذف</span></a>
                                
                                ';
                                       
                            echo "</td>"; 

                        echo "</tr>"; 
                         }
                    echo "</tbody>"; 
                echo "</table>"; 
                 mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>لا يوجد مستفيدين جدد</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    mysqli_close($conn);
                ?>
                    <button><a href="index.php" class="btn btn-primary">رجوع</a></button>
                </div>
            </div>
        </div>
    </div>

    <!-- <a href="excel.php"><input type="submit" name="excel" value="Download Excel"></a> -->
</body>
</html>