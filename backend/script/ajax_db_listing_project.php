
<?php

 
  include '../config.php'; 

  
  if (isset($_POST['function']) && $_POST['function'] == 'provinces') {
    $id = $_POST['id'];
    $sql = "SELECT * FROM districts WHERE province_id='$id'";
    $query = mysqli_query($conn, $sql);
    echo '<option   value="" selected disabled >-กรุณาเลือกอำเภอ-</option>';
    foreach ($query as $value) {
      echo '<option  value="'.$value['id'].'" >'.$value['districts_in_thai'].'</option>';
      
    }  
  }
 
 
if (isset($_POST['function']) && $_POST['function'] == 'amphures') {
    $id = $_POST['id'];
    $sql = "SELECT * FROM subdistricts WHERE district_id='$id'";
    $query = mysqli_query($conn, $sql);
    echo '<option value="" selected disabled>-กรุณาเลือกตำบล-</option>';
    foreach ($query as $value2) {
      echo '<option value="'.$value2['id'].'">'.$value2['subdistricts_in_thai'].'</option>';
      
    }
  }
 
  if (isset($_POST['function']) && $_POST['function'] == 'districts') {
    $id = $_POST['id'];
    $sql = "SELECT * FROM subdistricts WHERE id='$id'";
    $query3 = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query3);
    echo $result['zip_code'];
    exit();
  }
 
?>