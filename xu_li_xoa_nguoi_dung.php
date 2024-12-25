<?php
$id = $_GET['ma_nguoi_dung'];
$sql = "DELETE FROM `user` WHERE ma_nguoi_dung = $id";
mysqli_query($conn, $sql);
header('Location: dashboard.php?page=thong_tin_nguoi_dung');