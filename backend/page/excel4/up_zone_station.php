 
<meta http-equiv="refresh" content="5;url=https://connex.in.th/backend/excel4/up_zone_station.php"/> 
 <?php


$servername = "localhost";
$username = "sirivala_connex1";
$password = "fORnIOTKuc";
$dbname = "sirivala_connex1";  


$date_1=date("Y-m-d H:i:s");
 
 isset( $_SESSION['USER_ID'] ) ? $USER_ID = $_SESSION['USER_ID'] : $USER_ID = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

        date_default_timezone_set('Asia/Bangkok');

        $todate=date("Y-m-d H:i:s");


     $sql="SELECT project_id , ex_list_listing_code FROM dbo_data_excel_listing where  zone_id='' and project_id!='0'  order by ex_list_listing_code DESC LIMIT 40 ";  
     $result = $conn->query($sql);

     if($result->num_rows > 0) {
        // output data of each row
         while($rs=$result->fetch_assoc()) {   $i++;
            
             $project_id=$rs['project_id'];
             $ex_list_listing_code=$rs['ex_list_listing_code'];

             $sql_project="SELECT project_id , zone_id , project_train_station FROM type_project where  project_id='$project_id'  order by project_id ASC LIMIT 1 ";  
             $result_project = $conn->query($sql_project);

            if($result_project->num_rows > 0) { 

                $rs_project=$result_project->fetch_assoc();

                $zone_id=$rs_project['zone_id'];
                $station_id=$rs_project['project_train_station'];

                 if($station_id==''){ $station_id='0'; }
 
                  $sql_1= "UPDATE dbo_data_excel_listing SET 
                                  zone_id='".$zone_id."',
                                  ex_list_train_station='".$station_id."'
                                  WHERE ex_list_listing_code='".$ex_list_listing_code."'";
                  $conn->query($sql_1);   
 
 
                echo  $i." CX: ".$ex_list_listing_code." project_id ".$project_id." zone_id : ".$zone_id." station_id : ".$station_id."<br>";                 

 
 
           
     /*
          }else{  $no1++; 

                      echo   $listing_code." Project : ".$project."<br>";
         }*/
             }
         }

     }
       
?>