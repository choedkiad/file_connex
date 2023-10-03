
<head>
<script>
function myHide()
{
  document.getElementById('hidepage').style.display='block';//content ที่ต้องการแสดงหลังจากเพจโหลดเสร็จ
  document.getElementById('hidepage2').style.display='none';//content ที่ต้องการแสดงระหว่างโหลดเพจ
}
</script>
</head>
<body onload="myHide();">

<div id="hidepage2" style="display:block;" align="center" width="100%">
<br>
<IMG SRC="../img/loading.gif" WIDTH="100" HEIGHT="100" BORDER="0" ALT=""><br>
กรุณารอสักครู่...
</div>

<div id="hidepage" style="display:none;">
<table>
<tr><td>หน้าเพจโหลดเสร็จแล้ว</td></tr>
</table>
</div>

</body>


<?php 
 
  session_start();  

  require '../config.php';
 /*
if($_SESSION['EMAIL_ID']==''){  

  echo("<script> top.location.href='../'</script>"); 
  
}*/

            $edit=$_POST['edit'];
            $date=date("Y-m-d H:i:s");
            $id=$_POST['id'];

            $page=$_POST['page'];
            $username=$_POST['email'];
            $password=$_POST['password'];
            $user_id=$_POST['user_id'];

            $list_id=$_POST['list_id'];
            $check_copy=$_POST['check_copy'];
            
            $id_get=$_GET['id'];
            $page_get=$_GET['page'];
            $status_get=$_GET['status'];
            $id_p_get=$_GET['id_p'];

            $img_get=$_GET['img'];
            $part_get=$_GET['part'];

            $password=md5($password);


  

///////////////////////////////     upload_file_excel            ////////////////////////////////////

       if($page=='upload_file_excel'){


              move_uploaded_file($_FILES["fileCSV"]["tmp_name"],$_FILES["fileCSV"]["name"]); // Copy/Upload CSV

              $objCSV = fopen($_FILES["fileCSV"]["name"], "r");
              while (($objArr = fgetcsv($objCSV, 3000, ",")) !== FALSE) {



              $ex_list_listing_type=$objArr[6];
              $ex_list_train_station=$objArr[13];

              $ex_list_subdistrict=$objArr[10];
              $ex_list_district=$objArr[11];
              $ex_list_province=$objArr[12];

              $ex_list_email_address=$objArr[1];
              $ex_list_listing_status=$objArr[66];

              $ex_list_project=$objArr[7];
              $ex_list_contact=$objArr[51];

              if($ex_list_listing_status=='Available'){  $ex_list_listing_status='1';                   
              }else if($ex_list_listing_status=='Rented'){   $ex_list_listing_status='3';  
              }else if($ex_list_listing_status=='Sold (by Connex)'){   $ex_list_listing_status='4';  
              }else if($ex_list_listing_status=='Sold (by Others)'){   $ex_list_listing_status='5'; }
  
               ///////////////// ASSET ////////////////  
                $sql_ass= "SELECT * FROM type_asset WHERE name LIKE '%$ex_list_listing_type%'  "; 
                $result_ass=$conn->query($sql_ass);
                while($rs_ass=$result_ass->fetch_assoc()){
                        
                        $ex_list_listing_type=$rs_ass['id']; 
                }  
                ///////////////// END ASSET ////////////////

               ///////////////// BTS ////////////////
                $sql_st= "SELECT * FROM type_train_station WHERE station_train LIKE '%$ex_list_train_station%'  "; 
                $result_st=$conn->query($sql_st);
                while($rs_st=$result_st->fetch_assoc()){
                        
                        $ex_list_train_station=$rs_st['station_id']; 
                }
                ///////////////// END BTS ////////////////


               ///////////////// Check ex_list_email_address ////////////////
                $sql_re= "SELECT * FROM dbo_register WHERE register_email LIKE '%$ex_list_email_address%'  "; 
                $result_re=$conn->query($sql_re);
                while($rs_re=$result_re->fetch_assoc()){
                        
                        $ex_list_email_address=$rs_re['register_id']; 
                }
                ///////////////// END ex_list_email_address ////////////////

               ///////////////// ex_list_project ////////////////  
                $sql_proj= "SELECT * FROM type_project WHERE project_name_en LIKE '%$ex_list_project%'  "; 
                $result_proj=$conn->query($sql_proj);
                while($rs_proj=$result_proj->fetch_assoc()){
                        
                       
                        $project_id=$rs_proj['project_id']; 
                }  
                ///////////////// END ex_list_project ////////////////



                ///////////////// Check Project ตำบล อำเภอ จังหวัด //////////////////
                $sql_p= "SELECT * FROM provinces WHERE provinces_in_thai LIKE '%$project_province%'  "; 
                $result_p=$conn->query($sql_p);
                while($rs_p=$result_p->fetch_assoc()){
                        
                        $province_id=$rs_p['id'];
                        $ex_list_province=$rs_p['id'];
 
      
                    $sql_d= "SELECT * FROM districts WHERE province_id='$province_id' and  districts_in_thai LIKE '%$project_district%' "; 
                    $result_d=$conn->query($sql_d);
                    while($rs_d=$result_d->fetch_assoc()){

                          $districts_id=$rs_d['id'];
                          $ex_list_district=$rs_d['id'];
 

                          $sql_s= "SELECT * FROM subdistricts WHERE district_id='$districts_id' and  subdistricts_in_thai LIKE '%$project_subdistrict%' "; 
                          $result_s=$conn->query($sql_s);
                          while($rs_s=$result_s->fetch_assoc()){

                                     $subdistricts_id=$rs_s['id'];
                                     $ex_list_subdistrict=$rs_s['id'];
  

                          }                 

                    }
                      
                }   

               ///////////////// dbo_register ////////////////   
                $sql_re= "SELECT * FROM dbo_register WHERE register_name LIKE '%$ex_list_contact%'  "; 
                $result_re=$conn->query($sql_re);
                while($rs_re=$result_re->fetch_assoc()){
                        
                        $ex_list_contact=$rs_re['register_id']; 
                }  
                /////////////////////////////////////////////

                $strSQL = "INSERT INTO dbo_data_excel_listing ";
  $strSQL .="(ex_list_id , ex_list_timestamp , ex_list_email_address , ex_list_contract_type , ex_list_contract_code , ex_list_deal_type , ex_list_listing_code , ex_list_listing_type , ex_list_project , ex_list_alley , ex_list_road , ex_list_subdistrict , ex_list_district , ex_list_province , ex_list_train_station , ex_list_googlmap , ex_list_number_buildings , ex_list_floor , ex_list_view , ex_list_total_floors , ex_list_rai , ex_list_ngan , ex_list_wa , ex_list_house_number , ex_list_sqm , ex_list_bedroom , ex_list_bathroom , ex_list_other_room , ex_list_parking , ex_list_furniture , ex_list_pets , ex_list_direction , ex_list_strengths , ex_list_gdrive_th , ex_list_gdrive_en , ex_list_facilities , ex_list_nearby_places , ex_list_details , ex_list_heading , ex_list_price , ex_list_common_fee , ex_list_contact_name ,  ex_list_contact_tel , ex_list_contact_lineid , ex_list_contact_email , ex_list_remark , ex_list_located , ex_list_zone , ex_list_listing_score , ex_list_price_score , ex_list_location ,ex_list_project_th, ex_list_contact , ex_list_tel , ex_list_line , ex_list_whatsapp , ex_list_project_en , ex_list_location_en , ex_list_train_station_en , ex_list_type_en , ex_list_land_area , ex_list_facing , ex_list_nearby_places_en , ex_list_common_facilities , ex_list_additional , ex_list_contact_person , ex_list_heading_en , ex_list_listing_status , ex_list_rent_till ,ex_list_negotiated_price,  ex_list_run , ex_list_no , project_id ) ";
  $strSQL .="VALUES ";
  $strSQL .="('','".$objArr[0]."','".$ex_list_email_address."','".$objArr[2]."','".$objArr[3]."','".$objArr[4]."','".$objArr[5]."','".$ex_list_listing_type."','".$objArr[7]."','".$objArr[8]."','".$objArr[9]."','".$ex_list_subdistrict."','".$ex_list_district."','".$ex_list_province."','".$ex_list_train_station."','".$objArr[14]."','".$objArr[15]."','".$objArr[16]."','".$objArr[17]."','".$objArr[18]."','".$objArr[19]."','".$objArr[20]."','".$objArr[21]."','".$objArr[22]."','".$objArr[23]."','".$objArr[24]."','".$objArr[25]."','".$objArr[26]."','".$objArr[27]."','".$objArr[28]."','".$objArr[29]."','".$objArr[30]."','".$objArr[31]."','".$objArr[32]."','".$objArr[33]."','".$objArr[34]."','".$objArr[35]."','".$objArr[36]."','".$objArr[37]."','".$objArr[38]."','".$objArr[39]."','".$objArr[40]."','".$objArr[41]."','".$objArr[42]."','".$objArr[43]."','".$objArr[44]."','".$objArr[45]."','".$objArr[46]."','".$objArr[47]."','".$objArr[48]."','".$objArr[49]."','".$objArr[50]."','".$ex_list_contact."','".$objArr[52]."','".$objArr[53]."','".$objArr[54]."','".$objArr[55]."','".$objArr[56]."','".$objArr[57]."','".$objArr[58]."','".$objArr[59]."','".$objArr[60]."','".$objArr[61]."','".$objArr[62]."','".$objArr[63]."','".$objArr[64]."','".$objArr[65]."','".$ex_list_listing_status."','".$objArr[67]."','".$objArr[68]."','".$objArr[69]."','".$objArr[70]."' ";
  $strSQL .=",'".$project_id."') ";
                  $conn->query($strSQL);
              }
              fclose($objCSV);

              echo "Upload & Import Done.";

              echo '<script type="text/javascript">alert("Upload & Import Done.");</script>';
              echo("<script> top.location.href='../?page=$page'</script>"); 


       }


