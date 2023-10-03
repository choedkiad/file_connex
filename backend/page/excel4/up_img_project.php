 
<meta http-equiv="refresh" content="10;url=https://connex.in.th/backend/excel4/up_img_project.php"/>
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

     $sql= "SELECT project_id  FROM type_project where project_img_name='' order by project_id  ASC  LIMIT 50  "; 
     $result=$conn->query($sql);  
 

     if($result->num_rows > 0) {
        // output data of each row
         while($rs=$result->fetch_assoc()) {  


              $project_id=$rs['project_id'];
          

              $sql_img="SELECT project_img_name
                        FROM type_project_img 
                        WHERE project_id='$project_id' order by project_img_no ASC LIMIT 1  ";
              $result_img=$conn->query($sql_img); 
              $rs_img=$result_img->fetch_assoc();

              if($result_img->num_rows > 0) {
                  $project_img_name=$rs_img['project_img_name'];
              }else{
 
                  $project_img_name='no';

              }              

                  $sql_1= "UPDATE type_project SET  
                                  project_img_name='".$project_img_name."'
                                  WHERE project_id='".$project_id."'";
                  $conn->query($sql_1);   

                
 
                echo  " project : ".$project_id." project_img_name : ".$project_img_name."<br>";                 

 
 
           
     /*
          }else{  $no1++; 

                      echo   $listing_code." Project : ".$project."<br>";
         }*/
         }

     }
       
?>