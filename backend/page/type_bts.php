
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
                         <a href="?page=create_type_furniture" class="btn btn-block btn-primary btn-lg" >  </a>
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

		 $sql="SELECT * FROM type_train_station  order by station_id   ASC"; 
		 $result = $conn->query($sql);

		 if($result->num_rows > 0) {
    	  // output data of each row
    		 while($rs = $result->fetch_assoc()) {
             
             $station_name=$rs['station_name'];
             $station_name_en=$rs['station_name_en'];
             $tr_group=$rs['tr_group'];
             $id=$rs['station_id'];
  
         		 $no++;   

     ?> 
                  <tr style="font-size: 14px;" > 
                    <td>
                      <center> <?php echo $id;?> </center> 
                    </td>
                    <td><?php echo $tr_group."-".$rs['station_name'];?></td>
                    <td><?php echo $tr_group."-".$rs['station_name_en'];?></td> 
                    <td></td>
                    <td>
                        
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