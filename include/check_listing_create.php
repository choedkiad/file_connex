<?php
ini_set('session.gc_maxlifetime', 10000000);

session_start(); 

 include 'config.php'; 
 include 'setting.php'; 
 
isset( $_SESSION['USER_ID'] ) ? $USER_ID = $_SESSION['USER_ID'] : $USER_ID = "";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CONNEX PROPERTY</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../template/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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


  <!-- Select2 -->
  <link rel="stylesheet" href="../template/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">


</head>

<body class="hold-transition sidebar-mini layout-fixed">


<?php if($_SESSION['USER_ID']==""){  

             include("../page/login.php");

     }else{   

      //L1
?>

<div class="wrapper"> 


<?php include('../page/menu_left.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo $title;?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $title;?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  


    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">


 

<?php

   if($ex_list_double_no!='4' or $ex_list_price_2!=$ex_list_price or $ex_list_sqm_2!=$ex_list_sqm or $ex_list_floor2!=$ex_list_floor  or $ex_list_house_number_2!=$ex_list_house_number){  // เช็คว่าเคย เช็คซ้ำไปรึยัง 
  ?>


    

<?php

 /*
     $sql_data_check="SELECT * FROM dbo_data_excel_listing 
                     where (ex_list_house_number LIKE '%$ex_list_house_number%' and  ex_list_deal_type LIKE '%$ex_list_deal_type%'
                                and  project_id='$project' and ex_list_floor='$ex_list_floor' and ex_list_listing_code!='$id' )
                           or (project_id='0' and ex_list_house_number LIKE '%$ex_list_house_number%' and ex_list_alley LIKE '%$ex_list_alley%' 
                                and ex_list_alley LIKE '%$ex_list_alley%' and ex_list_road LIKE '%$ex_list_road%' 
                                and ex_list_subdistrict LIKE '%$districts%'  and ex_list_road LIKE '%$ex_list_road%' and ex_list_floor='$ex_list_floor' and ex_list_listing_code!='$id' )  "; 
     $result_data_check=$conn->query($sql_data_check);   */

                    $check_list_price=$ex_list_price;
                    $check_list_house_number=$ex_list_house_number; 
                    $check_list_contact_tel=$ex_list_contact_tel;
                    $check_list_contact_tel1_2=$ex_list_contact_tel1_2;
                    $check_list_contact_tel1_3=$ex_list_contact_tel1_3;
                    $check_list_contact_tel1_4=$ex_list_contact_tel1_4;
                    $check_list_contact_tel_2=$ex_list_contact_tel_2;
                    $check_list_contact_tel2_2=$ex_list_contact_tel2_2;
                    $check_list_contact_tel2_3=$ex_list_contact_tel2_3;
                    $check_list_contact_tel2_4=$ex_list_contact_tel2_4;
                    $check_list_bedroom=$ex_list_bedroom; 
                    $check_list_deal_type=$ex_list_deal_type;
                    $check_list_sqm=$ex_list_sqm;
       
                   $check_list_contact_tel_show=$check_list_contact_tel.",".$check_list_contact_tel1_2.",".$check_list_contact_tel1_3.",".$check_list_contact_tel1_4.",".$check_list_contact_tel_2.",".$check_list_contact_tel2_2.",".$check_list_contact_tel2_3.",".$check_list_contact_tel2_4.",";

                    $floor=$ex_list_floor;
             
                   $per_sqm=$check_list_sqm*5/100;
                   $per_1=$check_list_sqm+$per_sqm;
                   $per_2=$check_list_sqm-$per_sqm;


        

               
                    $check_n_r=strpos($check_list_house_number,"/");

                    $number_r_1=substr($check_list_house_number,0 , $check_n_r);
                    $number_r_2=substr($check_list_house_number,$check_n_r+1 ,15 );

                    $number_r_2 = str_replace(" ","",$number_r_2,$count); 
 
  
          $sql_data_check="SELECT * FROM dbo_data_excel_listing where project_id='$project' and ex_list_deal_type='$check_list_deal_type' and ex_list_listing_code!='$id' and ex_list_close!='1'  "; 
          $result_data_check=$conn->query($sql_data_check); 

          $num=$result_data_check->num_rows;
 
           $no=0;
        
           if($result_data_check->num_rows > 0) {    //L2



         if($ex_list_listing_status=='' or $ex_list_listing_status=='0'){ $ex_list_listing_status="No Status";  }
         else if($ex_list_listing_status=='1'){ $ex_list_listing_status="Available"; $stauts_list_color="#42d700"; }
         else if($ex_list_listing_status=='2'){ $ex_list_listing_status="Contracted ไม่ล็อคสิทธิ"; $stauts_list_color="#42d700"; }
         else if($ex_list_listing_status=='3'){ $ex_list_listing_status="Rented";  $ex_list_rent_till=$ex_list_rent_till; $stauts_list_color="#ff0000"; }
         else if($ex_list_listing_status=='4'){ $ex_list_listing_status="Sold(by Connex)";  $stauts_list_color="#ff0000"; }
         else if($ex_list_listing_status=='5'){ $ex_list_listing_status="Sold(by Others)"; $stauts_list_color="#ff0000"; }
         else if($ex_list_listing_status=='6'){ $ex_list_listing_status="own use"; $stauts_list_color="#ff0000"; }
         else if($ex_list_listing_status=='7'){ $ex_list_listing_status="unknown"; $stauts_list_color="#000cff"; }     
         else if($ex_list_listing_status=='8'){ $ex_list_listing_status="ไม่รับสาย"; $stauts_list_color="#000cff"; }
         else if($ex_list_listing_status=='9'){ $ex_list_listing_status="ไม่สะดวกคุย"; $stauts_list_color="#000cff"; }
         else if($ex_list_listing_status=='10'){ $ex_list_listing_status="ปิดเครื่อง"; $stauts_list_color="#000cff"; }
         else if($ex_list_listing_status=='11'){ $ex_list_listing_status="สายไม่ว่าง"; $stauts_list_color="#000cff"; }
         else if($ex_list_listing_status=='12'){ $ex_list_listing_status="เบอร์ผิด"; $stauts_list_color="#000cff"; }
         else if($ex_list_listing_status=='13'){ $ex_list_listing_status="ไม่รับ agent"; $stauts_list_color="#000cff"; }
         else if($ex_list_listing_status=='14'){ $ex_list_listing_status="ยังไม่ปล่อยขาย/เช่า"; $stauts_list_color="#000cff"; }

      /////////// type_project ////////////////
             $sql_project="SELECT project_name ,project_id, project_name_en FROM type_project where project_id='$project' ";  
             $result_project= $conn->query($sql_project);
             $rs_project=$result_project->fetch_assoc();

             $project_id=$rs_project['project_id'];
             $project_name=$rs_project['project_name'];
             $project_name_en=$rs_project['project_name_en'];

             $ex_list_project=$project_name." | ".$project_name_en;
  


      /////////// type_asset ////////////////
             $sql_ass="SELECT * FROM type_asset where id='$ex_list_listing_type' ";  
             $result_ass= $conn->query($sql_ass);
             $rs_ass=$result_ass->fetch_assoc();

             if($rs_ass['id']!=''){ $ex_list_listing_type=$rs_ass['name'];}
      ////////// End type_asset ////////////////

   
             if($ex_list_deal_type=='1'){ $ex_list_deal_type="ขาย";}else{$ex_list_deal_type="เช่า";}        

          if($check_list_bedroom>0){$ex_list_bedroom_c=$ex_list_bedroom."bed";}else{ $ex_list_bedroom_c=$ex_list_bedroom; }
?>

            <div class="card card-primary ">
              <!--
              <div class="card-header">
                <h5 class="card-title m-0">ตรวจสอบ LISTING ซ้ำกัน</h5>
              </div>
            -->

 
            <div class="card-body" >

               <div class="card-header"> 
                  <h5 class="card-title" >โพสต์ที่กำลัง Add ขณะนี้</h5>
                </div>   
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr style="font-size: 14px;">
                      <th>No</th>
                      <th>Status</th>
                      <th>Type</th>
                      <th>Deal</th>
                      <th>Project</th>
                      <th>House No.</th>
                      <th>Room</th> 
                      <th>ชั้น </th>  
                      <th>พื้นที่ใช้ </th>  
                      <th>Price</th>
                      <th>Owner</th>  
                      <th>เลขบ้านซ้ำ</th>    
                      <th>ชั้นซ้ำ</th> 
                      <th>พื้นที่</th>
                      <th>Owner ซ้ำ</th>          
                    </tr>
                  </thead>
                  <tbody> 

                            <tr data-widget="expandable-table" aria-expanded="false" style="font-size: 12px;">                  
                                 <td><center style="width: 50px;"><a href="../?page=upload_file_excel_check_view&listing=<?php echo $id;?>" target="_blank"><?php echo $id;?></a></center></td>
                                <td ><center>           
                                <?php echo $ex_list_listing_status;?>
                                  <br><?php echo $ex_list_rent_till;?>                                  
                                </center></td>
                                <td><center style="width: 50px;"><?php echo $ex_list_listing_type;?></center></td>
                                <td><center style="width: 30px;"><?php echo $ex_list_deal_type;?></center></td>
                                <td > <center style="width: 180px; " ><a title="<?php echo $ex_list_contact_name;?>"><?php echo "".$ex_list_project;?></a></center></td> 
                                <td><center style="width: 50px; " ><?php echo $check_list_house_number;?></center></td>
                                <td><?php echo $ex_list_bedroom_c. "<br/>".$ex_list_bathroom_c;?></td>
                                <td><?php echo $floor;?></td>
                                <td><?php echo $ex_list_sqm;?></td>     
                                <td><a onclick="window.open('page/listing_prices.php?id=<?php echo $ex_list_listing_code;?>', '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');">
                                  <?php echo number_format($ex_list_price);?></a></td>   
                               
                                <td><center style="width: 100px; " ><?php echo $ex_list_contact_name." ".$check_list_contact_tel_show;?> </center></td>  
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                           </tr>
                   </tbody>
                </table>


               <div class="card-header">
                  <h5 class="card-title m-0">CX คาดว่าจะซ้ำ</h5>
                </div>   

                <table class="table table-bordered table-hover">
                  <thead>
                    <tr style="font-size: 14px;">
                      <th>No</th>
                      <th>Status</th>
                      <th>Type</th>
                      <th>Deal</th>
                      <th>Project</th>
                      <th>House No.</th>
                      <th>Room</th>  
                      <th>ชั้น </th>  
                      <th>พื้นที่ใช้ </th>  
                      <th>Price</th>
                      <th>Owner</th>
                      <th>เลขบ้านซ้ำ</th>    
                      <th>ชั้นซ้ำ</th> 
                      <th>พื้นที่</th>
                      <th>Owner ซ้ำ</th>
                    </tr>
                  </thead>
                  <tbody> 

<?php

                while($rs_listing=$result_data_check->fetch_assoc()){   $no++;

                //L3

       
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
                   $ex_list_deal_type=$rs_listing['ex_list_deal_type'];  
                   $ex_list_listing_status=$rs_listing['ex_list_listing_status'];  
                   $ex_list_price=$rs_listing['ex_list_price']; 

                   $ex_list_listing_code=$rs_listing['ex_list_listing_code'];
                   $ex_list_contract_type=$rs_listing['ex_list_contract_type'];
                   $ex_list_contract_code=$rs_listing['ex_list_contract_code'];
                   $ex_list_email_address=$rs_listing['ex_list_email_address'];
                   $ex_list_deal_type=$rs_listing['ex_list_deal_type'];
                   $ex_list_listing_type=$rs_listing['ex_list_listing_type'];
                   $ex_list_project=$rs_listing['ex_list_project'];
                   $ex_list_alley=$rs_listing['ex_list_alley'];
                   $ex_list_road=$rs_listing['ex_list_road'];
                   $ex_list_subdistrict=$rs_listing['ex_list_subdistrict'];
                   $ex_list_district=$rs_listing['ex_list_district'];
                   $ex_list_province=$rs_listing['ex_list_province'];
                   $ex_list_train_station=$rs_listing['ex_list_train_station'];
                   $ex_list_googlmap=$rs_listing['ex_list_googlmap'];
                   $ex_list_number_buildings=$rs_listing['ex_list_number_buildings'];
                   $ex_list_floor=$rs_listing['ex_list_floor'];
                   $ex_list_total_floors=$rs_listing['ex_list_total_floors'];
                   $ex_list_rai=$rs_listing['ex_list_rai'];
                   $ex_list_ngan=$rs_listing['ex_list_ngan'];
                   $ex_list_wa=$rs_listing['ex_list_wa'];
                   $ex_list_house_number=$rs_listing['ex_list_house_number'];
                   $ex_list_sqm=$rs_listing['ex_list_sqm'];
                   $ex_list_view=$rs_listing['ex_list_view'];
                   $ex_list_bedroom=$rs_listing['ex_list_bedroom'];
                   $ex_list_bathroom=$rs_listing['ex_list_bathroom'];
                   $ex_list_other_room=$rs_listing['ex_list_other_room'];
                   $ex_list_parking=$rs_listing['ex_list_parking'];
                   $ex_list_furniture=$rs_listing['ex_list_furniture'];
                   $ex_list_pets=$rs_listing['ex_list_pets'];
                   $ex_list_direction=$rs_listing['ex_list_direction'];
                   $ex_list_strengths=$rs_listing['ex_list_strengths'];
                   $ex_list_gdrive_th=$rs_listing['ex_list_gdrive_th'];
                   $ex_list_gdrive_en=$rs_listing['ex_list_gdrive_en'];
                   $ex_list_facilities=$rs_listing['ex_list_facilities'];
                   $ex_list_nearby_places=$rs_listing['ex_list_nearby_places'];
                   $ex_list_details=$rs_listing['ex_list_details'];
                   $ex_list_heading=$rs_listing['ex_list_heading'];
                   $ex_list_price=$rs_listing['ex_list_price'];
                   $ex_list_common_fee=$rs_listing['ex_list_common_fee'];
                   $ex_list_contact=$rs_listing['ex_list_contact'];
                   $ex_list_contact_name=$rs_listing['ex_list_contact_name'];
                   $ex_list_contact_tel=$rs_listing['ex_list_contact_tel'];
                   $ex_list_contact_email=$rs_listing['ex_list_contact_email'];
                   $ex_list_contact_lineid=$rs_listing['ex_list_contact_lineid'];
                   $ex_list_located=$rs_listing['ex_list_located'];
                   $ex_list_zone=$rs_listing['ex_list_zone'];
                   $ex_list_listing_status=$rs_listing['ex_list_listing_status'];
                   $ex_list_rent_till=$rs_listing['ex_list_rent_till'];
                   $project_id=$rs_listing['project_id'];
                   $ex_list_date_update=$rs_listing['ex_list_date_update'];

  
                   $ex_list_contact_tel_show=$ex_list_contact_tel.",".$ex_list_contact_tel1_2.",".$ex_list_contact_tel1_3.",".$ex_list_contact_tel1_4.",".$ex_list_contact_tel_2.",".$ex_list_contact_tel2_2.",".$ex_list_contact_tel2_3.",".$ex_list_contact_tel2_4.",";



/*

    if($_SESSION['STATUS_ID']=='2' or $_SESSION['STATUS_ID']=='3' or $_SESSION['STATUS_ID']=='4' 
      or $_SESSION['STATUS_ID']==$ex_list_contact ){   
         if($ex_list_contact_name!=''){ $ex_list_contact_name="Owner Name : ".$ex_list_contact_name." Tel : ".$ex_list_contact_tel;}
     }else{ $ex_list_contact_name="-"; }  */
         
         if($ex_list_listing_status=='' or $ex_list_listing_status=='0'){ $ex_list_listing_status="No Status";  }
         else if($ex_list_listing_status=='1'){ $ex_list_listing_status="Available"; $stauts_list_color="#42d700"; }
         else if($ex_list_listing_status=='2'){ $ex_list_listing_status="Contracted ไม่ล็อคสิทธิ"; $stauts_list_color="#42d700"; }
         else if($ex_list_listing_status=='3'){ $ex_list_listing_status="Rented";  $ex_list_rent_till=$ex_list_rent_till; $stauts_list_color="#ff0000"; }
         else if($ex_list_listing_status=='4'){ $ex_list_listing_status="Sold(by Connex)";  $stauts_list_color="#ff0000"; }
         else if($ex_list_listing_status=='5'){ $ex_list_listing_status="Sold(by Others)"; $stauts_list_color="#ff0000"; }
         else if($ex_list_listing_status=='6'){ $ex_list_listing_status="own use"; $stauts_list_color="#ff0000"; }
         else if($ex_list_listing_status=='7'){ $ex_list_listing_status="unknown"; $stauts_list_color="#000cff"; }
         else if($ex_list_listing_status=='8'){ $ex_list_listing_status="ไม่รับสาย"; $stauts_list_color="#000cff"; }
         else if($ex_list_listing_status=='9'){ $ex_list_listing_status="ไม่สะดวกคุย"; $stauts_list_color="#000cff"; }
         else if($ex_list_listing_status=='10'){ $ex_list_listing_status="ปิดเครื่อง"; $stauts_list_color="#000cff"; }
         else if($ex_list_listing_status=='11'){ $ex_list_listing_status="สายไม่ว่าง"; $stauts_list_color="#000cff"; }
         else if($ex_list_listing_status=='12'){ $ex_list_listing_status="เบอร์ผิด"; $stauts_list_color="#000cff"; }
         else if($ex_list_listing_status=='13'){ $ex_list_listing_status="ไม่รับ agent"; $stauts_list_color="#000cff"; }
         else if($ex_list_listing_status=='14'){ $ex_list_listing_status="ยังไม่ปล่อยขาย/เช่า"; $stauts_list_color="#000cff"; }
            
          if($ex_list_price!=''){ $ex_list_price=number_format($ex_list_price);}else{$ex_list_price="ยังไม่ระบุราคา";}


          if($ex_list_deal_type=='1'){ $ex_list_deal_type="ขาย";}else{$ex_list_deal_type="เช่า";}

          if($ex_list_sqm!='' or $ex_list_sqm=='0'){  $ex_list_sqm=$ex_list_sqm."ตร.ม."; }
        
          if($ex_list_bedroom>0){$ex_list_bedroom_c=$ex_list_bedroom."bed";}else{ $ex_list_bedroom_c=$ex_list_bedroom; }
          if($ex_list_bathroom>0){$ex_list_bathroom_c=$ex_list_bathroom."bath";}else{ $ex_list_bathroom_c=$ex_list_bathroom; }

      /////////// type_project ////////////////
             $sql_project="SELECT project_name ,project_id, project_name_en , project_type FROM type_project where project_id='$project_id' ";  
             $result_project= $conn->query($sql_project);
             $rs_project=$result_project->fetch_assoc();

             $project_id=$rs_project['project_id'];
             $project_type=$rs_project['project_type'];
             $project_train_station=$rs_project['project_train_station'];
             $project_name=$rs_project['project_name'];
             $project_name_en=$rs_project['project_name_en'];
             $project_alley=$rs_project['project_alley'];
             $project_road=$rs_project['project_road'];
             $project_subdistrict=$rs_project['project_subdistrict'];
             $project_district=$rs_project['project_district'];
             $project_province=$rs_project['project_province'];
             $project_train_station=$rs_project['project_train_station'];
             $project_facilities=$rs_project['project_facilities'];
             $project_nearby_places=$rs_project['project_nearby_places'];
             $project_zone=$rs_project['project_zone'];        



        if($project_id!=''){ 

               $ex_list_project=$rs_project['project_name']." | ".$rs_project['project_name_en'];
      /////////// End type_project ////////////////

               $ex_list_listing_type=$project_type; 

      /////////// type_asset ////////////////
             $sql_ass="SELECT * FROM type_asset where id='$ex_list_listing_type' ";  
             $result_ass= $conn->query($sql_ass);
             $rs_ass=$result_ass->fetch_assoc();

             if($rs_ass['id']!=''){ $ex_list_listing_type=$rs_ass['name'];}
      ////////// End type_asset ////////////////


      /////////// type_train_station ////////////////
             $sql_train="SELECT * FROM type_train_station where station_id='$project_train_station' ";  
             $result_train= $conn->query($sql_train);
             $rs_train=$result_train->fetch_assoc(); 

             $station_name=$rs_train['station_train'];
             $station_name_en=$rs_train['station_name_en'];
  
             if($station_name!=''){ $ex_list_train_station=$rs_train['station_train']." | ".$rs_train['station_name_en'];}
      /////////// End type_train_station ////////////////
 
      //////////////    ////////////////////////////
             $sql_register="SELECT * FROM dbo_register where register_id='$ex_list_contact' ";  
             $result_register= $conn->query($sql_register);
             $rs_register=$result_register->fetch_assoc(); 

             $ex_list_contact=$rs_register['register_name']." | ".$rs_register['register_email'];

         }         

 

                        if($ex_list_house_number!=''){ 

                           $house_number_n_r=strpos($ex_list_house_number,"/");
                           $house_number_r_1=substr($ex_list_house_number,0 , $house_number_n_r);
                           $house_number_r_2=substr($ex_list_house_number,$house_number_n_r+1 ,15);

                           $house_number_r_2 = str_replace(" ","",$house_number_r_2,$count);  

                        }
                        $ex_list_sqm=$rs_listing['ex_list_sqm'];



               if($house_number_r_2==$number_r_2 and  $check_list_house_number!='' and $check_list_house_number!='-' and  $check_list_house_number!='_'){  //L4

                   
                        if( $check_list_contact_tel==$ex_list_contact_tel and $check_list_contact_tel!='' 
                              or $check_list_contact_tel==$ex_list_contact_tel1_2 and $check_list_contact_tel!='' 
                              or $check_list_contact_tel==$ex_list_contact_tel1_3 and $check_list_contact_tel!='' 
                              or $check_list_contact_tel==$ex_list_contact_tel1_4 and $check_list_contact_tel!='' 
                              or $check_list_contact_tel==$ex_list_contact_tel_2 and $check_list_contact_tel!=''
                              or $check_list_contact_tel==$ex_list_contact_tel2_2 and $check_list_contact_tel!=''
                              or $check_list_contact_tel==$ex_list_contact_tel2_3 and $check_list_contact_tel!=''
                              or $check_list_contact_tel==$ex_list_contact_tel2_4 and $check_list_contact_tel!=''
                              or $check_list_contact_tel1_2==$ex_list_contact_tel  and $check_list_contact_tel1_2!=''
                              or $check_list_contact_tel1_2==$ex_list_contact_tel1_2  and $check_list_contact_tel1_2!=''
                              or $check_list_contact_tel1_2==$ex_list_contact_tel1_3  and $check_list_contact_tel1_2!=''
                              or $check_list_contact_tel1_2==$ex_list_contact_tel1_4  and $check_list_contact_tel1_2!=''
                              or $check_list_contact_tel1_2==$ex_list_contact_tel_2  and $check_list_contact_tel1_2!=''
                              or $check_list_contact_tel1_2==$ex_list_contact_tel2_2  and $check_list_contact_tel1_2!=''
                              or $check_list_contact_tel1_2==$ex_list_contact_tel2_3  and $check_list_contact_tel1_2!=''
                              or $check_list_contact_tel1_2==$ex_list_contact_tel2_4  and $check_list_contact_tel1_2!=''
                              or $check_list_contact_tel1_2==$ex_list_contact_tel_2  and $check_list_contact_tel1_2!=''
                              or $check_list_contact_tel1_2==$ex_list_contact_tel2_2  and $check_list_contact_tel1_2!=''
                              or $check_list_contact_tel1_2==$ex_list_contact_tel2_3  and $check_list_contact_tel1_2!=''
                              or $check_list_contact_tel1_2==$ex_list_contact_tel2_4  and $check_list_contact_tel1_2!=''
                              or $check_list_contact_tel1_3==$ex_list_contact_tel  and $check_list_contact_tel1_3!=''
                              or $check_list_contact_tel1_3==$ex_list_contact_tel1_2  and $check_list_contact_tel1_3!=''
                              or $check_list_contact_tel1_3==$ex_list_contact_tel1_3  and $check_list_contact_tel1_3!=''
                              or $check_list_contact_tel1_3==$ex_list_contact_tel1_4  and $check_list_contact_tel1_3!=''
                              or $check_list_contact_tel1_3==$ex_list_contact_tel_2  and $check_list_contact_tel1_3!=''
                              or $check_list_contact_tel1_3==$ex_list_contact_tel2_2  and $check_list_contact_tel1_3!=''
                              or $check_list_contact_tel1_3==$ex_list_contact_tel2_3  and $check_list_contact_tel1_3!=''
                              or $check_list_contact_tel1_3==$ex_list_contact_tel2_4  and $check_list_contact_tel1_3!=''
                              or $check_list_contact_tel1_4==$ex_list_contact_tel  and $check_list_contact_tel1_4!=''
                              or $check_list_contact_tel1_4==$ex_list_contact_tel1_2  and $check_list_contact_tel1_4!=''
                              or $check_list_contact_tel1_4==$ex_list_contact_tel1_3  and $check_list_contact_tel1_4!=''
                              or $check_list_contact_tel1_4==$ex_list_contact_tel1_4  and $check_list_contact_tel1_4!=''
                              or $check_list_contact_tel1_4==$ex_list_contact_tel_2  and $check_list_contact_tel1_4!=''
                              or $check_list_contact_tel1_4==$ex_list_contact_tel2_2  and $check_list_contact_tel1_4!=''
                              or $check_list_contact_tel1_4==$ex_list_contact_tel2_3  and $check_list_contact_tel1_4!=''
                              or $check_list_contact_tel1_4==$ex_list_contact_tel2_4  and $check_list_contact_tel1_4!=''
                              or $check_list_contact_tel_2==$ex_list_contact_tel1_2 and $check_list_contact_tel_2!='' 
                              or $check_list_contact_tel_2==$ex_list_contact_tel1_2 and $check_list_contact_tel_2!='' 
                              or $check_list_contact_tel_2==$ex_list_contact_tel1_3 and $check_list_contact_tel_2!='' 
                              or $check_list_contact_tel_2==$ex_list_contact_tel1_4 and $check_list_contact_tel_2!='' 
                              or $check_list_contact_tel_2==$ex_list_contact_tel_2 and $check_list_contact_tel_2!=''
                              or $check_list_contact_tel_2==$ex_list_contact_tel2_2 and $check_list_contact_tel_2!=''
                              or $check_list_contact_tel_2==$ex_list_contact_tel2_3 and $check_list_contact_tel_2!=''
                              or $check_list_contact_tel_2==$ex_list_contact_tel2_4 and $check_list_contact_tel_2!=''
                              or $check_list_contact_tel2_2==$ex_list_contact_tel  and $check_list_contact_tel2_2!=''
                              or $check_list_contact_tel2_2==$ex_list_contact_tel1_2  and $check_list_contact_tel2_2!=''
                              or $check_list_contact_tel2_2==$ex_list_contact_tel1_3  and $check_list_contact_tel2_2!=''
                              or $check_list_contact_tel2_2==$ex_list_contact_tel1_4  and $check_list_contact_tel2_2!=''
                              or $check_list_contact_tel2_2==$ex_list_contact_tel_2  and $check_list_contact_tel2_2!=''
                              or $check_list_contact_tel2_2==$ex_list_contact_tel2_2  and $check_list_contact_tel2_2!=''
                              or $check_list_contact_tel2_2==$ex_list_contact_tel2_3  and $check_list_contact_tel2_2!=''
                              or $check_list_contact_tel2_2==$ex_list_contact_tel2_4  and $check_list_contact_tel2_2!='' 
                              or $check_list_contact_tel2_3==$ex_list_contact_tel  and $check_list_contact_tel2_3!=''
                              or $check_list_contact_tel2_3==$ex_list_contact_tel1_2  and $check_list_contact_tel2_3!=''
                              or $check_list_contact_tel2_3==$ex_list_contact_tel1_3  and $check_list_contact_tel2_3!=''
                              or $check_list_contact_tel2_3==$ex_list_contact_tel1_4  and $check_list_contact_tel2_3!=''
                              or $check_list_contact_tel2_3==$ex_list_contact_tel_2  and $check_list_contact_tel2_3!=''
                              or $check_list_contact_tel2_3==$ex_list_contact_tel2_2  and $check_list_contact_tel2_3!=''
                              or $check_list_contact_tel2_3==$ex_list_contact_tel2_3  and $check_list_contact_tel2_3!=''
                              or $check_list_contact_tel2_3==$ex_list_contact_tel2_4  and $check_list_contact_tel2_3!=''
                              or $check_list_contact_tel2_4==$ex_list_contact_tel  and $check_list_contact_tel2_4!=''
                              or $check_list_contact_tel2_4==$ex_list_contact_tel1_2  and $check_list_contact_tel2_4!=''
                              or $check_list_contact_tel2_4==$ex_list_contact_tel1_3  and $check_list_contact_tel2_4!=''
                              or $check_list_contact_tel2_4==$ex_list_contact_tel1_4  and $check_list_contact_tel2_4!=''
                              or $check_list_contact_tel2_4==$ex_list_contact_tel_2  and $check_list_contact_tel2_4!=''
                              or $check_list_contact_tel2_4==$ex_list_contact_tel2_2  and $check_list_contact_tel2_4!=''
                              or $check_list_contact_tel2_4==$ex_list_contact_tel2_3  and $check_list_contact_tel2_4!=''
                              or $check_list_contact_tel2_4==$ex_list_contact_tel2_4  and $check_list_contact_tel2_4!=''

                             
                            ) {  $no++;   $double_cx=$ex_list_listing_code;   //L5   //ซ้ำหัวข้อที่1 ซ้ำแน่นอน del ออกเลย
                               
                               $double_no='1';

                                 if($floor==$ex_list_floor){ $true_2="../../../images/icon/icon-true.png";}else{ $true_2="../../../images/icon/icon-no.png"; }
                                 if($ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1){ $true_3="../../../images/icon/icon-true.png";}else{ $true_3="../../../images/icon/icon-no.png"; }

                      ?>    
                            <tr data-widget="expandable-table" aria-expanded="false" style="font-size: 12px;">
                                <td><center style="width: 50px;"><a href="../?page=upload_file_excel_check_view&listing=<?php echo $ex_list_listing_code;?>" target="_blank"><?php echo $ex_list_listing_code;?></a></center></td>
                                <td ><center>

           
                                <?php echo $ex_list_listing_status;?>
                                  <br><?php echo $ex_list_rent_till;?>
                                  
                                </center></td>
                                <td><center style="width: 50px;"><?php echo $ex_list_listing_type;?></center></td>
                                <td><center style="width: 30px;"><?php echo $ex_list_deal_type;?></center></td>
                                <td > <center style="width: 180px; "><a title="<?php echo $ex_list_contact_name;?>"><?php echo "".$ex_list_project;?></a></center></td> 
                                <td><center style="width: 50px; " ><?php echo $ex_list_house_number;?></center></td>
                                <td><?php echo $ex_list_bedroom_c."<br/>".$ex_list_bathroom_c;?></td>
                                <td><?php echo $ex_list_floor;?></td>
                                <td><?php echo $ex_list_sqm;?></td>     
                                <td><a onclick="window.open('page/listing_prices.php?id=<?php echo $ex_list_listing_code;?>', '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');">
                                  <?php echo $ex_list_price;?></a></td>   
                               
                                <td><center style="width: 100px; " ><?php echo $ex_list_contact_name." ".$ex_list_contact_tel_show;?> </center></td>  
                                <td><center><img src="../../../images/icon/icon-true.png" width="20"></center></td> 
                                <td><center><img src="<?php echo $true_2;?>" width="20"></center></td> 
                                <td><center><img src="<?php echo $true_3;?>" width="20"></center></td> 
                                <td><center><img src="../../../images/icon/icon-true.png" width="20"></center></td> 
                            </tr>
                

                      <?php }else if($floor==$ex_list_floor){ $no++;  $double_no='2';    $double_cx=$ex_list_listing_code;   

                                 if($floor==$ex_list_floor){ $true_2="../../../images/icon/icon-true.png";}else{ $true_2="../../../images/icon/icon-no.png"; }
                                 if($ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1){ $true_3="../../../images/icon/icon-true.png";}else{ $true_3="../../../images/icon/icon-no.png"; }
                       ?>

                            <tr data-widget="expandable-table" aria-expanded="false" style="font-size: 12px;">
                                <td><center style="width: 50px;"><a href="../?page=upload_file_excel_check_view&listing=<?php echo $ex_list_listing_code;?>" target="_blank"><?php echo $ex_list_listing_code;?></a></center></td>
                                <td ><center>           
                                <?php echo $ex_list_listing_status;?>
                                  <br><?php echo $ex_list_rent_till;?>                                  
                                </center></td>
                                <td><center style="width: 50px;"><?php echo $ex_list_listing_type;?></center></td>
                                <td><center style="width: 30px;"><?php echo $ex_list_deal_type;?></center></td>
                                <td > <center style="width: 180px; " ><a title="<?php echo $ex_list_contact_name;?>"><?php echo "".$ex_list_project;?></a></center></td> 
                                <td><center style="width: 50px; " ><?php echo $ex_list_house_number;?></center></td>
                                <td><?php echo $ex_list_bedroom_c. "<br/>".$ex_list_bathroom_c;?></td>
                                <td><?php echo $ex_list_floor;?></td>
                                <td><?php echo $ex_list_sqm;?></td>     
                                <td><a onclick="window.open('page/listing_prices.php?id=<?php echo $ex_list_listing_code;?>', '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');">
                                  <?php echo $ex_list_price;?></a></td>   
                               
                                <td><center style="width: 100px; " ><?php echo $ex_list_contact_name." ".$ex_list_contact_tel_show;?> </center></td>  
                                <td><center><img src="../../../images/icon/icon-true.png" width="20"></center></td> 
                                <td><center><img src="<?php echo $true_2;?>" width="20"></center></center></td> 
                                <td><center><img src="<?php echo $true_3;?>" width="20"></center></center></td> 
                                <td><center><img src="../../../images/icon/icon-no.png" width="20"></center></td> 
                            </tr>


                       <?php } //L5?>
          
             <?php } else if($floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel==$ex_list_contact_tel and $check_list_contact_tel!=''  

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel==$ex_list_contact_tel1_2 and $check_list_contact_tel!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel==$ex_list_contact_tel1_3 and $check_list_contact_tel!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel==$ex_list_contact_tel1_4 and $check_list_contact_tel!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel==$ex_list_contact_tel_2 and $check_list_contact_tel!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel==$ex_list_contact_tel2_2 and $check_list_contact_tel!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel==$ex_list_contact_tel2_3 and $check_list_contact_tel!='' 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel==$ex_list_contact_tel2_4 and $check_list_contact_tel!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_2==$ex_list_contact_tel  and $check_list_contact_tel1_2!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_2==$ex_list_contact_tel1_2  and $check_list_contact_tel1_2!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_2==$ex_list_contact_tel1_3  and $check_list_contact_tel1_2!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_2==$ex_list_contact_tel1_4 and $check_list_contact_tel1_2!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_2==$ex_list_contact_tel_2  and $check_list_contact_tel1_2!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_2==$ex_list_contact_tel2_2  and $check_list_contact_tel1_2!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_2==$ex_list_contact_tel2_3  and $check_list_contact_tel1_2!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_2==$ex_list_contact_tel2_4 and $check_list_contact_tel1_2!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_3==$ex_list_contact_tel  and $check_list_contact_tel1_3!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_3==$ex_list_contact_tel1_2  and $check_list_contact_tel1_3!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_3==$ex_list_contact_tel1_3  and $check_list_contact_tel1_3!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_3==$ex_list_contact_tel1_4 and $check_list_contact_tel1_3!='' 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_3==$ex_list_contact_tel_2  and $check_list_contact_tel1_3!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_3==$ex_list_contact_tel2_2  and $check_list_contact_tel1_3!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_3==$ex_list_contact_tel2_3  and $check_list_contact_tel1_3!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_3==$ex_list_contact_tel2_4 and $check_list_contact_tel1_3!=''   


                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_4==$ex_list_contact_tel  and $check_list_contact_tel1_4!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_4==$ex_list_contact_tel1_2  and $check_list_contact_tel1_4!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_4==$ex_list_contact_tel1_3  and $check_list_contact_tel1_4!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_4==$ex_list_contact_tel1_4 and $check_list_contact_tel1_4!='' 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_4==$ex_list_contact_tel_2  and $check_list_contact_tel1_4!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_4==$ex_list_contact_tel2_2  and $check_list_contact_tel1_4!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_4==$ex_list_contact_tel2_3  and $check_list_contact_tel1_4!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_4==$ex_list_contact_tel2_4 and $check_list_contact_tel1_4!='' 


                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel_2==$ex_list_contact_tel  and $check_list_contact_tel_2!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel_2==$ex_list_contact_tel1_2  and $check_list_contact_tel_2!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel_2==$ex_list_contact_tel1_3  and $check_list_contact_tel_2!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel_2==$ex_list_contact_tel1_4 and $check_list_contact_tel_2!='' 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel_2==$ex_list_contact_tel_2  and $check_list_contact_tel_2!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel_2==$ex_list_contact_tel2_2  and $check_list_contact_tel_2!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel_2==$ex_list_contact_tel2_3  and $check_list_contact_tel_2!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel_2==$ex_list_contact_tel2_4 and $check_list_contact_tel_2!=''


                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_2==$ex_list_contact_tel  and $check_list_contact_tel2_2!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_2==$ex_list_contact_tel1_2  and $check_list_contact_tel2_2!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_2==$ex_list_contact_tel1_3  and $check_list_contact_tel2_2!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_2==$ex_list_contact_tel1_4 and $check_list_contact_tel2_2!='' 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_2==$ex_list_contact_tel_2  and $check_list_contact_tel2_2!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_2==$ex_list_contact_tel2_2  and $check_list_contact_tel2_2!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_2==$ex_list_contact_tel2_3  and $check_list_contact_tel2_2!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_2==$ex_list_contact_tel2_4 and $check_list_contact_tel2_2!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_3==$ex_list_contact_tel  and $check_list_contact_tel2_3!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_3==$ex_list_contact_tel1_2  and $check_list_contact_tel2_3!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_3==$ex_list_contact_tel1_3  and $check_list_contact_tel2_3!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_3==$ex_list_contact_tel1_4 and $check_list_contact_tel2_2!='' 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_3==$ex_list_contact_tel_2  and $check_list_contact_tel2_3!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_3==$ex_list_contact_tel2_2  and $check_list_contact_tel2_3!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_3==$ex_list_contact_tel2_3  and $check_list_contact_tel2_3!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_3==$ex_list_contact_tel2_4 and $check_list_contact_tel2_3!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_4==$ex_list_contact_tel  and $check_list_contact_tel2_4!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_4==$ex_list_contact_tel1_2  and $check_list_contact_tel2_4!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_4==$ex_list_contact_tel1_3  and $check_list_contact_tel2_4!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_4==$ex_list_contact_tel1_4 and $check_list_contact_tel2_4!='' 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_4==$ex_list_contact_tel_2  and $check_list_contact_tel2_4!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_4==$ex_list_contact_tel2_2  and $check_list_contact_tel2_4!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_4==$ex_list_contact_tel2_3  and $check_list_contact_tel2_4!=''

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_4==$ex_list_contact_tel2_4 and $check_list_contact_tel2_4!='' 

                            ){  $no++;  $double_no='3';   //L4    



                                 if($house_number_r_2!=$number_r_2 and  $check_list_house_number!='' and $check_list_house_number!='-' and  $check_list_house_number!='_'){   $double_no='4';  


                                 }else if($ex_list_bedroom==$check_list_bedroom) {   $double_cx=$ex_list_listing_code;  



                                   if($floor==$ex_list_floor){ $true_2="../../../images/icon/icon-true.png";}else{ $true_2="../../../images/icon/icon-no.png"; }
                                   if($ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1){ $true_3="../../../images/icon/icon-true.png";}else{ $true_3="../../../images/icon/icon-no.png"; }
      ?>

                             
                                      <tr data-widget="expandable-table" aria-expanded="false" style="font-size: 12px;">                  
                                           <td><center style="width: 50px;"><a href="../?page=upload_file_excel_check_view&listing=<?php echo $ex_list_listing_code;?>" target="_blank"><?php echo $ex_list_listing_code;?></a></center></td>
                                          <td ><center>           
                                          <?php echo $ex_list_listing_status;?>
                                            <br><?php echo $ex_list_rent_till;?>                                  
                                          </center></td>
                                          <td><center style="width: 50px;"><?php echo $ex_list_listing_type;?></center></td>
                                          <td><center style="width: 30px;"><?php echo $ex_list_deal_type;?></center></td>
                                          <td > <center style="width: 180px; " ><a title="<?php echo $ex_list_contact_name;?>"><?php echo "".$ex_list_project;?></a></center></td> 
                                          <td><center style="width: 50px; " ><?php echo $ex_list_house_number;?></center></td>
                                          <td><?php echo $ex_list_bedroom_c. "<br/>".$ex_list_bathroom_c;?></td>
                                          <td><?php echo $ex_list_floor;?></td>
                                          <td><?php echo $ex_list_sqm;?></td>     
                                          <td><a onclick="window.open('page/listing_prices.php?id=<?php echo $ex_list_listing_code;?>', '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');">
                                            <?php echo $ex_list_price;?></a></td>   
                                         
                                          <td><center style="width: 100px; " ><?php echo $ex_list_contact_name." ".$ex_list_contact_tel_show;?> </center></td>  
                                          <td><center><img src="../../../images/icon/icon-no.png" width="20"></center></td> 
                                          <td><center><img src="<?php echo $true_2;?>" width="20"></center></center></td> 
                                          <td><center><img src="<?php echo $true_3;?>" width="20"></center></center></td> 
                                          <td><center><img src="../../../images/icon/icon-true.png" width="20"></center></td> 
                                     </tr>

                          <?php }else if($house_number_r_2==$number_r_2 and  $check_list_house_number!='' and $check_list_house_number!='-' and  $check_list_house_number!='_'){   $double_no='3';  

                                   $double_cx=$ex_list_listing_code;  

                                   if($floor==$ex_list_floor){ $true_2="../../../images/icon/icon-true.png";}else{ $true_2="../../../images/icon/icon-no.png"; }
                                   if($ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1){ $true_3="../../../images/icon/icon-true.png";}else{ $true_3="../../../images/icon/icon-no.png"; }

                                    
                          ?>

     
                                      <tr data-widget="expandable-table" aria-expanded="false" style="font-size: 12px;">                  
                                           <td><center style="width: 50px;"><a href="../?page=upload_file_excel_check_view&listing=<?php echo $ex_list_listing_code;?>" target="_blank"><?php echo $ex_list_listing_code;?></a></center></td>
                                          <td ><center>           
                                          <?php echo $ex_list_listing_status;?>
                                            <br><?php echo $ex_list_rent_till;?>                                  
                                          </center></td>
                                          <td><center style="width: 50px;"><?php echo $ex_list_listing_type;?></center></td>
                                          <td><center style="width: 30px;"><?php echo $ex_list_deal_type;?></center></td>
                                          <td > <center style="width: 180px; " ><a title="<?php echo $ex_list_contact_name;?>"><?php echo "".$ex_list_project;?></a></center></td> 
                                          <td><center style="width: 50px; " ><?php echo $ex_list_house_number;?></center></td>
                                          <td><?php echo $ex_list_bedroom_c. "<br/>".$ex_list_bathroom_c;?></td>
                                          <td><?php echo $ex_list_floor;?></td>
                                          <td><?php echo $ex_list_sqm;?></td>     
                                          <td><a onclick="window.open('page/listing_prices.php?id=<?php echo $ex_list_listing_code;?>', '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');">
                                            <?php echo $ex_list_price;?></a></td>   
                                         
                                          <td><center style="width: 100px; " ><?php echo $ex_list_contact_name." ".$ex_list_contact_tel_show;?> </center></td>  
                                          <td><center><img src="../../../images/icon/icon-no.png" width="20"></center></td> 
                                          <td><center><img src="<?php echo $true_2;?>" width="20"></center></center></td> 
                                          <td><center><img src="<?php echo $true_3;?>" width="20"></center></center></td> 
                                          <td><center><img src="../../../images/icon/icon-true.png" width="20"></center>3.2</td> 
                                     </tr>



                        <?php }else{  $double_no='3';  $double_cx=$ex_list_listing_code;    ?>

     
                                      <tr data-widget="expandable-table" aria-expanded="false" style="font-size: 12px;">                  
                                           <td><center style="width: 50px;"><a href="../?page=upload_file_excel_check_view&listing=<?php echo $ex_list_listing_code;?>" target="_blank"><?php echo $ex_list_listing_code;?></a></center></td>
                                          <td ><center>           
                                          <?php echo $ex_list_listing_status;?>
                                            <br><?php echo $ex_list_rent_till;?>                                  
                                          </center></td>
                                          <td><center style="width: 50px;"><?php echo $ex_list_listing_type;?></center></td>
                                          <td><center style="width: 30px;"><?php echo $ex_list_deal_type;?></center></td>
                                          <td > <center style="width: 180px; " ><a title="<?php echo $ex_list_contact_name;?>"><?php echo "".$ex_list_project;?></a></center></td> 
                                          <td><center style="width: 50px; " ><?php echo $ex_list_house_number;?></center></td>
                                          <td><?php echo $ex_list_bedroom_c. "<br/>".$ex_list_bathroom_c;?></td>
                                          <td><?php echo $ex_list_floor;?></td>
                                          <td><?php echo $ex_list_sqm;?></td>     
                                          <td><a onclick="window.open('page/listing_prices.php?id=<?php echo $ex_list_listing_code;?>', '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');">
                                            <?php echo $ex_list_price;?></a></td>   
                                         
                                          <td><center style="width: 100px; " ><?php echo $ex_list_contact_name." ".$ex_list_contact_tel_show;?> </center></td>  
                                          <td><center><img src="../../../images/icon/icon-no.png" width="20"></center></td> 
                                          <td><center><img src="<?php echo $true_2;?>" width="20"></center></center></td> 
                                          <td><center><img src="<?php echo $true_3;?>" width="20"></center></center></td> 
                                          <td><center><img src="../../../images/icon/icon-true.png" width="20"></center>3.2</td> 
                                     </tr>

                        <?php  } ?>
                  

            <?php }   




                  
             }// END L3
         ?>


           <?php if($num==$no){ ?>


            <div class="card card-primary card-outline">
              <div class="card-header">
                
              </div>
              <div class="card-body">
                <h6 class="card-title" style="font-size: 25px;" ><center>ไม่พบ Listing ซ้ำกำลังดำเนินการบันทึกข้อมูล</center> </h6>
 <!--
                 <META HTTP-EQUIV='Refresh' CONTENT = "2;URL=https://connex.in.th/backend/?page=<?php echo $page;?>&status=edit&id=<?php echo $id;?>">-->
                 <META HTTP-EQUIV='Refresh' CONTENT = "0;URL=https://connex.in.th/backend/?page=upload_file_excel_check&page_no=1">

                 
              </div>
            </div>



            <?php } ?>

  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body       <?php echo $_SESSION['url_check'];?> -->



             
             <!-- Main content -->



        <?php /*  if($double_no=='1'){  

 /*
                      $sql = "UPDATE dbo_data_excel_listing SET 
                                ex_list_close='1',
                                ex_list_double_status='1',
                                ex_list_double_no='".$double_no."',
                                ex_list_double_cx='".$double_cx."',
                                ex_list_close_date='".$date."'
                                WHERE ex_list_listing_code='".$id."' ";  
                       mysqli_query($conn, $sql);  

 
          ?>

                        <div class="content">
                          <div class="container">
                            <div class="row">
                              <div class="col-lg-12">

                                        <div class="modal-content bg-danger">
                                          <div class="modal-header">
                                            <h4 class="modal-title">ตรวจสอบพบการเพิ่มข้อมูล ซ้ำซ้อนในระบบ</h4>
                                          
                                          </div>
                                          <div class="modal-body">
                                            <p>ทางระบบจะดำเนินการลบ ข้อมูลที่เพิ่มใหม่อัตโนมัต หากท่านคิดว่า ข้อมูลที่เพิ่มไม่ซ้ำ โปรดแจ้งเจ้าหน้าที่ไอที เพื่อกู้คืนข้อมูล</p>
                                          </div>
                                          
                                       

                                        </div>
                                        <!-- /.modal-content -->              

                              </div>
                            </div>
                          </div>
                        </div>
                    <br><br>
                    <center>
                         <a href="../?page=upload_file_excel_check"  class="btn btn-primary">ดำเนินการต่อ</a>     
                    </center>   
                    <br><br>   */

            if($double_no=='1' or $double_no=='2' or $double_no=='3'){ 

                      $sql = "UPDATE dbo_data_excel_listing SET 
                                ex_list_close='0',
                                ex_list_double_status='1',
                                ex_list_double_no='".$double_no."',
                                ex_list_double_cx='".$double_cx."' 
                                WHERE ex_list_listing_code='".$id."' ";  
                       mysqli_query($conn, $sql);  

           ?> 


                        <div class="content">
                          <div class="container">
                            <div class="row">
                              <div class="col-lg-12">

                                        <div class="modal-content bg-warning ">
                                          <div class="modal-header">
                                            <h4 class="modal-title">ตรวจสอบพบการเพิ่มข้อมูล ที่มีโอกาสซ้ำสูง</h4>
                                          
                                          </div>
                                          <div class="modal-body">
                                            <p>   การเพิ่มข้อมูลมีโอกาสซ้ำกับข้อมูลเดิม โปรดตรวจสอบ <br>
                                              - หาก Listing นี้ซ้ำ โปรดกดปุ่ม "ยกเลิกการโพสต์/ลบโพสต์ทิ้ง"<br>
                                              - หาก Listing นี้ไม่ซ้ำ โปรดกดปุ่ม "ดำเนินการโพสต์"
                                             </p>
                                          </div>
                                          
                                       

                                        </div>
                                        <!-- /.modal-content -->              

                              </div>
                            </div>
                          </div>
                        </div>
                    <br><br>

                   <center>
                       <!--  <a href="process.php?page=create_listing_all&status=del&id=<?php echo $id;?>" class="btn btn-primary">ยกเลิกการโพสต์/ลบโพสต์ทิ้ง</a> -->
                         <a href="../?page=upload_file_excel_check"  class="btn btn-primary">ดำเนินการโพสต์</a>     
                   </center>
                    <br><br>  

          <?php }else{ ?>       

              <div class="card-body">
                <h6 class="card-title" style="font-size: 25px;" ><center>ไม่พบ Listing ซ้ำกำลังดำเนินการบันทึกข้อมูล</center> </h6>
 <!--
                 <META HTTP-EQUIV='Refresh' CONTENT = "2;URL=https://connex.in.th/backend/?page=<?php echo $page;?>&status=edit&id=<?php echo $id;?>">-->
                 <META HTTP-EQUIV='Refresh' CONTENT = "0;URL=https://connex.in.th/backend/?page=upload_file_excel_check&page_no=1">

                 
              </div>

          <?php } ?>
               <!--
                   <center>
                         <a href="process.php?page=create_listing_all&status=del&id=<?php echo $id;?>" class="btn btn-primary">ยกเลิกการโพสต์/ลบโพสต์ทิ้ง</a>
                         <a href="../?page=upload_file_excel_check"  class="btn btn-primary">ดำเนินการโพสต์</a>     
                   </center>-->
              </div>
            </div>

<?php    }else{  //L2  ?>


            <div class="card card-primary card-outline">
              <div class="card-header">
                
              </div>
              <div class="card-body">
                <h6 class="card-title" style="font-size: 25px;" ><center>ไม่พบ Listing ซ้ำกำลังดำเนินการบันทึกข้อมูล</center> </h6>
 <!--
                 <META HTTP-EQUIV='Refresh' CONTENT = "2;URL=https://connex.in.th/backend/?page=<?php echo $page;?>&status=edit&id=<?php echo $id;?>">-->
                 <META HTTP-EQUIV='Refresh' CONTENT = "0;URL=https://connex.in.th/backend/?page=upload_file_excel_check&page_no=1">

                 
              </div>
            </div>



<?php    } // END L2 


     ?>

          </div>
          <!-- /.col-md-6 -->



            





        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
 




    <!-- /.content -->
  </div>
</div>

 

<?php    }else{  // เช็คว่าเคย เช็คซ้ำไปรึยัง ?>


            <div class="card card-primary card-outline">
              <div class="card-header">
                
              </div>
              <div class="card-body">
                <h6 class="card-title" style="font-size: 25px;" ><center>ไม่พบ Listing ซ้ำกำลังดำเนินการบันทึกข้อมูล</center> </h6>
 <!--
                 <META HTTP-EQUIV='Refresh' CONTENT = "2;URL=https://connex.in.th/backend/?page=<?php echo $page;?>&status=edit&id=<?php echo $id;?>">-->
                 <META HTTP-EQUIV='Refresh' CONTENT = "0;URL=https://connex.in.th/backend/?page=upload_file_excel_check&page_no=1">

                 
              </div>
            </div>

<?php    } 

   }   //END L1 ?>










<?php include("../include/script_jquery_main.php"); ?>


 
 


 