 
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
        $tmpfname = "file1.xlsx";//กำหนดให้อ่านข้อมูลจากไฟล์จากไฟล์ชื่อ
       //สร้าง object สำหรับอ่านข้อมูล ชื่อ $excelReader
        $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
        $excelObj = $excelReader->load($tmpfname);//อ่านข้อมูลจากไฟล์ชื่อ test_excel.xlsx
        $worksheet = $excelObj->getSheet(0);//อ่านข้อมูลจาก sheet แรก
        $lastRow = $worksheet->getHighestRow(); 
       //นับว่า sheet แรกมีทั้งหมดกี่แถวแล้วเก็บจำนวนแถวไว้ในตัวแปรชื่อ $lastRow
   
 
        for ($row = 1; $row <= $lastRow; $row++)//วน loop อ่านข้อมูลเอามาแสดงทีละแถว
       {   


               $no=0;



        $listing_code=$worksheet->getCell('A'.$row)->getValue();
        $ex_list_contact_name=$worksheet->getCell('B'.$row)->getValue();//แสดงข้อมูลใน  ชื่อ
        $ex_list_other=$worksheet->getCell('C'.$row)->getValue();//แสดงข้อมูลใน เบอร์โทรรวม
        $number1=$worksheet->getCell('D'.$row)->getValue();//แสดงข้อมูลใน เบอร์โทร 1
        $number2=$worksheet->getCell('E'.$row)->getValue();//แสดงข้อมูลใน เบอร์โทร 2
        $number3=$worksheet->getCell('F'.$row)->getValue();//แสดงข้อมูลใน เบอร์โทร 3
        $number4=$worksheet->getCell('G'.$row)->getValue();//แสดงข้อมูลใน เบอร์โทร 4
        $lineid=$worksheet->getCell('H'.$row)->getValue();//แสดงข้อมูลใน Id Line
        $email=$worksheet->getCell('I'.$row)->getValue();//แสดงข้อมูลใน Email
        $whatsapp=$worksheet->getCell('J'.$row)->getValue();//แสดงข้อมูลใน Whatsapp
        $wechat=$worksheet->getCell('K'.$row)->getValue();//แสดงข้อมูลใน Wechat
        $floor=$worksheet->getCell('L'.$row)->getValue();//แสดงข้อมูลใน ชั้น 
        $number_room=$worksheet->getCell('M'.$row)->getValue();//แสดงข้อมูลใน เลขห้อง
        $size=$worksheet->getCell('N'.$row)->getValue();//แสดงข้อมูลใน ขนาด 
        $bed=$worksheet->getCell('O'.$row)->getValue();//แสดงข้อมูลใน ห้องนอน
        $bath=$worksheet->getCell('P'.$row)->getValue();//แสดงข้อมูลใน ห้องน้ำ
        $price=$worksheet->getCell('Q'.$row)->getValue();//แสดงข้อมูลใน ราคาขาย
        $rent=$worksheet->getCell('R'.$row)->getValue();//แสดงข้อมูลใน ราคาเช่า
        $remark=$worksheet->getCell('S'.$row)->getValue();//แสดงข้อมูลใน Remark
        $project=$worksheet->getCell('T'.$row)->getValue();//แสดงข้อมูลใน 'Project
 
       $per=$size*5/100;
       $per_1=$size+$per;
       $per_2=$size-$per;

              

                
                $project_id='';

                $sql_project= "SELECT * FROM type_project WHERE project_name_en='$project'  "; 
                $result_project=$conn->query($sql_project);
                $rs_project=$result_project->fetch_assoc();

                $project_id=$rs_project['project_id'];
                $project_name_en=$rs_project['project_name_en'];




                $check_n_r=strpos($number_room,"/");

                $number_r_1=substr($number_room,0 , $check_n_r);
                $number_r_2=substr($number_room,$check_n_r+1 ,15 );

                $number_r_2 = str_replace(" ","",$number_r_2,$count);  
                    
                if($price!=''){ $list_deal_type='1'; $price_s=$price;


               $sql_list_code="SELECT ex_list_listing_code , ex_list_id FROM dbo_data_excel_listing order by ex_list_listing_code DESC";
               $result_list_code = $conn->query($sql_list_code); 
              // output data of each row
               $rs_code=$result_list_code->fetch_assoc();

               $ex_list_listing_code=$rs_code['ex_list_listing_code'];


               $a = str_replace("CX-","",$ex_list_listing_code,$count);

               if($a<6400){ 
                 $a = '6400';
               }else{
                 $a=$a+1;
               }
               $code = sprintf("CX-%'05d",$a);


                $strSQL = "INSERT INTO dbo_data_excel_listing ";
                $strSQL .="(ex_list_id , ex_list_listing_code , ex_list_deal_type , ex_list_contact_name , ex_list_other , ex_list_contact_tel , ex_list_contact_tel1_2 , ex_list_contact_tel1_3 , ex_list_contact_tel1_4 , ex_list_contact_lineid , ex_list_contact_email , ex_list_contact_whatsapp , ex_list_floor , ex_list_house_number , ex_list_sqm , ex_list_bedroom , ex_list_bathroom , ex_list_price  , ex_list_remark ,check_point ,ex_list_contact , ex_list_project , ex_list_date_create , ex_list_contract_type, ex_list_timestamp ,project_id) ";
                      $strSQL .="VALUES ";
                      $strSQL .="('','".$code."','".$list_deal_type."','".$ex_list_contact_name."','".$ex_list_other."','".$number1."','".$number2."','".$number3."','".$number4."','".$lineid."','".$email."','".$whatsapp."','".$floor."','".$number_room."','".$size."','".$bed."','".$bath."','".$price_s."','".$remark."','10' ,'20' ,'".$project."' ,'".$todate."' ,'3' ,'".$listing_code."'  ";  
               $strSQL .=",'".$project_id."') ";
                        $conn->query($strSQL);  

               /* echo $code."SALE"." Name : ".$ex_list_contact_name." N : ".$number_room." ชั้น:".$floor." | Project : ".$project_name_en." - ".$listing_code."<br>"; */
 

                 }
                if($rent!=''){ $list_deal_type='2';  $price_s=$rent; 

               $sql_list_code="SELECT ex_list_listing_code , ex_list_id FROM dbo_data_excel_listing order by ex_list_listing_code DESC";
               $result_list_code = $conn->query($sql_list_code); 
              // output data of each row
               $rs_code=$result_list_code->fetch_assoc();

               $ex_list_listing_code=$rs_code['ex_list_listing_code'];


               $a = str_replace("CX-","",$ex_list_listing_code,$count);

               if($a<6400){ 
                 $a = '6400';
               }else{
                 $a=$a+1;
               }
               $code = sprintf("CX-%'05d",$a);


                $strSQL = "INSERT INTO dbo_data_excel_listing ";
                $strSQL .="(ex_list_id , ex_list_listing_code , ex_list_deal_type , ex_list_contact_name , ex_list_other , ex_list_contact_tel , ex_list_contact_tel1_2 , ex_list_contact_tel1_3 , ex_list_contact_tel1_4 , ex_list_contact_lineid , ex_list_contact_email , ex_list_contact_whatsapp , ex_list_floor , ex_list_house_number , ex_list_sqm , ex_list_bedroom , ex_list_bathroom , ex_list_price  , ex_list_remark ,check_point ,ex_list_contact , ex_list_project , ex_list_date_create , ex_list_contract_type , ex_list_timestamp ,project_id) ";
                      $strSQL .="VALUES ";
                      $strSQL .="('','".$code."','".$list_deal_type."','".$ex_list_contact_name."','".$ex_list_other."','".$number1."','".$number2."','".$number3."','".$number4."','".$lineid."','".$email."','".$whatsapp."','".$floor."','".$number_room."','".$size."','".$bed."','".$bath."','".$price_s."','".$remark."','10' ,'20' ,'".$project."' ,'".$todate."' ,'3','".$listing_code."'   ";  
               $strSQL .=",'".$project_id."') ";
                        $conn->query($strSQL);  

               /* echo $code."RENT"." Name : ".$ex_list_contact_name." N : ".$number_room." ชั้น:".$floor." | Project : ".$project_name_en." - ".$listing_code."<br>";*/
  


              } 




            
     /*
          }else{  $no1++; 

                      echo   $listing_code." Project : ".$project."<br>";
         }*/

         

     }
       
?>