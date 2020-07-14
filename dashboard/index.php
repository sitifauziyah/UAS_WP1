<?php
include_once("../_header.php");
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $result = mysqli_query($con, "SELECT * FROM barang where nama like '%" . $search . "%'");
} else {
    $result = mysqli_query($con, "SELECT * FROM barang");
}

// if (!$result) {
//     echo mysqli_error($con);
// 
?>
<div class="row">
    <div class="col-lg-12">
        <h1>Dashboard</h1>
        <h3>Selamat datang <?= $_SESSION['user']; ?> di panel Dashboard </h3>
        <div style="padding-bottom: 10px;">
            <a href="#menu-toggle" class="btn btn-primary" id="menu-toggle">Hide</a>
            <a href="./print_dashboard.php" target="_blank" class="btn btn-primary" id="menu-toggle">Print</a>
            <div class="float-right">
                <form action="index.php" method="get">
                    <input type="text" name="search">
                    <button class="btn btn-success btn-sm">Cari</button>
                </form>
            </div>
        </div>
    </div>
</div>

<table class="table">
    <thead class="table-striped table-dark">
        <tr class="text-center">
            <th>ID</th>
            <th>IMAGE</th>
            <th>Nama Barang</th>
            <th>Keterangan</th>
            <th>Stock</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr class="table-info text-center">
                <td>
                    <?= $row["id"]; ?>
                </td>
                <td>
                    <img src="<?php echo base_url() . "/uas/" . $row['photo'] ?>" width="30 ">
                </td>
                <td>
                    <?= $row["nama"]; ?>
                </td>
                <td>
                    <?= $row["keterangan"]; ?>
                </td>
                <td>
                    <?= $row["stock"]; ?>
                </td>

            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<?php
include_once("../_footer.php"); ?>