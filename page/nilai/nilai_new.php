<?php
session_start();
ob_start();



if (!isset($_SESSION['dosen'])) {
    header("location:login.php");
}

// $id_sesi = $_SESSION['dosen'];
$id_mk = $_GET['id_mk'];
$nidn = $_GET['nidn'];


// Calling Score from database
$conn = new mysqli("localhost", "root", "", "lemanev02");

//identitas dosen
$sql = $conn->query("SELECT tb_dosen.nama as nama_dosen, tb_matakuliah.nama_mk as nama_mk, tb_th_akademik.th_akademik1, tb_th_akademik.th_akademik2
                    FROM tb_dosen INNER JOIN tb_matakuliah on tb_dosen.nidn = tb_matakuliah.nidn INNER JOIN  tb_th_akademik on tb_matakuliah.id_tahun = tb_th_akademik.id_tahun
                    where tb_dosen.nidn = '$nidn'and tb_matakuliah.id_mk = '$id_mk' ");
$id = mysqli_fetch_assoc($sql);

$peserta = $conn->query("SELECT COUNT(nim) from tb_transaksi_krs WHERE id_mk = '$id_mk'");
$jml_peserta = mysqli_fetch_assoc($peserta);

//menghitung xbar1
//$nilai = $conn->query("SELECT AVG(jwb1), AVG(jwb2), AVG(jwb3), AVG(jwb4), AVG(jwb5), AVG(jwb6), AVG(jwb7), AVG(jwb8), AVG(jwb9), AVG(jwb10), AVG(jwb11), AVG(jwb12), AVG(jwb13), AVG(jwb14), AVG(jwb15), AVG(jwb16), AVG(jwb17), AVG(jwb18), AVG(jwb19), AVG(jwb20), AVG(jwb21), AVG(jwb22), AVG(jwb23), AVG(jwb24), AVG(jwb25), AVG(jwb26), AVG(jwb27), AVG(jwb28) from tb_transaksi_jwb where id_mk= '$id_mk'");
$nilaiped = $conn->query("SELECT AVG(jwb1), AVG(jwb2), AVG(jwb3), AVG(jwb4), AVG(jwb5), AVG(jwb6), AVG(jwb7), AVG(jwb8), AVG(jwb9) from tb_transaksi_jwb where id_mk= '$id_mk'");
$rowped = mysqli_fetch_assoc($nilaiped);
$val_ped = array_sum($rowped) / 9;
$val_ped2 = round($val_ped, 2);

$nilaiprof = $nilai = $conn->query("SELECT AVG(jwb10), AVG(jwb11), AVG(jwb12), AVG(jwb13), AVG(jwb14), AVG(jwb15), AVG(jwb16), AVG(jwb17) from tb_transaksi_jwb where id_mk= '$id_mk'");
$rowprof = mysqli_fetch_assoc($nilaiprof);
$val_prof = array_sum($rowprof) / 8;
$val_prof2 = round($val_prof, 2);

$nilaiprib = $nilai = $conn->query("SELECT AVG(jwb18), AVG(jwb19), AVG(jwb20), AVG(jwb21), AVG(jwb22), AVG(jwb23) from tb_transaksi_jwb where id_mk= '$id_mk'");
$rowprib = mysqli_fetch_assoc($nilaiprib);
$val_prib = array_sum($rowprib) / 6;
$val_prib2 = round($val_prib, 2);


$nilaisos = $nilai = $conn->query("SELECT AVG(jwb24), AVG(jwb25), AVG(jwb26), AVG(jwb27), AVG(jwb28) from tb_transaksi_jwb where id_mk= '$id_mk'");
$rowsos = mysqli_fetch_assoc($nilaisos);
$val_sos = array_sum($rowsos) / 5;
$val_sos2 = round($val_sos, 2);

$total_akhir = ($val_ped2 + $val_prof2 + $val_prib2 + $val_sos2) / 4;
// $round_akhir = round($total_akhir, 2)



/** FORM NYA */

?>


<div class="panel panel-default">
    <div class="panel-heading">
        Rekapan Hasil Evaluasi Kinerja Dosen
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST">

                    <ul class="nav nav-tabs nav-justified">
                        <li class="nav-item active">
                            <a class="nav-link" id="id-tab" data-toggle="tab" href="#id" role="tab" aria-controls="id" aria-selected="true">Identitas</a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="ped-tab" data-toggle="tab" href="#ped" role="tab" aria-controls="ped" aria-selected="true">I: Aspek Pedagogik</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="prof-tab" data-toggle="tab" href="#prof" role="tab" aria-controls="prof" aria-selected="true">II: Aspek Profesionalisme</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="kep-tab" data-toggle="tab" href="#kep" role="tab" aria-controls="kep" aria-selected="true">III: Aspek Kepribadian</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="sos-tab" data-toggle="tab" href="#sos" role="tab" aria-controls="sos" aria-selected="true">IV: Aspek Sosial</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="hasil-tab" data-toggle="tab" href="#hasil" role="tab" aria-controls="hasil" aria-selected="true">Total Hasil</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane active" id="id" role="tabpanel" aria-labelledby="id-tab">

                            <h3>Identitas</h3>
                            <div class="form-group">
                                <label>NIDN</label>
                                <input class="form-control" name="nim" value="<?= $nidn ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label>Nama Dosen</label>
                                <input class="form-control" name="nama_dsn" value="<?= $id['nama_dosen'] ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label>Kode Matakuliah</label>
                                <input class="form-control" name="id_mk" value="<?= $id_mk ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label>Nama Matakuliah</label>
                                <input class="form-control" name="nama_mk" value="<?= $id['nama_mk'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Jumlah Peserta Matakuliah</label>
                                <input class="form-control" name="jml_pst" value="<?= $jml_peserta['COUNT(nim)'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Tahun Ajaran</label>
                                <input class="form-control" name="th_ajar" value="<?= $id['th_akademik1'] ?> <?= $id['th_akademik2'] ?>" readonly>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="ped" role="tabpanel" aria-labelledby="ped-tab">

                            <h3>Bagian Pertama: Aspek Pedagogik Dosen</h3>

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-soal-ped">
                                    <thead>
                                        <tr>
                                            <td>Soal</td>
                                            <td>Rata Rata Hasil</td>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $no = 0;
                                        foreach ($rowped as $key => $value) {
                                            $no++;
                                            ?>

                                            <tr>
                                                <td>Soal <?= $no; ?></td>
                                                <td><?= round($value, 2); ?></td>
                                            </tr>

                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="prof" role="tabpanel" aria-labelledby="prof-tab">
                            <h3>Bagian Kedua: Aspek Profesionalisme Dosen</h3>

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-soal-prof">
                                    <thead>
                                        <tr>
                                            <td>Soal</td>
                                            <td>Rata Rata Hasil </td>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $no = 9;
                                        foreach ($rowprof as $key => $value) {
                                            $no++;
                                            ?>

                                            <tr>
                                                <td>Soal <?= $no; ?></td>
                                                <td><?= round($value, 2); ?></td>
                                            </tr>

                                        <?php
                                    }
                                    ?>

                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="kep" role="tabpanel" aria-labelledby="kep-tab">
                            <h3>Bagian Ketiga: Aspek Kepribadian Dosen</h3>

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-soal-kep">
                                    <thead>
                                        <tr>
                                            <td>Soal</td>
                                            <td>Rata-Rata Hasil</td>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $no = 17;
                                        foreach ($rowprib as $key => $value) {
                                            $no++;
                                            ?>

                                            <tr>
                                                <td>Soal <?= $no; ?></td>
                                                <td><?= round($value, 2); ?></td>
                                            </tr>

                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="sos" role="tabpanel" aria-labelledby="sos-tab">
                            <h3>Bagian Keempat: Aspek Sosial Dosen</h3>

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-soal-sos">
                                    <thead>
                                        <tr>
                                            <td>Soal</td>
                                            <td>Rata-Rata Hasil</td>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $no = 23;
                                        foreach ($rowsos as $key => $value) {
                                            $no++;
                                            ?>

                                            <tr>
                                                <td>Soal <?= $no; ?></td>
                                                <td><?= round($value, 2); ?></td>
                                            </tr>

                                        <?php
                                    }
                                    ?>

                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="hasil" role="tabpanel" aria-labelledby="hasil-tab">
                            <h3>Hasil Total</h3>

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-hasil">
                                    <thead>
                                        <tr>
                                            <td>Kategori Soal</td>
                                            <td>Rata-Rata</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Kompetensi Pedagogik</td>
                                            <td><?= $val_ped2 ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kompetensi Professional</td>
                                            <td><?= $val_prof2 ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kompetensi Kepribadian</td>
                                            <td><?= $val_prib2 ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kompetensi Sosial</td>
                                            <td><?= $val_sos2 ?></td>
                                        </tr>

                                        <tr>
                                            <td>Total Score:</td>
                                            <td><?= $total_akhir ?> </td>
                                        </tr>
                                        <tr>
                                            <td>Peringkat Anda:</td>
                                            <td>
                                                <?php
                                                if ($total_akhir == "") {
                                                    echo "";
                                                } else if ($total_akhir >= 0.00 && $total_akhir <= 2.00) {
                                                    ?> Pembelajaran tidak memuaskan/TIDAK baik <?php
                                                } else if ($total_akhir >= 2.01 && $total_akhir <= 2.50) {
                                                    ?> Pembelajaran kurang memuaskan/KURANG baik <?php
                                                } else if ($total_akhir >= 2.51 && $total_akhir <= 3.50) {
                                                    ?> Pembelajaran cukup memuaskan/CUKUP baik <?php
                                                } else if ($total_akhir >= 3.51 && $total_akhir <= 4.50) {
                                                    ?> Pembelajaran memuaskan / BAIK <?php
                                                } else if ($total_akhir >= 4.51 && $total_akhir <= 5.00) {
                                                    ?> Pembelajaran sangat memuaskan/SANGAT baik <?php
                                                } 
                                                ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>



                        </div>

                    </div>


                </form>

            </div>
        </div>
    </div>
</div>