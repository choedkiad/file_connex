


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">


          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $title;?></h3>
              </div>
              <!-- /.card-header --> 
              <!-- form start -->
              <form action="include/process.php" method="post" enctype="multipart/form-data" name="form1">
         
                <input type="text" class="form-control" name="page"  value="<?php echo $_GET['page'];?>" hidden="hidden">
          
                <div class="card-body"> 
                  <div class="form-group">
                    
                  </div> 
                </div>
                <!-- /.card-body --> 
                <div class="card-footer">
                  <center> 
                    <input type="submit" value="ซิงค์ไฟล์ภาพโฟลเดอร์ขึ้นระบบ" class="btn btn-primary" name="submit"></center>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>
      </div>
    </section>





 <script>
$(function () {
  bsCustomFileInput.init();
});
</script>