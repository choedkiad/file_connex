 
 <?php


$servername = "localhost";
$username = "sirivala_connex1";
$password = "fORnIOTKuc";
$dbname = "sirivala_connex1";  

 
 isset( $_SESSION['USER_ID'] ) ? $USER_ID = $_SESSION['USER_ID'] : $USER_ID = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";


?>

<style>
table, th, td {
  border: 1px solid;
  padding: 5px;
  text-align: center;
}
</style>
         
         <table style="border-style: solid;">
                  <tr   >
                    <th>#</th>    
                 
                  </tr>

           

<?php
 

     $sql_data_check="SELECT Distinct ex_list_listing_code FROM dbo_data_excel_listing_img    "; 
     $result_data_check=$conn->query($sql_data_check); 
     
     $num=$result_data_check->num_rows;

     $no=0;   
 
     echo $num;
           
     while($rs = $result_data_check->fetch_assoc()) {
?>
        <tr>
           <td><?php echo $rs['ex_list_listing_code'];?></td>
        </tr>
<?php } ?>

</table>