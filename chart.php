<?php
include_once('functions.php');


$fetchdata = new DB_con();
$sql = $fetchdata->fetchdata();  


$age_groups = [
    "0-18" => 0,
    "19-30" => 0,
    "31-40" => 0,
    "41-50" => 0,
    "51+" => 0
];


function calculateAge($dob) {
    $birthDate = new DateTime($dob);
    $currentDate = new DateTime();
    $age = $currentDate->diff($birthDate)->y;
    return $age;
}

while ($row = mysqli_fetch_array($sql)) {
    $age = calculateAge($row['dob']);
    
    if ($age <= 18) {
        $age_groups["0-18"]++;
    } elseif ($age >= 19 && $age <= 30) {
        $age_groups["19-30"]++;
    } elseif ($age >= 31 && $age <= 40) {
        $age_groups["31-40"]++;
    } elseif ($age >= 41 && $age <= 50) {
        $age_groups["41-50"]++;
    } else {
        $age_groups["51+"]++;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>กราฟจำนวนสมาชิกตามอายุ</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
        <h1 class="text-center">กราฟจำนวนสมาชิกตามอายุ</h1>
        <canvas id="ageChart" width="400" height="200"></canvas>

        <h2 class="mt-5">รายงานจำนวนสมาชิกตามอายุ</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ช่วงอายุ</th>
                    <th>จำนวนสมาชิก</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>0-18</td>
                    <td><?php echo $age_groups["0-18"]; ?></td>
                </tr>
                <tr>
                    <td>19-30</td>
                    <td><?php echo $age_groups["19-30"]; ?></td>
                </tr>
                <tr>
                    <td>31-40</td>
                    <td><?php echo $age_groups["31-40"]; ?></td>
                </tr>
                <tr>
                    <td>41-50</td>
                    <td><?php echo $age_groups["41-50"]; ?></td>
                </tr>
                <tr>
                    <td>51+</td>
                    <td><?php echo $age_groups["51+"]; ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        var ctx = document.getElementById('ageChart').getContext('2d');
        var ageChart = new Chart(ctx, {
            type: 'bar', 
            data: {
                labels: ['0-18', '19-30', '31-40', '41-50', '51+'], // ช่วงอายุ
                datasets: [{
                    label: 'จำนวนสมาชิก',
                    data: [
                        <?php echo $age_groups["0-18"]; ?>,
                        <?php echo $age_groups["19-30"]; ?>,
                        <?php echo $age_groups["31-40"]; ?>,
                        <?php echo $age_groups["41-50"]; ?>,
                        <?php echo $age_groups["51+"]; ?>
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
