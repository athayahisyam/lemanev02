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
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-envelope-o"></i>
                </span>
                <div class="text-box">
                    <p class="main-text">120 New</p>
                    <p class="text-muted">Messages</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-bars"></i>
                </span>
                <div class="text-box">
                    <p class="main-text">30 Tasks</p>
                    <p class="text-muted">Remaining</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-bell-o"></i>
                </span>
                <div class="text-box">
                    <p class="main-text">240 New</p>
                    <p class="text-muted">Notifications</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-rocket"></i>
                </span>
                <div class="text-box">
                    <p class="main-text">3 Orders</p>
                    <p class="text-muted">Pending</p>
                </div>
            </div>
        </div>
    </div>