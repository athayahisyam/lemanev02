<?php


session_start();
ob_start();
if(!isset($_SESSION['admin'])){
    header("location: login.php");
}

?>
<div class="row">
    <div class="col-lg-12">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="file">Unggah Dokumen .xslx</label>
                <input type="file" name="file" id="file" class="form-control">
            </div>
            <div class="form-group pull-right">
                <input type="submit" name="import" value="import" class="btn btn-success">
            </div>
        </form>    
    </div>
</div>

<?php


if (isset($_POST['import'])) {
    $file = $_FILES['file']['name'];
    $ekstensi = explode(".", $file);
    $file_name = "file-" . round(microtime(true)) . "." . end($ekstensi);
    $sumber = $_FILES['file']['tmp_name'];
    $target_dir = "D:/XAMPP/htdocs/lemanev02/_file/";
    $target_file = $target_dir . $file_name;
    $upload = move_uploaded_file($sumber, $target_file);
    
    //proses data xlsx
    $obj = PHPExcel_IOFactory::load($target_file);
    $all_data = $obj->getActiveSheet()->toArray(null, true, true, true);

    //masukkan data kedalam db
    $sql = "insert into tb_mahasiswa values";
    for ($i = 2; $i <= count($all_data); $i++) {
        //letakkan semua data dalam row dan field xls dalam variabel
        $nim = $all_data[$i]['A'];
        $nama = $all_data[$i]['B'];
        $tahun_masuk = $all_data[$i]['C'];
        $status = $all_data[$i]['D'];
        $sql .= "('$nim', '$nama', '$tahun_masuk', '$status'),";
    }
    $sql = substr($sql, 0, -1);
    mysqli_query($conn, $sql) or die(mysqli_error($conn));

    //putuskan file excel
    unlink($target_file);
    ?>
    <script type = "text/javascript">
        alert("Data berhasil disimpan!");
    window . location . href = "?page=mahasiswa";
    </script>
    <?php


}

?>





