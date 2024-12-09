<?php 
include_once('functions.php');

$updatedata = new DB_con();

if (isset($_POST['update'])) {
    $userid = $_GET['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['dob'];
    if (!empty($_FILES['profile_image']['name'])) {
        $target_dir = "uploads/";
        $profile_image = $target_dir . basename($_FILES["profile_image"]["name"]);
        move_uploaded_file($_FILES["profile_image"]["tmp_name"], $profile_image);
    } else {
        $profile_image = $_POST['current_profile_image'];
    }

    $sql = $updatedata->update($userid, $first_name, $last_name, $dob, $profile_image);

    if ($sql) {
        echo "<script>alert('แก้ไขเรียบร้อย!');</script>";
        echo "<script>window.location.href='information.php'</script>";
    } else {
        echo "<script>alert('Something went wrong! Please try again!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขบัญชีผู้ใช้</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Kanit', sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .form-control {
            margin-top: 8px;
        }
        .btn-container {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center">แก้ไขบัญชีผู้ใช้</h1>
    <hr>
    <?php 
        $userid = $_GET['id'];
        $updateuser = new DB_con();
        $sql = $updateuser->fetchonerecord($userid);
        while($row = mysqli_fetch_array($sql)) {
    ?>
<div class="d-flex justify-content-center">
    <img src="/Test_Code/<?php echo $row['profile_image']; ?>" width="200px" height="200px" alt="" class="rounded-circle border border-primary">
</div>
    <form action="" method="post">
        <div class="mb-3">
            <label for="first_name" class="form-label">ชื่อ</label>
            <input type="text" id="first_name" name="first_name" class="form-control" value="<?php echo $row['first_name']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">นามสกุล</label>
            <input type="text" id="last_name" name="last_name" class="form-control" value="<?php echo $row['last_name']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="dob" class="form-label">วันเกิด</label>
            <input type="date" id="dob" name="dob" class="form-control" value="<?php echo $row['dob']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">อายุ</label>
            <input type="text" class="form-control" value="<?php
													function calculateAge($dob) {
														$birthDate = new DateTime($dob);
														$currentDate = new DateTime();
														$age = $currentDate->diff($birthDate)->y;
														return $age;
													}
													?><?= calculateAge($row['dob']) ?>" readonly>
        </div>
        <div class="mb-3">
        <label for="profile_image" class="form-label">รูปโปรไฟล์</label>
        <input type="file" id="profile_image" name="profile_image" class="form-control">
        <input type="hidden" name="current_profile_image" value="<?php echo $row['profile_image']; ?>">
    </div>
    <?php } ?> 
        <div class="btn-container mt-4">
            <a href="ad-userpofile.php" class="btn btn-outline-primary">ย้อนกลับ</a>
            <button type="submit" name="update" class="btn btn-success">แก้ไขบัญชี</button>
        </div>
    </form>

    
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html>
