 

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


 <style>
div.scroll {width:100%; max-height: 600px; overflow-x:auto;}

th{
  background-color: #4F80C0;
  padding: 10px;
  font-size: 18px;
  color: #fff;
}
table, th , tr, td {
 
  padding: 8px;
  text-align: left;
  border: 1px solid #000;
  font-size: 12px;
  text-align: center;
  
}
tr:nth-child(even){background-color: #FFF}
tr:hover {background-color: #f5f5f5}
</style>


<?php if($status==''){  ?>

 
     <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">


               <!-- /.card-header -->
              <div class="card-body" style="margin: 5px;">
                <table   class="" style="font-size: 14px; width: 100%;"   >

                  <thead>
                    <tr>     
                      <th style="width: 100px;">วันที่สร้าง</th>                    
                      <th style="width: 150px;">ชื่อลูกค้า</th>
                      <th style="width: 250px;">เบอร์ติดต่อ </th> 
                      <th style="width: 100px;">ความต้องการ</th>  
                      <th>โครงการ / โซน / สถานีรถไฟฟ้า </th> 
                      <th>Budget </th>
                      <th>ห้องนอน </th> 
                      <th>วันที่ย้ายเข้า </th>      
                      <th>เซลล์ผู้ขอ Deal</th> 
                       
                      <th>#</th>          
                    </tr>
                  </thead>
                  <tbody>
<?php
      
     $budget_start=''; 
     $pet_friendly='';
     $no='';

     $sql="SELECT *  FROM dbo_request_deal order by create_date DESC   "; 
     $result = $conn->query($sql);


     if($result->num_rows > 0) {
        // output data of each row
         while($rs=$result->fetch_assoc()) {    

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
                 $project_id=$rs['project_id'];
                 $bedroom=$rs['bedroom'];
                 $deal_duration=$rs['deal_duration'];
                 $budget_start=$rs['budget_start'];
                 $check_customer=$rs['check_customer'];
                 $ex_list_listing_code=$rs['ex_list_listing_code'];
                 $buyer_contact_code=$rs['buyer_contact_code'];
                 isset( $rs['project_id'] ) ? $project_id = $rs['project_id'] : $project_id = "";  
                 isset( $rs['station_id'] ) ? $station_id = $rs['station_id'] : $station_id = "";  
                 isset( $rs['zone_id'] ) ? $zone_id=$rs['zone_id'] : $zone_id= "";  
                 $project_other=$rs['project_other'];
                 $deal_rent_till=$rs['deal_rent_till']; 
                 $project_other=$rs['project_other'];
                 $open_room=$rs['open_room'];
                 $create_date=$rs['create_date'];
                 $register_id=$rs['register_id'];
                 $check_customer=$rs['check_customer'];
                 $open_deal=$rs['open_deal'];
                 $remark=$rs['remark'];
                 $pet_friendly_type=$rs['pet_friendly_type'];
              
                 if($contact_line_id!=''){ 
                     $contact_line_id="<br> Line : ".$contact_line_id;
                 }
                 if($contact_whatsapp!=''){ 
                     $contact_whatsapp="<br> Whatsapp : ".$contact_whatsapp;
                 }
                 if($contact_whatsapp!=''){ 
                     $contact_wechat="<br> Wechat : ".$contact_wechat;
                 }
                 $contact_all=$contact_tel." ".$contact_line_id." ".$contact_whatsapp." ".$contact_wechat;


         $budget=number_format($budget_start);

         $color_text="color: #000;";
         $bg="background-color: #fff;";

/*
         $sql_deal_check="SELECT create_deal_code FROM dbo_listing_new_deal_check  WHERE create_deal_code='$create_deal_code' and listing_new_deal_check_view='1' ";  
         $result_deal_check= $conn->query($sql_deal_check);
         $count_new_deal=$result_deal_check->num_rows;
*/

         if($contact_attention=='1'){ 
               $attention="ซื้อ"; 
         }else if($contact_attention=='2'){  
               $attention="เช่า"; 
         }else if($contact_attention=='3'){  
               $attention="ซื้อและเช่า"; 
         }else if($contact_attention=='4'){  
               $attention="ต่อสัญญา"; 
         }else{
               $attention=""; 
         }
 
         if($check_customer=='1'){
                $check_customer_title='ลูกค้าซ้ำในระบบ';
         }else{
                $check_customer_title='ไม่ซ้ำ';
         }
          
  
                  if($deal_rent_till!='0000-00-00 00:00:00'){
                      $year=substr($deal_rent_till,0 , 4 );
                      $month=substr($deal_rent_till,5 , 2 );
                      $day=substr($deal_rent_till,8 , 2 ); 
                      $deal_rent_till=$day."/".$month."/".$year;
                  }else{
                    $deal_rent_till='';
                  }            

                  if($open_room!='0000-00-00 00:00:00'){
                      $year=substr($open_room,0 , 4 );
                      $month=substr($open_room,5 , 2 );
                      $day=substr($open_room,8 , 2 ); 
                      $open_room=$day."/".$month."/".$year;
                  }else{
                      $open_room='';
                  }            


 
                      if($pet_friendly=='0'){ $pet_friendly='ไม่'; }else{ $pet_friendly='ใช่'; }

                      if($source_code!='0'){
                           $sql_source="SELECT * FROM type_source where source_id=$source_code  "; 
                           $result_source=$conn->query($sql_source);
                           $rs_source= $result_source->fetch_assoc();  

                           $source_title=$rs_source['source_title'];
                      }


 

      /////////// dbo_register ////////////////
             $sql_re="SELECT register_id ,register_name , register_nickname  FROM dbo_register where register_id='$register_id' ";  
             $result_re= $conn->query($sql_re);
             $rs_re=$result_re->fetch_assoc();

             $register_name=$rs_re['register_name'];
             $register_nickname=$rs_re['register_nickname'];
             $register_name="$register_name ($register_nickname)";


             if($rs_re['register_id']!=''){ $sale_name=$rs_re['register_name']."($register_nickname)";  }
      ////////// End dbo_register ////////////////

 
  


                      if($project_id!='0'){

                           $sql_project="SELECT * FROM type_project where project_id=$project_id  "; 
                           $result_project=$conn->query($sql_project);
                           $rs_project= $result_project->fetch_assoc(); 

                           $project_name_en=$rs_project['project_name']." | ".$rs_project['project_name_en'];
                      }else{
                            $project_name_en="";
                      }

                      if($station_id!='0'){

                           $sql_station="SELECT * FROM type_train_station where station_id=$station_id  "; 
                           $result_station=$conn->query($sql_station);
                           $rs_station= $result_station->fetch_assoc(); 
 
                           isset( $rs_station['station_train'] ) ? $station_name = $rs_station['station_train'] : $station_name = "";  
                      }        


                      if($zone_id!='0'){

                           $sql_zone="SELECT * FROM  type_zone where zone_id=$zone_id  "; 
                           $result_zone=$conn->query($sql_zone);
                           $rs_zone= $result_zone->fetch_assoc(); 

                           isset( $rs_zone['zone_name'] ) ? $zone_name = $rs_zone['zone_name'] : $zone_name = "";  
          
                      }    

                      if($project_name_en!=''){
                            
                            $title_project=$project_name_en;

                      }else if($station_name!=''){

                            $title_project=$station_name;

                      }else if($zone_id!=''){

                            $title_project=$zone_name;

                      }   

                     if($buyer_contact_code!=''){ 
                             $color="#FDFFB6";
                     }else{
                             $color="#fff";
                     }



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


             $no++;   

     ?> 

 


             <div class="modal fade" id="modal-default<?php echo $id_check;?>"  >
                <div class="modal-dialog" >
                  <div class="modal-content" style="width: 600px;">
                    <div class="modal-header">
                      <h4 class="modal-title">Requirement เปิด Deal : <?php echo $contact_name;?></h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                        <div class="row">

                          <div class="col-md-12 col-sm-12">
                          
                                 
                          <?php if($check_customer=='1'){ ?>
                                         
                                    <h4>ข้อมูลอาจซ้ำกับลูกค้าเดิม <br>  คุณต้องการจะดำเนินการเปิด Deal ใช่หรือไม่ </h4>   
                                    
                                    <p>
                                <?php if($contact_tel!=''){  ?>
                                           <b>ลูกค้าที่่อาจซ้ำ :  </b> <a href="?page=deal_buyer&search=<?php echo $check_contact_tel;?>&page_no=1" target="_black"><?php echo $contact_tel;?></a>     
                                <?php } ?>
                                <?php if($contact_tel_2!=''){  ?>
                                           <b>ลูกค้าที่่อาจซ้ำ :  </b> <a href="?page=deal_buyer&search=<?php echo $check_contact_tel_2;?>&page_no=1" target="_black"><?php echo $contact_tel_2;?></a>     
                                <?php } ?>    
                                    </p>   

                           <?php }else{ ?>

                                    <h4>ไม่พบข้อมูลลูกค้าซ้ำ <br>  คุณต้องการจะดำเนินการเปิด Deal ใช่หรือไม่ </h4>   

                           <?php } ?>
                             
                          
                          </div>         
                                 
                          <div class="col-md-12 col-sm-12">

                                 <center>

                                      <a href="?page=create_deal_buyer&status=create&p_check=create_buyer&step=1&request_d=<?php echo $id_check;?>" class="btn btn-success" >ใช่</a> &nbsp;&nbsp;&nbsp;
                                      <a class="btn btn-danger" href="include/process.php?page=request_deal&id=<?php echo $id_check;?>&status=2">  ไม่  </a>

                                  </center>   

                          </div>

             
                                 <!--
                                  <div class="mt-4 product-share">
                                    <a href="#" class="text-gray">
                                      <i class="fab fa-facebook-square fa-2x"></i>
                                    </a>
                                    <a href="#" class="text-gray">
                                      <i class="fab fa-twitter-square fa-2x"></i>
                                    </a>
                                    <a href="#" class="text-gray">
                                      <i class="fas fa-envelope-square fa-2x"></i>
                                    </a>
                                    <a href="#" class="text-gray">
                                      <i class="fas fa-rss-square fa-2x"></i>
                                    </a>
                                  </div> -->

 
                        </div>

                    </div>
                
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>




                    <tr style="font-size: 15px; "  >  
   
                      <td><?php echo $create_date;?></td> 
                      <td style="text-align: left;"><?php echo $contact_name;?> </td>
                      <td style="text-align: left;"><?php echo $contact_all;?></td> 
                      <td><?php echo $attention;?></td> 
                      <td><?php echo $title_project;?></td>
                      <td><?php echo number_format($budget_start);?></td> 
                      <td><?php echo $bedroom;?></td>
                      <td><?php echo $deal_rent_till;?></td>  
                      <td ><?php echo $register_name;?></td>                     
                      <td > 
              <?php if($open_deal=='0'){ ?>  
                         
                         <button type="button" class="btn btn-success btn-sm"    data-toggle="modal" data-target="#modal-default<?php echo $id_check;?>">ตรวจสอบข้อมูล</button> 
                        
              <?php }else if($open_deal=='1'){ ?> 
                         <center><a href="#" class="btn btn-success btn-sm" style="background-color: #ccc;color: #000;" >เปิด Deal แล้ว</a></center>                
              <?php }else{ ?> 
                         <center><a href="#" class="btn btn-danger btn-sm" >ไม่เปิด Deal</a></center>
              <?php } ?>

                      </td>  

                    </tr>  
      <?php 
             }
         }  ?>

                  </tbody>

              </table>
          </div>

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>

<?php } ?>


<?php if($status=='create' or $status=='edit'){



    if($status=='edit' and $id!=''){

             $sql="SELECT *  FROM dbo_request_deal where id='$id' order by create_date DESC   "; 
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
                 $project_id=$rs['project_id'];
                 $bedroom=$rs['bedroom'];
                 $deal_duration=$rs['deal_duration'];
                 $budget_start=$rs['budget_start'];
                 $check_customer=$rs['check_customer'];
                 $buyer_contact_code=$rs['buyer_contact_code'];
                 $project_id=$rs['project_id'];
                 $station_id=$rs['station_id'];
                 $zone_id=$rs['zone_id'];
                 $project_other=$rs['project_other'];
                 $deal_rent_till=$rs['deal_rent_till'];
                 $zone_id=$rs['zone_id'];
                 $project_other=$rs['project_other'];
                 $open_room=$rs['open_room'];
                 $create_date=$rs['create_date'];
                 $register_id=$rs['register_id'];
                 $check_customer=$rs['check_customer'];
                 $remark=$rs['remark'];
  
                  if($deal_rent_till!='0000-00-00 00:00:00'){
                      $year=substr($deal_rent_till,0 , 4 );
                      $month=substr($deal_rent_till,5 , 2 );
                      $day=substr($deal_rent_till,8 , 2 ); 
                      $deal_rent_till=$day."/".$month."/".$year;
                  }else{
                    $deal_rent_till='';
                  }            

                  if($open_room!='0000-00-00 00:00:00'){
                      $year=substr($open_room,0 , 4 );
                      $month=substr($open_room,5 , 2 );
                      $day=substr($open_room,8 , 2 ); 
                      $open_room=$day."/".$month."/".$year;
                  }else{
                      $open_room='';
                  }            


 
                      if($pet_friendly=='0'){ $pet_friendly='ไม่'; }else{ $pet_friendly='ใช่'; }

                      if($source_code!='0'){
                           $sql_source="SELECT * FROM type_source where source_id=$source_code  "; 
                           $result_source=$conn->query($sql_source);
                           $rs_source= $result_source->fetch_assoc();  

                           $source_title=$rs_source['source_title'];
                      }

                      if($project_id!='0'){

                           $sql_project="SELECT * FROM type_project where project_id=$project_id  "; 
                           $result_project=$conn->query($sql_project);
                           $rs_project= $result_project->fetch_assoc(); 

                           $project_name_en=$rs_project['project_name']." | ".$rs_project['project_name_en'];

                      }

                      if($station_id!='0'){

                           $sql_station="SELECT * FROM type_train_station where station_id=$station_id  "; 
                           $result_station=$conn->query($sql_station);
                           $rs_station= $result_station->fetch_assoc(); 

                           $station_name=$rs_station['station_train'];

                      }        


                      if($zone_id!='0'){

                           $sql_zone="SELECT * FROM  type_zone where zone_id=$zone_id  "; 
                           $result_zone=$conn->query($sql_zone);
                           $rs_zone= $result_zone->fetch_assoc(); 

                           $zone_name=$rs_zone['zone_name'];

                      }             

                  

            /////////// dbo_register ////////////////
                   $sql_re="SELECT register_id ,register_name , register_nickname  FROM dbo_register where register_id='$register_id' ";  
                   $result_re= $conn->query($sql_re);
                   $rs_re=$result_re->fetch_assoc();

                   $create_deal_sale=$rs_re['register_id'];
                   $register_name=$rs_re['register_name'];
                   $register_nickname=$rs_re['register_nickname'];
                   $register_name="$register_name ($register_nickname)";
 
     




   }else{



                 $check_hidden='';
                 $ex_list_listing_code ='';
                 $id_check='';         
                 $contact_status='';  
                 $contact_attention='';  
                 $contact_name='';  
                 $contact_tel='';  
                 $contact_tel_2='';  
                 $contact_tel_3='';  
                 $contact_tel_4='';  
                 $contact_email='';  
                 $contact_fb='';   
                 $contact_line_id='';  
                 $contact_whatsapp='';     
                 $contact_wechat='';  
                 $source_code='';  
                 $project_id='';  
                 $bedroom='';  
                 $deal_duration='';  
                 $budget_start='';  
                 $check_customer='';  
                 $buyer_contact_code='';  
                 $project_id='';  
                 $station_id='';  
                 $zone_id='';  
                 $project_other='';  
                 $deal_rent_till='';  
                 $zone_id='';  
                 $project_other='';  
                 $open_room='';  
                 $create_date='';  
                 $register_id='';  
                 $check_customer='';  
                 $pet_friendly='';
                 $remark='';  

     }


  ?>



 <script language="JavaScript">

  function fncSubmit()
{

        var ex_list_listing_code = document.getElementById('ex_list_listing_code');
        var project_id = document.getElementById('project_id');
        var station_id = document.getElementById('station_id');
        var zone_id = document.getElementById('zone_id');
        var project_other = document.getElementById('project_other'); 
        var contact_tel = document.getElementById('contact_tel');
        var contact_tel_2 = document.getElementById('contact_tel_2');
        var contact_tel_3 = document.getElementById('contact_tel_3');
        var contact_tel_4 = document.getElementById('contact_tel_4');
        var contact_line_id = document.getElementById('contact_line_id');
        var contact_whatsapp = document.getElementById('contact_whatsapp');
        var contact_wechat = document.getElementById('contact_wechat');


    if(contact_tel.value!="" || contact_tel_2.value!="" || contact_tel_3.value!="" || contact_tel_4.value!="" || contact_line_id.value!="" || contact_whatsapp.value!="" || contact_wechat.value!=""){
       
        if(ex_list_listing_code.value ==""){
               
              if(project_id.value =="" && station_id.value =="" && zone_id.value =="" ){
                    alert('โปรดกรอก CX หรือ เลือกโครงการ สถานีรถไฟฟ้า โซน อย่างใดอย่างหนึ่ง');
                    project_id.focus(); 
                    return false;  
              }else if(project_id.value !="" || station_id.value !=""  || zone_id.value !=""  ){
                    var e = document.getElementById('submit');
                    e.style.display = "none";     
              }

          }

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
 
function Numbers(e){
var keynum;
var keychar;
var numcheck;

if(window.event){
//IE
  keynum = e.keyCode;
}else if(e.which){
  // Netscape/Firefox/Opera
  keynum = e.which;
  }

if(keynum != 8 && keynum != 46 && ( keynum < 48 || keynum > 57 )){
   return false;
  }
}

function dokeyup( obj, e ){
var keynum;
if(window.event){
  // IE
  keynum = e.keyCode;
}else if(e.which) {
  // Netscape/Firefox/Opera
  keynum = e.which;
  }
  if( keynum != 37 & keynum != 39 & keynum != 110 ){
    var value = obj.value;
    var svals = value.split( "." ); //Cut decimal point
    var sval = svals[0]; //Integer
    var n = 0;
    var result = "";
    var c = "";
    for ( a = sval.length - 1; a >= 0 ; a-- ){
  
      c = sval.charAt(a);
    
      if ( c != ',' ){
        n++;
        if ( n == 4 ){
          result = "," + result;
          n = 1;
        };
        result = c + result;
      };
    };
 
    if ( svals[1] ){
      result = result + '.' + svals[1];
    };
 
    obj.value = result;
  };
};
</script>



    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


          <form method="post" id="form" enctype="multipart/form-data" action="include/process.php"  onsubmit="return fncSubmit()" > 

                <input type="text" class="form-control" name="page"  value="<?php echo $_GET['page'];?>" hidden="hidden"  >
                <input type="text" class="form-control" name="user_id"  value="<?php echo $USER_ID;?>" hidden="hidden" >
                <input type="text" class="form-control" name="p_check"  value="create_buyer" hidden="hidden" > 

            <?php if($status=='edit'){ ?>

                <input type="text" class="form-control" name="edit"  value="edit" hidden="hidden">                
                <input type="text" class="form-control" name="check_customer"  value="<?php echo $check_customer;?>" hidden="hidden">
                <input type="text" class="form-control" name="id"  value="<?php echo $code;?>" hidden="hidden">        
                <input type="text" class="form-control" name="buyer_contact_code"  value="<?php echo $buyer_contact_code;?>" hidden="hidden">    
            <?php }else{ ?>

            <?php } ?>    


        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">ข้อมูลลูกค้า </h3>

     
          </div>



          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">

               <div class="col-md-4 col-sm-12"    > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-md-12 col-sm-12 col-form-label">ประเภท Contact : </label>
                    <div class="col-md-12 col-sm-12">
                        <select class="form-control select2bs4"  name="contact_status"  id="contact_status"  style="width: 100%;" required="">   
                             <option value="0" <?php if($contact_status=='0' ){?> selected <?php } ?>>ไม่ระบุ</option>   
                             <option value="1" <?php if($contact_status=='1' or $contact_status=='' ){?> selected <?php } ?>>ลูกค้า</option>  
                             <option value="2" <?php if($contact_status=='2'){?> selected <?php } ?>>agent</option>  
          
                        </select> 
                    </div>
                  </div> 
              </div>
              <div class="col-md-4 col-sm-12"    <?php echo $check_hidden;?>> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-md-12 col-sm-12 col-form-label">ความสนใจ : </label>
                    <div class="col-md-12  col-sm-12">
                        <select class="form-control select2bs4"  name="contact_attention"  id="contact_attention"  style="width: 100%;" required=""> 
                             <option value="" <?php if($contact_attention=='' ){?> selected <?php } ?>>ไม่ระบุ</option>      
                             <option value="1" <?php if($contact_attention=='1'){?> selected <?php } ?>>ซื้อ</option>  
                             <option value="2" <?php if($contact_attention=='2'){?> selected <?php } ?>>เช่า</option>  
                             <option value="3" <?php if($contact_attention=='3'){?> selected <?php } ?>>ซื้อและเช่า</option>  
                             <option value="4" <?php if($contact_attention=='4'){?> selected <?php } ?>>ต่อสัญญา</option>          
                        </select> 
                    </div>
                  </div> 
              </div>
              <div class="col-md-4 col-sm-12"  <?php echo $check_hidden;?> > 
                   
              </div>
              <div class="col-md-4 col-sm-12"  <?php echo $check_hidden;?> > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-md-12 col-sm-12 col-form-label">ชื่อลูกค้า : </label>
                    <div class="col-md-12 col-sm-12">
                      <input type="text" class="form-control" id="contact_name" name="contact_name" placeholder="โปรดกรอก ชื่อลูกค้า" value="<?php echo $contact_name;?>" required="" >
                    </div>
                  </div> 
              </div>
              <div class="col-md-8 col-sm-12"  <?php echo $check_hidden;?> > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-md-12 col-sm-12 col-form-label">เบอร์ติดต่อ : </label>
                    <div class="col-md-12 col-sm-12">
                        <div class="row">
		                    <div class="col-md-3 col-sm-12">
		                      <input type="text" class="form-control" id="contact_tel" name="contact_tel" placeholder="โปรดกรอกเบอร์โทรศัพท์" OnKeyPress="return chkNumbertel(this)" value="<?php echo $contact_tel;?>" >
		                    </div>
		                    <div class="col-md-3 col-sm-12">
		                      <input type="text" class="form-control" id="contact_tel_2" name="contact_tel_2" placeholder="โปรดกรอกเบอร์โทรศัพท์" OnKeyPress="return chkNumbertel(this)" value="<?php echo $contact_tel_2;?>" >
		                    </div>
		                    <div class="col-md-3 col-sm-12">
		                      <input type="text" class="form-control" id="contact_tel_3" name="contact_tel_3" placeholder="โปรดกรอกเบอร์โทรศัพท์" OnKeyPress="return chkNumbertel(this)" value="<?php echo $contact_tel_3;?>" >
		                    </div>
		                    <div class="col-md-3 col-sm-12">
		                      <input type="text" class="form-control" id="contact_tel_4" name="contact_tel_4" placeholder="โปรดกรอกเบอร์โทรศัพท์" OnKeyPress="return chkNumbertel(this)" value="<?php echo $contact_tel_4;?>" >
		                    </div>
                        </div>
                    </div>
                     
                  </div> 
              </div>

              <div class="col-md-4 col-sm-12"  <?php echo $check_hidden;?> > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-12 col-form-label">อีเมล์ : </label>
                    <div class="col-sm-12">
                      <input type="email" class="form-control" id="contact_email" name="contact_email" placeholder="โปรดกรอกอีเมล์" value="<?php echo $contact_email;?>" >
                    </div>
                  </div> 
              </div>

              <div class="col-md-4 col-sm-12" id="buyer_contact_fb"  <?php echo $check_hidden;?> > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-12 col-form-label">FACEBOOK : </label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="contact_fb" name="contact_fb" placeholder="โปรดกรอก facebook"  value="<?php echo $contact_fb;?>" >
                    </div>
                  </div> 
              </div>
 
              <div class="col-md-4 col-sm-12"  <?php echo $check_hidden;?> > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-12 col-form-label">LINE ID : </label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="contact_line_id" name="contact_line_id" placeholder="โปรดกรอก Line ID" value="<?php echo $contact_line_id;?>" >
                    </div>
                  </div> 
              </div>
              <div class="col-md-4 col-sm-12"  <?php echo $check_hidden;?> > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-12 col-form-label">WHATSAPP : </label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="contact_whatsapp" name="contact_whatsapp" placeholder="โปรดกรอก Whatsapp"  OnKeyPress="return chkNumbertel(this)"  value="<?php echo $contact_whatsapp;?>" >
                    </div>
                  </div> 
              </div>
              <div class="col-md-4 col-sm-12"  <?php echo $check_hidden;?>  > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-12 col-form-label">WECHAT : </label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="contact_wechat" name="contact_wechat" placeholder="โปรดกรอก Wechat" value="<?php echo $contact_wechat;?>" >
                    </div>
                  </div> 
              </div> 


            </div> 
          </div>

 
          <div class="card-header">
            <h3 class="card-title">ข้อมูลทางการตลาด </h3> 
          </div>
 
       

          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">

               <div class="col-md-4 col-sm-12" > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-md-12 col-sm-12 col-form-label">แหล่งที่มา : </label>
                    <div class="col-md-12 col-sm-12">
                     
                        <select class="form-control select2bs4"  name="source_code"  id="source_code"  style="width: 100%;" required="">  
                             <option value=""  >ไม่ระบุ</option>  
                  <?php 
                         $strSQL = "SELECT * FROM type_source  "; 
                         $result=$conn->query($strSQL); 
                             
                         while($rs=$result->fetch_assoc()) { 

                               $source_id=$rs['source_id'];
                               $source_title=$rs['source_title'];
                   ?>

                             <option value="<?php echo $source_id;?>" <?php if($source_id==$source_code){?> selected <?php } ?>><?php echo $source_title;?></option>  

                  <?php } ?>
          
                        </select>                      
                    </div>
                  </div> 
              </div>
              <div class="col-md-4 col-sm-12"  <?php echo $check_hidden;?>  > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-md-12 col-sm-12 col-form-label">รหัสทรัพย์ : </label>
                    <div class="col-md-12 col-sm-12">
                      <input type="text" class="form-control" id="ex_list_listing_code" name="ex_list_listing_code" placeholder="" value="<?php echo $ex_list_listing_code;?>" >
                    </div>
                  </div> 
              </div> 
              <div class="col-md-4 col-sm-12" id="buyer_contact_wechat"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-12 col-form-label">สือสารภาษา : </label>
                    <div class="col-sm-12">
                     
                        <select class="form-control select"  name="contact_language"  id="contact_language"  style="width: 100%;">                             
                          <option value="2"  >ภาษาอังกฤษ</option>   
                          <option value="1"  >ภาษาไทย</option> 
                        </select>                      
                    </div>
                  </div> 
              </div>
              <div class="col-md-4 col-sm-12" id="create_deal_duration_p"> 
                 <div class="form-group row">
                    <label for="inputEmail3" class="col-md-12 col-sm-12 col-form-label"> ประเภททรัพย์ :  </label>
                    <div class="col-md-12 col-sm-12"> 
                        <select class="form-control" name="deal_type" id="deal_type"  style="width: 100%;" required >

                          <option value="">ไม่เลือก</option> 
   
        <?php  
         $sql_type_asset="SELECT * FROM type_asset order by id  ASC"; 
         $result_type_asset=$conn->query($sql_type_asset);

         if($result_type_asset->num_rows > 0) { 
             while($rs_type = $result_type_asset->fetch_assoc()) {   
                
                $name_asset=$rs_type['name']; 
        ?> 
                          <option value="<?php echo $rs_type['id'];?>" readonly ><?php echo $name_asset;?></option> 
      <?php    }
            }     ?>
                         
                        </select>

                      </div>
                 </div> 
              </div>
              <div class="col-md-4 col-sm-12" id="create_deal_duration_p"> 
                 <div class="form-group row">
                    <label for="inputEmail3" class="col-md-12 col-sm-12 col-form-label"> ระยะเวลาสัญญา :  </label>
                    <div class="col-md-12 col-sm-12"> 
                       <select class="form-control select2bs4"  name="deal_duration" id="deal_duration" style="width: 100%;"> 
                          <option value="0" <?php if($deal_duration=='0'){ ?>selected <?php } ?> >ไม่ระบุ  </option>  
                    <?php for ($i = 1; $i <= 100; $i++) { ?>
                           <option value="<?php echo $i;?>" <?php if($deal_duration==$i){ ?>selected <?php } ?>><?php echo $i;?> เดือน </option>     
                    <?php } ?>                     
                        </select>

                      </div>
                 </div> 
              </div>

              <div class="col-md-4 col-sm-12"> 
                 <div class="form-group row">
                    <label for="inputEmail4" class="col-md-12 col-sm-12 col-form-label">วันย้ายเข้า : </label>
                    <div class="col-md-12 col-sm-12"> 
                        <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                           <input type="text" class="form-control" data-target="#reservationdate1" name="deal_rent_till"  placeholder="โปรดกรอกตาม format ให้ถูกต้อง 01/01/2022" value="<?php echo $deal_rent_till;?>"  data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask />
                            <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                          </div>

                    </div> 
                 </div> 
              </div> 
           

               <div class="col-md-4 col-sm-12"  > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-md-12 col-sm-12 col-form-label">โครงการที่สนใจ : </label>
                    <div class="col-md-12  col-sm-12">
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
                      <div class="col-md-4 col-sm-12"> 
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-12 col-sm-12 col-form-label">สถานีรถไฟฟ้า : </label>
                          <div class="col-md-12 col-sm-12">
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
                      <div class="col-md-4 col-sm-12"> 
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

              <div class="col-md-12 col-sm-12"  <?php echo $check_hidden;?>  > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-md-12 col-sm-12 col-form-label">โครงการอื่นๆที่สนใจ : </label>
                    <div class="col-md-12 col-sm-12">
                      <input type="text" class="form-control" id="project_other" name="project_other" placeholder="" value="<?php echo $project_other;?>" >
                    </div>
                  </div> 
              </div> 
              

              <div class="col-md-4 col-sm-12"> 
                  <div class="form-group row">
                       <label for="inputEmail4" class="col-md-12 col-sm-12 col-form-label">ห้องนอน : </label>
                        <div class="col-md-12 col-sm-12"> 
                           <input type="text" class="form-control" id="bedroom" name="bedroom" placeholder="หากเป็น studio ให้กรอก 0" title="จำนวนห้องนอน" value="<?php echo $bedroom;?>" > 
                       </div> 
                  </div> 
              </div>
 
 
 
                      <div class="col-md-4 col-sm-12"> 
                           <div class="form-group row">
                            <label for="inputEmail4" class="col-md-12 col-sm-12 col-form-label">งบประมาณ : </label>
                            <div class="col-md-12 col-sm-12"> 
                              <input type="text" class="form-control" id="budget_start" name="budget_start" placeholder="โปรดกรอกตัวเลขเท่านั้น เช่น 20000" title="งบประมาณต่ำสุด" value="<?php echo $budget_start;?>" nkeyup="dokeyup(this, event);" onchange="dokeyup(this, event);" onkeypress="return Numbers(event)" required="" > 
                            </div> 
                          </div> 
                      </div>
              <div class="col-md-4 col-sm-12"> 
                  
              </div>
                      <div class="col-md-4 col-sm-12"> 
                           <div class="form-group row">
                            <label for="inputEmail4" class="col-md-12 col-sm-12 col-form-label">วันที่สะดวกไปชมทรัพย์ : </label>
                            <div class="col-md-12 col-sm-12"> 
                              <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                  <input type="text" class="form-control" data-target="#reservationdate2" name="open_room"  placeholder="โปรดกรอกตาม format ให้ถูกต้อง 01/01/2022" value="<?php echo $open_room;?>"  data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" />
                                  <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                  </div>
                              </div>

                            </div> 
                          </div> 
                      </div> 
                       <div class="col-md-4 col-sm-12"> 
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-12 col-form-label"> เลี้ยงสัตว์รึเปล่า :  </label>
                            <div class="col-sm-12"> 
                            <select class="form-control select2bs4"  name="pet_friendly" id="pet_friendly" style="width: 100%;"> 
                              <option value="0" <?php if($pet_friendly=='0'){ ?>selected <?php } ?> >ไม่เลี้ยง  </option>  
                              <option value="1" <?php if($pet_friendly=='1'){ ?>selected <?php } ?>>เลี้ยงสัตว์ </option>                      
                            </select>

                            </div>
                          </div> 
                      </div>
                       <div class="col-md-4 col-sm-12"> 
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-12 col-form-label"> ประเภทสัตว์เลี้ยง :  </label>
                            <div class="col-sm-12"> 
                                <input type="text" class="form-control" id="pet_friendly_type" name="pet_friendly_type" placeholder="" title=" " value="" >
 
                            </div>
                          </div> 
                      </div> 
                       
                       <div class="col-md-12 col-sm-12" > 
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-md-12 col-sm-12 col-form-label">ความต้องการอื่นๆ (ถ้ามี) : </label>
                            <div class="col-md-12 col-sm-12">  
                              <textarea class="form-control" rows="5" placeholder="Enter ..." id="remark" name="remark"><?php echo $remark;?></textarea>
                            </div>
                          </div> 
                       </div>

            <?php if($status=='edit'){ ?>
                       <div class="col-md-12 col-sm-12" > 
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-md-12 col-sm-12 col-form-label">เซลล์ผู้ดูแล : </label>
                            <div class="col-md-12 col-sm-12">  
       
                                <select class="form-control select2bs4"  name="create_deal_sale" style="width: 100%;"> 
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
                                  <option value="<?php echo $register_id;?>" <?php if($create_deal_sale==$register_id){?> selected <?php } ?>  ><?php echo $register_name;?></option> 

              <?php   }
                 }  ?>
                                 
                                </select>

                            </div>
                          </div> 
                       </div>


                <?php } ?>

                      <div class="col-12" id="buyer_contact_submit" >
                       
                    
                           <center><input type="submit" id="submit"  class="btn btn-danger" value="บันทึกข้อมูล"></center>
                         
                        <!-- /.form-group -->
                      </div>


            </div> 
          </div>

       </form>

      </div>
   </section>

<?php  } ?>



<?php if($id!=""){ 

 

 ?>



    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
 
           
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->


<?php  } ?>



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
<script src="template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
  
<!-- jQuery -->
<script src="template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
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
 
  
<!-- jQuery UI -->
<script src="template/plugins/jquery-ui/jquery-ui.min.js"></script>
 
 
 
 
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
    $('#datemask2').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate1').datetimepicker({
        format: 'DD/MM/YYYY'
    });
    //Date picker
    $('#reservationdate2').datetimepicker({
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