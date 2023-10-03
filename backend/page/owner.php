<?php
ini_set('session.gc_maxlifetime', 100000);

session_start(); 

 include '../config.php'; 
 include '../setting.php'; 

         $id=$_GET['id'];
         $today=date("Y-m-d H:i:s");
         $status=$_POST['status'];
         $USER_ID=$_SESSION['USER_ID'];
         $clear=$_GET['clear'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CONNEX PROPERTY</title>

 <script language="JavaScript">
  function chkNumber(ele)
  {
  var vchar = String.fromCharCode(event.keyCode);
  if ((vchar<'0' || vchar>'9') && (vchar != '/')) return false;
  ele.onKeyPress=vchar;
  }

  
</script>

   <!-- daterange picker -->
  <link rel="stylesheet" href="../template/plugins/daterangepicker/daterangepicker.css">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../template/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../template/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../template/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../template/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../template/plugins/summernote/summernote-bs4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">

  <link rel="stylesheet" href="../template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="../template/plugins/ekko-lightbox/ekko-lightbox.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
 

<?php

 if($_SESSION['USER_ID']!='' and $_COOKIE["register"]==''){

        $register=$_SESSION['USER_ID']; 
        setcookie("register", $register, time() + 86400 * 365 ); // 86400 = 365 day 
        $_COOKIE['register']=$register;

 }


 if($clear=='1'){

        unset($_COOKIE['register']);
        setcookie('register', '', time() - 86400 * 365 ); // empty value and old timestamp
        $_SESSION['USER_ID']='';
        echo("<script> top.location.href='../?page=upload_file_excel_check&p=&page_no=1'</script>"); 
 }

  
      if($_COOKIE["register"]=="" and $register==""){  


        $_SESSION['URL_Check']=$_SERVER['REQUEST_URI'];  ?>



<center>


<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary" style="width: <?php echo $width_1;?>">
    <div class="card-header text-center">
      <a href="../connex/backend/" class="h1"><b>CONNEX</b>PROPERTY</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="../include/process_checkuser.php" name="form1" id="validation-form" method="POST">
        <div class="input-group mb-4">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-4">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
               
              
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

 
      <!-- /.social-auth-links -->

       
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->


</center> 
 

<?php


   }else{

           if($_SESSION['USER_ID']==""){

            $sql = "SELECT * FROM dbo_register where register_id='".$_COOKIE["register"]."' ";
            $result = $conn->query($sql);
            $row= $result->fetch_assoc();

             if ($row['register_email']!='') {
               
                   $_SESSION['USER_ID']=$row['register_id'] ;
                   $_SESSION['EMAIL_ID']=$row['register_email'] ;
                   $_SESSION['STATUS_ID']=$row['register_status'] ;
                   $_SESSION['STATUS_DRAFT']=$row['register_status_draft'] ; 
                   $_SESSION['STATUS_PREMIUM']=$row['register_status_premium'] ; 
                   $_SESSION['STATUS_BOOSTPOST']=$row['register_status_boostpost'] ; 
                   $_SESSION['STATUS_OWNER_TEL']=$row['register_status_owner_tel'] ; 
                   $_SESSION['STATUS_ADS']=$row['register_status_ads'] ; 
                   $_SESSION['NAME_ID']=$row['register_name'] ; 
                   $_SESSION['IMG_ID']=$row['register_img'] ; 
                   $_SESSION['POSITION']=$row['register_position'] ; 


                   $_SESSION['URL_Check']=$_SERVER['REQUEST_URI'];   


                    if($URL_Check!=''){

                       echo("<script> top.location.href='../..$URL_Check'</script>"); 
                    }else{
                       echo("<script> top.location.href='?id=$id'</script>"); 
                    } 
              }  
          } 



         if($status=='1'){
         
         $code=$_POST['code'];
         $id_s=$_POST['id'];
         $ex_list_listing_status=$_POST['ex_list_listing_status'];
         $ex_list_rent_till=$_POST['ex_list_rent_till'];
         $record_remark=$_POST['record_remark'];
         $ex_list_public=$_POST['ex_list_public'];
         $ex_list_deal_type=$_POST['ex_list_deal_type'];

         $list_date_create=$_POST['list_date_create'];
         $listing_status=$_POST['listing_status'];

         $record_note="ดำเนินการแก้ไข/อัพเดท สถานะ Listing";

        $year=substr($ex_list_rent_till,6 , 4 );
        $month=substr($ex_list_rent_till,3 , 2 );
        $day=substr($ex_list_rent_till,0 , 2 );
        $date_up=$year."-".$month."-".$day;

        


                if($ex_list_listing_status=='3' and $ex_list_deal_type=='2' or $ex_list_listing_status=='4' or $ex_list_listing_status=='5' or
                   $ex_list_listing_status=='6' or $ex_list_listing_status=='12' or $ex_list_listing_status=='13'  or $ex_list_listing_status=='14'  or 
                   $ex_list_listing_status=='15' ){
                         
                         $ex_list_public='0';   
                         $ex_list_proppit='0';             
                         $ex_list_propertyhub='0';    
                         $ex_list_living='0';  

                         $sql = "UPDATE dbo_data_excel_listing SET  
                                ex_list_listing_status='".$ex_list_listing_status."',
                                ex_list_rent_till='".$ex_list_rent_till."',
                                ex_list_rent_till_note='".$record_remark."', 
                                ex_list_rent_till_date='".$date_up."', 
                                ex_list_public='".$ex_list_public."', 
                                ex_list_proppit_date='2023-01-01 00:00:00', 
                                ex_list_propertyhub_date='2023-01-01 00:00:00',
                                ex_list_date_update='".$today."' 
                                WHERE ex_list_listing_code='".$id_s."' ";  

                }else{


  
                      $sql = "UPDATE dbo_data_excel_listing SET  
                                ex_list_listing_status='".$ex_list_listing_status."',
                                ex_list_rent_till='".$ex_list_rent_till."',
                                ex_list_rent_till_note='".$record_remark."', 
                                ex_list_rent_till_date='".$date_up."', 
                                ex_list_public='".$ex_list_public."', 
                                ex_list_date_update='".$today."' 
                                WHERE ex_list_listing_code='".$id_s."' "; 

                }
                           $sql_1="INSERT INTO dbo_record ( ex_list_id , record_note, ex_list_listing_status , ex_list_rent_till, record_remark,  record_date , record_user_id  )
                           VALUES ( '$id_s','$record_note', '$ex_list_listing_status', '$ex_list_rent_till' , '$record_remark' , '$today' , '$USER_ID')";
                            mysqli_query($conn, $sql_1);  

                        /*
                        if($ex_list_listing_status!='1'){

                            $status=0; $record_note="กำหนดPost เป็นDarft";  
                            


                           $sql_2="UPDATE dbo_data_excel_listing SET  
                                ex_list_public='".$status."',
                                ex_list_boostpost='".$status."',
                                ex_list_public_date='".$today."' 
                                WHERE ex_list_listing_code='".$id_s."' "; 
                          if ($conn->query($sql_2) === TRUE) {  } 

                           $sql_1="INSERT INTO dbo_record ( ex_list_id, record_note, record_remark ,  record_date , record_user_id  )

                           VALUES ( '$id_s', '$record_note', '$record_remark' ,  '$today' , '$USER_ID')";
                            mysqli_query($conn, $sql_1);  


                        } */



                      if ($conn->query($sql) === TRUE) { 


                           echo("<script> top.location.href=' https://connex.in.th/backend/page/owner.php?id=$id_s'</script>"); 


                      } else {
                     
                           echo '<script type="text/javascript">alert("Error");</script>';
                           echo "Error updating record: " . $conn->error;   
                      }


         }else{

	         $sql_list="SELECT * FROM dbo_data_excel_listing where ex_list_listing_code='$id' ";
	         $result_list= $conn->query($sql_list); 
	        // output data of each row
	         $rs_listing=$result_list->fetch_assoc();


  	         $ex_list_contract_type=$rs_listing['ex_list_contract_type'];
  	         $ex_list_listing_code=$rs_listing['ex_list_listing_code'];
  	         $ex_list_listing_status=$rs_listing['ex_list_listing_status'];
  	         $ex_list_rent_till=$rs_listing['ex_list_rent_till'];
             $ex_list_listing_type_check=$rs_listing['ex_list_listing_type'];

             $ex_list_contact_name=$rs_listing['ex_list_contact_name'];
             $ex_list_contact_tel=$rs_listing['ex_list_contact_tel'];
             $ex_list_contact_tel1_2=$rs_listing['ex_list_contact_tel1_2'];
             $ex_list_contact_tel1_3=$rs_listing['ex_list_contact_tel1_3'];
             $ex_list_contact_tel1_4=$rs_listing['ex_list_contact_tel1_4'];
             $ex_list_contact_lineid=$rs_listing['ex_list_contact_lineid'];
             $ex_list_contact_whatsapp=$rs_listing['ex_list_contact_whatsapp'];
             $ex_list_contact_email=$rs_listing['ex_list_contact_email'];
             $ex_list_contact_fb=$rs_listing['ex_list_contact_fb'];

             $ex_list_contact_tel_2=$rs_listing['ex_list_contact_tel_2'];
             $ex_list_contact_tel2_2=$rs_listing['ex_list_contact_tel2_2'];
             $ex_list_contact_tel2_3=$rs_listing['ex_list_contact_tel2_3'];
             $ex_list_contact_tel2_4=$rs_listing['ex_list_contact_tel2_4'];
             $ex_list_contact_lineid_2=$rs_listing['ex_list_contact_lineid_2'];
             $ex_list_contact_whatsapp_2=$rs_listing['ex_list_contact_whatsapp_2'];
             $ex_list_contact_email_2=$rs_listing['ex_list_contact_email_2'];
             $ex_list_contact_fb_2=$rs_listing['ex_list_contact_fb_2'];

             $ex_list_contact=$rs_listing['ex_list_contact'];
           
             $ex_list_date_update=$rs_listing['ex_list_date_update'];
             $ex_list_date_create=$rs_listing['ex_list_date_create'];

             $ex_list_deal_type=$rs_listing['ex_list_deal_type'];

           if($ex_list_date_create=='0000-00-00 00:00:00'){

                  $ex_list_date_create=$rs_listing['ex_list_timestamp'];

           }



                  if($ex_list_listing_status=='1'){ $ex_list_listing_status="Available"; }
                  else if($ex_list_listing_status=='2'){ $ex_list_listing_status="Contracted ไม่ล็อคสิทธิ"; }
                  else if($ex_list_listing_status=='3'){ $ex_list_listing_status="Rented"; }
                  else if($ex_list_listing_status=='4'){ $ex_list_listing_status="Sold (by Connex)"; }
                  else if($ex_list_listing_status=='5'){ $ex_list_listing_status="Sold (by Others)"; }
                  else if($ex_list_listing_status=='6'){ $ex_list_listing_status="own use"; }
                  else if($ex_list_listing_status=='7'){ $ex_list_listing_status="unknown"; }
                  else if($ex_list_listing_status=='8'){ $ex_list_listing_status="ไม่รับสาย"; }
                  else if($ex_list_listing_status=='9'){ $ex_list_listing_status="ไม่สะดวกคุย"; }
                  else if($ex_list_listing_status=='10'){ $ex_list_listing_status="ปิดเครื่อง"; }
                  else if($ex_list_listing_status=='11'){ $ex_list_listing_status="สายไม่ว่าง"; }
                  else if($ex_list_listing_status=='12'){ $ex_list_listing_status="เบอร์ผิด"; }
                  else if($ex_list_listing_status=='13'){ $ex_list_listing_status="ไม่รับ agent"; }
                  else if($ex_list_listing_status=='14'){ $ex_list_listing_status="ยังไม่ปล่อยขาย/เช่า"; }


                 $sql_r="SELECT * FROM dbo_register where register_id ='$ex_list_contact' ";
                 $result_r= $conn->query($sql_r); 
                // output data of each row
                 $rs_r=$result_r->fetch_assoc(); 
                 $register_name_r=$rs_r['register_name']; 


        }





      /////////// Check เบอร์ Owner ////////////////
             $sql_owner="SELECT * FROM dbo_contact_owner where  ex_owner_tel_1='$ex_list_contact_tel' or ex_owner_tel_1='$ex_list_contact_tel1_2'
                         or ex_owner_tel_1='$ex_list_contact_tel1_3' or ex_owner_tel_1='$ex_list_contact_tel1_4' or ex_owner_tel_1='$ex_list_contact_tel_2'   
                         or ex_owner_tel_1='$ex_list_contact_tel2_2' or ex_owner_tel_1='$ex_list_contact_tel2_3' or ex_owner_tel_1='$ex_list_contact_tel2_4' ";  
             $result_owner= $conn->query($sql_owner);
             

             if($result_owner->num_rows > 0) { 
                     $owner_ex='lock';
                     $owner='1';
             }  
            
      /////////// End Check เบอร์ Owner  ////////////////
            if($_SESSION['STATUS_ID']=='2' or $_SESSION['STATUS_ID']=='3' or $_SESSION['STATUS_ID']=='4' or $_SESSION['STATUS_ID']=='5' ){ 
                     $owner_ex='';
            }

?>

 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
 
 
      <div class="container-fluid" >
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default"  >


          <div class="card-header">
            <h3 >รายละเอียด Listing : <?php echo $id;?></h3>  
          </div>
     


       <?php


                if($ex_list_listing_type_check==1){ // คอนโด
                        
                        $status_type_check='1';

                }else if($ex_list_listing_type_check==2 or $ex_list_listing_type_check==3 or $ex_list_listing_type_check==3 or $ex_list_listing_type_check==4 or 
                         $ex_list_listing_type_check==5 or $ex_list_listing_type_check==6 or $ex_list_listing_type_check==7 or $ex_list_listing_type_check==8 or 
                         $ex_list_listing_type_check==9 ){ // อาคารพาณิชย์ บ้าน ที่ดิน 
                

                        $status_type_check='2';

                }else{  // อาคารพาณิชย์ บ้าน ที่ดิน 

                        $status_type_check='1';

                }    
              

         if($_SESSION['STATUS_ID']=='2' or $_SESSION['STATUS_ID']=='3' or $_SESSION['STATUS_ID']=='4' or $_SESSION['STATUS_ID']=='5' or $_SESSION['USER_ID']==$ex_list_contact
                or $status_type_check=='1' and $_SESSION['POSITION']=='1' or $status_type_check=='2' and $_SESSION['POSITION']=='2'   ){ ?> 
                       

                           <?php if($_SESSION['STATUS_ADS']!='1' and $owner_ex!='lock' ){

                     /////////////////////// คลิกดูเบอร์ ///////////////////
                                  $record_note="คลิกดูเบอร์ Owner";   


                                  $sql_1="INSERT INTO dbo_record ( ex_list_id, record_note, record_remark ,  record_date , record_user_id  )

                                       VALUES ( '$id', '$record_note', 'tel' ,  '$today' , '$USER_ID')";
                                        mysqli_query($conn, $sql_1);  
                     /////////////////////// คลิกดูเบอร์ ///////////////////

                            ?>                              
                                

                            <div class="card-body" >
                              <div class="row">
                                <div class="col-md-12"> 
                                              <?php if($owner=='1'){ ?><p style="color: red;"><b>Exclusive Owner</b></p> <?php } ?>
                                              <h5>Owner/เจ้าของบ้าน คนที่1 </h5>
                                              <b>ผู้ติดต่อ : </b><?php echo $ex_list_contact_name;?><br>
                                              <b>เบอร์ติดต่อ : </b>
 

                             <?php if($ex_list_contact_tel!=''){ ?> <a href="tel:<?php echo $ex_list_contact_tel;?>"><?php echo $ex_list_contact_tel;?></a> 
                                    <?php } ?> 
                             <?php if($ex_list_contact_tel1_2!=''){ ?> , <a href="tel:<?php echo $ex_list_contact_tel1_2;?>"><?php echo $ex_list_contact_tel1_2;?></a> 
                                    
                              <?php } ?>
                             <?php if($ex_list_contact_tel1_3!=''){ ?> , <a href="tel:<?php echo $ex_list_contact_tel1_3;?>"><?php echo $ex_list_contact_tel1_3;?></a> 
                                    
                              <?php } ?>
                             <?php if($ex_list_contact_tel1_4!=''){ ?> , <a href="tel:<?php echo $ex_list_contact_tel1_4;?>"><?php echo $ex_list_contact_tel1_4;?></a> 
                                   
                              <?php } ?>


 

                                              <br>
                                              <b>LINE ผู้ติดต่อ : </b><a href="https://line.me/ti/p/~<?php echo $ex_list_contact_lineid;?>"><?php echo $ex_list_contact_lineid;?></a><br>
                                              <b>Whatsapp</b> <a href="https://wa.me/<?php echo $ex_list_contact_whatsapp;?>"><?php echo $ex_list_contact_whatsapp;?></a><br>
                                              <b>E-Mail : </b><?php echo $ex_list_contact_email;?><br>
                                              <b>FB : </b><?php echo $ex_list_contact_fb;?><br> 
                                          </div> 
                                         <div class="col-md-12"> 
                                              <h5>Owner/เจ้าของบ้าน คนที่2 </h5>
                                              <b>ผู้ติดต่อ : </b><?php echo $ex_list_contact_name_2;?><br>
                                              <b>เบอร์ติดต่อ : </b> 
 


                             <?php if($ex_list_contact_tel_2!=''){ ?> <a href="tel:<?php echo $ex_list_contact_tel_2;?>"><?php echo $ex_list_contact_tel_2;?></a> 
                                    
                             <?php } ?> 
                             <?php if($ex_list_contact_tel2_2!=''){ ?> , <a href="tel:<?php echo $ex_list_contact_tel2_2;?>"><?php echo $ex_list_contact_tel2_2;?></a> 
                                                                  <?php } ?>
                             <?php if($ex_list_contact_tel2_3!=''){ ?> , <a href="tel:<?php echo $ex_list_contact_tel2_3;?>"><?php echo $ex_list_contact_tel2_3;?></a> 
                                    
                             <?php } ?>
                             <?php if($ex_list_contact_tel2_4!=''){ ?> , <a href="tel:<?php echo $ex_list_contact_tel2_4;?>"><?php echo $ex_list_contact_tel2_4;?></a> 
                                     
                             <?php } ?>
 


                                              <br>
                                              <b>LINE ผู้ติดต่อ : </b><a href="https://line.me/ti/p/~<?php echo $ex_list_contact_lineid_2;?>"><?php echo $ex_list_contact_lineid_2;?></a><br>
                                              <b>Whatsapp</b> <a href="https://wa.me/<?php echo $ex_list_contact_whatsapp_2;?>"><?php echo $ex_list_contact_whatsapp_2;?></a><br>
                                              <b>E-Mail : </b><?php echo $ex_list_contact_email_2;?><br>
                                              <b>FB : </b><?php echo $ex_list_contact_fb_2;?><br> 
                                          </div>         
                                          

                                         <div class="col-md-12"> 

                                   <?php if($ex_list_other!=''){ ?><br> 

                                           <b>ข้อมูลอ้างอิง : </b> <span style="color: red;"> <?php echo $ex_list_other;?></span>

                                   <?php } ?>

                                   <?php if($ex_list_rent_till_note!=''){ ?><br> 

                                        <b>Remark (status) : </b> <span style="color: red;"> <?php echo $ex_list_rent_till_note;?></span> 

                                   <?php } ?>
                                    
                                    <?php if($ex_list_remark!=''){ ?>
                                                <br><b>Remark : </b><?php echo $ex_list_remark;?>  
                                    <?php } ?>
 

                                       </div>

                            <?php }else{ ?>

                                         <div class="col-md-12"> 
                                            <div class="row" id="p1" style="font-size: 12px;">
                                                <div class="col-12 col-sm-12" style="padding: 20px;"> <br><br>

                                                  <!--
                                                      <p style="color: red;font-size: 18px;"><b>โปรดติดต่อเจ้าหน้าที่สต็อก หากต้องการติดต่อ owner ท่านนี้ </b></p><br><br> -->

                                            <p style="color: red;font-size: 18px;"><b>โปรดคลิกปุ่มด้านล่าง เพื่อให้ทีมงานสต๊อกติดต่อห้องให้ หากต้องการติดต่อ owner ท่านนี้</b></p><br><br>
                                              <a onclick="window.open('../page/owner_listing_view.php?id=<?php echo $id;?>', '_blank', 'location=yes,height=300,width=500,scrollbars=yes,status=yes');"style="cursor:pointer;"  class="btn btn-danger"  >คลิกให้สต็อกติดต่อห้องให้</a>
                                                </div>      

                                            </div> 
                                        </div>

                            <?php } ?>


                          </div>
                   </div>
       <?php } 
      ?> 

         
          <div class="card-header">
            <h3   >ดำเนินการแก้ไขสถานะ Listing  </h3> 
          </div>

<form method="post" id="form" enctype="multipart/form-data" action="" > 



                <input type="text" class="form-control" name="status"  value="1" hidden="hidden" >
                <input type="text" class="form-control" name="id"  value="<?php echo $ex_list_listing_code;?>" hidden="hidden" >
                <input type="text" class="form-control" name="list_date_create"  value="<?php echo $ex_list_date_create;?>" hidden="hidden" >
                <input type="text" class="form-control" name="listing_status"  value="<?php echo $rs_listing['ex_list_listing_status'];?>" hidden="hidden" >
                <input type="text" class="form-control" name="ex_list_public"  value="<?php echo $rs_listing['ex_list_public'];?>" hidden="hidden" >

                <input type="text" class="form-control" name="ex_list_deal_type"  value="<?php echo $ex_list_deal_type;?>" hidden="hidden" >
        
          <!-- /.card-header -->
          <div class="card-body" >
            <div class="row">
              <div class="col-md-12 col-sm-12"> 
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-12 col-form-label">รหัสทรัพย์ : </label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="code" name="code" placeholder="" value="<?php echo $ex_list_listing_code;?>" disabled="disabled" >
                    </div>
                  </div> 
              </div>

              <div class="col-md-12 col-sm-12"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-12 col-form-label"> สถานะ listing  : (ปัจจุบัน) </label>
                    <div class="col-sm-12"> 
	                  <select class="form-control"  name="ex_list_listing_status" id="ex_list_listing_status" style="width: 100%;" required> 
	                    <option value="">ยังไม่ระบุ</option>  
	                    <option value="1" <?php if($ex_list_listing_status=='1'){ ?>  selected <?php } ?>  >Available</option> 
                      <option value="2" <?php if($ex_list_listing_status=='2'){ ?>  selected <?php } ?> >Contracted ไม่ล็อคสิทธิ</option>  
                      <option value="3" <?php if($ex_list_listing_status=='3'){ ?>  selected <?php } ?> >Rented</option>   
                      <option value="4" <?php if($ex_list_listing_status=='4'){ ?>  selected <?php } ?> >Sold (by Connex)</option>  
                      <option value="5" <?php if($ex_list_listing_status=='5'){ ?>  selected <?php } ?> >Sold (by Others)</option>  
                      <option value="6" <?php if($ex_list_listing_status=='6'){ ?>  selected <?php } ?> >own use</option> 
                      <!--<option value="7" <?php if($ex_list_listing_status=='7'){ ?>  selected <?php } ?> >unknown</option> -->
                      <option value="8" <?php if($ex_list_listing_status=='8'){ ?>  selected <?php } ?> >ไม่รับสาย</option> 
                      <option value="9" <?php if($ex_list_listing_status=='9'){ ?>  selected <?php } ?> >ไม่สะดวกคุย</option> 
                      <option value="10" <?php if($ex_list_listing_status=='10'){ ?>  selected <?php } ?> >ปิดเครื่อง</option> 
                      <option value="11" <?php if($ex_list_listing_status=='11'){ ?>  selected <?php } ?> >สายไม่ว่าง</option> 
                      <option value="12" <?php if($ex_list_listing_status=='12'){ ?>  selected <?php } ?> >เบอร์ผิด</option> 
                      <option value="13" <?php if($ex_list_listing_status=='13'){ ?>  selected <?php } ?> >ไม่รับ agent</option> 
                      <option value="14" <?php if($ex_list_listing_status=='14'){ ?>  selected <?php } ?> >ยังไม่ปล่อยขาย/เช่า</option> 
                      <option value="15" <?php if($ex_list_listing_status=='15'){ ?>  selected <?php } ?> >Under Renovation</option> 
	                  </select> 
                    </div>
                  </div> 
              </div>
              <div class="col-md-12 col-sm-12" id="p_ex_list_rent_till"  > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-12 col-form-label">ติดผู้เช่าถึง : </label>
                    <div class="col-sm-12">
               
         
                      <div class="input-group date" id="reservationdate" data-target-input="nearest">
                          <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="ex_list_rent_till"  placeholder="โปรดกรอกตาม format ให้ถูกต้อง 01/01/2022"  data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask  />
                          <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                      </div>
                      <p style="color: red;font-size: 14px;">วิธีการใส่ข้อมูลวันที่ กรณีมีข้อมูลแค่ปี หรือเดือนให้ใส่ (01/01/2023) </p>

 

                    </div> 
                    <div class="col-sm-2">
                     <!--  <input type="checkbox" name="ex_list_rent_update" value="update"> Update ข้อมูลติ๊ก -->
                    </div>
                  </div>  
              </div>

              <div class="col-md-12 col-sm-12" id="p_ex_list_rent_till"  > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-12 col-form-label">หมายเหตุ : </label>
                    <div class="col-sm-12">
                      <div class="input-group">
                         
                        <input type="text" class="form-control"  name="record_remark" id="record_remark"  value="<?php echo $record_remark;?>"   >
                      </div>
 

                    </div> 
                  </div>  
              </div>
              <div class="col-md-12 col-sm-12"> 
                  <div class="form-group row">
                      <center><input type="submit" class="btn btn-primary" value="บันทึกข้อมูล"></center>
                    
                  </div> 
              </div>


            <div class="card" style="width: 100%;"  >
              <div class="card-header">
                <h3 class="card-title">ประวัติการอัพเดทข้อมูล</h3>
              </div>
              <!-- ./card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover">
                  <thead style="font-size: 14px;">
                    <tr>
                      <th>Day Update</th>
                      <th>สถานะ</th>
                      <th>เช่าถึงวันที่</th>
                      <th>#</th> 
                      <th>หมายเหตุ</th>
                    </tr>
                  </thead>
                  <tbody>
          <?php 
                 $sql_record="SELECT * FROM dbo_record where ex_list_id='$id' and record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%' order by record_date DESC ";
                 $result_record= $conn->query($sql_record); 
                // output data of each row
                 while($rs_record=$result_record->fetch_assoc()){

                  $record_date=$rs_record['record_date'];
                  $ex_list_listing_status=$rs_record['ex_list_listing_status'];
                  $ex_list_rent_till=$rs_record['ex_list_rent_till'];
                  $record_user_id=$rs_record['record_user_id'];
                  $record_remark=$rs_record['record_remark'];

                  if($ex_list_listing_status=='1'){ $ex_list_listing_status="Available";   $ex_list_rent_till="--";}
                  else if($ex_list_listing_status=='0'){ $ex_list_listing_status="No Status"; }
                  else if($ex_list_listing_status=='2'){ $ex_list_listing_status="Contracted ไม่ล็อคสิทธิ"; $ex_list_rent_till="--"; }
                  else if($ex_list_listing_status=='3'){ $ex_list_listing_status="Rented"; }
                  else if($ex_list_listing_status=='4'){ $ex_list_listing_status="Sold (by Connex)"; $ex_list_rent_till="--"; }
                  else if($ex_list_listing_status=='5'){ $ex_list_listing_status="Sold (by Others)"; $ex_list_rent_till="--";}
                  else if($ex_list_listing_status=='6'){ $ex_list_listing_status="own use"; $ex_list_rent_till="--";}
                  else if($ex_list_listing_status=='7'){ $ex_list_listing_status="unknown"; $ex_list_rent_till="--";}
                  else if($ex_list_listing_status=='8'){ $ex_list_listing_status="ไม่รับสาย"; $ex_list_rent_till="--";}
                  else if($ex_list_listing_status=='9'){ $ex_list_listing_status="ไม่สะดวกคุย"; $ex_list_rent_till="--"; }
                  else if($ex_list_listing_status=='10'){ $ex_list_listing_status="ปิดเครื่อง"; $ex_list_rent_till="--";}
                  else if($ex_list_listing_status=='11'){ $ex_list_listing_status="สายไม่ว่าง"; $ex_list_rent_till="--";}
                  else if($ex_list_listing_status=='12'){ $ex_list_listing_status="เบอร์ผิด"; $ex_list_rent_till="--"; }
                  else if($ex_list_listing_status=='13'){ $ex_list_listing_status="ไม่รับ agent";$ex_list_rent_till="--"; }
                  else if($ex_list_listing_status=='14'){ $ex_list_listing_status="ยังไม่ปล่อยขาย/เช่า";  $ex_list_rent_till="--";}
                  

                 $sql_="SELECT * FROM dbo_register where register_id ='$record_user_id' ";
                 $result_= $conn->query($sql_); 
                // output data of each row
                 $rs_=$result_->fetch_assoc();
                  
                 $register_name=$rs_['register_name']; 

                     

          ?>
                      <tr data-widget="expandable-table" aria-expanded="false" style="font-size: 12px;">
                        <td><?php echo $record_date;?></td>
                        <td><?php echo $ex_list_listing_status;?></td>
                        <td><?php echo $ex_list_rent_till;?></td>
                        <td><?php echo $register_name;?></td>
                        <td><?php echo $record_remark;?></td>
                      </tr>
           <?php     
                  } ?>  


      <?php 


                 $sql_record_check="SELECT * FROM dbo_record where ex_list_id='$id' and record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%' order by record_date DESC ";
                 $result_record_check= $conn->query($sql_record_check); 
                // output data of each row
                 $rs_record_check=$result_record_check->fetch_assoc();

                  $record_date=$rs_record_check['record_date'];
                  $ex_list_listing_status=$rs_record_check['ex_list_listing_status'];
                  $ex_list_rent_till=$rs_record_check['ex_list_rent_till'];
                  $record_user_id=$rs_record_check['record_user_id'];
                  $record_remark=$rs_record_check['record_remark'];


                   $record_date_check=substr($record_date,0 , 10);

                   

                   $ex_list_date_create_s=substr($ex_list_date_create,0 , 10);
                   $ex_list_date_update_s=substr($ex_list_date_update,0 , 10);

                   if($ex_list_date_update_s==$record_date_check){
   
                   }else if($ex_list_date_create_s!=$record_date_check){


                        if($ex_list_listing_status=='1'){ $listing_status="Available";   $ex_list_rent_till="--";}
                        else if($ex_list_listing_status=='0'){ $listing_status="No Status"; }
                        else if($ex_list_listing_status=='2'){ $listing_status="Contracted ไม่ล็อคสิทธิ"; $ex_list_rent_till="--"; }
                        else if($ex_list_listing_status=='3'){ $listing_status="Rented"; }
                        else if($ex_list_listing_status=='4'){ $listing_status="Sold (by Connex)"; $ex_list_rent_till="--"; }
                        else if($ex_list_listing_status=='5'){ $listing_status="Sold (by Others)"; $ex_list_rent_till="--";}
                        else if($ex_list_listing_status=='6'){ $ex_list_listing_status="own use"; $ex_list_rent_till="--";}
                        else if($ex_list_listing_status=='7'){ $ex_list_listing_status="unknown"; $ex_list_rent_till="--";}
                        else if($ex_list_listing_status=='8'){ $ex_list_listing_status="ไม่รับสาย"; $ex_list_rent_till="--";}
                        else if($ex_list_listing_status=='9'){ $ex_list_listing_status="ไม่สะดวกคุย"; $ex_list_rent_till="--"; }
                        else if($ex_list_listing_status=='10'){ $ex_list_listing_status="ปิดเครื่อง"; $ex_list_rent_till="--";}
                        else if($ex_list_listing_status=='11'){ $ex_list_listing_status="สายไม่ว่าง"; $ex_list_rent_till="--";}
                        else if($ex_list_listing_status=='12'){ $ex_list_listing_status="เบอร์ผิด"; $ex_list_rent_till="--"; }
                        else if($ex_list_listing_status=='13'){ $ex_list_listing_status="ไม่รับ agent";$ex_list_rent_till="--"; }
                        else if($ex_list_listing_status=='14'){ $ex_list_listing_status="ยังไม่ปล่อยขาย/เช่า";  $ex_list_rent_till="--";}

    ?>



                    <tr data-widget="expandable-table" aria-expanded="false" style="font-size: 12px;">
                      <td><?php echo $ex_list_date_create;?></td>
                      <td><?php if($listing_status=='Available'){ echo $listing_status; 
                               }else if($listing_status==''){ echo "No status"; 
                               }else if($ex_list_date_create=='2022-08-10 20:26:39'){ echo "No status";
                               }else{ echo "Available"; } ?></td>
                      <td><?php if($listing_status=='Available'){ echo $ex_list_rent_till; }else{  }?></td>
                      <td><?php echo $register_name_r;?></td>
                      <td>วันที่สร้าง</td>
                    </tr>

            <?php } ?>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->



            </div>
          </div>

      </form>
               
            


         </div>
      </div>
 

</div>


<?php } ?>




</body>


   <script type="text/javascript">

        $("#p_ex_list_rent_till").hide();.
        

$(document).ready(function(){
 

$("#ex_list_listing_status").change(function(){
      var ex_list_listing_type = $("#ex_list_listing_status").val();
 
      if(ex_list_listing_type == "3"){

        $("#p_ex_list_rent_till").show();
 
          document.getElementById("ex_list_rent_till").disabled = false;
        //$("#txt_box").val("");
        /*
        $("#box").show();
        $("#txt_box").val("").focus(); */
      }else{
        /* $("#box").hide();
        $("#txt_box").val(""); */
        $("#p_ex_list_rent_till").hide();
      }
    });

    </script>




  
<script src="../template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../template/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../template/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../template/plugins/moment/moment.min.js"></script>
<script src="../template/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="../template/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../template/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../template/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="../template/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="../template/plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="../template/dist/js/adminlte.min.js"></script>



<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'DD/MM/YYYY'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>


</html>