///////////////////////////////     END  upload_file_excel            ////////////////////////////////////



///////////////////////////////     upload_file_project            ////////////////////////////////////

       if($page=='upload_file_project'){


              move_uploaded_file($_FILES["fileCSV"]["tmp_name"],$_FILES["fileCSV"]["name"]); // Copy/Upload CSV


              $objCSV = fopen($_FILES["fileCSV"]["name"], "r");
              while (($objArr = fgetcsv($objCSV, 3000, ",")) !== FALSE) {
  
                $project_type=$objArr[0];              
                $project_subdistrict=$objArr[5];
                $project_district=$objArr[6];
                $project_province=$objArr[7];
                $project_train_station=$objArr[8];

                ///////////////// Check Project ตำบล อำเภอ จังหวัด //////////////////
                $sql_p= "SELECT * FROM provinces WHERE provinces_in_thai LIKE '%$project_province%'  "; 
                $result_p=$conn->query($sql_p);
                while($rs_p=$result_p->fetch_assoc()){
                        
                        $province_id=$rs_p['id'];
                        $project_province=$rs_p['id'];
 
      
                    $sql_d= "SELECT * FROM districts WHERE province_id='$province_id' and  districts_in_thai LIKE '%$project_district%' "; 
                    $result_d=$conn->query($sql_d);
                    while($rs_d=$result_d->fetch_assoc()){

                          $districts_id=$rs_d['id'];
                          $project_district=$rs_d['id'];
 

                          $sql_s= "SELECT * FROM subdistricts WHERE district_id='$districts_id' and  subdistricts_in_thai LIKE '%$project_subdistrict%' "; 
                          $result_s=$conn->query($sql_s);
                          while($rs_s=$result_s->fetch_assoc()){

                                     $subdistricts_id=$rs_s['id'];
                                     $project_subdistrict=$rs_s['id'];

                                      $sql_1= "UPDATE type_project SET 
                                            project_subdistrict='".$subdistricts_id."',
                                            project_district='".$districts_id."',
                                            project_province='".$province_id."' 
                                            WHERE project_id='".$project_id."'";
                                      $conn->query($sql_1); 
 

                                    echo $project_name." provinces : ".$province_id." districts: ".$districts_id." subdistricts: ".$subdistricts_id."<br />";  

                          }                 

                    }
                      
                }   

                $sql_st= "SELECT * FROM type_train_station WHERE station_train LIKE '%$project_train_station%'  "; 
                $result_st=$conn->query($sql_st);
                while($rs_st=$result_st->fetch_assoc()){
                        
                        $project_train_station=$rs_st['station_id']; 
                }

                $sql_ass= "SELECT * FROM type_asset WHERE name LIKE '%$project_type%'  "; 
                $result_ass=$conn->query($sql_ass);
                while($rs_ass=$result_ass->fetch_assoc()){
                        
                        $project_type=$rs_ass['code']; 
                }  

                ///////////////// Check Project //////////////////



                $strSQL = "INSERT INTO type_project ";
  $strSQL .="(project_id  , project_type , project_name_en ,project_name , project_alley , project_road , project_subdistrict , project_district , project_province , project_train_station , project_number_buildings ,  project_total_floors ,  project_facilities , project_nearby_places ,project_nearby_places_en, project_common_fee , project_zone  , project_facilities_en ,  project_create ) ";
  $strSQL .="VALUES ";
  $strSQL .="('','".$project_type."','".$objArr[1]."','".$objArr[2]."','".$objArr[3]."','".$objArr[4]."','".$project_subdistrict."','".$project_district."','".$project_province."','".$project_train_station."','".$objArr[9]."','".$objArr[10]."','".$objArr[11]."','".$objArr[12]."','".$objArr[16]."','' ,'".$objArr[14]."','".$objArr[17]."' ";
  $strSQL .=",'".$date."') ";
                  $conn->query($strSQL);
              }
              fclose($objCSV);

              echo "Upload & Import Done.";

              echo '<script type="text/javascript">alert("Upload & Import Done.");</script>';
              echo("<script> top.location.href='../?page=$page'</script>"); 


       }


///////////////////////////////     END  upload_file_project            ////////////////////////////////////




///////////////////////////////     upload_file_excel_img            ////////////////////////////////////


       if($page=='upload_file_excel_img'){ // A


        $date_up=date("Y-m-d H:i:S");


               ///////////////////////อัพเดทภาพขึ้นฐานข้อมูล///////////////////////

          $sql= "SELECT * FROM dbo_data_excel_listing ";
          $result=$conn->query($sql);
          while($rs=$result->fetch_assoc()){ // B

            $ex_list_listing_code=$rs['ex_list_listing_code'];

          /////////////// เช็คภาพ ////////////////////
             $OpenDir=opendir("../../images/listing/$ex_list_listing_code");
             $File=readdir($OpenDir); 

             if($File!=''){ // C1

       
                $allowed_types=array('jpg','jpeg','gif','png');
                $dir="../../images/listing/$ex_list_listing_code/";
                $files1 = scandir($dir);
                foreach($files1 as $key=>$value){  // C1-1
                    if($key>1){   // C1-2
                        $file_parts = explode('.',$value);
                        $ext = strtolower(array_pop($file_parts));

                        if(in_array($ext,$allowed_types)){  // C1-3  

                        $no++;

                           $sql_check= "SELECT * FROM dbo_data_excel_listing_img where listing_img_name='$value' and ex_list_listing_code='$ex_list_listing_code' ";
                           $result_check=$conn->query($sql_check);
                             if($result_check->num_rows > 0) {  // C1-4
                             }else{   // C1-4
   
                                  $ex_list_listing_code=$rs['ex_list_listing_code'];
                      
                                  $sql_1="INSERT INTO dbo_data_excel_listing_img (listing_img_id, ex_list_listing_code, listing_img_folder, listing_img_name, listing_img_no , listing_img_date )
                                   VALUES ('', '$ex_list_listing_code', '$dir' , '$value' ,'$no' ,'$date_up' )";
                                    mysqli_query($conn, $sql_1);   


                                    echo $no." CODE: ".$ex_list_listing_code." Folder: ".$dir." File: ".$value."<br />";

                               }   // C1-4
                          }  // C1-3
                        } // C1-2
                    }// C1-1
 
              } // C1

              else{ // C2
   
                $url_dir=$ex_list_listing_code." New";
                $allowed_types=array('jpg','jpeg','gif','png');
                $dir  ="../../images/listing/".$url_dir."/";

                $files1 = scandir($dir);
                foreach($files1 as $key=>$value){
                    if($key>1){
                        $file_parts = explode('.',$value);
                        $ext = strtolower(array_pop($file_parts));

                        if(in_array($ext,$allowed_types)){  // C1-3  

                        $no++;

                           $sql_check= "SELECT * FROM dbo_data_excel_listing_img where listing_img_name='$value' and ex_list_listing_code='$ex_list_listing_code' ";
                           $result_check=$conn->query($sql_check);
                             if($result_check->num_rows > 0) {  // C1-4
                             }else{   // C1-4
   
                                  $ex_list_listing_code=$rs['ex_list_listing_code'];
                 
                                  $sql_1="INSERT INTO dbo_data_excel_listing_img (listing_img_id, ex_list_listing_code, listing_img_folder, listing_img_name, listing_img_no , listing_img_date )
                                   VALUES ('', '$ex_list_listing_code', '$dir' , '$value' ,'$no' ,'$date_up' )";
                                    mysqli_query($conn, $sql_1);   

                                    echo $no." CODE: ".$ex_list_listing_code." Folder: ".$dir." File: ".$value."<br />"; 

                               }   // C1-4

 

                          }  // C1-3
 
                     }
                }
              }// C2

 
               //////////////////////------อัพเดทภาพขึ้นฐานข้อมูล----------//////////////////////////


          }// B


          $sql= "SELECT project_id , project_province, project_district ,project_subdistrict ,project_name FROM type_project ";
          $result=$conn->query($sql);
          while($rs=$result->fetch_assoc()){ // BB
               ///////////////////////อัพเดท ตำบล อำเภอ จังหวัด โครงการต่างๆ ///////////////////////        
            
            $project_province=$rs['project_province'];
            $project_district=$rs['project_district'];
            $project_subdistrict=$rs['project_subdistrict'];
            $project_name=$rs['project_name'];
            $project_id=$rs['project_id'];
   
                $sql_p= "SELECT * FROM provinces WHERE provinces_in_thai LIKE '%$project_province%'  "; 
                $result_p=$conn->query($sql_p);
                while($rs_p=$result_p->fetch_assoc()){
                        
                        $province_id=$rs_p['id'];

 
      
                    $sql_d= "SELECT * FROM districts WHERE province_id='$province_id' and  districts_in_thai LIKE '%$project_district%' "; 
                    $result_d=$conn->query($sql_d);
                    while($rs_d=$result_d->fetch_assoc()){

                          $districts_id=$rs_d['id'];

 

                          $sql_s= "SELECT * FROM subdistricts WHERE district_id='$districts_id' and  subdistricts_in_thai LIKE '%$project_subdistrict%' "; 
                          $result_s=$conn->query($sql_s);
                          while($rs_s=$result_s->fetch_assoc()){

                                     $subdistricts_id=$rs_s['id'];

                                      $sql_1= "UPDATE type_project SET 
                                            project_subdistrict='".$subdistricts_id."',
                                            project_district='".$districts_id."',
                                            project_province='".$province_id."' 
                                            WHERE project_id='".$project_id."'";
                                      $conn->query($sql_1); 
 

                                    echo $project_name." provinces : ".$province_id." districts: ".$districts_id." subdistricts: ".$subdistricts_id."<br />";  

                          }                 

                    }
                      
                }               

          } //BB
 /*
              echo '<script type="text/javascript">alert("ดำเนินการอัพเดทภาพทั้งหมดขึ้นฐานข้อมูล");</script>';
              echo("<script> top.location.href='../?page=$page'</script>");   */

      }// A


