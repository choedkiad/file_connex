

	 <?php
												// Check connection
 
		 if ($conn->connect_error) {
    		 die("Connection failed: " . $conn->connect_error);
	     }

		 $no=0;
		 $sql_list_code="SELECT ex_list_listing_code FROM dbo_data_excel_listing order by ex_list_id DESC , ex_list_listing_code DESC";
		 $result_list_code = $conn->query($sql_list_code); 
    	  // output data of each row
         $rs_code=$result_list_code->fetch_assoc();

         $ex_list_listing_code=$rs_code['ex_list_listing_code'];

         $a = str_replace("CX-","",$ex_list_listing_code,$count);
         $a = $a+1;
 

         $code = sprintf("CX-%'05d",$a);
 
      ?>

 

 






    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title"> </h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">หัวข้อประกาศ : </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" name="contact_list_heading" placeholder="" value="" >
                    </div>
                  </div> 
              </div>
              <div class="col-md-3"> 
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">รหัสทรัพย์ : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_listing_code" placeholder="" value="<?php echo $code;?>" disabled="disabled" >
                    </div>
                  </div> 
              </div>
              <div class="col-md-5">

                   <div class="form-group row">
                     <label for="inputEmail3" class="col-sm-3 col-form-label">ประเภททรัพย์ : </label>
                     <div class="col-sm-9">
	                  <select class="form-control select2bs4"  name="ex_list_listing_type" style="width: 100%;">

	                    <option value="0">ไม่เลือก</option> 
    <?php  
		 $sql_type_asset="SELECT * FROM type_asset order by id  ASC"; 
		 $result_type_asset=$conn->query($sql_type_asset);

		 if($result_type_asset->num_rows > 0) { 
    		 while($rs_type = $result_type_asset->fetch_assoc()) {   
    ?> 
	                    <option value="<?php echo $rs_type['code'];?>"><?php echo $rs_type['name'];?></option> 
	<?php    }
	      }     ?>
	                   
	                  </select>
	                 </div>
                  </div> 
              </div>
   
              <div class="col-md-4">

                   <div class="form-group row">
                     <label for="inputEmail3" class="col-sm-3 col-form-label">ประเภทดีล : </label>
                     <div class="col-sm-7">
	                  <select class="form-control select2bs4"  name="ex_list_deal_type" style="width: 100%;">

	                    <option value="0">ไม่เลือก</option>  
	                    <option value="1">ขาย</option> 
                        <option value="2">เช่า</option> 
	                   
	                  </select>
	                 </div>
                  </div> 
              </div>


              <div class="col-md-4">

                   <div class="form-group row">
                     <label for="inputEmail3" class="col-sm-4 col-form-label">ประเภทสัญญา : </label>
                     <div class="col-sm-6">
	                  <select class="form-control select2bs4"  name="ex_list_contract_type" style="width: 100%;"> 
	                    <option value="0">ไม่เลือก</option>  
	                    <option value="1">Exclusive</option> 
                        <option value="2">Open</option> 
	                    <option value="3">No Contract</option> 
	                  </select>
	                 </div>
                  </div> 
              </div>
              <div class="col-md-8">

                   <div class="form-group row">
                     <label for="inputEmail3" class="col-sm-2 col-form-label">โครงการ : </label>
                     <div class="col-sm-10">
	                  <select class="form-control select2bs4"  name="ex_list_contract_type" style="width: 100%;"> 
	                    <option value="0">ไม่เลือก</option>  
	                    <option value="1">ตัวอย่าง1</option> 
                        <option value="2">ตัวอย่าง2</option> 
	                    <option value="3">ตัวอย่าง3</option> 
	                  </select>
	                 </div>
                  </div> 
              </div>
              <!-- /.col -->
              <div class="col-md-4"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">บ้านเลขที่ : </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_house_number" placeholder="" value="" >
                    </div>
                  </div> 
              </div>
              <div class="col-md-4"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">ซอย : </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_alley" placeholder="" value="" >
                    </div>
                  </div> 
              </div>
              <div class="col-md-4"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">ถนน : </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_road" placeholder="" value="" >
                    </div>
                  </div> 
              </div> 
              <div class="col-md-4"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">จังหวัด : </label>
                    <div class="col-sm-9"> 
	                  <select class="form-control select2bs4"  name="ex_list_province" style="width: 100%;"> 
	                    <option value="0">ไม่เลือก</option>  
	                    <option value="1">ตัวอย่าง1</option> 
                        <option value="2">ตัวอย่าง2</option> 
	                    <option value="3">ตัวอย่าง3</option> 
	                  </select>

                    </div>
                  </div> 
              </div> 
              <div class="col-md-4"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">อำเภอ : </label>
                    <div class="col-sm-9"> 
	                  <select class="form-control select2bs4"  name="ex_list_province" style="width: 100%;"> 
	                    <option value="0">ไม่เลือก</option>  
	                    <option value="1">ตัวอย่าง1</option> 
                        <option value="2">ตัวอย่าง2</option> 
	                    <option value="3">ตัวอย่าง3</option> 
	                  </select>

                    </div>
                  </div> 
              </div> 
              <div class="col-md-4"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">ตำบล : </label>
                    <div class="col-sm-9"> 
	                  <select class="form-control select2bs4"  name="ex_list_province" style="width: 100%;"> 
	                    <option value="0">ไม่เลือก</option>  
	                    <option value="1">ตัวอย่าง1</option> 
                        <option value="2">ตัวอย่าง2</option> 
	                    <option value="3">ตัวอย่าง3</option> 
	                  </select>

                    </div>
                  </div> 
              </div>
              <div class="col-md-6"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">สถานีรถไฟฟ้า : </label>
                    <div class="col-sm-9"> 
	                  <select class="form-control select2bs4"  name="ex_list_train_station" style="width: 100%;"> 
	                    <option value="0">ไม่เลือก</option>  
	                    <option value="1">ตัวอย่าง1</option> 
                        <option value="2">ตัวอย่าง2</option> 
	                    <option value="3">ตัวอย่าง3</option> 
	                  </select>

                    </div>
                  </div> 
              </div>
              <div class="col-md-3"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-5 col-form-label">จำนวนอาคาร: </label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_number_buildings" placeholder="" value="" >
                    </div>
                  </div> 
              </div>
              <div class="col-md-3"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">จำนวนชั้น : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_floor" placeholder="" value="" >
                    </div>
                  </div> 
              </div>
              <div class="col-md-4"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-5 col-form-label">อาคาร : </label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_floor" placeholder="" value="" >
                    </div>
                  </div> 
              </div>
              <div class="col-md-4"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-5 col-form-label">ทร้พย์ตั้งอยู่ชั้นที่ : </label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_floor" placeholder="" value="" >
                    </div>
                  </div> 
              </div>
              <div class="col-md-4"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">ขนาดพื้นที่ : </label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_floor" placeholder="ไร่" value="" >
                    </div>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_floor" placeholder="งาน" value="" >
                    </div>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_floor" placeholder="ตร.ว." value="" >
                    </div>
                  </div>  
              </div>
              <div class="col-md-3"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-5 col-form-label">พื้นที่ใช้สอย : </label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_sqm" placeholder="" value="" >
                    </div> 
                  </div>  
              </div>
              <div class="col-md-3"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">ที่จอดรถ : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_parking" placeholder="" value="" >
                    </div> 
                  </div>  
              </div>
              <div class="col-md-3"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">ห้องนอน : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_bedroom" placeholder="" value="" >
                    </div> 
                  </div>  
              </div>
              <div class="col-md-3"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">ห้องน้ำ : </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_bathroom" placeholder="" value="" >
                    </div> 
                  </div>  
              </div>
              
              <div class="col-md-6"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">ห้องอื่นๆ (ถ้ามี) : </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_other_room" placeholder="" value="" >
                    </div> 
                  </div>  
              </div>

              <div class="col-md-6"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">วิว : </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_view" placeholder="" value="" >
                    </div> 
                  </div>  
              </div>
              <div class="col-md-6"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">เฟอร์นิเจอร์ : </label>
                    <div class="col-sm-9"> 
                      <textarea class="form-control" rows="3" placeholder="Enter ..." name="ex_list_furniture"></textarea>
                    </div> 
                  </div>  
              </div>
              <div class="col-md-6"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">สิ่งอำนวยความสะดวก : </label>
                    <div class="col-sm-8"> 
                      <textarea class="form-control" rows="3" placeholder="Enter ..." name="ex_list_strengths"></textarea>
                    </div>
                  </div> 
              </div>
              <div class="col-md-6"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">อนุญาติให้เลี้ยงสัตว์ : </label>
                    <div class="col-sm-8"> 
	                  <select class="form-control select2bs4"  name="ex_list_pets" style="width: 100%;"> 
	                    <option value="">ไม่อนุญาต</option>  
	                    <option value="1">อนุญาต</option>  
	                  </select> 
                    </div>
                  </div> 
              </div>
              <div class="col-md-6"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">ทิศ : </label>
                    <div class="col-sm-9"> 
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_direction" placeholder="" value="" >
                    </div>
                  </div> 
              </div>
              <div class="col-md-6"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">สถานที่ใกล้เคียง : </label>
                    <div class="col-sm-9"> 
                      <textarea class="form-control" rows="5" placeholder="Enter ..." name="ex_list_nearby_places"></textarea>
                    </div>
                  </div> 
              </div>
              <div class="col-md-6"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">รายละเอียดเพิ่มเติม : </label>
                    <div class="col-sm-8"> 
                      <textarea class="form-control" rows="5" placeholder="Enter ..." name="ex_list_details"></textarea>
                    </div>
                  </div> 
              </div>
              <div class="col-md-3"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">ราคา : </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_price" placeholder="" value="" >
                    </div> 
                  </div>  
              </div>
              <div class="col-md-4"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">ค่าส่วนกลาง : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_common_fee" placeholder="" value="" >
                    </div> 
                  </div>  
              </div>
              <div class="col-md-5"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Google MAP : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_googlmap" placeholder="" value="" >
                    </div> 
                  </div>  
              </div>
              <div class="col-md-12"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">หมายเหตุ : </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_googlmap" placeholder="" value="" >
                    </div> 
                  </div>  
              </div>
 
              <!-- /.col -->
            </div>
            <!-- /.row -->

      
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer"></div>
        </div>
        <!-- /.card -->

        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">ข้อมูลลูกค้า (เจ้าของทรัพย์/ผู้ขาย)</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
         
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-4"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">ชื่อ-สกุล : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_contact_name" placeholder="" value="" >
                    </div> 
                  </div>  
              </div>
              <div class="col-md-4"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">เบอร์โทร : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_contact_tel" placeholder="" value="" >
                    </div> 
                  </div>  
              </div>
              <div class="col-md-4"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">LINE : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_contact_lineid" placeholder="" value="" >
                    </div> 
                  </div>  
              </div>       
              <div class="col-md-4"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">E-MAIL : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_contact_email" placeholder="" value="" >
                    </div> 
                  </div>  
              </div>       
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
            the plugin.
          </div>
        </div>
        <!-- /.card -->

        <div class="card card-default">
         
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-12">
               
            
                   <center><input type="submit" class="btn btn-primary" value="บันทึก และเพิ่มภาพ"></center>
                 
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
         
        </div>
        <!-- /.card -->

        <div class="row">
          <div class="col-md-6">

            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Input masks</h3>
              </div>
              <div class="card-body">
                <!-- Date dd/mm/yyyy -->
                <div class="form-group">
                  <label>Date masks:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- Date mm/dd/yyyy -->
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- phone mask -->
                <div class="form-group">
                  <label>US phone mask:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- phone mask -->
                <div class="form-group">
                  <label>Intl US phone mask:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="text" class="form-control"
                           data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- IP mask -->
                <div class="form-group">
                  <label>IP mask:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-laptop"></i></span>
                    </div>
                    <input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Color & Time Picker</h3>
              </div>
              <div class="card-body">
                <!-- Color Picker -->
                <div class="form-group">
                  <label>Color picker:</label>
                  <input type="text" class="form-control my-colorpicker1">
                </div>
                <!-- /.form group -->

                <!-- Color Picker -->
                <div class="form-group">
                  <label>Color picker with addon:</label>

                  <div class="input-group my-colorpicker2">
                    <input type="text" class="form-control">

                    <div class="input-group-append">
                      <span class="input-group-text"><i class="fas fa-square"></i></span>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- time Picker -->
                <div class="bootstrap-timepicker">
                  <div class="form-group">
                    <label>Time picker:</label>

                    <div class="input-group date" id="timepicker" data-target-input="nearest">
                      <input type="text" class="form-control datetimepicker-input" data-target="#timepicker"/>
                      <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="far fa-clock"></i></div>
                      </div>
                      </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col (left) -->
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Date picker</h3>
              </div>
              <div class="card-body">
                <!-- Date -->
                <div class="form-group">
                  <label>Date:</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <!-- Date and time -->
                <div class="form-group">
                  <label>Date and time:</label>
                    <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime"/>
                        <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <!-- /.form group -->
                <!-- Date range -->
                <div class="form-group">
                  <label>Date range:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control float-right" id="reservation">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- Date and time range -->
                <div class="form-group">
                  <label>Date and time range:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-clock"></i></span>
                    </div>
                    <input type="text" class="form-control float-right" id="reservationtime">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- Date and time range -->
                <div class="form-group">
                  <label>Date range button:</label>

                  <div class="input-group">
                    <button type="button" class="btn btn-default float-right" id="daterange-btn">
                      <i class="far fa-calendar-alt"></i> Date range picker
                      <i class="fas fa-caret-down"></i>
                    </button>
                  </div>
                </div>
                <!-- /.form group -->
              </div>
                <div class="card-footer">
                  Visit <a href="https://getdatepicker.com/5-4/">tempusdominus </a> for more examples and information about
                  the plugin.
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- iCheck -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">iCheck Bootstrap - Checkbox &amp; Radio Inputs</h3>
              </div>
              <div class="card-body">
                <!-- Minimal style -->
                <div class="row">
                  <div class="col-sm-6">
                    <!-- checkbox -->
                    <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxPrimary1" checked>
                        <label for="checkboxPrimary1">
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxPrimary2">
                        <label for="checkboxPrimary2">
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxPrimary3" disabled>
                        <label for="checkboxPrimary3">
                          Primary checkbox
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <!-- radio -->
                    <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary1" name="r1" checked>
                        <label for="radioPrimary1">
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary2" name="r1">
                        <label for="radioPrimary2">
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary3" name="r1" disabled>
                        <label for="radioPrimary3">
                          Primary radio
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Minimal red style -->
                <div class="row">
                  <div class="col-sm-6">
                    <!-- checkbox -->
                    <div class="form-group clearfix">
                      <div class="icheck-danger d-inline">
                        <input type="checkbox" checked id="checkboxDanger1">
                        <label for="checkboxDanger1">
                        </label>
                      </div>
                      <div class="icheck-danger d-inline">
                        <input type="checkbox" id="checkboxDanger2">
                        <label for="checkboxDanger2">
                        </label>
                      </div>
                      <div class="icheck-danger d-inline">
                        <input type="checkbox" disabled id="checkboxDanger3">
                        <label for="checkboxDanger3">
                          Danger checkbox
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <!-- radio -->
                    <div class="form-group clearfix">
                      <div class="icheck-danger d-inline">
                        <input type="radio" name="r2" checked id="radioDanger1">
                        <label for="radioDanger1">
                        </label>
                      </div>
                      <div class="icheck-danger d-inline">
                        <input type="radio" name="r2" id="radioDanger2">
                        <label for="radioDanger2">
                        </label>
                      </div>
                      <div class="icheck-danger d-inline">
                        <input type="radio" name="r2" disabled id="radioDanger3">
                        <label for="radioDanger3">
                          Danger radio
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Minimal red style -->
                <div class="row">
                  <div class="col-sm-6">
                    <!-- checkbox -->
                    <div class="form-group clearfix">
                      <div class="icheck-success d-inline">
                        <input type="checkbox" checked id="checkboxSuccess1">
                        <label for="checkboxSuccess1">
                        </label>
                      </div>
                      <div class="icheck-success d-inline">
                        <input type="checkbox" id="checkboxSuccess2">
                        <label for="checkboxSuccess2">
                        </label>
                      </div>
                      <div class="icheck-success d-inline">
                        <input type="checkbox" disabled id="checkboxSuccess3">
                        <label for="checkboxSuccess3">
                          Success checkbox
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <!-- radio -->
                    <div class="form-group clearfix">
                      <div class="icheck-success d-inline">
                        <input type="radio" name="r3" checked id="radioSuccess1">
                        <label for="radioSuccess1">
                        </label>
                      </div>
                      <div class="icheck-success d-inline">
                        <input type="radio" name="r3" id="radioSuccess2">
                        <label for="radioSuccess2">
                        </label>
                      </div>
                      <div class="icheck-success d-inline">
                        <input type="radio" name="r3" disabled id="radioSuccess3">
                        <label for="radioSuccess3">
                          Success radio
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                Many more skins available. <a href="https://bantikyan.github.io/icheck-bootstrap/">Documentation</a>
              </div>
            </div>
            <!-- /.card -->

            <!-- Bootstrap Switch -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Bootstrap Switch</h3>
              </div>
              <div class="card-body">
                <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch>
                <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col (right) -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">bs-stepper</h3>
              </div>
              <div class="card-body p-0">
                <div class="bs-stepper">
                  <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step" data-target="#logins-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                        <span class="bs-stepper-circle">1</span>
                        <span class="bs-stepper-label">Logins</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#information-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                        <span class="bs-stepper-circle">2</span>
                        <span class="bs-stepper-label">Various information</span>
                      </button>
                    </div>
                  </div>
                  <div class="bs-stepper-content">
                    <!-- your steps content here -->
                    <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                      </div>
                      <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                    </div>
                    <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                      <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                          </div>
                        </div>
                      </div>
                      <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                Visit <a href="https://github.com/Johann-S/bs-stepper/#how-to-use-it">bs-stepper documentation</a> for more examples and information about the plugin.
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Dropzone.js <small><em>jQuery File Upload</em> like look</small></h3>
              </div>
              <div class="card-body">
                <div id="actions" class="row">
                  <div class="col-lg-6">
                    <div class="btn-group w-100">
                      <span class="btn btn-success col fileinput-button">
                        <i class="fas fa-plus"></i>
                        <span>Add files</span>
                      </span>
                      <button type="submit" class="btn btn-primary col start">
                        <i class="fas fa-upload"></i>
                        <span>Start upload</span>
                      </button>
                      <button type="reset" class="btn btn-warning col cancel">
                        <i class="fas fa-times-circle"></i>
                        <span>Cancel upload</span>
                      </button>
                    </div>
                  </div>
                  <div class="col-lg-6 d-flex align-items-center">
                    <div class="fileupload-process w-100">
                      <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                        <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="table table-striped files" id="previews">
                  <div id="template" class="row mt-2">
                    <div class="col-auto">
                        <span class="preview"><img src="data:," alt="" data-dz-thumbnail /></span>
                    </div>
                    <div class="col d-flex align-items-center">
                        <p class="mb-0">
                          <span class="lead" data-dz-name></span>
                          (<span data-dz-size></span>)
                        </p>
                        <strong class="error text-danger" data-dz-errormessage></strong>
                    </div>
                    <div class="col-4 d-flex align-items-center">
                        <div class="progress progress-striped active w-100" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                          <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                        </div>
                    </div>
                    <div class="col-auto d-flex align-items-center">
                      <div class="btn-group">
                        <button class="btn btn-primary start">
                          <i class="fas fa-upload"></i>
                          <span>Start</span>
                        </button>
                        <button data-dz-remove class="btn btn-warning cancel">
                          <i class="fas fa-times-circle"></i>
                          <span>Cancel</span>
                        </button>
                        <button data-dz-remove class="btn btn-danger delete">
                          <i class="fas fa-trash"></i>
                          <span>Delete</span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                Visit <a href="https://www.dropzonejs.com">dropzone.js documentation</a> for more examples and information about the plugin.
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->