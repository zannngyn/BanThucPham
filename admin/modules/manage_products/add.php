<?php 
// Bao gồm tệp kết nối cơ sở dữ liệu
include("../../config/connection.php");

// Kiểm tra xem form đã được gửi đi hay chưa
if (isset($_POST['submit'])) {
    // Lấy dữ liệu từ form
    $TenSanPham = $_POST['TenSanPham'];
    $GiaBan = $_POST['GiaBan'];
    $SoLuong = $_POST['SoLuong'];
    $MoTa = $_POST['MoTa'];
    $ID_DanhMuc = $_POST['danhmuc'];
    $ID_NCC = $_POST['nhacungcap'];
    $GiamGia = $_POST['GiamGia'];

    // Xử lý hình ảnh
    $imageName = $_FILES['Img']['name'];
    $imageTemp = $_FILES['Img']['tmp_name'];
    // Di chuyển hình ảnh vào thư mục lưu trữ
    move_uploaded_file($imageTemp, "../../../assets/image/product/" . $imageName);

    // Thực hiện câu lệnh SQL để thêm sản phẩm mới
    $sql_add = "INSERT INTO sanpham(ID_DanhMuc, ID_NhaCungCap, TenSanPham, MoTa, GiaBan, SoLuong, Img, GiamGia) VALUES('$ID_DanhMuc', '$ID_NCC', '$TenSanPham', '$MoTa', '$GiaBan', '$SoLuong', '$imageName', '$GiamGia')";
    mysqli_query($mysqli,$sql_add);

    // Chuyển hướng về trang danh sách sản phẩm sau khi thêm sản phẩm thành công
    header('location: ../../index.php?product=list-product');
}
?>
