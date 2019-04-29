<?php

session_start();
ob_start();

require 'hitung.php';

$nidn = $_GET['nidn'];
$id_mk = $_GET['id_mk'];

if (!isset($_SESSION['dosen'])) {
    header("location: login.php");
}

//validasi nidn dengan id session?

$conn = new mysqli("localhost", "root", "", "lemanev02");
// $sql = $conn->query("SELECT id, name from tb_user where id = '$nidn'");
$sql = $conn->query("SELECT tb_dosen.nama as nama_dosen, tb_matakuliah.nama_mk as nama_mk 
                    FROM tb_dosen tb_dosen INNER JOIN tb_matakuliah on tb_dosen.nidn = tb_matakuliah.nidn 
                    where tb_dosen.nidn = '$nidn'and tb_matakuliah.id_mk = '$id_mk' ");
$id = mysqli_fetch_assoc($sql);

?>

<div class="panel panel-default">
    <div class="panel-heading">
        Blangko Hasil Keseluruhan
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST">

                    <ul class="nav nav-tabs nav-justified">
                        <li class="nav-item">
                            <a class="nav-link active" id="id-tab" data-toggle="tab" href="#id" role="tab" aria-controls="id" aria-selected="true">Identitas</a>
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
                            <a class="nav-link" id="submit-tab" data-toggle="tab" href="#submit" role="tab" aria-controls="submit" aria-selected="true">Kumpulkan</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active" id="id" role="tabpanel" aria-labelledby="id-tab">

                            <h3>Identitas</h3>
                            <div class="form-group">
                                <label>NIDN</label>
                                <input class="form-control" name="nidn" value="<?= $nidn ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama Dosen</label>
                                <input class="form-control" name="nama_dosen" value="<?= $id['nama_dosen'] ?>" readonly>
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
                                <label>Jumlah Peserta</label>
                                <input class="form-control" name="nama_mk" value="" readonly>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="ped" role="tabpanel" aria-labelledby="ped-tab">

                            <h3>Bagian Pertama: Aspek Pedagogik Dosen</h3>

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-soal-ped">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Soal</td>
                                            <td>Total Nilai</td>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $no = 1;
                                        foreach ($conn->query('select id_soal, soal from tb_soal where aspek ="pedagogik"') as $row) {
                                            ?>
                                        <tr>
                                            <td>
                                                <?= $no++; ?>
                                            </td>
                                            <td>
                                                <?= $row['soal']; ?>
                                            </td>
                                            <td>
                                                <!-- <input type="radio" name="jwb[<?= $row['id_soal']; ?>]" value="1">1
                                                <input type="radio" name="jwb[<?= $row['id_soal']; ?>]" value="2">2
                                                <input type="radio" name="jwb[<?= $row['id_soal']; ?>]" value="3">3
                                                <input type="radio" name="jwb[<?= $row['id_soal']; ?>]" value="4">4
                                                <input type="radio" name="jwb[<?= $row['id_soal']; ?>]" value="5">5 -->
                                            </td>
                                        </tr>
                                        <?php 
                                    } ?>

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
                                            <td>No</td>
                                            <td>Soal</td>
                                            <td>Jawaban</td>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $no = 1;
                                        foreach ($conn->query('select id_soal, soal from tb_soal where aspek ="profesionalisme"') as $row) {
                                            ?>
                                        <tr>
                                            <td>
                                                <?= $no++; ?>
                                            </td>
                                            <td>
                                                <?= $row['soal']; ?>
                                            </td>
                                            <td>
                                                <input type="radio" name="jwb[<?= $row['id_soal']; ?>]" value="1">1
                                                <input type="radio" name="jwb[<?= $row['id_soal']; ?>]" value="2">2
                                                <input type="radio" name="jwb[<?= $row['id_soal']; ?>]" value="3">3
                                                <input type="radio" name="jwb[<?= $row['id_soal']; ?>]" value="4">4
                                                <input type="radio" name="jwb[<?= $row['id_soal']; ?>]" value="5">5
                                            </td>
                                        </tr>
                                        <?php 
                                    } ?>

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
                                            <td>No</td>
                                            <td>Soal</td>
                                            <td>Jawaban</td>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $no = 1;
                                        foreach ($conn->query('select id_soal, soal from tb_soal where aspek ="kepribadian"') as $row) {
                                            ?>
                                        <tr>
                                            <td>
                                                <?= $no++; ?>
                                            </td>
                                            <td>
                                                <?= $row['soal']; ?>
                                            </td>
                                            <td>
                                                <input type="radio" name="jwb[<?= $row['id_soal']; ?>]" value="1">1
                                                <input type="radio" name="jwb[<?= $row['id_soal']; ?>]" value="2">2
                                                <input type="radio" name="jwb[<?= $row['id_soal']; ?>]" value="3">3
                                                <input type="radio" name="jwb[<?= $row['id_soal']; ?>]" value="4">4
                                                <input type="radio" name="jwb[<?= $row['id_soal']; ?>]" value="5">5
                                            </td>
                                        </tr>
                                        <?php 
                                    } ?>

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
                                            <td>No</td>
                                            <td>Soal</td>
                                            <td>Jawaban</td>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $no = 1;
                                        foreach ($conn->query('select id_soal, soal from tb_soal where aspek ="sosial"') as $row) {
                                            ?>
                                        <tr>
                                            <td>
                                                <?= $no++; ?>
                                            </td>
                                            <td>
                                                <?= $row['soal']; ?>
                                            </td>
                                            <td>
                                                <input type="radio" name="jwb[<?= $row['id_soal']; ?>]" value="1">1
                                                <input type="radio" name="jwb[<?= $row['id_soal']; ?>]" value="2">2
                                                <input type="radio" name="jwb[<?= $row['id_soal']; ?>]" value="3">3
                                                <input type="radio" name="jwb[<?= $row['id_soal']; ?>]" value="4">4
                                                <input type="radio" name="jwb[<?= $row['id_soal']; ?>]" value="5">5
                                            </td>
                                        </tr>
                                        <?php 
                                    } ?>

                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="submit" role="tabpanel" aria-labelledby="submit-tab">

                            <h3>Kritik yang Membangun Untuk Dosen</h3>
                            <textarea></textarea>

                            <p></p>

                            <h3>Saran sebagai Solusi</h3>
                            <textarea></textarea>


                            <div><input type="submit" name="simpan" value="Simpan" class="btn btn-primary"></div>
                        </div>

                    </div>


                </form>

            </div>
        </div>
    </div>
</div> 