<?php

session_start();
ob_start();

$nim = $_SESSION['mahasiswa'];

$conn = new mysqli("localhost", "root", "", "lemanev02");
$sql1 = $conn->query("SELECT * from tb_mahasiswa where nim = '$nim'");
$sql = $conn->query("SELECT tb_transaksi_krs.nim,
                    tb_dosen.nidn, 
                    tb_dosen.nama as nama_dosen, 
                    tb_transaksi_krs.id_mk, 
                    tb_matakuliah.nama_mk 
                    
                    FROM tb_transaksi_krs 
                    INNER JOIN tb_mahasiswa ON tb_transaksi_krs.nim = tb_mahasiswa.nim 
                    INNER JOIN tb_matakuliah ON tb_transaksi_krs.id_mk = tb_matakuliah.id_mk 
                    INNER JOIN tb_dosen ON tb_dosen.nidn = tb_matakuliah.nidn 
                    
                    WHERE tb_transaksi_krs.nim = '$nim'");

$sql2 = $conn->query("SELECT nim, id_mk from tb_transaksi_jwb where NIM = '$nim'");
$cek = mysqli_fetch_array($sql2);

$tampil = mysqli_fetch_assoc($sql1);

/**
 * TB_MAHASISWA {id, nim, nama, th_masuk, status}
 */

?>

<marquee>Anda masuk sebagai: <?= $tampil['nama']; ?> </marquee>

</br>
</br>

<div class="row">
    <div class="col-md-12">
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Data Mahasiswa
                </div>
                <!-- Bio mahasiswa -->
                <div class="panel-body">
                    <form>
                        <div class="form-group">
                            <label>NIM</label>
                            <input class="form-control" name="nim" value="<?= $tampil['nim'] ?>" readonly />
                        </div>
            
                        <div class="form-group">
                            <label>Nama</label>
                            <input class="form-control" name="nama" value="<?= $tampil['nama'] ?>" readonly>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
        <div class="panel-group">
            <div class="panel panel-default">

                <div class="panel-heading">
                    Daftar Isian EKD dari KRS <?= $tampil['nama']?>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataKRS">
                        <thead>
                            <tr>
                                <th>No</th>
                                <!-- <th>NIM</th>
                                <th>Nama Mahasiswa</th> -->
                                <th>NIDN</th>
                                <th>Dosen Pengampu</th>
                                <th>ID Matakuliah</th>
                                <th>Nama Matakuliah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($data = $sql->fetch_assoc()){
                                ?>
                                <tr>
                                <td>
                                    <?= $no++; ?>
                                </td>
                                <td>
                                    <?= $data['nidn']; ?>
                                </td>
                                <td>
                                    <?= $data['nama_dosen']; ?>
                                </td>
                                <td>
                                    <?= $data['id_mk']; ?>
                                </td>
                                <td>
                                    <?= $data['nama_mk']; ?>
                                </td>                                
                                <td>
                                    <a href="?page=kuesioner&aksi=kuesioner&nim=<?= $data['nim'] ?>&id_mk=<?= $data['id_mk']; ?>" class="btn btn-info">Isi Kuesioner</a>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
