
<?php 

if( $_SESSION['STATUS_ID']!='4' and $_SESSION['STATUS_ID']!='5'){
           
           echo("<script> top.location.href='./'</script>"); 

}
?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">


          <div class="col-md-12">
            <!-- general form elements -->
 
              <!-- /.card-header -->
              <!-- form start -->
        
            <div class="card">
        

                <div class="row">
                    <div class="col-md-5"></div>
                    <div class="col-md-5"></div>         
                    <div class="col-md-2" style="padding: 10px;">
                         <a href="?page=create_register" class="btn btn-block btn-primary btn-lg" > เพิ่มผู้ใช้งาน</a>
                    </div>
                </div> 

              <!-- /.card-header -->
              <div class="card-body" style="margin: 5px;">
                <table id="example1" class="table table-bordered table-striped"  >
                  <thead>
                  <tr  style="font-size: 12px;"  >
          
                    <th >ลำดับ</th>
                    <th>ชื่อ</th>
                    <th>อีเมล์</th>
                    <th>เบอร์โทรศัพท์</th>
                    <th>สถานะ</th> 
                    <th>ประเภทตัวแทนขาย</th>
                    <th>ตำแหน่ง</th> 
                    <th>สังกัด</th> 
                    <th>สิทธิPlublic</th> 
                    <th>สิทธิPremium</th>
                    <th>สิทธิBoost Proppit</th> 
                    <th>สำหรับโฆษณา</th>
                    <th></th> 
                  </tr>
                  </thead>
                  <tbody>
	 <?php
												// Check connection
 
		 if ($conn->connect_error) {
    		 die("Connection failed: " . $conn->connect_error);
	     }

		 $no=0;

		 $sql="SELECT * FROM dbo_register order by register_id ASC"; 
		 $result = $conn->query($sql);

		 if($result->num_rows > 0) {
    	  // output data of each row
    		 while($rs = $result->fetch_assoc()) {
             
             $register_status=$rs['register_status'];
             $register_status_draft=$rs['register_status_draft'];
             $register_status_premium=$rs['register_status_premium'];
             $register_status_boostpost=$rs['register_status_boostpost'];
             $register_status_owner_tel=$rs['register_status_owner_tel'];
             $register_status_ads=$rs['register_status_ads'];
             $register_position=$rs['register_position'];
             $register_status_head=$rs['register_status_head'];
             $register_status_under=$rs['register_status_under'];
             $id=$rs['register_id'];
             
             if($register_status=='0'){ $status="ผู้ใช้ทั่วไป"; }
             elseif($register_status=='1'){ $status="ตัวแทนขาย"; } 
             else if($register_status=='2'){ $status="ทีมสต๊อก"; }
             else if($register_status=='3'){ $status="เจ้าหน้าที่สินเชื่อ"; }
             else if($register_status=='4'){ $status="ผู้ดูแลระบบ "; }
             else if($register_status=='5'){ $status="ผู้บริหาร"; }


             if($register_position=='1'){
                   $register_position='แนวสูง (คอนโด)';
             }else if($register_position=='2'){
                   $register_position='แนวราบ ';
             }else{
                   $register_position='';    
             }
            

             if($register_status_head=='1'){
                   $register_status_head='หัวหน้าเซลล์';
             }else if($register_status_head=='2'){
                   $register_status_head='หัวหน้าสต๊อก';
             }else{
                   $register_status_head='ไม่มีตำแหน่ง';
             }

             if($register_status_under!='0'){

                     $sql_head="SELECT * FROM dbo_register where register_id='$register_status_under' "; 
                     $result_head=$conn->query($sql_head);
                     $rs_head=$result_head->fetch_assoc();
                    
                     $register_status_under=$rs_head['register_name']." ".$rs_head['register_lastname']." (".$rs_head['register_nickname'].")";
             }else{
                     $register_status_under='';   
             }


         		 $no++;   

     ?> 
                  <tr style="font-size: 12px;" > 
                    <td>
                      <center> <?php echo $no;?> </center> 
                    </td>
                    <td><center style="width: 80px; " ><?php echo $rs['register_name']." ".$rs['register_lastname']." (".$rs['register_nickname'].")";?></center></td>
                    <td><center style="width: 200px; " ><?php echo $rs['register_email'];?></center></td>
                    <td><?php echo $rs['register_tel'];?></td>
                    <td><center style="width: 80px; " ><?php echo $status;?></center></td>
                    <td><center style="width: 80px; " ><?php echo $register_position;?></center></td>
                    <td><center style="width: 80px; " ><?php echo $register_status_head;?></center></td>
                    <td><center style="width: 80px; " ><?php echo $register_status_under;?></center></td>
                    <td>
                      
                      <div class="custom-control custom-switch">
                        <center>
                         <input type="checkbox" class="custom-control-input" id="customSwitch1<?php echo $id;?>"   value="1" <?php if($register_status_draft=='1'){ ?>checked="checked"<?php } ?>  onclick="window.open('include/process_register_status.php?id=<?php echo $id;?>&status=draft', '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');" style="cursor:pointer;"  >
                          <label class="custom-control-label" for="customSwitch1<?php echo $id;?>"> </label>
                        </center>
                      </div>

                    </td>
                    <td>
                      
                      <div class="custom-control custom-switch">
                        <center>
                         <input type="checkbox" class="custom-control-input" id="customSwitch2<?php echo $id;?>"   value="1" <?php if($register_status_premium=='1'){ ?>checked="checked"<?php } ?>  onclick="window.open('include/process_register_status.php?id=<?php echo $id;?>&status=premium', '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');" style="cursor:pointer;"  >
                          <label class="custom-control-label" for="customSwitch2<?php echo $id;?>"> </label>
                        </center>
                      </div>

                    </td> 

                    <td>
                      
                      <div class="custom-control custom-switch">
                        <center>
                         <input type="checkbox" class="custom-control-input" id="customSwitch3<?php echo $id;?>"   value="1" <?php if($register_status_boostpost=='1'){ ?>checked="checked"<?php } ?>  onclick="window.open('include/process_register_status.php?id=<?php echo $id;?>&status=boostpost', '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');" style="cursor:pointer;"  >
                          <label class="custom-control-label" for="customSwitch3<?php echo $id;?>"> </label>
                        </center>
                      </div>

                    </td>
                    <td> 
                      <div class="custom-control custom-switch">
                        <center>
                         <input type="checkbox" class="custom-control-input" id="customSwitch4<?php echo $id;?>"   value="1" <?php if($register_status_ads=='1'){ ?>checked="checked"<?php } ?>  onclick="window.open('include/process_register_status.php?id=<?php echo $id;?>&status=adv', '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');" style="cursor:pointer;"  >
                          <label class="custom-control-label" for="customSwitch4<?php echo $id;?>"> </label>
                        </center>
                      </div>

                    </td> 
                    <td>
                        <img src="img/icon/png/account-login-2x.png"  > &nbsp;
                        <a href="?page=create_register&edit=edit&id=<?php echo $id;?>"><img src="img/icon/png/pencil-2x.png"  ></a>&nbsp;
                        <img src="img/icon/png/trash-2x.png" >
                    </td>
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