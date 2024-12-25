<table class="table">
    <thead>
        <tr>
            <th>รหัสการจอง</th>
            <th>รหัสลูกค้า</th>
            <th>รหัสห้อง</th>
            <th>วันที่เช็คอิน</th>
            <th>วันที่เช็คเอาท์</th>
            <th>สถานะ</th>
            <th>จัดการ</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // เชื่อมต่อฐานข้อมูลก่อน
        require 'connect.php';

        // ดึงข้อมูลการจองจากฐานข้อมูล
        $stmt = $conn->query('SELECT * FROM reservations');

        // แสดงข้อมูลในตาราง
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                <td>{$row['reservation_id']}</td>
                <td>{$row['customer_id']}</td>
                <td>{$row['room_id']}</td>
                <td>{$row['check_in_date']}</td>
                <td>{$row['check_out_date']}</td>
                <td>{$row['status']}</td>
                <td>
                    <a href='EditReservation.php?reservation_id={$row['reservation_id']}' class='btn btn-warning'>แก้ไข</a>
                    <a href='DeleteReservation.php?reservation_id={$row['reservation_id']}' class='btn btn-danger'>ลบ</a>
                </td>
            </tr>";
        }
        ?>
    </tbody>
</table>
<a href="InsertReservation.php" class="btn btn-primary">เพิ่มการจอง</a>
