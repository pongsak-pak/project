<?php
// Start session
session_start();
if (!$_SESSION["UserID"]){  //check session
  Header("Location: login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 
}else{
include 'condb.php';
if(isset($_GET["Action"])){
    if($_GET["Action"] == "Save"){
        	//*** Insert Question ***//
          if(isset($_POST["txtQuestion"])){
            if($_POST["txtQuestion"] == ""){
              echo "<script type='text/javascript'>alert('คุณยังไม่ได้ หัวข้อกระทู้!!');</script>";
            }else{
	$strSQL = "INSERT INTO db_name.webboard ";
	$strSQL .="(CreateDate,Question,Details,Name) ";
	$strSQL .="VALUES ";
	$strSQL .="('".date("Y-m-d H:i:s")."','".$_POST["txtQuestion"]."','".$_POST["txtDetails"]."','".$_POST["txtName"]."') ";
	$objQuery = $conn->query($strSQL);
	header("location:index.php");
}
          }
    }
}
?>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>เว็บบอร์ด php : PogSak PAkkhemaya</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" CONTENT="TH-TH">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
<style type="text/css">
<!--
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
#txtQuestion , #txtDetails , #txtName {
  width: 100%
}

-->
</style></head>
<body>
<div class="container">
<p><br>
<a href="index.php">กลับไปยังหน้าบอร์ด</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">logout !!</a></p>
<form action="NewQuestion.php?Action=Save" method="post" name="frmMain" id="frmMain">
  <table class="table table-bordered">
    <tr>
      <td bgcolor="#E6FFE6"><div align="center">หัวข้อ</div></td>
      <td><input name="txtQuestion" type="text" id="txtQuestion" value="" size="70" required=""></td>
    </tr>
    <tr>
      <td width="84" bgcolor="#FFFFD5"><div align="center">รายละเอียด</div></td>
      <td><textarea name="txtDetails" cols="70" rows="6" id="txtDetails" required=""></textarea></td>
    </tr>
    <tr>
      <td width="84" bgcolor="#EAFFFF"><div align="center">ชื่อ</div></td>
      <td width="524"><input name="txtName" type="text" id="txtName" value="" size="50" required=""></td>
    </tr>
  </table>

  <p>
    <input name="btnSave" type="submit" id="btnSave" value="โพสท์">
    </p>
</form>
</body>
</html>
</div>
<?php
$conn->close();
}
?>