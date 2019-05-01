<!DOCTYPE html>
<?php

require_once 'vendor/autoload.php';
session_start();
ob_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

//tambah baru masbro

if ($_SESSION['admin'] || $_SESSION['mahasiswa'] || $_SESSION['dosen']) {


    $conn = new mysqli("localhost", "root", "", "lemanev02");
    ?>
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Lecturer Performance Evaluation</title>
        <!-- BOOTSTRAP STYLES-->
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <!-- <link href="assets/js/bootstrap.min.js" rel="stylesheet" />
                            <link href="assets/js/jquery-1.10.2.js" rel="stylesheet" /> -->
        <!-- FONTAWESOME STYLES-->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
        <link href="assets/css/custom.css" rel="stylesheet" />
        <!-- GOOGLE FONTS-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        <!-- TABLE STYLES-->
        <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    </head>

    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">LEMANEV</a>
                </div>
                <div style="color: white;
                            padding: 15px 50px 5px 50px;
                            float: right;
                            font-size: 16px;">
                            <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> 
                </div>
            </nav>
            <!-- /. NAV TOP  -->
            <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="main-menu">
                        <li class="text-center">
                            <img src="assets/img/find_user.png" class="user-image img-responsive" />
                        </li>
                        <?php

                        if ($_SESSION['admin']) {

                            ?>


                            <li>
                                <a href="index.php"><i class="fa fa-dashboard fa-3x"></i>Home</a>
                            </li>

                            <li>
                                <a href="#"><i class="fa fa-sitemap fa-3x"></i>Database<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="?page=user"><i class="fa fa-dashboard fa-3x"></i> Data User</a>
                                    </li>

                                    <li>
                                        <a href="?page=dosen"><i class="fa fa-dashboard fa-3x"></i>Data Dosen</a>
                                    </li>

                                    <li>
                                        <a href="?page=matakuliah"><i class="fa fa-dashboard fa-3x"></i>Data Matakuliah</a>
                                    </li>

                                    <li>
                                        <a href="?page=mahasiswa"><i class="fa fa-dashboard fa-3x"></i>Data Mahasiswa</a>
                                    </li>

                                    <li>
                                        <a href="?page=krs"><i class="fa fa-dashboard fa-3x"></i>Tabel KRS</a>
                                    </li>
                                    <li>
                                        <a href="?page=th_akd"><i class="fa fa-dashboard fa-3x"></i>Data Tahun Akademik</a>
                                    </li>
                                </ul>
                            </li>


                            <li>
                                <a href="?page=soal"><i class="fa fa-dashboard fa-3x"></i>Soal Kuesioner</a>
                            </li>

                            <li>
                                <a href="?page=nilai"><i class="fa fa-dashboard fa-3x"></i>Rekapan Nilai</a>
                            </li>

                        <?php

                    } elseif ($_SESSION['mahasiswa']) {

                        ?>

                            <li>
                                <a href="index.php"><i class="fa fa-dashboard fa-3x"></i>Home</a>
                            </li>

                            <!-- <li>
                                                                                <a href="?page=kuesioner"><i class="fa fa-dashboard fa-3x"></i>Isian Mahasiswa</a>
                                                                            </li> -->

                        <?php

                    } elseif ($_SESSION['dosen']) {

                        ?>

                            <li>
                                <a href="index.php"><i class="fa fa-dashboard fa-3x"></i>Home</a>
                            </li>

                        <?php

                    }

                    ?>

                    </ul>

                </div>

            </nav>
            <!-- /. NAV SIDE  -->
            <div id="page-wrapper">
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12">

                            <?php

                            $page = $_GET['page'];
                            $aksi = $_GET['aksi'];

                            if ($page == "soal") {
                                if ($aksi == "") {
                                    include "page/soal/soal.php";
                                } elseif ($aksi == "tambah") {
                                    include "page/soal/tambah.php";
                                } elseif ($aksi == "ubah") {
                                    include "page/soal/ubah.php";
                                } elseif ($aksi == "hapus") {
                                    include "page/soal/hapus.php";
                                }
                            } elseif ($page == "dosen") {
                                if ($aksi == "") {
                                    include "page/dosen/dosen.php";
                                } elseif ($aksi == "tambah") {
                                    include "page/dosen/tambah.php";
                                } elseif ($aksi == "ubah") {
                                    include "page/dosen/ubah.php";
                                } elseif ($aksi == "hapus") {
                                    include "page/dosen/hapus.php";
                                }
                            } elseif ($page == "mahasiswa") {
                                if ($aksi == "") {
                                    include "page/mahasiswa/mahasiswa.php";
                                } elseif ($aksi == "tambah") {
                                    include "page/mahasiswa/tambah.php";
                                } elseif ($aksi == "ubah") {
                                    include "page/mahasiswa/ubah.php";
                                } elseif ($aksi == "import") {
                                    include "page/mahasiswa/import.php";
                                } elseif ($aksi == "hapus") {
                                    include "page/mahasiswa/hapus.php";
                                }
                            } elseif ($page == "krs") {
                                if ($aksi == "") {
                                    include "page/krs/krs.php";
                                } elseif ($aksi == "tambah") {
                                    include "page/krs/tambah.php";
                                } elseif ($aksi == "ubah") {
                                    include "page/krs/ubah.php";
                                } elseif ($aksi == "hapus") {
                                    include "page/krs/hapus.php";
                                }
                            } elseif ($page == "kuesioner") {
                                if ($aksi == "kuesioner") {
                                    include "page/kuesioner/kuesioner.php";
                                }
                            } elseif ($page == "th_akd") {
                                if ($aksi == "") {
                                    include "page/th_akd/th_akd.php";
                                } elseif ($aksi == "tambah") {
                                    include "page/th_akd/tambah.php";
                                } elseif ($aksi == "ubah") {
                                    include "page/th_akd/ubah.php";
                                } elseif ($aksi == "hapus") {
                                    include "page/th_akd/hapus.php";
                                }
                            } elseif ($page == "matakuliah") {
                                if ($aksi == "") {
                                    include "page/matakuliah/matakuliah.php";
                                } elseif ($aksi == "tambah") {
                                    include "page/matakuliah/tambah.php";
                                } elseif ($aksi == "ubah") {
                                    include "page/matakuliah/ubah.php";
                                } elseif ($aksi == "hapus") {
                                    include "page/matakuliah/hapus.php";
                                }
                            } elseif ($page == "nilai") {
                                // if ($aksi == "nilai") {
                                //     include "page/nilai/nilai.php";
                                // } else

                                if ($aksi == "nilai_new") {
                                    include "page/nilai/nilai_new.php";
                                }
                            } elseif ($page == "user") {
                                if ($aksi == "") {
                                    include "page/user/user.php";
                                } elseif ($aksi == "tambah") {
                                    include "page/user/tambah.php";
                                } elseif ($aksi == "ubah") {
                                    include "page/user/ubah.php";
                                } elseif ($aksi == "hapus") {
                                    include "page/user/hapus.php";
                                }
                            } elseif ($page == "") {

                                if ($_SESSION['admin']) {
                                    include "home_admin.php";
                                } elseif ($_SESSION['mahasiswa']) {
                                    include "home_mahasiswa.php";
                                } elseif ($_SESSION['dosen']) {
                                    include "home_dosen.php";
                                }
                            }



                            ?>

                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />

                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
        <!-- /. WRAPPER  -->
        <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
        <!-- JQUERY SCRIPTS -->
        <script src="assets/js/jquery-1.10.2.js"></script>
        <!-- BOOTSTRAP SCRIPTS -->
        <script src="assets/js/bootstrap.min.js"></script>
        <!-- METISMENU SCRIPTS -->
        <script src="assets/js/jquery.metisMenu.js"></script>
        <!-- DATA TABLE SCRIPTS -->
        <script src="assets/js/dataTables/jquery.dataTables.js"></script>
        <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function() {
                $('#dataTables-example').dataTable();
            });
        </script>
        <!-- CUSTOM SCRIPTS -->
        <script src="assets/js/custom.js"></script>



    </body>

    </html>

<?php

} else {
    header("location:login.php");
}


?>