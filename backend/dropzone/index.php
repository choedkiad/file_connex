<?php
ini_set('session.gc_maxlifetime', 100000);

session_start(); 

 //include '../config.php'; 
 //include '../setting.php'; 
 
 ?>
  <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
 
</script>


        <link href="style.css" rel="stylesheet" type="text/css">
        <link href="dropzone.css" rel="stylesheet" type="text/css">
        <script src="dropzone.js" type="text/javascript"></script>

 


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">ภาพประกอบ </h3>

           
          </div>

            <div class="container" >
                <div class='content'>
                <form action="upload.php" class="dropzone" id="dropzonewidget">
                    
                </form>  
                </div> 
            </div>
         </div>
      </div>
    </section>

  
  <script type="text/javascript" src="js/jquery.dragsort.js"></script>
<script src="//code.jquery.com/jquery.min.js"></script> 
 
<!DOCTYPE html>

<html>
<head>
    <title>DragSort Example</title>
  <meta charset="utf-8" />
  <style type="text/css">
    body { font-family:Arial; font-size:12pt; padding:20px; width: 800px; margin:20px auto; border:solid 1px black; }
    h1 { font-size:16pt; }
    h2 { font-size:13pt; }
    ul { width:350px; list-style-type: none; margin:0px; padding:0px; }
    li { float:left; padding:5px; width:100px; height:100px; }
    li div { width:90px; height:50px; border:solid 1px black; background-color:#E0E0E0; text-align:center; padding-top:40px; }
    .placeHolder div { background-color:white!important; border:dashed 1px gray !important; }
  </style>
</head>
<body>
 
        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 


  
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script type="text/javascript" src="js/jquery.dragsort.js"></script>
  <div class="container"> 

   <!--
  <h1>jQuery dragsort Example</h1>
  <br/>

  <h2>Simple 1D list:</h2>

  <ul>
    <li>bread</li>
    <li>vegetables</li>
    <li>meat</li>
    <li>milk</li>
    <li>butter</li>
    <li>ice cream</li>
  </ul>
  <br/>
  -->
  <script type="text/javascript">
    $("ul:first").dragsort();
  </script>
   
  
   
  <ul id="list1">
    <li><div>1</div></li>
    <li><div>2</div></li>
    <li><div>3</div></li>
    <li><div>4</div></li>
    <li><div>5</div></li>
    <li><div>6</div></li>
    <li><div>7</div></li>
    <li><div>8</div></li>
    <li><div>9</div></li>
  </ul>
  
  <!-- save sort order here which can be retrieved on server on postback -->
  <input name="list1SortOrder" type="hidden" />

  <script type="text/javascript">
    $("#list1, #list2").dragsort({ dragSelector: "div", dragBetween: true, dragEnd: saveOrder, placeHolderTemplate: "<li class='placeHolder'><div></div></li>" });
    
    function saveOrder() {
      var data = $("#list1 li").map(function() { return $(this).children().html(); }).get();
      $("input[name=list1SortOrder]").val(data.join("|"));
    };
  </script>

 
 
    </div>
    


 
</body>
</html>
