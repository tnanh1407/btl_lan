<?php
if (
    !empty($_POST['ten_san_pham']) &&
    !empty($_POST['kich_co']) &&
    !empty($_POST['loai_san_pham']) &&
    !empty($_POST['tinh_trang']) &&
    !empty($_POST['gia'])
) {
    $id = $_GET['ma_san_pham'];
    $ten_san_pham = $_POST['ten_san_pham'];
    $kich_co = $_POST['kich_co'];
    $loai_san_pham = $_POST['loai_san_pham'];
    $tinh_trang = $_POST['tinh_trang'];
    $gia = $_POST['gia'];

    $target_dir = "uploads/";

    // Xử lý upload ảnh chính
    $target_file_anh_chinh = $target_dir . basename($_FILES["anh_chinh"]["name"]);
    $imageFileType_anh_chinh = strtolower(pathinfo($target_file_anh_chinh, PATHINFO_EXTENSION));
    $uploadOk_anh_chinh = 1;

    // Xử lý upload ảnh phụ
    $target_file_anh_phu = $target_dir . basename($_FILES["anh_phu"]["name"]);
    $imageFileType_anh_phu = strtolower(pathinfo($target_file_anh_phu, PATHINFO_EXTENSION));
    $uploadOk_anh_phu = 1;

    // Kiểm tra ảnh chính
    if (getimagesize($_FILES["anh_chinh"]["tmp_name"]) === false) {
        echo "File ảnh chính không hợp lệ.";
        $uploadOk_anh_chinh = 0;
    }
    if ($_FILES["anh_chinh"]["size"] > 500000) {
        echo "File ảnh chính quá lớn.";
        $uploadOk_anh_chinh = 0;
    }
    if (!in_array($imageFileType_anh_chinh, ["jpg", "jpeg", "png", "gif"])) {
        echo "Ảnh chính chỉ được định dạng JPG, JPEG, PNG hoặc GIF.";
        $uploadOk_anh_chinh = 0;
    }

    // Kiểm tra ảnh phụ
    if (getimagesize($_FILES["anh_phu"]["tmp_name"]) === false) {
        echo "File ảnh phụ không hợp lệ.";
        $uploadOk_anh_phu = 0;
    }
    if ($_FILES["anh_phu"]["size"] > 500000) {
        echo "File ảnh phụ quá lớn.";
        $uploadOk_anh_phu = 0;
    }
    if (!in_array($imageFileType_anh_phu, ["jpg", "jpeg", "png", "gif"])) {
        echo "Ảnh phụ chỉ được định dạng JPG, JPEG, PNG hoặc GIF.";
        $uploadOk_anh_phu = 0;
    }

    // Kiểm tra và di chuyển file
    if ($uploadOk_anh_chinh && move_uploaded_file($_FILES["anh_chinh"]["tmp_name"], $target_file_anh_chinh)) {
        $path_anh_chinh = $target_file_anh_chinh;
    } else {
        echo "Lỗi khi tải lên ảnh chính.";
        exit;
    }

    if ($uploadOk_anh_phu && move_uploaded_file($_FILES["anh_phu"]["tmp_name"], $target_file_anh_phu)) {
        $path_anh_phu = $target_file_anh_phu;
    } else {
        echo "Lỗi khi tải lên ảnh phụ.";
        exit;
    }

    // Kết nối và cập nhật cơ sở dữ liệu
    include('connect.php');
    $sql = "UPDATE san_pham SET 
            ten_san_pham='$ten_san_pham', 
            kich_co='$kich_co', 
            loai_san_pham='$loai_san_pham', 
            tinh_trang='$tinh_trang', 
            gia='$gia', 
            anh_chinh='$path_anh_chinh', 
            anh_phu='$path_anh_phu' 
            WHERE ma_san_pham='$id'";

    if (mysqli_query($conn, $sql)) {
        header('Location: dashboard.php?page=thong_tin_san_pham');
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
} else {
    echo "Vui lòng điền đầy đủ thông tin.";
}