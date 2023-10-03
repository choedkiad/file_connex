 
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
        $tmpfname = "listing_new2565.xlsx";//กำหนดให้อ่านข้อมูลจากไฟล์จากไฟล์ชื่อ
       //สร้าง object สำหรับอ่านข้อมูล ชื่อ $excelReader
        $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
        $excelObj = $excelReader->load($tmpfname);//อ่านข้อมูลจากไฟล์ชื่อ test_excel.xlsx
        $worksheet = $excelObj->getSheet(0);//อ่านข้อมูลจาก sheet แรก
        $lastRow = $worksheet->getHighestRow(); 
       //นับว่า sheet แรกมีทั้งหมดกี่แถวแล้วเก็บจำนวนแถวไว้ในตัวแปรชื่อ $lastRow
   
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
               <td  style="padding: 5px;">CX</td>
               <td  style="padding: 5px;">ชื่อ OWNER</td>
               <td  style="padding: 5px;">เบอร์โทร1</td>
               <td>เบอร์โทร2</td>
               <td>เบอร์โทร3</td>
               <td>เบอร์โทร4</td>
               <td>type</td>
               <td>เฟอร์</td>
               <td></td> 
               <td></td>
               <td>ชั้นที่</td>
               <td>เลขที่ห้อง</td>
               <td>พื้นที่</td>
               <td>ห้องนอน</td>
               <td>ห้่องน้ำ</td>
               <td>ราคาขาย</td>
               <td>ราคาเช่า</td>
               <td>หมายเหตุ</td>
               <td>ชื่อโครงการ</td> 
               <td  style="padding: 5px;">CX NEW</td>            
           </tr>

           

