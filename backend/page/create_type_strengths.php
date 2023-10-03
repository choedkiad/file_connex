      <?php if($edit=='edit' and $id!=''){ 
                  
			     $sql_strengths="SELECT * FROM type_strengths where strengths_id='$id'";
			     $result_strengths = $conn->query($sql_strengths); 
		        // output data of each row
		         $rs_strengths=$result_strengths->fetch_assoc();

		         $strengths_id=$rs_strengths['strengths_id'];
		         $strengths_name=$rs_strengths['strengths_name'];
		         $strengths_name_en=$rs_strengths['strengths_name_en'];
		         $strengths_create=$rs_strengths['strengths_create'];
		         $strengths_icon=$rs_strengths['strengths_icon'];    

                 $title='แก้ไขจุดเด่น';
 
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
                <input type="text" class="form-control" name="register_id"  value="<?php echo $register_id;?>" hidden="hidden">
                
            <?php } ?>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">ชื่อจุดเด่น</label>
                    <input type="text" class="form-control" name="strengths_name" placeholder="โปรดกรอกจุดเด่น" value="<?php echo $strengths_name;?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">ชื่อจุดเด่น (EN)</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="strengths_name_en" placeholder="โปรดกรอกจุดเด่น" value="<?php echo $strengths_name_en;?>">
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
