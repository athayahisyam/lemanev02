<?php
session_start ();
ob_start();
if ($_SESSION['admin']) {
    
$id_mk = $_GET['id_mk'];

$conn->query("delete from tb_matakuliah where id_mk='$id_mk'");

?>

<script>
window.location.href="?page=matakuliah"
</script>

<?php

} else {
    header("location:login.php");
}

?>