///////////////////////////////     END upload_file_excel_img    ////////////////////////////////////





///////////////////////////////     create_register      ////////////////////////////////////

       if($page=='create_register'){   //create_register
 
              $register_id=$_POST['register_id'];
              $register_name=$_POST['register_name'];
              $register_email=$_POST['register_email'];
              $register_password=$_POST['register_password'];
              $register_status=$_POST['register_status'];
              $register_tel=$_POST['register_tel'];
              $register_enable=$_POST['register_enable'];
              $register_line=$_POST['register_line'];
              $register_fb=$_POST['register_fb'];

              $date=date("Y-m-d_H:i:s");

                if($edit=="edit"){



                      isset( $_FILES['filUpload'] ) ? $file = $_FILES['filUpload'] : $file = "";

                              $image=$file['tmp_name'];
                              $image_name=$file['name'];
                              $image_size=$file['size'];
                              $image_type=$file['type']; 

                              $images_s=$date."-".$image_name;

                              $width=50; //*** Fix Width & Heigh (Autu caculate) ***//

                              $size=GetimageSize($image);
                              $height=round($width*$size[1]/$size[0]);
                              $images_orig = ImageCreateFromJPEG($image);
                              $photoX = ImagesX($images_orig);
                              $photoY = ImagesY($images_orig);
                              $images_fin = ImageCreateTrueColor($width, $height);
                              ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
                              ImageJPEG($images_fin,"../../images/team/$images_s");
                              ImageDestroy($images_orig);
                              ImageDestroy($images_fin);


                      if($register_password=="EDITTEST"){

                         $sql = "UPDATE dbo_register SET 
                                register_name='".$register_name."',
                                register_email='".$register_email."',
                                register_status='".$register_status."',
                                register_enable='".$register_enable."',
                                register_tel='".$register_tel."',
                                register_line='".$register_line."',
                                register_fb='".$register_fb."',
                                register_img='".$images_s."',
                                register_date='".$date."'
                                WHERE register_id='".$register_id."' "; 

                      }else{ $register_password=md5($register_password);

                         $sql = "UPDATE dbo_register SET 
                                register_name='".$register_name."',
                                register_email='".$register_email."',
                                register_password='".$register_password."',
                                register_status='".$register_status."',
                                register_enable='".$register_enable."',
                                register_tel='".$register_tel."',
                                register_line='".$register_line."',
                                register_fb='".$register_fb."',
                                register_img='".$images_s."',
                                register_date='".$date."'
                                WHERE register_id='".$register_id."' "; 
                      }


  
                      if ($conn->query($sql) === TRUE) {
                           echo '<script type="text/javascript">alert("Record updated successfully");</script>';
                           echo("<script> top.location.href='../?page=$page&edit=edit&id=$id'</script>"); 
                      } else {
                           echo '<script type="text/javascript">alert("Error");</script>';
                           echo "Error updating record: " . $conn->error; 
                      }


                }else{
                   $register_password=md5($register_password); 


                      isset( $_FILES['filUpload'] ) ? $file = $_FILES['filUpload'] : $file = "";
                              $image=$file['tmp_name'];
                              $image_name=$file['name'];
                              $image_size=$file['size'];
                              $image_type=$file['type']; 

                              $images_s=$date."-".$image_name;
 
                              $width=50; //*** Fix Width & Heigh (Autu caculate) ***//

                              $size=GetimageSize($image);
                              $height=round($width*$size[1]/$size[0]);
                              $images_orig = ImageCreateFromJPEG($image);
                              $photoX = ImagesX($images_orig);
                              $photoY = ImagesY($images_orig);
                              $images_fin = ImageCreateTrueColor($width, $height);
                              ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
                              ImageJPEG($images_fin,"../../images/team/$images_s");
                              ImageDestroy($images_orig);
                              ImageDestroy($images_fin);


                        $sql="INSERT INTO dbo_register 
                                     (register_name ,register_email ,register_password, register_status,register_enable,register_line ,register_fb , register_img , register_date)
                                VALUES ('$register_name','$register_email' ,'$register_password', '$register_status' , '$register_enable' , '$register_line' , '$register_fb' , '$images_s'  ,'$date' )";

                          if (mysqli_query($conn, $sql)) {  
                                echo '<script type="text/javascript">alert("เพิ่มข้อมูลผู้ใช้งาน.");</script>';
                                echo("<script> top.location.href='../?page=$page'</script>"); 
                          }

                 }           
 
       }  //END create_register


///////////////////////////////     END  create_register            ////////////////////////////////////




///////////////////////////////     change_password      ////////////////////////////////////

       if($page=='change_password'){   //change_password
 
              $register_id=$_POST['register_id'];
              $register_name=$_POST['register_name'];
              $register_email=$_POST['register_email'];
              $register_password=$_POST['register_password'];
              $register_status=$_POST['register_status'];
              $register_tel=$_POST['register_tel'];
              $register_enable=$_POST['register_enable'];
              $register_line=$_POST['register_line'];
              $register_fb=$_POST['register_fb'];
              $register_img=$_POST['register_img'];

              $date=date("Y-m-d_H:i:s");

                if($edit=="edit"){



                      isset( $_FILES['filUpload'] ) ? $file = $_FILES['filUpload'] : $file = "";

   

                              $image=$file['tmp_name'];
                              $image_name=$file['name'];
                              $image_size=$file['size'];
                              $image_type=$file['type']; 
                              $image_name_ext=strtolower(end(explode('.',$image_name)));                 
       
                      if ($image_name_ext=="png" or $image_name_ext=="jpg" or $image_name_ext=="jpeg"   ) {

                              $images_s=$date."-".$image_name;
 
                              $width=50; //*** Fix Width & Heigh (Autu caculate) ***//

                              $size=GetimageSize($image);
                              $height=round($width*$size[1]/$size[0]);
                              $images_orig = ImageCreateFromJPEG($image);
                              $photoX = ImagesX($images_orig);
                              $photoY = ImagesY($images_orig);
                              $images_fin = ImageCreateTrueColor($width, $height);
                              ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
                              ImageJPEG($images_fin,"../../images/team/$images_s");
                              ImageDestroy($images_orig);
                              ImageDestroy($images_fin);
                      }else{
                                $images_s=$register_img;
                      }


                      if($register_password=="EDITTEST"){

                         $sql = "UPDATE dbo_register SET 
                                register_name='".$register_name."', 
                                register_tel='".$register_tel."',
                                register_line='".$register_line."',
                                register_fb='".$register_fb."',
                                register_img='".$images_s."',
                                register_date='".$date."'
                                WHERE register_id='".$register_id."' "; 

                      }else{ $register_password=md5($register_password);

                         $sql = "UPDATE dbo_register SET 
                                register_name='".$register_name."', 
                                register_password='".$register_password."', 
                                register_tel='".$register_tel."',
                                register_line='".$register_line."',
                                register_fb='".$register_fb."',
                                register_img='".$images_s."',
                                register_date='".$date."'
                                WHERE register_id='".$register_id."' "; 
                      }


  
                      if ($conn->query($sql) === TRUE) {
                           echo '<script type="text/javascript">alert("แก้ไขรหัสผ่านเรียบร้อย");</script>';
                           echo("<script> top.location.href='../?page=$page'</script>"); 
                      } else {
                           echo '<script type="text/javascript">alert("Error");</script>';
                           echo "Error updating record: " . $conn->error; 
                      }


                } 
           
 
       }  //END change_password


///////////////////////////////     END  change_password            ////////////////////////////////////




