<?php
ini_set('session.gc_maxlifetime', 100000);

session_start(); 

 include '../config.php'; 
 include '../setting.php'; 

         $id=$_GET['id'];
         $today=date("Y-m-d H:i:s");
         $status=$_POST['status'];
         $USER_ID=$_SESSION['USER_ID'];
         $code=$_GET['code'];
         $check_p=$_GET['check_p'];
         $project_get_id=$_GET['project'];
         $calExpireDate=date ("Y-m-d", strtotime("+15 day", strtotime($today))); 

         $listing=$_GET['listing'];



         $sql="SELECT * FROM dbo_create_deal where create_deal_code='$code' LIMIT 1 ";  
         $result=$conn->query($sql);
         $rs=$result->fetch_assoc();

             $buyer_contact_code=$rs['buyer_contact_code'];
             $create_deal_title=$rs['create_deal_title'];
             $create_deal_attention=$rs['create_deal_attention'];
             $create_deal_type=$rs['create_deal_type'];
             $create_deal_budget_start=$rs['create_deal_budget_start'];
             $create_deal_budget_end=$rs['create_deal_budget_end'];
             $project_id=$rs['project_id'];
             $zone_id=$rs['zone_id'];
             $station_id=$rs['station_id'];
             $contact_deal_win=$rs['contact_deal_win'];
             $create_deal_bedroom=$rs['create_deal_bedroom'];
             $create_deal_bathroom=$rs['create_deal_bathroom'];
             $create_deal_sqm_start=$rs['create_deal_sqm_start'];
             $create_deal_sqm_end=$rs['create_deal_sqm_end'];
             $create_deal_select_floor=$rs['create_deal_select_floor'];
             $create_deal_floor=$rs['create_deal_floor'];
             $create_deal_rent_till=$rs['create_deal_rent_till'];
             $create_deal_open_room=$rs['create_deal_open_room'];
             $create_deal_nationality=$rs['create_deal_nationality'];
             $create_deal_duration=$rs['create_deal_duration'];
             $create_deal_pet_friendly=$rs['create_deal_pet_friendly'];
             $create_deal_pet_friendly_type=$rs['create_deal_pet_friendly_type'];
             $create_deal_search_from=$rs['create_deal_search_from'];
             $deal_status_assign_date=$rs['deal_status_assign_date'];
             $deal_status_contract_date=$rs['deal_status_contract_date'];
             $create_deal_remark=$rs['create_deal_remark'];
             $create_deal_sale=$rs['create_deal_sale'];
             $create_deal_create=$rs['create_deal_create'];
             $stock_offer=$rs['stock_offer'];
             $sale_offer=$rs['sale_offer'];


             $create_deal_attention_2=$rs['create_deal_attention_2'];
             $create_deal_type_2=$rs['create_deal_type_2'];
             $create_deal_budget_start_2=$rs['create_deal_budget_start_2'];
             $create_deal_budget_end_2=$rs['create_deal_budget_end_2'];
             $project_id_2=$rs['project_id_2'];
             $zone_id_2=$rs['zone_id_2'];
             $station_id_2=$rs['station_id_2'];
             $create_deal_bedroom_2=$rs['create_deal_bedroom_2'];
             $create_deal_bathroom_2=$rs['create_deal_bathroom_2']; 
             $create_deal_sqm_start_2=$rs['create_deal_sqm_start_2'];
             $create_deal_sqm_end_2=$rs['create_deal_sqm_end_2'];
             $create_deal_select_floor_2=$rs['create_deal_select_floor_2'];
             $create_deal_floor_2=$rs['create_deal_floor_2'];
             $create_deal_rent_till_2=$rs['create_deal_rent_till_2'];
             $create_deal_open_room_2=$rs['create_deal_open_room_2'];
             $create_deal_nationality_2=$rs['create_deal_nationality_2'];
             $create_deal_duration_2=$rs['create_deal_duration_2'];
             $create_deal_pet_friendly_2=$rs['create_deal_pet_friendly_2'];
             $create_deal_pet_friendly_type_2=$rs['create_deal_pet_friendly_type_2'];
             $create_deal_search_from_2=$rs['create_deal_search_from_2'];
             $create_deal_sale_2=$rs['create_deal_sale_2'];


             $create_deal_attention_2=$rs['create_deal_attention_2'];

             if($create_deal_attention_2!='0'){
                   
                   $create_deal_attention=$create_deal_attention_2;
                   $create_deal_type=$create_deal_type_2;
                   $create_deal_budget_start=$create_deal_budget_start_2;
                   $create_deal_budget_end=$create_deal_budget_end_2;
                   $project_id=$project_id_2;
                   $zone_id=$zone_id_2;
                   $station_id=$station_id_2;
                   $create_deal_bedroom=$create_deal_bedroom_2;
                   $create_deal_bathroom=$create_deal_bathroom_2; 
                   $create_deal_sqm_start=$create_deal_sqm_start_2;
                   $create_deal_sqm_end=$create_deal_sqm_end_2;
                   $create_deal_select_floor=$create_deal_select_floor_2;
                   $create_deal_floor=$create_deal_floor_2;
                   $create_deal_rent_till=$create_deal_rent_till_2;
                   $create_deal_open_room=$create_deal_open_room_2;
                   $create_deal_nationality=$create_deal_nationality_2;
                   $create_deal_duration=$create_deal_duration_2;
                   $create_deal_pet_friendly=$create_deal_pet_friendly_2;
                   $create_deal_pet_friendly_type=$create_deal_pet_friendly_type_2;

             }

            if($create_deal_attention=='4'){  $create_deal_attention='2';  }

            if($_SESSION['USER_ID']==$create_deal_sale){
                      $offer=$sale_offer;
            }else{
                      $offer=$stock_offer;
            }


            if($create_deal_attention=="1"){
                  $deal_attention='ขาย';
            }else{
                  $deal_attention='เช่า';
            }
            



     
     if($project_id!='0' or $project_id!=''){

         $sql_data2="SELECT  project_id , project_name_en , project_train_station , zone_id , project_total_floors , project_map , project_type , project_developer ,
                            project_unit ,  project_completed , project_alley , project_road , project_subdistrict , project_district , project_province 
                    FROM type_project AS pj 
                    where  pj.project_id='$project_get_id' ";  
          $result_data2 = $conn->query($sql_data2);

          $rs_listing=$result_data2->fetch_assoc();

               $project_id=$rs_listing['project_id'];
               $project_name=$rs_listing['project_name_en'];
               $project_train_station=$rs_listing['project_train_station'];
               $zone_id=$rs_listing['zone_id'];
               $project_total_floors=$rs_listing['project_total_floors'];
               $project_map=$rs_listing['project_map'];
               $project_type=$rs_listing['project_type'];
               $project_developer=$rs_listing['project_developer'];
               $project_unit=$rs_listing['project_unit'];
               $project_completed=$rs_listing['project_completed']; 
               $project_alley=$rs_listing['project_alley']; 
               $project_road=$rs_listing['project_road']; 
               $project_subdistrict=$rs_listing['project_subdistrict']; 
               $project_district=$rs_listing['project_district']; 
               $project_province=$rs_listing['project_province'];    
           
     }


 






              if($project_developer!=''){

                    $sql_type_developer="SELECT * FROM dbo_developer where developer_id='$project_developer' "; 
                    $result_type_developer=$conn->query($sql_type_developer);
                    $rs_developer= $result_type_developer->fetch_assoc();

                    $developer_name=$rs_developer['developer_name']." | ".$rs_developer['developer_name_en'];

              }

              $sql_type_asset="SELECT * FROM type_asset where id='$project_type' "; 
              $result_type_asset=$conn->query($sql_type_asset);
              $rs_type = $result_type_asset->fetch_assoc();

              $project_type=$rs_type['name'];

      /////////// type_train_station ////////////////
             $sql_train="SELECT * FROM type_train_station where station_id='$project_train_station' ";  
             $result_train= $conn->query($sql_train);
             $rs_train=$result_train->fetch_assoc(); 

             $station_name=$rs_train['station_train'];
             $station_name_en=$rs_train['station_name_en'];
  
             if($station_name!=''){ $project_train_station_title=$rs_train['station_train']." | ".$rs_train['station_name_en'];}
      /////////// End type_train_station ////////////////
  

        /////////// zone id ////////////////
             $sql_zone="SELECT * FROM type_zone where zone_id='$zone_id' ";  
             $result_zone= $conn->query($sql_zone);
             $rs_zone=$result_zone->fetch_assoc(); 

             $zone_name=$rs_zone['zone_name'];
             $zone_name_en=$rs_zone['zone_name_en'];
             
             if($zone_name!=''){ $project_zone1=$rs_zone['zone_name'];}

             if($zone_id=='0') { $project_zone1="0";}


         $sql_img="SELECT * FROM type_project_img where project_id='$project_get_id' order by project_img_no ASC LIMIT 1"; 
         $result_img=$conn->query($sql_img); 
         $rs_img=$result_img->fetch_assoc();

             $project_img_folder=$rs_img['project_img_folder'];
             $project_img_name=$rs_img['project_img_name'];
             $project_img_id=$rs_img['project_img_id']; 

             if($project_img_name!=''){ 

                 $project_img_folder="https://connex.in.th/images/project/$project_get_id/mini_w300/".$project_img_name; 

             }else{ // ถ้าไม่มีภาพ ให้ใช้ภาพของ Listing

                 $project_img_folder="https://connex.in.th/images/noimages.jpg"; 
             }



            if($create_deal_search_from==1 or $create_deal_search_from==0){
                   
                   $search_from="โครงการ";
                   $search_from_name=$project_name;              

            }else if($create_deal_search_from==2){

                   $search_from="สถานีรถไฟฟ้า";
                   $search_from_name=$project_train_station_title;    

            }else{
                   $search_from="โซน";
                   $search_from_name=$project_zone1;    
            }


 

  
   $url_page_s="listing_deal_buyer.php?code=$code&project=$project_get_id&check_p=$check_p&d_check=1";

 
