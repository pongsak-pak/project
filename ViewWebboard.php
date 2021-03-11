
}
<?php
// Start session
session_start();
if (!$_SESSION["UserID"]){  //check session
  Header("Location: login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 
}else{
include 'condb.php';
if(isset($_GET["Action"])){
if($_GET["Action"] == "Save"){
  if(isset($_POST["txtDetails"] )){
  if($_POST["txtDetails"] == ""){
    echo "<script type='text/javascript'>alert('คุณยังไม่ได้ กรอกความคิดเห็น!!');</script>";
  }else{
	//*** Insert Reply ***//
	$strSQL = "INSERT INTO db_name.reply ";
	$strSQL .="(QuestionID,CreateDate,Details,Name) ";
	$strSQL .="VALUES ";
	$strSQL .="('".$_GET["QuestionID"]."','".date("Y-m-d H:i:s")."','".$_POST["txtDetails"]."','".$_POST["txtName"]."') ";
	$objQuery = $conn->query($strSQL); 
	
	//*** Update Reply ***//
	$strSQL = "UPDATE db_name.webboard ";
	$strSQL .="SET Reply = Reply + 1 WHERE QuestionID = '".$_GET["QuestionID"]."' ";
	$objQuery = $conn->query($strSQL);
}
  }
}
}else{
  //*** Update View ***//
$strSQL_View = "UPDATE db_name.webboard ";
$strSQL_View .="SET View = View + 1 WHERE QuestionID = '".$_GET["QuestionID"]."' ";
$objQuery = $conn->query($strSQL_View);

}   
 
?>
<!-- ---------------------------------------------------- -->

}

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

}
a:active {
	text-decoration: none;
}
#txtDetails , #txtName {
  width: 100%
}

</style></head>
<body>
<div class="container">
<p><br>
<a href="index.php" >กลับไปยังหน้าบอร์ด</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">logout !!</a></p> 
<p>
<?php
//*** Select Question ***//
$sql = "SELECT * FROM db_name.webboard  WHERE QuestionID = '".$_GET["QuestionID"]."' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
       ?>
       </p>
<table class="table table-bordered">
  <tr>
    <td height="31" colspan="2" bgcolor="#E6FFE6"><center><h1><?=$row["Question"];?></h1>
    </center></td>
  </tr>
  <tr>
    <td height="82" colspan="2"><?=nl2br($row["Details"]);?></td>
  </tr>
  <tr>
    <td width="397" bgcolor="#EAFFFF">ชื่อ : <?=$row["Name"];?>
     วันที่โพสท์  :      <?=$row["CreateDate"];?></td>
    <td width="253" bgcolor="#FFFFD5">ดู : 
    <?=$row["View"];?> ตอบกลับ : <?=$row["Reply"];?></td>
  </tr>
</table>
<br>
<br>
       <?php
    }
} else {
        // echo "0 results";
}
?>
<?php
$intRows = 0;

$sql2 = "SELECT * FROM db_name.reply  WHERE QuestionID = '".$_GET["QuestionID"]."' ";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    while($row2 = $result2->fetch_assoc()) 
    {
      $intRows++;
?>
ลำดับ : <?=$intRows;?>
<table class="table table-bordered">
  <tr>
    <td height="53"><?=nl2br($row2["Details"]);?></td>
  </tr>
  <tr>
    <td width="397" bgcolor="#EAFFFF">ชื่อ :
        <?=$row2["Name"];?>
        วันที่ตอบ :
      <?=$row2["CreateDate"];?></td>
  </tr>
</table>
<br>
<?php
   }
  } else {
          // echo "0 results";
  }
?>
<br>
<br>
<br>
<form action="ViewWebboard.php?QuestionID=<?=$_GET["QuestionID"];?>&Action=Save" method="post" name="frmMain" id="frmMain">
  <strong>ตอบกลับกระทู้นี้</strong><br>
  <table class="table table-bordered">
    <tr>
      <td width="78" bgcolor="#FFFFD5"><div align="center">รายละเอียด</div></td>
      <td><textarea name="txtDetails" cols="80" rows="5" id="txtDetails" required=""></textarea></td>
    </tr>
    <tr>
      <td width="78" bgcolor="#EAFFFF"><div align="center">ชื่อ</div></td>
      <td width="647"><input name="txtName" type="text" id="txtName" value="" size="80" required=""></td>
    </tr>
  </table>
  
  <p>
    <input name="btnSave" type="submit" id="btnSave" value="ตอบกลับ">
  </p>
</form>
</body>
</html>
</div>
<?php
$conn->close();
}
?>


