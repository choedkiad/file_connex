 
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
                    <th>Project</th>  
                    <th>Listing All</th>  
                    <th>Listing No Status</th>  
                    <th>เบอร์ผิด, ปิดเครื่อง, ยังไม่ปล่อยขาย/เช่า, ไม่รับ agent</th>
                    <th>มีรูป</th>
                  </tr>

           

<?php
     
     $deal_="2";

     $sql_project="SELECT project_name_en , project_id , project_listing_count_sale , project_listing_count_rent FROM type_project where project_id BETWEEN 1801 AND 1950  "; 
     $result_project=$conn->query($sql_project); 
     
     $num=$result_project->num_rows;

     $no=0;   
 
     echo $num;
           
     while($rs_project=$result_project->fetch_assoc()) { $no++;

            $project_listing_count=$rs_project['project_listing_count'];

            if($deal_=='1'){
                 $project_listing_count=$rs_project['project_listing_count_sale'];
            }else{
                 $project_listing_count=$rs_project['project_listing_count_rent'];
            }



            $project_id=$rs_project['project_id'];

            $sql="SELECT ex_list_img_number FROM dbo_data_excel_listing 
                  WHERE ex_list_img_number!='0' and project_id=$project_id  and ex_list_deal_type='$deal_' and ex_list_close='0'  "; 
            $result=$conn->query($sql); 
            $num_img=$result->num_rows;


            $sql_nostatus="SELECT ex_list_listing_status FROM dbo_data_excel_listing 
                  WHERE ex_list_listing_status='' and project_id=$project_id  and ex_list_deal_type='$deal_' and ex_list_close='0' or
                        ex_list_listing_status='0' and project_id=$project_id and ex_list_deal_type='$deal_' and ex_list_close='0'  "; 
            $result_nostatus=$conn->query($sql_nostatus); 
            $num_nostatus=$result_nostatus->num_rows; 
 
 
            $sql_status="SELECT ex_list_listing_status FROM dbo_data_excel_listing 
                  WHERE ex_list_listing_status='10' and project_id=$project_id and ex_list_deal_type='$deal_' and ex_list_close='0' or
                        ex_list_listing_status='12' and project_id=$project_id and ex_list_deal_type='$deal_' and ex_list_close='0'  or
                        ex_list_listing_status='13' and project_id=$project_id and ex_list_deal_type='$deal_' and ex_list_close='0'  or
                        ex_list_listing_status='14' and project_id=$project_id and ex_list_deal_type='$deal_' and ex_list_close='0'   "; 
            $result_status=$conn->query($sql_status); 
            $num_status=$result_status->num_rows; 
?>
        <tr>
           <td><?php echo $no;?></td>
           <td><?php echo $rs_project['project_name_en'];?></td>
           <td><?php echo $project_listing_count;?></td>
           <td><?php echo $num_nostatus;?></td>
           <td><?php echo $num_status;?></td>
           <td><?php echo $num_img;?></td>
        </tr>


<?php } ?>

</table>