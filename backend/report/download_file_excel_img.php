<style>
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>


<div class="loader"></div>


<?php
 
  session_start();  

  require '../config.php';


   $date_start=$_GET['date_start'];
   $date_end=$_GET['date_end'];

   $date_start_check=$date_start." 00:00:00";
   $date_end_check=$date_end." 23:59:59";
 

  ?>

 
<?php
 
         mkdir($date_start); 
         $ZipName1 = $date_start."-".$date_end.".zip";
         require_once("../include/dZip.inc.php"); // include Class
         $zip = new dZip($ZipName1); // New Class


		 if ($conn->connect_error) {
    		 die("Connection failed: " . $conn->connect_error);
	     }

		 $no=0;

		 $sql="SELECT * FROM dbo_data_excel_listing where  ex_list_public_date >='$date_start_check' and ex_list_public_date<='$date_end_check' and ex_list_public='1' order by ex_list_public_date  DESC";  
		 $result = $conn->query($sql);


         $num_rows=$result->num_rows ;
 

	//	 if($result->num_rows > 0) {
    	  // output data of each row
    		 while($rs_listing=$result->fetch_assoc()) { $no++;

                    $id=$rs_listing['ex_list_listing_code'];
                    $ex_list_no_images=$rs_listing['ex_list_no_images'];
                    $project_id=$rs_listing['project_id'];


                                   
                                  $folder_start=$date_start."-".$date_end."/".$id."/";

                                  $zip->addDir($id); // Add Folder

                                                                    // ZIP ไฟล์ 
                                  //  $ZipName = $date_start."/".$no.".zip";
                                  //  require_once("../include/dZip.inc.php"); // include Class
                                  //  $zip = new dZip($ZipName); // New Class


            if($ex_list_no_images!='1'){ // เช็คว่าโพสต์ภาพได้


/*
               $sql_img="SELECT * FROM dbo_data_excel_listing_img where ex_list_listing_code='$id' order by listing_img_no  ASC"; 
               $result_img=$conn->query($sql_img);
               $rs_img_check=$result_img->fetch_assoc();
                      
                     $listing_img_folder=$rs_img_check['listing_img_folder'];

                     if($listing_img_folder==''){ $listing_img_folder="../../images/listing/$id/"; }*/



               $i=0;
  				     $sql_img2="SELECT * FROM dbo_data_excel_listing_img where ex_list_listing_code='$id' order by listing_img_no  ASC"; 
  				     $result_img2=$conn->query($sql_img2);
   
			               while($rs_img2=$result_img2->fetch_assoc()) {    $i++;

    			                 $listing_img_name=$rs_img2['listing_img_name'];  
    	                     $listing_img_folder=$rs_img2['listing_img_folder'];  

    	                      if($listing_img_folder==''){ $listing_img_folder="../../images/listing/$id/"; }   

    	                               $image_name=$listing_img_folder.$listing_img_name;


                                      $zip->addFile($image_name, $id."/".$i.".jpg"); 
                             
    	                               

                                      //$zip->addFile($image_name,$listing_img_name); // Source,Destination  

                                     /* $zip->addEmptyDir(); */
                        
                      }
                         
            }else{ // เช็คว่าโพสต์ภาพไม่ได้ให้เอาภาพโครงการไปโพสต์

                     $i=0;
                     $sql_img="SELECT * FROM type_project_img where project_id='$project_id' order by project_img_no ASC"; 
                     $result_img=$conn->query($sql_img); 
                     while($rs_img=$result_img->fetch_assoc()){  $i++;

                         $project_img_folder=$rs_img['project_img_folder'];
                         $project_img_name=$rs_img['project_img_name'];
                         $project_img_id=$rs_img['project_img_id']; 


                            if($project_img_folder==''){ $project_img_folder="../../images/project/$project_id/"; }   

                                     $image_name=$project_img_folder.$project_img_name; 

                                      $zip->addFile($image_name, $id."/".$i.".jpg");  

                     }



                } 
            }
     //  }

 

              
                    /*
              	      $file_no=$x;
              	      $file_folder=$date_start."/".$file_no;
                      $zip1->addFile($file_folder,$file_no); // Source,Destination  

                      $zip->addDir("MySub"); // Add Folder

                      $zip->addFile("", "MySub/thaicreate3.txt");   */

               




              $zip->save();

 

$_GET["pic2"]=$date_start."-".$date_end.".zip";
$_GET["pic"]=$_GET["pic2"];
/*
header("Content-Disposition: attachment; filename=". $_GET["pic2"].""); 
readfile($_GET["pic"]);
 
 */
echo("<script> top.location.href='../?page=download_file_excel&p=1&date_start=$date_start&date_end=$date_end'</script>"); 
?>
 
 
 