if($_GET['page_no']==''){
   echo("<script> top.location.href='listing_deal_buyer.php?code=$code&project=$project_get_id&check_p=$check_p&d_check=1&page_no=1'</script>");   
}
 $sub_text_1= substr($_SERVER['REQUEST_URI'],-9);

$page_no= substr($sub_text_1,6);  
 
$page_no = str_replace("=","",$page_no,$count); 
$page_no = str_replace("o","",$page_no,$count); 
//echo $page_no." ".$cate_id;




     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
       }

     $no=0;

   
 if (isset($page_no) && $page_no!="" && $page_no!="l") {
    $page_no = $page_no;
    } else {
        $page_no = 1;
        }

 
    $total_records_per_page = 18;
 

    $offset = ($page_no-1) * $total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
    $adjacents = "2"; 
?>
 




 <script language="JavaScript">
  function chkNumber(ele)
  {
  var vchar = String.fromCharCode(event.keyCode);
  if ((vchar<'0' || vchar>'9') && (vchar != '/')) return false;
  ele.onKeyPress=vchar;
  }

  
</script>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CONNEX PROPERTY</title>

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
 
     <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
 
          <div class="col-md-12">
            <div class="card">
              <!--
              <div class="card-header p-2">

              </div> --> <!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  
                <!-- /.listing -->
                  <div class="active tab-pane" id="listing">
 

                    <div class="row">


