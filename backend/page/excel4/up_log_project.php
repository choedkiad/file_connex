 
 <meta http-equiv="refresh" content="10;url=https://connex.in.th/backend/excel4/up_log_project.php"/> 
 <?php


$servername = "localhost";
$username = "sirivala_connex1";
$password = "fORnIOTKuc";
$dbname = "sirivala_connex1";  


$date_1=date("Y-m-d H:i:s");
  

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

     $sql= "SELECT * FROM type_project where check_project!='222' order by project_create ASC LIMIT 50  "; 
     $result=$conn->query($sql);  
 

     if($result->num_rows > 0) {
        // output data of each row
         while($rs_project=$result->fetch_assoc()) {  
 
         $log_id=$rs_project['log_id'];
         $project_id=$rs_project['project_id'];
         $project_type=$rs_project['project_type'];
         $project_name=$rs_project['project_name'];
         $project_name_en=$rs_project['project_name_en'];
         $project_alley=$rs_project['project_alley'];
         $project_alley_en=$rs_project['project_alley_en'];
         $project_road=$rs_project['project_road'];
         $project_road_en=$rs_project['project_road_en'];
         $project_subdistrict=$rs_project['project_subdistrict'];
         $project_district=$rs_project['project_district'];
         $project_province=$rs_project['project_province'];
         $project_train_station=$rs_project['project_train_station'];
         $zone_id=$rs_project['zone_id'];
         $project_developer=$rs_project['project_developer'];
         $project_unit=$rs_project['project_unit'];
         $project_completed=$rs_project['project_completed'];
         $project_map=$rs_project['project_map'];
         $project_latitude=$rs_project['project_latitude'];
         $project_longitude=$rs_project['project_longitude'];
         $search_p_id=$rs_project['search_p_id'];
         $project_number_buildings=$rs_project['project_number_buildings'];
         $project_total_floors=$rs_project['project_total_floors'];
         $project_facilities=$rs_project['project_facilities'];
         $project_facilities_en=$rs_project['project_facilities_en'];
         $project_facilities_icon=$rs_project['project_facilities_icon'];   
         $project_nearby_places=$rs_project['project_nearby_places'];
         $project_nearby_places_en=$rs_project['project_nearby_places_en'];
         $project_common_fee=$rs_project['project_common_fee'];
         $project_living_zone_list=$rs_project['project_living_zone_list'];
         
         $log_number=$rs_project['log_number'];  
         $register_id_update=$rs_project['register_id_update']; 
         $project_living_project_list=$rs_project['project_living_project_list']; 
         $project_proppit_name=$rs_project['project_proppit_name']; 
         $project_proppit_name_en=$rs_project['project_proppit_name_en']; 
         $project_proppit_latitude=$rs_project['project_proppit_latitude']; 
         $project_proppit_longitude=$rs_project['project_proppit_longitude']; 


         $sql_log_number="SELECT * FROM dbo_log_project where project_id='$project_id' order by create_date  ASC LIMIT 1 "; 
         $result_log_number=$conn->query($sql_log_number);
         //$count_log_number=$result_log_number->num_rows;   
         $rs_log_number=$result_log_number->fetch_assoc();

         $log_number=$rs_log_number['log_number'];

          if($log_number!=''){
                  $count_log_number=$log_number+1;
          }else{
                  $count_log_number='1';
          }
    

                if($count_log_number=='1'){
 

                     $sql_log_project="INSERT INTO dbo_log_project  ( log_id , project_id ,project_type , project_name ,project_name_en   ,project_alley ,project_alley_en ,project_road , project_road_en , project_subdistrict , project_district , project_province , station_id , project_number_buildings , project_total_floors , project_facilities , project_facilities_en , project_facilities_icon , project_nearby_places , project_nearby_places_en , zone_id , project_developer , project_unit , project_completed  , project_proppit_name , project_proppit_name_en , project_proppit_latitude ,  project_proppit_longitude , project_living_zone_list , project_living_project_list , project_common_fee , project_map , project_latitude  , project_longitude  , create_date , log_number , USER_ID  )
                       VALUES ('' , '$project_id','$project_type' , '$project_name','$project_name_en','$project_alley','$project_alley_en','$project_road','$project_road_en' , '$project_subdistrict' , '$project_district' , '$project_province' , '$project_train_station' , '$project_number_buildings','$project_total_floors','$project_facilities' , '$project_facilities_en' , '$project_facilities_icon' ,'$project_nearby_places','$project_nearby_places_en' , '$zone_id' ,'$project_developer','$project_unit' , '$project_completed' , '$project_proppit_name' , '$project_proppit_name_en' , '$project_proppit_latitude' , '$project_proppit_longitude' , '$project_living_zone_list' ,  '$project_living_project_list' ,'$project_common_fee','$project_map','$project_latitude','$project_longitude' , '$date_1' ,'$count_log_number' , '$register_id_update'  )"; 
                     mysqli_query($conn, $sql_log_project);

  
                    echo  "Up PROJECT: ".$project_id." : ".$project_name." ".$project_name_en."<br>";

                }else{

                    echo  "None PROJECT: ".$project_id." : ".$project_name." ".$project_name_en."<br>";       
                }                
 
                     $sql_number= "UPDATE type_project SET 
                                  check_project='222'
                                  WHERE project_id='".$project_id."'";
                    $conn->query($sql_number); 

     /*
          }else{  $no1++; 

                      echo   $listing_code." Project : ".$project."<br>";
         }*/
         }

     }
       
?>