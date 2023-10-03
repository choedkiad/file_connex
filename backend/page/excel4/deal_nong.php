 
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
        $tmpfname = "deal_nong.xlsx";//กำหนดให้อ่านข้อมูลจากไฟล์จากไฟล์ชื่อ
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
               <td style="padding: 5px;">รหัส DEAL</td>
               <td style="padding: 5px;">รหัส USER</td>
               <td style="padding: 5px;">Date</td>
               <td style="padding: 5px;">Sale</td>
               <td style="padding: 5px;">ประเภทลูกค้า</td>
               <td style="padding: 5px;">Name</td>
               <td>Tel</td>
               <td>LINE ID</td>
               <td>Whatsapp</td>
               <td>Time</td>
               <td>Sale/Rent</td>
               <td>Listing ID</td> 
               <td>Connex Projects</td>
               <td>BTS/MRT</td>
               <td>Zone</td>
               <td>Roomtype</td>
               <td>Budget</td>
               <td>Source</td>
               <td>Channel</td>
               <td>Workload</td>              
           </tr>

           

<?php
 
        for ($row = 1; $row <= $lastRow; $row++)//วน loop อ่านข้อมูลเอามาแสดงทีละแถว
       {   

                    $deal_id=$worksheet->getCell('A'.$row)->getValue();//รหัส DEAL
                    $buyer_contact=$worksheet->getCell('B'.$row)->getValue();//รหัส USER
                    $todate=$worksheet->getCell('C'.$row)->getValue();
                    $date=$worksheet->getCell('D'.$row)->getValue();//แสดงข้อมูลใน  ชื่อ
                    $month=$worksheet->getCell('E'.$row)->getValue();//แสดงข้อมูลใน เบอร์โทรรวม
                    $year=$worksheet->getCell('F'.$row)->getValue();//แสดงข้อมูลใน เบอร์โทร 1 
                    $sale=$worksheet->getCell('G'.$row)->getValue();//แสดงข้อมูลใน  ชื่อ
                    $buyer_contact_status=$worksheet->getCell('H'.$row)->getValue();//แสดงข้อมูลใน  ชื่อ
                    $name=$worksheet->getCell('I'.$row)->getValue();//แสดงข้อมูลใน เบอร์โทรรวม
                    $tel=$worksheet->getCell('J'.$row)->getValue();//แสดงข้อมูลใน เบอร์โทร 1 
                    $line_id=$worksheet->getCell('K'.$row)->getValue();//แสดงข้อมูลใน  TYPE
                    $whatsapp=$worksheet->getCell('L'.$row)->getValue();//แสดงข้อมูลใน  TYPE
                    $time=$worksheet->getCell('M'.$row)->getValue();//แสดงข้อมูลใน  TYPE
                    $sale_rent=$worksheet->getCell('N'.$row)->getValue();//แสดงข้อมูลใน  TYPE
                    $listing_id=$worksheet->getCell('O'.$row)->getValue();//แสดงข้อมูลใน furnished
                    $connex_projects=$worksheet->getCell('P'.$row)->getValue();//แสดงข้อมูลใน Whatsapp
                    $bts_mrt=$worksheet->getCell('Q'.$row)->getValue();//แสดงข้อมูลใน Wechat
                    $zone=$worksheet->getCell('R'.$row)->getValue();//แสดงข้อมูลใน ชั้น 
                    $roomtype=$worksheet->getCell('S'.$row)->getValue();//แสดงข้อมูลใน เลขห้อง
                    $budget=$worksheet->getCell('T'.$row)->getValue();//แสดงข้อมูลใน ขนาด 
                    $source=$worksheet->getCell('U'.$row)->getValue();//แสดงข้อมูลใน ห้องนอน
                    $channel=$worksheet->getCell('V'.$row)->getValue();//แสดงข้อมูลใน ห้องน้ำ
                    $workload=$worksheet->getCell('W'.$row)->getValue();//แสดงข้อมูลใน ราคาขาย
                    
             
                   $per=$size*5/100;
                   $per_1=$size+$per;
                   $per_2=$size-$per;

                
                 $month = sprintf("%'02d",$month);
                 $date = sprintf("%'02d",$date);   
                 $time=str_replace(".",":",$time,$count);

                $project_id='';

                if($sale_rent=='Sale'){ $sale_rent='1'; }else{ $sale_rent='2'; }

     /////////// type_project ////////////////
             $sql_project="SELECT * FROM type_project where project_name_en='$connex_projects' ";  
             $result_project= $conn->query($sql_project);
             $rs_project=$result_project->fetch_assoc();

             if($rs_project['project_id']!=''){ $project_id=$rs_project['project_id'];}else{ $project_id=''; }

     /////////// type_source ////////////////

              $sql_source = "SELECT * FROM type_source where source_title='$source' "; 
              $result_source=$conn->query($sql_source);                                                        
              $rs_source=$result_source->fetch_assoc(); 

             if($rs_source['source_title']!=''){ $source_code=$rs_source['source_code'];}else{ $source_code=''; }
 
     /////////// type_source ////////////////     

     /////////// type_channel_contact ////////////////

              $sql_channel_contact= "SELECT * FROM type_channel_contact where contact_title='$channel' "; 
              $result_channel_contact=$conn->query($sql_channel_contact);                                                        
              $rs_channel_contact=$result_channel_contact->fetch_assoc(); 

             if($rs_channel_contact['contact_code']!=''){ $contact_code=$rs_source['contact_code'];}else{ $contact_code=''; }
 
     /////////// type_channel_contact ////////////////     


     /////////// type_channel_contact ////////////////
 
             if($workload=='In progress'){ 
                 $workload_id="1";    $contact_deal_win="";        
             }else if($workload=='Active'){ 
                 $workload_id="2";    $contact_deal_win="";  
             }else if($workload=='Closing'){ 
                 $workload_id="3";      $contact_deal_win="";
             }else if($workload=='Won'){ 
                 $workload_id="4";  
                    $contact_deal_win="8";
             }else if($workload=='Lost'){ 
                 $workload_id="5";  
                 $contact_deal_win="9";

             }else{ $workload_id='0';  $contact_deal_win=""; }
 
     /////////// type_channel_contact ////////////////    

      /////////// type_zone ////////////////
             $sql_zone="SELECT * FROM type_zone where zone_name_en='$zone' ";  
             $result_zone= $conn->query($sql_zone);
             $rs_zone=$result_zone->fetch_assoc();

             $zone_id=$rs_zone['zone_id'];
             $zone_name_en=$rs_zone['zone_name_en'];

             if($zone_id!=''){ $zone_id=$zone_id;      } 

      /////////// type_zone ////////////////

      /////////// type_train_station ////////////////
             $sql_train="SELECT * FROM type_train_station where station_name_en='$bts_mrt' and station_name_en!='' ";  
             $result_train= $conn->query($sql_train);
             $rs_train=$result_train->fetch_assoc();    

             $station_id=$rs_train['station_id'];
             $station_name_en=$rs_train['station_name_en'];
  
            /* if($station_name!=''){ $ex_list_train_station=$rs_train['station_train']." | ".$rs_train['station_name_en'];}*/
            if($station_id!=''){ $station_id=$rs_train['station_id'];} else{  $station_id='';}  



             $date_create=$year."-".$month."-".$date." ".$time;

             if($buyer_contact_status=='ลูกค้า'){

                 $buyer_contact_status='1';

             }else{

                 $buyer_contact_status='2';
             }

             $create_deal_title=$name."_".$connex_projects;

              if($deal_id!=''){ 
                         $sql_2="INSERT INTO dbo_create_deal ( create_deal_code , buyer_contact_listing_code, create_deal_title , create_deal_attention , buyer_contact_code , source_code , contact_code ,  user_id   , create_deal_create , project_id , zone_id , station_id , create_deal_budget_end , create_deal_type , create_deal_bedroom , create_deal_bathroom , create_deal_sqm_end , check_deal , workload , contact_deal_win , create_deal_sale )
                         VALUES ('$deal_id' , '$listing_id' , '$create_deal_title' , '$sale_rent', '$buyer_contact' , '$source_code' , '$contact_code'  , '0'  ,'$date_create' , '$project_id' , '$zone_id' , '$station_id' , '$budget' , '1' , '$roomtype' , '' , '' ,'1' , '$workload_id' , '$contact_deal_win' ,'$sale' )";
                         mysqli_query($conn, $sql_2);  
               }

               if($buyer_contact!=''){/*

                          $sql_1="INSERT INTO dbo_buyer_contact (buyer_contact_code  , buyer_contact_gender, buyer_contact_name, buyer_contact_lastname, buyer_contact_nickname , buyer_contact_nationality, buyer_contact_line , buyer_contact_line_id , buyer_contact_tel , buyer_contact_tel_2 , buyer_contact_tel_3 , buyer_contact_tel_4 , buyer_contact_attention , buyer_contact_status , buyer_contact_email, buyer_contact_fb , buyer_contact_whatsapp , buyer_contact_wechat , buyer_contact_language , buyer_contact_remark , user_id , buyer_contact_birthday , buyer_monthly_income , buyer_objective , buyer_contact_workplace_address , buyer_contact_latitude , buyer_contact_longitude , buyer_contact_google_map , buyer_contact_date_create )
                          VALUES ('$buyer_contact' ,'', '', '' , '' , '' , '$name' , '$line_id' , '$tel' , '' , ''  , '' , '$sale_rent' , '$buyer_contact_status' ,''  ,'' , '$whatsapp' , '' , '2' ,'$buyer_contact_remark' , '' , '' , '' , '' , '', '' , '' , '' ,'$date_create' )";
                                    mysqli_query($conn, $sql_1);  */
                }
?>

                                     <tr style="color: #000 ;">
                                         <td><?php echo $deal_id;?></td>
                                         <td><?php echo $buyer_contact;?></td>
                                         <td><?php echo $year."-".$month."-".$date." ".$time;?></td>
                                         <td><?php echo $sale;?></td>
                                         <td><?php echo $buyer_contact_status;?></td>
                                         <td><?php echo $create_deal_title;?></td>
                                         <td><?php echo "".$tel;?></td>
                                         <td><?php echo $line_id;?></td>
                                         <td><?php echo $whatsapp;?></td>
                                         <td><?php echo $time;?></td>
                                         <td><?php echo $sale_rent;?></td> 
                                         <td><?php echo $listing_id;?></td>
                                         <td><?php echo $connex_projects." PJ : ".$project_id;?></td>
                                         <td><?php echo $bts_mrt."-".$station_id;?></td>
                                         <td><?php echo $zone." -".$zone_id;?></td>
                                         <td><?php echo $roomtype;?></td>
                                         <td><?php echo $budget;?></td>
                                         <td><?php echo $source." -".$source_code ;?></td>
                                         <td><?php echo $channel."-".$contact_code;?></td>
                                         <td><?php echo $workload."-".$workload_id;?></td>
                                     </tr>

 <?php   } ?>


</table>