 
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

                if($price!=''){ $list_deal_type='1';  }
                else if($rent!=''){ $list_deal_type='2';  }


                $check_n_r=strpos($number_room,"/");

                $number_r_1=substr($number_room,0 , $check_n_r);
                $number_r_2=substr($number_room,$check_n_r+1 ,15 );

                $number_r_2 = str_replace(" ","",$number_r_2,$count);  
                


             
  
  
      $sql_data_check="SELECT * FROM dbo_data_excel_listing 
                     where project_id='$project_id' and ex_list_contact!='20'

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

     $no=0;  $no1=0;
     
 
           if($result_data_check->num_rows > 0) {   

                while($rs_listing=$result_data_check->fetch_assoc()){ $no++;  


                   $ex_list_house_number=$rs_listing['ex_list_house_number'];
                   $ex_list_floor=$rs_listing['ex_list_floor'];
                   $ex_list_listing_code=$rs_listing['ex_list_listing_code'];
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

                          $ex_list_house_number=$rs_listing['ex_list_house_number']; 
                          $house_number_n_r=strpos($ex_list_house_number,"/");
                         

                        if($house_number_n_r!=''){
                           $house_number_r_1=substr($ex_list_house_number,0 , $house_number_n_r);
                           $house_number_r_2=substr($ex_list_house_number,$house_number_n_r+1 ,15);

                           $house_number_r_2 = str_replace(" ","",$house_number_r_2,$count);  

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

                            ) { 
                          /*
                                echo   $listing_code." number : ".$number_room." | ".$check_n_r." แยก".$number_r_1จ."|".$number_r_2." ข้อมูลที่เจอ : ".$ex_list_house_number."-".$house_number_r_1."_".$house_number_r_2."| <br>"; */
                           
                     ?>  
                           <p style="color: red;">


                              <?php /*
                              $sql = "UPDATE dbo_data_excel_listing SET 
                                        ex_list_close='1',
                                        ex_list_close_date='".$todate."'
                                        WHERE ex_list_timestamp='".$listing_code."' and ex_list_deal_type='".$list_deal_type."' "; 


                              if ($conn->query($sql) === TRUE) {   */
                                    echo $list_deal_type."-"."เบอร์ตรง ".$listing_code." N : ".$number_room." ชั้น:".$floor." | ข้อมูลในระบบ : ".$ex_list_listing_code." : N ".$ex_list_house_number." ชั้น :".$ex_list_floor."| ซ้ำ ข้อ1<br>";
                             /* } */


                                 ?>
                                </p> 
                      <?php }else if($floor==$ex_list_floor and $ex_list_bedroom==$bed){ ?>

                            <p style="color: pink;">
                                  <?php 

                           /*
                              $sql = "UPDATE dbo_data_excel_listing SET 
                                        ex_list_close='1',
                                        ex_list_close_date='".$todate."'
                                        WHERE ex_list_timestamp='".$listing_code."' and ex_list_deal_type='".$list_deal_type."' "; 


                              if ($conn->query($sql) === TRUE) {   */

                                  echo $list_deal_type."-".$listing_code." N : ".$number_room." ชั้น:".$floor." | ข้อมูลในระบบ : ".$ex_list_listing_code." : N ".$ex_list_house_number." ".$house_number_r_2." ชั้น :".$ex_list_floor."| ซ้ำ ข้อ2<br>";
                             /*  }  */ ?>
                            </p> 
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



                            if($ex_list_bedroom==$bed) {   ?>

                          
                     <p style="color: blue;" >
                           <?php 
                         /*
                              $sql = "UPDATE dbo_data_excel_listing SET 
                                        ex_list_close='1',
                                        ex_list_close_date='".$todate."'
                                        WHERE ex_list_timestamp='".$listing_code."' and ex_list_deal_type='".$list_deal_type."'"; 

                              if ($conn->query($sql) === TRUE) {  */


                           echo $list_deal_type."-".$listing_code." N : ".$number_room." ชั้น:".$floor." | ข้อมูลที่เจอ : ".$ex_list_listing_code." : ".$ex_list_house_number." ชั้นที่ :".$ex_list_floor."| ซ้ำ ข้อ3<br>";

                          /*   } */   ?>
                     </p> 

                         <?php }else{ ?>
                  <!--
                     <p style="color: orange;" >
                           <?php echo $list_deal_type."-".$listing_code." N : ".$number_room." ชั้น:".$floor." ห้องนอน ".$bed." | ข้อมูลที่เจอ : ".$ex_list_listing_code." : ".$ex_list_house_number." ชั้นที่ :".$ex_list_floor." ห้องนอน ".$ex_list_bedroom." | ซ้ำ ข้อ3<br>"; ?>
                     </p> -->

                          <?php } ?>
             <?php }   ?>

                          <!--<p style="color: red;"><?php  echo $no.". ซ้ำ - ".$listing_code." LIST ซ้ำ  ".$rs_listing['ex_list_listing_code']; ?></p>-->
         <?php    
                   


                }
         }
           
     /*
          }else{  $no1++; 

                      echo   $listing_code." Project : ".$project."<br>";
         }*/

         

     }
       
?>