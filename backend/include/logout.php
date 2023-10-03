<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
    </head>
<body>
<?php 
session_start();

session_destroy();


if (isset($_COOKIE['register'])) {
    unset($_COOKIE['register']);
    setcookie('register', '', time() - 86400 * 365, '/'); // empty value and old timestamp
}
 

echo '<script type="text/javascript">alert("ออกจากระบบแล้ว");</script>';
echo("<script> top.location.href='../?clear=1'</script>");  

?>
</body>
</html>
