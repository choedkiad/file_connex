 
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
        $tmpfname = "project_proppit.xlsx";//กำหนดให้อ่านข้อมูลจากไฟล์จากไฟล์ชื่อ
       //สร้าง object สำหรับอ่านข้อมูล ชื่อ $excelReader
        $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
        $excelObj = $excelReader->load($tmpfname);//อ่านข้อมูลจากไฟล์ชื่อ test_excel.xlsx
        $worksheet = $excelObj->getSheet(0);//อ่านข้อมูลจาก sheet แรก
        $lastRow = $worksheet->getHighestRow(); 
       //นับว่า sheet แรกมีทั้งหมดกี่แถวแล้วเก็บจำนวนแถวไว้ในตัวแปรชื่อ $lastRow
   
 
        for ($row = 1; $row <= $lastRow; $row++)//วน loop อ่านข้อมูลเอามาแสดงทีละแถว
        {   


        $name_en=$worksheet->getCell('A'.$row)->getValue();
        $name_proppit_en=$worksheet->getCell('B'.$row)->getValue();
        $name_proppit=$worksheet->getCell('C'.$row)->getValue();
        $proppit_latitude=$worksheet->getCell('D'.$row)->getValue();
        $proppit_longitude=$worksheet->getCell('E'.$row)->getValue();
  
         

                $sql1 = "UPDATE type_project SET 
                         project_proppit_name='".$name_proppit."',
                         project_proppit_latitude='".$proppit_latitude."',
                         project_proppit_longitude='".$proppit_longitude."'  
                         WHERE project_proppit_name_en='".$name_proppit_en."' and  project_proppit_name='' "; 

                if ($conn->query($sql1) === TRUE) { 

                    

                }  
 
        }
       
?>