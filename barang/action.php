<?php
include_once("../_header.php");

$update = false;
$id = "";
$nama = "";
$keterangan = "";
$stock = "";
$photo = "";
if (isset($_POST['add'])) {
    $image_dir = '/gambar';
    $nama = $_POST['nama'];
    $keterangan = $_POST['keterangan'];
    $stock = $_POST['stock'];
    $name = $_FILES['image']['name'];
    $photo = $_FILES['image']['tmp_name'];
    $upload = "gambar/" . $name;

    // var_dump($upload);
    $query = "INSERT INTO barang (nama,keterangan,stock,photo)VALUES(?,?,?,?)";
    $stmt = $con->prepare($query);
    $stmt->bind_param("ssss", $nama, $keterangan, $stock, $upload);
    $stmt->execute();
    move_uploaded_file($photo, __DIR__ . '/../gambar/' . $name);

    header('location:data.php');
    $_SESSION['response'] = "sukses menambahkan";
    $_SESSION['res_type'] = "success";
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "SELECT photo FROM barang WHERE id=?";
    $stmt2 = $con->prepare($sql);
    $stmt2->bind_param("i", $id);
    $stmt2->execute();
    $result2 = $stmt2->get_result();
    $row = $result2->fetch_assoc();
    $imagepath = $row['photo'];
    unlink($imagepath);
    $query = "DELETE FROM barang WHERE id=?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header('location:data.php');
    $_SESSION['response'] = "sukses hapus";
    $_SESSION['res_type'] = "danger";
}
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $query = "SELECT * FROM barang WHERE id=?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $id = $row['id'];
    $nama = $row['nama'];
    $keterangan = $row['keterangan'];
    $stock = $row['stock'];
    $photo = $row['photo'];

    $update = true;
}
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $keterangan = $_POST['keterangan'];
    $stock = $_POST['stock'];
    $oldimage = $_POST['oldimage'];

    if (isset($_FILES['image']['name']) && ($_FILES['image']['name'] != "")) {
        $newimage = "gambar/" . $_FILES['image']['name'];
        unlink($oldimage);
        move_uploaded_file($_FILES['image']['tmp_name'], $newimage);
    } else {
        $newimage = $oldimage;
    }
    $query = "UPDATE barang SET nama=?,keterangan=?,stock=?,photo=? WHERE id=?;";
    $stmt = $con->prepare($query);
    $stmt->bind_param("ssssi", $nama, $keterangan, $stock, $newimage, $id);
    $stmt->execute();
    $_SESSION['response'] = "update berhasil";
    $_SESSION['res_type'] = "primary";
    header('location:data.php');
}
