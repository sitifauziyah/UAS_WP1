<?php
require_once "_config/config.php";
require "_assets/libs/vendor/autoload.php";
if (!isset($_SESSION['user'])) {
    echo "<script>window.location='" . base_url('auth/login.php') . "';</script>";
} ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Aplikasi Miniso</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url('_assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('_assets/css/simple-sidebar.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="icon" href="<?= base_url('_assets/sales.png') ?>">
</head>
<script src="<?= base_url('_assets/js/jquery.js') ?>"></script>
<script src="<?= base_url('_assets/js/bootstrap.min.js') ?>"></script>
<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="#">
                    Aplikasi Miniso
                </a>
            </li>
            <li>
                <a href="<?= base_url('dashboard') ?>">Dashboard</a>
            </li>
            <li>
                <a href="<?= base_url('barang/data.php') ?>">Barang</a>
            </li>
            <li>
                <a href="<?= base_url('miniso/data.php') ?>">Miniso</a>
            </li>
            <li>
                <a href="#">COMMING SOON</a>
            </li>
            <li>
                <a href="#">COMMING SOON</a>
            </li>
            <li>
                <a href="#">COMMING SOON</a>
            </li>
            <li>
                <a href="<?= base_url('auth/logout.php') ?>">Logout</a>
            </li>
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">