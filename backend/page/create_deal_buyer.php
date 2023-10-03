
  <link rel="stylesheet" href="template/plugins/fontawesome-free/css/all.min.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="template/plugins/fullcalendar/main.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="template/dist/css/adminlte.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://rawgit.com/dbrekalo/attire/master/dist/js/build.min.js"></script>

        <link rel="stylesheet" href="dist/fastselect.css">
        <script src="dist/fastselect.standalone.js"></script>

  <style type="text/css">
    .col-form-label{
      font-size: 13px;
    }


  </style>

<script language="JavaScript">
  function chk_syntax(ele)
  {
  var vchar = String.fromCharCode(event.keyCode);
  if (vchar == "'") return false;
  ele.onKeyPress=vchar;
  }
</script>


	 <?php // Check connection
 
      isset( $_GET['request_d'] ) ? $request_d = $_GET['request_d'] : $request_d = "";
      isset( $_GET['project'] ) ? $project_get_id = $_GET['project'] : $project_get_id = "";
      isset( $_GET['step'] ) ? $step = $_GET['step'] : $step = "";
      isset( $_GET['buyer_id'] ) ? $buyer_id = $_GET['buyer_id'] : $buyer_id = "";
      isset( $_GET['p_check'] ) ? $p_check = $_GET['p_check'] : $p_check = "";
      isset( $_GET['d_check'] ) ? $d_check = $_GET['d_check'] : $d_check = "";
      isset( $_GET['code'] ) ? $code = $_GET['code'] : $code = "";
      isset( $_GET['check_p'] ) ? $check_p = $_GET['check_p'] : $check_p = "";
      isset( $_GET['d_check'] ) ? $d_check = $_GET['d_check'] : $d_check = "";
      isset( $_GET['listing_id'] ) ? $listing_id = $_GET['listing_id'] : $listing_id = "";
      isset( $_GET['sale'] ) ? $sale=  $_GET['sale'] : $sale= "";

      $date_=date("Y-m-d H:i:s");
      $calExpireDate=date ("Y-m-d", strtotime("+15 day", strtotime($date_)));

      $time_s=date("H:i");
      $time_e = date('H:i', strtotime('+120 minutes', strtotime(date("Y-m-d H:i:s"))));

      $year=substr($date_,0 , 4 );
      $month=substr($date_,5 , 2 );
      $day=substr($date_,8 , 2 );

      $todate=$day."/".$month."/".$year;


      if($p_check==''){

          echo("<script> top.location.href='?page=create_deal_buyer&status=create&p_check=create_buyer&step=1'</script>"); 

      }

    
		 if ($conn->connect_error) {
    		 die("Connection failed: " . $conn->connect_error);
	     }

             $buyer_contact_name='';
             $buyer_contact_lastname='';           
             $buyer_contact_nickname='';   

  if($p_check=='create_deal'){
 
        if($status=='create'){
    
             $buyer_contact_name='';
             $buyer_contact_lastname='';           
             $buyer_contact_nickname='';  
       


        }else{
           
             $buyer_contact_name='';
             $buyer_contact_lastname='';           
             $buyer_contact_nickname=''; 

             $sql="SELECT * FROM dbo_create_deal as deal  where deal.create_deal_code='$code' ";  
             $result=$conn->query($sql);
             $rs=$result->fetch_assoc();


             $buyer_id=$rs['buyer_contact_code'];
             isset( $rs['create_deal_title'] ) ? $create_deal_title= $rs['create_deal_title'] : $create_deal_title= "";
             isset( $rs['create_deal_attention'] ) ? $create_deal_attention= $rs['create_deal_attention'] : $create_deal_attention= "";

             $create_deal_type=$rs['create_deal_type'];
             $create_deal_budget_start=$rs['create_deal_budget_start'];
             $create_deal_budget_end=$rs['create_deal_budget_end'];
             $project_id=$rs['project_id'];
             $project_id_check=$rs['project_id'];
             $zone_id=$rs['zone_id'];
             $station_id=$rs['station_id'];
             $contact_deal_cancel_status=$rs['contact_deal_cancel_status'];
             $contact_deal_cancel_remark=$rs['contact_deal_cancel_remark'];
             $contact_deal_win=$rs['contact_deal_win'];
             $create_deal_bedroom=$rs['create_deal_bedroom'];
             $create_deal_bathroom=$rs['create_deal_bathroom'];
             $create_deal_sqm_start=$rs['create_deal_sqm_start'];
             $create_deal_sqm_end=$rs['create_deal_sqm_end'];
             $create_deal_select_floor=$rs['create_deal_select_floor'];
             $create_deal_floor=$rs['create_deal_floor'];
             $create_deal_rent_till=$rs['create_deal_rent_till'];
             $create_deal_open_room=$rs['create_deal_open_room'];
             isset( $rs['create_deal_nationality'] ) ? $create_deal_nationality = $rs['create_deal_nationality'] : $create_deal_nationality = "";
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
             $message_stock_id=$rs['message_stock_id']; 
             $buyer_contact_listing_code=$rs['buyer_contact_listing_code']; 
             $create_deal_note=$rs['create_deal_note']; 
             $create_deal_update=$rs['create_deal_update'];
 
             $create_deal_attention_2=$rs['create_deal_attention_2'];
             $create_deal_type_2=$rs['create_deal_type_2'];
             $create_deal_budget_start_2=$rs['create_deal_budget_start_2'];
             $create_deal_budget_end_2=$rs['create_deal_budget_end_2'];
             $project_id_2=$rs['project_id_2'];
             $project_id_check=$rs['project_id_2'];
             $zone_id_2=$rs['zone_id_2'];
             $station_id_2=$rs['station_id_2'];
             $create_deal_bedroom_2=$rs['create_deal_bedroom_2'];
             $create_deal_bathroom_2=$rs['create_deal_bathroom_2'];
             $create_deal_sqm_start_2=$rs['create_deal_sqm_start_2'];
             $create_deal_sqm_end_2=$rs['create_deal_sqm_end_2'];
             $create_deal_select_floor_2=$rs['create_deal_select_floor_2'];
             $create_deal_floor_2=$rs['create_deal_floor_2']; 

             $source_code_c=$rs['source_code'];
             $contact_code_c=$rs['contact_code'];
 

  
             if($_SESSION['STATUS_ID']=='2' or $_SESSION['STATUS_ID']=='3' or $_SESSION['STATUS_ID']=='4' or $_SESSION['STATUS_ID']=='5' or
                $_SESSION['USER_ID']==$create_deal_sale){ 

             }else{
                    echo("<script> top.location.href='?page=deal_buyer'</script>"); 
             }

             if($_SESSION['USER_ID']==$create_deal_sale){
                  $offer=$sale_offer;
             }else{
                  $offer=$stock_offer;
             }

           if($create_deal_rent_till!='0000-00-00 00:00:00'){
                $year=substr($create_deal_rent_till,0 , 4 );
                $month=substr($create_deal_rent_till,5 , 2 );
                $day=substr($create_deal_rent_till,8 , 2 ); 
                $create_deal_rent_till=$day."/".$month."/".$year;
            }else{
              $create_deal_rent_till='';
            }


                $year=substr($create_deal_open_room,0 , 4 );
                $month=substr($create_deal_open_room,5 , 2 );
                $day=substr($create_deal_open_room,8 , 2 ); 
                $create_deal_open_room=$day."/".$month."/".$year;



                $year=substr($create_deal_create,0 , 4 );
                $month=substr($create_deal_create,5 , 2 );
                $day=substr($create_deal_create,8 , 2 );

                $time=substr($create_deal_create,11 , 5 );
                $year=$year+543;

                $deal_create=$day."/".$month."/".$year." เวลา : ".$time;


             $sql_note="SELECT * FROM dbo_deal_message_stock where create_deal_code='$code' order by message_stock_create DESC ";  
             $result_note=$conn->query($sql_note);
             $rs_note=$result_note->fetch_assoc();

             isset( $rs_note['message_stock_message'] ) ? $message_stock_message = $rs_note['message_stock_message'] : $message_stock_message = "";
             isset( $rs_note['message_stock_create'] ) ? $message_stock_create = $rs_note['message_stock_create'] : $message_stock_create = "";

             if($create_deal_floor=='0'){
                   $create_deal_floor='';
             }

        }
  }
 
      ?>


<script language="JavaScript">
	function resutName(strCusName)
	{
			frmMain.txtID.value = strCusName.split("|")[0];
			frmMain.txtName.value = strCusName.split("|")[1];
	}

 

</script>
 

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
    
 
        <!-- SELECT2 EXAMPLE -->

 <?php 

 if($p_check=='create_buyer'){   ?>
 
 
 

<?php


        if($buyer_id!=''){

             $sql_b="SELECT * FROM dbo_buyer_contact where buyer_contact_code='".$buyer_id."' ";  
             $result_b=$conn->query($sql_b);
             $rs_b=$result_b->fetch_assoc(); 
 
             $buyer_contact_gender=$rs_b['buyer_contact_gender'];
             $buyer_contact_code=$rs_b['buyer_contact_code'];
             $buyer_contact_name=$rs_b['buyer_contact_name'];
             $buyer_contact_lastname=$rs_b['buyer_contact_lastname'];
             $buyer_contact_nickname=$rs_b['buyer_contact_nickname'];
             $buyer_contact_status=$rs_b['buyer_contact_status'];
             $buyer_contact_attention=$rs_b['buyer_contact_attention'];
             $buyer_contact_tel=$rs_b['buyer_contact_tel'];
             $buyer_contact_tel_2=$rs_b['buyer_contact_tel_2'];
             $buyer_contact_tel_3=$rs_b['buyer_contact_tel_3'];
             $buyer_contact_tel_4=$rs_b['buyer_contact_tel_4'];             
             $buyer_contact_nationality=$rs_b['buyer_contact_nationality'];
             $buyer_contact_line=$rs_b['buyer_contact_line'];
             $buyer_contact_line_id=$rs_b['buyer_contact_line_id'];
             $buyer_contact_fb=$rs_b['buyer_contact_fb'];
             $buyer_contact_email=$rs_b['buyer_contact_email'];
             $buyer_contact_whatsapp=$rs_b['buyer_contact_whatsapp'];
             $buyer_contact_wechat=$rs_b['buyer_contact_wechat'];
             $buyer_contact_language=$rs_b['buyer_contact_language'];
             $buyer_contact_remark=$rs_b['buyer_contact_remark']; 
             $buyer_contact_listing_code=$rs_b['buyer_contact_listing_code']; 

             $buyer_contact_birthday=$rs_b['buyer_contact_birthday'];
             $buyer_contact_workplace_address=$rs_b['buyer_contact_workplace_address']; 
             $buyer_contact_latitude=$rs_b['buyer_contact_latitude'];
             $buyer_contact_longitude=$rs_b['buyer_contact_longitude'];
             $buyer_contact_google_map=$rs_b['buyer_contact_google_map'];
             $buyer_monthly_income=$rs_b['buyer_monthly_income'];
             $buyer_objective=$rs_b['buyer_objective'];

             $create_deal_budget_start="";
             $create_deal_budget_end="";
             $create_deal_duration="";
             $create_deal_bedroom="";
             $create_deal_bathroom="";
             $create_deal_sqm_start="";
             $create_deal_sqm_end="";
             $create_deal_select_floor="";
             $create_deal_floor="";
             $create_deal_rent_till="";
             $create_deal_open_room="";
             $create_deal_pet_friendly="";
             $create_deal_pet_friendly_type="";
             $create_deal_sale=""; 
             $create_deal_type="";  
             $create_deal_remark="";  

             $check_hidden='';

             $project_id=""; 
             $station_id="";
             $zone_id="";

             $source_code_c="";   
             $contact_code_c="";   
             $create_deal_title=""; 
            
            if($code!=''){ 

                 $sql="SELECT * FROM dbo_create_deal where create_deal_code='$code' ";  
                 $result=$conn->query($sql);
                 $rs=$result->fetch_assoc();

                 isset( $rs['source_code'] ) ? $source_code_c= $rs['source_code'] : $source_code_c= "";
                 isset( $rs['contact_code'] ) ? $contact_code_c= $rs['contact_code'] : $contact_code_c= ""; 
                 isset( $rs['create_deal_title'] ) ? $create_deal_title= $rs['create_deal_title'] : $create_deal_title= "";
                 isset( $rs['buyer_contact_listing_code'] ) ? $buyer_contact_listing_code= $rs['buyer_contact_listing_code'] : $buyer_contact_listing_code= "";
            
                 isset( $rs['project_id'] ) ? $project_id= $rs['project_id'] : $project_id= "";
                 isset( $rs['zone_id'] ) ? $zone_id= $rs['zone_id'] : $zone_id= "";
                 isset( $rs['station_id'] ) ? $station_id= $rs['station_id'] : $station_id= ""; 
                 isset( $rs['create_deal_remark'] ) ? $create_deal_remark= $rs['create_deal_remark'] : $create_deal_remark= "";
 
                 $create_deal_select_floor=$rs['create_deal_select_floor'];
                 $create_deal_budget_start=$rs['create_deal_budget_start'];
                 $create_deal_budget_end=$rs['create_deal_budget_end'];
                 $create_deal_duration=$rs['create_deal_duration'];
                 $create_deal_bedroom=$rs['create_deal_bedroom'];
                 $create_deal_bathroom=$rs['create_deal_bathroom'];
                 $create_deal_sqm_start=$rs['create_deal_sqm_start'];
                 $create_deal_sqm_end=$rs['create_deal_sqm_end']; 
                 $create_deal_floor=$rs['create_deal_floor'];
                 $create_deal_rent_till=$rs['create_deal_rent_till'];
                 $create_deal_open_room=$rs['create_deal_open_room'];
                 $create_deal_pet_friendly=$rs['create_deal_pet_friendly'];
                 $create_deal_pet_friendly_type=$rs['create_deal_pet_friendly_type'];
                 $create_deal_sale=$rs['create_deal_sale'];
                 $create_deal_type=$rs['create_deal_type']; 
                 isset( $rs['create_deal_attention'] ) ? $create_deal_attention= $rs['create_deal_attention'] : $create_deal_attention= "";
               
        
            
            }


  
                if($request_d!=''){

                     $sql="SELECT *  FROM dbo_request_deal where id='$request_d' order by create_date DESC   "; 
                     $result = $conn->query($sql);
                     $rs=$result->fetch_assoc();

                     $source_code_c=$rs['source_code'];   
                     $contact_code_c=12; 
                     $create_deal_bedroom=$rs['bedroom'];
                     $create_deal_duration=$rs['deal_duration'];
                     $create_deal_budget_end=$rs['budget_start'];
                     $create_deal_pet_friendly=$rs['pet_friendly'];
                     $create_deal_pet_friendly_type=$rs['pet_friendly_type'];
                     $check_customer=$rs['check_customer'];
                     $buyer_contact_listing_code=$rs['ex_list_listing_code']; 
                     isset( $rs['project_id'] ) ? $project_id = $rs['project_id'] : $project_id = "";  
                     isset( $rs['station_id'] ) ? $station_id = $rs['station_id'] : $station_id = "";  
                     isset( $rs['zone_id'] ) ? $zone_id = $rs['zone_id'] : $zone_id = "";  
                     $create_deal_remark=$rs['project_other'].$rs['remark'];
                     $create_deal_type=$rs['deal_type'];
                     $create_deal_rent_till=$rs['deal_rent_till']; 
                     $project_other=$rs['project_other'];
                     $create_deal_open_room=$rs['open_room'];
                     $create_date=$rs['create_date'];
                     $create_deal_sale=$rs['register_id']; 
                     $open_deal=$rs['open_deal']; 
                     $buyer_contact_language=$rs['contact_language']; 


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

                     if($buyer_contact_tel==''){
                          $buyer_contact_tel=$contact_tel;
                     }
                     if($buyer_contact_tel_2==''){
                          $buyer_contact_tel_2=$contact_tel_2;
                     }     
                     if($buyer_contact_tel_3==''){
                          $buyer_contact_tel_3=$contact_tel_3;
                     }                  
                     if($buyer_contact_line_id==''){
                          $buyer_contact_line_id=$contact_line_id;
                     }
 
                     if($buyer_contact_email==''){
                          $buyer_contact_email=$contact_email;
                     }
 
                     if($buyer_contact_fb==''){
                          $buyer_contact_fb=$contact_fb;
                     }

                     if($buyer_contact_wechat==''){
                          $buyer_contact_wechat=$contact_wechat;
                     }

                     if($buyer_contact_whatsapp==''){
                          $buyer_contact_whatsapp=$contact_whatsapp;
                     }

                      $year=substr($create_deal_rent_till,0 , 4 );
                      $month=substr($create_deal_rent_till,5 , 2 );
                      $day=substr($create_deal_rent_till,8 , 2 );

                      $create_deal_rent_till=$day."/".$month."/".$year;

                      $year=substr($create_deal_open_room,0 , 4 );
                      $month=substr($create_deal_open_room,5 , 2 );
                      $day=substr($create_deal_open_room,8 , 2 );

                      $create_deal_open_room=$day."/".$month."/".$year;

                }

         }else{

             $buyer_contact_gender="";
             $buyer_contact_code="";
             $buyer_contact_name="";
             $buyer_contact_lastname="";
             $buyer_contact_nickname="";
             $buyer_contact_status="";
             $buyer_contact_attention="";
             $buyer_contact_tel="";
             $buyer_contact_tel_2="";
             $buyer_contact_tel_3="";
             $buyer_contact_tel_4="";
             $buyer_contact_nationality="";
             $buyer_contact_line="";
             $buyer_contact_line_id="";
             $buyer_contact_fb="";
             $buyer_contact_email="";
             $buyer_contact_whatsapp="";
             $buyer_contact_wechat="";
             $buyer_contact_language="";

             $create_deal_remark="";
             $buyer_contact_remark="";
             $buyer_contact_listing_code="";

             $buyer_contact_birthday="";
             $buyer_contact_workplace_address="";
             $buyer_contact_latitude="";
             $buyer_contact_longitude="";
             $buyer_contact_google_map="";
             $buyer_monthly_income="";
             $buyer_objective="";

             $check_hidden='';

             $project_id=""; 
             $station_id="";
             $zone_id="";

             $create_deal_budget_start="";
             $create_deal_budget_end="";
             $create_deal_duration="";
             $create_deal_bedroom="";
             $create_deal_bathroom="";
             $create_deal_sqm_start="";
             $create_deal_sqm_end="";
             $create_deal_select_floor="";
             $create_deal_floor="";
             $create_deal_rent_till="";
             $create_deal_open_room="";
             $create_deal_pet_friendly="";
             $create_deal_pet_friendly_type="";
             $create_deal_sale="";
             $create_deal_type="";   

             $source_code_c="";   
             $contact_code_c="";   
             $create_deal_title="";   

  
                if($request_d!=''){

                     $sql="SELECT *  FROM dbo_request_deal where id='$request_d' order by create_date DESC   "; 
                     $result = $conn->query($sql);
                     $rs=$result->fetch_assoc();

                     $buyer_contact_listing_code=$rs['ex_list_listing_code'];  
                     $buyer_contact_attention=$rs['contact_attention'];
                     $buyer_contact_line=$rs['contact_name'];
                     $buyer_contact_name=$rs['contact_name'];  
                     $buyer_contact_tel=$rs['contact_tel'];   
                     $buyer_contact_tel_2=$rs['contact_tel_2'];   
                     $buyer_contact_tel_3=$rs['contact_tel_3'];   
                     $buyer_contact_tel_4=$rs['contact_tel_4'];   
                     $buyer_contact_email=$rs['contact_email'];   
                     $buyer_contact_fb=$rs['contact_fb'];   
                     $buyer_contact_line_id=$rs['contact_line_id'];   
                     $buyer_contact_whatsapp=$rs['contact_whatsapp'];   
                     $buyer_contact_wechat=$rs['contact_wechat'];  

                }


         }

 

   if($step=='1'){   ?>



 <script language="JavaScript">

  function fncSubmit()
{

 
    if(document.getElementById('buyer_contact_tel').value !=""){
        var e = document.getElementById('submit');
        e.style.display = "none";     
    }else if(document.getElementById('buyer_contact_tel_2').value !=""){
        var e = document.getElementById('submit');
        e.style.display = "none";
    }else if(document.getElementById('buyer_contact_tel_3').value != ""){
        var e = document.getElementById('submit');
        e.style.display = "none";     
    }else if(document.getElementById('buyer_contact_tel_4').value !=""){
        var e = document.getElementById('submit');
        e.style.display = "none";    
    }else if(document.getElementById('buyer_contact_line_id').value !=""){
        var e = document.getElementById('submit');
        e.style.display = "none";     
    }else if(document.getElementById('buyer_contact_whatsapp').value != ""){
        var e = document.getElementById('submit');
        e.style.display = "none";        
    }else if(document.getElementById('buyer_contact_wechat').value != ""){
        var e = document.getElementById('submit');
        e.style.display = "none";      
    }else{
        alert('ไม่สามารถบันทึกได้ เนื่องจากไม่ได้กรอกข้อมูลการติดต่อ โปรดกรอกเบอร์โทรศัพท์ หรือ Line ID หรือ Whatsapp หรือ Wechat อย่างใดอย่างหนึ่ง');
        return false;
    }
}
 
  function chkNumbertel(ele)
  {
  var vchar = String.fromCharCode(event.keyCode);
  if ((vchar<'0' || vchar>'9') && (vchar != '+') ) return false;
  ele.onKeyPress=vchar;
  }

  function chkContactline(ele)
  {
  var vchar = String.fromCharCode(event.keyCode);
  if (vchar == '&' || vchar == '='  || vchar == "'"  || vchar == '"') return false;
  ele.onKeyPress=vchar;
  }

 
</script>


<?php if($code!=''){



 ?>

            
            <div class="row">
              <div class="col-md-10">
                  <h3>รหัส DEAL : <?php echo $code;?> <?php if($create_deal_title!=''){  echo " | ลูกค้า : ".$create_deal_title; } ?> </h3>  
              </div>
              <div class="col-md-2"> 
                  <a href="?page=deal_buyer" class="btn btn-block btn-primary btn-lg right"   > Create deal ซื้อทรัพย์</a><br>
              </div>
            </div>


<?php } ?>


        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">ข้อมูลลูกค้าเบื้องต้น </h3>

            <div class="card-tools">
 
            </div>
          </div>


          <form method="post" id="form" enctype="multipart/form-data" action="include/process.php"   onSubmit="JavaScript:return fncSubmit();" > 

                <input type="text" class="form-control" name="page"  value="<?php echo $_GET['page'];?>" hidden="hidden">
                <input type="text" class="form-control" name="user_id"  value="<?php echo $USER_ID;?>" hidden="hidden" >
                <input type="text" class="form-control" name="p_check"  value="create_buyer" hidden="hidden" >
                <input type="text" class="form-control" name="buyer_contact_code"  value="<?php echo $buyer_id;?>" hidden="hidden">
                <input type="text" class="form-control" name="step"  value="<?php echo $step;?>" hidden="hidden">
                <input type="text" class="form-control" name="request_d"  value="<?php echo $request_d;?>" hidden="hidden">


            <?php if($status=='edit'){ ?>

                <input type="text" class="form-control" name="edit"  value="edit" hidden="hidden">                
                <input type="text" class="form-control" name="id"  value="<?php echo $code;?>" hidden="hidden">
                <input type="text" class="form-control" name="sale"  value="<?php echo $sale;?>" hidden="hidden">

            <?php }else{ ?>
                <input type="text" class="form-control" name="edit"  value="create" hidden="hidden">    
            <?php } ?>

          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">

<?php if($_SESSION['STATUS_ID']=='2' or $_SESSION['STATUS_ID']=='3' or $_SESSION['STATUS_ID']=='4' or $_SESSION['STATUS_ID']=='5'){  ?>

              <div class="col-md-6 col-sm-12"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-12 col-form-label">เลือกลูกค้า : </label>
                    <div class="col-sm-12">

                        <select class="form-control select2bs4" name="buyer_contact_id" id="buyer_contact_id"   onchange="if (this.options[selectedIndex].value != '') {document.location.href=this.options[selectedIndex].value}" > 
                          <option value="?page=create_deal_buyer&status=<?php echo $status;?>&p_check=create_buyer&buyer_id=&step=1&code=<?php echo $code;?>"  selected="selected" >โปรดเลือกข้อมูล</option>  
            <?php  
             $sql_buyer="SELECT buyer_contact_lastname , buyer_contact_id , buyer_contact_line_id , buyer_contact_code  , buyer_contact_tel , buyer_contact_tel_2 , buyer_contact_tel_3 , buyer_contact_tel_4 , buyer_contact_line , buyer_contact_whatsapp  FROM dbo_buyer_contact order by buyer_contact_id DESC"; 
             $result_buyer=$conn->query($sql_buyer);

             if($result_buyer->num_rows > 0) { 
                 while($rs_buyer=$result_buyer->fetch_assoc()) {   

                   $buyer_contact_id=$rs_buyer['buyer_contact_id'];
                   $buyer_contact_code_s=$rs_buyer['buyer_contact_code']; 
                   $contact_name=$rs_buyer['buyer_contact_name'];
                   $contact_lastname=$rs_buyer['buyer_contact_lastname'];
                   $contact_tel=$rs_buyer['buyer_contact_tel'];
                   $contact_tel2=$rs_buyer['buyer_contact_tel_2'];
                   $contact_tel3=$rs_buyer['buyer_contact_tel_3'];
                   $contact_tel4=$rs_buyer['buyer_contact_tel_4'];
                   $contact_line=$rs_buyer['buyer_contact_line']; 
                   $buyer_contact_line_id_check=$rs_buyer['buyer_contact_line_id']; 
                   $contact_whatsapp=$rs_buyer['buyer_contact_whatsapp']; 

                   $text_name="รหัสลูกค้า : ".$buyer_contact_code_s." - ".$contact_line." | Tel : ".$contact_tel." , ".$contact_tel2." , ".$contact_tel3." , ".$contact_tel4." | LINE : ".$buyer_contact_line_id_check." | Whatsapp : ".$contact_whatsapp;

            ?> 
                          <option  value="?page=create_deal_buyer&status=<?php echo $status;?>&p_check=create_buyer&buyer_id=<?php echo $buyer_contact_code_s;?>&step=1&code=<?php echo $code;?>" 
                            <?php if($buyer_id==$buyer_contact_code_s){?> selected <?php } ?>  >
                            <?php echo $text_name;?></option> 
              <?php    }
                    }     ?>
                        </select>


                    </div>
                  </div> 
              </div>          
   
              <div class="col-md-4"> 
               
              </div>
    <?php }  //เช็คสิทธิ์ เห็นได้เฉพาะ สต๊อก ผู้จัดการ ?>  

 
               <div class="col-md-3 col-sm-12"  <?php echo $check_hidden;?>  > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-12 col-form-label">ประเภท Contact : </label>
                    <div class="col-sm-12">
                        <select class="form-control select2bs4"  name="buyer_contact_status"  id="buyer_contact_status"  style="width: 100%;" required="">   
                             <option value="" <?php if($buyer_contact_status=='' ){?> selected <?php } ?>>ไม่ระบุ</option>   
                             <option value="1" <?php if($buyer_contact_status=='1' or $buyer_contact_status=='' ){?> selected <?php } ?>>ลูกค้า</option>  
                             <option value="2" <?php if($buyer_contact_status=='2'){?> selected <?php } ?>>agent</option>  
          
                        </select> 
                    </div>
                  </div> 
              </div>
              <div class="col-md-3 col-sm-12"   <?php echo $check_hidden;?>> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-12 col-form-label">ความสนใจ : </label>
                    <div class="col-sm-12">
                        <select class="form-control select2bs4"  name="buyer_contact_attention"  id="buyer_contact_attention"  style="width: 100%;" required=""> 
                             <option value="" <?php if($buyer_contact_attention=='' ){?> selected <?php } ?>>ไม่ระบุ</option>      
                             <option value="1" <?php if($buyer_contact_attention=='1'){?> selected <?php } ?>>ซื้อ</option>  
                             <option value="2" <?php if($buyer_contact_attention=='2'){?> selected <?php } ?>>เช่า</option>   
                             <option value="4" <?php if($buyer_contact_attention=='4'){?> selected <?php } ?>>ต่อสัญญา</option>          
                        </select> 
                    </div>
                  </div> 
              </div>
              <div class="col-md-3 col-sm-12" > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-12 col-form-label">CX ที่ลูกค้าเลือกมา : </label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="buyer_contact_listing_code" name="buyer_contact_listing_code" placeholder="โปรดกรอก CX เช่น CX-05005" value="<?php echo $buyer_contact_listing_code;?>" >                                     
                    </div>
                  </div> 
              </div>
              <div class="col-md-3" > 
                      <input type="text" class="form-control" id="create_deal_title" name="create_deal_title" placeholder="" value="<?php echo $create_deal_title;?>"  hidden >
              </div>
 
               <div class="col-xs-3 col-md-3 col-sm-12"  <?php echo $check_hidden;?> > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-12 col-form-label">ชื่อเรียก : </label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="buyer_contact_line" name="buyer_contact_line" placeholder="โปรดกรอก ชื่อLine" value="<?php echo $buyer_contact_line;?>" required="" OnKeyPress="return chkContactline(this)" >
                    </div>
                  </div> 
              </div>
              
              <div class="col-xs-9 col-md-9 col-sm-12"  <?php echo $check_hidden;?> > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-md-12 col-sm-12 col-form-label">เบอร์ติดต่อ : </label>
                    <div class="col-md-3 col-sm-12">
                      <input type="text" class="form-control" id="buyer_contact_tel" name="buyer_contact_tel" placeholder="โปรดกรอกเบอร์โทรศัพท์" OnKeyPress="return chkNumbertel(this)" value="<?php echo $buyer_contact_tel;?>" >
                    </div>
                    <div class="col-md-3 col-sm-12">
                      <input type="text" class="form-control" id="buyer_contact_tel_2" name="buyer_contact_tel_2" placeholder="โปรดกรอกเบอร์โทรศัพท์" OnKeyPress="return chkNumbertel(this)" value="<?php echo $buyer_contact_tel_2;?>" >
                    </div>
                    <div class="col-md-3 col-sm-12">
                      <input type="text" class="form-control" id="buyer_contact_tel_3" name="buyer_contact_tel_3" placeholder="โปรดกรอกเบอร์โทรศัพท์" OnKeyPress="return chkNumbertel(this)" value="<?php echo $buyer_contact_tel_3;?>" >
                    </div>
                    <div class="col-md-3 col-sm-12">
                      <input type="text" class="form-control" id="buyer_contact_tel_4" name="buyer_contact_tel_4" placeholder="โปรดกรอกเบอร์โทรศัพท์" OnKeyPress="return chkNumbertel(this)" value="<?php echo $buyer_contact_tel_4;?>" >
                    </div>

                  </div> 
              </div>
 
           
              <div class="col-md-3 col-sm-12"  <?php echo $check_hidden;?> > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-12 col-form-label">อีเมล์ : </label>
                    <div class="col-sm-12">
                      <input type="email" class="form-control" id="buyer_contact_email" name="buyer_contact_email" placeholder="โปรดกรอกอีเมล์" value="<?php echo $buyer_contact_email;?>" >
                    </div>
                  </div> 
              </div>

              <div class="col-md-3 col-sm-12" id="buyer_contact_fb"  <?php echo $check_hidden;?> > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-12 col-form-label">FACEBOOK : </label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="buyer_contact_fb" name="buyer_contact_fb" placeholder="โปรดกรอก facebook"  value="<?php echo $buyer_contact_fb;?>" >
                    </div>
                  </div> 
              </div>
 
              <div class="col-md-3 col-sm-12"  <?php echo $check_hidden;?> > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-12 col-form-label">LINE ID : </label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="buyer_contact_line_id" name="buyer_contact_line_id" placeholder="โปรดกรอก Line ID" value="<?php echo $buyer_contact_line_id;?>" >
                    </div>
                  </div> 
              </div>
              <div class="col-md-3 col-sm-12"  <?php echo $check_hidden;?> > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-12 col-form-label">WHATSAPP : </label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="buyer_contact_whatsapp" name="buyer_contact_whatsapp" placeholder="โปรดกรอก Whatsapp"  OnKeyPress="return chkNumbertel(this)"  value="<?php echo $buyer_contact_whatsapp;?>" >
                    </div>
                  </div> 
              </div>
              <div class="col-md-3 col-sm-12"  <?php echo $check_hidden;?>  > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-12 col-form-label">WECHAT : </label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="buyer_contact_wechat" name="buyer_contact_wechat" placeholder="โปรดกรอก Wechat" value="<?php echo $buyer_contact_wechat;?>" >
                    </div>
                  </div> 
              </div> 



              <div class="col-md-12 col-sm-12"  > 
            
                   <center><input type="submit"  id="submit" class="btn btn-primary" value="ถัดไป"></center>
                 
                <!-- /.form-group -->
              </div>


              <!-- /.col -->
            </div>
            <!-- /.row --> 
            <!-- /.row -->
          </div>
          <!-- /.card-body -->

         </form>



 <?php }else if($step=='2'){ 

          
          if($listing_id!='' and $status=='create'){

                 $sql_listing="SELECT * FROM dbo_data_excel_listing where ex_list_listing_code='".$listing_id."' ";  
                 $result_listing=$conn->query($sql_listing);
                 $rs_listing=$result_listing->fetch_assoc();


                 $project_id=$rs_listing['project_id'];
                 $zone_id=$rs_listing['zone_id'];
                 $station_id=$rs_listing['ex_list_train_station'];
                 $station_id=$rs_listing['ex_list_train_station'];
                 $create_deal_type=$rs_listing['ex_list_listing_type'];
                 $create_deal_budget_end=$rs_listing['ex_list_price'];
                 $create_deal_bedroom=$rs_listing['ex_list_bedroom'];    
                 
                 if($project_id=='0'){

                     $ex_list_listing_name=$rs_listing['ex_list_listing_name'];
                     $ex_list_listing_name_en=$rs_listing['ex_list_listing_name_en']; 

                     if($ex_list_listing_name_en!=''){
                          $create_deal_title=$buyer_contact_name."_".$ex_list_listing_name_en;
                     }else{
                          $create_deal_title=$buyer_contact_name."_".$ex_list_listing_name;
                     }
                 }

          }
 
 
?>

<script language="JavaScript">

  function fncSubmit()
{

    var buyer_contact_listing_code = document.getElementById('buyer_contact_listing_code'); 
    var project_id = document.getElementById('project_id'); 
    var station_id = document.getElementById('station_id'); 
    var zone_id = document.getElementById('zone_id');
    var project_check = document.getElementById('project_check'); 
    var station_check = document.getElementById('station_check'); 
    var zone_check = document.getElementById('zone_check');
    var card_project = document.getElementById('card_project');

    if(project_id.value == "" && station_id.value == "" && zone_id.value == "" ) {  

        alert('กรณีไม่มีการระบุ CX กรุณาเลือก โครงการ หรือ สถานีรถไฟฟ้า หรือ โซน');
        document.getElementById("project_id").focus(); 
        return false;  
    
    }else{
        var e = document.getElementById('submit');
        e.style.display = "none";   
    }
}
 
  function chkNumbertel(ele)
  {
  var vchar = String.fromCharCode(event.keyCode);
  if ((vchar<'0' || vchar>'9') && (vchar != '+') ) return false;
  ele.onKeyPress=vchar;
  }



</script>

        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">ข้อมูลทางการตลาด </h3>

          
          </div>



          <form method="post" id="form" enctype="multipart/form-data" action="include/process.php"   onSubmit="JavaScript:return fncSubmit();" > 

                <input type="text" class="form-control" name="page"  value="<?php echo $_GET['page'];?>" hidden="hidden">
                <input type="text" class="form-control" name="user_id"  value="<?php echo $USER_ID;?>" hidden="hidden" >
                <input type="text" class="form-control" name="p_check"  value="create_buyer" hidden="hidden" >
                <input type="text" class="form-control" name="buyer_contact_code"  value="<?php echo $buyer_id;?>"  hidden="hidden" >
                <input type="text" class="form-control" name="buyer_contact_listing_code"  value="<?php echo $buyer_contact_listing_code;?>" hidden="hidden"> 
                <input type="text" class="form-control" name="step"  value="2" hidden="hidden">
                <input type="text" class="form-control" id="buyer_contact_line" name="buyer_contact_line"  value="<?php echo $buyer_contact_line;?>" hidden="hidden">
                <input type="text" class="form-control" id="buyer_contact_attention" name="buyer_contact_attention"  value="<?php echo $buyer_contact_attention;?>" hidden="hidden">
  
                <input type="text" class="form-control" name="request_d"  value="<?php echo $request_d;?>" hidden="hidden">
                

            <?php if($status=='edit'){ ?>

                <input type="text" class="form-control" name="edit"  value="edit" hidden="hidden">                
                <input type="text" class="form-control" name="id"  value="<?php echo $code;?>" hidden="hidden">
                <input type="text" class="form-control" id="create_deal_attention" name="create_deal_attention"  value="<?php echo $create_deal_attention;?>" hidden >
                <input type="text" name="create_deal_sale_2"  value="<?php echo $create_deal_sale;?>" hidden="hidden" > 
       

            <?php }else{ ?>
                         <input type="text" class="form-control" id="create_deal_title" name="create_deal_title" placeholder=""  value="" hidden="hidden" >
            <?php } ?>
 


          <div class="card-body">
            <div class="row">

    <?php if($status=='edit'){ ?>

              <div class="col-md-3 col-sm-12" id="buyer_contact_wechat"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-12 col-form-label">หัวข้อ Deal : </label>
                    <div class="col-sm-12">
                     
                         <input type="text" class="form-control" id="create_deal_title" name="create_deal_title" placeholder=""  value="<?php echo $create_deal_title;?>" >                    
                    </div>
                  </div> 
              </div>
              <div class="col-md-9 col-sm-12" id="buyer_contact_wechat"> 
                 
              </div>
    <?php }else{ ?>
                         <input type="text" class="form-control" id="create_deal_title" name="create_deal_title" placeholder=""  value="<?php echo $create_deal_title;?>" hidden  >  
    <?php } ?>

              <div class="col-md-3 col-sm-12" id="buyer_contact_wechat"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-12 col-form-label">แหล่งที่มา : </label>
                    <div class="col-sm-12">
                     
                        <select class="form-control select2bs4"  name="source_code"  id="source_code"  style="width: 100%;" required="">  
                             <option value="" <?php if($source_code_c=='0'){?> selected <?php } ?>>ไม่ระบุ</option>  
                  <?php 
                         $strSQL = "SELECT * FROM type_source  "; 
                         $result=$conn->query($strSQL); 
                             
                         while($rs=$result->fetch_assoc()) { 

                               $source_code=$rs['source_code'];
                               $source_title=$rs['source_title'];
                   ?>

                             <option value="<?php echo $source_code;?>" <?php if($source_code_c==$source_code){?> selected <?php } ?>><?php echo $source_title;?></option>  

                  <?php } ?>
          
                        </select>                      
                    </div>
                  </div> 
              </div>


              <div class="col-md-3 col-sm-12" id="buyer_contact_wechat"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-12 col-form-label">ช่องทางการติดต่อ : </label>
                    <div class="col-sm-12">
                     
                        <select class="form-control select2bs4"  name="contact_code"  id="contact_code"  style="width: 100%;" required="">  
                             <option value="" <?php if($contact_code_c=='0'){?> selected <?php } ?>>ไม่ระบุ</option>  
                  <?php 
                         $strSQL = "SELECT * FROM type_channel_contact  "; 
                         $result=$conn->query($strSQL); 
                             
                         while($rs=$result->fetch_assoc()) { 

                               $contact_code=$rs['contact_code'];
                               $contact_title=$rs['contact_title'];
                   ?>

                             <option value="<?php echo $contact_code;?>" <?php if($contact_code_c==$contact_code){?> selected <?php } ?>><?php echo $contact_title;?></option>  

                  <?php } ?>
          
                        </select>                      
                    </div>
                  </div> 
              </div>
 
              <div class="col-md-3 col-sm-12" id="buyer_contact_wechat"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-12 col-form-label">สือสารภาษา : </label>
                    <div class="col-sm-12">
                     
                        <select class="form-control select"  name="buyer_contact_language"  id="buyer_contact_language"  style="width: 100%;">                             
                          <option value="2" <?php if($buyer_contact_language=='2'){?> selected <?php } ?>>ภาษาอังกฤษ</option>   
                          <option value="1" <?php if($buyer_contact_language=='1'){?> selected <?php } ?>>ภาษาไทย</option> 
                        </select>                      
                    </div>
                  </div> 
              </div>
     
              <div class="col-md-3 col-sm-12" > 
              
              </div>
                   <div class="col-md-3 col-sm-12">

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-12 col-form-label">ประเภททรัพย์ : </label>
                          <div class="col-sm-12">
                            <select class="form-control select"  name="create_deal_type"  id="create_deal_type"  style="width: 100%;" required=""> 
                              <option value="" selected >ไม่เลือก</option> 
                         <?php  
                                   $sql_type_asset="SELECT * FROM type_asset order by id  ASC"; 
                                   $result_type_asset=$conn->query($sql_type_asset);

                                   if($result_type_asset->num_rows > 0) { 
                                       while($rs_type = $result_type_asset->fetch_assoc()) {   

                                       $type_code=$rs_type['id'];
                                  ?> 
                                                    <option value="<?php echo $type_code;?>"   readonly <?php if($create_deal_type==$type_code){?> selected <?php } ?> ><?php echo $rs_type['name'];?></option> 
                                <?php    }
                                      }     ?>
                             
                            </select>
                           </div>
                        </div> 
                </div>

                 <div class="col-md-3 col-sm-12" id="project_check" > 
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-12 col-form-label">โครงการ : </label>
                          <div class="col-sm-12">
                            <select class="form-control select2bs4"  name="project_id"  id="project_id"  style="width: 100%;"> 
                              <option value="">ไม่เลือก</option> 
                                <?php 
                                  $sql="SELECT * FROM type_project where project_name!=''  order by project_id ASC  "; 
                                  $result=$conn->query($sql); 

                                  if($result->num_rows > 0) { 
                                      while($rs_project=$result->fetch_assoc()) {   

                                     $g++;

                                         $project_id_s=$rs_project['project_id'];              
                                         $project_name=$rs_project['project_name'];
                                         $project_name_en=$rs_project['project_name_en'];
                                         $project_latitude=$rs_project['project_proppit_latitude'];
                                         $project_longitude=$rs_project['project_proppit_longitude'];
                                         
                                         $project_name_text="โครงการ : ".$project_name." | Project : ".$project_name_en;  
                                 
                                    ?>   
                                       <option value="<?php echo $project_id_s;?>" <?php if($project_id==$project_id_s){ ?> selected <?php } ?>  readonly  ><?php echo $project_name_text;?></option> 
                            <?php     } 
                                  }  ?>
                             
                            </select>
                           </div>
                        </div> 
                      </div>
                      <div class="col-md-3 col-sm-12"  id="station_check" > 
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-12 col-form-label">สถานีรถไฟฟ้า : </label>
                          <div class="col-sm-12">
                            <select class="form-control select2bs4"  name="station_id"  id="station_id"  style="width: 100%;"> 
                              <option value="">ไม่เลือก</option> 
                            <?php 
                              $strSQL = "SELECT * FROM type_train_station  "; 
                              $result=$conn->query($strSQL); 
                             
                              while($rs = $result->fetch_assoc()) {  
                                

                                     $station_id_s=$rs['station_id'];              
                                     $station_name=$rs['station_name'];
                                     $station_name_en=$rs['station_name_en'];  
                                     $tr_group=$rs['tr_group'];  
                                     $search_s_id=$rs['search_s_id'];
                                     
                                     $station_name_text="สถานีรถไฟฟ้า : ".$tr_group."-".$station_name." | ".$station_name_en;  
                             
                                ?>  
                                       <option value="<?php echo $station_id_s;?>" <?php if($station_id==$station_id_s){ ?> selected <?php } ?>   readonly  ><?php echo $station_name_text;?></option> 
                            <?php }  ?>
                             
                            </select>
                           </div>
                        </div> 
                      </div>                                        
                      <div class="col-md-3 col-sm-12" id="zone_check" > 
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-12 col-form-label">โซน : </label>
                          <div class="col-sm-12">
                            <select class="form-control select2bs4"  name="zone_id"  id="zone_id"  style="width: 100%;"> 
                              <option value="">ไม่เลือก</option> 
                                <?php 
                                  $strSQL = "SELECT * FROM type_zone  "; 
                                  $result=$conn->query($strSQL); 
                                 
                                  while($rs = $result->fetch_assoc()){   

                                      

                                         $zone_ids=$rs['zone_id'];              
                                         $zone_name=$rs['zone_name'];
                                         $zone_name_en=$rs['zone_name_en'];  
                                         $search_id_2=$rs['search_z_id'];
                                         
                                         $zone_name_text="โซน : ".$zone_name." | zone : ".$zone_name_en;  
                                 
                                    ?>   
                                       <option value="<?php echo $zone_ids;?>"  <?php if($zone_id==$zone_ids){ ?> selected <?php } ?>  readonly  ><?php echo $zone_name_text;?></option> 
                            <?php }  ?>
                             
                            </select>
                           </div>
                        </div> 
                      </div>


              <!--
              <div class="col-md-4 col-sm-12" > 
                  <div class="form-group row">  
                    <label for="inputEmail3" class="col-sm-12 col-form-label"><input type="checkbox" id="" name="buyer_contact_listing_code_check" value="1">  เลือก เพื่อให้ดึงข้อมูลจาก CX นี้ไปแสดงที่ดีล (กรณีมากรอก CX ภายหลัง)</label>
                  </div> 
              </div> -->

 
                      <div class="col-md-3 col-sm-12"> 
                           <div class="form-group row">
                            <label for="inputEmail4" class="col-sm-12 col-form-label">งบประมาณ : </label>
                            <div class="col-sm-6"> 
                              <input type="text" class="form-control" id="create_deal_budget_start" name="create_deal_budget_start" placeholder="เริ่มต้น" title="งบประมาณต่ำสุด" value="<?php echo $create_deal_budget_start;?>" > 
                            </div>
                            <div class="col-sm-6"> 
                              <input type="text" class="form-control" id="create_deal_budget_end" name="create_deal_budget_end" placeholder="สิ้นสุด" title="งบประมาณสูงสุด" value="<?php echo $create_deal_budget_end;?>" > 
                            </div>
                          </div> 
                      </div>

 
 
 
                      <div class="col-md-3 col-sm-12"> 
                           <div class="form-group row">
                            <label for="inputEmail4" class="col-sm-12 col-form-label">ห้องนอน : </label>
                            <div class="col-sm-12"> 
                              <input type="text" class="form-control" id="create_deal_bedroom" name="create_deal_bedroom" placeholder="หากเป็น studio ให้กรอก 0" title="จำนวนห้องนอน" value="<?php echo $create_deal_bedroom;?>" > 
                            </div> 
                          </div> 
                      </div>
                      <div class="col-md-3 col-sm-12"> 
                           <div class="form-group row">
                            <label for="inputEmail4" class="col-sm-12 col-form-label">ห้องน้ำ : </label>
                            <div class="col-sm-12"> 
                              <input type="text" class="form-control" id="create_deal_bathroom" name="create_deal_bathroom" placeholder="จำนวนห้องน้ำ" title="จำนวนห้องน้ำ" value="<?php echo $create_deal_bathroom;?>" > 
                            </div> 
                          </div> 
                      </div>
                      <div class="col-md-3 col-sm-12"> 
                           <div class="form-group row">
                            <label for="inputEmail4" class="col-sm-12 col-form-label">พื้นที่ใช้สอย : </label>
                            <div class="col-sm-6"> 
                              <input type="text" class="form-control" id="create_deal_sqm_start" name="create_deal_sqm_start" placeholder="พื้นที่ต่ำสุด" title="พื้นที่ต่ำสุด" value="<?php if($create_deal_sqm_start!='0'){ echo $create_deal_sqm_start;} ?>" > 
                            </div>
                            <div class="col-sm-6"> 
                              <input type="text" class="form-control" id="create_deal_sqm_end" name="create_deal_sqm_end" placeholder="พื้นที่สูงสุด" title="พื้นที่สูงสุด" value="<?php if($create_deal_sqm_end!='0'){ echo $create_deal_sqm_end;}?>" > 
                            </div>
                          </div> 
                      </div> 
                    
                       <div class="col-md-3 col-sm-12"> 
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-12 col-form-label"> เลือกชั้น :  </label>
                            <div class="col-sm-6"> 
                              <select class="form-control select2bs4"  name="create_deal_select_floor" id="create_deal_select_floor" style="width: 100%;"> 
                                <option value="0" <?php if($create_deal_select_floor=='0'){ ?>selected <?php } ?> >ไม่ระบุ  </option>  
                                <option value="1" <?php if($create_deal_select_floor=='1'){ ?>selected <?php } ?>>ชั้นตำกว่า </option>  
                                <option value="2" <?php if($create_deal_select_floor=='2'){ ?>selected <?php } ?>>ชั้นสูงกว่า</option>                          
                              </select>

                            </div>
                            <div class="col-sm-6"> 
                              <input type="text" class="form-control" id="create_deal_floor" name="create_deal_floor" placeholder="โปรดระบุชั้น"   value="<?php echo $create_deal_floor;?>" > 

                            </div>
                          </div> 
                      </div>


                       <div class="col-md-3 col-sm-12" id="create_deal_duration_p"> 
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-12 col-form-label"> ระยะเวลาสัญญา (เดือน) :  </label>
                            <div class="col-sm-12"> 
                            <select class="form-control select2bs4"  name="create_deal_duration" id="create_deal_duration" style="width: 100%;"> 
                              <option value="0" <?php if($create_deal_duration=='0'){ ?>selected <?php } ?> >ไม่ระบุ  </option>  
                    <?php for ($i = 1; $i <= 100; $i++) { ?>
                              <option value="<?php echo $i;?>" <?php if($create_deal_duration==$i){ ?>selected <?php } ?>><?php echo $i;?> เดือน </option>     
                    <?php } ?>                     
                            </select>

                            </div>
                          </div> 
                      </div>

                      <div class="col-md-3 col-sm-12"> 
                           <div class="form-group row">
                            <label for="inputEmail4" class="col-sm-12 col-form-label">เข้าอยู่เมื่อไหร่ : </label>
                            <div class="col-sm-12"> 
                              <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                  <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate1" name="create_deal_rent_till"  placeholder="โปรดกรอกตาม format ให้ถูกต้อง 01/01/2022" value="<?php echo $create_deal_rent_till;?>"    data-inputmask-inputformat="dd/mm/yyyy" data-mask />
                                  <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                  </div>
                              </div>

                            </div> 
                          </div> 
                      </div> 


                      <div class="col-md-3 col-sm-12"> 
                           <div class="form-group row">
                            <label for="inputEmail4" class="col-sm-12 col-form-label">สะดวกไปดูห้องเมื่อไหร่ : </label>
                            <div class="col-sm-12"> 
                              <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                  <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate2" name="create_deal_open_room"  placeholder="โปรดกรอกตาม format ให้ถูกต้อง 01/01/2022" value="<?php echo $create_deal_open_room;?>"   data-inputmask-inputformat="dd/mm/yyyy" data-mask  />
                                  <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                  </div>
                              </div>

                            </div> 
                          </div> 
                      </div> 
                  
                       <div class="col-md-3 col-sm-12"> 
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-12 col-form-label"> เลี้ยงสัตว์รึเปล่า :  </label>
                            <div class="col-sm-6"> 
                                <select class="form-control select2bs4"  name="create_deal_pet_friendly" id="create_deal_pet_friendly" style="width: 100%;"> 
                                  <option value="0" <?php if($create_deal_pet_friendly=='0'){ ?>selected <?php } ?> >ไม่เลี้ยง  </option>  
                                  <option value="1" <?php if($create_deal_pet_friendly=='1'){ ?>selected <?php } ?>>เลี้ยงสัตว์ </option>                      
                                </select>

                            </div>
                            <div class="col-sm-6"> 
                                 <input type="text" class="form-control" id="create_deal_pet_friendly_type" name="create_deal_pet_friendly_type" placeholder="โปรดกรอกประเภทสัตว์เลี้ยง"   value="<?php echo $create_deal_pet_friendly_type;?>" >
                            </div>
                          </div> 
                      </div>
                       
 

                       <div class="col-md-12 col-sm-12" > 
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-12 col-form-label">แนบไฟล์ : </label>
                            <div class="col-sm-12"> 
                              <input type="file"  id="exampleInputFile" name="filUpload[]"  multiple value="" >
                            </div>
                          </div> 
                       </div>

                       <div class="col-md-12" > 
 
                          <div class="row">
 <style>
div.scroll {width:100%; height: 500px; overflow-x:auto;}

 </style>


                      <?php $i=0;

                          $sql_img="SELECT * FROM dbo_create_deal_img  WHERE  create_deal_code='$code' order by deal_img_id  ASC  ";  

                          $result_img= $conn->query($sql_img);
                          while($rs_img=$result_img->fetch_assoc()) {   $i++;

                            $deal_img_file=$rs_img['deal_img_file'];
                            $deal_img_id=$rs_img['deal_img_id'];
                            $image="file/chat_line/".$deal_img_file;

                      ?>

                            <div class="col-md-4 col-sm-12">
                                <div class="scroll">

                                 <?php if($_SESSION['STATUS_ID']=='2' or $_SESSION['STATUS_ID']=='3' or $_SESSION['STATUS_ID']=='4' or $_SESSION['STATUS_ID']=='5'){  ?>
                                              <center><a href="include/process.php?page=create_deal_buyer_img&buyer_id=<?php echo $buyer_id;?>&status=del&id=<?php echo $code;?>&page_img=1&deal_img_file=<?php echo $deal_img_file;?>"onClick="return confirm('คุณต้องการที่จะลบภาพนี้หรือไม่...?');">   <img src="img/icon/png/trash-2x.png" width="15"></a></center>   
                                 <?php } ?>
                                       <a href="<?php echo $image;?>" data-toggle="lightbox" data-title="ภาพจาก LINE" data-gallery="gallery">
                                        <img src="<?php echo $image;?>" class="img-fluid mb-2" alt="white sample"/>
                                      </a>
                                </div>
                            </div>

                      <?php } ?>


 
                          </div>

                       </div>



              <div class="col-md-12 col-sm-12" id="buyer_contact_remark"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-12 col-form-label">Requirements : </label>
                    <div class="col-sm-12"> 
                      <textarea class="form-control" rows="5" placeholder="โปรดกรอก Requirements/ความต้องการของลูกค้า" id="create_deal_remark" name="create_deal_remark"><?php echo $create_deal_remark;?></textarea>
                    </div>
                  </div> 
              </div>

  



           <?php 
                 if($sale!='' and $create_deal_sale=='0'){
                        $create_deal_sale=$sale;
                 }

            ?>
  
                      <div class="col-md-6 col-sm-12"> 
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-12 col-form-label">เซลล์ผู้ดูแล : </label>
                            <div class="col-sm-12"> 
                            <select class="form-control select2bs4"  name="create_deal_sale" style="width: 100%;" required=""> 
                              <option value="0">ยังไม่ส่ง</option>  
            <?php  
             $sql_agency="SELECT * FROM dbo_register where register_status='1' and register_lcok='0' or register_status='4' and register_lcok='0' order by register_id  ASC"; 
             $rse_agency=$conn->query($sql_agency);

             if($rse_agency->num_rows > 0) { 
                  while($rs_agency=$rse_agency->fetch_assoc()) {   

                     $register_id=$rs_agency['register_id'];
                     $register_name=$rs_agency['register_name'];
                     $register_lastname=$rs_agency['register_lastname'];
                     $register_nickname=$rs_agency['register_nickname'];

                     $register_name=$register_name." ".$register_lastname." (".$register_nickname.")";
             ?>  
                              <option value="<?php echo $rs_agency['register_id'];?>" <?php if($create_deal_sale==$register_id){?> selected <?php } ?>  ><?php echo $register_name;?> | <?php echo $rs_agency['register_email'];?></option> 

          <?php   }
             }  ?>
                             
                            </select>

                            </div>
                          </div> 
                      </div>

             <div class="col-md-12 col-sm-12"  > 
            
                   <center><input type="submit"  id="submit" class="btn btn-primary" value="บันทึกข้อมูล"></center>
                 
                <!-- /.form-group -->
              </div>


            </div>
          </div>


   <?php } ?>

<!--
          <div class="card-header">
            <h3 class="card-title">ข้อมูลลูกค้าเพิ่มเติม </h3>

            <div class="card-tools">
 
            </div>
          </div>

          <div class="card-body">
            <div class="row">

              <div class="col-md-3 col-sm-12"  > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-12 col-form-label">ชื่อ : </label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="buyer_contact_name" name="buyer_contact_name" placeholder="โปรดกรอกชื่อ" value="<?php echo $buyer_contact_name;?>"   >
                    </div>
                  </div> 
              </div>
              <div class="col-md-3 col-sm-12"  id="buyer_contact_lastname" > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-12 col-form-label">นามสกุล : </label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="buyer_contact_lastname" name="buyer_contact_lastname" placeholder="โปรดกรอกนามสกุล" value="<?php echo $buyer_contact_lastname;?>"  >
                    </div>
                  </div> 
              </div>
              <div class="col-md-3 col-sm-12"  id="buyer_contact_nickname" > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-12 col-form-label">ชื่อเล่น : </label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="buyer_contact_nickname" name="buyer_contact_nickname" placeholder="โปรดกรอกชื่อเล่น" value="<?php echo $buyer_contact_nickname;?>" >
                    </div>
                  </div> 
              </div>
              <div class="col-md-3 col-sm-12" id="buyer_contact_gender"   > 
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-12 col-form-label">เพศ : </label>
                  <div class="col-sm-12">
                    <select class="form-control select"  name="buyer_contact_gender"  id="buyer_contact_gender"  style="width: 100%;">

                      <option value="0">ไม่เลือก</option>  
                      <option value="1" <?php if($buyer_contact_gender=='1'){?> selected <?php } ?>>ชาย</option>  
                      <option value="2" <?php if($buyer_contact_gender=='2'){?> selected <?php } ?>>หญิง</option>  
                    </select>
                   </div>
                </div> 
              </div>
              <div class="col-md-3 col-sm-12"  id="buyer_contact_nationality" > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-12 col-form-label">สัญชาติ : </label>
                    <div class="col-sm-12">

                        <select class="form-control select2bs4"  name="buyer_contact_nationality"  id="buyer_contact_nationality"  style="width: 100%;">  
                            <option value="" <?php if($buyer_contact_nationality==''){?> selected <?php } ?> >ไม่เลือก</option>  
                  <?php 
                         $strSQL = "SELECT * FROM countries  "; 
                         $result=$conn->query($strSQL); 
                             
                         while($rs=$result->fetch_assoc()) { 

                               $alpha_3_code=$rs['alpha_3_code'];
                               $alpha_2_code=$rs['alpha_2_code'];
                               $en_short_name=$rs['en_short_name'];
                               $nationality=$rs['nationality'];
                   ?>

                             <option value="<?php echo $alpha_3_code ;?>" <?php if($alpha_3_code ==$buyer_contact_nationality){?> selected <?php } ?>><?php echo "".$nationality." | ".$en_short_name." - ".$alpha_2_code;?></option>  

                  <?php } ?>
          
                        </select> 
                    </div>
                  </div> 
              </div>
              <div class="col-md-3 col-sm-12" id="buyer_contact_birthday"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-12 col-form-label">ว/ด/ปี เกิด : </label>
                    <div class="col-sm-12">
                        <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate1" name="buyer_contact_birthday "  placeholder="โปรดกรอก วันเดือนปีเกิด"  data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask  />
                               <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                  <div class="input-group-text" ><i class="fa fa-calendar"></i></div>
                                </div>
                        </div> 

                    </div>
                  </div> 
              </div> 
              <div class="col-md-3 col-sm-12" id="buyer_contact_gender"   > 
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-12 col-form-label">รายได้ต่อเดือน : </label>
                  <div class="col-sm-12">
                    <select class="form-control select"  name="buyer_monthly_income"  id="buyer_monthly_income"  style="width: 100%;">

                      <option value="0">ไม่เลือก</option>  
                      <option value="1" <?php if($buyer_monthly_income=='1'){?> selected <?php } ?>><20k</option>  
                      <option value="2" <?php if($buyer_monthly_income=='2'){?> selected <?php } ?>>20-50k</option>  
                      <option value="3" <?php if($buyer_monthly_income=='3'){?> selected <?php } ?>>50-80k</option>  
                      <option value="4" <?php if($buyer_monthly_income=='4'){?> selected <?php } ?>>80-100k</option>  
                      <option value="5" <?php if($buyer_monthly_income=='5'){?> selected <?php } ?>>>100k</option>  
                    </select>
                   </div>
                </div> 
              </div>
              <div class="col-md-3 col-sm-12" id="buyer_contact_gender"   > 
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-12 col-form-label">วัตถุประสงค์การซื้อ : </label>
                  <div class="col-sm-12">
                    <select class="form-control select"  name="buyer_objective"  id="buyer_objective"  style="width: 100%;">

                      <option value="0">ไม่เลือก</option>  
                      <option value="1" <?php if($buyer_objective=='1'){?> selected <?php } ?>>อยู่อาศัย</option>  
                      <option value="2" <?php if($buyer_objective=='2'){?> selected <?php } ?>>ซื้อปล่อยเช่า</option>  
                      <option value="3" <?php if($buyer_objective=='3'){?> selected <?php } ?>>ขายทำกำไร </option>  
                      <option value="4" <?php if($buyer_objective=='4'){?> selected <?php } ?>>อื่นๆ</option>  
                    </select>
                   </div>
                </div> 
              </div>     
              <div class="col-md-3 col-sm-12" id="buyer_contact_workplace_address"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-12 col-form-label">จุดหมายปลายทางหลัก  : </label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="buyer_contact_workplace_address" name="buyer_contact_workplace_address" placeholder="โปรดกรอกสถานที่ทำงาน" value="<?php echo $buyer_contact_workplace_address;?>" >
                    </div>
                  </div> 
              </div>
              <div class="col-md-3 col-sm-12" id="buyer_contact_latitude"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-12 col-form-label">ละติจูด : </label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="buyer_contact_latitude" name="buyer_contact_latitude" placeholder="โปรดกรอก ละติจูด" value="<?php echo $buyer_contact_latitude;?>" >
                    </div>
                  </div> 
              </div>
              <div class="col-md-3 col-sm-12" id="buyer_contact_longitude"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-12 col-form-label">ลองจิจูด : </label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="buyer_contact_longitude" name="buyer_contact_longitude" placeholder="โปรดกรอก ลองจิจูด" value="<?php echo $buyer_contact_longitude;?>" >
                    </div>
                  </div> 
              </div>

              <div class="col-md-6 col-sm-12" id="buyer_contact_google_map"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-12 col-form-label">Map : </label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="buyer_contact_google_map" name="buyer_contact_google_map" placeholder="โปรดกรอกเป็นลิงค์ Google Map" value="<?php echo $buyer_contact_google_map;?>" >
                    </div>
                  </div> 
              </div>
            </div>
          </div>
           -->
    

 




          <div class="card-footer"></div>
        </div>
        <!-- /.card -->
      </form>

     </div>
   
   </section>      <!-- Main content -->
 

   <script type="text/javascript">   /*
$(document).ready(function(){


    $("#buyer_contact_id").change(function(){
      var buyer_contact_id = $("#buyer_contact_id").val();
     
      if(buyer_contact_id!=""){

        $("#buyer_contact_prefix").hide();
        $("#buyer_contact_name").hide();
        $("#buyer_contact_lastname").hide();
        $("#buyer_contact_nickname").hide();
        $("#buyer_contact_tel").hide();
        $("#buyer_contact_email").hide();
        $("#buyer_contact_fb").hide();
        $("#buyer_contact_line").hide();
        $("#buyer_contact_whatsapp").hide();
        $("#buyer_contact_remark").hide();
        $("#buyer_contact_submit").hide();
        $("#buyer_contact_nationality").hide();
        $("#buyer_contact_line_id").hide();
        $("#buyer_contact_wechat").hide();

        $("#buyer_contact_birthday").hide();
        $("#buyer_contact_workplace_address").hide();
        $("#buyer_contact_latitude").hide();
        $("#buyer_contact_longitude").hide();
        $("#buyer_contact_google_map").hide();
        $("#source_code").hide();
        $("#contact_code").hide();   */   
        /*
        $("#p1").hide();
        $("#p_floor").show();
        //$("#txt_box").val(""); */
        /*
        $("#box").show();
        $("#txt_box").val("").focus(); */
 
/*
      }else{

        $("#buyer_contact_prefix").show();
        $("#buyer_contact_name").show();
        $("#buyer_contact_lastname").show();
        $("#buyer_contact_nickname").show();
        $("#buyer_contact_tel").show();
        $("#buyer_contact_email").show();
        $("#buyer_contact_fb").show();
        $("#buyer_contact_line").show();
        $("#buyer_contact_whatsapp").show();
        $("#buyer_contact_remark").show();
        $("#buyer_contact_submit").show();
        $("#buyer_contact_nationality").hide();
        $("#buyer_contact_line_id").hide();
        $("#buyer_contact_wechat").hide();

        $("#buyer_contact_birthday").hide();
        $("#buyer_contact_workplace_address").hide();
        $("#buyer_contact_latitude").hide();
        $("#buyer_contact_longitude").hide();
        $("#buyer_contact_google_map").hide();
        $("#source_code").hide();
        $("#contact_code").hide(); 
      } 
    });


});*/


</script>

 <?php }
  // END create_buyer
  ?> 




 <?php if($p_check=='create_deal'){ 




             $sql="SELECT * FROM dbo_create_deal as deal 
                   where deal.create_deal_code='$code' ";  
             $result=$conn->query($sql);
             $rs=$result->fetch_assoc();


             $buyer_id=$rs['buyer_contact_code'];
             $create_deal_title=$rs['create_deal_title'];
             $create_deal_attention=$rs['create_deal_attention'];
             $create_deal_type=$rs['create_deal_type'];
             $create_deal_budget_start=$rs['create_deal_budget_start'];
             $create_deal_budget_end=$rs['create_deal_budget_end'];
             $project_id=$rs['project_id']; 
             $zone_id=$rs['zone_id'];
             $station_id=$rs['station_id'];
             $contact_deal_cancel_status=$rs['contact_deal_cancel_status'];
             $contact_deal_cancel_remark=$rs['contact_deal_cancel_remark'];
             $contact_deal_win=$rs['contact_deal_win'];
             $create_deal_bedroom=$rs['create_deal_bedroom'];
             $create_deal_bathroom=$rs['create_deal_bathroom'];
             $create_deal_sqm_start=$rs['create_deal_sqm_start'];
             $create_deal_sqm_end=$rs['create_deal_sqm_end'];
             $create_deal_select_floor=$rs['create_deal_select_floor'];
             $create_deal_floor=$rs['create_deal_floor'];
             $create_deal_rent_till=$rs['create_deal_rent_till'];
             $create_deal_open_room=$rs['create_deal_open_room'];
             isset( $rs['create_deal_nationality'] ) ? $create_deal_nationality = $rs['create_deal_nationality'] : $create_deal_nationality = "";
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
             $message_stock_id=$rs['message_stock_id']; 
             $buyer_contact_listing_code=$rs['buyer_contact_listing_code']; 
             $create_deal_note=$rs['create_deal_note']; 
             $create_deal_update=$rs['create_deal_update'];


         if($project_id_2!='0' ){

             $sql_project="SELECT * FROM type_project where project_id='$project_id_2' ";  
             $result_project=$conn->query($sql_project);
             $rs_project=$result_project->fetch_assoc();

             $project_train_station=$rs_project['project_train_station'];
             $zone_id_s=$rs_project['zone_id'];

         }
     

             $sql_offer="SELECT auto_offer FROM dbo_subdeal  WHERE create_deal_code='$code' and check_auto_offer='0' ";  
             $result_offer= $conn->query($sql_offer);
             $count_offer=$result_offer->num_rows;
     
 
     /*
     if($create_deal_search_from=='3'){

     }else{
         if($zone_id_s!='0'){
               $zone_id=$zone_id_s;
         }     
     } */

    if($buyer_id!='0'){ 

         //ลูกค้า
         $sql_buyer="SELECT * FROM dbo_buyer_contact where buyer_contact_code='$buyer_id' ";  
         $result_buyer=$conn->query($sql_buyer);
         $rs_buyer=$result_buyer->fetch_assoc(); 

         isset( $rs_buyer['buyer_contact_code'] ) ? $buyer_contact_code = $rs_buyer['buyer_contact_code'] : $buyer_contact_code = "";
         isset( $rs_buyer['buyer_contact_gender'] ) ? $buyer_contact_gender = $rs_buyer['buyer_contact_gender'] : $buyer_contact_gender = "";
         isset( $rs_buyer['buyer_contact_line'] ) ? $buyer_contact_line = $rs_buyer['buyer_contact_line'] : $buyer_contact_line = "";
         isset( $rs_buyer['buyer_contact_name'] ) ? $buyer_contact_name = $rs_buyer['buyer_contact_name'] : $buyer_contact_name = "";
         isset( $rs_buyer['buyer_contact_status'] ) ? $buyer_contact_status = $rs_buyer['buyer_contact_status'] : $buyer_contact_status = "";
         isset( $rs_buyer['buyer_contact_lastname'] ) ? $buyer_contact_lastname = $rs_buyer['buyer_contact_lastname'] : $buyer_contact_lastname = "";
         isset( $rs_buyer['buyer_contact_nickname'] ) ? $buyer_contact_nickname = $rs_buyer['buyer_contact_nickname'] : $buyer_contact_nickname = "";
         isset( $rs_buyer['buyer_contact_tel'] ) ? $buyer_contact_tel = $rs_buyer['buyer_contact_tel'] : $buyer_contact_tel = "";
         isset( $rs_buyer['buyer_contact_tel_2'] ) ? $buyer_contact_tel_2 = $rs_buyer['buyer_contact_tel_2'] : $buyer_contact_tel_2 = "";
         isset( $rs_buyer['buyer_contact_tel_3'] ) ? $buyer_contact_tel_3 = $rs_buyer['buyer_contact_tel_3'] : $buyer_contact_tel_3 = "";
         isset( $rs_buyer['buyer_contact_tel_4'] ) ? $buyer_contact_tel_4 = $rs_buyer['buyer_contact_tel_4'] : $buyer_contact_tel_4 = "";
         isset( $rs_buyer['buyer_contact_line_id'] ) ? $buyer_contact_line_id = $rs_buyer['buyer_contact_line_id'] : $buyer_contact_line_id = "";
         isset( $rs_buyer['buyer_contact_fb'] ) ? $buyer_contact_fb = $rs_buyer['buyer_contact_fb'] : $buyer_contact_fb = "";
         isset( $rs_buyer['buyer_contact_email'] ) ? $buyer_contact_email = $rs_buyer['buyer_contact_email'] : $buyer_contact_email = "";
         isset( $rs_buyer['buyer_contact_whatsapp'] ) ? $buyer_contact_whatsapp = $rs_buyer['buyer_contact_whatsapp'] : $buyer_contact_whatsapp = "";
         isset( $rs_buyer['buyer_contact_wechat'] ) ? $buyer_contact_wechat = $rs_buyer['buyer_contact_wechat'] : $buyer_contact_wechat = "";
         isset( $rs_buyer['buyer_contact_remark'] ) ? $buyer_contact_remark = $rs_buyer['buyer_contact_remark'] : $buyer_contact_remark = "";
         isset( $rs_buyer['buyer_contact_language'] ) ? $_SESSION['buyer_contact_language'] = $rs_buyer['buyer_contact_language'] : $_SESSION['buyer_contact_language'] = "";
      
        
        if($buyer_contact_gender=='1'){ $icon_profile="icon_men.png";  }else if($buyer_contact_gender=='2'){ $icon_profile="icon_women.png"; } else{ $icon_profile="icon_women.png";  }
      
         $buyer_contact_name=$buyer_contact_name."  ".$buyer_contact_lastname;

     }





  ?> 

<?php if($code!=''){ 

            if($create_deal_sale!=0){

                 $sql_re="SELECT * FROM dbo_register where register_id='$create_deal_sale' ";  
                 $result_re=$conn->query($sql_re);
                 $rs_re=$result_re->fetch_assoc();

                 $name_sale_s=$rs_re['register_name']." (".$rs_re['register_nickname'].")";

            }
        

    ?>

            <div class="row">
              <div class="col-md-10">
                  <h3>รหัส DEAL : <?php echo $code;?> <?php if($create_deal_title!=''){  echo " | ลูกค้า : ".$create_deal_title; } ?> </h3> 
                  <h4>เซลล์ผู้ดูแล : <?php echo $name_sale_s;?>  </h4> 
              </div>
              <div class="col-md-2"> 
                  <a href="?page=deal_buyer" class="btn btn-block btn-primary btn-lg right"   > Create deal ซื้อทรัพย์</a><br>
              </div>
            </div>


<?php } ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
      
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a href="?page=create_deal_buyer&status=edit&p_check=create_deal&code=<?php echo $code;?>&d_check=1" class="nav-link <?php if($d_check=='1'){ ?>active <?php } ?>" >Deal Info</a></li>
                  <li class="nav-item"><a href="?page=create_deal_buyer&status=edit&p_check=create_deal&code=<?php echo $code;?>&d_check=4" class="nav-link <?php if($d_check=='4'){ ?>active <?php } ?>" >Deal Activity 
                          <?php if($count_offer>=1){ ?><span class="right badge badge-danger"><?php echo $count_offer;?></span><?php } ?> </a>  </li>
                  <li class="nav-item"><a href="?page=create_deal_buyer&status=edit&p_check=create_deal&code=<?php echo $code;?>&d_check=3" class="nav-link <?php if($d_check=='3'){ ?>active <?php } ?>" >Calendar</a></li>
                  <li class="nav-item"><a href="?page=create_deal_buyer&status=edit&p_check=create_deal&code=<?php echo $code;?>&d_check=5" class="nav-link <?php if($d_check=='5'){ ?>active <?php } ?>" >Log Activity </a></li>
                  <li class="nav-item"><a href="?page=create_deal_buyer&status=edit&p_check=create_deal&code=<?php echo $code;?>&d_check=2" class="nav-link <?php if($d_check=='2'){ ?>active <?php } ?>" >Timeline</a></li>
                  
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
   
  <?php if($d_check=='1' or $d_check==''){
 



          if($create_deal_attention_2=='0' and $create_deal_type_2=='0'){

                 $create_deal_attention_2=$rs['create_deal_attention'];
                 $create_deal_type_2=$rs['create_deal_type'];
                 $create_deal_budget_start_2=$rs['create_deal_budget_start'];
                 $create_deal_budget_end_2=$rs['create_deal_budget_end'];
                 $project_id_2=$rs['project_id'];
                 $project_id_check=$rs['project_id'];
                 $zone_id_2=$rs['zone_id'];
                 $station_id_2=$rs['station_id'];
                 $create_deal_bedroom_2=$rs['create_deal_bedroom'];
                 $create_deal_bathroom_2=$rs['create_deal_bathroom'];
                 $create_deal_sqm_start_2=$rs['create_deal_sqm_start'];
                 $create_deal_sqm_end_2=$rs['create_deal_sqm_end'];
                 $create_deal_select_floor_2=$rs['create_deal_select_floor'];
                 $create_deal_floor_2=$rs['create_deal_floor']; 
  
          }

   ?>

 

              <div class="modal fade" id="modal-closelost">
                <div class="modal-dialog">
                  <div class="modal-content bg-danger">
                    <div class="modal-header">
                      <h4 class="modal-title">ดำเนินการ Close Lost Deal</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
    

                 <form method="post" id="form" class="form-horizontal" enctype="multipart/form-data" action="include/process.php" >

                  <input type="text" class="form-control" name="page"  value="create_deal" hidden="hidden">
                  <input type="text" class="form-control" name="user_id"  value="<?php echo $USER_ID;?>" hidden="hidden" >
                  <input type="text" class="form-control" name="p_check"  value="cancel_deal" hidden="hidden" > 
                  <input type="text" class="form-control" name="id"  value="<?php echo $subdeal_code;?>" hidden="hidden">
                  <input type="text" class="form-control" name="code"  value="<?php echo $code;?>" hidden="hidden">
             

                    <div class="row" style="font-size: 16px; " >
 
                        <div class="col-md-12" > 
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-12 col-form-label">เหตุผลของการยกเลิกดีล : </label>
                            <div class="col-sm-12"> 
                                 <select class="form-control select"  name="contact_deal_cancel_status"  id="contact_deal_cancel_status"  style="width: 100%;" required="">

                                    <option value="0">ไม่เลือก</option>  
                                    <option value="1">1. เราไม่มีทรัพย์ที่ตรงตามความต้องการ</option>  
                                    <option value="2">2. ติดต่อลูกค้าไม่ได้ตั้งแต่ครั้งแรก</option>  
                                    <option value="3">3. ลูกค้าได้ทรัพย์กับเอเจนท์อื่น</option>   
                                    <option value="4">4. ลูกค้าเปลี่ยนใจไม่ซื้อ/เช่า</option>   
                                    <option value="5">5. เจ้าของเปลี่ยนใจไม่ซื้อ/เช่า</option>   
                                    <option value="6">6. การเจรจาต่อรองระหว่างผู้ซื้อ/ผู้ขาย ไม่จบ</option>   
                                    <option value="7">7. ลูกค้า shopping</option>   
                                    <option value="8">8. ความต้องการลูกค้าเกินความจริง</option> 
                                    <option value="9">9. คุยๆ อยู่แล้วหายไป</option> 
                                    <option value="10">10. อื่นๆ ระบุ</option>  
                                      
                                  </select>
                            </div>
                          </div> 
                       </div>
 
                       <div class="col-md-12" > 
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Remark :  </label>
                            <div class="col-sm-12"> 
                              <textarea class="form-control" rows="5" placeholder="Enter ..." id="contact_deal_cancel_remark" name="contact_deal_cancel_remark"></textarea>
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



              <div class="modal fade" id="modal-offer">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">ดำเนินการแจ้งสต๊อกช่วยหาห้อง</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
    

                 <form method="post" id="form" class="form-horizontal" enctype="multipart/form-data" action="include/process.php" >

                  <input type="text" class="form-control" name="page"  value="message_stock" hidden="hidden">
                  <input type="text" class="form-control" name="user_id"  value="<?php echo $USER_ID;?>" hidden="hidden" >
                  <input type="text" class="form-control" name="p_check"  value="cancel_deal" hidden="hidden" >  
                  <input type="text" class="form-control" name="code"  value="<?php echo $code;?>" hidden="hidden">
                  <input type="text" class="form-control" name="create_deal_title"  value="<?php echo $create_deal_title;?>" hidden="hidden">

                    <div class="row" style="font-size: 16px; " >
  

                       <div class="col-md-12" > 
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Remark : </label>
                            <div class="col-sm-12"> 
                              <textarea class="form-control" rows="5" placeholder="Enter ..." id="message_stock_message" name="message_stock_message" ></textarea>
                            </div>
                          </div> 
                       </div>

                      <div class="col-12" >
                       
                    
                           <center>
                               <input type="submit" class="btn btn-warning" value="Yes">
                               <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
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

                  <div class="active tab-pane" id="deal">

        <div class="row">
          <div class="col-md-2">

<!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="img/<?php echo $icon_profile;?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $buyer_contact_name;?></h3>

                <p class="text-muted text-center"> </p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>รหัสลูกค้า : </b> <a class="float-right"><?php echo $buyer_contact_code;?></a>
                  </li>
                  <li class="list-group-item">
                    <b>ชื่อเรียก : </b> <a class="float-right"><?php echo $buyer_contact_line;?><?php if($buyer_contact_status=='1'){  }else{ echo " (Agent)";} ?></a>
                                  
                  </li>
                  <li class="list-group-item">
                    <b>TEL : </b> <?php if($buyer_contact_tel!=''){ ?> <a href="tel:<?php echo $buyer_contact_tel;?>" class="float-right" ><?php echo $buyer_contact_tel;?></a> <?php } ?>
                                  <?php if($buyer_contact_tel_2!=''){ ?><br> <a href="tel:<?php echo $buyer_contact_tel_2;?>" class="float-right" ><?php echo $buyer_contact_tel_2;?></a> <?php } ?>
                                  <?php if($buyer_contact_tel_3!=''){ ?><br> <a href="tel:<?php echo $buyer_contact_tel_3;?>" class="float-right" ><?php echo $buyer_contact_tel_3;?></a> <?php } ?>
                                  <?php if($buyer_contact_tel_4!=''){ ?><br> <a href="tel:<?php echo $buyer_contact_tel_4;?>" class="float-right" ><?php echo $buyer_contact_tel_4;?></a> <?php } ?>
                  </li>
                  <li class="list-group-item">
                    <b>LINE : </b> <a class="float-right" href="<?php echo $buyer_contact_line_id;?>" target="_black"><?php echo $buyer_contact_line_id;?></a>
                  </li>
                  <li class="list-group-item">
                    <b>WHATSAPP : </b> <a class="float-right"><?php echo $buyer_contact_whatsapp;?></a>
                  </li>
                  <li class="list-group-item">
                    <b>WECHAT : </b> <a class="float-right"><?php echo $buyer_contact_wechat;?></a>
                  </li>
                  <li class="list-group-item">
                    <b>FB : </b> <a href="<?php echo $buyer_contact_fb;?>" class="float-right"><?php echo $buyer_contact_fb;?></a>
                  </li>
                  <li class="list-group-item">
                    <b>E-MAIL : </b> <a class="float-right"><?php echo $buyer_contact_email;?></a>
                  </li>
                </ul>
        <?php if($_SESSION['STATUS_ID']!='1'){ ?>
            
                <a href="?page=create_deal_buyer&status=edit&p_check=create_buyer&code=<?php echo $code;?>&buyer_id=<?php echo $buyer_id;?>&step=1" class="btn btn-primary btn-block"><b>แก้ไขข้อมูล</b></a>

        <?php } ?>

<?php if($contact_deal_win!='8' and $contact_deal_win!='9'){ //ยังไม่ close lot won  ?> 

                <br>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-closelost" style="width: 100%;">Close Lost Deal  </button>


        <?php if($_SESSION['STATUS_ID']=='4' and $message_stock_id!='0'){ ?>

                <br><br>
                <a href="include/process.php?page=message_stock&code=<?php echo $code;?>" class="btn btn-success" style="width: 100%;"> เสนอห้องเรียบร้อย</a>

        <?php } ?>  

 

        <?php if($_SESSION['STATUS_ID']=='1' or $_SESSION['STATUS_HEAD']=='1' or $_SESSION['STATUS_ID']=='4'){ ?>

                <br><br>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-offer" style="width: 100%;">แจ้งสต๊อกช่วยหาห้อง  </button>

        <?php } ?> 


<?php } //ยังไม่ close lot won  ?>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

<?php if($contact_deal_win!='8' and $contact_deal_win!='9'){ //ยังไม่ close lot won  ?> 

        <?php if( $message_stock_id!='0' ){ ?>

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Remark  </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               

                <p class="text-muted"> 
                  <?php echo $message_stock_message;?>  

                </p>

                <hr>
                 <?php echo "วันที่แจ้ง : ".$message_stock_create;?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->    
        <?php } ?> 
<?php }else{  //ยังไม่ close lot won 
 

         if($contact_deal_cancel_status=='0'){

               $deal_cancel_status="ไม่เลือก";   

         }else if($contact_deal_cancel_status=='1'){

               $deal_cancel_status="เราไม่มีทรัพย์ที่ตรงตามความต้องการ";

         }else if($contact_deal_cancel_status=='2'){

               $deal_cancel_status="ติดต่อลูกค้าไม่ได้ตั้งแต่ครั้งแรก";

         }else if($contact_deal_cancel_status=='3'){

               $deal_cancel_status="ลูกค้าได้ทรัพย์กับเอเจนท์อื่น";

         }else if($contact_deal_cancel_status=='4'){

               $deal_cancel_status="ลูกค้าเปลี่ยนใจไม่ซื้อ/เช่า";

         }else if($contact_deal_cancel_status=='5'){

               $deal_cancel_status="เจ้าของเปลี่ยนใจไม่ซื้อ/เช่า";

         }else if($contact_deal_cancel_status=='6'){

               $deal_cancel_status="การเจรจาต่อรองระหว่างผู้ซื้อ/ผู้ขาย ไม่จบ";     

         }else if($contact_deal_cancel_status=='7'){

               $deal_cancel_status="ลูกค้า shopping";     

         }else if($contact_deal_cancel_status=='8'){

               $deal_cancel_status="ความต้องการลูกค้าเกินความจริง";     

         }else if($contact_deal_cancel_status=='9'){

               $deal_cancel_status="คุยๆ อยู่แล้วหายไป";     

         }else if($contact_deal_cancel_status=='10'){

               $deal_cancel_status="อื่นๆ ระบุ";     

         }

 ?>     

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header" <?php if($contact_deal_win=='9'){ ?> style="background-color: red;" <?php } ?>>
                <h3 class="card-title"><?php if($contact_deal_win=='8'){ echo "Close Won";}else{ echo "Close Lost";} ?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                

                <p class="text-muted"> 
                  <?php echo $deal_cancel_status." <br><br>";?>
                  <?php echo $contact_deal_cancel_remark;?>
                </p>

                <hr>
 
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->    
<?php } ?>


         </div>

          <div class="col-md-10"> <!-- col-md-10 -->
 <script>
    function checkSubmit() {
        var e = document.getElementById('submit');
        e.style.display = "none";
    }
</script>
    
               <form method="post" id="form" class="form-horizontal" enctype="multipart/form-data" action="include/process.php" onsubmit="return checkSubmit()"  >

                <input type="text" class="form-control" name="page"  value="<?php echo $_GET['page'];?>" hidden="hidden">
                <input type="text" class="form-control" name="user_id"  value="<?php echo $USER_ID;?>" hidden="hidden" >
                <input type="text" class="form-control" name="p_check"  value="create_deal" hidden="hidden" >


            <?php if($status!=''){ ?>

                <input type="text" name="edit"  value="edit" hidden="hidden">
                <input type="text" name="id"  value="<?php echo $code;?>" hidden="hidden">
                <input type="text" name="create_deal_title"  value="<?php echo $create_deal_title;?>" hidden="hidden">
                <input type="text" name="buyer_contact_line"  value="<?php echo $buyer_contact_line;?>" hidden="hidden"> 
                <input type="text" name="create_deal_sale_2"  value="<?php echo $create_deal_sale;?>" hidden="hidden" > 
<!--
                <input type="text" name="create_deal_attention_2"  value="<?php echo $create_deal_attention;?>" hidden="hidden">
                <input type="text" name="create_deal_type_2"  value="<?php echo $create_deal_type;?>" hidden="hidden">
                <input type="text" name="create_deal_budget_start_2"  value="<?php echo $create_deal_budget_start;?>" hidden="hidden">
                <input type="text" name="create_deal_budget_end_2"  value="<?php echo $create_deal_budget_end;?>" hidden="hidden">
                <input type="text" name="project_id_2"  value="<?php echo $project_id;?>" hidden="hidden">
                <input type="text" name="station_id_2"  value="<?php echo $station_id;?>" hidden="hidden">
                <input type="text" name="zone_id_2"  value="<?php echo $zone_id;?>" hidden="hidden">
                <input type="text" name="create_deal_bedroom_2"  value="<?php echo $create_deal_bedroom;?>" hidden="hidden">
                <input type="text" name="create_deal_bathroom_2"  value="<?php echo $create_deal_bathroom;?>" hidden="hidden">
                <input type="text" name="create_deal_sqm_start_2"  value="<?php echo $create_deal_sqm_start;?>" hidden="hidden">
                <input type="text" name="create_deal_sqm_end_2"  value="<?php echo $create_deal_sqm_end;?>" hidden="hidden">
                <input type="text" name="create_deal_select_floor_2"  value="<?php echo $create_deal_select_floor;?>" hidden="hidden">
                <input type="text" name="create_deal_open_room_2"  value="<?php echo $create_deal_open_room;?>" hidden="hidden">
                <input type="text" name="create_deal_duration_2"  value="<?php echo $create_deal_duration;?>" hidden="hidden">
                <input type="text" name="create_deal_pet_friendly_2"  value="<?php echo $create_deal_pet_friendly;?>" hidden="hidden">
                <input type="text" name="create_deal_pet_friendly_type_2"  value="<?php echo $create_deal_pet_friendly_type;?>" hidden="hidden">
                <input type="text" name="create_deal_search_from_2"  value="<?php echo $create_deal_search_from;?>" hidden="hidden"> 
                <input type="text" name="create_deal_sale_2"  value="<?php echo $create_deal_sale;?>" hidden="hidden" > 
-->

            <?php } ?> 



                    <div class="row"> <!--
                      <div class="col-md-6" > 
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">ชื่อเรียก : </label>
                            <div class="col-sm-9">
                              
                            </div>
                          </div> 
                      </div>-->
                      <div class="col-md-12 col-sm-12" > 
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-12 col-form-label">Requirement : </label>
                            <div class="col-sm-12"> 
                              <textarea class="form-control" rows="5" placeholder="Enter ..." id="create_deal_remark_2" name="create_deal_remark_2" hidden ><?php echo $create_deal_remark;?></textarea>
                              <textarea class="form-control" rows="5" placeholder="Enter ..." id="create_deal_remark" name="create_deal_remark"><?php echo $create_deal_remark;?></textarea>
                            </div>
                          </div> 
                       </div>


                       <div class="col-md-12" > 
 
                          <div class="row">
 <style>
div.scroll {width:100%; max-height: 500px; overflow-x:auto;}

 </style>


                      <?php $i=0;

                          $sql_img="SELECT * FROM dbo_create_deal_img  WHERE  create_deal_code='$code' order by deal_img_id  ASC  ";  

                          $result_img= $conn->query($sql_img);
                          while($rs_img=$result_img->fetch_assoc()) {   $i++;

                            $deal_img_file=$rs_img['deal_img_file'];
                            $deal_img_id=$rs_img['deal_img_id'];
                            $image="file/chat_line/".$deal_img_file;

                      ?>

                            <div class="col-md-4 col-sm-12">
                                <div class="scroll">

                                 
                                       <a href="<?php echo $image;?>" data-toggle="lightbox" data-title="ภาพจาก LINE" data-gallery="gallery">
                                        <img src="<?php echo $image;?>" class="img-fluid mb-2" alt="white sample"/>
                                      </a>
                                </div>
                            </div>

                      <?php } ?>


 
                          </div>

                       </div>

 
                      <input type="text" class="form-control" id="create_deal_title" name="create_deal_title" placeholder="โปรดกรอกชื่อเรียกดีล" value="<?php echo $create_deal_title;?>" hidden >
                      <div class="col-md-4 col-sm-12" > 
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-12 col-form-label">ความต้องการ : </label>
                          <div class="col-sm-12">
                            <select class="form-control select"  name="create_deal_attention_2"  id="create_deal_attention_2"  style="width: 100%;">

                              <option value="0">ไม่เลือก</option>  
                              <option value="1" <?php if($create_deal_attention_2=="1"){?> selected <?php } ?>>ต้องการซื้อ</option>  
                              <option value="2" <?php if($create_deal_attention_2=="2"){?> selected <?php } ?>>ต้องการเช่า</option>  
                              <option value="4" <?php if($create_deal_attention_2=="4"){?> selected <?php } ?>>ต่อสัญญา</option>  
                            </select>
                           </div>
                        </div> 
                      </div>
                      <div class="col-md-4 col-sm-12">

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-12 col-form-label">ประเภททรัพย์ : </label>
                          <div class="col-sm-12">
                            <select class="form-control select"  name="create_deal_type_2"  id="create_deal_type_2"  style="width: 100%;" required=""> 
                              <option value="" selected >ไม่เลือก</option> 
                         <?php  
                                   $sql_type_asset="SELECT * FROM type_asset order by id  ASC"; 
                                   $result_type_asset=$conn->query($sql_type_asset);

                                   if($result_type_asset->num_rows > 0) { 
                                       while($rs_type = $result_type_asset->fetch_assoc()) {   

                                       $type_code=$rs_type['id'];
                                  ?> 
                                                    <option value="<?php echo $type_code;?>"   readonly <?php if($create_deal_type_2==$type_code){?> selected <?php } ?> ><?php echo $rs_type['name'];?></option> 
                                <?php    }
                                      }     ?>
                             
                            </select>
                           </div>
                        </div> 
                      </div>


                      <div class="col-md-3 col-sm-12" > 
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-12 col-form-label">CX ที่ลูกค้าเลือกมา : </label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control"    value="<?php echo $buyer_contact_listing_code;?>" disabled >                                     
                            </div>
                          </div> 
                      </div>

                      <div class="col-md-6 col-sm-12" id="project_check" > 
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-12 col-form-label">โครงการ : </label>
                          <div class="col-sm-12">
                            <select class="form-control select2bs4"  name="project_id_2"  id="project_id_2"  style="width: 100%;"> 
                              <option value="">ไม่เลือก</option> 
                                <?php 
                                  $sql="SELECT * FROM type_project where project_name!=''  order by project_id ASC  "; 
                                  $result=$conn->query($sql); 

                                  if($result->num_rows > 0) { 
                                      while($rs_project=$result->fetch_assoc()) {   

                                     $g++;

                                         $project_id_s=$rs_project['project_id'];              
                                         $project_name=$rs_project['project_name'];
                                         $project_name_en=$rs_project['project_name_en'];
                                         $project_latitude=$rs_project['project_proppit_latitude'];
                                         $project_longitude=$rs_project['project_proppit_longitude'];
                                         
                                         $project_name_text="โครงการ : ".$project_name." | Project : ".$project_name_en;  
                                 
                                    ?>   
                                       <option value="<?php echo $project_id_s;?>" <?php if($project_id_2==$project_id_s){ ?> selected <?php } ?>  readonly  ><?php echo $project_name_text;?></option> 
                            <?php     } 
                                  }  ?>
                             
                            </select>
                           </div>
                        </div> 
                      </div> 
                      <div class="col-md-6 col-sm-12"  id="station_check" > 
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-12 col-form-label">สถานีรถไฟฟ้า : </label>
                          <div class="col-sm-12">
                            <select class="form-control select2bs4"  name="station_id_2"  id="station_id_2"  style="width: 100%;"> 
                              <option value="">ไม่เลือก</option> 
                            <?php 
                              $strSQL = "SELECT * FROM type_train_station  "; 
                              $result=$conn->query($strSQL); 
                             
                              while($rs = $result->fetch_assoc()) {  
                                

                                     $station_id_s=$rs['station_id'];              
                                     $station_name=$rs['station_name'];
                                     $station_name_en=$rs['station_name_en'];  
                                     $tr_group=$rs['tr_group'];  
                                     $search_s_id=$rs['search_s_id'];
                                     
                                     $station_name_text="สถานีรถไฟฟ้า : ".$tr_group."-".$station_name." | ".$station_name_en;  
                             
                                ?>  
                                       <option value="<?php echo $station_id_s;?>" <?php if($station_id_2==$station_id_s){ ?> selected <?php } ?>   readonly  ><?php echo $station_name_text;?></option> 
                            <?php }  ?>
                             
                            </select>
                           </div>
                        </div> 
                      </div>               
                      <div class="col-md-6 col-sm-12" id="zone_check"> 
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-12 col-form-label">โซน : </label>
                          <div class="col-sm-12">
                            <select class="form-control select2bs4"  name="zone_id_2"  id="zone_id_2"  style="width: 100%;"> 
                              <option value="">ไม่เลือก</option> 
                                <?php 
                                  $strSQL = "SELECT * FROM type_zone  "; 
                                  $result=$conn->query($strSQL); 
                                 
                                  while($rs = $result->fetch_assoc()){   

                                      

                                         $zone_ids=$rs['zone_id'];              
                                         $zone_name=$rs['zone_name'];
                                         $zone_name_en=$rs['zone_name_en'];  
                                         $search_id_2=$rs['search_z_id'];
                                         
                                         $zone_name_text="โซน : ".$zone_name." | zone : ".$zone_name_en;  
                                 
                                    ?>   
                                       <option value="<?php echo $zone_ids;?>"  <?php if($zone_id_2==$zone_ids){ ?> selected <?php } ?>  readonly  ><?php echo $zone_name_text;?></option> 
                            <?php }  ?>
                             
                            </select>
                           </div>
                        </div> 
                      </div>
  
                      <div class="col-md-6 col-sm-12" >  </div>  
                       <div class="col-md-2 col-sm-12"> 
                           <div class="form-group row">
                            <label for="inputEmail4" class="col-sm-12 col-form-label">ห้องนอน : </label>
                            <div class="col-sm-12"> 
                              <input type="text" class="form-control" id="create_deal_bedroom_2" name="create_deal_bedroom_2" placeholder="หากเป็น studio ให้กรอก 0" title="จำนวนห้องนอน" value="<?php echo $create_deal_bedroom_2;?>" > 
                            </div> 
                          </div> 
                      </div>
                      <div class="col-md-2 col-sm-12"> 
                           <div class="form-group row">
                            <label for="inputEmail4" class="col-sm-12 col-form-label">ห้องน้ำ : </label>
                            <div class="col-sm-12"> 
                              <input type="text" class="form-control" id="create_deal_bathroom_2" name="create_deal_bathroom_2" placeholder="จำนวนห้องน้ำ" title="จำนวนห้องน้ำ" value="<?php echo $create_deal_bathroom_2;?>" > 
                            </div> 
                          </div> 
                      </div>

                      <div class="col-md-4 col-sm-12"> 
                           <div class="form-group row">
                            <label for="inputEmail4" class="col-sm-12 col-form-label">งบประมาณ : </label>
                            <div class="col-md-6 col-sm-12"> 
                              <input type="text" class="form-control" id="create_deal_budget_start_2" name="create_deal_budget_start_2" placeholder="เริ่มต้น" title="งบประมาณต่ำสุด" value="<?php echo $create_deal_budget_start_2;?>" > 
                            </div>
                            <div class="col-md-6 col-sm-12"> 
                              <input type="text" class="form-control" id="create_deal_budget_end_2" name="create_deal_budget_end_2" placeholder="สิ้นสุด" title="งบประมาณสูงสุด" value="<?php echo $create_deal_budget_end_2;?>" > 
                            </div>
                          </div> 
                      </div>
 
 

<!--
                       <div class="col-md-4" id="create_deal_duration_p"> 
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-5 col-form-label"> ระยะเวลาสัญญา (เดือน) :  </label>
                            <div class="col-sm-7"> 
                            <select class="form-control select2bs4"  name="create_deal_duration" id="create_deal_duration" style="width: 100%;"> 
                              <option value="0" <?php if($create_deal_duration=='0'){ ?>selected <?php } ?> >ไม่ระบุ  </option>  
                    <?php for ($i = 1; $i <= 100; $i++) { ?>
                              <option value="<?php echo $i;?>" <?php if($create_deal_duration==$i){ ?>selected <?php } ?>><?php echo $i;?> เดือน </option>     
                    <?php } ?>                     
                            </select>

                            </div>
                          </div> 
                      </div>
 -->
                
                      <div class="col-md-4 col-sm-12"> 
                           <div class="form-group row">
                            <label for="inputEmail4" class="col-sm-12 col-form-label">พื้นที่ใช้สอย : </label>
                            <div class="col-md-6 col-sm-12"> 
                              <input type="text" class="form-control" id="create_deal_sqm_start_2" name="create_deal_sqm_start_2" placeholder="พื้นที่ต่ำสุด" title="พื้นที่ต่ำสุด" value="<?php if($create_deal_sqm_start_2!='0'){ echo $create_deal_sqm_start_2;} ?>" > 
                            </div>
                            <div class="col-md-6 col-sm-12"> 
                              <input type="text" class="form-control" id="create_deal_sqm_end_2" name="create_deal_sqm_end_2" placeholder="พื้นที่สูงสุด" title="พื้นที่สูงสุด" value="<?php if($create_deal_sqm_end_2!='0'){ echo $create_deal_sqm_end_2;}?>" > 
                            </div>
                          </div> 
                      </div> 
 
                       <div class="col-md-4 col-sm-12"> 
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-12 col-form-label"> เลือกชั้น :  </label>
                            <div class="col-md-6 col-sm-12"> 
                              <select class="form-control select2bs4"  name="create_deal_select_floor_2" id="create_deal_select_floor_2" style="width: 100%;"> 
                                <option value="0" <?php if($create_deal_select_floor_2=='0'){ ?>selected <?php } ?> >ไม่ระบุ  </option>  
                                <option value="1" <?php if($create_deal_select_floor_2=='1'){ ?>selected <?php } ?>>ชั้นตำกว่า </option>  
                                <option value="2" <?php if($create_deal_select_floor_2=='2'){ ?>selected <?php } ?>>ชั้นสูงกว่า</option>                          
                              </select>

                            </div>
                            <div class="col-md-6 col-sm-12"> 
                              <input type="text" class="form-control" id="create_deal_floor_2" name="create_deal_floor_2" placeholder="โปรดระบุชั้น"   value="<?php echo $create_deal_floor_2;?>" > 

                            </div>
                          </div> 
                      </div>
                       <div class="col-md-4 col-sm-12"> 
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-12 col-form-label"> เลี้ยงสัตว์รึเปล่า :  </label>
                            <div class="col-md-6 col-sm-12"> 
                                <select class="form-control select2bs4"  name="create_deal_pet_friendly" id="create_deal_pet_friendly" style="width: 100%;"> 
                                  <option value="0" <?php if($create_deal_pet_friendly=='0'){ ?>selected <?php } ?> >ไม่เลี้ยง  </option>  
                                  <option value="1" <?php if($create_deal_pet_friendly=='1'){ ?>selected <?php } ?>>เลี้ยงสัตว์ </option>                      
                                </select>

                            </div>
                            <div class="col-md-6 col-sm-12"> 
                                 <input type="text" class="form-control" id="create_deal_pet_friendly_type" name="create_deal_pet_friendly_type" placeholder="โปรดกรอกประเภทสัตว์เลี้ยง"   value="<?php echo $create_deal_pet_friendly_type;?>" >
                            </div>
                          </div> 
                      </div>
                    
<!--
                      <div class="col-md-4"> 
                           <div class="form-group row">
                            <label for="inputEmail4" class="col-sm-4 col-form-label">เข้าอยู่เมื่อไหร่ : </label>
                            <div class="col-sm-8"> 
                              <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                  <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate1" name="create_deal_rent_till"  placeholder="โปรดกรอกตาม format ให้ถูกต้อง 01/01/2022" value="<?php echo $create_deal_rent_till;?>"  data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask />
                                  <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                  </div>
                              </div>

                            </div> 
                          </div> 
                      </div> 


                      <div class="col-md-4"> 
                           <div class="form-group row">
                            <label for="inputEmail4" class="col-sm-5 col-form-label">สะดวกไปดูห้องเมื่อไหร่ : </label>
                            <div class="col-sm-7"> 
                              <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                  <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate2" name="create_deal_open_room"  placeholder="โปรดกรอกตาม format ให้ถูกต้อง 01/01/2022" value="<?php echo $create_deal_open_room;?>"  data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask />
                                  <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                  </div>
                              </div>

                            </div> 
                          </div> 
                      </div> -->
             
                <!--
                       <div class="col-md-4"> 
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label"> เลี้ยงสัตว์รึเปล่า :  </label>
                            <div class="col-sm-8"> 
                            <select class="form-control select2bs4"  name="create_deal_pet_friendly" id="create_deal_pet_friendly" style="width: 100%;"> 
                              <option value="0" <?php if($create_deal_pet_friendly=='0'){ ?>selected <?php } ?> >ไม่เลี้ยง  </option>  
                              <option value="1" <?php if($create_deal_pet_friendly=='1'){ ?>selected <?php } ?>>เลี้ยงสัตว์ </option>                      
                            </select>

                            </div>
                          </div> 
                      </div>
               
                       <div class="col-md-4"> 
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label"> ประเภทสัตว์เลี้ยง :  </label>
                            <div class="col-sm-8"> 
                               <input type="text" class="form-control" id="create_deal_pet_friendly_type" name="create_deal_pet_friendly_type" placeholder=""   value="<?php echo $create_deal_pet_friendly_type;?>" > 

                            </div>
                          </div> 
                      </div>     -->
                    
  

 
      

                      <div class="col-md-4 col-sm-12"> 
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-12 col-form-label"> ค้นหาจาก :  </label>
                            <div class="col-sm-12"> 
                            <select class="form-control select2bs4"  name="create_deal_search_from" id="create_deal_search_from" style="width: 100%;">  
                              <option value="1" <?php if($create_deal_search_from=='1' or $create_deal_search_from=='0'){ ?>selected <?php } ?>>โครงการ </option>  
                              <option value="2" <?php if($create_deal_search_from=='2'){ ?>selected <?php } ?>>สถานีรถไฟฟ้า BTS MRT</option>   
                              <option value="3" <?php if($create_deal_search_from=='3'){ ?>selected <?php } ?>>โซน</option>                         
                            </select>

                            </div>
                          </div> 
                      </div>
                      
                    <!--
                       <div class="col-md-6"> 
                          <div class="form-group row">
                            <input type="text" class="form-control" name="create_deal_user" hidden="hidden" value="<?php if($create_deal_user!=''){echo $create_deal_user; }else{echo $_SESSION['USER_ID'];} ?>">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">ผู้เพิ่มข้อมูล : </label>
                            <div class="col-sm-9"><input type="text" class="form-control"  disabled="disabled"  value="<?php echo $name_contact;?>"> </div>
                            
                          </div> 
                      </div> -->

 

                      <div class="col-12" id="buyer_contact_submit" >
                       
                    
                           <center><input type="submit" id="submit"  class="btn btn-danger" value="บันทึก และค้นหา Listing"></center>
                         
                        <!-- /.form-group -->
                      </div>

                    </div>



                    </form>
                

              </div> <!-- END col-md-10 -->
          </div> <!-- END row -->





                  </div>
                  <!-- /.tab-pane -->

  <?php } //END d_check=='1'  ?>


  <?php if($d_check=='2'){ ?>

           <!-- Note Activity -->


                  <div class="active tab-pane" id="activity">
                   
                    <!-- Post -->
                    <div class="post clearfix">            
             
                      <form method="post" id="form" class="form-horizontal" enctype="multipart/form-data" action="include/process.php" >

                        <input type="text" class="form-control" name="page"  value="<?php echo $_GET['page'];?>" hidden="hidden" >
                        <input type="text" class="form-control" name="user_id"  value="<?php echo $USER_ID;?>" hidden="hidden" >
                        <input type="text" class="form-control" name="p_check"  value="create_note_deal" hidden="hidden" >
                        <input type="text" class="form-control" name="id"  value="<?php echo $code;?>" hidden="hidden" >

                        <div class="input-group input-group-sm mb-0">
                          <textarea class="form-control form-control-sm" rows="5" placeholder="โปรดกรอกสิ่งที่ต้องการ Note โดยละเอียด" id="deal_note_message" name="deal_note_message"><?php echo $deal_note_message;?></textarea>
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-danger">Send</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- /.post -->
            <div class="timeline">
              <!-- timeline time label -->
              <div class="time-label">
                <span class="bg-red">Timeline</span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->


      <?php if($contact_deal_win=='9' or $contact_deal_win=='8'){
                          
                if($contact_deal_win=='9'){
                      $title='Close LOST';

                       if($contact_deal_cancel_status=='0'){
                             $deal_cancel_status="ไม่เลือก";   
                       }else if($contact_deal_cancel_status=='1'){
                             $deal_cancel_status="เราไม่มีทรัพย์ที่ตรงตามความต้องการ";
                       }else if($contact_deal_cancel_status=='2'){
                             $deal_cancel_status="ติดต่อลูกค้าไม่ได้ตั้งแต่ครั้งแรก";
                       }else if($contact_deal_cancel_status=='3'){
                             $deal_cancel_status="ลูกค้าได้ทรัพย์กับเอเจนท์อื่น";
                       }else if($contact_deal_cancel_status=='4'){
                             $deal_cancel_status="ลูกค้าเปลี่ยนใจไม่ซื้อ/เช่า";
                       }else if($contact_deal_cancel_status=='5'){
                             $deal_cancel_status="เจ้าของเปลี่ยนใจไม่ซื้อ/เช่า";
                       }else if($contact_deal_cancel_status=='6'){
                             $deal_cancel_status="การเจรจาต่อรองระหว่างผู้ซื้อ/ผู้ขาย ไม่จบ"; 
                       }else if($contact_deal_cancel_status=='7'){
                             $deal_cancel_status="ลูกค้า shopping";
                       }else if($contact_deal_cancel_status=='8'){
                             $deal_cancel_status="ความต้องการลูกค้าเกินความจริง";
                       }else if($contact_deal_cancel_status=='9'){
                             $deal_cancel_status="คุยๆ อยู่แล้วหายไป";
                       }else if($contact_deal_cancel_status=='10'){
                             $deal_cancel_status="อื่นๆ ระบุ";     
                       }
                }else{
                      $title='Close WON';
                }
        ?>

              <div>
                <i class="fas fa-envelope bg-blue"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i> <?php echo $create_deal_update;?> </span>
                  <h3 class="timeline-header"><a href="#"> <?php echo $title;?> </a>  </h3>

                  <div class="timeline-body">

                    <div class="row" >

                      <div class="col-sm-12 col-md-12">
                            <?php if($contact_deal_cancel_status!=''){ echo $deal_cancel_status."<br>"; } ?>
                             
                            <?php if($contact_deal_cancel_remark!=''){ echo "<b>remark : </b>".nl2br($contact_deal_cancel_remark)."<br>"; } ?>
                      </div>       
                    </div>

                  </div>

                  <!--
                  <div class="timeline-footer">
                    <a class="btn btn-primary btn-sm">Read more</a>
                    <a class="btn btn-danger btn-sm">Delete</a>
                  </div>-->
                </div>
              </div>
              <!-- END timeline item -->
      <?php } ?>


        <?php

           $sql_note="SELECT * FROM dbo_subdeal_calendar_record  where create_deal_code='$code' or subdeal_code LIKE '%$code%' order by s_record_create DESC  LIMIT 20 ";  
           $result_note = $conn->query($sql_note);
       
           if($result_note->num_rows > 0) { //num_rows
              // output data of each row
               while($rs_note=$result_note->fetch_assoc()) {  

                   $user_id_2=$rs_note['user_id'];
                   $s_record_create=$rs_note['s_record_create'];
                   $s_record_note=$rs_note['s_record_note'];
                   $create_deal_code=$rs_note['create_deal_code'];
                   $ex_list_listing_code=$rs_note['ex_list_listing_code'];
                   $s_record_status=$rs_note['s_record_status'];
                   $s_record_title_status=$rs_note['s_record_title_status'];
                   $s_record_chance=$rs_note['s_record_chance'];
                   $s_record_date=$rs_note['s_record_date'];
                   $s_record_time_start=$rs_note['s_record_time_start'];
                   $s_record_time_end=$rs_note['s_record_time_end']; 
                   $s_record_check=$rs_note['s_record_check'];
                   $s_record_file=$rs_note['s_record_file'];
                   $edit=$rs_note['edit'];

                   if($s_record_file!=''){  
                          $file_img="file/create_deal/".$s_record_file;
                   }

                   if($s_record_chance=='1'){
                           $chance="ต่ำ";
                   }else if($s_record_chance=='2'){
                           $chance="กลาง";
                   }else if($s_record_chance=='3'){
                           $chance="สูง";
                   }



                            if($s_record_title_status=='1'){
                                  $s_record_title_status='ถ่ายรูปห้อง';
                            }else if($s_record_title_status=='2'){
                                  $s_record_title_status='ตรวจเช็คห้อง';
                            }else if($s_record_title_status=='3'){
                                  $s_record_title_status='ส่งมอบห้อง';
                            }else if($s_record_title_status=='4'){
                                  $s_record_title_status='ย้ายออก';
                            }else if($s_record_title_status=='5'){
                                  $s_record_title_status='ขอใบปลอดหนี้';
                            }else if($s_record_title_status=='6'){
                                  $s_record_title_status='ติดต่อกรมที่ดิน';
                            }else if($s_record_title_status=='7'){
                                  $s_record_title_status='อื่นๆ';
                            }

                      //////////////    //////////////
                   $sql_register="SELECT * FROM dbo_register where register_id='$user_id_2' ";  
                   $result_register= $conn->query($sql_register);
                   $rs_register=$result_register->fetch_assoc(); 

                   $ex_list_contact=$rs_register['register_name']." | ".$rs_register['register_email'];
                   

                   if($s_record_status=='1'){                       
                       $title="นำเสนอห้อง ".$ex_list_listing_code;
                       $s_record_check='0';
                   }else if($s_record_status=='2'){
                       $title="นัดชมทรัพย์ ".$ex_list_listing_code;
                   }else if($s_record_status=='3'){
                       $title="ชมทรัพย์แล้ว ".$ex_list_listing_code;
                   }else if($s_record_status=='10'){
                       $title="จองแล้ว ".$ex_list_listing_code;
                   }else if($s_record_status=='4'){
                       $title="นัดเซ็นต์สัญญา ".$ex_list_listing_code;
                   }else if($s_record_status=='5'){
                       $title="เซ็นต์สัญญาแล้ว ".$ex_list_listing_code;
                   }else if($s_record_status=='6'){
                       $title="นัดโอน ".$ex_list_listing_code;
                   }else if($s_record_status=='7'){
                       $title="โอนแล้ว".$ex_list_listing_code;
                   }else if($s_record_status=='8'){
                       $title="Close Won ".$ex_list_listing_code;
                       $s_record_check='0';
                   }else if($s_record_status=='9'){
                       $title="Close Lost ".$ex_list_listing_code;
                       $s_record_check='0';
                   }else if($s_record_status=='11'){
                       $title="Deal Activity Note"; 
                  }else if($s_record_status=='0' and $s_record_title_status!=''){  
                       $title=$s_record_title_status." ".$ex_list_listing_code;   
                   }else if($s_record_status!=''){
                       $title="Note รวม";
                   }else{
                       $title=$s_calendar_title_status;   
                   }
               
                $year=substr($s_record_create,0 , 4 );
                $month=substr($s_record_create,5 , 2 );
                $day=substr($s_record_create,8 , 2 );

                $time=substr($s_record_create,11 , 5 );
                $year=$year+543;

                 $deal_note_date=$day."/".$month."/".$year." เวลา : ".$time;

                $year=substr($s_record_date,0 , 4 );
                $month=substr($s_record_date,5 , 2 );
                $day=substr($s_record_date,8 , 2 );
                $year=$year+543;   

                 $s_record_date=$day."/".$month."/".$year;
          ?>


              <div>
                <i class="fas fa-envelope bg-blue"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i> <?php echo $deal_note_date;?> | <?php echo $ex_list_contact;?></span>
                  <h3 class="timeline-header"><a href="#"> <?php echo $title;?> <?php if($edit=='1'){ echo "(แก้ไข)";}?> </a>  </h3>

                  <div class="timeline-body">

                    <div class="row" >

                      <div class="col-sm-12 col-md-12">
                            <?php if($s_record_check=='1'){ echo "<b>วันที่นัด : </b>".$s_record_date." <b>เวลา : </b>".$s_record_time_start."-".$s_record_time_end."<br>"; } ?>
                            <?php if($s_record_chance!='0'){ 
                                        echo "<b>โอกาสปิด : </b>".$chance."<br>";
                                  } ?>
                            <?php if($s_record_note!=''){ echo "<b>remark : </b>".nl2br($s_record_note)."<br>"; } ?>
                      </div>    
                      <div class="col-sm-12 col-md-4">
                            <?php if($s_record_file!=''){  echo "<b>ไฟล์ที่แนบมา : </b><br>"; ?>

                                        <img src="<?php echo $file_img;?>" style="width: 100%;" >
                            <?php } ?>

                      </div>       
                    </div>

                  </div>

                  <!--
                  <div class="timeline-footer">
                    <a class="btn btn-primary btn-sm">Read more</a>
                    <a class="btn btn-danger btn-sm">Delete</a>
                  </div>-->
                </div>
              </div>
              <!-- END timeline item -->
              <!-- timeline item -->
              
                  <!-- /.post -->
              <?php
                   }
               }  
               ?>
            
              <!-- END timeline item -->
              <div>
                <i class="fas fa-clock bg-gray"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i> <?php echo $deal_create;?> | <?php echo $deal_create_contact;?></span>
                  <h3 class="timeline-header"><a href="#">สร้างดีล</a>  </h3>

                  <div class="timeline-body">

                    <div class="row" >
                       
                    </div>

                  </div>

                  <!--
                  <div class="timeline-footer">
                    <a class="btn btn-primary btn-sm">Read more</a>
                    <a class="btn btn-danger btn-sm">Delete</a>
                  </div>-->
                </div>
              </div>
            </div>



                   
                  </div>
                  <!-- /.tab-pane -->

  <?php } //END d_check=='2'  ?>

  <?php if($d_check=='3'){ ?>

                  <div class="active tab-pane" id="timeline"> 

                          <!-- Main content -->
                        <section class="content">
                          <div class="container-fluid">
                            <div class="row">
                              <div class="col-md-12">



                            <div class="modal fade" id="modal-default">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">กิจกรรมอื่นๆ</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                  

                               <form method="post" id="form" class="form-horizontal" enctype="multipart/form-data" action="include/process.php" >

                                <input type="text" class="form-control" name="page"  value="create_subdeal" hidden="hidden">
                                <input type="text" class="form-control" name="user_id"  value="<?php echo $USER_ID;?>" hidden="hidden" >
                                <input type="text" class="form-control" name="p_check"  value="0" hidden="hidden" > 
                                <input type="text" class="form-control" name="id"  value="<?php echo $subdeal_code;?>" hidden="hidden">
                                <input type="text" class="form-control" name="code"  value="<?php echo $code;?>" hidden="hidden">
                                <input type="text" class="form-control" name="listing_code"  value="<?php echo $ex_list_listing_code;?>" hidden="hidden">
                                <input type="text" class="form-control" name="s_calendar_status"  value="10" hidden="hidden">
                                  <div class="row" style="font-size: 14px; " >




                                    <div class="col-md-12" id="buyer_contact_name" > 
                                        <div class="form-group row">
                                          <label for="inputEmail3" class="col-sm-3 col-form-label">กิจกรรม : </label>
                                          <div class="col-sm-9">
                                               <select class="form-control select2bs4"  name="s_calendar_title_status" id="s_calendar_title_status"  style="width: 100%;" required="" > 
                                                <option value="">ไม่เลือก</option> 
                                                  <option value="1"    >ถ่ายรูปห้อง</option>        
                                                  <option value="2"    >ตรวจเช็คห้อง</option>     
                                                  <option value="3"    >ส่งมอบห้อง</option>     
                                                  <option value="4"    >ย้ายออก</option>     
                                                  <option value="5"    >ขอใบปลอดหนี้</option>     
                                                  <option value="6"    >ติดต่อกรมที่ดิน</option> 
                                                  <option value="7"    >อื่นๆ</option>                                        
                                              </select>
                                          </div>
                                        </div> 
                                    </div>
                                    <!--
                                    <div class="col-md-12" id="s_record_title_status_page" > 
                                        <div class="form-group row">
                                          <label for="inputEmail3" class="col-sm-3 col-form-label">อื่นๆ : </label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" id="s_record_title_status_other" name="s_record_title_status_other" placeholder="" value="<?php echo $s_record_title_status_other;?>"  required="">
                                          </div>
                                        </div> 
                                    </div>-->
                                    <div class="col-md-12" id="buyer_contact_name" > 
                                        <div class="form-group row">
                                          <label for="inputEmail3" class="col-sm-3 col-form-label">เลือกCX : </label>
                                          <div class="col-sm-9">


                                          <select class="form-control select2bs4"  name="listing_code"   style="width: 100%;"> 
                                            <option value="">ไม่เลือก</option> 
                                              <?php 
                                                $strSQL = "SELECT * FROM dbo_subdeal where create_deal_code='$code'  "; 
                                                $result=$conn->query($strSQL); 
                                               
                                                while($rs = $result->fetch_assoc()){   

                                                       $subdeal_code=$rs['subdeal_code'];              
                                                       $ex_list_listing_code=$rs['ex_list_listing_code']; 
                                                       
                                                       $name_text="Listing : ".$ex_list_listing_code;  
                                               
                                                  ?>   
                                                     <option value="<?php echo $ex_list_listing_code;?>"  readonly  ><?php echo $name_text;?></option> 
                                          <?php }  ?>
                                           
                                          </select>


                                          </div>
                                        </div> 
                                    </div>

                                    <div class="col-md-12">  
                                         <div class="form-group row">
                                          <label for="inputEmail4" class="col-sm-3 col-form-label">ลงวันที่ : </label>
                                          <div class="col-sm-9"> 
                                            <div class="input-group date" id="reservationdate30" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate30" name="s_calendar_date"  placeholder=""  data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask  required="" />
                                                <div class="input-group-append" data-target="#reservationdate30" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div> 

                                          </div> 
                                        </div> 
                                    </div> 


                                    <div class="col-md-12"> 
                                       <div class="form-group row">
                                          <label for="inputEmail4" class="col-sm-3 col-form-label">เวลาเริ่มต้น : </label>
                                          <div class="col-sm-9"> 
                                                            <select class="form-control select2bs4"  name="s_calendar_time_start"  id="s_calendar_time_start"    style="width: 100%;" required=""> 
                                                              <option value="">เลือกเวลา</option>              
                                               <?php 
                                                        $sql_time="SELECT * FROM type_time order by time_id  ASC ";  

                                                        $result_time= $conn->query($sql_time);
                                                        while($rs_time=$result_time->fetch_assoc()) {   
                                                           
                                                           $time_time=$rs_time['time_time']; 

                                                      ?>
                                                              <option value="<?php echo $time_time;?>"><?php echo $time_time;?></option>  

                                               <?php    } ?>   
                                                            </select> 

                                          </div> 
                                        </div> 

                                     </div>
                                    
                            

                                    <div class="col-md-12"> 
                                       <div class="form-group row">
                                          <label for="inputEmail4" class="col-sm-3 col-form-label">เวลาสิ้นสุด : </label>
                                          <div class="col-sm-9"> 
                                                            <select class="form-control select2bs4"  name="s_calendar_time_end"  id="s_calendar_time_end"  style="width: 100%;"  > 
                                                              <option value="">เลือกเวลา</option>              
                                               <?php 
                                                        $sql_time="SELECT * FROM type_time order by time_id  ASC ";  

                                                        $result_time= $conn->query($sql_time);
                                                        while($rs_time=$result_time->fetch_assoc()) {   
                                                           
                                                           $time_time=$rs_time['time_time']; 

                                                      ?>
                                                              <option value="<?php echo $time_time;?>"><?php echo $time_time;?></option>  

                                               <?php    } ?>   
                                                            </select> 

                                          </div> 
                                        </div> 

                                     </div>
                                     <div class="col-md-12" > 
                                        <div class="form-group row">
                                          <label for="inputEmail3" class="col-sm-3 col-form-label">Remark : </label>
                                          <div class="col-sm-12"> 
                                            <textarea class="form-control" rows="5" placeholder="Enter ..." id="s_calendar_note" name="s_calendar_note"><?php echo $s_calendar_note;?></textarea>
                                          </div>
                                        </div> 
                                     </div>

                                    <div class="col-12" >
                                     
                                  
                                         <center>
                                             <input type="submit" class="btn btn-danger" value="บันทึก Calendar">
                                             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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


                               <div class="col-md-0">
                                <div class="sticky-top mb-3">
                                  <div class="card">                                   
                                    <div class="card-body">
                                      <!-- the events -->
                                      <div id="external-events">
                                         <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default">เพิ่มกิจกรรมอื่นๆ  </button>
                                      </div>
                                    </div>
                                    <!-- /.card-body -->
                                  </div>
                                  <!-- /.card -->
                                  <div class="card">
                                    
                                     
                                  </div>
                                </div>
                              </div>
                              <!-- /.col -->


                              <div class="col-md-12">
                                <div class="card card-primary">
                                  <div class="card-body p-0">
                                    <!-- THE CALENDAR -->
                                    <div id="calendar"></div>
                                  </div>
                                  <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                              </div>
                              <!-- /.col -->


    


                            </div>
                            <!-- /.row -->
                          </div><!-- /.container-fluid -->
                        </section>
                        <!-- /.content -->


                  </div>
                  <!-- /.tab-pane -->
  
  <?php } //END d_check=='3'  ?>


  <?php if($d_check=='6'){ ?>


              <div>
                <div class="modal-dialog">
                  <div class="modal-content bg-danger">
                    <div class="modal-header">
                      <h4 class="modal-title">เนื่องจากยกเลิกการเสนอห้องทั้งหมด คุณต้องการจะยกเลิกดีลนี้หรือไม่</h4>
                      
                    </div>
                    <div class="modal-body">
    

                 <form method="post" id="form" class="form-horizontal" enctype="multipart/form-data" action="include/process.php" >

                  <input type="text" class="form-control" name="page"  value="create_deal" hidden="hidden">
                  <input type="text" class="form-control" name="user_id"  value="<?php echo $USER_ID;?>" hidden="hidden" >
                  <input type="text" class="form-control" name="p_check"  value="cancel_deal" hidden="hidden" > 
                  <input type="text" class="form-control" name="id"  value="<?php echo $subdeal_code;?>" hidden="hidden">
                  <input type="text" class="form-control" name="code"  value="<?php echo $code;?>" hidden="hidden">
             

                    <div class="row" style="font-size: 16px; " >
 
                        <div class="col-md-12" > 
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-12 col-form-label">เหตุผลของการยกเลิกดีล : </label>
                            <div class="col-sm-12"> 
                                 <select class="form-control select"  name="contact_deal_cancel_status"  id="contact_deal_cancel_status"  style="width: 100%;" required="">

                                    <option value="0">ไม่เลือก</option>  
                                    <option value="1">1. เราไม่มีทรัพย์ที่ตรงตามความต้องการ</option>  
                                    <option value="2">2. ติดต่อลูกค้าไม่ได้ตั้งแต่ครั้งแรก</option>  
                                    <option value="3">3. ลูกค้าได้ทรัพย์กับเอเจนท์อื่น</option>   
                                    <option value="4">4. ลูกค้าเปลี่ยนใจไม่ซื้อ/เช่า</option>   
                                    <option value="5">5. เจ้าของเปลี่ยนใจไม่ซื้อ/เช่า</option>   
                                    <option value="6">6. การเจรจาต่อรองระหว่างผู้ซื้อ/ผู้ขาย ไม่จบ</option>   
                                    <option value="7">7. ลูกค้า shopping</option>   
                                    <option value="8">8. ความต้องการลูกค้าเกินความจริง</option> 
                                    <option value="9">9. คุยๆ อยู่แล้วหายไป</option> 
                                    <option value="10">10. อื่นๆ ระบุ</option> 
                                  </select>
                            </div>
                          </div> 
                       </div>

                       <div class="col-md-12" > 
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Remark : </label>
                            <div class="col-sm-12"> 
                              <textarea class="form-control" rows="5" placeholder="Enter ..." id="contact_deal_cancel_remark" name="contact_deal_cancel_remark"  ></textarea>
                            </div>
                          </div> 
                       </div>

                      <div class="col-12" >
                       
                    
                           <center>
                               <input type="submit" class="btn btn-warning" value="ตกลง">                               
                               <a href="?page=create_deal_buyer&status=edit&p_check=create_deal&code=<?php echo $code;?>&d_check=1" class="btn btn-default" >ไม่ยกเลิก</a>
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

  <?php } ?>

  <?php if($d_check=='4'){ 
 

    ?>


 <?php
  
if($device=="m"){

         if($create_deal_attention=='1'){ $size_w="1200px"; $size_w_h="1200px"; }else{ $size_w="1200px"; $size_w_h="1200px";} 


  }else{

         if($create_deal_attention=='1'){ $size_w="20%"; $size_w_h="100%";  }else{ $size_w="25%"; $size_w_h="100%";  } 

   }
     ?>


   <script type="text/javascript">   
     
              $("#s_record_title_status_page").hide();    
      

   </script>


<!--
              <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">กิจกรรมอื่นๆ</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
    

                 <form method="post" id="form" class="form-horizontal" enctype="multipart/form-data" action="include/process.php" >

                  <input type="text" class="form-control" name="page"  value="create_subdeal" hidden="hidden">
                  <input type="text" class="form-control" name="user_id"  value="<?php echo $USER_ID;?>" hidden="hidden" >
                  <input type="text" class="form-control" name="p_check"  value="0" hidden="hidden" > 
                  <input type="text" class="form-control" name="id"  value="<?php echo $subdeal_code;?>" hidden="hidden">
                  <input type="text" class="form-control" name="code"  value="<?php echo $code;?>" hidden="hidden">
                  <input type="text" class="form-control" name="listing_code"  value="<?php echo $ex_list_listing_code;?>" hidden="hidden">
                  <input type="text" class="form-control" name="s_calendar_status"  value="10" hidden="hidden">
                    <div class="row" style="font-size: 14px; " >




                      <div class="col-md-12" id="buyer_contact_name" > 
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">กิจกรรม : </label>
                            <div class="col-sm-9">
                                 <select class="form-control select2bs4"  name="s_calendar_title_status" id="s_calendar_title_status"  style="width: 100%;" required="" > 
                                  <option value="">ไม่เลือก</option> 
                                    <option value="1"    >ถ่ายรูปห้อง</option>        
                                    <option value="2"    >ตรวจเช็คห้อง</option>     
                                    <option value="3"    >ส่งมอบห้อง</option>     
                                    <option value="4"    >ย้ายออก</option>     
                                    <option value="5"    >ขอใบปลอดหนี้</option>     
                                    <option value="6"    >ติดต่อกรมที่ดิน</option> 
                                    <option value="7"    >อื่นๆ</option>                                        
                                </select>
                            </div>
                          </div> 
                      </div>
                      <!--
                      <div class="col-md-12" id="s_record_title_status_page" > 
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">อื่นๆ : </label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="s_record_title_status_other" name="s_record_title_status_other" placeholder="" value="<?php echo $s_record_title_status_other;?>"  required="">
                            </div>
                          </div> 
                      </div>-->

                      <!--
                      <div class="col-md-12" id="buyer_contact_name" > 
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">เลือกCX : </label>
                            <div class="col-sm-9">


                            <select class="form-control select2bs4"  name="listing_code"   style="width: 100%;"> 
                              <option value="">ไม่เลือก</option> 
                                <?php 
                                  $strSQL = "SELECT * FROM dbo_subdeal where create_deal_code='$code'  "; 
                                  $result=$conn->query($strSQL); 
                                 
                                  while($rs = $result->fetch_assoc()){   

                                         $subdeal_code=$rs['subdeal_code'];              
                                         $ex_list_listing_code=$rs['ex_list_listing_code']; 
                                         
                                         $name_text="Listing : ".$ex_list_listing_code;  
                                 
                                    ?>   
                                       <option value="<?php echo $ex_list_listing_code;?>"  readonly  ><?php echo $name_text;?></option> 
                            <?php }  ?>
                             
                            </select>


                            </div>
                          </div> 
                      </div>

                      <div class="col-md-12">  
                           <div class="form-group row">
                            <label for="inputEmail4" class="col-sm-3 col-form-label">ลงวันที่ : </label>
                            <div class="col-sm-9"> 
                              <div class="input-group date" id="reservationdate30" data-target-input="nearest">
                                  <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate30" name="s_calendar_date"  placeholder=""  data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask  required="" />
                                  <div class="input-group-append" data-target="#reservationdate30" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                  </div>
                              </div> 

                            </div> 
                          </div> 
                      </div> 


                      <div class="col-md-12"> 
                         <div class="form-group row">
                            <label for="inputEmail4" class="col-sm-3 col-form-label">เวลาเริ่มต้น : </label>
                            <div class="col-sm-9"> 
                                              <select class="form-control select2bs4"  name="s_calendar_time_start"  id="s_calendar_time_start"    style="width: 100%;" required=""> 
                                                <option value="">เลือกเวลา</option>              
                                 <?php 
                                          $sql_time="SELECT * FROM type_time order by time_id  ASC ";  

                                          $result_time= $conn->query($sql_time);
                                          while($rs_time=$result_time->fetch_assoc()) {   
                                             
                                             $time_time=$rs_time['time_time']; 

                                        ?>
                                                <option value="<?php echo $time_time;?>"><?php echo $time_time;?></option>  

                                 <?php    } ?>   
                                              </select> 

                            </div> 
                          </div> 

                       </div>
                      
              

                      <div class="col-md-12"> 
                         <div class="form-group row">
                            <label for="inputEmail4" class="col-sm-3 col-form-label">เวลาสิ้นสุด : </label>
                            <div class="col-sm-9"> 
                                              <select class="form-control select2bs4"  name="s_calendar_time_end"  id="s_calendar_time_end"  style="width: 100%;"  > 
                                                <option value="">เลือกเวลา</option>              
                                 <?php 
                                          $sql_time="SELECT * FROM type_time order by time_id  ASC ";  

                                          $result_time= $conn->query($sql_time);
                                          while($rs_time=$result_time->fetch_assoc()) {   
                                             
                                             $time_time=$rs_time['time_time']; 

                                        ?>
                                                <option value="<?php echo $time_time;?>"><?php echo $time_time;?></option>  

                                 <?php    } ?>   
                                              </select> 

                            </div> 
                          </div> 

                       </div>
                       <div class="col-md-12" > 
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Remark : </label>
                            <div class="col-sm-12"> 
                              <textarea class="form-control" rows="5" placeholder="Enter ..." id="s_calendar_note" name="s_calendar_note"><?php echo $s_calendar_note;?></textarea>
                            </div>
                          </div> 
                       </div>

                      <div class="col-12" >
                       
                    
                           <center>
                               <input type="submit" class="btn btn-danger" value="บันทึก Calendar">
                               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           </center>
                         
                       
                      </div>

                    </div>
            
                </form>


                    </div>
                   
                  </div>
                  
                </div>-->
                <!-- /.modal-dialog -->



   <script type="text/javascript">   
      $(document).ready(function(){


          $("#s_calendar_title_status").change(function(){
            var s_calendar_title_status = $("#s_calendar_title_status").val();
           
            if(s_calendar_title_status=="7"){

              $("#s_record_title_status_page").show();
        
            }else{
              $("#s_record_title_status_page").hide();    
            } 
      }); 

   </script>



              </div>



                  <div class="active tab-pane" id="subdeal">  <!-- Sub DEAL -->

                    <div class="row" style="font-size: 12px;  "    > 
                      <div class="col-md-12">  
                        <!--
                           <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default">เพิ่มกิจกรรมอื่นๆ  </button>-->
                            <div class="post clearfix">            
                     
                              <form method="post" id="form" class="form-horizontal" enctype="multipart/form-data" action="include/process.php" >

                                <input type="text" class="form-control" name="page"  value="<?php echo $_GET['page'];?>" hidden="hidden" >
                                <input type="text" class="form-control" name="user_id"  value="<?php echo $USER_ID;?>" hidden="hidden" >
                                <input type="text" class="form-control" name="p_check"  value="create_deal_note" hidden="hidden" >
                                <input type="text" class="form-control" name="id"  value="<?php echo $code;?>" hidden="hidden" >

                                <div class="input-group input-group-sm mb-0">
                                  <textarea class="form-control form-control-sm" rows="5"  placeholder="โปรดกรอกสิ่งที่ต้องการ Note โดยละเอียด"  name="create_deal_note"><?php echo $create_deal_note;?></textarea>
                                  <div class="input-group-append">
                                    <button type="submit" class="btn btn-danger">Send</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                      </div>
                    </div><br>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper kanban" style="margin-left: 0px;  width: 100%; height: auto;">



            
              <div class="modal fade" id="modal-group-calendar1">
                <div class="modal-dialog">
                  <div class="modal-content"  >
                    <div class="modal-header">
                      <h4 class="modal-title">นัดชมทรัพย์</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
    
                               <form method="post" id="form" class="form-horizontal" enctype="multipart/form-data" action="include/process.php" >

                                  <input type="text" class="form-control" name="page"  value="create_subdeal_all" hidden="hidden">
                                  <input type="text" class="form-control" name="user_id"  value="<?php echo $USER_ID;?>" hidden="hidden" >
                                  <input type="text" class="form-control" name="p_check"  value="2" hidden="hidden" >  
                                  <input type="text" class="form-control" name="code"  value="<?php echo $code;?>" hidden="hidden">
                                  <input type="text" class="form-control" name="listing_code"  value="<?php echo $ex_list_listing_code;?>" hidden="hidden">

                                    <div class="row" style="font-size: 12px;  "    >

                                      <div class="col-md-12"> 
                                          <h5 style="text-align: center;font-size: 18px;"  ><b>เลือกวันที่เพื่อนัดชมทรัพย์</b></h5>
                                           <div class="form-group row">
                                            <label for="inputEmail4" class="col-sm-3 col-form-label">ลงวันที่ : </label>
                                            <div class="col-sm-9"> 
                                              <div class="input-group date" id="reservationdate_group1" data-target-input="nearest">
                                                  <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate_group1" name="s_calendar_date"  placeholder=""  data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask />
                                                  <div class="input-group-append" data-target="#reservationdate_group1" data-toggle="datetimepicker" required="">
                                                      <div class="input-group-text" ><i class="fa fa-calendar"></i></div>
                                                  </div>
                                              </div> 

                                            </div> 
                                          </div> 
                                      </div> 


                                      <div class="col-md-12"> 
                                         <div class="form-group row">
                                            <label for="inputEmail4" class="col-sm-3 col-form-label">เวลาเริ่มต้น : </label>
                                            <div class="col-sm-9"> 

                                              <select class="form-control select2bs4"  name="s_calendar_time_start"  id="s_calendar_time_start<?php echo $i;?>"  style="width: 100%;" required=""> 
                                                <option value="">เลือกเวลา</option>              
                                 <?php 
                                          $sql_time="SELECT * FROM type_time order by time_id  ASC ";  

                                          $result_time= $conn->query($sql_time);
                                          while($rs_time=$result_time->fetch_assoc()) {   
                                             
                                             $time_time=$rs_time['time_time']; 

                                        ?>
                                                <option value="<?php echo $time_time;?>" <?php if($time_time==$s_calendar_time_start_c){?> selected="selected"  <?php }?> ><?php echo $time_time;?></option>  

                                 <?php    } ?>   
                                              </select> 

                                            </div> 
                                          </div> 

                                       </div>
                                       <p id="demo"></p>
 
                                      <div class="col-md-12"> 
                                         <div class="form-group row">
                                            <label for="inputEmail4" class="col-sm-3 col-form-label">เวลาสิ้นสุด : </label>
                                            <div class="col-sm-9">  

                                              <select class="form-control select2bs4"  name="s_calendar_time_end"  id="s_calendar_time_end<?php echo $i;?>"  style="width: 100%;" > 
                                                <option value="">เลือกเวลา</option>       
                                 <?php 
                                          $sql_time="SELECT * FROM type_time order by time_id  ASC ";  

                                          $result_time= $conn->query($sql_time);
                                          while($rs_time=$result_time->fetch_assoc()) {   
                                             
                                             $time_time=$rs_time['time_time'];  
                                  ?>
                                                <option value="<?php echo $time_time;?>" <?php if($time_time==$s_calendar_time_end_c){?> selected="selected"  <?php }?>><?php echo $time_time;?></option>  

                                 <?php    } ?>   
                                              </select> 

                                            </div> 
                                          </div> 

                                       </div>

                                       <div class="col-md-12" > 
                                                  <!-- /.card-header -->
                                                  <div class="card-body" style="margin: 0px; padding: 0px;">
                                                    <table id="example3" class="table table-bordered table-striped"  >
                                                      <thead>
                                                      <tr  style="font-size: 12px;"   > 
                                                        <th>#</th>
                                                        <th>CX</th> 
                                                        <th>Project</th>
                                                        <th>Price</th> 
                                                      </tr>
                                                      </thead>
                                                      <tbody>
                                             <?php $i=0;
                                                      $sql_subdeal="SELECT *   FROM dbo_subdeal AS subdeal 
                                                                LEFT JOIN dbo_data_excel_listing AS data On data.ex_list_listing_code=subdeal.ex_list_listing_code  
                                                                LEFT JOIN type_project AS pj  On data.project_id=pj.project_id   
                                                                WHERE  subdeal.create_deal_code='$code' and subdeal.subdeal_status='1'
                                                                     
                                                                order by subdeal.subdeal_create_date DESC ";  

                                                      $result_subdeal= $conn->query($sql_subdeal);
                                                      while($rs_subdeal=$result_subdeal->fetch_assoc()) {   $d++;

                                                           $subdeal_code=$rs_subdeal['subdeal_code'];
                                                           $ex_list_listing_code=$rs_subdeal['ex_list_listing_code'];
                                                           $ex_list_contract_type=$rs_subdeal['ex_list_contract_type']; 
                                                           $ex_list_deal_type=$rs_subdeal['ex_list_deal_type'];
                                                           $ex_list_listing_type=$rs_subdeal['ex_list_listing_type'];
                                                           $ex_list_listing_type_check=$rs_subdeal['ex_list_listing_type']; 
                                                           $project_id=$rs_subdeal['project_id'];
                                                           $ex_list_floor=$rs_subdeal['ex_list_floor'];

                                                           $ex_list_sqm=$rs_subdeal['ex_list_sqm'];
                                                           $ex_list_view=$rs_subdeal['ex_list_view']; 
                                                           $ex_list_bedroom=$rs_subdeal['ex_list_bedroom'];
                                                           $ex_list_bathroom=$rs_subdeal['ex_list_bathroom'];
                                                           $ex_list_other_room=$rs_subdeal['ex_list_other_room'];
                                                           $ex_list_parking=$rs_subdeal['ex_list_parking'];              
                                                           $ex_list_price=$rs_subdeal['ex_list_price'];

                                                           $project_type=$rs_subdeal['project_type'];
                                                           $project_name=$rs_subdeal['project_name_en']; 


                                                 ?>
                                                       <tr style="font-size: 12px;" > 
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                              <input class="custom-control-input" type="checkbox" id="customCheckbox<?php echo $d;?>" value="<?php echo $subdeal_code;?>" name="id[]" >
                                                              <label for="customCheckbox<?php echo $d;?>" class="custom-control-label"> </label>
                                                            </div>
                                                        </td>
                                                        <td><?php echo $ex_list_listing_code;?></td>
                                                        <td><?php echo $project_name;?></td>
                                                        <td> <?php echo number_format($ex_list_price)." Baht";?></td>        
                                                      </tr>  
                                          <?php } ?>
                                                    </tbody>
                                              
                                                  </table>
                                                </div>
                                       </div>

                                       <div class="col-md-12" > 
                                          <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Remark : </label>
                                            <div class="col-sm-12"> 
                                              <textarea class="form-control" rows="5" placeholder="Enter ..." id="s_calendar_note" name="s_calendar_note"></textarea>
                                            </div>
                                          </div> 
                                       </div>

                                      <div class="col-12" >
                                       
                                    
                                           <center>
                                               <input type="submit" class="btn btn-warning" value="ใช่">
                                               <button type="button" class="btn btn-default" data-dismiss="modal">ไม่ใช่</button>
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

    <section class="content" style="width: 100%;height: auto; ">
      <div class="container-fluid h-100" style="width:<?php echo $size_w_h;?>; padding: 0px;margin: 0px;">
        <div class="card card-row card-primary" style="width: <?php echo $size_w;?>; " >
          <div class="card-header" style="background-color:#5e92c2; color: #fff; ">

  
            <div class="row" style="font-size: 14px; " >
              <div class="col-md-11" > 
                  <h3 class="card-title">
                    เสนอห้อง
                  </h3>
              </div>
              <div class="col-md-1" > 

              <?php if($contact_deal_win!='8' and $contact_deal_win!='9'){ //ยังไม่ close lot won  ?> 

                        <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-group-calendar1" title="นัดชมทรัพย์">
                              <i class="fa fa-arrow-right"></i>
                        </button>    
              <?php } ?>

              </div>
            </div>
          </div>
          <div class="card-body" style="height: auto;">

              <?php $i=0;
              $sql_subdeal="SELECT subdeal.ex_list_listing_code, subdeal.subdeal_code , subdeal.color , subdeal.user_id  , subdeal.check_auto_offer
                            FROM dbo_subdeal AS subdeal 
                            WHERE subdeal.create_deal_code='$code' and subdeal.subdeal_status='1'
                            order by subdeal.subdeal_create_date DESC  ";  

              $result_subdeal= $conn->query($sql_subdeal);
              while($rs_subdeal=$result_subdeal->fetch_assoc()) {   $i++;

                   $ex_list_listing_code=$rs_subdeal['ex_list_listing_code']; 
                   $subdeal_code=$rs_subdeal['subdeal_code'];
                   $color=$rs_subdeal['color'];
                   $user_id=$rs_subdeal['user_id'];
                   $check_auto_offer=$rs_subdeal['check_auto_offer'];

                    /////////////////////////////////////////
                    $sql_listing="SELECT * FROM dbo_data_excel_listing
                                 WHERE  ex_list_listing_code='$ex_list_listing_code'  LIMIT 1 ";   
                    $result_listing= $conn->query($sql_listing);
                    $rs_listing=$result_listing->fetch_assoc();

                    $sql_register="SELECT register_nickname FROM dbo_register
                                 WHERE  register_id='$user_id'  LIMIT 1 ";   
                    $result_register= $conn->query($sql_register);
                    $rs_register=$result_register->fetch_assoc(); 
                    $register_nickname=$rs_register['register_nickname'];


                     $project_id=$rs_listing['project_id'];
                     $ex_list_floor=$rs_listing['ex_list_floor'];
                     $ex_list_sqm=$rs_listing['ex_list_sqm'];
                     $ex_list_view=$rs_listing['ex_list_view']; 
                     $ex_list_bedroom=$rs_listing['ex_list_bedroom'];
                     $ex_list_bathroom=$rs_listing['ex_list_bathroom'];
                     $ex_list_other_room=$rs_listing['ex_list_other_room'];
                     $ex_list_parking=$rs_listing['ex_list_parking'];              
                     $ex_list_price=$rs_listing['ex_list_price'];
                     $ex_list_listing_status=$rs_listing['ex_list_listing_status'];
                     $ex_list_rent_till_date=$rs_listing['ex_list_rent_till_date'];
                     $ex_list_listing_status_check=$rs_listing['ex_list_listing_status'];
                     $ex_list_rent_till=$rs_listing['ex_list_rent_till'];
                     $ex_list_rai=$rs_listing['ex_list_rai'];
                     $ex_list_ngan=$rs_listing['ex_list_ngan'];
                     $ex_list_wa=$rs_listing['ex_list_wa'];
                     $ex_list_total_floors=$rs_listing['ex_list_total_floors'];
                     $ex_list_listing_name=$rs_listing['ex_list_listing_name'];
                     $ex_list_listing_name_en=$rs_listing['ex_list_listing_name_en'];

                     if($ex_list_listing_status=='' or $ex_list_listing_status=='0'){ $ex_list_listing_status="No Status"; $stauts_list_color="#000";  $expire_check=''; }
                     else if($ex_list_listing_status=='1'){ $ex_list_listing_status="Available"; $stauts_list_color="#42d700"; $expire_check=''; }
                     else if($ex_list_listing_status=='2'){ $ex_list_listing_status="Contracted ไม่ล็อคสิทธิ"; $stauts_list_color="#42d700"; $expire_check=''; }
                     else if($ex_list_listing_status=='3'){ $ex_list_listing_status="Rented";  $ex_list_rent_till=$ex_list_rent_till; 
                                                      //เช็ควันหมดอายุ
                                                     if($ex_list_rent_till_date<=$calExpireDate){ $stauts_list_color="#ffa200"; $expire_check=' <span class="right badge badge-danger">New</span>';  
                                                      }else{  $stauts_list_color="#ff0000";  $expire_check=''; }  
                                                               
                                                     }
                     else if($ex_list_listing_status=='4'){ $ex_list_listing_status="Sold(by Connex)";  $stauts_list_color="#ff0000"; $expire_check=''; }
                     else if($ex_list_listing_status=='5'){ $ex_list_listing_status="Sold(by Others)"; $stauts_list_color="#ff0000"; $expire_check=''; }
                     else if($ex_list_listing_status=='6'){ $ex_list_listing_status="own use"; $stauts_list_color="#ff0000"; $expire_check=''; }
                     else if($ex_list_listing_status=='7'){ $ex_list_listing_status="unknown"; $stauts_list_color="#000cff"; $expire_check=''; }
                     else if($ex_list_listing_status=='8'){ $ex_list_listing_status="ไม่รับสาย"; $stauts_list_color="#000cff"; $expire_check=''; }
                     else if($ex_list_listing_status=='9'){ $ex_list_listing_status="ไม่สะดวกคุย"; $stauts_list_color="#000cff"; $expire_check=''; }
                     else if($ex_list_listing_status=='10'){ $ex_list_listing_status="ปิดเครื่อง"; $stauts_list_color="#000cff"; $expire_check=''; }
                     else if($ex_list_listing_status=='11'){ $ex_list_listing_status="สายไม่ว่าง"; $stauts_list_color="#000cff"; $expire_check=''; }
                     else if($ex_list_listing_status=='12'){ $ex_list_listing_status="เบอร์ผิด"; $stauts_list_color="#000cff"; $expire_check=''; }
                     else if($ex_list_listing_status=='13'){ $ex_list_listing_status="ไม่รับ agent"; $stauts_list_color="#000cff"; $expire_check='';  }
                     else if($ex_list_listing_status=='14'){ $ex_list_listing_status="ยังไม่ปล่อยขาย/เช่า"; $stauts_list_color="#000cff"; $expire_check='';  }
                     else if($ex_list_listing_status=='15'){ $ex_list_listing_status="Under Renovation";  $ex_list_rent_till=$ex_list_rent_till; 
                                          //เช็ควันหมดอายุ
                                         if($ex_list_rent_till_date<=$calExpireDate){ $stauts_list_color="#ffa200"; $expire_check=' <span class="right badge badge-danger">New</span>';  
                                          }else{  $stauts_list_color="#ff0000";  $expire_check=''; } 

                                                   
                                         }

 

                   /////////////////////////////////////////

                    $sql_project="SELECT project_type , project_name_en FROM type_project WHERE  project_id='$project_id'  LIMIT 1 ";   
                    $result_project= $conn->query($sql_project);
                    $rs_project=$result_project->fetch_assoc();

                     $project_type=$rs_project['project_type'];
                     $project_name=$rs_project['project_name_en']; 

                     if($project_name==''){  $project_name=$ex_list_listing_name_en;  }


                   ///////////////////////////////////////// 


                 if($ex_list_listing_type=='1' or $ex_list_floor=='' or $ex_list_floor=='0'){                            
                              
                                        $ex_list_floor_th=$ex_list_floor." fl";                               
                 } 


                   $area_th=$ex_list_rai." ไร่ - ".$ex_list_ngan." งาน - ".$ex_list_wa." วา";
                   $area_en=$ex_list_rai." - ".$ex_list_ngan." - ".$ex_list_wa." ";

                   if($ex_list_sqm!=''){ $ex_list_sqm_th=$ex_list_sqm." sqm."; }
                   if($ex_list_bedroom!=''){ 
                           if($ex_list_bedroom=='0'){  $ex_list_bedroom_th="Studio";  
                           }else{  $ex_list_bedroom_th=$ex_list_bedroom."b";   }
                   }
                   if($ex_list_bathroom!=''){ $ex_list_bathroom_th=$ex_list_bathroom."b";    }
                   if($ex_list_floor!=''){ $ex_list_floor=$ex_list_floor." "; }
                   if($ex_list_total_floors!=''){ $ex_list_total_floors_th=$ex_list_total_floors."ชั้น"; }



                 if($ex_list_listing_type!='12'){
                       
                           $detail_1=$ex_list_bedroom_th." ".$ex_list_bathroom_th." , ".$ex_list_floor_th." , ".$ex_list_sqm_th;

                 }else{

                 }

       /////////// dbo_subdeal_calendar ////////////////

             $sql_calendar="SELECT * FROM dbo_subdeal_calendar where subdeal_code='$subdeal_code' and s_calendar_status='1' order by s_calendar_create DESC ";  
             $result_calendar= $conn->query($sql_calendar);
             $rs_calendar=$result_calendar->fetch_assoc(); 
  
              isset( $rs_calendar['s_calendar_date'] ) ? $s_calendar_date = $rs_calendar['s_calendar_date'] : $s_calendar_date = "";
              isset( $rs_calendar['s_calendar_time_start'] ) ? $s_calendar_time_start = $rs_calendar['s_calendar_time_start'] : $s_calendar_time_start = "";
              isset( $rs_calendar['s_calendar_time_end'] ) ? $s_calendar_time_end = $rs_calendar['s_calendar_time_end'] : $s_calendar_time_end = "";
              isset( $rs_calendar['s_calendar_note'] ) ? $s_calendar_note = $rs_calendar['s_calendar_note'] : $s_calendar_note = "";
              isset( $rs_calendar['s_calendar_create'] ) ? $s_calendar_create = $rs_calendar['s_calendar_create'] : $s_calendar_create = "";

              $year=substr($s_calendar_date,0 , 4 );
              $month=substr($s_calendar_date,5 , 2 );
              $day=substr($s_calendar_date,8 , 2 );

              $s_calendar_time_start_c=substr($s_calendar_time_start,0 , 5 );
              $s_calendar_time_end_c=substr($s_calendar_time_end,0 , 5 );

              $date=$day."/".$month."/".$year." เวลา : ".$s_calendar_time_start_c."-".$s_calendar_time_end_c;


              $year=substr($s_calendar_create,0 , 4 );
              $month=substr($s_calendar_create,5 , 2 );
              $day=substr($s_calendar_create,8 , 2 );
              $time_s=substr($s_calendar_create,11 , 8 );

              $s_calendar_create=$day."/".$month."/".$year." เวลา : ".$time_s; 
          ?>
  
<!--
<script language="JavaScript">
 


  function myFunction() {
      if(document.getElementById('s_calendar_time_start<?php echo $i;?>').value != ""){
         
          alert('ไม่สามารถบันทึกได้ เนื่องจากไม่ได้กรอกข้อมูลการติดต่อ โปรดกรอกเบอร์โทรศัพท์ หรือ Line ID หรือ Whatsapp หรือ Wechat อย่างใดอย่างหนึ่ง');
      
      }

  }



</script>-->



 

              <div class="modal fade" id="modal-closelost<?php echo $i;?>">
                <div class="modal-dialog">
                  <div class="modal-content bg-danger">
                    <div class="modal-header">
                      <h4 class="modal-title">ดำเนินการ Close Lost <?php echo $ex_list_listing_code;?></h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
    

                 <form method="post" id="form" class="form-horizontal" enctype="multipart/form-data" action="include/process.php" >

                  <input type="text" class="form-control" name="page"  value="create_subdeal" hidden="hidden">
                  <input type="text" class="form-control" name="user_id"  value="<?php echo $USER_ID;?>" hidden="hidden" >
                  <input type="text" class="form-control" name="p_check"  value="9" hidden="hidden" > 
                  <input type="text" class="form-control" name="id"  value="<?php echo $subdeal_code;?>" hidden="hidden">
                  <input type="text" class="form-control" name="code"  value="<?php echo $code;?>" hidden="hidden">
                  <input type="text" class="form-control" name="listing_code"  value="<?php echo $ex_list_listing_code;?>" hidden="hidden">

                    <div class="row" style="font-size: 14px; " >
          
                       <div class="col-md-12" > 
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Remark : </label>
                            <div class="col-sm-12"> 
                              <textarea class="form-control" rows="5" placeholder="Enter ..." id="s_calendar_note" name="s_calendar_note" required=""></textarea>
                            </div>
                          </div> 
                       </div>

                      <div class="col-12" >
                       
                    
                           <center>
                               <input type="submit" class="btn btn-warning" value="ใช่">
                               <button type="button" class="btn btn-default" data-dismiss="modal">ไม่ใช่</button>
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


             
              <div class="modal fade" id="modal-calendar<?php echo $i;?>">
                <div class="modal-dialog">
                  <div class="modal-content"  >
                    <div class="modal-header">
                      <h4 class="modal-title">นัดชมทรัพย์ <?php echo $ex_list_listing_code;?></h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
    
                               <form method="post" id="form" class="form-horizontal" enctype="multipart/form-data" action="include/process.php" >

                                  <input type="text" class="form-control" name="page"  value="create_subdeal" hidden="hidden">
                                  <input type="text" class="form-control" name="user_id"  value="<?php echo $USER_ID;?>" hidden="hidden" >
                                  <input type="text" class="form-control" name="p_check"  value="2" hidden="hidden" > 
                                  <input type="text" class="form-control" name="id"  value="<?php echo $subdeal_code;?>" hidden="hidden">
                                  <input type="text" class="form-control" name="code"  value="<?php echo $code;?>" hidden="hidden">
                                  <input type="text" class="form-control" name="listing_code"  value="<?php echo $ex_list_listing_code;?>" hidden="hidden">

                                    <div class="row" style="font-size: 12px;  "    >

                                      <div class="col-md-12"> 
                                          <h5 style="text-align: center;font-size: 18px;"  ><b>เลือกวันที่เพื่อนัดชมทรัพย์</b></h5>
                                           <div class="form-group row">
                                            <label for="inputEmail4" class="col-sm-3 col-form-label">ลงวันที่ : </label>
                                            <div class="col-sm-9"> 
                                              <div class="input-group date" id="reservationdate<?php echo $i;?>" data-target-input="nearest">
                                                  <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate<?php echo $i;?>" name="s_calendar_date"  placeholder=""  data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask />
                                                  <div class="input-group-append" data-target="#reservationdate<?php echo $i;?>" data-toggle="datetimepicker" required="">
                                                      <div class="input-group-text" ><i class="fa fa-calendar"></i></div>
                                                  </div>
                                              </div> 

                                            </div> 
                                          </div> 
                                      </div> 


                                      <div class="col-md-12"> 
                                         <div class="form-group row">
                                            <label for="inputEmail4" class="col-sm-3 col-form-label">เวลาเริ่มต้น : </label>
                                            <div class="col-sm-9"> 

                                              <select class="form-control select2bs4"  name="s_calendar_time_start"  id="s_calendar_time_start<?php echo $i;?>"  style="width: 100%;" required=""> 
                                                <option value="">เลือกเวลา</option>              
                                 <?php 
                                          $sql_time="SELECT * FROM type_time order by time_id  ASC ";  

                                          $result_time= $conn->query($sql_time);
                                          while($rs_time=$result_time->fetch_assoc()) {   
                                             
                                             $time_time=$rs_time['time_time']; 

                                        ?>
                                                <option value="<?php echo $time_time;?>" <?php if($time_time==$s_calendar_time_start_c){?> selected="selected"  <?php }?> ><?php echo $time_time;?></option>  

                                 <?php    } ?>   
                                              </select> 

                                            </div> 
                                          </div> 

                                       </div>
                                       <p id="demo"></p>
 
                                      <div class="col-md-12"> 
                                         <div class="form-group row">
                                            <label for="inputEmail4" class="col-sm-3 col-form-label">เวลาสิ้นสุด : </label>
                                            <div class="col-sm-9">  

                                              <select class="form-control select2bs4"  name="s_calendar_time_end"  id="s_calendar_time_end<?php echo $i;?>"  style="width: 100%;" > 
                                                <option value="">เลือกเวลา</option>       
                                 <?php 
                                          $sql_time="SELECT * FROM type_time order by time_id  ASC ";  

                                          $result_time= $conn->query($sql_time);
                                          while($rs_time=$result_time->fetch_assoc()) {   
                                             
                                             $time_time=$rs_time['time_time'];  
                                  ?>
                                                <option value="<?php echo $time_time;?>" <?php if($time_time==$s_calendar_time_end_c){?> selected="selected"  <?php }?>><?php echo $time_time;?></option>  

                                 <?php    } ?>   
                                              </select> 

                                            </div> 
                                          </div> 

                                       </div>
                                       <div class="col-md-12" > 
                                          <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Remark : </label>
                                            <div class="col-sm-12"> 
                                              <textarea class="form-control" rows="5" placeholder="Enter ..." id="s_calendar_note" name="s_calendar_note"></textarea>
                                            </div>
                                          </div> 
                                       </div>

                                      <div class="col-12" >
                                       
                                    
                                           <center>
                                               <input type="submit" class="btn btn-warning" value="ใช่">
                                               <button type="button" class="btn btn-default" data-dismiss="modal">ไม่ใช่</button>
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

              <div class="modal fade" id="modal-edit<?php echo $i;?>">
                <div class="modal-dialog">
                  <div class="modal-content "  >
                    <div class="modal-header">
                      <h4 class="modal-title">Note เสนอห้อง <?php echo $ex_list_listing_code;?></h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
    
                            <form method="post" id="form" class="form-horizontal" enctype="multipart/form-data" action="include/process.php" >
     
                                     <input type="text" class="form-control" name="page"  value="create_subdeal" hidden="hidden">
                                    <input type="text" class="form-control" name="user_id"  value="<?php echo $USER_ID;?>" hidden="hidden" >
                                    <input type="text" class="form-control" name="p_check"  value="1" hidden="hidden" > 
                                    <input type="text" class="form-control" name="id"  value="<?php echo $subdeal_code;?>" hidden="hidden">
                                    <input type="text" class="form-control" name="code"  value="<?php echo $code;?>" hidden="hidden">
                                    <input type="text" class="form-control" name="listing_code"  value="<?php echo $ex_list_listing_code;?>" hidden="hidden">
                                    <input type="text" class="form-control" name="edit"  value="edit" hidden="hidden">

                                  <div class="row" style="font-size: 14px;  "    >

          
                                     <div class="col-md-12" > 
                                        <div class="form-group row">
                                          <label for="inputEmail3" class="col-sm-12 col-form-label">Remark : </label>
                                          <div class="col-sm-12"> 
                                            <textarea class="form-control" rows="4" placeholder="Enter ..." id="s_calendar_note" name="s_calendar_note" ><?php echo $s_calendar_note;?></textarea>
                                          </div>
                                        </div> 
                                     </div>

                                    <div class="col-12" >
                                     
                                  
                                           <center>
                                               <input type="submit" class="btn btn-warning" value="ใช่">
                                               <button type="button" class="btn btn-default" data-dismiss="modal">ไม่ใช่</button>
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


                                      <!-- DIRECT CHAT SUCCESS -->
            <div class="card card-success card-outline direct-chat direct-chat-success collapsed-card" style="margin:5px;  font-size: 14px;  ">
              <div class="card-header">
                <table style="width: 100%;">
                 <tr>
                    <td>  <?php  echo $project_name;?> <?php if($check_auto_offer=='0'){?><span class="right badge badge-danger">New</span><?php } ?>   </td>
                    <td style="width: 97px;">

 
                          <!--
                          <span title="3 New Messages" class="badge bg-success">3</span>-->
                        <!--
                          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="นัดชมทรัพย์">
                            <i class="fa fa-arrow-right"></i>
                          </button> 
                        -->

<?php if($contact_deal_win!='8' and $contact_deal_win!='9'){ //ยังไม่ close lot won  ?> 

                          <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-calendar<?php echo $i;?>" title="นัดชมทรัพย์">
                            <i class="fa fa-arrow-right"></i>
                          </button>                  
                          <button type="button" class="btn btn-tool" title="แก้ไขข้อมูล" data-toggle="modal" data-target="#modal-edit<?php echo $i;?>" >
                            <i class="fas fa-sticky-note"></i>
                          </button>  

                          <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-closelost<?php echo $i;?>" title="ยกเลิกดีล">
                            <i class="fas fa-times"></i>
                          </button> 
<?php } ?>                       

                    </td>
                  </tr>
                </table> 

                             <a href="?page=upload_file_excel_check_view&listing=<?php echo $ex_list_listing_code;?>&deal=view" target="_black" >
                             <?php echo $ex_list_listing_code;?></a> <?php echo $detail_1;?> <br>
                             <?php echo number_format($ex_list_price)." Baht";?><br>
                             <b style="width:80px;color: <?php echo $stauts_list_color;?>;"><a onclick="window.open('page/listing_status.php?id=<?php echo $ex_list_listing_code;?>', '_blank', 'location=yes,height=650,width=520,scrollbars=yes,status=yes');"style="cursor:pointer;"   > 
                                <?php echo $ex_list_listing_status.$expire_check;  ?>
                                <?php if($ex_list_listing_status_check=='3' or $ex_list_listing_status_check=='15'){ ?> <?php echo $ex_list_rent_till; } ?>
                               </a> </b>
                             <hr>
                             <?php if($s_calendar_note!=''){ echo $s_calendar_note."<br>"; } ?> 
                     <div class="row" style="font-size: 12px;  ">
                          <div class="col-md-8"> 
                              <i class="fa fa-clock-o"></i> <?php echo $s_calendar_create;?>
                          </div>
                          <div class="col-md-4" style="text-align: right;"> 
                              <?php echo $register_nickname;?>
                             <?php if($_SESSION['STATUS_ID']=='4' or $_SESSION['STATUS_ID']=='5' ){ ?>
                              <a href="include/process.php?page=restore_subdeal&code=<?php echo $code;?>&listing=<?php echo $ex_list_listing_code;?>"><i class="fa fa-clock-o" title="Restore Message LINE"></i></a>
                             <?php } ?>
                          </div>
                     </div>

              </div>
              <!-- /.card-header -->
              <div class="card-body" >
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages" style="height: 500px; padding: 0px;" >
                      
                </div>
                <!--/.direct-chat-messages-->
 
                <!-- /.direct-chat-pane -->
              </div>
              <!-- /.card-body -->
              
              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->
                  
            <?php }  ?>

         </div>




        </div> <!-- สร้างดีลเสนอ -->

        <div class="card card-row card-primary" style="width: <?php echo $size_w;?>;">



              <div class="modal fade" id="modal-group-calendar2">
                <div class="modal-dialog">
                  <div class="modal-content"  >
                    <div class="modal-header">
                      <h4 class="modal-title">แนบภาพชมทรัพย์  </h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
    
                               <form method="post" id="form" class="form-horizontal" enctype="multipart/form-data" action="include/process.php" >

                                <input type="text" class="form-control" name="page"  value="create_subdeal_all" hidden="hidden">
                                <input type="text" class="form-control" name="user_id"  value="<?php echo $USER_ID;?>" hidden="hidden" >
                                <input type="text" class="form-control" name="p_check"  value="3" hidden="hidden" >  
                                <input type="text" class="form-control" name="code"  value="<?php echo $code;?>" hidden="hidden">
                                <input type="text" class="form-control" name="listing_code"  value="<?php echo $ex_list_listing_code;?>" hidden="hidden">

                                <input type="text" class="form-control" name="s_calendar_date"  value="<?php echo $todate;?>" hidden="hidden">
                                <input type="text" class="form-control" name="s_calendar_time_start"  value="<?php echo $time_s;?>" hidden="hidden"> 
                                <input type="text" class="form-control" name="s_calendar_time_end"  value="<?php echo $time_e;?>" hidden="hidden">                      

                                  <div class="row" style="font-size: 12px;  "    >

                                    <div class="col-md-12"> 

                                        <h5 style="text-align: center;font-size: 18px;"  ><b>แนบภาพถ่ายหลังชมทรัพย์เสร็จ</b></h5>

                                         <div class="form-group row">
                                          <label for="inputEmail4" class="col-sm-3 col-form-label">แนบไฟล์ : </label>
                                          <div class="col-sm-9"> 
                                            <input type="file"  id="exampleInputFile" name="s_calendar_file" required="">

                                          </div> 
                                        </div> 
                                    </div> 

                                     <div class="col-md-12" > 
                                        <div class="form-group row">
                                          <label for="inputEmail3" class="col-sm-3 col-form-label">โอกาสการปิด : </label>
                                          <div class="col-sm-4"> 
                                                 <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                  <label class="btn btn-warning">
                                                    <input type="radio" name="s_calendar_chance" id="option_a3" autocomplete="off" value="1" required=""> ต่ำ
                                                  </label>
                                                  
                                                  <label class="btn btn-warning">
                                                    <input type="radio" name="s_calendar_chance" id="option_a2" autocomplete="off" value="2" required="">  กลาง
                                                  </label>
                                                  
                                                  <label class="btn btn-warning">
                                                    <input type="radio" name="s_calendar_chance" id="option_a1" autocomplete="off" value="3"  required=""> สูง
                                                  </label>
                                                </div>
                                          </div>
                                        </div> 
                                     </div>
                                       <div class="col-md-12" > 
                                                  <!-- /.card-header -->
                                                  <div class="card-body" style="margin: 0px; padding: 0px; height: 100%;">
                                                    <table id="example3" class="table table-bordered table-striped"  >
                                                      <thead>
                                                      <tr  style="font-size: 12px;"   > 
                                                        <th>#</th>
                                                        <th>CX</th> 
                                                        <th>Project</th>
                                                        <th>Price</th> 
                                                      </tr>
                                                      </thead>
                                                      <tbody>
                                             <?php $a1=0;
                                                      $sql_subdeal="SELECT *   FROM dbo_subdeal AS subdeal  
                                                                WHERE  subdeal.create_deal_code='$code' and subdeal.subdeal_status='2'                                                                    
                                                                order by subdeal.subdeal_create_date DESC  ";  

                                                      $result_subdeal= $conn->query($sql_subdeal);
                                                      while($rs_subdeal=$result_subdeal->fetch_assoc()) {   $a1++;

                                                           $ex_list_listing_code=$rs_subdeal['ex_list_listing_code']; 
                                                           $subdeal_code=$rs_subdeal['subdeal_code']; 

                                                          /////////////////////////////////////////
                                                          $sql_listing="SELECT project_id ,ex_list_floor ,ex_list_sqm ,ex_list_view ,ex_list_bedroom ,ex_list_bathroom , 
                                                                              ex_list_other_room , ex_list_parking , ex_list_price  FROM dbo_data_excel_listing
                                                                       WHERE  ex_list_listing_code='$ex_list_listing_code'  LIMIT 1 ";   
                                                          $result_listing= $conn->query($sql_listing);
                                                          $rs_listing=$result_listing->fetch_assoc();

                                                           $project_id=$rs_listing['project_id'];
                                                           $ex_list_floor=$rs_listing['ex_list_floor'];
                                                           $ex_list_sqm=$rs_listing['ex_list_sqm'];
                                                           $ex_list_view=$rs_listing['ex_list_view']; 
                                                           $ex_list_bedroom=$rs_listing['ex_list_bedroom'];
                                                           $ex_list_bathroom=$rs_listing['ex_list_bathroom'];
                                                           $ex_list_other_room=$rs_listing['ex_list_other_room'];
                                                           $ex_list_parking=$rs_listing['ex_list_parking'];              
                                                           $ex_list_price=$rs_listing['ex_list_price'];

                                                           $ex_list_contract_type=$rs_listing['ex_list_contract_type'];
                                                  
                                                         /////////////////////////////////////////

                                                          $sql_project="SELECT project_type , project_name_en FROM type_project WHERE  project_id='$project_id'  LIMIT 1 ";   
                                                          $result_project= $conn->query($sql_project);
                                                          $rs_project=$result_project->fetch_assoc();

                                                           $project_type=$rs_project['project_type'];
                                                           $project_name=$rs_project['project_name_en']; 


                                                         /////////////////////////////////////////  
                                               


                                                 ?>
                                                       <tr style="font-size: 12px;" > 
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                              <input class="custom-control-input" type="checkbox" id="custom_calendar2<?php echo $a1;?>" value="<?php echo $subdeal_code;?>" name="id[]" >
                                                              <label for="custom_calendar2<?php echo $a1;?>" class="custom-control-label"> </label>
                                                            </div>
                                                        </td>
                                                        <td><?php echo $ex_list_listing_code;?></td>
                                                        <td><?php echo $project_name;?></td>
                                                        <td> <?php echo number_format($ex_list_price)." Baht";?></td>        
                                                      </tr>  
                                          <?php } ?>
                                                    </tbody>
                                              
                                                  </table>
                                                </div>
                                       </div>
                                     <div class="col-md-12" > 
                                        <div class="form-group row">
                                          <label for="inputEmail3" class="col-sm-12 col-form-label">Remark : </label>
                                          <div class="col-sm-12"> 
                                            <textarea class="form-control" rows="5" placeholder="Enter ..." id="s_calendar_note" name="s_calendar_note"></textarea>
                                          </div>
                                        </div> 
                                     </div>

                                      <div class="col-12" >
                                       
                                    
                                           <center>
                                               <input type="submit" class="btn btn-warning" value="ใช่">
                                               <button type="button" class="btn btn-default" data-dismiss="modal">ไม่ใช่</button>
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


          <div class="card-header" style="background-color: #17a2b8;">

            <div class="row" style="font-size: 14px; " >
              <div class="col-md-11" > 
                  <h3 class="card-title">
                    นัดชมทรัพย์
                  </h3>
              </div>
              <div class="col-md-1" > 

              <?php if($contact_deal_win!='8' and $contact_deal_win!='9'){ //ยังไม่ close lot won  ?> 

                        <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-group-calendar2" title="แนบภาพชมทรัพย์">
                              <i class="fa fa-arrow-right"></i>
                        </button>    

              <?php } ?>
              </div>
            </div>

          </div>
          <div class="card-body" style="height: auto;">




 
              <?php  $i=50;
                $sql_subdeal="SELECT subdeal.ex_list_listing_code, subdeal.subdeal_code , subdeal.color , subdeal.user_id FROM dbo_subdeal AS subdeal 
                            WHERE subdeal.create_deal_code='$code' and subdeal.subdeal_status='2'
                            order by subdeal.subdeal_create_date DESC  ";  

              $result_subdeal= $conn->query($sql_subdeal);
              while($rs_subdeal=$result_subdeal->fetch_assoc()) {   $i++;

                   $ex_list_listing_code=$rs_subdeal['ex_list_listing_code']; 
                   $subdeal_code=$rs_subdeal['subdeal_code'];
                   $color=$rs_subdeal['color'];
                   $user_id=$rs_subdeal['user_id'];
                    /////////////////////////////////////////  

                    $sql_register="SELECT register_nickname FROM dbo_register
                                 WHERE  register_id='$user_id'  LIMIT 1 ";   
                    $result_register= $conn->query($sql_register);
                    $rs_register=$result_register->fetch_assoc(); 
                    $register_nickname=$rs_register['register_nickname'];

                    /////////////////////////////////////////
                    $sql_listing="SELECT project_id ,ex_list_floor ,ex_list_sqm ,ex_list_view ,ex_list_bedroom ,ex_list_bathroom , 
                                        ex_list_other_room , ex_list_parking , ex_list_price , ex_list_listing_status , ex_list_rent_till_date , ex_list_rent_till FROM dbo_data_excel_listing
                                 WHERE  ex_list_listing_code='$ex_list_listing_code'  LIMIT 1 ";   
                    $result_listing= $conn->query($sql_listing);
                    $rs_listing=$result_listing->fetch_assoc();

                     $project_id=$rs_listing['project_id'];
                     $ex_list_floor=$rs_listing['ex_list_floor'];
                     $ex_list_sqm=$rs_listing['ex_list_sqm'];
                     $ex_list_view=$rs_listing['ex_list_view']; 
                     $ex_list_bedroom=$rs_listing['ex_list_bedroom'];
                     $ex_list_bathroom=$rs_listing['ex_list_bathroom'];
                     $ex_list_other_room=$rs_listing['ex_list_other_room'];
                     $ex_list_parking=$rs_listing['ex_list_parking'];              
                     $ex_list_price=$rs_listing['ex_list_price'];
                     $ex_list_listing_status=$rs_listing['ex_list_listing_status'];
                     $ex_list_rent_till_date=$rs_listing['ex_list_rent_till_date']; 
                     $ex_list_listing_status_check=$rs_listing['ex_list_listing_status'];
                     $ex_list_rent_till=$rs_listing['ex_list_rent_till'];


                     if($ex_list_listing_status=='' or $ex_list_listing_status=='0'){ $ex_list_listing_status="No Status"; $stauts_list_color="#000";  $expire_check='';}
                     else if($ex_list_listing_status=='1'){ $ex_list_listing_status="Available"; $stauts_list_color="#42d700"; $expire_check='';}
                     else if($ex_list_listing_status=='2'){ $ex_list_listing_status="Contracted ไม่ล็อคสิทธิ"; $stauts_list_color="#42d700"; $expire_check='';}
                     else if($ex_list_listing_status=='3'){ $ex_list_listing_status="Rented";  $ex_list_rent_till=$ex_list_rent_till; 
                                                      //เช็ควันหมดอายุ
                                                     if($ex_list_rent_till_date<=$calExpireDate){ $stauts_list_color="#ffa200"; $expire_check=' <span class="right badge badge-danger">New</span>';  
                                                      }else{  $stauts_list_color="#ff0000";  $expire_check=''; }  
                                                               
                                                     }
                     else if($ex_list_listing_status=='4'){ $ex_list_listing_status="Sold(by Connex)";  $stauts_list_color="#ff0000"; $expire_check='';}
                     else if($ex_list_listing_status=='5'){ $ex_list_listing_status="Sold(by Others)"; $stauts_list_color="#ff0000"; $expire_check='';}
                     else if($ex_list_listing_status=='6'){ $ex_list_listing_status="own use"; $stauts_list_color="#ff0000"; $expire_check='';}
                     else if($ex_list_listing_status=='7'){ $ex_list_listing_status="unknown"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='8'){ $ex_list_listing_status="ไม่รับสาย"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='9'){ $ex_list_listing_status="ไม่สะดวกคุย"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='10'){ $ex_list_listing_status="ปิดเครื่อง"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='11'){ $ex_list_listing_status="สายไม่ว่าง"; $stauts_list_color="#000cff";$expire_check=''; }
                     else if($ex_list_listing_status=='12'){ $ex_list_listing_status="เบอร์ผิด"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='13'){ $ex_list_listing_status="ไม่รับ agent"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='14'){ $ex_list_listing_status="ยังไม่ปล่อยขาย/เช่า"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='15'){ $ex_list_listing_status="Under Renovation";  $ex_list_rent_till=$ex_list_rent_till; 
                                          //เช็ควันหมดอายุ
                                         if($ex_list_rent_till_date<=$calExpireDate){ $stauts_list_color="#ffa200"; $expire_check=' <span class="right badge badge-danger">New</span>';  
                                          }else{  $stauts_list_color="#ff0000";  $expire_check=''; } 

                                                   
                                         }
                   /////////////////////////////////////////

                    $sql_project="SELECT project_type , project_name_en FROM type_project WHERE  project_id='$project_id'  LIMIT 1 ";   
                    $result_project= $conn->query($sql_project);
                    $rs_project=$result_project->fetch_assoc();

                     $project_type=$rs_project['project_type'];
                     $project_name=$rs_project['project_name_en']; 


                   ///////////////////////////////////////// 
                   
             
                 if($ex_list_listing_type=='1' or $ex_list_floor=='' or $ex_list_floor=='0'){ 

                           $ex_list_floor_th=$ex_list_floor." fl";             

                 } 


                   $area_th=$ex_list_rai." ไร่ - ".$ex_list_ngan." งาน - ".$ex_list_wa." วา";
                   $area_en=$ex_list_rai." - ".$ex_list_ngan." - ".$ex_list_wa." ";

                   if($ex_list_sqm!=''){ $ex_list_sqm_th=$ex_list_sqm." sqm."; }
                   if($ex_list_bedroom!=''){ 
                           if($ex_list_bedroom=='0'){  $ex_list_bedroom_th="Studio";  
                           }else{  $ex_list_bedroom_th=$ex_list_bedroom."b";   }
                   }
                   if($ex_list_bathroom!=''){ $ex_list_bathroom_th=$ex_list_bathroom."b";    }
                   if($ex_list_floor!=''){ $ex_list_floor=$ex_list_floor." "; }
                   if($ex_list_total_floors!=''){ $ex_list_total_floors_th=$ex_list_total_floors." ชั้น"; }



                 if($ex_list_listing_type!='12'){
                       
                           $detail_1=$ex_list_bedroom_th." ".$ex_list_bathroom_th." , ".$ex_list_floor_th." , ".$ex_list_sqm_th;

                 }else{

                 }

       /////////// dbo_subdeal_calendar ////////////////

             $sql_calendar="SELECT * FROM dbo_subdeal_calendar where subdeal_code='$subdeal_code' and s_calendar_status='2' order by s_calendar_create DESC ";  
             $result_calendar= $conn->query($sql_calendar);
             $rs_calendar=$result_calendar->fetch_assoc(); 

             $s_calendar_date=$rs_calendar['s_calendar_date'];
             $s_calendar_time_start=$rs_calendar['s_calendar_time_start'];
             $s_calendar_time_end=$rs_calendar['s_calendar_time_end'];
             $s_calendar_note=$rs_calendar['s_calendar_note'];
             $s_calendar_create=$rs_calendar['s_calendar_create'];


              $year=substr($s_calendar_date,0 , 4 );
              $month=substr($s_calendar_date,5 , 2 );
              $day=substr($s_calendar_date,8 , 2 );

              $s_calendar_time_start_c=substr($s_calendar_time_start,0 , 5 );
              $s_calendar_time_end_c=substr($s_calendar_time_end,0 , 5 );

              $date=$day."/".$month."/".$year." เวลา : ".$s_calendar_time_start_c."-".$s_calendar_time_end_c;


              $year=substr($s_calendar_create,0 , 4 );
              $month=substr($s_calendar_create,5 , 2 );
              $day=substr($s_calendar_create,8 , 2 );
              $time_s=substr($s_calendar_create,11 , 8 );

              $s_calendar_create=$day."/".$month."/".$year." เวลา : ".$time_s;

          ?>
  
              <div class="modal fade" id="modal-closelost<?php echo $i;?>">
                <div class="modal-dialog">
                  <div class="modal-content bg-danger">
                    <div class="modal-header">
                      <h4 class="modal-title">ดำเนินการยกเลิกSub Deal : <?php echo $ex_list_listing_code;?></h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
    

                 <form method="post" id="form" class="form-horizontal" enctype="multipart/form-data" action="include/process.php" >

                  <input type="text" class="form-control" name="page"  value="create_subdeal" hidden="hidden">
                  <input type="text" class="form-control" name="user_id"  value="<?php echo $USER_ID;?>" hidden="hidden" >
                  <input type="text" class="form-control" name="p_check"  value="9" hidden="hidden" > 
                  <input type="text" class="form-control" name="id"  value="<?php echo $subdeal_code;?>" hidden="hidden">
                  <input type="text" class="form-control" name="code"  value="<?php echo $code;?>" hidden="hidden">
                  <input type="text" class="form-control" name="listing_code"  value="<?php echo $ex_list_listing_code;?>" hidden="hidden">

                  <input type="text" class="form-control" name="s_calendar_date"  value="<?php echo $todate;?>" hidden="hidden">
                  <input type="text" class="form-control" name="s_calendar_time_start"  value="<?php echo $time_s;?>" hidden="hidden"> 
                  <input type="text" class="form-control" name="s_calendar_time_end"  value="<?php echo $time_e;?>" hidden="hidden">   

                    <div class="row" style="font-size: 14px; " >
          
                       <div class="col-md-12" > 
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Remark : </label>
                            <div class="col-sm-12"> 
                              <textarea class="form-control" rows="5" placeholder="Enter ..." id="s_calendar_note" name="s_calendar_note" required=""></textarea>
                            </div>
                          </div> 
                       </div>

                      <div class="col-12" >                       
                    
                           <center>
                               <input type="submit" class="btn btn-warning" value="ใช่">
                               <button type="button" class="btn btn-default" data-dismiss="modal">ไม่ใช่</button>
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


              <div class="modal fade" id="modal-calendar<?php echo $i;?>">
                <div class="modal-dialog">
                  <div class="modal-content"  >
                    <div class="modal-header">
                      <h4 class="modal-title">แนบภาพชมทรัพย์ <?php echo $ex_list_listing_code;?></h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
    
                               <form method="post" id="form" class="form-horizontal" enctype="multipart/form-data" action="include/process.php" >

                                <input type="text" class="form-control" name="page"  value="create_subdeal" hidden="hidden">
                                <input type="text" class="form-control" name="user_id"  value="<?php echo $USER_ID;?>" hidden="hidden" >
                                <input type="text" class="form-control" name="p_check"  value="3" hidden="hidden" > 
                                <input type="text" class="form-control" name="id"  value="<?php echo $subdeal_code;?>" hidden="hidden">
                                <input type="text" class="form-control" name="code"  value="<?php echo $code;?>" hidden="hidden">
                                <input type="text" class="form-control" name="listing_code"  value="<?php echo $ex_list_listing_code;?>" hidden="hidden">

                                <input type="text" class="form-control" name="s_calendar_date"  value="<?php echo $todate;?>" hidden="hidden">
                                <input type="text" class="form-control" name="s_calendar_time_start"  value="<?php echo $time_s;?>" hidden="hidden"> 
                                <input type="text" class="form-control" name="s_calendar_time_end"  value="<?php echo $time_e;?>" hidden="hidden">                      

                                  <div class="row" style="font-size: 12px;  "    >

                                    <div class="col-md-12"> 

                                        <h5 style="text-align: center;font-size: 18px;"  ><b>แนบภาพถ่ายหลังชมทรัพย์เสร็จ</b></h5>

                                         <div class="form-group row">
                                          <label for="inputEmail4" class="col-sm-3 col-form-label">แนบไฟล์ : </label>
                                          <div class="col-sm-9"> 
                                            <input type="file"  id="exampleInputFile" name="s_calendar_file" required="">

                                          </div> 
                                        </div> 
                                    </div> 

                                     <div class="col-md-12" > 
                                        <div class="form-group row">
                                          <label for="inputEmail3" class="col-sm-3 col-form-label">โอกาสการปิด : </label>
                                          <div class="col-sm-4"> 
                                                 <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                  <label class="btn btn-warning">
                                                    <input type="radio" name="s_calendar_chance" id="option_a3" autocomplete="off" value="1" required=""> ต่ำ
                                                  </label>
                                                  
                                                  <label class="btn btn-warning">
                                                    <input type="radio" name="s_calendar_chance" id="option_a2" autocomplete="off" value="2" required="">  กลาง
                                                  </label>
                                                  
                                                  <label class="btn btn-warning">
                                                    <input type="radio" name="s_calendar_chance" id="option_a1" autocomplete="off" value="3"  required=""> สูง
                                                  </label>
                                                </div>
                                          </div>
                                        </div> 
                                     </div>
                                    <div class="col-md-12"> 
                                         <div class="form-group row">
                                          <label for="inputEmail4" class="col-sm-3 col-form-label">เลือกวันที่ชมทรัพย์ : </label>
                                          <div class="col-sm-9"> 
                                            <div class="input-group date" id="reservationdate<?php echo $i;?>" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate<?php echo $i;?>" name="s_calendar_date"  placeholder=""  data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask value="" required="" />
                                                <div class="input-group-append" data-target="#reservationdate<?php echo $i;?>" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>

                                          </div> 
                                        </div> 
                                    </div> 
                                     <div class="col-md-12" > 
                                        <div class="form-group row">
                                          <label for="inputEmail3" class="col-sm-12 col-form-label">Remark : </label>
                                          <div class="col-sm-12"> 
                                            <textarea class="form-control" rows="5" placeholder="Enter ..." id="s_calendar_note" name="s_calendar_note"></textarea>
                                          </div>
                                        </div> 
                                     </div>

                                      <div class="col-12" >
                                       
                                    
                                           <center>
                                               <input type="submit" class="btn btn-warning" value="ใช่">
                                               <button type="button" class="btn btn-default" data-dismiss="modal">ไม่ใช่</button>
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

              <div class="modal fade" id="modal-edit<?php echo $i;?>">
                <div class="modal-dialog">
                  <div class="modal-content"  >
                    <div class="modal-header">
                      <h4 class="modal-title">Note นัดชมทรัพย์ <?php echo $ex_list_listing_code;?></h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
    
                            <form method="post" id="form" class="form-horizontal" enctype="multipart/form-data" action="include/process.php" >
     
     
                                     <input type="text" class="form-control" name="page"  value="create_subdeal" hidden="hidden">
                                    <input type="text" class="form-control" name="user_id"  value="<?php echo $USER_ID;?>" hidden="hidden" >
                                    <input type="text" class="form-control" name="p_check"  value="2" hidden="hidden" > 
                                    <input type="text" class="form-control" name="id"  value="<?php echo $subdeal_code;?>" hidden="hidden">
                                    <input type="text" class="form-control" name="code"  value="<?php echo $code;?>" hidden="hidden">
                                    <input type="text" class="form-control" name="listing_code"  value="<?php echo $ex_list_listing_code;?>" hidden="hidden">
                                    <input type="text" class="form-control" name="edit"  value="edit" hidden="hidden">

                                  <div class="row" style="font-size: 14px;  "    >

                                    <div class="col-md-12"> 
                                        <h4 style="text-align: center;font-size: 18px;"><b>เลือกวันที่นัดชมทรัพย์</b></h4>
                                         <div class="form-group row">
                                          <label for="inputEmail4" class="col-sm-3 col-form-label">ลงวันที่ : </label>
                                          <div class="col-sm-9"> 
                                            <div class="input-group date" id="reservationdate<?php echo $i;?>" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate<?php echo $i;?>" name="s_calendar_date"  placeholder=""  data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask value="<?php echo $date;?>" required="" />
                                                <div class="input-group-append" data-target="#reservationdate<?php echo $i;?>" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>

                                          </div> 
                                        </div> 
                                    </div> 
                                    <div class="col-md-12"> 
                                       <div class="form-group row">
                                          <label for="inputEmail4" class="col-sm-3 col-form-label">เวลาเริ่มต้น : </label>
                                          <div class="col-sm-9"> 

                                              <select class="form-control select2bs4"  name="s_calendar_time_start"  id="s_calendar_time_start<?php echo $i;?>"  style="width: 100%;" required=""> 
                                                <option value="">เลือกเวลา</option>       
                                 <?php 
                                          $sql_time="SELECT * FROM type_time order by time_id  ASC ";  

                                          $result_time= $conn->query($sql_time);
                                          while($rs_time=$result_time->fetch_assoc()) {   
                                             
                                             $time_time=$rs_time['time_time']; 

                                        ?>
                                                <option value="<?php echo $time_time;?>" <?php if($time_time==$s_calendar_time_start){?> selected="selected"  <?php }?> ><?php echo $time_time;?></option>  

                                 <?php    } ?>   
                                              </select> 

                                          </div> 
                                        </div> 

                                     </div>

                                    <div class="col-md-12"> 
                                       <div class="form-group row">
                                          <label for="inputEmail4" class="col-sm-3 col-form-label">เวลาสิ้นสุด : </label>
                                          <div class="col-sm-9"> 

                                              <select class="form-control select2bs4"  name="s_calendar_time_end"  id="s_calendar_time_end<?php echo $i;?>"  style="width: 100%;" required=""> 
                                                <option value="">เลือกเวลา</option>       
                                 <?php 
                                          $sql_time="SELECT * FROM type_time order by time_id  ASC ";  

                                          $result_time= $conn->query($sql_time);
                                          while($rs_time=$result_time->fetch_assoc()) {   
                                             
                                             $time_time=$rs_time['time_time']; 

                                        ?>
                                                <option value="<?php echo $time_time;?>" <?php if($time_time==$s_calendar_time_end){?> selected="selected"  <?php }?>  ><?php echo $time_time;?></option>  

                                 <?php    } ?>   
                                              </select> 

                                          </div> 
                                        </div> 

                                     </div>

                                     <div class="col-md-12" > 
                                        <div class="form-group row">
                                          <label for="inputEmail3" class="col-sm-12 col-form-label">Remark : </label>
                                          <div class="col-sm-12"> 
                                            <textarea class="form-control" rows="4" placeholder="Enter ..." id="s_calendar_note" name="s_calendar_note"><?php echo $s_calendar_note;?></textarea>
                                          </div>
                                        </div> 
                                     </div>

                                    <div class="col-12" >
                                     
                                  
                                           <center>
                                               <input type="submit" class="btn btn-warning" value="ใช่">
                                               <button type="button" class="btn btn-default" data-dismiss="modal">ไม่ใช่</button>
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


                                      <!-- DIRECT CHAT SUCCESS -->
            <div class="card card-success card-outline direct-chat direct-chat-success collapsed-card" style="margin:5px;   font-size: 14px;  ">
              <div class="card-header">
                

                <table style="width: 100%;">
                 <tr>
                    <td>  <?php  echo $project_name;?> <br>  </td>
                    <td style="width: 97px;">

 
                          <!--
                          <span title="3 New Messages" class="badge bg-success">3</span>-->
                        <!--
                          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="นัดชมทรัพย์">
                            <i class="fa fa-arrow-right"></i>
                          </button> 
                        -->
              <?php if($contact_deal_win!='8' and $contact_deal_win!='9'){ //ยังไม่ close lot won  ?> 

                          <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-calendar<?php echo $i;?>" title="นัดชมทรัพย์">
                            <i class="fa fa-arrow-right"></i>
                          </button>                  
                          <button type="button" class="btn btn-tool" title="แก้ไขข้อมูล" data-toggle="modal" data-target="#modal-edit<?php echo $i;?>" >
                            <i class="fa fa-clock-o"></i>
                          </button>  
                          <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-closelost<?php echo $i;?>" title="ยกเลิกดีล">
                            <i class="fas fa-times"></i>
                          </button> 
               <?php } ?>

                    </td>
                  </tr>
                </table> 

                             <a href="?page=upload_file_excel_check_view&listing=<?php echo $ex_list_listing_code;?>&deal=view" target="_black" >
                             <?php echo $ex_list_listing_code;?></a> <?php echo $detail_1;?> <br>
                             <?php echo number_format($ex_list_price)." Baht";?><br>
                              Status : <b style="width:80px;color: <?php echo $stauts_list_color;?>;"><a onclick="window.open('page/listing_status.php?id=<?php echo $ex_list_listing_code;?>', '_blank', 'location=yes,height=650,width=520,scrollbars=yes,status=yes');"style="cursor:pointer;"   > 
                                <?php echo $ex_list_listing_status.$expire_check;  ?>
                                <?php if($ex_list_listing_status_check=='3' or $ex_list_listing_status_check=='15'){ ?><?php echo $ex_list_rent_till; } ?>
                               </a> </b>
                             <hr>
                             <?php if($s_calendar_note!=''){ echo $s_calendar_note."<br>"; } ?> 
                             <?php echo "วันที่นัดชม : ".$date;?><br>
                     <div class="row" style="font-size: 12px;  ">
                          <div class="col-md-8"> 
                              <i class="fa fa-clock-o"></i> <?php echo $s_calendar_create;?>
                          </div>
                          <div class="col-md-4" style="text-align: right;"> 
                              <?php echo $register_nickname;?>
                          </div>
                     </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body" >
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages" style="height: 500px;padding: 0px;" >

 

  <!-- 
                                         <center>
                                             <a href="?page=create_subdeal&status=edit&p_check=subdeal&id=<?php echo $subdeal_code;?>" class="btn btn-sm btn-primary"   >
                                              <i class="fas fa-user"></i>  คลิกเข้าชม
                                             </a>
                                         </center>-->

                                  

                  <!-- /.direct-chat-msg -->
                </div>
                <!--/.direct-chat-messages-->

                <!-- Contacts are loaded here -->
                <div class="direct-chat-contacts" style="height: 300px;">
                  <ul class="contacts-list" >
                    <li >
  
                    </li>
                    <!-- End Contact Item -->
                  </ul>
                  <!-- /.contatcts-list -->
                </div>
                <!-- /.direct-chat-pane -->
              </div>
              <!-- /.card-body -->
              
              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->
                  
            <?php }  ?>








          </div>

          <div class="card-header" style="background-color: #17a2b8;">
            <h3 class="card-title">
              ชมทรัพย์แล้ว
            </h3>
          </div>

          <div class="card-body">

 
              <?php $i=50;
                $sql_subdeal="SELECT subdeal.ex_list_listing_code, subdeal.subdeal_code , subdeal.color  FROM dbo_subdeal AS subdeal 
                            WHERE subdeal.create_deal_code='$code' and subdeal.subdeal_status='3'
                            order by subdeal.subdeal_create_date DESC  ";  

              $result_subdeal= $conn->query($sql_subdeal);
              while($rs_subdeal=$result_subdeal->fetch_assoc()) {   $i++;

                   $ex_list_listing_code=$rs_subdeal['ex_list_listing_code']; 
                   $subdeal_code=$rs_subdeal['subdeal_code'];
                   $color=$rs_subdeal['color'];
                    /////////////////////////////////////////
                    $sql_listing="SELECT project_id ,ex_list_floor ,ex_list_sqm ,ex_list_view ,ex_list_bedroom ,ex_list_bathroom , 
                                        ex_list_other_room , ex_list_parking , ex_list_price , ex_list_listing_status , ex_list_rent_till_date,ex_list_rent_till  FROM dbo_data_excel_listing
                                 WHERE  ex_list_listing_code='$ex_list_listing_code'  LIMIT 1 ";   
                    $result_listing= $conn->query($sql_listing);
                    $rs_listing=$result_listing->fetch_assoc();

                     $project_id=$rs_listing['project_id'];
                     $ex_list_floor=$rs_listing['ex_list_floor'];
                     $ex_list_sqm=$rs_listing['ex_list_sqm'];
                     $ex_list_view=$rs_listing['ex_list_view']; 
                     $ex_list_bedroom=$rs_listing['ex_list_bedroom'];
                     $ex_list_bathroom=$rs_listing['ex_list_bathroom'];
                     $ex_list_other_room=$rs_listing['ex_list_other_room'];
                     $ex_list_parking=$rs_listing['ex_list_parking'];              
                     $ex_list_price=$rs_listing['ex_list_price'];
                     $ex_list_listing_status=$rs_listing['ex_list_listing_status'];
                     $ex_list_rent_till_date=$rs_listing['ex_list_rent_till_date'];
                     $ex_list_listing_status_check=$rs_listing['ex_list_listing_status'];
                     $ex_list_rent_till=$rs_listing['ex_list_rent_till'];

                     if($ex_list_listing_status=='' or $ex_list_listing_status=='0'){ $ex_list_listing_status="No Status"; $stauts_list_color="#000";  $expire_check='';}
                     else if($ex_list_listing_status=='1'){ $ex_list_listing_status="Available"; $stauts_list_color="#42d700"; $expire_check='';}
                     else if($ex_list_listing_status=='2'){ $ex_list_listing_status="Contracted ไม่ล็อคสิทธิ"; $stauts_list_color="#42d700"; $expire_check='';}
                     else if($ex_list_listing_status=='3'){ $ex_list_listing_status="Rented";  $ex_list_rent_till=$ex_list_rent_till; 
                                                      //เช็ควันหมดอายุ
                                                     if($ex_list_rent_till_date<=$calExpireDate){ $stauts_list_color="#ffa200"; $expire_check=' <span class="right badge badge-danger">New</span>';  
                                                      }else{  $stauts_list_color="#ff0000";  $expire_check=''; }  
                                                               
                                                     }
                     else if($ex_list_listing_status=='4'){ $ex_list_listing_status="Sold(by Connex)";  $stauts_list_color="#ff0000"; $expire_check='';}
                     else if($ex_list_listing_status=='5'){ $ex_list_listing_status="Sold(by Others)"; $stauts_list_color="#ff0000"; $expire_check='';}
                     else if($ex_list_listing_status=='6'){ $ex_list_listing_status="own use"; $stauts_list_color="#ff0000"; $expire_check='';}
                     else if($ex_list_listing_status=='7'){ $ex_list_listing_status="unknown"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='8'){ $ex_list_listing_status="ไม่รับสาย"; $stauts_list_color="#000cff";$expire_check=''; }
                     else if($ex_list_listing_status=='9'){ $ex_list_listing_status="ไม่สะดวกคุย"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='10'){ $ex_list_listing_status="ปิดเครื่อง"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='11'){ $ex_list_listing_status="สายไม่ว่าง"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='12'){ $ex_list_listing_status="เบอร์ผิด"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='13'){ $ex_list_listing_status="ไม่รับ agent"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='14'){ $ex_list_listing_status="ยังไม่ปล่อยขาย/เช่า"; $stauts_list_color="#000cff";$expire_check=''; }
                     else if($ex_list_listing_status=='15'){ $ex_list_listing_status="Under Renovation";  $ex_list_rent_till=$ex_list_rent_till; 
                                          //เช็ควันหมดอายุ
                                         if($ex_list_rent_till_date<=$calExpireDate){ $stauts_list_color="#ffa200"; $expire_check=' <span class="right badge badge-danger">New</span>';  
                                          }else{  $stauts_list_color="#ff0000";  $expire_check=''; } 

                                                   
                                         }
                   /////////////////////////////////////////

                    $sql_project="SELECT project_type , project_name_en FROM type_project WHERE  project_id='$project_id'  LIMIT 1 ";   
                    $result_project= $conn->query($sql_project);
                    $rs_project=$result_project->fetch_assoc();

                     $project_type=$rs_project['project_type'];
                     $project_name=$rs_project['project_name_en']; 
                   
             
                 if($ex_list_listing_type=='1' or $ex_list_floor=='' or $ex_list_floor=='0'){ 

                           $ex_list_floor_th=$ex_list_floor." fl";             

                 } 


                   $area_th=$ex_list_rai." ไร่ - ".$ex_list_ngan." งาน - ".$ex_list_wa." วา";
                   $area_en=$ex_list_rai." - ".$ex_list_ngan." - ".$ex_list_wa." ";

                   if($ex_list_sqm!=''){ $ex_list_sqm_th=$ex_list_sqm." sqm."; }
                   if($ex_list_bedroom!=''){ 
                           if($ex_list_bedroom=='0'){  $ex_list_bedroom_th="Studio";  
                           }else{  $ex_list_bedroom_th=$ex_list_bedroom."b";   }
                   }
                   if($ex_list_bathroom!=''){ $ex_list_bathroom_th=$ex_list_bathroom."b";    }
                   if($ex_list_floor!=''){ $ex_list_floor=$ex_list_floor." "; }
                   if($ex_list_total_floors!=''){ $ex_list_total_floors_th=$ex_list_total_floors." ชั้น"; }



                 if($ex_list_listing_type!='12'){
                       
                           $detail_1=$ex_list_bedroom_th." ".$ex_list_bathroom_th." , ".$ex_list_floor_th." , ".$ex_list_sqm_th;

                 }else{

                 }

             $sql_calendar="SELECT * FROM dbo_subdeal_calendar where subdeal_code='$subdeal_code' and s_calendar_status='3' order by s_calendar_create DESC ";  
             $result_calendar= $conn->query($sql_calendar);
             $rs_calendar=$result_calendar->fetch_assoc(); 

             $s_calendar_date=$rs_calendar['s_calendar_date'];
             $s_calendar_time_start=$rs_calendar['s_calendar_time_start'];
             $s_calendar_time_end=$rs_calendar['s_calendar_time_end'];
             $s_calendar_note=$rs_calendar['s_calendar_note'];
             $s_calendar_create=$rs_calendar['s_calendar_create'];
             $s_calendar_chance=$rs_calendar['s_calendar_chance'];

             if($s_calendar_chance=='1'){ 
                  $chance=" ต่ำ";
             }else if($s_calendar_chance=='2'){
                  $chance=" ปานกลาง";
             }else if($s_calendar_chance=='3'){
                  $chance=" สูง";
             }else{
                  $chance=" ต่ำ";   
             }


              $year=substr($s_calendar_date,0 , 4 );
              $month=substr($s_calendar_date,5 , 2 );
              $day=substr($s_calendar_date,8 , 2 );

              $s_calendar_time_start_c=substr($s_calendar_time_start,0 , 5 );
              $s_calendar_time_end_c=substr($s_calendar_time_end,0 , 5 );

              $date=$day."/".$month."/".$year." เวลา : ".$s_calendar_time_start_c."-".$s_calendar_time_end_c;
 
              $year=substr($s_calendar_create,0 , 4 );
              $month=substr($s_calendar_create,5 , 2 );
              $day=substr($s_calendar_create,8 , 2 );
              $time_s=substr($s_calendar_create,11 , 8 );

              $s_calendar_create=$day."/".$month."/".$year." เวลา : ".$time_s;

          ?>
  

  
              <div class="modal fade" id="modal-closelost<?php echo $i;?>" >
                <div class="modal-dialog">
                  <div class="modal-content bg-danger">
                    <div class="modal-header">
                      <h4 class="modal-title">ดำเนินการยกเลิกSub Deal : <?php echo $ex_list_listing_code;?></h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
    

                 <form method="post" id="form" class="form-horizontal" enctype="multipart/form-data" action="include/process.php" >

                  <input type="text" class="form-control" name="page"  value="create_subdeal" hidden="hidden">
                  <input type="text" class="form-control" name="user_id"  value="<?php echo $USER_ID;?>" hidden="hidden" >
                  <input type="text" class="form-control" name="p_check"  value="9" hidden="hidden" > 
                  <input type="text" class="form-control" name="id"  value="<?php echo $subdeal_code;?>" hidden="hidden">
                  <input type="text" class="form-control" name="code"  value="<?php echo $code;?>" hidden="hidden">
                  <input type="text" class="form-control" name="listing_code"  value="<?php echo $ex_list_listing_code;?>" hidden="hidden">

                  <input type="text" class="form-control" name="s_calendar_date"  value="<?php echo $todate;?>" hidden="hidden">
                  <input type="text" class="form-control" name="s_calendar_time_start"  value="<?php echo $time_s;?>" hidden="hidden"> 
                  <input type="text" class="form-control" name="s_calendar_time_end"  value="<?php echo $time_e;?>" hidden="hidden">  

                    <div class="row" style="font-size: 14px; " >
          
                       <div class="col-md-12" > 
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Remark : </label>
                            <div class="col-sm-12"> 
                              <textarea class="form-control" rows="5" placeholder="Enter ..." id="s_calendar_note" name="s_calendar_note" required=""></textarea>
                            </div>
                          </div> 
                       </div>

                      <div class="col-12" >                       
                    
                           <center>
                               <input type="submit" class="btn btn-warning" value="ใช่">
                               <button type="button" class="btn btn-default" data-dismiss="modal">ไม่ใช่</button>
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



              <div class="modal fade" id="modal-calendar<?php echo $i;?>">
                <div class="modal-dialog">
                  <div class="modal-content"  >
                    <div class="modal-header">
                      <h4 class="modal-title">แนบภาพสลิปจอง <?php echo $ex_list_listing_code;?></h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
    
                               <form method="post" id="form" class="form-horizontal" enctype="multipart/form-data" action="include/process.php" >

                                <input type="text" class="form-control" name="page"  value="create_subdeal" hidden="hidden">
                                <input type="text" class="form-control" name="user_id"  value="<?php echo $USER_ID;?>" hidden="hidden" >
                                <input type="text" class="form-control" name="p_check"  value="10" hidden="hidden" > 
                                <input type="text" class="form-control" name="id"  value="<?php echo $subdeal_code;?>" hidden="hidden">
                                <input type="text" class="form-control" name="code"  value="<?php echo $code;?>" hidden="hidden">
                                <input type="text" class="form-control" name="listing_code"  value="<?php echo $ex_list_listing_code;?>" hidden="hidden">

                                <input type="text" class="form-control" name="s_calendar_date"  value="<?php echo $todate;?>" hidden="hidden">
                                <input type="text" class="form-control" name="s_calendar_time_start"  value="<?php echo $time_s;?>" hidden="hidden"> 
                                <input type="text" class="form-control" name="s_calendar_time_end"  value="<?php echo $time_e;?>" hidden="hidden">                      

                                  <div class="row" style="font-size: 12px;  "    >

                                    <div class="col-md-12"> 

                                        <h5 style="text-align: center;font-size: 18px;"  ><b>แนบภาพสลิปจอง</b></h5>

                                         <div class="form-group row">
                                          <label for="inputEmail4" class="col-sm-3 col-form-label">แนบไฟล์ : </label>
                                          <div class="col-sm-9"> 
                                            <input type="file"  id="exampleInputFile" name="s_calendar_file" required="">

                                          </div> 
                                        </div> 
                                    </div> 

                                    <div class="col-md-12">  
                                         <div class="form-group row">
                                            <label for="inputEmail4" class="col-sm-3 col-form-label">เลือกวันที่ทำการจอง : </label>
                                            <div class="col-sm-9"> 
                                              <div class="input-group date" id="reservationdate<?php echo $i;?>" data-target-input="nearest">
                                                  <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate<?php echo $i;?>" name="s_calendar_date"   placeholder=""  data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask  />
                                                  <div class="input-group-append" data-target="#reservationdate<?php echo $i;?>" data-toggle="datetimepicker">
                                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                  </div>
                                              </div>

                                            </div> 
                                          </div> 
                                      </div> 
                                     <div class="col-md-12" > 
                                        <div class="form-group row">
                                          <label for="inputEmail3" class="col-sm-12 col-form-label">Remark : </label>
                                          <div class="col-sm-12"> 
                                            <textarea class="form-control" rows="5" placeholder="Enter ..." id="s_calendar_note" name="s_calendar_note"></textarea>
                                          </div>
                                        </div> 
                                     </div>

                                      <div class="col-12" >
                                       
                                    
                                           <center>
                                               <input type="submit" class="btn btn-warning" value="ใช่">
                                               <button type="button" class="btn btn-default" data-dismiss="modal">ไม่ใช่</button>
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


                                      <!-- DIRECT CHAT SUCCESS -->
            <div class="card card-success card-outline direct-chat direct-chat-success collapsed-card" style="margin:5px;  font-size: 14px; ">
              <div class="card-header">

                <table style="width: 100%;">
                 <tr>
                    <td>  <?php  echo $project_name;?> <br>  </td>
                    <td style="width: 97px;text-align: right;">

 
                          <!--
                          <span title="3 New Messages" class="badge bg-success">3</span>-->
                        <!--
                          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="นัดชมทรัพย์">
                            <i class="fa fa-arrow-right"></i>
                          </button> 
                        -->

              <?php if($contact_deal_win!='8' and $contact_deal_win!='9'){ //ยังไม่ close lot won  ?> 

                          <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-calendar<?php echo $i;?>" title="แนบภาพสลิปจอง">
                            <i class="fa fa-arrow-right"></i>
                          </button> 
                          <!--                 
                          <button type="button" class="btn btn-tool" title="แก้ไขข้อมูล" data-toggle="modal" data-target="#modal-edit<?php echo $i;?>" >
                            <i class="fas fa-sticky-note"></i>
                          </button>  -->
                          <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-closelost<?php echo $i;?>" title="ยกเลิกดีล">
                            <i class="fas fa-times"></i>
                          </button> 

              <?php } ?>                       

                    </td>
                  </tr>
                </table> 

                             <a href="?page=upload_file_excel_check_view&listing=<?php echo $ex_list_listing_code;?>&deal=view" target="_black" >
                             <?php echo $ex_list_listing_code;?></a> <?php echo $detail_1;?> <br>
                             <?php echo number_format($ex_list_price)." Baht";?><br>
                              Status : <b style="width:80px;color: <?php echo $stauts_list_color;?>;"><a onclick="window.open('page/listing_status.php?id=<?php echo $ex_list_listing_code;?>', '_blank', 'location=yes,height=650,width=520,scrollbars=yes,status=yes');"style="cursor:pointer;"   > 
                                <?php echo $ex_list_listing_status.$expire_check;  ?>
                                <?php if($ex_list_listing_status_check=='3' or $ex_list_listing_status_check=='15'){ ?> <?php echo $ex_list_rent_till; } ?>
                               </a> </b>
                             <hr>
                             <?php echo "โอกาสปิดการขาย : ".$chance;?> <br>                           
                             <?php if($s_calendar_note!=''){ echo $s_calendar_note."<br>"; } ?>                          
                             <i class="fa fa-clock-o"></i> <?php echo $s_calendar_create;?>
                        
      
              </div>
              <!-- /.card-header -->
              <div class="card-body" >
       
                 
              </div>
              <!-- /.card-body -->
              
              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->
                  
            <?php }  ?>


          </div>

        </div>

        <div class="card card-row card-default" style="width: <?php echo $size_w;?>;">

         <div class="card-header" style="background-color: #1f4e78; color: #fff;">
            <h3 class="card-title">
              จองแล้ว
            </h3>
          </div>
          <div class="card-body" style="height: auto;">




 
              <?php  $i=70;
                $sql_subdeal="SELECT subdeal.ex_list_listing_code, subdeal.subdeal_code , subdeal.color  FROM dbo_subdeal AS subdeal 
                            WHERE subdeal.create_deal_code='$code' and subdeal.subdeal_status='10'
                            order by subdeal.subdeal_create_date DESC  ";  

              $result_subdeal= $conn->query($sql_subdeal);
              while($rs_subdeal=$result_subdeal->fetch_assoc()) {   $i++;

                   $ex_list_listing_code=$rs_subdeal['ex_list_listing_code']; 
                   $subdeal_code=$rs_subdeal['subdeal_code'];
                   $color=$rs_subdeal['color'];
                    /////////////////////////////////////////
                    $sql_listing="SELECT project_id ,ex_list_floor ,ex_list_sqm ,ex_list_view ,ex_list_bedroom ,ex_list_bathroom , 
                                        ex_list_other_room , ex_list_parking , ex_list_price , ex_list_listing_status , ex_list_rent_till_date , ex_list_rent_till FROM dbo_data_excel_listing
                                 WHERE  ex_list_listing_code='$ex_list_listing_code'  LIMIT 1 ";   
                    $result_listing= $conn->query($sql_listing);
                    $rs_listing=$result_listing->fetch_assoc();

                     $project_id=$rs_listing['project_id'];
                     $ex_list_floor=$rs_listing['ex_list_floor'];
                     $ex_list_sqm=$rs_listing['ex_list_sqm'];
                     $ex_list_view=$rs_listing['ex_list_view']; 
                     $ex_list_bedroom=$rs_listing['ex_list_bedroom'];
                     $ex_list_bathroom=$rs_listing['ex_list_bathroom'];
                     $ex_list_other_room=$rs_listing['ex_list_other_room'];
                     $ex_list_parking=$rs_listing['ex_list_parking'];              
                     $ex_list_price=$rs_listing['ex_list_price'];
                     $ex_list_listing_status=$rs_listing['ex_list_listing_status'];
                     $ex_list_rent_till_date=$rs_listing['ex_list_rent_till_date'];
                     $ex_list_listing_status_check=$rs_listing['ex_list_listing_status'];
                     $ex_list_rent_till=$rs_listing['ex_list_rent_till'];

                     if($ex_list_listing_status=='' or $ex_list_listing_status=='0'){ $ex_list_listing_status="No Status"; $stauts_list_color="#000";  $expire_check='';}
                     else if($ex_list_listing_status=='1'){ $ex_list_listing_status="Available"; $stauts_list_color="#42d700"; $expire_check='';}
                     else if($ex_list_listing_status=='2'){ $ex_list_listing_status="Contracted ไม่ล็อคสิทธิ"; $stauts_list_color="#42d700"; $expire_check='';}
                     else if($ex_list_listing_status=='3'){ $ex_list_listing_status="Rented";  $ex_list_rent_till=$ex_list_rent_till; 
                                                      //เช็ควันหมดอายุ
                                                     if($ex_list_rent_till_date<=$calExpireDate){ $stauts_list_color="#ffa200"; $expire_check=' <span class="right badge badge-danger">New</span>';  
                                                      }else{  $stauts_list_color="#ff0000";  $expire_check=''; }  
                                                               
                                                     }
                     else if($ex_list_listing_status=='4'){ $ex_list_listing_status="Sold(by Connex)";  $stauts_list_color="#ff0000"; $expire_check='';}
                     else if($ex_list_listing_status=='5'){ $ex_list_listing_status="Sold(by Others)"; $stauts_list_color="#ff0000"; $expire_check='';}
                     else if($ex_list_listing_status=='6'){ $ex_list_listing_status="own use"; $stauts_list_color="#ff0000"; $expire_check='';}
                     else if($ex_list_listing_status=='7'){ $ex_list_listing_status="unknown"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='8'){ $ex_list_listing_status="ไม่รับสาย"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='9'){ $ex_list_listing_status="ไม่สะดวกคุย"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='10'){ $ex_list_listing_status="ปิดเครื่อง"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='11'){ $ex_list_listing_status="สายไม่ว่าง"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='12'){ $ex_list_listing_status="เบอร์ผิด"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='13'){ $ex_list_listing_status="ไม่รับ agent"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='14'){ $ex_list_listing_status="ยังไม่ปล่อยขาย/เช่า"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='15'){ $ex_list_listing_status="Under Renovation";  $ex_list_rent_till=$ex_list_rent_till; 
                                          //เช็ควันหมดอายุ
                                         if($ex_list_rent_till_date<=$calExpireDate){ $stauts_list_color="#ffa200"; $expire_check=' <span class="right badge badge-danger">New</span>';  
                                          }else{  $stauts_list_color="#ff0000";  $expire_check=''; } 

                                                   
                                         }
                   /////////////////////////////////////////

                    $sql_project="SELECT project_type , project_name_en FROM type_project WHERE  project_id='$project_id'  LIMIT 1 ";   
                    $result_project= $conn->query($sql_project);
                    $rs_project=$result_project->fetch_assoc();

                     $project_type=$rs_project['project_type'];
                     $project_name=$rs_project['project_name_en']; 
                   
             
                 if($ex_list_listing_type=='1' or $ex_list_floor=='' or $ex_list_floor=='0'){ 

                           $ex_list_floor_th=$ex_list_floor." fl";             

                 } 


                   $area_th=$ex_list_rai." ไร่ - ".$ex_list_ngan." งาน - ".$ex_list_wa." วา";
                   $area_en=$ex_list_rai." - ".$ex_list_ngan." - ".$ex_list_wa." ";

                   if($ex_list_sqm!=''){ $ex_list_sqm_th=$ex_list_sqm." sqm."; }
                   if($ex_list_bedroom!=''){ 
                           if($ex_list_bedroom=='0'){  $ex_list_bedroom_th="Studio";  
                           }else{  $ex_list_bedroom_th=$ex_list_bedroom."b";   }
                   }
                   if($ex_list_bathroom!=''){ $ex_list_bathroom_th=$ex_list_bathroom."b";    }
                   if($ex_list_floor!=''){ $ex_list_floor=$ex_list_floor." "; }
                   if($ex_list_total_floors!=''){ $ex_list_total_floors_th=$ex_list_total_floors." ชั้น"; }



                 if($ex_list_listing_type!='12'){
                       
                           $detail_1=$ex_list_bedroom_th." ".$ex_list_bathroom_th." , ".$ex_list_floor_th." , ".$ex_list_sqm_th;

                 }else{

                 }

       /////////// dbo_subdeal_calendar ////////////////

             $sql_calendar="SELECT * FROM dbo_subdeal_calendar where subdeal_code='$subdeal_code' and s_calendar_status='2' order by s_calendar_create DESC ";  
             $result_calendar= $conn->query($sql_calendar);
             $rs_calendar=$result_calendar->fetch_assoc(); 

             $s_calendar_date=$rs_calendar['s_calendar_date'];
             $s_calendar_time_start=$rs_calendar['s_calendar_time_start'];
             $s_calendar_time_end=$rs_calendar['s_calendar_time_end'];
             $s_calendar_note=$rs_calendar['s_calendar_note'];
             $s_calendar_create=$rs_calendar['s_calendar_create'];


              $year=substr($s_calendar_date,0 , 4 );
              $month=substr($s_calendar_date,5 , 2 );
              $day=substr($s_calendar_date,8 , 2 );

              $s_calendar_time_start_c=substr($s_calendar_time_start,0 , 5 );
              $s_calendar_time_end_c=substr($s_calendar_time_end,0 , 5 );

              $date=$day."/".$month."/".$year." เวลา : ".$s_calendar_time_start_c."-".$s_calendar_time_end_c;


              $year=substr($s_calendar_create,0 , 4 );
              $month=substr($s_calendar_create,5 , 2 );
              $day=substr($s_calendar_create,8 , 2 );
              $time_s=substr($s_calendar_create,11 , 8 );

              $s_calendar_create=$day."/".$month."/".$year." เวลา : ".$time_s;

          ?>
  
              <div class="modal fade" id="modal-closelost<?php echo $i;?>">
                <div class="modal-dialog">
                  <div class="modal-content bg-danger">
                    <div class="modal-header">
                      <h4 class="modal-title">ดำเนินการยกเลิกSub Deal : <?php echo $ex_list_listing_code;?></h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
    

                 <form method="post" id="form" class="form-horizontal" enctype="multipart/form-data" action="include/process.php" >

                  <input type="text" class="form-control" name="page"  value="create_subdeal" hidden="hidden">
                  <input type="text" class="form-control" name="user_id"  value="<?php echo $USER_ID;?>" hidden="hidden" >
                  <input type="text" class="form-control" name="p_check"  value="9" hidden="hidden" > 
                  <input type="text" class="form-control" name="id"  value="<?php echo $subdeal_code;?>" hidden="hidden">
                  <input type="text" class="form-control" name="code"  value="<?php echo $code;?>" hidden="hidden">
                  <input type="text" class="form-control" name="listing_code"  value="<?php echo $ex_list_listing_code;?>" hidden="hidden">

                  <input type="text" class="form-control" name="s_calendar_date"  value="<?php echo $todate;?>" hidden="hidden">
                  <input type="text" class="form-control" name="s_calendar_time_start"  value="<?php echo $time_s;?>" hidden="hidden"> 
                  <input type="text" class="form-control" name="s_calendar_time_end"  value="<?php echo $time_e;?>" hidden="hidden">   

                    <div class="row" style="font-size: 14px; " >
          
                       <div class="col-md-12" > 
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Remark : </label>
                            <div class="col-sm-12"> 
                              <textarea class="form-control" rows="5" placeholder="Enter ..." id="s_calendar_note" name="s_calendar_note" required=""></textarea>
                            </div>
                          </div> 
                       </div>

                      <div class="col-12" >                       
                    
                           <center>
                               <input type="submit" class="btn btn-warning" value="ใช่">
                               <button type="button" class="btn btn-default" data-dismiss="modal">ไม่ใช่</button>
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


             
              <div class="modal fade" id="modal-calendar<?php echo $i;?>">
                <div class="modal-dialog">
                  <div class="modal-content "  >
                    <div class="modal-header">
                      <h4 class="modal-title">นัดเซ็นต์สัญญา <?php echo $ex_list_listing_code;?></h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
    
                               <form method="post" id="form" class="form-horizontal" enctype="multipart/form-data" action="include/process.php" >

                                  <input type="text" class="form-control" name="page"  value="create_subdeal" hidden="hidden">
                                  <input type="text" class="form-control" name="user_id"  value="<?php echo $USER_ID;?>" hidden="hidden" >
                                  <input type="text" class="form-control" name="p_check"  value="4" hidden="hidden" > 
                                  <input type="text" class="form-control" name="id"  value="<?php echo $subdeal_code;?>" hidden="hidden">
                                  <input type="text" class="form-control" name="code"  value="<?php echo $code;?>" hidden="hidden">
                                  <input type="text" class="form-control" name="listing_code"  value="<?php echo $ex_list_listing_code;?>" hidden="hidden">

                                    <div class="row" style="font-size: 12px;  "    >

                                      <div class="col-md-12"> 
                                          <h5 style="text-align: center;font-size: 18px;"  ><b>เลือกวันที่นัดเซ็นสัญญา</b></h5>
                                           <div class="form-group row">
                                            <label for="inputEmail4" class="col-sm-3 col-form-label">ลงวันที่ : </label>
                                            <div class="col-sm-9"> 
                                              <div class="input-group date" id="reservationdate<?php echo $i;?>" data-target-input="nearest">
                                                  <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate<?php echo $i;?>" name="s_calendar_date"  placeholder=""  data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask required="" />
                                                  <div class="input-group-append" data-target="#reservationdate<?php echo $i;?>" data-toggle="datetimepicker">
                                                      <div class="input-group-text" ><i class="fa fa-calendar"></i></div>
                                                  </div>
                                              </div> 

                                            </div> 
                                          </div> 
                                      </div> 


                                      <div class="col-md-12"> 
                                         <div class="form-group row">
                                            <label for="inputEmail4" class="col-sm-3 col-form-label">เวลาเริ่มต้น :  </label>
                                            <div class="col-sm-9"> 

                                              <select class="form-control select2bs4"  name="s_calendar_time_start"  id="s_calendar_time_start<?php echo $i;?>"  style="width: 100%;" required=""> 
                                                <option value="">เลือก</option> 
                                 <?php 
                                          $sql_time="SELECT * FROM type_time order by time_id  ASC ";  

                                          $result_time= $conn->query($sql_time);
                                          while($rs_time=$result_time->fetch_assoc()) {   
                                             
                                             $time_time=$rs_time['time_time']; 

                                        ?>
                                                <option value="<?php echo $time_time;?>" <?php if($time_time==$s_calendar_create){ ?>  selected="selected" <?php } ?> ><?php echo $time_time;?></option>  

                                 <?php    } ?>   
                                              </select> 

                                            </div> 
                                          </div> 

                                       </div>

                                      <div class="col-md-12"> 
                                         <div class="form-group row">
                                            <label for="inputEmail4" class="col-sm-3 col-form-label">เวลาสิ้นสุด : </label>
                                            <div class="col-sm-9">  

                                              <select class="form-control select2bs4"  name="s_calendar_time_end"  id="s_calendar_time_end<?php echo $i;?>"  style="width: 100%;" > 
                                                <option value="">เลือก</option> 
                                 <?php 
                                          $sql_time="SELECT * FROM type_time order by time_id  ASC ";  

                                          $result_time= $conn->query($sql_time);
                                          while($rs_time=$result_time->fetch_assoc()) {   
                                             
                                             $time_time=$rs_time['time_time'];  
                                  ?>
                                                <option value="<?php echo $time_time;?>" ><?php echo $time_time;?></option>  

                                 <?php    } ?>   
                                              </select> 

                                            </div> 
                                          </div> 

                                       </div>
                                       <div class="col-md-12" > 
                                          <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Remark : </label>
                                            <div class="col-sm-12"> 
                                              <textarea class="form-control" rows="5" placeholder="Enter ..." id="s_calendar_note" name="s_calendar_note"></textarea>
                                            </div>
                                          </div> 
                                       </div>

                                      <div class="col-12" >
                                       
                                    
                                           <center>
                                               <input type="submit" class="btn btn-warning" value="ใช่">
                                               <button type="button" class="btn btn-default" data-dismiss="modal">ไม่ใช่</button>
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
 
 


                                      <!-- DIRECT CHAT SUCCESS -->
            <div class="card card-success card-outline direct-chat direct-chat-success collapsed-card" style="margin:5px;   font-size: 14px;  ">
              <div class="card-header">
                

                <table style="width: 100%;">
                 <tr>
                    <td>  <?php  echo $project_name;?> <br>  </td>
                    <td style="width: 63px;">

 
                          <!--
                          <span title="3 New Messages" class="badge bg-success">3</span>-->
                        <!--
                          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="นัดชมทรัพย์">
                            <i class="fa fa-arrow-right"></i>
                          </button> 
                        -->
                          <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-calendar<?php echo $i;?>" title="นัดชมทรัพย์">
                            <i class="fa fa-arrow-right"></i>
                          </button>       
                          <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-closelost<?php echo $i;?>" title="ยกเลิกดีล">
                            <i class="fas fa-times"></i>
                          </button> 
                       

                    </td>
                  </tr>
                </table> 

                             <a href="?page=upload_file_excel_check_view&listing=<?php echo $ex_list_listing_code;?>&deal=view" target="_black" >
                             <?php echo $ex_list_listing_code;?></a> <?php echo $detail_1;?> <br>
                             <?php echo number_format($ex_list_price)." Baht";?><br>
                              Status : <b style="width:80px;color: <?php echo $stauts_list_color;?>;"><a onclick="window.open('page/listing_status.php?id=<?php echo $ex_list_listing_code;?>', '_blank', 'location=yes,height=650,width=520,scrollbars=yes,status=yes');"style="cursor:pointer;"   > 
                                <?php echo $ex_list_listing_status.$expire_check;  ?>
                                <?php if($ex_list_listing_status_check=='3' or $ex_list_listing_status_check=='15'){ ?> <?php echo $ex_list_rent_till; } ?>
                               </a> </b>
                             <hr>
                             <?php if($s_calendar_note!=''){ echo $s_calendar_note."<br>"; } ?>  
                             <i class="fa fa-clock-o"></i> <?php echo $s_calendar_create;?>

                
 
              </div>
              <!-- /.card-header -->
              <div class="card-body" >
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages" style="height: 500px;padding: 0px;" >

 

  <!-- 
                                         <center>
                                             <a href="?page=create_subdeal&status=edit&p_check=subdeal&id=<?php echo $subdeal_code;?>" class="btn btn-sm btn-primary"   >
                                              <i class="fas fa-user"></i>  คลิกเข้าชม
                                             </a>
                                         </center>-->

                                  

                  <!-- /.direct-chat-msg -->
                </div>
                <!--/.direct-chat-messages-->

                <!-- Contacts are loaded here -->
                <div class="direct-chat-contacts" style="height: 300px;">
                  <ul class="contacts-list" >
                    <li >
  
                    </li>
                    <!-- End Contact Item -->
                  </ul>
                  <!-- /.contatcts-list -->
                </div>
                <!-- /.direct-chat-pane -->
              </div>
              <!-- /.card-body -->
              
              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->
                  
            <?php }  ?> 


          </div>
          <div class="card-header" style="background-color: #1f4e78; color: #fff;">
            <h3 class="card-title">
              นัดเซ็นต์สัญญา
            </h3>
          </div>
          <div class="card-body" style="height: auto;">
          


 
              <?php  $i=100;
                $sql_subdeal="SELECT subdeal.ex_list_listing_code, subdeal.subdeal_code , subdeal.color , subdeal.user_id FROM dbo_subdeal AS subdeal 
                            WHERE subdeal.create_deal_code='$code' and subdeal.subdeal_status='4'
                            order by subdeal.subdeal_create_date DESC  ";  

              $result_subdeal= $conn->query($sql_subdeal);
              while($rs_subdeal=$result_subdeal->fetch_assoc()) {   $i++;

                   $ex_list_listing_code=$rs_subdeal['ex_list_listing_code']; 
                   $subdeal_code=$rs_subdeal['subdeal_code'];
                   $color=$rs_subdeal['color'];
                    $user_id=$rs_subdeal['user_id'];
   

                    $sql_register="SELECT register_nickname FROM dbo_register
                                 WHERE  register_id='$user_id'  LIMIT 1 ";   
                    $result_register= $conn->query($sql_register);
                    $rs_register=$result_register->fetch_assoc(); 
                    $register_nickname=$rs_register['register_nickname'];



                    /////////////////////////////////////////
                    $sql_listing="SELECT project_id ,ex_list_floor ,ex_list_sqm ,ex_list_view ,ex_list_bedroom ,ex_list_bathroom , 
                                        ex_list_other_room , ex_list_parking , ex_list_price , ex_list_listing_status ,ex_list_rent_till_date , ex_list_rent_till FROM dbo_data_excel_listing
                                 WHERE  ex_list_listing_code='$ex_list_listing_code'  LIMIT 1 ";   
                    $result_listing= $conn->query($sql_listing);
                    $rs_listing=$result_listing->fetch_assoc();

                     $project_id=$rs_listing['project_id'];
                     $ex_list_floor=$rs_listing['ex_list_floor'];
                     $ex_list_sqm=$rs_listing['ex_list_sqm'];
                     $ex_list_view=$rs_listing['ex_list_view']; 
                     $ex_list_bedroom=$rs_listing['ex_list_bedroom'];
                     $ex_list_bathroom=$rs_listing['ex_list_bathroom'];
                     $ex_list_other_room=$rs_listing['ex_list_other_room'];
                     $ex_list_parking=$rs_listing['ex_list_parking'];              
                     $ex_list_price=$rs_listing['ex_list_price'];
                     $ex_list_listing_status=$rs_listing['ex_list_listing_status'];
                     $ex_list_rent_till_date=$rs_listing['ex_list_rent_till_date'];
                     $ex_list_listing_status_check=$rs_listing['ex_list_listing_status'];
                     $ex_list_rent_till=$rs_listing['ex_list_rent_till'];

                     if($ex_list_listing_status=='' or $ex_list_listing_status=='0'){ $ex_list_listing_status="No Status"; $stauts_list_color="#000";  $expire_check='';}
                     else if($ex_list_listing_status=='1'){ $ex_list_listing_status="Available"; $stauts_list_color="#42d700"; $expire_check='';}
                     else if($ex_list_listing_status=='2'){ $ex_list_listing_status="Contracted ไม่ล็อคสิทธิ"; $stauts_list_color="#42d700"; $expire_check='';}
                     else if($ex_list_listing_status=='3'){ $ex_list_listing_status="Rented";  $ex_list_rent_till=$ex_list_rent_till; 
                                                      //เช็ควันหมดอายุ
                                                     if($ex_list_rent_till_date<=$calExpireDate){ $stauts_list_color="#ffa200"; $expire_check=' <span class="right badge badge-danger">New</span>';  
                                                      }else{  $stauts_list_color="#ff0000";  $expire_check=''; }  
                                                               
                                                     }
                     else if($ex_list_listing_status=='4'){ $ex_list_listing_status="Sold(by Connex)";  $stauts_list_color="#ff0000"; $expire_check='';}
                     else if($ex_list_listing_status=='5'){ $ex_list_listing_status="Sold(by Others)"; $stauts_list_color="#ff0000";$expire_check=''; }
                     else if($ex_list_listing_status=='6'){ $ex_list_listing_status="own use"; $stauts_list_color="#ff0000"; $expire_check='';}
                     else if($ex_list_listing_status=='7'){ $ex_list_listing_status="unknown"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='8'){ $ex_list_listing_status="ไม่รับสาย"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='9'){ $ex_list_listing_status="ไม่สะดวกคุย"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='10'){ $ex_list_listing_status="ปิดเครื่อง"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='11'){ $ex_list_listing_status="สายไม่ว่าง"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='12'){ $ex_list_listing_status="เบอร์ผิด"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='13'){ $ex_list_listing_status="ไม่รับ agent"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='14'){ $ex_list_listing_status="ยังไม่ปล่อยขาย/เช่า"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='15'){ $ex_list_listing_status="Under Renovation";  $ex_list_rent_till=$ex_list_rent_till; 
                                          //เช็ควันหมดอายุ
                                         if($ex_list_rent_till_date<=$calExpireDate){ $stauts_list_color="#ffa200"; $expire_check=' <span class="right badge badge-danger">New</span>';  
                                          }else{  $stauts_list_color="#ff0000";  $expire_check=''; } 

                                                   
                                         }
                   /////////////////////////////////////////

                    $sql_project="SELECT project_type , project_name_en FROM type_project WHERE  project_id='$project_id'  LIMIT 1 ";   
                    $result_project= $conn->query($sql_project);
                    $rs_project=$result_project->fetch_assoc();

                     $project_type=$rs_project['project_type'];
                     $project_name=$rs_project['project_name_en']; 
                   
             
                 if($ex_list_listing_type=='1' or $ex_list_floor=='' or $ex_list_floor=='0'){ 

                           $ex_list_floor_th=$ex_list_floor." fl";             

                 } 


                   $area_th=$ex_list_rai." ไร่ - ".$ex_list_ngan." งาน - ".$ex_list_wa." วา";
                   $area_en=$ex_list_rai." - ".$ex_list_ngan." - ".$ex_list_wa." ";

                   if($ex_list_sqm!=''){ $ex_list_sqm_th=$ex_list_sqm." sqm."; }
                   if($ex_list_bedroom!=''){ 
                           if($ex_list_bedroom=='0'){  $ex_list_bedroom_th="Studio";  
                           }else{  $ex_list_bedroom_th=$ex_list_bedroom."b";   }
                   }
                   if($ex_list_bathroom!=''){ $ex_list_bathroom_th=$ex_list_bathroom."b";    }
                   if($ex_list_floor!=''){ $ex_list_floor=$ex_list_floor." "; }
                   if($ex_list_total_floors!=''){ $ex_list_total_floors_th=$ex_list_total_floors." ชั้น"; }



                 if($ex_list_listing_type!='12'){
                       
                           $detail_1=$ex_list_bedroom_th." ".$ex_list_bathroom_th." , ".$ex_list_floor_th." , ".$ex_list_sqm_th;

                 }else{

                 }


             $sql_calendar="SELECT * FROM dbo_subdeal_calendar where subdeal_code='$subdeal_code' and s_calendar_status='4' order by s_calendar_create DESC ";  
             $result_calendar= $conn->query($sql_calendar);
             $rs_calendar=$result_calendar->fetch_assoc(); 

             $s_calendar_date=$rs_calendar['s_calendar_date'];
             $s_calendar_time_start=$rs_calendar['s_calendar_time_start'];
             $s_calendar_time_end=$rs_calendar['s_calendar_time_end'];
             $s_calendar_note=$rs_calendar['s_calendar_note'];
             $s_calendar_create=$rs_calendar['s_calendar_create'];

              $year=substr($s_calendar_date,0 , 4 );
              $month=substr($s_calendar_date,5 , 2 );
              $day=substr($s_calendar_date,8 , 2 );

              $s_calendar_time_start_c=substr($s_calendar_time_start,0 , 5 );
              $s_calendar_time_end_c=substr($s_calendar_time_end,0 , 5 );

              $date=$day."/".$month."/".$year." เวลา".$s_calendar_time_start_c."-".$s_calendar_time_end_c;

              $year=substr($s_calendar_create,0 , 4 );
              $month=substr($s_calendar_create,5 , 2 );
              $day=substr($s_calendar_create,8 , 2 );
              $time_s=substr($s_calendar_create,11 , 8 );

              $s_calendar_create=$day."/".$month."/".$year." เวลา : ".$time_s;

          ?>



              <div class="modal fade" id="modal-closelost<?php echo $i;?>">
                <div class="modal-dialog">
                  <div class="modal-content bg-danger">
                    <div class="modal-header">
                      <h4 class="modal-title">ดำเนินการยกเลิกSub Deal : <?php echo $ex_list_listing_code;?></h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
    

                 <form method="post" id="form" class="form-horizontal" enctype="multipart/form-data" action="include/process.php" >

                  <input type="text" class="form-control" name="page"  value="create_subdeal" hidden="hidden">
                  <input type="text" class="form-control" name="user_id"  value="<?php echo $USER_ID;?>" hidden="hidden" >
                  <input type="text" class="form-control" name="p_check"  value="9" hidden="hidden" > 
                  <input type="text" class="form-control" name="id"  value="<?php echo $subdeal_code;?>" hidden="hidden">
                  <input type="text" class="form-control" name="code"  value="<?php echo $code;?>" hidden="hidden">
                  <input type="text" class="form-control" name="listing_code"  value="<?php echo $ex_list_listing_code;?>" hidden="hidden">

                  <input type="text" class="form-control" name="s_calendar_date"  value="<?php echo $todate;?>" hidden="hidden">
                  <input type="text" class="form-control" name="s_calendar_time_start"  value="<?php echo $time_s;?>" hidden="hidden"> 
                  <input type="text" class="form-control" name="s_calendar_time_end"  value="<?php echo $time_e;?>" hidden="hidden">  

                    <div class="row" style="font-size: 14px; " >
          
                       <div class="col-md-12" > 
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Remark : </label>
                            <div class="col-sm-12"> 
                              <textarea class="form-control" rows="5" placeholder="Enter ..." id="s_calendar_note" name="s_calendar_note" required=""></textarea>
                            </div>
                          </div> 
                       </div>

                      <div class="col-12" >                       
                    
                           <center>
                               <input type="submit" class="btn btn-warning" value="ใช่">
                               <button type="button" class="btn btn-default" data-dismiss="modal">ไม่ใช่</button>
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
  



              <div class="modal fade" id="modal-calendar<?php echo $i;?>">
                <div class="modal-dialog">
                  <div class="modal-content"  >
                    <div class="modal-header">
                      <h4 class="modal-title">แนบภาพถ่ายหลังเซ็นต์สัญญา <?php echo $ex_list_listing_code;?></h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
    
                               <form method="post" id="form" class="form-horizontal" enctype="multipart/form-data" action="include/process.php" >

                                <input type="text" class="form-control" name="page"  value="create_subdeal" hidden="hidden">
                                <input type="text" class="form-control" name="user_id"  value="<?php echo $USER_ID;?>" hidden="hidden" >
                         <?php if($create_deal_attention=='1'){ ?>
                                <input type="text" class="form-control" name="p_check"  value="5" hidden="hidden" > 
                         <?php }else{ ?> 
                                <input type="text" class="form-control" name="p_check"  value="8" hidden="hidden" > 
                         <?php } ?>

                                <input type="text" class="form-control" name="id"  value="<?php echo $subdeal_code;?>" hidden="hidden">
                                <input type="text" class="form-control" name="code"  value="<?php echo $code;?>" hidden="hidden">
                                <input type="text" class="form-control" name="listing_code"  value="<?php echo $ex_list_listing_code;?>" hidden="hidden">

                                <input type="text" class="form-control" name="s_calendar_date"  value="<?php echo $todate;?>" hidden="hidden">
                                <input type="text" class="form-control" name="s_calendar_time_start"  value="<?php echo $time_s;?>" hidden="hidden"> 
                                <input type="text" class="form-control" name="s_calendar_time_end"  value="<?php echo $time_e;?>" hidden="hidden">   

                                  <div class="row" style="font-size: 12px;  "    >

                                    <div class="col-md-12"> 

                                        <h5 style="text-align: center;font-size: 18px;"  ><b>แนบภาพถ่ายหลังเซ็นสัญญา</b></h5>

                                         <div class="form-group row">
                                          <label for="inputEmail4" class="col-sm-3 col-form-label">แนบไฟล์ : </label>
                                          <div class="col-sm-9"> 
                                            <input type="file"  id="exampleInputFile" name="s_calendar_file" required="">

                                          </div> 
                                        </div> 
                                    </div> 
 
                                       <div class="col-md-12"> 
                                           
                                           <div class="form-group row">
                                            <label for="inputEmail4" class="col-sm-3 col-form-label">วันที่เซ็นสัญญา : </label>
                                            <div class="col-sm-9"> 
                                              <div class="input-group date" id="reservationdate<?php echo $i;?>" data-target-input="nearest">
                                                  <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate<?php echo $i;?>" name="s_calendar_date"  placeholder=""  data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask required="" />
                                                  <div class="input-group-append" data-target="#reservationdate<?php echo $i;?>" data-toggle="datetimepicker">
                                                      <div class="input-group-text" ><i class="fa fa-calendar"></i></div>
                                                  </div>
                                              </div> 

                                            </div> 
                                          </div> 
                                      </div> 
               
                                     <div class="col-md-12" > 
                                        <div class="form-group row">
                                          <label for="inputEmail3" class="col-sm-12 col-form-label">Remark : </label>
                                          <div class="col-sm-12"> 
                                            <textarea class="form-control" rows="5" placeholder="Enter ..." id="s_calendar_note" name="s_calendar_note" ></textarea>
                                          </div>
                                        </div> 
                                     </div>

                                      <div class="col-12" >
                                       
                                    
                                           <center>
                                               <input type="submit" class="btn btn-warning" value="ใช่">
                                               <button type="button" class="btn btn-default" data-dismiss="modal">ไม่ใช่</button>
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



              <div class="modal fade" id="modal-edit<?php echo $i;?>">
                <div class="modal-dialog">
                  <div class="modal-content"  >
                    <div class="modal-header">
                      <h4 class="modal-title">Note นัดเซ็นต์สัญญา <?php echo $ex_list_listing_code;?></h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
    
                            <form method="post" id="form" class="form-horizontal" enctype="multipart/form-data" action="include/process.php" >
     
                                    <input type="text" class="form-control" name="page"  value="create_subdeal" hidden="hidden">
                                    <input type="text" class="form-control" name="user_id"  value="<?php echo $USER_ID;?>" hidden="hidden" >
                                    <input type="text" class="form-control" name="p_check"  value="4" hidden="hidden" > 
                                    <input type="text" class="form-control" name="id"  value="<?php echo $subdeal_code;?>" hidden="hidden">
                                    <input type="text" class="form-control" name="code"  value="<?php echo $code;?>" hidden="hidden">
                                    <input type="text" class="form-control" name="listing_code"  value="<?php echo $ex_list_listing_code;?>" hidden="hidden">
                                    <input type="text" class="form-control" name="edit"  value="edit" hidden="hidden">

                                  <div class="row" style="font-size: 14px;  "    >

                                    <div class="col-md-12"> 
                                        <h4 style="text-align: center;font-size: 18px;"><b>เลือกวันที่เพื่อนัดเซ็นสัญญา</b></h4>
                                         <div class="form-group row">
                                          <label for="inputEmail4" class="col-sm-3 col-form-label">ลงวันที่ : </label>
                                          <div class="col-sm-9"> 
                                            <div class="input-group date" id="reservationdate<?php echo $i;?>" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate<?php echo $i;?>" name="s_calendar_date"  placeholder=""  data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask value="<?php echo $date;?>" required="" />
                                                <div class="input-group-append" data-target="#reservationdate<?php echo $i;?>" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>

                                          </div> 
                                        </div> 
                                    </div> 
                                    <div class="col-md-12"> 
                                       <div class="form-group row">
                                          <label for="inputEmail4" class="col-sm-3 col-form-label">เวลาเริ่มต้น : </label>
                                          <div class="col-sm-9"> 

                                              <select class="form-control select2bs4"  name="s_calendar_time_start"  id="s_calendar_time_start<?php echo $i;?>"  style="width: 100%;" > 
                                                <option value="">เลือก</option> 
                                 <?php 
                                          $sql_time="SELECT * FROM type_time order by time_id  ASC ";  

                                          $result_time= $conn->query($sql_time);
                                          while($rs_time=$result_time->fetch_assoc()) {   
                                             
                                             $time_time=$rs_time['time_time']; 

                                        ?>
                                                <option value="<?php echo $time_time;?>" <?php if($time_time==$s_calendar_time_start){?> selected="selected"  <?php }?> ><?php echo $time_time;?></option>  

                                 <?php    } ?>   
                                              </select> 

                                          </div> 
                                        </div> 

                                     </div>

                                    <div class="col-md-12"> 
                                       <div class="form-group row">
                                          <label for="inputEmail4" class="col-sm-3 col-form-label">เวลาสิ้นสุด : </label>
                                          <div class="col-sm-9"> 

                                              <select class="form-control select2bs4"  name="s_calendar_time_end"  id="s_calendar_time_end<?php echo $i;?>"  style="width: 100%;" required=""> 
                                                <option value="">เลือก</option> 
                                 <?php 
                                          $sql_time="SELECT * FROM type_time order by time_id  ASC ";  

                                          $result_time= $conn->query($sql_time);
                                          while($rs_time=$result_time->fetch_assoc()) {   
                                             
                                             $time_time=$rs_time['time_time']; 

                                        ?>
                                                <option value="<?php echo $time_time;?>" <?php if($time_time==$s_calendar_time_end){?> selected="selected"  <?php }?>><?php echo $time_time;?></option>  

                                 <?php    } ?>   
                                              </select> 

                                          </div> 
                                        </div> 

                                     </div>

                                     <div class="col-md-12" > 
                                        <div class="form-group row">
                                          <label for="inputEmail3" class="col-sm-12 col-form-label">Remark : </label>
                                          <div class="col-sm-12"> 
                                            <textarea class="form-control" rows="4" placeholder="Enter ..." id="s_calendar_note" name="s_calendar_note"><?php echo $s_calendar_note;?></textarea>
                                          </div>
                                        </div> 
                                     </div>

                                    <div class="col-12" >
                                     
                                  
                                           <center>
                                               <input type="submit" class="btn btn-warning" value="ใช่">
                                               <button type="button" class="btn btn-default" data-dismiss="modal">ไม่ใช่</button>
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

                                      <!-- DIRECT CHAT SUCCESS -->
            <div class="card card-success card-outline direct-chat direct-chat-success collapsed-card" style="margin:5px;  font-size:14px;">
              <div class="card-header">
 

                <table style="width: 100%;">
                 <tr>
                    <td>  <?php  echo $project_name;?> <br>  </td>
                    <td style="width: 97px;">

              <?php if($contact_deal_win!='8' and $contact_deal_win!='9'){ //ยังไม่ close lot won  ?> 

                          <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-calendar<?php echo $i;?>" title="นัดเซ็นต์สัญญา">
                            <i class="fa fa-arrow-right"></i>
                          </button>                  
                          <button type="button" class="btn btn-tool" title="แก้ไขข้อมูล" data-toggle="modal" data-target="#modal-edit<?php echo $i;?>" >
                            <i class="fa fa-clock-o"></i>
                          </button>  
                          <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-closelost<?php echo $i;?>" title="ยกเลิกดีล">
                            <i class="fas fa-times"></i>
                          </button> 
              
              <?php } ?>

                    </td>
                  </tr>
                </table> 

                             <a href="?page=upload_file_excel_check_view&listing=<?php echo $ex_list_listing_code;?>&deal=view" target="_black" >
                             <?php echo $ex_list_listing_code;?></a> <?php echo $detail_1;?> <br>
                             <?php echo number_format($ex_list_price)." Baht";?> <br>   
                              Status : <b style="width:80px;color: <?php echo $stauts_list_color;?>;"><a onclick="window.open('page/listing_status.php?id=<?php echo $ex_list_listing_code;?>', '_blank', 'location=yes,height=650,width=520,scrollbars=yes,status=yes');"style="cursor:pointer;"   > 
                                <?php echo $ex_list_listing_status.$expire_check;  ?>
                                <?php if($ex_list_listing_status_check=='3' or $ex_list_listing_status_check=='15'){ ?> <?php echo $ex_list_rent_till; } ?>
                               </a> </b>
                             <hr>                        
                             <?php if($s_calendar_note!=''){ echo $s_calendar_note."<br>"; } ?> 
                             <?php echo "วันที่นัดเซ็น : ".$date;?><br>                         
                     <div class="row" style="font-size: 12px;  ">
                          <div class="col-md-8"> 
                              <i class="fa fa-clock-o"></i> <?php echo $s_calendar_create;?>
                          </div>
                          <div class="col-md-4" style="text-align: right;"> 
                              <?php echo $register_nickname;?>
                          </div>
                     </div>

              </div>
              <!-- /.card-header -->
              <div class="card-body" >
                <!-- Conversations are loaded here -->
             
                <!--/.direct-chat-messages-->

                <!-- Contacts are loaded here -->
                <div class="direct-chat-contacts" style="height: 300px;">
                  <ul class="contacts-list" >
                    <li >
  
                    </li>
                    <!-- End Contact Item -->
                  </ul>
                  <!-- /.contatcts-list -->
                </div>
                <!-- /.direct-chat-pane -->
              </div>
              <!-- /.card-body -->
              
              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->
                  
            <?php }  ?>



          </div>



<?php if($create_deal_attention=='1'){ ?>


          <div class="card-header"  style="background-color: #1f4e78; color: #fff;">
            <h3 class="card-title" >
              เซ็นต์สัญญาแล้ว
            </h3>
          </div>
          <div class="card-body" style="height: auto;">

              <?php $i=120;
                $sql_subdeal="SELECT subdeal.ex_list_listing_code, subdeal.subdeal_code , subdeal.color , subdeal.user_id FROM dbo_subdeal AS subdeal 
                            WHERE subdeal.create_deal_code='$code' and subdeal.subdeal_status='5'
                            order by subdeal.subdeal_create_date DESC  ";  

              $result_subdeal= $conn->query($sql_subdeal);
              while($rs_subdeal=$result_subdeal->fetch_assoc()) {   $i++;

                   $ex_list_listing_code=$rs_subdeal['ex_list_listing_code']; 
                   $subdeal_code=$rs_subdeal['subdeal_code'];
                   $color=$rs_subdeal['color'];
                    $user_id=$rs_subdeal['user_id'];
   

                    $sql_register="SELECT register_nickname FROM dbo_register
                                 WHERE  register_id='$user_id'  LIMIT 1 ";   
                    $result_register= $conn->query($sql_register);
                    $rs_register=$result_register->fetch_assoc(); 
                    $register_nickname=$rs_register['register_nickname'];

                    /////////////////////////////////////////
                    $sql_listing="SELECT project_id ,ex_list_floor ,ex_list_sqm ,ex_list_view ,ex_list_bedroom ,ex_list_bathroom , 
                                        ex_list_other_room , ex_list_parking , ex_list_price ,ex_list_listing_status , ex_list_rent_till_date ,ex_list_rent_till FROM dbo_data_excel_listing
                                 WHERE  ex_list_listing_code='$ex_list_listing_code'  LIMIT 1 ";   
                    $result_listing= $conn->query($sql_listing);
                    $rs_listing=$result_listing->fetch_assoc();

                     $project_id=$rs_listing['project_id'];
                     $ex_list_floor=$rs_listing['ex_list_floor'];
                     $ex_list_sqm=$rs_listing['ex_list_sqm'];
                     $ex_list_view=$rs_listing['ex_list_view']; 
                     $ex_list_bedroom=$rs_listing['ex_list_bedroom'];
                     $ex_list_bathroom=$rs_listing['ex_list_bathroom'];
                     $ex_list_other_room=$rs_listing['ex_list_other_room'];
                     $ex_list_parking=$rs_listing['ex_list_parking'];              
                     $ex_list_price=$rs_listing['ex_list_price'];
                     $ex_list_listing_status=$rs_listing['ex_list_listing_status'];
                     $ex_list_rent_till_date=$rs_listing['ex_list_rent_till_date'];
                     $ex_list_listing_status_check=$rs_listing['ex_list_listing_status'];
                     $ex_list_rent_till=$rs_listing['ex_list_rent_till'];

                     if($ex_list_listing_status=='' or $ex_list_listing_status=='0'){ $ex_list_listing_status="No Status"; $stauts_list_color="#000"; $expire_check=''; }
                     else if($ex_list_listing_status=='1'){ $ex_list_listing_status="Available"; $stauts_list_color="#42d700"; $expire_check=''; }
                     else if($ex_list_listing_status=='2'){ $ex_list_listing_status="Contracted ไม่ล็อคสิทธิ"; $stauts_list_color="#42d700"; $expire_check=''; }
                     else if($ex_list_listing_status=='3'){ $ex_list_listing_status="Rented";  $ex_list_rent_till=$ex_list_rent_till; 
                                                      //เช็ควันหมดอายุ
                                                     if($ex_list_rent_till_date<=$calExpireDate){ $stauts_list_color="#ffa200"; $expire_check=' <span class="right badge badge-danger">New</span>';  
                                                      }else{  $stauts_list_color="#ff0000";  $expire_check=''; }  
                                                               
                                                     }
                     else if($ex_list_listing_status=='4'){ $ex_list_listing_status="Sold(by Connex)";  $stauts_list_color="#ff0000"; $expire_check='';}
                     else if($ex_list_listing_status=='5'){ $ex_list_listing_status="Sold(by Others)"; $stauts_list_color="#ff0000"; $expire_check='';}
                     else if($ex_list_listing_status=='6'){ $ex_list_listing_status="own use"; $stauts_list_color="#ff0000"; $expire_check='';}
                     else if($ex_list_listing_status=='7'){ $ex_list_listing_status="unknown"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='8'){ $ex_list_listing_status="ไม่รับสาย"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='9'){ $ex_list_listing_status="ไม่สะดวกคุย"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='10'){ $ex_list_listing_status="ปิดเครื่อง"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='11'){ $ex_list_listing_status="สายไม่ว่าง"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='12'){ $ex_list_listing_status="เบอร์ผิด"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='13'){ $ex_list_listing_status="ไม่รับ agent"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='14'){ $ex_list_listing_status="ยังไม่ปล่อยขาย/เช่า"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='15'){ $ex_list_listing_status="Under Renovation";  $ex_list_rent_till=$ex_list_rent_till; 
                                          //เช็ควันหมดอายุ
                                         if($ex_list_rent_till_date<=$calExpireDate){ $stauts_list_color="#ffa200"; $expire_check=' <span class="right badge badge-danger">New</span>';  
                                          }else{  $stauts_list_color="#ff0000";  $expire_check=''; } 

                                                   
                                         }
                   /////////////////////////////////////////

                    $sql_project="SELECT project_type , project_name_en FROM type_project WHERE  project_id='$project_id'  LIMIT 1 ";   
                    $result_project= $conn->query($sql_project);
                    $rs_project=$result_project->fetch_assoc();

                     $project_type=$rs_project['project_type'];
                     $project_name=$rs_project['project_name_en']; 
                   
             
                 if($ex_list_listing_type=='1' or $ex_list_floor=='' or $ex_list_floor=='0'){ 

                           $ex_list_floor_th=$ex_list_floor." fl";             

                 } 


                   $area_th=$ex_list_rai." ไร่ - ".$ex_list_ngan." งาน - ".$ex_list_wa." วา";
                   $area_en=$ex_list_rai." - ".$ex_list_ngan." - ".$ex_list_wa." ";

                   if($ex_list_sqm!=''){ $ex_list_sqm_th=$ex_list_sqm." sqm."; }
                   if($ex_list_bedroom!=''){ 
                           if($ex_list_bedroom=='0'){  $ex_list_bedroom_th="Studio";  
                           }else{  $ex_list_bedroom_th=$ex_list_bedroom."b";   }
                   }
                   if($ex_list_bathroom!=''){ $ex_list_bathroom_th=$ex_list_bathroom."b";    }
                   if($ex_list_floor!=''){ $ex_list_floor=$ex_list_floor." "; }
                   if($ex_list_total_floors!=''){ $ex_list_total_floors_th=$ex_list_total_floors." ชั้น"; }



                 if($ex_list_listing_type!='12'){
                       
                           $detail_1=$ex_list_bedroom_th." ".$ex_list_bathroom_th." , ".$ex_list_floor_th." , ".$ex_list_sqm_th;

                 }else{

                 }


             $sql_calendar="SELECT * FROM dbo_subdeal_calendar where subdeal_code='$subdeal_code' and s_calendar_status='5' order by s_calendar_create DESC ";  
             $result_calendar= $conn->query($sql_calendar);
             $rs_calendar=$result_calendar->fetch_assoc(); 

             $s_calendar_date=$rs_calendar['s_calendar_date'];
             $s_calendar_time_start=$rs_calendar['s_calendar_time_start'];
             $s_calendar_time_end=$rs_calendar['s_calendar_time_end'];
             $s_calendar_note=$rs_calendar['s_calendar_note'];
             $s_calendar_create=$rs_calendar['s_calendar_create'];
             
              $year=substr($s_calendar_date,0 , 4 );
              $month=substr($s_calendar_date,5 , 2 );
              $day=substr($s_calendar_date,8 , 2 );

              $s_calendar_time_start_c=substr($s_calendar_time_start,0 , 5 );
              $s_calendar_time_end_c=substr($s_calendar_time_end,0 , 5 );

              $date=$day."/".$month."/".$year." เวลา".$s_calendar_time_start_c."-".$s_calendar_time_end_c;

              $year=substr($s_calendar_create,0 , 4 );
              $month=substr($s_calendar_create,5 , 2 );
              $day=substr($s_calendar_create,8 , 2 );
              $time_s=substr($s_calendar_create,11 , 8 );

              $s_calendar_create=$day."/".$month."/".$year." เวลา : ".$time_s;

          ?>
  

              <div class="modal fade" id="modal-closelost<?php echo $i;?>">
                <div class="modal-dialog">
                  <div class="modal-content bg-danger">
                    <div class="modal-header">
                      <h4 class="modal-title">ดำเนินการยกเลิกSub Deal : <?php echo $ex_list_listing_code;?></h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
    

                 <form method="post" id="form" class="form-horizontal" enctype="multipart/form-data" action="include/process.php" >

                  <input type="text" class="form-control" name="page"  value="create_subdeal" hidden="hidden">
                  <input type="text" class="form-control" name="user_id"  value="<?php echo $USER_ID;?>" hidden="hidden" >
                  <input type="text" class="form-control" name="p_check"  value="9" hidden="hidden" > 
                  <input type="text" class="form-control" name="id"  value="<?php echo $subdeal_code;?>" hidden="hidden">
                  <input type="text" class="form-control" name="code"  value="<?php echo $code;?>" hidden="hidden">
                  <input type="text" class="form-control" name="listing_code"  value="<?php echo $ex_list_listing_code;?>" hidden="hidden">

                  <input type="text" class="form-control" name="s_calendar_date"  value="<?php echo $todate;?>" hidden="hidden">
                  <input type="text" class="form-control" name="s_calendar_time_start"  value="<?php echo $time_s;?>" hidden="hidden"> 
                  <input type="text" class="form-control" name="s_calendar_time_end"  value="<?php echo $time_e;?>" hidden="hidden">  

                    <div class="row" style="font-size: 14px; " >
          
                       <div class="col-md-12" > 
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Remark : </label>
                            <div class="col-sm-12"> 
                              <textarea class="form-control" rows="5" placeholder="Enter ..." id="s_calendar_note" name="s_calendar_note" required=""></textarea>
                            </div>
                          </div> 
                       </div>

                      <div class="col-12" >                       
                    
                           <center>
                               <input type="submit" class="btn btn-warning" value="ใช่">
                               <button type="button" class="btn btn-default" data-dismiss="modal">ไม่ใช่</button>
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
  
 
           
              <div class="modal fade" id="modal-calendar<?php echo $i;?>">
                <div class="modal-dialog">
                  <div class="modal-content"  >
                    <div class="modal-header">
                      <h4 class="modal-title">นัดโอนทรัพย์ <?php echo $ex_list_listing_code;?></h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
    
                               <form method="post" id="form" class="form-horizontal" enctype="multipart/form-data" action="include/process.php" >
                                  <input type="text" class="form-control" name="page"  value="create_subdeal" hidden="hidden">
                                  <input type="text" class="form-control" name="user_id"  value="<?php echo $USER_ID;?>" hidden="hidden" >
                                  <input type="text" class="form-control" name="p_check"  value="6" hidden="hidden" > 
                                  <input type="text" class="form-control" name="id"  value="<?php echo $subdeal_code;?>" hidden="hidden">
                                  <input type="text" class="form-control" name="code"  value="<?php echo $code;?>" hidden="hidden">
                                  <input type="text" class="form-control" name="listing_code"  value="<?php echo $ex_list_listing_code;?>" hidden="hidden">

                                    <div class="row" style="font-size: 12px; padding: 0px; "    >

                                      <div class="col-md-12"> 
                                          <h4 style="text-align: center;font-size: 18px;">เลือกวันที่เพื่อนัดโอน</h4>
                                           <div class="form-group row">
                                            <label for="inputEmail4" class="col-sm-3 col-form-label">ลงวันที่ : </label>
                                            <div class="col-sm-9"> 
                                              <div class="input-group date" id="reservationdate<?php echo $i;?>" data-target-input="nearest">
                                                  <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate<?php echo $i;?>" name="s_calendar_date"  placeholder=""  data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask />
                                                  <div class="input-group-append" data-target="#reservationdate<?php echo $i;?>" data-toggle="datetimepicker">
                                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                  </div>
                                              </div>

                                            </div> 
                                          </div> 
                                      </div> 
                                    <div class="col-md-12"> 
                                       <div class="form-group row">
                                          <label for="inputEmail4" class="col-sm-3 col-form-label">เวลาเริ่มต้น : </label>
                                          <div class="col-sm-9"> 

                                              <select class="form-control select2bs4"  name="s_calendar_time_start"  id="s_calendar_time_start<?php echo $i;?>"  style="width: 100%;" required=""> 
                                                <option value="">เลือก</option> 
                                 <?php 
                                          $sql_time="SELECT * FROM type_time order by time_id  ASC ";  

                                          $result_time= $conn->query($sql_time);
                                          while($rs_time=$result_time->fetch_assoc()) {   
                                             
                                             $time_time=$rs_time['time_time']; 

                                        ?>
                                                <option value="<?php echo $time_time;?>"><?php echo $time_time;?></option>  

                                 <?php    } ?>   
                                              </select> 

                                          </div> 
                                        </div> 

                                     </div>

                                    <div class="col-md-12"> 
                                       <div class="form-group row">
                                          <label for="inputEmail4" class="col-sm-3 col-form-label">เวลาสิ้นสุด : </label>
                                          <div class="col-sm-9"> 

                                              <select class="form-control select2bs4"  name="s_calendar_time_end"  id="s_calendar_time_end<?php echo $i;?>"  style="width: 100%;" > 
                                                <option value="">เลือก</option> 
                                 <?php 
                                          $sql_time="SELECT * FROM type_time order by time_id  ASC ";  

                                          $result_time= $conn->query($sql_time);
                                          while($rs_time=$result_time->fetch_assoc()) {   
                                             
                                             $time_time=$rs_time['time_time']; 

                                        ?>
                                                <option value="<?php echo $time_time;?>"><?php echo $time_time;?></option>  

                                 <?php    } ?>   
                                              </select> 

                                          </div> 
                                        </div> 

                                     </div>

                                       <div class="col-md-12" > 
                                          <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Remark : </label>
                                            <div class="col-sm-12"> 
                                              <textarea class="form-control" rows="5" placeholder="Enter ..." id="s_calendar_note" name="s_calendar_note"></textarea>
                                            </div>
                                          </div> 
                                       </div>

                                      <div class="col-12" >
                                       
                                    
                                           <center>
                                               <input type="submit" class="btn btn-warning" value="ใช่">
                                               <button type="button" class="btn btn-default" data-dismiss="modal">ไม่ใช่</button>
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

  
                                      <!-- DIRECT CHAT SUCCESS -->
            <div class="card card-success card-outline direct-chat direct-chat-success collapsed-card" style="margin:5px;  font-size: 14px;  ">
              <div class="card-header">

 
                <table style="width: 100%;">
                 <tr>
                    <td>  <?php  echo $project_name;?> <br>  </td>
                    <td style="width: 70px;text-align: right;">

              <?php if($contact_deal_win!='8' and $contact_deal_win!='9'){ //ยังไม่ close lot won  ?> 

                          <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-calendar<?php echo $i;?>" title="">
                            <i class="fa fa-arrow-right"></i>
                          </button>      
                          <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-closelost<?php echo $i;?>" title="ยกเลิกดีล">
                            <i class="fas fa-times"></i>
                          </button> 
               <?php } ?>

                    </td>
                  </tr>
                </table> 
 



                             <a href="?page=upload_file_excel_check_view&listing=<?php echo $ex_list_listing_code;?>&deal=view" target="_black" >
                             <?php echo $ex_list_listing_code;?></a> <?php echo $detail_1;?> <br>
                             <?php echo number_format($ex_list_price)." Baht";?><br>
                              Status : <b style="width:80px;color: <?php echo $stauts_list_color;?>;"><a onclick="window.open('page/listing_status.php?id=<?php echo $ex_list_listing_code;?>', '_blank', 'location=yes,height=650,width=520,scrollbars=yes,status=yes');"style="cursor:pointer;"   > 
                                <?php echo $ex_list_listing_status.$expire_check;  ?>
                                <?php if($ex_list_listing_status_check=='3' or $ex_list_listing_status_check=='15'){ ?> <?php echo $ex_list_rent_till; } ?>
                               </a> </b> 
                             <hr>                        
                             <?php if($s_calendar_note!=''){ echo $s_calendar_note."<br>"; } ?>                             
                     <div class="row" style="font-size: 12px;  ">
                          <div class="col-md-8"> 
                              <i class="fa fa-clock-o"></i> <?php echo $s_calendar_create;?>
                          </div>
                          <div class="col-md-4" style="text-align: right;"> 
                              <?php echo $register_nickname;?>
                          </div>
                     </div>

              </div>
              <!-- /.card-header -->
              <div class="card-body" >
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages" style="height: 500px;" >
     
  
<?php if($create_deal_attention=='1'){ ?>


 



<?php }else{ ?>

 

<?php } ?>            

                  <!-- /.direct-chat-msg -->
                </div>
                <!--/.direct-chat-messages-->

                <!-- Contacts are loaded here -->
                <div class="direct-chat-contacts" style="height: 300px;">
                  <ul class="contacts-list" >
                    <li >
  
                    </li>
                    <!-- End Contact Item -->
                  </ul>
                  <!-- /.contatcts-list -->
                </div>
                <!-- /.direct-chat-pane -->
              </div>
              <!-- /.card-body -->
              
              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->
                  
            <?php }  ?>
 


          </div>
<?php } ?>

        </div>

<?php if($create_deal_attention=='1'){ ?>


        <div class="card card-row card-default" style="width: <?php echo $size_w;?>;">
          <div class="card-header" style="background-color: #ffd966;">
            <h3 class="card-title">
              นัดโอน
            </h3>
          </div>
          <div class="card-body" style="height: auto;">
          


 
              <?php $i=140;
                $sql_subdeal="SELECT subdeal.ex_list_listing_code, subdeal.subdeal_code , subdeal.color , subdeal.user_id  FROM dbo_subdeal AS subdeal 
                            WHERE subdeal.create_deal_code='$code' and subdeal.subdeal_status='6'
                            order by subdeal.subdeal_create_date DESC LIMIT 10 ";  

              $result_subdeal= $conn->query($sql_subdeal);
              while($rs_subdeal=$result_subdeal->fetch_assoc()) {   $i++;

                   $ex_list_listing_code=$rs_subdeal['ex_list_listing_code']; 
                   $subdeal_code=$rs_subdeal['subdeal_code'];
                   $color=$rs_subdeal['color'];
                   $user_id=$rs_subdeal['user_id'];
   

                    $sql_register="SELECT register_nickname FROM dbo_register
                                 WHERE  register_id='$user_id'  LIMIT 1 ";   
                    $result_register= $conn->query($sql_register);
                    $rs_register=$result_register->fetch_assoc(); 
                    $register_nickname=$rs_register['register_nickname'];


                    /////////////////////////////////////////
                    $sql_listing="SELECT project_id ,ex_list_floor ,ex_list_sqm ,ex_list_view ,ex_list_bedroom ,ex_list_bathroom , 
                                        ex_list_other_room , ex_list_parking , ex_list_price , ex_list_listing_status , ex_list_rent_till_date ,ex_list_rent_till FROM dbo_data_excel_listing
                                 WHERE  ex_list_listing_code='$ex_list_listing_code'  LIMIT 1 ";   
                    $result_listing= $conn->query($sql_listing);
                    $rs_listing=$result_listing->fetch_assoc();

                     $project_id=$rs_listing['project_id'];
                     $ex_list_floor=$rs_listing['ex_list_floor'];
                     $ex_list_sqm=$rs_listing['ex_list_sqm'];
                     $ex_list_view=$rs_listing['ex_list_view']; 
                     $ex_list_bedroom=$rs_listing['ex_list_bedroom'];
                     $ex_list_bathroom=$rs_listing['ex_list_bathroom'];
                     $ex_list_other_room=$rs_listing['ex_list_other_room'];
                     $ex_list_parking=$rs_listing['ex_list_parking'];              
                     $ex_list_price=$rs_listing['ex_list_price'];
                     $ex_list_listing_status=$rs_listing['ex_list_listing_status'];
                     $ex_list_rent_till_date=$rs_listing['ex_list_rent_till_date'];
                     $ex_list_listing_status_check=$rs_listing['ex_list_listing_status'];
                     $ex_list_rent_till=$rs_listing['ex_list_rent_till'];

                     if($ex_list_listing_status=='' or $ex_list_listing_status=='0'){ $ex_list_listing_status="No Status"; $stauts_list_color="#000"; $expire_check=''; }
                     else if($ex_list_listing_status=='1'){ $ex_list_listing_status="Available"; $stauts_list_color="#42d700"; $expire_check='';}
                     else if($ex_list_listing_status=='2'){ $ex_list_listing_status="Contracted ไม่ล็อคสิทธิ"; $stauts_list_color="#42d700"; $expire_check='';}
                     else if($ex_list_listing_status=='3'){ $ex_list_listing_status="Rented";  $ex_list_rent_till=$ex_list_rent_till; 
                                                      //เช็ควันหมดอายุ
                                                     if($ex_list_rent_till_date<=$calExpireDate){ $stauts_list_color="#ffa200"; $expire_check=' <span class="right badge badge-danger">New</span>';  
                                                      }else{  $stauts_list_color="#ff0000";  $expire_check=''; }  
                                                               
                                                     }
                     else if($ex_list_listing_status=='4'){ $ex_list_listing_status="Sold(by Connex)";  $stauts_list_color="#ff0000"; $expire_check='';}
                     else if($ex_list_listing_status=='5'){ $ex_list_listing_status="Sold(by Others)"; $stauts_list_color="#ff0000"; $expire_check='';}
                     else if($ex_list_listing_status=='6'){ $ex_list_listing_status="own use"; $stauts_list_color="#ff0000"; $expire_check='';}
                     else if($ex_list_listing_status=='7'){ $ex_list_listing_status="unknown"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='8'){ $ex_list_listing_status="ไม่รับสาย"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='9'){ $ex_list_listing_status="ไม่สะดวกคุย"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='10'){ $ex_list_listing_status="ปิดเครื่อง"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='11'){ $ex_list_listing_status="สายไม่ว่าง"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='12'){ $ex_list_listing_status="เบอร์ผิด"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='13'){ $ex_list_listing_status="ไม่รับ agent"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='14'){ $ex_list_listing_status="ยังไม่ปล่อยขาย/เช่า"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='15'){ $ex_list_listing_status="Under Renovation";  $ex_list_rent_till=$ex_list_rent_till; 
                                          //เช็ควันหมดอายุ
                                         if($ex_list_rent_till_date<=$calExpireDate){ $stauts_list_color="#ffa200"; $expire_check=' <span class="right badge badge-danger">New</span>';  
                                          }else{  $stauts_list_color="#ff0000";  $expire_check=''; } 

                                                   
                                         }
                   /////////////////////////////////////////

                    $sql_project="SELECT project_type , project_name_en FROM type_project WHERE  project_id='$project_id'  LIMIT 1 ";   
                    $result_project= $conn->query($sql_project);
                    $rs_project=$result_project->fetch_assoc();

                     $project_type=$rs_project['project_type'];
                     $project_name=$rs_project['project_name_en']; 
                   
             
                 if($ex_list_listing_type=='1' or $ex_list_floor=='' or $ex_list_floor=='0'){ 

                           $ex_list_floor_th=$ex_list_floor." fl";             

                 } 


                   $area_th=$ex_list_rai." ไร่ - ".$ex_list_ngan." งาน - ".$ex_list_wa." วา";
                   $area_en=$ex_list_rai." - ".$ex_list_ngan." - ".$ex_list_wa." ";

                   if($ex_list_sqm!=''){ $ex_list_sqm_th=$ex_list_sqm." sqm."; }
                   if($ex_list_bedroom!=''){ 
                           if($ex_list_bedroom=='0'){  $ex_list_bedroom_th="Studio";  
                           }else{  $ex_list_bedroom_th=$ex_list_bedroom."b";   }
                   }
                   if($ex_list_bathroom!=''){ $ex_list_bathroom_th=$ex_list_bathroom."b";    }
                   if($ex_list_floor!=''){ $ex_list_floor=$ex_list_floor." "; }
                   if($ex_list_total_floors!=''){ $ex_list_total_floors_th=$ex_list_total_floors." ชั้น"; }



                 if($ex_list_listing_type!='12'){
                       
                           $detail_1=$ex_list_bedroom_th." ".$ex_list_bathroom_th." , ".$ex_list_floor_th." , ".$ex_list_sqm_th;

                 }else{

                 }


             $sql_calendar="SELECT * FROM dbo_subdeal_calendar where subdeal_code='$subdeal_code' and s_calendar_status='6' order by s_calendar_create DESC ";  
             $result_calendar= $conn->query($sql_calendar);
             $rs_calendar=$result_calendar->fetch_assoc(); 

             $s_calendar_date=$rs_calendar['s_calendar_date'];
             $s_calendar_time_start=$rs_calendar['s_calendar_time_start'];
             $s_calendar_time_end=$rs_calendar['s_calendar_time_end'];
             $s_calendar_note=$rs_calendar['s_calendar_note'];
             $s_calendar_create=$rs_calendar['s_calendar_create'];
             
              $year=substr($s_calendar_date,0 , 4 );
              $month=substr($s_calendar_date,5 , 2 );
              $day=substr($s_calendar_date,8 , 2 );

              $s_calendar_time_start_c=substr($s_calendar_time_start,0 , 5 );
              $s_calendar_time_end_c=substr($s_calendar_time_end,0 , 5 );

              $date=$day."/".$month."/".$year." เวลา".$s_calendar_time_start_c."-".$s_calendar_time_end_c;

              $year=substr($s_calendar_create,0 , 4 );
              $month=substr($s_calendar_create,5 , 2 );
              $day=substr($s_calendar_create,8 , 2 );
              $time_s=substr($s_calendar_create,11 , 8 );

              $s_calendar_create=$day."/".$month."/".$year." เวลา : ".$time_s;

          ?>
  


              <div class="modal fade" id="modal-closelost<?php echo $i;?>">
                <div class="modal-dialog">
                  <div class="modal-content bg-danger">
                    <div class="modal-header">
                      <h4 class="modal-title">ดำเนินการยกเลิกSub Deal : <?php echo $ex_list_listing_code;?></h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
    

                 <form method="post" id="form" class="form-horizontal" enctype="multipart/form-data" action="include/process.php" >

                  <input type="text" class="form-control" name="page"  value="create_subdeal" hidden="hidden">
                  <input type="text" class="form-control" name="user_id"  value="<?php echo $USER_ID;?>" hidden="hidden" >
                  <input type="text" class="form-control" name="p_check"  value="9" hidden="hidden" > 
                  <input type="text" class="form-control" name="id"  value="<?php echo $subdeal_code;?>" hidden="hidden">
                  <input type="text" class="form-control" name="code"  value="<?php echo $code;?>" hidden="hidden">
                  <input type="text" class="form-control" name="listing_code"  value="<?php echo $ex_list_listing_code;?>" hidden="hidden">

                  <input type="text" class="form-control" name="s_calendar_date"  value="<?php echo $todate;?>" hidden="hidden">
                  <input type="text" class="form-control" name="s_calendar_time_start"  value="<?php echo $time_s;?>" hidden="hidden"> 
                  <input type="text" class="form-control" name="s_calendar_time_end"  value="<?php echo $time_e;?>" hidden="hidden">  

                    <div class="row" style="font-size: 14px; " >
          
                       <div class="col-md-12" > 
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Remark : </label>
                            <div class="col-sm-12"> 
                              <textarea class="form-control" rows="5" placeholder="Enter ..." id="s_calendar_note" name="s_calendar_note" required=""></textarea>
                            </div>
                          </div> 
                       </div>
 
                      <div class="col-12" >                       
                    
                           <center>
                               <input type="submit" class="btn btn-warning" value="ใช่">
                               <button type="button" class="btn btn-default" data-dismiss="modal">ไม่ใช่</button>
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


              <div class="modal fade" id="modal-calendar<?php echo $i;?>">
                <div class="modal-dialog">
                  <div class="modal-content"  >
                    <div class="modal-header">
                      <h4 class="modal-title">แนบภาพถ่ายหลังโอนเสร็จ <?php echo $ex_list_listing_code;?></h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
    
                               <form method="post" id="form" class="form-horizontal" enctype="multipart/form-data" action="include/process.php" >

                                <input type="text" class="form-control" name="page"  value="create_subdeal" hidden="hidden">
                                <input type="text" class="form-control" name="user_id"  value="<?php echo $USER_ID;?>" hidden="hidden" >
                                <input type="text" class="form-control" name="p_check"  value="8" hidden="hidden" > 
                                <input type="text" class="form-control" name="id"  value="<?php echo $subdeal_code;?>" hidden="hidden">
                                <input type="text" class="form-control" name="code"  value="<?php echo $code;?>" hidden="hidden">
                                <input type="text" class="form-control" name="listing_code"  value="<?php echo $ex_list_listing_code;?>" hidden="hidden">

                                <input type="text" class="form-control" name="s_calendar_date"  value="<?php echo $todate;?>" hidden="hidden">
                                <input type="text" class="form-control" name="s_calendar_time_start"  value="<?php echo $time_s;?>" hidden="hidden"> 
                                <input type="text" class="form-control" name="s_calendar_time_end"  value="<?php echo $time_e;?>" hidden="hidden">                      

                                  <div class="row" style="font-size: 12px;  "    >

                                    <div class="col-md-12"> 

                                        <h5 style="text-align: center;font-size: 18px;"  ><b>แนบภาพถ่ายหลังโอนเสร็จ</b></h5>

                                         <div class="form-group row">
                                          <label for="inputEmail4" class="col-sm-3 col-form-label">แนบไฟล์ : </label>
                                          <div class="col-sm-9"> 
                                            <input type="file"  id="exampleInputFile" name="s_calendar_file" required="">

                                          </div> 
                                        </div> 
                                    </div> 
  

                                      <div class="col-md-12"> 
                              
                                           <div class="form-group row">
                                            <label for="inputEmail4" class="col-sm-3 col-form-label">เลือกวันที่โอนกรรมสิทธิ์ : </label>
                                            <div class="col-sm-9"> 
                                              <div class="input-group date" id="reservationdate<?php echo $i;?>" data-target-input="nearest">
                                                  <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate<?php echo $i;?>" name="s_calendar_date"  placeholder=""  data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask />
                                                  <div class="input-group-append" data-target="#reservationdate<?php echo $i;?>" data-toggle="datetimepicker">
                                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                  </div>
                                              </div>

                                            </div> 
                                          </div> 
                                      </div> 
               
                                     <div class="col-md-12" > 
                                        <div class="form-group row">
                                          <label for="inputEmail3" class="col-sm-12 col-form-label">Remark : </label>
                                          <div class="col-sm-12"> 
                                            <textarea class="form-control" rows="5" placeholder="Enter ..." id="s_calendar_note" name="s_calendar_note" ></textarea>
                                          </div>
                                        </div> 
                                     </div>

                                      <div class="col-12" >
                                       
                                    
                                           <center>
                                               <input type="submit" class="btn btn-warning" value="ใช่">
                                               <button type="button" class="btn btn-default" data-dismiss="modal">ไม่ใช่</button>
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

              <div class="modal fade" id="modal-edit<?php echo $i;?>">
                <div class="modal-dialog">
                  <div class="modal-content"  >
                    <div class="modal-header">
                      <h4 class="modal-title">Note นัดโอน <?php echo $ex_list_listing_code;?></h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
    
                            <form method="post" id="form" class="form-horizontal" enctype="multipart/form-data" action="include/process.php" >
     
     
                                     <input type="text" class="form-control" name="page"  value="create_subdeal" hidden="hidden">
                                    <input type="text" class="form-control" name="user_id"  value="<?php echo $USER_ID;?>" hidden="hidden" >
                                    <input type="text" class="form-control" name="p_check"  value="6" hidden="hidden" > 
                                    <input type="text" class="form-control" name="id"  value="<?php echo $subdeal_code;?>" hidden="hidden">
                                    <input type="text" class="form-control" name="code"  value="<?php echo $code;?>" hidden="hidden">
                                    <input type="text" class="form-control" name="listing_code"  value="<?php echo $ex_list_listing_code;?>" hidden="hidden">
                                    <input type="text" class="form-control" name="edit"  value="edit" hidden="hidden">

                                  <div class="row" style="font-size: 14px;  "    >

                                    <div class="col-md-12"> 
                                        <h4 style="text-align: center;font-size: 18px;"><b>เลือกวันที่เพื่อนัดโอน</b></h4>
                                         <div class="form-group row">
                                          <label for="inputEmail4" class="col-sm-3 col-form-label">ลงวันที่ : </label>
                                          <div class="col-sm-9"> 
                                            <div class="input-group date" id="reservationdate<?php echo $i;?>" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate<?php echo $i;?>" name="s_calendar_date"  placeholder=""  data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask value="<?php echo $date;?>" required="" />
                                                <div class="input-group-append" data-target="#reservationdate<?php echo $i;?>" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>

                                          </div> 
                                        </div> 
                                    </div> 
                                    <div class="col-md-12"> 
                                       <div class="form-group row">
                                          <label for="inputEmail4" class="col-sm-3 col-form-label">เวลาเริ่มต้น : </label>
                                          <div class="col-sm-9"> 

                                              <select class="form-control select2bs4"  name="s_calendar_time_start"  id="s_calendar_time_start<?php echo $i;?>"  style="width: 100%;" required=""> 
                                                <option value="">เลือกเวลา</option>       
                                 <?php 
                                          $sql_time="SELECT * FROM type_time order by time_id  ASC ";  

                                          $result_time= $conn->query($sql_time);
                                          while($rs_time=$result_time->fetch_assoc()) {   
                                             
                                             $time_time=$rs_time['time_time']; 

                                        ?>
                                                <option value="<?php echo $time_time;?>" <?php if($time_time==$s_calendar_time_start){?> selected="selected"  <?php }?>  ><?php echo $time_time;?></option>  

                                 <?php    } ?>   
                                              </select> 

                                          </div> 
                                        </div> 

                                     </div>

                                    <div class="col-md-12"> 
                                       <div class="form-group row">
                                          <label for="inputEmail4" class="col-sm-3 col-form-label">เวลาสิ้นสุด : </label>
                                          <div class="col-sm-9"> 

                                              <select class="form-control select2bs4"  name="s_calendar_time_end"  id="s_calendar_time_end<?php echo $i;?>"  style="width: 100%;" > 
                                                <option value="">เลือกเวลา</option>       
                                 <?php 
                                          $sql_time="SELECT * FROM type_time order by time_id  ASC ";  

                                          $result_time= $conn->query($sql_time);
                                          while($rs_time=$result_time->fetch_assoc()) {   
                                             
                                             $time_time=$rs_time['time_time']; 

                                        ?>
                                                <option value="<?php echo $time_time;?>" <?php if($time_time==$s_calendar_time_end){?> selected="selected"  <?php }?> ><?php echo $time_time;?></option>  

                                 <?php    } ?>   
                                              </select> 

                                          </div> 
                                        </div> 

                                     </div>

                                     <div class="col-md-12" > 
                                        <div class="form-group row">
                                          <label for="inputEmail3" class="col-sm-12 col-form-label">Remark : </label>
                                          <div class="col-sm-12"> 
                                            <textarea class="form-control" rows="4" placeholder="Enter ..." id="s_calendar_note" name="s_calendar_note"><?php echo $s_calendar_note;?></textarea>
                                          </div>
                                        </div> 
                                     </div>

                                    <div class="col-12" >
                                     
                                  
                                           <center>
                                               <input type="submit" class="btn btn-warning" value="ใช่">
                                               <button type="button" class="btn btn-default" data-dismiss="modal">ไม่ใช่</button>
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

              <div class="modal fade" id="modal-calendar<?php echo $i;?>">
                <div class="modal-dialog">
                  <div class="modal-content"  >
                    <div class="modal-header">
                      <h4 class="modal-title">Close WON <?php echo $ex_list_listing_code;?></h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
    
                               <form method="post" id="form" class="form-horizontal" enctype="multipart/form-data" action="include/process.php" >


                                <input type="text" class="form-control" name="page"  value="create_subdeal" hidden="hidden">
                                <input type="text" class="form-control" name="user_id"  value="<?php echo $USER_ID;?>" hidden="hidden" >
                                <input type="text" class="form-control" name="p_check"  value="8" hidden="hidden" > 
                                <input type="text" class="form-control" name="id"  value="<?php echo $subdeal_code;?>" hidden="hidden">
                                <input type="text" class="form-control" name="code"  value="<?php echo $code;?>" hidden="hidden">
                                <input type="text" class="form-control" name="listing_code"  value="<?php echo $ex_list_listing_code;?>" hidden="hidden">

                                <input type="text" class="form-control" name="s_calendar_date"  value="<?php echo $todate;?>" hidden="hidden">
                                <input type="text" class="form-control" name="s_calendar_time_start"  value="<?php echo $time_s;?>" hidden="hidden"> 
                                <input type="text" class="form-control" name="s_calendar_time_end"  value="<?php echo $time_e;?>" hidden="hidden">  

                                    <div class="row" style="font-size: 12px;  "    >

                 
                                       <div class="col-md-12" > 
                                          <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Remark : </label>
                                            <div class="col-sm-12"> 
                                              <textarea class="form-control" rows="5" placeholder="Enter ..." id="s_calendar_note" name="s_calendar_note"></textarea>
                                            </div>
                                          </div> 
                                       </div>

                                      <div class="col-12" >
                                       
                                           <center>
                                               <input type="submit" class="btn btn-warning" value="ใช่">
                                               <button type="button" class="btn btn-default" data-dismiss="modal">ไม่ใช่</button>
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
              

                                      <!-- DIRECT CHAT SUCCESS -->
            <div class="card card-success card-outline direct-chat direct-chat-success collapsed-card" style="margin:5px;  font-size: 14px;  ">
              <div class="card-header">

                <table style="width: 100%;">
                 <tr>
                    <td>  <?php  echo $project_name;?> <br>  </td>
                    <td style="width: 97px;">

              <?php if($contact_deal_win!='8' and $contact_deal_win!='9'){ //ยังไม่ close lot won  ?> 
                          <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-calendar<?php echo $i;?>" title="นัดเซ็นต์สัญญา">
                            <i class="fa fa-arrow-right"></i>
                          </button>                  
                          <button type="button" class="btn btn-tool" title="แก้ไขข้อมูล" data-toggle="modal" data-target="#modal-edit<?php echo $i;?>" >
                            <i class="fa fa-clock-o"></i>
                          </button>  
                          <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-closelost<?php echo $i;?>" title="ยกเลิกดีล">
                            <i class="fas fa-times"></i>
                          </button> 
              <?php } ?>

                    </td>
                  </tr>
                </table> 

                             <a href="?page=upload_file_excel_check_view&listing=<?php echo $ex_list_listing_code;?>&deal=view" target="_black" >
                             <?php echo $ex_list_listing_code;?></a> <?php echo $detail_1;?> <br>
                             <?php echo number_format($ex_list_price)." Baht";?><br>
                              Status : <b style="width:80px;color: <?php echo $stauts_list_color;?>;"><a onclick="window.open('page/listing_status.php?id=<?php echo $ex_list_listing_code;?>', '_blank', 'location=yes,height=650,width=520,scrollbars=yes,status=yes');"style="cursor:pointer;"   > 
                                <?php echo $ex_list_listing_status.$expire_check;  ?>
                                <?php if($ex_list_listing_status_check=='3' or $ex_list_listing_status_check=='15'){ ?> <?php echo $ex_list_rent_till; } ?>
                               </a> </b>
                            <hr>                        
                             <?php if($s_calendar_note!=''){ echo $s_calendar_note."<br>"; } ?> 
                             <?php echo "วันที่นัดโอน : ".$date;?><br>                         
                     <div class="row" style="font-size: 12px;  ">
                          <div class="col-md-8"> 
                              <i class="fa fa-clock-o"></i> <?php echo $s_calendar_create;?>
                          </div>
                          <div class="col-md-4" style="text-align: right;"> 
                              <?php echo $register_nickname;?>
                          </div>
                     </div>


              </div>
              <!-- /.card-header -->
              <div class="card-body" >
                <!-- Conversations are loaded here -->
           

                <!-- Contacts are loaded here -->
                <div class="direct-chat-contacts" style="height: 300px;">
                  <ul class="contacts-list" >
                    <li >
  
                    </li>
                    <!-- End Contact Item -->
                  </ul>
                  <!-- /.contatcts-list -->
                </div>
                <!-- /.direct-chat-pane -->
              </div>
              <!-- /.card-body -->
              
              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->
                  
            <?php }  ?>



          </div>
 


        </div>

<?php } ?>

        <div class="card card-row card-success" style="width: <?php echo $size_w;?>;">
          <div class="card-header" style="background-color: #806000;">
            <h3 class="card-title" >
              Close Won
            </h3>
          </div>
          <div class="card-body" style="height: auto;">
 

               <?php
                $sql_subdeal="SELECT subdeal.ex_list_listing_code, subdeal.subdeal_code , subdeal.color , subdeal.user_id  FROM dbo_subdeal AS subdeal 
                            WHERE subdeal.create_deal_code='$code' and subdeal.subdeal_status='8'
                            order by subdeal.subdeal_create_date DESC  ";  

              $result_subdeal= $conn->query($sql_subdeal);
              while($rs_subdeal=$result_subdeal->fetch_assoc()) {   $i++;

                   $ex_list_listing_code=$rs_subdeal['ex_list_listing_code']; 
                   $subdeal_code=$rs_subdeal['subdeal_code'];
                   $color=$rs_subdeal['color'];
                   $user_id=$rs_subdeal['user_id'];
   

                    $sql_register="SELECT register_nickname FROM dbo_register
                                 WHERE  register_id='$user_id'  LIMIT 1 ";   
                    $result_register= $conn->query($sql_register);
                    $rs_register=$result_register->fetch_assoc(); 
                    $register_nickname=$rs_register['register_nickname'];

                    /////////////////////////////////////////
                    $sql_listing="SELECT project_id ,ex_list_floor ,ex_list_sqm ,ex_list_view ,ex_list_bedroom ,ex_list_bathroom , 
                                        ex_list_other_room , ex_list_parking , ex_list_price ,ex_list_listing_status ,ex_list_rent_till_date , ex_list_rent_till FROM dbo_data_excel_listing
                                 WHERE  ex_list_listing_code='$ex_list_listing_code'  LIMIT 1 ";   
                    $result_listing= $conn->query($sql_listing);
                    $rs_listing=$result_listing->fetch_assoc();

                     $project_id=$rs_listing['project_id'];
                     $ex_list_floor=$rs_listing['ex_list_floor'];
                     $ex_list_sqm=$rs_listing['ex_list_sqm'];
                     $ex_list_view=$rs_listing['ex_list_view']; 
                     $ex_list_bedroom=$rs_listing['ex_list_bedroom'];
                     $ex_list_bathroom=$rs_listing['ex_list_bathroom'];
                     $ex_list_other_room=$rs_listing['ex_list_other_room'];
                     $ex_list_parking=$rs_listing['ex_list_parking'];              
                     $ex_list_price=$rs_listing['ex_list_price'];
                     $ex_list_listing_status=$rs_listing['ex_list_listing_status'];
                     $ex_list_rent_till_date=$rs_listing['ex_list_rent_till_date'];
                     $ex_list_listing_status_check=$rs_listing['ex_list_listing_status'];
                     $ex_list_rent_till=$rs_listing['ex_list_rent_till'];

                     if($ex_list_listing_status=='' or $ex_list_listing_status=='0'){ $ex_list_listing_status="No Status"; $stauts_list_color="#000"; $expire_check=''; }
                     else if($ex_list_listing_status=='1'){ $ex_list_listing_status="Available"; $stauts_list_color="#42d700"; $expire_check='';}
                     else if($ex_list_listing_status=='2'){ $ex_list_listing_status="Contracted ไม่ล็อคสิทธิ"; $stauts_list_color="#42d700"; $expire_check='';}
                     else if($ex_list_listing_status=='3'){ $ex_list_listing_status="Rented";  $ex_list_rent_till=$ex_list_rent_till; 
                                                      //เช็ควันหมดอายุ
                                                     if($ex_list_rent_till_date<=$calExpireDate){ $stauts_list_color="#ffa200"; $expire_check=' <span class="right badge badge-danger">New</span>';  
                                                      }else{  $stauts_list_color="#ff0000";  $expire_check=''; }  
                                                               
                                                     }
                     else if($ex_list_listing_status=='4'){ $ex_list_listing_status="Sold(by Connex)";  $stauts_list_color="#ff0000"; $expire_check='';}
                     else if($ex_list_listing_status=='5'){ $ex_list_listing_status="Sold(by Others)"; $stauts_list_color="#ff0000"; $expire_check='';}
                     else if($ex_list_listing_status=='6'){ $ex_list_listing_status="own use"; $stauts_list_color="#ff0000"; $expire_check='';}
                     else if($ex_list_listing_status=='7'){ $ex_list_listing_status="unknown"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='8'){ $ex_list_listing_status="ไม่รับสาย"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='9'){ $ex_list_listing_status="ไม่สะดวกคุย"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='10'){ $ex_list_listing_status="ปิดเครื่อง"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='11'){ $ex_list_listing_status="สายไม่ว่าง"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='12'){ $ex_list_listing_status="เบอร์ผิด"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='13'){ $ex_list_listing_status="ไม่รับ agent"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='14'){ $ex_list_listing_status="ยังไม่ปล่อยขาย/เช่า"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='15'){ $ex_list_listing_status="Under Renovation";  $ex_list_rent_till=$ex_list_rent_till; 
                                          //เช็ควันหมดอายุ
                                         if($ex_list_rent_till_date<=$calExpireDate){ $stauts_list_color="#ffa200"; $expire_check=' <span class="right badge badge-danger">New</span>';  
                                          }else{  $stauts_list_color="#ff0000";  $expire_check=''; } 

                                                   
                                         }
                   /////////////////////////////////////////

                    $sql_project="SELECT project_type , project_name_en FROM type_project WHERE  project_id='$project_id'  LIMIT 1 ";   
                    $result_project= $conn->query($sql_project);
                    $rs_project=$result_project->fetch_assoc();

                     $project_type=$rs_project['project_type'];
                     $project_name=$rs_project['project_name_en']; 
                   
             
                 if($ex_list_listing_type=='1' or $ex_list_floor=='' or $ex_list_floor=='0'){ 

                           $ex_list_floor_th=$ex_list_floor." fl";             

                 } 


                   $area_th=$ex_list_rai." ไร่ - ".$ex_list_ngan." งาน - ".$ex_list_wa." วา";
                   $area_en=$ex_list_rai." - ".$ex_list_ngan." - ".$ex_list_wa." ";

                   if($ex_list_sqm!=''){ $ex_list_sqm_th=$ex_list_sqm." sqm."; }
                   if($ex_list_bedroom!=''){ 
                           if($ex_list_bedroom=='0'){  $ex_list_bedroom_th="Studio";  
                           }else{  $ex_list_bedroom_th=$ex_list_bedroom."b";   }
                   }
                   if($ex_list_bathroom!=''){ $ex_list_bathroom_th=$ex_list_bathroom."b";    }
                   if($ex_list_floor!=''){ $ex_list_floor=$ex_list_floor." "; }
                   if($ex_list_total_floors!=''){ $ex_list_total_floors_th=$ex_list_total_floors." ชั้น"; }



                 if($ex_list_listing_type!='12'){
                       
                           $detail_1=$ex_list_bedroom_th." ".$ex_list_bathroom_th." , ".$ex_list_floor_th." , ".$ex_list_sqm_th;

                 }else{

                 }


             $sql_calendar="SELECT * FROM dbo_subdeal_calendar where subdeal_code='$subdeal_code' and s_calendar_status='8' order by s_calendar_create DESC ";  
             $result_calendar= $conn->query($sql_calendar);
             $rs_calendar=$result_calendar->fetch_assoc(); 

             $s_calendar_date=$rs_calendar['s_calendar_date'];
             $s_calendar_time_start=$rs_calendar['s_calendar_time_start'];
             $s_calendar_time_end=$rs_calendar['s_calendar_time_end'];
             $s_calendar_note=$rs_calendar['s_calendar_note'];
             $s_calendar_create=$rs_calendar['s_calendar_create'];
             
              $year=substr($s_calendar_date,0 , 4 );
              $month=substr($s_calendar_date,5 , 2 );
              $day=substr($s_calendar_date,8 , 2 );

              $s_calendar_time_start_c=substr($s_calendar_time_start,0 , 5 );
              $s_calendar_time_end_c=substr($s_calendar_time_end,0 , 5 );

              $date=$day."/".$month."/".$year." เวลา".$s_calendar_time_start_c."-".$s_calendar_time_end_c;

              $year=substr($s_calendar_create,0 , 4 );
              $month=substr($s_calendar_create,5 , 2 );
              $day=substr($s_calendar_create,8 , 2 );
              $time_s=substr($s_calendar_create,11 , 8 );

              $s_calendar_create=$day."/".$month."/".$year." เวลา : ".$time_s;

          ?>
  


                                      <!-- DIRECT CHAT SUCCESS -->
            <div class="card card-success card-outline direct-chat direct-chat-success collapsed-card" style="margin:5px; font-size: 14px;  ">
              <div class="card-header">


                <table style="width: 100%;">
                 <tr>
                    <td>  <?php  echo $project_name;?> <br>  </td>
                    <td style="width: 97px;">
                    <!--
                          <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-calendar<?php echo $i;?>" title="นัดเซ็นสัญญา">
                            <i class="fa fa-arrow-right"></i>
                          </button>                  
                          <button type="button" class="btn btn-tool" title="แก้ไขข้อมูล" data-toggle="modal" data-target="#modal-edit<?php echo $i;?>" >
                            <i class="fas fa-sticky-note"></i>
                          </button>  
                          <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-closelost<?php echo $i;?>" title="ยกเลิกดีล">
                            <i class="fas fa-times"></i>
                          </button> -->
                       

                    </td>
                  </tr>
                </table> 

                             <a href="?page=upload_file_excel_check_view&listing=<?php echo $ex_list_listing_code;?>&deal=view" target="_black" >
                             <?php echo $ex_list_listing_code;?></a> <?php echo $detail_1;?> <br>
                             <?php echo number_format($ex_list_price)." Baht";?><br>
                              Status : <b style="width:80px;color: <?php echo $stauts_list_color;?>;"><a onclick="window.open('page/listing_status.php?id=<?php echo $ex_list_listing_code;?>', '_blank', 'location=yes,height=650,width=520,scrollbars=yes,status=yes');"style="cursor:pointer;"   > 
                                <?php echo $ex_list_listing_status.$expire_check;  ?>
                                <?php if($ex_list_listing_status_check=='3' or $ex_list_listing_status_check=='15'){ ?> <?php echo $ex_list_rent_till; } ?>
                               </a> </b>
                             <hr>                        
                             <?php if($s_calendar_note!=''){ echo $s_calendar_note."<br>"; } ?>                                    
                     <div class="row" style="font-size: 12px;  ">
                          <div class="col-md-8"> 
                              <i class="fa fa-clock-o"></i> <?php echo $s_calendar_create;?>
                          </div>
                          <div class="col-md-4" style="text-align: right;"> 
                              <?php echo $register_nickname;?>
                          </div>
                     </div>

              </div>
              <!-- /.card-header -->
              <div class="card-body" >
           
              </div>
              <!-- /.card-body -->
              
              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->
                  
            <?php }  ?>


          </div>

          <div class="card-header" style="background-color: #806000;">
            <h3 class="card-title" >
              Close Lost
            </h3>
          </div>
          <div class="card-body" style="height: auto;">
           

               <?php
                $sql_subdeal="SELECT subdeal.ex_list_listing_code, subdeal.subdeal_code , subdeal.color , subdeal.user_id  FROM dbo_subdeal AS subdeal 
                            WHERE subdeal.create_deal_code='$code' and subdeal.subdeal_status='9'
                            order by subdeal.subdeal_create_date DESC  ";  

              $result_subdeal= $conn->query($sql_subdeal);
              while($rs_subdeal=$result_subdeal->fetch_assoc()) {   $i++;

                   $ex_list_listing_code=$rs_subdeal['ex_list_listing_code']; 
                   $subdeal_code=$rs_subdeal['subdeal_code'];
                   $color=$rs_subdeal['color'];
                   $user_id=$rs_subdeal['user_id'];
   

                    $sql_register="SELECT register_nickname FROM dbo_register
                                 WHERE  register_id='$user_id'  LIMIT 1 ";   
                    $result_register= $conn->query($sql_register);
                    $rs_register=$result_register->fetch_assoc(); 
                    $register_nickname=$rs_register['register_nickname'];

                    /////////////////////////////////////////
                    $sql_listing="SELECT project_id ,ex_list_floor ,ex_list_sqm ,ex_list_view ,ex_list_bedroom ,ex_list_bathroom , 
                                        ex_list_other_room , ex_list_parking , ex_list_price ,ex_list_listing_status , ex_list_rent_till_date , ex_list_rent_till FROM dbo_data_excel_listing
                                 WHERE  ex_list_listing_code='$ex_list_listing_code'  LIMIT 1 ";   
                    $result_listing= $conn->query($sql_listing);
                    $rs_listing=$result_listing->fetch_assoc();

                     $project_id=$rs_listing['project_id'];
                     $ex_list_floor=$rs_listing['ex_list_floor'];
                     $ex_list_sqm=$rs_listing['ex_list_sqm'];
                     $ex_list_view=$rs_listing['ex_list_view']; 
                     $ex_list_bedroom=$rs_listing['ex_list_bedroom'];
                     $ex_list_bathroom=$rs_listing['ex_list_bathroom'];
                     $ex_list_other_room=$rs_listing['ex_list_other_room'];
                     $ex_list_parking=$rs_listing['ex_list_parking'];              
                     $ex_list_price=$rs_listing['ex_list_price']; 
                     $ex_list_listing_status=$rs_listing['ex_list_listing_status'];
                     $ex_list_rent_till_date=$rs_listing['ex_list_rent_till_date'];
                     $ex_list_listing_status_check=$rs_listing['ex_list_listing_status'];
                     $ex_list_rent_till=$rs_listing['ex_list_rent_till'];

                     if($ex_list_listing_status=='' or $ex_list_listing_status=='0'){ $ex_list_listing_status="No Status"; $stauts_list_color="#000"; $expire_check=''; }
                     else if($ex_list_listing_status=='1'){ $ex_list_listing_status="Available"; $stauts_list_color="#42d700"; $expire_check='';}
                     else if($ex_list_listing_status=='2'){ $ex_list_listing_status="Contracted ไม่ล็อคสิทธิ"; $stauts_list_color="#42d700"; $expire_check='';}
                     else if($ex_list_listing_status=='3'){ $ex_list_listing_status="Rented";  $ex_list_rent_till=$ex_list_rent_till; 
                                                      //เช็ควันหมดอายุ
                                                     if($ex_list_rent_till_date<=$calExpireDate){ $stauts_list_color="#ffa200"; $expire_check=' <span class="right badge badge-danger">New</span>';  
                                                      }else{  $stauts_list_color="#ff0000";  $expire_check=''; }  
                                                               
                                                     }
                     else if($ex_list_listing_status=='4'){ $ex_list_listing_status="Sold(by Connex)";  $stauts_list_color="#ff0000"; $expire_check='';}
                     else if($ex_list_listing_status=='5'){ $ex_list_listing_status="Sold(by Others)"; $stauts_list_color="#ff0000"; $expire_check='';}
                     else if($ex_list_listing_status=='6'){ $ex_list_listing_status="own use"; $stauts_list_color="#ff0000"; $expire_check='';}
                     else if($ex_list_listing_status=='7'){ $ex_list_listing_status="unknown"; $stauts_list_color="#000cff"; $expire_check=''; }
                     else if($ex_list_listing_status=='8'){ $ex_list_listing_status="ไม่รับสาย"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='9'){ $ex_list_listing_status="ไม่สะดวกคุย"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='10'){ $ex_list_listing_status="ปิดเครื่อง"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='11'){ $ex_list_listing_status="สายไม่ว่าง"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='12'){ $ex_list_listing_status="เบอร์ผิด"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='13'){ $ex_list_listing_status="ไม่รับ agent"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='14'){ $ex_list_listing_status="ยังไม่ปล่อยขาย/เช่า"; $stauts_list_color="#000cff"; $expire_check='';}
                     else if($ex_list_listing_status=='15'){ $ex_list_listing_status="Under Renovation";  $ex_list_rent_till=$ex_list_rent_till; 
                                          //เช็ควันหมดอายุ
                                         if($ex_list_rent_till_date<=$calExpireDate){ $stauts_list_color="#ffa200"; $expire_check=' <span class="right badge badge-danger">New</span>';  
                                          }else{  $stauts_list_color="#ff0000";  $expire_check=''; } 

                                                   
                                         }
                   /////////////////////////////////////////

                    $sql_project="SELECT project_type , project_name_en FROM type_project WHERE  project_id='$project_id'  LIMIT 1 ";   
                    $result_project= $conn->query($sql_project);
                    $rs_project=$result_project->fetch_assoc();

                     $project_type=$rs_project['project_type'];
                     $project_name=$rs_project['project_name_en']; 
                   
             
                 if($ex_list_listing_type=='1' or $ex_list_floor=='' or $ex_list_floor=='0'){ 

                           $ex_list_floor_th=$ex_list_floor." fl";             

                 } 


                   $area_th=$ex_list_rai." ไร่ - ".$ex_list_ngan." งาน - ".$ex_list_wa." วา";
                   $area_en=$ex_list_rai." - ".$ex_list_ngan." - ".$ex_list_wa." ";

                   if($ex_list_sqm!=''){ $ex_list_sqm_th=$ex_list_sqm." sqm."; }
                   if($ex_list_bedroom!=''){ 
                           if($ex_list_bedroom=='0'){  $ex_list_bedroom_th="Studio";  
                           }else{  $ex_list_bedroom_th=$ex_list_bedroom."b";   }
                   }
                   if($ex_list_bathroom!=''){ $ex_list_bathroom_th=$ex_list_bathroom."b";    }
                   if($ex_list_floor!=''){ $ex_list_floor=$ex_list_floor." "; }
                   if($ex_list_total_floors!=''){ $ex_list_total_floors_th=$ex_list_total_floors." ชั้น"; }



                 if($ex_list_listing_type!='12'){
                       
                           $detail_1=$ex_list_bedroom_th." ".$ex_list_bathroom_th." , ".$ex_list_floor_th." , ".$ex_list_sqm_th;

                 }else{

                 }


             $sql_calendar="SELECT * FROM dbo_subdeal_calendar where subdeal_code='$subdeal_code' and s_calendar_status='9' order by s_calendar_create DESC ";  
             $result_calendar= $conn->query($sql_calendar);
             $rs_calendar=$result_calendar->fetch_assoc(); 

             $s_calendar_date=$rs_calendar['s_calendar_date'];
             $s_calendar_time_start=$rs_calendar['s_calendar_time_start'];
             $s_calendar_time_end=$rs_calendar['s_calendar_time_end'];
             $s_calendar_note=$rs_calendar['s_calendar_note'];
             $s_calendar_create=$rs_calendar['s_calendar_create'];
             
              $year=substr($s_calendar_date,0 , 4 );
              $month=substr($s_calendar_date,5 , 2 );
              $day=substr($s_calendar_date,8 , 2 );

              $s_calendar_time_start_c=substr($s_calendar_time_start,0 , 5 );
              $s_calendar_time_end_c=substr($s_calendar_time_end,0 , 5 );

              $date=$day."/".$month."/".$year." เวลา".$s_calendar_time_start_c."-".$s_calendar_time_end_c;

              $year=substr($s_calendar_create,0 , 4 );
              $month=substr($s_calendar_create,5 , 2 );
              $day=substr($s_calendar_create,8 , 2 );
              $time_s=substr($s_calendar_create,11 , 8 );

              $s_calendar_create=$day."/".$month."/".$year." เวลา : ".$time_s;

          ?>
  

              <div class="modal fade" id="modal-edit<?php echo $i;?>">
                <div class="modal-dialog">
                  <div class="modal-content"  >
                    <div class="modal-header">
                      <h4 class="modal-title">Note เสนอห้องอีกครั้ง <?php echo $ex_list_listing_code;?></h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
    
                            <form method="post" id="form" class="form-horizontal" enctype="multipart/form-data" action="include/process.php" >
     
                                     <input type="text" class="form-control" name="page"  value="create_subdeal" hidden="hidden">
                                    <input type="text" class="form-control" name="user_id"  value="<?php echo $USER_ID;?>" hidden="hidden" >
                                    <input type="text" class="form-control" name="p_check"  value="1" hidden="hidden" > 
                                    <input type="text" class="form-control" name="id"  value="<?php echo $subdeal_code;?>" hidden="hidden">
                                    <input type="text" class="form-control" name="code"  value="<?php echo $code;?>" hidden="hidden">
                                    <input type="text" class="form-control" name="listing_code"  value="<?php echo $ex_list_listing_code;?>" hidden="hidden">
                                    <input type="text" class="form-control" name="edit"  value="re_close" hidden="hidden">

                                  <div class="row" style="font-size: 14px;  "    >

          
                                     <div class="col-md-12" > 
                                        <div class="form-group row">
                                          <label for="inputEmail3" class="col-sm-12 col-form-label">Remark : </label>
                                          <div class="col-sm-12"> 
                                            <textarea class="form-control" rows="4" placeholder="Enter ..." id="s_calendar_note" name="s_calendar_note" required=""></textarea>
                                          </div>
                                        </div> 
                                     </div>

                                    <div class="col-12" >
                                     
                                  
                                           <center>
                                               <input type="submit" class="btn btn-warning" value="ใช่">
                                               <button type="button" class="btn btn-default" data-dismiss="modal">ไม่ใช่</button>
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


                                      <!-- DIRECT CHAT SUCCESS -->
            <div class="card card-success card-outline direct-chat direct-chat-success collapsed-card" style="margin:5px;  font-size: 14px; ">
              <div class="card-header">


                <table style="width: 100%;">
                 <tr>
                    <td>  <?php  echo $project_name;?> <br>  </td>
                    <td style="width: 97px; text-align: right;">

              <?php if($contact_deal_win!='8' and $contact_deal_win!='9'){ //ยังไม่ close lot won  ?> 
                          <button type="button" class="btn btn-tool" title="ยกเลิก close lot เพื่อนำไปเสนอห้องใหม่" data-toggle="modal" data-target="#modal-edit<?php echo $i;?>" >
                            <i class="fas fa-history"></i>
                          </button>  
              <?php } ?>                       

                    </td>
                  </tr>
                </table> 

                             <a href="?page=upload_file_excel_check_view&listing=<?php echo $ex_list_listing_code;?>&deal=view" target="_black" >
                             <?php echo $ex_list_listing_code;?></a> <?php echo $detail_1;?> <br>
                             <?php echo number_format($ex_list_price)." Baht";?><br>
                              Status : <b style="width:80px;color: <?php echo $stauts_list_color;?>;"><a onclick="window.open('page/listing_status.php?id=<?php echo $ex_list_listing_code;?>', '_blank', 'location=yes,height=650,width=520,scrollbars=yes,status=yes');"style="cursor:pointer;"   > 
                                <?php echo $ex_list_listing_status.$expire_check;  ?>
                                <?php if($ex_list_listing_status_check=='3' or $ex_list_listing_status_check=='15'){ ?> <?php echo $ex_list_rent_till; } ?>
                               </a> </b>
                             <hr>                        
                             <?php if($s_calendar_note!=''){ echo $s_calendar_note."<br>"; } ?>                             
                     <div class="row" style="font-size: 12px;  ">
                          <div class="col-md-8"> 
                              <i class="fa fa-clock-o"></i> <?php echo $s_calendar_create;?>
                          </div>
                          <div class="col-md-4" style="text-align: right;"> 
                              <?php echo $register_nickname;?>
                          </div>
                     </div>

              </div>
              <!-- /.card-header -->
              <div class="card-body" >
           
              </div>
              <!-- /.card-body -->
              
              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->
                  
            <?php }  ?>



          </div>


        </div>
      </div>
    </section>

</div>

 
                  </div>
                  <!-- /.tab-pane -->



  <?php 

                if($_SESSION['STATUS_ID']=='1'){

                      $sql_offer= "UPDATE dbo_subdeal SET  
                              check_auto_offer='1' 
                              WHERE create_deal_code='".$code."' "; 
                      mysqli_query($conn, $sql_offer);

                }


      } //END d_check=='4'  ?>
 




<!-- NOTE  -->

  <?php if($d_check=='5'){ ?> 


 <?php
 $useragent=$_SERVER['HTTP_USER_AGENT'];
if($device=='m'){

         if($create_deal_attention=='1'){ $size_w="1200px"; $size_w_h="1200px"; }else{ $size_w="1200px"; $size_w_h="1200px";} 


  }else{

         if($create_deal_attention=='1'){ $size_w="20%"; $size_w_h="100%";  }else{ $size_w="25%"; $size_w_h="100%";  } 

   }
     ?>
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper kanban" style="margin-left: 0px;  width: 100%; height: auto;">

    <section class="content "  style="width: 100%;height: auto; ">
      <div class="container-fluid h-100" style="width: <?php echo $size_w_h;?>; padding: 0px;margin: 0px;">
        <div class="card card-row " style="width: <?php echo $size_w;?>; " >
          <div class="card-header" style="background-color:#5e92c2; color: #fff; ">
            <h3 class="card-title">
              เสนอห้อง
            </h3>
          </div>
         
              <?php $i=0;

                $sql_subdeal_calendar="SELECT subdeal_code , ex_list_listing_code , s_calendar_note ,s_calendar_date ,s_calendar_time_start ,s_calendar_time_end ,s_calendar_create 
                                      FROM dbo_subdeal_calendar  WHERE  create_deal_code='$code' and s_calendar_status='1' order by s_calendar_create DESC   LIMIT 50   "; 
                $result_subdeal_calendar= $conn->query($sql_subdeal_calendar);
                while($rs_subdeal_calendar=$result_subdeal_calendar->fetch_assoc()){  $i++;

                     $subdeal_code=$rs_subdeal_calendar['subdeal_code'];
                     $ex_list_listing_code=$rs_subdeal_calendar['ex_list_listing_code'];
                     $s_calendar_note=$rs_subdeal_calendar['s_calendar_note'];
                     $s_calendar_date=$rs_subdeal_calendar['s_calendar_date']; 
                     $s_calendar_time_start=$rs_subdeal_calendar['s_calendar_time_start'];
                     $s_calendar_time_end=$rs_subdeal_calendar['s_calendar_time_end']; 
                     $s_calendar_create=$rs_subdeal_calendar['s_calendar_create']; 

                   $sql_subdeal="SELECT subdeal.ex_list_listing_code , subdeal.color  FROM dbo_subdeal AS subdeal 
                                  WHERE subdeal.subdeal_code='$subdeal_code' 
                                  order by subdeal.subdeal_create_date DESC LIMIT 1 "; 
                   $result_subdeal= $conn->query($sql_subdeal);
                   $rs_subdeal=$result_subdeal->fetch_assoc();
 
                   $color=$rs_subdeal['color'];

                    /////////////////////////////////////////
                    $sql_listing="SELECT project_id ,ex_list_floor ,ex_list_sqm ,ex_list_view ,ex_list_bedroom ,ex_list_bathroom , ex_list_total_floors
                                        ex_list_other_room , ex_list_parking , ex_list_price , ex_list_listing_type , ex_list_rai , ex_list_ngan , ex_list_wa 
                                 FROM dbo_data_excel_listing
                                 WHERE  ex_list_listing_code='$ex_list_listing_code'  LIMIT 1 ";   
                    $result_listing= $conn->query($sql_listing);
                    $rs_listing=$result_listing->fetch_assoc();

                     $project_id=$rs_listing['project_id'];
                     $ex_list_floor=$rs_listing['ex_list_floor'];
                     $ex_list_sqm=$rs_listing['ex_list_sqm'];
                     $ex_list_view=$rs_listing['ex_list_view']; 
                     $ex_list_bedroom=$rs_listing['ex_list_bedroom'];
                     $ex_list_bathroom=$rs_listing['ex_list_bathroom'];
                     $ex_list_other_room=$rs_listing['ex_list_other_room'];
                     $ex_list_parking=$rs_listing['ex_list_parking'];              
                     $ex_list_price=$rs_listing['ex_list_price'];
                     $ex_list_listing_type=$rs_listing['ex_list_listing_type'];
                     $ex_list_total_floors=$rs_listing['ex_list_total_floors'];
                     $ex_list_rai=$rs_listing['ex_list_rai'];
                     $ex_list_ngan=$rs_listing['ex_list_ngan'];
                     $ex_list_wa=$rs_listing['ex_list_wa'];

                   /////////////////////////////////////////

                    $sql_project="SELECT project_type , project_name_en FROM type_project WHERE  project_id='$project_id'  LIMIT 1 ";   
                    $result_project= $conn->query($sql_project);
                    $rs_project=$result_project->fetch_assoc();

                     $project_type=$rs_project['project_type'];
                     $project_name=$rs_project['project_name_en']; 


                   /////////////////////////////////////////

   

                 if($ex_list_listing_type=='1' or $ex_list_floor=='' or $ex_list_floor=='0'){                            
                              
                                        $ex_list_floor_th=$ex_list_floor." fl";                               
                 } 


                   $area_th=$ex_list_rai." ไร่ - ".$ex_list_ngan." งาน - ".$ex_list_wa." วา";
                   $area_en=$ex_list_rai." - ".$ex_list_ngan." - ".$ex_list_wa." ";

                   if($ex_list_sqm!=''){ $ex_list_sqm_th=$ex_list_sqm." sqm."; }
                   if($ex_list_bedroom!=''){ 
                           if($ex_list_bedroom=='0'){  $ex_list_bedroom_th="Studio";  
                           }else{  $ex_list_bedroom_th=$ex_list_bedroom."b";   }
                   }
                   if($ex_list_bathroom!=''){ $ex_list_bathroom_th=$ex_list_bathroom."b";    }
                   if($ex_list_floor!=''){ $ex_list_floor=$ex_list_floor." "; }
                   if($ex_list_total_floors!=''){ $ex_list_total_floors_th=$ex_list_total_floors." ชั้น"; }



                 if($ex_list_listing_type!='12'){
                       
                           $detail_1=$ex_list_bedroom_th." ".$ex_list_bathroom_th." , ".$ex_list_floor_th." , ".$ex_list_sqm_th;

                 }else{

                 }

              $year=substr($s_calendar_date,0 , 4 );
              $month=substr($s_calendar_date,5 , 2 );
              $day=substr($s_calendar_date,8 , 2 );

              $s_calendar_time_start_c=substr($s_calendar_time_start,0 , 5 );
              $s_calendar_time_end_c=substr($s_calendar_time_end,0 , 5 );

              $date=$day."/".$month."/".$year." เวลา : ".$s_calendar_time_start_c."-".$s_calendar_time_end_c;


              $year=substr($s_calendar_create,0 , 4 );
              $month=substr($s_calendar_create,5 , 2 );
              $day=substr($s_calendar_create,8 , 2 );
              $time_s=substr($s_calendar_create,11 , 8 );

              $s_calendar_create=$day."/".$month."/".$year." เวลา : ".$time_s;



          ?>
  


                                      <!-- DIRECT CHAT SUCCESS -->
            <div class="card card-outline direct-chat direct-chat-success collapsed-card" style="margin:5px;  font-size: 14px; background-color: <?php echo $color;?>;  ">
              <div class="card-header">
                <table style="width: 100%;">
                 <tr>
                    <td>  <?php  echo $project_name;?>    </td>
                    <td >

 
                          <!--
                          <span title="3 New Messages" class="badge bg-success">3</span>-->
                        <!--
                          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="นัดชมทรัพย์">
                            <i class="fa fa-arrow-right"></i>
                          </button> 
                       
                          <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fa fa-calendar"></i>
                          </button>
                        -->

                    </td>
                  </tr>
                </table> 

                             <a href="?page=upload_file_excel_check_view&listing=<?php echo $ex_list_listing_code;?>&deal=view" target="_black" >
                             <?php echo $ex_list_listing_code;?></a> <?php echo $detail_1;?> <br>
                             <?php echo number_format($ex_list_price)." Baht";?>
                             <hr>
                             <?php if($s_calendar_note!=''){ echo $s_calendar_note."<br>"; } ?> 
                             <i class="fa fa-clock-o"></i> <?php echo $s_calendar_create;?>

                 
              </div>
              <!-- /.card-header -->
              <div class="card-body" >
                <!-- Conversations are loaded here -->
              
                <!--/.direct-chat-messages-->

                <!-- Contacts are loaded here -->
                <div class="direct-chat-contacts" style=" ">
                  <ul class="contacts-list" >
                    <li >
 

                    </li>
                    <!-- End Contact Item -->
                  </ul>
                  <!-- /.contatcts-list -->
                </div>
                <!-- /.direct-chat-pane -->
              </div>
              <!-- /.card-body -->
              
              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->
                  
            <?php }  ?>






        </div> <!-- สร้างดีลเสนอ -->

        <div class="card card-row card-primary" style="width: <?php echo $size_w;?>;">
          <div class="card-header" style="background-color: #17a2b8;">
            <h3 class="card-title">
              นัดชมทรัพย์
            </h3>
          </div>
    
 
              <?php  $i=10;

                $sql_subdeal_calendar="SELECT subdeal_code , ex_list_listing_code , s_calendar_note ,s_calendar_date ,s_calendar_time_start ,s_calendar_time_end ,
                                              s_calendar_create ,s_calendar_chance
                                      FROM dbo_subdeal_calendar  WHERE  create_deal_code='$code' and s_calendar_status='2' order by s_calendar_create DESC   LIMIT 50   "; 
                $result_subdeal_calendar= $conn->query($sql_subdeal_calendar);
                while($rs_subdeal_calendar=$result_subdeal_calendar->fetch_assoc()){  $i++;

                     $subdeal_code=$rs_subdeal_calendar['subdeal_code'];
                     $ex_list_listing_code=$rs_subdeal_calendar['ex_list_listing_code'];
                     $s_calendar_note=$rs_subdeal_calendar['s_calendar_note'];
                     $s_calendar_date=$rs_subdeal_calendar['s_calendar_date']; 
                     $s_calendar_time_start=$rs_subdeal_calendar['s_calendar_time_start'];
                     $s_calendar_time_end=$rs_subdeal_calendar['s_calendar_time_end']; 
                     $s_calendar_create=$rs_subdeal_calendar['s_calendar_create']; 
                     $s_calendar_chance=$rs_subdeal_calendar['s_calendar_chance']; 

                   $sql_subdeal="SELECT subdeal.ex_list_listing_code , subdeal.color  FROM dbo_subdeal AS subdeal 
                                  WHERE subdeal.subdeal_code='$subdeal_code' 
                                  order by subdeal.subdeal_create_date DESC LIMIT 1 "; 
                   $result_subdeal= $conn->query($sql_subdeal);
                   $rs_subdeal=$result_subdeal->fetch_assoc();
 
                   $color=$rs_subdeal['color'];

                    /////////////////////////////////////////
                    $sql_listing="SELECT project_id ,ex_list_floor ,ex_list_sqm ,ex_list_view ,ex_list_bedroom ,ex_list_bathroom , ex_list_total_floors
                                        ex_list_other_room , ex_list_parking , ex_list_price , ex_list_listing_type , ex_list_rai , ex_list_ngan , ex_list_wa 
                                 FROM dbo_data_excel_listing
                                 WHERE  ex_list_listing_code='$ex_list_listing_code'  LIMIT 1 ";   
                    $result_listing= $conn->query($sql_listing);
                    $rs_listing=$result_listing->fetch_assoc();

                     $project_id=$rs_listing['project_id'];
                     $ex_list_floor=$rs_listing['ex_list_floor'];
                     $ex_list_sqm=$rs_listing['ex_list_sqm'];
                     $ex_list_view=$rs_listing['ex_list_view']; 
                     $ex_list_bedroom=$rs_listing['ex_list_bedroom'];
                     $ex_list_bathroom=$rs_listing['ex_list_bathroom'];
                     $ex_list_other_room=$rs_listing['ex_list_other_room'];
                     $ex_list_parking=$rs_listing['ex_list_parking'];              
                     $ex_list_price=$rs_listing['ex_list_price'];
                     $ex_list_listing_type=$rs_listing['ex_list_listing_type'];
                     $ex_list_total_floors=$rs_listing['ex_list_total_floors'];
                     $ex_list_rai=$rs_listing['ex_list_rai'];
                     $ex_list_ngan=$rs_listing['ex_list_ngan'];
                     $ex_list_wa=$rs_listing['ex_list_wa'];

                   /////////////////////////////////////////

                    $sql_project="SELECT project_type , project_name_en FROM type_project WHERE  project_id='$project_id'  LIMIT 1 ";   
                    $result_project= $conn->query($sql_project);
                    $rs_project=$result_project->fetch_assoc();

                     $project_type=$rs_project['project_type'];
                     $project_name=$rs_project['project_name_en']; 


                   /////////////////////////////////////////


             
                 if($ex_list_listing_type=='1' or $ex_list_floor=='' or $ex_list_floor=='0'){ 

                           $ex_list_floor_th=$ex_list_floor." fl";             

                 } 


                   $area_th=$ex_list_rai." ไร่ - ".$ex_list_ngan." งาน - ".$ex_list_wa." วา";
                   $area_en=$ex_list_rai." - ".$ex_list_ngan." - ".$ex_list_wa." ";

                   if($ex_list_sqm!=''){ $ex_list_sqm_th=$ex_list_sqm." sqm."; }
                   if($ex_list_bedroom!=''){ 
                           if($ex_list_bedroom=='0'){  $ex_list_bedroom_th="Studio";  
                           }else{  $ex_list_bedroom_th=$ex_list_bedroom."b";   }
                   }
                   if($ex_list_bathroom!=''){ $ex_list_bathroom_th=$ex_list_bathroom."b";    }
                   if($ex_list_floor!=''){ $ex_list_floor=$ex_list_floor." "; }
                   if($ex_list_total_floors!=''){ $ex_list_total_floors_th=$ex_list_total_floors." ชั้น"; }



                 if($ex_list_listing_type!='12'){
                       
                           $detail_1=$ex_list_bedroom_th." ".$ex_list_bathroom_th." , ".$ex_list_floor_th." , ".$ex_list_sqm_th;

                 }else{

                 }
 

             if($s_calendar_chance=='1'){ 
                  $chance=" ต่ำ";
             }else if($s_calendar_chance=='2'){
                  $chance=" ปานกลาง";
             }else if($s_calendar_chance=='3'){
                  $chance=" สูง";
             }else{
                  $chance=" ต่ำ";   
             }


              $year=substr($s_calendar_date,0 , 4 );
              $month=substr($s_calendar_date,5 , 2 );
              $day=substr($s_calendar_date,8 , 2 );

              $s_calendar_time_start_c=substr($s_calendar_time_start,0 , 5 );
              $s_calendar_time_end_c=substr($s_calendar_time_end,0 , 5 );

              $date=$day."/".$month."/".$year." เวลา : ".$s_calendar_time_start_c."-".$s_calendar_time_end_c;
 
              $year=substr($s_calendar_create,0 , 4 );
              $month=substr($s_calendar_create,5 , 2 );
              $day=substr($s_calendar_create,8 , 2 );
              $time_s=substr($s_calendar_create,11 , 8 );

              $s_calendar_create=$day."/".$month."/".$year." เวลา : ".$time_s;
          ?>
  


                                      <!-- DIRECT CHAT SUCCESS -->
            <div class="card card-outline direct-chat direct-chat-success collapsed-card" style="margin:5px;  font-size: 14px; background-color: <?php echo $color;?>;  ">
              <div class="card-header">

                <table style="width: 100%;">
                 <tr>
                    <td>  <?php  echo $project_name;?> <br>  </td>
                    <td  > 
 
                     

                    </td>
                  </tr>
                </table> 


                             <a href="?page=upload_file_excel_check_view&listing=<?php echo $ex_list_listing_code;?>&deal=view" target="_black" >
                             <?php echo $ex_list_listing_code;?></a> <?php echo $detail_1;?> <br>
                             <?php echo number_format($ex_list_price)." Baht";?>
                             <hr>                                                 
                             <?php if($s_calendar_note!=''){ echo $s_calendar_note."<br>"; } ?>                          
                             <i class="fa fa-clock-o"></i> <?php echo $s_calendar_create;?>
               
 
              </div>
              <!-- /.card-header -->
              
              
              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->
                  
            <?php }  ?>

 

          <div class="card-header" style="background-color: #17a2b8;" >
            <h3 class="card-title">
              ชมทรัพย์แล้ว
            </h3>
          </div>
 

 
              <?php $i=20;
                $sql_subdeal_calendar="SELECT subdeal_code , ex_list_listing_code , s_calendar_note ,s_calendar_date ,s_calendar_time_start ,s_calendar_time_end ,
                                              s_calendar_create ,s_calendar_chance
                                      FROM dbo_subdeal_calendar  WHERE  create_deal_code='$code' and s_calendar_status='3' order by s_calendar_create DESC   LIMIT 50   "; 
                $result_subdeal_calendar= $conn->query($sql_subdeal_calendar);
                while($rs_subdeal_calendar=$result_subdeal_calendar->fetch_assoc()){  $i++;

                     $subdeal_code=$rs_subdeal_calendar['subdeal_code'];
                     $ex_list_listing_code=$rs_subdeal_calendar['ex_list_listing_code'];
                     $s_calendar_note=$rs_subdeal_calendar['s_calendar_note'];
                     $s_calendar_date=$rs_subdeal_calendar['s_calendar_date']; 
                     $s_calendar_time_start=$rs_subdeal_calendar['s_calendar_time_start'];
                     $s_calendar_time_end=$rs_subdeal_calendar['s_calendar_time_end']; 
                     $s_calendar_create=$rs_subdeal_calendar['s_calendar_create']; 
                     $s_calendar_chance=$rs_subdeal_calendar['s_calendar_chance']; 

                   $sql_subdeal="SELECT subdeal.ex_list_listing_code , subdeal.color  FROM dbo_subdeal AS subdeal 
                                  WHERE subdeal.subdeal_code='$subdeal_code' 
                                  order by subdeal.subdeal_create_date DESC LIMIT 1 "; 
                   $result_subdeal= $conn->query($sql_subdeal);
                   $rs_subdeal=$result_subdeal->fetch_assoc();
 
                   $color=$rs_subdeal['color'];

                    /////////////////////////////////////////
                    $sql_listing="SELECT project_id ,ex_list_floor ,ex_list_sqm ,ex_list_view ,ex_list_bedroom ,ex_list_bathroom , ex_list_total_floors
                                        ex_list_other_room , ex_list_parking , ex_list_price , ex_list_listing_type , ex_list_rai , ex_list_ngan , ex_list_wa 
                                 FROM dbo_data_excel_listing
                                 WHERE  ex_list_listing_code='$ex_list_listing_code'  LIMIT 1 ";   
                    $result_listing= $conn->query($sql_listing);
                    $rs_listing=$result_listing->fetch_assoc();

                     $project_id=$rs_listing['project_id'];
                     $ex_list_floor=$rs_listing['ex_list_floor'];
                     $ex_list_sqm=$rs_listing['ex_list_sqm'];
                     $ex_list_view=$rs_listing['ex_list_view']; 
                     $ex_list_bedroom=$rs_listing['ex_list_bedroom'];
                     $ex_list_bathroom=$rs_listing['ex_list_bathroom'];
                     $ex_list_other_room=$rs_listing['ex_list_other_room'];
                     $ex_list_parking=$rs_listing['ex_list_parking'];              
                     $ex_list_price=$rs_listing['ex_list_price'];
                     $ex_list_listing_type=$rs_listing['ex_list_listing_type'];
                     $ex_list_total_floors=$rs_listing['ex_list_total_floors'];
                     $ex_list_rai=$rs_listing['ex_list_rai'];
                     $ex_list_ngan=$rs_listing['ex_list_ngan'];
                     $ex_list_wa=$rs_listing['ex_list_wa'];

                   /////////////////////////////////////////

                    $sql_project="SELECT project_type , project_name_en FROM type_project WHERE  project_id='$project_id'  LIMIT 1 ";   
                    $result_project= $conn->query($sql_project);
                    $rs_project=$result_project->fetch_assoc();

                     $project_type=$rs_project['project_type'];
                     $project_name=$rs_project['project_name_en']; 


                   /////////////////////////////////////////
             
                 if($ex_list_listing_type=='1' or $ex_list_floor=='' or $ex_list_floor=='0'){ 

                           $ex_list_floor_th=$ex_list_floor." fl";             

                 } 


                   $area_th=$ex_list_rai." ไร่ - ".$ex_list_ngan." งาน - ".$ex_list_wa." วา";
                   $area_en=$ex_list_rai." - ".$ex_list_ngan." - ".$ex_list_wa." ";

                   if($ex_list_sqm!=''){ $ex_list_sqm_th=$ex_list_sqm." sqm."; }
                   if($ex_list_bedroom!=''){ 
                           if($ex_list_bedroom=='0'){  $ex_list_bedroom_th="Studio";  
                           }else{  $ex_list_bedroom_th=$ex_list_bedroom."b";   }
                   }
                   if($ex_list_bathroom!=''){ $ex_list_bathroom_th=$ex_list_bathroom."b";    }
                   if($ex_list_floor!=''){ $ex_list_floor=$ex_list_floor." "; }
                   if($ex_list_total_floors!=''){ $ex_list_total_floors_th=$ex_list_total_floors." ชั้น"; }



                 if($ex_list_listing_type!='12'){
                       
                           $detail_1=$ex_list_bedroom_th." ".$ex_list_bathroom_th." , ".$ex_list_floor_th." , ".$ex_list_sqm_th;

                 }else{

                 }



             if($s_calendar_chance=='1'){ 
                  $chance=" ต่ำ";
             }else if($s_calendar_chance=='2'){
                  $chance=" ปานกลาง";
             }else if($s_calendar_chance=='3'){
                  $chance=" สูง";
             }else{
                  $chance=" ต่ำ";   
             }

              $year=substr($s_calendar_date,0 , 4 );
              $month=substr($s_calendar_date,5 , 2 );
              $day=substr($s_calendar_date,8 , 2 );

              $s_calendar_time_start_c=substr($s_calendar_time_start,0 , 5 );
              $s_calendar_time_end_c=substr($s_calendar_time_end,0 , 5 );

              $date=$day."/".$month."/".$year." เวลา : ".$s_calendar_time_start_c."-".$s_calendar_time_end_c;
 
              $year=substr($s_calendar_create,0 , 4 );
              $month=substr($s_calendar_create,5 , 2 );
              $day=substr($s_calendar_create,8 , 2 );
              $time_s=substr($s_calendar_create,11 , 8 );

              $s_calendar_create=$day."/".$month."/".$year." เวลา : ".$time_s;

          ?>
  


                                      <!-- DIRECT CHAT SUCCESS -->
            <div class="card card-outline direct-chat direct-chat-success collapsed-card" style=" margin: 5px;  font-size: 14px; background-color: <?php echo $color;?>; ">
              <div class="card-header">

                <table style="width: 100%;"  >
                 <tr >
                    <td  >  <?php  echo $project_name;?> <br>  </td>
                    <td style="width: 35px;text-align: right;">

  
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                           <i class="fa fa-picture-o"></i>
                        </button>
                               

                    </td>
                  </tr>
                </table> 
                      <p style="margin:5px;">
                             <a href="?page=upload_file_excel_check_view&listing=<?php echo $ex_list_listing_code;?>&deal=view" target="_black" >
                             <?php echo $ex_list_listing_code;?></a> <?php echo $detail_1;?> <br>
                             <?php echo number_format($ex_list_price)." Baht";?>
                             <hr>
                             <?php echo "โอกาสปิดการขาย : ".$chance;?> <br>                           
                             <?php if($s_calendar_note!=''){ echo $s_calendar_note."<br>"; } ?>                          
                             <i class="fa fa-clock-o"></i> <?php echo $s_calendar_create;?>
                      </p>
              </div>
              <!-- /.card-header -->
              <div class="card-body" >
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages" style="height: 300px;" > 

                          <img src="file/create_deal/<?php echo $s_calendar_file;?>"  style=" width: 100%; " >
                                  

                  <!-- /.direct-chat-msg -->
                </div>
                <!--/.direct-chat-messages-->

                <!-- Contacts are loaded here -->
                <div class="direct-chat-contacts" style="height: 300px;">
                  <ul class="contacts-list" >
                    <li >
  
                    </li>
                    <!-- End Contact Item -->
                  </ul>
                  <!-- /.contatcts-list -->
                </div>
                <!-- /.direct-chat-pane -->
              </div>
              <!-- /.card-body -->
              
              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->
                  
            <?php }  ?>

 

        </div>
        <div class="card card-row card-default" style="width: <?php echo $size_w;?>;">

          <div class="card-header" style="background-color: #1f4e78; color: #fff;">
            <h3 class="card-title">
              จองแล้ว
            </h3>
          </div>
 
 
              <?php
                $sql_subdeal_calendar="SELECT subdeal_code , ex_list_listing_code , s_calendar_note ,s_calendar_date ,s_calendar_time_start ,s_calendar_time_end ,
                                              s_calendar_create ,s_calendar_chance
                                      FROM dbo_subdeal_calendar  WHERE  create_deal_code='$code' and s_calendar_status='10' order by s_calendar_create DESC   LIMIT 50   "; 
                $result_subdeal_calendar= $conn->query($sql_subdeal_calendar);
                while($rs_subdeal_calendar=$result_subdeal_calendar->fetch_assoc()){  $i++;

                     $subdeal_code=$rs_subdeal_calendar['subdeal_code'];
                     $ex_list_listing_code=$rs_subdeal_calendar['ex_list_listing_code'];
                     $s_calendar_note=$rs_subdeal_calendar['s_calendar_note'];
                     $s_calendar_date=$rs_subdeal_calendar['s_calendar_date']; 
                     $s_calendar_time_start=$rs_subdeal_calendar['s_calendar_time_start'];
                     $s_calendar_time_end=$rs_subdeal_calendar['s_calendar_time_end']; 
                     $s_calendar_create=$rs_subdeal_calendar['s_calendar_create']; 
                     $s_calendar_chance=$rs_subdeal_calendar['s_calendar_chance']; 

                   $sql_subdeal="SELECT subdeal.ex_list_listing_code , subdeal.color  FROM dbo_subdeal AS subdeal 
                                  WHERE subdeal.subdeal_code='$subdeal_code' 
                                  order by subdeal.subdeal_create_date DESC LIMIT 1 "; 
                   $result_subdeal= $conn->query($sql_subdeal);
                   $rs_subdeal=$result_subdeal->fetch_assoc();
 
                   $color=$rs_subdeal['color'];

                    /////////////////////////////////////////

                    $sql_listing="SELECT project_id ,ex_list_floor ,ex_list_sqm ,ex_list_view ,ex_list_bedroom ,ex_list_bathroom , ex_list_total_floors
                                        ex_list_other_room , ex_list_parking , ex_list_price , ex_list_listing_type , ex_list_rai , ex_list_ngan , ex_list_wa 
                                 FROM dbo_data_excel_listing
                                 WHERE  ex_list_listing_code='$ex_list_listing_code'  LIMIT 1 ";   
                    $result_listing= $conn->query($sql_listing);
                    $rs_listing=$result_listing->fetch_assoc();

                     $project_id=$rs_listing['project_id'];
                     $ex_list_floor=$rs_listing['ex_list_floor'];
                     $ex_list_sqm=$rs_listing['ex_list_sqm'];
                     $ex_list_view=$rs_listing['ex_list_view']; 
                     $ex_list_bedroom=$rs_listing['ex_list_bedroom'];
                     $ex_list_bathroom=$rs_listing['ex_list_bathroom'];
                     $ex_list_other_room=$rs_listing['ex_list_other_room'];
                     $ex_list_parking=$rs_listing['ex_list_parking'];              
                     $ex_list_price=$rs_listing['ex_list_price'];
                     $ex_list_listing_type=$rs_listing['ex_list_listing_type'];
                     $ex_list_total_floors=$rs_listing['ex_list_total_floors'];
                     $ex_list_rai=$rs_listing['ex_list_rai'];
                     $ex_list_ngan=$rs_listing['ex_list_ngan'];
                     $ex_list_wa=$rs_listing['ex_list_wa'];
                   /////////////////////////////////////////

                    $sql_project="SELECT project_type , project_name_en FROM type_project WHERE  project_id='$project_id'  LIMIT 1 ";   
                    $result_project= $conn->query($sql_project);
                    $rs_project=$result_project->fetch_assoc();

                     $project_type=$rs_project['project_type'];
                     $project_name=$rs_project['project_name_en']; 


                   /////////////////////////////////////////

             
                 if($ex_list_listing_type=='1' or $ex_list_floor=='' or $ex_list_floor=='0'){ 

                           $ex_list_floor_th=$ex_list_floor." fl";             

                 } 


                   $area_th=$ex_list_rai." ไร่ - ".$ex_list_ngan." งาน - ".$ex_list_wa." วา";
                   $area_en=$ex_list_rai." - ".$ex_list_ngan." - ".$ex_list_wa." ";

                   if($ex_list_sqm!=''){ $ex_list_sqm_th=$ex_list_sqm." sqm."; }
                   if($ex_list_bedroom!=''){ 
                           if($ex_list_bedroom=='0'){  $ex_list_bedroom_th="Studio";  
                           }else{  $ex_list_bedroom_th=$ex_list_bedroom."b";   }
                   }
                   if($ex_list_bathroom!=''){ $ex_list_bathroom_th=$ex_list_bathroom."b";    }
                   if($ex_list_floor!=''){ $ex_list_floor=$ex_list_floor." "; }
                   if($ex_list_total_floors!=''){ $ex_list_total_floors_th=$ex_list_total_floors." ชั้น"; }



                 if($ex_list_listing_type!='12'){
                       
                           $detail_1=$ex_list_bedroom_th." ".$ex_list_bathroom_th." , ".$ex_list_floor_th." , ".$ex_list_sqm_th;

                 }else{

                 }


                 $s_calendar_date=$rs_subdeal['s_calendar_date'];
                 $s_calendar_time_start=$rs_subdeal['s_calendar_time_start'];
                 $s_calendar_time_end=$rs_subdeal['s_calendar_time_end'];
                 $s_calendar_note=$rs_subdeal['s_calendar_note'];
                 $s_calendar_create=$rs_subdeal['s_calendar_create'];

                $year=substr($s_calendar_date,0 , 4 );
                $month=substr($s_calendar_date,5 , 2 );
                $day=substr($s_calendar_date,8 , 2 );

                $s_calendar_time_start_c=substr($s_calendar_time_start,0 , 5 );
                $s_calendar_time_end_c=substr($s_calendar_time_end,0 , 5 );

                $date=$day."/".$month."/".$year." เวลา".$s_calendar_time_start_c."-".$s_calendar_time_end_c;

                $year=substr($s_calendar_create,0 , 4 );
                $month=substr($s_calendar_create,5 , 2 );
                $day=substr($s_calendar_create,8 , 2 );
                $time_s=substr($s_calendar_create,11 , 8 );

                $s_calendar_create=$day."/".$month."/".$year." เวลา : ".$time_s;



          ?>
  


                                      <!-- DIRECT CHAT SUCCESS -->
            <div class="card card-outline direct-chat direct-chat-success collapsed-card" style="margin:5px;  font-size:14px; background-color: <?php echo $color;?>; ">
              <div class="card-header">


                <table style="width: 100%;">
                 <tr>
                    <td>  <?php  echo $project_name;?> <br>  </td>
                    <td style="width: 97px;">             
                       

                    </td>
                  </tr>
                </table> 

                             <a href="?page=upload_file_excel_check_view&listing=<?php echo $ex_list_listing_code;?>&deal=view" target="_black" >
                             <?php echo $ex_list_listing_code;?></a> <?php echo $detail_1;?> <br>
                             <?php echo number_format($ex_list_price)." Baht";?>                          

                             <hr>                        
                             <?php if($s_calendar_note!=''){ echo $s_calendar_note."<br>"; } ?> 
                             <?php echo "วันที่นัดเซ็นต์ : ".$date;?><br>                         
                             <i class="fa fa-clock-o"></i> <?php echo $s_calendar_create;?>
              </div>
              <!-- /.card-header -->
              <div class="card-body" >
                <!-- Conversations are loaded here -->
           
                <!--/.direct-chat-messages-->

                <!-- Contacts are loaded here -->
                <div class="direct-chat-contacts" style="height: 300px;">
                  <ul class="contacts-list" >
                    <li >
  
                    </li>
                    <!-- End Contact Item -->
                  </ul>
                  <!-- /.contatcts-list -->
                </div>
                <!-- /.direct-chat-pane -->
              </div>
              <!-- /.card-body -->
              
              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->
                  
            <?php }  ?>

          <div class="card-header" style="background-color: #1f4e78; color: #fff;">
            <h3 class="card-title">
              นัดเซ็นต์สัญญา
            </h3>
          </div>
 
 
              <?php
                $sql_subdeal_calendar="SELECT subdeal_code , ex_list_listing_code , s_calendar_note ,s_calendar_date ,s_calendar_time_start ,s_calendar_time_end ,
                                              s_calendar_create ,s_calendar_chance
                                      FROM dbo_subdeal_calendar  WHERE  create_deal_code='$code' and s_calendar_status='4' order by s_calendar_create DESC   LIMIT 50   "; 
                $result_subdeal_calendar= $conn->query($sql_subdeal_calendar);
                while($rs_subdeal_calendar=$result_subdeal_calendar->fetch_assoc()){  $i++;

                     $subdeal_code=$rs_subdeal_calendar['subdeal_code'];
                     $ex_list_listing_code=$rs_subdeal_calendar['ex_list_listing_code'];
                     $s_calendar_note=$rs_subdeal_calendar['s_calendar_note'];
                     $s_calendar_date=$rs_subdeal_calendar['s_calendar_date']; 
                     $s_calendar_time_start=$rs_subdeal_calendar['s_calendar_time_start'];
                     $s_calendar_time_end=$rs_subdeal_calendar['s_calendar_time_end']; 
                     $s_calendar_create=$rs_subdeal_calendar['s_calendar_create']; 
                     $s_calendar_chance=$rs_subdeal_calendar['s_calendar_chance']; 

                   $sql_subdeal="SELECT subdeal.ex_list_listing_code , subdeal.color  FROM dbo_subdeal AS subdeal 
                                  WHERE subdeal.subdeal_code='$subdeal_code' 
                                  order by subdeal.subdeal_create_date DESC LIMIT 1 "; 
                   $result_subdeal= $conn->query($sql_subdeal);
                   $rs_subdeal=$result_subdeal->fetch_assoc();
 
                   $color=$rs_subdeal['color'];

                    /////////////////////////////////////////
                    $sql_listing="SELECT project_id ,ex_list_floor ,ex_list_sqm ,ex_list_view ,ex_list_bedroom ,ex_list_bathroom , ex_list_total_floors
                                        ex_list_other_room , ex_list_parking , ex_list_price , ex_list_listing_type , ex_list_rai , ex_list_ngan , ex_list_wa 
                                 FROM dbo_data_excel_listing
                                 WHERE  ex_list_listing_code='$ex_list_listing_code'  LIMIT 1 ";   
                    $result_listing= $conn->query($sql_listing);
                    $rs_listing=$result_listing->fetch_assoc();

                     $project_id=$rs_listing['project_id'];
                     $ex_list_floor=$rs_listing['ex_list_floor'];
                     $ex_list_sqm=$rs_listing['ex_list_sqm'];
                     $ex_list_view=$rs_listing['ex_list_view']; 
                     $ex_list_bedroom=$rs_listing['ex_list_bedroom'];
                     $ex_list_bathroom=$rs_listing['ex_list_bathroom'];
                     $ex_list_other_room=$rs_listing['ex_list_other_room'];
                     $ex_list_parking=$rs_listing['ex_list_parking'];              
                     $ex_list_price=$rs_listing['ex_list_price'];
                     $ex_list_listing_type=$rs_listing['ex_list_listing_type'];
                     $ex_list_total_floors=$rs_listing['ex_list_total_floors'];
                     $ex_list_rai=$rs_listing['ex_list_rai'];
                     $ex_list_ngan=$rs_listing['ex_list_ngan'];
                     $ex_list_wa=$rs_listing['ex_list_wa'];
                   /////////////////////////////////////////

                    $sql_project="SELECT project_type , project_name_en FROM type_project WHERE  project_id='$project_id'  LIMIT 1 ";   
                    $result_project= $conn->query($sql_project);
                    $rs_project=$result_project->fetch_assoc();

                     $project_type=$rs_project['project_type'];
                     $project_name=$rs_project['project_name_en']; 


                   /////////////////////////////////////////
                   
             
                 if($ex_list_listing_type=='1' or $ex_list_floor=='' or $ex_list_floor=='0'){ 

                           $ex_list_floor_th=$ex_list_floor." fl";             

                 } 


                   $area_th=$ex_list_rai." ไร่ - ".$ex_list_ngan." งาน - ".$ex_list_wa." วา";
                   $area_en=$ex_list_rai." - ".$ex_list_ngan." - ".$ex_list_wa." ";

                   if($ex_list_sqm!=''){ $ex_list_sqm_th=$ex_list_sqm." sqm."; }
                   if($ex_list_bedroom!=''){ 
                           if($ex_list_bedroom=='0'){  $ex_list_bedroom_th="Studio";  
                           }else{  $ex_list_bedroom_th=$ex_list_bedroom."b";   }
                   }
                   if($ex_list_bathroom!=''){ $ex_list_bathroom_th=$ex_list_bathroom."b";    }
                   if($ex_list_floor!=''){ $ex_list_floor=$ex_list_floor." "; }
                   if($ex_list_total_floors!=''){ $ex_list_total_floors_th=$ex_list_total_floors." ชั้น"; }



                 if($ex_list_listing_type!='12'){
                       
                           $detail_1=$ex_list_bedroom_th." ".$ex_list_bathroom_th." , ".$ex_list_floor_th." , ".$ex_list_sqm_th;

                 }else{

                 }


                 $s_calendar_date=$rs_subdeal['s_calendar_date'];
                 $s_calendar_time_start=$rs_subdeal['s_calendar_time_start'];
                 $s_calendar_time_end=$rs_subdeal['s_calendar_time_end'];
                 $s_calendar_note=$rs_subdeal['s_calendar_note'];
                 $s_calendar_create=$rs_subdeal['s_calendar_create'];

                $year=substr($s_calendar_date,0 , 4 );
                $month=substr($s_calendar_date,5 , 2 );
                $day=substr($s_calendar_date,8 , 2 );

                $s_calendar_time_start_c=substr($s_calendar_time_start,0 , 5 );
                $s_calendar_time_end_c=substr($s_calendar_time_end,0 , 5 );

                $date=$day."/".$month."/".$year." เวลา".$s_calendar_time_start_c."-".$s_calendar_time_end_c;

                $year=substr($s_calendar_create,0 , 4 );
                $month=substr($s_calendar_create,5 , 2 );
                $day=substr($s_calendar_create,8 , 2 );
                $time_s=substr($s_calendar_create,11 , 8 );

                $s_calendar_create=$day."/".$month."/".$year." เวลา : ".$time_s;



          ?>
  


                                      <!-- DIRECT CHAT SUCCESS -->
            <div class="card card-outline direct-chat direct-chat-success collapsed-card" style="margin:5px;  font-size:14px; background-color: <?php echo $color;?>; ">
              <div class="card-header">


                <table style="width: 100%;">
                 <tr>
                    <td>  <?php  echo $project_name;?> <br>  </td>
                    <td style="width: 97px;">             
                       

                    </td>
                  </tr>
                </table> 

                             <a href="?page=upload_file_excel_check_view&listing=<?php echo $ex_list_listing_code;?>&deal=view" target="_black" >
                             <?php echo $ex_list_listing_code;?></a> <?php echo $detail_1;?> <br>
                             <?php echo number_format($ex_list_price)." Baht";?>                          

                             <hr>                        
                             <?php if($s_calendar_note!=''){ echo $s_calendar_note."<br>"; } ?> 
                             <?php echo "วันที่นัดเซ็นต์ : ".$date;?><br>                         
                             <i class="fa fa-clock-o"></i> <?php echo $s_calendar_create;?>
              </div>
              <!-- /.card-header -->
              <div class="card-body" >
                <!-- Conversations are loaded here -->
           
                <!--/.direct-chat-messages-->

                <!-- Contacts are loaded here -->
                <div class="direct-chat-contacts" style="height: 300px;">
                  <ul class="contacts-list" >
                    <li >
  
                    </li>
                    <!-- End Contact Item -->
                  </ul>
                  <!-- /.contatcts-list -->
                </div>
                <!-- /.direct-chat-pane -->
              </div>
              <!-- /.card-body -->
              
              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->
                  
            <?php }  ?>


        

          <div class="card-header"  style="background-color: #1f4e78; color: #fff;">
            <h3 class="card-title" >
              เซ็นต์สัญญาแล้ว
            </h3>
          </div>
      

              <?php $i=10;
                $sql_subdeal_calendar="SELECT subdeal_code , ex_list_listing_code , s_calendar_note ,s_calendar_date ,s_calendar_time_start ,s_calendar_time_end ,
                                              s_calendar_create ,s_calendar_chance
                                      FROM dbo_subdeal_calendar  WHERE  create_deal_code='$code' and s_calendar_status='5' order by s_calendar_create DESC   LIMIT 50   "; 
                $result_subdeal_calendar= $conn->query($sql_subdeal_calendar);
                while($rs_subdeal_calendar=$result_subdeal_calendar->fetch_assoc()){  $i++;

                     $subdeal_code=$rs_subdeal_calendar['subdeal_code'];
                     $ex_list_listing_code=$rs_subdeal_calendar['ex_list_listing_code'];
                     $s_calendar_note=$rs_subdeal_calendar['s_calendar_note'];
                     $s_calendar_date=$rs_subdeal_calendar['s_calendar_date']; 
                     $s_calendar_time_start=$rs_subdeal_calendar['s_calendar_time_start'];
                     $s_calendar_time_end=$rs_subdeal_calendar['s_calendar_time_end']; 
                     $s_calendar_create=$rs_subdeal_calendar['s_calendar_create']; 
                     $s_calendar_chance=$rs_subdeal_calendar['s_calendar_chance']; 

                   $sql_subdeal="SELECT subdeal.ex_list_listing_code , subdeal.color  FROM dbo_subdeal AS subdeal 
                                  WHERE subdeal.subdeal_code='$subdeal_code' 
                                  order by subdeal.subdeal_create_date DESC LIMIT 1 "; 
                   $result_subdeal= $conn->query($sql_subdeal);
                   $rs_subdeal=$result_subdeal->fetch_assoc();
 
                   $color=$rs_subdeal['color'];

                    /////////////////////////////////////////
                    $sql_listing="SELECT project_id ,ex_list_floor ,ex_list_sqm ,ex_list_view ,ex_list_bedroom ,ex_list_bathroom , ex_list_total_floors
                                        ex_list_other_room , ex_list_parking , ex_list_price , ex_list_listing_type , ex_list_rai , ex_list_ngan , ex_list_wa 
                                 FROM dbo_data_excel_listing
                                 WHERE  ex_list_listing_code='$ex_list_listing_code'  LIMIT 1 ";   
                    $result_listing= $conn->query($sql_listing);
                    $rs_listing=$result_listing->fetch_assoc();

                     $project_id=$rs_listing['project_id'];
                     $ex_list_floor=$rs_listing['ex_list_floor'];
                     $ex_list_sqm=$rs_listing['ex_list_sqm'];
                     $ex_list_view=$rs_listing['ex_list_view']; 
                     $ex_list_bedroom=$rs_listing['ex_list_bedroom'];
                     $ex_list_bathroom=$rs_listing['ex_list_bathroom'];
                     $ex_list_other_room=$rs_listing['ex_list_other_room'];
                     $ex_list_parking=$rs_listing['ex_list_parking'];              
                     $ex_list_price=$rs_listing['ex_list_price'];
                     $ex_list_listing_type=$rs_listing['ex_list_listing_type'];
                     $ex_list_total_floors=$rs_listing['ex_list_total_floors'];
                     $ex_list_rai=$rs_listing['ex_list_rai'];
                     $ex_list_ngan=$rs_listing['ex_list_ngan'];
                     $ex_list_wa=$rs_listing['ex_list_wa'];

                   /////////////////////////////////////////

                    $sql_project="SELECT project_type , project_name_en FROM type_project WHERE  project_id='$project_id'  LIMIT 1 ";   
                    $result_project= $conn->query($sql_project);
                    $rs_project=$result_project->fetch_assoc();

                     $project_type=$rs_project['project_type'];
                     $project_name=$rs_project['project_name_en']; 


                   /////////////////////////////////////////

             
                 if($ex_list_listing_type=='1' or $ex_list_floor=='' or $ex_list_floor=='0'){ 

                           $ex_list_floor_th=$ex_list_floor." fl";             

                 } 


                   $area_th=$ex_list_rai." ไร่ - ".$ex_list_ngan." งาน - ".$ex_list_wa." วา";
                   $area_en=$ex_list_rai." - ".$ex_list_ngan." - ".$ex_list_wa." ";

                   if($ex_list_sqm!=''){ $ex_list_sqm_th=$ex_list_sqm." sqm."; }
                   if($ex_list_bedroom!=''){ 
                           if($ex_list_bedroom=='0'){  $ex_list_bedroom_th="Studio";  
                           }else{  $ex_list_bedroom_th=$ex_list_bedroom."b";   }
                   }
                   if($ex_list_bathroom!=''){ $ex_list_bathroom_th=$ex_list_bathroom."b";    }
                   if($ex_list_floor!=''){ $ex_list_floor=$ex_list_floor." "; }
                   if($ex_list_total_floors!=''){ $ex_list_total_floors_th=$ex_list_total_floors." ชั้น"; }



                 if($ex_list_listing_type!='12'){
                       
                           $detail_1=$ex_list_bedroom_th." ".$ex_list_bathroom_th." , ".$ex_list_floor_th." , ".$ex_list_sqm_th;

                 }else{

                 }

                 $s_calendar_date=$rs_subdeal['s_calendar_date'];
                 $s_calendar_time_start=$rs_subdeal['s_calendar_time_start'];
                 $s_calendar_time_end=$rs_subdeal['s_calendar_time_end'];
                 $s_calendar_note=$rs_subdeal['s_calendar_note'];
                 $s_calendar_create=$rs_subdeal['s_calendar_create'];

                  $year=substr($s_calendar_date,0 , 4 );
                  $month=substr($s_calendar_date,5 , 2 );
                  $day=substr($s_calendar_date,8 , 2 );

                  $s_calendar_time_start_c=substr($s_calendar_time_start,0 , 5 );
                  $s_calendar_time_end_c=substr($s_calendar_time_end,0 , 5 );

                  $date=$day."/".$month."/".$year." เวลา".$s_calendar_time_start_c."-".$s_calendar_time_end_c;

                  $year=substr($s_calendar_create,0 , 4 );
                  $month=substr($s_calendar_create,5 , 2 );
                  $day=substr($s_calendar_create,8 , 2 );
                  $time_s=substr($s_calendar_create,11 , 8 );

                  $s_calendar_create=$day."/".$month."/".$year." เวลา : ".$time_s;


          ?>
  


                                      <!-- DIRECT CHAT SUCCESS -->
            <div class="card card-outline direct-chat direct-chat-success collapsed-card" style="margin:5px; font-size:14px; background-color: <?php echo $color;?>; " >
              <div class="card-header">
 
                <table style="width: 100%;">
                 <tr>
                    <td>  <?php  echo $project_name;?> <br>  </td>
                    <td style="width: 70px;text-align: right;">  
  
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fa fa-picture-o"></i>
                        </button> 

                    </td>
                  </tr>
                </table> 
  

                             <a href="?page=upload_file_excel_check_view&listing=<?php echo $ex_list_listing_code;?>&deal=view" target="_black" >
                             <?php echo $ex_list_listing_code;?></a> <?php echo $detail_1;?> <br>
                             <?php echo number_format($ex_list_price)." Baht";?>
                             <hr>                        
                             <?php if($s_calendar_note!=''){ echo $s_calendar_note."<br>"; } ?>                             
                             <i class="fa fa-clock-o"></i> <?php echo $s_calendar_create;?>

              </div>
              <!-- /.card-header -->
              <div class="card-body" >
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages" style="height: 300px;" > 

                          <img src="file/create_deal/<?php echo $s_calendar_file;?>"  style=" width: 100%; " >
                                  

                  <!-- /.direct-chat-msg -->
                </div>
                <!--/.direct-chat-messages-->

                <!-- Contacts are loaded here -->
                <div class="direct-chat-contacts" style="height: 300px;">
                  <ul class="contacts-list" >
                    <li >
  
                    </li>
                    <!-- End Contact Item -->
                  </ul>
                  <!-- /.contatcts-list -->
                </div>
                <!-- /.direct-chat-pane -->
              </div>
              <!-- /.card-body -->
              
              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->
                  
            <?php }  ?>

      


        </div>

<?php if($create_deal_attention=='1'){ ?>


        <div class="card card-row card-default" style="width: <?php echo $size_w;?>;">
          <div class="card-header" style="background-color: #ffd966;">
            <h3 class="card-title">
              นัดโอน
            </h3>
          </div>
          


 
              <?php
                $sql_subdeal_calendar="SELECT subdeal_code , ex_list_listing_code , s_calendar_note ,s_calendar_date ,s_calendar_time_start ,s_calendar_time_end ,
                                              s_calendar_create ,s_calendar_chance , s_calendar_file
                                      FROM dbo_subdeal_calendar  WHERE  create_deal_code='$code' and s_calendar_status='6' order by s_calendar_create DESC   LIMIT 50   "; 
                $result_subdeal_calendar= $conn->query($sql_subdeal_calendar);
                while($rs_subdeal_calendar=$result_subdeal_calendar->fetch_assoc()){  $i++;

                     $subdeal_code=$rs_subdeal_calendar['subdeal_code'];
                     $ex_list_listing_code=$rs_subdeal_calendar['ex_list_listing_code'];
                     $s_calendar_note=$rs_subdeal_calendar['s_calendar_note'];
                     $s_calendar_date=$rs_subdeal_calendar['s_calendar_date']; 
                     $s_calendar_time_start=$rs_subdeal_calendar['s_calendar_time_start'];
                     $s_calendar_time_end=$rs_subdeal_calendar['s_calendar_time_end']; 
                     $s_calendar_create=$rs_subdeal_calendar['s_calendar_create']; 
                     $s_calendar_chance=$rs_subdeal_calendar['s_calendar_chance']; 
                     $s_calendar_file=$rs_subdeal_calendar['s_calendar_file']; 

                   $sql_subdeal="SELECT subdeal.ex_list_listing_code , subdeal.color  FROM dbo_subdeal AS subdeal 
                                  WHERE subdeal.subdeal_code='$subdeal_code' 
                                  order by subdeal.subdeal_create_date DESC LIMIT 1 "; 
                   $result_subdeal= $conn->query($sql_subdeal);
                   $rs_subdeal=$result_subdeal->fetch_assoc();
 
                   $color=$rs_subdeal['color'];

                    /////////////////////////////////////////
                    $sql_listing="SELECT project_id ,ex_list_floor ,ex_list_sqm ,ex_list_view ,ex_list_bedroom ,ex_list_bathroom , ex_list_total_floors
                                        ex_list_other_room , ex_list_parking , ex_list_price , ex_list_listing_type , ex_list_rai , ex_list_ngan , ex_list_wa 
                                 FROM dbo_data_excel_listing
                                 WHERE  ex_list_listing_code='$ex_list_listing_code'  LIMIT 1 ";   
                    $result_listing= $conn->query($sql_listing);
                    $rs_listing=$result_listing->fetch_assoc();

                     $project_id=$rs_listing['project_id'];
                     $ex_list_floor=$rs_listing['ex_list_floor'];
                     $ex_list_sqm=$rs_listing['ex_list_sqm'];
                     $ex_list_view=$rs_listing['ex_list_view']; 
                     $ex_list_bedroom=$rs_listing['ex_list_bedroom'];
                     $ex_list_bathroom=$rs_listing['ex_list_bathroom'];
                     $ex_list_other_room=$rs_listing['ex_list_other_room'];
                     $ex_list_parking=$rs_listing['ex_list_parking'];              
                     $ex_list_price=$rs_listing['ex_list_price'];
                     $ex_list_listing_type=$rs_listing['ex_list_listing_type'];
                     $ex_list_total_floors=$rs_listing['ex_list_total_floors'];
                     $ex_list_rai=$rs_listing['ex_list_rai'];
                     $ex_list_ngan=$rs_listing['ex_list_ngan'];
                     $ex_list_wa=$rs_listing['ex_list_wa'];

                   /////////////////////////////////////////

                    $sql_project="SELECT project_type , project_name_en FROM type_project WHERE  project_id='$project_id'  LIMIT 1 ";   
                    $result_project= $conn->query($sql_project);
                    $rs_project=$result_project->fetch_assoc();

                     $project_type=$rs_project['project_type'];
                     $project_name=$rs_project['project_name_en']; 


                   /////////////////////////////////////////

                     
             
                 if($ex_list_listing_type=='1' or $ex_list_floor=='' or $ex_list_floor=='0'){ 

                           $ex_list_floor_th=$ex_list_floor." fl";             

                 } 


                   $area_th=$ex_list_rai." ไร่ - ".$ex_list_ngan." งาน - ".$ex_list_wa." วา";
                   $area_en=$ex_list_rai." - ".$ex_list_ngan." - ".$ex_list_wa." ";

                   if($ex_list_sqm!=''){ $ex_list_sqm_th=$ex_list_sqm." sqm."; }
                   if($ex_list_bedroom!=''){ 
                           if($ex_list_bedroom=='0'){  $ex_list_bedroom_th="Studio";  
                           }else{  $ex_list_bedroom_th=$ex_list_bedroom."b";   }
                   }
                   if($ex_list_bathroom!=''){ $ex_list_bathroom_th=$ex_list_bathroom."b";    }
                   if($ex_list_floor!=''){ $ex_list_floor=$ex_list_floor." "; }
                   if($ex_list_total_floors!=''){ $ex_list_total_floors_th=$ex_list_total_floors." ชั้น"; }



                 if($ex_list_listing_type!='12'){
                       
                           $detail_1=$ex_list_bedroom_th." ".$ex_list_bathroom_th." , ".$ex_list_floor_th." , ".$ex_list_sqm_th;

                 }else{

                 }

                $year=substr($s_calendar_date,0 , 4 );
                $month=substr($s_calendar_date,5 , 2 );
                $day=substr($s_calendar_date,8 , 2 );

                $s_calendar_time_start_c=substr($s_calendar_time_start,0 , 5 );
                $s_calendar_time_end_c=substr($s_calendar_time_end,0 , 5 );

                $date=$day."/".$month."/".$year." เวลา".$s_calendar_time_start_c."-".$s_calendar_time_end_c;

                $year=substr($s_calendar_create,0 , 4 );
                $month=substr($s_calendar_create,5 , 2 );
                $day=substr($s_calendar_create,8 , 2 );
                $time_s=substr($s_calendar_create,11 , 8 );

                $s_calendar_create=$day."/".$month."/".$year." เวลา : ".$time_s;


          ?>
  


                                      <!-- DIRECT CHAT SUCCESS -->
            <div class="card card-outline direct-chat direct-chat-success collapsed-card" style="margin:5px; font-size: 14px;  background-color: <?php echo $color;?>; ">
              <div class="card-header">

                <table style="width: 100%;">
                 <tr>
                    <td>  <?php  echo $project_name;?> <br>  </td>
                  
                  </tr>
                </table> 

                             <a href="?page=upload_file_excel_check_view&listing=<?php echo $ex_list_listing_code;?>&deal=view" target="_black" >
                             <?php echo $ex_list_listing_code;?></a> <?php echo $detail_1;?> <br>
                             <?php echo number_format($ex_list_price)." Baht";?>
                            <hr>                        
                             <?php if($s_calendar_note!=''){ echo $s_calendar_note."<br>"; } ?> 
                             <?php echo "วันที่นัดโอน : ".$date;?><br>                         
                             <i class="fa fa-clock-o"></i> <?php echo $s_calendar_create;?>

              </div>
              <!-- /.card-header -->
              <div class="card-body" >
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages" style="height: 500px; padding: 0px;" >
   



 
 

                                      
  <!-- 
                                         <center>
                                             <a href="?page=create_subdeal&status=edit&p_check=subdeal&id=<?php echo $subdeal_code;?>" class="btn btn-sm btn-primary"   >
                                              <i class="fas fa-user"></i>  คลิกเข้าชม
                                             </a>
                                         </center>-->

                                  

                  <!-- /.direct-chat-msg -->
                </div>
                <!--/.direct-chat-messages-->

                <!-- Contacts are loaded here -->
                <div class="direct-chat-contacts" style="height: 300px;">
                  <ul class="contacts-list" >
                    <li >
  
                    </li>
                    <!-- End Contact Item -->
                  </ul>
                  <!-- /.contatcts-list -->
                </div>
                <!-- /.direct-chat-pane -->
              </div>
              <!-- /.card-body -->
              
              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->
                  
            <?php }  ?>



          <div class="card-header" style="background-color: #ffd966;">
            <h3 class="card-title" >
              โอนแล้ว
            </h3>
          </div>


              <?php $i=10;
                $sql_subdeal_calendar="SELECT subdeal_code , ex_list_listing_code , s_calendar_note ,s_calendar_date ,s_calendar_time_start ,s_calendar_time_end ,
                                              s_calendar_create ,s_calendar_chance , s_calendar_file
                                      FROM dbo_subdeal_calendar  WHERE  create_deal_code='$code' and s_calendar_status='7' order by s_calendar_create DESC   LIMIT 50   "; 
                $result_subdeal_calendar= $conn->query($sql_subdeal_calendar);
                while($rs_subdeal_calendar=$result_subdeal_calendar->fetch_assoc()){  $i++;

                     $subdeal_code=$rs_subdeal_calendar['subdeal_code'];
                     $ex_list_listing_code=$rs_subdeal_calendar['ex_list_listing_code'];
                     $s_calendar_note=$rs_subdeal_calendar['s_calendar_note'];
                     $s_calendar_date=$rs_subdeal_calendar['s_calendar_date']; 
                     $s_calendar_time_start=$rs_subdeal_calendar['s_calendar_time_start'];
                     $s_calendar_time_end=$rs_subdeal_calendar['s_calendar_time_end']; 
                     $s_calendar_create=$rs_subdeal_calendar['s_calendar_create']; 
                     $s_calendar_chance=$rs_subdeal_calendar['s_calendar_chance']; 
                     $s_calendar_file=$rs_subdeal_calendar['s_calendar_file']; 

                   $sql_subdeal="SELECT subdeal.ex_list_listing_code , subdeal.color  FROM dbo_subdeal AS subdeal 
                                  WHERE subdeal.subdeal_code='$subdeal_code' 
                                  order by subdeal.subdeal_create_date DESC LIMIT 1 "; 
                   $result_subdeal= $conn->query($sql_subdeal);
                   $rs_subdeal=$result_subdeal->fetch_assoc();
 
                   $color=$rs_subdeal['color'];

                    /////////////////////////////////////////
                    $sql_listing="SELECT project_id ,ex_list_floor ,ex_list_sqm ,ex_list_view ,ex_list_bedroom ,ex_list_bathroom , ex_list_total_floors
                                        ex_list_other_room , ex_list_parking , ex_list_price , ex_list_listing_type , ex_list_rai , ex_list_ngan , ex_list_wa 
                                 FROM dbo_data_excel_listing
                                 WHERE  ex_list_listing_code='$ex_list_listing_code'  LIMIT 1 ";   
                    $result_listing= $conn->query($sql_listing);
                    $rs_listing=$result_listing->fetch_assoc();

                     $project_id=$rs_listing['project_id'];
                     $ex_list_floor=$rs_listing['ex_list_floor'];
                     $ex_list_sqm=$rs_listing['ex_list_sqm'];
                     $ex_list_view=$rs_listing['ex_list_view']; 
                     $ex_list_bedroom=$rs_listing['ex_list_bedroom'];
                     $ex_list_bathroom=$rs_listing['ex_list_bathroom'];
                     $ex_list_other_room=$rs_listing['ex_list_other_room'];
                     $ex_list_parking=$rs_listing['ex_list_parking'];              
                     $ex_list_price=$rs_listing['ex_list_price'];
                     $ex_list_listing_type=$rs_listing['ex_list_listing_type'];
                     $ex_list_total_floors=$rs_listing['ex_list_total_floors'];
                     $ex_list_rai=$rs_listing['ex_list_rai'];
                     $ex_list_ngan=$rs_listing['ex_list_ngan'];
                     $ex_list_wa=$rs_listing['ex_list_wa'];

                   /////////////////////////////////////////

                    $sql_project="SELECT project_type , project_name_en FROM type_project WHERE  project_id='$project_id'  LIMIT 1 ";   
                    $result_project= $conn->query($sql_project);
                    $rs_project=$result_project->fetch_assoc();

                     $project_type=$rs_project['project_type'];
                     $project_name=$rs_project['project_name_en']; 


                   /////////////////////////////////////////
 

             
                 if($ex_list_listing_type=='1' or $ex_list_floor=='' or $ex_list_floor=='0'){ 

                           $ex_list_floor_th=$ex_list_floor." fl";             

                 } 


                   $area_th=$ex_list_rai." ไร่ - ".$ex_list_ngan." งาน - ".$ex_list_wa." วา";
                   $area_en=$ex_list_rai." - ".$ex_list_ngan." - ".$ex_list_wa." ";

                   if($ex_list_sqm!=''){ $ex_list_sqm_th=$ex_list_sqm." sqm."; }
                   if($ex_list_bedroom!=''){ 
                           if($ex_list_bedroom=='0'){  $ex_list_bedroom_th="Studio";  
                           }else{  $ex_list_bedroom_th=$ex_list_bedroom."b";   }
                   }
                   if($ex_list_bathroom!=''){ $ex_list_bathroom_th=$ex_list_bathroom."b";    }
                   if($ex_list_floor!=''){ $ex_list_floor=$ex_list_floor." "; }
                   if($ex_list_total_floors!=''){ $ex_list_total_floors_th=$ex_list_total_floors." ชั้น"; }



                 if($ex_list_listing_type!='12'){
                       
                           $detail_1=$ex_list_bedroom_th." ".$ex_list_bathroom_th." , ".$ex_list_floor_th." , ".$ex_list_sqm_th;

                 }else{

                 }

                $year=substr($s_calendar_date,0 , 4 );
                $month=substr($s_calendar_date,5 , 2 );
                $day=substr($s_calendar_date,8 , 2 );

                $s_calendar_time_start_c=substr($s_calendar_time_start,0 , 5 );
                $s_calendar_time_end_c=substr($s_calendar_time_end,0 , 5 );

                $date=$day."/".$month."/".$year." เวลา".$s_calendar_time_start_c."-".$s_calendar_time_end_c;

                $year=substr($s_calendar_create,0 , 4 );
                $month=substr($s_calendar_create,5 , 2 );
                $day=substr($s_calendar_create,8 , 2 );
                $time_s=substr($s_calendar_create,11 , 8 );

                $s_calendar_create=$day."/".$month."/".$year." เวลา : ".$time_s;



          ?>
  


                                      <!-- DIRECT CHAT SUCCESS -->
            <div class="card card-outline direct-chat direct-chat-success collapsed-card" style="margin:5px; font-size: 14px; background-color: <?php echo $color;?>;   ">
              <div class="card-header">
                <table style="width: 100%;">
                 <tr>
                    <td>  <?php  echo $project_name;?> <br>  </td>
                    <td style="width: 35px;text-align: right;">

  
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fa fa-picture-o"></i>
                        </button>
                               

                    </td>
                  </tr>
                </table> 

                             <a href="?page=upload_file_excel_check_view&listing=<?php echo $ex_list_listing_code;?>&deal=view" target="_black" >
                             <?php echo $ex_list_listing_code;?></a> <?php echo $detail_1;?> <br>
                             <?php echo number_format($ex_list_price)." Baht";?>
                            <hr>                        
                             <?php if($s_calendar_note!=''){ echo $s_calendar_note."<br>"; } ?>                       
                             <i class="fa fa-clock-o"></i> <?php echo $s_calendar_create;?>
              </div>
              <!-- /.card-header -->
              <div class="card-body" >
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages" style="height: 300px;" > 

                          <img src="file/create_deal/<?php echo $s_calendar_file;?>"  style=" width: 100%; " >
                                  

                  <!-- /.direct-chat-msg -->
                </div>
                <!--/.direct-chat-messages-->

                <!-- Contacts are loaded here -->
       
                <!-- /.direct-chat-pane -->
              </div>
              <!-- /.card-body -->
              
              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->
                  
            <?php }  ?>


        </div>

<?php } ?>

        <div class="card card-row card-success" style="width: <?php echo $size_w;?>;">
          <div class="card-header" style="background-color: #806000;">
            <h3 class="card-title" >
              Close Win
            </h3>
          </div>
 
 

               <?php
                $sql_subdeal_calendar="SELECT subdeal_code , ex_list_listing_code , s_calendar_note ,s_calendar_date ,s_calendar_time_start ,s_calendar_time_end ,
                                              s_calendar_create ,s_calendar_chance , s_calendar_file
                                      FROM dbo_subdeal_calendar  WHERE  create_deal_code='$code' and s_calendar_status='8' order by s_calendar_create DESC   LIMIT 50   "; 
                $result_subdeal_calendar= $conn->query($sql_subdeal_calendar);
                while($rs_subdeal_calendar=$result_subdeal_calendar->fetch_assoc()){  $i++;

                     $subdeal_code=$rs_subdeal_calendar['subdeal_code'];
                     $ex_list_listing_code=$rs_subdeal_calendar['ex_list_listing_code'];
                     $s_calendar_note=$rs_subdeal_calendar['s_calendar_note'];
                     $s_calendar_date=$rs_subdeal_calendar['s_calendar_date']; 
                     $s_calendar_time_start=$rs_subdeal_calendar['s_calendar_time_start'];
                     $s_calendar_time_end=$rs_subdeal_calendar['s_calendar_time_end']; 
                     $s_calendar_create=$rs_subdeal_calendar['s_calendar_create']; 
                     $s_calendar_chance=$rs_subdeal_calendar['s_calendar_chance']; 
                     $s_calendar_file=$rs_subdeal_calendar['s_calendar_file']; 

                   $sql_subdeal="SELECT subdeal.ex_list_listing_code , subdeal.color  FROM dbo_subdeal AS subdeal 
                                  WHERE subdeal.subdeal_code='$subdeal_code' 
                                  order by subdeal.subdeal_create_date DESC LIMIT 1 "; 
                   $result_subdeal= $conn->query($sql_subdeal);
                   $rs_subdeal=$result_subdeal->fetch_assoc();
 
                   $color=$rs_subdeal['color'];

                    /////////////////////////////////////////
                    $sql_listing="SELECT project_id ,ex_list_floor ,ex_list_sqm ,ex_list_view ,ex_list_bedroom ,ex_list_bathroom , ex_list_total_floors
                                        ex_list_other_room , ex_list_parking , ex_list_price , ex_list_listing_type , ex_list_rai , ex_list_ngan , ex_list_wa 
                                 FROM dbo_data_excel_listing
                                 WHERE  ex_list_listing_code='$ex_list_listing_code'  LIMIT 1 ";   
                    $result_listing= $conn->query($sql_listing);
                    $rs_listing=$result_listing->fetch_assoc();

                     $project_id=$rs_listing['project_id'];
                     $ex_list_floor=$rs_listing['ex_list_floor'];
                     $ex_list_sqm=$rs_listing['ex_list_sqm'];
                     $ex_list_view=$rs_listing['ex_list_view']; 
                     $ex_list_bedroom=$rs_listing['ex_list_bedroom'];
                     $ex_list_bathroom=$rs_listing['ex_list_bathroom'];
                     $ex_list_other_room=$rs_listing['ex_list_other_room'];
                     $ex_list_parking=$rs_listing['ex_list_parking'];              
                     $ex_list_price=$rs_listing['ex_list_price'];
                     $ex_list_listing_type=$rs_listing['ex_list_listing_type'];
                     $ex_list_total_floors=$rs_listing['ex_list_total_floors'];
                     $ex_list_rai=$rs_listing['ex_list_rai'];
                     $ex_list_ngan=$rs_listing['ex_list_ngan'];
                     $ex_list_wa=$rs_listing['ex_list_wa'];
                   /////////////////////////////////////////

                    $sql_project="SELECT project_type , project_name_en FROM type_project WHERE  project_id='$project_id'  LIMIT 1 ";   
                    $result_project= $conn->query($sql_project);
                    $rs_project=$result_project->fetch_assoc();

                     $project_type=$rs_project['project_type'];
                     $project_name=$rs_project['project_name_en']; 


                   /////////////////////////////////////////

             
                 if($ex_list_listing_type=='1' or $ex_list_floor=='' or $ex_list_floor=='0'){ 

                           $ex_list_floor_th=$ex_list_floor." fl";             

                 } 


                   $area_th=$ex_list_rai." ไร่ - ".$ex_list_ngan." งาน - ".$ex_list_wa." วา";
                   $area_en=$ex_list_rai." - ".$ex_list_ngan." - ".$ex_list_wa." ";

                   if($ex_list_sqm!=''){ $ex_list_sqm_th=$ex_list_sqm." sqm."; }
                   if($ex_list_bedroom!=''){ 
                           if($ex_list_bedroom=='0'){  $ex_list_bedroom_th="Studio";  
                           }else{  $ex_list_bedroom_th=$ex_list_bedroom."b";   }
                   }
                   if($ex_list_bathroom!=''){ $ex_list_bathroom_th=$ex_list_bathroom."b";    }
                   if($ex_list_floor!=''){ $ex_list_floor=$ex_list_floor." "; }
                   if($ex_list_total_floors!=''){ $ex_list_total_floors_th=$ex_list_total_floors." ชั้น"; }



                 if($ex_list_listing_type!='12'){
                       
                           $detail_1=$ex_list_bedroom_th." ".$ex_list_bathroom_th." , ".$ex_list_floor_th." , ".$ex_list_sqm_th;

                 }else{

                 }

                $year=substr($s_calendar_date,0 , 4 );
                $month=substr($s_calendar_date,5 , 2 );
                $day=substr($s_calendar_date,8 , 2 );

                $s_calendar_time_start_c=substr($s_calendar_time_start,0 , 5 );
                $s_calendar_time_end_c=substr($s_calendar_time_end,0 , 5 );

                $date=$day."/".$month."/".$year." เวลา".$s_calendar_time_start_c."-".$s_calendar_time_end_c;

                $year=substr($s_calendar_create,0 , 4 );
                $month=substr($s_calendar_create,5 , 2 );
                $day=substr($s_calendar_create,8 , 2 );
                $time_s=substr($s_calendar_create,11 , 8 );

                $s_calendar_create=$day."/".$month."/".$year." เวลา : ".$time_s;


          ?>
  


                                      <!-- DIRECT CHAT SUCCESS -->
            <div class="card card-outline direct-chat direct-chat-success collapsed-card" style="margin:5px; font-size: 14px; background-color: <?php echo $color;?>;  ">
              <div class="card-header">
 
                <table style="width: 100%;">
                 <tr>
                    <td>  <?php  echo $project_name;?> <br>  </td>
                    <td style="width: 97px;">
                    <!--
                          <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-calendar<?php echo $i;?>" title="นัดเซ็นสัญญา">
                            <i class="fa fa-arrow-right"></i>
                          </button>                  
                          <button type="button" class="btn btn-tool" title="แก้ไขข้อมูล" data-toggle="modal" data-target="#modal-edit<?php echo $i;?>" >
                            <i class="fas fa-sticky-note"></i>
                          </button>  
                          <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-closelost<?php echo $i;?>" title="ยกเลิกดีล">
                            <i class="fas fa-times"></i>
                          </button> -->
                       

                    </td>
                  </tr>
                </table> 

                             <a href="?page=upload_file_excel_check_view&listing=<?php echo $ex_list_listing_code;?>&deal=view" target="_black" >
                             <?php echo $ex_list_listing_code;?></a> <?php echo $detail_1;?> <br>
                             <?php echo number_format($ex_list_price)." Baht";?>
                             <hr>                        
                             <?php if($s_calendar_note!=''){ echo $s_calendar_note."<br>"; } ?>                                    
                             <i class="fa fa-clock-o"></i> <?php echo $s_calendar_create;?>

              </div>
              <!-- /.card-header -->
              <div class="card-body" >
           
              </div>
              <!-- /.card-body -->
              
              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->
                  
            <?php }  ?>


           

          <div class="card-header" style="background-color: #806000;">
            <h3 class="card-title" >
              Close Lost
            </h3>
          </div>
 
           

               <?php
                $sql_subdeal_calendar="SELECT subdeal_code , ex_list_listing_code , s_calendar_note ,s_calendar_date ,s_calendar_time_start ,s_calendar_time_end ,
                                              s_calendar_create ,s_calendar_chance , s_calendar_file
                                      FROM dbo_subdeal_calendar  WHERE  create_deal_code='$code' and s_calendar_status='9' order by s_calendar_create DESC   LIMIT 50   "; 
                $result_subdeal_calendar= $conn->query($sql_subdeal_calendar);
                while($rs_subdeal_calendar=$result_subdeal_calendar->fetch_assoc()){  $i++;

                     $subdeal_code=$rs_subdeal_calendar['subdeal_code'];
                     $ex_list_listing_code=$rs_subdeal_calendar['ex_list_listing_code'];
                     $s_calendar_note=$rs_subdeal_calendar['s_calendar_note'];
                     $s_calendar_date=$rs_subdeal_calendar['s_calendar_date']; 
                     $s_calendar_time_start=$rs_subdeal_calendar['s_calendar_time_start'];
                     $s_calendar_time_end=$rs_subdeal_calendar['s_calendar_time_end']; 
                     $s_calendar_create=$rs_subdeal_calendar['s_calendar_create']; 
                     $s_calendar_chance=$rs_subdeal_calendar['s_calendar_chance']; 
                     $s_calendar_file=$rs_subdeal_calendar['s_calendar_file']; 

                   $sql_subdeal="SELECT subdeal.ex_list_listing_code , subdeal.color  FROM dbo_subdeal AS subdeal 
                                  WHERE subdeal.subdeal_code='$subdeal_code' 
                                  order by subdeal.subdeal_create_date DESC LIMIT 1 "; 
                   $result_subdeal= $conn->query($sql_subdeal);
                   $rs_subdeal=$result_subdeal->fetch_assoc();
 
                   $color=$rs_subdeal['color'];

                    /////////////////////////////////////////
                    $sql_listing="SELECT project_id ,ex_list_floor ,ex_list_sqm ,ex_list_view ,ex_list_bedroom ,ex_list_bathroom , ex_list_total_floors
                                        ex_list_other_room , ex_list_parking , ex_list_price , ex_list_listing_type , ex_list_rai , ex_list_ngan , ex_list_wa 
                                 FROM dbo_data_excel_listing
                                 WHERE  ex_list_listing_code='$ex_list_listing_code'  LIMIT 1 ";   
                    $result_listing= $conn->query($sql_listing);
                    $rs_listing=$result_listing->fetch_assoc();

                     $project_id=$rs_listing['project_id'];
                     $ex_list_floor=$rs_listing['ex_list_floor'];
                     $ex_list_sqm=$rs_listing['ex_list_sqm'];
                     $ex_list_view=$rs_listing['ex_list_view']; 
                     $ex_list_bedroom=$rs_listing['ex_list_bedroom'];
                     $ex_list_bathroom=$rs_listing['ex_list_bathroom'];
                     $ex_list_other_room=$rs_listing['ex_list_other_room'];
                     $ex_list_parking=$rs_listing['ex_list_parking'];              
                     $ex_list_price=$rs_listing['ex_list_price'];
                     $ex_list_listing_type=$rs_listing['ex_list_listing_type'];
                     $ex_list_total_floors=$rs_listing['ex_list_total_floors'];
                     $ex_list_rai=$rs_listing['ex_list_rai'];
                     $ex_list_ngan=$rs_listing['ex_list_ngan'];
                     $ex_list_wa=$rs_listing['ex_list_wa'];
                   /////////////////////////////////////////

                    $sql_project="SELECT project_type , project_name_en FROM type_project WHERE  project_id='$project_id'  LIMIT 1 ";   
                    $result_project= $conn->query($sql_project);
                    $rs_project=$result_project->fetch_assoc();

                     $project_type=$rs_project['project_type'];
                     $project_name=$rs_project['project_name_en']; 


                   /////////////////////////////////////////

                 
             
                 if($ex_list_listing_type=='1' or $ex_list_floor=='' or $ex_list_floor=='0'){ 

                           $ex_list_floor_th=$ex_list_floor." fl";             

                 } 


                   $area_th=$ex_list_rai." ไร่ - ".$ex_list_ngan." งาน - ".$ex_list_wa." วา";
                   $area_en=$ex_list_rai." - ".$ex_list_ngan." - ".$ex_list_wa." ";

                   if($ex_list_sqm!=''){ $ex_list_sqm_th=$ex_list_sqm." sqm."; }
                   if($ex_list_bedroom!=''){ 
                           if($ex_list_bedroom=='0'){  $ex_list_bedroom_th="Studio";  
                           }else{  $ex_list_bedroom_th=$ex_list_bedroom."b";   }
                   }
                   if($ex_list_bathroom!=''){ $ex_list_bathroom_th=$ex_list_bathroom."b";    }
                   if($ex_list_floor!=''){ $ex_list_floor=$ex_list_floor." "; }
                   if($ex_list_total_floors!=''){ $ex_list_total_floors_th=$ex_list_total_floors." ชั้น"; }



                 if($ex_list_listing_type!='12'){
                       
                           $detail_1=$ex_list_bedroom_th." ".$ex_list_bathroom_th." , ".$ex_list_floor_th." , ".$ex_list_sqm_th;

                 }else{

                 }

                $year=substr($s_calendar_date,0 , 4 );
                $month=substr($s_calendar_date,5 , 2 );
                $day=substr($s_calendar_date,8 , 2 );

                $s_calendar_time_start_c=substr($s_calendar_time_start,0 , 5 );
                $s_calendar_time_end_c=substr($s_calendar_time_end,0 , 5 );

                $date=$day."/".$month."/".$year." เวลา".$s_calendar_time_start_c."-".$s_calendar_time_end_c;

                $year=substr($s_calendar_create,0 , 4 );
                $month=substr($s_calendar_create,5 , 2 );
                $day=substr($s_calendar_create,8 , 2 );
                $time_s=substr($s_calendar_create,11 , 8 );

                $s_calendar_create=$day."/".$month."/".$year." เวลา : ".$time_s;


          ?>
  


                                      <!-- DIRECT CHAT SUCCESS -->
            <div class="card card-outline direct-chat direct-chat-success collapsed-card" style="margin:5px; font-size: 14px; background-color: <?php echo $color;?>;   ">
              <div class="card-header">
                <table style="width: 100%;">
                 <tr>
                    <td>  <?php  echo $project_name;?> <br>  </td>
                    <td  > </td>
                  </tr>
                </table> 

                             <a href="?page=upload_file_excel_check_view&listing=<?php echo $ex_list_listing_code;?>&deal=view" target="_black" >
                             <?php echo $ex_list_listing_code;?></a> <?php echo $detail_1;?> <br>
                             <?php echo number_format($ex_list_price)." Baht";?>
                             <hr>                        
                             <?php if($s_calendar_note!=''){ echo $s_calendar_note."<br>"; } ?>                             
                             <i class="fa fa-clock-o"></i> <?php echo $s_calendar_create;?>
              </div>
              <!-- /.card-header -->
              <div class="card-body" >
           
              </div>
              <!-- /.card-body -->
              
              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->
                  
            <?php }  ?>
 

        </div>
      </div>
    </section>

</div>

            
  <?php } ?>

<!-- END NOTE  -->


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
  

  <?php if($d_check=='1'){ ?>



    <!-- Main content -->
    <section class="content" <?php if($contact_deal_win=='8' or $contact_deal_win=='9'){?> hidden <?php } ?>>
      <div class="container-fluid">
        <div class="row">
 
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                 <h4>โครงการที่เกี่ยวข้อง</h4>

                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link <?php if($check_p=='' or $check_p=='1'){?> active <?php } ?>" href="#listing" data-toggle="tab">ตรงตามความต้องการ</a></li>
                  <li class="nav-item"><a class="nav-link <?php if($check_p=='2'){?> active <?php } ?>" href="#listing2" data-toggle="tab">ใกล้เคียงความต้องการ</a></li> 
                  
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">

                <div class="tab-content">
                  
                <!-- /.listing -->
                  <div class="<?php if($check_p=='' or $check_p=='1'){?> active <?php } ?> tab-pane" id="listing">
 

                    <div class="row">


 
  <?php

 
 /*
     $buyer_contact_code=$rs['buyer_contact_code'];
     $create_deal_attention=$rs['create_deal_attention'];
     $create_deal_type=$rs['create_deal_type'];
     $create_deal_budget_start=$rs['create_deal_budget_start'];
     $create_deal_budget_end=$rs['create_deal_budget_end'];
     $project_id=$rs['project_id'];
     $zone_id=$rs['zone_id'];
     $station_id=$rs['station_id'];
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

          if($create_deal_attention_2=='0' and $create_deal_type_2=='0'){


                 $create_deal_type_2=$rs['create_deal_type'];
                 $create_deal_budget_start_2=$rs['create_deal_budget_start'];
                 $create_deal_budget_end_2=$rs['create_deal_budget_end'];
                 $project_id_2=$rs['project_id'];
                 $zone_id_2=$rs['zone_id'];
                 $station_id_2=$rs['station_id'];
                 $create_deal_bedroom_2=$rs['create_deal_bedroom'];
                 $create_deal_bathroom_2=$rs['create_deal_bathroom'];
                 $create_deal_sqm_start_2=$rs['create_deal_sqm_start'];
                 $create_deal_sqm_end_2=$rs['create_deal_sqm_end'];
                 $create_deal_select_floor_2=$rs['create_deal_select_floor'];
                 $create_deal_floor_2=$rs['create_deal_floor']; 
  
          }   */


 


    if($create_deal_bathroom_2=='0'){  $create_deal_bathroom_2='';  }

    if($create_deal_attention_2=='4'){  $create_deal_attention_2='2';  }

    
    if($create_deal_budget_end_2=='0'){
             $create_deal_budget_end_2=999999999999;
    }

    if($create_deal_sqm_end_2=='0'){
             $create_deal_sqm_end_2=999999999999;     
    }

    if($create_deal_sqm_start_2=='0'){
             $create_deal_sqm_start_2=0;     
    }else{            
    } 

   // เลือกชั้น ต่ำกว่า สูงกว่า

    if($create_deal_select_floor_2=='1'){
          
          $select_floor=" and data.ex_list_floor<=$create_deal_floor_2   ";

    }else if($create_deal_select_floor_2=='2'){

          $select_floor=" and data.ex_list_floor>=$create_deal_floor_2   ";

    }else{
          $select_floor=" ";
    }
    // END เลือกชั้น ต่ำกว่า สูงกว่า


     /////////////// พื้นที่ต่ำสุด ////////////////

     if($create_deal_sqm_start_2!=''){
           $s_sqm_low=" and data.ex_list_sqm>=$create_deal_sqm_start_2  ";
     }else{   $s_sqm_low="";  }


     /////////////// พื้นที่สูงสุด ////////////////

     if($create_deal_sqm_end_2!=''){
           $s_sqm_maximum="  and  data.ex_list_sqm<=$create_deal_sqm_end_2 ";
     }else{   $s_sqm_maximum="";  }

     /////////////// ราคาต่ำสุด ////////////////

     if($create_deal_budget_start!=''){
           $s_price_low="  and  data.ex_list_price>=$create_deal_budget_start_2 ";
     }else{   $s_price_low="";  }


     /////////////// ราคาสูงสุด //////////////// 

     if($create_deal_budget_end_2!=''){
           $s_price_maximum=" and data.ex_list_price<=$create_deal_budget_end_2  ";
     }else{   $s_price_maximum="";  }


     /////////////// จำนวนห้องนอน ////////////////

     if($create_deal_bedroom_2!=''){ 
            $s_bedroom=" and data.ex_list_bedroom='$create_deal_bedroom_2' ";  
     }else{    $s_bedroom="";  }


   /////////////// จำนวนห้องน้ำ  ////////////////

     if($create_deal_bathroom_2!=''){ 
            $s_bathroom=" and data.ex_list_bathroom='$create_deal_bathroom_2' ";  
     }else{    $s_bathroom="";  }


     /////////////// ประเภท ดีล ขายเช่า ////////////////

     if($create_deal_attention_2!=''){ 
            $s_deal="  and data.ex_list_deal_type='$create_deal_attention_2'  ";  
     }else{    $s_deal="";  } 


     /////////////// ประเภท คอนโด ทาวน์เฮ็าส์ ////////////////

     if($create_deal_type_2!=''){
            $s_type=" and data.ex_list_listing_type='$create_deal_type_2' "; 
     }else{    $s_type="";  }

  
    if($create_deal_search_from==1){

          $project_check=" and data.project_id='$project_id_2'   ";

     

    }else if($create_deal_search_from==2){   

               $project_check=" and data.ex_list_train_station='$station_id_2'    "; 

    }else if($create_deal_search_from==3){   

               $project_check=" and data.zone_id='$zone_id_2'      ";
          
    }else{

         if($project_id_2!=''){

               $project_check=" and data.project_id='$project_id_2'     ";

         }else{

               $project_check=" and data.ex_list_train_station='$station_id_2'    ";
         }
 
    }

/*
 
    echo "project_check : ".$project_check."<br>"; 
   echo "project_id : ".$project_id_2."<br>";
   echo "project_id : ".$station_id_2."<br>";
   echo "create_deal_sqm_start : ".$create_deal_sqm_start_2."<br>";
    echo "create_deal_sqm_end : ".$create_deal_sqm_end_2."<br>";
    echo "create_deal_budget_start : ".$create_deal_budget_start_2."<br>";
    echo "create_deal_budget_end : ".$create_deal_budget_end_2."<br>";
    echo "create_deal_bedroom : ".$create_deal_bedroom_2."<br>";
    echo "create_deal_bathroom : ".$create_deal_bathroom_2."<br>";
    echo "create_deal_attention : ".$create_deal_attention_2."<br>";
    echo "ex_list_listing_type : ".$ex_list_listing_type_2."<br>";
    echo "create_deal_type : ".$create_deal_type_2."<br>";   
      echo "create_deal_search_from : ".$create_deal_search_from."<br>";   
      echo "station_id_2 : ".$station_id_2."<br>";   
      echo "create_deal_type : ".$create_deal_type_2."<br>";     
    echo "project_id_check : ".$project_id_check."<br>";   
    echo "zone_id_2 : ".$zone_id_2."<br>";   
    echo "create_deal_search_from : ".$create_deal_search_from."<br>";   */  

if($project_id_check=='0' and $create_deal_search_from=='0' or 
    $project_id_2=='0' and $create_deal_search_from=='1'  or 
    $station_id_2=='0' and $create_deal_search_from=='2'  or 
    $zone_id_2=='0' and $create_deal_search_from=='3') {

}else{

         
               $search_all_s="           
                          (
                          data.ex_list_listing_status='' 
                          $s_sqm_low  $s_sqm_maximum  $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check  $s_bedroom   $s_bathroom  $s_deal  $select_floor $s_type  
                          )  
                          or
                          (
                          data.ex_list_listing_status='1'
                          $s_sqm_low  $s_sqm_maximum  $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check  $s_bedroom   $s_bathroom  $s_deal  $select_floor $s_type  
                          )                 
                          or
                          (
                          data.ex_list_listing_status='3'  and data.ex_list_rent_till_date<='$calExpireDate'
                          $s_sqm_low  $s_sqm_maximum  $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check  $s_bedroom   $s_bathroom  $s_deal   $select_floor $s_type  
                          )            
                          or
                          (
                          data.ex_list_listing_status='7'
                          $s_sqm_low  $s_sqm_maximum  $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check  $s_bedroom   $s_bathroom  $s_deal   $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='8'
                          $s_sqm_low  $s_sqm_maximum  $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check  $s_bedroom   $s_bathroom  $s_deal   $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='9' 
                          $s_sqm_low  $s_sqm_maximum  $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check  $s_bedroom   $s_bathroom  $s_deal   $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='10'
                          $s_sqm_low  $s_sqm_maximum  $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check  $s_bedroom   $s_bathroom  $s_deal   $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='11'                           
                          $s_sqm_low  $s_sqm_maximum  $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check  $s_bedroom   $s_bathroom  $s_deal   $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='12'
                          $s_sqm_low  $s_sqm_maximum  $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check  $s_bedroom   $s_bathroom  $s_deal   $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='13' 
                          $s_sqm_low  $s_sqm_maximum  $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check  $s_bedroom   $s_bathroom  $s_deal   $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='14' 
                          $s_sqm_low  $s_sqm_maximum  $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check  $s_bedroom   $s_bathroom  $s_deal   $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='15' and data.ex_list_rent_till_date<='$calExpireDate'
                          $s_sqm_low  $s_sqm_maximum  $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check  $s_bedroom   $s_bathroom  $s_deal   $select_floor $s_type  
                          )
                             ";

 // echo "----".$search_all_s;  

 ?>


                         <div class="col-md-12" style="padding: 10px;"><center><a   onclick="window.open('page/deal_map.php?listing=1&code=<?php echo $code;?>', '_blank', 'location=yes,height=650,width=1300,scrollbars=yes,status=yes');"style="cursor:pointer;"    ><img src="img/icon_googlemap.png" width="70"></a></center> <br></div>


<?php

    $set_s_text=" data.ex_list_date_update DESC , data.ex_list_premium DESC ,data.ex_list_img_score DESC ";

     $sql="SELECT Distinct data.project_id    
                   FROM dbo_data_excel_listing AS data 
                    where  $search_all_s  order by $set_s_text   ";  
     $result = $conn->query($sql);

 
     if($result->num_rows > 0) { //num_rows
        // output data of each row
         while($rs_listing_1=$result->fetch_assoc()) {
 
  
               isset( $rs_listing_1['project_id'] ) ? $project_id = $rs_listing_1['project_id'] : $project_id = ""; 
            
               if($project_id!='0'){

                   $sql_project="SELECT project_name_en , project_train_station , zone_id , project_total_floors ,project_map , project_listing_count , project_completed
                                 FROM type_project WHERE project_id='$project_id' ";  
                   $result_project= $conn->query($sql_project);
                   $rs_project=$result_project->fetch_assoc();
 
                     isset( $rs_project['project_name_en'] ) ? $project_name = $rs_project['project_name_en'] : $project_name = "";
                     isset( $rs_project['project_train_station'] ) ? $project_train_station = $rs_project['project_train_station'] : $project_train_station = "";  
                     isset( $rs_project['zone_id'] ) ? $zone_id = $rs_project['zone_id'] : $zone_id = ""; 
                     isset( $rs_project['project_total_floors'] ) ? $project_total_floors = $rs_project['project_total_floors'] : $project_total_floors = ""; 
                     isset( $rs_project['project_map'] ) ? $project_map = $rs_project['project_map'] : $project_map = ""; 
                     isset( $rs_project['project_listing_count'] ) ? $project_listing_count = $rs_project['project_listing_count'] : $project_listing_count = "";                 
                     isset( $rs_project['project_completed'] ) ? $project_completed = $rs_project['project_completed'] : $project_completed = "";    

                     if($project_completed!=''){
                          $project_completed=$project_completed+543;
                     }else{
                          $project_completed="ไม่ระบุ";
                     }      



                     // ภาพ Project 
                     $sql_img="SELECT project_img_folder ,project_img_name ,project_img_id FROM type_project_img where project_id='$project_id' order by project_img_no ASC LIMIT 1"; 
                     $result_img=$conn->query($sql_img); 
                     $rs_img=$result_img->fetch_assoc();

                     isset( $rs_img['project_img_folder'] ) ? $project_img_folder = $rs_img['project_img_folder'] : $project_img_folder = ""; 
                     isset( $rs_img['project_img_name'] ) ? $project_img_name = $rs_img['project_img_name'] : $project_img_name = ""; 
                     isset( $rs_img['project_img_id'] ) ? $project_img_id = $rs_img['project_img_id'] : $project_img_id = ""; 

                         if($project_img_name!=''){ 

                             $project_img_folder="../../images/project/$project_id/mini_w300/".$project_img_name; 

                         }else{ // ถ้าไม่มีภาพ ให้ใช้ภาพของ Listing

                             $project_img_folder="../../images/noimages.jpg"; 
                         }


               }

               
               if($project_train_station!=''){
               
                       /////////// type_train_station ////////////////
                       $sql_train="SELECT * FROM type_train_station where station_id='$project_train_station' ";  
                       $result_train= $conn->query($sql_train);
                       $rs_train=$result_train->fetch_assoc(); 

                       $station_name_1=$rs_train['station_train'];
                       $station_name_en_1=$rs_train['station_name_en'];
            
                       if($station_name_1!=''){ $project_train_station_1=$rs_train['station_train']." | ".$rs_train['station_name_en'];}
                      /////////// End type_train_station ////////////////
                }


                if($zone_id!=''){
                      /////////// zone id ////////////////
                       $sql_zone1="SELECT * FROM type_zone where zone_id='$zone_id' ";  
                       $result_zone1= $conn->query($sql_zone1);
                       $rs_zone1=$result_zone1->fetch_assoc(); 

                       $zone_name=$rs_zone1['zone_name'];
                       $zone_name_en=$rs_zone1['zone_name_en'];
                       
                       if($zone_name!=''){ $project_zone1=$rs_zone1['zone_name'];}

                       if($zone_id=='0') { $project_zone1="0";}
 
                       /////////// END zone id ////////////////
                }
 

             $project_check_s=" data.project_id='$project_id_2' and  ";

/*
             $sql_new_deal_1="SELECT listing_new_deal_check_id  FROM dbo_listing_new_deal_check where create_deal_code='$code' and project_id='$project_id_2' and listing_new_deal_check_status='1' ";  
             $result_new_deal_1= $conn->query($sql_new_deal_1);
             $rs_new_deal_1=$result_new_deal_1->fetch_assoc(); 

             $count_new_1=$result_new_deal_1->num_rows ;*/


   ?> 

                   <?php if($project_id!='' and $project_id!='0' ) { ?>     


                    <div class="col-md-3">
                     
                      <!-- Widget: user widget style 2 -->
                      <div class="card card-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-success">
          



                          <div class="row" style="font-size: 12px;" >   

                                <div class="col-sm-12 col-md-4" >
                                   <a onclick="window.open('page/listing_deal_buyer.php?code=<?php echo $code;?>&project=<?php echo $project_id;?>&check_p=1&d_check=1', '_blank', 'location=yes,height=650,width=1300,scrollbars=yes,status=yes');"style="cursor:pointer;"  >
                                      <img src="<?php echo $project_img_folder;?>" alt="--" style="width: 100%; height: 105px;" >
                                   </a><br>
                        <?php if($project_id!='' and $project_id!='0' ) { ?>
                                   <center>จำนวนทรัพย์ : <?php echo $project_listing_count;?></center> 
                         <?php } ?>
                                </div>
                              
                                <div class="col-sm-12 col-md-8" >
                                     

                                             <?php if($project_id!='' and $project_id!='0' ) { ?>

                                                  <b>โครงการ : </b> <?php echo $project_name;?> <br>
                                                  <b>จำนวนชั้น : </b> <?php echo $project_total_floors;?><br>
                                                  <b>สถานีรถไฟฟ้า : </b> <?php echo $project_train_station_1;?><br>
                                                  <b>โซน : </b> <?php echo $project_zone1;?><br>
                                                  <b>ปีที่สร้าง : </b> <?php echo $project_completed;?><br> 
                                                  <b>แผนที่ : </b> <a href="<?php echo $project_map;?>" target="_black" >คลิกดูแผนที่</a>
                                     
                                              <?php }else{ ?>

                                                <!--  <a onclick="window.open('page/listing_deal_buyer.php?code=<?php echo $code;?>&project=<?php echo $project_id;?>&check_p=1&d_check=1', '_blank', 'location=yes,height=650,width=1300,scrollbars=yes,status=yes');"style="cursor:pointer;"  >
                                      
                                                    <b style="font-size: 30px;text-align: center;">Listing <br>ไม่มีโครงการ </b> </a>-->

                                              <?php } ?>

                                              <!--<br>ราคาเฉลี่ย <?php echo $price_avg;?>-->
                                     
                                </div>
                          </div>

                        </div>
        
                      </div>
                      <!-- /.widget-user --> 
               
                    </div>

                   <?php } ?> 
 

    <?php       } 
          } // END num_rows  


}   ?>




                    </div>
                    <!-- / row / -->
            
                  </div>
                  <!-- /.tab-pane -->


                  <div class="<?php if($check_p=='2'){?> active <?php } ?> tab-pane" id="listing2">

                    <div class="row">

<?php    

    if($create_deal_bathroom_2=='0'){  $create_deal_bathroom_2='';  }
    
    if($create_deal_budget_end_2=='0'){

    }else{
             $budget_s=$create_deal_budget_end_2*30/100;
             $create_deal_budget_end_s=$create_deal_budget_end_2+$budget_s;
    }
  
    if($create_deal_sqm_end_2=='0'){

             $create_deal_sqm_end_s=99999999999;     

    }else{
             $create_deal_sqm_end_s=$create_deal_sqm_end_2;     
    }

    if($create_deal_sqm_start_2=='0'){
             $create_deal_sqm_start_2=0;   
    }else{            
    }

 


     /////////////// ราคาต่ำสุด ////////////////
     if($create_deal_budget_start_2!=''){
           $s_price_low="  and  data.ex_list_price>=$create_deal_budget_start_2 ";
     }else{   $s_price_low="";  }


     /////////////// ราคาสูงสุด //////////////// 
     if($create_deal_budget_end_2!=''){
           $s_price_maximum=" and data.ex_list_price<=$create_deal_budget_end_s  ";
     }else{   $s_price_maximum="";  }


     /////////////// จำนวนห้องนอน ////////////////
     if($create_deal_bedroom_2!=''){ 
            $s_bedroom=" and data.ex_list_bedroom='$create_deal_bedroom_2' ";  
     }else{    $s_bedroom="";  }


   /////////////// จำนวนห้องน้ำ  ////////////////
     if($create_deal_bathroom_2!=''){ 
            $s_bathroom=" and data.ex_list_bathroom='$create_deal_bathroom_2' ";  
     }else{    $s_bathroom="";  }


     /////////////// ประเภท ดีล ขายเช่า ////////////////
     if($create_deal_attention_2!=''){    

            $s_deal="  and data.ex_list_deal_type='$create_deal_attention_2'  ";  
     }else{    $s_deal="";  } 


     /////////////// ประเภท คอนโด ทาวน์เฮ็าส์ ////////////////
     if($create_deal_type_2!=''){
            $s_type=" and data.ex_list_listing_type='$create_deal_type_2' "; 
     }else{    $s_type="";  }


    $create_deal_bedroom_2='';
 
    $create_deal_bathroom_2='';
    $select_floor=""; 

 
 
    if($create_deal_search_from==1 or $create_deal_search_from==0){

       if($project_train_station!='0' and $project_train_station!=''){

           $project_check_2=" and data.ex_list_train_station='$project_train_station'   ";

       }else{    

            if($project_id_2!='' and $project_id_2!='0' ){
               
                  $project_check_2=" and data.zone_id='$zone_id_s'   ";                  

            
            }else{

                  
                  $project_check_2="and data.ex_list_train_station='-'  ";

            }
       }

    }else if($create_deal_search_from==2){  

               $project_check_2=" and data.ex_list_train_station='$station_id_2'   ";
     

    }else if($create_deal_search_from==3){ 

               $project_check_2=" and data.zone_id='$zone_id_2'    "; 
    }

/*
    echo "project_check : ".$project_check."<br>"; 
   echo "project_id : ".$project_id_2."<br>";
   echo "station_id_2 : ".$station_id_2."<br>";
   echo "create_deal_sqm_start : ".$create_deal_sqm_start_2."<br>";
    echo "create_deal_sqm_end : ".$create_deal_sqm_end_2."<br>";
    echo "create_deal_budget_start : ".$create_deal_budget_start_2."<br>";
    echo "create_deal_budget_end : ".$create_deal_budget_end_2."<br>";
    echo "create_deal_bedroom : ".$create_deal_bedroom_2."<br>";
    echo "create_deal_bathroom : ".$create_deal_bathroom_2."<br>";
    echo "create_deal_attention : ".$create_deal_attention_2."<br>";
    echo "ex_list_listing_type : ".$ex_list_listing_type_2."<br>";
    echo "create_deal_type : ".$create_deal_type_2."<br>";   
      echo "create_deal_search_from : ".$create_deal_search_from."<br>";   
      echo "station_id_2 : ".$station_id_2."<br>";   
      echo "create_deal_type : ".$create_deal_type_2."<br>";     
    echo "project_id_check : ".$project_id_check."<br>";   
    echo "zone_id_2 : ".$zone_id_2."<br>";   
    echo "create_deal_search_from : ".$create_deal_search_from."<br>"; */
 

if($project_id_check=='0' and $create_deal_search_from=='0' or 
    $project_id_check=='0' and $create_deal_search_from=='1' or  
    $station_id_2=='0' and $create_deal_search_from=='2'  or 
    $zone_id_2=='0' and $create_deal_search_from=='3') {


}else{

 
                 $search_all_s2="           
                          (
                          data.ex_list_listing_status='' 
                          $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check_2   $s_deal  $select_floor $s_type  
                          )  
                          or
                          (
                          data.ex_list_listing_status='1'
                          $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check_2   $s_deal  $select_floor $s_type  
                          )                 
                          or
                          (
                          data.ex_list_listing_status='3'  and data.ex_list_rent_till_date<='$calExpireDate'
                          $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check_2   $s_deal  $select_floor $s_type  
                          )            
                          or
                          (
                          data.ex_list_listing_status='7'
                          $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check_2   $s_deal  $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='8'
                          $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check_2   $s_deal  $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='9' 
                          $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check_2   $s_deal  $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='10'
                          $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check_2   $s_deal  $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='11'                           
                          $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check_2   $s_deal  $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='12'
                          $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check_2   $s_deal  $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='13' 
                          $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check_2   $s_deal  $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='14' 
                          $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check_2   $s_deal  $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='15' and data.ex_list_rent_till_date<='$calExpireDate'
                          $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check_2   $s_deal  $select_floor $s_type  
                          )
                             ";
 
 
  // echo "----".$search_all_s2; 


?>


                        <div class="col-md-12" style="padding: 10px;"><center><a   onclick="window.open('page/deal_map.php?listing=2&code=<?php echo $code;?>', '_blank', 'location=yes,height=650,width=1300,scrollbars=yes,status=yes');"style="cursor:pointer;"    ><img src="img/icon_googlemap.png" width="70"></a></center> <br></div>


<?php 
 
/*
    echo "create_deal_sqm_start : ".$create_deal_sqm_start."<br>";
    echo "create_deal_sqm_end : ".$create_deal_sqm_end."<br>";
    echo "create_deal_budget_start : ".$create_deal_budget_start."<br>";
    echo "create_deal_budget_end : ".$create_deal_budget_end."<br>";
    echo "create_deal_bedroom : ".$create_deal_bedroom."<br>";
    echo "create_deal_bathroom : ".$create_deal_bathroom."<br>";
    echo "create_deal_attention : ".$create_deal_attention."<br>";
    echo "ex_list_listing_type : ".$ex_list_listing_type."<br>";
    echo "create_deal_type : ".$create_deal_type."<br>";

   echo "create_deal_search_from : ".$create_deal_search_from."<br>";
   echo "create_deal_sqm_start : ".$create_deal_sqm_start."<br>";
   echo "create_deal_sqm_end_s : ".$create_deal_sqm_end_s."<br>";
   echo "create_deal_budget_start : ".$create_deal_budget_start."<br>";
   echo "create_deal_budget_end_s : ".$create_deal_budget_end_s."<br>";
   echo "create_deal_bedroom : ".$create_deal_bedroom."<br>";
   echo "create_deal_bathroom : ".$create_deal_bathroom."<br>";
   echo "project_check_2 : ".$project_check_2."<br>";
   echo "select_floor : ".$select_floor."<br>";
   echo "create_deal_type : ".$create_deal_type."<br>";
    echo "code : ".$code."<br>";   
    echo "project_id : ".$project_id."<br>";    

  echo $search_all_s2; */



    $set_s_text=" data.ex_list_date_update DESC , data.ex_list_premium DESC ,data.ex_list_img_score DESC ";

     $sql_data2="SELECT Distinct data.project_id FROM dbo_data_excel_listing AS data  
                    
                    where $search_all_s2    order by $set_s_text  ";  
     $result_data2 = $conn->query($sql_data2);




 
     if($result_data2->num_rows > 0) { //num_rows
        // output data of each row
         while($rs_listing=$result_data2->fetch_assoc()) { $num++; 
 
               isset( $rs_listing['project_id'] ) ? $project_id = $rs_listing['project_id'] : $project_id = ""; 

               if($project_id!='0'){

                     $sql_project="SELECT project_name_en , project_train_station , zone_id , project_total_floors ,project_map , project_listing_count , project_completed
                                   FROM type_project WHERE project_id='$project_id' ";  
                     $result_project= $conn->query($sql_project);
                     $rs_project=$result_project->fetch_assoc();

 
                     isset( $rs_project['project_name_en'] ) ? $project_name = $rs_project['project_name_en'] : $project_name = "";
                     isset( $rs_project['project_train_station'] ) ? $project_train_station = $rs_project['project_train_station'] : $project_train_station = "";


                     isset( $rs_project['zone_id'] ) ? $zone_id = $rs_project['zone_id'] : $zone_id = ""; 
                     isset( $rs_project['project_total_floors'] ) ? $project_total_floors = $rs_project['project_total_floors'] : $project_total_floors = ""; 
                     isset( $rs_project['project_map'] ) ? $project_map = $rs_project['project_map'] : $project_map = ""; 
                     isset( $rs_project['project_listing_count'] ) ? $project_listing_count = $rs_project['project_listing_count'] : $project_listing_count = "";                 
                     isset( $rs_project['project_completed'] ) ? $project_completed = $rs_project['project_completed'] : $project_completed = "";           
 

                     if($project_completed!=''){
                          $project_completed=$project_completed+543;
                     }else{
                          $project_completed="ไม่ระบุ";
                     }

                      // ภาพประกอบ
                       $sql_img="SELECT * FROM type_project_img where project_id='$project_id' order by project_img_no ASC LIMIT 1"; 
                       $result_img=$conn->query($sql_img); 
                       $rs_img=$result_img->fetch_assoc();

                     isset( $rs_img['project_img_folder'] ) ? $project_img_folder = $rs_img['project_img_folder'] : $project_img_folder = ""; 
                     isset( $rs_img['project_img_name'] ) ? $project_img_name = $rs_img['project_img_name'] : $project_img_name = ""; 
                     isset( $rs_img['project_img_id'] ) ? $project_img_id = $rs_img['project_img_id'] : $project_img_id = ""; 


                           if($project_img_name!=''){ 

                               $project_img_folder="../../images/project/$project_id/mini_w300/".$project_img_name; 

                           }else{ // ถ้าไม่มีภาพ ให้ใช้ภาพของ Listing

                               $project_img_folder="../../images/noimages.jpg"; 
                           }               


                       isset( $rs_project['project_latitude'] ) ? $project_latitude = $rs_project['project_latitude'] : $project_latitude = "";
                       isset( $rs_project['project_longitude'] ) ? $project_longitude = $rs_project['project_longitude'] : $project_longitude = "";
                       
               }


 

      /////////// type_train_station ////////////////
             $sql_train="SELECT * FROM type_train_station where station_id='$project_train_station' ";  
             $result_train= $conn->query($sql_train);
             $rs_train=$result_train->fetch_assoc(); 

             isset( $rs_train['station_train'] ) ? $station_name = $rs_train['station_train'] : $station_name = "";
             isset( $rs_train['station_name_en'] ) ? $station_name_en = $rs_train['station_name_en'] : $station_name_en = "";
 
             if($station_name!=''){ $project_train_station=$rs_train['station_train']." | ".$rs_train['station_name_en'];}
      /////////// End type_train_station ////////////////
  

        /////////// zone id ////////////////
             $sql_zone="SELECT * FROM type_zone where zone_id='$zone_id' ";  
             $result_zone= $conn->query($sql_zone);
             $rs_zone=$result_zone->fetch_assoc(); 

             isset( $rs_zone['zone_name'] ) ? $zone_name = $rs_zone['zone_name'] : $zone_name = "";
             isset( $rs_zone['zone_name_en'] ) ? $zone_name_en = $rs_zone['zone_name_en'] : $zone_name_en = "";
             isset( $rs_zone['zone_latitude'] ) ? $zone_latitude = $rs_zone['zone_latitude'] : $zone_latitude = "";
             isset( $rs_zone['zone_longitude'] ) ? $zone_longitude = $rs_zone['zone_longitude'] : $zone_longitude = "";
        
             
             if($zone_name!=''){ $project_zone2=$zone_name;}

             if($zone_id=='0') { $project_zone2="0";}

 
                   /*

             $sql_new_deal="SELECT listing_new_deal_check_id  FROM dbo_listing_new_deal_check where create_deal_code='$code' and project_id='$project_id'  and listing_new_deal_check_status='2' ";  
             $result_new_deal= $conn->query($sql_new_deal);
             $rs_new_deal=$result_new_deal->fetch_assoc(); 

             $count_new=$result_new_deal->num_rows ; */
  
 
                 ?> 
    
           <?php if($project_id!='' and $project_id!='0' ) { ?>
                  
                    <div class="col-md-3">
                     
                      <!-- Widget: user widget style 2 -->
                      <div class="card card-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-warning">


                         

                            <div class="row">

                                <div class="col-sm-12 col-md-4" style="font-size: 12px;"  >
                                   <a  

                                    onclick="window.open('page/listing_deal_buyer.php?code=<?php echo $code;?>&project=<?php echo $project_id;?>&check_p=2&d_check=1', '_blank', 'location=yes,height=650,width=1300,scrollbars=yes,status=yes');"style="cursor:pointer;"    >
                                      <img src="<?php echo $project_img_folder;?>" alt="--" style="width: 100%; height: 105px;">
                                   </a><br>
                                   <center>จำนวนทรัพย์ : <?php echo $project_listing_count;?></center> 
                                </div>
                              
                                <div class="col-sm-12 col-md-8" style="font-size: 12px;" >
                                     

                                             <?php if($project_id!='' and $project_id!='0' ) { ?>

                                                  <b>โครงการ : </b> <?php echo $project_name;?>  <br>
                                                  <b>จำนวนชั้น : </b> <?php echo $project_total_floors;?><br>
                                                  <b>สถานีรถไฟฟ้า : </b> <?php echo $project_train_station;?><br>
                                                  <b>โซน : </b> <?php echo $project_zone2;?><br>
                                                  <b>ปีที่สร้าง : </b> <?php echo $project_completed;?><br> 
                                                  <b>แผนที่ : </b> <a href="<?php echo $project_map;?>" target="_black" >คลิกดูแผนที่</a>
                                     
                                              <?php } ?>
                                     
                                </div>
                            </div>  



                        </div>
        
                      </div>
                      <!-- /.widget-user --> 
                     
                    </div>
        
             <?php } ?>

             

    <?php       } 
          } // END num_rows  

  }

           ?>



                    </div>
                    <!-- / row / --> 


                    <!-- /.post -->
                  </div>

                  <div class="<?php if($check_p=='2'){?> active <?php } ?> tab-pane" id="listing3"> <!-- MAP -->

                    <div class="row">
                 


 
                             <div id="map"></div>
        


                    </div>
                  </div>                   


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




 <?php }  // END create_deal   ?> 



<!-- LISTING  project_get_id -->
 
 

  <?php } //  $d_check=='1'  ?>








 

<!--
       <script>
      function cek_db(){
        var id = $("#project").val();
        $.ajax({
          url : 'script/auto_proses.php',
          data : "project="+id,
        }).success(function (data){
          var json = data,
          obj = JSON.parse(json);
          $('#ex_list_listing_type').val(obj.project_type);
          $('#ex_list_alley').val(obj.project_alley);
          $('#ex_list_road').val(obj.project_road);
     		  $('#provinces').val(obj.project_province);
     		  $('#amphures').val(obj.project_district);
     		  $('#districts').val(obj.project_subdistrict);
     		  $('#ex_list_train_station').val(obj.project_train_station);
     		  $('#ex_list_number_buildings').val(obj.project_number_buildings);
     		  $('#ex_list_road').val(obj.project_road);
     		  $('#ex_list_floor').val(obj.project_total_floors);
     		  $('#ex_list_facilities').val(obj.project_facilities);
     		  $('#ex_list_nearby_places').val(obj.project_nearby_places);
     		  $('#ex_list_zone').val(obj.project_zone); 
          $('#ex_list_common_facilities').val(obj.project_facilities_en);  
          $('#ex_list_nearby_places_en').val(obj.project_nearby_places_en);           

         var x_listing_type = $('#ex_list_listing_type').val();
            if(x_listing_type == "01"){
                  $("#p1").hide();
          }else{
                 $("#p1").show();
          }

            if(id!= "0"){
                document.getElementById("ex_list_listing_type").disabled = true;
                document.getElementById("ex_list_alley").disabled = true;
                document.getElementById("ex_list_road").disabled = true;
                document.getElementById("provinces").disabled = true;
                document.getElementById("amphures").disabled = true;
                document.getElementById("districts").disabled = true;
                document.getElementById("ex_list_train_station").disabled = true;
                document.getElementById("ex_list_number_buildings").disabled = true;
                document.getElementById("ex_list_road").disabled = true;
                document.getElementById("ex_list_floor").disabled = true;
                document.getElementById("ex_list_facilities").disabled = true;
                document.getElementById("ex_list_nearby_places").disabled = true;
                document.getElementById("ex_list_zone").disabled = true;
                document.getElementById("ex_list_common_facilities").disabled = true;
                document.getElementById("ex_list_nearby_places_en").disabled = true;

              }else{
                document.getElementById("ex_list_listing_type").disabled = false;
                document.getElementById("ex_list_alley").disabled = false;
                document.getElementById("ex_list_road").disabled = false;
                document.getElementById("provinces").disabled = false;
                document.getElementById("amphures").disabled = false;
                document.getElementById("districts").disabled = false;
                document.getElementById("ex_list_train_station").disabled = false;
                document.getElementById("ex_list_number_buildings").disabled = false;
                document.getElementById("ex_list_road").disabled = false;
                document.getElementById("ex_list_floor").disabled = false;
                document.getElementById("ex_list_facilities").disabled = false;
                document.getElementById("ex_list_nearby_places").disabled = false;
                document.getElementById("ex_list_zone").disabled = false;
                document.getElementById("ex_list_common_facilities").disabled = false;
                document.getElementById("ex_list_nearby_places_en").disabled = false;
              }

        })
      }
      

 
      </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->
<!-- 
      <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script> 

  --> 
 


 

 
<!-- jQuery -->
<!--<script src="template/plugins/jquery/jquery.min.js"></script>-->
<!-- Bootstrap 4 -->
<!--<script src="template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<!-- Select2 -->
<script src="template/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="template/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="template/plugins/moment/moment.min.js"></script>
<script src="template/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="template/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="template/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="template/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="template/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="template/plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<!--
<script src="template/dist/js/adminlte.min.js"></script> -->
<!-- AdminLTE for demo purposes -->
 
<!-- Page specific script -->
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
<?php for ($i = 0; $i < 150; $i++) { ?>
    //Date picker
    $('#reservationdate<?php echo $i;?>').datetimepicker({
        format: 'DD/MM/YYYY'
    });

<?php } ?>

    $('#reservationdate_group1').datetimepicker({
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

<?php for ($i = 0; $i < 150; $i++) { ?>

    $('#timepicker1_<?php echo $i;?>').datetimepicker({
      format: 'LT'
    })

<?php } ?>

<?php for ($i = 0; $i < 150; $i++) { ?>

    $('#timepicker2_<?php echo $i;?>').datetimepicker({
      format: 'LT'
    })

<?php } ?>

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





  <?php if($d_check=='3'){ ?>



<!-- Bootstrap -->
<script src="template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI -->
<script src="template/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- AdminLTE App -->
<script src="template/dist/js/adminlte.min.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="template/plugins/moment/moment.min.js"></script>
<script src="template/plugins/fullcalendar/main.js"></script>

<!-- Page specific script -->
<script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (https://fullcalendar.io/docs/event-object)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendar.Draggable;

    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------

    new Draggable(containerEl, {
      itemSelector: '.external-event',
      eventData: function(eventEl) {
        return {
          title: eventEl.innerText,
          backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
        };
      }
    });

    var calendar = new Calendar(calendarEl, {
      headerToolbar: {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      themeSystem: 'bootstrap',
      //Random default events
      events: [

<?php 

    $sql="SELECT * FROM dbo_subdeal_calendar AS calendar
          LEFT JOIN dbo_subdeal AS subdeal  On calendar.ex_list_listing_code=subdeal.ex_list_listing_code  and calendar.create_deal_code=subdeal.create_deal_code

     WHERE subdeal.create_deal_code='$code' and calendar.s_calendar_status='0' or 
           subdeal.create_deal_code='$code' and calendar.s_calendar_status='1' or 
           subdeal.create_deal_code='$code' and calendar.s_calendar_status='2' or 
           subdeal.create_deal_code='$code' and calendar.s_calendar_status='4' ";  

    $result=$conn->query($sql);
    $count=$result->num_rows ;

    while($rs=$result->fetch_assoc()){ $i++;
     
         $s_calendar_status=$rs['s_calendar_status'];
         $subdeal_title=$rs['subdeal_title'];
         $s_calendar_note=$rs['s_calendar_note'];
         $s_calendar_date=$rs['s_calendar_date'];
         $s_calendar_time_start=$rs['s_calendar_time_start'];
         $s_calendar_time_end=$rs['s_calendar_time_end'];
         $s_calendar_create=$rs['s_calendar_create'];
         $ex_list_listing_code=$rs['ex_list_listing_code'];
         $s_calendar_title_status=$rs['s_calendar_title_status'];

 
          $time_start_1=substr($s_calendar_time_start,0 , 2 );           
          $time_start_2=substr($s_calendar_time_start,3 , 2 );
 
          $time_end_1=substr($s_calendar_time_end,0 , 2 );
          $time_end_2=substr($s_calendar_time_end,3 , 2 );
 

          $year=substr($s_calendar_date,0 , 4 );
          $month=substr($s_calendar_date,5 , 2 );
          $day=substr($s_calendar_date,8 , 2 );

          $time=substr($s_calendar_date,11 , 5 );

          $time=substr($s_calendar_date,11 , 5 );

          $month_2=$month-1;

         if($s_calendar_status=='1'){

              $title_calendar="นำเสนอ ".$ex_list_listing_code;
              $color="#5e92c2";
              $color_1="#000000";

         }else if($s_calendar_status=='2'){

              $title_calendar="นัดชมทรัพย์ ".$ex_list_listing_code;
              $color="#17a2b8";
              $color_1="#000000";

         }else if($s_calendar_status=='4'){

              $title_calendar="นัดเซ็นต์สัญญา ".$ex_list_listing_code;
              $color="#1f4e78";
              $color_1="#000000";

         }else if($s_calendar_status=='6'){

              $title_calendar="นัดโอน ".$ex_list_listing_code;
              $color="#ffd966";
              $color_1="#000000";

         }else if($s_calendar_status=='8'){

              $title_calendar="ปิด Deal ".$ex_list_listing_code;
              $color="#806000";
              $color_1="#000000";
         }else{

              if($s_calendar_title_status=='1'){
                    $s_calendar_title_status='ถ่ายรูปห้อง';
              }else if($s_calendar_title_status=='2'){
                    $s_calendar_title_status='ตรวจเช็คห้อง';
              }else if($s_calendar_title_status=='3'){
                    $s_calendar_title_status='ส่งมอบห้อง';
              }else if($s_calendar_title_status=='4'){
                    $s_calendar_title_status='ย้ายออก';
              }else if($s_calendar_title_status=='5'){
                    $s_calendar_title_status='ขอใบปลอดหนี้';
              }else if($s_calendar_title_status=='6'){
                    $s_calendar_title_status='ติดต่อกรมที่ดิน';
              }else if($s_calendar_title_status=='7'){
                    $s_calendar_title_status='อื่นๆ';
              }
                                 

              $title_calendar=$s_calendar_title_status;
              $color="#3f51b5";
              $color_1="#000000";

         }


         $url_s="https://connex.in.th/backend/?page=create_deal_buyer&status=edit&p_check=create_deal&code=$code&d_check=4";

 ?>

        {
          title          : '<?php echo $title_calendar;?>',
          start          : new Date(<?php echo $year;?>, <?php echo $month_2;?>, <?php echo $day;?> , <?php echo $time_start_1;?>,  <?php echo $time_start_2;?>),
          end            : new Date(<?php echo $year;?>, <?php echo $month_2;?>, <?php echo $day;?> , <?php echo $time_end_1;?>,  <?php echo $time_end_2;?>),
          allDay         : false,
          url            : '<?php echo $url_s;?>', 
          backgroundColor: '<?php echo $color;?>', //red
          borderColor    : '<?php echo $color;?>', //red
          color    : '<?php echo $color_1;?>' //red
          //allDay         : true
        } 
<?php  if($i!=$count){ echo ","; }
     } ?>

      ],
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function(info) {
        // is the "remove after drop" checkbox checked?
        if (checkbox.checked) {
          // if so, remove the element from the "Draggable Events" list
          info.draggedEl.parentNode.removeChild(info.draggedEl);
        }
      }
    });

    calendar.render();
    // $('#calendar').fullCalendar()

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    // Color chooser button
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      // Save color
      currColor = $(this).css('color')
      // Add color effect to button
      $('#add-new-event').css({
        'background-color': currColor,
        'border-color'    : currColor
      })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      // Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      // Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#000'
      }).addClass('external-event')
      event.text(val)
      $('#external-events').prepend(event)

      // Add draggable funtionality
      ini_events(event)

      // Remove event from text input
      $('#new-event').val('')
    })
  })
</script>





<?php } ?>



  <?php if($d_check=='1' or $d_check=='' or $d_check=='4' ){ ?>

<!-- jQuery -->
<!--
<script src="template/plugins/jquery/jquery.min.js"></script>

<script src="template/plugins/summernote/summernote-bs4.min.js"></script>-->



<script src="template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Ekko Lightbox -->
<script src="template/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<!-- AdminLTE App -->
<script src="template/dist/js/adminlte.min.js"></script>
<!-- Filterizr-->
<script src="template/plugins/filterizr/jquery.filterizr.min.js"></script>        
 <script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>                                      



<script>
  $(function () {
    //Add text editor
    $('#compose-textarea').summernote()
  })
</script>

<?php } ?>
