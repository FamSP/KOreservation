<form action="InsertReservation.php" method="POST">
    <label>รหัสลูกค้า:</label>
    <input type="text" name="customer_id" class="form-control" required>
    
    <label>รหัสห้อง:</label>
    <input type="text" name="room_id" class="form-control" required>
    
    <label>วันที่เช็คอิน:</label>
    <input type="date" name="check_in_date" class="form-control" required>
    
    <label>วันที่เช็คเอาท์:</label>
    <input type="date" name="check_out_date" class="form-control" required>
    
    <label>สถานะ:</label>
    <select name="status" class="form-control">
        <option value="Pending">Pending</option>
        <option value="Confirmed">Confirmed</option>
        <option value="Cancelled">Cancelled</option>
    </select>
    
    <br>
    <button type="submit" name="submit" class="btn btn-success">เพิ่มการจอง</button>
</form>


<?php
if (isset($_POST['submit'])) {
    require 'connect.php';

    $stmt = $conn->prepare(
        'INSERT INTO reservations (customer_id, room_id, check_in_date, check_out_date, status) 
        VALUES (:customer_id, :room_id, :check_in_date, :check_out_date, :status)'
    );
    $stmt->bindParam(':customer_id', $_POST['customer_id']);
    $stmt->bindParam(':room_id', $_POST['room_id']);
    $stmt->bindParam(':check_in_date', $_POST['check_in_date']);
    $stmt->bindParam(':check_out_date', $_POST['check_out_date']);
    $stmt->bindParam(':status', $_POST['status']);

    if ($stmt->execute()) {
        echo "เพิ่มการจองสำเร็จ!";
    } else {
        echo "เกิดข้อผิดพลาด!";
    }
}
?>
