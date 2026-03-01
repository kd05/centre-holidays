<?php ob_start(); ?>
<?php 

$time=time();

$counter=1; // counter

//----------------------------Connect to database-------------------------
include($_SERVER['DOCUMENT_ROOT'].'/library/opendbi.php');


?>

<table>
    <thead>
      <tr>
        <th>#</th>
        <th>TICO Licence Number</th>
        <th>Full Name</th>
        <th>Business Email</th>
        <th>Assigned Agent ID and Full Name</th>                       
      </tr>
    </thead>
    <tbody> 

<?php

$sql = "SELECT * FROM ch_partners ORDER BY AgentID ASC";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)) {
	
?>
<tr>
<td><?php echo $counter++ ?></td>
<td><?php echo $row['PTICOLicenceNumber']; ?></td>
<td><?php echo $row['PFirstName'].' '.$row['PLastName']; ?></td>
<td><?php echo $row['PBusinessEmail']; ?></td>
<td><?php echo $row['AgentID'].', '.$row['FirstName'].' '.$row['LastName']; ?></td>
</tr>

<?

$fsubtotal=$fsubtotal+$subtotal;
								  	
			  }

mysqli_close($conn);	

?>
</tbody></table> 
 
<?php
// The function header by sending raw excel
header("Content-type: application/vnd.ms-excel");
 
// Defines the name of the export file "codelution-export.xls"
header("Content-Disposition: attachment; filename=non-paying-list-".$time.'-'.date("Y-m-d").".xls");
 
mysqli_close($conn);

?>

<? ob_flush(); ?>