

<?php 

      ///////// ROW LISTING ////////////
        $sql_list_code="SELECT ex_list_id FROM dbo_data_excel_listing order by ex_list_id DESC";
        $result_list_code = $conn->query($sql_list_code); 
        // output data of each row 
        $num_listing=mysqli_num_rows($result_list_code);

      ///////// ROW PROJECT ////////////
        $sql_project_s="SELECT project_id  FROM type_project order by project_id  DESC";
        $result_project_s = $conn->query($sql_project_s); 
        // output data of each row 
        $num_project=mysqli_num_rows($result_project_s);

      ///////// ROW PROJECT ////////////
        $sql_buyer_s="SELECT buyer_contact_id   FROM dbo_buyer_contact order by buyer_contact_id   DESC";
        $result_buyer_s = $conn->query($sql_buyer_s); 
        // output data of each row 
        $num_buyer=mysqli_num_rows($result_buyer_s);


      ///////// Deal ////////////
        $sql_deal="SELECT create_deal_id  FROM dbo_create_deal order by create_deal_id  DESC";
        $result_deal = $conn->query($sql_deal); 
        // output data of each row 
        $num_deal=mysqli_num_rows($result_deal);

        
?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

   <?php if($_SESSION['OWNER_TEL']!='1'){  ?>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="?page=upload_file_excel_check"  >
	            <div class="small-box bg-danger">
	              <div class="inner">
	                <h3  style="margin-left: 20px;"><?php echo $num_listing;?></h3>

	                <p style="margin-left: 20px;">Listing / ทรัพย์ในระบบ</p>
	              </div>
	              <div class="icon">
	                <i class="ion ion-pie-graph"></i>
	              </div>
	              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
	            </div>
            </a>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="?page=project"  >
	            <div class="small-box bg-success">
	              <div class="inner">
	                <h3 style="margin-left: 20px;"><?php echo $num_project;?></h3>

	                <p style="margin-left: 20px;">Project / โครงการต่างๆ</p>
	              </div>
	              <div class="icon">
	                <i class="ion ion-stats-bars"></i>
	              </div>
	              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
	            </div>
            </a>
          </div>
          <!-- ./col -->

<?php } ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="?page=deal_buyer"  >
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3  style="margin-left: 20px;"><?php echo $num_deal;?></h3>

                  <p style="margin-left: 20px;">Create Deal / สร้างดีล</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </a>
          </div>

 
          <!-- ./col -->


    <?php if( $_SESSION['STATUS_ID']=='3' or $_SESSION['STATUS_ID']=='4'){ 

      ///////// ROW PROJECT ////////////
        $sql_register_s="SELECT register_id FROM dbo_register order by register_id DESC";
        $result_register_s = $conn->query($sql_register_s); 
        // output data of each row 
        $num_register_s=mysqli_num_rows($result_register_s); 


      ?>

          <div class="col-lg-3 col-6">
            <!-- small box -->

            <a href="?page=upload_file_excel_check"  >
              <div class="small-box bg-info">
                <div class="inner">
                  <h3  style="margin-left: 20px;"><?php echo $num_buyer;?></h3>

                  <p style="margin-left: 20px;">จำนวนลูกค้า</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="?page=upload_file_excel_check" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i> </a>
              </div>
            </a>
          </div>
      
                    <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="?page=register"  >
	            <div class="small-box bg-warning">
	              <div class="inner">
	                <h3 style="margin-left: 20px;"><?php echo $num_register_s;?></h3>

	                <p style="margin-left: 20px;">User Registrations</p>
	              </div>
	              <div class="icon">
	                <i class="ion ion-person-add"></i>
	              </div>
	              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
	            </div>
	        </a>
          </div>
          <!-- ./col -->
      <?php } ?>

        </div>
      </div>
    </section>




 