///////////////////////////////     create_listing      ////////////////////////////////////

       if($page=='create_listing'){   //create_listing
 
              $ex_list_contract_type=$_POST['ex_list_contract_type'];
              $ex_list_contract_code=$_POST['ex_list_contract_code'];
              $ex_list_deal_type=$_POST['ex_list_deal_type'];
              $code=$_POST['code'];

              $ex_list_listing_type=$_POST['ex_list_listing_type'];

              $ex_list_project=$_POST['ex_list_project'];
              $ex_list_train_station=$_POST['ex_list_train_station'];
              $ex_list_heading=$_POST['ex_list_heading'];

              $ex_list_sqm=$_POST['ex_list_sqm'];
              $ex_list_parking=$_POST['ex_list_parking'];
              $ex_list_bedroom=$_POST['ex_list_bedroom'];
              $ex_list_bathroom=$_POST['ex_list_bathroom'];
              $ex_list_other_room=$_POST['ex_list_other_room'];
              $ex_list_view=$_POST['ex_list_view'];
              $ex_list_furniture=$_POST['ex_list_furniture'];
              $ex_list_furniture_en=$_POST['ex_list_furniture_en'];
              $ex_list_pets=$_POST['ex_list_pets'];
              $ex_list_direction=$_POST['ex_list_direction'];
              $ex_list_details=$_POST['ex_list_details'];
              $ex_list_floor=$_POST['ex_list_floor'];
              $ex_list_total_floors=$_POST['ex_list_total_floors'];
              $ex_list_heading_en=$_POST['ex_list_heading_en'];
              $ex_list_listing_status=$_POST['ex_list_listing_status'];
              $img_folder=$_POST['img_folder'];
              $ex_list_googlmap=$_POST['ex_list_googlmap'];
              $ex_list_showmap=$_POST['ex_list_showmap'];
              $ex_list_remark=$_POST['ex_list_remark'];
              $ex_list_video=$_POST['ex_list_video'];
              $ex_list_public=$_POST['ex_list_public'];
              $ex_list_premium=$_POST['ex_list_premium'];
              $ex_list_boostpost=$_POST['ex_list_boostpost'];

              $ex_list_rent_update=$_POST['ex_list_rent_update'];
               
              $ex_list_house_number=$_POST['ex_list_house_number'];
              $provinces=$_POST['provinces'];
              $amphures=$_POST['amphures'];
              $districts=$_POST['districts'];
              $project=$_POST['project'];

              $ex_list_price=$_POST['ex_list_price'];
              $ex_list_common_fee=$_POST['ex_list_common_fee'];
              
              $ex_list_status=$_POST['ex_list_status'];
              $ex_list_rent_till=$_POST['ex_list_rent_till'];

              $ex_list_contact_name=$_POST['ex_list_contact_name'];
              $ex_list_contact_tel=$_POST['ex_list_contact_tel'];
              $ex_list_contact_lineid=$_POST['ex_list_contact_lineid'];
              $ex_list_contact_email=$_POST['ex_list_contact_email'];

              $ex_list_contact_name_2=$_POST['ex_list_contact_name'];
              $ex_list_contact_tel_2=$_POST['ex_list_contact_tel_2'];
              $ex_list_contact_lineid_2=$_POST['ex_list_contact_lineid_2'];
              $ex_list_contact_email_2=$_POST['ex_list_contact_email_2'];

           
               ////////////////// type_project /////////////////////////////
                 $sql_project="SELECT * FROM type_project where project_id='$project' ";
                 $result_project= $conn->query($sql_project); 
                // output data of each row
                 $rs_project=$result_project->fetch_assoc();

                 $project_name=$rs_project['project_name'];

                 if($project_name!=''){ 

                       $project_name_en=$rs_project['project_name_en'];
                       $project_alley=$rs_project['project_alley'];
                       
                       $ex_list_listing_type=$rs_project['project_type']; 

                       $project_road=$rs_project['project_road'];
                       $districts=$rs_project['project_subdistrict'];
                       $amphures=$rs_project['project_district'];
                       $provinces=$rs_project['project_province'];
                       $project_train_station=$rs_project['project_train_station'];
                       $project_number_buildings=$rs_project['project_number_buildings'];
                       $project_view=$rs_project['project_view'];

                       $project_total_floors=$rs_project['project_total_floors'];
               
                       $project_facilities=$rs_project['project_facilities'];
                       $project_facilities_en=$rs_project['project_facilities_en'];
                       $project_facilities_icon=$rs_project['project_facilities_icon'];
                       $project_nearby_places=$rs_project['project_nearby_places'];
                       $project_nearby_places_en=$rs_project['project_nearby_places_en'];
                       $project_zone=$rs_project['project_zone'];
                       $project_zone_en=$rs_project['project_zone_en'];
                       $project_common_fee=$rs_project['project_common_fee'];
                       $project_map=$rs_project['project_map'];
                    
                
                if($ex_list_deal_type=='1'){  $deal_type_name_th="ขาย";   $deal_type_name_en="FOR SELL ";
                }else{ $deal_type_name_th="เช่า";  $deal_type_name_en="FOR RENT ";}

      /////////// type_asset ////////////////
             $sql_ass="SELECT * FROM type_asset where id='$ex_list_listing_type' ";  
             $result_ass= $conn->query($sql_ass);
             $rs_ass=$result_ass->fetch_assoc();

             if($rs_ass['name']!=''){ $name_asset_th=$rs_ass['name'];  }
             if($rs_ass['name_en']!=''){ $name_asset_en=$rs_ass['name_en'];  }
      ////////// End type_asset ////////////////


      ///////////////// จังหวัด ////////////////
                $sql_p="SELECT * FROM provinces WHERE id='$provinces' "; 
                $result_p=$conn->query($sql_p);
                $rs_p=$result_p->fetch_assoc();

                $provinces_in_thai=$rs_p['provinces_in_thai'];
                $provinces_in_english=$rs_p['provinces_in_english'];
                $province_id=$rs_p['id'];

      ///////////////// อำเภอ ////////////////
                $sql_d="SELECT * FROM districts WHERE id='$amphures' "; 
                $result_d=$conn->query($sql_d);
                $rs_d=$result_d->fetch_assoc();

                $districts_in_thai=$rs_d['districts_in_thai'];
                $districts_in_english=$rs_d['districts_in_english'];


      //////////////// ตำบล ////////////////
                $sql_s="SELECT * FROM subdistricts WHERE id='$districts' "; 
                $result_s=$conn->query($sql_s);
                $rs_s=$result_s->fetch_assoc();
                  
                $subdistricts_in_thai=$rs_s['subdistricts_in_thai'];
                $subdistricts_in_english=$rs_s['subdistricts_in_english'];
                $zip_code=$rs_s['zip_code'];

      /////////// type_train_station ////////////////
             $sql_train="SELECT * FROM type_train_station where station_id='$project_train_station' ";  
             $result_train= $conn->query($sql_train);
             $rs_train=$result_train->fetch_assoc(); 

             $station_name=$rs_train['station_train'];
             $station_name_en=$rs_train['station_name_en'];
  
             if($station_name!=''){ $station_train_th=$rs_train['station_train']; } 
             if($station_name_en!=''){ $station_name_en=$rs_train['station_name_en'];}  
              
      /////////// End type_train_station ////////////////


                 }
                  ////////////////// END type_project /////////////////////////////

                if($edit=="edit"){

                      if($ex_list_heading==''){
                             
                             $ex_list_heading=$deal_type_name_th.$name_asset_th." ".$project_name." ".$station_train_th." ".$subdistricts_in_thai." ".$districts_in_thai." ".$provinces_in_thai." ".$id;

                             $ex_list_heading_en=$deal_type_name_en.$name_asset_en." ".$project_name." ".$station_train_en." ".$subdistricts_in_english." ".$districts_in_english." ".$provinces_in_english." ".$id;

                      }
 
                      $sql = "UPDATE dbo_data_excel_listing SET 
                                ex_list_contract_type='".$ex_list_contract_type."',
                                ex_list_contract_code='".$ex_list_contract_code."',
                                ex_list_listing_type='".$ex_list_listing_type."',
                                ex_list_deal_type='".$ex_list_deal_type."',
                                ex_list_project='".$ex_list_project."',
                                ex_list_heading_en='".$ex_list_heading_en."',
                                ex_list_house_number='".$ex_list_house_number."',
                                ex_list_alley='".$ex_list_alley."',
                                ex_list_road='".$ex_list_road."',
                                ex_list_sqm='".$ex_list_sqm."',
                                ex_list_parking='".$ex_list_parking."',
                                ex_list_bedroom='".$ex_list_bedroom."',
                                ex_list_bathroom='".$ex_list_bathroom."',
                                ex_list_other_room='".$ex_list_other_room."',
                                ex_list_floor='".$ex_list_floor."',
                                ex_list_total_floors='".$ex_list_total_floors."',
                                ex_list_furniture='".$ex_list_furniture."',
                                ex_list_furniture_en='".$ex_list_furniture_en."',
                                ex_list_pets='".$ex_list_pets."',
                                ex_list_direction='".$ex_list_direction."',
                                ex_list_details='".$ex_list_details."',
                                ex_list_subdistrict='".$districts."',
                                ex_list_district='".$amphures."',
                                ex_list_province='".$provinces."',
                                ex_list_train_station='".$ex_list_train_station."',
                                ex_list_googlmap='".$ex_list_googlmap."',
                                ex_list_showmap='".$ex_list_showmap."',
                                ex_list_heading='".$ex_list_heading."',
                                ex_list_price='".$ex_list_price."',
                                ex_list_remark='".$ex_list_remark."',
                                ex_list_video='".$ex_list_video."',
                                ex_list_common_fee='".$ex_list_common_fee."',
                                ex_list_contact_name='".$ex_list_contact_name."',
                                ex_list_contact_tel='".$ex_list_contact_tel."',
                                ex_list_contact_email='".$ex_list_contact_email."',
                                ex_list_contact_lineid='".$ex_list_contact_lineid."',
                                ex_list_contact_fb='".$ex_list_contact_fb."',
                                ex_list_contact_name_2='".$ex_list_contact_name_2."',
                                ex_list_contact_tel_2='".$ex_list_contact_tel_2."',
                                ex_list_contact_email_2='".$ex_list_contact_email_2."',
                                ex_list_contact_lineid_2='".$ex_list_contact_lineid_2."',
                                ex_list_contact_fb_2='".$ex_list_contact_fb_2."',
                                project_id='".$project."',
                                ex_list_listing_status='".$ex_list_listing_status."',
                                ex_list_rent_till='".$ex_list_rent_till."', 
                                ex_list_public='".$ex_list_public."',
                                ex_list_premium='".$ex_list_premium."',
                                ex_list_boostpost='".$ex_list_boostpost."',
                                ex_list_date_update='".$date."' 
                                WHERE ex_list_listing_code='".$id."' "; 


                       if($ex_list_rent_update=='update'){
                       
                            $record_note="แก้ไข/อัพเดท Listing : ".$id; 

                                  $sql_rent="INSERT INTO dbo_listing_status ( record_note , ex_list_listing_status, ex_list_id, listing_status_create, register_id ,listing_status_note)
                                         VALUES ( '$record_note' , '$ex_list_listing_status', '$id' ,'$date' ,'$user_id' , '$ex_list_rent_till' )";
                                          mysqli_query($conn, $sql_rent);  

                       }else{



                       }        

                      
                            $sql_img_a="SELECT * FROM dbo_data_excel_listing_img where ex_list_listing_code='$id' order by listing_img_no  DESC"; 
                            $result_img_a=$conn->query($sql_img_a); 
                            $rs_img_a=$result_img_a->fetch_assoc();

                            $listing_img_no=$rs_img_a['listing_img_no'];


                      isset( $_FILES['filUpload'] ) ? $file = $_FILES['filUpload'] : $file = "";
                   
                      if($listing_img_no!=''){ $ns=$listing_img_no; }else{ $ns=0; }
                    

                      if( !empty( $file ) ) {


                                // ZIP ไฟล์ 
                               /*   $ZipName = "../../images/listing/$id/".$id.".zip";
                                  require_once("dZip.inc.php"); // include Class
                                  $zip = new dZip($ZipName);  */ // New Class


                          for( $i=0; $i<count( $file['name'] ); $i++ ) {  $ns++; 
                                
                              $image=$file['tmp_name'][$i];
                              $image_name=$file['name'][$i];
                              $image_size=$file['size'][$i];
                              $image_type=$file['type'][$i]; 


                              if($img_folder!=''){ 
                                       $img_folder=$img_folder;   
                                       $img_folders=$img_folder;
                              } else{ 
                                       $img_folder='../../images/listing/'.$id.'/';  $img_folders="";   }

                  
                              mkdir($img_folder."no_watermark");

                       /*
                              $size=GetimageSize($image);
                              $height=round($width*$size[1]/$size[0]);
                              $images_orig = ImageCreateFromJPEG($image);
                              $photoX = ImagesX($images_orig);
                              $photoY = ImagesY($images_orig);
                              $myCopyright = imagecreatefrompng('watermark.png');                    
                              $srcWidth = imagesx($myCopyright);
                              $srcHeight = imagesy($myCopyright);
                              $destX = ($photoX - $srcWidth) / 2;
                              $destY = ($photoY - $srcHeight) / 1;    

                              $images_fin = ImageCreateTrueColor($width, $height);          
                              ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
                              imagecopymerge($images_fin, $myCopyright, $destX, $destY, 0, 0, $srcWidth, $srcHeight, 50);
                              
                              imagejpeg($images_fin,"../../images/listing/$id/$image_name");
                              ImageDestroy($images_orig);
                              ImageDestroy($images_fin);      */

                              $width=800; //*** Fix Width & Heigh (Autu caculate) ***//

                              $size=GetimageSize($image);
                              $height=round($width*$size[1]/$size[0]);
                              $images_orig = ImageCreateFromJPEG($image);
                              $photoX = ImagesX($images_orig);
                              $photoY = ImagesY($images_orig);
                              $images_fin = ImageCreateTrueColor($width, $height);
                              ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
                              ImageJPEG($images_fin, $img_folder."no_watermark/$image_name");
                              ImageDestroy($images_orig);
                              ImageDestroy($images_fin);
 
 
                              // ใส่ลายน้ำ //
                              $myImage = imagecreatefromjpeg($img_folder."no_watermark/$image_name");
                              $myCopyright = imagecreatefromgif('watermark.gif'); 
                              $destWidth = imagesx($myImage);
                              $destHeight = imagesy($myImage);
                              $srcWidth = imagesx($myCopyright);
                              $srcHeight = imagesy($myCopyright);

                              $destX = ($destWidth - $srcWidth) / 1;
                              $destY = ($destHeight - $srcHeight) / 40;
                              //$white = imagecolorexact($myCopyright, 255, 255, 255);
                              //imagecolortransparent($myCopyright, $white);

                              imagecopymerge($myImage, $myCopyright, $destX, $destY, 0, 0, $srcWidth, $srcHeight, 100); 
                              imagejpeg($myImage,$img_folder."$image_name");
                              imagedestroy($myImage);
                              imagedestroy($myCopyright);   


                            // copy($image,"../../images/listing/$id/$image_name");  
        
                              if($image!=''){

                                    $sql_1="INSERT INTO dbo_data_excel_listing_img (ex_list_listing_code,listing_img_folder, listing_img_name, listing_img_no, listing_img_date )
                                         VALUES ('$id','$img_folders' ,'$image_name' ,'$ns' ,'$date_up' )";
                                          mysqli_query($conn, $sql_1);  

                                  
                                 // $zip->addFile($image,$image_name); // Source,Destination                       
          
                              }  
                          }

                           // $zip->save();

                      }
 



             /////*********  COPY LISTING อีกฉลับ  *********/////
                    if($check_copy=='1'){

                         $sql_list_code="SELECT ex_list_listing_code , ex_list_id FROM dbo_data_excel_listing order by ex_list_id DESC";
                         $result_list_code = $conn->query($sql_list_code);  
                         $rs_code=$result_list_code->fetch_assoc();
                         
                         $list_listing_code=$rs_code['ex_list_listing_code'];

                        $a = str_replace("CX-","",$list_listing_code,$count);
        
                           $a=$a+1;
                  
                         $code = sprintf("CX-%'05d",$a); 


                     $sql3="INSERT INTO dbo_data_excel_listing  ( ex_list_listing_code,ex_list_contract_type ,ex_list_contract_code ,ex_list_listing_type ,ex_list_deal_type ,ex_list_project ,ex_list_heading_en ,ex_list_house_number ,ex_list_alley ,ex_list_road ,ex_list_sqm,ex_list_parking ,ex_list_bedroom , ex_list_bathroom ,ex_list_other_room ,ex_list_floor ,ex_list_total_floors ,ex_list_furniture , ex_list_furniture_en ,ex_list_pets , ex_list_direction  , ex_list_details ,ex_list_subdistrict , ex_list_district , ex_list_province ,ex_list_train_station ,ex_list_heading , ex_list_price , ex_list_common_fee ,ex_list_contact_name ,ex_list_contact_tel , ex_list_contact_email , ex_list_contact_lineid , project_id , ex_list_listing_status ,ex_list_rent_till,ex_list_date_create,ex_list_date_update)
                       VALUES ('$code','$ex_list_contract_type' , '$ex_list_contract_code' , '$ex_list_listing_type','$ex_list_deal_type','$ex_list_project','$ex_list_heading_en','$ex_list_house_number','$ex_list_alley','$ex_list_road','$ex_list_sqm','$ex_list_parking','$ex_list_bedroom','$ex_list_bathroom','$ex_list_other_room','$ex_list_floor' , '$ex_list_total_floors','$ex_list_furniture','$ex_list_furniture_en','$ex_list_pets','$ex_list_direction','$ex_list_details','$amphures','$district','$provinces','$ex_list_train_station','$ex_list_heading','$ex_list_price','$ex_list_common_fee','$ex_list_contact_name','$ex_list_contact_tel','$ex_list_contact_email','$ex_list_contact_lineid','$project','$ex_list_listing_status','$ex_list_rent_till','$date','$date' )"; 
                     mysqli_query($conn, $sql3); 

                                        //สร้างโฟลเดอร์อัตโนมัติโดยตั้งชื่อตามว/ด/ป
                     date_default_timezone_set('Asia/Bangkok');  
                     mkdir("../../images/listing/$code");
                     mkdir("../../images/listing/$code/no_watermark");


                            $record_note1="เพิ่ม Listing : ".$code; 

                                  $sql_rent1="INSERT INTO dbo_listing_status ( record_note , ex_list_listing_status, ex_list_id, listing_status_create, register_id ,listing_status_note)
                                         VALUES ( '$record_note1' , '$ex_list_listing_status', '$code' ,'$date' ,'$user_id' , '$ex_list_rent_till' )";
                                          mysqli_query($conn, $sql_rent1);  
                             


                            $sql_img="SELECT * FROM dbo_data_excel_listing_img where ex_list_listing_code='$id' order by listing_img_no  ASC"; 
                            $result_img=$conn->query($sql_img);
                              
                            $i2=0;
                     
                              while($rs_img=$result_img->fetch_assoc()) {   $i2++;

                                 $listing_img_folder=$rs_img['listing_img_folder'];
                                 $listing_img_name=$rs_img['listing_img_name'];

                                 if($listing_img_folder==''){ $listing_img_folder="../../images/listing/$id/"; }
 
                                    
                                     copy($listing_img_folder.$listing_img_name,"../../images/listing/$code/".$listing_img_name);


                                    $sql_img_1="INSERT INTO dbo_data_excel_listing_img (ex_list_listing_code, listing_img_name, listing_img_no, listing_img_date )
                                         VALUES ('$code', '$listing_img_name' ,'$i2' ,'$date' )";
                                          mysqli_query($conn, $sql_img_1);  
 
                              }               

                }
           //*********  COPY LISTING อีกฉลับ  *********///


                  
                    if($check_copy=='1'){

                    
                        if ($conn->query($sql) === TRUE) {
                           
                             echo '<script type="text/javascript">alert("ทำการอัพเดทและ Copy สำเนาใหม่เรียบร้อย");</script>';
                             echo("<script> top.location.href='../?page=$page&status=edit&id=$code'</script>");   
                        } else { 
                             echo '<script type="text/javascript">alert("Error");</script>';
                             echo "Error updating record: " . $conn->error;   
                        } 
                    }else{

                    
                        if ($conn->query($sql) === TRUE) {

                              include("check_listing_create.php");

                              /*
                             echo '<script type="text/javascript">alert("Record updated successfully");</script>';
                             echo("<script> top.location.href='../?page=$page&status=edit&id=$id'</script>");    */
 
                               
                        } else { 
                             echo '<script type="text/javascript">alert("Error");</script>';
                             echo "Error updating record: " . $conn->error;   
                        } 

                    }

                }else{ 

                       
                 }           
 
       }  //END create_listing


