
 

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
 
        <div class="row">
                    <div class="col-md-5"></div>
                    <div class="col-md-5"></div>         
                 <div class="col-md-2" style="padding: 10px;">
                         <a href="?page=create_web_content&status=create" class="btn btn-block btn-primary btn-lg" onclick="showAndHide()" id="link_check" > สร้างบทความ</a>
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

		 $sql_data="SELECT * FROM dbo_data_content order by data_content_date DESC";  
		 $result_data= $conn->query($sql_data);

		 if($result_data->num_rows > 0) {
    	  // output data of each row
    		 while($rs_content=$result_data->fetch_assoc()) {
                   
                   $data_content_id =$rs_content['data_content_id'];
                   $data_content_title=$rs_content['data_content_title'];
                   $data_content_meta_title=$rs_content['data_content_meta_title']; 

     ?>

                  <tr>
                      <td>
                          #
                      </td>
                      <td>
                         <?php echo $data_content_title;?>
                          
                      </td>
                      <td>
                      	  
                      </td>
                      <td class="project_progress">
                           
                      </td>
                      <td class="project-state">
                            <?php if($data_content_highlight=='1'){ ?><span class="badge badge-success">แสดงหน้าแรก</span><?php } ?>
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                          <a class="btn btn-info btn-sm" href="?page=create_web_content&status=edit&id=<?php echo $data_content_id;?>">
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