<?php     $no=0;  $no1=0;  $cx=56600;
 
        for ($row = 1; $row <= $lastRow; $row++)//วน loop อ่านข้อมูลเอามาแสดงทีละแถว
       {   


        $listing_code=$worksheet->getCell('A'.$row)->getValue();
        $ex_list_contact_name=$worksheet->getCell('B'.$row)->getValue();//แสดงข้อมูลใน  ชื่อ
        $ex_list_other=$worksheet->getCell('C'.$row)->getValue();//แสดงข้อมูลใน เบอร์โทรรวม
        $number1=$worksheet->getCell('D'.$row)->getValue();//แสดงข้อมูลใน เบอร์โทร 1
        $number2=$worksheet->getCell('E'.$row)->getValue();//แสดงข้อมูลใน เบอร์โทร 2
        $number3=$worksheet->getCell('F'.$row)->getValue();//แสดงข้อมูลใน เบอร์โทร 3
        $number4=$worksheet->getCell('G'.$row)->getValue();//แสดงข้อมูลใน เบอร์โทร 4
        $type=$worksheet->getCell('H'.$row)->getValue();//แสดงข้อมูลใน  TYPE
        $furnished=$worksheet->getCell('I'.$row)->getValue();//แสดงข้อมูลใน furnished
        $whatsapp=$worksheet->getCell('J'.$row)->getValue();//แสดงข้อมูลใน --
        $wechat=$worksheet->getCell('K'.$row)->getValue();//แสดงข้อมูลใน ชั้น
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
 

        if($furnished=='FULLY FURNISHED'){
                $furnished='1';
        }else if($furnished=="PARTIAL FURNISHED"){
                $furnished='2';
        }else{
                $furnished='3';
        }


        if($type=='DUPLEX'){

                $type='1';

        }else if($type=='PENTHOUSE'){

                $type='2';

        }
 

 
     
        $price = str_replace(",","",$price,$count);
     
        $rent = str_replace(",","",$rent,$count);  
 

                $sql_project= "SELECT * FROM type_project WHERE project_name_en='$project'  "; 
                $result_project=$conn->query($sql_project);
                $rs_project=$result_project->fetch_assoc();

                $project_id=$rs_project['project_id'];
                $project_name_en=$rs_project['project_name_en'];




            if($price!='' and $listing_code!=''){ $deal_text='ขาย';  $cx++;



             $name_cx="CX-".$cx;


                       $sql_1="INSERT INTO dbo_data_excel_listing (ex_list_id  , ex_list_listing_code, ex_list_listing_type , ex_list_deal_type, project_id, ex_list_contract_type , ex_list_room_id , ex_list_furniture_id , ex_list_bedroom , ex_list_bathroom ,ex_list_sqm , ex_list_price , ex_list_contact_name , ex_list_contact_tel , ex_list_contact_tel1_2, ex_list_contact_tel1_3 , ex_list_contact_tel1_4 , ex_list_house_number , ex_list_floor , ex_list_date_create , check_point )
                          VALUES ('',  '$name_cx' , '1' , '1', '$project_id' , '3'  , '$type' , '$furnished' ,'$bed' ,'$bath' ,'$size' ,'$price' ,'$ex_list_contact_name' ,'$number1' ,'$number2' ,'$number3' ,'$number4' , '$number_room' , '$floor' , '$todate' , '25651222')";
                        mysqli_query($conn, $sql_1);  

            ?>
                                    
                                 <tr style="color: red;">
                       
                                     <td><?php echo $listing_code;?></td> 
                                     <td><?php echo $ex_list_contact_name;?></td>
                                     <td><?php echo "'".$number1;?></td>
                                     <td><?php echo "'".$number2;?></td>
                                     <td><?php echo "'".$number3;?></td>
                                     <td><?php echo "'".$number4;?></td>
                                     <td><?php echo $type;?></td>
                                     <td><?php echo $furnished;?></td>
                                     <td></td>
                                     <td></td>
                                     <td><?php echo $floor;?></td>
                                     <td><?php echo "'".$number_room;?></td> 
                                     <td><?php echo $size;?></td> 
                                     <td><?php echo $bed;?></td>
                                     <td><?php echo $bath;?></td>
                                     <td><?php echo $price;?></td>
                                     <td></td>
                                     <td><?php echo $remark;?></td>
                                     <td><?php echo $project_id." : ".$project_name_en;?></td>
                                     <td><?php echo $name_cx;?></td>
                                   
                                 </tr>


            <?php
            }

             if($rent!='' and $listing_code!=''){   $deal_text='เช่า';   $cx++;
                 

             $name_cx="CX-".$cx;

                       $sql_1="INSERT INTO dbo_data_excel_listing (ex_list_id  , ex_list_listing_code, ex_list_listing_type , ex_list_deal_type, project_id, ex_list_contract_type , ex_list_room_id , ex_list_furniture_id , ex_list_bedroom , ex_list_bathroom ,ex_list_sqm , ex_list_price , ex_list_contact_name , ex_list_contact_tel , ex_list_contact_tel1_2, ex_list_contact_tel1_3 , ex_list_contact_tel1_4 , ex_list_house_number , ex_list_floor , ex_list_date_create , check_point )
                          VALUES ('', '$name_cx' , '1' , '2', '$project_id' , '3'  , '$type' , '$furnished' ,'$bed' ,'$bath' ,'$size' ,'$rent' ,'$ex_list_contact_name' ,'$number1' ,'$number2' ,'$number3' ,'$number4' , '$number_room' , '$floor' , '$todate' , '25651222')";
                        mysqli_query($conn, $sql_1);  


                     ?>  
                                    
                                 <tr style="color: red;">
                                   
                                     <td><?php echo $listing_code;?></td> 
                                     <td><?php echo $ex_list_contact_name;?></td>
                                     <td><?php echo "'".$number1;?></td>
                                     <td><?php echo "'".$number2;?></td>
                                     <td><?php echo "'".$number3;?></td>
                                     <td><?php echo "'".$number4;?></td>
                                     <td><?php echo $type;?></td>
                                     <td><?php echo $furnished;?></td>
                                     <td></td>
                                     <td></td>
                                     <td><?php echo $floor;?></td>
                                     <td><?php echo "'".$number_room;?></td> 
                                     <td><?php echo $size;?></td> 
                                     <td><?php echo $bed;?></td>
                                     <td><?php echo $bath;?></td>
                                     <td></td>
                                     <td><?php echo $rent;?></td>
                                     <td><?php echo $remark;?></td>
                                     <td><?php echo $project_id." : ".$project_name_en;?></td>
                                     <td><?php echo $name_cx;?></td>
                                   
                                 </tr>
                      
                      
  

                        <!--  <p style="color: red;"><?php  echo $no.". ซ้ำ - ".$listing_code." LIST ซ้ำ  ".$rs_listing['ex_list_listing_code']; ?></p> -->
         <?php    
                   

             }

    }       
?>


</table>