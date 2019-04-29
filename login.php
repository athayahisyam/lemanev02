<?php

session_start();
ob_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

if ($_SESSION['admin'] || $_SESSION['mahasiswa']) {

    header("location: index.php");
    
} else {
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LOGIN LEMANEV</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <h2>Sistem Informasi Evaluasi Kinerja Dosen</h2>
                <br /><br />
                <h3>Departemen Informatika</h3>
                <h3>Universitas Darussalam Gontor</h3>
                 <br />
            </div>
        </div>
         <div class="row ">
               
                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>Formulir Login</strong>  
                            </div>
                            <div class="panel-body">
                                <form role="form" method="post">
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" name="username" class="form-control" placeholder="NIM/NIDN " />
                                        </div>
                                                                              <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" name="pass" class="form-control"  placeholder="Password" />
                                        </div>
                                    <div class="text-center">
                                         <input type="submit" name="login" class="btn btn-primary" value="Masuk">
                                    </div>
                                    </form>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>


     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
   
</body>
</html>

<?php

 if (isset($_POST['login'])) {
     $username = $_POST['username'];
     $pass = $_POST['pass'];

     $conn = new mysqli("localhost", "root", "", "lemanev02");
     $query = $conn->query("select * from tb_user where id='$username' and password='$pass'");
     $data = $query->fetch_assoc();
     $num_rows = $query->num_rows;

     if($num_rows >= 1){
         session_start();
         if($data['level'] == 'admin'){
             $_SESSION['admin'] = $data[id];

             header("location:index.php");
         }else if ($data['level'] == 'dosen') {
            $_SESSION['dosen'] = $data[id];

            header("location:index.php");
         }else if ($data['level'] == 'mahasiswa') {
            $_SESSION['mahasiswa'] = $data[id];

            header("location:index.php");
         }
     } else {
        ?>

             <script type="text/javascript">
                alert("Login Gagal! Silakan Ulangi Lagi!");
             </script>

             <?php

        }
 }


}
?>
