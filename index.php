<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">หน้าแรก</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user/information.php">ข้อมูลผู้ใช้</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="chart.php">กราฟ</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <div class="container mt-5">
        
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white text-center">
                <h2>เพิ่มรายการข้อมูล</h2>
            </div>
            <div class="card-body">
                <form action="process.php" method="post" enctype="multipart/form-data">
                
                    <div class="mb-3">
                        <label for="prefix" class="form-label">คำนำหน้า:</label>
                        <select name="prefix" id="prefix" class="form-select" required>
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="first_name" class="form-label">ชื่อ:</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" placeholder="กรอกชื่อ" required>
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">นามสกุล:</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" placeholder="กรอกนามสกุล" required>
                    </div>
                    <div class="mb-3">
                        <label for="dob" class="form-label">วันเดือนปีเกิด:</label>
                        <input type="date" name="dob" id="dob" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="profile_image" class="form-label">รูปโปรไฟล์:</label>
                        <input type="file" name="profile_image" id="profile_image" class="form-control" accept="image/*" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                        <a href="index.php" class="btn btn-secondary">ล้างฟอร์ม</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
