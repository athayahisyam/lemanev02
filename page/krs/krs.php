<?php
session_start();
ob_start();
if ($_SESSION['admin']) {

?>

<a href="?page=krs&aksi=tambah" class="btn btn-primary" style="margin-bottom:15px;">Tambah Data KRS</a>

<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                DATA KRS Mahasiswa
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama Mahasiswa</th>
                                <th>ID Matakuliah</th>
                                <th>Nama Matakuliah</th>
                                <th>Dosen Pengampu</th>
                                <th>NIDN</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $sql = $conn->query(
                                "select
                                tb_transaksi_krs.id_trans, 
                                tb_transaksi_krs.id_mk, 
                                tb_matakuliah.nama_mk, 
                                tb_matakuliah.nidn, 
                                tb_dosen.nama as nama_dosen, 
                                tb_transaksi_krs.nim, 
                                tb_mahasiswa.nama as nama_mahasiswa
                                
                                from 
                                tb_matakuliah, 
                                tb_dosen, 
                                tb_mahasiswa, 
                                tb_transaksi_krs 
                                
                                where 
                                tb_dosen.nidn = tb_matakuliah.nidn and 
                                tb_mahasiswa.nim = tb_transaksi_krs.nim and 
                                tb_matakuliah.id_mk = tb_transaksi_krs.id_mk"
                            );
                            while ($data = $sql->fetch_assoc()) {
                                ?>
                            <tr>
                                <td>
                                    <?= $no++; ?>
                                </td>
                                <td>
                                    <?= $data['nim']; ?>
                                </td>
                                <td>
                                    <?= $data['nama_mahasiswa']; ?>
                                </td>
                                <td>
                                    <?= $data['id_mk']; ?>
                                </td>
                                <td>
                                    <?= $data['nama_mk']; ?>
                                </td>
                                <td>
                                    <?= $data['nama_dosen']; ?>
                                </td>
                                <td>
                                    <?= $data['nidn']; ?>
                                </td>
                                <td>
                                    <a 
                                    onclick="return confirm ('Hapus data?')"
                                    href="?page=krs&aksi=hapus&id_trans=<?= $data['id_trans'] ?>" class="btn btn-danger">Hapus</a>
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