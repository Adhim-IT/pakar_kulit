<?php
include 'navbar.php';

$serverName = "localhost";
$username = "root";
$password = "";
$dbName = "spforward2";

$conn = mysqli_connect($serverName, $username, $password, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query_data_day = "SELECT DATE(tanggal) as date, COUNT(*) as total FROM riwayat GROUP BY DATE(tanggal)";
$rs_data_day = mysqli_query($con, $query_data_day) or die(mysqli_error($con));

// Fetching data per month
$query_data_month = "SELECT DATE_FORMAT(tanggal, '%Y-%m') as month, COUNT(*) as total FROM riwayat GROUP BY month";
$rs_data_month = mysqli_query($con, $query_data_month) or die(mysqli_error($con));

// Data for the daily chart
$data_counts_day = "";
$labels_day = "";
foreach ($rs_data_day as $row) {
    $labels_day .= "'" . $row['date'] . "',";
    $data_counts_day .= $row['total'] . ",";
}

$labels_day = substr($labels_day, 0, -1);
$data_counts_day = substr($data_counts_day, 0, -1);

// Data for the monthly chart
$data_counts_month = "";
$labels_month = "";
foreach ($rs_data_month as $row) {
    $labels_month .= "'" . $row['month'] . "',";
    $data_counts_month .= $row['total'] . ",";
}

$labels_month = substr($labels_month, 0, -1);
$data_counts_month = substr($data_counts_month, 0, -1);
// Fetch data for "Data Penyakit"
$sqlPenyakit = "SELECT COUNT(*) AS jml_penyakit FROM penyakit";
$resultPenyakit = mysqli_query($conn, $sqlPenyakit);
$penyakit = ($resultPenyakit) ? mysqli_fetch_assoc($resultPenyakit) : ['jml_penyakit' => 0];

// Fetch data for "Data Gejala"
$sqlGejala = "SELECT COUNT(*) AS jml_gejala FROM gejala";
$resultGejala = mysqli_query($conn, $sqlGejala);
$gejala = ($resultGejala) ? mysqli_fetch_assoc($resultGejala) : ['jml_gejala' => 0];

// Fetch data for "Data Pasien" (Users with usertype = 'user')
$sqlDataPasien = "SELECT COUNT(*) AS jml_pasien FROM pengguna WHERE level = 'User'";
$resultDataPasien = mysqli_query($conn, $sqlDataPasien);
$pasien = ($resultDataPasien) ? mysqli_fetch_assoc($resultDataPasien) : ['jml_pasien' => 0];

// Fetch data for "Data Dokter" (Users with usertype = 'admin')
$sqlDataDokter = "SELECT COUNT(*) AS jml_dokter FROM pengguna WHERE level = 'Dokter'";
$resultDataDokter = mysqli_query($conn, $sqlDataDokter);
$dokter = ($resultDataDokter) ? mysqli_fetch_assoc($resultDataDokter) : ['jml_dokter' => 0];

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,700&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/datatables/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/bootstrap-select/bootstrap-select.css" rel="stylesheet">
    <link href="assets/css/AdminLTE.min.css" rel="stylesheet">
    <link href="assets/css/skins/_all-skins.min.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
    <link href="assets/images/logo.png" type="image/x-icon" rel="shortcut icon">
    <link rel="stylesheet" href="assets/iCheck/flat/_all.css">

    <script src="assets/js/jQuery-2.1.4.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/datatables/js/jquery.dataTables.min.js"></script>
    <script src="assets/datatables/js/dataTables.bootstrap.min.js"></script>
    <script src="assets/bootstrap-select/bootstrap-select.js"></script>
    <script src="assets/iCheck/icheck.min.js"></script>
    <script src="assets/js/app.min.js"></script>
    <style>
    .navbar-nav li {
        margin-right: 3px;
        font-size: 20px;
        margin-left: 10px;
    }

    .row {
        margin-top: 3rem;
        margin-right: 5rem;
        margin-left: 5rem;
    }

    .col {
        margin-bottom: 5rem;
    }

    .text-xs {
        font-size: 20px;
    }

    .container-grfik {
        margin-top: 2rem;
        margin-bottom: 10rem;
        background-color: transparent;
    }
    </style>
</head>

<body>
    <div class="row">
        <div class="col-xl-3">
            <div class="card border-left-primary shadow">
                <div class="card-body">
                    <div class="align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Dokter</div>
                            <div class="h1 font-weight-bold text-gray-800"><?= $dokter['jml_dokter']; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card border-left-primary shadow">
                <div class="card-body">
                    <div class="align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Pasien</div>
                            <div class="h1  font-weight-bold text-gray-800"><?= $pasien['jml_pasien']; ?> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3">
            <div class="card border-left-primary shadow">
                <div class="card-body">
                    <div class="align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Data Penyakit
                            </div>
                            <div class="h1  font-weight-bold text-gray-800"><?= $penyakit['jml_penyakit']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3">
            <div class="card border-left-primary shadow">
                <div class="card-body">
                    <div class="align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Data Gejala</div>
                            <div class="h1  font-weight-bold text-gray-800"><?= $gejala['jml_gejala']; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-grfik">
        <div class="row">
            <div class="col-12">
                <div class="alert">
                    <h3></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <h3>Riwayat setiap hari</h3>
                <div>
                    <canvas id="activityChartDay"></canvas>
                </div>
            </div>
            <div class="col-6">
                <h3>Riwayat 1 bulan</h3>
                <div>
                    <canvas id="activityChartMonth"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    const ctxDay = document.getElementById('activityChartDay');
    const ctxMonth = document.getElementById('activityChartMonth');

    const options = {
        scales: {
            y: {
                beginAtZero: true
            }
        },
        barPercentage: 0.3, // Adjust the width of the bars
        categoryPercentage: 0.3, // Adjust the space between the bars
    };

    const dayDataset = {
        label: 'User Activity',
        data: [<?= $data_counts_day; ?>],
        backgroundColor: 'orange', // Choose your color
        borderWidth: 1
    };

    const monthDataset = {
        label: 'User Activity',
        data: [<?= $data_counts_month; ?>],
        backgroundColor: 'yellow', // Choose your color
        borderWidth: 1
    };

    new Chart(ctxDay, {
        type: 'bar',
        data: {
            labels: [<?= $labels_day; ?>],
            datasets: [dayDataset]
        },
        options: options
    });

    new Chart(ctxMonth, {
        type: 'bar',
        data: {
            labels: [<?= $labels_month; ?>],
            datasets: [monthDataset]
        },
        options: options
    });
    </script>

</html>