<?php
ini_set('session.gc_maxlifetime', 100000);

session_start(); 

 include '../config.php'; 
 include '../setting.php'; 
 
         isset( $_GET['id'] ) ? $id = $_GET['id'] : $id = ""; 
         isset( $_GET['del'] ) ? $del = $_GET['del'] : $del = ""; 
         isset( $_POST['status'] ) ? $status = $_POST['status'] : $status = ""; 
         isset( $_SESSION['USER_ID'] ) ? $USER_ID = $_SESSION['USER_ID'] : $USER_ID = ""; 

        // mkdir("../../images/listing/$id/original"); 
         mkdir("../../images/listing/$id/webp");

         mkdir("../../images/listing/$id/webp/mini_w100");
         mkdir("../../images/listing/$id/webp/mini_w500");


         $today=date("Y-m-d H:i:s");      
/*
         $id=$_GET['id'];
         $del=$_GET['del'];
         $status=$_POST['status'];
         $USER_ID=$_SESSION['USER_ID']; */
/*
        ini_set('display_errors', '1');
        ini_set('display_startup_errors', '1');
        error_reporting(E_ALL);
*/

         if($del=='all'){
 
                   $part_1=$id;   $part_2=$id." New";     $zip_s=$id.".zip";

                  $sql_list_img="SELECT * FROM dbo_data_excel_listing_img where ex_list_listing_code='$id' order by listing_img_no ASC";
                  $result_list_img = $conn->query($sql_list_img);  
                  $count_del=$result_list_img->num_rows;

                  while($rs_list_img=$result_list_img->fetch_assoc()){

                     $listing_img_folder=$rs_list_img['listing_img_folder'];
                     $listing_img_name=$rs_list_img['listing_img_name'];
                    
                       unlink ("../../images/listing/$part_1/$listing_img_name");
                       unlink ("../../images/listing/$part_2/$listing_img_name");

                       unlink ("../../images/listing/$part_1/no_watermark/$listing_img_name");
                       unlink ("../../images/listing/$part_2/no_watermark/$listing_img_name");
                       
                       unlink ("../../images/listing/$part_1/$zip_s");
                       unlink ("../../images/listing/$part_2/$zip_s");

                       unlink ("../../images/listing/$part_1/mini_w300/$listing_img_name");
                       unlink ("../../images/listing/$part_2/mini_w300/$listing_img_name");

                       unlink ("../../images/listing/$part_1/mini_w100/$listing_img_name");
                       unlink ("../../images/listing/$part_2/mini_w100/$listing_img_name");


                      // unlink ("../../images/listing/$part_1/original/$listing_img_name");
                      // unlink ("../../images/listing/$part_2/original/$listing_img_name");

                      $name_webp=str_replace(".jpg",".webp",$listing_img_name); 
                      $name_webp=str_replace(".JPG",".webp",$name_webp);   
                      $name_webp=str_replace(".JPEG",".webp",$name_webp); 
                      $name_webp=str_replace(".jpeg",".webp",$name_webp);
                      $name_webp=str_replace(".png",".webp",$name_webp);   
                      $name_webp=str_replace(".PNG",".webp",$name_webp);  

                       unlink ("../../images/listing/$part_1/webp/$name_webp");
                       unlink ("../../images/listing/$part_2/webp/$name_webp"); 

                       unlink ("../../images/listing/$part_1/webp/mini_w100/$name_webp");
                       unlink ("../../images/listing/$part_2/webp/mini_w100/$name_webp");     

                       unlink ("../../images/listing/$part_1/webp/mini_w500/$name_webp");
                       unlink ("../../images/listing/$part_2/webp/mini_w500/$name_webp");

                  }

                  $sql_img = "DELETE FROM dbo_data_excel_listing_img WHERE ex_list_listing_code='".$id."'  ";
                  $conn->query($sql_img);
               
                  $record_note='ลบภาพ'; 
                  $sql_record="INSERT INTO dbo_record (ex_list_id,record_note , record_date , record_user_id , record_remark)
                  VALUES ('$id' , '$record_note'  , '$today' , '$USER_ID' , '$count_del')";
                  mysqli_query($conn, $sql_record);  
  
                  $sql_log_listing="INSERT INTO dbo_log_listing  ( ex_list_listing_code, create_date , log_number , USER_ID , img_number , log_remark  )
                  VALUES ('$id' , '$today' , '1' , '$USER_ID' ,'$count_del' , 'delimg'  )"; 
                  mysqli_query($conn, $sql_log_listing);  

                          $sql_number= "UPDATE dbo_data_excel_listing SET 
                                          listing_img_folder='',
                                          listing_img_name='',
                                          listing_img_webp='',
                                          ex_list_img_number='0'
                                          WHERE ex_list_listing_code='".$id."'";
                          $conn->query($sql_number); 
 
 
                   echo '<script type="text/javascript">alert("Record deleted successfully");</script>';
                   echo("<script> top.location.href='upload_images_create_listing.php?id=$id'</script>"); 
            
         }



         if($status=='1'){

             isset( $_POST['code'] ) ? $code = $_POST['code'] : $code = ""; 
             isset( $_POST['id'] ) ? $id_s = $_POST['id'] : $id_s = ""; 
             isset( $_POST['img_folder'] ) ? $img_folder = $_POST['img_folder'] : $img_folder = ""; 
                        
             $code=$_POST['code'];
             $id_s=$_POST['id'];
             $img_folder=$_POST['img_folder'];
     
             $ex_list_deal_type=$_POST['ex_list_deal_type'];
             $ex_list_price=$_POST['ex_list_price'];

             $record_note="เพิ่มภาพประกอบ รหัสทรัพย์ : ".$id;
   


                      $sql_img="SELECT * FROM dbo_data_excel_listing_img where ex_list_listing_code='$id_s' order by listing_img_no DESC  ";
                      $result_img= $conn->query($sql_img); 
                        // output data of each row
                      $rs_img=$result_img->fetch_assoc();

                      $listing_img_no=$rs_img['listing_img_no'];


                     // isset( $_FILES['filUpload'] ) ? $file = $_FILES['filUpload'] : $file = "";

                        $ns=0;

                       if(!empty($_FILES['filUpload']['tmp_name'])){ 

                          for( $i=0; $i<count( $_FILES['filUpload']['tmp_name']); $i++ ) {  $ns++;  

                              $num_img=$listing_img_no+$ns;

                              $image=$_FILES['filUpload']['tmp_name'][$i];
                              $image_name=$_FILES['filUpload']['name'][$i];
                              $image_size=$_FILES['filUpload']['size'][$i];
                              $image_type=$_FILES['filUpload']['type'][$i]; 

  
                               /*   $ZipName = "../../images/listing/$id/".$id.".zip";
                                  require_once("dZip.inc.php"); // include Class
                                  $zip = new dZip($ZipName);  */ // New Class
  
                              $image_ext=strtolower(end(explode('.',$image_name))); 

                              $image_name=$num_img.".".$image_ext;

                              $is = sprintf("%'02d",$ns); 


                              if($_POST['img_folder']!=''){ 
                                       $img_folder=$img_folder;   
                                       $img_folders=$img_folder;
                              } else{ 
                                       $img_folder='../../images/listing/'.$id_s.'/'; $img_folders="";
                                     mkdir('../../images/listing/'.$id_s);

                             }
                              
                            
                  
                              mkdir($img_folder."no_watermark");
                              mkdir($img_folder."webp");
                              mkdir($img_folder."webp/mini_w100");
                              mkdir($img_folder."webp/mini_w500");


                                       $listing_img_remark='';

                                     /*
                                            $size=GetimageSize($image);
                                            $height=round($width*$size[1]/$size[0]);
                                            $images_orig = ImageCreateFromJPEG($image);
                                            $photoX = ImagesX($images_orig);
                                            $photoY = ImagesY($images_orig);
                                            $myCopyright = imagecreatefrompng('watermark.png');                    
                                            $srcWidth = imagesx($myCopyright);
                                            $srcHeight = imagesy($myCopyright);
                                            $destX = ($photoX - $srcWidth) / 2;
                                            $destY = ($photoY - $srcHeight) / 1;    

                                            $images_fin = ImageCreateTrueColor($width, $height);          
                                            ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
                                            imagecopymerge($images_fin, $myCopyright, $destX, $destY, 0, 0, $srcWidth, $srcHeight, 50);
                                            
                                            imagejpeg($images_fin,"../../images/listing/$id/$image_name");
                                            ImageDestroy($images_orig);
                                            ImageDestroy($images_fin);      */

                                            $width=1200; //*** Fix Width & Heigh (Autu caculate) ***//

                                            $size=GetimageSize($image);
                                            $height=round($width*$size[1]/$size[0]);
                                            $images_orig = ImageCreateFromJPEG($image);
                                            $photoX = ImagesX($images_orig);
                                            $photoY = ImagesY($images_orig);
                                            $images_fin = ImageCreateTrueColor($width, $height);
                                            ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
                                            ImageJPEG($images_fin, $img_folder."no_watermark/$image_name");
                                            ImageDestroy($images_orig);
                                            ImageDestroy($images_fin);
               
               
                                            // ใส่ลายน้ำ //
                                            $myImage = imagecreatefromjpeg($img_folder."no_watermark/$image_name");
                                            $myCopyright = imagecreatefromgif('watermark.gif'); 
                                            $destWidth = imagesx($myImage);
                                            $destHeight = imagesy($myImage);
                                            $srcWidth = imagesx($myCopyright);
                                            $srcHeight = imagesy($myCopyright);

                                            $destX = ($destWidth - $srcWidth) / 1;
                                            $destY = ($destHeight - $srcHeight) / 40;
                                            //$white = imagecolorexact($myCopyright, 255, 255, 255);
                                            //imagecolortransparent($myCopyright, $white);

                                            imagecopymerge($myImage, $myCopyright, $destX, $destY, 0, 0, $srcWidth, $srcHeight, 100); 
                                            imagejpeg($myImage,$img_folder."$image_name");
                                            imagedestroy($myImage);
                                            imagedestroy($myCopyright);   

               

                                               mkdir($img_folder."mini_w100");
                                               mkdir($img_folder."mini_w300");
                                               $img_folder_mini_w100=$img_folder."mini_w100/";
                                               $img_folder_mini_w300=$img_folder."mini_w300/";

                                                

                                            $width=100; //*** Fix Width & Heigh (Autu caculate) ***//
                                            $size=GetimageSize($img_folder."no_watermark/$image_name");
                                            $height=round($width*$size[1]/$size[0]);
                                            $images_orig = ImageCreateFromJPEG($img_folder."no_watermark/$image_name");
                                            $photoX = ImagesX($images_orig);
                                            $photoY = ImagesY($images_orig);
                                            $images_fin = ImageCreateTrueColor($width, $height);
                                            ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
                                            ImageJPEG($images_fin,$img_folder_mini_w100."$image_name");
                                            ImageDestroy($images_orig);
                                            ImageDestroy($images_fin);


                                            $width=500; //*** Fix Width & Heigh (Autu caculate) ***//
                                            $size=GetimageSize($img_folder."no_watermark/$image_name");
                                            $height=round($width*$size[1]/$size[0]);
                                            $images_orig = ImageCreateFromJPEG($img_folder."no_watermark/$image_name");
                                            $photoX = ImagesX($images_orig);
                                            $photoY = ImagesY($images_orig);
                                            $images_fin = ImageCreateTrueColor($width, $height);
                                            ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
                                            ImageJPEG($images_fin,$img_folder_mini_w300."$image_name");
                                            ImageDestroy($images_orig);
                                            ImageDestroy($images_fin);
                                            

                                            $name_webp=str_replace(".jpg",".webp",$image_name); 
                                            $name_webp=str_replace(".JPG",".webp",$name_webp);   
                                            $name_webp=str_replace(".JPEG",".webp",$name_webp); 
                                            $name_webp=str_replace(".jpeg",".webp",$name_webp);
                                            $name_webp=str_replace(".png",".webp",$name_webp);   
                                            $name_webp=str_replace(".PNG",".webp",$name_webp);   

                                            $folder_webp=$img_folder."webp/".$name_webp;  
                                            $file=$img_folder.$image_name;
                                            $image=  imagecreatefromjpeg($file);
                                            ob_start();
                                            imagejpeg($image,NULL,100);
                                            $cont=  ob_get_contents();
                                            ob_end_clean();
                                            imagedestroy($image);
                                            $content =  imagecreatefromstring($cont);
                                            imagewebp($content,$folder_webp);
                                            imagedestroy($content);

                                            $folder_webp=$img_folder."webp/mini_w500/".$name_webp;
                                            $file=$img_folder."mini_w300/".$image_name;
                                            $image=  imagecreatefromjpeg($file);
                                            ob_start();
                                            imagejpeg($image,NULL,100);
                                            $cont=  ob_get_contents();
                                            ob_end_clean();
                                            imagedestroy($image);
                                            $content =  imagecreatefromstring($cont);
                                            imagewebp($content,$folder_webp);
                                            imagedestroy($content);

                                            $folder_webp=$img_folder."webp/mini_w100/".$name_webp; 
                                            $file=$img_folder."mini_w300/".$image_name;
                                            $image=  imagecreatefromjpeg($file);
                                            ob_start();
                                            imagejpeg($image,NULL,100);
                                            $cont=  ob_get_contents();
                                            ob_end_clean();
                                            imagedestroy($image);
                                            $content =  imagecreatefromstring($cont);
                                            imagewebp($content,$folder_webp);
                                            imagedestroy($content);


                                            if($image!=''){

                                                
                                                  $sql_1="INSERT INTO dbo_data_excel_listing_img (ex_list_listing_code,listing_img_folder, listing_img_name, listing_img_webp , listing_img_no, listing_img_date , listing_img_remark )
                                                       VALUES ('$id_s','$img_folders' ,'$image_name' , '$name_webp' ,'$num_img' ,'$today' , '$listing_img_remark' )";
                                                        mysqli_query($conn, $sql_1);  

                                                 // copy($image,"../../images/listing/$id_s/original/$image_name");  
                                                
                                               // $zip->addFile($image,$image_name); // Source,Destination                       
                        
                                            }   

                 } //for

            
 
 
             if($image_ext=='jpg' or $image_ext=='jpeg'){
 
                          
                           $sql_record="INSERT INTO dbo_record (ex_list_id,record_note, ex_list_listing_status , record_date , record_user_id , record_remark)
                           VALUES ('$id_s' , '$record_note' ,'$ex_list_deal_type' , '$today' , '$USER_ID' , '$i')";
                            mysqli_query($conn, $sql_record);   

                          $sql_log_listing="INSERT INTO dbo_log_listing  ( ex_list_listing_code, create_date , log_number , USER_ID , img_number , log_remark  )
                          VALUES ('$id_s' , '$today' , '1' , '$USER_ID' ,'$i' , 'createimg'  )"; 
                          mysqli_query($conn, $sql_log_listing);  
  

                          $sql_img="SELECT ex_list_listing_code , listing_img_folder , listing_img_name , listing_img_webp ,listing_img_no 
                                    FROM dbo_data_excel_listing_img 
                                    WHERE ex_list_listing_code='$id_s' order by listing_img_no ASC LIMIT 1  ";
                          $result_img=$conn->query($sql_img); 
                          $rs_img=$result_img->fetch_assoc();

                          $listing_img_folder=$rs_img['listing_img_folder'];
                          $listing_img_name=$rs_img['listing_img_name'];
                          $listing_img_webp=$rs_img['listing_img_webp'];

                          $sql_number= "UPDATE dbo_data_excel_listing SET 
                                          listing_img_folder='".$listing_img_folder."',
                                          listing_img_name='".$listing_img_name."',
                                          listing_img_webp='".$listing_img_webp."',
                                          ex_list_img_number='1'
                                          WHERE ex_list_listing_code='".$id_s."'";
                          $conn->query($sql_number);   

                           echo '<script type="text/javascript">alert("Upload Images successfully");</script>'; 

                           echo "<script>window.close();</script>";
                           echo("<script> top.location.href=''</script>");  


                       /*
                       <script>
                           close();   // Closes the new window
                        </script>*/ 
                      
              }


                }else{
                  echo "ffffeeeeeeeeeww";
                }

         }else{

           $sql_list="SELECT * FROM dbo_data_excel_listing where ex_list_listing_code='$id' ";
           $result_list= $conn->query($sql_list); 
          // output data of each row
           $rs_listing=$result_list->fetch_assoc();


           $ex_list_contract_type=$rs_listing['ex_list_contract_type'];
           $ex_list_contract_code=$rs_listing['ex_list_contract_code'];
           $ex_list_listing_status=$rs_listing['ex_list_listing_status'];
           $ex_list_rent_till=$rs_listing['ex_list_rent_till'];
           $ex_list_price=$rs_listing['ex_list_price'];
           $ex_list_deal_type=$rs_listing['ex_list_deal_type'];


        }
