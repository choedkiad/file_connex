<?php 

 
   

?>


        <!--start page-header -->
        <section id="page-header" class="parallax">
             <div class="overlay"></div>
            <div class="container">  </div>
        </section>
        <!--End page-header -->
        
     
   <section id="works" class="section">
                <!-- Filtering -->
                  <div class="title-box text-center">
                    <h2 class="title"><?php echo $name;?></h2>
                 </div>

       <div class="container">
           <div class="row">
                    <div class=" col-md-12 text-center" style="margin-bottom: 100px;">
                        <!-- Filtering -->
                        <ul class="filtering">
                            <li class="filter" data-filter="all"><a href="../property/all">All</a></li>


               <?php    

                $sql_as = "SELECT * FROM type_asset ";
                $result_as = $conn->query($sql_as); 
                while($rs_type = $result_as->fetch_assoc()){ 

                                 $name_type=$rs_type['name'];
                                 $name_url=$rs_type['name'];

                                 if($name_type=='โกดัง/โรงงาน'){$name_url='โกดังโรงงาน';}
                ?>

                            <a href="../property/<?php echo $name_url;?>"><li class="filter" data-filter="condo"><?php echo $name_type;?></li></a>

                    <?php } ?>
                           
                        </ul>
                    </div>
 
 
 
<?php    

   if($page_view=='type'){

         $sql = "SELECT ex_list_heading,ex_list_listing_code , ex_list_bedroom , ex_list_bathroom , ex_list_price FROM dbo_data_excel_listing WHERE ex_list_listing_type='".$code."'    ";
         $result = $conn->query($sql); 
          // output data of each row

    }else{

         $sql = "SELECT ex_list_heading,ex_list_listing_code , ex_list_bedroom , ex_list_bathroom , ex_list_price FROM dbo_data_excel_listing ";
         $result = $conn->query($sql); 
          // output data of each row

    }
         while($rs = $result->fetch_assoc()){      $no++;
              
              $ex_list_heading=$rs['ex_list_heading'];
              $ex_list_listing_code=$rs['ex_list_listing_code'];
              $ex_list_price=$rs['ex_list_price'];
              $ex_list_bedroom=$rs['ex_list_bedroom'];
              $ex_list_bathroom=$rs['ex_list_bathroom']; 

              $sql_img = "SELECT ex_list_listing_code,listing_img_folder,listing_img_name,listing_img_no FROM dbo_data_excel_listing_img where ex_list_listing_code='$ex_list_listing_code' order by listing_img_no ASC  ";
              $result_img = $conn->query($sql_img); 
              $rs_img = $result_img->fetch_assoc();

              $listing_img_folder=$rs_img['listing_img_folder'];
              $listing_img_name=$rs_img['listing_img_name'];
               
               if($no<= 15){
 ?>



                <div class="col-md-4" style="height: 550px;">
                   <div class="blog-post">
                         <div class="post-media">
                             <a href="../property/<?php echo $ex_list_listing_code;?>"><img src="<?php if($listing_img_name!=''){ echo $listing_img_folder.$listing_img_name; }else{ echo "../../images/noimages.jpg";}?>" alt="<?php echo $ex_list_heading;?>" ></a>
                         </div>
                       <div class="post-desc">
                           <h4><?php echo $ex_list_heading;?></h4>
                           <h5>ราคา <?php echo  number_format($ex_list_price);?> บาท</h5>
                           <p><?php echo $ex_list_bedroom;?> <img src="../images/icon/icon-room.png" height="15" alt="ห้องนอน" > | <?php echo $ex_list_bathroom;?> <img src="../images/icon/icon-bath.png" height="15" alt="ห้องน้ำ" ></p>
                            <a href="../property/<?php echo $ex_list_listing_code;?>" class="btn btn-gray-border">Read More</a>
                       </div>
                   </div>
               </div>
                         

    <?php       }
         } ?>
            <!--End Work Item -->                
        </div>              

     </div>
                  <br><br>
                   
            </section>
