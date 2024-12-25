<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get POST data
    $ten_san_pham = isset($_POST['ten_san_pham']) ? $_POST['ten_san_pham'] : '';
    $kich_co = isset($_POST['kich_co']) ? $_POST['kich_co'] : '';
    $loai_san_pham = isset($_POST['loai_san_pham']) ? $_POST['loai_san_pham'] : '';
    $tinh_trang = isset($_POST['tinh_trang']) ? $_POST['tinh_trang'] : '';
    $gia = isset($_POST['gia']) ? $_POST['gia'] : 0;

    // Xử lý ảnh chính
    $target_dir = "uploads/";
    $target_file_chinh = $target_dir . basename($_FILES["anh_chinh"]["name"]);
    $uploadOk_chinh = 1;
    $imageFileType_chinh = strtolower(pathinfo($target_file_chinh, PATHINFO_EXTENSION));

    // Kiểm tra nếu file là ảnh
    if (isset($_POST["submit"])) {
        $check_chinh = getimagesize($_FILES["anh_chinh"]["tmp_name"]);
        if ($check_chinh === false) {
            echo "Ảnh chính không hợp lệ.";
            $uploadOk_chinh = 0;
        }
    }

    // Kiểm tra ảnh phụ
    $target_file_phu = $target_dir . basename($_FILES["anh_phu"]["name"]);
    $uploadOk_phu = 1;
    $imageFileType_phu = strtolower(pathinfo($target_file_phu, PATHINFO_EXTENSION));

    if (isset($_POST["submit"])) {
        $check_phu = getimagesize($_FILES["anh_phu"]["tmp_name"]);
        if ($check_phu === false) {
            echo "Ảnh phụ không hợp lệ.";
            $uploadOk_phu = 0;
        }
    }

    if (!in_array($imageFileType_chinh, ['jpg', 'jpeg', 'png', 'gif'])) {
        echo "Ảnh chính chỉ hỗ trợ JPG, JPEG, PNG & GIF.";
        $uploadOk_chinh = 0;
    }

    if (!in_array($imageFileType_phu, ['jpg', 'jpeg', 'png', 'gif'])) {
        echo "Ảnh phụ chỉ hỗ trợ JPG, JPEG, PNG & GIF.";
        $uploadOk_phu = 0;
    }

    if ($uploadOk_chinh == 0 || $uploadOk_phu == 0) {
        echo "File của bạn chưa được tải lên";
        exit;
    }

    if ($uploadOk_chinh == 1 && move_uploaded_file($_FILES["anh_chinh"]["tmp_name"], $target_file_chinh)) {
        $anh_chinh_path = $target_file_chinh;
    } else {
        $anh_chinh_path = '';  // hoặc có thể để ảnh mặc định
    }

    if ($uploadOk_phu == 1 && move_uploaded_file($_FILES["anh_phu"]["tmp_name"], $target_file_phu)) {
        $anh_phu_path = $target_file_phu;
    } else {
        $anh_phu_path = '';  // hoặc có thể để ảnh mặc định
    }

    include('connect.php');

    // Thực thi câu truy vấn để thêm sản phẩm vào cơ sở dữ liệu
    $stmt = $conn->prepare("INSERT INTO `san_pham` ( `ten_san_pham`, `kich_co`, `loai_san_pham`, `tinh_trang`, `gia`, `anh_chinh`, `anh_phu`) VALUES ( ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssdss", $ten_san_pham, $kich_co, $loai_san_pham, $tinh_trang, $gia, $anh_chinh_path, $anh_phu_path);


    // Thực thi câu truy vấn
    if ($stmt->execute()) {
        echo "Sản phẩm đã được thêm thành công!";
        header('Location: dashboard.php?page=thong_tin_san_pham');
    } else {
        echo "Lỗi khi thêm sản phẩm.";
    }

    // Đóng kết nối
    $stmt->close();
    $conn->close();
}