<?php 

if( $_SESSION['STATUS_ID']!='4' and $_SESSION['STATUS_ID']!='5'){
           
           echo("<script> top.location.href='./'</script>"); 

}
?>


      <?php if($edit=='edit' and $id!=''){ 
                  
			     $sql_r="SELECT * FROM dbo_register where register_id ='$id'";
			     $result_r = $conn->query($sql_r); 
		        // output data of each row
		         $rs_register=$result_r->fetch_assoc();

		         $register_id=$rs_register['register_id'];
		         $register_name=$rs_register['register_name'];
             $register_lastname=$rs_register['register_lastname'];
             $register_nickname=$rs_register['register_nickname'];
		         $register_email=$rs_register['register_email'];
		         $register_status=$rs_register['register_status'];
		         $register_enable=$rs_register['register_enable'];   
             $register_line=$rs_register['register_line']; 
             $register_fb=$rs_register['register_fb']; 
             $register_tel=$rs_register['register_tel']; 
             $register_img=$rs_register['register_img'];    
             $register_status_head=$rs_register['register_status_head'];   
             $register_notify=$rs_register['register_notify'];   
             $register_position=$rs_register['register_position'];   
             $register_color=$rs_register['register_color'];   
             $register_lcok=$rs_register['register_lcok'];     
             $register_status_under=$rs_register['register_status_under'];   
             $register_status_owner_tel=$rs_register['register_status_owner_tel'];  
 

             $title='แก้ไขรายชื่อผู้ใช้งาน';

             $register_password="EDITTEST";
 
            }else{

  

            }

      ?> 


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $title;?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
 


			<form method="post" id="form" enctype="multipart/form-data" action="include/process.php" >

                <input type="text" class="form-control" name="page"  value="<?php echo $_GET['page'];?>" hidden="hidden">

            <?php if($edit!=''){ ?>

                <input type="text" class="form-control" name="edit"  value="edit" hidden="hidden">
                <input type="text" class="form-control" name="id"  value="<?php echo $id;?>" hidden="hidden">
                <input type="text" class="form-control" name="register_id"  value="<?php echo $register_id;?>" hidden="hidden">
                
            <?php } ?>

                    <div class="row">


                <div class="card-body">


        <div class="row">
            <div class="col-md-4" >
                  <div class="form-group row">
                    <label for="exampleInputEmail1" class="col-sm-4 col-form-label">ชื่อ : </label>
                    <div class="col-sm-8">
                         <input type="text" class="form-control" name="register_name" placeholder="โปรดกรอกชื่อ" value="<?php echo $register_name;?>">
                    </div>
                  </div>
            </div>
            <div class="col-md-4" >
                  <div class="form-group row">
                    <label for="exampleInputEmail1" class="col-sm-4 col-form-label">นามสกุล : </label>
                    <div class="col-sm-8">
                         <input type="text" class="form-control" name="register_lastname" placeholder="โปรดกรอกนามสกุล" value="<?php echo $register_lastname;?>">
                    </div>
                  </div>
            </div>
            <div class="col-md-4" >
                  <div class="form-group row">
                    <label for="exampleInputEmail1" class="col-sm-4 col-form-label">ชื่อเล่น : </label>
                    <div class="col-sm-8">
                         <input type="text" class="form-control" name="register_nickname" placeholder="โปรดกรอกชื่อเล่น" value="<?php echo $register_nickname;?>">
                    </div>
                  </div>
            </div>

            <div class="col-md-4" >
                  <div class="form-group row">
                    <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Email address : </label>
                    <div class="col-sm-8">
                         <input type="email" class="form-control" id="exampleInputEmail1" name="register_email" placeholder="Enter email" value="<?php echo $register_email;?>">
                    </div>
                  </div>
            </div>

            <div class="col-md-4" >
                  <div class="form-group row">
                    <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Password : </label>
                    <div class="col-sm-8">
                         <input type="password" class="form-control" id="exampleInputPassword1" name="register_password" placeholder="Password" value="<?php echo $register_password;?>">
                    </div>
                  </div>
            </div>

            <div class="col-md-4" >
                  <div class="form-group row">
                    <label for="exampleInputEmail1" class="col-sm-4 col-form-label">TEL : </label>
                    <div class="col-sm-8">
                         <input type="text" class="form-control" name="register_tel" placeholder="โปรดกรอกเบอร์โทรศัพท์" value="<?php echo $register_tel;?>">
                    </div>
                  </div>
            </div>
 
             <div class="col-md-4" >
                  <div class="form-group row">
                    <label for="exampleInputEmail1" class="col-sm-4 col-form-label">LINE ID /@LINE : </label>
                    <div class="col-sm-8">
                         <input type="text" class="form-control" name="register_line" placeholder="โปรดกรอกไลน์" value="<?php echo $register_line;?>">
                    </div>
                  </div>
            </div>
             <div class="col-md-4" >
                  <div class="form-group row">
                    <label for="exampleInputEmail1" class="col-sm-4 col-form-label">FB : </label>
                    <div class="col-sm-8">
                         <input type="text" class="form-control" name="register_fb" placeholder="โปรดกรอก URL FACEBOOK ติดต่อ" value="<?php echo $register_fb;?>">
                    </div>
                  </div>
            </div>       

             <div class="col-md-4" >
                  <div class="form-group row">
                    <label for="exampleInputEmail1" class="col-sm-4 col-form-label">สถานะสมาชิก : </label>
                    <div class="col-sm-8">
                           <select class="form-control select2bs4"  name="register_status" style="width: 100%;"> 
                            <option value="0" <?php if($register_status=='0'){?> selected <?php } ?>>ไม่เลือก</option> 
                            <option value="1" <?php if($register_status=='1'){?> selected <?php } ?>>ตัวแทนขาย</option> 
                            <option value="2" <?php if($register_status=='2'){?> selected <?php } ?>>ทีมสต๊อก</option> 
                            <option value="3" <?php if($register_status=='3'){?> selected <?php } ?>>เจ้าหน้าที่สินเชื่อ</option>  
                            <option value="4" <?php if($register_status=='4'){?> selected <?php } ?>>ผู้ดูแลระบบ</option> 
                            <option value="5" <?php if($register_status=='5'){?> selected <?php } ?>>ผู้บริหาร</option> 
                          </select>
                    </div>
                  </div>
            </div>  

             <div class="col-md-4" >
                  <div class="form-group row">
                    <label for="exampleInputEmail1" class="col-sm-4 col-form-label">ตำแหน่ง : </label>
                    <div class="col-sm-8">
                          <select class="form-control select2bs4"  name="register_status_head" style="width: 100%;"> 
                            <option value="0" <?php if($register_status_head=='0'){?> selected <?php } ?>>ไม่เลือก</option> 
                            <option value="1" <?php if($register_status_head=='1'){?> selected <?php } ?>>หัวหน้าเซลล์</option> 
                            <option value="2" <?php if($register_status_head=='2'){?> selected <?php } ?>>หัวหน้าสต๊อก</option>   
                          </select>
                    </div>
                  </div>
            </div>        

             <div class="col-md-4" >
                  <div class="form-group row">
                    <label for="exampleInputEmail1" class="col-sm-4 col-form-label">ประเภทตัวแทนขาย : </label>
                    <div class="col-sm-8">
                    <select class="form-control select2bs4"  name="register_position" style="width: 100%;"> 
                      <option value="0" <?php if($register_position=='0'){?> selected <?php } ?>>ไม่เลือก</option> 
                      <option value="1" <?php if($register_position=='1'){?> selected <?php } ?>>แนวสูง (คอนโด)</option> 
                      <option value="2" <?php if($register_position=='2'){?> selected <?php } ?>>แนวราบ</option>   
                    </select>
                    </div>
                  </div>
            </div>   
 
             <div class="col-md-4" >
                  <div class="form-group row">
                    <label for="exampleInputEmail1" class="col-sm-4 col-form-label">สังกัดหัวหน้า : </label>
                    <div class="col-sm-8">
                        <select class="form-control select2bs4"  name="register_status_under" style="width: 100%;"> 
                          <option value="0" <?php if($register_status_under=='0'){?> selected <?php } ?>>ไม่เลือก</option> 
        
        <?php      $sql="SELECT * FROM dbo_register where register_status_head='1' order by register_id ASC"; 
                   $result = $conn->query($sql);

                   if($result->num_rows > 0) {
                      // output data of each row
                       while($rs= $result->fetch_assoc()) {
                          
                          $name=$rs['register_name']." ".$rs['register_lastname'];
                          $regis_id=$rs['register_id']; 

                   ?>

                          <option value="<?php echo $regis_id;?>" <?php if($regis_id==$register_status_under){?> selected <?php } ?> ><?php echo $name;?></option>   

          <?php        }
                    }  ?>
                        </select>
                    </div>
                  </div>
            </div>  
 
             <div class="col-md-8" >
                  <div class="form-group row">
                    <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Code แจ้งเตือน LINE : </label>
                    <div class="col-sm-10">
                       <input type="text" class="form-control" name="register_notify" placeholder="โปรดกรอก Code Notify" value="<?php echo $register_notify;?>">
                    </div>
                  </div>
            </div>   

             <div class="col-md-4" >
                  <div class="form-group row">
                    <label for="exampleInputEmail1" class="col-sm-4 col-form-label">สีประจำตัวเซลล์ : </label>
                    <div class="col-sm-8">
                       <input type="text" class="form-control" name="register_color" placeholder="โปรดกรอก Code สีเท่านั้น ตัวอย่าง #ccccc" value="<?php echo $register_color;?>">
                    </div>
                  </div>
            </div>           

             <div class="col-md-4" >
                  <div class="form-group row">
                    <label for="exampleInputEmail1" class="col-sm-4 col-form-label">อนุญาติให้เห็นเบอร์ Owner : </label>
                    <div class="col-sm-8">
                         <select class="form-control select2bs4"  name="register_status_owner_tel" style="width: 100%;"> 
                            <option value="0" <?php if($register_status_owner_tel=='0'){?> selected <?php } ?>>เปิดสิทธิ์</option> 
                            <option value="1" <?php if($register_status_owner_tel=='1'){?> selected <?php } ?> >ปิดสิทธิ์</option>   
                          </select> 
                    </div>
                  </div>
            </div> 
                
             <div class="col-md-4" >
                  <div class="form-group row">
                    <label for="exampleInputEmail1" class="col-sm-4 col-form-label">ปิดสิทธิ์ผู้ใช้ : </label>
                    <div class="col-sm-8">
                         <select class="form-control select2bs4"  name="register_lcok" style="width: 100%;"> 
                            <option value="0" <?php if($register_lcok=='0'){?> selected <?php } ?>>เปิดสิทธิ์</option> 
                            <option value="1" <?php if($register_lcok=='1'){?> selected <?php } ?> >ปิดสิทธิ์</option>   
                          </select> 
                    </div>
                  </div>
            </div>     
                   

             <div class="col-md-4" >
                  <div class="form-group row">
                    <label for="exampleInputEmail1" class="col-sm-4 col-form-label">ภาพในระบบ : </label>
                    <div class="col-sm-8">
                          <div class="custom-file">  
                             <input type="file" class="custom-file-input" name="filUpload" id="filUpload" accept="image/png, image/gif, image/jpeg"   >   
                             <label class="custom-file-label" for="image">เลือกไฟล์</label>   

                          </div> 

                         <p>
                          <?php if($register_img!=''){ ?>
                                     <img src="../../images/team/<?php echo $register_img;?>" > 
                          <?php }else{  ?>
                                     <img src="../../images/team/noimages.jpg" > 
                          <?php } ?>

                           </p>


                    </div>
                  </div>
            </div>   
                   
             <div class="col-md-12" >
                  <center><button type="submit" class="btn btn-primary">Submit</button></center>
            </div>         
 
 


        </div>
             

            
                </div> 

              <!-- /.card -->
            </form>
