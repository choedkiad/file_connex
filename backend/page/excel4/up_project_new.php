 
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

        date_default_timezone_set('Asia/Bangkok');

        $todate=date("Y-m-d H:i:s");

    require_once "PHPExcel.php";//เรียกใช้ library สำหรับอ่านไฟล์ excel
        $tmpfname = "up_project_new.xlsx";//กำหนดให้อ่านข้อมูลจากไฟล์จากไฟล์ชื่อ
       //สร้าง object สำหรับอ่านข้อมูล ชื่อ $excelReader
        $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
        $excelObj = $excelReader->load($tmpfname);//อ่านข้อมูลจากไฟล์ชื่อ test_excel.xlsx
        $worksheet = $excelObj->getSheet(0);//อ่านข้อมูลจาก sheet แรก
        $lastRow = $worksheet->getHighestRow(); 
       //นับว่า sheet แรกมีทั้งหมดกี่แถวแล้วเก็บจำนวนแถวไว้ในตัวแปรชื่อ $lastRow
   
 
        for ($row = 1; $row <= $lastRow; $row++)//วน loop อ่านข้อมูลเอามาแสดงทีละแถว
       {   




                $project=$worksheet->getCell('A'.$row)->getValue();

         
                $sql_project= "SELECT * FROM type_project WHERE project_name_en='$project'  "; 
                $result_project=$conn->query($sql_project);
                $rs_project=$result_project->fetch_assoc();

                $project_id=$rs_project['project_id'];   
                $project_name_en=$rs_project['project_name_en'];   

                echo  "PROJECT ID : ".$project_id." Project EN : ".$project_name_en." ซ้ำกับ Excel :  ". $project."<br>";   

 
          $sql_1="INSERT INTO type_project (project_id  ,project_name_en, project_type ,project_create)

                  VALUES ('' , '$project' ,'1' , '$todate' )";
                         
        
             
              if ($conn->query($sql_1) === TRUE) {   

 
              }
              
           
     /*
          }else{  $no1++; 

                      echo   $listing_code." Project : ".$project."<br>";
         }*/

$project='';

     }
       
?>