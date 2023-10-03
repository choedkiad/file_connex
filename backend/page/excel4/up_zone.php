 
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
        $tmpfname = "zone_id.xlsx";//กำหนดให้อ่านข้อมูลจากไฟล์จากไฟล์ชื่อ
       //สร้าง object สำหรับอ่านข้อมูล ชื่อ $excelReader
        $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
        $excelObj = $excelReader->load($tmpfname);//อ่านข้อมูลจากไฟล์ชื่อ test_excel.xlsx
        $worksheet = $excelObj->getSheet(0);//อ่านข้อมูลจาก sheet แรก
        $lastRow = $worksheet->getHighestRow(); 
       //นับว่า sheet แรกมีทั้งหมดกี่แถวแล้วเก็บจำนวนแถวไว้ในตัวแปรชื่อ $lastRow
   
 
        for ($row = 1; $row <= $lastRow; $row++)//วน loop อ่านข้อมูลเอามาแสดงทีละแถว
       {   

$zone_id='';
$zone_name='';
$zone_name_en='';
$zone_latitude='';
$zone_longitude='';

        $zone_id=$worksheet->getCell('A'.$row)->getValue(); //ประเภท
        $zone_name=$worksheet->getCell('B'.$row)->getValue();// ชื่อProject Connex
        $zone_name_en=$worksheet->getCell('C'.$row)->getValue();// ชื่อProject Living
        $zone_latitude=$worksheet->getCell('D'.$row)->getValue();// ชื่อ Project ID
        $zone_longitude=$worksheet->getCell('E'.$row)->getValue();// ชื่อ Zone ID
   
  
              
 
             $sql = "UPDATE type_zone SET 
                       zone_living_id='".$zone_id."',
                       zone_latitude='".$zone_latitude."',
                       zone_longitude='".$zone_longitude."'
                     WHERE zone_name='".$zone_name."' "; 
             
              if ($conn->query($sql) === TRUE) {   


                           echo $zone_living_id."<br>";

              }

             
           
     /*
          }else{  $no1++; 

                      echo   $listing_code." Project : ".$project."<br>";
         }*/

         

     }
       
?>