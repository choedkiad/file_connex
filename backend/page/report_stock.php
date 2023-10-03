

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
  font-size: 14px;
  text-align: center;

  
}
tr:nth-child(even){background-color: #f2f2f2}
tr:hover {background-color: #f5f5f5}
</style>

<?php

  $check=$_POST['check'];
  $date_update_start=$_POST['date_update_start'];
  $register_status=$_POST['register_status'];
  $date_update_end=$_POST['date_update_end'];
  $register_lcok=$_POST['register_lcok'];
  $today=date('Y-m-d');
 
  $calExpireDate=date ("Y-m-d", strtotime("+15 day", strtotime($today)));

  $p=$_GET['p'];
  $user=$_GET['user'];
  $tab=$_GET['tab'];

 if($check=='1'){


	if($date_update_start==''){ 

	      $date_update_start_u="01-01-2022 00:00:00";

	} 



	if($date_update_end==''){ 

	      $date_update_end_u="01-01-2050 00:00:00";

	} 

    if($date_update_start!='' and $date_update_end!=''){
	      $month_u=substr($date_update_start,3 , 2);
	      $year_u=substr($date_update_start,6 , 4 ); 
	      $date_u=substr($date_update_start,0, 2 );
	      $date_update_start_u=$year_u."-".$month_u."-".$date_u." 00:00:00";


	      $month_u=substr($date_update_end,3 , 2);
	      $year_u=substr($date_update_end,6 , 4 ); 
	      $date_u=substr($date_update_end,0, 2 );
	      $date_update_end_u=$year_u."-".$month_u."-".$date_u." 23:59:59";

    }

 }



  $register_id=$_POST['register_id'];
  $p_post=$_POST['p'];
  $tab_post=$_POST['tab'];


   if($p_post!=''){

      echo("<script> top.location.href='./?page=report_stock&p=listing_all&user=$register_id&date_start=$date_update_start_u&date_end=$date_update_end_u&tab=$tab_post'</script>"); 

  }


                   if($date_update_start!=''){    
                         $date_up=" and  report_account_date>='$date_update_start_u' and  report_account_date <='$date_update_end_u' ";   
                   }else{

                   } 


                   if($register_status!=''){
                       $register_status_s = " register_status='$register_status' "; 
                   }else{
                       $register_status_s = " register_status LIKE '%$register_status%' ";
                   }

                   if($register_lcok!=''){
                       $register_lcok_s = " and register_lcok='$register_lcok' "; 
                   }else{
                       $register_lcok_s = " and register_lcok LIKE '%$register_lcok%' "; 
                   }


 if($p!=''){

      $date_update_start=$_GET['date_update_start'];
      $date_update_end=$_GET['date_update_end'];

      $date_update_start_u=substr($date_update_start,0 , 10)." 00:00:00";
      $date_update_end_u=substr($date_update_end,0 , 10)." 23:59:59";


 }

?>


<?php

if($p==''){  ?> 

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row" style="padding: 10px;">
 
          <div class="col-md-12">



            <div class="card">
              <div class="card-header">
                <div class="card-body">

                  <form method="post" id="form" enctype="multipart/form-data" action="./?page=report_stock" class=" form-inline"> 
              
	              <input type="text" class="form-control" style="width: 100%;" name="page"  value="report_stock" hidden="hidden" >
	              <input type="text" class="form-control" style="width: 100%;" name="check"  value="1" hidden="hidden" >  


               <div class="container-fluid">
                <div class="row">    


                  <div class="col-md-3">
                     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-5 col-form-label">Date วันเริ่ม : </label>
                        <div class="col-sm-7">
                          <div class="input-group date" id="reservationdate" data-target-input="nearest">
                              <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="date_update_start" value="<?php echo $date_update_start;?>" />
                              <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                       </div>  
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-5 col-form-label">Date วันสิ้นสุด : </label>
                        <div class="col-sm-7">
                          <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                              <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate2" name="date_update_end" value="<?php echo $date_update_end;?>" />
                              <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                       </div>  
                     </div>
                  </div>

                  <div class="col-md-3"> 
                    <div class="form-group row">
                       <label for="inputEmail3" class="col-sm-5 col-form-label">ตำแหน่ง : </label>
                       <div class="col-sm-7">
                                  <select class="form-control select" name="register_status" id="register_status"  style="width: 100%;">
                                    <option value="">ยังไม่ระบุ</option>  
                                    <option value="0" <?php if($register_status=='0'){?> selected <?php } ?>>ทั่วไป</option> 
				                            <option value="1" <?php if($register_status=='1'){?> selected <?php } ?>>ตัวแทนขาย</option> 
      			                        <option value="2" <?php if($register_status=='2'){?> selected <?php } ?>>ทีมสต๊อก</option> 
      			                        <option value="3" <?php if($register_status=='3'){?> selected <?php } ?>>เจ้าหน้าที่สินเชื่อ</option> 
        				                    <option value="4" <?php if($register_status=='4'){?> selected <?php } ?>>ผู้ดูแลระบบ</option> 
        				                    <option value="5" <?php if($register_status=='5'){?> selected <?php } ?>>ผู้บริหาร</option> 
                                  </select>
                         </div>
                     </div> 
                  </div>   
                  <div class="col-md-3"> 
                    <div class="form-group row">
                       <label for="inputEmail3" class="col-sm-5 col-form-label">สถานะ : </label>
                       <div class="col-sm-7">
                                  <select class="form-control select" name="register_lcok" id="register_lcok"  style="width: 100%;">
                                    <option value="">ทั้งหมด</option>  
                                    <option value="0" <?php if($register_lcok=='0'){?> selected <?php } ?>>เฉพาะผู้ที่ยังอยู่</option> 
                                    <option value="1" <?php if($register_lcok=='1'){?> selected <?php } ?>>เฉพาะผู้ที่ลาออกแล้ว</option>  
                                  </select>
                         </div>
                     </div> 
                  </div>   
                  <br><br>
                  <div class="col-md-12"> 

                  	  <div class="col-md-12"> 
	                     <center><button type="submit" class="btn btn-primary">Search</button>
	                          <a class="btn btn-primary" href="?page=report_stock">clear</a>
	                     </center>

	                  </div>

                  </div>
                </div>
              </div>
              

                 </div>
              </div>
           </div>


            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">ALL</a>
                  </li>
                       <!--             
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Listing แต่ละวัน</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Messages</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Settings</a>
                  </li>-->
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">

 

                  <table class="table table-bordered">
                    <thead>
                      <tr> 
                        <th style="width: 50px;" rowspan="2" >#</th>  
                        <th style="width: 230px;" rowspan="2" >Name</th> 
                        <th style="width: 300px;" colspan="3" >Listing</th>
                        <th style="width: 80px;" rowspan="2" >upload ภาพ</th>     
                        <th style="width: 200px;" colspan="2" >DEAL</th>  
                        <th style="width: 80px;" rowspan="2"   >ดูเบอร์</th>
                        <th style="width: 80px;" colspan="2" >การติดต่อ</th>
                        <th style="width: 300px;" colspan="3" >Listing (Public)</th>   
                      </tr>
                      <tr> 
                        <th style="width: 80px">เพิ่ม Listing</th>
                        <th style="width: 60px">ถูกลบ</th>
                        <th style="width: 80px">เหลือ Listing</th>
                        <th style="width: 75px">สร้าง Deal</th>
                        <th style="width: 85px">นำเสนอห้อง</th>
                        <th style="width: 80px;" >ติดต่อ</th>
                        <th style="width: 80px;" >ติดต่อได้</th>
                        <th style="width: 80px">Listingที่ได้</th>
                        <th style="width: 80px">ในระบบ</th>
                        <th style="width: 80px">นอกระบบ</th>
                      </tr>
                    </thead>
                    <tbody>
           


  	 <?php
  												// Check connection
   
  		 if ($conn->connect_error) {
      		 die("Connection failed: " . $conn->connect_error);
  	     }

  		 $no=0;

  		 $sql="SELECT * FROM dbo_register AS register where $register_status_s $register_lcok_s order by register_lcok ASC, register_id ASC "; 
  		 $result = $conn->query($sql);

  		 if($result->num_rows > 0) {
      	  // output data of each row
      		 while($rs = $result->fetch_assoc()) {
               
 
               $register_id=$rs['register_id'];
               $register_nickname=$rs['register_nickname'];
               $register_name=$rs['register_name']." ($register_nickname)";
               $register_email=$rs['register_email'];
               $register_tel=$rs['register_tel'];
               $register_line=$rs['register_line'];
               $register_img=$rs['register_img'];

 
              
               if($register_img!=''){  $register_img_url="../../../images/team/$register_img";
               }else{ $register_img_url="../../../images/team/noimages.jpg";  }

              ///////// ROW LISTING ////////////
               /*
                $sql_list_code="SELECT ex_list_id FROM dbo_data_excel_listing where ex_list_contact='$id'  and ex_list_date_update>='$date_update_start_u'  
                                     and ex_list_date_update<='$date_update_end_u'  order by ex_list_id DESC";
                $result_list_code = $conn->query($sql_list_code); 
  
                $num_listing=mysqli_num_rows($result_list_code);
              */

              ///////// ROW LISTING ////////////

                /*
                $sql_list_code_del="SELECT ex_list_id FROM dbo_data_excel_listing where ex_list_contact='$id' and ex_list_date_update>='$date_update_start_u'  
                                     and ex_list_date_update<='$date_update_end_u' and ex_list_close='1' order by ex_list_id DESC";
                $result_list_code_del = $conn->query($sql_list_code_del); 
        
                $num_listing_del=mysqli_num_rows($result_list_code_del);

                $num_listing_all=$num_listing-$num_listing_del;

                
                $num_listings_del_s=$num_listings_del_s+$num_listing_del;
                $num_listings=$num_listings+$num_listing;

                $num_listings_del_s_all=$num_listings-$num_listings_del_s;

               */

              /// see number ///
               $sql_report="SELECT sum(see_number) as see_number , sum(edit_listing) as edit_listing , sum(contact_listing) as contact_listing  , sum(listing_public) as listing_public 
                               , sum(upload_images) as upload_images , sum(delete_listing) as delete_listing , sum(create_listing) as create_listing , sum(create_listing_public) as create_listing_public , sum(create_deal) as create_deal , sum(create_subdeal) as create_subdeal 
                               FROM report_account  WHERE register_id='$register_id' $date_up ";  
               $result_report= $conn->query($sql_report); 
               $rs_report= $result_report->fetch_assoc();

               $see_number=$rs_report['see_number']; 
               $edit_listing=$rs_report['edit_listing'];
               $listing_public=$rs_report['listing_public'];
               $contact_listing=$rs_report['contact_listing'];
               $upload_images=$rs_report['upload_images'];
               $delete_listing=$rs_report['delete_listing'];
               $create_listing=$rs_report['create_listing'];
               $create_listing_public=$rs_report['create_listing_public'];
               $create_deal=$rs_report['create_deal'];
               $create_subdeal=$rs_report['create_subdeal'];
              ///  ///             
             
              $num_listing_all=$create_listing-$delete_listing;
              $update_listing_public=$listing_public+$create_listing_public;
 
           		 $no++;   


 

       ?>  
                      <tr style="font-size: 15px;">
                        <td><?php echo $no;?></td>
                        <td><a href="?page=report_stock&p=listing_all&user=<?php echo $register_id;?>&date_start=<?php echo $date_update_start_u;?>&date_end=<?php echo $date_update_end_u;?>&tab=listing_create" target="_black"><?php echo $register_name;?></td>
                        <td><center><?php if($create_listing!=0){ echo number_format($create_listing); }else{ echo "-";}?> </center></td>
                        <td><center><?php if($delete_listing!=0){ echo number_format($delete_listing); }else{ echo "-";}?></center> </td>
                        <td><center><?php if($num_listing_all!=0){ echo number_format($num_listing_all); }else{ echo "-";}?></center> </td> 
                        <td><center><?php if($upload_images!=0){ echo number_format($upload_images); }else{ echo "-";}?></center> </td> 
                        <td><center><?php if($create_deal!=0){ echo number_format($create_deal); }else{ echo "-";}?></center> </td> 
                        <td><center><?php if($create_subdeal!=0){ echo number_format($create_subdeal); }else{ echo "-";}?></center> </td>  
                        <td><center><?php if($see_number!=0){ echo number_format($see_number); }else{ echo "-";}?></center> </td> 
                        <td><center><?php if($edit_listing!=0){ echo number_format($edit_listing); }else{ echo "-";}?></center> </td> 
                        <td><center><?php if($contact_listing!=0){ echo number_format($contact_listing); }else{ echo "-";}?></center> </td> 
                        <td><center><?php if($update_listing_public!=0){ echo number_format($update_listing_public); }else{ echo "-";}?></center> </td> 
                        <td><center><?php if($listing_public!=0){ echo number_format($listing_public); }else{ echo "-";}?></center> </td> 
                        <td><center><?php if($create_listing_public!=0){ echo number_format($create_listing_public); }else{ echo "-";}?></center> </td> 
                      </tr>

            
            <!-- /.col -->
        <?php }
          } ?>


       <?php    

                   if($date_update_start!=''){    
                         $date_up=" and  account.report_account_date>='$date_update_start_u' and  account.report_account_date <='$date_update_end_u' ";   
                   }else{
                         $date_up="   ";   
                   } 
                   if($register_status!=''){
                       $register_status_s = " register.register_status='$register_status' "; 
                   }else{
                       $register_status_s = " register.register_status LIKE '%$register_status%' ";
                   }

                   if($register_lcok!=''){
                       $register_lcok_s = " and register.register_lcok='$register_lcok' "; 
                   }else{
                       $register_lcok_s = " and register.register_lcok LIKE '%$register_lcok%' "; 
                   }      

               $sql_report="SELECT sum(account.see_number) as see_number , sum(account.edit_listing) as edit_listing , sum(account.contact_listing) as contact_listing  , 
                               sum(account.listing_public) as listing_public   , sum(account.upload_images) as upload_images , sum(account.delete_listing) as delete_listing , 
                               sum(account.create_listing) as create_listing , sum(account.create_listing_public) as create_listing_public , sum(account.create_deal) as create_deal , 
                               sum(account.create_subdeal) as create_subdeal 
                               FROM report_account as account
                               LEFT JOIN dbo_register as register on (register.register_id=account.register_id)

                               WHERE $register_status_s $register_lcok_s  $date_up ";  
               $result_report= $conn->query($sql_report); 
               $rs_report= $result_report->fetch_assoc();

               $see_number=$rs_report['see_number']; 
               $edit_listing=$rs_report['edit_listing'];
               $listing_public=$rs_report['listing_public'];
               $contact_listing=$rs_report['contact_listing'];
               $upload_images=$rs_report['upload_images'];
               $delete_listing=$rs_report['delete_listing'];
               $create_listing=$rs_report['create_listing'];
               $create_listing_public=$rs_report['create_listing_public'];
               $create_deal=$rs_report['create_deal'];
               $create_subdeal=$rs_report['create_subdeal'];
              ///  ///             
             
              $num_listing_all=$create_listing-$delete_listing;
              $update_listing_public=$listing_public+$create_listing_public;

    ?>

                      <tr style="font-size: 15px; background-color: #FF202B;color: #fff;font-weight:bold;">
                        <td>#</td>
                        <td>รวมทั้งหมด</td>
                        <td><center> <?php echo number_format($create_listing);?> </center></td>
                        <td><center><?php echo number_format($delete_listing);?></center> </td>
                        <td><center><?php echo number_format($num_listing_all);?></center> </td> 
                        <td><center><?php echo number_format($upload_images);?></center> </td> 
                        <td><center><?php echo number_format($create_deal);?></center> </td> 
                        <td><center><?php echo number_format($create_subdeal);?></center> </td>  
                        <td><center><?php echo number_format($see_number);?></center> </td> 
                        <td><center><?php echo number_format($edit_listing);?></center> </td> 
                        <td><center><?php echo number_format($contact_listing);?></center> </td> 
                        <td><center><?php echo number_format($update_listing_public);?></center> </td> 
                        <td><center><?php echo number_format($listing_public);?></center> </td> 
                        <td><center><?php echo number_format($create_listing_public);?></center> </td> 
                      </tr>
                    </tbody>
                  </table>

 


                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
   
 
  



                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                      
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab"> 

                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>



            <div class="card">
              <div class="card-header">
                <div class="card-body">


               <div class="container-fluid">
                <div class="row">
    
    

                       <a href="#" class="btn btn-success " data-toggle="modal" data-target="#modal-default" onclick="window.open('include/process_update_report.php', '_blank', 'location=yes,height=1,width=1,scrollbars=yes,status=yes');"  >  อัพเดทข้อมูลภายในวันนี้</a> 
             
        

             
                </div>
              </div>



                </div>
                <!-- /.card-body -->
              </div>
            </div>          
          </div>
        </div>

      </div>
    </section>

<?php }else if($p=='listing_all'){ 

    $date_start=$_GET['date_start'];
    $date_end=$_GET['date_end'];


    if($date_start!='' and $date_end!=''){

        $year_u=substr($date_start,0 , 4 ); 
        $month_u=substr($date_start,5 , 2);
        $date_u=substr($date_start,8, 2 );
        $date_start=$year_u."-".$month_u."-".$date_u." 00:00:00";

        $date_start_u=$date_u."/".$month_u."/".$year_u;

        $year_u=substr($date_end,0 , 4 ); 
        $month_u=substr($date_end,5 , 2);
        $date_u=substr($date_end,8, 2 );
        $date_end=$year_u."-".$month_u."-".$date_u." 23:59:59";

        $date_end_u=$date_u."/".$month_u."/".$year_u;
    }


      if($date_start!=''){    

               $date_up=" and  report_account_date>='$date_start' and  report_account_date <='$date_end' ";   
              
              if($tab=='listing_create'){
                  $date_record=" and  ex_list_date_create>='$date_start' and  ex_list_date_create <='$date_end' "; 
              }else if($tab=='create_deal'){
                  $date_record=" and  create_deal_create>='$date_start' and  create_deal_create <='$date_end' ";        
              }else if($tab=='create_subdeal'){
                  $date_record=" and  subdeal.subdeal_create_date>='$date_start' and  subdeal.subdeal_create_date <='$date_end' ";    
              }else if($tab=='create_listing_public'){
                  $date_record=" and  ex_list_public_date>='$date_start' and  ex_list_public_date <='$date_end' ";  
              }else{
                  $date_record=" and  record_date>='$date_start' and  record_date <='$date_end' "; 
              }
      }else{

      } 

  		 $sql="SELECT * FROM dbo_register where register_id='$user'  order by register_id ASC"; 
  		 $result = $conn->query($sql);
       $rs= $result->fetch_assoc();

               $register_status=$rs['register_status'];
               $register_id=$rs['register_id'];

               $register_name=$rs['register_name']." "." (".$rs['register_nickname'].")";
               $register_email=$rs['register_email'];
               $register_tel=$rs['register_tel'];
               $register_line=$rs['register_line'];



              ///  ///
               $sql_report="SELECT sum(see_number) as see_number , sum(edit_listing) as edit_listing , sum(contact_listing) as contact_listing  , sum(listing_public) as listing_public 
                               , sum(upload_images) as upload_images , sum(delete_listing) as delete_listing , sum(create_listing) as create_listing , sum(create_listing_public) as create_listing_public , sum(create_deal) as create_deal , sum(create_subdeal) as create_subdeal 
                               FROM report_account  WHERE register_id='$register_id' $date_up ";  
               $result_report= $conn->query($sql_report); 
               $rs_report= $result_report->fetch_assoc();

               $see_number=$rs_report['see_number']; 
               $edit_listing=$rs_report['edit_listing'];
               $listing_public=$rs_report['listing_public'];
               $contact_listing=$rs_report['contact_listing'];
               $upload_images=$rs_report['upload_images'];
               $delete_listing=$rs_report['delete_listing'];
               $create_listing=$rs_report['create_listing'];
               $create_listing_public=$rs_report['create_listing_public'];
               $create_deal=$rs_report['create_deal'];
               $create_subdeal=$rs_report['create_subdeal'];
                             ///  ///             
             
              $num_listing_all=$create_listing-$delete_listing;
              $update_listing_public=$listing_public+$create_listing_public;
 
 
             if($tab=='listing_create'){


                    $sql="SELECT ex_list_listing_code , ex_list_heading , ex_list_deal_type , ex_list_date_create ,ex_list_price , ex_list_listing_status , ex_list_rent_till , ex_list_remark , ex_list_close , ex_list_rent_till_date
                          FROM   dbo_data_excel_listing  WHERE  ex_list_contact='$register_id' $date_record ";
                    $result_record= $conn->query($sql);  


             }else if($tab=='listing_upimage'){

                    $sql_record= "SELECT DISTINCT ex_list_id  FROM dbo_record WHERE record_user_id='$register_id' and record_note LIKE '%เพิ่มภาพประกอบ รหัสทรัพย์%'   $date_record "; 
                    $result_record=$conn->query($sql_record);                    

              }else if($tab=='edit_listing'){

                    $sql_record= "SELECT DISTINCT ex_list_id  FROM dbo_record WHERE record_user_id='$register_id' and record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%'  $date_record "; 
                    $result_record=$conn->query($sql_record);                    

              }else if($tab=='contact_listing'){

                    $sql_record= "SELECT DISTINCT ex_list_id  FROM dbo_record 
                           WHERE record_user_id='$register_id' and ex_list_listing_status='1' and record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%' $date_record  or 
                                 record_user_id='$register_id' and ex_list_listing_status='3' and record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%' $date_record  or 
                                 record_user_id='$register_id' and ex_list_listing_status='4' and record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%' $date_record  or 
                                 record_user_id='$register_id' and ex_list_listing_status='5' and record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%' $date_record  or 
                                 record_user_id='$register_id' and ex_list_listing_status='6' and record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%' $date_record  or 
                                 record_user_id='$register_id' and ex_list_listing_status='15' and record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%' $date_record "; 
                    $result_record=$conn->query($sql_record);                    

              }else if($tab=='create_deal'){

                    $sql_record= "SELECT * FROM  dbo_create_deal WHERE user_id='$register_id'  $date_record "; 
                    $result_record=$conn->query($sql_record);                    

              }else if($tab=='create_subdeal'){

                    $sql_record="SELECT * FROM  dbo_subdeal AS subdeal
                                 LEFT JOIN dbo_create_deal AS deal ON (subdeal.create_deal_code=deal.create_deal_code)
                                 WHERE subdeal.user_id='$register_id'  $date_record "; 
                    $result_record=$conn->query($sql_record);      

              }else if($tab=='create_listing_public'){

                    $sql="SELECT ex_list_listing_code , ex_list_heading , ex_list_deal_type , ex_list_date_create ,ex_list_price , ex_list_listing_status , ex_list_rent_till , ex_list_remark , ex_list_close , ex_list_public_date
                          FROM   dbo_data_excel_listing  WHERE  ex_list_contact='$register_id' $date_record ";
                    $result_record= $conn->query($sql);                  

             }
 

               /*
             }
        $sql_record="SELECT DISTINCT record.record_note ,record.record_user_id,record.ex_list_id  
                     FROM dbo_record  as record
                     LEFT JOIN dbo_data_excel_listing as listing  ON record.ex_list_id=listing.ex_list_listing_code
                     WHERE record.record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%' and record.record_user_id='$id' 
                                     and record.record_date>='$date_update_start_u'  
                                     and record.record_date<='$date_update_end_u'    order by record.ex_list_id DESC";
                          
        $result_record= $conn->query($sql_record); 
        $num_record1=mysqli_num_rows($result_record); 



        $sql_record2="SELECT DISTINCT record.record_note ,record.record_user_id,record.ex_list_id   
                     FROM dbo_record as record
                     LEFT JOIN dbo_data_excel_listing as listing  ON record.ex_list_id=listing.ex_list_listing_code
                     WHERE record.record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%' and record.record_user_id='$id' 
                                     and record.record_date>='$date_update_start_u'  
                                     and record.record_date<='$date_update_end_u'  and  record.ex_list_listing_status!='7'  order by record.ex_list_id DESC";
        $result_record2= $conn->query($sql_record2); 
        $num_record2=mysqli_num_rows($result_record2); 


        $sql_record3="SELECT DISTINCT record.record_note ,record.record_user_id,record.ex_list_id   
                      FROM dbo_record as record
                      LEFT JOIN dbo_data_excel_listing as listing  ON record.ex_list_id=listing.ex_list_listing_code
                      WHERE record.record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%' and record.record_user_id='$id'
                                    and record.record_date>='$date_update_start_u'  
                                    and record.record_date<='$date_update_end_u' 
                                    and  listing.ex_list_date_create='2022-08-10 20:26:39' and listing.ex_list_public='1' order by record.ex_list_id DESC";
        $result_record3= $conn->query($sql_record3); 
        $num_record3=mysqli_num_rows($result_record3); 


        $sql_record4="SELECT DISTINCT record.record_note ,record.record_user_id,record.ex_list_id   
                      FROM dbo_record as record
                      LEFT JOIN dbo_data_excel_listing as listing  ON record.ex_list_id=listing.ex_list_listing_code
                      WHERE record.record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%' and record.record_user_id='$id' 
                                   and record.record_date>='$date_update_start_u'  
                                   and record.record_date<='$date_update_end_u' 
                                   and  listing.ex_list_date_create=='2022-08-10 20:26:39' and listing.ex_list_public='1' order by record.ex_list_id DESC";
        $result_record4= $conn->query($sql_record4); 
        $num_record4=mysqli_num_rows($result_record4); 



        $sql_record5="SELECT DISTINCT record.record_note ,record.record_user_id,record.ex_list_id   
                      FROM dbo_record as record
                      LEFT JOIN dbo_data_excel_listing as listing  ON record.ex_list_id=listing.ex_list_listing_code
                      WHERE record.record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%' and record.record_user_id='$id' 
                                   and record.record_date>='$date_update_start_u'  
                                   and record.record_date<='$date_update_end_u' 
                                   and listing.ex_list_public='1' order by record.ex_list_id DESC";
        $result_record5= $conn->query($sql_record5); 
        $num_record5=mysqli_num_rows($result_record5); 
*/
	?>




    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row" style="padding: 10px;">
 
          <div class="col-md-12">



            <div class="card">
              <div class="card-header">
                <div class="card-body">

                  <div class="col-md-12" >
                      <h3><?php echo "Report : ".$register_name;?></h3>
                  </div>

                  <form method="post" id="form" enctype="multipart/form-data" action="./?page=report_stock" class=" form-inline"> 
              
                <input type="text" class="form-control" style="width: 100%;" name="page"  value="report_stock" hidden="hidden" >
                <input type="text" class="form-control" style="width: 100%;" name="p"  value="<?php echo $p;?>" hidden="hidden" >
                <input type="text" class="form-control" style="width: 100%;" name="tab"  value="<?php echo $tab;?>" hidden="hidden" >  
                <input type="text" class="form-control" style="width: 100%;" name="register_id"  value="<?php echo $register_id;?>" hidden="hidden" >  
                <input type="text" class="form-control" style="width: 100%;" name="check"  value="1" hidden="hidden" >  

               <div class="container-fluid">
                <div class="row">    


                  <div class="col-md-4">
                     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4 col-form-label">Date วันเริ่ม : </label>
                        <div class="col-sm-8">
                          <div class="input-group date" id="reservationdate" data-target-input="nearest">
                              <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="date_update_start" value="<?php echo $date_start_u;?>" />
                              <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                       </div>  
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4 col-form-label">Date วันสิ้นสุด : </label>
                        <div class="col-sm-8">
                          <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                              <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate2" name="date_update_end" value="<?php echo $date_end_u;?>" />
                              <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                       </div>  
                     </div>
                  </div>
           
               
                  <br><br>
                  <div class="col-md-12"> 

                      <div class="col-md-12"> 
                       <center><button type="submit" class="btn btn-primary">Search</button>
                            <a class="btn btn-primary" href="?page=report_stock">clear</a>
                       </center>

                    </div>

                  </div>
                </div>
              </div>
              

                 </div>
              </div>
           </div>


            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a href="?page=report_stock&p=listing_all&user=<?php echo $user;?>&date_start=<?php echo $date_start;?>&date_end=<?php echo $date_end;?>&tab=listing_create" class="nav-link <?php if($tab=='listing_create'){?>active<?php } ?>" >  เพิ่ม Listing 
                         <?php if($create_listing!='0'){ echo "(".$create_listing.")";} ?>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="?page=report_stock&p=listing_all&user=<?php echo $user;?>&date_start=<?php echo $date_start;?>&date_end=<?php echo $date_end;?>&tab=listing_upimage" class="nav-link <?php if($tab=='listing_upimage'){?>active<?php } ?>" >upload ภาพ
                         <?php if($upload_images!='0'){ echo "(".$upload_images.")";} ?>
                    </a>
                  </li>


                  <li class="nav-item">
                    <a href="?page=report_stock&p=listing_all&user=<?php echo $user;?>&date_start=<?php echo $date_start;?>&date_end=<?php echo $date_end;?>&tab=create_deal" class="nav-link <?php if($tab=='create_deal'){?>active<?php } ?>" >สร้าง Deal
                         <?php if($create_deal!='0'){ echo "(".$create_deal.")";} ?>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="?page=report_stock&p=listing_all&user=<?php echo $user;?>&date_start=<?php echo $date_start;?>&date_end=<?php echo $date_end;?>&tab=create_subdeal" class="nav-link <?php if($tab=='create_subdeal'){?>active<?php } ?>" >นำเสนอห้อง
                         <?php if($create_subdeal!='0'){ echo "(".$create_subdeal.")";} ?>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="?page=report_stock&p=listing_all&user=<?php echo $user;?>&date_start=<?php echo $date_start;?>&date_end=<?php echo $date_end;?>&tab=edit_listing" class="nav-link <?php if($tab=='edit_listing'){?>active<?php } ?>" >ติดต่อOwner (Listing) 
                         <?php if($edit_listing!='0'){ echo "(".$edit_listing.")";} ?>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="?page=report_stock&p=listing_all&user=<?php echo $user;?>&date_start=<?php echo $date_start;?>&date_end=<?php echo $date_end;?>&tab=contact_listing" class="nav-link <?php if($tab=='contact_listing'){?>active<?php } ?>" >ติดต่อOwnerได้ (Listing) 
                         <?php if($contact_listing!='0'){ echo "(".$contact_listing.")";} ?>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="?page=report_stock&p=listing_all&user=<?php echo $user;?>&date_start=<?php echo $date_start;?>&date_end=<?php echo $date_end;?>&tab=create_listing_public" class="nav-link <?php if($tab=='create_listing_public'){?>active<?php } ?>" >Listing นอกระบบ (Public) 
                         <?php if($create_listing_public!='0'){ echo "(".$create_listing_public.")";} ?>
                    </a>
                  </li>
                  <!--
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">ติดต่อได้</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab2" data-toggle="pill" href="#custom-tabs-one-profile2" role="tab" aria-controls="custom-tabs-one-profile2" aria-selected="false">Listingที่ได้ (public) </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab3" data-toggle="pill" href="#custom-tabs-one-profile3" role="tab" aria-controls="custom-tabs-one-profile3" aria-selected="false">Listingที่ได้ (เฉพาะในระบบ)</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab4" data-toggle="pill" href="#custom-tabs-one-profile4" role="tab" aria-controls="custom-tabs-one-profile4" aria-selected="false">Listingที่ได้ (นอกระบบ)</a>
                  </li> -->
                  <!--
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Messages</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Settings</a>
                  </li>-->
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
 
   <div class="scroll">
        
    <?php if($tab=='listing_create' or $tab=='listing_upimage' or $tab=='edit_listing' or $tab=='contact_listing' or $tab=='create_listing_public'  ){  ?>

                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 5px;">#</th> 
                        <th style="width: 8px">Listing Code</th>
                        <th style="width: 5px">Deal</th>
                        <th style="width: 40px">Price</th>
                        <th style="width: 400px;">Heading</th>
                        <th style="width: 10px">IMG</th>
                        <th style="width: 40px">Staus</th> 
 
                        <th style="width: 100px">
               <?php if($tab=='create_listing_public'){ 
                            echo "Public Date"; 
                     }else{
                            echo "Update Date"; 
                     }
               ?>

                        </th> 



                      </tr>
                    </thead>
                    <tbody>
           


  	 <?php 




  												// Check connection
   
  		 if ($conn->connect_error) {
      		 die("Connection failed: " . $conn->connect_error);
  	     }
 

  		 if($result_record->num_rows > 0) {
      	  // output data of each row
      		 while($rs=$result_record->fetch_assoc()) {
               
               $ex_list_id=$rs['ex_list_id'];


              if($tab!='listing_create' and $tab!='create_listing_public'){

                    $sql="SELECT ex_list_listing_code , ex_list_heading , ex_list_deal_type , ex_list_date_create ,ex_list_price , ex_list_listing_status , ex_list_rent_till , ex_list_rent_till_date , ex_list_remark , ex_list_close , ex_list_date_update ,ex_list_date_create 
                    FROM dbo_data_excel_listing 
                    where ex_list_listing_code='$ex_list_id' ";
                    $result= $conn->query($sql);  
                    $rs=$result->fetch_assoc();
 
              }
     
                   $ex_list_listing_status=$rs['ex_list_listing_status'];
                   $ex_list_listing_status_check=$rs['ex_list_listing_status'];
                   $ex_list_deal_type=$rs['ex_list_deal_type'];
                   $ex_list_remark=$rs['ex_list_remark'];  
                   $ex_list_heading=$rs['ex_list_heading']; 
                   $ex_list_rent_till=$rs['ex_list_rent_till'];
                   $ex_list_price=$rs['ex_list_price'];
                   $ex_list_close=$rs['ex_list_close'];
                   $ex_list_id=$rs['ex_list_listing_code'];
                   $ex_list_public_date=$rs['ex_list_public_date'];
                   $ex_list_date_update=$rs['ex_list_date_update'];
                   $ex_list_date_create=$rs['ex_list_date_create'];
                   $ex_list_rent_till_date=$rs['ex_list_rent_till_date'];



                   if($ex_list_heading==''){ $ex_list_heading='';}
                   
                   $expire_check='';
            
                 if($ex_list_listing_status=='' or $ex_list_listing_status=='0'){ $ex_list_listing_status="No Status"; $stauts_list_color="#000";  }
                 else if($ex_list_listing_status=='1'){ $ex_list_listing_status="Available"; $stauts_list_color="#42d700"; }
                 else if($ex_list_listing_status=='2'){ $ex_list_listing_status="Contracted ไม่ล็อคสิทธิ"; $stauts_list_color="#42d700"; }
                 else if($ex_list_listing_status=='3'){ $ex_list_listing_status="Rented";  $ex_list_rent_till=$ex_list_rent_till; 
                                                  //เช็ควันหมดอายุ
                                                 if($ex_list_rent_till_date<=$calExpireDate){ $stauts_list_color="#ffa200"; 
                                                        $expire_check=' <span class="right badge badge-danger">New</span>';  
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
                                                 if($ex_list_rent_till_date<=$calExpireDate){ $stauts_list_color="#ffa200"; 
                                                          $expire_check=' <span class="right badge badge-danger">New</span>';  
                                                  }else{  $stauts_list_color="#ff0000";  $expire_check=''; } 
                                                           
                                                 }

                if($ex_list_deal_type=='1'){ $ex_list_deal_type="ขาย";}else{$ex_list_deal_type="เช่า";}

                      ///////////   ////////////////
                 $sql_img="SELECT * FROM dbo_data_excel_listing_img where ex_list_listing_code='$ex_list_id' ";  
                 $result_img= $conn->query($sql_img);
                 $num_img=mysqli_num_rows($result_img); 

               		 $no++;   
  
       ?>  
                      <tr <?php if($ex_list_close=='1'){ ?>style="background-color: #990F02; color: #fff;" <?php } ?>  >
                        <td><?php echo $no;?></td>
                        <td><a href="?page=upload_file_excel_check_view&listing=<?php echo $ex_list_id;?>" target="_black"><?php echo $ex_list_id;?></a></td>
                        <td><center><?php echo $ex_list_deal_type;?></center> </td>
                        <td><?php echo number_format($ex_list_price);?></td>
                        <td><?php echo $ex_list_heading;?></td>
                        <td>
                       <?php if($num_img!=''){ ?>
                                  
                                  <img src="../../images/icon/icon-true.png" width="15" >

                       <?php }else{ ?>
                                   <img src="../../images/icon/icon-no.png" width="15" > 
                       <?php } ?>
                        </td>
                        <td style="color:<?php echo $stauts_list_color;?>"><center ><a onclick="window.open('page/listing_status.php?id=<?php echo $ex_list_id;?>', '_blank', 'location=yes,height=650,width=520,scrollbars=yes,status=yes');"style="cursor:pointer;"   > 
                                  <?php echo $ex_list_listing_status.$expire_check;  ?>
                                   <?php if($ex_list_listing_status_check=='3' or $ex_list_listing_status_check=='15'){ ?> <br><?php echo $ex_list_rent_till; } ?>
                                  </a>

                            </center>

                        </td>  
                        <td style="width: 80px"><center>
                         <?php if($tab=='listing_create'){ 
                                      echo $ex_list_date_create;

                               }else if($tab=='create_listing_public'){ 
                                      echo $ex_list_public_date;
                               
                               }else{
                                     echo $ex_list_date_update;
                               } ?>          
                             </center></td>  
                      </tr>

            
            <!-- /.col -->
        <?php }
          } ?>

 
                 
                    </tbody>
                  </table>

 <?php } ?>


 <?php if($tab=='create_deal'){  ?>


                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 50px;">#</th>    
                        <th style="width: 80px;">CODE</th>                    
                        <th style="width: 280px;">ชื่อลูกค้า</th>
                        <th>ความต้องการ</th> 
                        <th>Budget </th> 
                        <th>Process</th>
                        <th>เสนอห้อง</th>    
                        <th>workload</th> 
                        <th>วันที่สร้าง </th>  
                        <th>วันที่อัพเดท </th>    
                      </tr>
                    </thead>
                    <tbody>
           


     <?php  
                          // Check connection
   
       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
         }
 

       if($result_record->num_rows > 0) {
          // output data of each row
           while($rs=$result_record->fetch_assoc()) {   $no++;    
 
               $create_deal_id=$rs['create_deal_id'];
               $create_deal_code=$rs['create_deal_code'];
               $create_deal_title=$rs['create_deal_title'];   
               $create_deal_attention=$rs['create_deal_attention'];
               $create_deal_type=$rs['create_deal_type'];     
               $buyer_contact_code=$rs['buyer_contact_code'];  
               $create_deal_sale=$rs['create_deal_sale'];  
               $contact_deal_win=$rs['contact_deal_win'];  
               $create_deal_budget_start=$rs['create_deal_budget_start']; 
               $create_deal_budget_end=$rs['create_deal_budget_end']; 
               $stock_offer=$rs['stock_offer']; 
               $sale_offer=$rs['sale_offer']; 
               $workload=$rs['workload']; 
               $create_deal_create=$rs['create_deal_create']; 
               $create_deal_update=$rs['create_deal_update']; 
               $message_stock_id=$rs['message_stock_id']; 

               $sum_offer=$stock_offer+$sale_offer;

               $budget=number_format($create_deal_budget_start)." - ".number_format($create_deal_budget_end);

               $color_text="color: #000;";
               $bg="background-color: #fff;"; 


               if($workload=='0'){
                      $workload_text="ไม่ระบุ"; $workload_bg_icon="#3949ab;"; $workload_text_color="#fff;"; 
               }else if($workload=='1'){
                      $workload_text="In Progress";  $workload_bg_icon="#fcecd2;";  $workload_text_color="#000;"; 
               }else if($workload=='2'){
                      $workload_text="Active";  $workload_bg_icon="#ffce7f;";  $workload_text_color="#000;"; 
               }else if($workload=='3'){
                      $workload_text="Closing";  $workload_bg_icon="#fe9805;";  $workload_text_color="#fff;"; 
               }else if($workload=='4'){
                      $workload_text="Close Won";  $workload_bg_icon="#158000;";  $workload_text_color="#fff;";  
               }else if($workload=='5'){
                      $workload_text="Close Lost "; $workload_bg_icon="#fe0505;";  $workload_text_color="#fff;";  
               }


               if($create_deal_attention==''){ //ซื้อ

                   if($contact_deal_win=='1'){ $deal_status="15"; $status_name="เสนอห้อง"; $status_icon="float-center badge"; $bg_icon="#5e92c2;"; $text_color="#fff;"; }
                   else if($contact_deal_win=='2'){ $deal_status="30"; $status_name="นัดชมทรัพย์"; $status_icon="float-center badge"; $bg_icon="#17a2b8;";$text_color="#fff;"; } 
                   else if($contact_deal_win=='3'){ $deal_status="45"; $status_name="ชมทรัพย์แล้ว"; $status_icon="float-center badge"; $bg_icon="#17a2b8;";$text_color="#fff;"; }
                   else if($contact_deal_win=='10'){ $deal_status="50"; $status_name="จองแล้ว"; $status_icon="float-center badge"; $bg_icon="#1f4e78;"; $text_color="#fff;";}
                   else if($contact_deal_win=='4'){ $deal_status="60"; $status_name="นัดเซ็นสัญญา"; $status_icon="float-center badge"; $bg_icon="#1f4e78;"; $text_color="#fff;";}
                   else if($contact_deal_win=='5'){ $deal_status="70"; $status_name="เซ็นสัญญาแล้ว"; $status_icon="float-center badge"; $bg_icon="#1f4e78;"; $text_color="#fff;";}
                   else if($contact_deal_win=='6'){ $deal_status="80"; $status_name="นัดโอน"; $status_icon="float-center badge"; $bg_icon="#ffd966;"; $text_color="#fff;";}
                   else if($contact_deal_win=='7'){ $deal_status="90"; $status_name="โอนแล้ว"; $status_icon="float-center badge"; $bg_icon="#ffd966;"; $text_color="#fff;";}
                   else if($contact_deal_win=='8'){ $deal_status="100"; $status_name="Close Won"; $status_icon="float-center badge"; $bg_icon="#806000;"; $text_color="#fff;";  $bg="background-color: #d8f5c6;";   } 
                   else if($contact_deal_win=='9'){ $deal_status="100"; $status_name="Close Lost"; $status_icon="float-center badge"; $bg_icon="#e51c23;"; $text_color="#fff;"; $bg="background-color: #f5c6cc;";      } 
                   else{  $deal_status="1"; $status_name="ไม่มีข้อมูลเสนอห้อง"; $status_icon="float-center badge bg-danger"; }

               }else{ //เช่า

                   if($contact_deal_win=='1'){ $deal_status="15"; $status_name="เสนอห้อง"; $status_icon="float-center badge"; $bg_icon="#5e92c2;"; $text_color="#fff;";}
                   else if($contact_deal_win=='2'){ $deal_status="30"; $status_name="นัดชมทรัพย์"; $status_icon="float-center badge";  $bg_icon="#17a2b8;"; $text_color="#fff;";}
                   else if($contact_deal_win=='3'){ $deal_status="45"; $status_name="ชมทรัพย์แล้ว"; $status_icon="float-center badge"; $bg_icon="#17a2b8;"; $text_color="#fff;";}
                   else if($contact_deal_win=='10'){ $deal_status="50"; $status_name="จองแล้ว"; $status_icon="float-center badge"; $bg_icon="#17a2b8;"; $text_color="#fff;";}
                   else if($contact_deal_win=='4'){ $deal_status="60"; $status_name="นัดเซ็นสัญญา"; $status_icon="float-center badge"; $bg_icon="#1f4e78;"; $text_color="#fff;";}
                   else if($contact_deal_win=='5'){ $deal_status="80"; $status_name="เซ็นสัญญาแล้ว"; $status_icon="float-center badge"; $bg_icon="#1f4e78;"; $text_color="#fff;";} 
                   else if($contact_deal_win=='8'){ $deal_status="100"; $status_name="Close Won"; $status_icon="float-center badge"; $bg_icon="#806000;"; $text_color="#fff;"; $bg="background-color: #d8f5c6;";  } 
                   else if($contact_deal_win=='9'){ $deal_status="100"; $status_name="Close Lost"; $status_icon="float-center badge";$bg_icon="#e51c23;"; $text_color="#fff;"; $bg="background-color:  #f5c6cc;";  } 
                   else{  $deal_status="1"; $status_name="ไม่มีข้อมูลเสนอห้อง"; $status_icon="float-center badge bg-danger"; }

               }

               if($create_deal_attention=='1'){ 
                     $attention="ซื้อ"; 
               }else if($create_deal_attention=='2'){  
                     $attention="เช่า"; 
               }
                   
                   $expire_check=''; 
                    
  
       ?>  
                      <tr  style="font-size: 15px; <?php echo $bg.$color_text;?>  " >
                          <td><center><?php echo $no;?></center></td> 
                          <td><a href="<?php echo $deal_buyer_url;?>"><?php echo $create_deal_code;?></a></td> 
                          <td style="text-align: left;"><?php echo $create_deal_title;?> <?php if($buyer_contact_status=='1'){  }else if($buyer_contact_status=='2'){  echo " (Agent)"; }else{  } ?></td>
                          <td><?php echo $attention;?></td>
                          <td><?php echo $budget;?></td> 
                          
                            <td class="project_progress" style="padding: 5px;">
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="<?php echo $deal_status;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $deal_status;?>%">
                                    </div>
                                </div>
                                <small style="font-size: 15px;">
                                    <center><span  class="<?php echo $status_icon;?>" style="background-color: <?php echo $bg_icon;?> color:<?php echo $text_color;?>"><?php echo $status_name;?></span></center>
                                </small>
                            </td>
                            <td style="text-align: center;"  >
                                <?php echo $sum_offer;?>
                            </td>  
                            
                            <td style="text-align: center;font-size: 16px;" >
       
                    <?php if( $_SESSION['STATUS_ID']=='1' and $_SESSION['STATUS_HEAD']=='1' or $_SESSION['STATUS_ID']=='4' or $_SESSION['STATUS_ID']=='5'){ ?> 

                                <button type="button" class="float-center badge" style=" background-color: <?php echo $workload_bg_icon;?>; color: <?php echo $workload_text_color;?>;"  data-toggle="modal" data-target="#modal-default<?php echo $create_deal_code;?>">
                                          <?php echo $workload_text;?> 
                                </button>

                    <?php }else{ ?>
                                <button type="button" class="float-center badge" style=" background-color: <?php echo $workload_bg_icon;?>; color: <?php echo $workload_text_color;?>;"  data-toggle="modal" >
                                          <?php echo $workload_text;?> 
                                </button>
                    <?php } ?>
                                
                            </td>
                            <td><?php echo $create_deal_create;?></td>   
                            <td><?php echo $create_deal_update;?></td>
                  
                      </tr>

            
            <!-- /.col -->
        <?php }
          } ?>

 
                 
                    </tbody>
                  </table>


 <?php } ?>



 <?php if($tab=='create_subdeal'){  ?>


                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 50px;">#</th>    
                        <th style="width: 140px;">CX ที่นำเสนอ</th>   
                        <th style="width: 100px;">CODE DEAL</th>                  
                        <th style="width: 300px;">ชื่อลูกค้า</th>
                        <th>ความต้องการ</th> 
                        <th>Budget </th> 
                        <th>Process</th>  
                        <th>workload</th> 
                        <th>วันที่นำเสนอห้อง </th>    
                      </tr>
                    </thead>
                    <tbody>
           


     <?php  
                          // Check connection
   
       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
         }
 

       if($result_record->num_rows > 0) {
          // output data of each row
           while($rs=$result_record->fetch_assoc()) {   $no++;    
 
               $ex_list_listing_code=$rs['ex_list_listing_code'];
               $create_deal_id=$rs['create_deal_id'];
               $create_deal_code=$rs['create_deal_code'];
               $create_deal_title=$rs['create_deal_title'];   
               $create_deal_attention=$rs['create_deal_attention'];
               $create_deal_type=$rs['create_deal_type'];     
               $buyer_contact_code=$rs['buyer_contact_code'];  
               $create_deal_sale=$rs['create_deal_sale'];  
               $contact_deal_win=$rs['contact_deal_win'];  
               $create_deal_budget_start=$rs['create_deal_budget_start']; 
               $create_deal_budget_end=$rs['create_deal_budget_end']; 
               $stock_offer=$rs['stock_offer']; 
               $sale_offer=$rs['sale_offer']; 
               $workload=$rs['workload']; 
               $subdeal_create_date=$rs['subdeal_create_date'];  
               $message_stock_id=$rs['message_stock_id']; 

               $sum_offer=$stock_offer+$sale_offer;

               $budget=number_format($create_deal_budget_start)." - ".number_format($create_deal_budget_end);

               $color_text="color: #000;";
               $bg="background-color: #fff;"; 


               if($workload=='0'){
                      $workload_text="ไม่ระบุ"; $workload_bg_icon="#3949ab;"; $workload_text_color="#fff;"; 
               }else if($workload=='1'){
                      $workload_text="In Progress";  $workload_bg_icon="#fcecd2;";  $workload_text_color="#000;"; 
               }else if($workload=='2'){
                      $workload_text="Active";  $workload_bg_icon="#ffce7f;";  $workload_text_color="#000;"; 
               }else if($workload=='3'){
                      $workload_text="Closing";  $workload_bg_icon="#fe9805;";  $workload_text_color="#fff;"; 
               }else if($workload=='4'){
                      $workload_text="Close Won";  $workload_bg_icon="#158000;";  $workload_text_color="#fff;";  
               }else if($workload=='5'){
                      $workload_text="Close Lost "; $workload_bg_icon="#fe0505;";  $workload_text_color="#fff;";  
               }


               if($create_deal_attention==''){ //ซื้อ

                   if($contact_deal_win=='1'){ $deal_status="15"; $status_name="เสนอห้อง"; $status_icon="float-center badge"; $bg_icon="#5e92c2;"; $text_color="#fff;"; }
                   else if($contact_deal_win=='2'){ $deal_status="30"; $status_name="นัดชมทรัพย์"; $status_icon="float-center badge"; $bg_icon="#17a2b8;";$text_color="#fff;"; } 
                   else if($contact_deal_win=='3'){ $deal_status="45"; $status_name="ชมทรัพย์แล้ว"; $status_icon="float-center badge"; $bg_icon="#17a2b8;";$text_color="#fff;"; }
                   else if($contact_deal_win=='10'){ $deal_status="50"; $status_name="จองแล้ว"; $status_icon="float-center badge"; $bg_icon="#1f4e78;"; $text_color="#fff;";}
                   else if($contact_deal_win=='4'){ $deal_status="60"; $status_name="นัดเซ็นสัญญา"; $status_icon="float-center badge"; $bg_icon="#1f4e78;"; $text_color="#fff;";}
                   else if($contact_deal_win=='5'){ $deal_status="70"; $status_name="เซ็นสัญญาแล้ว"; $status_icon="float-center badge"; $bg_icon="#1f4e78;"; $text_color="#fff;";}
                   else if($contact_deal_win=='6'){ $deal_status="80"; $status_name="นัดโอน"; $status_icon="float-center badge"; $bg_icon="#ffd966;"; $text_color="#fff;";}
                   else if($contact_deal_win=='7'){ $deal_status="90"; $status_name="โอนแล้ว"; $status_icon="float-center badge"; $bg_icon="#ffd966;"; $text_color="#fff;";}
                   else if($contact_deal_win=='8'){ $deal_status="100"; $status_name="Close Won"; $status_icon="float-center badge"; $bg_icon="#806000;"; $text_color="#fff;";  $bg="background-color: #d8f5c6;";   } 
                   else if($contact_deal_win=='9'){ $deal_status="100"; $status_name="Close Lost"; $status_icon="float-center badge"; $bg_icon="#e51c23;"; $text_color="#fff;"; $bg="background-color: #f5c6cc;";      } 
                   else{  $deal_status="1"; $status_name="ไม่มีข้อมูลเสนอห้อง"; $status_icon="float-center badge bg-danger"; }

               }else{ //เช่า

                   if($contact_deal_win=='1'){ $deal_status="15"; $status_name="เสนอห้อง"; $status_icon="float-center badge"; $bg_icon="#5e92c2;"; $text_color="#fff;";}
                   else if($contact_deal_win=='2'){ $deal_status="30"; $status_name="นัดชมทรัพย์"; $status_icon="float-center badge";  $bg_icon="#17a2b8;"; $text_color="#fff;";}
                   else if($contact_deal_win=='3'){ $deal_status="45"; $status_name="ชมทรัพย์แล้ว"; $status_icon="float-center badge"; $bg_icon="#17a2b8;"; $text_color="#fff;";}
                   else if($contact_deal_win=='10'){ $deal_status="50"; $status_name="จองแล้ว"; $status_icon="float-center badge"; $bg_icon="#17a2b8;"; $text_color="#fff;";}
                   else if($contact_deal_win=='4'){ $deal_status="60"; $status_name="นัดเซ็นสัญญา"; $status_icon="float-center badge"; $bg_icon="#1f4e78;"; $text_color="#fff;";}
                   else if($contact_deal_win=='5'){ $deal_status="80"; $status_name="เซ็นสัญญาแล้ว"; $status_icon="float-center badge"; $bg_icon="#1f4e78;"; $text_color="#fff;";} 
                   else if($contact_deal_win=='8'){ $deal_status="100"; $status_name="Close Won"; $status_icon="float-center badge"; $bg_icon="#806000;"; $text_color="#fff;"; $bg="background-color: #d8f5c6;";  } 
                   else if($contact_deal_win=='9'){ $deal_status="100"; $status_name="Close Lost"; $status_icon="float-center badge";$bg_icon="#e51c23;"; $text_color="#fff;"; $bg="background-color:  #f5c6cc;";  } 
                   else{  $deal_status="1"; $status_name="ไม่มีข้อมูลเสนอห้อง"; $status_icon="float-center badge bg-danger"; }

               }

               if($create_deal_attention=='1'){ 
                     $attention="ซื้อ"; 
               }else if($create_deal_attention=='2'){  
                     $attention="เช่า"; 
               }
                   
                   $expire_check=''; 
                    
  
       ?>  
                      <tr  style="font-size: 15px; <?php echo $bg.$color_text;?>  " >
                          <td><center><?php echo $no;?></center></td> 
                          <td><a href="?page=upload_file_excel_check_view&listing=<?php echo $ex_list_listing_code;?>" target="_black"><?php echo $ex_list_listing_code;?></a></td>
                          <td><a href="<?php echo $deal_buyer_url;?>"><?php echo $create_deal_code;?></a></td> 
                          <td style="text-align: left;"><?php echo $create_deal_title;?> <?php if($buyer_contact_status=='1'){  }else if($buyer_contact_status=='2'){  echo " (Agent)"; }else{  } ?></td>
                          <td><?php echo $attention;?></td>
                          <td><?php echo $budget;?></td> 
                          
                            <td class="project_progress" style="padding: 5px;">
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="<?php echo $deal_status;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $deal_status;?>%">
                                    </div>
                                </div>
                                <small style="font-size: 15px;">
                                    <center><span  class="<?php echo $status_icon;?>" style="background-color: <?php echo $bg_icon;?> color:<?php echo $text_color;?>"><?php echo $status_name;?></span></center>
                                </small>
                            </td> 
                            
                            <td style="text-align: center;font-size: 16px;" >
       
                    <?php if( $_SESSION['STATUS_ID']=='1' and $_SESSION['STATUS_HEAD']=='1' or $_SESSION['STATUS_ID']=='4' or $_SESSION['STATUS_ID']=='5'){ ?> 

                                <button type="button" class="float-center badge" style=" background-color: <?php echo $workload_bg_icon;?>; color: <?php echo $workload_text_color;?>;"  data-toggle="modal" data-target="#modal-default<?php echo $create_deal_code;?>">
                                          <?php echo $workload_text;?> 
                                </button>

                    <?php }else{ ?>
                                <button type="button" class="float-center badge" style=" background-color: <?php echo $workload_bg_icon;?>; color: <?php echo $workload_text_color;?>;"  data-toggle="modal" >
                                          <?php echo $workload_text;?> 
                                </button>
                    <?php } ?>
                                
                            </td>
                            <td><?php echo $subdeal_create_date;?></td>    
                  
                      </tr>

            
            <!-- /.col -->
        <?php }
          } ?>

 
                 
                    </tbody>
                  </table>


 <?php } ?>

     </div>

                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
 
 
  



                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile2" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab2">

 


                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile3" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab3"> 


 



                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile4" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab4"> 

 


                  </div>





                </div>
              </div>
              <!-- /.card -->
            </div>



            <div class="card">
              <div class="card-header">
                <div class="card-body">


                     <div class="container-fluid">
                      <div class="row">
           
          

                            
                   
                      </div>
                    </div>



                </div>
                <!-- /.card-body -->
              </div>
            </div>          
          </div>
        </div>

      </div>
    </section>




<?php } ?>

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
<!-- dropzonejs -->
<script src="template/plugins/dropzone/min/dropzone.min.js"></script>

<script src="template/dist/js/adminlte.min.js"></script>


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
    $('#reservationdate').datetimepicker({
        format: 'DD/MM/YYYY'
    });
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