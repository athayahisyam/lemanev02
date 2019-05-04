<?php

session_start();
ob_start();

if (!isset($_SESSION['mahasiswa'])) {
    header("location:login.php");
}

$nim = $_GET['nim'];
$id_mk = $_GET['id_mk'];

$data1 = $conn->query("select tb_mahasiswa.nama as nama_mhs, tb_dosen.nama as nama_dsn, tb_matakuliah.nama_mk from tb_mahasiswa, tb_dosen, tb_matakuliah
                       where tb_mahasiswa.nim = '$nim' and tb_matakuliah.id_mk = '$id_mk' and tb_dosen.nidn = tb_matakuliah.nidn");
$tampil1 = $data1->fetch_assoc();


//validasi pengisian

// $cek = $conn->query("SELECT NIM, ID_MK from tb_transaksi_jwb where nim = '$nim' and id_mk = '$id_mk'");
// $cek2 = 

?>


<div class="panel panel-default">
    <div class="panel-heading">
        Petunjuk Pengisian
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <p class="text-justify">Sesuai dengan yang Saudara/i ketahui, berilah penilaian secara jujur, objektif, dan penuh tanggung jawab terhadap Bapak/Ibu
                    dosen Saudara/i. Informasi yang Saudara/i berikan hanya akan dipergunakan dalam proses penilaian Kinerja Dosen dan TIDAK AKAN BERPERNGARUH
                    terhadap status Saudara/i sebagai mahasiswa/i. Penilaian dilakukan terhadap aspek-aspek dalam tabel berikut dengan cara memilih nilai pada angka
                    yang tercantum (1-5) dengan rentangan:
                </p>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nilai</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Rentangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Sangat tidak baik/sangat rendah/tidak pernah</td>
                            <td>0 - 9</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Tidak baik/rendah/jarang</td>
                            <td>10 - 18</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Biasa/cukup/kadang kadang</td>
                            <td>19 - 27</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Baik/tinggi/sering</td>
                            <td>28 - 36</td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>Sangat baik/sangat tinggi/selalu</td>
                            <td>37 - 45</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="panel panel-default">
    <div class="panel-heading">
        Kuesioner Evaluasi Kinerja Dosen
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
                            <a class="nav-link" id="submit-tab" data-toggle="tab" href="#submit" role="tab" aria-controls="submit" aria-selected="true">Kumpulkan</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane active" id="id" role="tabpanel" aria-labelledby="id-tab">

                            <h3>Identitas</h3>
                            <div class="form-group">
                                <label>NIM</label>
                                <input class="form-control" name="nim" value="<?= $nim ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label>Nama Mahasiswa</label>
                                <input class="form-control" name="nama_mhs" value="<?= $tampil1['nama_mhs'] ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label>Kode Matakuliah</label>
                                <input class="form-control" name="id_mk" value="<?= $id_mk ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label>Nama Matakuliah</label>
                                <input class="form-control" name="nama_mk" value="<?= $tampil1['nama_mk'] ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label>Nama Pengampu</label>
                                <input class="form-control" name="nama_mk" value="<?= $tampil1['nama_dsn'] ?>" readonly>
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
                                            <td>Jawaban</td>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $no = 1;
                                        foreach ($conn->query('select id_soal, soal from tb_soal where aspek ="pedagogik"') as $row) {
                                            ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $row['soal']; ?></td>
                                                <td>
                                                    <input type="radio" name="jwb[<?= $row['id_soal']; ?>]" value="1" required>1
                                                    <input type="radio" name="jwb[<?= $row['id_soal']; ?>]" value="2" required>2
                                                    <input type="radio" name="jwb[<?= $row['id_soal']; ?>]" value="3" required>3
                                                    <input type="radio" name="jwb[<?= $row['id_soal']; ?>]" value="4" required>4
                                                    <input type="radio" name="jwb[<?= $row['id_soal']; ?>]" value="5" required>5
                                                </td>
                                            </tr>
                                        <?php } ?>

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
                                                <td><?= $no++; ?></td>
                                                <td><?= $row['soal']; ?></td>
                                                <td>
                                                    <input type="radio" name="jwb[<?= $row['id_soal']; ?>]" value="1" required>1
                                                    <input type="radio" name="jwb[<?= $row['id_soal']; ?>]" value="2" required>2
                                                    <input type="radio" name="jwb[<?= $row['id_soal']; ?>]" value="3" required>3
                                                    <input type="radio" name="jwb[<?= $row['id_soal']; ?>]" value="4" required>4
                                                    <input type="radio" name="jwb[<?= $row['id_soal']; ?>]" value="5" required>5
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
                                                <td><?= $no++; ?></td>
                                                <td><?= $row['soal']; ?></td>
                                                <td>
                                                    <input type="radio" name="jwb[<?= $row['id_soal']; ?>]" value="1" required>1
                                                    <input type="radio" name="jwb[<?= $row['id_soal']; ?>]" value="2" required>2
                                                    <input type="radio" name="jwb[<?= $row['id_soal']; ?>]" value="3" required>3
                                                    <input type="radio" name="jwb[<?= $row['id_soal']; ?>]" value="4" required>4
                                                    <input type="radio" name="jwb[<?= $row['id_soal']; ?>]" value="5" required>5
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
                                                <td><?= $no++; ?></td>
                                                <td><?= $row['soal']; ?></td>
                                                <td>
                                                    <input type="radio" name="jwb[<?= $row['id_soal']; ?>]" value="1" required>1
                                                    <input type="radio" name="jwb[<?= $row['id_soal']; ?>]" value="2" required>2
                                                    <input type="radio" name="jwb[<?= $row['id_soal']; ?>]" value="3" required>3
                                                    <input type="radio" name="jwb[<?= $row['id_soal']; ?>]" value="4" required>4
                                                    <input type="radio" name="jwb[<?= $row['id_soal']; ?>]" value="5" required>5
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
                            <textarea class="form-control" rows="5" id="kritik" name="kritik"></textarea>

                            <p></p>

                            <h3>Saran sebagai Solusi</h3>
                            <textarea class="form-control" rows="5" id="saran" name="saran"></textarea>

                            <br />

                            <div><input type="submit" name="simpan" value="Simpan" class="btn btn-primary"></div>
                        </div>

                    </div>


                </form>

            </div>
        </div>
    </div>
</div>

<!-- Penyimpanan Data -->

<?php

$nim = $_POST['nim'];
$id_mk = $_POST['id_mk'];
$jwb = $_POST['jwb'];
$kritik = $_POST['kritik'];
$saran = $_POST['saran'];

$pre_kritik = "<pre>$kritik</pre>";
$pre_saran = "<pre>$saran</pre>";

$validasi = $conn->query("SELECT * from tb_transaksi_jwb where nim = '$nim' and id_mk = '$id_mk'");

$a = array_values($jwb);
foreach ($a as $key => $value) {
    $b = (float)$value;
    $c[] = $b;
}
$nilai = implode("', '", $c);

// print_r("INSERT INTO tb_transaksi_jwb (nim, id_mk, jwb1, jwb2, jwb3) VALUES ('$nim', '$id_mk', '$nilai')");
// end;

$simpan = $_POST['simpan'];

//sintaks untuk memasukkan ke database
//cek sudah ada submit sebelumnya

if ($simpan) {
    if (mysqli_num_rows($validasi) > 0) {
        ?>
        <script type="text/javascript">
            alert("Data sudah ada!");
        </script>
    <?php
} else {
    // print_r($pre_kritik);
    // echo "<br/>";
    // print_r($pre_saran);
    // exit();

    $sql = $conn->query(
        "INSERT INTO tb_transaksi_jwb (nim, id_mk, jwb1, jwb2, jwb3, jwb4, jwb5, jwb6, jwb7, jwb8, jwb9, jwb10, jwb11, 
            jwb12, jwb13, jwb14, jwb15, jwb16, jwb17, jwb18, jwb19, jwb20, jwb21, jwb22, jwb23, jwb24, jwb25, jwb26, jwb27, jwb28) 
            VALUES ('$nim', '$id_mk', '$nilai')
            "
    );

    $sql2 = $conn->query(
        "INSERT INTO tb_krisar(nim, id_mk, kritik, saran) values('$nim', '$id_mk', '$pre_kritik', '$pre_saran')"
    );
    if ($sql) {
        if ($sql2) {
            ?>

                <script type="text/javascript">
                    alert("Data berhasil disimpan!");
                    window.location.href = "?page=krs";
                </script>

            <?php
        }
    }
}
}
?>