
 

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Zone</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div> 

        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 20%">
                          Title
                      </th>
                      <th style="width: 30%">
                          ลำดับ
                      </th>
                      <th>
                          สถานะ
                      </th>
                      <th style="width: 8%" class="text-center">
                          Status
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>

	 <?php
												// Check connection
 
		 if ($conn->connect_error) {
    		 die("Connection failed: " . $conn->connect_error);
	     }

		 $no=0;

		 $sql="SELECT * FROM type_zone_group order by zone_g_number ASC";  
		 $result = $conn->query($sql);

		 if($result->num_rows > 0) {
    	  // output data of each row
    		 while($rs_zone_g=$result->fetch_assoc()) {
                   
                   $zone_g_id=$rs_zone_g['zone_g_id'];
                   $zone_g_name=$rs_zone_g['zone_g_name'];
                   $zone_g_number=$rs_zone_g['zone_g_number'];
                   $zone_g_highlight=$rs_zone_g['zone_g_highlight'];

     ?>

                  <tr>
                      <td>
                          #
                      </td>
                      <td>
                         <?php echo $zone_g_name;?>
                          
                      </td>
                      <td>
                      	 <?php echo $zone_g_number;?>
                      </td>
                      <td class="project_progress">
                           
                      </td>
                      <td class="project-state">
                            <?php if($zone_g_highlight=='1'){ ?><span class="badge badge-success">แสดงหน้าแรก</span><?php } ?>
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                          <a class="btn btn-info btn-sm" href="?page=create_web_zone&status=edit&id=<?php echo $zone_g_id;?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                  </tr>
          
            <?php } 
              } ?>

              </tbody>
          </table>
        </div>
        <!-- /.card-body -->



      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  