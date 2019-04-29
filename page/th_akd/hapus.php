<?php
session_start();
ob_start();
if ($_SESSION['admin']) {

    $id = $_GET['id_tahun'];

    $conn->query("delete from tb_th_akademik where id_tahun='$id'");

    ?>

    <script>
        window.location.href = "?page=th_akd"
    </script>

<?php

} else {
    header("location:login.php");
}

?>