<?php                         

  
    if($create_deal_attention=='3'){  $create_deal_attention='2';  }


  if($check_p=='1'){   
    
    if($create_deal_budget_end=='0'){
             $create_deal_budget_end=999999999999;
    }

    if($create_deal_sqm_end=='0'){
             $create_deal_sqm_end=999999999999;     
    }

    if($create_deal_sqm_start=='0'){
             $create_deal_sqm_start=0;     
    }else{            
    } 

   // เลือกชั้น ต่ำกว่า สูงกว่า

    if($create_deal_select_floor=='1'){
          
          $select_floor=" and data.ex_list_floor<=$create_deal_floor   ";

    }else if($create_deal_select_floor=='2'){

          $select_floor=" and data.ex_list_floor>=$create_deal_floor   ";

    }else{
          $select_floor=" ";
    }
    // END เลือกชั้น ต่ำกว่า สูงกว่า 

     /////////////// พื้นที่ต่ำสุด ////////////////
     if($create_deal_sqm_start!=''){
           $s_sqm_low=" and data.ex_list_sqm>=$create_deal_sqm_start  ";
     }else{   $s_sqm_low="";  }


     /////////////// พื้นที่สูงสุด ////////////////
     if($create_deal_sqm_end!=''){
           $s_sqm_maximum="  and  data.ex_list_sqm<=$create_deal_sqm_end ";
     }else{   $s_sqm_maximum="";  }

     /////////////// ราคาต่ำสุด ////////////////
     if($create_deal_budget_start!=''){
           $s_price_low="  and  data.ex_list_price>=$create_deal_budget_start ";
     }else{   $s_price_low="";  }


     /////////////// ราคาสูงสุด //////////////// 
     if($create_deal_budget_end!=''){
           $s_price_maximum=" and data.ex_list_price<=$create_deal_budget_end  ";
     }else{   $s_price_maximum="";  }


     /////////////// จำนวนห้องนอน ////////////////
     if($create_deal_bedroom!=''){ 
            $s_bedroom=" and data.ex_list_bedroom='$create_deal_bedroom' ";  
     }else{    $s_bedroom="";  }


   /////////////// จำนวนห้องน้ำ  ////////////////
     if($create_deal_bathroom!=''){ 
            $s_bathroom=" and data.ex_list_bathroom='$create_deal_bathroom' ";  
     }else{    $s_bathroom="";  }


     /////////////// ประเภท ดีล ขายเช่า ////////////////
     if($create_deal_attention!=''){ 
            $s_deal="  and data.ex_list_deal_type='$create_deal_attention'  ";  
     }else{    $s_deal="";  } 


     /////////////// ประเภท คอนโด ทาวน์เฮ็าส์ ////////////////
     if($create_deal_type!=''){
            $s_type=" and data.ex_list_listing_type='$create_deal_type' "; 
     }else{    $s_type="";  }

  
    if($create_deal_search_from==1){

           $project_check=" and data.project_id='$project_id'   ";     

    }else if($create_deal_search_from==2){   

           $project_check=" and data.ex_list_train_station='$station_id'    "; 

    }else if($create_deal_search_from==3){   

           $project_check=" and data.zone_id='$zone_id'      ";
          
    }else{

         if($project_id!=''){

               $project_check=" and data.project_id='$project_id'     ";

         }else{

               $project_check=" and data.ex_list_train_station='$station_id'    ";
         } 
    }


         
               $search_all_s="           
                          (
                          data.ex_list_listing_status='' and data.project_id='$project_get_id'
                          $s_sqm_low  $s_sqm_maximum  $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check  $s_bedroom   $s_bathroom  $s_deal  $select_floor $s_type  
                          )  
                          or
                          (
                          data.ex_list_listing_status='1' and data.project_id='$project_get_id'
                          $s_sqm_low  $s_sqm_maximum  $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check  $s_bedroom   $s_bathroom  $s_deal  $select_floor $s_type  
                          )                 
                          or
                          (
                          data.ex_list_listing_status='3'  and data.ex_list_rent_till_date<='$calExpireDate'  and data.project_id='$project_get_id'
                          $s_sqm_low  $s_sqm_maximum  $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check  $s_bedroom   $s_bathroom  $s_deal   $select_floor $s_type  
                          )            
                          or
                          (
                          data.ex_list_listing_status='7' and data.project_id='$project_get_id'
                          $s_sqm_low  $s_sqm_maximum  $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check  $s_bedroom   $s_bathroom  $s_deal   $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='8' and data.project_id='$project_get_id'
                          $s_sqm_low  $s_sqm_maximum  $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check  $s_bedroom   $s_bathroom  $s_deal   $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='9' and data.project_id='$project_get_id' 
                          $s_sqm_low  $s_sqm_maximum  $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check  $s_bedroom   $s_bathroom  $s_deal   $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='10' and data.project_id='$project_get_id'
                          $s_sqm_low  $s_sqm_maximum  $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check  $s_bedroom   $s_bathroom  $s_deal   $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='11' and data.project_id='$project_get_id'                           
                          $s_sqm_low  $s_sqm_maximum  $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check  $s_bedroom   $s_bathroom  $s_deal   $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='12' and data.project_id='$project_get_id'
                          $s_sqm_low  $s_sqm_maximum  $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check  $s_bedroom   $s_bathroom  $s_deal   $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='13' and data.project_id='$project_get_id' 
                          $s_sqm_low  $s_sqm_maximum  $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check  $s_bedroom   $s_bathroom  $s_deal   $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='14' and data.project_id='$project_get_id' 
                          $s_sqm_low  $s_sqm_maximum  $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check  $s_bedroom   $s_bathroom  $s_deal   $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='15' and data.ex_list_rent_till_date<='$calExpireDate' and data.project_id='$project_get_id'
                          $s_sqm_low  $s_sqm_maximum  $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check  $s_bedroom   $s_bathroom  $s_deal   $select_floor $s_type  
                          )
                             ";

 
         // echo "----".$search_all_s;  


  }else if($check_p=='2'){ 

   // ชเลือกชั้น ต่ำกว่า สูงกว่า
 /*
    if($create_deal_select_floor=='1'){
          
          $select_floor=" data.ex_list_floor<=$create_deal_floor and  ";

    }else if($create_deal_select_floor=='2'){

          $select_floor=" data.ex_list_floor>=$create_deal_floor and  ";

    }else{
          $select_floor="  ";  
    } */


    if($create_deal_budget_end=='0'){

             $create_deal_budget_end=99999999999;    
    }else{
             $budget_s=$create_deal_budget_end*30/100;
             $create_deal_budget_end=$create_deal_budget_end+$budget_s;
    }
   

    if($create_deal_sqm_start=='0'){
             $create_deal_sqm_start=0;   
    }else{            
    }

 


     /////////////// ราคาต่ำสุด ////////////////
     if($create_deal_budget_start!=''){
           $s_price_low="  and  data.ex_list_price>=$create_deal_budget_start ";
     }else{   $s_price_low="";  }


     /////////////// ราคาสูงสุด //////////////// 
     if($create_deal_budget_end!=''){
           $s_price_maximum=" and data.ex_list_price<=$create_deal_budget_end  ";
     }else{   $s_price_maximum="";  }


     /////////////// จำนวนห้องนอน ////////////////
     if($create_deal_bedroom!=''){ 
            $s_bedroom=" and data.ex_list_bedroom='$create_deal_bedroom' ";  
     }else{    $s_bedroom="";  }


   /////////////// จำนวนห้องน้ำ  ////////////////
     if($create_deal_bathroom!=''){ 
            $s_bathroom=" and data.ex_list_bathroom='$create_deal_bathroom' ";  
     }else{    $s_bathroom="";  }


     /////////////// ประเภท ดีล ขายเช่า ////////////////
     if($create_deal_attention!=''){ 
            $s_deal="  and data.ex_list_deal_type='$create_deal_attention'  ";  
     }else{    $s_deal="";  } 


     /////////////// ประเภท คอนโด ทาวน์เฮ็าส์ ////////////////
     if($create_deal_type!=''){
            $s_type=" and data.ex_list_listing_type='$create_deal_type' "; 
     }else{    $s_type="";  }


    $create_deal_bedroom='';
 
    $create_deal_bathroom='';
    $select_floor=""; 

 
 
    if($create_deal_search_from==1 or $create_deal_search_from==0){

       if($project_train_station!='0' and $project_train_station!=''){

           $project_check_2=" and data.ex_list_train_station='$project_train_station'   ";

       }else{    

            if($project_id!='' and $project_id!='0' ){
               
                  $project_check_2=" and data.zone_id='$zone_id'   ";                  

            
            }else{

                  
                  $project_check_2="and data.ex_list_train_station='-'  ";

            }
       }

    }else if($create_deal_search_from==2){  

               $project_check_2=" and data.ex_list_train_station='$station_id'   ";
     

    }else if($create_deal_search_from==3){ 

               $project_check_2=" and data.zone_id='$zone_id'    "; 
    }




                 $search_all_s="           
                          (
                          data.ex_list_listing_status='' and data.project_id='$project_get_id' 
                          $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check_2   $s_deal  $select_floor $s_type  
                          )  
                          or
                          (
                          data.ex_list_listing_status='1' and data.project_id='$project_get_id'
                          $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check_2   $s_deal  $select_floor $s_type  
                          )                 
                          or
                          (
                          data.ex_list_listing_status='3'  and data.ex_list_rent_till_date<='$calExpireDate' and data.project_id='$project_get_id'
                          $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check_2   $s_deal  $select_floor $s_type  
                          )            
                          or
                          (
                          data.ex_list_listing_status='7' and data.project_id='$project_get_id'
                          $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check_2   $s_deal  $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='8' and data.project_id='$project_get_id'
                          $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check_2   $s_deal  $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='9' and data.project_id='$project_get_id' 
                          $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check_2   $s_deal  $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='10' and data.project_id='$project_get_id'
                          $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check_2   $s_deal  $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='11' and data.project_id='$project_get_id'                           
                          $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check_2   $s_deal  $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='12' and data.project_id='$project_get_id'
                          $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check_2   $s_deal  $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='13' and data.project_id='$project_get_id' 
                          $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check_2   $s_deal  $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='14' and data.project_id='$project_get_id' 
                          $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check_2   $s_deal  $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='15' and data.ex_list_rent_till_date<='$calExpireDate' and data.project_id='$project_get_id'
                          $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check_2   $s_deal  $select_floor $s_type  
                          )
                             ";

 
  //    echo "----".$search_all_s; 



}

 /*

    echo "project_id : ".$project_get_id."<br>";
    echo "create_deal_sqm_start : ".$create_deal_sqm_start."<br>";
    echo "create_deal_sqm_end : ".$create_deal_sqm_end."<br>";
    echo "create_deal_budget_start : ".$create_deal_budget_start."<br>";
    echo "create_deal_budget_end : ".$create_deal_budget_end."<br>";
    echo "create_deal_bedroom : ".$create_deal_bedroom."<br>";
    echo "create_deal_bathroom : ".$create_deal_bathroom."<br>";
    echo "create_deal_attention : ".$create_deal_attention."<br>";
    echo "ex_list_listing_type : ".$ex_list_listing_type."<br>";
    echo "create_deal_type : ".$create_deal_type."<br>";
    echo "set_s_text : ".$set_s_text."<br>";  */

