


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
                    <label for="exampleInputFile">FILE</label>
                    <div class="input-group">
                  
                        <input type="file" name="fileCSV" id="fileCSV" accept=".csv" required="" > 
                    
                    </div>
                  </div>
     
                </div>
                <!-- /.card-body --> 
                <div class="card-footer">
                  <center> 
                    <input type="submit" value="คลิกอัพโหลดไฟล์ขึ้นระบบ" class="btn btn-primary" name="submit"></center>
                </div>
              </form>
            </div> 
            <!-- /.card -->
        </div>
        <div class="col-md-6">
            <div class="card card-primary" style="padding: 10px;">
               <h3>วิธีการอัพโหลดไฟล์</h3> <br>
               1.กำหนด CX เรียงตามภาพ<br>
               <img src="img/up_proppit/01.JPG" width="100%"><br>
               2.วิธีการเซฟ ใช้ชื่อไฟล์อะไรก็ได้ แต่ให้เซฟนามสกุลไฟล์ .csv<br>
               <img src="img/up_proppit/02.JPG" width="100%"><br>
               3.จะได้ไฟล์นามสกุล .csv ดั่งภาพประกอบ
               <img src="img/up_proppit/03.JPG" width="100%"><br>

            </div>
         </div>

      </div>
    </section>





 <script>
$(function () {
  bsCustomFileInput.init();
});
</script>