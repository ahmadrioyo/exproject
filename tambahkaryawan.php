<?php
require("koneksi.php");
session_start();

if (!isset($_SESSION['id_admin'])) {
    header('Location: login.php');
}
$query = mysqli_query($koneksi, "SELECT max(id_pesanan) as kodeTerbesar FROM pesanan");
$data = mysqli_fetch_array($query);
$kodeBarang = $data['kodeTerbesar'];
$urutan = (int) substr($kodeBarang, 8, 8);
$urutan++;
$huruf = "KAR   ";
$kodeBarang = $huruf . sprintf("%08s", $urutan);
if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $userName = $_POST['nama'];
    $amt = $_POST['alamat'];
    $userNo = $_POST['no_hp'];

    $query = "INSERT INTO `karyawan` VALUES ('$id', '$userName', $amt ,'$userNo')";
    $result = mysqli_query($koneksi, $query);
    header('Location: dash-karyawan.php');
}
$sesID = $_SESSION['id_admin'];
$sesName = $_SESSION['fullname'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD. RAR Crackers - Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Mulish&display=swap" rel="stylesheet">
</head>

<body class="dashboard">
    <nav class="nav">
        <div class="logo-name">
            <div class="logo-image">
                <img src="icon/batik mega mendung3.png" alt="">
            </div>
            <span class="logo_name">UD. RAR Crackers</span>
        </div>
        <div class="menu-items">
            <ul class="nav-link">
                <li><a href="dashboard.php">
                        <i class="uil uil-estate"></i>
                        <span class="link-name">Beranda</span>
                    </a></li>
                <li><a href="dash-pesanan.php">
                    <i class="uil uil-shopping-bag"></i>
                        <span class="link-name">Pesanan</span>
                    </a></li>
                <li><a href="dash-stok.php">
                        <i class="uil uil-box"></i>
                        <span class="link-name">Stok Produk</span>
                    </a></li>
                <li><a href="dash-karyawan.php">
                        <i class="uil uil-constructor"></i>
                        <span class="link-name">Karyawan</span>
                    </a></li>
                <li><a href="dash-laporan.php">
                        <i class="uil uil-file-bookmark-alt"></i>
                        <span class="link-name">Laporan</span>
                    </a></li>
            </ul>
            <ul class="logout-mode">
                <li><a href="logout.php">
                        <i class="uil uil-signout"></i>
                        <span class="link-name"> Log out</span>
                    </a></li>
                <li class="mode"><a href="">
                        <i class="uil uil-moon"></i>
                        <span class="link-name">Dark Mode</span>
                    </a>
                    <div class="mode-toggle">
                        <span class="switch"></span>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <section class="dashboard-body">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Cari...">
            </div>
            <div>
                <h3>Selamat Datang</h3>
                <p><?php echo $sesName; ?></p>
            </div>
            <img src="icon/user.svg" alt="">
        </div>
        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-constructor"></i>
                    <span class="text">Karyawan / Tambah Karyawan</span>
                </div>
                <div class="boxes">
                    <div class="box box1">
                        <?php
                        $query = "SELECT * FROM karyawan WHERE id_karyawan='KAR00000001'";
                        $result = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($result)) {
                            $id_karyawan = $row['id_karyawan'];
                            $nama = $row['nama_karyawan'];
                            $alamat = $row['alamat_karyawan'];
                            $no_hp = $row['no_hp_karyawan'];
                        ?>
                            <i class="uil uil-constructor"></i>
                            <span class="text">
                                <a href="" style="text-decoration: none; color:black;"><h3><?php echo $nama; ?></h3></a>
                            </span>
                        <?php
                        } ?>
                    </div>
                    <div class="box box1">
                        <?php
                        $query = "SELECT * FROM karyawan WHERE id_karyawan='KAR00000002'";
                        $result = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($result)) {
                            $id_karyawan = $row['id_karyawan'];
                            $nama = $row['nama_karyawan'];
                            $alamat = $row['alamat_karyawan'];
                            $no_hp = $row['no_hp_karyawan'];
                        ?>
                            <i class="uil uil-constructor"></i>
                            <span class="text">
                                <a href="" style="text-decoration: none; color:black;"><h3><?php echo $nama; ?></h3></a>
                            </span>
                        <?php
                        } ?>
                    </div>
                    <div class="box box1">
                        <?php
                        $query = "SELECT * FROM karyawan WHERE id_karyawan='KAR00000003'";
                        $result = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($result)) {
                            $id_karyawan = $row['id_karyawan'];
                            $nama = $row['nama_karyawan'];
                            $alamat = $row['alamat_karyawan'];
                            $no_hp = $row['no_hp_karyawan'];
                        ?>
                            <i class="uil uil-constructor"></i>
                            <span class="text">
                                <a href="" style="text-decoration: none; color:black;"><h3><?php echo $nama; ?></h3></a>
                            </span>
                        <?php
                        } ?>
                    </div>
                </div>
                <table class="content-table">
                    <thead>
                    <tr>
                        <td><p>No. </p></td>
                        <td><p>ID Karyawan</p></td>
                        <td><p>Nama Karyawan</p></td>
                        <td><p>Alamat Karyawan</p></td>
                        <td><p>Nomer Handphone Karyawan</p></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $query = "SELECT * FROM karyawan";
                        $result = mysqli_query($koneksi, $query);
                        $no = 1;
                        while($row = mysqli_fetch_array($result)){
                            $id_karyawan = $row['id_karyawan']; 
                            $nama = $row['nama_karyawan']; 
                            $alamat = $row['alamat_karyawan']; 
                            $no_hp = $row['no_hp_karyawan']; 
                    ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $id_karyawan; ?></td>
                        <td><?php echo $nama; ?></td>
                        <td><?php echo $alamat; ?></td>
                        <td><?php echo $no_hp; ?></td>
                    </tr>
                    <?php
                    $no++;
                    }
                    ?>
                    </tbody>
                </table>
                <form action="">
                    <input type="hidden" value="<?php echo $kodeBarang ?>" name="id" id="">
                    <h3>Nama Karyawan <input type="text" name="nama" required></h3>
                    <h3>Alamat Karyawan <input type="text" name="alamat" required></h3>
                    <h3>Nomor Handphone Karyawan <input type="text" name="no_hp" required></h3>
                    <button class="btn btn-animasi btn-color" type="submit" name="submit">Tambah Karyawan  <i class="uil uil-user-plus"></i></button>
                </form>
            </div>
        </div>
    </section>
    <script src="script.js"></script>
</body>

</html>