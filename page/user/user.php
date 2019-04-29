<?php

session_start();
ob_start();
if ($_SESSION['admin']) {

?>

<a href="?page=user&aksi=tambah" class="btn btn-primary" style="margin-bottom:15px;">Tambah User</a>

<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                DATA USER
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Tahun Masuk</th>
                                <th>Level</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $sql = $conn->query("select * from tb_user");
                            while ($data = $sql->fetch_assoc()) {
                            ?>
                            <tr>
                                <td>
                                    <?=$no++;?>
                                </td>
                                <td>
                                    <?=$data['id'];?>
                                </td>
                                <td>
                                    <?=$data['name'];?>
                                </td>
                                <td>
                                    <?=$data['username'];?>
                                </td>
                                <td>
                                    <?=$data['tahun_masuk'];?>
                                </td>
                                <td>
                                    <?=$data['level'];?>
                                </td>
                                <td>
                                    <?=$data['status'];?>
                                </td>
                                <td>
                                    <a href="?page=user&aksi=ubah&id=<?=$data['id']?>" class="btn btn-info">Ubah</a>
                                    <a 
                                    onclick="return confirm ('Hapus data?')"
                                    href="?page=user&aksi=hapus&id=<?= $data['id'] ?>" class="btn btn-danger">Hapus</a>
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