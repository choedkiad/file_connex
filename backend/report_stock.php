









        <div class="row" style="padding: 10px;">
 
          <div class="col-md-6">

              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>E-mail</th>
                      <th style="width: 40px">จำนวน</th>
                      <th style="width: 40px">Update ล่าสุด</th>
                    </tr>
                  </thead>
                  <tbody>
         


	 <?php
												// Check connection
 
		 if ($conn->connect_error) {
    		 die("Connection failed: " . $conn->connect_error);
	     }

		 $no=0;

		 $sql="SELECT * FROM dbo_register where register_status='1' or register_status='2' order by register_id ASC"; 
		 $result = $conn->query($sql);

		 if($result->num_rows > 0) {
    	  // output data of each row
    		 while($rs = $result->fetch_assoc()) {
             
             $register_status=$rs['register_status'];
             $id=$rs['register_id'];

             $register_name=$rs['register_name'];
             $register_email=$rs['register_email'];
             $register_tel=$rs['register_tel'];
             $register_line=$rs['register_line'];
             $register_img=$rs['register_img'];


             if($register_status=='1'){ $status="ตัวแทนภายใน"; }
             else if($register_status=='0'){ $status="ผู้ใช้ทั่วไป"; }
             else if($register_status=='2'){ $status="admin"; }
             else if($register_status=='3'){ $status="เจ้าหน้าที่สินเชื่อ"; }
             else if($register_status=='4'){ $status="ผู้ดูแลระบบ "; }
             else if($register_status=='5'){ $status="ผู้บริหาร"; }
            
             if($register_img!=''){  $register_img_url="../../../images/team/$register_img";
             }else{ $register_img_url="../../../images/team/noimages.jpg";  }

            ///////// ROW LISTING ////////////
              $sql_list_code="SELECT ex_list_id FROM dbo_data_excel_listing where ex_list_contact='$id' order by ex_list_id DESC";
              $result_list_code = $conn->query($sql_list_code); 
              // output data of each row 
              $num_listing=mysqli_num_rows($result_list_code);


         		 $no++;   

     ?> 


                    <tr>
                      <td><?php echo $no;?></td>
                      <td><?php echo $register_name;?></td>
                      <td><?php echo $register_email;?></td>
                      <td><?php echo $num_listing;?></td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-danger">55%</span></td>
                    </tr>

          
          <!-- /.col -->
      <?php }
        } ?>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
          
          </div>
        </div>