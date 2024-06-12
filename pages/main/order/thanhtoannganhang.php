<?php
    $id_cus = $_SESSION['ID_ThanhVien'];
    $sql_order = "SELECT ID_DonHang, GiaTien from donhang where ID_ThanhVien = $id_cus order by ID_DonHang DESC limit 1";
    $query_order = mysqli_query($mysqli, $sql_order);
    $row = mysqli_fetch_assoc($query_order);
?>
<div class="container mt-60 text-center">
    <img style="height: 320px" src="assets/image/logo/QR.jpg" alt="mã QR">
    <div class="mt-3">
        <p class="font-weight-bold">Tài khoản: 0489 8956 0001 LBBank</p>
        <p class="font-weight-bold">Số tiền: <?php echo $row['GiaTien']?></p></p>
        <p class="font-weight-bold">
            Nội dung chuyển khoản: <?php echo "TK".$id_cus."DH".$row['ID_DonHang']?>
        </p>
    </div>
    <a class="btn btn-info" href="index.php?navigate=finish">Tôi đã thanh toán</a>
</div>