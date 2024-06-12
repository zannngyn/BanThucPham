<?php 
// include("../../config/connection.php"); 

// Xác định trang hiện tại
if(isset($_GET['trang'])){
    $page = $_GET['trang'];
} else{
    $page = 1;
}

// Tính toán vị trí bắt đầu của sản phẩm trên mỗi trang
$items_per_page = 8;
$begin = ($page == '' || $page == 1) ? 0 : ($page * $items_per_page) - $items_per_page;

// Xử lý tìm kiếm sản phẩm
if (isset($_POST['tukhoa'])) {
    $tukhoa = $_POST['tukhoa'];
    $sql_product = "SELECT * FROM sanpham WHERE TenSanPham LIKE '%$tukhoa%' ORDER BY ID_SanPham DESC";
} else {
    $sql_product = "SELECT * FROM sanpham ORDER BY ID_SanPham DESC LIMIT $begin, $items_per_page";
}

// Thực hiện truy vấn SQL
$query_product = mysqli_query($mysqli, $sql_product);
?>

<!-- Phần HTML hiển thị danh sách sản phẩm và phân trang -->
<div id="content" class="container-fluid">
    <div class="card">
        <!-- Tiêu đề danh sách sản phẩm và form tìm kiếm -->
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách sản phẩm</h5>
            <div class="form-search form-inline">
                <form action="" method="POST" class="d-flex">
                    <input type="text" class="form-control form-search" placeholder="Tìm kiếm" name="tukhoa">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary" name="tim">
                </form>
            </div>
        </div>
        <div class="card-body">
            <!-- Bảng hiển thị thông tin sản phẩm -->
            <div class="tableInfo">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">ID</th>
                            <th scope="col">Tên</th> 
                            <th scope="col">Mô tả</th> 
                            <th scope="col">SL</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        while ($row = mysqli_fetch_array($query_product)) {
                            $i++; 
                        ?>
                        <tr>
                            <td><?php echo $i ?></td> 
                            <td><?php echo $row['ID_SanPham'];?></td>  
                            <td><?php echo $row['TenSanPham'];?></td>
                            <td><?php echo $row['MoTa'];?></td>
                            <td><?php echo $row['SoLuong'];?></td>        
                            <td><img style="width: 180px;height: 180px;object-fit: cover;object-position: center center;" src="../assets/image/product/<?php echo $row['Img'];?>"/></td>    
                            <td><?php echo $row['GiaBan'];?></td>
                            <td>
                                <a class="btn btn-danger" href="modules/manage_products/delete-product.php?id_pro=<?php echo $row['ID_SanPham'];?>">Xóa</a> 
                                <a class="btn btn-warning mt-3" href="?product=suaSanPham&id=<?php echo $row['ID_SanPham'];?>">Sửa</a>
                            </td>   
                        </tr> 
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>      
            <!-- Phân trang -->
            <?php
            if (!isset($_POST['tukhoa'])) {
                $sql_trang = mysqli_query($mysqli, "SELECT * FROM sanpham");
                $row_count = mysqli_num_rows($sql_trang);  
                $trang = ceil($row_count / $items_per_page);
            ?>				
            <ul class="d-flex justify-content-center list-unstyled">
                <?php
                for ($i = 1; $i <= $trang; $i++) { 
                ?>
                    <li class="p-2 m-1 bg-white" <?php if($i==$page){echo 'style="background: #ccc !important;"';}else{ echo '';}?>>
                        <a class="text-dark" href="index.php?product=list-product&trang=<?php echo $i ?>"><?php echo $i ?></a>
                    </li>
                <?php
                } 
                ?>
            </ul>
            <?php
            }
            ?>
        </div>
    </div>
</div>
