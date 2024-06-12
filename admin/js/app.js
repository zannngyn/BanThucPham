$(document).ready(function () {
  // Khi tài liệu được tải xong, phần tử có class là "nav-link active" và chứa "sub-menu" sẽ trượt xuống
  $(".nav-link.active .sub-menu").slideDown();

  // Khi phần tử có class là "arrow" trong "#sidebar-menu" được click
  $("#sidebar-menu .arrow").click(function () {
    // Tìm cha của phần tử này là "li" và chọn "sub-menu" con của nó, sau đó trượt lên/xuống
    $(this).parents("li").children(".sub-menu").slideToggle();
    // Đổi class của phần tử này giữa "fa-angle-right" và "fa-angle-down"
    $(this).toggleClass("fa-angle-right fa-angle-down");
  });

  // Khi phần tử input có name là "checkall" được click
  $("input[name='checkall']").click(function () {
    // Kiểm tra trạng thái checked của nó
    var checked = $(this).is(":checked");
    // Đặt trạng thái checked của tất cả các checkbox trong tbody của ".table-checkall" theo trạng thái của "checkall"
    $(".table-checkall tbody tr td input:checkbox").prop("checked", checked);
  });
});
