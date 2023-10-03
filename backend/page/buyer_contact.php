 

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">


          <div class="col-md-12">
            <!-- general form elements -->
 
              <!-- /.card-header -->
              <!-- form start -->
                <div class="row">
                    <div class="col-md-5"></div>
                    <div class="col-md-5"></div>         
                    <div class="col-md-2" style="padding: 10px;">
                         <a href="?page=create_buyer_contact&status=create" class="btn btn-block btn-primary btn-lg" > เพิ่มข้อมูล</a>
                    </div>
                </div> 
        
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?php echo $title;?></h3>
              </div>

 
              <!-- /.card-header -->
              <div class="card-body" style="margin: 5px;">
                <table id="example1" class="table table-bordered table-striped"  >
                  <thead>
                  <tr   > 
                    <th > </th>
                    <th>ชื่อลูกค้า</th>
                    <th>ความต้องการ</th> 
                    <th>Budget </th>  
                    <th>เบอร์ติอต่อ</th>
                    <th>เซลล์ผู้ดูแล</th>
                    <th>Process</th>
                    <th>status</th>   

                                              
                  </tr>
                  </thead>
                  <tbody>
	 <?php
												// Check connection
 
		 if ($conn->connect_error) {
    		 die("Connection failed: " . $conn->connect_error);
	     }

		 $no=0;

		 $sql="SELECT * FROM dbo_buyer_contact where buyer_contact_tel LIKE '%+66%' order by buyer_contact_id   DESC";  
		 $result = $conn->query($sql);

		 if($result->num_rows > 0) {
    	  // output data of each row
    		 while($rs_buyer=$result->fetch_assoc()) {
         
         $buyer_contact_id =$rs_buyer['buyer_contact_id'];
         $buyer_contact_code=$rs_buyer['buyer_contact_code'];
         $buyer_contact_number=$rs_buyer['buyer_contact_number'];
         $buyer_contact_type=$rs_buyer['buyer_contact_type'];
         $buyer_contact_attention=$rs_buyer['buyer_contact_attention'];
         $buyer_contact_name=$rs_buyer['buyer_contact_name'];
         $buyer_contact_nickname=$rs_buyer['buyer_contact_nickname'];
         $buyer_contact_tel=$rs_buyer['buyer_contact_tel'];
         $buyer_contact_tel_2=$rs_buyer['buyer_contact_tel_2'];
         $buyer_contact_tel_3=$rs_buyer['buyer_contact_tel_3'];
         $buyer_contact_tel_4=$rs_buyer['buyer_contact_tel_4'];
         $buyer_contact_whatsapp=$rs_buyer['buyer_contact_whatsapp'];
         $buyer_contact_wechat=$rs_buyer['buyer_contact_wechat']; 
         $buyer_contact_line=$rs_buyer['buyer_contact_line'];
         $buyer_contact_fb=$rs_buyer['buyer_contact_fb'];
         $buyer_contact_email=$rs_buyer['buyer_contact_email'];
         $buyer_contact_budget=$rs_buyer['buyer_contact_budget'];
         $buyer_contact_note=$rs_buyer['buyer_contact_note'];
         $sale_id=$rs_buyer['sale_id']; 
         $buyer_contact_status=$rs_buyer['buyer_contact_status'];
         $buyer_contact_date_update=$rs_buyer['buyer_contact_date_update'];
         $buyer_contact_date_create=$rs_buyer['buyer_contact_date_create'];

         if($buyer_contact_status=='0'){ $buyer_contact_status="0";  $status_name="เพิ่มข้อมูล"; $status_icon="float-center badge bg-danger";}
         else if($buyer_contact_status=='1'){ $buyer_contact_status="25"; $status_name="กำลังหาทรัพย์"; $status_icon="float-center badge bg-danger";}
         else if($buyer_contact_status=='2'){ $buyer_contact_status="50"; $status_name="นัดชมห้อง"; $status_icon="float-center badge bg-info";}
         else if($buyer_contact_status=='3'){ $buyer_contact_status="75"; $status_name="ทำสัญญา/วางมัดจำ"; $status_icon="float-center badge bg-info";}
         else if($buyer_contact_status=='4'){ $buyer_contact_status="100"; $status_name="ปิดการขาย"; $status_icon="float-center badge bg-success";}


                      
   
      /////////// type_asset ////////////////
             $sql_ass="SELECT * FROM type_asset where code='$buyer_contact_type' ";  
             $result_ass= $conn->query($sql_ass);
             $rs_ass=$result_ass->fetch_assoc();

             if($rs_ass['name']!=''){ $buyer_contact_type=$rs_ass['name'];}
      ////////// End type_asset ////////////////

      /////////// dbo_register ////////////////
             $sql_re="SELECT * FROM dbo_register where register_id='$sale_id' ";  
             $result_re= $conn->query($sql_re);
             $rs_re=$result_re->fetch_assoc();

             if($rs_re['register_id']!=''){ $sale_name=$rs_re['register_name'];  }
      ////////// End dbo_register ////////////////
 

 
        		 $no++;   

     ?> 
                  <tr style="font-size: 14px;" >
             
                    <td > <?php echo $buyer_contact_code;?>
 
                      <center>
                          <p style="text-align: center;"><?php echo $buyer_contact_date_create;?></p>
                          <a class="btn btn-info btn-sm" href="?page=create_buyer_contact&status=edit&id=<?php echo $buyer_contact_id;?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                        </center>
 
                    </td>
                    <td><?php echo $buyer_contact_line;?></td>
                    <td><?php echo $buyer_contact_note;?></td>
                    <td><?php echo $buyer_contact_budget;?></td>
                    <td><?php echo ".".$buyer_contact_tel;?></td>
                    <td><?php echo $buyer_contact_tel_2;?></td>
                    <td><?php echo $buyer_contact_tel_3;?></td>
                    <td><?php echo $buyer_contact_tel_4;?></td> 
                    <td><?php echo ".".$buyer_contact_wechat;?></td>
                    <td><?php echo ".".$buyer_contact_whatsapp;?></td>
 <!--                   <td  >

                      <?php if($sale_name!=''){ ?>
                      
                          <ul class="list-inline">
                              <li class="list-inline-item">
                                  <img alt="Avatar" class="table-avatar" src="template/dist/img/avatar.png" style="width: 50px;">
                              </li> 
                          </ul>

                        <?php } ?>

                    </td>
                      <td class="project_progress">
                          <div class="progress progress-sm">
                              <div class="progress-bar bg-green" role="progressbar" aria-valuenow="<?php echo $buyer_contact_status;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $buyer_contact_status;?>%">
                              </div>
                          </div>
                          <small>
                              <?php echo $buyer_contact_status."% Complete";?>
                          </small>
                      </td>
                      <td class="project-state">
                          <center><span class="<?php echo $status_icon;?>"><?php echo $status_name;?></span></center>
                      </td>  -->

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