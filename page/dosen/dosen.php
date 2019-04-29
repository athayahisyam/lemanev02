<?php

session_start();
ob_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

if ($_SESSION['admin']) {

?>

<a href="?page=dosen&aksi=tambah" class="btn btn-primary" style="margin-bottom:15px;">Tambah Data Dosen</a>

<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                DATA DOSEN
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIDN</th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $sql = $conn->query("select * from tb_dosen");
                            while ($data = $sql->fetch_assoc()) {
                                ?>
                            <tr>
                                <td>
                                    <?= $no++; ?>
                                </td>
                                <td>
                                    <?= $data['nidn']; ?>
                                </td>
                                <td>
                                    <?= $data['nama']; ?>
                                </td>
                                <td>
                                    <?= $data['status']; ?>
                                </td>
                                <td>
                                    <a href="?page=dosen&aksi=ubah&nidn=<?= $data['nidn'] ?>" class="btn btn-info">Ubah</a>
                                    <a 
                                    onclick="return confirm ('Hapus data?')"
                                    href="?page=dosen&aksi=hapus&nidn=<?= $data['nidn'] ?>" class="btn btn-danger">Hapus</a>
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