?>

                      <div class="col-12 col-sm-12 col-md-12 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill"> 
                          <div class="card-body pt-0">
                            <div class="row" style="padding-top: 10px;">

                              <div class="col-12 col-sm-12 col-md-12"  style="padding: 10px;">

                                     <center><a href="../page/deal_map.php?listing=<?php echo $check_p;?>&code=<?php echo $code;?>&project_id_deal_check=<?php echo $project_get_id;?>" ><img src="../img/icon_googlemap.png" width="70"></a></center> 

                              </div>

                              <div class="col-md-3 col-sm-12" >

                                  <center><img src="<?php echo $project_img_folder;?>"  alt="user-avatar" style=" width: 90%;height: 200px; "  > </center>
 

                              </div>
                              <div class="col-md-4 col-sm-12" style="font-size: 14px;">
                      
                      <?php if($project_get_id!='0'){ ?>

                                  <h4>Project</h4>
                                  <b>โครงการ : </b> <?php echo $project_name;?><br>
                                  <b>จำนวนชั้น : </b> <?php echo $project_total_floors;?> &nbsp;&nbsp;&nbsp;&nbsp;  <b>จำนวน UNIT : </b> <?php echo $project_unit;?> <br>
                                  <b>สถานีรถไฟฟ้า : </b> <?php echo $station_name." | ".$station_name;?> <br>
                                  <b>โซน :</b>  <?php echo $project_zone1;?><br>
                                  <?php if($project_completed!=''){ ?><b>ปีที่สร้าง :</b>  <?php echo $project_completed+543;?><br> <?php }?>
                                  <?php if($developer_name!=''){ ?><b>ผู้สร้าง :</b>  <?php echo $developer_name;?><br> <?php }?>
                                  <b>แผนที่ : </b> <a href="<?php echo $project_map;?>" target="_black" >คลิกดูแผนที่</a>

                      <?php }else{ ?>

                                  <h4>Listing ไม่มีโปรเจค</h4>     

                      <?php } ?>                       

                              </div>
                              <div class="col-md-4 col-sm-12" style="font-size: 14px;">
                                  <h4>Customer Requirements</h4>
                                  <b>ชื่อลูกค้า : </b> <?php echo $create_deal_title;?><br>
                                  <b>ความต้องการ : </b> <?php echo $deal_attention;?><br>
                                  <b>ประเภททรัพย์ : </b> <?php echo $project_type;?><br>
                                  <b>งบประมาณ : </b> <?php echo number_format($create_deal_budget_start)." - ".number_format($create_deal_budget_end);?><br>
                                  <b>พื้นที่ใช้สอย : </b> <?php echo $create_deal_sqm_start." - ".$create_deal_sqm_end;?><br>
                      <?php if($create_deal_bedroom!=''){ ?>
                                  <b>ห้องนอน : </b> <?php echo $create_deal_bedroom." |  ห้องน้ำ ".$create_deal_bathroom;?><br>
                      <?php } ?>

                      <?php if($create_deal_pet_friendly=='1'){ ?>
                                  <b>สัตว์เลี้ยง : </b> <?php echo $create_deal_pet_friendly_type;?><br>
                      <?php } ?>
                                  <b>ค้นหาจาก : </b> <?php echo $search_from;?><br>

                                  <?php if($search_from_name!=''){ echo "(".$search_from_name.")"; } ?>

                              </div>
                            </div>
                          </div>
                        </div>
                      </div>


<?php


    $set_s_text=" data.ex_list_date_update DESC , data.ex_list_listing_status DESC ,data.ex_list_premium DESC ,data.ex_list_img_score DESC ";
 
     $check_create_deal="  ";

  $i=0;