///////////////////////////////     END  create_listing            ////////////////////////////////////



///////////////////////////////     create_project      ////////////////////////////////////

       if($page=='create_project'){   //create_project
 
              $project_name=$_POST['project_name'];
              $project_name_en=$_POST['project_name_en'];
              $project_type=$_POST['project_type'];
              $project_alley=$_POST['project_alley'];
              $project_road=$_POST['project_road'];

              $provinces=$_POST['provinces'];
              $amphures=$_POST['amphures'];
              $districts=$_POST['districts'];

              $project_train_station=$_POST['project_train_station'];
 
              $project_number_buildings=$_POST['project_number_buildings'];
              $project_total_floors=$_POST['project_total_floors'];
 
              $project_facilities=$_POST['project_facilities'];
              $project_facilities_en=$_POST['project_facilities_en'];
              $project_facilities_icon=$_POST['project_facilities_icon'];
              $project_nearby_places=$_POST['project_nearby_places'];
              $project_nearby_places_en=$_POST['project_nearby_places_en'];
              $project_common_fee=$_POST['project_common_fee'];

              $project_map=$_POST['project_map'];
              $project_zone=$_POST['project_zone']; 
              $project_zone_en=$_POST['project_zone_en']; 
 

                if($edit=="edit"){



                    isset( $_POST['project_facilities_icon'] ) ? $project_facilities_icon = $_POST['project_facilities_icon'] : $project_facilities_icon = array();
                    if( count( $project_facilities_icon ) > 0 ) {
                        $input = array();
                        foreach( $project_facilities_icon as $v ) {
                            $input[] = $v;
                        }
                        $input = implode( ",", $input );
                       
                    }
 
                      $sql = "UPDATE type_project SET 
                                project_type='".$project_type."',
                                project_name='".$project_name."',
                                project_name_en='".$project_name_en."',
                                project_alley='".$project_alley."',
                                project_road='".$project_road."',
                                project_subdistrict='".$districts."',
                                project_district='".$amphures."',
                                project_province='".$provinces."',
                                project_train_station='".$project_train_station."',
                                project_number_buildings='".$project_number_buildings."',
                                project_total_floors='".$project_total_floors."',
                                project_facilities='".$project_facilities."',
                                project_facilities_en='".$project_facilities_en."',
                                project_facilities_icon='".$input."',
                                project_nearby_places='".$project_nearby_places."',
                                project_nearby_places_en='".$project_nearby_places_en."',
                                project_common_fee='".$project_common_fee."',
                                project_map='".$project_map."',
                                project_zone='".$project_zone."', 
                                project_zone_en='".$project_zone_en."', 
                                project_update='".$date."'
                                WHERE project_id='".$id."' "; 

 

                      isset( $_FILES['filUpload'] ) ? $file = $_FILES['filUpload'] : $file = "";
 
                      if( !empty( $file ) ) {


                                // ZIP ไฟล์ 
                                  $ZipName = "../../images/project/$id/".$id.".zip";
                                  require_once("dZip.inc.php"); // include Class
                                  $zip = new dZip($ZipName); // New Class


                          for( $i=0; $i<count( $file['name'] ); $i++ ) {   
                                
                              $image=$file['tmp_name'][$i];
                              $image_name=$file['name'][$i];
                              $image_size=$file['size'][$i];
                              $image_type=$file['type'][$i]; 

                       /*
                              $size=GetimageSize($image);
                              $height=round($width*$size[1]/$size[0]);
                              $images_orig = ImageCreateFromJPEG($image);
                              $photoX = ImagesX($images_orig);
                              $photoY = ImagesY($images_orig);
                              $myCopyright = imagecreatefrompng('watermark.png');                    
                              $srcWidth = imagesx($myCopyright);
                              $srcHeight = imagesy($myCopyright);
                              $destX = ($photoX - $srcWidth) / 2;
                              $destY = ($photoY - $srcHeight) / 1;    

                              $images_fin = ImageCreateTrueColor($width, $height);          
                              ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
                              imagecopymerge($images_fin, $myCopyright, $destX, $destY, 0, 0, $srcWidth, $srcHeight, 50);
                              
                              imagejpeg($images_fin,"../../images/listing/$id/$image_name");
                              ImageDestroy($images_orig);
                              ImageDestroy($images_fin);      */

                              $width=800; //*** Fix Width & Heigh (Autu caculate) ***//

                              $size=GetimageSize($image);
                              $height=round($width*$size[1]/$size[0]);
                              $images_orig = ImageCreateFromJPEG($image);
                              $photoX = ImagesX($images_orig);
                              $photoY = ImagesY($images_orig);
                              $images_fin = ImageCreateTrueColor($width, $height);
                              ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
                              ImageJPEG($images_fin,"../../images/project/$id/no_watermark/$image_name");
                              ImageDestroy($images_orig);
                              ImageDestroy($images_fin);
 
 
                              // ใส่ลายน้ำ //
                              $myImage = imagecreatefromjpeg("../../images/project/$id/no_watermark/$image_name");
                              $myCopyright = imagecreatefromgif('watermark.gif'); 
                              $destWidth = imagesx($myImage);
                              $destHeight = imagesy($myImage);
                              $srcWidth = imagesx($myCopyright);
                              $srcHeight = imagesy($myCopyright);

                              $destX = ($destWidth - $srcWidth) / 1;
                              $destY = ($destHeight - $srcHeight) / 30;
                              //$white = imagecolorexact($myCopyright, 255, 255, 255);
                              //imagecolortransparent($myCopyright, $white);

                              imagecopymerge($myImage, $myCopyright, $destX, $destY, 0, 0, $srcWidth, $srcHeight, 50); 
                              imagejpeg($myImage,"../../images/project/$id/$image_name");
                              imagedestroy($myImage);
                              imagedestroy($myCopyright);   


                            // copy($image,"../../images/listing/$id/$image_name");  
        
                              if($image!=''){

                                    $sql_1="INSERT INTO type_project_img (project_id, project_img_name, project_img_no ,project_img_date )
                                         VALUES ('$id', '$image_name' ,'$i' ,'$date_up' )";
                                          mysqli_query($conn, $sql_1);  

                                  
                                  $zip->addFile($image,$image_name); // Source,Destination                       
          
                              }  
                          } 
                            $zip->save(); 
                      }

 


                   
                      if ($conn->query($sql) === TRUE) {  
                           echo '<script type="text/javascript">alert("Record updated successfully");</script>';
                           echo("<script> top.location.href='../?page=$page&status=edit&id=$id'</script>");   
                      } else {
                  
                           echo '<script type="text/javascript">alert("Error");</script>';
                           echo "Error updating record: " . $conn->error;  
                      } 


                }else{ 

                           $sql_1="INSERT INTO type_project (project_name, project_name_en, project_type, project_alley, project_road , project_subdistrict, project_district , project_province, project_train_station , project_number_buildings , project_total_floors , project_facilities , project_facilities_en , project_nearby_places , project_nearby_places_en , project_zone , project_zone_en )

                           VALUES ('$project_name', '$project_name_en', '$project_type' , '$project_alley' , '$project_road' ,'$districts' ,'$amphures' ,'$provinces' ,'$project_train_station' ,'$project_number_buildings'   ,'$project_total_floors' ,'$project_facilities' , '$project_facilities_en' , '$project_nearby_places' , '$project_nearby_places_en' , '$project_zone' , '$project_zone_en' )";
                            mysqli_query($conn, $sql_1);  

 
                     ///////////////////   type_project ////////////////////
                          $sql_project="SELECT * FROM type_project  order by project_id DESC ";
                          $result_project= $conn->query($sql_project);  
                          $rs_project=$result_project->fetch_assoc();

                          $project_id=$rs_project['project_id'];
                     ///////////////////  END type_project ////////////////////

                       date_default_timezone_set('Asia/Bangkok');  
                       mkdir("../../images/project/$project_id");  //สร้างโฟลเดอร์
                       mkdir("../../images/project/$project_id/no_watermark");  //สร้างโฟลเดอร์


                      isset( $_FILES['filUpload'] ) ? $file = $_FILES['filUpload'] : $file = "";
 
                      if( !empty( $file ) ) {


                                // ZIP ไฟล์ 
                        /*
                                  $ZipName = "../../images/project/$project_id/".$project_id.".zip";
                                  require_once("dZip.inc.php"); // include Class
                                  $zip = new dZip($ZipName);  */ // New Class


                          for( $i=0; $i<count( $file['name'] ); $i++ ) {   
                                
                              $image=$file['tmp_name'][$i];
                              $image_name=$file['name'][$i];
                              $image_size=$file['size'][$i];
                              $image_type=$file['type'][$i]; 

                       /*
                              $size=GetimageSize($image);
                              $height=round($width*$size[1]/$size[0]);
                              $images_orig = ImageCreateFromJPEG($image);
                              $photoX = ImagesX($images_orig);
                              $photoY = ImagesY($images_orig);
                              $myCopyright = imagecreatefrompng('watermark.png');                    
                              $srcWidth = imagesx($myCopyright);
                              $srcHeight = imagesy($myCopyright);
                              $destX = ($photoX - $srcWidth) / 2;
                              $destY = ($photoY - $srcHeight) / 1;    

                              $images_fin = ImageCreateTrueColor($width, $height);          
                              ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
                              imagecopymerge($images_fin, $myCopyright, $destX, $destY, 0, 0, $srcWidth, $srcHeight, 50);
                              
                              imagejpeg($images_fin,"../../images/listing/$id/$image_name");
                              ImageDestroy($images_orig);
                              ImageDestroy($images_fin);      */

                              $width=800; //*** Fix Width & Heigh (Autu caculate) ***//

                              $size=GetimageSize($image);
                              $height=round($width*$size[1]/$size[0]);
                              $images_orig = ImageCreateFromJPEG($image);
                              $photoX = ImagesX($images_orig);
                              $photoY = ImagesY($images_orig);
                              $images_fin = ImageCreateTrueColor($width, $height);
                              ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
                              ImageJPEG($images_fin,"../../images/project/$project_id/no_watermark/$image_name");
                              ImageDestroy($images_orig);
                              ImageDestroy($images_fin);
 
 
                              // ใส่ลายน้ำ //
                              $myImage = imagecreatefromjpeg("../../images/project/$project_id/no_watermark/$image_name");
                              $myCopyright = imagecreatefrompng('watermark.png'); 
                              $destWidth = imagesx($myImage);
                              $destHeight = imagesy($myImage);
                              $srcWidth = imagesx($myCopyright);
                              $srcHeight = imagesy($myCopyright);

                              $destX = ($destWidth - $srcWidth) / 1;
                              $destY = ($destHeight - $srcHeight) / 30;
                              //$white = imagecolorexact($myCopyright, 255, 255, 255);
                              //imagecolortransparent($myCopyright, $white);

                              imagecopymerge($myImage, $myCopyright, $destX, $destY, 0, 0, $srcWidth, $srcHeight, 100); 
                              imagejpeg($myImage,"../../images/project/$project_id/$image_name");
                              imagedestroy($myImage);
                              imagedestroy($myCopyright);   


                            // copy($image,"../../images/listing/$id/$image_name");  
        
                              if($image!=''){

                                    $sql_1="INSERT INTO type_project_img (project_id, project_img_name, project_img_no ,project_img_date )
                                         VALUES ('$project_id', '$image_name' ,'$i' ,'$date_up' )";
                                          mysqli_query($conn, $sql_1);  

                                  /*
                                  $zip->addFile($image,$image_name); */   // Source,Destination                       
          
                              }  
                          }
                     
                           /* $zip->save(); */

                      }

                    
                         if($list_id!=''){   

                                   echo '<script type="text/javascript">alert("Record Create successfully");</script>';
                                   echo("<script> top.location.href='../?page=create_listing&status=edit&id=$list_id&project_id=$project_id'</script>");   
                             
                         }else{
                                   echo '<script type="text/javascript">alert("Record Create successfully");</script>';
                                   echo("<script> top.location.href='../?page=project'</script>"); 
                         }    

                }
       }  //END create_project


