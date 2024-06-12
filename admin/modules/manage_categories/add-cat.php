<?php
// Bao gồm tệp kết nối cơ sở dữ liệu
include("../../config/connection.php");

// Bắt đầu phiên làm việc
session_start();

// Kiểm tra nếu có POST request với key là 'add'
if (isset($_POST['add'])) {
    // Lấy dữ liệu từ form
    $TenDanhMuc = $_POST['name'];
    $Mota = $_POST['Mota'];

    // Tạo câu lệnh SQL để thêm dữ liệu vào bảng 'danhmuc'
    $sql_add = "INSERT INTO danhmuc(TenDanhMuc, Mota) VALUES('".$TenDanhMuc."', '".$Mota."')";

    // Thực hiện câu lệnh SQL
    mysqli_query($mysqli, $sql_add);

    // Chuyển hướng về trang index với tham số cat=cat-product
    header('location: ../../index.php?cat=cat-product');
}
?>
