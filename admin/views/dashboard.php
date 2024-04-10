<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <div class="dashboard">
        <!-- Content Row -->
        <div class="row">
            <!-- SẢN PHẨM -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div style="background: #40bdcf;" class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="fs-2 font-weight-bolder text-white text-uppercase mb-1">SẢN PHẨM </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h2 mb-0 mr-3 font-weight-bold text-white"><?= $totalProduct['totalProduct'] ?></div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ĐƠN HÀNG -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div style="background: #1cc88a;" class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xl font-weight-bold text-white text-uppercase mb-1">ĐƠN HÀNG</div>
                                <div class="h2 mb-0 font-weight-bold text-white"><?= $totalOrder['totalOrder'] ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- KHÁCH HÀNG -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div style="background: #f6c23e;" class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xl font-weight-bold text-white text-uppercase mb-1">KHÁCH HÀNG</div>
                                <div class="h2 mb-0 font-weight-bold text-white"><?= $totalUser['totalUser'] ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- DOANH SỐ -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div style="background: #4e73df;" class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xl font-weight-bold text-white text-uppercase mb-1"> DOANH SỐ</div>
                                <div class="h2 mb-0 font-weight-bold text-white"><?= number_format($totalRevenue['totalRevenue']) ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->




        <div class="chart" style="display: grid;grid-template-columns: 67% 2% 31%;margin-top: 30px; height: 500px;">
            <div class="chart-bar" style="    width: 100%; background: white;  display: flex;align-items: center;">
                <canvas id="myChartBar" style="max-width: 900px; display: block; box-sizing: border-box; height: 407px; width: 815px;" width="1019" height="509"></canvas>
            </div>
            <div></div>
            <div class="chart-area" style="display: flex;align-items: center;justify-content: center;width: 100%; background: white;">
                <canvas id="myChartArea" style="max-width: 900px; display: block; box-sizing: border-box; height: 377px; width: 377px;" width="471" height="471"></canvas>
            </div>

        </div>
    </div>



</div>
<?php

$listDataTwo = json_encode($dataDashboardTwo);

$listDataOne = json_encode($dataDashboardOne);


?>
<script>
    const TdT = <?php echo $listDataOne; ?>;
    const labels = TdT.map(data => data.name);
    const data = {
        labels: labels,
        datasets: [{
            label: 'Số lượng đã bán',
            data: TdT.map(data => data.total),
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
            ],
            borderWidth: 1
        }]
    };
    new Chart("myChartBar", {
        type: 'bar',
        data,
        options: {
            indexAxis: 'y',
        }
    });


    const TdTTwo = <?php echo $listDataTwo; ?>;
    const dataArea = {
        labels: TdTTwo.map(data => data.name),
        datasets: [{
            label: 'Số lượng sản phẩm',
            data: TdTTwo.map(data => data.total),
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(75, 192, 192)',
                'rgb(255, 205, 86)',
                'rgb(201, 203, 207)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(255, 159, 64)'
            ]
        }]
    };

    new Chart("myChartArea", {
        type: 'polarArea',
        data: dataArea,
        options: {}
    });
</script>