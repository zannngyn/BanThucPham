$(document).ready(function () {
  // Gọi hàm thongke1 khi tài liệu đã sẵn sàng
  thongke1();
  // Khởi tạo biểu đồ Area của Morris cho phần tử có id là "chart1"
  var char = new Morris.Area({
    element: "chart1",
    xkey: "date1", // Khóa trục X
    ykeys: ["order1", "sales1"], // Các khóa trục Y
    labels: ["Đơn hàng", "Doanh thu"], // Nhãn cho các khóa trục Y
  });

  // Hàm thongke1 để lấy dữ liệu thống kê năm
  function thongke1() {
    $.ajax({
      url: "modules/statistical_tables/thongkenam.php", // URL để lấy dữ liệu
      dataType: "json", // Định dạng dữ liệu trả về là JSON
      success: function (data1) {
        char.setData(data1); // Đặt dữ liệu cho biểu đồ khi nhận được dữ liệu từ server
      },
    });
  }
});

$(document).ready(function () {
  // Gọi hàm thongke2 khi tài liệu đã sẵn sàng
  thongke2();
  // Khởi tạo biểu đồ Line của Morris cho phần tử có id là "chart2"
  var char = new Morris.Line({
    element: "chart2",
    xkey: "date2", // Khóa trục X
    ykeys: ["order2", "sales2"], // Các khóa trục Y
    labels: ["Đơn hàng", "Doanh thu"], // Nhãn cho các khóa trục Y
  });

  // Hàm thongke2 để lấy dữ liệu thống kê tháng
  function thongke2() {
    $.ajax({
      url: "modules/statistical_tables/thongkethang.php", // URL để lấy dữ liệu
      dataType: "json", // Định dạng dữ liệu trả về là JSON
      success: function (data2) {
        char.setData(data2); // Đặt dữ liệu cho biểu đồ khi nhận được dữ liệu từ server
      },
    });
  }
});

$(document).ready(function () {
  // Gọi hàm thongke3 khi tài liệu đã sẵn sàng
  thongke3();
  // Khởi tạo biểu đồ Bar của Morris cho phần tử có id là "chart3"
  var char = new Morris.Bar({
    element: "chart3",
    xkey: "date3", // Khóa trục X
    ykeys: ["order3", "sales3"], // Các khóa trục Y
    labels: ["Đơn hàng", "Doanh thu"], // Nhãn cho các khóa trục Y
  });

  // Hàm thongke3 để lấy dữ liệu thống kê tuần
  function thongke3() {
    $.ajax({
      url: "modules/statistical_tables/thongketuan.php", // URL để lấy dữ liệu
      dataType: "json", // Định dạng dữ liệu trả về là JSON
      success: function (data3) {
        char.setData(data3); // Đặt dữ liệu cho biểu đồ khi nhận được dữ liệu từ server
      },
    });
  }
});
