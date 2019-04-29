<?php
session_start();
ob_start();
if ($_SESSION['admin']) {
    ?>

    <a href="?page=th_akd&aksi=tambah" class="btn btn-primary" style="margin-bottom:15px;">Tambah Tahun Akademik</a>

    <div class="row">
        <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Database Tahun Akademik
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tahun Akademik</th>
                                    <th>Ganjil/Genap</th>
                                    <th>Jumlah Matakuliah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $sql = $conn->query("select * from tb_th_akademik");
                                while ($data = $sql->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $no++; ?>
                                        </td>
                                        <td>
                                            <?= $data['th_akademik1']; ?>
                                        </td>
                                        <td>
                                            <?= $data['th_akademik2']; ?>
                                        </td>
                                        <td>
                                           NULL
                                        </td>
                                        <td>
                                            <a href="?page=th_akd&aksi=ubah&id_tahun=<?= $data['id_tahun'] ?>" class="btn btn-info">Ubah</a>
                                            <a onclick="return confirm ('Hapus data?')" href="?page=th_akd&aksi=hapus&id_tahun=<?= $data['id_tahun'] ?>" class="btn btn-danger">Hapus</a>
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