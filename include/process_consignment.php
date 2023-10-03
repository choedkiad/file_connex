<?php



  session_start();  

  require '../include/config.php';
  
   
    $consignment=$_POST['consignment'];
    
    $code=$_POST['code'];

    $prefix_consig=$_POST['prefix_consig'];
    $name_consig=$_POST['name_consig'];
    $surname_consig=$_POST['surname_consig']; 
    $tel_consig=$_POST['tel_consig'];
    $line_consig=$_POST['line_consig'];
    $email_consig=$_POST['email_consig'];
    $type_consig=$_POST['type_consig'];
    $deal_consig=$_POST['deal_consig'];
    $sale_consig=$_POST['sale_consig'];
    $rent_consig=$_POST['rent_consig'];
    $project_consig=$_POST['project_consig'];
    $project_consig_2=$_POST['project_consig_2'];
    $alley_consig=$_POST['alley_consig'];
    $subdistricts=$_POST['subdistricts'];
    $districts=$_POST['districts'];
    $provinces=$_POST['provinces'];
    $sqm_consig=$_POST['sqm_consig'];
    $rai_consig=$_POST['rai_consig'];
    $ngan_consig=$_POST['ngan_consig'];
    $wa_consig=$_POST['wa_consig'];
    $house_number_consig=$_POST['house_number_consig'];
    $floor_consig=$_POST['floor_consig'];
    $total_floors_consig=$_POST['total_floors_consig'];
    $room_s=$_POST['room_s'];
    $room_s_2=$_POST['room_s_2'];
    $bathroom_consig=$_POST['bathroom_consig']; 
    $parking_consig=$_POST['parking_consig']; 
    $furniture_consig=$_POST['furniture_consig']; 
    $pet_consig=$_POST['pet_consig']; 
    $map_consig=$_POST['map_consig']; 
    $youtube_consig=$_POST['youtube_consig']; 
    $other_consig=$_POST['other_consig']; 


    if($type_consig!='1'){
           
            $room_s=$room_s_2;

    }

   

    $date=date("Y-m-d H:i:s");

    $contact_name=$contact_name.$contact_last;

    if($consignment=='1'){

           $sql="INSERT INTO dbo_consignment (consig_id , consig_code, consig_prefix, consig_name , consig_surname , consig_tel , consig_email , consig_line , consig_type , consig_deal , consig_sale , consig_rent , project_id , consig_project_name , consig_alley , consig_road , consig_subdistricts , consig_districts , consig_provinces , consig_sqm , consig_rai , consig_ngan , consig_wa , consig_house_number , consig_floor , consig_total_floors , consig_bed , consig_bath , consig_parking , consig_furniture , consig_pet , consig_map , consig_youtube , consig_other , consig_create_date  )
                  VALUES ('' ,'$code' ,'$prefix_consig' ,'$name_consig' , '$surname_consig' , '$tel_consig'  , '$email_consig'  , '$line_consig'  , '$type_consig'  , '$deal_consig' , '$sale_consig'  , '$rent_consig'  , '$project_consig'  , '$project_consig_2'  , '$alley_consig'  , '$road_consig'  , '$subdistricts'  , '$districts'  , '$provinces'  , '$sqm_consig'  , '$rai_consig'  , '$ngan_consig'  , '$wa_consig' , '$house_number_consig' , '$floor_consig' , '$total_floors_consig' , '$room_s' , '$bathroom_consig'   , '$parking_consig' , '$furniture_consig'   , '$pet_consig'  , '$map_consig'   , '$youtube_consig' , '$other_consig' , '$date'  )";
           mysqli_query($conn, $sql); 


                 

         /*
              $strSQL="SELECT * FROM dbo_consignment order by consig_id DESC"; 
              $result=$conn->query($strSQL); 
              $rs=$result->fetch_assoc();

              $consig_id=$rs['consig_id']; */

     
          $img_folder='../images/consignment/'.$code."/";
          //mkdir('../../../images/consignment/'.$code); 
          mkdir('../images/consignment/'.$code);
          echo $img_folder.$code;


         isset( $_FILES['images'] ) ? $file = $_FILES['images'] : $file = "";

         for( $i=0; $i<count( $file['name'] ); $i++ ) {  $ns++; 
                                
                $image=$file['tmp_name'][$i];
                $image_name=$file['name'][$i];
                $image_size=$file['size'][$i];
                $image_type=$file['type'][$i]; 

                $image_ext=strtolower(end(explode('.',$image_name))); 
                 
                copy($image,$img_folder.$image_name);  

                   $sql_1="INSERT INTO dbo_consignment_img (consig_img_id  , consig_img_file, consig_img_no, consig_code , consig_img_create)
                           VALUES ('' ,'$image_name' ,'$i' ,'$code' , '$contact_date' )";
                   mysqli_query($conn, $sql_1);  

         }


              echo '<script type="text/javascript">alert("ส่งข้อมูลเรียบร้อย");</script>';
              echo("<script> top.location.href='../'</script>"); 


    }



?>