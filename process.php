<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prefix = $_POST['prefix'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['dob'];

    
    $target_dir = "uploads/";
    $profile_image = $target_dir . basename($_FILES["profile_image"]["name"]);
    move_uploaded_file($_FILES["profile_image"]["tmp_name"], $profile_image);

   
    $stmt = $conn->prepare("INSERT INTO users (prefix, first_name, last_name, dob, profile_image) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $prefix, $first_name, $last_name, $dob, $profile_image);

    if ($stmt->execute()) {
        echo "บันทึกข้อมูลสำเร็จ! <a href='index.php'>เพิ่มข้อมูลใหม่</a>";
    } else {
        echo "เกิดข้อผิดพลาด: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
