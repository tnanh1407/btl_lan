-- Tạo database
CREATE DATABASE IF NOT EXISTS shop_ananas

-- Thêm trường User(Admin)
create table user 
(
ma_nguoi_dung int PRIMARY KEY AUTO_INCREMENT ,
tai_khoan varchar(50) UNIQUE NOT NULL ,
mat_khau varchar(50) NOT NULL ,
ho_ten varchar(50) ,
dia_chi varchar(50) DEFAULT NULL,
role ENUM('admin','user') not null 
)
-- Thêm data vào user
INSERT INTO `user`(`tai_khoan`, `mat_khau`, `ho_ten`, `dia_chi`, `role`) VALUES ('admin123','tnanh1407','','','admin')
INSERT INTO `user`(`tai_khoan`, `mat_khau`, `ho_ten`, `dia_chi`, `role`) VALUES ('user123','tnanh1407','','','user')
-- Thêm trường sản phẩm
create table if not EXISTS san_pham
(
ma_san_pham int PRIMARY KEY AUTO_INCREMENT ,
ten_san_pham varchar(50) UNIQUE NOT NULL ,
kich_co varchar(50) ,
loai_san_pham varchar(50) ,
tinh_trang varchar(50) ,
gia double not null,
anh_chinh varchar(255) DEFAULT null,
anh_phu varchar(255) DEFAULT null
)

-- Thêm trường giỏ hàng
CREATE TABLE IF NOT EXISTS gio_hang
(
    ma_gio_hang INT PRIMARY KEY AUTO_INCREMENT,
    ma_nguoi_dung INT,
    ma_san_pham INT,
    so_luong INT NOT NULL,
    gia DOUBLE NOT NULL,
    FOREIGN KEY (ma_nguoi_dung) REFERENCES user(ma_nguoi_dung),
    FOREIGN KEY (ma_san_pham) REFERENCES san_pham(ma_san_pham)
);


--Thêm trường thanh toán

CREATE TABLE IF NOT EXISTS thanh_toan
(
    ma_thanh_toan INT PRIMARY KEY AUTO_INCREMENT,
    ma_nguoi_dung INT,
    trang_thai ENUM('Đặt hàng', 'Đã thanh toán', 'Hủy') NOT NULL DEFAULT 'Đặt hàng',
    dia_chi_giao_hang VARCHAR(255),
    tong_tien DOUBLE NOT NULL,
    ngay_thanh_toan TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (ma_nguoi_dung) REFERENCES user(ma_nguoi_dung)
);


--thêm trường chi tiết đơn hàng

CREATE TABLE IF NOT EXISTS chi_tiet_don_hang
(
    ma_chi_tiet INT PRIMARY KEY AUTO_INCREMENT,
    ma_thanh_toan INT,
    ma_san_pham INT,
    so_luong INT NOT NULL,
    gia DOUBLE NOT NULL,
    FOREIGN KEY (ma_thanh_toan) REFERENCES thanh_toan(ma_thanh_toan),
    FOREIGN KEY (ma_san_pham) REFERENCES san_pham(ma_san_pham)
);


