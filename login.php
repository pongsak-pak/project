
<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #3399ff;
  width: 99%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #cce5ff;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {
  backround: #99ccff; /* fallback for old browsers */
  background: -webkit-linear-gradient(right, #99ccff, #3399ff);
  background: -moz-linear-gradient(right, #3333ff, #3399ff);
  background: -o-linear-gradient(right, #3333ff,#3399ff );
  background: linear-gradient(to left, #99ccff, #3399ff);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;  g    
}

.form #href{
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #3399ff;
  width: 100%;
  border: 0;
  padding: 15px 100px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}

.form #href:hover,.form #href:active,.form #href:focus {
  background: #cce5ff;
}

</style>
<?php
session_start();
        if(isset($_POST['Username'])){
				    //connection
            include 'condb.php';
				    //รับค่า user & password
                  $Username = $_POST['Username'];
                  $Password = $_POST['Password'];
				    //query 
                  $sql="SELECT * FROM db_name.member Where Username='".$Username."' and Password='".$Password."' ";

                  $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                      
                      while($row = $result->fetch_assoc()) {
                       
                      $_SESSION["UserID"] = $row["ID"];
                      $_SESSION["User"] = $row["FirstName"];
                      $_SESSION["Userlevel"] = $row["Userlevel"];

                      if($_SESSION["Userlevel"]=="A"){ //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php
                        echo "<script>";
                          echo "alert(\" สวัสดี Admin\");"; 
                          echo "window.location ='index.php'; "; 
                        echo "</script>";
                      }

                      if ($_SESSION["Userlevel"]=="M"){  //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php
                        Header("Location: index.php");
                      }
                    }
                    }else{
                      echo "<script>";
                          echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                          echo "window.history.back()";
                      echo "</script>";

                    }



                      }
?>

<div class="login-page">
  <div class="form">
    <!-- <form class="login-form"> -->
    <form action="login.php?Action=Select" method="post" name="login" id="login">
      <input type="text" name="Username" placeholder="username" required=""/>
      <input type="password" name="Password" placeholder="Password" required=""/>
      <button>ล็อกอิน</button>
      <br></br>
      <a href="register.php" id="href" >สมัคสมาชิก</a>
      

    </form>
  </div>
</div>