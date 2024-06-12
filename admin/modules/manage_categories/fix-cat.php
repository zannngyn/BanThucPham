<?php
// Kiểm tra nếu có GET request với key là 'id'
if (isset($_GET['id'])) {
    // Lấy giá trị ID_DanhMuc từ URL
    $ID_DanhMuc = $_GET['id'];
    // Tạo câu lệnh SQL để lấy thông tin danh mục dựa trên ID_DanhMuc
    $sql_getDanhMuc = "SELECT * FROM danhmuc WHERE ID_DanhMuc = $ID_DanhMuc LIMIT 1";
    // Thực hiện câu lệnh SQL
    $query_getDanhMuc = mysqli_query($mysqli, $sql_getDanhMuc);
    // Lấy hàng dữ liệu đầu tiên từ kết quả truy vấn
    $row = mysqli_fetch_array($query_getDanhMuc);
}
?>
<div>
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Chỉnh sửa thông tin danh mục
            </div>
            <div class="card-body">
                <!-- Form để chỉnh sửa danh mục -->
                <form action="modules/manage_categories/sua.php?id=<?php echo $ID_DanhMuc ?>" method="POST">
                    <div class="form-group">
                        <label for="name">Tên danh mục</label>
                        <!-- Input cho tên danh mục với giá trị mặc định từ cơ sở dữ liệu -->
                        <input required class="form-control" type="text" name="TenDanhMuc" id="name"
                            value="<?php echo $row['TenDanhMuc'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Mô tả</label>
                        <!-- Textarea cho mô tả danh mục với giá trị mặc định từ cơ sở dữ liệu -->
                        <textarea required class="form-control" name="Mota"
                            id="name"><?php echo $row['Mota'] ?></textarea>
                    </div>
                    <!-- Nút submit để gửi form -->
                    <input type="submit" class="btn btn-primary" name="submit" value="Sửa">
                </form>
            </div>
        </div>
    </div>
</div>
