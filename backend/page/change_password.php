   



      <?php 

 

         if($_SESSION['USER_ID'] !=''){ 
                  
			     $sql_r="SELECT * FROM dbo_register where register_id ='".$_SESSION['USER_ID']."' ";
			     $result_r = $conn->query($sql_r); 
		        // output data of each row
		         $rs_register=$result_r->fetch_assoc();

		         $register_id=$rs_register['register_id'];
		         $register_name=$rs_register['register_name'];
		         $register_email=$rs_register['register_email'];
		         $register_status=$rs_register['register_status'];
		         $register_enable=$rs_register['register_enable'];   
             $register_line=$rs_register['register_line']; 
             $register_fb=$rs_register['register_fb']; 
             $register_img=$rs_register['register_img'];   

                 $title='แก้ไขรายชื่อผู้ใช้งาน';
 
            }else{

  

            }

      ?> 


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $title;?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

			<form method="post" id="form" enctype="multipart/form-data" action="include/process.php" >

                <input type="text" class="form-control" name="page"  value="<?php echo $_GET['page'];?>" hidden="hidden">

           

                <input type="text" class="form-control" name="edit"  value="edit" hidden="hidden">
                
                <input type="text" class="form-control" name="register_id"  value="<?php echo $_SESSION['USER_ID'];?>" hidden="hidden">
                
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">ชื่อ-นามสกุล</label>
                    <input type="text" class="form-control" name="register_name" placeholder="โปรดกรอกชื่อ-นามสกุล" value="<?php echo $register_name;?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="register_email" disabled="disabled" placeholder="Enter email" value="<?php echo $register_email;?>" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="register_password" placeholder="Password" value="EDITTEST">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">TEL</label>
                    <input type="text" class="form-control" name="register_tel" placeholder="โปรดกรอกเบอร์โทรศัพท์" value="<?php echo $register_tel;?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">LINE ID /@LINE</label>
                    <input type="text" class="form-control" name="register_line" placeholder="โปรดกรอกไลน์" value="<?php echo $register_line;?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">FB</label>
                    <input type="text" class="form-control" name="register_fb" placeholder="โปรดกรอก URL FACEBOOK ติดต่อ" value="<?php echo $register_fb;?>">
                  </div>
                  
                  <div class="form-group">
                     <label for="inputEmail3" class="col-sm-3 col-form-label">ภาพในระบบ : </label>
                 
                  </div>     

              <div class="custom-file">  

                 <input type="text" class="custom-file-input" name="register_img" id="register_img"  value="<?php echo $register_img;?>" hidden="hidden"   >
                 <input type="file" class="custom-file-input" name="filUpload" id="filUpload"  value=""  >   
                <label class="custom-file-label" for="image">เลือกไฟล์</label>  


              </div> 
                      
                 <p>
                  <?php if($register_img!=''){ ?>
                             <img src="../../images/team/<?php echo $register_img;?>" > 
                  <?php }else{  ?>
                             <img src="../../images/team/noimages.jpg" > 
                  <?php } ?>

                   </p>

	                <div class="card-footer">
	                  <button type="submit" class="btn btn-primary">Submit</button>
	                </div>
            
                </div>
              <!-- /.card -->
            </form>
