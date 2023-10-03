 
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
        $tmpfname = "project_map_baania_updatedev.xlsx";//กำหนดให้อ่านข้อมูลจากไฟล์จากไฟล์ชื่อ
       //สร้าง object สำหรับอ่านข้อมูล ชื่อ $excelReader
        $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
        $excelObj = $excelReader->load($tmpfname);//อ่านข้อมูลจากไฟล์ชื่อ test_excel.xlsx
        $worksheet = $excelObj->getSheet(0);//อ่านข้อมูลจาก sheet แรก
        $lastRow = $worksheet->getHighestRow(); 
       //นับว่า sheet แรกมีทั้งหมดกี่แถวแล้วเก็บจำนวนแถวไว้ในตัวแปรชื่อ $lastRow
   
 
        for ($row = 1; $row <= $lastRow; $row++)//วน loop อ่านข้อมูลเอามาแสดงทีละแถว
       {   

 
        $project_baania_id='';
        $developer_name_en=''; 
        $developer_name=''; 
        $developer_id='';

        $project_baania_id=$worksheet->getCell('A'.$row)->getValue(); //ประเภท
        $developer_name_en=$worksheet->getCell('B'.$row)->getValue();// ชื่อProject Connex 
        $developer_name=$worksheet->getCell('C'.$row)->getValue();// ชื่อProject Connex          
        
 
              $str_dev="SELECT * FROM dbo_developer where developer_name='$developer_name'  "; 
              $result_dev=$conn->query($str_dev);  
              $rs_dev=$result_dev->fetch_assoc(); 

              $developer_id=$rs_dev['developer_id'];
           
 
             $sql = "UPDATE type_project SET    
                       project_developer='".$developer_id."'
                     WHERE project_baania_id='".$project_baania_id."' "; 
             
              if ($conn->query($sql) === TRUE) {   


                           echo $project_baania_id."-".$project_developer."-".$developer_name."<br>";

              }

             
           
     /*
          }else{  $no1++; 

                      echo   $listing_code." Project : ".$project."<br>";
         }*/

         

     }
       
?>