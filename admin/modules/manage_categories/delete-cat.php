<?php 
// Bao gồm tệp kết nối cơ sở dữ liệu
include("../../config/connection.php");

// Bắt đầu phiên làm việc
session_start();

// Kiểm tra nếu có GET request với key là 'id'
if (isset($_GET['id'])) {
    // Tạo câu lệnh SQL để xóa danh mục với ID_DanhMuc được cung cấp
    $sql_xoa = "DELETE FROM danhmuc WHERE danhmuc.ID_DanhMuc = '".$_GET['id']."'";
    // Thực hiện câu lệnh SQL
    mysqli_query($mysqli, $sql_xoa);
    // Chuyển hướng về trang index với tham số cat=cat-product
    header('location:../../index.php?cat=cat-product');
}
?>