///////////////////////////////     END  create_project            ////////////////////////////////////.



///////////////////////////////     upload_list_public      ////////////////////////////////////

       if($page=='upload_list_public'){   //upload_list_public

                          $sql="SELECT DISTINCT ex_list_listing_code FROM dbo_data_excel_listing_img
                                order by ex_list_listing_code ASC ";
                          $result= $conn->query($sql);  
                          while($rs=$result->fetch_assoc()){ 

                            $ex_list_listing_code=$rs['ex_list_listing_code'];

                              $sql = "UPDATE dbo_data_excel_listing SET 
                                        ex_list_public='1'
                                        WHERE ex_list_listing_code='".$ex_list_listing_code."' "; 


                              if ($conn->query($sql) === TRUE) {  
                                     echo "ดำเนินการเปลี่ยน ".$ex_list_listing_code." (มีรูปภาพ) แสดงด้านหน้าเว็บไซต์ เรียบร้อย <br>";
                              }

                          }
 
 
  

       }  //END upload_list_public 

///////////////////////////////     END  upload_list_public            ////////////////////////////////////.




///////////////////////////////     create_buyer_contact      ////////////////////////////////////

       if($page=='create_buyer_contact'){   //create_buyer_contact

              $buyer_contact_type=$_POST['buyer_contact_type'];
              $buyer_contact_attention=$_POST['buyer_contact_attention'];
              $buyer_contact_name=$_POST['buyer_contact_name'];
              $buyer_contact_tel=$_POST['buyer_contact_tel'];
              $buyer_contact_line=$_POST['buyer_contact_line'];

              $buyer_contact_budget=$_POST['buyer_contact_budget'];
              $sale_id=$_POST['sale_id'];
              $buyer_contact_note=$_POST['buyer_contact_note'];
              $buyer_contact_status=$_POST['buyer_contact_status'];
 
 

                if($edit=="edit"){

                      $sql = "UPDATE dbo_buyer_contact SET 
                                buyer_contact_type='".$buyer_contact_type."',
                                buyer_contact_attention='".$buyer_contact_attention."',
                                buyer_contact_name='".$buyer_contact_name."',
                                buyer_contact_tel='".$buyer_contact_tel."',
                                buyer_contact_line='".$buyer_contact_line."',
                                buyer_contact_budget='".$buyer_contact_budget."',
                                sale_id='".$sale_id."',
                                buyer_contact_status='".$buyer_contact_status."',
                                buyer_contact_date_update='".$date."',
                                buyer_contact_note='".$buyer_contact_note."' 
                                WHERE buyer_contact_id='".$id."' "; 


                      if ($conn->query($sql) === TRUE) {  
                           echo '<script type="text/javascript">alert("Record updated successfully");</script>';
                           echo("<script> top.location.href='../?page=$page&status=edit&id=$id'</script>");   
                      } else {
                  
                           echo '<script type="text/javascript">alert("Error");</script>';
                           echo "Error updating record: " . $conn->error;  
                      } 

                }else{

                           $sql_1="INSERT INTO dbo_buyer_contact (buyer_contact_type, buyer_contact_attention, buyer_contact_name, buyer_contact_tel, buyer_contact_line , buyer_contact_budget, sale_id , buyer_contact_note , buyer_contact_status , buyer_contact_date_create )

                           VALUES ('$buyer_contact_type', '$buyer_contact_attention', '$buyer_contact_name' , '$buyer_contact_tel' , '$buyer_contact_line' ,'$buyer_contact_budget' ,'$sale_id' ,'$buyer_contact_note' , '$buyer_contact_status' ,'$date' )";
                            mysqli_query($conn, $sql_1);  



                      
                                   echo '<script type="text/javascript">alert("Record Create successfully");</script>';
                                   echo("<script> top.location.href='../?page=$page'</script>"); 
                          
                }

       }  //END create_buyer_contact 

