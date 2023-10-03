           <script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
setInterval(function(){
// 1 วินาที่ เท่า 1000  
 $("#loading_img_spin").show(); //แสดงรูปภาพ loading
 $("#divShowData").load("showdata.php",function(responseTxt,statusTxt,xhr){
   if(statusTxt=="success") //หากดึงข้อมูลมาแสดงสำเร็จ
     $("#loading_img_spin").hide(); //ซ่อนรูปภาพ loading
  });
},6000);  
 
});
</script>
 <img src="assets/img/spin.gif" id="loading_img_spin" style="display:none;position:absolute;left:60%;top:40%;" />
 <div id="divShowData"></div>