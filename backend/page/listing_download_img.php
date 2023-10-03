<?php


 
  session_start();  

  require '../config.php';
/*
 ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

 $id=$_GET["listing"];
 $no=$_GET["no"];*/

if($no==''){
				     $sql_img="SELECT * FROM dbo_data_excel_listing_img where ex_list_listing_code='$id' order by listing_img_no  ASC"; 
				     $result_img=$conn->query($sql_img);
				     $rs_img_check=$result_img->fetch_assoc();
                    
			             $listing_img_folder=$rs_img_check['listing_img_folder'];

			             if($listing_img_folder==''){ $listing_img_folder="../../images/listing/$id/"; }

               

 

                                                                  // ZIP ไฟล์ 
                                  $ZipName = $listing_img_folder.$id.".zip";
                                  require_once("../include/dZip.inc.php"); // include Class
                                  $zip = new dZip($ZipName); // New Class


				     $sql_img2="SELECT * FROM dbo_data_excel_listing_img where ex_list_listing_code='$id' order by listing_img_no  ASC"; 
				     $result_img2=$conn->query($sql_img2);
 
			          while($rs_img2=$result_img2->fetch_assoc()) {    $i++;

			             $listing_img_name=$rs_img2['listing_img_name'];
	                     $listing_img_folder=$rs_img2['listing_img_folder'];  

	                      if($listing_img_folder==''){ $listing_img_folder="../../images/listing/$id/"; }   

	                              $image_name=$listing_img_folder.$listing_img_name;
	                              
                                  $zip->addFile($image_name,$listing_img_name); // Source,Destination  

                       }



                           $zip->save();
 
   

$_GET["pic2"]=$_GET["listing"].".zip";
$_GET["pic"]=$listing_img_folder."/".$_GET["pic2"];

header("Content-Disposition: attachment; filename=". $_GET["pic2"].""); 

readfile($_GET["pic"]);

 
}else{


             $sql_img="SELECT * FROM dbo_data_excel_listing_img where ex_list_listing_code='$id' order by listing_img_no  ASC"; 
             $result_img=$conn->query($sql_img);
             $rs_img_check=$result_img->fetch_assoc();
                    
                   $listing_img_folder=$rs_img_check['listing_img_folder'];

                   if($listing_img_folder==''){ $listing_img_folder="../../images/listing/$id/no_watermark/"; }

               

 

                                                                  // ZIP ไฟล์ 
                                  $ZipName = $listing_img_folder.$id.".zip";
                                  require_once("../include/dZip.inc.php"); // include Class
                                  $zip = new dZip($ZipName); // New Class


             $sql_img2="SELECT * FROM dbo_data_excel_listing_img where ex_list_listing_code='$id' order by listing_img_no  ASC"; 
             $result_img2=$conn->query($sql_img2);
 
                while($rs_img2=$result_img2->fetch_assoc()) {    $i++;

                   $listing_img_name=$rs_img2['listing_img_name'];
                       $listing_img_folder=$rs_img2['listing_img_folder'];  

                        if($listing_img_folder==''){ $listing_img_folder="../../images/listing/$id/no_watermark/"; }   

                                $image_name=$listing_img_folder.$listing_img_name;
                                
                                  $zip->addFile($image_name,$listing_img_name); // Source,Destination  

                       }



                           $zip->save();
 
   

$_GET["pic2"]=$_GET["listing"].".zip";
$_GET["pic"]=$listing_img_folder."/".$_GET["pic2"];

header("Content-Disposition: attachment; filename=". $_GET["pic2"].""); 

readfile($_GET["pic"]);



}
?>