///////////////////////////////     END  create_buyer_contact            ////////////////////////////////////.



///////////////////////////////     upload_position      ////////////////////////////////////

       if($page=='upload_position'){   //upload_position


                          $sql="SELECT ex_list_googlmap,ex_list_listing_code, ex_list_latitude FROM dbo_data_excel_listing where ex_list_latitude=''  order by ex_list_listing_code ASC ";
                          $result= $conn->query($sql);  
                          while($rs=$result->fetch_assoc()){ 

                             $ex_list_googlmap=$rs['ex_list_googlmap']; 
                             $ex_list_listing_code=$rs['ex_list_listing_code']; 
 

                            $curl = curl_init($ex_list_googlmap);
                            curl_setopt($curl, CURLOPT_FAILONERROR, true);
                            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
                            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
                            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);  
                            $result = curl_exec($curl);

                             
                             
                            $all=stristr($result,"[null,null,[null,[2,");

                             

                             $n1=substr($all,20 , 10);

                             $n2=substr($all,31 , 11 );

                            $n1 = str_replace(",","",$n1,$count);
                            $n2 = str_replace(",","",$n2,$count);
                          
                             
  

                     
                            echo $ex_list_listing_code." = Latitude : ".$n2." |  Longitude : ".$n1;

                      
             

       }  //END upload_position 

///////////////////////////////     END  upload_position            ////////////////////////////////////.

 

