 

<?php

if($_GET['page_no']==''){
   echo("<script> top.location.href='?page=upload_file_excel_check&page_no=1'</script>");   
}

 $sub_text_1= substr($_SERVER['REQUEST_URI'],-9);

$page_no= substr($sub_text_1,8);
//echo $page_no." ".$cate_id;


?>
 
 
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         


   <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Fixed Header Table</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                    <th>No</th>
                    <th>Status</th>
                    <th>Type</th>
                    <th>Deal</th>
                    <th>Project</th>
                    <th>House No.</th>
                    <th>Room</th>  
                    <th>พื้นที่ใช้ </th>  
                    <th>Price</th>   
          
                    <th>BTS</th> 
                    <th>Zone</th>
                    <th>Approve</th>
                    <th></th>
                    <!--
                    <th>ภาพประกอบ</th>
                    <th>พื้นที่ดิน</th>
                    <th>MAP</th>
                    <th>Contactติดต่อ</th>
                    <th>ทิศ</th> -->
                    <th></th>
                    </tr>
                  </thead>
                  <tbody>

   <?php



 if (isset($page_no) && $page_no!="" && $page_no!="l") {
    $page_no = $page_no;
    } else {
        $page_no = 1;
        }

    $total_records_per_page = 12;
    $offset = ($page_no-1) * $total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
    $adjacents = "2"; 

 

