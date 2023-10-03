<?php
//$url_feed = 'http://breakingnews.nationchannel.com/rss/breakhot.xml'; // ข่าวจำนวนมากสำหรับ ทดสอบ
$url_feed = 'https://connex.in.th/backend/Breakingnews.xml'; // กำหนด xml feed ที่ต้องการ
 
// ส่วนเริ่มต้นการใช้งานฟังก์ชัน curl ในการเรียกใช้ไฟล์ xml feed
$ch = curl_init($url_feed);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$get_content = curl_exec($ch); // เก็บรูปแบบข้อความ xml ไว้ในตัวแปร $get_content
curl_close($ch);
// สิ้นสุดการใช้งานฟังก์ชัน curl  ในการเรียกใช้ไฟล์ xml feed
 
// แปลงข้อความที่อยู่ในรูปแบบ xml เป็นตัวแปร object
$parsed_xml = simplexml_load_string($get_content);
 
 
// สามารถใช้ฟังก์ชัน simplexml_load_file() แทนการใช้งาน curl และ
// simplexml_load_string() เพื่อแปลงจากไฟล์ xml feed เป็น object ได้เลย 
// $parsed_xml = simplexml_load_file($url_feed);
 
// หาจำนวนรายการ feed ทั้งหมด 
// ถ้ามีจำนวนมาก สามารถกำหนดเอง เพื่อจำกัดการแสดงข้อมูลได้
$total=count($parsed_xml->channel->item);
// $total=20; // กรณีกำหนดเอง
 
// จำนวนรายการที่ต้องการแสดง แต่ละหน้า
$perPage = 3000;
 
// คำนวณจำนวนหน้าทั้งหมด
$num_naviPage=ceil($total/$perPage);
 
// กำหนดจุดเริ่มต้น และสิ้นสุดของรายการแต่ละหน้าที่จะแสดง
if(!isset($_GET['page'])){
    $s_key=0;
    $e_key=$perPage;    
    $_GET['page']=1;
}else{
    $s_key=($_GET['page']*$perPage)-$perPage;
    $e_key=$perPage*$_GET['page'];
    $e_key=($e_key>$total)?$total:$e_key;
}
 
// สร้างลิ้งค์เลือกหน้า
for($i=1;$i<=$num_naviPage;$i++){
    echo "  || <a href=\"?page=".$i."\">Page $i</a>"; 
}
echo "<hr>";
 
// แสดงรายการ
for($indexFeed=$s_key;$indexFeed<$e_key;$indexFeed++){
        $numOrder=$indexFeed+1;
        echo $numOrder.".".$parsed_xml->channel->item[$indexFeed]->title."<br>";
        echo '<strong>Description : </strong> '.$parsed_xml->channel->item[$indexFeed]->description.'<br/>';
        echo '<strong>Link :</strong>  '.$parsed_xml->channel->item[$indexFeed]->link."<br><hr>";
}
 
// แสดงหน้าปัจจุบัน
echo "Page:".$_GET['page'];
?>