///////////////////////////////     upload_mini_images      ////////////////////////////////////

       if($page=='upload_mini_images'){   //upload_mini_images



                          $sql="SELECT * FROM dbo_data_excel_listing_img where listing_img_st='0' 
                                order by ex_list_listing_code ASC ";
                          $result= $conn->query($sql);  
                          while($rs=$result->fetch_assoc()){ 

                            $ex_list_listing_code=$rs['ex_list_listing_code'];
                            $listing_img_name=$rs['listing_img_name'];
                            $listing_img_folder=$rs['listing_img_folder'];
                            $listing_img_id=$rs['listing_img_id'];
      

                             date_default_timezone_set('Asia/Bangkok');   

                            if($listing_img_folder!=''){

                                mkdir($listing_img_folder."mini_w100");
                                mkdir($listing_img_folder."mini_w300");
                                $img_folder_mini_w100=$listing_img_folder."mini_w100/";
                                $img_folder_mini_w300=$listing_img_folder."mini_w300/";

                                $img_folder=$listing_img_folder.$listing_img_name;

                            }else{

                                 mkdir("../../images/listing/$ex_list_listing_code/mini_w100");
                                 mkdir("../../images/listing/$ex_list_listing_code/mini_w300");
                                 $img_folder_mini_w100="../../images/listing/$ex_list_listing_code/mini_w100/";
                                 $img_folder_mini_w300="../../images/listing/$ex_list_listing_code/mini_w300/";

                                 $img_folder="../../images/listing/$ex_list_listing_code/$listing_img_name";
                            }
   


                              $width=100; //*** Fix Width & Heigh (Autu caculate) ***//
                              $size=GetimageSize($img_folder);
                              $height=round($width*$size[1]/$size[0]);
                              $images_orig = ImageCreateFromJPEG($img_folder);
                              $photoX = ImagesX($images_orig);
                              $photoY = ImagesY($images_orig);
                              $images_fin = ImageCreateTrueColor($width, $height);
                              ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
                              ImageJPEG($images_fin,$img_folder_mini_w100."$listing_img_name");
                              ImageDestroy($images_orig);
                              ImageDestroy($images_fin);


                              $width=300; //*** Fix Width & Heigh (Autu caculate) ***//
                              $size=GetimageSize($img_folder);
                              $height=round($width*$size[1]/$size[0]);
                              $images_orig = ImageCreateFromJPEG($img_folder);
                              $photoX = ImagesX($images_orig);
                              $photoY = ImagesY($images_orig);
                              $images_fin = ImageCreateTrueColor($width, $height);
                              ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
                              ImageJPEG($images_fin,$img_folder_mini_w300."$listing_img_name");
                              ImageDestroy($images_orig);
                              ImageDestroy($images_fin);
                            
 
                               
                      $sql = "UPDATE dbo_data_excel_listing_img SET 
                                listing_img_st='1' 
                                WHERE ex_list_listing_code='".$ex_list_listing_code."' "; 

                                if ($conn->query($sql) === TRUE) {  }

                          }
           
           

       }  //END upload_mini_images 

///////////////////////////////     END  upload_mini_images            ////////////////////////////////////.




 
///////////////////////////////     create_deal_buyer      ////////////////////////////////////


       if($page=='create_deal_buyer'){   //create_deal_buyer


              $ex_list_listing_code=$_POST['ex_list_listing_code'];
              $buyer_contact_id=$_POST['buyer_contact_id'];
              $contact_deal_status=$_POST['contact_deal_status'];
              $deal_status_assign_date=$_POST['deal_status_assign_date'];
              $deal_status_contract_date=$_POST['deal_status_contract_date'];
              $deal_status_assign_date=$_POST['deal_status_assign_date'];
              $contact_deal_win=$_POST['contact_deal_win'];
              $create_deal_sale=$_POST['create_deal_sale'];
              $deal_status_credit_date=$_POST['deal_status_credit_date'];

                if($edit=="edit"){


                      $sql = "UPDATE dbo_create_deal SET 
                                buyer_contact_type='".$buyer_contact_type."',
                                buyer_contact_attention='".$buyer_contact_attention."',
                                buyer_contact_name='".$buyer_contact_name."',
                                buyer_contact_tel='".$buyer_contact_tel."',
                                buyer_contact_line='".$buyer_contact_line."',
                                buyer_contact_budget='".$buyer_contact_budget."',
                                sale_id='".$sale_id."',
                                buyer_contact_status='".$buyer_contact_status."',
                                deal_status_assign_date='".$deal_status_assign_date."',
                                deal_status_contract_date='".$deal_status_contract_date."',
                                deal_status_credit_date='".$deal_status_credit_date."',
                                buyer_contact_date_update='".$date."',
                                buyer_contact_note='".$buyer_contact_note."' 
                                WHERE buyer_contact_id='".$id."' "; 


                }else{


                           $sql_1="INSERT INTO dbo_create_deal (ex_list_listing_code, buyer_contact_id, contact_deal_status, contact_deal_win, create_deal_sale , create_deal_user, buyer_contact_date_create )

                           VALUES ('$ex_list_listing_code', '$buyer_contact_id', '$contact_deal_status' , '$contact_deal_win' , '$create_deal_sale' ,'$create_deal_user'  ,'$date' )";
                            mysqli_query($conn, $sql_1);  
 
                      
                            echo '<script type="text/javascript">alert("Record Create successfully");</script>';
                            echo("<script> top.location.href='../?page=deal_buyer'</script>"); 


                }

       }//create_deal_buyer

///////////////////////////////     END create_deal_buyer      ////////////////////////////////////



///////////////////////////////           ////////////////////////////////////

  if($status_get=='unsave'){
       if($page_get=='portfolio_listing'){   //create_deal_buyer


             $sql = "DELETE FROM dbo_listing_save WHERE listing_save_id  ='".$id_p_get."'";

             if ($conn->query($sql) === TRUE) {
                   echo '<script type="text/javascript">alert("Record deleted successfully");</script>';
                   echo("<script> top.location.href='../?page=portfolio_listing'</script>"); 
             }else{
                   echo "Error deleting record: " . $conn->error;
             } 

       } 
  }



       ///////////////////////// DEL ///////////////////////////

  if($status_get=='del'){

      
      if($page_get=='create_listing'){       $part_1=$id_get;   $part_2=$id_get." New";     $zip_s=$id_get.".zip";
      
             // sql to delete a record
             $sql = "DELETE FROM dbo_data_excel_listing WHERE ex_list_listing_code ='".$id_get."'";


                 $sql_list_img="SELECT * FROM dbo_data_excel_listing_img where ex_list_listing_code='$id_get' order by listing_img_no ASC";
                  $result_list_img = $conn->query($sql_list_img);  
                  while($rs_list_img=$result_list_img->fetch_assoc()){

                     $listing_img_folder=$rs_list_img['listing_img_folder'];
                     $listing_img_name=$rs_list_img['listing_img_name'];
                    
                       unlink ("../../images/listing/$part_1/$listing_img_name");
                       unlink ("../../images/listing/$part_2/$listing_img_name");

                       unlink ("../../images/listing/$part_1/no_watermark/$listing_img_name");
                       unlink ("../../images/listing/$part_2/no_watermark/$listing_img_name");
                       
                       unlink ("../../images/listing/$part_1/$zip_s");
                       unlink ("../../images/listing/$part_2/$zip_s");


                  }

             $sql_img = "DELETE FROM dbo_data_excel_listing_img WHERE ex_list_listing_code='".$id_get."'  ";
             $conn->query($sql_img);

             if ($conn->query($sql) === TRUE) {
                   echo '<script type="text/javascript">alert("Record deleted successfully");</script>';
                   echo("<script> top.location.href='../?page=upload_file_excel_check'</script>"); 
             }else{
                   echo "Error deleting record: " . $conn->error;
             } 
      }



          // DEL CREATE PROJECT
      if($page_get=='create_project'){       $part_1=$id_get;   $part_2=$id_get." New";     $zip_s=$id_get.".zip";
      
             // sql to delete a record
             $sql = "DELETE FROM type_project WHERE project_id ='".$id_get."'";


                 $sql_list_img="SELECT * FROM type_project_img where project_id='$id_get'  ";
                  $result_list_img = $conn->query($sql_list_img);  
                  while($rs_list_img=$result_list_img->fetch_assoc()){

 
                     $project_img_name=$rs_list_img['project_img_name'];
                    
                       unlink ("../../images/project/$project_img_name");  


                  }

             $sql_img = "DELETE FROM type_project_img WHERE project_id='".$id_get."'  ";
             $conn->query($sql_img);

             if ($conn->query($sql) === TRUE) {
                   echo '<script type="text/javascript">alert("Record deleted successfully");</script>';
                   echo("<script> top.location.href='../?page=create_project'</script>"); 
             }else{
                   echo "Error deleting record: " . $conn->error;
             }


      }
  }



  if($status_get=='del_img'){
   
      if($page_get=='create_listing'){      $part_1=$id_get;   $part_2=$id_get." New";
                                                      
             // sql to delete a record
             $sql = "DELETE FROM dbo_data_excel_listing_img WHERE listing_img_name='".$img_get."'  and ex_list_listing_code='".$id_get."'  ";

             unlink ("../../images/listing/$part_1/$img_get");
             unlink ("../../images/listing/$part_2/$img_get");

             unlink ("../../images/listing/$part_1/no_watermark/$img_get");
             unlink ("../../images/listing/$part_2/no_watermark/$img_get");
             

             if ($conn->query($sql) === TRUE) {
                   echo '<script type="text/javascript">alert("Record deleted successfully");</script>';
                   echo("<script> top.location.href='../?page=create_listing&status=edit&id=$id_get'</script>"); 
             }else{
                   echo "Error deleting record: " . $conn->error;
             } 
      }

      if($page_get=='create_project_img'){      $part_1=$id_get;   $part_2=$id_get." New";
                                                      
             // sql to delete a record
             $sql = "DELETE FROM type_project_img WHERE project_img_name='".$img_get."'  and project_id='".$id_get."'  ";

             unlink ("../../images/project/$id_get/$img_get"); 

             unlink ("../../images/project/$id_get/no_watermark/$img_get"); 

             if ($conn->query($sql) === TRUE) {
                   echo '<script type="text/javascript">alert("Record deleted successfully");</script>';
                   echo("<script> top.location.href='../?page=create_project&status=edit&id=$id_get'</script>"); 
             }else{
                   echo "Error deleting record: " . $conn->error;
             }

      }


  }





///////////////////////////////    DEL ส่วนของระบบลบข้อมูล          ////////////////////////////////////.






 











?>