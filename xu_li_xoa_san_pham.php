<?php
$id = $_GET['ma_san_pham'];
$sql = "Delete FROM `san_pham` where ma_san_pham = '$id'";
mysqli_query($conn, $sql);
header('location: dashboard.php?page=thong_tin_san_pham');