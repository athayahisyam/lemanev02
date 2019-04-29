<?php
session_start();
ob_start();
if ($_SESSION['admin']) {


$id = $_GET['nim'];

$conn->query("delete from tb_mahasiswa where nim='$id'");

?>

<script>
window.location.href="?page=mahasiswa"
</script>

<?php

} else {
    header("location:login.php");
}

?>
