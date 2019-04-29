<?php
session_start();
ob_start();


if ($_SESSION['admin']) {

?>

<a href="?page=mahasiswa&aksi=tambah" class="btn btn-primary" style="margin-bottom:15px;">Tambah Data Mahasiswa</a>
<a href="?page=mahasiswa&aksi=import" class="btn btn-success" style="margin-bottom:15px;">Unggah Data Mahasiswa</a>

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
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Tahun Masuk</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $sql = $conn->query("select * from tb_mahasiswa");
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
                                    <?= $data['nama']; ?>
                                </td>
                                <td>
                                    <?= $data['tahun_masuk']; ?>
                                </td>
                                <td>
                                    <?= $data['status']; ?>
                                </td>
                                <td>
                                    <a href="?page=mahasiswa&aksi=ubah&nim=<?= $data['nim'] ?>" class="btn btn-info">Ubah</a>
                                    <a 
                                    onclick="return confirm ('Hapus data?')"
                                    href="?page=mahasiswa&aksi=hapus&nim=<?= $data['nim'] ?>" class="btn btn-danger">Hapus</a>
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

// if(isset($_POST['import'])){
//     $file = $_FILES['file']['name'];
//     $ekstensi = explode(".", $file);
//     $file_name = "file-".round(microtime(true)).".".end($ekstensi);
//     $sumber = $_FILES['file']['tmp_name'];
//     $target_dir = "D:/XAMPP/htdocs/lemanev02/_file/";
//     $target_file = $target_dir.$file_name;
//     $upload = move_uploaded_file($sumber, $target_file);
    
//     //proses data xlsx
//     $obj = PHPExcel_IOFactory::load($target_file);
//     $all_data = $obj->getActiveSheet()->toArray(null, true, true, true);

//     //masukkan data kedalam db
//     $sql = "insert into tb_mahasiswa values";
//     for($i=2; $i <= count($all_data); $i++){
//         //letakkan semua data dalam row dan field xls dalam variabel
//         $nim = $all_data[$i]['A'];
//         $nama = $all_data[$i]['B'];
//         $tahun_masuk = $all_data[$i]['C'];
//         $status = $all_data[$i]['D'];
//         $sql .= "('$nim', '$nama', '$tahun_masuk', '$status'),";
//     }
//     $sql = substr($sql, 0, -1);
//     mysqli_query($conn, $sql) or die(mysqli_error($conn));

//     //putuskan file excel
//     unlink($target_file);
// }

} else {
    header("location:login.php");
}

?>
