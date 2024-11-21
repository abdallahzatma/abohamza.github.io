<?php
include 'db/config.php';
$sql = "SELECT * FROM users_new";
$result = mysqli_query($conn, $sql);
// ID	 Full Name	Family Count	Phone Number	Center

$output ='<table>
<tr>
<th align = "center"></th>
<th align = "center">ID</th>
<th align = "center">Full Name</th>
<th align = "center">Phone Number</th>
<th align = "center">Center</th>
</tr>';
while ($excel = mysqli_fetch_assoc($result)) 
{
    $output.='<tr>
    <th align = "center"></th>
    <th align = "center">'.$excel['id'].'</th>
    <th align = "center">'.$excel['name'].'</th>
    <th align = "center">'.$excel['pnumber'].'</th>
     <th align = "center">'.$excel['center'].'</th>
    </tr>';
}
$output.='</table>';
header('Content-Type:aplication/xls');
header('Content-Disposition:attachment;filename=excel.xls');
echo $output;
?>