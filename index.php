<?php 
// -------------------------------------------- session
// Start session
session_start();
if (!$_SESSION["UserID"]){  //check session
  Header("Location: login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 
}else{
  // echo $_SESSION["UserID"];
  // echo $_SESSION["User"];
  // echo $_SESSION["Userlevel"];
  // -------------------------------------------- session
include 'condb.php';
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
 



-->
</style></head>
<body>
<div class="container">
<p>&nbsp;</p>
<p><a href="NewQuestion.php">ตั้งกระทู้ใหม่ !!</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">logout !!</a></p>
<?php
$sql = "SELECT * FROM db_name.webboard";
$result = $conn->query($sql);
?>

<table class="table table-bordered">
  <tr>
    <th width="79" height="29" bgcolor="#FFE0C1"> <div align="center">กระทู้ที่</div></th>
    <th width="530" bgcolor="#E6FFE6"> <div align="center">หัวข้อ</div></th>
    <th width="122" bgcolor="#EAFFFF"> <div align="center">ชื่อผู้โพสท์</div></th>
    <th width="110" bgcolor="#EAFFFF"> <div align="center">วันที่โพสท์</div></th>
    <th width="44" bgcolor="#FFFFD5"> <div align="center">ดู</div></th>
    <th width="69" bgcolor="#FFFFD5"> <div align="center">ตอบกลับ</div></th>
  </tr>
  
<?php
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    ?>
    <tr>
    <td><div align="center"><?=$row["QuestionID"];?></div></td>
    <td><a href="ViewWebboard.php?QuestionID=<?=$row["QuestionID"];?>"><?=$row["Question"];?></a></td>
    <td><div align="center"><?=$row["Name"];?></div></td>
    <td width="150"><div align="center"><?=$row["CreateDate"];?></div></td>
    <td align="right"><div align="center"><?=$row["View"];?></div></td>
    <td align="right"><div align="center"><?=$row["Reply"];?></div></td>
    <td><a href='dele.php?QuestionID=<?=$row["QuestionID"];?>'  >aaaaaaaaaaaaaaaa</a></td>
    /* <a href = 'delete.php?delete_id=$row[Id]' onclick=\"return confirm('คุณต้องการลบข้อมูล!!!!')\"> delete</a> */

    /* <a href="register.php" id="href" >aaaaaaaaaaaaaaaa</a> */












  </tr>
  </div>
    <?php
  }
} else {
  // echo "0 results";
}
$conn->close();
} // -------------------------------------------- session
?>