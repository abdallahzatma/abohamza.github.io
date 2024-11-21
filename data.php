<!DOCTYPE html>
<html>
<head>
    <title>حذف المستفيد</title>
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
    <?php

use function PHPSTORM_META\type;

 if (isset($_SESSION['message'])): ?>
    <div class="msg">
        <?php 
            echo $_SESSION['message']; 
            unset($_SESSION['message']);
        ?>
    </div>
<?php endif ?>
    <div class="container">
        <a href="create.php"><button type="button" class="btn btn-labeled btn-success">
            <span class="btn-label"> <i class="fa fa-plus"></i></span>Add New Record</button></a>
        <div class="row">
            <div class="col-12">
                <form action="" >
<input type="text" name="id" placeholder="ID Number"><br>
<input type="submit">

                </form>
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
                
            } 
            
        } 
        else if(empty(mysqli_stmt_execute($stmt)) ){

            echo "Oops! Something went wrong. Please try again later.";

        }
    
        else{
    
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($conn);
} 
?>

                <?php
                    // Include config file
                    include 'db/config.php';
                    // Attempt select query execution
                    $sql = "SELECT * FROM users WHERE id = ?";
                
                    $result = mysqli_query($conn, $sql);
                   echo mysqli_num_rows($result);
                
                    if($result ){
                        if(mysqli_num_rows($result) > 0){ 
                        ?>
                    <table class="table table-striped table-sm">
                         <thead>
                            <tr>
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Phone Number</th>
                                <th>Center</th>
                                
                                <th colspan="3" >Action</th>
                                
                            </tr>
                    </thead>

                 <tbody>
                    <?php
                    while($row = mysqli_fetch_array($result)){
                        ?>
                     <tr>
                         <td><?php echo $row['id']?></td>
                         <td><?php echo$row['name'] ?></td>
                            <td><?php echo $row['pnumber'] ?></td>
                            <td><?php echo $row['center'] ?></td>
              
                        
                         <td>

                            <?php
                                echo '<a href="show.php?id='. $row['id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="btn btn-primary fa fa-eye">Show</span></a>';
                                echo " ";

                                echo '<a href="edit.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="btn btn-warning fas fa-edit">Edit</span></a>';
                                echo "   "; 

                                echo '<a href="delete.php?id='. $row['id'] .'" title="حذف المستفيد" data-toggle="tooltip"><span class="btn btn-danger fa fa-trash">Delete</span></a>';
                                       
                            echo "</td>" 
                            ?>

                     </tr> 
                     <?php
                         }
                         ?>
                   </tbody> 
              </table> 
              <?php
                 mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    mysqli_close($conn);
                ?>
                </div>
            </div>
        </div>
    </div>

</body>
</html>