 
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
               <td style="padding: 5px;">No.</td>
               <td  style="padding: 5px;">ซ้ำข้อที่</td>
               <td  style="padding: 5px;">ประเภทดีล</td>
               <td>CX ในExcel</td>
               <td>GEN CX ไม่ซ้ำ</td>
               <td>Projects</td>
               <td>เลขที่ห้อง</td>
               <td>ห้องนอน</td>
               <td>ชั้นที่</td> 
               <td>พื้นที่ใช้สอย</td>
               <td>ราคา</td>
               <td>เบอร์โทรศัพท์</td>
               <td>ข้อมูลในระบบ</td>
               <td>CX ในระบ</td>
               <td>Projects</td>
               <td>เลขที่ห้อง</td>
               <td>ห้องนอน</td>
               <td>ชั้นที่</td>
               <td>พื้นที่ใช้สอย</td>
               <td>ราคา</td>
               <td>เบอร์โทรศัพท์</td>
               <td>status</td>
               <td>remark</td>
           </tr>

           

<?php
 
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

                if($price!=''){ $list_deal_type='1';  }
                else if($rent!=''){ $list_deal_type='2';  }


                $check_n_r=strpos($number_room,"/");

                if($check_n_r!=''){

                    $number_r_1=substr($number_room,0 , $check_n_r);
                    $number_r_2=substr($number_room,$check_n_r+1 ,15 );

                    $number_r_2 = str_replace(" ","",$number_r_2,$count);  

                }else{
                      $number_r_2=$number_room;
                }
                


             
  
  
      $sql_data_check="SELECT * FROM dbo_data_excel_listing 
                     where project_id='$project_id'  

                         /*
                             (ex_list_house_number LIKE '%$number_room%' and  ex_list_floor='$floor'
                            and  project_id='$project_id' and ex_list_bedroom LIKE '%$bed%' and ex_list_sqm>$per_2 and  ex_list_sqm<$per_1 
                            and  ex_list_contact_tel=$number1 
                            or
                            ex_list_house_number LIKE '%$number_room%' and  ex_list_floor='$floor'
                            and  project_id='$project_id' and ex_list_bedroom LIKE '%$bed%' and ex_list_sqm>$per_2 and  ex_list_sqm<$per_1 
                            and  ex_list_contact_tel1_2=$number1 
                            or
                            ex_list_house_number LIKE '%$number_room%' and  ex_list_floor='$floor'
                            and  project_id='$project_id' and ex_list_bedroom LIKE '%$bed%' and ex_list_sqm>$per_2 and  ex_list_sqm<$per_1 
                            and  ex_list_contact_tel1_3=$number1 
                            or
                            ex_list_house_number LIKE '%$number_room%' and  ex_list_floor='$floor'
                            and  project_id='$project_id' and ex_list_bedroom LIKE '%$bed%' and ex_list_sqm>$per_2 and  ex_list_sqm<$per_1 
                            and  ex_list_contact_tel1_4=$number1  
                             ) 
                     
                            or

                            (ex_list_house_number LIKE '%$number_room%' and  ex_list_floor='$floor'
                            and  project_id='$project_id' and ex_list_bedroom LIKE '%$bed%' and ex_list_sqm>$per_2 and  ex_list_sqm<$per_1 
                            and  ex_list_contact_tel=$number2 
                            or
                            ex_list_house_number LIKE '%$number_room%' and  ex_list_floor='$floor'
                            and  project_id='$project_id' and ex_list_bedroom LIKE '%$bed%' and ex_list_sqm>$per_2 and  ex_list_sqm<$per_1 
                            and  ex_list_contact_tel1_2=$number2 
                            or
                            ex_list_house_number LIKE '%$number_room%' and  ex_list_floor='$floor'
                            and  project_id='$project_id' and ex_list_bedroom LIKE '%$bed%' and ex_list_sqm>$per_2 and  ex_list_sqm<$per_1 
                            and  ex_list_contact_tel1_3=$number2 
                            or
                            ex_list_house_number LIKE '%$number_room%' and  ex_list_floor='$floor'
                            and  project_id='$project_id' and ex_list_bedroom LIKE '%$bed%' and ex_list_sqm>$per_2 and  ex_list_sqm<$per_1 
                            and  ex_list_contact_tel1_4=$number2  
                             )   

                              or

                            (ex_list_house_number LIKE '%$number_room%' and  ex_list_floor='$floor'
                            and  project_id='$project_id' and ex_list_bedroom LIKE '%$bed%' and ex_list_sqm>$per_2 and  ex_list_sqm<$per_1 
                            and  ex_list_contact_tel=$number3
                            or
                            ex_list_house_number LIKE '%$number_room%' and  ex_list_floor='$floor'
                            and  project_id='$project_id' and ex_list_bedroom LIKE '%$bed%' and ex_list_sqm>$per_2 and  ex_list_sqm<$per_1 
                            and  ex_list_contact_tel1_2=$number3 
                            or
                            ex_list_house_number LIKE '%$number_room%' and  ex_list_floor='$floor'
                            and  project_id='$project_id' and ex_list_bedroom LIKE '%$bed%' and ex_list_sqm>$per_2 and  ex_list_sqm<$per_1 
                            and  ex_list_contact_tel1_3=$number3 
                            or
                            ex_list_house_number LIKE '%$number_room%' and  ex_list_floor='$floor'
                            and  project_id='$project_id' and ex_list_bedroom LIKE '%$bed%' and ex_list_sqm>$per_2 and  ex_list_sqm<$per_1 
                            and  ex_list_contact_tel1_4=$number3  
                             )   

                              or

                            (ex_list_house_number LIKE '%$number_room%' and  ex_list_floor='$floor'
                            and  project_id='$project_id' and ex_list_bedroom LIKE '%$bed%' and ex_list_sqm>$per_2 and  ex_list_sqm<$per_1 
                            and  ex_list_contact_tel=$number4
                            or
                            ex_list_house_number LIKE '%$number_room%' and  ex_list_floor='$floor'
                            and  project_id='$project_id' and ex_list_bedroom LIKE '%$bed%' and ex_list_sqm>$per_2 and  ex_list_sqm<$per_1 
                            and  ex_list_contact_tel1_2=$number4
                            or
                            ex_list_house_number LIKE '%$number_room%' and  ex_list_floor='$floor'
                            and  project_id='$project_id' and ex_list_bedroom LIKE '%$bed%' and ex_list_sqm>$per_2 and  ex_list_sqm<$per_1 
                            and  ex_list_contact_tel1_3=$number4 
                            or
                            ex_list_house_number LIKE '%$number_room%' and  ex_list_floor='$floor'
                            and  project_id='$project_id' and ex_list_bedroom LIKE '%$bed%' and ex_list_sqm>$per_2 and  ex_list_sqm<$per_1 
                            and  ex_list_contact_tel1_4=$number4  
                             )     */
                     "; 
     $result_data_check=$conn->query($sql_data_check); 

     $num=$result_data_check->num_rows;

     $no=0;  $no1=0;  $cx=0;
     
 
           if($result_data_check->num_rows > 0) {   

                while($rs_listing=$result_data_check->fetch_assoc()){ $no++;   $cx++; 


                   $ex_list_house_number=$rs_listing['ex_list_house_number'];
                   $ex_list_floor=$rs_listing['ex_list_floor'];
                   $ex_list_listing_code=$rs_listing['ex_list_listing_code'];
                   $ex_list_deal_type=$rs_listing['ex_list_deal_type'];
                   $ex_list_sqm=$rs_listing['ex_list_sqm'];
                   $ex_list_bedroom=$rs_listing['ex_list_bedroom'];
                   $ex_list_contact_tel=$rs_listing['ex_list_contact_tel'];
                   $ex_list_contact_tel1_2=$rs_listing['ex_list_contact_tel1_2'];
                   $ex_list_contact_tel1_3=$rs_listing['ex_list_contact_tel1_3'];
                   $ex_list_contact_tel1_4=$rs_listing['ex_list_contact_tel1_4'];
                   $ex_list_contact_tel_2=$rs_listing['ex_list_contact_tel_2'];
                   $ex_list_contact_tel2_2=$rs_listing['ex_list_contact_tel2_2'];
                   $ex_list_contact_tel2_3=$rs_listing['ex_list_contact_tel2_3'];
                   $ex_list_contact_tel2_4=$rs_listing['ex_list_contact_tel2_4'];     
                   $ex_list_contact_tel2_4=$rs_listing['ex_list_contact_tel2_4']; 
                   $ex_list_price=$rs_listing['ex_list_price'];                
                   $ex_list_listing_status=$rs_listing['ex_list_listing_status'];      
                   $ex_list_remark=$rs_listing['ex_list_remark'];       



         if($ex_list_listing_status=='' or $ex_list_listing_status=='0'){ $ex_list_listing_status="No Status"; $stauts_list_color="#000";  }
         else if($ex_list_listing_status=='1'){ $ex_list_listing_status="Available"; $stauts_list_color="#42d700"; }
         else if($ex_list_listing_status=='2'){ $ex_list_listing_status="Contracted ไม่ล็อคสิทธิ"; $stauts_list_color="#42d700"; }
         else if($ex_list_listing_status=='3'){ $ex_list_listing_status="Rented";  $ex_list_rent_till=$ex_list_rent_till; 
                                          //เช็ควันหมดอายุ
                                         if($ex_list_rent_till_date<=$calExpireDate){ $stauts_list_color="#ffa200"; $expire_check=' <span class="right badge badge-danger">New</span>';  
                                          }else{  $stauts_list_color="#ff0000";  $expire_check=''; } 

                                                   
                                         }
         else if($ex_list_listing_status=='4'){ $ex_list_listing_status="Sold(by Connex)";  $stauts_list_color="#ff0000"; }
         else if($ex_list_listing_status=='5'){ $ex_list_listing_status="Sold(by Others)"; $stauts_list_color="#ff0000"; }
         else if($ex_list_listing_status=='6'){ $ex_list_listing_status="own use"; $stauts_list_color="#ff0000"; }
         else if($ex_list_listing_status=='7'){ $ex_list_listing_status="unknown"; $stauts_list_color="#000cff"; }


                          $ex_list_house_number=$rs_listing['ex_list_house_number']; 
                          $house_number_n_r=strpos($ex_list_house_number,"/");
                         

                        if($house_number_n_r!=''){
                           $house_number_r_1=substr($ex_list_house_number,0 , $house_number_n_r);
                           $house_number_r_2=substr($ex_list_house_number,$house_number_n_r+1 ,15 );

                           $house_number_r_2 = str_replace(" ","",$house_number_r_2,$count);  

                        }else{
                           $house_number_r_2=$ex_list_house_number;
                        }

                          $ex_list_sqm=$rs_listing['ex_list_sqm'];


           
                    if($house_number_r_2==$number_r_2 and  $number_room!=''and  $number_room!='-' and  $number_room!='_'){   

                           if( $number1==$ex_list_contact_tel and $number1!='' 
                              or $number1==$ex_list_contact_tel1_2 and $number1!='' 
                              or $number1==$ex_list_contact_tel1_3 and $number1!='' 
                              or $number1==$ex_list_contact_tel1_4 and $number1!='' 
                              or $number2==$ex_list_contact_tel  and $number2!=''
                              or $number2==$ex_list_contact_tel1_2  and $number2!=''
                              or $number2==$ex_list_contact_tel1_3  and $number2!=''
                              or $number2==$ex_list_contact_tel1_4  and $number2!=''
                              or $number3==$ex_list_contact_tel  and $number3!=''
                              or $number3==$ex_list_contact_tel1_2  and $number3!=''
                              or $number3==$ex_list_contact_tel1_3  and $number3!=''
                              or $number3==$ex_list_contact_tel1_4  and $number3!=''
                              or $number4==$ex_list_contact_tel  and $number4!=''
                              or $number4==$ex_list_contact_tel1_2  and $number4!=''
                              or $number4==$ex_list_contact_tel1_3  and $number4!=''
                              or $number4==$ex_list_contact_tel1_4  and $number4!=''
                              or $number1==$ex_list_contact_tel_2  and $number1!=''
                              or $number1==$ex_list_contact_tel2_2  and $number1!=''
                              or $number1==$ex_list_contact_tel2_3  and $number1!=''
                              or $number1==$ex_list_contact_tel2_4  and $number1!=''
                              or $number2==$ex_list_contact_tel_2  and $number2!=''
                              or $number2==$ex_list_contact_tel2_2  and $number2!=''
                              or $number2==$ex_list_contact_tel2_3  and $number2!=''
                              or $number2==$ex_list_contact_tel2_4  and $number2!=''
                              or $number3==$ex_list_contact_tel_2  and $number3!=''
                              or $number3==$ex_list_contact_tel2_2  and $number3!=''
                              or $number3==$ex_list_contact_tel2_3  and $number3!=''
                              or $number3==$ex_list_contact_tel2_4  and $number3!=''
                              or $number4==$ex_list_contact_tel_2  and $number4!=''
                              or $number4==$ex_list_contact_tel2_2  and $number4!=''
                              or $number4==$ex_list_contact_tel2_3  and $number4!=''
                              or $number4==$ex_list_contact_tel2_4  and $number4!=''

                            ) {  $no_2++;  
                          /*
                                echo   $listing_code." number : ".$number_room." | ".$check_n_r." แยก".$number_r_1จ."|".$number_r_2." ข้อมูลที่เจอ : ".$ex_list_house_number."-".$house_number_r_1."_".$house_number_r_2."| <br>"; */
                           
                              if($price!='' and $ex_list_deal_type=='1'){ $deal_text='ขาย';
                     ?>  
                                    
                                 <tr style="color: red;">
                                     <td><?php echo $no_2;?></td>
                                     <td>1</td> 
                                     <td><?php echo $deal_text;?></td>
                                     <td><?php echo $listing_code;?></td>
                                     <td><?php echo ;?></td>
                                     <td><?php echo $project_name_en;?></td>
                                     <td><?php echo "'".$number_room;?></td>
                                     <td><?php echo $bed;?></td>
                                     <td><?php echo $floor;?></td> 
                                     <td><?php echo $size;?></td> 
                                     <td><?php echo $price;?></td>
                                     <td><?php echo $number1." , ".$number2." , ".$number3." , ".$number4;?></td>
                                     <td></td>
                                     <td><?php echo $ex_list_listing_code;?></td>
                                     <td><?php echo $project_name_en;?></td>
                                     <td><?php echo "'".$ex_list_house_number;?></td>
                                     <td><?php echo $ex_list_bedroom;?></td>
                                     <td><?php echo $ex_list_floor;?></td>
                                     <td><?php echo $ex_list_sqm;?></td>
                                     <td><?php echo number_format($ex_list_price);?></td>
                                     <td><?php echo $ex_list_contact_tel." , ".$ex_list_contact_tel1_2." , ".$ex_list_contact_tel1_3." , ".$ex_list_contact_tel1_4." , ".$ex_list_contact_tel_2." , ".$ex_list_contact_tel2_2." , ".$ex_list_contact_tel2_3." , ".$ex_list_contact_tel2_4." , ";?></td>
                                     <td><?php echo $ex_list_listing_status;?></td>
                                     <td><?php echo $ex_list_remark;?></td>
                                 </tr>
                      
                      <?php } if($rent!='' and $ex_list_deal_type=='2'){   $deal_text='เช่า';  ?>

                                 <tr style="color: red;">
                                     <td><?php echo $no_2;?></td>
                                     <td>1</td>
                                     <td><?php echo $deal_text;?></td>
                                     <td><?php echo $listing_code;?></td>
                                     <td><?php echo $project_name_en;?></td>
                                     <td><?php echo "'".$number_room;?></td>
                                     <td><?php echo $bed;?></td>
                                     <td><?php echo $floor;?></td> 
                                     <td><?php echo $size;?></td>
                                     <td><?php echo $rent;?></td>
                                     <td><?php echo $number1." , ".$number2." , ".$number3." , ".$number4;?></td>
                                     <td></td>
                                     <td><?php echo $ex_list_listing_code;?></td>
                                     <td><?php echo $project_name_en;?></td>
                                     <td><?php echo "'".$ex_list_house_number;?></td>
                                     <td><?php echo $ex_list_bedroom;?></td>
                                     <td><?php echo $ex_list_floor;?></td>
                                     <td><?php echo $ex_list_sqm;?></td>
                                     <td><?php echo number_format($ex_list_price);?></td>
                                     <td><?php echo $ex_list_contact_tel." , ".$ex_list_contact_tel1_2." , ".$ex_list_contact_tel1_3." , ".$ex_list_contact_tel1_4." , ".$ex_list_contact_tel_2." , ".$ex_list_contact_tel2_2." , ".$ex_list_contact_tel2_3." , ".$ex_list_contact_tel2_4." , ";?></td>
                                     <td><?php echo $ex_list_listing_status;?></td>
                                     <td><?php echo $ex_list_remark;?></td>

                                 </tr>

                      <?php } ?>

                              <?php

                               /*
                              $sql = "UPDATE dbo_data_excel_listing SET 
                                        ex_list_close='1',
                                        ex_list_close_date='".$todate."'
                                        WHERE ex_list_timestamp='".$listing_code."' and ex_list_deal_type='".$list_deal_type."' "; 


                              if ($conn->query($sql) === TRUE) {   *//*
                                    echo $no_2.".".$list_deal_type."-"."เบอร์ตรง ".$listing_code." N : ".$number_room." ชั้น:".$floor." | ข้อมูลในระบบ : ".$ex_list_listing_code." : N ".$ex_list_house_number." ชั้น :".$ex_list_floor."| ซ้ำ ข้อ1<br>";*/
                             /* } */

                           
                                 ?>
                             
                      <?php }else if($floor==$ex_list_floor){    $no_2++;   ?>

                      
                          <?php if($price!='' and $ex_list_deal_type=='1'){ $deal_text='ขาย';  ?>

                                     <tr style="color: #800080 ;">
                                         <td><?php echo $no_2;?></td>
                                         <td>2</td>
                                         <td><?php echo $deal_text;?></td>
                                         <td><?php echo $listing_code;?></td>
                                         <td><?php echo $project_name_en;?></td>
                                         <td><?php echo "'".$number_room;?></td>
                                         <td><?php echo $bed;?></td>
                                         <td><?php echo $floor;?></td> 
                                         <td><?php echo $size;?></td>
                                         <td><?php echo $price;?></td>
                                         <td><?php echo $number1." , ".$number2." , ".$number3." , ".$number4;?></td>
                                         <td></td>
                                         <td><?php echo $ex_list_listing_code;?></td>
                                         <td><?php echo $project_name_en;?></td>
                                         <td><?php echo "'".$ex_list_house_number ;?></td>
                                         <td><?php echo $ex_list_bedroom;?></td>
                                         <td><?php echo $ex_list_floor;?></td>
                                         <td><?php echo $ex_list_sqm;?></td>
                                         <td><?php echo number_format($ex_list_price);?></td>
                                         <td><?php echo $ex_list_contact_tel." , ".$ex_list_contact_tel1_2." , ".$ex_list_contact_tel1_3." , ".$ex_list_contact_tel1_4." , ".$ex_list_contact_tel_2." , ".$ex_list_contact_tel2_2." , ".$ex_list_contact_tel2_3." , ".$ex_list_contact_tel2_4." , ";?></td>
                                         <td><?php echo $ex_list_listing_status;?></td>
                                         <td><?php echo $ex_list_remark;?></td>
                                     </tr>

                           <?php } if($rent!='' and $ex_list_deal_type=='2'){ $deal_text='เช่า'; ?>

                                     <tr style="color: #800080 ;">
                                         <td><?php echo $no_2;?></td>
                                         <td>2</td>
                                         <td><?php echo $deal_text;?></td>
                                         <td><?php echo $listing_code;?></td>
                                         <td><?php echo $project_name_en;?></td>
                                         <td><?php echo "'".$number_room;?></td>
                                         <td><?php echo $bed;?></td>
                                         <td><?php echo $floor;?></td> 
                                         <td><?php echo $size;?></td>
                                         <td><?php echo $rent;?></td>
                                         <td><?php echo $number1." , ".$number2." , ".$number3." , ".$number4;?></td>
                                         <td></td>
                                         <td><?php echo $ex_list_listing_code;?></td>
                                         <td><?php echo $project_name_en;?></td>
                                         <td><?php echo "'".$ex_list_house_number ;?></td>
                                         <td><?php echo $ex_list_bedroom;?></td>
                                         <td><?php echo $ex_list_floor;?></td>
                                         <td><?php echo $ex_list_sqm;?></td>
                                         <td><?php echo number_format($ex_list_price);?></td>
                                         <td><?php echo $ex_list_contact_tel." , ".$ex_list_contact_tel1_2." , ".$ex_list_contact_tel1_3." , ".$ex_list_contact_tel1_4." , ".$ex_list_contact_tel_2." , ".$ex_list_contact_tel2_2." , ".$ex_list_contact_tel2_3." , ".$ex_list_contact_tel2_4." , ";?></td>
                                         <td><?php echo $ex_list_listing_status;?></td>
                                         <td><?php echo $ex_list_remark;?></td>
                                     </tr>

                           <?php } ?>

                                  <?php 

                           /*
                              $sql = "UPDATE dbo_data_excel_listing SET 
                                        ex_list_close='1',
                                        ex_list_close_date='".$todate."'
                                        WHERE ex_list_timestamp='".$listing_code."' and ex_list_deal_type='".$list_deal_type."' "; 


                              if ($conn->query($sql) === TRUE) {   *//*

                                  echo $no_2.".".$list_deal_type."-".$listing_code." เลขที่ : ".$number_room." ชั้น:".$floor." | ข้อมูลในระบบ ".$ex_list_listing_code."  เลขที่ :  ".$ex_list_house_number." ".$house_number_r_2." ชั้น :".$ex_list_floor."| ซ้ำ ข้อ2<br>"; */
                             /*  }  */ ?>
                           
                      <?php } ?>

             <?php  }else if($floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and $number1==$ex_list_contact_tel and $number1!='' 
                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and $number1==$ex_list_contact_tel1_2 and $number1!=''
                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and $number1==$ex_list_contact_tel1_3 and $number1!=''
                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and $number1==$ex_list_contact_tel1_4 and $number1!=''
                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and $number2==$ex_list_contact_tel  and $number2!=''
                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and $number2==$ex_list_contact_tel1_2 and $number2!=''
                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and $number2==$ex_list_contact_tel1_3 and $number2!=''
                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and $number2==$ex_list_contact_tel1_4 and $number2!=''
                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and $number3==$ex_list_contact_tel and $number3!=''
                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and $number3==$ex_list_contact_tel1_2 and $number3!=''
                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and $number3==$ex_list_contact_tel1_3 and $number3!='' 
                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and $number3==$ex_list_contact_tel1_4 and $number3!='' 
                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and $number4==$ex_list_contact_tel and $number4!='' 
                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and $number4==$ex_list_contact_tel1_2 and $number4!=''
                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and $number4==$ex_list_contact_tel1_3 and $number4!=''
                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and $number4==$ex_list_contact_tel1_4 and $number4!=''
                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and $number1==$ex_list_contact_tel_2 and $number1!=''
                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and $number1==$ex_list_contact_tel2_2 and $number1!=''
                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and $number1==$ex_list_contact_tel2_3 and $number1!=''
                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and $number1==$ex_list_contact_tel2_4 and $number1!=''
                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and $number2==$ex_list_contact_tel_2 and $number2!=''
                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and $number2==$ex_list_contact_tel2_2 and $number2!=''
                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and $number2==$ex_list_contact_tel2_3 and $number2!=''
                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and $number2==$ex_list_contact_tel2_4 and $number2!=''
                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and $number3==$ex_list_contact_tel_2  and $number3!=''
                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and $number3==$ex_list_contact_tel2_2 and $number3!=''
                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and $number3==$ex_list_contact_tel2_3 and $number3!='' 
                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and $number3==$ex_list_contact_tel2_4 and $number3!='' 
                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and $number4==$ex_list_contact_tel_2 and $number4!=''
                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and $number4==$ex_list_contact_tel2_2 and $number4!='' 
                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and $number4==$ex_list_contact_tel2_3 and $number4!='' 
                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and $number4==$ex_list_contact_tel2_4 and $number4!=''                       
  
                            ){ 



                            if($ex_list_bedroom==$bed) {  $no_2++;   


                                 if( $number1==$ex_list_contact_tel and $number1!='' 
                                    or $number1==$ex_list_contact_tel1_2 and $number1!='' 
                                    or $number1==$ex_list_contact_tel1_3 and $number1!='' 
                                    or $number1==$ex_list_contact_tel1_4 and $number1!='' 
                                    or $number2==$ex_list_contact_tel  and $number2!=''
                                    or $number2==$ex_list_contact_tel1_2  and $number2!=''
                                    or $number2==$ex_list_contact_tel1_3  and $number2!=''
                                    or $number2==$ex_list_contact_tel1_4  and $number2!=''
                                    or $number3==$ex_list_contact_tel  and $number3!=''
                                    or $number3==$ex_list_contact_tel1_2  and $number3!=''
                                    or $number3==$ex_list_contact_tel1_3  and $number3!=''
                                    or $number3==$ex_list_contact_tel1_4  and $number3!=''
                                    or $number4==$ex_list_contact_tel  and $number4!=''
                                    or $number4==$ex_list_contact_tel1_2  and $number4!=''
                                    or $number4==$ex_list_contact_tel1_3  and $number4!=''
                                    or $number4==$ex_list_contact_tel1_4  and $number4!=''
                                    or $number1==$ex_list_contact_tel_2  and $number1!=''
                                    or $number1==$ex_list_contact_tel2_2  and $number1!=''
                                    or $number1==$ex_list_contact_tel2_3  and $number1!=''
                                    or $number1==$ex_list_contact_tel2_4  and $number1!=''
                                    or $number2==$ex_list_contact_tel_2  and $number2!=''
                                    or $number2==$ex_list_contact_tel2_2  and $number2!=''
                                    or $number2==$ex_list_contact_tel2_3  and $number2!=''
                                    or $number2==$ex_list_contact_tel2_4  and $number2!=''
                                    or $number3==$ex_list_contact_tel_2  and $number3!=''
                                    or $number3==$ex_list_contact_tel2_2  and $number3!=''
                                    or $number3==$ex_list_contact_tel2_3  and $number3!=''
                                    or $number3==$ex_list_contact_tel2_4  and $number3!=''
                                    or $number4==$ex_list_contact_tel_2  and $number4!=''
                                    or $number4==$ex_list_contact_tel2_2  and $number4!=''
                                    or $number4==$ex_list_contact_tel2_3  and $number4!=''
                                    or $number4==$ex_list_contact_tel2_4  and $number4!=''

                                  ) { 
 

                              ?>


                                      <?php if($price!='' and $ex_list_deal_type=='1'){ $deal_text='ขาย'; ?>

                                                 <tr style="color: blue;">
                                                     <td><?php echo $no_2;?></td>
                                                     <td>3.1</td>
                                                     <td><?php echo $deal_text;?></td>
                                                     <td><?php echo $listing_code;?></td>
                                                     <td><?php echo $project_name_en;?></td>
                                                     <td><?php echo "'".$number_room;?></td>
                                                     <td><?php echo $bed;?></td>
                                                     <td><?php echo $floor;?></td> 
                                                     <td><?php echo $size;?></td>
                                                     <td><?php echo $price;?></td>
                                                     <td><?php echo $number1." , ".$number2." , ".$number3." , ".$number4;?></td>
                                                     <td></td>
                                                     <td><?php echo $ex_list_listing_code;?></td>
                                                     <td><?php echo $project_name_en;?></td>
                                                     <td><?php echo "'".$ex_list_house_number ;?></td>
                                                     <td><?php echo $ex_list_bedroom;?></td>
                                                     <td><?php echo $ex_list_floor;?></td>
                                                     <td><?php echo $ex_list_sqm;?></td>
                                                     <td><?php echo number_format($ex_list_price);?></td>
                                                     <td><?php echo $ex_list_contact_tel." , ".$ex_list_contact_tel1_2." , ".$ex_list_contact_tel1_3." , ".$ex_list_contact_tel1_4." , ".$ex_list_contact_tel_2." , ".$ex_list_contact_tel2_2." , ".$ex_list_contact_tel2_3." , ".$ex_list_contact_tel2_4." , ";?></td>
                                                     <td><?php echo $ex_list_listing_status;?></td>
                                                     <td><?php echo $ex_list_remark;?></td>
                                                 </tr>

                                      <?php } if($rent!='' and $ex_list_deal_type=='2'){ $deal_text='เช่า'; ?>

                                                 <tr style="color: blue;">
                                                     <td><?php echo $no_2;?></td>
                                                     <td>3.1</td>
                                                     <td><?php echo $deal_text;?></td>
                                                     <td><?php echo $listing_code;?></td>
                                                     <td><?php echo $project_name_en;?></td>
                                                     <td><?php echo "'".$number_room;?></td>
                                                     <td><?php echo $bed;?></td>
                                                     <td><?php echo $floor;?></td> 
                                                     <td><?php echo $size;?></td>
                                                     <td><?php echo $rent;?></td>
                                                     <td><?php echo $number1." , ".$number2." , ".$number3." , ".$number4;?></td>
                                                     <td></td>
                                                     <td><?php echo $ex_list_listing_code;?></td>
                                                     <td><?php echo $project_name_en;?></td>
                                                     <td><?php echo "'".$ex_list_house_number ;?></td>
                                                     <td><?php echo $ex_list_bedroom;?></td>
                                                     <td><?php echo $ex_list_floor;?></td>
                                                     <td><?php echo $ex_list_sqm;?></td>
                                                     <td><?php echo number_format($ex_list_price);?></td>
                                                     <td><?php echo $ex_list_contact_tel." , ".$ex_list_contact_tel1_2." , ".$ex_list_contact_tel1_3." , ".$ex_list_contact_tel1_4." , ".$ex_list_contact_tel_2." , ".$ex_list_contact_tel2_2." , ".$ex_list_contact_tel2_3." , ".$ex_list_contact_tel2_4." , ";?></td>
                                                     <td><?php echo $ex_list_listing_status;?></td>
                                                     <td><?php echo $ex_list_remark;?></td>
                                                 </tr>

                                      <?php } ?>


                      <?php     }else{ ?>




                                      <?php if($price!='' and $ex_list_deal_type=='1'){ $deal_text='ขาย'; ?>

                                                 <tr style="color: black;">
                                                     <td><?php echo $no_2;?></td>
                                                     <td>3.2</td>
                                                     <td><?php echo $deal_text;?></td>
                                                     <td><?php echo $listing_code;?></td>
                                                     <td><?php echo $project_name_en;?></td>
                                                     <td><?php echo "'".$number_room;?></td>
                                                     <td><?php echo $bed;?></td>
                                                     <td><?php echo $floor;?></td> 
                                                     <td><?php echo $size;?></td>
                                                     <td><?php echo $price;?></td>
                                                     <td><?php echo $number1." , ".$number2." , ".$number3." , ".$number4;?></td>
                                                     <td></td>
                                                     <td><?php echo $ex_list_listing_code;?></td>
                                                     <td><?php echo $project_name_en;?></td>
                                                     <td><?php echo "'".$ex_list_house_number ;?></td>
                                                     <td><?php echo $ex_list_bedroom;?></td>
                                                     <td><?php echo $ex_list_floor;?></td>
                                                     <td><?php echo $ex_list_sqm;?></td>
                                                     <td><?php echo number_format($ex_list_price);?></td>
                                                     <td><?php echo $ex_list_contact_tel." , ".$ex_list_contact_tel1_2." , ".$ex_list_contact_tel1_3." , ".$ex_list_contact_tel1_4." , ".$ex_list_contact_tel_2." , ".$ex_list_contact_tel2_2." , ".$ex_list_contact_tel2_3." , ".$ex_list_contact_tel2_4." , ";?></td>
                                                     <td><?php echo $ex_list_listing_status;?></td>
                                                     <td><?php echo $ex_list_remark;?></td>
                                                 </tr>

                                      <?php } if($rent!='' and $ex_list_deal_type=='2'){ $deal_text='เช่า'; ?>

                                                 <tr style="color: black;">
                                                     <td><?php echo $no_2;?></td>
                                                     <td>3.2</td>
                                                     <td><?php echo $deal_text;?></td>
                                                     <td><?php echo $listing_code;?></td>
                                                     <td><?php echo $project_name_en;?></td>
                                                     <td><?php echo "'".$number_room;?></td>
                                                     <td><?php echo $bed;?></td>
                                                     <td><?php echo $floor;?></td> 
                                                     <td><?php echo $size;?></td>
                                                     <td><?php echo $rent;?></td>
                                                     <td><?php echo $number1." , ".$number2." , ".$number3." , ".$number4;?></td>
                                                     <td></td>
                                                     <td><?php echo $ex_list_listing_code;?></td>
                                                     <td><?php echo $project_name_en;?></td>
                                                     <td><?php echo "'".$ex_list_house_number ;?></td>
                                                     <td><?php echo $ex_list_bedroom;?></td>
                                                     <td><?php echo $ex_list_floor;?></td>
                                                     <td><?php echo $ex_list_sqm;?></td>
                                                     <td><?php echo number_format($ex_list_price);?></td>
                                                     <td><?php echo $ex_list_contact_tel." , ".$ex_list_contact_tel1_2." , ".$ex_list_contact_tel1_3." , ".$ex_list_contact_tel1_4." , ".$ex_list_contact_tel_2." , ".$ex_list_contact_tel2_2." , ".$ex_list_contact_tel2_3." , ".$ex_list_contact_tel2_4." , ";?></td>
                                                     <td><?php echo $ex_list_listing_status;?></td>
                                                     <td><?php echo $ex_list_remark;?></td>
                                                 </tr>

                                      <?php } ?>

                            <?php } ?>
                    
                           <?php 
                         /*
                              $sql = "UPDATE dbo_data_excel_listing SET 
                                        ex_list_close='1',
                                        ex_list_close_date='".$todate."'
                                        WHERE ex_list_timestamp='".$listing_code."' and ex_list_deal_type='".$list_deal_type."'"; 

                              if ($conn->query($sql) === TRUE) {  */

                  /*
                           echo $no_2.".".$list_deal_type."-".$listing_code." เลขที่ : ".$number_room." ชั้นที่ : ".$floor." | ข้อมูลที่เจอ : เลขที่ : ".$ex_list_listing_code." : ".$ex_list_house_number." ชั้นที่ :".$ex_list_floor."| ซ้ำ ข้อ3<br>"; */

                          /*   } */   ?>
                     

                         <?php }else{ ?>
        

                              <?php if($price!='' and $ex_list_deal_type=='1'){ $deal_text='ขาย'; ?>

                                     <tr style="color: blue;">
                                         <td><?php echo $no_2;?></td>
                                         <td>3.2 </td>
                                         <td><?php echo $deal_text;?></td>
                                         <td><?php echo $listing_code;?></td>
                                         <td><?php echo $project_name_en;?></td>
                                         <td><?php echo "'".$number_room;?></td>
                                         <td><?php echo $bed;?></td>
                                         <td><?php echo $floor;?></td> 
                                         <td><?php echo $size;?></td>
                                         <td><?php echo $price;?></td>
                                         <td><?php echo $number1." , ".$number2." , ".$number3." , ".$number4;?></td>
                                         <td></td>
                                         <td><?php echo $ex_list_listing_code;?></td>
                                         <td><?php echo $project_name_en;?></td>
                                         <td><?php echo "'".$ex_list_house_number ;?></td>
                                         <td><?php echo $ex_list_bedroom;?></td>
                                         <td><?php echo $ex_list_floor;?></td>
                                         <td><?php echo $ex_list_sqm;?></td>
                                         <td><?php echo number_format($ex_list_price);?></td>
                                         <td><?php echo $ex_list_contact_tel." , ".$ex_list_contact_tel1_2." , ".$ex_list_contact_tel1_3." , ".$ex_list_contact_tel1_4." , ".$ex_list_contact_tel_2." , ".$ex_list_contact_tel2_2." , ".$ex_list_contact_tel2_3." , ".$ex_list_contact_tel2_4." , ";?></td>
                                         <td><?php echo $ex_list_listing_status;?></td>
                                         <td><?php echo $ex_list_remark;?></td>
                                     </tr>

                              <?php } if($rent!='' and $ex_list_deal_type=='2'){ $deal_text='เช่า'; ?>

                                     <tr style="color: blue;">
                                         <td><?php echo $no_2;?></td>
                                         <td>3.2</td>
                                         <td><?php echo $deal_text;?></td>
                                         <td><?php echo $listing_code;?></td>
                                         <td><?php echo $project_name_en;?></td>
                                         <td><?php echo "'".$number_room;?></td>
                                         <td><?php echo $bed;?></td>
                                         <td><?php echo $floor;?></td> 
                                         <td><?php echo $size;?></td>
                                         <td><?php echo $rent;?></td>
                                         <td><?php echo $number1." , ".$number2." , ".$number3." , ".$number4;?></td>
                                         <td></td>
                                         <td><?php echo $ex_list_listing_code;?></td>
                                         <td><?php echo $project_name_en;?></td>
                                         <td><?php echo "'".$ex_list_house_number ;?></td>
                                         <td><?php echo $ex_list_bedroom;?></td>
                                         <td><?php echo $ex_list_floor;?></td>
                                         <td><?php echo $ex_list_sqm;?></td>
                                         <td><?php echo number_format($ex_list_price);?></td>
                                         <td><?php echo $ex_list_contact_tel." , ".$ex_list_contact_tel1_2." , ".$ex_list_contact_tel1_3." , ".$ex_list_contact_tel1_4." , ".$ex_list_contact_tel_2." , ".$ex_list_contact_tel2_2." , ".$ex_list_contact_tel2_3." , ".$ex_list_contact_tel2_4." , ";?></td>
                                         <td><?php echo $ex_list_listing_status;?></td>
                                         <td><?php echo $ex_list_remark;?></td>
                                     </tr>

                              <?php } ?>


                  <!--
                     <p style="color: orange;" >
                           <?php echo $no_2.".".$list_deal_type."-".$listing_code." เลขที่ : ".$number_room." ชั้นที่ :".$floor." ห้องนอน ".$bed." | ข้อมูลที่เจอ : ".$ex_list_listing_code." : ".$ex_list_house_number." ชั้นที่ :".$ex_list_floor." ห้องนอน ".$ex_list_bedroom." | ซ้ำ ข้อ3<br>"; ?>
                     </p>  -->

                          <?php } ?>
             <?php }   ?>

                        <!--  <p style="color: red;"><?php  echo $no.". ซ้ำ - ".$listing_code." LIST ซ้ำ  ".$rs_listing['ex_list_listing_code']; ?></p> -->
         <?php    
                   


                }
         }
           
     /*
          }else{  $no1++; 

                      echo   $listing_code." Project : ".$project."<br>";
         }*/

         

     }
       
?>


</table>