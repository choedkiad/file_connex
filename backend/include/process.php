 

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
<?php 
/*
 ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL); */   ?>
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
  $baseUrl = BASE_URL;  

if($_SESSION['USER_ID']==""){  

  
             echo '<script type="text/javascript">alert("คุณไม่ได้เข้าสู่ระบบ หรืออาจจะหลุดออกจากระบบ โปรด Log In ใหม่อีกครั้ง");</script>';
             echo("<script> top.location.href='../page/login.php'</script>"); 

 }else{



 /*
if($_SESSION['EMAIL_ID']==''){  

  echo("<script> top.location.href='../'</script>"); 
  
}*/
            $date=date("Y-m-d H:i:s");
            isset( $_SESSION['USER_ID'] ) ? $USER_ID = $_SESSION['USER_ID'] : $USER_ID = "";
            isset( $_POST['edit'] ) ? $edit = $_POST['edit'] : $edit = "";
            isset( $_POST['id'] ) ? $id = $_POST['id'] : $id = "";
            isset( $_POST['p_check'] ) ? $p_check = $_POST['p_check'] : $p_check = "";
            isset( $_POST['page'] ) ? $page = $_POST['page'] : $page = "";
            isset( $_POST['email'] ) ? $username = $_POST['email'] : $username = "";
            isset( $_POST['password'] ) ? $password = $_POST['password'] : $password = "";  
            isset( $_POST['user_id'] ) ? $user_id_s = $_POST['user_id'] : $user_id_s = "";  
            isset( $_POST['list_id'] ) ? $list_id = $_POST['list_id'] : $list_id = "";  
            isset( $_POST['check_copy'] ) ? $check_copy = $_POST['check_copy'] : $check_copy = "";  
            isset( $_POST['check_excel'] ) ? $check_excel = $_POST['check_excel'] : $check_excel = "";  
            isset( $_POST['page_del'] ) ? $page_del = $_POST['page_del'] : $page_del = "";  
            isset( $_POST['page_no'] ) ? $page_no = $_POST['page_no'] : $page_no = "";  

            isset( $_GET['id'] ) ? $id_get = $_GET['id'] : $id_get = ""; 
            isset( $_GET['page'] ) ? $page_get = $_GET['page'] : $page_get = ""; 
            isset( $_GET['status'] ) ? $status_get = $_GET['status'] : $status_get = ""; 
            isset( $_GET['id_p'] ) ? $id_p_get = $_GET['id_p'] : $id_p_get = "";    
            isset( $_GET['img'] ) ? $img_get = $_GET['img'] : $img_get = "";  
            isset( $_GET['part'] ) ? $part_get = $_GET['part'] : $part_get = "";  

            isset( $_POST['request_d'] ) ? $request_d = $_POST['request_d'] : $request_d = "";

            isset( $_POST['step'] ) ? $step = $_POST['step'] : $step = "";
/*
            $USER_ID=$_SESSION['USER_ID'];
            $edit=$_POST['edit'];
            $date=date("Y-m-d H:i:s");
            $id=$_POST['id'];
            $p_check=$_POST['p_check'];


            $page=$_POST['page'];
            $username=$_POST['email'];
            $password=$_POST['password'];
            $user_id_s=$_POST['user_id'];

            $list_id=$_POST['list_id'];
            $check_copy=$_POST['check_copy'];
            
            $id_get=$_GET['id'];
            $page_get=$_GET['page'];
            $status_get=$_GET['status'];
            $id_p_get=$_GET['id_p'];

            $img_get=$_GET['img'];
            $part_get=$_GET['part'];
            $check_excel=$_POST['check_excel']; */

            $password=md5($password);

  



///////////////////////////////     create_register      ////////////////////////////////////

       if($page=='create_register'){   //create_register
 
              $register_id=$_POST['register_id'];
              $register_name=$_POST['register_name'];
              $register_lastname=$_POST['register_lastname'];
              $register_nickname=$_POST['register_nickname'];
              $register_email=$_POST['register_email'];
              $register_password=$_POST['register_password'];
              $register_status=$_POST['register_status'];
              $register_status_head=$_POST['register_status_head'];
              $register_position=$_POST['register_position'];
              $register_status_under=$_POST['register_status_under'];
              $register_notify=$_POST['register_notify'];
              $register_color=$_POST['register_color'];
              $register_lcok=$_POST['register_lcok'];
              $register_tel=$_POST['register_tel'];
              $register_enable=$_POST['register_enable'];
              $register_line=$_POST['register_line'];
              $register_fb=$_POST['register_fb'];
              $register_status_owner_tel=$_POST['register_status_owner_tel'];

              $date=date("Y-m-d_H:i:s");

                if($edit=="edit"){



                          if(!empty($_FILES['filUpload']['tmp_name'])){ 

                              $image=$_FILES['filUpload']['tmp_name'];
                              $image_name=$_FILES['filUpload']['name'];
                              $image_size=$_FILES['filUpload']['size'];
                              $image_type=$_FILES['filUpload']['type']; 

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

                          }


                      if($register_password=="EDITTEST"){

                         $sql = "UPDATE dbo_register SET 
                                register_name='".$register_name."',
                                register_lastname='".$register_lastname."',
                                register_nickname='".$register_nickname."',
                                register_email='".$register_email."',
                                register_status='".$register_status."',
                                register_status_head='".$register_status_head."',
                                register_status_under='".$register_status_under."',
                                register_position='".$register_position."',
                                register_notify='".$register_notify."',
                                register_color='".$register_color."',
                                register_lcok='".$register_lcok."',
                                register_enable='".$register_enable."',
                                register_tel='".$register_tel."',
                                register_line='".$register_line."',
                                register_fb='".$register_fb."',
                                register_img='".$images_s."',
                                register_status_owner_tel='".$register_status_owner_tel."',
                                register_date='".$date."'
                                WHERE register_id='".$register_id."' "; 

                      }else{ $register_password=md5($register_password);

                         $sql = "UPDATE dbo_register SET 
                                register_name='".$register_name."',
                                register_lastname='".$register_lastname."',
                                register_nickname='".$register_nickname."',
                                register_email='".$register_email."',
                                register_status='".$register_status."',
                                register_status_head='".$register_status_head."',
                                register_status_under='".$register_status_under."',
                                register_position='".$register_position."',
                                register_notify='".$register_notify."',
                                register_color='".$register_color."',
                                register_lcok='".$register_lcok."',
                                register_enable='".$register_enable."',
                                register_tel='".$register_tel."',
                                register_line='".$register_line."',
                                register_password='".$register_password."',
                                register_fb='".$register_fb."',
                                register_img='".$images_s."',
                                register_status_owner_tel='".$register_status_owner_tel."',
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


                          if(!empty($_FILES['filUpload']['tmp_name'])){                           

                              $image=$_FILES['filUpload']['tmp_name'];
                              $image_name=$_FILES['filUpload']['name'];
                              $image_size=$_FILES['filUpload']['size'];
                              $image_type=$_FILES['filUpload']['type']; 

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
                          }

                        $sql="INSERT INTO dbo_register 
                                     (register_name , register_lastname , register_nickname ,register_email ,register_password, register_status ,register_status_head , register_status_under , register_position , register_notify , register_color , register_lcok ,register_enable , register_line ,register_fb , register_img , register_date)
                                VALUES ('$register_name' ,'$register_lastname' ,'$register_nickname','$register_email' ,'$register_password', '$register_status' , '$register_status_head' , '$register_status_under' , '$register_position' , '$register_notify' , '$register_color' , '$register_lcok' , '$register_enable' , '$register_line' , '$register_fb' , '$images_s'  ,'$date' )";

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

                      if(!empty($_FILES['filUpload']['tmp_name'])){ 

                              $image=$_FILES['filUpload']['tmp_name'];
                              $image_name=$_FILES['filUpload']['name'];
                              $image_size=$_FILES['filUpload']['size'];
                              $image_type=$_FILES['filUpload']['type']; 

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
              $ex_list_deal_type=$_POST['ex_list_deal_type'];
              $ex_list_deal_type_2=$_POST['ex_list_deal_type_2'];
              $code=$_POST['code'];

              $ex_list_listing_type=$_POST['ex_list_listing_type'];
              isset( $_POST['ex_list_listing_type_first'] ) ? $ex_list_listing_type_first = $_POST['ex_list_listing_type_first'] : $ex_list_listing_type_first = "";
              $ex_list_train_station=$_POST['ex_list_train_station'];
              $ex_list_heading=$_POST['ex_list_heading'];
              $type_furniture=$_POST['type_furniture_id'];
              $type_room=$_POST['ex_list_room_id'];

              $ex_list_sqm=$_POST['ex_list_sqm'];
              $ex_list_rai=$_POST['ex_list_rai'];
              $ex_list_ngan=$_POST['ex_list_ngan'];
              $ex_list_wa=$_POST['ex_list_wa'];
              $ex_list_parking=$_POST['ex_list_parking'];
              $ex_list_bedroom=$_POST['ex_list_bedroom'];
              $ex_list_bathroom=$_POST['ex_list_bathroom'];
              $ex_list_other_room=$_POST['ex_list_other_room'];
              $ex_list_view=$_POST['ex_list_view'];
              $ex_list_pets=$_POST['ex_list_pets'];
              $ex_list_direction=$_POST['ex_list_direction'];
              $ex_list_details=$_POST['ex_list_details'];
              $ex_list_details_en=$_POST['ex_list_details_en'];
              $ex_list_floor=$_POST['ex_list_floor'];
              $ex_list_total_floors=$_POST['ex_list_total_floors'];
              $ex_list_heading_en=$_POST['ex_list_heading_en'];
              $ex_list_listing_status=$_POST['ex_list_listing_status'];
              $img_folder=$_POST['img_folder'];
              $ex_list_googlmap=$_POST['ex_list_googlmap'];
              $ex_list_remark=$_POST['ex_list_remark'];
              $ex_list_video=$_POST['ex_list_video'];
              $ex_list_public=$_POST['ex_list_public'];
              $ex_list_premium=$_POST['ex_list_premium'];
              $ex_list_boostpost=$_POST['ex_list_boostpost'];           
              $ex_list_owner_tel=$_POST['ex_list_owner_tel'];
              $ex_list_listing_name=$_POST['ex_list_listing_name'];
              $ex_list_listing_name_en=$_POST['ex_list_listing_name_en']; 
              $ex_list_no_images=$_POST['ex_list_no_images'];

              $ex_list_rent_update=$_POST['ex_list_rent_update'];
               
              $ex_list_house_number=$_POST['ex_list_house_number'];
              $provinces=$_POST['provinces'];
              $amphures=$_POST['amphures'];
              $districts=$_POST['districts'];
              $project=$_POST['project'];
              $zone_id=$_POST['zone_id'];

              $ex_list_price=$_POST['ex_list_price'];
              $ex_list_price_2=$_POST['ex_list_price_2'];
              $ex_list_negotiable=$_POST['ex_list_negotiable'];
              $ex_list_common_fee=$_POST['ex_list_common_fee'];
              
              $ex_list_status=$_POST['ex_list_status'];
              $ex_list_rent_till=$_POST['ex_list_rent_till'];
              $ex_list_rent_till_note=$_POST['ex_list_rent_till_note'];
              $ex_list_alley=$_POST['ex_list_alley'];
              $ex_list_road=$_POST['ex_list_road'];   
              $ex_list_alley_en=$_POST['ex_list_alley_en'];
              $ex_list_road_en=$_POST['ex_list_road_en'];    

              $ex_list_contact_name=$_POST['ex_list_contact_name'];
              $ex_list_contact_tel=$_POST['ex_list_contact_tel'];
              $ex_list_contact_tel1_2=$_POST['ex_list_contact_tel1_2'];
              $ex_list_contact_tel1_3=$_POST['ex_list_contact_tel1_3'];
              $ex_list_contact_tel1_4=$_POST['ex_list_contact_tel1_4'];
              $ex_list_contact_lineid=$_POST['ex_list_contact_lineid'];
              $ex_list_contact_email=$_POST['ex_list_contact_email'];
              $ex_list_contact_fb=$_POST['ex_list_contact_fb'];
              
              $ex_list_contact_tel = str_replace(" ","",$ex_list_contact_tel);
              $ex_list_contact_tel1_2 = str_replace(" ","",$ex_list_contact_tel1_2);
              $ex_list_contact_tel1_3 = str_replace(" ","",$ex_list_contact_tel1_3);
              $ex_list_contact_tel1_4 = str_replace(" ","",$ex_list_contact_tel1_4);


              $ex_list_contact_name_2=$_POST['ex_list_contact_name_2'];
              $ex_list_contact_tel_2=$_POST['ex_list_contact_tel_2'];
              $ex_list_contact_tel2_2=$_POST['ex_list_contact_tel2_2'];
              $ex_list_contact_tel2_3=$_POST['ex_list_contact_tel2_3'];
              $ex_list_contact_tel2_4=$_POST['ex_list_contact_tel2_4'];
              $ex_list_contact_lineid_2=$_POST['ex_list_contact_lineid_2'];
              $ex_list_contact_email_2=$_POST['ex_list_contact_email_2'];
              $ex_list_contact_fb_2=$_POST['ex_list_contact_fb_2'];

              $ex_list_contact_tel_2 = str_replace(" ","",$ex_list_contact_tel_2);
              $ex_list_contact_tel2_2 = str_replace(" ","",$ex_list_contact_tel2_2);
              $ex_list_contact_tel2_3 = str_replace(" ","",$ex_list_contact_tel2_3);
              $ex_list_contact_tel2_4 = str_replace(" ","",$ex_list_contact_tel2_4);

              $ex_list_contact=$_POST['ex_list_contact'];
              $ex_list_bargain=$_POST['ex_list_bargain'];
              $ex_list_bargain_date=$_POST['ex_list_bargain_date'];
              $ex_list_pm_status=$_POST['ex_list_pm_status'];

              $ex_list_listing_status_check=$_POST['ex_list_listing_status_check'];
              $ex_list_rent_till_check=$_POST['ex_list_rent_till_check'];
              $ex_list_rent_till_note_check=$_POST['ex_list_rent_till_note_check'];

              $ex_list_facilities=$_POST['ex_list_facilities'];
              $ex_list_nearby_places=$_POST['ex_list_nearby_places'];
              $ex_list_nearby_places_en=$_POST['ex_list_nearby_places_en'];
              $ex_list_common_facilities=$_POST['ex_list_common_facilities'];

              $ex_list_latitude=$_POST['ex_list_latitude'];
              $ex_list_longitude=$_POST['ex_list_longitude'];

              $check_create=$_POST['check_create'];

              $ex_list_img_score=$_POST['ex_list_img_score'];
              $ex_list_double_no=$_POST['ex_list_double_no'];
              $ex_list_pm_remark=$_POST['ex_list_pm_remark'];

              $ex_list_sqm_2=$_POST['ex_list_sqm_2'];
              $ex_list_floor2=$_POST['ex_list_floor2'];
              $ex_list_house_number_2=$_POST['ex_list_house_number_2'];

              $ex_list_price_changes=$_POST['ex_list_price_changes'];
              $ex_list_price_old=$_POST['ex_list_price_old'];


              $ex_list_price=str_replace(",","",$ex_list_price);
              $ex_list_negotiable=str_replace(",","",$ex_list_negotiable);

             $sum_price_all=$ex_list_price_2-$ex_list_price;


               if($ex_list_pm_status=='1'){

                             $ex_list_price_old=$ex_list_price_2;


                                $ex_list_bargain=$_SESSION['USER_ID'];

                              $sql_update_price = "UPDATE dbo_data_excel_listing SET  
                                        ex_list_pm_waiting='".$ex_list_bargain."',
                                        ex_list_bargain_date='".$date."',
                                        ex_list_pm_status='1',
                                        ex_list_request='1'
                                        WHERE ex_list_listing_code='".$id."' "; 

                              mysqli_query($conn, $sql_update_price); 

                              $record_note="ลดราคา";

                              $sql_1="INSERT INTO dbo_record ( ex_list_id,record_note, ex_list_listing_status , ex_list_deal_type , ex_list_rent_till , ex_list_price , ex_list_price_old , ex_list_price_changes ,  record_date , record_user_id  )

                              VALUES ( '$id','$record_note', '$ex_list_listing_status', '$ex_list_deal_type' , '$ex_list_rent_till' , '$ex_list_price' , '$ex_list_price_2' , '$sum_price_all'   , '$date' , '$USER_ID')";
                                          mysqli_query($conn, $sql_1);  

                               $sql_pm="INSERT INTO dbo_listing_pm ( listing_pm_id ,ex_list_listing_code, ex_list_pm_remark , ex_list_pm_status , ex_list_request , ex_list_pm_waiting , ex_list_bargain_date  )

                              VALUES ( '','$id', '$ex_list_pm_remark', '1' , '1' , '$USER_ID' , '$date' )";
                                          mysqli_query($conn, $sql_pm);  
 
                }else if($ex_list_price_2!='0'){   
                     


                     if($sum_price_all>=100000 and $ex_list_deal_type==$ex_list_deal_type_2){
                                $ex_list_bargain=$_SESSION['USER_ID'];
                                $ex_list_bargain_date=date("Y-m-d H:i:s");


                              $record_note="ลดราคา";
             
                              $sql_1="INSERT INTO dbo_record ( ex_list_id,record_note, ex_list_listing_status  , ex_list_deal_type , ex_list_rent_till , ex_list_price , ex_list_price_old , ex_list_price_changes ,  record_date , record_user_id  )

                              VALUES ( '$id','$record_note', '$ex_list_listing_status', '$ex_list_deal_type' ,'$ex_list_rent_till' , '$ex_list_price' , '$ex_list_price_2' , '$sum_price_all'   , '$date' , '$USER_ID')";
                                          mysqli_query($conn, $sql_1); 

                             $ex_list_price_changes=$sum_price_all;
                             $ex_list_price_old=$ex_list_price_2;


                              $sql_update_price = "UPDATE dbo_data_excel_listing SET  
                                        ex_list_pm_waiting='".$ex_list_bargain."',
                                        ex_list_bargain_date='".$date."',
                                        ex_list_pm_status='1'
                                        WHERE ex_list_listing_code='".$id."' "; 

                              mysqli_query($conn, $sql_update_price);  


                               $sql_pm="INSERT INTO dbo_listing_pm ( listing_pm_id ,ex_list_listing_code, ex_list_pm_remark , ex_list_pm_status , ex_list_bargain , ex_list_bargain_date  )

                              VALUES ( '','$id', '$ex_list_pm_remark', '1' , '$USER_ID' , '$date' )";
                               mysqli_query($conn, $sql_pm);  


 
                     }else{

                         if($ex_list_pm_status!='1' and $ex_list_pric!=$ex_list_price_2){
                       
                              $record_note="ลดราคา";
                              $sql_1="INSERT INTO dbo_record ( ex_list_id,record_note, ex_list_listing_status , ex_list_deal_type , ex_list_rent_till , ex_list_price , ex_list_price_old , ex_list_price_changes ,  record_date , record_user_id  )

                              VALUES ( '$id','$record_note', '$ex_list_listing_status', '$ex_list_deal_type' ,'$ex_list_rent_till' , '$ex_list_price' , '$ex_list_price_2' , '$sum_price_all'   , '$date' , '$USER_ID')";
                                          mysqli_query($conn, $sql_1);  
                         } 
                     }
                     
                }else{
 
                              $record_note="ลดราคา";
                              $sql_1="INSERT INTO dbo_record ( ex_list_id,record_note, ex_list_listing_status , ex_list_deal_type , ex_list_rent_till , ex_list_price , ex_list_price_old , ex_list_price_changes ,  record_date , record_user_id  )

                              VALUES ( '$id','$record_note', '$ex_list_listing_status', '$ex_list_deal_type' ,'$ex_list_rent_till' , '$ex_list_price' , '$ex_list_price_2' , '$sum_price_all'   , '$date' , '$USER_ID')";
                                          mysqli_query($conn, $sql_1);   

                }

  
             


           
               ////////////////// type_project /////////////////////////////
                 $sql_project="SELECT * FROM type_project where project_id='$project' ";
                 $result_project= $conn->query($sql_project); 
                // output data of each row
                 $rs_project=$result_project->fetch_assoc();

                 $project_name=$rs_project['project_name'];

                 if($project_name!=''){ 

                       $project_name_en=" , ".$rs_project['project_name_en'];
                      $project_name=" ".$project_name;
                       $project_alley=$rs_project['project_alley'];
                         

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
                       $project_common_fee=$rs_project['project_common_fee'];
                       $project_map=$rs_project['project_map'];
                       $zone_id=$rs_project['zone_id'];             
                       $ex_list_train_station=$rs_project['project_train_station'];

                      
                      if($ex_list_listing_type=='1'){
                            
                             $ex_list_total_floors=$project_total_floors; 

                      }


                 }
                  ////////////////// END type_project /////////////////////////////


                
                if($ex_list_deal_type=='1'){  $deal_type_name_th="ขาย";   $deal_type_name_en="For Sale ";
                }else{ $deal_type_name_th="เช่า";  $deal_type_name_en="For Rent ";}

      /////////// type_asset ////////////////
             $sql_ass="SELECT * FROM type_asset where id='$ex_list_listing_type' ";  
             $result_ass= $conn->query($sql_ass);
             $rs_ass=$result_ass->fetch_assoc();

              $name_asset_th=$rs_ass['name'];  
              $name_asset_en=$rs_ass['name_en'];  
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
             $tr_group=$rs_train['tr_group'];
           
             if($station_name!=''){ $station_train_th=" ".$rs_train['station_train']; } 
             if($station_name_en!=''){ $station_train_en=" , ".$tr_group."-".$rs_train['station_name_en'];}  
              
      /////////// End type_train_station ////////////////
    

    if($zone_id!=''){
      /////////// type_zone ////////////////
             $sql_zone="SELECT * FROM type_zone where zone_id ='$zone_id' ";  
             $result_zone= $conn->query($sql_zone);
             $rs_zone=$result_zone->fetch_assoc(); 

             $zone_name=$rs_zone['zone_name'];
             $zone_name_en=$rs_zone['zone_name_en'];
             
     }        
              
      /////////// End type_zone ////////////////
                 

                if($edit=="edit"){



                    isset( $_POST['type_strengths_id'] ) ? $type_strengths_id = $_POST['type_strengths_id'] : $type_strengths_id = array();
                    if( count( $type_strengths_id ) > 0 ) {
                        $type_strengths = array();
                        foreach( $type_strengths_id as $v ) {
                            $type_strengths[] = $v;
                        }
                        $type_strengths = implode( ",", $type_strengths );                       
                    }
 

           
                    isset( $_POST['ex_list_room_id'] ) ? $ex_list_room_id = $_POST['ex_list_room_id'] : $ex_list_room_id = array();
                    if( count( $ex_list_room_id ) > 0 ) {
                        $type_room = array();
                        foreach( $ex_list_room_id as $v ) {
                            $type_room[] = $v;
                        }
                        $type_room = implode( ",", $type_room );                  
                    }
  

                     $type_room_id = explode(',', $type_room);    

                     $sql_room="SELECT * FROM type_room order by room_id  DESC"; 
                     $result_room=$conn->query($sql_room);
                 
                     while($rs_room=$result_room->fetch_assoc()) { 

                            $room_id=$rs_room['room_id'];
                            $room_title=$rs_room['room_title'];
                            $room_title_en=$rs_room['room_title_en'];
                                    
                             if (in_array($room_id, $type_room_id)){

                                   $room_title2=" ".$room_title.$room_title2; 
                                   $room_title_en2=" , ".$room_title_en.$room_title_en2;   
                             }                   
                            
                       }
             

                                  $type_strengths_id = explode(',', $type_strengths);

                     $sql_strengths="SELECT * FROM type_strengths order by strengths_id ASC"; 
                     $result_strengths=$conn->query($sql_strengths);
                 
                     while($rs_strengths=$result_strengths->fetch_assoc()) { 

                            $strengths_id =$rs_strengths['strengths_id'];
                            $strengths_name=$rs_strengths['strengths_name'];
                            $strengths_name_en=$rs_strengths['strengths_name_en'];
                              
                             if (in_array($strengths_id, $type_strengths_id)){
                                    

                                   $strengths_name2=$strengths_name2." ".$strengths_name; 
                                   $strengths_name_en2=$strengths_name_en2." , ".$strengths_name_en;                      
                             }
                       }
                                
                      
                      
                      if($ex_list_heading==''){  
                             
                            if($project!='0'){

                             $ex_list_heading=$deal_type_name_th.$name_asset_th." ".$project_name."".$room_title2.$strengths_name2.$station_train_th." ".$subdistricts_in_thai." ".$districts_in_thai." ".$provinces_in_thai." ".$id;

                            }else{
                             $ex_list_heading=$deal_type_name_th.$ex_list_listing_name."".$room_title2.$strengths_name2.$station_train_th." ".$subdistricts_in_thai." ".$districts_in_thai." ".$provinces_in_thai." ".$id;
                            }


                      } 
                      if($ex_list_heading_en==''){ 

                            if($project!='0'){
                                $ex_list_heading_en=$deal_type_name_en.$name_asset_en."".$project_name_en."".$room_title_en2.$strengths_name_en2.$station_train_en." , ".$subdistricts_in_english." , ".$districts_in_english." , ".$provinces_in_english." , ".$id;
                            }else{
                                $ex_list_heading_en=$deal_type_name_en.$ex_list_listing_name_en."".$room_title_en2.$strengths_name_en2.$station_train_en." , ".$subdistricts_in_english." , ".$districts_in_english." , ".$provinces_in_english." , ".$id;
                            }
                   
                      }  


                         if($ex_list_listing_status_check==$ex_list_listing_status) {

                              if($_SESSION['STATUS_ID']!='1'){
 


                                      if($check_create=='1'){
                                          $record_remark=$ex_list_rent_till_note."(วันที่สร้าง)"; 
                                      }else{
                                         /* $record_remark=$ex_list_rent_till_note."(แก้ไขRemark)";*/
                                          $record_remark=$ex_list_rent_till_note."";
                                      }
                                        
                                        $record_note="ดำเนินการแก้ไข/อัพเดท สถานะ Listing";
             
                                         $sql_1="INSERT INTO dbo_record ( ex_list_id,record_note, ex_list_listing_status , ex_list_deal_type , ex_list_rent_till, record_remark,  record_date , record_user_id  )

                                         VALUES ( '$id','$record_note', '$ex_list_listing_status', '$ex_list_deal_type' , '$ex_list_rent_till' , '$record_remark' , '$date' , '$USER_ID')";
                                          mysqli_query($conn, $sql_1); 

                               }
                               

                          }else{ 


                                       if($check_create=='1'){
                                          $record_remark=$ex_list_rent_till_note."(วันที่สร้าง)"; 
                                      }else{
                                          /* $record_remark=$ex_list_rent_till_note."(เปลี่ยนสถานะ)";*/
                                          $record_remark=$ex_list_rent_till_note."";
                                      }
  
                                    
                                    $record_note="ดำเนินการแก้ไข/อัพเดท สถานะ Listing";
         
                                     $sql_1="INSERT INTO dbo_record ( ex_list_id,record_note, ex_list_listing_status , ex_list_deal_type , ex_list_rent_till, record_remark,  record_date , record_user_id  )

                                     VALUES ( '$id','$record_note', '$ex_list_listing_status', '$ex_list_deal_type' , '$ex_list_rent_till' , '$record_remark' , '$date' , '$USER_ID')";
                                      mysqli_query($conn, $sql_1);   
                          }


                $year=substr($ex_list_rent_till,6 , 4 );
                $month=substr($ex_list_rent_till,3 , 2 );
                $day=substr($ex_list_rent_till,0 , 2 );
                $date_up=$year."-".$month."-".$day;
 

                if($ex_list_listing_status=='3' and $ex_list_deal_type=='2' or $ex_list_listing_status=='4' or $ex_list_listing_status=='5' or
                   $ex_list_listing_status=='6' or $ex_list_listing_status=='12' or $ex_list_listing_status=='13'  or $ex_list_listing_status=='14'  or $ex_list_listing_status=='15'){
                         
                        

                      $sql_list = "UPDATE dbo_data_excel_listing SET  
                                ex_list_public='0', 
                                ex_list_proppit_date='2023-01-01 00:00:00', 
                                ex_list_propertyhub_date='2023-01-01 00:00:00',
                                ex_list_living='0' 
                                WHERE ex_list_listing_code='".$id."' "; 
                      $conn->query($sql_list);
 

                }else{

                }


                      $sql = "UPDATE dbo_data_excel_listing SET 
                                ex_list_contract_type='".$ex_list_contract_type."',
                                ex_list_listing_type='".$ex_list_listing_type."',
                                ex_list_listing_type_first='".$ex_list_listing_type_first."',
                                ex_list_deal_type='".$ex_list_deal_type."',
                                ex_list_heading_en='".$ex_list_heading_en."',
                                ex_list_listing_name='".$ex_list_listing_name."',
                                ex_list_listing_name_en='".$ex_list_listing_name_en."',
                                ex_list_room_id='".$type_room."',
                                ex_list_house_number='".$ex_list_house_number."',
                                ex_list_alley='".$ex_list_alley."',
                                ex_list_road='".$ex_list_road."',
                                ex_list_alley_en='".$ex_list_alley_en."',
                                ex_list_road_en='".$ex_list_road_en."',
                                ex_list_sqm='".$ex_list_sqm."',
                                ex_list_rai='".$ex_list_rai."',
                                ex_list_ngan='".$ex_list_ngan."',
                                ex_list_wa='".$ex_list_wa."',
                                ex_list_parking='".$ex_list_parking."',
                                ex_list_bedroom='".$ex_list_bedroom."',
                                ex_list_bathroom='".$ex_list_bathroom."',
                                ex_list_other_room='".$ex_list_other_room."',
                                ex_list_view='".$ex_list_view."',
                                ex_list_floor='".$ex_list_floor."',
                                ex_list_total_floors='".$ex_list_total_floors."',
                                ex_list_pets='".$ex_list_pets."',
                                ex_list_facilities='".$ex_list_facilities."',
                                ex_list_common_facilities='".$ex_list_common_facilities."',
                                ex_list_nearby_places='".$ex_list_nearby_places."',
                                ex_list_nearby_places_en='".$ex_list_nearby_places_en."',
                                ex_list_direction='".$ex_list_direction."',
                                ex_list_details='".$ex_list_details."',
                                ex_list_details_en='".$ex_list_details_en."',
                                ex_list_subdistrict='".$districts."',
                                ex_list_district='".$amphures."',
                                ex_list_province='".$provinces."',
                                ex_list_train_station='".$ex_list_train_station."',
                                ex_list_googlmap='".$ex_list_googlmap."', 
                                ex_list_heading='".$ex_list_heading."',
                                ex_list_price='".$ex_list_price."',
                                ex_list_price_old='".$ex_list_price_old."',
                                ex_list_price_changes='".$ex_list_price_changes."',
                                ex_list_negotiable='".$ex_list_negotiable."',
                                ex_list_remark='".$ex_list_remark."',
                                ex_list_video='".$ex_list_video."',
                                ex_list_common_fee='".$ex_list_common_fee."',
                                ex_list_contact_name='".$ex_list_contact_name."',
                                ex_list_contact_tel='".$ex_list_contact_tel."',
                                ex_list_contact_tel1_2='".$ex_list_contact_tel1_2."',
                                ex_list_contact_tel1_3='".$ex_list_contact_tel1_3."',
                                ex_list_contact_tel1_4='".$ex_list_contact_tel1_4."',
                                ex_list_contact_email='".$ex_list_contact_email."',
                                ex_list_contact_lineid='".$ex_list_contact_lineid."',
                                ex_list_contact_fb='".$ex_list_contact_fb."',
                                ex_list_contact_name_2='".$ex_list_contact_name_2."',
                                ex_list_contact_tel_2='".$ex_list_contact_tel_2."',
                                ex_list_contact_tel2_2='".$ex_list_contact_tel2_2."',
                                ex_list_contact_tel2_3='".$ex_list_contact_tel2_3."',
                                ex_list_contact_tel2_4='".$ex_list_contact_tel2_4."',
                                ex_list_contact_email_2='".$ex_list_contact_email_2."',
                                ex_list_contact_lineid_2='".$ex_list_contact_lineid_2."',
                                ex_list_contact_fb_2='".$ex_list_contact_fb_2."',
                                ex_list_contact='".$ex_list_contact."',
                                ex_list_no_images='".$ex_list_no_images."',
                                project_id='".$project."',
                                zone_id='".$zone_id."',
                                ex_list_latitude='".$ex_list_latitude."',
                                ex_list_longitude='".$ex_list_longitude."',
                                ex_list_listing_status='".$ex_list_listing_status."',
                                ex_list_img_score='".$ex_list_img_score."',
                                ex_list_rent_till='".$ex_list_rent_till."',  
                                ex_list_rent_till_note='".$ex_list_rent_till_note."', 
                                ex_list_rent_till_date='".$date_up."', 
                                ex_list_premium='".$ex_list_premium."',
                                ex_list_boostpost='".$ex_list_boostpost."',
                                ex_list_owner_tel='".$ex_list_owner_tel."',
                                type_strengths_id='".$type_strengths."',
                                ex_list_furniture_id='".$type_furniture."',
                                ex_list_date_update='".$date."' 
                                WHERE ex_list_listing_code='".$id."' "; 



                if($check_create=='1'){  //เช็คว่าพึ่งสร้าง 
                     
 
                }



                       if($ex_list_rent_update=='update'){
                       
                            $record_note="แก้ไข/อัพเดท Listing : ".$id; 

                                  $sql_rent="INSERT INTO dbo_listing_status ( record_note , ex_list_listing_status, ex_list_id, listing_status_create, register_id ,listing_status_note)
                                         VALUES ( '$record_note' , '$ex_list_listing_status', '$id' ,'$date' ,'$USER_ID' , '$ex_list_rent_till' )";
                                          mysqli_query($conn, $sql_rent);  


                      $record_note2="แก้ไข/อัพเดท ราคา รหัสทรัพย์ : ".$id;

                      $sql = "UPDATE dbo_data_excel_listing SET  
                                ex_list_deal_type='".$ex_list_deal_type."',
                                ex_list_price='".$ex_list_price."', 
                                ex_list_date_update='".$today."' 
                                WHERE ex_list_listing_code='".$id_s."' "; 


                           $sql_1="INSERT INTO dbo_record (ex_list_id,record_note, ex_list_listing_status , ex_list_deal_type , record_date , record_user_id , record_remark)

                           VALUES ('$id_s' , '$record_note' ,'$ex_list_deal_type','$ex_list_deal_type' , '$today' , '$USER_ID' , '$ex_list_price')";
                            mysqli_query($conn, $sql_1);  


                       }else{



                       }        

                      
                            $sql_img_a="SELECT * FROM dbo_data_excel_listing_img where ex_list_listing_code='$id' order by listing_img_no  DESC"; 
                            $result_img_a=$conn->query($sql_img_a); 
                            $rs_img_a=$result_img_a->fetch_assoc();
                            
                            $count_img_a=$result_img_a->num_rows;

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
                          
                          /*
                              $is = sprintf("%'02d",$i); 

                              $image=$is."_".$image;  */


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


                     $sql3="INSERT INTO dbo_data_excel_listing  ( ex_list_listing_code,ex_list_contract_type  ,ex_list_listing_type ,ex_list_deal_type   ,ex_list_house_number ,ex_list_alley ,ex_list_road ,ex_list_sqm,ex_list_parking ,ex_list_bedroom , ex_list_bathroom ,ex_list_other_room ,ex_list_floor ,ex_list_total_floors  ,ex_list_pets , ex_list_direction  , ex_list_details ,ex_list_subdistrict , ex_list_district , ex_list_province ,ex_list_train_station , ex_list_price , ex_list_negotiable , ex_list_common_fee, ex_list_contact ,ex_list_contact_name ,ex_list_contact_tel , ex_list_contact_email , ex_list_contact_lineid , project_id , ex_list_listing_status ,ex_list_rent_till,ex_list_date_create,ex_list_date_update , ex_list_owner_tel)
                       VALUES ('$code','$ex_list_contract_type' , '$ex_list_listing_type','$ex_list_deal_type','$ex_list_house_number','$ex_list_alley','$ex_list_road','$ex_list_sqm','$ex_list_parking','$ex_list_bedroom','$ex_list_bathroom','$ex_list_other_room','$ex_list_floor' , '$ex_list_total_floors','$ex_list_pets','$ex_list_direction','$ex_list_details','$amphures','$district','$provinces','$ex_list_train_station','$ex_list_price','$ex_list_negotiable','$ex_list_common_fee','$USER_ID','$ex_list_contact_name','$ex_list_contact_tel','$ex_list_contact_email','$ex_list_contact_lineid','$project','$ex_list_listing_status','$ex_list_rent_till','$date','$date' ,'$ex_list_owner_tel' )"; 
                     mysqli_query($conn, $sql3); 

                                        //สร้างโฟลเดอร์อัตโนมัติโดยตั้งชื่อตามว/ด/ป
                     date_default_timezone_set('Asia/Bangkok');  
                     mkdir("../../images/listing/$code");
                     mkdir("../../images/listing/$code/no_watermark");
                     mkdir("../../images/listing/$code/mini_w300");

      			         mkdir("../../images/listing/$code/webp");
      			         mkdir("../../images/listing/$code/webp/mini_w100");
      			         mkdir("../../images/listing/$code/webp/mini_w500");

                            $record_note1="เพิ่ม Listing : ".$code; 

                                  $sql_rent1="INSERT INTO dbo_listing_status ( record_note , ex_list_listing_status, ex_list_id, listing_status_create, register_id ,listing_status_note)
                                         VALUES ( '$record_note1' , '$ex_list_listing_status', '$code' ,'$date' ,'$user_id_s' , '$ex_list_rent_till' )";
                                          mysqli_query($conn, $sql_rent1);  
                             


                            $sql_img="SELECT * FROM dbo_data_excel_listing_img where ex_list_listing_code='$id' order by listing_img_no  ASC"; 
                            $result_img=$conn->query($sql_img);

                            $count_img=$result_img->num_rows;

                            $i2=0;
                     
                              while($rs_img=$result_img->fetch_assoc()) {   $i2++;

                                 $listing_img_folder=$rs_img['listing_img_folder'];
                                 $listing_img_name=$rs_img['listing_img_name'];
                                 $listing_img_webp=$rs_img['listing_img_webp'];

                                 if($listing_img_folder==''){ 

                                      $listing_img_folder="../../images/listing/$id/";  
                                      $listing_img_folder_watermark="../../images/listing/$id/no_watermark/"; 
                                      $listing_img_folder_mini_w300="../../images/listing/$id/mini_w300/";  

                                      $listing_img_webp_folder="../../images/listing/$id/webp/";  
                                      $listing_img_webp_folder_mini_w500="../../images/listing/$id/webp/mini_w500/";  
                                      $listing_img_webp_folder_mini_w100="../../images/listing/$id/webp/mini_w100/"; 

                                  }
 

                                     copy($listing_img_folder.$listing_img_name,"../../images/listing/$code/".$listing_img_name);                                 
                                     copy($listing_img_folder_watermark.$listing_img_name,"../../images/listing/$code/no_watermark/".$listing_img_name);
                                     copy($listing_img_folder_mini_w300.$listing_img_name,"../../images/listing/$code/mini_w300/".$listing_img_name);
 
                                     copy($listing_img_webp_folder.$listing_img_webp,"../../images/listing/$code/webp/".$listing_img_webp);
                                     copy($listing_img_webp_folder_mini_w500.$listing_img_webp,"../../images/listing/$code/webp/mini_w500/".$listing_img_webp);
                                     copy($listing_img_webp_folder_mini_w100.$listing_img_webp,"../../images/listing/$code/webp/mini_w100/".$listing_img_webp);


                                    $sql_img_1="INSERT INTO dbo_data_excel_listing_img (ex_list_listing_code, listing_img_name, listing_img_webp , listing_img_no, listing_img_date )
                                         VALUES ('$code', '$listing_img_name' , '$listing_img_webp' ,'$i2' ,'$date' )";
                                          mysqli_query($conn, $sql_img_1);  
 
                              } 


                              if($count_img>=1){

                                   $sql_number= "UPDATE dbo_data_excel_listing SET 
                                                  ex_list_img_number='".$count_img."'
                                                  WHERE ex_list_listing_code='".$code."'";
                                   $conn->query($sql_number);   
                              }
                       
                     }
           //*********  COPY LISTING อีกฉลับ  *********///



          //********** บันทึกประวัติการสร้าง listing ***********//

                     $sql_log_number="SELECT * FROM dbo_log_listing where ex_list_listing_code='$id' order by create_date  DESC LIMIT 1 "; 
                     $result_log_number=$conn->query($sql_log_number);
                     //$count_log_number=$result_log_number->num_rows;   
                     $rs_log_number=$result_log_number->fetch_assoc();

                     $log_number=$rs_log_number['log_number'];

                     if($log_number!=''){
                          $count_log_number=$log_number+1;
                     }else{
                          $count_log_number='1';
                     }
                     


                     $sql_log_listing="INSERT INTO dbo_log_listing  ( ex_list_listing_code ,contract_type , listing_type ,deal_type   ,house_number ,alley ,road , sqm , rai , ngan , wa , wa_count , parking , bedroom , bathroom , heading , heading_en , other_room , floor , total_floors  , pets , direction , type_strengths_id  , nearby_places , nearby_places_en , facilities ,  facilities_en , details , details_en , subdistrict , district , province , station_id , zone_id , project_id , latitude , longitude , video , number_buildings  , view , price  , common_fee, list_contact , furniture_id , contact_name  , contact_tel , contact_tel1_2 , contact_tel1_3 , contact_tel1_4 , contact_email , contact_lineid , contact_whatsapp , contact_fb , contact_name_2 , contact_tel_2 , contact_tel2_2 , contact_tel2_3 , contact_tel2_4 , contact_lineid_2 , contact_email_2 , contact_whatsapp_2 , contact_fb_2 , listing_status ,rent_till , room_id , remark , listing_score , img_score , img_number , list_bargain , bargain_date , pm_status , pm_waiting , no_images , public , public_date , premium , premium_date , boostpost , boostpost_date , proppit ,  proppit_date , living , living_date ,  create_date , log_number , USER_ID   )
                       VALUES ('$id','$ex_list_contract_type' , '$ex_list_listing_type','$ex_list_deal_type','$ex_list_house_number','$ex_list_alley','$ex_list_road','$ex_list_sqm' , '$ex_list_rai' , '$ex_list_ngan' , '$ex_list_wa' , '$ex_list_wa_count' , '$ex_list_parking','$ex_list_bedroom','$ex_list_bathroom' , '$ex_list_heading' , '$ex_list_heading_en' ,'$ex_list_other_room','$ex_list_floor' , '$ex_list_total_floors','$ex_list_pets','$ex_list_direction' , '$type_strengths' , '$ex_list_nearby_places' , '$ex_list_nearby_places_en' , '$ex_list_facilities' , '$ex_list_common_facilities' ,'$ex_list_details' , '$ex_list_details_en' ,'$amphures','$district','$provinces','$ex_list_train_station' , '$zone_id' , '$project' , '$ex_list_latitude' , '$ex_list_longitude' , '$ex_list_video' , '$ex_list_number_buildings'  , '$ex_list_view' , '$ex_list_price','$ex_list_common_fee','$USER_ID', '$type_furniture' ,'$ex_list_contact_name','$ex_list_contact_tel' ,'$ex_list_contact_tel1_2' ,'$ex_list_contact_tel1_3' ,'$ex_list_contact_tel1_4' ,'$ex_list_contact_email' ,'$ex_list_contact_lineid' ,'$ex_list_contact_fb' , '$ex_list_contact_whatsapp' , '$ex_list_contact_name_2' , '$ex_list_contact_tel_2' , '$ex_list_contact_tel2_2' , '$ex_list_contact_tel2_3' , '$ex_list_contact_tel2_4' , '$ex_list_contact_lineid_2' , '$ex_list_contact_email_2' , '$ex_list_contact_whatsapp_2' , '$ex_list_contact_fb_2' , '$ex_list_listing_status','$ex_list_rent_till ', '$type_room' , '$ex_list_remark' , '$ex_list_listing_score' , '$ex_list_img_score' , '$count_img_a' , '$ex_list_bargain'  , '$ex_list_bargain_date' , '$ex_list_pm_status' , 'ex_list_pm_waiting' , '$ex_list_no_images' , '$ex_list_public' , '$ex_list_public_date' , '$ex_list_premium' , '$ex_list_premium_date' , '$ex_list_boostpost' , '$ex_list_boostpost_date' , '$ex_list_proppit'  , '$ex_list_proppit_date'  , '$ex_list_living' , '$ex_list_living_date' , '$date' , '$count_log_number' , '$USER_ID'   )"; 
                     mysqli_query($conn, $sql_log_listing); 

          //********** END บันทึกประวัติการสร้าง listing ***********//

                  
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







///////////////////////////////     upload_images_create_listing      ////////////////////////////////////

       if($page=='upload_images_create_listing'){   //upload_images_create_listing



                       echo "fffffffffffffffffff";
           

       }  //END upload_images_create_listing 

///////////////////////////////     END  upload_images_create_listing            ////////////////////////////////////.






///////////////////////////////     create_project      ////////////////////////////////////

       if($page=='create_project'){   //create_project
 
              $project_name=$_POST['project_name'];
              $project_name_en=$_POST['project_name_en'];
              $project_type=$_POST['project_type'];
              $project_alley=$_POST['project_alley'];
              $project_road=$_POST['project_road'];

              $project_alley_en=$_POST['project_alley_en'];
              $project_road_en=$_POST['project_road_en'];

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
              $project_latitude=$_POST['project_latitude']; 
              $project_longitude=$_POST['project_longitude']; 

              $project_unit=$_POST['project_unit']; 
              $project_completed=$_POST['project_completed']; 
              $project_developer=$_POST['project_developer']; 
              $project_pet_friendly=$_POST['project_pet_friendly']; 
              $project_pet_friendly_type=$_POST['project_pet_friendly_type'];        

              $zone_id=$_POST['zone_id']; 

              $project_proppit_name=$_POST['project_proppit_name'];
              $project_proppit_name_en=$_POST['project_proppit_name_en'];
              $project_proppit_latitude=$_POST['project_proppit_latitude'];
              $project_proppit_longitude=$_POST['project_proppit_longitude'];

              $project_living_project_list=$_POST['project_living_project_list']; 
 
              $project_propertyhub_id=$_POST['project_propertyhub_id'];
              $project_propertyhub_name=$_POST['project_propertyhub_name']; 

              $project_nearby_places = str_replace("'"," ",$project_nearby_places,$count);
              $project_nearby_places_en = str_replace("'"," ",$project_nearby_places_en,$count);
              $project_facilities = str_replace("'"," ",$project_facilities,$count);
              $project_facilities_en = str_replace("'"," ",$project_facilities_en,$count);

                if($edit=="edit"){


             /*
                    isset( $_POST['project_facilities_icon'] ) ? $project_facilities_icon = $_POST['project_facilities_icon'] : $project_facilities_icon = array();
                    if( count( $project_facilities_icon ) > 0 ) {
                        $input = array();
                        foreach( $project_facilities_icon as $v ) {
                            $input[] = $v;
                        }
                        $input = implode( ",", $input );
                       
                    }  */
 
                      $sql = "UPDATE type_project SET 
                                project_type='".$project_type."',
                                project_name='".$project_name."',
                                project_name_en='".$project_name_en."',
                                project_alley='".$project_alley."',
                                project_alley_en='".$project_alley_en."',
                                project_road='".$project_road."',
                                project_road_en='".$project_road_en."',
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
                                project_latitude='".$project_latitude."',
                                project_longitude='".$project_longitude."',
                                project_unit='".$project_unit."',
                                project_completed='".$project_completed."',
                                project_pet_friendly='".$project_pet_friendly."',
                                project_pet_friendly_type='".$project_pet_friendly_type."',
                                project_living_project_list='".$project_living_project_list."',
                                project_developer='".$project_developer."', 
                                project_proppit_name='".$project_proppit_name."', 
                                project_proppit_name_en='".$project_proppit_name_en."', 
                                project_proppit_latitude='".$project_proppit_latitude."', 
                                project_proppit_longitude='".$project_proppit_longitude."',  
                                project_propertyhub_id='".$project_propertyhub_id."',  
                                project_propertyhub_name='".$project_propertyhub_name."',  
                                zone_id='".$zone_id."', 
                                register_id_update='".$USER_ID."', 
                                project_update='".$date."'
                                WHERE project_id='".$id."' "; 


                     $sql_log_number="SELECT * FROM dbo_log_project where project_id='$id' "; 
                     $result_log_number=$conn->query($sql_log_number);
                     $count_log_number=$result_log_number->num_rows;   

                     $count_log_number=$count_log_number+1;
  
                     $sql_log_project="INSERT INTO dbo_log_project  ( log_id , project_id ,project_type , project_name ,project_name_en   ,project_alley ,project_alley_en ,project_road , project_road_en , project_subdistrict , project_district , project_province , station_id , project_number_buildings , project_total_floors , project_facilities , project_facilities_en , project_facilities_icon , project_nearby_places , project_nearby_places_en , zone_id , project_developer , project_unit , project_completed  , project_proppit_name , project_proppit_name_en , project_proppit_latitude ,  project_proppit_longitude , project_living_project_list , project_common_fee , project_map , project_latitude  , project_longitude  , create_date , log_number , USER_ID  )
                       VALUES ('' , '$id','$project_type' , '$project_name','$project_name_en','$project_alley','$project_alley_en','$project_road','$project_road_en' , '$districts' , '$amphures' , '$provinces' , '$project_train_station' , '$project_number_buildings','$project_total_floors','$project_facilities' , '$project_facilities_en' , '$project_facilities_icon' ,'$project_nearby_places','$project_nearby_places_en' , '$zone_id' ,'$project_developer','$project_unit' , '$project_completed' , '$project_proppit_name' , '$project_proppit_name_en' , '$project_proppit_latitude' , '$project_proppit_longitude' , '$project_living_project_list' ,'$project_common_fee','$project_map','$project_latitude','$project_longitude' , '$date' ,'$count_log_number' , '$USER_ID'  )"; 
                     mysqli_query($conn, $sql_log_project);

                 
                      if ($conn->query($sql) === TRUE) {  
                           echo '<script type="text/javascript">alert("Record updated successfully");</script>';
                           echo("<script> top.location.href='../?page=project'</script>");   
                      } else {
                  
                           echo '<script type="text/javascript">alert("Error");</script>';
                           echo "Error updating record: " . $conn->error;  
                      } 


                }else{    


        $sql_pro="SELECT * FROM type_project order by  project_id DESC   " ;
        $result_pro= $conn->query($sql_pro); 
        $rs_pro=$result_pro->fetch_assoc();  

            $project_id=$rs_pro['project_id']; 
            $project_id=$project_id+1;
            $code = sprintf("p%'05d",$project_id);


                           $sql_1="INSERT INTO type_project (project_name, project_name_en, project_type, project_alley , project_alley_en, project_road , project_road_en , project_subdistrict, project_district , project_province, project_train_station , project_number_buildings , project_total_floors , project_facilities , project_facilities_en , project_nearby_places , project_nearby_places_en  , project_latitude , project_longitude , zone_id , project_map , project_unit , project_completed , project_developer , project_proppit_name , project_proppit_name_en , project_proppit_latitude , project_proppit_longitude , project_living_project_list , project_pet_friendly , project_pet_friendly_type , search_p_id , register_id_create , project_create )   

                           VALUES ('$project_name', '$project_name_en', '$project_type' , '$project_alley' , '$project_alley_en' , '$project_road' , '$project_road_en' ,'$districts' ,'$amphures' ,'$provinces' ,'$project_train_station' ,'$project_number_buildings'   ,'$project_total_floors' ,'$project_facilities' , '$project_facilities_en' , '$project_nearby_places' , '$project_nearby_places_en' , '$project_latitude' , '$project_longitude' , '$zone_id' , '$project_map' , '$project_unit' , '$project_completed' , '$project_developer' ,'$project_proppit_name' , '$project_proppit_name_en' , '$project_proppit_latitude' ,'$project_proppit_longitude' ,'$project_living_project_list' , '$project_pet_friendly'  , '$project_pet_friendly_type'  , '$code' , '$USER_ID' ,'$date' )";
                            mysqli_query($conn, $sql_1);  

 
                     ///////////////////   type_project ////////////////////
                          $sql_project="SELECT * FROM type_project  order by project_id DESC ";
                          $result_project= $conn->query($sql_project);  
                          $rs_project=$result_project->fetch_assoc();

                          $project_id=$rs_project['project_id'];
                     ///////////////////  END type_project ////////////////////

                          $count_log_number='1';

                     $sql_log_project="INSERT INTO dbo_log_project  ( log_id , project_id ,project_type , project_name ,project_name_en   ,project_alley ,project_alley_en ,project_road , project_road_en , project_subdistrict , project_district , project_province , station_id , project_number_buildings , project_total_floors , project_facilities , project_facilities_en , project_facilities_icon , project_nearby_places , project_nearby_places_en , zone_id , project_developer , project_unit , project_completed  , project_proppit_name , project_proppit_name_en , project_proppit_latitude ,  project_proppit_longitude , project_living_project_list , project_common_fee , project_map , project_latitude  , project_longitude  , create_date , log_number , USER_ID  )
                       VALUES ('' , '$project_id','$project_type' , '$project_name','$project_name_en','$project_alley','$project_alley_en','$project_road','$project_road_en' , '$districts' , '$amphures' , '$provinces' , '$project_train_station' , '$project_number_buildings','$project_total_floors','$project_facilities' , '$project_facilities_en' , '$project_facilities_icon' ,'$project_nearby_places','$project_nearby_places_en' , '$zone_id' ,'$project_developer','$project_unit' , '$project_completed' , '$project_proppit_name' , '$project_proppit_name_en' , '$project_proppit_latitude' , '$project_proppit_longitude' , '$project_living_project_list' ,'$project_common_fee','$project_map','$project_latitude','$project_longitude' , '$date' ,'$count_log_number' , '$USER_ID'  )"; 
                     mysqli_query($conn, $sql_log_project);

                       date_default_timezone_set('Asia/Bangkok');  
                       mkdir("../../images/project/$project_id");  //สร้างโฟลเดอร์
                       mkdir("../../images/project/$project_id/no_watermark");  //สร้างโฟลเดอร์

  
                    
                         if($list_id!=''){   

                                   echo '<script type="text/javascript">alert("Record Create successfully");</script>';
                                   echo("<script> top.location.href='../?page=project'</script>");   
                             
                         }else{
                                   echo '<script type="text/javascript">alert("Record Create successfully");</script>';
                                   echo("<script> top.location.href='../?page=project'</script>"); 
                         }    

                }


     


       }  //END create_project


///////////////////////////////     END  create_project            ////////////////////////////////////.



///////////////////////////////     create_web_zone      ////////////////////////////////////

       if($page=='create_web_zone'){   //create_web_zone

              $zone_g_name=$_POST['zone_g_name'];
              $zone_g_name_en=$_POST['zone_g_name_en'];
              $zone_g_meta_title=$_POST['zone_g_meta_title'];
              $zone_g_meta_title_en=$_POST['zone_g_meta_title_en'];
              $zone_g_meta_keyword=$_POST['zone_g_meta_keyword'];
              $zone_g_meta_keyword_en=$_POST['zone_g_meta_keyword_en'];
              $zone_g_number=$_POST['zone_g_number'];
              $zone_g_highlight=$_POST['zone_g_highlight'];
              $zone_g_url=$_POST['zone_g_url'];
              $zone_g_url_en=$_POST['zone_g_url_en'];
              $id=$_POST['id'];
              $edit=$_POST['edit'];
              $date_time=date("YmdHis");

                if($edit=="edit"){



 
   
                      $sql = "UPDATE type_zone_group SET 
                                zone_g_name='".$zone_g_name."',
                                zone_g_name_en='".$zone_g_name_en."',
                                zone_g_meta_title='".$zone_g_meta_title."',
                                zone_g_meta_title_en='".$zone_g_meta_title_en."',
                                zone_g_meta_keyword='".$zone_g_meta_keyword."',
                                zone_g_meta_keyword_en='".$zone_g_meta_keyword_en."',
                                zone_g_number='".$zone_g_number."',
                                zone_g_highlight='".$zone_g_highlight."', 
                                zone_g_url='".$zone_g_url."', 
                                zone_g_url_en='".$zone_g_url_en."', 
                                register_id='".$USER_ID."' 
                                WHERE zone_g_id='".$id."' ";  
 

                                    //////* upload file =   tem10_file_document *//////
                                $filUpload=$_FILES['filUpload']['tmp_name'];
                                $filUpload_name=$_FILES['filUpload']['name'];
                                $filUpload_size=$_FILES['filUpload']['size'];
                                $filUpload_type=$_FILES['filUpload']['type']; 
                                $filUpload_name_ext=strtolower(end(explode('.',$filUpload_name)));                 
                         
                                 if ($filUpload_name_ext=="png" or $filUpload_name_ext=="jpg" or $filUpload_name_ext=="jpeg" or $filUpload_name_ext=="gif"   ) {
                              
                                                  
                                   $images=$_FILES["filUpload"]["tmp_name"];
                                   $filUpload_file="images_".$date_time.".".$filUpload_name_ext;
                                
                                   copy($filUpload,"../../images/zone_group/$filUpload_file");  

                                    $sql1 = "UPDATE type_zone_group SET  
                                              zone_g_image='".$filUpload_file."' 
                                              WHERE zone_g_id='".$id."' ";  
                                    $conn->query($sql1);
            
                                }


                   
                      if ($conn->query($sql) === TRUE) {  
                           echo '<script type="text/javascript">alert("Record updated successfully");</script>';
                           echo("<script> top.location.href='../?page=web_zone'</script>");   
                      } else {
                  
                           echo '<script type="text/javascript">alert("Error");</script>';
                           echo "Error updating record: " . $conn->error;  
                      } 


                }else{

                           $sql_1="INSERT INTO type_zone_group (zone_g_name, zone_g_name_en, zone_g_meta_title, zone_g_meta_keyword , zone_g_meta_title_en, zone_g_meta_keyword_en , zone_g_meta_description_en , zone_g_number, zone_g_highlight , zone_g_url , zone_g_url_en , register_id  )

                           VALUES ('$zone_g_name', '$zone_g_name_en', '$zone_g_meta_title' , '$zone_g_meta_keyword' , '$zone_g_meta_title_en' , '$zone_g_meta_keyword_en' , '$zone_g_meta_description_en' ,'$zone_g_number' ,'$zone_g_highlight' , '$zone_g_url' , '$zone_g_url_en' ,'$register_id'  )";
                            mysqli_query($conn, $sql_1);  


                          if (mysqli_query($conn, $sql_1)) {  
                                echo '<script type="text/javascript">alert("เพิ่ม Zone เรียบร้อย");</script>';
                                echo("<script> top.location.href='../?page=$page'</script>"); 
                          }

                }


       } //END create_web_zone


///////////////////////////////     END  create_web_zone            ////////////////////////////////////.



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


              isset( $_POST['buyer_contact_gender'] ) ? $buyer_contact_gender = $_POST['buyer_contact_gender'] : $buyer_contact_gender = ""; 
              isset( $_POST['buyer_contact_name'] ) ? $buyer_contact_name = $_POST['buyer_contact_name'] : $buyer_contact_name = "";
              isset( $_POST['buyer_contact_lastname'] ) ? $buyer_contact_lastname = $_POST['buyer_contact_lastname'] : $buyer_contact_lastname = "";
              isset( $_POST['buyer_contact_nickname'] ) ? $buyer_contact_nickname = $_POST['buyer_contact_nickname'] : $buyer_contact_nickname = "";
              isset( $_POST['buyer_contact_tel'] ) ? $buyer_contact_tel = $_POST['buyer_contact_tel'] : $buyer_contact_tel = "";
              isset( $_POST['buyer_contact_whatsapp'] ) ? $buyer_contact_whatsapp = $_POST['buyer_contact_whatsapp'] : $buyer_contact_whatsapp = "";
              isset( $_POST['buyer_contact_line'] ) ? $buyer_contact_line = $_POST['buyer_contact_line'] : $buyer_contact_line = "";
              isset( $_POST['buyer_contact_email'] ) ? $buyer_contact_email = $_POST['buyer_contact_email'] : $buyer_contact_email = "";
              isset( $_POST['buyer_contact_fb'] ) ? $buyer_contact_fb = $_POST['buyer_contact_fb'] : $buyer_contact_fb = "";
              isset( $_POST['buyer_contact_remark'] ) ? $buyer_contact_remark = $_POST['buyer_contact_remark'] : $buyer_contact_remark = "";
                            
           
  
              $sql="SELECT * FROM dbo_buyer_contact  order by buyer_contact_id  DESC ";
              $result=$conn->query($sql);  
              $rs=$result->fetch_assoc();

              $buyer_contact_id=$rs['buyer_contact_id'];

               $a = str_replace("C-","",$buyer_contact_id,$count);

               if($a<1){ 
                 $a = '1';
               }else{
                 $a=$a+1;
               }

               $code = sprintf("B-%'05d",$a); 

                if($edit=="edit"){

                      $sql = "UPDATE dbo_buyer_contact SET 
                                buyer_contact_gender='".$buyer_contact_gender."',
                                buyer_contact_name='".$buyer_contact_name."',
                                buyer_contact_lastname='".$buyer_contact_lastname."',
                                buyer_contact_nickname='".$buyer_contact_nickname."',
                                buyer_contact_tel='".$buyer_contact_tel."',
                                buyer_contact_line='".$buyer_contact_line."',
                                buyer_contact_email='".$buyer_contact_email."',
                                buyer_contact_fb='".$buyer_contact_fb."',
                                buyer_contact_whatsapp='".$buyer_contact_whatsapp."',
                                buyer_contact_remark='".$buyer_contact_remark."', 
                                user_id='".$user_id_s."',
                                buyer_contact_date_update='".$date."'
                                WHERE buyer_contact_id='".$id."' "; 


                      if ($conn->query($sql) === TRUE) {  
                           echo '<script type="text/javascript">alert("Record updated successfully");</script>';
                           echo("<script> top.location.href='../?page=$page&status=edit&id=$id'</script>");   
                      } else {
                  
                           echo '<script type="text/javascript">alert("Error");</script>';
                           echo "Error updating record: " . $conn->error;  
                      } 

                }else{

                           $sql_1="INSERT INTO dbo_buyer_contact (buyer_contact_code , buyer_contact_gender, buyer_contact_name, buyer_contact_lastname, buyer_contact_nickname, buyer_contact_line , buyer_contact_tel , buyer_contact_email, buyer_contact_fb , buyer_contact_whatsapp , buyer_contact_remark , user_id , buyer_contact_date_create )

                           VALUES ('$code','$buyer_contact_gender', '$buyer_contact_name', '$buyer_contact_lastname' , '$buyer_contact_nickname' , '$buyer_contact_line' , '$buyer_contact_tel' ,'$buyer_contact_email' ,'$buyer_contact_fb' , '$buyer_contact_whatsapp' ,'$buyer_contact_remark' , '$user_id_s' ,'$date' )";
                            mysqli_query($conn, $sql_1);  

  
                                   echo '<script type="text/javascript">alert("Record Create successfully");</script>';
                                   echo("<script> top.location.href='../?page=$page'</script>"); 
                          
                }

       }  //END create_buyer_contact 

///////////////////////////////     END  create_buyer_contact            ////////////////////////////////////.





///////////////////////////////     pm_listing      ////////////////////////////////////

       if($page=='pm_listing'){   //pm_listing

              $ex_list_listing_code=$_POST['ex_list_listing_code'];
              $ex_list_pm_waiting=$_POST['ex_list_pm_waiting'];
              $ex_list_bargain=$_POST['ex_list_bargain'];
              $ex_list_pm_status=$_POST['ex_list_pm_status'];
              $ex_list_manage_remark=$_POST['ex_list_manage_remark'];
              $listing_pm_id=$_POST['listing_pm_id'];
              $ex_list_bargain_date=$_POST['ex_list_bargain_date'];
              $ex_list_price=$_POST['ex_list_price'];
              
                if($ex_list_pm_status=='2'){
                      
                }else{
                        $ex_list_pm_waiting=$ex_list_bargain;
                }

                if($edit=="edit"){

                     $sql_update= "UPDATE dbo_data_excel_listing SET  
                                        ex_list_pm_status='".$ex_list_pm_status."',
                                        ex_list_bargain='".$ex_list_pm_waiting."'
                                        WHERE ex_list_listing_code='".$ex_list_listing_code."' "; 
                     mysqli_query($conn, $sql_update);  


                      $sql = "UPDATE dbo_listing_pm SET 
                                ex_list_pm_status='".$ex_list_pm_status."',
                                ex_list_bargain='".$ex_list_pm_waiting."',
                                ex_list_manage_remark='".$ex_list_manage_remark."',
                                ex_list_manage_id='".$USER_ID."',
                                ex_list_price='".$ex_list_price."',
                                ex_list_manage_date='".$date."'
                                WHERE listing_pm_id='".$listing_pm_id."' "; 


                      if ($conn->query($sql) === TRUE) {  
                           echo '<script type="text/javascript">alert("Record updated successfully");</script>';
                           echo("<script> top.location.href='../?page=upload_file_excel_check&p=pm_listing&page_no=1'</script>");   
                      }else{                  
                           echo '<script type="text/javascript">alert("Error");</script>';
                           echo "Error updating record: " . $conn->error;  
                      } 


                }else{


                           $sql_update= "UPDATE dbo_data_excel_listing SET  
                                              ex_list_pm_status='".$ex_list_pm_status."'
                                              WHERE ex_list_listing_code='".$ex_list_listing_code."' "; 
                           mysqli_query($conn, $sql_update);  

                           $sql_1="INSERT INTO dbo_listing_pm (listing_pm_id  , ex_list_listing_code, ex_list_pm_status, ex_list_bargain, ex_list_bargain_date , ex_list_manage_id , ex_list_manage_remark , ex_list_manage_date )
                           VALUES ('','$ex_list_listing_code', '$ex_list_pm_status', '$ex_list_bargain' , '$ex_list_bargain_date' , '$USER_ID' , '$ex_list_manage_remark'  ,'$date' )";
                            mysqli_query($conn, $sql_1);  

  
                           echo '<script type="text/javascript">alert("Record updated successfully");</script>';
                           echo("<script> top.location.href='../?page=upload_file_excel_check&p=pm_listing&page_no=1'</script>");   

                }
       }

///////////////////////////////     pm_listing      ////////////////////////////////////


///////////////////////////////     upload_position      ////////////////////////////////////

       if($page=='create_web_content'){   //upload_position

              $data_content_title=$_POST['data_content_title'];
              $data_content_detail=$_POST['data_content_detail'];
              $data_content_url=$_POST['data_content_url'];
              $data_content_meta_title=$_POST['data_content_meta_title'];
              $data_content_meta_keyword=$_POST['data_content_meta_keyword'];
              $data_content_meta_description=$_POST['data_content_meta_description'];
              $data_content_highlight=$_POST['data_content_highlight'];

              $data_content_title_en=$_POST['data_content_title_en'];
              $data_content_detail_en=$_POST['data_content_detail_en'];
              $data_content_url_en=$_POST['data_content_url_en'];
              $data_content_meta_title_en=$_POST['data_content_meta_title_en'];
              $data_content_meta_keyword_en=$_POST['data_content_meta_keyword_en'];
              $data_content_meta_description_en=$_POST['data_content_meta_description_en'];
              $data_content_highlight_en=$_POST['data_content_highlight_en'];

              $id=$_POST['id'];
              $register_id=$_POST['register_id'];
              $today=date("YmdHis");

                if($edit=="edit"){
 

                      $sql = "UPDATE dbo_data_content SET 
                                data_content_title='".$data_content_title."',
                                data_content_detail='".$data_content_detail."',
                                data_content_url='".$data_content_url."',
                                data_content_meta_title='".$data_content_meta_title."',
                                data_content_meta_keyword='".$data_content_meta_keyword."',
                                data_content_meta_description='".$data_content_meta_description."',
                                data_content_highlight='".$data_content_highlight."',
                                data_content_title_en='".$data_content_title_en."',
                                data_content_detail_en='".$data_content_detail_en."',
                                data_content_url_en='".$data_content_url_en."',
                                data_content_meta_title_en='".$data_content_meta_title_en."',
                                data_content_meta_keyword_en='".$data_content_meta_keyword_en."',
                                data_content_meta_description_en='".$data_content_meta_description_en."',
                                data_content_highlight_en='".$data_content_highlight_en."',
                                data_content_date='".$date."'                                
                                WHERE data_content_id='".$id."' "; 
                        $conn->query($sql);

                                    //////* upload file =    *//////
                                $filUpload=$_FILES['filUpload']['tmp_name'];
                                $filUpload_name=$_FILES['filUpload']['name'];
                                $filUpload_size=$_FILES['filUpload']['size'];
                                $filUpload_type=$_FILES['filUpload']['type']; 
                                $filUpload_name_ext=strtolower(end(explode('.',$filUpload_name)));                 
                         
                                 if ($filUpload_name_ext=="png" or $filUpload_name_ext=="jpg" or $filUpload_name_ext=="jpeg" or $filUpload_name_ext=="gif"   ) {
                                

                                   $images=$_FILES["filUpload"]["tmp_name"];
                                   $filUpload_file="images_".$today.".".$filUpload_name_ext;
                                
                                   copy($filUpload,"../../images/content/$filUpload_file");  

                                    $sql1 = "UPDATE dbo_data_content SET  
                                              data_content_img='".$filUpload_file."' 
                                              WHERE data_content_id='".$id."' ";  
                                    $conn->query($sql1);
            
                                }

                                    //////* upload file =   *//////
                                $filUpload_en=$_FILES['filUpload_en']['tmp_name'];
                                $filUpload_en_name=$_FILES['filUpload_en']['name'];
                                $filUpload_en_size=$_FILES['filUpload_en']['size'];
                                $filUpload_en_type=$_FILES['filUpload_en']['type']; 
                                $filUpload_en_name_ext=strtolower(end(explode('.',$filUpload_en_name)));                 
                         
                                if ($filUpload_en_name_ext=="png" or $filUpload_en_name_ext=="jpg" or $filUpload_en_name_ext=="jpeg" or $filUpload_en_name_ext=="gif"   ) {
                                

                                   $images=$_FILES["filUpload_en"]["tmp_name"];
                                   $filUpload_file="images_en_".$today.".".$filUpload_en_name_ext;
                                
                                   copy($filUpload_en,"../../images/content/$filUpload_file");  

                                    $sql1 = "UPDATE dbo_data_content SET  
                                              data_content_img_en='".$filUpload_file."' 
                                              WHERE data_content_id='".$id."' ";  
                                    $conn->query($sql1);
            
                                } 
 
                            echo '<script type="text/javascript">alert("Record Update successfully");</script>';
                            echo("<script> top.location.href='../?page=web_content'</script>");  

                }else{


                           $sql_1="INSERT INTO dbo_data_content (data_content_title, data_content_detail , data_content_url , data_content_meta_title , data_content_meta_keyword , data_content_meta_description , data_content_highlight, data_content_title_en , data_content_detail_en , data_content_url_en , data_content_meta_title_en , data_content_meta_keyword_en , data_content_meta_description_en , data_content_date )

                           VALUES ('$data_content_title', '$data_content_detail' , '$data_content_url' , '$data_content_meta_title' , '$data_content_meta_keyword' , '$data_content_meta_description' ,
                                   '$data_content_highlight' , '$data_content_title_en' , '$data_content_detail_en' ,'$data_content_url_en' ,'$data_content_meta_title_en' ,'$data_content_meta_keyword_en' , '$data_content_meta_description_en' ,'$date' )";
                            mysqli_query($conn, $sql_1);  



                                 $sql="SELECT * FROM dbo_data_content order by data_content_id DESC ";
                                 $result= $conn->query($sql); 
                                // output data of each row
                                 $rs=$result->fetch_assoc();

                                 $id=$rs['data_content_id'];


                                    //////* upload file =   tem10_file_document *//////
                                $filUpload=$_FILES['filUpload']['tmp_name'];
                                $filUpload_name=$_FILES['filUpload']['name'];
                                $filUpload_size=$_FILES['filUpload']['size'];
                                $filUpload_type=$_FILES['filUpload']['type']; 
                                $filUpload_name_ext=strtolower(end(explode('.',$filUpload_name)));                 
                         
                                 if ($filUpload_name_ext=="png" or $filUpload_name_ext=="jpg" or $filUpload_name_ext=="jpeg" or $filUpload_name_ext=="gif"   ) {
                             
                                   $images=$_FILES["filUpload"]["tmp_name"];
                                   $filUpload_file="images_".$today.".".$filUpload_name_ext;
                                
                                   copy($filUpload,"../../images/content/$filUpload_file");  

                                    $sql1 = "UPDATE dbo_data_content SET  
                                              data_content_img='".$filUpload_file."' 
                                              WHERE data_content_id='".$id."' ";  
                                    $conn->query($sql1);
            
                                }

                                      //////* upload file =   *//////
                                $filUpload_en=$_FILES['filUpload_en']['tmp_name'];
                                $filUpload_en_name=$_FILES['filUpload_en']['name'];
                                $filUpload_en_size=$_FILES['filUpload_en']['size'];
                                $filUpload_en_type=$_FILES['filUpload_en']['type']; 
                                $filUpload_en_name_ext=strtolower(end(explode('.',$filUpload_en_name)));                 
                         
                                if ($filUpload_en_name_ext=="png" or $filUpload_en_name_ext=="jpg" or $filUpload_en_name_ext=="jpeg" or $filUpload_en_name_ext=="gif"   ) {
                                

                                   $images=$_FILES["filUpload_en"]["tmp_name"];
                                   $filUpload_file="images_en_".$today.".".$filUpload_en_name_ext;
                                
                                   copy($filUpload_en,"../../images/content/$filUpload_file");  

                                    $sql1 = "UPDATE dbo_data_content SET  
                                              data_content_img_en='".$filUpload_file."' 
                                              WHERE data_content_id='".$id."' ";  
                                    $conn->query($sql1);
            
                                } 
                      
                            echo '<script type="text/javascript">alert("Record Create successfully");</script>';
                            echo("<script> top.location.href='../?page=web_content'</script>"); 


                }

       }  //END upload_position 

///////////////////////////////     END  upload_position            ////////////////////////////////////.





///////////////////////////////     upload_position      ////////////////////////////////////

       if($page=='upload_position'){   //upload_position

         

                          $sql="SELECT ex_list_googlmap,ex_list_listing_code, ex_list_latitude FROM 
                                dbo_data_excel_listing where ex_list_latitude='0'  
                                order by ex_list_listing_code ASC ";
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
                          
                              
  

                              $sql1 = "UPDATE dbo_data_excel_listing SET 
                                        ex_list_latitude='".$n2."',
                                        ex_list_longitude='".$n1."'
                                        WHERE ex_list_listing_code='".$ex_list_listing_code."' "; 

                              if ($conn->query($sql1) === TRUE) {  }

                              echo $ex_list_listing_code." = Latitude : ".$n2." |  Longitude : ".$n1."<br>";
  
                          }

       }  //END upload_position 

///////////////////////////////     END  upload_position            ////////////////////////////////////.




///////////////////////////////     create_type_strengths      ////////////////////////////////////


       if($page=='create_type_strengths'){   //create_type_strengths


              $strengths_name=$_POST['strengths_name']; 
              $strengths_name_en=$_POST['strengths_name_en']; 

                if($edit=="edit"){


                      $sql = "UPDATE type_strengths SET 
                                strengths_name='".$strengths_name."',
                                strengths_name_en='".$strengths_name_en."'
                                 
                                WHERE strengths_id='".$id."' "; 

                            echo '<script type="text/javascript">alert("Record Update successfully");</script>';
                            echo("<script> top.location.href='../?page=create_type_furniture'</script>"); 

                }else{


                           $sql_1="INSERT INTO type_strengths (strengths_name, strengths_name_en ,strengths_create )

                           VALUES ('$strengths_name', '$strengths_name_en' ,'$date' )";
                            mysqli_query($conn, $sql_1);  
 
                      
                            echo '<script type="text/javascript">alert("Record Create successfully");</script>';
                            echo("<script> top.location.href='../?page=type_strengths'</script>"); 


                }

       }//create_type_strengths

///////////////////////////////     END create_type_strengths      ////////////////////////////////////




///////////////////////////////     create_type_furniture      ////////////////////////////////////


       if($page=='create_type_furniture'){   //create_type_furniture


              $furniture_name=$_POST['furniture_name']; 
              $furniture_name_en=$_POST['furniture_name_en']; 

                if($edit=="edit"){


                      $sql = "UPDATE type_furniture SET 
                                furniture_name='".$furniture_name."',
                                furniture_name_en='".$furniture_name_en."'
                                 
                                WHERE furniture_id='".$id."' "; 

                            echo '<script type="text/javascript">alert("Record Update successfully");</script>';
                            echo("<script> top.location.href='../?page=create_type_furniture'</script>"); 


                }else{


                           $sql_1="INSERT INTO type_furniture (furniture_name, furniture_name_en , furniture_create )

                           VALUES ('$furniture_name', '$furniture_name_en' ,'$date' )";
                            mysqli_query($conn, $sql_1);  
 
                      
                            echo '<script type="text/javascript">alert("Record Create successfully");</script>';
                            echo("<script> top.location.href='../?page=type_furniture'</script>"); 


                }

       }//create_type_furniture

///////////////////////////////     END create_type_furniture      ////////////////////////////////////
 

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

///////////////////////////////     END  upload_mini_images    ////////////////////////////////////.



 
///////////////////////////////     create_deal_buyer      ////////////////////////////////////


       if($page=='create_deal_buyer'){   //create_deal_buyer
 

                      $buyer_contact_id=$_POST['buyer_contact_id'];
                      $buyer_contact_code=$_POST['buyer_contact_code'];

                      isset( $_POST['buyer_contact_gender'] ) ? $buyer_contact_gender = $_POST['buyer_contact_gender'] : $buyer_contact_gender = ""; 
                      isset( $_POST['buyer_contact_name'] ) ? $buyer_contact_name = $_POST['buyer_contact_name'] : $buyer_contact_name = "";
                      isset( $_POST['buyer_contact_lastname'] ) ? $buyer_contact_lastname = $_POST['buyer_contact_lastname'] : $buyer_contact_lastname = "";
                      isset( $_POST['buyer_contact_nickname'] ) ? $buyer_contact_nickname = $_POST['buyer_contact_nickname'] : $buyer_contact_nickname = "";
                      isset( $_POST['buyer_contact_nationality'] ) ? $buyer_contact_nationality = $_POST['buyer_contact_nationality'] : $buyer_contact_nationality = "";
                      isset( $_POST['buyer_contact_tel'] ) ? $buyer_contact_tel = $_POST['buyer_contact_tel'] : $buyer_contact_tel = "";
                      isset( $_POST['buyer_contact_tel_2'] ) ? $buyer_contact_tel_2 = $_POST['buyer_contact_tel_2'] : $buyer_contact_tel_2 = "";
                      isset( $_POST['buyer_contact_tel_3'] ) ? $buyer_contact_tel_3 = $_POST['buyer_contact_tel_3'] : $buyer_contact_tel_3 = "";       
                      isset( $_POST['buyer_contact_tel_4'] ) ? $buyer_contact_tel_4 = $_POST['buyer_contact_tel_4'] : $buyer_contact_tel_4 = "";
                      isset( $_POST['buyer_contact_attention'] ) ? $buyer_contact_attention = $_POST['buyer_contact_attention'] : $buyer_contact_attention = "";
                      isset( $_POST['buyer_contact_status'] ) ? $buyer_contact_status = $_POST['buyer_contact_status'] : $buyer_contact_status = "";
                      isset( $_POST['buyer_contact_whatsapp'] ) ? $buyer_contact_whatsapp = $_POST['buyer_contact_whatsapp'] : $buyer_contact_whatsapp = "";
                      isset( $_POST['buyer_contact_wechat'] ) ? $buyer_contact_wechat = $_POST['buyer_contact_wechat'] : $buyer_contact_wechat = "";
                      isset( $_POST['buyer_contact_line'] ) ? $buyer_contact_line = $_POST['buyer_contact_line'] : $buyer_contact_line = "";
                      isset( $_POST['buyer_contact_line_id'] ) ? $buyer_contact_line_id = $_POST['buyer_contact_line_id'] : $buyer_contact_line_id = "";
                      isset( $_POST['buyer_contact_email'] ) ? $buyer_contact_email = $_POST['buyer_contact_email'] : $buyer_contact_email = "";
                      isset( $_POST['buyer_contact_fb'] ) ? $buyer_contact_fb = $_POST['buyer_contact_fb'] : $buyer_contact_fb = "";
                      isset( $_POST['buyer_contact_language'] ) ? $buyer_contact_language = $_POST['buyer_contact_language'] : $buyer_contact_language = "";
 
                      isset( $_POST['buyer_contact_birthday'] ) ? $buyer_contact_birthday = $_POST['buyer_contact_birthday'] : $buyer_contact_birthday = "";
                      isset( $_POST['buyer_monthly_income'] ) ? $buyer_monthly_income = $_POST['buyer_monthly_income'] : $buyer_monthly_income = "";
                      isset( $_POST['buyer_objective'] ) ? $buyer_objective = $_POST['buyer_objective'] : $buyer_objective = "";

                      isset( $_POST['buyer_contact_workplace_address'] ) ? $buyer_contact_workplace_address = $_POST['buyer_contact_workplace_address'] : $buyer_contact_workplace_address = "";
                      isset( $_POST['buyer_contact_latitude'] ) ? $buyer_contact_latitude = $_POST['buyer_contact_latitude'] : $buyer_contact_latitude = "";
                      isset( $_POST['buyer_contact_longitude'] ) ? $buyer_contact_longitude = $_POST['buyer_contact_longitude'] : $buyer_contact_longitude = "";
                      isset( $_POST['buyer_contact_google_map'] ) ? $buyer_contact_google_map = $_POST['buyer_contact_google_map'] : $buyer_contact_google_map = "";
          

          isset( $_POST['sale'] ) ? $sale = $_POST['sale'] : $sale = "";

 
          isset( $_POST['create_deal_type'] ) ? $create_deal_type = $_POST['create_deal_type'] : $create_deal_type = "";
          isset( $_POST['create_deal_budget_start'] ) ? $create_deal_budget_start = $_POST['create_deal_budget_start'] : $create_deal_budget_start = "";
          isset( $_POST['create_deal_budget_end'] ) ? $create_deal_budget_end = $_POST['create_deal_budget_end'] : $create_deal_budget_end = "";
          isset( $_POST['create_deal_duration'] ) ? $create_deal_duration = $_POST['create_deal_duration'] : $create_deal_duration = "";
          isset( $_POST['create_deal_bedroom'] ) ? $create_deal_bedroom = $_POST['create_deal_bedroom'] : $create_deal_bedroom = "";
          isset( $_POST['create_deal_bathroom'] ) ? $create_deal_bathroom = $_POST['create_deal_bathroom'] : $create_deal_bathroom = "";
          isset( $_POST['create_deal_sqm_start'] ) ? $create_deal_sqm_start = $_POST['create_deal_sqm_start'] : $create_deal_sqm_start = "";
          isset( $_POST['create_deal_sqm_end'] ) ? $create_deal_sqm_end = $_POST['create_deal_sqm_end'] : $create_deal_sqm_end = "";
          isset( $_POST['create_deal_select_floor'] ) ? $create_deal_select_floor = $_POST['create_deal_select_floor'] : $create_deal_select_floor = "";
          isset( $_POST['create_deal_floor'] ) ? $create_deal_floor = $_POST['create_deal_floor'] : $create_deal_floor = "";
          isset( $_POST['create_deal_rent_till'] ) ? $create_deal_rent_till = $_POST['create_deal_rent_till'] : $create_deal_rent_till = "";
          isset( $_POST['create_deal_open_room'] ) ? $create_deal_open_room = $_POST['create_deal_open_room'] : $create_deal_open_room = "";
          isset( $_POST['create_deal_pet_friendly'] ) ? $create_deal_pet_friendly = $_POST['create_deal_pet_friendly'] : $create_deal_pet_friendly = "";
          isset( $_POST['create_deal_pet_friendly_type'] ) ? $create_deal_pet_friendly_type = $_POST['create_deal_pet_friendly_type'] : $create_deal_pet_friendly_type = "";
          isset( $_POST['create_deal_sale'] ) ? $create_deal_sale = $_POST['create_deal_sale'] : $create_deal_sale = "";  
          isset( $_POST['buyer_contact_remark'] ) ? $buyer_contact_remark = $_POST['buyer_contact_remark'] : $buyer_contact_remark = "";  
          isset( $_POST['project_id'] ) ? $project_id = $_POST['project_id'] : $project_id = "";  
          isset( $_POST['station_id'] ) ? $station_id = $_POST['station_id'] : $station_id = "";  
          isset( $_POST['zone_id'] ) ? $zone_id = $_POST['zone_id'] : $zone_id = "";   
          isset( $_POST['source_code'] ) ? $source_code = $_POST['source_code'] : $source_code = "";  
          isset( $_POST['contact_code'] ) ? $contact_code = $_POST['contact_code'] : $contact_code = "";  
          isset( $_POST['create_deal_title'] ) ? $create_deal_title = $_POST['create_deal_title'] : $create_deal_title = "";  
          isset( $_POST['create_deal_attention'] ) ? $create_deal_attention = $_POST['create_deal_attention'] : $create_deal_attention = "";  
          isset( $_POST['buyer_contact_listing_code'] ) ? $buyer_contact_listing_code = $_POST['buyer_contact_listing_code'] : $buyer_contact_listing_code = "";  
          isset( $_POST['buyer_contact_listing_code'] ) ? $buyer_contact_listing_code_check = $_POST['buyer_contact_listing_code'] : $buyer_contact_listing_code_check = ""; 
          isset( $_POST['create_deal_search_from'] ) ? $create_deal_search_from = $_POST['create_deal_search_from'] : $create_deal_search_from = ""; 
          isset( $_POST['create_deal_sale_2'] ) ? $create_deal_sale_2 = $_POST['create_deal_sale_2'] : $create_deal_sale_2 = ""; 
          isset( $_POST['create_deal_remark'] ) ? $create_deal_remark = $_POST['create_deal_remark'] : $create_deal_remark = ""; 
  
                      $buyer_contact_listing_code=str_replace(" ","",$buyer_contact_listing_code,$count);

                     $buyer_contact_name=str_replace("'","’",$buyer_contact_name,$count);
                     $buyer_contact_line=str_replace("'","’",$buyer_contact_line,$count);

                    $create_deal_budget_start=str_replace(",","",$create_deal_budget_start);
                    $create_deal_budget_end=str_replace(",","",$create_deal_budget_end);

          if($buyer_contact_code!='' ){  //buyer_contact_id   
 

                if($edit=="edit"){

                      
                     if($step=='1'){ //step 1

                           $sql="UPDATE dbo_buyer_contact SET  
                                buyer_contact_listing_code='".$buyer_contact_listing_code."',  
                                buyer_contact_name='".$buyer_contact_line."', 
                                buyer_contact_tel='".$buyer_contact_tel."',
                                buyer_contact_tel_2='".$buyer_contact_tel_2."',
                                buyer_contact_tel_3='".$buyer_contact_tel_3."',
                                buyer_contact_tel_4='".$buyer_contact_tel_4."',
                                buyer_contact_attention='".$buyer_contact_attention."',
                                buyer_contact_status='".$buyer_contact_status."',
                                buyer_contact_whatsapp='".$buyer_contact_whatsapp."',
                                buyer_contact_line='".$buyer_contact_line."',
                                buyer_contact_email='".$buyer_contact_email."',
                                buyer_contact_line_id='".$buyer_contact_line_id."',
                                buyer_contact_fb='".$buyer_contact_fb."',
                                buyer_contact_wechat='".$buyer_contact_wechat."',
                                buyer_contact_date_update='".$date."'                                 
                                WHERE buyer_contact_code='".$buyer_contact_code."' "; 
                            mysqli_query($conn, $sql);  

                            if($buyer_contact_listing_code_check=="1"){ 

                                  if($buyer_contact_listing_code!=''){

                                        $sql_listing="SELECT listing.project_id , listing.ex_list_bedroom , listing.ex_list_bathroom, listing.ex_list_sqm  , listing.ex_list_deal_type , listing.ex_list_train_station , listing.ex_list_train_station , listing.ex_list_listing_type , listing.ex_list_listing_name , listing.ex_list_listing_name_en, pj.project_train_station , listing.zone_id , listing.ex_list_price , pj.project_name_en 
                                                      FROM dbo_data_excel_listing AS listing
                                                      LEFT JOIN type_project AS pj on listing.project_id=pj.project_id
                                                      WHERE listing.ex_list_listing_code='$buyer_contact_listing_code' ";
                                        $result_listing=$conn->query($sql_listing);  
                                        $rs_listing=$result_listing->fetch_assoc();

                                        $project_id=$rs_listing['project_id'];
                                        $ex_list_bedroom=$rs_listing['ex_list_bedroom'];
                                        $ex_list_bathroom=$rs_listing['ex_list_bathroom'];
                                        $ex_list_sqm='';
                                        $ex_list_deal_type=$rs_listing['ex_list_deal_type'];
                                        $ex_list_listing_type=$rs_listing['ex_list_listing_type'];
                                        $project_train_station=$rs_listing['project_train_station'];
                                        $ex_list_train_station=$rs_listing['ex_list_train_station'];
                                        $zone_id=$rs_listing['zone_id'];
                                        $ex_list_price=$rs_listing['ex_list_price'];
                                        $project_name_en=$rs_listing['project_name_en'];
                                        $ex_list_listing_name=$rs_listing['ex_list_listing_name'];
                                        $ex_list_listing_name_en=$rs_listing['ex_list_listing_name_en'];

                                        if($project_train_station!=''){
                                              $ex_list_train_station=$project_train_station;
                                        }


                                        if($project_id!='0'){
                                               $create_deal_title=$buyer_contact_line."_".$project_name_en;
                                        }else{

                                            if($ex_list_listing_name_en!=''){
                                               $create_deal_title=$buyer_contact_line."_".$project_name_en; 
                                            }else{
                                               $create_deal_title=$buyer_contact_line."_".$ex_list_listing_name;  
                                            }

                                        }




                                   $sql2="UPDATE dbo_create_deal SET 
                                        create_deal_attention='".$buyer_contact_attention."',
                                        create_deal_title='".$create_deal_title."', 
                                        buyer_contact_code='".$buyer_contact_code."',  
                                        buyer_contact_listing_code='".$buyer_contact_listing_code."',  
                                        create_deal_update='".$date."'                                 
                                        WHERE create_deal_code='".$id."' "; 
                                    mysqli_query($conn, $sql2); 

                                }else{
        

                                }

                            }else{
    
                                        
                                   $sql2="UPDATE dbo_create_deal SET 
                                        create_deal_attention='".$buyer_contact_attention."',
                                        buyer_contact_code='".$buyer_contact_code."',  
                                        buyer_contact_listing_code='".$buyer_contact_listing_code."',  
                                        create_deal_update='".$date."'                                 
                                        WHERE create_deal_code='".$id."' "; 
                                    mysqli_query($conn, $sql2);   
 
                            }                        
                            
                                    echo("<script> top.location.href='../?page=create_deal_buyer&status=edit&p_check=create_buyer&buyer_id=$buyer_contact_code&code=$id&request_d=$request_d&step=2&sale=$sale'</script>");  
                      } 
  


                }else{ //create


 

                         if($step=='1'){

                                   $sql_buyer="UPDATE dbo_buyer_contact SET                                 
                                        buyer_contact_name='".$buyer_contact_line."',
                                        buyer_contact_tel='".$buyer_contact_tel."',
                                        buyer_contact_tel_2='".$buyer_contact_tel_2."',
                                        buyer_contact_tel_3='".$buyer_contact_tel_3."',
                                        buyer_contact_tel_4='".$buyer_contact_tel_4."',
                                        buyer_contact_attention='".$buyer_contact_attention."',
                                        buyer_contact_status='".$buyer_contact_status."',
                                        buyer_contact_whatsapp='".$buyer_contact_whatsapp."',
                                        buyer_contact_line='".$buyer_contact_line."',
                                        buyer_contact_email='".$buyer_contact_email."',
                                        buyer_contact_line_id='".$buyer_contact_line_id."',
                                        buyer_contact_fb='".$buyer_contact_fb."',
                                        buyer_contact_wechat='".$buyer_contact_wechat."',   
                                        buyer_contact_listing_code='".$buyer_contact_listing_code."',                           
                                        buyer_contact_date_update='".$date."'                                 
                                        WHERE buyer_contact_code='".$buyer_contact_code."' "; 
                                    mysqli_query($conn, $sql_buyer);   

                                  

                                 //echo '<script type="text/javascript">alert("Record Create successfully 8");</script>';
                                 //echo("<script> top.location.href='../?page=create_deal_buyer&status=create&p_check=create_deal&step=2&listing_id=$buyer_contact_listing_code&code=$code_deal'</script>"); 

                                echo("<script> top.location.href='../?page=create_deal_buyer&status=create&p_check=create_buyer&buyer_id=$buyer_contact_code&listing_id=$buyer_contact_listing_code&request_d=$request_d&step=2&code=$code_deal'</script>"); 

                         }
 

                       // END dbo_create_deal 

                }

          /////////////////////////////////////////////////////////////////////////////////////////////////

         }else{   //buyer_contact_id   


                if($p_check=='create_buyer'){ //create_buyer
            
 
                    if($_SESSION['STATUS_ID']=='1'){  //เฉพาะเซลล์สร้าง
 /*
                           if($buyer_contact_tel==''){  $buyer_contact_tel='*';  }
                           if($buyer_contact_tel_2==''){  $buyer_contact_tel_2='*';  }
                           if($buyer_contact_tel_3==''){  $buyer_contact_tel_3='*';  }
                           if($buyer_contact_tel_4==''){  $buyer_contact_tel_4='*';  }
                           if($buyer_contact_wechat==''){  $buyer_contact_wechat='*';  }
                           if($buyer_contact_line_id==''){  $buyer_contact_line_id='*';  }
                           if($buyer_contact_whatsapp==''){  $buyer_contact_whatsapp='*';  }
                          


                          $sql_check_buyer="SELECT * FROM dbo_buyer_contact  
                                         where buyer_contact_tel='$buyer_contact_tel'  or buyer_contact_tel='$buyer_contact_tel_2'    or
                                               buyer_contact_tel='$buyer_contact_tel_3'  or buyer_contact_tel='$buyer_contact_tel_4'    or
                                               buyer_contact_tel_2='$buyer_contact_tel'  or buyer_contact_tel_2='$buyer_contact_tel_2'  or 
                                               buyer_contact_tel_2='$buyer_contact_tel_3' or buyer_contact_tel_2='$buyer_contact_tel_4'  or
                                               buyer_contact_tel_3='$buyer_contact_tel'  or buyer_contact_tel_3='$buyer_contact_tel_2'  or 
                                               buyer_contact_tel_3='$buyer_contact_tel_3'  or buyer_contact_tel_3='$buyer_contact_tel_4'  or
                                               buyer_contact_tel_4='$buyer_contact_tel'  or buyer_contact_tel_4='$buyer_contact_tel_2'  or 
                                               buyer_contact_tel_4='$buyer_contact_tel_3'   or buyer_contact_tel_4='$buyer_contact_tel_4' or 
                                               buyer_contact_wechat='$buyer_contact_wechat' or buyer_contact_line_id='$buyer_contact_line_id' or
                                               buyer_contact_whatsapp='$buyer_contact_whatsapp' 
                          ";
                          $result_check_buyer=$conn->query($sql_check_buyer);  
                          $rs_check_buyer=$result_check_buyer->fetch_assoc();

                          $buyer_contact_code=$rs_check_buyer['buyer_contact_code'];


                          if($buyer_contact_code!=''){ // ข้อมูลซ้ำ
                                     
                                $sql_deal="SELECT * FROM dbo_create_deal where buyer_contact_code='$buyer_contact_code' and contact_deal_win!='8' or buyer_contact_code='$buyer_contact_code' and contact_deal_win!='9' ";
                                $result_deal=$conn->query($sql_deal);  
                                $rs_deal=$result_deal->fetch_assoc();

                                $create_deal_code=$rs_deal['create_deal_code'];

                                if($create_deal_code!=''){
                                 
                                       echo '<script type="text/javascript">alert("ไม่อนุญาตให้เพิ่มข้อมูล");</script>';
                                       echo("<script> top.location.href='../?page=create_deal_buyer&status=create&p_check=create_buyer'</script>"); 



                                }else{

                                       $create_deal_sale=$USER_ID;
                                       $deal_create='1';


                                }

                          }else{

                                       $create_deal_sale=$USER_ID;
                                       $deal_create='1';

                          } */


                  }else{  //ทีมผู้จัดการ และ สต๊อกสร้าง
                         
                             if($buyer_contact_tel==''){  $buyer_contact_tel='*';  }
                             if($buyer_contact_tel_2==''){  $buyer_contact_tel_2='*';  }
                             if($buyer_contact_tel_3==''){  $buyer_contact_tel_3='*';  }
                             if($buyer_contact_tel_4==''){  $buyer_contact_tel_4='*';  }
                             if($buyer_contact_wechat==''){  $buyer_contact_wechat='*';  }
                             if($buyer_contact_line_id==''){  $buyer_contact_line_id='*';  }
                             if($buyer_contact_whatsapp==''){  $buyer_contact_whatsapp='*';  }

                            $sql_check_buyer="SELECT * FROM dbo_buyer_contact  
                                           where buyer_contact_tel='$buyer_contact_tel'  or buyer_contact_tel='$buyer_contact_tel_2'    or
                                                 buyer_contact_tel='$buyer_contact_tel_3'  or buyer_contact_tel='$buyer_contact_tel_4'    or
                                                 buyer_contact_tel_2='$buyer_contact_tel'  or buyer_contact_tel_2='$buyer_contact_tel_2'  or 
                                                 buyer_contact_tel_2='$buyer_contact_tel_3' or buyer_contact_tel_2='$buyer_contact_tel_4'  or
                                                 buyer_contact_tel_3='$buyer_contact_tel'  or buyer_contact_tel_3='$buyer_contact_tel_2'  or 
                                                 buyer_contact_tel_3='$buyer_contact_tel_3'  or buyer_contact_tel_3='$buyer_contact_tel_4'  or
                                                 buyer_contact_tel_4='$buyer_contact_tel'  or buyer_contact_tel_4='$buyer_contact_tel_2'  or 
                                                 buyer_contact_tel_4='$buyer_contact_tel_3'   or buyer_contact_tel_4='$buyer_contact_tel_4' or 
                                                 buyer_contact_wechat='$buyer_contact_wechat' or buyer_contact_line_id='$buyer_contact_line_id' or
                                                 buyer_contact_whatsapp='$buyer_contact_whatsapp' 
                            ";
                            $result_check_buyer=$conn->query($sql_check_buyer);  
                            $rs_check_buyer=$result_check_buyer->fetch_assoc();

                            $buyer_contact_code=$rs_check_buyer['buyer_contact_code'];
                            

                            if($buyer_contact_code!=''){

                           
                                 echo '<script type="text/javascript">alert("มีการเพิ่มข้อมูลซ้ำในระบบ หากเลือกลูกค้าคนเดิม โปรดเลือกรายชื่อลูกค้าแทน");</script>';

                                 if($edit=='edit'){
                                      echo("<script> top.location.href='../?page=create_deal_buyer&status=edit&p_check=create_deal&step=1&code=$id&request_d=$request_d'</script>"); 
                                 }else{
                                      echo("<script> top.location.href='../?page=create_deal_buyer&status=create&p_check=create_buyer&buyer_id=$buyer_contact_code&request_d=$request_d&step=1'</script>"); 
                                 }

                            }else{

                                         $create_deal_sale='0';
                                         $deal_create='1';
                            }

                  }

 
 
                      if($deal_create=='1' and $step=='1'){ 
                                
                                if($buyer_contact_listing_code!=''){
                                     
                                     if($edit=="edit"){

                                        $project_id='';
                                        $ex_list_deal_type='';
                                        $ex_list_listing_type='';
                                        $ex_list_train_station='';
                                        $zone_id='';
                                        $ex_list_price='';

                                     }else{  // เช็ค CX ที่กรอกมา เพื่อนำข้อมูลไปเช็ค

                                        $sql_listing="SELECT listing.project_id  , listing.ex_list_bedroom , listing.ex_list_bathroom, listing.ex_list_sqm ,  listing.ex_list_deal_type , listing.ex_list_train_station , listing.ex_list_train_station , listing.ex_list_listing_type , pj.project_train_station , listing.zone_id , listing.ex_list_price , pj.project_name_en 
                                                      FROM dbo_data_excel_listing AS listing
                                                      LEFT JOIN type_project AS pj on listing.project_id=pj.project_id
                                                      WHERE listing.ex_list_listing_code='$buyer_contact_listing_code' ";
                                        $result_listing=$conn->query($sql_listing);  
                                        $rs_listing=$result_listing->fetch_assoc();

                                        $project_id=$rs_listing['project_id'];
                                        $ex_list_bedroom=$rs_listing['ex_list_bedroom'];
                                        $ex_list_bathroom=$rs_listing['ex_list_bathroom'];
                                        $ex_list_sqm='';
                                        $ex_list_deal_type=$rs_listing['ex_list_deal_type'];
                                        $ex_list_listing_type=$rs_listing['ex_list_listing_type'];
                                        $project_train_station=$rs_listing['project_train_station'];
                                        $ex_list_train_station=$rs_listing['ex_list_train_station'];
                                        $zone_id=$rs_listing['zone_id'];
                                        $ex_list_price=$rs_listing['ex_list_price'];
                                        $project_name_en=$rs_listing['project_name_en'];

                                        if($project_train_station!=''){
                                              $ex_list_train_station=$project_train_station;
                                        }


                                        if($create_deal_title==''){
                                               $create_deal_title=$buyer_contact_line."_".$project_name_en;
                                        }

                                     }

                                }

                                $buyer_contact_tel=str_replace("*","",$buyer_contact_tel,$count); 
                                $buyer_contact_tel_2=str_replace("*","",$buyer_contact_tel_2,$count); 
                                $buyer_contact_tel_3=str_replace("*","",$buyer_contact_tel_3,$count); 
                                $buyer_contact_tel_4=str_replace("*","",$buyer_contact_tel_4,$count); 
                                $buyer_contact_wechat=str_replace("*","",$buyer_contact_wechat,$count); 
                                $buyer_contact_line_id=str_replace("*","",$buyer_contact_line_id,$count); 
                                $buyer_contact_whatsapp=str_replace("*","",$buyer_contact_whatsapp,$count); 


                                $sql="SELECT * FROM dbo_buyer_contact  order by buyer_contact_date_create  DESC ";
                                $result=$conn->query($sql);  
                                $rs=$result->fetch_assoc();

                                $buyer_contact_code=$rs['buyer_contact_code'];  
                                $buyer_contact_code = str_replace("B-","",$buyer_contact_code,$count);

                                 if($buyer_contact_code<1){ 
                                   $buyer_contact_code = '1';
                                 }else{
                                   $buyer_contact_code=$buyer_contact_code+1;
                                 }

                                 $code = sprintf("B-%'05d",$buyer_contact_code); 
                    
                                  $sql_1="INSERT INTO dbo_buyer_contact (buyer_contact_code , buyer_contact_listing_code  , buyer_contact_gender, buyer_contact_name, buyer_contact_lastname, buyer_contact_nickname , buyer_contact_nationality, buyer_contact_line , buyer_contact_line_id , buyer_contact_tel , buyer_contact_tel_2 , buyer_contact_tel_3 , buyer_contact_tel_4 , buyer_contact_attention , buyer_contact_status , buyer_contact_email, buyer_contact_fb , buyer_contact_whatsapp , buyer_contact_wechat , buyer_contact_language , buyer_contact_remark , user_id , buyer_contact_birthday , buyer_monthly_income , buyer_objective , buyer_contact_workplace_address , buyer_contact_latitude , buyer_contact_longitude , buyer_contact_google_map , buyer_contact_date_create )
                                  VALUES ('$code' , '$buyer_contact_listing_code' ,'$buyer_contact_gender', '$buyer_contact_name', '$buyer_contact_lastname' , '$buyer_contact_nickname' , '$buyer_contact_nationality' , '$buyer_contact_line' , '$buyer_contact_line_id' , '$buyer_contact_tel' , '$buyer_contact_tel_2' , '$buyer_contact_tel_3'  , '$buyer_contact_tel_4' , '$buyer_contact_attention' , '$buyer_contact_status' ,'$buyer_contact_email'  ,'$buyer_contact_fb' , '$buyer_contact_whatsapp' , '$buyer_contact_wechat' , '$buyer_contact_language' ,'$create_deal_remark' , '$user_id_s' , '$buyer_contact_birthday' , '$buyer_monthly_income' , '$buyer_objective' , '$buyer_contact_workplace_address', '$buyer_contact_latitude' , '$buyer_contact_longitude' , '$buyer_contact_google_map' ,'$date' )";
                                    mysqli_query($conn, $sql_1);  
                               
                                 // echo '<script type="text/javascript">alert("Record Create successfully _1");</script>';
                                  //echo("<script> top.location.href='../?page=create_deal_buyer&status=edit&p_check=create_deal&code=$id&d_check=1'</script>");
                                 echo("<script> top.location.href='../?page=create_deal_buyer&status=$edit&p_check=create_buyer&buyer_id=$code&code=$id&listing_id=$buyer_contact_listing_code&request_d=$request_d&step=2'</script>"); 

                      }    
                 
 
              } // END create_buyer
  

          } // END buyer_contact_id
 


                       if($step=='2'){

                            if($create_deal_attention=='1'){
                                   $deal_attention="Buy";
                            }else if($create_deal_attention=='2'){
                                   $deal_attention="Rent";
                            }else if($create_deal_attention=='4'){
                                   $deal_attention="Extension";
                            }

                               if($edit=='edit'){

                                 // dbo_create_deal


                                    if($create_deal_title==''){

                                        if($project_id!=''){
                                             $sql="SELECT * FROM type_project where project_id='$project_id'  order by project_id ASC  "; 
                                             $result=$conn->query($sql);  
                                             $rs_project=$result->fetch_assoc();  
                                             $project_name_en=$rs_project['project_name_en']; 
                                             $create_deal_title=$buyer_contact_line."_".$project_name_en;
                                     
                                        }else if($station_id!=''){

                                            $strSQL = "SELECT * FROM type_train_station where station_id='$station_id'  "; 
                                            $result=$conn->query($strSQL);                                    
                                            $rs=$result->fetch_assoc();
                                            $station_name_en=$rs['station_name_en'];
                                            $create_deal_title=$buyer_contact_line."_".$station_name_en;                                             

                                        }else if($zone_id!=''){

                                            $strSQL = "SELECT * FROM type_zone where zone_id='$zone_id'  "; 
                                            $result=$conn->query($strSQL);                                    
                                            $rs=$result->fetch_assoc();
                                            $zone_name_en=$rs['zone_name_en'];                                            
                                            $create_deal_title=$buyer_contact_line."_".$zone_name_en;                                                                                   
                                        }                                       
                                    }

  
                                     $sql_buyer="UPDATE dbo_buyer_contact SET 
                                        buyer_contact_language='".$buyer_contact_language."'             
                                        WHERE buyer_contact_code='".$buyer_contact_code."' "; 
                                    mysqli_query($conn, $sql_buyer); 

                                   $sql2="UPDATE dbo_create_deal SET 
                                        create_deal_title='".$create_deal_title."',
                                        source_code='".$source_code."',
                                        contact_code='".$contact_code."', 
                                        create_deal_type='".$create_deal_type."',
                                        project_id='".$project_id."',
                                        station_id='".$station_id."',
                                        zone_id='".$zone_id."',
                                        create_deal_budget_start='".$create_deal_budget_start."',
                                        create_deal_budget_end='".$create_deal_budget_end."',
                                        create_deal_bedroom='".$create_deal_bedroom."',
                                        create_deal_bathroom='".$create_deal_bathroom."',
                                        create_deal_sqm_start='".$create_deal_sqm_start."',
                                        create_deal_sqm_end='".$create_deal_sqm_end."', 
                                        create_deal_select_floor='".$create_deal_select_floor."', 
                                        create_deal_floor='".$create_deal_floor."',
                                        create_deal_duration='".$create_deal_duration."',
                                        create_deal_rent_till='".$create_deal_rent_till."',
                                        create_deal_open_room='".$create_deal_open_room."',
                                        create_deal_pet_friendly='".$create_deal_pet_friendly."',
                                        create_deal_pet_friendly_type='".$create_deal_pet_friendly_type."',                                        
                                        buyer_contact_code='".$buyer_contact_code."',  
                                        buyer_contact_listing_code='".$buyer_contact_listing_code."',  
                                        create_deal_remark='".$create_deal_remark."',  
                                        create_deal_sale='".$create_deal_sale."',   
                                        create_deal_update='".$date."'                                 
                                        WHERE create_deal_code='".$id."' "; 
                                    mysqli_query($conn, $sql2);   



                         if(!empty($_FILES['filUpload']['tmp_name'])){ 

                            for( $i=0; $i<count( $_FILES['filUpload']['tmp_name']); $i++ ) {  

                                $image=$_FILES['filUpload']['tmp_name'][$i];
                                $image_name=$_FILES['filUpload']['name'][$i];
                                $image_size=$_FILES['filUpload']['size'][$i];
                                $image_type=$_FILES['filUpload']['type'][$i]; 


                                $image_ext=strtolower(end(explode('.',$image_name)));  

                                
                                $image_name=$id."_".$image_name;

                                if($image!=''){  

                                   copy($image,"../file/chat_line/$image_name"); 
   
                                    $sql_1="INSERT INTO dbo_create_deal_img (deal_img_id  , create_deal_code, deal_img_file, deal_img_create  )
                                    VALUES ('','$id', '$image_name' ,'$date' )";
                                      mysqli_query($conn, $sql_1);  
                                }

                            }
                        } 



                        if($create_deal_sale_2!=$create_deal_sale){


                          // เซลล์ที่ ส่งงานให้
                          $sql="SELECT * FROM dbo_register where register_id='$create_deal_sale'   ";
                          $result=$conn->query($sql);  
                          $rs=$result->fetch_assoc();

                          $register_notify=$rs['register_notify'];

                          if($register_notify!=''){

                              define('LINE_API',"https://notify-api.line.me/api/notify");
                              define('LINE_TOKEN',$register_notify); 

                              function notify_message($message){

                                  $queryData = array('message' => $message);
                                  $queryData = http_build_query($queryData,'','&');
                                  $headerOptions = array(
                                      'http'=>array(
                                          'method'=>'POST',
                                          'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                                                    ."Authorization: Bearer ".LINE_TOKEN."\r\n"
                                                    ."Content-Length: ".strlen($queryData)."\r\n",
                                          'content' => $queryData
                                      )
                                  );
                                  $context = stream_context_create($headerOptions);
                                  $result = file_get_contents(LINE_API,FALSE,$context);
                                  $res = json_decode($result);
                                  return $res;
                               }

                               $deal_title=$create_deal_title;


                               $deal_url="$baseUrl/link.php?p=deal_a&id=$id"; 

                             /* --------------  */
$text_line = "
*****Assign New Case*****
รหัส Deal : ".$id."
Deal Type : ".$deal_attention."
Deal Name : ".$deal_title."
Date : ".$date."  
URL : " .$deal_url;
                                $alert_line = notify_message($text_line);  


                               }

 
                                $record_note="Assign"; 
                                $sql_record="INSERT INTO dbo_record (create_deal_code ,record_note , register_id ,  record_date , record_user_id  )

                                VALUES ( '$id','$record_note' , '$create_deal_sale' ,   '$date' , '$USER_ID')";
                                mysqli_query($conn, $sql_record); 

                         }

                         
                                // echo '<script type="text/javascript">alert("Record Create successfully_1 2566");</script>';
                                echo("<script> top.location.href='../?page=create_deal_buyer&status=edit&p_check=create_deal&code=$id&d_check=1'</script>");


                               }else{  // create


                                      if($buyer_contact_attention=='1'){
                                             $deal_attention="Buy";
                                      }else if($buyer_contact_attention=='2'){
                                             $deal_attention="Rent";
                                      }else if($buyer_contact_attention=='4'){
                                             $deal_attention="Extension";
                                      }

                                        if($buyer_contact_listing_code!=''){ 

                                            $sql_listing="SELECT listing.project_id , listing.ex_list_bedroom , listing.ex_list_bathroom, listing.ex_list_sqm  , listing.ex_list_deal_type , listing.ex_list_train_station , listing.ex_list_train_station , listing.ex_list_listing_type , pj.project_train_station , listing.zone_id , listing.ex_list_price , pj.project_name_en  , pj.project_train_station
                                                          FROM dbo_data_excel_listing AS listing
                                                          LEFT JOIN type_project AS pj on listing.project_id=pj.project_id
                                                          WHERE listing.ex_list_listing_code='$buyer_contact_listing_code' ";
                                            $result_listing=$conn->query($sql_listing);  
                                            $rs_listing=$result_listing->fetch_assoc();

                                            $project_id=$rs_listing['project_id'];
                                            $ex_list_train_station=$rs_listing['ex_list_train_station'];
                                            $project_train_station=$rs_listing['project_train_station'];
                                            $zone_id=$rs_listing['zone_id'];
                                            $project_name_en=$rs_listing['project_name_en']; 

                                            if($ex_list_train_station!='0'){

                                                  $station_id=$project_train_station;
                                            }

                                            if($create_deal_title==''){
                                                   $create_deal_title=$buyer_contact_line."_".$project_name_en;
                                            } 

                                            $create_deal_search_from='1';

                                        }else if($project_id!=''){

                                             $sql="SELECT * FROM type_project where project_id='$project_id'  order by project_id ASC  "; 
                                             $result=$conn->query($sql);  
                                             $rs_project=$result->fetch_assoc();  

                                             $project_id=$rs_project['project_id'];
                                             $project_name_en=$rs_project['project_name_en'];

                                             $zone_id=$rs_project['zone_id'];
                                             $station_id=$rs_project['project_train_station']; 

                                             if($create_deal_title==''){
                                                       $create_deal_title=$buyer_contact_line."_".$project_name_en;
                                             }
                                             $create_deal_search_from='1';

                                        }else if($station_id!=''){

                                            $strSQL = "SELECT * FROM type_train_station where station_id='$station_id'  "; 
                                            $result=$conn->query($strSQL);                                    
                                            $rs=$result->fetch_assoc();

                                            $station_name_en=$rs['station_name_en'];
                                            $station_id=$rs['station_id'];

                                             if($create_deal_title==''){
                                                       $create_deal_title=$buyer_contact_line."_".$station_name_en;
                                             }
                                             $create_deal_search_from='2';

                                        }else if($zone_id!=''){

                                            $strSQL = "SELECT * FROM type_zone where zone_id='$zone_id'  "; 
                                            $result=$conn->query($strSQL);                                    
                                            $rs=$result->fetch_assoc();

                                            $zone_name_en=$rs['zone_name_en'];
                                            $zone_id=$rs['zone_id'];

                                             if($create_deal_title==''){
                                                       $create_deal_title=$buyer_contact_line."_".$zone_name_en;
                                             }  
                                             $create_deal_search_from='3';                                        
                                        }

                                 // dbo_create_deal


                                        ////

                                        if($request_d!=''){
 
                                               $sql_request_d= "UPDATE dbo_request_deal SET 
                                                              open_deal='1' 
                                                              WHERE id='".$request_d."'";
                                               $conn->query($sql_request_d); 

                                        }


                                     $sql_buyer="UPDATE dbo_buyer_contact SET 
                                        buyer_contact_language='".$buyer_contact_language."'             
                                        WHERE buyer_contact_code='".$buyer_contact_code."' "; 
                                    mysqli_query($conn, $sql_buyer); 

                                $sql="SELECT * FROM dbo_create_deal  order by create_deal_create   DESC ";
                                $result=$conn->query($sql);  
                                $rs=$result->fetch_assoc();

                                $create_deal_code_check=$rs['create_deal_code'];
                                $create_deal_title_check=$rs['create_deal_title']; 



                                $create_deal_code = str_replace("D-","",$create_deal_code_check,$count);

                                 if($create_deal_code<1){      $create_deal_code = '1';
                                 }else{  $create_deal_code=$create_deal_code+1;  }
                                 $code_deal= sprintf("D-%'05d",$create_deal_code); 

                                 $sql_2="INSERT INTO dbo_create_deal ( create_deal_code , buyer_contact_listing_code, create_deal_title , create_deal_attention , 
                                       buyer_contact_code , source_code , contact_code ,  user_id   , create_deal_create , project_id , zone_id , station_id , 
                                       create_deal_budget_start ,  create_deal_budget_end , create_deal_duration , create_deal_type , create_deal_bedroom , 
                                       create_deal_bathroom , create_deal_sqm_start , create_deal_sqm_end , create_deal_select_floor , create_deal_floor , 
                                       create_deal_attention_2 , create_deal_type_2 , create_deal_budget_start_2 , create_deal_budget_end_2 , project_id_2 , 
                                       zone_id_2, station_id_2 , create_deal_bedroom_2 , create_deal_bathroom_2 , create_deal_sqm_start_2 , create_deal_sqm_end_2 , 
                                       create_deal_select_floor_2 , create_deal_floor_2 , create_deal_sale , create_deal_remark , create_deal_search_from)
                                 VALUES ('$code_deal' , '$buyer_contact_listing_code' , '$create_deal_title' , '$buyer_contact_attention', 
                                     '$buyer_contact_code' , '$source_code' , '$contact_code'  , '$USER_ID'  ,'$date' , '$project_id' , '$zone_id' , '$station_id' , 
                                     '$create_deal_budget_start' , '$create_deal_budget_end' , '$create_deal_duration' , '$create_deal_type' , '$create_deal_bedroom' , 
                                     '$create_deal_bathroom' , '$create_deal_sqm_start' , '$create_deal_sqm_end'  , '$create_deal_select_floor', '$create_deal_floor' , 
                                     '$buyer_contact_attention' ,'$create_deal_type' , '$create_deal_budget_start' , '$create_deal_budget_end', '$project_id' , 
                                     '$zone_id' , '$station_id', '$create_deal_bedroom'   ,'$create_deal_bathroom' , '$create_deal_sqm_start' , '$create_deal_sqm_end' , 
                                     '$create_deal_select_floor' , '$create_deal_floor' , '$create_deal_sale' , '$create_deal_remark' , '$create_deal_search_from'  )";
                                     mysqli_query($conn, $sql_2);  


                       if(!empty($_FILES['filUpload']['tmp_name'])){ 

                          for( $i=0; $i<count( $_FILES['filUpload']['tmp_name']); $i++ ) {  

                              $image=$_FILES['filUpload']['tmp_name'][$i];
                              $image_name=$_FILES['filUpload']['name'][$i];
                              $image_size=$_FILES['filUpload']['size'][$i];
                              $image_type=$_FILES['filUpload']['type'][$i]; 


                              $image_ext=strtolower(end(explode('.',$image_name)));  

                              
                              $image_name=$code_deal."_".$image_name;

                              if($image!=''){  

                                 copy($image,"../file/chat_line/$image_name"); 
 
                                  $sql_1="INSERT INTO dbo_create_deal_img (deal_img_id  , create_deal_code, deal_img_file, deal_img_create  )
                                  VALUES ('','$code_deal', '$image_name' ,'$date' )";
                                    mysqli_query($conn, $sql_1);  
                              }

                          }
                      } 





                                 // END dbo_create_deal         
                         

                      if($create_deal_sale!=''){

                          $assign_check='1';
                         
                         // สต๊อกผู้ส่งเคส 
                          $sql_1="SELECT * FROM dbo_register where register_id='$user_id_s' ";
                          $result_1=$conn->query($sql_1);  
                          $rs_1=$result_1->fetch_assoc(); 

                          $name_stock=$rs_1['register_name'];


                          // เซลล์ที่ ส่งงานให้
                          $sql="SELECT * FROM dbo_register where register_id='$create_deal_sale'   ";
                          $result=$conn->query($sql);  
                          $rs=$result->fetch_assoc();

                          $register_notify=$rs['register_notify'];

                          if($register_notify!=''){

                              define('LINE_API',"https://notify-api.line.me/api/notify");
                              define('LINE_TOKEN',$register_notify); 

                              function notify_message($message){

                                  $queryData = array('message' => $message);
                                  $queryData = http_build_query($queryData,'','&');
                                  $headerOptions = array(
                                      'http'=>array(
                                          'method'=>'POST',
                                          'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                                                    ."Authorization: Bearer ".LINE_TOKEN."\r\n"
                                                    ."Content-Length: ".strlen($queryData)."\r\n",
                                          'content' => $queryData
                                      )
                                  );
                                  $context = stream_context_create($headerOptions);
                                  $result = file_get_contents(LINE_API,FALSE,$context);
                                  $res = json_decode($result);
                                  return $res;
                               }

                               $deal_title=$create_deal_title;


                               $deal_url="$baseUrl/link.php?p=deal_a&id=$code_deal";

                             /* --------------  */
$text_line = "
*****Assign New Case*****
รหัส Deal : ".$code_deal."
Deal Type : ".$deal_attention."
Deal Name : ".$deal_title."
Date : ".$date."  
URL : " .$deal_url;
                                  $alert_line = notify_message($text_line);  



                                $record_note="Assign"; 
                                $sql_record="INSERT INTO dbo_record (create_deal_code ,record_note , register_id ,  record_date , record_user_id  )

                                VALUES ( '$code_deal','$record_note' ,'$create_deal_sale'  , '$date' , '$USER_ID')";
                                mysqli_query($conn, $sql_record); 

                          }

                      }  // END เช็ค SALE ส่งแจ้งเตือนเซลล์


                                                     //  echo '<script type="text/javascript">alert("Record Create successfully 3");</script>';
                                 echo("<script> top.location.href='../?page=create_deal_buyer&status=edit&p_check=create_deal&code=$code_deal&d_check=1'</script>");

      



                              }

                      }


                if($p_check=='create_deal'){ //create_deal

/*
                      $create_deal_attention=$_POST['create_deal_attention'];
                      $create_deal_type=$_POST['create_deal_type'];
                      $create_deal_budget_start=$_POST['create_deal_budget_start'];
                      $create_deal_budget_end=$_POST['create_deal_budget_end'];
                      $create_deal_title=$_POST['create_deal_title'];
                      $buyer_contact_line=$_POST['buyer_contact_line'];
                      $project_id=$_POST['project_id'];
                      $zone_id=$_POST['zone_id'];
                      $station_id=$_POST['station_id'];
                      $create_deal_bedroom=$_POST['create_deal_bedroom'];
                      $create_deal_bathroom=$_POST['create_deal_bathroom']; 
                      $create_deal_sqm_start=$_POST['create_deal_sqm_start'];
                      $create_deal_sqm_end=$_POST['create_deal_sqm_end'];
                      $create_deal_select_floor=$_POST['create_deal_select_floor'];
                      $create_deal_floor=$_POST['create_deal_floor'];
                      $create_deal_rent_till=$_POST['create_deal_rent_till'];
                      $create_deal_open_room=$_POST['create_deal_open_room'];
                      $create_deal_nationality=$_POST['create_deal_nationality'];
                      $create_deal_duration=$_POST['create_deal_duration'];
                      $create_deal_pet_friendly=$_POST['create_deal_pet_friendly'];
                      $create_deal_pet_friendly_type=$_POST['create_deal_pet_friendly_type'];
                      $create_deal_search_from=$_POST['create_deal_search_from'];
                      $create_deal_sale=$_POST['create_deal_sale'];*/
                      $create_deal_remark=$_POST['create_deal_remark'];  
                      $create_deal_remark_2=$_POST['create_deal_remark_2'];  

                      $create_deal_attention_2=$_POST['create_deal_attention_2'];
                      $create_deal_type_2=$_POST['create_deal_type_2'];
                      $create_deal_budget_start_2=$_POST['create_deal_budget_start_2'];
                      $create_deal_budget_end_2=$_POST['create_deal_budget_end_2'];
                      $project_id_2=$_POST['project_id_2'];
                      $zone_id_2=$_POST['zone_id_2'];
                      $station_id_2=$_POST['station_id_2'];
                      $create_deal_bedroom_2=$_POST['create_deal_bedroom_2'];
                      $create_deal_bathroom_2=$_POST['create_deal_bathroom_2']; 
                      $create_deal_sqm_start_2=$_POST['create_deal_sqm_start_2'];
                      $create_deal_sqm_end_2=$_POST['create_deal_sqm_end_2'];
                      $create_deal_select_floor_2=$_POST['create_deal_select_floor_2'];
                      $create_deal_floor_2=$_POST['create_deal_floor_2'];
                      $create_deal_rent_till_2=$_POST['create_deal_rent_till_2'];
                      $create_deal_open_room_2=$_POST['create_deal_open_room_2'];
                      $create_deal_nationality_2=$_POST['create_deal_nationality_2'];
                      $create_deal_duration_2=$_POST['create_deal_duration_2'];
                      $create_deal_pet_friendly_2=$_POST['create_deal_pet_friendly_2'];
                      $create_deal_pet_friendly_type_2=$_POST['create_deal_pet_friendly_type_2'];
                      $create_deal_search_from_2=$_POST['create_deal_search_from_2'];
                      $create_deal_sale_2=$_POST['create_deal_sale_2'];
                      $create_deal_pet_friendly=$_POST['create_deal_pet_friendly'];
                      $create_deal_pet_friendly_type=$_POST['create_deal_pet_friendly_type'];

/*
                      $year=substr($create_deal_rent_till,6 , 4 );
                      $month=substr($create_deal_rent_till,3 , 2 );
                      $day=substr($create_deal_rent_till,0 , 2 );
                      $create_deal_rent_till=$year."-".$month."-".$day;

                      $year=substr($create_deal_open_room,6 , 4 );
                      $month=substr($create_deal_open_room,3 , 2 );
                      $day=substr($create_deal_open_room,0 , 2 );
                      $create_deal_open_room=$year."-".$month."-".$day;

*/

                     $create_deal_budget_start_2=str_replace(",","",$create_deal_budget_start_2);
                     $create_deal_budget_end_2=str_replace(",","",$create_deal_budget_end_2);

                      $sql_project="SELECT * FROM type_project where project_id='$project_id_2'   ";
                      $result_project=$conn->query($sql_project);  
                      $rs_project=$result_project->fetch_assoc();

                      if($create_deal_attention_2=='1'){
                             $deal_attention="Buy";
                      }else if($create_deal_attention_2=='2'){
                             $deal_attention="Rent";
                      }else if($create_deal_attention_2=='4'){
                             $deal_attention="Extension";
                      }


                      if($create_deal_title==''){ 
                            
                          if($project_id!=''){

                              $create_deal_title=$buyer_contact_line."_".$rs_project['project_name_en']; 

                          }else if($station_id!=''){

                              $sql_station="SELECT * FROM type_train_station where station_id='$station_id'   ";
                              $result_station=$conn->query($sql_station);  
                              $rs_station=$result_station->fetch_assoc();

                              $create_deal_title=$buyer_contact_line."_".$rs_station['tr_group']."-".$rs_station['station_name_en']; 

                          }else if($zone_id!=''){

                              $sql_zone="SELECT * FROM type_zone where zone_id='$zone_id'   ";
                              $result_zone=$conn->query($sql_zone);  
                              $rs_zone=$result_zone->fetch_assoc();

                              $create_deal_title=$buyer_contact_line."_".$rs_zone['zone_name_en']; 

                          }
                      }

                      

                      // เช็ค SALE ส่งแจ้งเตือนเซลล์

                          $assign_check='0';

                      if($create_deal_sale_2!=$create_deal_sale){

                          $assign_check='1';
                         
                         // สต๊อกผู้ส่งเคส 
                          $sql_1="SELECT * FROM dbo_register where register_id='$user_id_s' ";
                          $result_1=$conn->query($sql_1);  
                          $rs_1=$result_1->fetch_assoc(); 

                          $name_stock=$rs_1['register_name'];


                          // เซลล์ที่ ส่งงานให้
                          $sql="SELECT * FROM dbo_register where register_id='$create_deal_sale'   ";
                          $result=$conn->query($sql);  
                          $rs=$result->fetch_assoc();

                          $register_notify=$rs['register_notify'];

                          if($register_notify!=''){

                              define('LINE_API',"https://notify-api.line.me/api/notify");
                              define('LINE_TOKEN',$register_notify); 

                              function notify_message($message){

                                  $queryData = array('message' => $message);
                                  $queryData = http_build_query($queryData,'','&');
                                  $headerOptions = array(
                                      'http'=>array(
                                          'method'=>'POST',
                                          'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                                                    ."Authorization: Bearer ".LINE_TOKEN."\r\n"
                                                    ."Content-Length: ".strlen($queryData)."\r\n",
                                          'content' => $queryData
                                      )
                                  );
                                  $context = stream_context_create($headerOptions);
                                  $result = file_get_contents(LINE_API,FALSE,$context);
                                  $res = json_decode($result);
                                  return $res;
                               }

                               $deal_title=$create_deal_title;


                               $deal_url="$baseUrl/link.php?p=deal_a&id=$id";

                             /* --------------  */
$text_line = "
*****Assign New Case*****
รหัส Deal : ".$id."
Deal Type : ".$deal_attention."
Deal Name : ".$deal_title."
Date : ".$date."  
URL : " .$deal_url;
                                  $alert_line = notify_message($text_line);  



                                $record_note="Assign"; 
                                $sql_record="INSERT INTO dbo_record (create_deal_code ,record_note , register_id ,  record_date , record_user_id  )

                                VALUES ( '$id','$record_note' ,'$create_deal_sale'  , '$date' , '$USER_ID')";
                                mysqli_query($conn, $sql_record); 

                          }

                      }  // END เช็ค SALE ส่งแจ้งเตือนเซลล์

                    /*
                    echo $create_deal_remark."  -  ".strlen($create_deal_remark)."<br>";

                    echo $create_deal_remark_2."  -  ".strlen($create_deal_remark_2)."<br>";

 */

   
                      if($edit=="edit"){

                          if($create_deal_sale==''){
                               $create_deal_sale=$create_deal_sale_2;
                          } 

                           $sql="UPDATE dbo_create_deal SET 
                                create_deal_attention_2='".$create_deal_attention_2."',
                                create_deal_type_2='".$create_deal_type_2."',
                                create_deal_title='".$create_deal_title."',
                                create_deal_budget_start_2='".$create_deal_budget_start_2."',
                                create_deal_budget_end_2='".$create_deal_budget_end_2."',
                                project_id_2='".$project_id_2."',
                                zone_id_2='".$zone_id_2."',
                                station_id_2='".$station_id_2."',
                                create_deal_bedroom_2='".$create_deal_bedroom_2."',
                                create_deal_bathroom_2='".$create_deal_bathroom_2."',
                                create_deal_sqm_start_2='".$create_deal_sqm_start_2."',
                                create_deal_sqm_end_2='".$create_deal_sqm_end_2."',
                                create_deal_select_floor_2='".$create_deal_select_floor_2."',
                                create_deal_floor_2='".$create_deal_floor_2."', 
                                create_deal_search_from='".$create_deal_search_from."',
                                create_deal_remark='".$create_deal_remark."',
                                create_deal_pet_friendly='".$create_deal_pet_friendly."',
                                create_deal_pet_friendly_type='".$create_deal_pet_friendly_type."',
                                create_deal_update='".$date."'                                 
                                WHERE create_deal_code='".$id."' "; 
                            mysqli_query($conn, $sql);  


                       if(!empty($_FILES['filUpload']['tmp_name'])){ 

                          for( $i=0; $i<count( $_FILES['filUpload']['tmp_name']); $i++ ) {  

                              $image=$_FILES['filUpload']['tmp_name'][$i];
                              $image_name=$_FILES['filUpload']['name'][$i];
                              $image_size=$_FILES['filUpload']['size'][$i];
                              $image_type=$_FILES['filUpload']['type'][$i]; 


                              $image_ext=strtolower(end(explode('.',$image_name)));  

                              
                              $image_name=$id."_".$image_name;

                              if($image!=''){  

                                 copy($image,"../file/chat_line/$image_name"); 
 
                                  $sql_1="INSERT INTO dbo_create_deal_img (deal_img_id  , create_deal_code, deal_img_file, deal_img_create  )
                                  VALUES ('','$id', '$image_name' ,'$date' )";
                                    mysqli_query($conn, $sql_1);  
                              }

                          }
                      } 

 
                      // เช็ค Requirement ส่งแจ้งเตือน สต๊อก
                      if($create_deal_remark!=$create_deal_remark_2 ){
 

                               $deal_title=$create_deal_title; 

                               $deal_url="$baseUrl/link.php?deal_r=$id";

                             /* --------------  */
$text_line = "
*****Requirement*****
รหัส Deal : ".$id."
Deal Type : ".$deal_attention."
Deal Name : ".$deal_title."
Requirement : 
".$create_deal_remark." 

ผู้แจ้ง : ".$_SESSION['NAME_ID']." 
Date : ".$date." 
URL : " .$deal_url;
                                    
 


                              $key_notify="gDu9pGPRVjQ4MmK1fDdUL95DxdQLUiz0CAJBY1WtT53"; 
                              //$key_notify="sc7I0MXhKWbai7p6WgtUHxx7tepSDBHRHM1gW22Mpvs";   //ทดสอบ
                          


                            ini_set('display_errors', 1);
                            ini_set('display_startup_errors', 1);
                            error_reporting(E_ALL);
                            date_default_timezone_set("Asia/Bangkok");

                            $sToken = $key_notify;
                            $sMessage = $text_line;

                            
                            $chOne = curl_init(); 
                            curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
                            curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
                            curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
                            curl_setopt( $chOne, CURLOPT_POST, 1); 
                            curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
                            $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
                            curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
                            curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
                            $result = curl_exec( $chOne ); 

                            //Result error 
                            if(curl_error($chOne)) 
                            { 
                              echo 'error:' . curl_error($chOne); 
                            } 
                            else { 
                              $result_ = json_decode($result, true); 
                              echo "status : ".$result_['status']; echo "message : ". $result_['message'];
                            } 
                            curl_close( $chOne );   
                          
                       

                           $sql_re="UPDATE dbo_create_deal SET  
                                deal_date_remark='".$date."'                                 
                                WHERE create_deal_code='".$id."' and deal_date_remark='0000-00-00 00:00:00' "; 
                            mysqli_query($conn, $sql_re);  

                          $record_note="Requirement"; 
                          $sql_record="INSERT INTO dbo_record (create_deal_code ,record_note , record_remark ,  record_date , record_user_id  )

                          VALUES ( '$id','$record_note' , '$create_deal_remark'   , '$date' , '$USER_ID')";
                          mysqli_query($conn, $sql_record); 
                           

                      } // END เช็ค Requirement ส่งแจ้งเตือน สต๊อก


                             $record_note='Update Deal'; 
                             $sql_record_2="INSERT INTO dbo_record (create_deal_code , ex_list_deal_type , project_id , station_id , zone_id , record_note , record_date , record_user_id , record_remark)
                             VALUES ('$id' , '$create_deal_attention_2', '$project_id_2' , '$station_id_2' , '$zone_id_2' , '$record_note'  , '$date' , '$USER_ID' , '1')";
                             mysqli_query($conn, $sql_record_2);   
                          
                           // echo '<script type="text/javascript">alert("Record Update successfully");</script>';
                            echo("<script> top.location.href='../?page=create_deal_buyer&status=edit&p_check=create_deal&code=$id&d_check=1'</script>"); 


                      }else{


                      }  




 



                }  // END create_deal


                if($p_check=='create_note_deal'){ //create_deal

                      $deal_note_message=$_POST['deal_note_message'];
                      
                        $sql_1="INSERT INTO dbo_subdeal_calendar (s_calendar_id  , s_calendar_note, create_deal_code, user_id, s_calendar_create  )
                        VALUES ('','$deal_note_message', '$id' , '$USER_ID','$date' )";
                          mysqli_query($conn, $sql_1);  

                        $sql_3="INSERT INTO dbo_subdeal_calendar_record (s_record_id   , create_deal_code ,  s_record_note, s_record_date ,  s_record_create , user_id , s_record_check )
                                VALUES ('', '$id' , '$deal_note_message' , '$date' ,  '$date' , '$USER_ID' ,'2' )";
                        mysqli_query($conn, $sql_3);        


                            echo '<script type="text/javascript">alert("Record Create successfully");</script>';
                            echo("<script> top.location.href='../?page=create_deal_buyer&status=edit&p_check=create_deal&code=$id&d_check=2'</script>"); 

                       // dbo_create_deal

                }


                if($p_check=='create_deal_note'){ //create_deal

                      $create_deal_note=$_POST['create_deal_note'];

                      $create_deal_note = str_replace("'","’",$create_deal_note,$count);

                           $sql="UPDATE dbo_create_deal SET 
                                create_deal_note='".$create_deal_note."',
                                create_deal_update='".$date."'                                 
                                WHERE create_deal_code='".$id."' "; 
                            mysqli_query($conn, $sql);  
                      
                        $sql_1="INSERT INTO dbo_subdeal_calendar (s_calendar_id  , s_calendar_note, create_deal_code, user_id, s_calendar_create , s_calendar_status  )
                        VALUES ('','$create_deal_note', '$id' , '$USER_ID','$date' , '11' )";
                          mysqli_query($conn, $sql_1);  

                        $sql_3="INSERT INTO dbo_subdeal_calendar_record (s_record_id   , create_deal_code ,  s_record_note, s_record_date ,  s_record_create , user_id , s_record_check , s_record_status)
                                VALUES ('', '$id' , '$create_deal_note' , '$date' ,  '$date' , '$USER_ID' ,'2' , '11' )";
                        mysqli_query($conn, $sql_3);        
              
            
                            echo '<script type="text/javascript">alert("Record Create successfully");</script>';
                            echo("<script> top.location.href='../?page=create_deal_buyer&status=edit&p_check=create_deal&code=$id&d_check=4'</script>"); 

                       // dbo_create_deal

                }

       }//END create_deal_buyer

///////////////////////////////     END create_deal_buyer      ////////////////////////////////////



///////////////////////////////     create_deal      ////////////////////////////////////

       if($page=='create_deal'){   //create_deal

          $contact_deal_cancel_status=$_POST['contact_deal_cancel_status'];
          $contact_deal_cancel_remark=$_POST['contact_deal_cancel_remark'];
          $code=$_POST['code'];

          if($p_check=='cancel_deal'){ //create_deal

                        $sql="UPDATE dbo_create_deal SET 
                                contact_deal_cancel_status='".$contact_deal_cancel_status."', 
                                contact_deal_cancel_remark='".$contact_deal_cancel_remark."',           
                                contact_deal_win='9',                     
                                create_deal_update='".$date."'                                 
                                WHERE create_deal_code='".$code."' "; 
                            mysqli_query($conn, $sql);   
                        

                          echo '<script type="text/javascript">alert("Record Create successfully");</script>';
                          echo("<script> top.location.href='../?page=create_deal_buyer&status=edit&p_check=create_deal&code=$code&d_check=4'</script>"); 

          }
       }

///////////////////////////////     END create_deal      ////////////////////////////////////


///////////////////////////////     SUB DEAL       ////////////////////////////////////

       if($page=='create_subdeal'){   //create_subdeal

         
          $s_calendar_status=$_POST['s_calendar_status'];
          $s_calendar_note=$_POST['s_calendar_note'];
          $s_calendar_date=$_POST['s_calendar_date'];
          $s_calendar_title_status=$_POST['s_calendar_title_status'];
          $s_calendar_time_start=$_POST['s_calendar_time_start'];
          $s_calendar_time_end=$_POST['s_calendar_time_end'];
          $listing_code=$_POST['listing_code'];
          $code=$_POST['code'];
          $s_calendar_file=$_POST['s_calendar_file'];
          $s_calendar_chance=$_POST['s_calendar_chance'];
 

          $year=substr($s_calendar_date,6 , 4 );
          $month=substr($s_calendar_date,3 , 2 );
          $day=substr($s_calendar_date,0 , 2 );

          $s_calendar_date=$year."-".$month."-".$day;



          if($p_check=='calendar'){ //create_deal



               if($edit=="edit"){

               }else{ 
                        
                        $sql_1="INSERT INTO dbo_subdeal_calendar (s_calendar_id , s_calendar_status, s_calendar_note , create_deal_code, s_calendar_date , s_calendar_time_start , s_calendar_time_end ,ex_list_listing_code,  s_calendar_create , user_id  )
                          VALUES ('', '$s_calendar_status' , '$s_calendar_note' , '$code' , '$s_calendar_date' , '$s_calendar_time_start' , '$s_calendar_time_end' , '$listing_code'  , '$date' , '$USER_ID' )";
                        mysqli_query($conn, $sql_1);  


                        $sql_3="INSERT INTO dbo_subdeal_calendar_record (s_record_id   , create_deal_code , subdeal_code , ex_list_listing_code , s_record_status ,  s_record_note, s_record_date  , s_record_time_start , s_record_time_end ,  s_record_create , user_id , s_record_check )
                                VALUES ('', '$code' , '$id' , '$listing_code' ,'10' , '$s_calendar_note' , '$s_calendar_date' , '$s_calendar_time_start' , '$s_calendar_time_end' ,  '$date' , '$USER_ID' ,'3' )";
                        mysqli_query($conn, $sql_3);      

                          echo '<script type="text/javascript">alert("Record Create successfully");</script>';
                          echo("<script> top.location.href='../?page=create_deal_buyer&status=edit&p_check=create_deal&code=&d_check=4'</script>"); 
                          // create_subdeal

               }

          }


          if($p_check=='0'){ //create_deal กิจกรรมอื่นๆ


              if($edit=="edit"){

                      


              }else{ 

                        $sql_1="INSERT INTO dbo_subdeal_calendar (s_calendar_id , s_calendar_title_status , s_calendar_status, s_calendar_note , create_deal_code , s_calendar_date , s_calendar_time_start , s_calendar_time_end , ex_list_listing_code , s_calendar_create , user_id  )
                          VALUES ('', '$s_calendar_title_status' , '$p_check' , '$s_calendar_note' , '$code' , '$s_calendar_date'  , '$s_calendar_time_start', '$s_calendar_time_end' , '$listing_code'  , '$date' , '$USER_ID' )";
                        mysqli_query($conn, $sql_1);  

                        $sql_3="INSERT INTO dbo_subdeal_calendar_record (s_record_id   , create_deal_code , subdeal_code , ex_list_listing_code , s_record_status , s_record_title_status ,  s_record_note, s_record_date  , s_record_time_start , s_record_time_end ,  s_record_create , user_id , s_record_check )
                                VALUES ('', '$code' , '$id' , '$listing_code' ,'$p_check' , '$s_calendar_title_status'  , '$s_calendar_note' , '$s_calendar_date' , '$s_calendar_time_start' , '$s_calendar_time_end' ,  '$date' , '$USER_ID' ,'3' )";
                        mysqli_query($conn, $sql_3);      


                          echo '<script type="text/javascript">alert("Record Create successfully");</script>';
                          echo("<script> top.location.href='../?page=create_deal_buyer&status=edit&p_check=create_deal&code=$code&d_check=4'</script>"); 
                          // create_subdeal  

              }


          }


          if($p_check=='1'){ //create_deal

              $time_s=date("H:i");
              $time_e = date('H:i', strtotime('+60 minutes', strtotime($date)));


              if($edit=="edit"){
 


                        $sql2="UPDATE dbo_subdeal_calendar SET                    
                                s_calendar_note='".$s_calendar_note."'                               
                                WHERE subdeal_code='".$id."' and s_calendar_status='".$p_check."' "; 
                            mysqli_query($conn, $sql2);  

                        $sql_3="INSERT INTO dbo_subdeal_calendar_record (s_record_id  , s_record_status, subdeal_code , create_deal_code ,  s_record_note, s_record_date , s_record_time_start , s_record_time_end , ex_list_listing_code ,  s_record_create , user_id , s_record_check )
                                VALUES ('', '1' , '$id', '$code' , '$s_calendar_note' , '$date' , '$time_s' , '$time_e'  , '$listing_code' , '$date' , '$USER_ID' ,'1' )";
                        mysqli_query($conn, $sql_3);  
  
                          echo '<script type="text/javascript">alert("Record Update successfully");</script>';
                          echo("<script> top.location.href='../?page=create_deal_buyer&status=edit&p_check=create_deal&code=$code&d_check=4'</script>"); 

              }else if($edit=="re_close"){



                        $sql_subdeal="UPDATE dbo_subdeal SET 
                                subdeal_status='".$p_check."',                               
                                subdeal_update_date='".$date."'                                 
                                WHERE subdeal_code='".$id."' "; 
                            mysqli_query($conn, $sql_subdeal);  


                        $sql2="UPDATE dbo_subdeal SET 
                                subdeal_status='".$p_check."',  
                                subdeal_update_date='".$date."',    
                                s_calendar_note='".$s_calendar_note."'                               
                                WHERE subdeal_code='".$id."' and s_calendar_status='9' "; 
                            mysqli_query($conn, $sql2);  

                        $sql3="UPDATE dbo_subdeal_calendar SET 
                                s_calendar_status='".$p_check."',                     
                                s_calendar_note='".$s_calendar_note."'                               
                                WHERE subdeal_code='".$id."' and s_calendar_status='9' "; 
                            mysqli_query($conn, $sql3);  

                        $sql_3="INSERT INTO dbo_subdeal_calendar_record (s_record_id  , s_record_status, subdeal_code , create_deal_code ,  s_record_note, s_record_date , s_record_time_start , s_record_time_end , ex_list_listing_code ,  s_record_create , user_id , s_record_check )
                                VALUES ('', '1' , '$id', '$code' , '$s_calendar_note' , '$date' , '$time_s' , '$time_e'  , '$listing_code' , '$date' , '$USER_ID' ,'1' )";
                        mysqli_query($conn, $sql_3);  
  
                          echo '<script type="text/javascript">alert("Record Update successfully ddddddd");</script>';
                          echo("<script> top.location.href='../?page=create_deal_buyer&status=edit&p_check=create_deal&code=$code&d_check=4'</script>");      
 

              }else{ 

                   

              }


          }



          if($p_check=='2' or $p_check=='3' or $p_check=='4' or $p_check=='5' or $p_check=='6' or $p_check=='7' or $p_check=='8' or $p_check=='9' or $p_check=='10'){ //create_deal


              if($edit=="edit"){

                       if($s_calendar_time_end==''){
                                    $s_calendar_time_end = date('H:i', strtotime('+60 minutes', strtotime($s_calendar_time_start)));
                       }

                        $sql="UPDATE dbo_subdeal_calendar SET 
                                s_calendar_note='".$s_calendar_note."',       
                                s_calendar_date='".$s_calendar_date."',  
                                s_calendar_time_start='".$s_calendar_time_start."',                        
                                s_calendar_time_end='".$s_calendar_time_end."'                                 
                                WHERE subdeal_code='".$id."' and s_calendar_status='".$p_check."' "; 
                            mysqli_query($conn, $sql);  

                        $sql_3="INSERT INTO dbo_subdeal_calendar_record (s_record_id  , s_record_status, subdeal_code , create_deal_code ,  s_record_note, s_record_date , s_record_time_start , s_record_time_end , ex_list_listing_code ,  s_record_create , user_id , s_record_check , edit )
                                VALUES ('', '$p_check' , '$id', '$code' , '$s_calendar_note' , '$s_calendar_date' , '$s_calendar_time_start' , '$s_calendar_time_end'  , '$listing_code' , '$date' , '$USER_ID' ,'1' ,'1' )";
                        mysqli_query($conn, $sql_3);  

                          echo '<script type="text/javascript">alert("Record Update successfully");</script>';
                          echo("<script> top.location.href='../?page=create_deal_buyer&status=edit&p_check=create_deal&code=$code&d_check=4'</script>"); 


              }else{ 
 

                          $s_calendar_file=$_FILES['s_calendar_file']['tmp_name'];
                          $s_calendar_file_name=$_FILES['s_calendar_file']['name'];
                          $s_calendar_file_size=$_FILES['s_calendar_file']['size'];
                          $s_calendar_file_type=$_FILES['s_calendar_file']['type']; 
                          $s_calendar_file_name_ext=strtolower(end(explode('.',$s_calendar_file_name)));                 
                   
                       if ($s_calendar_file_name_ext=="png" or $s_calendar_file_name_ext=="jpg" or $s_calendar_file_name_ext=="jpeg" or $s_calendar_file_name_ext=="gif" or $s_calendar_file_name_ext=="jp2" or $s_calendar_file_name_ext=="webp") {       
                            
                             $images=$_FILES["s_calendar_file"]["tmp_name"];
                             $thumbail_img="file"."_".$id."_".$p_check."_".$date.".".$s_calendar_file_name_ext;                       
                             copy($s_calendar_file,"../file/create_deal/$thumbail_img");  


                       }else{
                             $thumbail_img='';
                       }

                       if($s_calendar_chance==''){  $s_calendar_chance=''; }


/*
                        $sql_1="INSERT INTO dbo_subdeal_calendar (s_calendar_id , s_calendar_status, s_calendar_note , subdeal_code, s_calendar_date , s_calendar_time_start , s_calendar_time_end , ex_list_listing_code , s_calendar_create , user_id  )
                          VALUES ('', '$p_check' , '$s_calendar_note' , '$id' , '$s_calendar_date'  , '$s_calendar_time_start', '$s_calendar_time_end' , '$listing_code'  , '$date' , '$user_id' )";
                        mysqli_query($conn, $sql_1);  */
                      
                       if($s_calendar_time_end==''){
                                    $s_calendar_time_end = date('H:i', strtotime('+60 minutes', strtotime($s_calendar_time_start)));
                       }
   

                        $sql_1="INSERT INTO dbo_subdeal_calendar (s_calendar_id , s_calendar_status, s_calendar_note ,create_deal_code  , subdeal_code, s_calendar_date, ex_list_listing_code , s_calendar_time_start , s_calendar_time_end , s_calendar_file , s_calendar_create , user_id , s_calendar_chance )
                          VALUES ('', '$p_check' , '$s_calendar_note' , '$code' , '$id' , '$s_calendar_date', '$listing_code' , '$s_calendar_time_start', '$s_calendar_time_end' , '$thumbail_img'  , '$date' , '$USER_ID' ,'$s_calendar_chance' )";
                        mysqli_query($conn, $sql_1);  

                        $sql_3="INSERT INTO dbo_subdeal_calendar_record (s_record_id  , s_record_status, subdeal_code , create_deal_code ,  s_record_note, s_record_date , s_record_time_start , s_record_time_end , s_record_file , ex_list_listing_code ,  s_record_create , user_id , s_record_check , s_record_chance )
                                VALUES ('', '$p_check' , '$id', '$code' , '$s_calendar_note' , '$s_calendar_date' , '$s_calendar_time_start' , '$s_calendar_time_end' , '$thumbail_img'  , '$listing_code' , '$date' , '$USER_ID' ,'1' ,'$s_calendar_chance'  )";
                        mysqli_query($conn, $sql_3);           


                        $sql_subdeal="UPDATE dbo_subdeal SET 
                                subdeal_status='".$p_check."',                               
                                subdeal_update_date='".$date."'                                 
                                WHERE subdeal_code='".$id."' "; 
                            mysqli_query($conn, $sql_subdeal);  

                      if($p_check=='9'){

                           $sql_subdeal_1="SELECT * FROM dbo_subdeal where create_deal_code='$code' and subdeal_status='9'  ";  
                           $result_subdeal_1=$conn->query($sql_subdeal_1);

                           $count_del=$result_subdeal_1->num_rows;

                           $sql_subdeal_2="SELECT * FROM dbo_subdeal where create_deal_code='$code'  ";  
                           $result_subdeal_2=$conn->query($sql_subdeal_2);

                           $count_all=$result_subdeal_2->num_rows;

                           if($count_del==$count_all){

                                echo '<script type="text/javascript">alert("Record Create successfully");</script>';
                                echo("<script> top.location.href='../?page=create_deal_buyer&status=edit&p_check=create_deal&code=$code&d_check=6'</script>"); 

                           }else{
                                echo '<script type="text/javascript">alert("Record Create successfully");</script>';
                                echo("<script> top.location.href='../?page=create_deal_buyer&status=edit&p_check=create_deal&code=$code&d_check=4'</script>"); 
                           }

                      }else{

                        $sql_deal="UPDATE dbo_create_deal SET 
                                contact_deal_win='".$p_check."'                                
                                WHERE create_deal_code='".$code."' "; 
                            mysqli_query($conn, $sql_deal);  

                          echo '<script type="text/javascript">alert("Record Create successfully");</script>';
                          echo("<script> top.location.href='../?page=create_deal_buyer&status=edit&p_check=create_deal&code=$code&d_check=4'</script>"); 

                       }

                          // create_subdeal  

              }


          }


          if($p_check=='3'){ //create_deal

 
/*
                          $s_calendar_file=$_FILES['s_calendar_file']['tmp_name'];
                          $s_calendar_file_name=$_FILES['s_calendar_file']['name'];
                          $s_calendar_file_size=$_FILES['s_calendar_file']['size'];
                          $s_calendar_file_type=$_FILES['s_calendar_file']['type']; 
                          $s_calendar_file_name_ext=strtolower(end(explode('.',$s_calendar_file_name)));                 
                   
                       if ($s_calendar_file_name_ext=="png" or $s_calendar_file_name_ext=="jpg" or $s_calendar_file_name_ext=="jpeg" or $s_calendar_file_name_ext=="gif" or $s_calendar_file_name_ext=="jp2" or $s_calendar_file_name_ext=="webp") {       
                            
                             $images=$_FILES["s_calendar_file"]["tmp_name"];
                             $thumbail_img="file"."_".$id."_2.".$s_calendar_file_name_ext;                       
                             copy($s_calendar_file,"../file/create_deal/$thumbail_img");  


                       }

                        $sql_1="INSERT INTO dbo_subdeal_calendar (s_calendar_id , s_calendar_status, s_calendar_note , subdeal_code, s_calendar_date, ex_list_listing_code , s_calendar_file , s_calendar_create , user_id , s_calendar_chance )
                          VALUES ('', '$p_check' , '$s_calendar_note' , '$id' , '$s_calendar_date', '$listing_code' , '$thumbail_img'  , '$date' , '$user_id' ,'$s_calendar_chance' )";
                        mysqli_query($conn, $sql_1);  


                        $sql="UPDATE dbo_subdeal SET 
                                subdeal_status='".$p_check."',                               
                                subdeal_update_date='".$date."'                                 
                                WHERE subdeal_code='".$id."' "; 
                            mysqli_query($conn, $sql);  

                          echo '<script type="text/javascript">alert("Record Create successfully");</script>';
                          echo("<script> top.location.href='../?page=create_deal_buyer&status=edit&p_check=create_deal&code=$code&d_check=4'</script>"); */
                          // create_subdeal  


          }


          if($p_check=='4'){ 

 
/*
                        $sql_1="INSERT INTO dbo_subdeal_calendar (s_calendar_id , s_calendar_status, s_calendar_note , subdeal_code, s_calendar_date, ex_list_listing_code , s_calendar_create , user_id  )
                          VALUES ('', '$p_check' , '$s_calendar_note' , '$id' , '$s_calendar_date', '$listing_code'  , '$date' , '$user_id' )";
                        mysqli_query($conn, $sql_1);  


                        $sql="UPDATE dbo_subdeal SET 
                                subdeal_status='".$p_check."',                               
                                subdeal_update_date='".$date."'                                 
                                WHERE subdeal_code='".$id."' "; 
                            mysqli_query($conn, $sql);  

                          echo '<script type="text/javascript">alert("Record Create successfully");</script>';
                          echo("<script> top.location.href='../?page=create_deal_buyer&status=edit&p_check=create_deal&code=$code&d_check=5'</script>"); */
                          // create_subdeal  


          } 

          if($p_check=='5'){ 
 
/*
                          $s_calendar_file=$_FILES['s_calendar_file']['tmp_name'];
                          $s_calendar_file_name=$_FILES['s_calendar_file']['name'];
                          $s_calendar_file_size=$_FILES['s_calendar_file']['size'];
                          $s_calendar_file_type=$_FILES['s_calendar_file']['type']; 
                          $s_calendar_file_name_ext=strtolower(end(explode('.',$s_calendar_file_name)));                 
                   
                       if ($s_calendar_file_name_ext=="png" or $s_calendar_file_name_ext=="jpg" or $s_calendar_file_name_ext=="jpeg" or $s_calendar_file_name_ext=="gif" or $s_calendar_file_name_ext=="jp2" or $s_calendar_file_name_ext=="webp") {       
                            
                             $images=$_FILES["s_calendar_file"]["tmp_name"];
                             $thumbail_img="file"."_".$id."_4.".$s_calendar_file_name_ext;                       
                             copy($s_calendar_file,"../file/create_deal/$thumbail_img");  


                       }

                        $sql_1="INSERT INTO dbo_subdeal_calendar (s_calendar_id , s_calendar_status, s_calendar_note , subdeal_code, s_calendar_date, ex_list_listing_code , s_calendar_file , s_calendar_create , user_id  )
                          VALUES ('', '$p_check' , '$s_calendar_note' , '$id' , '$s_calendar_date', '$listing_code' , '$thumbail_img'  , '$date' , '$user_id' )";
                        mysqli_query($conn, $sql_1);  


                        $sql="UPDATE dbo_subdeal SET 
                                subdeal_status='".$p_check."',                               
                                subdeal_update_date='".$date."'                                 
                                WHERE subdeal_code='".$id."' "; 
                            mysqli_query($conn, $sql);  

                          echo '<script type="text/javascript">alert("Record Create successfully");</script>';
                          echo("<script> top.location.href='../?page=create_deal_buyer&status=edit&p_check=create_deal&code=$code&d_check=4'</script>"); */
                          // create_subdeal  


          } 

          if($p_check=='6'){ //create_deal
 
/*
                          $s_calendar_file=$_FILES['s_calendar_file']['tmp_name'];
                          $s_calendar_file_name=$_FILES['s_calendar_file']['name'];
                          $s_calendar_file_size=$_FILES['s_calendar_file']['size'];
                          $s_calendar_file_type=$_FILES['s_calendar_file']['type']; 
                          $s_calendar_file_name_ext=strtolower(end(explode('.',$s_calendar_file_name)));                 
                   
                       if ($s_calendar_file_name_ext=="png" or $s_calendar_file_name_ext=="jpg" or $s_calendar_file_name_ext=="jpeg" or $s_calendar_file_name_ext=="gif" or $s_calendar_file_name_ext=="jp2" or $s_calendar_file_name_ext=="webp") {       
                            
                             $images=$_FILES["s_calendar_file"]["tmp_name"];
                             $thumbail_img="file"."_".$id."_4.".$s_calendar_file_name_ext;                       
                             copy($s_calendar_file,"../file/create_deal/$thumbail_img");  


                       }

                        $sql_1="INSERT INTO dbo_subdeal_calendar (s_calendar_id , s_calendar_status, s_calendar_note , subdeal_code, s_calendar_date, ex_list_listing_code , s_calendar_file , s_calendar_create , user_id  )
                          VALUES ('', '$p_check' , '$s_calendar_note' , '$id' , '$s_calendar_date', '$listing_code' , '$thumbail_img'  , '$date' , '$user_id' )";
                        mysqli_query($conn, $sql_1);  


                        $sql="UPDATE dbo_subdeal SET 
                                subdeal_status='".$p_check."',                               
                                subdeal_update_date='".$date."'                                 
                                WHERE subdeal_code='".$id."' "; 
                            mysqli_query($conn, $sql);  

                          echo '<script type="text/javascript">alert("Record Create successfully");</script>';
                          echo("<script> top.location.href='../?page=create_deal_buyer&status=edit&p_check=create_deal&code=$code&d_check=4'</script>");  */
                          // create_subdeal  


          } 



          if($p_check=='8'){ //create_deal  Close WON

 
/*
                        $sql_1="INSERT INTO dbo_subdeal_calendar (s_calendar_id , s_calendar_status, s_calendar_note , subdeal_code, ex_list_listing_code , s_calendar_create , user_id  )
                          VALUES ('', '$p_check' , '$s_calendar_note' , '$id' , '$listing_code'  , '$date' , '$user_id' )";
                        mysqli_query($conn, $sql_1);  


                        $sql="UPDATE dbo_subdeal SET 
                                subdeal_status='".$p_check."',                               
                                subdeal_update_date='".$date."'                                 
                                WHERE subdeal_code='".$id."' "; 
                            mysqli_query($conn, $sql);  

                   
                        $sql_deal="UPDATE dbo_create_deal SET 
                                contact_deal_win='".$p_check."'                                
                                WHERE create_deal_code='".$code."' "; 
                            mysqli_query($conn, $sql_deal);  

                          echo '<script type="text/javascript">alert("Record Create successfully");</script>';
                          echo("<script> top.location.href='../?page=create_deal_buyer&status=edit&p_check=create_deal&code=$code&d_check=4'</script>"); */
                          // create_subdeal  


          } 



          if($p_check=='9'){ //create_deal           Close Lost

 
/*
                        $sql_1="INSERT INTO dbo_subdeal_calendar (s_calendar_id , s_calendar_status, s_calendar_note , subdeal_code, ex_list_listing_code , s_calendar_create , user_id  )
                          VALUES ('', '$p_check' , '$s_calendar_note' , '$id' , '$listing_code'  , '$date' , '$user_id' )";
                        mysqli_query($conn, $sql_1);  


                        $sql="UPDATE dbo_subdeal SET 
                                subdeal_status='".$p_check."',                               
                                subdeal_update_date='".$date."'                                 
                                WHERE subdeal_code='".$id."' "; 
                            mysqli_query($conn, $sql);  

                          echo '<script type="text/javascript">alert("Record Create successfully");</script>';
                          echo("<script> top.location.href='../?page=create_deal_buyer&status=edit&p_check=create_deal&code=$code&d_check=4'</script>"); */
                          // create_subdeal  


          } 

     }

///////////////////////////////    END SUB DEAL         ////////////////////////////////////



///////////////////////////////     create_subdeal_all       ////////////////////////////////////

       if($page=='create_subdeal_all'){   //create_subdeal_all

         
          $s_calendar_status=$_POST['s_calendar_status'];
          $s_calendar_note=$_POST['s_calendar_note'];
          $s_calendar_date=$_POST['s_calendar_date'];
          $s_calendar_title_status=$_POST['s_calendar_title_status'];
          $s_calendar_time_start=$_POST['s_calendar_time_start'];
          $s_calendar_time_end=$_POST['s_calendar_time_end'];
          $listing_code=$_POST['listing_code'];
          $p_check=$_POST['p_check'];
          $code=$_POST['code'];
          $s_calendar_file=$_POST['s_calendar_file'];
          $s_calendar_chance=$_POST['s_calendar_chance'];
 
          $year=substr($s_calendar_date,6 , 4 );
          $month=substr($s_calendar_date,3 , 2 );
          $day=substr($s_calendar_date,0 , 2 );

          $s_calendar_date=$year."-".$month."-".$day;


                           // Check if any option is selected
           if(isset($_POST["id"])) {
               // Retrieving each selected option
               foreach ($_POST['id'] as $id){  $i++;

                          $s_calendar_file=$_FILES['s_calendar_file']['tmp_name'];
                          $s_calendar_file_name=$_FILES['s_calendar_file']['name'];
                          $s_calendar_file_size=$_FILES['s_calendar_file']['size'];
                          $s_calendar_file_type=$_FILES['s_calendar_file']['type']; 
                          $s_calendar_file_name_ext=strtolower(end(explode('.',$s_calendar_file_name)));                 
                   
                       if ($s_calendar_file_name_ext=="png" or $s_calendar_file_name_ext=="jpg" or $s_calendar_file_name_ext=="jpeg" or $s_calendar_file_name_ext=="gif" or $s_calendar_file_name_ext=="jp2" or $s_calendar_file_name_ext=="webp") {       
                            
                             $images=$_FILES["s_calendar_file"]["tmp_name"];
                             $thumbail_img="file"."_".$id."_".$p_check."_".$date.".".$s_calendar_file_name_ext;                       
                             copy($s_calendar_file,"../file/create_deal/$thumbail_img");  


                       }else{
                             $thumbail_img='';
                       }

                       if($s_calendar_chance==''){  $s_calendar_chance=''; }


/*
                        $sql_1="INSERT INTO dbo_subdeal_calendar (s_calendar_id , s_calendar_status, s_calendar_note , subdeal_code, s_calendar_date , s_calendar_time_start , s_calendar_time_end , ex_list_listing_code , s_calendar_create , user_id  )
                          VALUES ('', '$p_check' , '$s_calendar_note' , '$id' , '$s_calendar_date'  , '$s_calendar_time_start', '$s_calendar_time_end' , '$listing_code'  , '$date' , '$user_id' )";
                        mysqli_query($conn, $sql_1);  */
                      
                       if($s_calendar_time_end==''){
                                    $s_calendar_time_end = date('H:i', strtotime('+60 minutes', strtotime($s_calendar_time_start)));
                       }
   

                        $sql_1="INSERT INTO dbo_subdeal_calendar (s_calendar_id , s_calendar_status, s_calendar_note ,create_deal_code  , subdeal_code, s_calendar_date, ex_list_listing_code , s_calendar_time_start , s_calendar_time_end , s_calendar_file , s_calendar_create , user_id , s_calendar_chance )
                          VALUES ('', '$p_check' , '$s_calendar_note' , '$code' , '$id' , '$s_calendar_date', '$listing_code' , '$s_calendar_time_start', '$s_calendar_time_end' , '$thumbail_img'  , '$date' , '$USER_ID' ,'$s_calendar_chance' )";
                        mysqli_query($conn, $sql_1);  

                        $sql_3="INSERT INTO dbo_subdeal_calendar_record (s_record_id  , s_record_status, subdeal_code , create_deal_code ,  s_record_note, s_record_date , s_record_time_start , s_record_time_end , s_record_file , ex_list_listing_code ,  s_record_create , user_id , s_record_check , s_record_chance )
                                VALUES ('', '$p_check' , '$id', '$code' , '$s_calendar_note' , '$s_calendar_date' , '$s_calendar_time_start' , '$s_calendar_time_end' , '$thumbail_img'  , '$listing_code' , '$date' , '$USER_ID' ,'1' ,'$s_calendar_chance'  )";
                        mysqli_query($conn, $sql_3);           


                        $sql_subdeal="UPDATE dbo_subdeal SET 
                                subdeal_status='".$p_check."',                               
                                subdeal_update_date='".$date."'                                 
                                WHERE subdeal_code='".$id."' "; 
                            mysqli_query($conn, $sql_subdeal);  

                      if($p_check=='9'){

                           $sql_subdeal_1="SELECT * FROM dbo_subdeal where create_deal_code='$code' and subdeal_status='9'  ";  
                           $result_subdeal_1=$conn->query($sql_subdeal_1);

                           $count_del=$result_subdeal_1->num_rows;

                           $sql_subdeal_2="SELECT * FROM dbo_subdeal where create_deal_code='$code'  ";  
                           $result_subdeal_2=$conn->query($sql_subdeal_2);

                           $count_all=$result_subdeal_2->num_rows;

                           if($count_del==$count_all){

                                echo '<script type="text/javascript">alert("Record Create successfully");</script>';
                                echo("<script> top.location.href='../?page=create_deal_buyer&status=edit&p_check=create_deal&code=$code&d_check=6'</script>"); 

                           }else{
                                echo '<script type="text/javascript">alert("Record Create successfully");</script>';
                                echo("<script> top.location.href='../?page=create_deal_buyer&status=edit&p_check=create_deal&code=$code&d_check=4'</script>"); 
                           }

                      }else{

                        $sql_deal="UPDATE dbo_create_deal SET 
                                contact_deal_win='".$p_check."'                                
                                WHERE create_deal_code='".$code."' "; 
                            mysqli_query($conn, $sql_deal);  

                          echo '<script type="text/javascript">alert("Record Create successfully");</script>';
                          echo("<script> top.location.href='../?page=create_deal_buyer&status=edit&p_check=create_deal&code=$code&d_check=4'</script>"); 

                       }

                }

          }


      }


///////////////////////////////     message_stock       ////////////////////////////////////

       if($page=='message_stock'){   //message_stock

          $message_stock_message=$_POST['message_stock_message'];
          $code=$_POST['code'];
          $create_deal_title=$_POST['create_deal_title'];


                      $sql_1="INSERT INTO dbo_deal_message_stock (message_stock_id  , user_id, message_stock_message , create_deal_code, message_stock_create )
                          VALUES ('', '$USER_ID' , '$message_stock_message' , '$code' , '$date' )";
                      mysqli_query($conn, $sql_1);  

                      $sql="SELECT * FROM dbo_deal_message_stock order by message_stock_id  DESC  ";
                      $result=$conn->query($sql);  
                      $rs=$result->fetch_assoc();

                      $message_stock_id=$rs['message_stock_id'];



                      $sql_deal="UPDATE dbo_create_deal SET 
                                message_stock_id='".$message_stock_id."'                                
                                WHERE create_deal_code='".$code."' "; 
                      mysqli_query($conn, $sql_deal);  

                          // เซลล์ที่ ส่งงานให้
                          $sql="SELECT * FROM dbo_register where register_id='$USER_ID'   ";
                          $result=$conn->query($sql);  
                          $rs=$result->fetch_assoc();

                          $register_name=$rs['register_name'];

                   

                              define('LINE_API',"https://notify-api.line.me/api/notify");
                              define('LINE_TOKEN','sqxPRfmGsx2I3KGKjApwGeu4phoeb5Uuk72AxGfCeOt'); 

                              function notify_message($message){

                                  $queryData = array('message' => $message);
                                  $queryData = http_build_query($queryData,'','&');
                                  $headerOptions = array(
                                      'http'=>array(
                                          'method'=>'POST',
                                          'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                                                    ."Authorization: Bearer ".LINE_TOKEN."\r\n"
                                                    ."Content-Length: ".strlen($queryData)."\r\n",
                                          'content' => $queryData
                                      )
                                  );
                                  $context = stream_context_create($headerOptions);
                                  $result = file_get_contents(LINE_API,FALSE,$context);
                                  $res = json_decode($result);
                                  return $res;
                               }

                               $deal_title=$create_deal_title;
                               $deal_url="$baseUrl/backend/?page=create_deal_buyer&status=edit&p_check=create_deal&code=$code&d_check=1";

                             /* --------------  */
$text_line = "
รบกวนหาห้องให้หน่อย  "."
เซลล์ : ".$_SESSION['NAME_ID']."
รหัส Deal : ".$code."
ลูกค้า : ".$create_deal_title."
วันที่ : ".$date."
โปรดเข้าไปตรวจสอบ "."  
Remark : ".$message_stock_message."
URL : " .$deal_url;
                                  $alert_line = notify_message($text_line);  
                        

                          $record_note="รบกวนหาห้องให้หน่อย"; 
                          $sql_record="INSERT INTO dbo_record (create_deal_code ,record_note , record_remark ,  record_date , record_user_id  )

                          VALUES ( '$code','$record_note' , '$message_stock_message'   , '$date' , '$USER_ID')";
                          mysqli_query($conn, $sql_record); 



                          echo '<script type="text/javascript">alert("Record Create successfully");</script>';
                          echo("<script> top.location.href='../?page=create_deal_buyer&status=edit&p_check=create_deal&code=$code&d_check=1'</script>"); 
                          // create_subdeal  

       }

///////////////////////////////    END  message_stock       ////////////////////////////////////


      if($page_get=='message_stock'){ 

           $code=$_GET['code'];

                      $sql_deal="UPDATE dbo_create_deal SET 
                                message_stock_id=''                                
                                WHERE create_deal_code='".$code."' "; 
                      mysqli_query($conn, $sql_deal);  

                          echo '<script type="text/javascript">alert("Record Create successfully");</script>';
                          echo("<script> top.location.href='../?page=create_deal_buyer&status=edit&p_check=create_deal&code=$code&d_check=1'</script>"); 

      }


///////////////////////////////    SUB DEAL       ////////////////////////////////////

       if($page=='create_subdeal_buyer'){   //create_subdeal_buyer

          $check_p=$_POST['check_p'];
          $title=$_POST['title'];
          $project=$_POST['project'];
          $deal_sale=$_POST['deal_sale'];
          $listing=$_POST['listing'];
          $title=$_POST['title'];
          $win=$_POST['win'];
          $offer=$_POST['offer'];
          $user_id_s=$_POST['user_id'];
          $code=$_POST['code'];
          $s_record_note=$_POST['s_record_note'];

          $s_record_note=str_replace("%","เปอร์เซ็น ",$s_record_note,$count);
          $s_record_note=str_replace("'"," ",$s_record_note,$count);

          $time_s=date("H:i");
          $time_e = date('H:i', strtotime('+60 minutes', strtotime($date)));
 

        
                      

                      if($win=='0'){

                        $sql_deal="UPDATE dbo_create_deal SET 
                                contact_deal_win='1'                                
                                WHERE create_deal_code='".$code."' "; 
                            mysqli_query($conn, $sql_deal); 

                      } 
                     
                     // นับ
                      $offer=$offer+1;

                      if($_SESSION['USER_ID']==$deal_sale){

                        $sql_deal="UPDATE dbo_create_deal SET 
                                sale_offer='".$offer."'                                
                                WHERE create_deal_code='".$code."' "; 
                            mysqli_query($conn, $sql_deal);

                      }else{

                        $sql_deal="UPDATE dbo_create_deal SET  
                                stock_offer='".$offer."'                                  
                                WHERE create_deal_code='".$code."' "; 
                            mysqli_query($conn, $sql_deal);
                      }

                      $sql="SELECT * FROM dbo_subdeal where create_deal_code='$code'  order by subdeal_id DESC ";
                      $result=$conn->query($sql);  
                      $rs=$result->fetch_assoc();

                      $count=$result->num_rows;
                      
                      $count=$count+1; 

                      $subdeal_listing=$rs['ex_list_listing_code'];


                if($subdeal_listing!=$listing){  //เช็คว่าไม่นำเสนอห้องซ้ำ

                      if($count=='1'){ $subdeal_color='#ffc947'; }
                      else if($count=='2'){ $subdeal_color='#ffdeb6'; }
                      else if($count=='3'){ $subdeal_color='#e6ffa2'; }
                      else if($count=='4'){ $subdeal_color='#a2ffe8'; }
                      else if($count=='5'){ $subdeal_color='#a2a2ff';  }
                      else if($count=='6'){ $subdeal_color='#f1a2ff'; }
                      else if($count=='7'){ $subdeal_color='#ffa2b4'; }
                      else if($count=='8'){ $subdeal_color='#66FF00'; }
                      else if($count=='9'){ $subdeal_color='#F4A460';}
                      else if($count=='10'){ $subdeal_color='#FFFF00'; }
                      else if($count=='11'){ $subdeal_color='#00BFFF'; }
                      else if($count=='12'){ $subdeal_color='#FF8C00'; }
                      else if($count=='13'){ $subdeal_color='#FFA500'; }
                      else if($count=='14'){ $subdeal_color='#F5F5DC'; }
                      else if($count=='15'){ $subdeal_color='#E6E6FA'; }

                      $count=$code."-".$count;     

 
                     if($deal_sale==$_SESSION['USER_ID']){
                            $check_auto_offer='1';
                     }else{
                            $check_auto_offer='0';
                     }

                      
                      $sql_1="INSERT INTO dbo_subdeal (subdeal_id  , subdeal_code, create_deal_code , ex_list_listing_code , subdeal_status, user_id, subdeal_create_date , color , check_auto_offer  )
                        VALUES ('','$count', '$code' , '$listing' , '1' , '$USER_ID', '$date' , '$subdeal_color' , '$check_auto_offer' )";
                      mysqli_query($conn, $sql_1);  

                      
                     $time_h=substr($date,11,2 ); 
 


                      $sql_2="INSERT INTO dbo_subdeal_calendar (s_calendar_id , s_calendar_status,  subdeal_code , create_deal_code, s_calendar_note , s_calendar_date , s_calendar_time_start , s_calendar_time_end , ex_list_listing_code ,  s_calendar_create , user_id  )
                              VALUES ('', '1' , '$count' , '$code' , '$s_record_note' , '$date' , '$time_s' , '$time_e'  , '$listing' , '$date' , '$USER_ID' )";
                      mysqli_query($conn, $sql_2);  

                      $sql_3="INSERT INTO dbo_subdeal_calendar_record (s_record_id  , s_record_status, subdeal_code , create_deal_code ,  s_record_note, s_record_date , s_record_time_start , s_record_time_end , ex_list_listing_code ,  s_record_create , user_id , s_record_check )
                              VALUES ('', '1' , '$count', '$code' , '$s_record_note' , '$date' , '$time_s' , '$time_e'  , '$listing' , '$date' , '$USER_ID' ,'1' )";
                      mysqli_query($conn, $sql_3); 


                      $sql_listing="SELECT * FROM dbo_data_excel_listing where ex_list_listing_code='$listing' ";
                      $result_listing=$conn->query($sql_listing);  
                      $rs_listing=$result_listing->fetch_assoc();

                      $project_id=$rs_listing['project_id'];
                      $ex_list_floor=$rs_listing['ex_list_floor'];
                      $ex_list_deal_type=$rs_listing['ex_list_deal_type'];
                      $ex_list_sqm=$rs_listing['ex_list_sqm'];
                      $ex_list_bedroom=$rs_listing['ex_list_bedroom'];
                      $ex_list_bathroom=$rs_listing['ex_list_bathroom'];
                      $ex_list_price=$rs_listing['ex_list_price'];
                      $ex_list_price=number_format($ex_list_price);
                      $ex_list_listing_name=$rs_listing['ex_list_listing_name'];
                      $ex_list_listing_name_en=$rs_listing['ex_list_listing_name_en'];

 

                    if($ex_list_deal_type=='1'){ $ex_list_deal_type="ขาย";  $ex_list_deal_type_en="For Sale"; }else{$ex_list_deal_type="เช่า"; $ex_list_deal_type_en="For Rent";}

                    if($project_id!='0'){

                       $sql_projects="SELECT * FROM type_project where project_id='$project_id' order by project_id  ASC"; 
                       $result_projects=$conn->query($sql_projects);
                       $rs_projects= $result_projects->fetch_assoc();


                       $project_name=$rs_projects['project_name'];
                       $project_name_en=$rs_projects['project_name_en'];


                       $project_name=$project_name_en;

                     }else{
                       $project_name=$ex_list_listing_name_en; 
                     }
                    

                    if($_SESSION['buyer_contact_language']=='1'){

                       if($ex_list_bedroom=='0'){ $ex_list_bedroom='สตูดิโอ';}

                       $cx_list='รหัสทรัพย์ : '.$listing;
                       $price="ราคา".$ex_list_deal_type.' : '.$ex_list_price;
                       $floor='ตั้งอยู่ชั้นที่ : '.$ex_list_floor;
                       $sqm='พื้นที่ใช้สอย (sqm) : '.$ex_list_sqm;
                       $bedroom='ห้องนอน : '.$ex_list_bedroom;
                       $bathroom='ห้องน้ำ : '.$ex_list_bathroom;
                       $url="https://connex.in.th/property/th/".$listing;

                    }else{

                       if($ex_list_bedroom=='0'){ $ex_list_bedroom='Studio';}

                       $cx_list='Listing ID : '.$listing;
                       $price=$ex_list_deal_type_en.' : '.$ex_list_price;
                       $floor='Floor :  '.$ex_list_floor;
                       $sqm='Usable area (sqm) :  '.$ex_list_sqm;
                       $bedroom='No. of Bedroom : '.$ex_list_bedroom;
                       $bathroom='No. of Bathroom : '.$ex_list_bathroom;
                       $url="https://connex.in.th/property/en/".$listing;

                    }
                       $url_detail="https://connex.in.th/link.php?owner=$listing"; 
                       $url_shot="https://connex.in.th/link.php?deal=$code";



                      // เช็ค SALE ส่งแจ้งเตือนเซลล์

                
                         
                         // สต๊อกผู้ส่งเคส 
                          $sql_1="SELECT * FROM dbo_register where register_id='$USER_ID' ";
                          $result_1=$conn->query($sql_1);  
                          $rs_1=$result_1->fetch_assoc(); 

                          $name_stock=$rs_1['register_name'];

                          // เซลล์ที่ ส่งงานให้
                          $sql="SELECT * FROM dbo_register where register_id='$deal_sale'   ";
                          $result=$conn->query($sql);  
                          $rs=$result->fetch_assoc();

                          $register_notify=$rs['register_notify'];

                          if($register_notify!=''){

                              define('LINE_API',"https://notify-api.line.me/api/notify");
                              define('LINE_TOKEN',$register_notify); 

                              function notify_message($message){

                                  $queryData = array('message' => $message);
                                  $queryData = http_build_query($queryData,'','&');
                                  $headerOptions = array(
                                      'http'=>array(
                                          'method'=>'POST',
                                          'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                                                    ."Authorization: Bearer ".LINE_TOKEN."\r\n"
                                                    ."Content-Length: ".strlen($queryData)."\r\n",
                                          'content' => $queryData
                                      )
                                  );
                                  $context = stream_context_create($headerOptions);
                                  $result = file_get_contents(LINE_API,FALSE,$context);
                                  $res = json_decode($result);
                                  return $res;
                               }

                               $deal_title=$create_deal_title;
                               $deal_url="https://connex.in.th/backend/?page=create_deal_buyer&status=edit&p_check=create_deal&code=$id&d_check=1";

                             /* --------------  */
$text_line = "
*****นำเสนอห้อง*****
Deal Name : ".$title."
รหัส Deal : ".$code."
ผู้นำเสนอ : ".$_SESSION['NAME_ID']."
เวลา : ".$date."

Deal Activity : ".$url_shot."
_________________________
Owner Detail : ".$url_detail."
Remark : ".$s_record_note."
_________________________

".$project_name."

".$cx_list."

".$price."

".$floor."
".$sqm."
".$bedroom."
".$bathroom."

" .$url;
                                  $alert_line = notify_message($text_line);  
                           
                  }





                        echo '<script type="text/javascript">alert("Record Update successfully");</script>';
                        echo("<script> top.location.href='../page/listing_deal_buyer.php?code=$code&project=$project&check_p=$check_p&d_check=1&page_no=$page_no'</script>");


           }else {  // END เช็คว่าไม่นำเสนอห้องซ้ำ 


                        echo '<script type="text/javascript">alert("ห้องนี้ถูกนำเสนอไปแล้ว");</script>';
                        echo("<script> top.location.href='../page/listing_deal_buyer.php?code=$code&project=$project&check_p=$check_p&d_check=1&page_no=$page_no'</script>");
           }

                        /* echo "<script>window.close();</script>";
*/


                        // dbo_create_deal
     

       }

///////////////////////////////    END GET SUB DEAL         ////////////////////////////////////




       if($page=='view_create_subdeal'){   //view_create_subdeal  สร้างซับดีล ผ่าน upload_file_excel_check_view

          $listing=$_POST['listing'];   
          $s_record_note=$_POST['s_record_note'];   
          $code=$_POST['code'];
          $lang=$_POST['lang'];

          $i=0;

          $s_record_note=str_replace("%","เปอร์เซ็น ",$s_record_note,$count);
          $s_record_note=str_replace("'"," ",$s_record_note,$count);


                           // Check if any option is selected
           if(isset($_POST["code"])) {
               // Retrieving each selected option
               foreach ($_POST['code'] as $code){  $i++;




                      $sql_deal="SELECT * FROM dbo_create_deal where create_deal_code='$code'  ";
                      $result_deal=$conn->query($sql_deal);  
                      $rs_deal=$result_deal->fetch_assoc();

                      $win=$rs_deal['contact_deal_win'];
                      $stock_offer=$rs_deal['stock_offer'];
                      $sale_offer=$rs_deal['sale_offer'];
                      $title=$rs_deal['create_deal_title'];
                      $deal_sale=$rs_deal['create_deal_sale'];

                      if($win=='0'){

                        $sql_deal="UPDATE dbo_create_deal SET 
                                contact_deal_win='1'                                
                                WHERE create_deal_code='".$code."' "; 
                            mysqli_query($conn, $sql_deal); 

                      }
                  
 

                      if($_SESSION['USER_ID']==$deal_sale){
 
                           // นับ
                         $offer=$sale_offer+1;

                          $sql_deal="UPDATE dbo_create_deal SET 
                                sale_offer='".$offer."'                                
                                WHERE create_deal_code='".$code."' "; 
                            mysqli_query($conn, $sql_deal);

                      }else{

                           // นับ
                         $offer=$stock_offer+1;

                          $sql_deal="UPDATE dbo_create_deal SET  
                                stock_offer='".$offer."'                                  
                                WHERE create_deal_code='".$code."' "; 
                            mysqli_query($conn, $sql_deal);
                      }



                      $sql="SELECT * FROM dbo_subdeal where create_deal_code='$code' order by subdeal_id DESC ";
                      $result=$conn->query($sql);  
                      $rs=$result->fetch_assoc();

                      $count=$result->num_rows;
                      
                      $count=$count+1; 

                      $subdeal_listing=$rs['ex_list_listing_code'];


                if($subdeal_listing!=$listing){  //เช็คว่าไม่นำเสนอห้องซ้ำ


                      if($count=='1'){ $subdeal_color='#ffc947'; }
                      else if($count=='2'){ $subdeal_color='#ffdeb6'; }
                      else if($count=='3'){ $subdeal_color='#e6ffa2'; }
                      else if($count=='4'){ $subdeal_color='#a2ffe8'; }
                      else if($count=='5'){ $subdeal_color='#a2a2ff';  }
                      else if($count=='6'){ $subdeal_color='#f1a2ff'; }
                      else if($count=='7'){ $subdeal_color='#ffa2b4'; }
                      else if($count=='8'){ $subdeal_color='#66FF00'; }
                      else if($count=='9'){ $subdeal_color='#F4A460';}
                      else if($count=='10'){ $subdeal_color='#FFFF00'; }
                      else if($count=='11'){ $subdeal_color='#00BFFF'; }
                      else if($count=='12'){ $subdeal_color='#FF8C00'; }
                      else if($count=='13'){ $subdeal_color='#FFA500'; }
                      else if($count=='14'){ $subdeal_color='#F5F5DC'; }
                      else if($count=='15'){ $subdeal_color='#E6E6FA'; }


                      $count=$code."-".$count;     

                      $time_s=date("H:i");
                      $time_e = date('H:i', strtotime('+60 minutes', strtotime($date)));

                     if($deal_sale==$_SESSION['USER_ID']){
                            $check_auto_offer='1';
                     }else{
                            $check_auto_offer='0';
                     }

                
                      $sql_1="INSERT INTO dbo_subdeal (subdeal_id  , subdeal_code, create_deal_code , ex_list_listing_code , subdeal_status, user_id, subdeal_create_date , color , check_auto_offer   )
                        VALUES ('','$count', '$code' , '$listing' , '1' , '$USER_ID', '$date' , '$subdeal_color' ,'$check_auto_offer' )";
                      mysqli_query($conn, $sql_1);  

                   
 
                      $sql_2="INSERT INTO dbo_subdeal_calendar (s_calendar_id , s_calendar_status,  subdeal_code , create_deal_code, s_calendar_date , s_calendar_time_start , s_calendar_time_end , ex_list_listing_code , s_calendar_note ,  s_calendar_create , user_id  )
                              VALUES ('', '1' , '$count' , '$code'  , '$date' , '$time_s' , '$time_e'  , '$listing' , '$s_record_note' , '$date' , '$USER_ID' )";
                      mysqli_query($conn, $sql_2);  

 
                       $sql_3="INSERT INTO dbo_subdeal_calendar_record (s_record_id  , s_record_status, subdeal_code , create_deal_code , s_record_date , s_record_time_start , s_record_time_end , ex_list_listing_code ,  s_record_note , s_record_create , user_id , s_record_check )
                              VALUES ('', '1' , '$count', '$code' , '$date' , '$time_s' , '$time_e'  , '$listing' , '$s_record_note'  , '$date' , '$USER_ID' ,'1' )";
                      mysqli_query($conn, $sql_3);  




                     $sql_listing="SELECT * FROM dbo_data_excel_listing where ex_list_listing_code='$listing' ";
                      $result_listing=$conn->query($sql_listing);  
                      $rs_listing=$result_listing->fetch_assoc();

                            $project_id=$rs_listing['project_id'];
                            $ex_list_floor=$rs_listing['ex_list_floor'];
                            $ex_list_deal_type=$rs_listing['ex_list_deal_type'];
                            $ex_list_sqm=$rs_listing['ex_list_sqm'];
                            $ex_list_bedroom=$rs_listing['ex_list_bedroom'];
                            $ex_list_bathroom=$rs_listing['ex_list_bathroom'];
                            $ex_list_price=$rs_listing['ex_list_price'];
                            $ex_list_price=number_format($ex_list_price);
                            $ex_list_listing_name=$rs_listing['ex_list_listing_name'];
                            $ex_list_listing_name_en=$rs_listing['ex_list_listing_name_en'];

                          if($ex_list_deal_type=='1'){ $ex_list_deal_type="ขาย";  $ex_list_deal_type_en="For Sale"; }else{$ex_list_deal_type="เช่า"; $ex_list_deal_type_en="For Rent";}

                          if($project_id!='0'){

                             $sql_projects="SELECT * FROM type_project where project_id='$project_id' order by project_id  ASC"; 
                             $result_projects=$conn->query($sql_projects);
                             $rs_projects= $result_projects->fetch_assoc();


                             $project_name=$rs_projects['project_name'];
                             $project_name_en=$rs_projects['project_name_en'];

                             $project_name=$project_name_en;
                           }else{
                             $project_name=$ex_list_listing_name_en; 
                           }

                   //ลบ NEW DEAL
                     $sql_del_new = "DELETE FROM dbo_listing_new_deal_check where ex_list_listing_code='$listing' and create_deal_code='$code' ";
                     mysqli_query($conn, $sql_del_new);

                          
                          if($lang=='1'){

                              if($ex_list_bedroom=='0'){ $ex_list_bedroom='สตูดิโอ';}
                               $cx_list='รหัสทรัพย์ : '.$listing;
                               $price="ราคา".$ex_list_deal_type.' : '.$ex_list_price;
                               $floor='ตั้งอยู่ชั้นที่ : '.$ex_list_floor;
                               $sqm='พื้นที่ใช้สอย (sqm) : '.$ex_list_sqm;
                               $bedroom='ห้องนอน : '.$ex_list_bedroom;
                               $bathroom='ห้องน้ำ : '.$ex_list_bathroom;
                               $url="https://connex.in.th/property/th/".$listing;

                          }else{

                              if($ex_list_bedroom=='0'){ $ex_list_bedroom='Studio';}
                               $cx_list='Listing ID : '.$listing;
                               $price=$ex_list_deal_type_en.' : '.$ex_list_price;
                               $floor='Floor :  '.$ex_list_floor;
                               $sqm='Usable area (sqm) :  '.$ex_list_sqm;
                               $bedroom='No. of Bedroom : '.$ex_list_bedroom;
                               $bathroom='No. of Bathroom : '.$ex_list_bathroom;
                               $url="https://connex.in.th/property/en/".$listing;

                          }


                             $url_detail="https://connex.in.th/link.php?owner=$listing"; 
                             $url_shot="https://connex.in.th/link.php?deal=$code";
                               
                               // สต๊อกผู้ส่งเคส 

                          /*
                                $sql_1="SELECT * FROM dbo_register where register_id='$USER_ID' ";
                                $result_1=$conn->query($sql_1);  
                                $rs_1=$result_1->fetch_assoc(); 

                                $name_stock=$rs_1['register_name']; */

                                // เซลล์ที่ ส่งงานให้
                                $sql="SELECT * FROM dbo_register where register_id='$deal_sale'   ";
                                $result=$conn->query($sql);  
                                $rs=$result->fetch_assoc();    

                                $register_notify=$rs['register_notify'];  
 

                             /* --------------  */
                    

$text_line= "
*****นำเสนอห้อง*****
Deal Name : ".$title."
รหัส Deal : ".$code."
ผู้นำเสนอ : ".$_SESSION['NAME_ID']."
เวลา : ".$date."

Deal Activity : ".$url_shot."
_________________________
Owner Detail : ".$url_detail."
Remark : ".$s_record_note."
_________________________

".$project_name."

".$cx_list."

".$price."

".$floor."
".$sqm."
".$bedroom."
".$bathroom."

" .$url;
 
 

                            ini_set('display_errors', 1);
                            ini_set('display_startup_errors', 1);
                            error_reporting(E_ALL);
                            date_default_timezone_set("Asia/Bangkok");

                            $sToken = $register_notify;
                            $sMessage = $text_line;

                            
                            $chOne = curl_init(); 
                            curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
                            curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
                            curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
                            curl_setopt( $chOne, CURLOPT_POST, 1); 
                            curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
                            $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
                            curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
                            curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
                            $result = curl_exec( $chOne ); 

                            //Result error 
                            if(curl_error($chOne)) 
                            { 
                              echo 'error:' . curl_error($chOne); 
                            } 
                            else { 
                              $result_ = json_decode($result, true); 
                              echo "status : ".$result_['status']; echo "message : ". $result_['message'];
                            } 
                            curl_close( $chOne );   

                     } //เช็คว่าไม่นำเสนอห้องซ้ำ

                     
                }


           }         


                       echo '<script type="text/javascript">alert("Record Update successfully");</script>'; 
                       /* 
                        echo("<script> top.location.href='../?page=upload_file_excel_check_view&listing=$listing'</script>");  */ 
            ?>                    
                          <script>
                           close();   // Closes the new window
                        </script>
     <?php
       }

///////////////////////////////    END POST view_create_subdeal         ////////////////////////////////////




///////////////////////////////    restore_subdeal      ////////////////////////////////////

       if($page_get=='restore_subdeal'){   //restore_subdeal   นำเสนอแจ้งผ่านไลน์อีกรอบ
  
          $code=$_GET['code'];
          $listing=$_GET['listing'];

                      $sql_deal="SELECT * FROM dbo_create_deal where create_deal_code='$code'  ";
                      $result_deal=$conn->query($sql_deal);  
                      $rs_deal=$result_deal->fetch_assoc();

                      $win=$rs_deal['contact_deal_win'];
                      $stock_offer=$rs_deal['stock_offer'];
                      $sale_offer=$rs_deal['sale_offer'];
                      $title=$rs_deal['create_deal_title'];
                      $deal_sale=$rs_deal['create_deal_sale'];


           $sql="SELECT * FROM dbo_subdeal_calendar where create_deal_code='$code' order by s_calendar_id  DESC ";
           $result=$conn->query($sql);  
           $rs=$result->fetch_assoc();
          

           $user_id=$rs['user_id'];
           $s_record_note=$rs['s_calendar_note'];
           $s_calendar_create=$rs['s_calendar_create'];


          $s_record_note=str_replace("%","เปอร์เซ็น ",$s_record_note,$count);
          $s_record_note=str_replace("'"," ",$s_record_note,$count);
 
  
                      $sql_listing="SELECT * FROM dbo_data_excel_listing where ex_list_listing_code='$listing' ";
                      $result_listing=$conn->query($sql_listing);  
                      $rs_listing=$result_listing->fetch_assoc();

                      $project_id=$rs_listing['project_id'];
                      $ex_list_floor=$rs_listing['ex_list_floor'];
                      $ex_list_deal_type=$rs_listing['ex_list_deal_type'];
                      $ex_list_sqm=$rs_listing['ex_list_sqm'];
                      $ex_list_bedroom=$rs_listing['ex_list_bedroom'];
                      $ex_list_bathroom=$rs_listing['ex_list_bathroom'];
                      $ex_list_price=$rs_listing['ex_list_price'];
                      $ex_list_price=number_format($ex_list_price);
                      $ex_list_listing_name=$rs_listing['ex_list_listing_name'];
                      $ex_list_listing_name_en=$rs_listing['ex_list_listing_name_en'];

                    if($ex_list_deal_type=='1'){ $ex_list_deal_type="ขาย";  $ex_list_deal_type_en="For Sale"; }else{$ex_list_deal_type="เช่า"; $ex_list_deal_type_en="For Rent";}

                    if($project_id!='0'){

                       $sql_projects="SELECT * FROM type_project where project_id='$project_id' order by project_id  ASC"; 
                       $result_projects=$conn->query($sql_projects);
                       $rs_projects= $result_projects->fetch_assoc();


                       $project_name=$rs_projects['project_name'];
                       $project_name_en=$rs_projects['project_name_en'];


                       $project_name=$project_name_en;

                     }else{
                       $project_name=$ex_list_listing_name_en;

                     }
                    
  /*
                    if($_SESSION['buyer_contact_language']=='1'){

                       if($ex_list_bedroom=='0'){ $ex_list_bedroom='สตูดิโอ';}

                       $cx_list='รหัสทรัพย์ : '.$listing;
                       $price="ราคา".$ex_list_deal_type.' : '.$ex_list_price;
                       $floor='ตั้งอยู่ชั้นที่ : '.$ex_list_floor;
                       $sqm='พื้นที่ใช้สอย (sqm) : '.$ex_list_sqm;
                       $bedroom='ห้องนอน : '.$ex_list_bedroom;
                       $bathroom='ห้องน้ำ : '.$ex_list_bathroom;
                       $url="https://connex.in.th/property/th/".$listing;

                    }else{
*/
                       if($ex_list_bedroom=='0'){ $ex_list_bedroom='Studio';}

                       $cx_list='Listing ID : '.$listing;
                       $price=$ex_list_deal_type_en.' : '.$ex_list_price;
                       $floor='Floor :  '.$ex_list_floor;
                       $sqm='Usable area (sqm) :  '.$ex_list_sqm;
                       $bedroom='No. of Bedroom : '.$ex_list_bedroom;
                       $bathroom='No. of Bathroom : '.$ex_list_bathroom;
                       $url="https://connex.in.th/property/en/".$listing;

           //         }
                       $url_detail="https://connex.in.th/link.php?owner=$listing"; 
                       $url_shot="https://connex.in.th/link.php?deal=$code";



                      // เช็ค SALE ส่งแจ้งเตือนเซลล์

 
                         
                         // สต๊อกผู้ส่งเคส 
                          $sql_1="SELECT * FROM dbo_register where register_id='$user_id' ";
                          $result_1=$conn->query($sql_1);  
                          $rs_1=$result_1->fetch_assoc(); 

                          $name_stock=$rs_1['register_name']." (".$rs_1['register_nickname'].")";

                          // เซลล์ที่ ส่งงานให้
                          $sql="SELECT * FROM dbo_register where register_id='$deal_sale'   ";
                          $result=$conn->query($sql);  
                          $rs=$result->fetch_assoc();

                          $register_notify=$rs['register_notify'];
                          
                         // define('LINE_TOKEN','sc7I0MXhKWbai7p6WgtUHxx7tepSDBHRHM1gW22Mpvs'); 
                          //$register_notify='sc7I0MXhKWbai7p6WgtUHxx7tepSDBHRHM1gW22Mpvs';

                          if($register_notify!=''){

                              define('LINE_API',"https://notify-api.line.me/api/notify");
                              define('LINE_TOKEN',$register_notify); 

                              function notify_message($message){

                                  $queryData = array('message' => $message);
                                  $queryData = http_build_query($queryData,'','&');
                                  $headerOptions = array(
                                      'http'=>array(
                                          'method'=>'POST',
                                          'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                                                    ."Authorization: Bearer ".LINE_TOKEN."\r\n"
                                                    ."Content-Length: ".strlen($queryData)."\r\n",
                                          'content' => $queryData
                                      )
                                  );
                                  $context = stream_context_create($headerOptions);
                                  $result = file_get_contents(LINE_API,FALSE,$context);
                                  $res = json_decode($result);
                                  return $res;
                               }

                               $deal_title=$create_deal_title;
                               $deal_url="https://connex.in.th/backend/?page=create_deal_buyer&status=edit&p_check=create_deal&code=$code&d_check=1";

                             /* --------------  */
$text_line = "
*****นำเสนอห้อง*****
Deal Name : ".$title."
รหัส Deal : ".$code."
ผู้นำเสนอ : ".$name_stock."
เวลา : ".$s_calendar_create."

Deal Activity : ".$url_shot."
_________________________
Owner Detail : ".$url_detail."
Remark : ".$s_record_note."
_________________________

".$project_name."

".$cx_list."

".$price."

".$floor."
".$sqm."
".$bedroom."
".$bathroom."

" .$url;
                                  $alert_line = notify_message($text_line);  
                           
                  }

 

                        echo '<script type="text/javascript">alert("Record Update successfully");</script>';
                        echo("<script> top.location.href='../?page=create_deal_buyer&status=edit&p_check=create_deal&code=$code&d_check=4'</script>");

 

                        /* echo "<script>window.close();</script>";
*/


                        // dbo_create_deal
     

       }

///////////////////////////////    END restore_subdeal       ////////////////////////////////////




///////////////////////////////     owner_listing_view         ////////////////////////////////////

       if($page=='owner_listing_view'){   //owner_listing_view  ส่งแจ้งสต๊อกช่วยติดต่อ  exclusive owner ผ่าน upload_file_excel_check_view

          $listing=$_POST['listing'];   
          $s_record_note=$_POST['s_record_note'];    
          $lang=$_POST['lang'];
          $create_deal_code=$_POST['create_deal_code'];
          $ex_list_deal_type=$_POST['ex_list_deal_type'];
          $ex_list_listing_status=$_POST['ex_list_listing_status'];
          $ex_list_rent_till=$_POST['ex_list_rent_till'];


                $record_note="แจ้งติดต่อห้องexclusive";
         
                $sql_1="INSERT INTO dbo_record ( ex_list_id , create_deal_code ,record_note , ex_list_listing_status , ex_list_deal_type , ex_list_rent_till, record_remark,  record_date , record_user_id  )

                 VALUES ( '$listing' , '$create_deal_code' ,'$record_note' , '$ex_list_listing_status', '$ex_list_deal_type' , '$ex_list_rent_till' , '$s_record_note' , '$date' , '$USER_ID')";
                 mysqli_query($conn, $sql_1);   

                          // เซลล์ที่ ส่งงานให้
                          $sql="SELECT * FROM dbo_register where register_id='$USER_ID'   ";
                          $result=$conn->query($sql);  
                          $rs=$result->fetch_assoc();

                          $register_name=$rs['register_name'];

                              define('LINE_API',"https://notify-api.line.me/api/notify");
                              define('LINE_TOKEN','sqxPRfmGsx2I3KGKjApwGeu4phoeb5Uuk72AxGfCeOt'); 
                              //define('LINE_TOKEN','sc7I0MXhKWbai7p6WgtUHxx7tepSDBHRHM1gW22Mpvs');  //ทดสอบ

                              function notify_message($message){

                                  $queryData = array('message' => $message);
                                  $queryData = http_build_query($queryData,'','&');
                                  $headerOptions = array(
                                      'http'=>array(
                                          'method'=>'POST',
                                          'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                                                    ."Authorization: Bearer ".LINE_TOKEN."\r\n"
                                                    ."Content-Length: ".strlen($queryData)."\r\n",
                                          'content' => $queryData
                                      )
                                  );
                                  $context = stream_context_create($headerOptions);
                                  $result = file_get_contents(LINE_API,FALSE,$context);
                                  $res = json_decode($result);
                                  return $res;
                               }

                               $deal_title=$create_deal_title;
                               $url="$baseUrl/backend/?page=upload_file_excel_check_view&listing=$listing";
                               $url_shot="https://connex.in.th/link.php?deal=$create_deal_code";

if($create_deal_code!='0'){

                             /* --------------  */
$text_line = "
รบกวนติดต่อ Exclusive Owner "."
เซลล์ : ".$_SESSION['NAME_ID']."
รหัส Deal : ".$create_deal_code."
Deal Activity : ".$url_shot."
_________________________
Listing ID : ".$listing."
วันที่ : ".$date."
Remark : ".$s_record_note."
URL : " .$url;

}else{

$text_line = "
รบกวนติดต่อ Exclusive Owner "."
เซลล์ : ".$_SESSION['NAME_ID']."
ไม่ระบุ Deal ที่ติดต่อ
_________________________
Listing ID : ".$listing."
วันที่ : ".$date."
Remark : ".$s_record_note."
URL : " .$url;


}
                                  $alert_line = notify_message($text_line);  
 

                         
                          echo '<script type="text/javascript">alert("ส่งข้อมูลให้ทางทีมสต๊อกเรียบร้อยครับ");</script>';
                
            ?>                    
                          <script>
                           close();   // Closes the new window
                        </script>
     <?php
     
       }

    
///////////////////////////////    END POST owner_listing_view         ////////////////////////////////////



///////////////////////////////  deal_buyer /////////////////////////////// 

       if($page=='deal_buyer'){   //deal_buyer   

          $code=$_POST['code'];
          $p_check=$_POST['p_check'];
          $workload=$_POST['workload'];
          $url_check=$_POST['url_check'];
          $contact_deal_cancel_status=$_POST['contact_deal_cancel_status'];
          $contact_deal_cancel_remark=$_POST['contact_deal_cancel_remark'];

          if($p_check=='1'){


             


                        $sql3="UPDATE dbo_create_deal SET 
                                workload='".$workload."'                                
                                WHERE create_deal_code='".$code."' "; 
                            mysqli_query($conn, $sql3);  


                  if($workload=='4'){

                        $sql_1="UPDATE dbo_create_deal SET            
                                contact_deal_win='8',                     
                                create_deal_update='".$date."'                                 
                                WHERE create_deal_code='".$code."' "; 
                            mysqli_query($conn, $sql_1);   
                  } 


                  if($workload=='5'){

                        $sql_1="UPDATE dbo_create_deal SET            
                                contact_deal_win='9',                     
                                create_deal_update='".$date."'                                 
                                WHERE create_deal_code='".$code."' "; 
                            mysqli_query($conn, $sql_1);   
                  } 
  
                  if($workload=='5' and $contact_deal_cancel_status!='0'){

                        $sql_2="UPDATE dbo_create_deal SET 
                                contact_deal_cancel_status='".$contact_deal_cancel_status."'  
                                WHERE create_deal_code='".$code."' "; 
                            mysqli_query($conn, $sql_2);   
                  } 

                  if($workload=='5' and $contact_deal_cancel_remark!='' or $workload=='4' and $contact_deal_cancel_remark!=''){

                        $sql_3="UPDATE dbo_create_deal SET   
                                contact_deal_cancel_remark='".$contact_deal_cancel_remark."'           
                                                        
                                WHERE create_deal_code='".$code."' "; 
                            mysqli_query($conn, $sql_3);   
                  }
  
                        echo '<script type="text/javascript">alert("Record Update successfully ");</script>';
                        echo("<script> top.location.href='../..$url_check'</script>");    

               
          }


       }

///////////////////////////////  END deal_buyer /////////////////////////////// 


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


  if($page_del=="ex_list_close"){

        $status_get="del";
        $page_get="create_listing_all";
        $note_del=$_POST['note_del'];
        $id_get=$_POST['id'];
        $p=$_POST['p'];
  }



  if($status_get=='del'){

      
      if($page_get=='create_listing'){       $part_1=$id_get;   $part_2=$id_get." New";     $zip_s=$id_get.".zip";
      
             // sql to delete a record
             $sql = "DELETE FROM dbo_data_excel_listing WHERE ex_list_listing_code ='".$id_get."'";


                 $sql_list_img="SELECT * FROM dbo_data_excel_listing_img where ex_list_listing_code='$id_get' order by listing_img_no ASC";
                 $result_list_img = $conn->query($sql_list_img);
                 $count_del=$result_list_img->num_rows;

                  while($rs_list_img=$result_list_img->fetch_assoc()){

                     $listing_img_folder=$rs_list_img['listing_img_folder'];
                     $listing_img_name=$rs_list_img['listing_img_name'];
                    
                       unlink ("../../images/listing/$part_1/$listing_img_name");
                       unlink ("../../images/listing/$part_2/$listing_img_name");

                       unlink ("../../images/listing/$part_1/no_watermark/$listing_img_name");
                       unlink ("../../images/listing/$part_2/no_watermark/$listing_img_name");
                       
                       unlink ("../../images/listing/$part_1/$zip_s");
                       unlink ("../../images/listing/$part_2/$zip_s");

                       unlink ("../../images/listing/$part_1/mini_w300/$listing_img_name");
                       unlink ("../../images/listing/$part_2/mini_w300/$listing_img_name");

                       unlink ("../../images/listing/$part_1/mini_w100/$listing_img_name");
                       unlink ("../../images/listing/$part_2/mini_w100/$listing_img_name");


                  }

             $sql_img = "DELETE FROM dbo_data_excel_listing_img WHERE ex_list_listing_code='".$id_get."'  ";
             $conn->query($sql_img);
 



             if ($conn->query($sql) === TRUE) {
                   echo '<script type="text/javascript">alert("Record deleted successfully");</script>';
                   echo("<script> top.location.href='../?page=upload_file_excel_check&p=$p'</script>"); 
             }else{
                   echo "Error deleting record: " . $conn->error;
             } 
      }



      if($page_get=='create_listing_all'){       $part_1=$id_get;   $part_2=$id_get." New";     $zip_s=$id_get.".zip";
       
                         

              $sql1 = "UPDATE dbo_data_excel_listing SET 
                              ex_list_public='0', 
                              ex_list_proppit='0', 
                              ex_list_boostpost='0', 
                              ex_list_propertyhub='0',
                              ex_list_propertyhub_boost='0',
                              ex_list_living='0',
                              ex_list_premium='0',
                              ex_list_close='1',
                              ex_list_close_date='$date'
                      WHERE ex_list_listing_code='".$id_get."' "; 
                  mysqli_query($conn, $sql1); 

                  $record_note="ทำการลบ Listing : ".$id_get; 

                  $sql_2="INSERT INTO dbo_record (ex_list_id,record_note , record_date , record_user_id , record_remark)

                   VALUES ('$id_get' , '$record_note' , '$date' , '$USER_ID' , '$note_del')";
                  mysqli_query($conn, $sql_2); 


             
             if ($conn->query($sql1) === TRUE) {
                   echo '<script type="text/javascript">alert("Record deleted successfully ");</script>';
                   echo("<script> top.location.href='../?page=upload_file_excel_check&p=$p'</script>"); 
             }else{
                   echo "Error deleting record: " . $conn->error;
             } 
      }



             // listing_restore ยกเลิกการลบ
      if($page_get=='create_listing_restore'){       $part_1=$id_get;   $part_2=$id_get." New";     $zip_s=$id_get.".zip";
      
            
              $sql1 = "UPDATE dbo_data_excel_listing SET 
                              ex_list_close='0' 
                      WHERE ex_list_listing_code='".$id_get."' "; 
 
             if ($conn->query($sql1) === TRUE) {
                   echo '<script type="text/javascript">alert("Record Restore successfully ");</script>';
                   echo("<script> top.location.href='../?page=upload_file_excel_check&p=delete&page_no=1'</script>"); 
             }else{
                   echo "Error deleting record: " . $conn->error;
             } 
      }

          // DEL create_type_strengths
      if($page_get=='create_type_strengths'){  


             $sql = "DELETE FROM type_strengths WHERE strengths_id ='".$id_get."'  ";
             $conn->query($sql);

             if ($conn->query($sql) === TRUE) {
                   echo '<script type="text/javascript">alert("Record deleted successfully");</script>';
                   echo("<script> top.location.href='../?page=type_strengths'</script>"); 
             }else{
                   echo "Error deleting record: " . $conn->error;
             } 


      }

          // DEL create_type_furniture
      if($page_get=='create_type_furniture'){  


             $sql = "DELETE FROM type_furniture WHERE furniture_id ='".$id_get."'  ";
             $conn->query($sql);

             if ($conn->query($sql) === TRUE) {
                   echo '<script type="text/javascript">alert("Record deleted successfully");</script>';
                   echo("<script> top.location.href='../?page=type_furniture'</script>"); 
             }else{
                   echo "Error deleting record: " . $conn->error;
             } 


      }



          // DEL create_deal_buyer_img
      if($page_get=='create_deal_buyer_img'){  

            $deal_img_file=$_GET['deal_img_file'];
            $page_img=$_GET['page_img'];
            $buyer_id=$_GET['buyer_id'];
           
             $sql = "DELETE FROM dbo_create_deal_img WHERE create_deal_code='".$id_get."' and deal_img_file='".$deal_img_file."' ";
             $conn->query($sql);

             unlink ("../file/chat_line/$deal_img_file");    


             $record_note='ลบภาพ Deal'; 
             $sql_record="INSERT INTO dbo_record (create_deal_code , record_note , record_date , record_user_id , record_remark)
             VALUES ('$id_get' , '$record_note'  , '$date' , '$USER_ID' , '1')";
                            mysqli_query($conn, $sql_record);       

            if($page_img=='1'){

                 if ($conn->query($sql) === TRUE) {
                      // echo '<script type="text/javascript">alert("Record deleted successfully");</script>';
                       echo("<script> top.location.href='../?page=create_deal_buyer&status=edit&p_check=create_buyer&buyer_id=$buyer_id&code=$id_get&step=2&sale='</script>"); 
                 }else{
                       echo "Error deleting record: " . $conn->error;
                 } 

            }else{

                 if ($conn->query($sql) === TRUE) {
                      // echo '<script type="text/javascript">alert("Record deleted successfully");</script>';
                       echo("<script> top.location.href='../?page=create_deal_buyer&status=edit&p_check=create_deal&code=$id_get&d_check=1'</script>"); 
                 }else{
                       echo "Error deleting record: " . $conn->error;
                 } 

            }







      }



          // DEL CREATE PROJECT
      if($page_get=='create_project'){       $part_1=$id_get;   $part_2=$id_get." New";     $zip_s=$id_get.".zip";
      
             // sql to delete a record

      /*
             $sql = "DELETE FROM type_project WHERE project_id ='".$id_get."'";

 
                 $sql_list_img="SELECT * FROM type_project_img where project_id='$id_get'  ";
                  $result_list_img = $conn->query($sql_list_img);  
                  while($rs_list_img=$result_list_img->fetch_assoc()){

 
                     $project_img_name=$rs_list_img['project_img_name'];
                    
                       unlink ("../../images/project/$project_img_name");  


                  } */
        

              $sql1 = "UPDATE type_project SET 
                              project_del='1' 
                      WHERE project_id='".$id_get."' "; 


        /*
             $sql_img = "DELETE FROM type_project_img WHERE project_id='".$id_get."'  ";
             $conn->query($sql_img);  */

             if ($conn->query($sql1) === TRUE) {
                   echo '<script type="text/javascript">alert("Record deleted successfully");</script>';
                   echo("<script> top.location.href='../?page=project'</script>"); 
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


      if($page_get=='upload_images_create_listing'){      $part_1=$id_get;   $part_2=$id_get." New";
                                                      
             // sql to delete a record
             $sql = "DELETE FROM dbo_data_excel_listing_img WHERE listing_img_name='".$img_get."'  and ex_list_listing_code='".$id_get."'  ";

             unlink ("../../images/listing/$part_1/$img_get");
             unlink ("../../images/listing/$part_2/$img_get");

             unlink ("../../images/listing/$part_1/no_watermark/$img_get");
             unlink ("../../images/listing/$part_2/no_watermark/$img_get");

/*
             $record_note='ลบภาพ'; 
             $sql_record="INSERT INTO dbo_record (ex_list_id,record_note , record_date , record_user_id , record_remark)
             VALUES ('$id_get' , '$record_note'  , '$date' , '$USER_ID' , '1')";
                            mysqli_query($conn, $sql_record); 
*/
                  $sql_log_listing="INSERT INTO dbo_log_listing  ( ex_list_listing_code, create_date , log_number , USER_ID , img_number , log_remark  )
                  VALUES ('$id_get' , '$date' , '1' , '$USER_ID' ,'1' , 'delimg'  )"; 
                  mysqli_query($conn, $sql_log_listing);  


             if ($conn->query($sql) === TRUE) {
                   echo '<script type="text/javascript">alert("Record deleted successfully");</script>';
                   echo("<script> top.location.href='https://connex.in.th/backend/page/upload_images_create_listing.php?id=$id_get'</script>"); 
             }else{
                   echo "Error deleting record: " . $conn->error;
             } 
      }


  }





///////////////////////////////    DEL ส่วนของระบบลบข้อมูล          ////////////////////////////////////.






 ///////////////////////////////     feed_file            ////////////////////////////////////

       if($page=='feed_file'){
 
            if($check_excel=='1'){

                  
                  echo("<script> top.location.href='$baseUrl/backend/page/create_file_proppit_xml.php?code_id=$code_id'</script>"); 

            }else if($check_excel=='2'){

                  echo("<script> top.location.href='$baseUrl/backend/page/create_file_propertyhub_json.php?code_id=$code_id'</script>"); 
                  
            }
       }




///////////////////////////////     upload_file_proppit            ////////////////////////////////////

       if($page=='upload_file_proppit'){


              move_uploaded_file($_FILES["fileCSV"]["tmp_name"],$_FILES["fileCSV"]["name"]); // Copy/Upload CSV

              $objCSV = fopen($_FILES["fileCSV"]["name"], "r");
              while (($objArr = fgetcsv($objCSV, 4000, ",")) !== FALSE) {

              $ex_list_listing_code=$objArr[0];  


                 $sql="SELECT ex_list_listing_status , ex_list_deal_type 
                       FROM dbo_data_excel_listing where ex_list_listing_code='$ex_list_listing_code'   ";
                 $result=$conn->query($sql);  
                 $rs=$result->fetch_assoc();  

                 $ex_list_listing_status=$rs['ex_list_listing_status']; 
                 $ex_list_deal_type=$rs['ex_list_deal_type']; 

                  if($ex_list_listing_status=='3' and $ex_list_deal_type=='2' or $ex_list_listing_status=='4' or $ex_list_listing_status=='5' or
                   $ex_list_listing_status=='6' or $ex_list_listing_status=='12' or $ex_list_listing_status=='13'  or $ex_list_listing_status=='14'  or $ex_list_listing_status=='15' ){
                      $date='2023-01-01 00:00:00';
                  }else{
                      $date=date("Y-m-d H:i:s");
                  }


                  $sql_1= "UPDATE dbo_data_excel_listing SET 
                                  ex_list_proppit='1',
                                  ex_list_proppit_date='".$date."'
                                  WHERE ex_list_listing_code='".$ex_list_listing_code."'";
                  $conn->query($sql_1); 
 
                  echo " CX : ".$ex_list_listing_code." วันที่ : ".$date."<br />";          

 
              }
              fclose($objCSV);
              echo '<script type="text/javascript">alert("Record Update successfully");</script>';
              echo("<script> top.location.href='$baseUrl/backend/?page=upload_file_proppit'</script>"); 
        }

///////////////////////////////    END upload_file_proppit            ////////////////////////////////////





///////////////////////////////     upload_file_propertyhub            ////////////////////////////////////

       if($page=='upload_file_propertyhub'){


              move_uploaded_file($_FILES["fileCSV"]["tmp_name"],$_FILES["fileCSV"]["name"]); // Copy/Upload CSV

              $objCSV = fopen($_FILES["fileCSV"]["name"], "r");
              while (($objArr = fgetcsv($objCSV, 4000, ",")) !== FALSE) {

              $ex_list_listing_code=$objArr[0];  
               
                 $sql="SELECT ex_list_listing_status , ex_list_deal_type 
                       FROM dbo_data_excel_listing where ex_list_listing_code='$ex_list_listing_code'   ";
                 $result=$conn->query($sql);  
                 $rs=$result->fetch_assoc();  

                 $ex_list_listing_status=$rs['ex_list_listing_status']; 
                 $ex_list_deal_type=$rs['ex_list_deal_type']; 

                  if($ex_list_listing_status=='3' and $ex_list_deal_type=='2' or $ex_list_listing_status=='4' or $ex_list_listing_status=='5' or
                   $ex_list_listing_status=='6' or $ex_list_listing_status=='12' or $ex_list_listing_status=='13'  or $ex_list_listing_status=='14'  or $ex_list_listing_status=='15' ){
                      $date='2023-01-01 00:00:00';
                  }else{
                      $date=date("Y-m-d H:i:s");  
                  }

                  $sql_1= "UPDATE dbo_data_excel_listing SET 
                                  ex_list_propertyhub='1',
                                  ex_list_propertyhub_date='".$date."'
                                  WHERE ex_list_listing_code='".$ex_list_listing_code."'";
                  $conn->query($sql_1); 
 
                  echo " CX : ".$ex_list_listing_code." วันที่ : ".$date."<br />";          

 
              }
              fclose($objCSV);
              echo '<script type="text/javascript">alert("Record Update successfully");</script>';
              echo("<script> top.location.href='$baseUrl/backend/?page=upload_file_propertyhub'</script>"); 
        }

///////////////////////////////    END upload_file_propertyhub            ////////////////////////////////////
        


///////////////////////////////     request_deal            ////////////////////////////////////

       if($page=='request_deal'){

            isset( $_POST['contact_status'] ) ? $contact_status = $_POST['contact_status'] : $contact_status = "0";
            isset( $_POST['contact_attention'] ) ? $contact_attention = $_POST['contact_attention'] : $contact_attention = "0";
            isset( $_POST['contact_name'] ) ? $contact_name = $_POST['contact_name'] : $contact_name = "";
            isset( $_POST['contact_tel'] ) ? $contact_tel = $_POST['contact_tel'] : $contact_tel = "";
            isset( $_POST['contact_tel_2'] ) ? $contact_tel_2 = $_POST['contact_tel_2'] : $contact_tel_2 = "";
            isset( $_POST['contact_tel_3'] ) ? $contact_tel_3 = $_POST['contact_tel_3'] : $contact_tel_3 = "";
            isset( $_POST['contact_tel_4'] ) ? $contact_tel_4 = $_POST['contact_tel_4'] : $contact_tel_4 = "";
            isset( $_POST['contact_email'] ) ? $contact_email = $_POST['contact_email'] : $contact_email = "";
            isset( $_POST['contact_fb'] ) ? $contact_fb = $_POST['contact_fb'] : $contact_fb = "";
            isset( $_POST['contact_line_id'] ) ? $contact_line_id = $_POST['contact_line_id'] : $contact_line_id = "";
            isset( $_POST['contact_whatsapp'] ) ? $contact_whatsapp = $_POST['contact_whatsapp'] : $contact_whatsapp = "";
            isset( $_POST['contact_wechat'] ) ? $contact_wechat = $_POST['contact_wechat'] : $contact_wechat = "";
            isset( $_POST['source_code'] ) ? $source_code = $_POST['source_code'] : $source_code = "0";
            isset( $_POST['ex_list_listing_code'] ) ? $ex_list_listing_code = $_POST['ex_list_listing_code'] : $ex_list_listing_code = ""; 
            isset( $_POST['deal_type'] ) ? $deal_type = $_POST['deal_type'] : $deal_type = "0";
            isset( $_POST['deal_duration'] ) ? $deal_duration = $_POST['deal_duration'] : $deal_duration = "0";
            isset( $_POST['deal_rent_till'] ) ? $deal_rent_till = $_POST['deal_rent_till'] : $deal_rent_till = "";
            isset( $_POST['project_id'] ) ? $project_id = $_POST['project_id'] : $project_id = "0";
            isset( $_POST['station_id'] ) ? $station_id = $_POST['station_id'] : $station_id = "0";
            isset( $_POST['zone_id'] ) ? $zone_id = $_POST['zone_id'] : $zone_id = "0";
            isset( $_POST['project_other'] ) ? $project_other = $_POST['project_other'] : $project_other = "";
            isset( $_POST['bedroom'] ) ? $bedroom = $_POST['bedroom'] : $bedroom = "0";
            isset( $_POST['budget_start'] ) ? $budget_start = $_POST['budget_start'] : $budget_start = "0";
            isset( $_POST['open_room'] ) ? $open_room = $_POST['open_room'] : $open_room = "";
            isset( $_POST['pet_friendly'] ) ? $pet_friendly = $_POST['pet_friendly'] : $pet_friendly = "0";
            isset( $_POST['remark'] ) ? $remark = $_POST['remark'] : $remark = "";
            isset( $_POST['contact_language'] ) ? $contact_language = $_POST['contact_language'] : $contact_language = "";
            isset( $_POST['check_customer'] ) ? $check_customer = $_POST['check_customer'] : $check_customer = "";
            isset( $_POST['buyer_contact_code'] ) ? $buyer_contact_code = $_POST['buyer_contact_code'] : $buyer_contact_code = "";
            isset( $_POST['create_deal_sale'] ) ? $create_deal_sale = $_POST['create_deal_sale'] : $create_deal_sale = "";
            isset( $_POST['pet_friendly_type'] ) ? $pet_friendly_type = $_POST['pet_friendly_type'] : $pet_friendly_type = "";
 
            $contact_tel=str_replace("-","",$contact_tel);
            $contact_tel_2=str_replace("-","",$contact_tel_2);
            $contact_tel_3=str_replace("-","",$contact_tel_3);
            $contact_tel_4=str_replace("-","",$contact_tel_4);

            $budget_start_check=str_replace(",","",$budget_start);

            if($edit=='edit'){ 


                      if($check_customer=='1'){  //รายชื่อลูกค้าซ้ำในระบบ 

                           

                      }else{  //รายชื่อลูกค้าไม่ซ้ำ


                              $sql="SELECT * FROM dbo_buyer_contact  order by buyer_contact_id  DESC ";
                              $result=$conn->query($sql);  
                              $rs=$result->fetch_assoc();

                              $buyer_contact_id=$rs['buyer_contact_id'];

                               $a = str_replace("C-","",$buyer_contact_id,$count);

                               if($a<1){ 
                                 $a = '1';
                               }else{
                                 $a=$a+1;
                               }

                               $buyer_contact_code = sprintf("B-%'05d",$a); 

                               $sql_1="INSERT INTO dbo_buyer_contact (buyer_contact_code , buyer_contact_name  , buyer_contact_line_id , buyer_contact_tel , buyer_contact_tel_2 , buyer_contact_tel_3 , buyer_contact_tel_4 , buyer_contact_attention , buyer_contact_status , buyer_contact_email, buyer_contact_fb , buyer_contact_whatsapp , buyer_contact_wechat  , buyer_contact_remark , user_id , buyer_contact_date_create )
                               VALUES ('$buyer_contact_code' , '$contact_name', '$contact_line_id' , '$contact_tel' , '$contact_tel_2' , '$contact_tel_3'  , '$contact_tel_4' , '$contact_attention' , '$contact_status' ,'$contact_email'  ,'$contact_fb' , '$contact_whatsapp' , '$contact_wechat' ,'$remark' , '$USER_ID' ,'$date' )";
                               mysqli_query($conn, $sql_1);  

                      }
 

                         $sql="SELECT * FROM dbo_create_deal  order by create_deal_create DESC ";
                         $result=$conn->query($sql);  
                         $rs=$result->fetch_assoc();

                         $create_deal_code=$rs['create_deal_code'];
                         $create_deal_code = str_replace("D-","",$create_deal_code,$count); 
 

                         if($create_deal_code<1){      $create_deal_code = '1';
                         }else{  $create_deal_code=$create_deal_code+1;  }
                         $code_deal= sprintf("D-%'05d",$create_deal_code); 


                        if($deal_attention=='1'){
                               $deal_attention="Buy";
                        }else if($deal_attention=='2'){
                               $deal_attention="Rent";
                        }else if($deal_attention=='4'){
                               $deal_attention="Extension";
                        }

                            if($ex_list_listing_code!='' and $project_id=='0'){ //กรณีมี CX

                                $sql_listing="SELECT project_id FROM dbo_data_excel_listing where ex_list_listing_code='$ex_list_listing_code'   ";
                                $result_listing=$conn->query($sql_listing);  
                                $rs_listing=$result_listing->fetch_assoc(); 

                                $project_id=$rs_listing['project_id'];

                                $sql_project="SELECT * FROM type_project where project_id='$project_id'   ";
                                $result_project=$conn->query($sql_project);  
                                $rs_project=$result_project->fetch_assoc();
                        
                                $create_deal_title=$contact_name."_".$rs_project['project_name_en']; 
                            }

   
                            if($project_id!=''){

                                $sql_project="SELECT * FROM type_project where project_id='$project_id'   ";
                                $result_project=$conn->query($sql_project);  
                                $rs_project=$result_project->fetch_assoc();
                        
                                $create_deal_title=$contact_name."_".$rs_project['project_name_en']; 

                            }else if($station_id!=''){

                                $sql_station="SELECT * FROM type_train_station where station_id='$station_id'   ";
                                $result_station=$conn->query($sql_station);  
                                $rs_station=$result_station->fetch_assoc();

                                $create_deal_title=$contact_name."_".$rs_station['tr_group']."-".$rs_station['station_name_en']; 

                            }else if($zone_id!=''){

                                $sql_zone="SELECT * FROM type_zone where zone_id='$zone_id'   ";
                                $result_zone=$conn->query($sql_zone);  
                                $rs_zone=$result_zone->fetch_assoc();

                                $create_deal_title=$contact_name."_".$rs_zone['zone_name_en'];  
                            }
                    /*
                           $sql_2="INSERT INTO dbo_create_deal_test ( create_deal_code , buyer_contact_listing_code, create_deal_title , create_deal_attention , buyer_contact_code , source_code , contact_code ,  user_id   , create_deal_create , project_id , zone_id , station_id , create_deal_budget_end , create_deal_type , create_deal_bedroom , create_deal_bathroom , create_deal_sqm_end , create_deal_sale )
                           VALUES ('$code_deal' , '$buyer_contact_listing_code' , '$create_deal_title' , '$buyer_contact_attention', '$buyer_contact_code' , '$source_code' , '$contact_code'  , '$USER_ID'  ,'$date' , '$project_id' , '$zone_id' , '$ex_list_train_station' , '$ex_list_price' , '$ex_list_listing_type' , '$ex_list_bedroom' , '$ex_list_bathroom' , '$ex_list_sqm' , '$create_deal_sale'  )";
                           mysqli_query($conn, $sql_2);  
 */

                          // เซลล์ที่ ส่งงานให้
                          $sql="SELECT * FROM dbo_register where register_id='$create_deal_sale'   ";
                          $result=$conn->query($sql);  
                          $rs=$result->fetch_assoc();

                          $register_notify=$rs['register_notify'];

                          if($register_notify!=''){

                              define('LINE_API',"https://notify-api.line.me/api/notify");
                              define('LINE_TOKEN',$register_notify); 

                              function notify_message($message){

                                  $queryData = array('message' => $message);
                                  $queryData = http_build_query($queryData,'','&');
                                  $headerOptions = array(
                                      'http'=>array(
                                          'method'=>'POST',
                                          'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                                                    ."Authorization: Bearer ".LINE_TOKEN."\r\n"
                                                    ."Content-Length: ".strlen($queryData)."\r\n",
                                          'content' => $queryData
                                      )
                                  );
                                  $context = stream_context_create($headerOptions);
                                  $result = file_get_contents(LINE_API,FALSE,$context);
                                  $res = json_decode($result);
                                  return $res;
                               }

                               $deal_title=$create_deal_title;


                               $deal_url="$baseUrl/link.php?p=deal_a&id=$code_deal"; 

                             /* --------------  */
$text_line = "
*****Assign New Case*****
รหัส Deal : ".$code_deal."
Deal Type : ".$deal_attention."
Deal Name : ".$deal_title."
Date : ".$date."  
URL : " .$deal_url;
                                $alert_line = notify_message($text_line);  


                               }

 
                                $record_note="Assign"; 
                                $sql_record="INSERT INTO dbo_record (create_deal_code ,record_note , register_id ,  record_date , record_user_id  )

                                VALUES ( '$code_deal','$record_note' , '$create_deal_sale' , '$date' , '$USER_ID')";
                                mysqli_query($conn, $sql_record); 

                      
                            // ดำเนินการเปิด Deal แล้ว
                            $sql_request_deal="UPDATE dbo_request_deal SET            
                                open_deal='1' "; 
                            mysqli_query($conn, $sql_request_deal);   

 

                      echo("<script> top.location.href='$baseUrl/backend/?page=create_deal_buyer&status=edit&p_check=create_deal&code=$code_deal&d_check=1'</script>"); 



            }else { // create ยื่นคำขอเปิด Deal

                      $year=substr($deal_rent_till,6 , 4 );
                      $month=substr($deal_rent_till,3 , 2 );
                      $day=substr($deal_rent_till,0 , 2 );
                      $deal_rent_till=$year."-".$month."-".$day;

                      $year=substr($open_room,6 , 4 );
                      $month=substr($open_room,3 , 2 );
                      $day=substr($open_room,0 , 2 );
                      $open_room=$year."-".$month."-".$day;


                           if($contact_tel==''){  $check_contact_tel='*'; }else { $check_contact_tel=substr($contact_tel,-6,6); }
                           if($contact_tel_2==''){  $check_contact_tel_2='*';  }else{ $check_contact_tel_2=substr($contact_tel_2,-6,6);  }
                           if($contact_tel_3==''){  $check_contact_tel_3='*'; }else{ $check_contact_tel_3=substr($contact_tel_3,-6,6);  }
                           if($contact_tel_4==''){  $check_contact_tel_4='*';  }else{ $check_contact_tel_4=substr($contact_tel_4,-6,6);  }
                           if($contact_wechat==''){  $check_contact_wechat='*';  }else{ $check_contact_wechat=$contact_wechat;}
                           if($contact_line_id==''){  $check_contact_line_id='*';  }else{ $check_contact_line_id=$contact_line_id;}
                           if($contact_whatsapp==''){  $check_contact_whatsapp='*'; }else{ $check_contact_whatsapp=substr($contact_whatsapp,-6,6);  }

                          $sql_check_buyer="SELECT * FROM dbo_buyer_contact  
                                    where buyer_contact_tel LIKE '%$check_contact_tel%'  or 
                                          buyer_contact_tel LIKE '%$check_contact_tel_2%' or
                                          buyer_contact_tel LIKE '%$check_contact_tel_3%'   or 
                                          buyer_contact_tel LIKE '%$check_contact_tel_4%'  or
                                          buyer_contact_tel_2 LIKE '%$check_contact_tel%'  or 
                                          buyer_contact_tel_2 LIKE '%$check_contact_tel_2%' or
                                          buyer_contact_tel_2 LIKE '%$check_contact_tel_3%'   or 
                                          buyer_contact_tel_2 LIKE '%$check_contact_tel_4%'  or
                                          buyer_contact_tel_3 LIKE '%$check_contact_tel%'  or 
                                          buyer_contact_tel_3 LIKE '%$check_contact_tel_2%' or
                                          buyer_contact_tel_3 LIKE '%$check_contact_tel_3%'   or 
                                          buyer_contact_tel_3 LIKE '%$check_contact_tel_4%'  or
                                          buyer_contact_tel_4 LIKE '%$check_contact_tel%'  or 
                                          buyer_contact_tel_4 LIKE '%$check_contact_tel_2%' or
                                          buyer_contact_tel_4 LIKE '%$check_contact_tel_3%'   or 
                                          buyer_contact_tel_4 LIKE '%$check_contact_tel_4%'  or
                                          buyer_contact_wechat LIKE '%$check_contact_wechat%' or 
                                          buyer_contact_line_id LIKE '%$check_contact_line_id%' or
                                          buyer_contact_whatsapp LIKE '%$check_contact_whatsapp%' 
                          ";
                          $result_check_buyer=$conn->query($sql_check_buyer);  
                          $rs_check_buyer=$result_check_buyer->fetch_assoc();    
                  
                          if($rs_check_buyer['buyer_contact_code']!=''){                                
                                $check_customer='1'; 
                                $buyer_contact_code=$rs_check_buyer['buyer_contact_code'];
                          }else{
                                $check_customer='0';  
                                $buyer_contact_code="";
                          }


                                        if($ex_list_listing_code!=''){ 

                                            $sql_listing="SELECT listing.project_id , listing.ex_list_bedroom , listing.ex_list_bathroom, listing.ex_list_sqm  , listing.ex_list_deal_type , listing.ex_list_train_station , listing.ex_list_train_station , listing.ex_list_listing_type , pj.project_train_station , listing.zone_id , listing.ex_list_price , pj.project_name_en 
                                                          FROM dbo_data_excel_listing AS listing
                                                          LEFT JOIN type_project AS pj on listing.project_id=pj.project_id
                                                          WHERE listing.ex_list_listing_code='$ex_list_listing_code' ";
                                            $result_listing=$conn->query($sql_listing);  
                                            $rs_listing=$result_listing->fetch_assoc();

                                            $project_id=$rs_listing['project_id'];
                                            $station_id=$rs_listing['ex_list_train_station'];
                                            $zone_id=$rs_listing['zone_id'];
                                            $project_train_station=$rs_listing['project_train_station'];
                                            $project_name_en=$rs_listing['project_name_en']; 
                                            $create_deal_type=$rs_listing['ex_list_listing_type'];
                                         
                                            if($station_id!=''){
                                                  $station_id=$project_train_station;
                                            }
                                            if($station_id!=''){
                                                  $station_id=$ex_list_train_station;
                                            }

                                            if($create_deal_title==''){
                                                   $create_deal_title=$contact_name."_".$project_name_en;
                                            } 

                                            $create_deal_search_from='1';

                                        }else if($project_id!=''){
                                             $sql="SELECT * FROM type_project where project_id='$project_id'  order by project_id ASC  "; 
                                             $result=$conn->query($sql);  
                                             $rs_project=$result->fetch_assoc();  

                                             $project_id=$rs_project['project_id'];
                                             $project_name_en=$rs_project['project_name_en'];
                                             $create_deal_type=$rs_project['project_type'];
                                             $zone_id=$rs_project['zone_id'];
                                             $station_id=$rs_project['project_train_station']; 

                                             if($create_deal_title==''){
                                                       $create_deal_title=$contact_name."_".$project_name_en;
                                             }
                                             $create_deal_search_from='1';

                                        }else if($station_id!=''){

                                            $strSQL = "SELECT * FROM type_train_station where station_id='$station_id'  "; 
                                            $result=$conn->query($strSQL);                                    
                                            $rs=$result->fetch_assoc();

                                            $station_name_en=$rs['station_name_en'];

                                             if($create_deal_title==''){
                                                       $create_deal_title=$contact_name."_".$station_name_en;
                                             }
                                             $create_deal_search_from='2';

                                        }else if($zone_id!=''){

                                            $strSQL = "SELECT * FROM type_zone where zone_id='$zone_id'  "; 
                                            $result=$conn->query($strSQL);                                    
                                            $rs=$result->fetch_assoc();

                                            $zone_name_en=$rs['zone_name_en'];

                                             if($create_deal_title==''){
                                                       $create_deal_title=$contact_name."_".$zone_name_en;
                                             }  
                                             $create_deal_search_from='3';                                        
                                        }
                  



                
                      $sql_1="INSERT INTO dbo_request_deal (id , contact_status, contact_attention , contact_name , contact_tel, contact_tel_2 , contact_tel_3 , contact_tel_4 , contact_email, contact_fb , contact_line_id, contact_whatsapp , contact_wechat ,source_code , ex_list_listing_code , deal_type , deal_duration , deal_rent_till, project_id , station_id , zone_id , contact_language , project_other, bedroom , budget_start, open_room, pet_friendly , pet_friendly_type , remark, check_customer , buyer_contact_code, register_id , create_date)
                        VALUES ('','$contact_status', '$contact_attention' , '$contact_name' , '$contact_tel' , '$contact_tel_2', '$contact_tel_3' , '$contact_tel_4' , '$contact_email', '$contact_fb' , '$contact_line_id'  , '$contact_whatsapp' , '$contact_wechat' , '$source_code' , '$ex_list_listing_code' , '$deal_type' , '$deal_duration' , '$deal_rent_till' , '$project_id' , '$station_id' , '$zone_id' , '$contact_language' , '$project_other' , '$bedroom' , '$budget_start_check' , '$open_room' , '$pet_friendly', '$pet_friendly_type', '$remark', '$check_customer', '$buyer_contact_code', '$USER_ID', '$date')";
                      mysqli_query($conn, $sql_1);  

 
                      $record_note="request_deal";         
                      $sql_record="INSERT INTO dbo_record ( ex_list_id,record_note,  record_date , record_user_id  )
                      VALUES ( '$id','$record_note', '$date' , '$USER_ID')";
                      mysqli_query($conn, $sql_record);   

             
                      if($pet_friendly=='0'){ $pet_friendly='ไม่'; }else{ $pet_friendly='ใช่'; }

                      if($source_code!='0'){
                           $sql_source="SELECT * FROM type_source where source_id=$source_code  "; 
                           $result_source=$conn->query($sql_source);
                           $rs_source= $result_source->fetch_assoc();  

                           $source_title=$rs_source['source_title'];
                      }

                      if($project_id!=''){

                         $sql_project="SELECT * FROM type_project where project_id=$project_id  "; 
                         $result_project=$conn->query($sql_project);
                         $rs_project= $result_project->fetch_assoc(); 

                         $project_name_en=$rs_project['project_name_en'];

                      }

                       $sql_request="SELECT * FROM dbo_request_deal order by id DESC LIMIT 1 "; 
                       $result_request=$conn->query($sql_request);
                       $rs_request= $result_request->fetch_assoc();

                       $id_re=$rs_request['id'];

                              define('LINE_API',"https://notify-api.line.me/api/notify");
                              define('LINE_TOKEN','pL4CGgJH1rxr45DHZ0uOprCuQYf2LcexHx4KGNAIHtM'); 
                              //define('LINE_TOKEN','sc7I0MXhKWbai7p6WgtUHxx7tepSDBHRHM1gW22Mpvs');  //ทดสอบ

                              function notify_message($message){

                                  $queryData = array('message' => $message);
                                  $queryData = http_build_query($queryData,'','&');
                                  $headerOptions = array(
                                      'http'=>array(
                                          'method'=>'POST',
                                          'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                                                    ."Authorization: Bearer ".LINE_TOKEN."\r\n"
                                                    ."Content-Length: ".strlen($queryData)."\r\n",
                                          'content' => $queryData
                                      )
                                  );
                                  $context = stream_context_create($headerOptions);
                                  $result = file_get_contents(LINE_API,FALSE,$context);
                                  $res = json_decode($result);
                                  return $res;
                               }

                               $deal_title=$create_deal_title; 
                               $url_shot="https://connex.in.th/backend/?page=request_deal";


$text_line = "
Requirement ขอเปิด Deal "."
เซลล์ : ".$_SESSION['NAME_ID']."
_________________________
ชื่อลูกค้า : ".$contact_name."
รหัสทรัพย์ : ".$ex_list_listing_code."
เบอร์โทร : ".$contact_tel."
Line ID : ".$contact_line_id."
ช่องทางการตลาด : ".$source_title."
ระยะเวลาเช่า : ".$deal_duration."
วันย้ายเข้า : ".$deal_rent_till."
โครงการที่สนใจ : ".$project_name_en."
โครงการอื่นๆ ที่สนใจ : ".$project_other."
จำนวนห้องนอน : ".$bedroom."
งบที่ตั้งไว้ : ".$budget_start."
วันที่สะดวกชมทรัพย์ : ".$open_room."
เลี้ยงสัตว์ : ".$id_re."
ความต้องการอื่น : ".$project_other."
วันที่ : ".$date."
Remark : ".$remark."
URL : " .$url_shot;


 
                                  $alert_line = notify_message($text_line);  


                         // echo $text_line;


             // echo '<script type="text/javascript">alert("Record Update successfully");</script>';
                echo("<script> top.location.href='$baseUrl/backend/?page=deal_buyer&page_no=1'</script>"); 

              }



        }

///////////////////////////////    END request_deal            ////////////////////////////////////



///////////////////////////////    CHECK request_deal  to create_deal          ////////////////////////////////////

      if($page_get=='request_deal'){ 

    
                if($status_get=='2'){

 
                   $sql_1= "UPDATE dbo_request_deal SET 
                                  open_deal='2' 
                                  WHERE id='".$id_get."'";
                   $conn->query($sql_1); 

                    echo("<script> top.location.href='../?page=request_deal'</script>"); 

                }
/*

     $sql="SELECT *  FROM dbo_request_deal where id='$id_get' order by create_date DESC   "; 
     $result = $conn->query($sql);
     $rs=$result->fetch_assoc();    

         $id_check=$rs['id'];         
         $contact_status=$rs['contact_status'];
         $contact_attention=$rs['contact_attention'];
         $contact_name=$rs['contact_name'];  
         $contact_tel=$rs['contact_tel'];   
         $contact_tel_2=$rs['contact_tel_2'];   
         $contact_tel_3=$rs['contact_tel_3'];   
         $contact_tel_4=$rs['contact_tel_4'];   
         $contact_email=$rs['contact_email'];   
         $contact_fb=$rs['contact_fb'];   
         $contact_line_id=$rs['contact_line_id'];   
         $contact_whatsapp=$rs['contact_whatsapp'];   
         $contact_wechat=$rs['contact_wechat'];   
         $source_code=$rs['source_code'];  
         $ex_list_listing_code=$rs['ex_list_listing_code'];   
         $project_id=$rs['project_id'];
         $bedroom=$rs['bedroom'];
         $budget_start=$rs['budget_start'];
         $check_customer=$rs['check_customer'];
         $buyer_contact_code=$rs['buyer_contact_code'];
         $project_id=$rs['project_id'];
         $station_id=$rs['station_id'];
         $zone_id=$rs['zone_id'];
         $project_other=$rs['project_other'];
         $zone_id=$rs['zone_id'];
         $contact_language=$rs['contact_language'];         
         $project_other=$rs['project_other'];
         $create_date=$rs['create_date'];
         $register_id=$rs['register_id'];
         $check_customer=$rs['check_customer'];
         $remark=$rs['remark'];
         $buyer_contact_code=$rs['buyer_contact_code'];
         $register_id=$rs['register_id'];

         $create_deal_type='';
         $create_deal_sqm_end='';

          if($check_customer=='1'){  //รายชื่อลูกค้าซ้ำในระบบ 



          }else{  //รายชื่อลูกค้าไม่ซ้ำ


                  $sql="SELECT * FROM dbo_buyer_contact  order by buyer_contact_id  DESC ";
                  $result=$conn->query($sql);  
                  $rs=$result->fetch_assoc();

                  $buyer_contact_id=$rs['buyer_contact_id'];

                   $a = str_replace("C-","",$buyer_contact_id,$count);

                   if($a<1){ 
                     $a = '1';
                   }else{
                     $a=$a+1;
                   }

                   $buyer_contact_code = sprintf("B-%'05d",$a); 

                   $sql_1="INSERT INTO dbo_buyer_contact (buyer_contact_code , buyer_contact_name , buyer_contact_line , buyer_contact_line_id , buyer_contact_tel , buyer_contact_tel_2 , buyer_contact_tel_3 , buyer_contact_tel_4 , buyer_contact_attention , buyer_contact_status , buyer_contact_email, buyer_contact_fb , buyer_contact_whatsapp , buyer_contact_wechat  , buyer_contact_remark , user_id , buyer_contact_date_create , buyer_contact_listing_code , buyer_contact_language )
                   VALUES ('$buyer_contact_code' , '$contact_name', '$contact_name' , '$contact_line_id' , '$contact_tel' , '$contact_tel_2' , '$contact_tel_3'  , '$contact_tel_4' , '$contact_attention' , '$contact_status' ,'$contact_email'  ,'$contact_fb' , '$contact_whatsapp' , '$contact_wechat' ,'$remark' , '$USER_ID' ,'$date' ,
                   '$ex_list_listing_code' , '$contact_language' )";
                                    mysqli_query($conn, $sql_1);  

          }

 
                   $sql_1= "UPDATE dbo_request_deal SET 
                                  open_deal='1' 
                                  WHERE id='".$id_check."'";
                   $conn->query($sql_1); 
 

                      if($create_deal_attention=='1'){
                             $deal_attention="Buy";
                      }else if($create_deal_attention=='2'){
                             $deal_attention="Rent";
                      }else if($create_deal_attention=='4'){
                             $deal_attention="Extension";
                      }

 

                                        if($ex_list_listing_code!=''){ 

                                            $sql_listing="SELECT listing.project_id , listing.ex_list_bedroom , listing.ex_list_bathroom, listing.ex_list_sqm  , listing.ex_list_deal_type , listing.ex_list_train_station , listing.ex_list_train_station , listing.ex_list_listing_type , pj.project_train_station , listing.zone_id , listing.ex_list_price , pj.project_name_en 
                                                          FROM dbo_data_excel_listing AS listing
                                                          LEFT JOIN type_project AS pj on listing.project_id=pj.project_id
                                                          WHERE listing.ex_list_listing_code='$ex_list_listing_code' ";
                                            $result_listing=$conn->query($sql_listing);  
                                            $rs_listing=$result_listing->fetch_assoc();

                                            $project_id=$rs_listing['project_id'];
                                            $station_id=$rs_listing['ex_list_train_station'];
                                            $zone_id=$rs_listing['zone_id'];
                                            $project_name_en=$rs_listing['project_name_en']; 
                                            $create_deal_type=$rs_listing['ex_list_listing_type'];
                                            $create_deal_sqm_end=$rs_listing['ex_list_sqm'];


                                            if($station_id!=''){
                                                  $station_id=$ex_list_train_station;
                                            }

                                            if($create_deal_title==''){
                                                   $create_deal_title=$contact_name."_".$project_name_en;
                                            } 

                                            $create_deal_search_from='1';

                                        }else if($project_id!=''){
                                             $sql="SELECT * FROM type_project where project_id='$project_id'  order by project_id ASC  "; 
                                             $result=$conn->query($sql);  
                                             $rs_project=$result->fetch_assoc();  

                                             $project_id=$rs_project['project_id'];
                                             $project_name_en=$rs_project['project_name_en'];
                                             $create_deal_type=$rs_project['project_type'];
                                             $zone_id=$rs_project['zone_id'];
                                             $station_id=$rs_project['project_train_station']; 

                                             if($create_deal_title==''){
                                                       $create_deal_title=$contact_name."_".$project_name_en;
                                             }
                                             $create_deal_search_from='1';

                                        }else if($station_id!=''){

                                            $strSQL = "SELECT * FROM type_train_station where station_id='$station_id'  "; 
                                            $result=$conn->query($strSQL);                                    
                                            $rs=$result->fetch_assoc();

                                            $station_name_en=$rs['station_name_en'];

                                             if($create_deal_title==''){
                                                       $create_deal_title=$contact_name."_".$station_name_en;
                                             }
                                             $create_deal_search_from='2';

                                        }else if($zone_id!=''){

                                            $strSQL = "SELECT * FROM type_zone where zone_id='$zone_id'  "; 
                                            $result=$conn->query($strSQL);                                    
                                            $rs=$result->fetch_assoc();

                                            $zone_name_en=$rs['zone_name_en'];

                                             if($create_deal_title==''){
                                                       $create_deal_title=$contact_name."_".$zone_name_en;
                                             }  
                                             $create_deal_search_from='3';                                        
                                        }
                  
 

                                 // dbo_create_deal

                                $sql="SELECT * FROM dbo_create_deal  order by create_deal_create   DESC ";
                                $result=$conn->query($sql);  
                                $rs=$result->fetch_assoc();

                                $create_deal_code=$rs['create_deal_code'];
                                $create_deal_code = str_replace("D-","",$create_deal_code,$count);

                                 if($create_deal_code<1){      $create_deal_code = '1';
                                 }else{  $create_deal_code=$create_deal_code+1;  }
                                 $code_deal= sprintf("D-%'05d",$create_deal_code); 

                                 $sql_2="INSERT INTO dbo_create_deal ( create_deal_code , buyer_contact_listing_code, create_deal_title , create_deal_attention , 
                                       buyer_contact_code , source_code  , contact_code, user_id   , create_deal_create , project_id , zone_id , station_id , 
                                       create_deal_budget_end , create_deal_duration , create_deal_type , create_deal_bedroom , 
                                       create_deal_sqm_end  ,
                                       create_deal_attention_2 , create_deal_type_2 , create_deal_budget_end_2 , project_id_2 , 
                                       zone_id_2, station_id_2  , create_deal_bathroom_2 , create_deal_sqm_end_2 , 
                                       create_deal_remark )
                                 VALUES ('$code_deal' , '$ex_list_listing_code' , '$create_deal_title' , '$contact_attention', 
                                     '$buyer_contact_code' , '$source_code' , '12' , '$USER_ID'  ,'$date' , '$project_id' , '$zone_id' , '$station_id'  , 
                                     '$budget_start' , '$deal_duration' , '$create_deal_type' , '$bedroom' , 
                                     '$create_deal_sqm_end' , 
                                     '$contact_attention' ,'$create_deal_type'  , '$budget_start', '$project_id' , 
                                     '$zone_id' , '$station_id', '$bedroom'   , '$create_deal_sqm_end' , 
                                     '$remark'  )";
                                     mysqli_query($conn, $sql_2);  

                                 // END dbo_create_deal      
                               
                           echo("<script> top.location.href='../?page=create_deal_buyer&status=edit&p_check=create_buyer&code=$code_deal&buyer_id=$buyer_contact_code&step=1&sale=$register_id'</script>"); 
 */
      }

///////////////////////////////    CHECK request_deal  to create_deal          ////////////////////////////////////


///////////////////////////////    log_listing  สำหรับ Restore Listing     ////////////////////////////////////

      if($page_get=='log_listing'){ 



                     $sql_log="SELECT * FROM dbo_log_listing where id='$id_get' LIMIT 1 "; 
                     $result_log=$conn->query($sql_log);
                     $rs_log=$result_log->fetch_assoc(); 

                     $ex_list_listing_code=$rs_log['ex_list_listing_code'];
                     $heading=$rs_log['heading'];
                     $heading_en=$rs_log['heading_en'];
                     $listing_name=$rs_log['listing_name'];
                     $house_number=$rs_log['house_number'];
                     $listing_name=$rs_log['listing_name']; 
                     $deal_type=$rs_log['deal_type'];
                     $listing_type=$rs_log['listing_type'];                      
                     $contract_type=$rs_log['contract_type'];    
                     $station_id=$rs_log['station_id'];
                     $floor=$rs_log['floor'];
                     $total_floors=$rs_log['total_floors'];
                     $house_number=$rs_log['house_number'];
                     $sqm=$rs_log['sqm'];
                     $rai=$rs_log['rai'];
                     $ngan=$rs_log['ngan'];
                     $wa=$rs_log['wa']; 
                     $bedroom=$rs_log['bedroom'];
                     $bathroom=$rs_log['bathroom'];
                     $parking=$rs_log['parking'];
                     $price=$rs_log['price']; 
                     $list_contact=$rs_log['list_contact'];
                     $contact_name=$rs_log['contact_name'];
                     $contact_tel=$rs_log['contact_tel'];
                     $contact_tel1_2=$rs_log['contact_tel1_2'];
                     $contact_tel1_3=$rs_log['contact_tel1_3'];
                     $contact_tel1_4=$rs_log['contact_tel1_4'];
                     $contact_email=$rs_log['contact_email'];
                     $contact_lineid=$rs_log['contact_lineid'];
                     $contact_name_2=$rs_log['contact_name_2'];
                     $contact_tel_2=$rs_log['contact_tel_2'];
                     $contact_tel2_2=$rs_log['contact_tel2_2'];
                     $contact_tel2_3=$rs_log['contact_tel2_3'];
                     $contact_tel2_4=$rs_log['contact_tel2_4'];
                     $contact_email_2=$rs_log['contact_email_2'];
                     $contact_lineid_2=$rs_log['contact_lineid_2'];
                     $zone_id=$rs_log['zone_id'];
                     $listing_status=$rs_log['listing_status']; 
                     $rent_till=$rs_log['rent_till'];
                     $project_id=$rs_log['project_id'];
                     $create_date=$rs_log['create_date'];
                     $public=$rs_log['public'];
                     $premium=$rs_log['premium'];
                     $boostpost=$rs_log['boostpost'];
                     $proppit=$rs_log['proppit'];
                     $owner_tel=$rs_log['owner_tel'];
                     $img_number=$rs_log['img_number'];
                     $details=$rs_log['details'];
                     $details_en=$rs_log['details_en'];

                     $alley=$rs_log['alley'];
                     $alley_en=$rs_log['alley_en'];
                     $road=$rs_log['road'];
                     $road_en=$rs_log['road_en'];

                     $other_room=$rs_log['other_room'];
                     $view=$rs_log['view']; 
                     $pets=$rs_log['pets'];
                     $direction=$rs_log['direction']; 
                     $facilities=$rs_log['facilities'];
                     $facilities_en=$rs_log['facilities_en']; 
                     $nearby_places=$rs_log['nearby_places']; 
                     $nearby_places_en=$rs_log['nearby_places_en']; 
                     $details=$rs_log['details'];             
                     $details_en=$rs_log['details_en']; 
                     $subdistrict=$rs_log['subdistrict']; 
                     $district=$rs_log['district']; 
                     $province=$rs_log['province']; 
                     $remark=$rs_log['remark'];                  
                     $googlmap=$rs_log['googlmap'];   
                     $common_fee=$rs_log['common_fee'];   
                     $video=$rs_log['video'];               
                     $no_images=$rs_log['no_images'];                    
                     $latitude=$rs_log['latitude'];   
                     $longitude=$rs_log['longitude'];                    
                     $img_score=$rs_log['img_score'];   
                     $furniture_id=$rs_log['furniture_id'];                    
                     $type_strengths_id=$rs_log['type_strengths_id'];   

                      $sql = "UPDATE dbo_data_excel_listing SET 
                                ex_list_contract_type='".$contract_type."',
                                ex_list_listing_type='".$listing_type."',
                                ex_list_deal_type='".$deal_type."',
                                ex_list_heading='".$heading."',
                                ex_list_heading_en='".$heading_en."',
                                ex_list_listing_name='".$listing_name."',
                                ex_list_listing_name_en='".$listing_name."',
                                ex_list_room_id='".$road."',
                                ex_list_house_number='".$house_number."',
                                ex_list_alley='".$alley."',
                                ex_list_road='".$road."',
                                ex_list_alley_en='".$alley_en."',
                                ex_list_road_en='".$road_en."',
                                ex_list_sqm='".$sqm."',
                                ex_list_rai='".$rai."',
                                ex_list_ngan='".$ngan."',
                                ex_list_wa='".$wa."',
                                ex_list_parking='".$parking."',
                                ex_list_bedroom='".$bedroom."',
                                ex_list_bathroom='".$bathroom."',
                                ex_list_other_room='".$other_room."',
                                ex_list_view='".$view."',
                                ex_list_floor='".$floor."',
                                ex_list_total_floors='".$total_floors."',
                                ex_list_pets='".$pets."',
                                ex_list_facilities='".$facilities."',
                                ex_list_common_facilities='".$facilities_en."',
                                ex_list_nearby_places='".$nearby_places."',
                                ex_list_nearby_places_en='".$nearby_places_en."',
                                ex_list_direction='".$direction."',
                                ex_list_details='".$details."',
                                ex_list_details_en='".$details_en."',
                                ex_list_subdistrict='".$subdistrict."',
                                ex_list_district='".$district."',
                                ex_list_province='".$province."',
                                ex_list_train_station='".$station_id."',
                                ex_list_googlmap='".$googlmap."',
                                ex_list_price='".$price."', 
                                ex_list_remark='".$remark."',
                                ex_list_video='".$video."',
                                ex_list_common_fee='".$common_fee."',
                                ex_list_contact_name='".$contact_name."',
                                ex_list_contact_tel='".$contact_tel."',
                                ex_list_contact_tel1_2='".$contact_tel1_2."',
                                ex_list_contact_tel1_3='".$contact_tel1_3."',
                                ex_list_contact_tel1_4='".$contact_tel1_4."',
                                ex_list_contact_email='".$contact_email."',
                                ex_list_contact_lineid='".$contact_lineid."',
                                ex_list_contact_fb='".$contact_fb."',
                                ex_list_contact_name_2='".$contact_name_2."',
                                ex_list_contact_tel_2='".$contact_tel_2."',
                                ex_list_contact_tel2_2='".$contact_tel2_2."',
                                ex_list_contact_tel2_3='".$contact_tel2_3."',
                                ex_list_contact_tel2_4='".$contact_tel2_4."',
                                ex_list_contact_email_2='".$contact_email_2."',
                                ex_list_contact_lineid_2='".$contact_lineid_2."',
                                ex_list_contact_fb_2='".$contact_fb_2."',
                                ex_list_no_images='".$no_images."',
                                project_id='".$project_id."',
                                zone_id='".$zone_id."',
                                ex_list_latitude='".$latitude."',
                                ex_list_longitude='".$longitude."',
                                ex_list_listing_status='".$listing_status."',
                                ex_list_img_score='".$img_score."',
                                ex_list_rent_till='".$rent_till."',  
                                ex_list_rent_till_note='".$rent_till_note."',  
                                ex_list_premium='".$ex_list_premium."',
                                ex_list_boostpost='".$boostpost."',
                                ex_list_owner_tel='".$owner_tel."',
                                type_strengths_id='".$type_strengths_id."',
                                ex_list_furniture_id='".$furniture_id."',
                                ex_list_date_update='".$date."' 
                                WHERE ex_list_listing_code='".$ex_list_listing_code."' "; 
                     $conn->query($sql);

                                $record_note="RestoreListing"; 
                                $sql_record="INSERT INTO dbo_record (ex_list_id ,record_note ,   record_date , record_user_id , record_remark  )

                                VALUES ( '$ex_list_listing_code','$record_note'  , '$date' , '$USER_ID' , '$id_get')";
                                mysqli_query($conn, $sql_record); 

                    echo("<script> top.location.href='../?page=log_listing'</script>"); 

      }

///////////////////////////////    END log_listing  สำหรับ Restore Listing     ////////////////////////////////////


///////////////////////////////    log_project  สำหรับ Restore Listing     ////////////////////////////////////

      if($page_get=='log_project'){ 


                     $sql_project="SELECT * FROM dbo_log_project where log_id='$id_get' LIMIT 1 "; 
                     $result_project=$conn->query($sql_project);
                     $rs_project=$result_project->fetch_assoc(); 

                     $log_id=$rs_project['log_id'];
                     $project_id=$rs_project['project_id'];
                     $project_type=$rs_project['project_type'];
                     $project_name=$rs_project['project_name'];
                     $project_name_en=$rs_project['project_name_en'];
                     $project_alley=$rs_project['project_alley'];
                     $project_alley_en=$rs_project['project_alley_en'];
                     $project_road=$rs_project['project_road'];
                     $project_road_en=$rs_project['project_road_en'];
                     $project_subdistrict=$rs_project['project_subdistrict'];
                     $project_district=$rs_project['project_district'];
                     $project_province=$rs_project['project_province'];
                     $station_id=$rs_project['station_id'];
                     $zone_id=$rs_project['zone_id'];
                     $project_number_buildings=$rs_project['project_number_buildings'];
                     $project_developer=$rs_project['project_developer'];
                     $project_unit=$rs_project['project_unit'];
                     $project_completed=$rs_project['project_completed'];
                     $project_map=$rs_project['project_map'];
                     $project_latitude=$rs_project['project_latitude'];
                     $project_longitude=$rs_project['project_longitude'];
                     $search_p_id=$rs_project['search_p_id'];
                     $project_number_buildings=$rs_project['project_number_buildings'];
                     $project_total_floors=$rs_project['project_total_floors'];
                     $project_facilities=$rs_project['project_facilities'];
                     $project_facilities_en=$rs_project['project_facilities_en'];
                     $project_facilities_icon=$rs_project['project_facilities_icon'];   
                     $project_nearby_places=$rs_project['project_nearby_places'];
                     $project_nearby_places_en=$rs_project['project_nearby_places_en'];
                     $project_common_fee=$rs_project['project_common_fee'];
                     $project_map=$rs_project['project_map'];
                     $project_proppit_name=$rs_project['project_proppit_name'];
                     $project_proppit_name_en=$rs_project['project_proppit_name_en'];  
                     $project_proppit_latitude=$rs_project['project_proppit_latitude'];  
                     $project_proppit_longitude=$rs_project['project_proppit_longitude'];  
                     $project_living_project_list=$rs_project['project_living_project_list'];  

                      $sql = "UPDATE type_project SET 
                                project_type='".$project_type."',
                                project_name='".$project_name."',
                                project_name_en='".$project_name_en."',
                                project_alley='".$project_alley."',
                                project_alley_en='".$project_alley_en."',
                                project_road='".$project_road."',
                                project_road_en='".$project_road_en."',
                                project_subdistrict='".$project_subdistrict."',
                                project_district='".$project_district."',
                                project_province='".$project_province."',
                                project_train_station='".$station_id."',
                                project_number_buildings='".$project_number_buildings."',
                                project_total_floors='".$project_total_floors."',
                                project_facilities='".$project_facilities."',
                                project_facilities_en='".$project_facilities_en."',
                                project_facilities_icon='".$project_facilities_icon."',
                                project_nearby_places='".$project_nearby_places."',
                                project_nearby_places_en='".$project_nearby_places_en."',
                                project_common_fee='".$project_common_fee."',
                                project_map='".$project_map."',
                                project_latitude='".$project_latitude."',
                                project_longitude='".$project_longitude."',
                                project_unit='".$project_unit."',
                                project_completed='".$project_completed."',
                                project_developer='".$project_developer."', 
                                project_proppit_name='".$project_proppit_name."', 
                                project_proppit_name_en='".$project_proppit_name_en."', 
                                project_proppit_latitude='".$project_proppit_latitude."', 
                                project_proppit_longitude='".$project_proppit_longitude."', 
                                project_living_project_list='".$project_living_project_list."', 
                                zone_id='".$zone_id."', 
                                register_id_update='".$USER_ID."', 
                                project_update='".$date."'
                                WHERE project_id='".$project_id."' "; 
                     $conn->query($sql);

                                $record_note="RestoreProject"; 
                                $sql_record="INSERT INTO dbo_record (project_id ,record_note , register_id ,  record_date , record_user_id , record_remark )

                                VALUES ( '$project_id','$record_note' , '$create_deal_sale'  , '$date' , '$USER_ID' , '$id_get')";
                                mysqli_query($conn, $sql_record); 

                    echo("<script> top.location.href='../?page=log_project'</script>"); 

      }
}


?>