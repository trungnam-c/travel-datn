@extends('layouts.admin_layout')

@section('head')
{{-- các file js hoặc css dùng riêng cho từng view thì để vào đây --}}
@endsection
@section('web-title', 'Trang quản trị')

@section('title','Home')

@section('main')
<div class="content-wrapper ml-0" style="min-height: 855px;">
    <!-- Content Header (Page header) -->
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ DB::table('users')->count()}}</h3>

                            <p>Số lượng khách hàng</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="/admintravel/public/admin/user/danh-sach-khach-hang" class="small-box-footer">Xem thêm<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ DB::table('location')->count()}}<sup style="font-size: 20px"></sup></h3>

                            <p>Số lượng địa điểm</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="/admintravel/public/quantri/quan-ly-dia-diem" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ DB::table('detail_location')->count()}}</h3>

                            <p>Số lượng chuyến đi</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="/admintravel/public/quantri/chi-tiet-dia-diem" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ DB::table('datve')->count()}}</h3>

                            <p>Số lượng vé đã bán</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="/admintravel/public/quantri/quan-ly-dat-ve" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row d-flex justify-content-center">

                <div class="col-12 d-flex">
                    <div class="col-6">
                        <h2 class="title text-center">BIỂU ĐỒ THỐNG KÊ VÉ THEO ĐỊA ĐIỂM</h2>
                        <canvas class="p-5" id="myChart" width="300" height="300"></canvas>
                    </div>
                    <div class="col-6">
                        <h2 class="title text-center">BIỂU ĐỒ THỐNG KÊ CHUYẾN ĐI THEO ĐỊA ĐIỂM</h2>
                        <canvas class="p-5" id="detailLocation" width="300" height="300"></canvas>
                    </div>

                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
@section('location-js')
<script>
let ctx = document.getElementById('myChart').getContext('2d');
<?php
$listitems = [50,50,100,50];
?>

let labels = [];
const formatLabel = () => {
    const location = <?php echo $diadiem ?>;
    for (let index = 0; index < location.length; index++) {
        labels.push([location[index].diemdi + ' đến ' + location[index].diemden, location[index].id]);
    }
    return labels;
}
formatLabel();

<?php
$dataDatve = json_encode($data);
$dataChuyenDi = json_encode($dataDetailLocation);
echo "var dataCount = ". $dataDatve . ";\n";
echo "var dataCountChuyenDi = ". $dataChuyenDi . ";\n";
?>

console.log(dataCountChuyenDi);

const data = {
    labels: labels.map(items => items[0]),
    datasets: [{
        data: dataCount,
        backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)',
            'brown',
            'orange',
            'green',
            'black',
            'pink',
            'blue',
            'red'
        ],
        hoverOffset: 4
    }]
};
const myChart = new Chart(ctx, {
    type: 'doughnut',
    data: data,
});

let detailLocation = document.getElementById('detailLocation').getContext('2d');
const labelsDetailLocation = labels.map(items => items[0]);
const dataDetailLocation = {
    labels: labelsDetailLocation,
    datasets: [{
        label: 'Số lượng chuyến đi',
        data: dataCountChuyenDi,
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
const detailLocationChart = new Chart(detailLocation, {
    type: 'bar',
    data: dataDetailLocation,
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    },
});
</script>
@endsection
