<?php

session_start();
ob_start();
if ($_SESSION['admin']) {

?>


<a href="?page=soal&aksi=tambah" class="btn btn-primary" style="margin-bottom:15px;">Tambah Soal</a>

<?php
$getped = mysqli_query($conn, "select count(soal) as total1 from tb_soal where aspek='pedagogik'");
$resped = $getped->fetch_assoc();
$getprof = mysqli_query($conn, "select count(soal) as total2 from tb_soal where aspek='profesionalisme'");
$resprof = $getprof->fetch_assoc();
$getkep = mysqli_query($conn, "select count(soal) as total3 from tb_soal where aspek='kepribadian'");
$reskep = $getkep->fetch_assoc();
$getsos = mysqli_query($conn, "select count(soal) as total4 from tb_soal where aspek='sosial'");
$ressos = $getsos->fetch_assoc();
?>

<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->


        <div class="panel panel-default">
            <div class="panel-heading">
            Statistik
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-statistik">
                        <thead>
                        <tr>
                            <th>Jumlah Soal Aspek Pedagogik</th>
                            <th>Jumlah Soal Aspek Profesionalisme</th>
                            <th>Jumlah Soal Aspek Kepribadian</th>
                            <th>Jumlah Soal Aspek Sosial</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><?= $resped['total1'] ?></td>
                            <td><?= $resprof['total2'] ?></td>
                            <td><?= $reskep['total3'] ?></td>
                            <td><?= $ressos['total4'] ?></td>
                        </tr>
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>



        <div class="panel panel-default">
            <div class="panel-heading">
                Daftar Soal
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Aspek Soal</th>
                                <th>Soal</th>                                
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $sql = $conn->query("select * from tb_soal");
                            while ($data = $sql->fetch_assoc()) {
                                ?>
                            <tr>
                                <td>
                                    <?= $no++; ?>
                                </td>
                                <td>
                                    <?= $data['aspek']; ?>
                                </td>
                                <td>
                                    <?= $data['soal']; ?>
                                </td>
                                <td>
                                    <a href="?page=soal&aksi=ubah&id_soal=<?= $data['id_soal'] ?>" class="btn btn-info">Ubah</a>
                                    <a 
                                    onclick="return confirm ('Hapus data?')"
                                    href="?page=soal&aksi=hapus&id_soal=<?= $data['id_soal'] ?>" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                            <?php

                        }
                        ?>
                        </tbody>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

} else {
    header("location:login.php");
}

?>