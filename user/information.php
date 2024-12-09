
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <title>จัดการบัญชีผู้ใช้</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    
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
          <a class="nav-link active" aria-current="page" href="/Test_Code/index.php">หน้าแรก</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="information.php">ข้อมูลผู้ใช้</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/Test_Code/chart.php">กราฟ</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>
			
<div class="container mt-5">
              
					<h1 style="font-size:25px; letter-spacing: 3px;">จัดการบัญชีผู้ใช้ของสมาชิก</h1>
                            <article class="post">
							<div class="container ">
                                <table id="myTable" class="table ">
								<thead>
											<th>ลำดับ</th>
											<th>ชื่อจริง</th>
											<th>นามสกุล</th>
											<th>อายุ</th>
											<th>วันเวลาปรับปรุงแก้ไข</th>
											<th>แก้ไข</th>
											<th>ลบ</th>
										</thead>

										<tbody>
										<?php 

											include_once('functions.php');
											$fetchdata = new DB_con();
											$sql = $fetchdata->fetchdata();
											while($row = mysqli_fetch_array($sql)) {

										?>

											<tr>
												<td><?php echo $row['id']; ?></td>
												<td><?php echo $row['first_name']; ?></td>
												<td><?php echo $row['last_name']; ?></td>
												<td>
												<?php
													if (!function_exists('calculateAge')) {
														function calculateAge($dob) {
															$birthDate = new DateTime($dob);
															$currentDate = new DateTime();
															$age = $currentDate->diff($birthDate)->y;
															return $age;
														}
													}
													?><?= calculateAge($row['dob']) ?></td>
												<td><?php echo $row['updated_at']; ?></td>
												<td><a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">แก้ไข</a></td>
												<td><a href="javascript:void(0);" onclick="confirmDelete(<?php echo $row['id']; ?>)" class="btn btn-danger">ลบ</a></td>
											</tr>

										<?php 

											}
										?>
        							</tbody>
   								    </table>            
                                </div>  
							</article>
                    </div>
			</div>




			<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/browser.min.js"></script>
	<script src="assets/js/breakpoints.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>
	<script src="assets/js/search.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    
	<script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
    <script>
       $('#myTable').dataTable( {
  "language": {
    "decimal":        "",
    "emptyTable":     "ไม่มีข้อมูล",
    "info":           "กำลังแสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
    "infoEmpty":      "กำลังแสดง 0 ถึง 0 จาก 0 รายการ",
    "infoFiltered":   "(กรองจากรายการทั้งหมด _MAX_ รายการ)",
    "infoPostFix":    "",
    "thousands":      ",",
    "lengthMenu":     "แสดง _MENU_ รายการ",
    "loadingRecords": "กำลังไป...",
    "processing":     "",
    "search":         "ค้นหา:",
    "zeroRecords":    "ไม่มีข้อมูล",
    "paginate": {
        "first":      "แรก",
        "last":       "สุดท้าย",
        "next":       "ถัดไป",
        "previous":   "ก่อนหน้า"
    },
    "aria": {
        "sortAscending":  ": activate to sort column ascending",
        "sortDescending": ": activate to sort column descending"
    }
}
} );
    </script>
</body>
</html>


