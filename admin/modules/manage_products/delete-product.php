<?php 
// Bao gồm tệp kết nối cơ sở dữ liệu
include("../../config/connection.php"); 

// Kiểm tra xem có yêu cầu GET với key là 'id_pro' hay không
if (isset($_GET['id_pro'])) {
    // Lấy ID_SanPham từ yêu cầu GET
    $ID_SanPham = $_GET['id_pro'];
    
    // Truy vấn để lấy tên hình ảnh của sản phẩm từ cơ sở dữ liệu
    $query_select_image = "SELECT Img FROM sanpham WHERE ID_SanPham = $ID_SanPham";
    $result_select_image = mysqli_query($mysqli, $query_select_image);
    
    // Kiểm tra xem có kết quả trả về hay không
    if(mysqli_num_rows($result_select_image) > 0) {
        $row_select_image = mysqli_fetch_assoc($result_select_image);
        $imageToDelete = $row_select_image['Img'];
        
        // Xóa hình ảnh của sản phẩm từ thư mục lưu trữ
        unlink("../../../assets/image/product/".$imageToDelete);
    }

    // Xóa các bình luận liên quan đến sản phẩm từ bảng `binhluan`
    $sql_comment = "DELETE FROM binhluan WHERE ID_SanPham = $ID_SanPham";
    mysqli_query($mysqli, $sql_comment);

    // Xóa sản phẩm từ bảng `sanpham`
    $sql = "DELETE FROM sanpham WHERE ID_SanPham = $ID_SanPham";
    mysqli_query($mysqli, $sql);
}

// Chuyển hướng về trang danh sách sản phẩm sau khi xóa sản phẩm thành công
header('location: ../../index.php?product=list-product');
?>