/*
      echo "project_id : ".$project_get_id."<br>";
    echo "create_deal_sqm_start : ".$create_deal_sqm_start."<br>";
    echo "create_deal_sqm_end : ".$create_deal_sqm_end."<br>";
    echo "create_deal_budget_start : ".$create_deal_budget_start."<br>";
    echo "create_deal_budget_end : ".$create_deal_budget_end."<br>";
    echo "create_deal_bedroom : ".$create_deal_bedroom."<br>";
    echo "create_deal_bathroom : ".$create_deal_bathroom."<br>";
    echo "create_deal_attention : ".$create_deal_attention."<br>";
    echo "ex_list_listing_type : ".$ex_list_listing_type."<br>";
    echo "create_deal_type : ".$create_deal_type."<br>";
    echo "set_s_text : ".$set_s_text."<br>";  */



     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
       }

     $no=0;
 
 

 $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM dbo_data_excel_listing AS data   
            
           WHERE 
             ( $search_all_s )
                     ");

    $total_records = mysqli_fetch_array($result_count);
    $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $second_last = $total_no_of_pages - 1; // total page minus 1
 


     $sql="SELECT  data.ex_list_listing_code ,  data.ex_list_house_number , data.ex_list_listing_status , data.ex_list_boostpost,
                  data.ex_list_rent_till, data.ex_list_listing_type ,data.ex_list_contact_name , data.ex_list_contact_name_2 , data.ex_list_contact_tel_2,
                  data.ex_list_price, data.ex_list_contact_tel , data.ex_list_contact_tel1_2 , data.ex_list_contact_tel1_3 , data.ex_list_contact_tel1_4 , 
                  data.ex_list_contact_tel2_2 , data.ex_list_contact_tel2_3 , data.ex_list_contact_tel2_4 ,data.ex_list_contact_lineid , data.ex_list_contact_email, 
                  data.ex_list_contact_lineid_2 , data.ex_list_contact_email_2, data.ex_list_train_station,data.ex_list_rai,data.ex_list_ngan ,data.ex_list_wa,
                  data.ex_list_deal_type , data.ex_list_house_number , data.ex_list_bedroom ,data.ex_list_bathroom , 
                  data.ex_list_sqm, data.project_id , data.ex_list_date_update , data.ex_list_floor , data.ex_list_heading , 
                  data.ex_list_heading_en , data.ex_list_contact  , data.ex_list_contact_name ,data.ex_list_contact_tel ,  data.ex_list_total_floors, 
                  data.ex_list_public_date  , data.ex_list_rent_till_date   
                   FROM dbo_data_excel_listing AS data where $search_all_s
                    order by $set_s_text  LIMIT $offset, $total_records_per_page  ";  

     $result= $conn->query($sql);

  
 
 
     if($result->num_rows > 0) { //num_rows
        // output data of each row
         while($rs_listing=$result->fetch_assoc()) { $i++;
  
               $ex_list_listing_code=$rs_listing['ex_list_listing_code'];
               $ex_list_contract_type=$rs_listing['ex_list_contract_type'];
               $ex_list_contract_code=$rs_listing['ex_list_contract_code'];
               $ex_list_deal_type=$rs_listing['ex_list_deal_type'];
               $ex_list_listing_type=$rs_listing['ex_list_listing_type'];
               $ex_list_listing_type_check=$rs_listing['ex_list_listing_type'];
               $ex_list_road=$rs_listing['ex_list_road'];
               $ex_list_subdistrict=$rs_listing['ex_list_subdistrict'];
               $ex_list_district=$rs_listing['ex_list_district'];
               $ex_list_province=$rs_listing['ex_list_province'];
               $ex_list_train_station=$rs_listing['ex_list_train_station'];
               $ex_list_googlmap=$rs_listing['ex_list_googlmap'];
               $ex_list_number_buildings=$rs_listing['ex_list_number_buildings'];
               $ex_list_floor=$rs_listing['ex_list_floor'];
               $ex_list_view=$rs_listing['ex_list_view'];
               $ex_list_total_floors=$rs_listing['ex_list_total_floors'];
               $ex_list_contact_name=$rs_listing['ex_list_contact_name'];
               $ex_list_contact_tel=$rs_listing['ex_list_contact_tel'];
               $ex_list_contact_tel1_2=$rs_listing['ex_list_contact_tel1_2'];
               $ex_list_contact_tel1_3=$rs_listing['ex_list_contact_tel1_3'];
               $ex_list_contact_tel1_4=$rs_listing['ex_list_contact_tel1_4'];
               $ex_list_contact_name_2=$rs_listing['ex_list_contact_name_2'];
               $ex_list_contact_tel2_1=$rs_listing['ex_list_contact_tel2_1'];
               $ex_list_contact_tel2_2=$rs_listing['ex_list_contact_tel2_2'];
               $ex_list_contact_tel2_3=$rs_listing['ex_list_contact_tel2_3'];
               $ex_list_contact_tel2_4=$rs_listing['ex_list_contact_tel2_4'];
               $ex_list_contact_lineid=$rs_listing['ex_list_contact_lineid'];
               $ex_list_contact_lineid_2=$rs_listing['ex_list_contact_lineid_2']; 
               $ex_list_contact_email=$rs_listing['ex_list_contact_email'];
               $ex_list_contact_email_2=$rs_listing['ex_list_contact_email_2'];
               $ex_list_rai=$rs_listing['ex_list_rai'];
               $ex_list_ngan=$rs_listing['ex_list_ngan'];
               $ex_list_wa=$rs_listing['ex_list_wa'];
           
               $ex_list_house_number=$rs_listing['ex_list_house_number'];
               $ex_list_sqm=$rs_listing['ex_list_sqm'];
               $ex_list_view=$rs_listing['ex_list_view']; 
               $ex_list_bedroom=$rs_listing['ex_list_bedroom'];
               $ex_list_bathroom=$rs_listing['ex_list_bathroom'];
        
               $ex_list_price=$rs_listing['ex_list_price']; 
               $ex_list_listing_status=$rs_listing['ex_list_listing_status'];
               $ex_list_listing_status_check=$rs_listing['ex_list_listing_status'];
               $ex_list_rent_till=$rs_listing['ex_list_rent_till'];
               $ex_list_rent_till_date=$rs_listing['ex_list_rent_till_date'];
               $ex_list_date_update=$rs_listing['ex_list_date_update'];

 

               $ex_list_facilities=$rs_listing['ex_list_facilities'];
               $ex_list_common_facilities=$rs_listing['ex_list_common_facilities'];
               $ex_list_nearby_places=$rs_listing['ex_list_nearby_places'];
               $ex_list_nearby_places_en=$rs_listing['ex_list_nearby_places_en'];

               $ex_list_rent_till_note=$rs_listing['ex_list_rent_till_note'];
 
        
              if($ex_list_date_update!='0000-00-00 00:00:00'){

                  $year=substr($ex_list_date_update,0 , 4 );
                  $month=substr($ex_list_date_update,5 , 2 );
                  $day=substr($ex_list_date_update,8 , 2 );

                  $time=substr($ex_list_date_update,11 , 5 );
                  $year=$year+543;

                  switch ($month)
                  {
                    case "00" : $month="00"; break;
                    case "01" : $month="ม.ค."; break;
                    case "02" : $month="ก.พ."; break;
                    case "03" : $month="มี.ค."; break;
                    case "04" : $month="เม.ย."; break;
                    case "05" : $month="พ.ค."; break;
                    case "06" : $month="มิ.ย."; break;
                    case "07" : $month="ก.ค."; break;
                    case "08" : $month="ส.ค."; break;
                    case "09" : $month="ก.ย."; break;
                    case "10" : $month="ต.ค."; break;
                    case "11" : $month="พ.ย."; break;
                    case "12" : $month="ธ.ค."; break;
                  }

                   $ex_list_date_update=$day." ".$month." ".$year." ".$time;

               }else{

                   $ex_list_date_update="ไม่เคยอัพเดท";

               }


/*
              $sql_new_deal_check="SELECT * FROM dbo_listing_new_deal_check where ex_list_listing_code='$ex_list_listing_code' and create_deal_code='$code' ";
              $result_new_deal_check = $conn->query($sql_new_deal_check);  
              $rs_new_deal_check=$result_new_deal_check->fetch_assoc(); 


              $listing_new_deal_check_view=$rs_new_deal_check['listing_new_deal_check_view'];


               if($listing_new_deal_check_view=='1'){ 
                    $new_deal="<span class='right badge badge-danger'>มีห้องใหม่</span>";

                     $sql_del = "DELETE FROM dbo_listing_new_deal_check where ex_list_listing_code='$ex_list_listing_code' and create_deal_code='$code' ";
                     mysqli_query($conn, $sql_del);

               }else{
                    $new_deal="";
               }
*/

              $sql_list_img="SELECT * FROM dbo_data_excel_listing_img where ex_list_listing_code='$ex_list_listing_code' order by listing_img_no ASC LIMIT 1";
              $result_list_img = $conn->query($sql_list_img);  
              $rs_list_img=$result_list_img->fetch_assoc(); 

                 $listing_img_folder=$rs_list_img['listing_img_folder'];
                 $listing_img_name=$rs_list_img['listing_img_name'];
                 $ex_list_listing_code_img=$rs_list_img['ex_list_listing_code'];
               
               if($listing_img_name!=''){ 
                 if($listing_img_folder!=''){   
                       $listing_img_name=$listing_img_folder.$listing_img_name;
                 }else{   
                       $listing_img_name="../../images/listing/".$ex_list_listing_code_img."/".$listing_img_name;  
                 }
               }else{

                    $listing_img_name="../../images/noimages.jpg"; 
               }
 


         $area_th=$ex_list_rai." ไร่ - ".$ex_list_ngan." งาน - ".$ex_list_wa." วา";
         $area_en=$ex_list_rai." - ".$ex_list_ngan." - ".$ex_list_wa." ";

         if($ex_list_sqm!=''){ $ex_list_sqm_th=$ex_list_sqm." ตร.ม."; $ex_list_sqm_en=$ex_list_sqm." sqm";}
         if($ex_list_bedroom!=''){ 
                 if($ex_list_bedroom=='0'){  $ex_list_bedroom_th="Studio"; $ex_list_bedroom_en="Studio"; 
                 }else{  $ex_list_bedroom_th=$ex_list_bedroom." ห้อง";    $ex_list_bedroom_en=$ex_list_bedroom." Room"; }
         }
         if($ex_list_bathroom!=''){ $ex_list_bathroom_th=$ex_list_bathroom." ห้อง";  $ex_list_bathroom_en=$ex_list_bathroom." Room";   }
         if($ex_list_floor!=''){ $ex_list_floor=$ex_list_floor." "; }
         if($ex_list_total_floors!=''){ $ex_list_total_floors_th=$ex_list_total_floors." ชั้น";  $ex_list_total_floors_en=$ex_list_total_floors."";}

        if($ex_list_deal_type=='1'){ $ex_list_deal_type="ขาย";  $ex_list_deal_type_en="FOR SELL"; }else{$ex_list_deal_type="เช่า"; $ex_list_deal_type_en="FOR RENT";}

        if($_SESSION['STATUS_ID']=='2' or $_SESSION['STATUS_ID']=='3' or $_SESSION['STATUS_ID']=='4' or $_SESSION['STATUS_ID']==$ex_list_contact ){ 

                             if($ex_list_contact_name!='' or $ex_list_contact_tel!='' or $ex_list_contact_lineid!='' or $ex_list_contact_email!=''){ 

                                    $ex_list_contact_name_s="เลขที่ห้อง : ".$ex_list_house_number." ---- Owner 1 : ".$ex_list_contact_name." Tel : ".$ex_list_contact_tel.",".$ex_list_contact_tel1_2.",".$ex_list_contact_tel1_3.",".$ex_list_contact_tel1_4." Line : ".$ex_list_contact_lineid." E-Mail : ".$ex_list_contact_email." | Owner 2 : ".$ex_list_contact_name_2." Tel : ".$ex_list_contact_tel_2.",".$ex_list_contact_tel2_2.",".$ex_list_contact_tel2_3.",".$ex_list_contact_tel2_4." Line : ".$ex_list_contact_lineid_2." E-Mail : ".$ex_list_contact_email_2; 

                             }

         }


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
         else if($ex_list_listing_status=='8'){ $ex_list_listing_status="ไม่รับสาย"; $stauts_list_color="#000cff"; }
         else if($ex_list_listing_status=='9'){ $ex_list_listing_status="ไม่สะดวกคุย"; $stauts_list_color="#000cff"; }
         else if($ex_list_listing_status=='10'){ $ex_list_listing_status="ปิดเครื่อง"; $stauts_list_color="#000cff"; }
         else if($ex_list_listing_status=='11'){ $ex_list_listing_status="สายไม่ว่าง"; $stauts_list_color="#000cff"; }
         else if($ex_list_listing_status=='12'){ $ex_list_listing_status="เบอร์ผิด"; $stauts_list_color="#000cff"; }
         else if($ex_list_listing_status=='13'){ $ex_list_listing_status="ไม่รับ agent"; $stauts_list_color="#000cff"; }
         else if($ex_list_listing_status=='14'){ $ex_list_listing_status="ยังไม่ปล่อยขาย/เช่า"; $stauts_list_color="#000cff"; }
         else if($ex_list_listing_status=='15'){ $ex_list_listing_status="Under Renovation";  $ex_list_rent_till=$ex_list_rent_till; 
                                          //เช็ควันหมดอายุ
                                         if($ex_list_rent_till_date<=$calExpireDate){ $stauts_list_color="#ffa200"; $expire_check=' <span class="right badge badge-danger">New</span>';  
                                          }else{  $stauts_list_color="#ff0000";  $expire_check=''; } 

                                                   
                                         }
  
         /*
         $project_alley=$rs_projects['project_alley'];
         $project_alley_en=$rs_projects['project_alley_en'];
         $project_road=$rs_projects['project_road'];
         $project_road_en=$rs_projects['project_road_en'];
         $project_subdistrict=$rs_projects['project_subdistrict'];
         $project_district=$rs_projects['project_district'];
         $project_province=$rs_projects['project_province'];
         $project_train_station=$rs_projects['project_train_station'];
         $project_facilities=$rs_projects['project_facilities'];
         $project_nearby_places=$rs_projects['project_nearby_places'];
         $project_nearby_places_en=$rs_projects['project_nearby_places_en'];
         $project_facilities_en=$rs_projects['project_facilities_en'];
         $project_zone=$rs_projects['project_zone'];
         $project_facilities_icon=$rs_projects['project_facilities_icon'];
         $project_map=$rs_projects['project_map'];
         $project_total_floors=$rs_projects['project_total_floors']; */




             if($project_id!=''){  // project_id NO
        
  
                 $ex_list_road=$project_road;
                 $ex_list_subdistrict=$project_subdistrict;
                 $ex_list_district=$project_district;
                 $ex_list_province=$project_province; 
                 $ex_list_train_station=$project_train_station;
                 $ex_list_nearby_places=$project_nearby_places;
                 $ex_list_facilities=$project_facilities;
                 $ex_list_googlmap=$project_map;
 
                 $ex_list_common_facilities=$project_facilities_en;
                 $ex_list_nearby_places_en=$project_nearby_places_en;
                 $zone_id=$rs_projects['zone_id'];

                 if($ex_list_listing_type=='1' or $ex_list_total_floors=='' or $ex_list_total_floors=='0'){
                            
                              
                                        $ex_list_total_floors_th=$project_total_floors." ชั้น";  
                                        $ex_list_total_floors_en=$project_total_floors.""; 
                             
                 } 

            }  // END project_id NO

      /////////// type_asset ////////////////
             $sql_ass="SELECT * FROM type_asset where id='$ex_list_listing_type' ";  
             $result_ass= $conn->query($sql_ass);
             $rs_ass=$result_ass->fetch_assoc();

             if($rs_ass['id']!=''){ $ex_list_listing_type=$rs_ass['name'];   $ex_list_listing_type_en=$rs_ass['name_en']; }
      ////////// End type_asset ////////////////

      /////////// type_train_station ////////////////
             $sql_train="SELECT * FROM type_train_station where station_id='$ex_list_train_station' ";  
             $result_train= $conn->query($sql_train);
             $rs_train=$result_train->fetch_assoc(); 

             $station_name=$rs_train['station_train'];
             $station_name_en=$rs_train['station_name_en'];
             $tr_group=$rs_train['tr_group'];
  
             if($station_name!=''){ $ex_list_train_station=$rs_train['station_train']." | ".$rs_train['station_name_en'];  
                                        
                                        $ex_list_train_station_en=$tr_group."-".$rs_train['station_name_en'];
                                  }
      /////////// End type_train_station ////////////////


              if($check_p=='1'){

                /*

                  $sql_1= "UPDATE dbo_data_excel_listing SET 
                                  check_create_deal='".$code."'  
                                  WHERE ex_list_listing_code='".$ex_list_listing_code."' and  check_create_deal!='$code' ";
                  $conn->query($sql_1); */
              }

            
                  /////////// calendar  ////////////////

            
                   $sql_subdeal="SELECT * FROM dbo_subdeal where ex_list_listing_code='$ex_list_listing_code'  and create_deal_code='$code' ";  
                   $result_subdeal= $conn->query($sql_subdeal);
                   $rs_subdeal=$result_subdeal->fetch_assoc(); 

               if($rs_subdeal['ex_list_listing_code']==$ex_list_listing_code){ $opacity="opacity: 0.4;"; }else{ $opacity="";}
                
?>

                      <div class="modal fade" id="modal-subdeal-<?php echo $i;?>" >
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">ดำเนินการ Create Sub Deal : <?php echo $ex_list_listing_code;?></h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
            

                         <form method="post" id="form" class="form-horizontal" enctype="multipart/form-data" action="../include/process.php" >

                          <input type="text" class="form-control" name="page"  value="create_subdeal_buyer" hidden="hidden">
                          <input type="text" class="form-control" name="page_no"  value="<?php echo $page_no;?>" hidden="hidden">
                          <input type="text" class="form-control" name="status"  value="create" hidden="hidden" >
                          <input type="text" class="form-control" name="user_id"  value="<?php echo $USER_ID;?>" hidden="hidden" >
                          <input type="text" class="form-control" name="check_p"  value="<?php echo $check_p;?>" hidden="hidden" > 
                          <input type="text" class="form-control" name="id"  value="<?php echo $subdeal_code;?>" hidden="hidden">
                          <input type="text" class="form-control" name="deal_sale"  value="<?php echo $create_deal_sale;?>" hidden="hidden">
                          <input type="text" class="form-control" name="title"  value="<?php echo $create_deal_title;?>" hidden="hidden">
                          <input type="text" class="form-control" name="win"  value="<?php echo $contact_deal_win;?>" hidden="hidden">
                          <input type="text" class="form-control" name="offer"  value="<?php echo $offer;?>" hidden="hidden">
                          <input type="text" class="form-control" name="code"  value="<?php echo $code;?>" hidden="hidden">
                          <input type="text" class="form-control" name="project"  value="<?php echo $project_get_id;?>" hidden="hidden">
                          <input type="text" class="form-control" name="listing"  value="<?php echo $ex_list_listing_code;?>" hidden="hidden">
                          

                            <div class="row" style="font-size: 16px; " >
          
                               <div class="col-md-12" > 
                                  <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">ระบุ Remark : </label>
                                    <div class="col-sm-12"> 
                                      <textarea class="form-control" rows="5" placeholder="Enter ..." id="s_record_note" name="s_record_note" ></textarea>
                                    </div>
                                  </div> 
                               </div>

                              <div class="col-12" >
                               
                            
                                   <center>
                                       <input type="submit" class="btn btn-warning" value="Yes">
                                       <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                   </center>
                                 
                                <!-- /.form-group -->
                              </div>

                            </div>
                    
                        </form>


                            </div>
                           
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
 
                      <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column" style="<?php echo $opacity;?>">
                        <div class="card bg-light d-flex flex-fill"> 
                          <div class="card-body pt-0">
                            <div class="row" style="padding-top: 10px;font-size: 14px;">
                              <div class="col-sm-12 col-md-5" >

                                 <img src="<?php echo $listing_img_name;?>"  alt="user-avatar" style="width: 100%; height: 130px; "  > <br>
                                  <center><?php echo "Update : ".$ex_list_date_update;?></center>
                                     <center>

                                      <?php if($rs_subdeal['ex_list_listing_code']!=$ex_list_listing_code){ ?>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-subdeal-<?php echo $i;?>" style="width: 100%;">
                                           นำเสนอห้อง  </button>
                                      <?php } ?>

                                        <!--
                                         <a href="../include/process.php?page=create_subdeal&status=create&id=<?php echo $code;?>&listing=<?php echo $ex_list_listing_code;?>&deal_sale=<?php echo $create_deal_sale;?>&title=<?php echo $create_deal_title;?>&win=<?php echo $contact_deal_win;?>&offer=<?php echo $offer;?>&project=<?php echo $project_get_id;?>&check_p=<?php echo $check_p;?>" class="btn btn-sm btn-primary"  >
                                            
                                         </a> -->
                                     </center>

                              </div>
                              <div class="col-sm-12 col-md-7" style="font-size: 14px;">
                   
                              <?php if($project_id!='' and $project_id!='0' ) { ?>
                                           <b>โครงการ : </b> <?php echo $project_name;?>  <br>
                               <?php } ?>  

                               <?php if($ex_list_train_station!='' and $ex_list_train_station!='0'){ ?>

                                            <b>สถานีรถไฟฟ้า :  </b><?php echo $ex_list_train_station;?><br>

                               <?php } ?>
                                            <a href="../?page=upload_file_excel_check_view&listing=<?php echo $ex_list_listing_code;?>" target="_black" title="<?php echo $ex_list_contact_name_s;?>" > <b>รหัสทรัพย์ :   </b><?php echo $ex_list_listing_code;?></a><br>
                                            <b>ราคา<?php echo $ex_list_deal_type;?> :  </b><?php echo number_format($ex_list_price);?> บาท <br>
                                            <b>ประเภท  :   </b><?php echo $ex_list_listing_type;?> <?php if($room_title2!=''){ echo "(".$room_title2.")"; } ?> <br>
                               <?php if($ex_list_listing_type_check=='1'){  ?>      
                                            <b>ตั้งอยู่ชั้นที่ :   </b><?php echo $ex_list_floor;?><br>
                               <?php } ?>

                                 <?php if($ex_list_listing_type_check!='1'){  ?>

                                             <b>พื้นที่ :   </b><?php echo $area_th;?><br>
                                <?php } ?>

                                            <b>พื้นที่ใช้สอย : </b><?php echo $ex_list_sqm_th;?><br>
                                            <b>ห้องนอน :   </b><?php echo $ex_list_bedroom_th;?><br>
                                            <b>ห้องน้ำ :  </b><?php echo $ex_list_bathroom_th;?><br>
                                <?php if($ex_list_other_room!='' and $ex_list_other_room!='0'){ ?>            
                                            <b>ห้องอื่นๆ :  </b><?php echo $ex_list_other_room;?><br>
                                <?php } ?>
                                <?php if($ex_list_parking!='' and $ex_list_parking!='0'){ ?>
                                            <b>ที่จอดรถ : </b><?php echo $ex_list_parking;?><br>
                                <?php } ?>
                                <?php if($ex_list_direction!=''){ ?>
                                            <b>ทิศ : </b><?php echo $ex_list_direction;?><br>
                                <?php } ?>            
                                 <p style="color: <?php echo $stauts_list_color;?>;"><b>สถานะ : </b><a onclick="window.open('../page/listing_status.php?id=<?php echo $ex_list_listing_code;?>', '_blank', 'location=yes,height=650,width=520,scrollbars=yes,status=yes');"style="cursor:pointer;"   >

 
                                  <?php echo $ex_list_listing_status;  if($ex_list_listing_status_check=='3' or $ex_list_listing_status_check=='15'){ ?> <?php echo $ex_list_rent_till; } ?>
                                  </a>
                                  
                                </p>
                                   
                              </div>
                              
                            </div>
                          </div>
                          <!--
                          <div class="card-footer">
                            <div class="text-right">
                              <a href="#" class="btn btn-sm bg-teal">
                                <i class="fas fa-comments"></i>
                              </a>
                              <a href="#" class="btn btn-sm btn-primary">
                                <i class="fas fa-user"></i> View Profile
                              </a>
                            </div>
                          </div> -->
                        </div>
                      </div> 

             

    <?php       } 
          } // END num_rows   ?>



                    </div>
                    <!-- / row / --> 


                    <!-- /.post -->
                  </div>
      


