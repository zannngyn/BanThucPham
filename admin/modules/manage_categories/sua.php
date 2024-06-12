<?php
// Bao gồm tệp kết nối cơ sở dữ liệu
include("../../config/connection.php");

// Kiểm tra nếu có POST request với key 'submit' và GET request với key 'id'
if (isset($_POST['submit']) && isset($_GET['id'])) {
    // Lấy giá trị ID_DanhMuc từ URL
    $ID_DanhMuc = $_GET['id'];
    // Lấy dữ liệu từ form
    $TenDanhMuc = $_POST['TenDanhMuc'];
    $Mota = $_POST['Mota'];

    // Kiểm tra xem các trường bắt buộc có được điền đầy đủ hay không
    if ($TenDanhMuc == "") {
        echo "Vui lòng nhập đủ tên!<br />";
    }
    if ($Mota == "") {
        echo "Vui lòng nhập đủ mô tả !<br />";
    }

    // Nếu tất cả các trường đều được điền đầy đủ
    if ($TenDanhMuc != "" && $Mota != "") {
        // Sử dụng prepared statement để bảo vệ khỏi SQL Injection
        $stmt = $mysqli->prepare("UPDATE danhmuc SET TenDanhMuc = ?, Mota = ? WHERE ID_DanhMuc = ?");
        // Gán giá trị các biến vào câu lệnh SQL
        $stmt->bind_param("ssi", $TenDanhMuc, $Mota, $ID_DanhMuc);
        // Thực hiện câu lệnh SQL
        $stmt->execute();
        // Đóng statement
        $stmt->close();
    }
}

// Chuyển hướng về trang index với tham số cat=cat-product
header('location:../../index.php?cat=cat-product');
?>
