 

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">


          <div class="col-md-12">
            <!-- general form elements -->
 
              <!-- /.card-header -->
              <!-- form start -->
        
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?php echo $title;?></h3>
              </div>

 
              <!-- /.card-header -->
              <div class="card-body" style="margin: 5px;">
                <table id="example1" class="table table-bordered table-striped"  >
                  <thead>
                  <tr   >
          
                    <th >รหัสทรัพย์</th>
                    <th>ประเภททรัพย์</th>
                    <th>ประเภทดิล</th>
                    <th>ชื่อโครงการ</th>
                    <th>โซนพื้นที่</th>
                    <th>BTS</th>
                    <th>จำนวนห้อง</th>
                    <th>พื้นที่ใช้สอย</th>
                    <th>พื้นที่ดิน</th>
                    <th>ราคา</th>
                    <th>อีเมล์</th>
                    <th>MAP</th>
                    <th>ลูกค้า</th>
                  </tr>
                  </thead>
                  <tbody>
	 <?php
												// Check connection
 
		 if ($conn->connect_error) {
    		 die("Connection failed: " . $conn->connect_error);
	     }

		 $no=0;

		 $sql="SELECT * FROM dbo_data_excel_listing order by ex_list_id  DESC";

		 $result = $conn->query($sql);

		 if($result->num_rows > 0) {
    	  // output data of each row
    		 while($rs = $result->fetch_assoc()) {
 
             $ex_list_email_address = str_replace("@connexproperty.co.th","@",$rs['ex_list_email_address'],$count); 
             $ex_list_listing_code=$rs['ex_list_listing_code'];
 
        		 $no++;   

     ?> 
                  <tr style="font-size: 14px;" >
             
                    <td >
                  <center>

                    <a target="_blank" href="?page=upload_file_excel_check_view&listing=<?php echo $ex_list_listing_code;?>" >
                      <?php echo $ex_list_listing_code;?>
                                           
                       <?php  
 
                         $sql_img="SELECT * FROM dbo_data_excel_listing_img where ex_list_listing_code='$ex_list_listing_code' order by listing_img_no ASC"; 
                         $result_img=$conn->query($sql_img);
                         $rs_img= $result_img->fetch_assoc();

                       ?> 
                          <img src="<?php echo $rs_img['listing_img_folder'].$rs_img['listing_img_name'];?>" style="width: 100px;" >
                    

                     </a>
                     <br><br>
                  
                    <img src="img/icon/png/account-login-2x.png"  >
                    <img src="img/icon/png/wrench-2x.png"  >
                    <img src="img/icon/png/trash-2x.png" >
                  </center>

                    </td>
                    <td><?php echo $rs['ex_list_listing_type'];?></td>
                    <td><?php echo $rs['ex_list_deal_type'];?></td>
                    <td><?php echo "โครงการ".$rs['ex_list_project'];?></td>
                    <td><?php echo $rs['ex_list_zone'];?></td>
                    <td><?php echo $rs['ex_list_train_station'];?></td>
                    <td><?php echo $rs['ex_list_bedroom']."ห้องนอน"."<br/>".$rs['ex_list_bathroom']."ห้องน้ำ";?></td>
                    <td><?php echo $rs['ex_list_sqm'];?></td>      
                    <td><?php echo $rs['ex_list_rai']."-".$rs['ex_list_ngan']."-".$rs['ex_list_wa']." ";?></td>              
                    <td><?php echo $rs['ex_list_price'];?></td>
                   
                    <td><?php echo $ex_list_email_address;?></td>
                    <td><a target="_black" href="<?php echo $rs['ex_list_googlmap'];?>"  ><img src="img/icon_googlemap.png" style="width: 50px;"></a></td>
                    <td><?php echo $rs['ex_list_contact_name']." | Tel: ".$rs['ex_list_contact_tel']." | LINE: ".$rs['ex_list_contact_lineid']." | E-Mail: ".$rs['ex_list_contact_email'];?></td>
       

                  </tr>  
      <?php 
             }
         }  ?>

 
                  </tbody>
          
                </table>
              </div>
              <!-- /.card-body -->
            </div>


             
        </div>
      </div>
    </section>