<center>
<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
<strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
</div>
 
             

 
                            <div class="card-footer clearfix" style="width: 100%;">
                                <ul class="pagination pagination-sm m-0 float-right">
                                  <!--
                                    <li class="page-item" ><a href="#" class='page-link'>Prev</a></li>-->
    <?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>

    
    <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
    <a <?php if($page_no > 1){ echo "href='$url_page_s&page_no=$previous_page'"; } ?> class='page-link'>Previous</a>
    </li>
       
    <?php 
    if ($total_no_of_pages <= 30){       
        for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
            if ($counter == $page_no) {
           echo "<li class='page-item active'><a class='page-link' >$counter</a></li>";  
                }else{
           echo "<li class='page-item'><a href='$url_page_s&page_no=$counter' class='page-link' >$counter</a></li>";
                }
        }
    }
    elseif($total_no_of_pages > 30){
        
    if($page_no <= 30) {         
     for ($counter = 1; $counter < 25; $counter++){       
            if ($counter == $page_no) {
           echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";  
                }else{
           echo "<li class='page-item'><a href='$url_page_s&page_no=$counter' class='page-link'>$counter</a></li>";
                }
        }
        echo "<li class='page-item'><a class='page-link'>...</a></li>";
        echo "<li class='page-item'><a href='$url_page_s&page_no=$second_last' class='page-link'>$second_last</a></li>";
        echo "<li class='page-item'><a href='$url_page_s&page_no=$total_no_of_pages' class='page-link'>$total_no_of_pages</a></li>";
        }

     elseif($page_no > 10 && $page_no < $total_no_of_pages - 10) {         
        echo "<li class='page-item'><a href='$url_page_s&page_no=1' class='page-link'>1</a></li>";
        echo "<li class='page-item'><a href='$url_page_s&page_no=2' class='page-link'>2</a></li>";
        echo "<li class='page-item'><a class='page-link'>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {         
           if ($counter == $page_no) {
           echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";  
                }else{
           echo "<li class='page-item'><a href='$url_page_s&page_no=$counter' class='page-link'>$counter</a></li>";
                }                  
       }
       echo "<li class='page-item'><a class='page-link'>...</a></li>";
       echo "<li class='page-item'><a href='$url_page_s&page_no=$second_last' class='page-link' >$second_last</a></li>";
       echo "<li class='page-item'><a href='$url_page_s&page_no=$total_no_of_pages' class='page-link' >$total_no_of_pages</a></li>";      
            }
        
        else {
        echo "<li class='page-item'><a href='$url_page_s&page_no=1' class='page-link'>1</a></li>";
        echo "<li class='page-item'><a href='$url_page_s&page_no=2' class='page-link'>2</a></li>";
        echo "<li class='page-item'><a class='page-link'>...</a></li>";

        for ($counter = $total_no_of_pages - 10; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
           echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";  
                }else{
           echo "<li class='page-item'><a href='$url_page_s&page_no=$counter' class='page-link'>$counter</a></li>";
                }                   
                }
            }
    }
?>
  
    <li <?php if($page_no >= $total_no_of_pages){ echo "class='page-item disabled'"; } ?>>
    <a <?php if($page_no < $total_no_of_pages) { echo "href='$url_page_s&page_no=$next_page'"; } ?> class='page-link'>Next</a>
    </li>
    <?php if($page_no < $total_no_of_pages){
        echo "<li class='page-item'><a href='$url_page_s&page_no=$total_no_of_pages' class='page-link' >Last &rsaquo;&rsaquo;</a></li>";
        } ?>
                                    <!--<li class='page-item'><a href="#" class='page-link'>Next</a></li>-->
                                </ul>
                            </div>
 
      </center>


            


                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->



  
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


 

</body>

</html>