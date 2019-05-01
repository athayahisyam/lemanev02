<?php
session_start();
ob_start();

if(!isset($_SESSION['admin'])){
    header("location:login.php");
}

$id = $_SESSION['admin'];
$conn = new mysqli("localhost", "root", "", "lemanev02");
$sql = $conn->query("select * from tb_user where id=$id");

$tampil = mysqli_fetch_assoc($sql);
?>

<!-- /. NAV SIDE  -->

<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <marquee>Anda masuk sebagai: <?= $tampil['name']; ?>,  anda adalah <?= $tampil['level'] ?> </marquee>
            <h2>Admin Dashboard</h2>
            <h3>Welcome <?= $tampil['name']; ?>, di Dashboard Administrasi Lemanev 02 </h3>
        </div>
    </div>
    <!-- /. ROW  -->
    <hr />