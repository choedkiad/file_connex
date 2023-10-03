<?php  

  session_start();  

  require 'config.php'; 
 

      $id=$_GET['rev'];


   
     $sql_img_1="SELECT * FROM dbo_data_excel_listing_img where ex_list_listing_code='$id' order by listing_img_no  ASC"; 
     $result_img_1=$conn->query($sql_img_1);
     $rs_img_chck=$result_img_1->fetch_assoc();

             $img_folder=$rs_img_chck['listing_img_folder'];
             $img_name=$rs_img_chck['listing_img_name'];
  ?>
     <input type="text" class="form-control" name="img_folder" hidden="hidden" value="<?php echo $img_folder;?>"  >



            <div class="row"> 

  <?php

     $sql_img="SELECT * FROM dbo_data_excel_listing_img where ex_list_listing_code='$id' order by listing_img_no  ASC"; 
     $result_img=$conn->query($sql_img);
 

          while($rs_img=$result_img->fetch_assoc()) {   

             $listing_img_folder=$rs_img['listing_img_folder'];
             $listing_img_name=$rs_img['listing_img_name'];
             $ex_list_listing_code=$rs_img['ex_list_listing_code']; 

             $listing_img_name_1=$listing_img_name; 


                 if($listing_img_folder!=''){   
                       $listing_img_name=$listing_img_folder.$listing_img_name; 
                 }else{   
                       $listing_img_name="../../images/listing/".$ex_list_listing_code."/".$listing_img_name;  
                 }


     ?>  

               <div class="col-md-3" style="padding: 10px;"> 
                  <center>
                      <a href="include/process.php?page=create_listing&status=del_img&id=<?php echo $id;?>&img=<?php echo $listing_img_name_1;;?>"><img src="img/icon/png/trash-2x.png" ></a>
                      <img src="<?php echo $listing_img_name;?>" width="100%">
                  </center>
               </div>   
    <?php }  ?>   

 
    </div>
