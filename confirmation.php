<?php
// Kiểm tra xem có ID thanh toán được truyền từ PayPal không
if(isset($_GET['payment_id'])) {
    $payment_id = $_GET['payment_id'];

    // Hiển thị thông tin xác nhận thanh toán cho người dùng
    echo "<h2>Xác nhận thanh toán thành công</h2>";
    echo "<p>ID thanh toán: $payment_id</p>";

    // Tùy chỉnh thông tin xác nhận tại đây, như thông tin đơn hàng, tổng số tiền, vv.
} else {
    // Nếu không có ID thanh toán, hiển thị thông báo lỗi
    echo "<h2>Lỗi: Không có ID thanh toán được truyền.</h2>";
}
?>
