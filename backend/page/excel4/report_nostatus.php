 
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
           <tr >
               <td style="padding: 5px;">No.</td>
               <td>ข้อมูลในระบบ</td>
               <td>CX ในระบ</td>
               <td>Projects</td>
               <td>เลขที่ห้อง</td>
               <td>ห้องนอน</td>
               <td>ชั้นที่</td>
               <td>พื้นที่ใช้สอย</td>
               <td>ราคา</td>
               <td>เบอร์โทรศัพท์</td>
               <td>status</td>
               <td>remark</td>
           </tr>

           

<?php
 
  
  
      $sql_data_check="SELECT * FROM dbo_data_excel_listing  where  ex_list_listing_status=''  "; 
      $result_data_check=$conn->query($sql_data_check); 

     $num=$result_data_check->num_rows;

     $no=0;  $no1=0;
     
 
           if($result_data_check->num_rows > 0) {   

                while($rs_listing=$result_data_check->fetch_assoc()){ $no++;  


                   $project_id=$rs_listing['project_id'];
                   $ex_list_house_number=$rs_listing['ex_list_house_number'];
                   $ex_list_floor=$rs_listing['ex_list_floor'];
                   $ex_list_listing_code=$rs_listing['ex_list_listing_code'];
                   $ex_list_deal_type=$rs_listing['ex_list_deal_type'];
                   $ex_list_sqm=$rs_listing['ex_list_sqm'];
                   $ex_list_bedroom=$rs_listing['ex_list_bedroom'];
                   $ex_list_contact_tel=$rs_listing['ex_list_contact_tel'];
                   $ex_list_contact_tel1_2=$rs_listing['ex_list_contact_tel1_2'];
                   $ex_list_contact_tel1_3=$rs_listing['ex_list_contact_tel1_3'];
                   $ex_list_contact_tel1_4=$rs_listing['ex_list_contact_tel1_4'];
                   $ex_list_contact_tel_2=$rs_listing['ex_list_contact_tel_2'];
                   $ex_list_contact_tel2_2=$rs_listing['ex_list_contact_tel2_2'];
                   $ex_list_contact_tel2_3=$rs_listing['ex_list_contact_tel2_3'];
                   $ex_list_contact_tel2_4=$rs_listing['ex_list_contact_tel2_4'];     
                   $ex_list_contact_tel2_4=$rs_listing['ex_list_contact_tel2_4']; 
                   $ex_list_price=$rs_listing['ex_list_price'];                
                   $ex_list_listing_status=$rs_listing['ex_list_listing_status'];      
                   $ex_list_remark=$rs_listing['ex_list_remark'];       



                           if($ex_list_listing_status=='' or $ex_list_listing_status=='0'){ $ex_list_listing_status="No Status"; $stauts_list_color="#000";  }
                           else if($ex_list_listing_status=='1'){ $ex_list_listing_status="Available"; $stauts_list_color="#42d700"; }
                           else if($ex_list_listing_status=='2'){ $ex_list_listing_status="Contracted ไม่ล็อคสิทธิ"; $stauts_list_color="#42d700"; }
                           else if($ex_list_listing_status=='3'){ $ex_list_listing_status="Rented";  $ex_list_rent_till=$ex_list_rent_till; 
                                                            //เช็ควันหมดอายุ
                                                           if($ex_list_rent_till_date<=$calExpireDate){ $stauts_list_color="#ffa200"; $expire_check=' <span class="right badge badge-danger">New</span>';  
                                                            }else{  $stauts_list_color="#ff0000";  $expire_check=''; } 

                                                                     
                                                           }
                           else if($ex_list_listing_status=='4'){ $ex_list_listing_status="Sold(by Connex)";  $stauts_list_color="#ff0000"; }
                           else if($ex_list_listing_status=='5'){ $ex_list_listing_status="Sold(by Others)"; $stauts_list_color="#ff0000"; }
                           else if($ex_list_listing_status=='6'){ $ex_list_listing_status="own use"; $stauts_list_color="#ff0000"; }
                           else if($ex_list_listing_status=='7'){ $ex_list_listing_status="unknown"; $stauts_list_color="#000cff"; }


                          $ex_list_house_number=$rs_listing['ex_list_house_number']; 
                          $house_number_n_r=strpos($ex_list_house_number,"/");
                         

                          $ex_list_sqm=$rs_listing['ex_list_sqm'];


                    $sql_project= "SELECT * FROM type_project WHERE project_id='$project_id'  "; 
                    $result_project=$conn->query($sql_project);
                    $rs_project=$result_project->fetch_assoc();

                    $project_name_en=$rs_project['project_name_en'];

                     ?>  
                                    
                                 <tr style="color: red;">
                                     <td><?php echo $no_2;?></td>
                                     <td><?php echo $ex_list_listing_code;?></td>
                                     <td><?php echo $project_name_en;?></td>
                                     <td><?php echo "'".$ex_list_house_number;?></td>
                                     <td><?php echo $ex_list_bedroom;?></td>
                                     <td><?php echo $ex_list_floor;?></td>
                                     <td><?php echo $ex_list_sqm;?></td>
                                     <td><?php echo number_format($ex_list_price);?></td>
                                     <td><?php echo $ex_list_contact_tel." , ".$ex_list_contact_tel1_2." , ".$ex_list_contact_tel1_3." , ".$ex_list_contact_tel1_4." , ".$ex_list_contact_tel_2." , ".$ex_list_contact_tel2_2." , ".$ex_list_contact_tel2_3." , ".$ex_list_contact_tel2_4." , ";?></td>
                                     <td><?php echo $ex_list_listing_status;?></td>
                                     <td><?php echo $ex_list_remark;?></td>
                                 </tr>
                    

         <?php    
                 
              }
       }
           
       
?>


</table>