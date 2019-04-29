<?php
session_start ();
ob_start();
if ($_SESSION['admin']) {

$id_trans = $_GET['id_trans'];

$conn->query("delete from tb_transaksi_krs where id_trans='$id_trans'");

?>

<script>
window.location.href="?page=krs"
</script>

<?php

} else {
    header("location:login.php");
}

?>