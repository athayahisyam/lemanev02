<?php
session_start();
ob_start();
if ($_SESSION['admin']) {
?>

<a href="?page=matakuliah&aksi=tambah" class="btn btn-primary" style="margin-bottom:15px;">Tambah Matakuliah</a>

<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                DATA MATAKULIAH
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tahun Akademik</th>
                                <th>ID Matakuliah</th>
                                <th>Nama Matakuliah</th>
                                <th>Pengajar</th>
                                <th>NIDN</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $sql = $conn->query("select tb_th_akademik.th_akademik1, 
                            tb_th_akademik.th_akademik2, 
                            tb_matakuliah.id_mk, 
                            tb_matakuliah.nama_mk, 
                            tb_matakuliah.nidn, 
                            tb_dosen.nama 
                            
                            from tb_matakuliah, 
                            tb_dosen,
                            tb_th_akademik 
                            
                            where tb_dosen.nidn = tb_matakuliah.nidn 
                            and tb_th_akademik.id_tahun = tb_matakuliah.id_tahun");
                            while ($data = $sql->fetch_assoc()) {
                                ?>
                            <tr>
                                <td>
                                    <?= $no++; ?>
                                </td>
                                <td>
                                    <?= $data['th_akademik1'] ?> - <?= $data['th_akademik2'] ?>
                                </td>
                                <td>
                                    <?= $data['id_mk']; ?>
                                </td>
                                <td>
                                    <?= $data['nama_mk']; ?>
                                </td>
                                <td>
                                    <?= $data['nama']; ?>
                                </td>
                                <td>
                                    <?= $data['nidn']; ?>
                                </td>
                                <td>
                                    <a href="?page=matakuliah&aksi=ubah&id_mk=<?= $data['id_mk'] ?>" class="btn btn-info">Ubah</a>
                                    <a 
                                    onclick="return confirm ('Hapus data?')"
                                    href="?page=matakuliah&aksi=hapus&id_mk=<?= $data['id_mk'] ?>" class="btn btn-danger">Hapus</a>
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