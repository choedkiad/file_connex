 
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
                    <th>project_id</th>  
                    <th>project_name</th>  
                    <th>project_name_en</th>   
                  </tr>

           

<?php

     $sql_project="SELECT * FROM type_project where project_type='1' "; 
     $result_project=$conn->query($sql_project);  
     $num=$result_project->num_rows;

     $no=0;   
 
           
     while($rs_project=$result_project->fetch_assoc()) { $no++;

            $project_id=$rs_project['project_id'];
            $project_name=$rs_project['project_name'];
            $project_name_en=$rs_project['project_name_en'];

?>
        <tr>
           <td><?php echo $no;?></td>
           <td><?php echo $project_id;?></td>
           <td><?php echo $project_name;?></td>
           <td><?php echo $project_name_en;?></td> 
        </tr>


<?php } ?>

</table>