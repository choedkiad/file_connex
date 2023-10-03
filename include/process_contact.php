<?php


  session_start();  

  require '../include/config.php';
  
  
 


    $contact_page=$_POST['contact_page'];

    $contact_url=$_POST['contact_url'];
    $contact_heading=$_POST['contact_heading'];
    $contact_name=$_POST['contact_name'];
    $contact_last=$_POST['contact_last']; 
    $contact_email=$_POST['contact_email'];
    $contact_tel=$_POST['contact_tel'];
    $contact_detail=$_POST['contact_detail'];
    $listing_code=$_POST['listing_code'];
    $contact_date=date("Y-m-d H:i:s");

    $contact_name=$contact_name.$contact_last;

if(isset($_POST['g-recaptcha-response'])){


      if($contact_page=='detail'){


       
      /*       if($security!=''){*/

           

      /* -------------- */ 

       
       
          define('LINE_API',"https://notify-api.line.me/api/notify");
          define('LINE_TOKEN','0Up7W9vu9hXR04vRP6iklgWyjS5iD9E3Zyu4eb2uQjK'); 

          function notify_message($message){

              $queryData = array('message' => $message);
              $queryData = http_build_query($queryData,'','&');
              $headerOptions = array(
                  'http'=>array(
                      'method'=>'POST',
                      'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                                ."Authorization: Bearer ".LINE_TOKEN."\r\n"
                                ."Content-Length: ".strlen($queryData)."\r\n",
                      'content' => $queryData
                  )
              );
              $context = stream_context_create($headerOptions);
              $result = file_get_contents(LINE_API,FALSE,$context);
              $res = json_decode($result);
              return $res;
           }

         /* --------------  */
              $text_line = "
              LISTING : : ".$listing_code."
              สนใจทรัพย์ : ".$contact_heading."
              วันที่ : ".$contact_date."
              ชื่อ-นามสกุล : ".$contact_name." 
              อีเมล์ : ".$contact_email." 
              เบอร์ : ".$contact_tel." 
              รายละเอียด: ".$contact_detail."
              URL : " .$contact_url;
              $alert_line = notify_message($text_line);  

       

         /* -------------- */



                $sql="INSERT INTO dbo_buyer_contact (buyer_contact_id, buyer_contact_type, buyer_contact_attention, buyer_contact_name ,buyer_contact_tel ,buyer_contact_email ,buyer_contact_detail, buyer_contact_date_create , ex_list_listing_code )
                     VALUES ('', '1', '1' , '$contact_name','$contact_tel','$contact_email','$contact_detail','$contact_date' ,'$listing_code')"; 

                 mysqli_query($conn, $sql);  


           echo '<script type="text/javascript">alert("ส่งข้อมูลให้เจ้าหน้าที่เรียบร้อยแล้ว");</script>';
           echo("<script> top.location.href='$contact_url'</script>"); 
      /*

      require 'phpmailermaster/PHPMailerAutoload.php';


      $mail = new PHPMailer;

      //$mail->SMTPDebug = 3;                               // Enable verbose debug output


      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = 'cpanel07wh.bkk1.cloud.z.com';  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication // if not need put false
      $mail->Username = 'marketing@ampelite.co.th';                 // SMTP username
      $mail->Password = 'Ampel@1234';                           // SMTP password

      $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted // if nedd
      $mail->Port = 465;                                    // TCP port to connect to // if nedd


      $mail->From = 'marketing@ampelite.co.th'; // mail form user mail auth smtp
      $mail->FromName = $job_title;
      $mail->addAddress("choedkiad@ampelite.co.th", "SYSTEM AMPELITE"); // to Address
      $mail->addAddress("marketing@ampelite.co.th", "SYSTEM AMPELITE"); // to Address
      $mail->addAddress("treethep@ampelite.co.th", "SYSTEM AMPELITE"); // to Address
      $mail->addAddress("mkt02@ampelite.co.th", "SYSTEM AMPELITE"); // to Address

      //$mail->addAddress('ellen@example.com'); // if nedd
      //$mail->addReplyTo('info@example.com', 'Information'); // if nedd
      //$mail->addCC('cc@example.com'); // if nedd
      //$mail->addBCC('bcc@example.com'); // if nedd

      $mail->WordWrap = 100000;                                 // Set word wrap to 50 characters
      //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments // if nedd
      //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name // if nedd
      $mail->isHTML(true);                                  // Set email format to HTML // if format mail html // if no put false

      $mail->Subject = "ผู้ติดต่อ : ".$contact_name." | ผ่านหน้าติดต่อ เว็บไซต์: https://www.ampelite.co.th ";  // text subject
      $mail->Body = "<b>------หน้าฟอร์มติดต่อผ่านเว็บไซต์-------</b> <br> <br>
                      <b>ส่งมาจากหน้า</b> $contact_title  <br>
                      <b>ชื่อ-นามสกุล :</b>  $contact_name  <br> 
                      <b>อีเมล์ :</b>  $contact_email  <br> 
                      <b>เบอร์โทรศัพท์ :</b>  $contact_tel <br>
                      <b>รายละเอียด :</b>  <br> 
                      $contact_message <br> 
                      </b>---------------------------------------------------------- </b><br> 
                      </b>เว็บไซต์ https://www.ampelite.co.th</b> <br> 
                      "; // body
                      
      //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; // if nedd

      if(!$mail->send()){ // check send mail true/false
          echo 'Message could not be sent.'; // message if send mail not complete
          echo 'Mailer Error: ' . $mail->ErrorInfo; // message error
      }else{
          //echo 'Message has been sent'; // message if send mail complete

          // echo '<script type="text/javascript">alert("ส่งข้อมูลให้เจ้าหน้าที่เรียบร้อยแล้ว");</script>';
           echo("<script> top.location.href='../thankyou_contact.html'</script>"); 
      }
      */



      }else if($contact_page=='contact'){




       
       
          define('LINE_API',"https://notify-api.line.me/api/notify");
          define('LINE_TOKEN','0Up7W9vu9hXR04vRP6iklgWyjS5iD9E3Zyu4eb2uQjK'); 

          function notify_message($message){

              $queryData = array('message' => $message);
              $queryData = http_build_query($queryData,'','&');
              $headerOptions = array(
                  'http'=>array(
                      'method'=>'POST',
                      'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                                ."Authorization: Bearer ".LINE_TOKEN."\r\n"
                                ."Content-Length: ".strlen($queryData)."\r\n",
                      'content' => $queryData
                  )
              );
              $context = stream_context_create($headerOptions);
              $result = file_get_contents(LINE_API,FALSE,$context);
              $res = json_decode($result);
              return $res;
           }

         /* --------------  */
              $text_line = "
              หน้าฟอร์มติดต่อผ่านเว็บไซต์ 
              วันที่ : ".$contact_date."
              ชื่อ-นามสกุล : ".$contact_name." 
              อีเมล์ : ".$contact_email." 
              เบอร์ : ".$contact_tel." 
              หัวข้อ : ".$contact_heading." 
              รายละเอียด: ".$contact_detail."
              URL : https://connex.in.th/contact/th" ;
              $alert_line = notify_message($text_line);  

       

         /* -------------- */



                $sql="INSERT INTO dbo_buyer_contact (buyer_contact_id, buyer_contact_type, buyer_contact_attention, buyer_contact_name ,buyer_contact_tel ,buyer_contact_email ,buyer_contact_detail, buyer_contact_date_create , ex_list_listing_code )
                     VALUES ('', '1', '1' , '$contact_name','$contact_tel','$contact_email','$contact_detail','$contact_date' ,'$listing_code')"; 

                 mysqli_query($conn, $sql);  


           echo '<script type="text/javascript">alert("ส่งข้อมูลให้เจ้าหน้าที่เรียบร้อยแล้ว");</script>';
           echo("<script> top.location.href='../../../../'</script>"); 


      }
}else{

           echo("<script> top.location.href='../../../../../../../../../../../../../../../../../../../../'</script>"); 
}

?>