/*
SELECT Orders.OrderID, Customers.CustomerName, Orders.OrderDate
FROM Orders
INNER JOIN Customers
ON Orders.CustomerID=Customers.CustomerID; */


 $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM  dbo_data_excel_listing 
                                 ");
    

    $total_records = mysqli_fetch_array($result_count);
    $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $second_last = $total_no_of_pages - 1; // total page minus 1

 

                $result = mysqli_query($conn,"SELECT * FROM dbo_data_excel_listing     LIMIT $offset, $total_records_per_page  ");





 
        // output data of each row
          
        while($rs_listing = mysqli_fetch_array($result)) {
         
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
         $ex_list_view=$rs_listing['ex_list_view'];
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
         $ex_list_location_en=$rs_listing['ex_list_location_en'];
         $ex_list_zone=$rs_listing['ex_list_zone'];
         $ex_list_listing_status=$rs_listing['ex_list_listing_status'];
         $ex_list_rent_till=$rs_listing['ex_list_rent_till'];
         $project_id=$rs_listing['project_id'];
         $ex_list_date_update=$rs_listing['ex_list_date_update'];
         $ex_list_public=$rs_listing['ex_list_public'];
         $ex_list_premium=$rs_listing['ex_list_premium'];
         
    if($_SESSION['STATUS_ID']=='2' or $_SESSION['STATUS_ID']=='3' or $_SESSION['STATUS_ID']=='4' 
      or $_SESSION['STATUS_ID']==$ex_list_contact ){   

         if($ex_list_contact_name!=''){ $ex_list_contact_name="Owner Name : ".$ex_list_contact_name." Tel : ".$ex_list_contact_tel;}
     }else{ $ex_list_contact_name="-"; }
         
         if($ex_list_listing_status=='' or $ex_list_listing_status=='0'){ $ex_list_listing_status="No Status";  }
         else if($ex_list_listing_status=='1'){ $ex_list_listing_status="Available"; $stauts_list_color="#42d700"; }
         else if($ex_list_listing_status=='2'){ $ex_list_listing_status="Contracted ไม่ล็อคสิทธิ"; $stauts_list_color="#42d700"; }
         else if($ex_list_listing_status=='3'){ $ex_list_listing_status="Rented";  $ex_list_rent_till=$ex_list_rent_till; $stauts_list_color="#ff0000"; }
         else if($ex_list_listing_status=='4'){ $ex_list_listing_status="Sold(by Connex)";  $stauts_list_color="#ff0000"; }
         else if($ex_list_listing_status=='5'){ $ex_list_listing_status="Sold(by Others)"; $stauts_list_color="#ff0000"; }
            
          if($ex_list_price!=''){ $ex_list_price=number_format($ex_list_price);}else{$ex_list_price="ยังไม่ระบุราคา";}


          if($ex_list_deal_type=='1'){ $ex_list_deal_type="ขาย";}else{$ex_list_deal_type="เช่า";}

          if($ex_list_sqm!='' or $ex_list_sqm=='0'){  $ex_list_sqm=$ex_list_sqm."ตร.ม."; }
        
          if($ex_list_bedroom>0){$ex_list_bedroom=$ex_list_bedroom."bed";}else{ $ex_list_bedroom=$ex_list_bedroom; }
          if($ex_list_bathroom>0){$ex_list_bathroom=$ex_list_bathroom."bath";}else{ $ex_list_bathroom=$ex_list_bathroom; }

      /////////// type_project ////////////////

           
             $sql_project="SELECT * FROM type_project where project_id='$project_id' ";  
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
             $project_facilities=$rs_project['project_facilities'];
             $project_nearby_places=$rs_project['project_nearby_places'];
             $project_zone=$rs_project['project_zone'];

         



        if($project_id!=''){ 

               $ex_list_project=$project_name." | ".$project_name_en;
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
 
             $no++;   

     ?> 

                    <tr>
                        <td  >


                      <center style="width: 50px; " >

                        <a target="_blank" href="?page=upload_file_excel_check_view&listing=<?php echo $ex_list_listing_code;?>" title="<?php echo "UPDATEข้อมูล : ".$ex_list_date_update;?>" >
                          <?php echo $ex_list_listing_code;?><br>
                                               
                         
                      
                            &nbsp;
                            <a href="?page=create_listing&status=edit&id=<?php echo $ex_list_listing_code;?>"><img src="img/icon/png/pencil-2x.png" width="15"  ></a>&nbsp;&nbsp;&nbsp;
                            <a href="include/process.php?page=create_listing&status=del&id=<?php echo $ex_list_listing_code;?>"><img src="img/icon/png/trash-2x.png" width="15" onclick="return confirm('คุณแน่ใจที่จะลบ Listing : <?php echo $ex_list_listing_code;?>');"  ></a>
                             &nbsp;&nbsp;&nbsp;
                            
                      </center>

                        </td>
                        <td ><center style="width: 50px;color: <?php echo $stauts_list_color;?>;"><a onclick="window.open('page/listing_status.php?id=<?php echo $ex_list_listing_code;?>', '_blank', 'location=yes,height=650,width=520,scrollbars=yes,status=yes');">

     
                          <?php echo $ex_list_listing_status;?>
                            <br><?php echo $ex_list_rent_till;?>
                          </a>
                          
                        </center></td>
                        <td><center style="width: 50px;"><?php echo $ex_list_listing_type;?></center></td>
                        <td><center style="width: 30px;"><?php echo $ex_list_deal_type;?></center></td>
                        <td > <a title="<?php echo $ex_list_contact_name;?>"><?php echo "".$ex_list_project;?></a> 


                        </td> 
                        <td> <?php echo $ex_list_house_number;?> </td>
                        <td> <?php echo $ex_list_bedroom. "<br/>".$ex_list_bathroom;?> </td>
                        <td> <?php echo $ex_list_sqm;?> </td>     
                        <td> <a onclick="window.open('page/listing_prices.php?id=<?php echo $ex_list_listing_code;?>', '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');">
                          <?php echo $ex_list_price;?></a> </td>   
                       
                        <td> <?php echo $ex_list_train_station;?> </td> 
                        <td> <?php echo $ex_list_zone;?></center></td> 
                        <td> <?php if($ex_list_public=='1'){?>
                                   <span class="badge badge-success"><?php echo "Public";?></span> 
                                                           <?php }else{?>
                                    <span class="badge badge-danger"><?php echo "Draft";?></span> <?php }?><br>


                                     <a onclick="window.open('page/listing_save_portfolio.php?id=<?php echo $ex_list_listing_code;?>', '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');">

                               <img src="img/icon/icon-save.png" title="บันทึก Listing" width="20"></a>

                                   </td> 
                        <td><center style="width: 40px; " >
                             </center></td> 

                       <td><?php echo $ex_list_location_en;?>
                         

                    
                            

                       </td> 
                    </tr>



      <?php 
              
         }  ?>
 
                  </tbody>
                </table>




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
    <a <?php if($page_no > 1){ echo "href='?page=upload_file_excel_check&page_no=$previous_page'"; } ?> class='page-link'>Previous</a>
    </li>
       
    <?php 
    if ($total_no_of_pages <= 2){       
        for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
            if ($counter == $page_no) {
           echo "<li class='page-item active'><a class='page-link' >$counter</a></li>";  
                }else{
           echo "<li class='page-item'><a href='?page=upload_file_excel_check&page_no=$counter' class='page-link' >$counter</a></li>";
                }
        }
    }
    elseif($total_no_of_pages > 5){
        
    if($page_no <= 10) {         
     for ($counter = 1; $counter < 4; $counter++){       
            if ($counter == $page_no) {
           echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";  
                }else{
           echo "<li class='page-item'><a href='?page=upload_file_excel_check&page_no=$counter' class='page-link'>$counter</a></li>";
                }
        }
        echo "<li class='page-item'><a class='page-link'>...</a></li>";
        echo "<li class='page-item'><a href='?page=upload_file_excel_check&page_no=$second_last' class='page-link'>$second_last</a></li>";
        echo "<li class='page-item'><a href='?page=upload_file_excel_check&page_no=$total_no_of_pages' class='page-link'>$total_no_of_pages</a></li>";
        }

     elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {         
        echo "<li class='page-item'><a href='?page=upload_file_excel_check&page_no=1' class='page-link'>1</a></li>";
        echo "<li class='page-item'><a href='?page=upload_file_excel_check&page_no=2' class='page-link'>2</a></li>";
        echo "<li class='page-item'><a class='page-link'>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {         
           if ($counter == $page_no) {
           echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";  
                }else{
           echo "<li class='page-item'><a href='??page=upload_file_excel_check&page_no=$counter' class='page-link'>$counter</a></li>";
                }                  
       }
       echo "<li class='page-item'><a class='page-link'>...</a></li>";
       echo "<li class='page-item'><a href='?page=upload_file_excel_check&page_no=$second_last' class='page-link' >$second_last</a></li>";
       echo "<li class='page-item'><a href='?page=upload_file_excel_check&page_no=$total_no_of_pages' class='page-link' >$total_no_of_pages</a></li>";      
            }
        
        else {
        echo "<li class='page-item'><a href='?page_no=1' class='page-link'>1</a></li>";
        echo "<li class='page-item'><a href='?page_no=2' class='page-link'>2</a></li>";
        echo "<li class='page-item'><a class='page-link'>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
           echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";  
                }else{
           echo "<li class='page-item'><a href='?page_no=$counter' class='page-link'>$counter</a></li>";
                }                   
                }
            }
    }
?>
  <!--  
    <li <?php if($page_no >= $total_no_of_pages){ echo "class='page-item disabled'"; } ?>>
    <a <?php if($page_no < $total_no_of_pages) { echo "href='?page=upload_file_excel_check&page_no=$next_page'"; } ?> class='page-link'>Next</a>
    </li>
    <?php if($page_no < $total_no_of_pages){
        echo "<li class='page-item'><a href='?page=upload_file_excel_check&page_no=$total_no_of_pages' class='page-link' >Last &rsaquo;&rsaquo;</a></li>";
        } ?>-->
                                    <li class='page-item'><a href="#" class='page-link'>Next</a></li>
                                </ul>
                            </div>





              </div>
              <!-- /.card-body -->


                        


            </div>
            <!-- /.card -->
          </div>
        </div>






    </section>