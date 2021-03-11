<?php
include 'condb.php';

$strSQL = "DELETE  FROM db_name.webboard where QuestionID = '".$_GET["QuestionID"]."' ";


    if ( $conn->query($strSQL)) {
        echo "<script>";
        echo "alert(\" ลบข้อมูลสำเร็จ\");"; 
        echo "window.location ='index.php'; "; 
        echo "</script>";
  } else {
        echo "<script>";
        echo "alert(\" ลบข้อมูลไม่สำเร็จ\");"; 
        echo "window.location ='index.php'; "; 
        echo "</script>";
     }
    ?>