?>


   <!-- daterange picker -->
  <link rel="stylesheet" href="../template/plugins/daterangepicker/daterangepicker.css">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../template/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../template/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../template/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../template/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../template/plugins/summernote/summernote-bs4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">

  <link rel="stylesheet" href="../template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="../template/plugins/ekko-lightbox/ekko-lightbox.css">


    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="../fileupload/style.css">


<script type="text/javascript">
  

function fncSubmit()
{ 
        var e = document.getElementById('submit');
        e.style.display = "none";   
}
 

</script>
 
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">ภาพประกอบ </h3>

           
          </div>

           <form method="post" id="form" enctype="multipart/form-data" action=""  onSubmit="JavaScript:return fncSubmit();" > 



                <input type="text" class="form-control" name="status"  value="1" hidden="hidden" >
                <input type="text" class="form-control" name="id"  value="<?php echo $rs_listing['ex_list_listing_code'];?>" hidden="hidden" >
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12"> 
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">รหัสทรัพย์ : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="code" name="code" placeholder="" value="<?php echo $rs_listing['ex_list_listing_code'];?>" disabled="disabled" >
                    </div>
                  </div> 
              </div>

 
              <!-- /.card-body -->
            
            </div>
            <!-- /.card -->
          </div>
       

            <div class="col-md-12">


          <div class="card"  >
              <div class="card-header">
                <h3 class="card-title">Images</h3>
              </div>
              <!-- ./card-header -->
              <div class="card-body">
              <center><a href="upload_images_create_listing.php?id=<?php echo $id;?>&del=all" onclick="return confirm('คุณแน่ใจที่จะลบอัลบั้มภาพ : <?php echo $id;?>');"  >ลบภาพทั้งอัลบั้ม</a></center>

 <div class="row">
            
    <?php  
     $sql_img_1="SELECT * FROM dbo_data_excel_listing_img where ex_list_listing_code='$id' order by listing_img_no  ASC"; 
     $result_img_1=$conn->query($sql_img_1);
     $rs_img_chck=$result_img_1->fetch_assoc();

             $img_folder=$rs_img_chck['listing_img_folder'];
             $img_name=$rs_img_chck['listing_img_name'];
  ?>
     <input type="text" class="form-control" name="img_folder" hidden="hidden" value="<?php echo $img_folder;?>"  >

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

               <div class="col-md-2 col-sm-3" style="padding: 10px;"> 
                  <center>

                      <a href="../include/process.php?page=upload_images_create_listing&status=del_img&id=<?php echo $id;?>&img=<?php echo $listing_img_name_1;;?>"><img src="../img/icon/png/trash-2x.png" ></a>
                      <img src="<?php echo $listing_img_name;?>?v=<?php echo $today;?>" width="100%">
                  </center>
               </div>   
    <?php }  ?>

   <!-- /.col -->
            </div>
            <!-- /.row -->



              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            </div>

            <div class="col-md-12"> 
                  <div class="form-group row">
                     

                   <div class="container">
                      <div class="row">
                          <div class="col-12">
                              <div class="upload-file">
                                  <div class="row">
                                      <div class="col-6">
                                          <h2>Upload Files</h2>
                                      </div>

                                  </div>
                                  <div class="upload-wrapper">
                                      <label>
                                          <input type="file" onchange="readURL(this);" name="filUpload[]" id="files" multiple accept="image/jpeg, image/jpg"    >
                                          <p>Drop your files here. <br>or <a>Browse</a></p>
                                      </label>
                                  </div>
                              </div>
                          </div>
                          <div class="col-12">
                              <div class="row"><!--
                                  <div class="col-12">
                                      <h2 class="mb-0">Uploaded Files</h2>
                                  </div>-->

                                  
                              </div>
                              <output id="image-gallery"></output>
                               <center>ไม่อนุญาตให้ Upload ภาพนามสกุลอื่น นอกจาก .jpg หากเป็นนามสกุลอื่นโปรดติดต่อเจ้าหน้าที่ไอที</center> 
                              <center><input type="submit" class="btn btn-primary" id="submit" value="Uploaded Files"></center> 
                          </div>
                      </div>
                  </div>









                  </div> 
              </div>


 



              
            </div>
          </div>

      </form>



         </div>
      </div>
    </section>


   <script type="text/javascript">

        $("#p_ex_list_rent_till").hide();.
        

$(document).ready(function(){
 

$("#ex_list_listing_status").change(function(){
      var ex_list_listing_type = $("#ex_list_listing_status").val();
 
      if(ex_list_listing_type == "3"){

        $("#p_ex_list_rent_till").show();
 
          document.getElementById("ex_list_rent_till").disabled = false;
        //$("#txt_box").val("");
        /*
        $("#box").show();
        $("#txt_box").val("").focus(); */
      }else{
        /* $("#box").hide();
        $("#txt_box").val(""); */
        $("#p_ex_list_rent_till").hide();
      }
    });

    </script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../fileupload/script.js?v=<?php echo $today;?>"></script>

  
<script src="../template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../template/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../template/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../template/plugins/moment/moment.min.js"></script>
<script src="../template/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="../template/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../template/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../template/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="../template/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="../template/plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="../template/dist/js/adminlte.min.js"></script>



<script>


function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {
      $('.image-upload-wrap').hide();

      $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();

      $('.image-title').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload();
  }
}

function removeUpload() {
  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content').hide();
  $('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
    $('.image-upload-wrap').addClass('image-dropping');
  });
  $('.image-upload-wrap').bind('dragleave', function () {
    $('.image-upload-wrap').removeClass('image-dropping');
});













  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>