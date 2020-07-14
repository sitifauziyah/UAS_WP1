<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;


if(isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $ket = trim(mysqli_real_escape_string($con, $_POST['ket']));
    mysqli_query($con, "INSERT INTO tb_barang (id_barang, nama_barang, ket_barang) VALUES ('$uuid', '$nama', '$ket')") or die(mysqli_error($con));
    echo "<script>window.location='data.php';</script>";

} else if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $ket = trim(mysqli_real_escape_string($con, $_POST['ket']));
    mysqli_query($con, "UPDATE tb_barang SET nama_barang = '$nama', ket_barang = '$ket' WHERE id_barang = '$id' ") or die(mysqli_error($con));
    echo "<script>window.location='data.php';</script>";

}
?>

