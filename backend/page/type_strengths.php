
<?php 

if( $_SESSION['STATUS_ID']=='1' or $_SESSION['STATUS_ID']=='2'){
           
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
                         <a href="?page=create_type_strengths" class="btn btn-block btn-primary btn-lg" > เพิ่มจุดเด่น</a>
                    </div>
                </div> 

              <!-- /.card-header -->
              <div class="card-body" style="margin: 5px;">
                <table id="example1" class="table table-bordered table-striped"  >
                  <thead>
                  <tr   >
          
                    <th >ลำดับ</th>
                    <th>ชื่อภาษาไทย</th>
                    <th>ชื่อภาษาอังกฤษ</th>
                    <th> </th>
                    <th> </th>  
                  </tr>
                  </thead>
                  <tbody>
	 <?php
												// Check connection
 
		 if ($conn->connect_error) {
    		 die("Connection failed: " . $conn->connect_error);
	     }

		 $no=0;

		 $sql="SELECT * FROM type_strengths order by strengths_id ASC"; 
		 $result = $conn->query($sql);

		 if($result->num_rows > 0) {
    	  // output data of each row
    		 while($rs = $result->fetch_assoc()) {
             
             $strengths_name=$rs['strengths_name'];
             $strengths_name_en=$rs['strengths_name_en'];
             $strengths_create=$rs['strengths_create'];
             $id=$rs['strengths_id'];
  
         		 $no++;   

     ?> 
                  <tr style="font-size: 14px;" > 
                    <td>
                      <center> <?php echo $no;?> </center> 
                    </td>
                    <td><?php echo $rs['strengths_name'];?></td>
                    <td><?php echo $rs['strengths_name_en'];?></td> 
                    <td><?php echo $strengths_create;?></td>
                    <td>
                        <img src="img/icon/png/account-login-2x.png"  > &nbsp;
                        <a href="?page=create_type_strengths&edit=edit&id=<?php echo $id;?>"><img src="img/icon/png/pencil-2x.png"  ></a>&nbsp;
                        <a href="include/process.php?page=create_type_strengths&status=del&id=<?php echo $id;?>"><img src="img/icon/png/trash-2x.png" ></a>
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