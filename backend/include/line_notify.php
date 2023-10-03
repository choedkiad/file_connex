  

<?php

  session_start();  

  require '../config.php';

            $USER_ID=$_SESSION['USER_ID'];
            $deal_sale=$_GET['deal_sale'];
            $listing=$_GET['listing'];
            $title=$_GET['title'];
            $code=$_GET['code'];
            $lang=$_GET['lang'];
            $s_record_note=$_GET['note_record'];
            $date=date("Y-m-d H:i:s");



                           // เช็ค SALE ส่งแจ้งเตือนเซลล์

                      



                     $sql_listing="SELECT * FROM dbo_data_excel_listing where ex_list_listing_code='$listing' ";
                      $result_listing=$conn->query($sql_listing);  
                      $rs_listing=$result_listing->fetch_assoc();

                            $project_id=$rs_listing['project_id'];
                            $ex_list_floor=$rs_listing['ex_list_floor'];
                            $ex_list_deal_type=$rs_listing['ex_list_deal_type'];
                            $ex_list_sqm=$rs_listing['ex_list_sqm'];
                            $ex_list_bedroom=$rs_listing['ex_list_bedroom'];
                            $ex_list_bathroom=$rs_listing['ex_list_bathroom'];
                            $ex_list_price=$rs_listing['ex_list_price'];
                            $ex_list_price=number_format($ex_list_price);

                            $url_detail="https://connex.in.th/backend/page/owner.php?id=$listing";

                          if($ex_list_deal_type=='1'){ $ex_list_deal_type="ขาย";  $ex_list_deal_type_en="FOR SELL"; }else{$ex_list_deal_type="เช่า"; $ex_list_deal_type_en="FOR RENT";}

                          if($project_id!='0'){

                             $sql_projects="SELECT * FROM type_project where project_id='$project_id' order by project_id  ASC"; 
                             $result_projects=$conn->query($sql_projects);
                             $rs_projects= $result_projects->fetch_assoc();


                             $project_name=$rs_projects['project_name'];
                             $project_name_en=$rs_projects['project_name_en'];

                             $project_name=$project_name_en;
                           }
                          
                          if($lang=='1'){

                              if($ex_list_bedroom=='0'){ $ex_list_bedroom='สตูดิโอ';}
                               $cx_list='รหัสทรัพย์ : '.$listing;
                               $price="ราคา".$ex_list_deal_type.' : '.$ex_list_price;
                               $floor='ตั้งอยู่ชั้นที่ : '.$ex_list_floor;
                               $sqm='พื้นที่ใช้สอย (sqm) : '.$ex_list_sqm;
                               $bedroom='ห้องนอน : '.$ex_list_bedroom;
                               $bathroom='ห้องน้ำ : '.$ex_list_bathroom;
                               $url="https://connex.in.th/property/th/".$listing;

                          }else{
       
                              if($ex_list_bedroom=='0'){ $ex_list_bedroom='Studio';}
                               $cx_list='Listing ID : '.$listing;
                               $price=$ex_list_deal_type_en.' : '.$ex_list_price;
                               $floor='Floor :  '.$ex_list_floor;
                               $sqm='Usable area (sqm) :  '.$ex_list_sqm;
                               $bedroom='No. of Bedroom : '.$ex_list_bedroom;
                               $bathroom='No. of Bathroom : '.$ex_list_bathroom;
                               $url="https://connex.in.th/property/en/".$listing;

                          }
                               
                               // สต๊อกผู้ส่งเคส 
                                $sql_1="SELECT * FROM dbo_register where register_id='$USER_ID' ";
                                $result_1=$conn->query($sql_1);  
                                $rs_1=$result_1->fetch_assoc(); 

                                $name_stock=$rs_1['register_name'];

                                // เซลล์ที่ ส่งงานให้
                                $sql="SELECT * FROM dbo_register where register_id='$deal_sale'   ";
                                $result=$conn->query($sql);  
                                $rs=$result->fetch_assoc();

                                $register_notify=$rs['register_notify'];

                               

                                    define('LINE_API',"https://notify-api.line.me/api/notify");
                                    define('LINE_TOKEN',$register_notify); 

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
*****นำเสนอห้อง*****
Deal Name : ".$title."
รหัส Deal : ".$code."
ผู้นำเสนอ : ".$name_stock."
เวลา : ".$date."

Owner Detail : ".$url_detail."
Remark : ".$s_record_note."
_________________________

".$project_name."

".$cx_list."

".$price."

".$floor."
".$sqm."
".$bedroom."
".$bathroom."

" .$url;
                                    $alert_line = notify_message($text_line);  

 

                            
 


                                    ?>

<b style="font-size: 20px;">กำลังส่งข้อมูลไปยัง LINE หน้านี้จะปิดเอง</b>

 