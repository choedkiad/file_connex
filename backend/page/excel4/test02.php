 
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





/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
date_default_timezone_set('Asia/Bangkok');

/** Include PHPExcel */
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Create a first sheet, representing sales data
$objPHPExcel->setActiveSheetIndex(0);

 

 $objPHPExcel->getActiveSheet()->setCellValue('A1','TEL');

                                         // Check connection
         $no=0;  $no2=0;

         $sql="SELECT * FROM dbo_tel order by tel_id   ASC";  
         $result = $conn->query($sql);



         if($result->num_rows > 0) {
          // output data of each row
             while($rs_listing=$result->fetch_assoc()) { $no++;  $no2++;
 
                
                $tel_tel=$rs_listing['tel_tel'];

          

          $objPHPExcel->getActiveSheet()->setCellValue('A'.$no2,$tel_tel);

          echo $tel_tel."<br>";
           
     /*
          }else{  $no1++; 

                      echo   $listing_code." Project : ".$project."<br>";
         }*/

             }

        }


     $objPHPExcel->setActiveSheetIndex(0);

// Save Excel 2007 file
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save(str_replace('.php', '.xls', "download_number.xls"));

// Echo done
print "อ้างอิงจาก https://github.com/PHPOffice/PHPExcel";
print '<script>';
print 'window.open("download_number".xls");';
print '</script>';


       
?>