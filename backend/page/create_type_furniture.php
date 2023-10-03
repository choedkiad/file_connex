      <?php if($edit=='edit' and $id!=''){ 
                  
			     $sql="SELECT * FROM type_furniture where furniture_id='$id'";
			     $result=$conn->query($sql); 
		        // output data of each row
		         $rs=$result->fetch_assoc();

		         $furniture_name=$rs['furniture_name'];
             $furniture_name_en=$rs['furniture_name_en'];
             $furniture_create=$rs['furniture_create'];
             $id=$rs['furniture_id'];  

                 $title='แก้ไขเฟอร์นิเจอร์';
 
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

            <?php if($edit!=''){ ?>

                <input type="text" class="form-control" name="edit"  value="edit" hidden="hidden">
                <input type="text" class="form-control" name="id"  value="<?php echo $id;?>" hidden="hidden"> 
                
            <?php } ?>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">ชื่อจุดเด่น</label>
                    <input type="text" class="form-control" name="furniture_name" placeholder="โปรดกรอกเฟอร์นิเจอร์" value="<?php echo $furniture_name;?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">ชื่อจุดเด่น (EN)</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="furniture_name_en" placeholder="โปรดกรอกเฟอร์นิเจอร์" value="<?php echo $furniture_name_en;?>">
                  </div>
                  <!--
                  <div class="form-group">
                     <label for="inputEmail3" class="col-sm-3 col-form-label">ภาพในระบบ : </label>
                 
                  </div>     

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

                   </p> -->
 
	                <div class="card-footer">
	                  <button type="submit" class="btn btn-primary">Submit</button>
	                </div>
            
            
                </div>
              <!-- /.card -->
            </form>
