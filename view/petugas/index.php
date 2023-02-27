<?php
include '../../pengaduancontroller.php';
session_start();
if (!$_SESSION['auth']) {
    header('Location: login.php');
}
$index = $pengaduan->index();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Petugas</title>
</head>
<body>
    <?php if ($_SESSION['notif']){
        echo $_SESSION['notif'];
    }?>   
    <?= "Selamat Datang, " . $_SESSION['auth'] ?>
    <form action="../../petugascontroller.php" method="post">
        <input type="submit" name="logout" value="keluar">
    </form>
    <?php if ($index != null) : ?>
        <?php $no = 1; foreach ($index as $data) : ?>
        <div>
            <li><?= $no++; ?>. Tanggal : <?= $data->tgl_pengaduan ?></li>            
            <li>NIK : <?= $data->nik ?></li>            
            <li>Laporan : <?= $data->isi_laporan ?></li>        
            <li>
            <a href="../tanggapan/create.php?id=<?php echo $data->id_pengaduan; ?>">Tanggapan</a>
            </li>
            <li>
            <a href="../tanggapan/index.php?id=<?php echo $data->id_pengaduan; ?>">Detail</a>
            </li>
            <br>          
        </div>
        <?php endforeach; ?>
    <?php else : ?>
        <h3>List Pengaduan Masih Kosong</h3>
    <?php endif; ?>
</body>
</html>