@extends('layouts.admin_layout')

@section('head')
{{-- các file js hoặc css dùng riêng cho từng view thì để vào đây --}}
@endsection

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
                        <a href="#" class="small-box-footer">Xem thêm<i class="fas fa-arrow-circle-right"></i></a>
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
                        <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
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
                        <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
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
                        <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row d-flex justify-content-center">

                <div class="col-6">
                    <h2 class="title text-center">BIỂU ĐỒ ĐẶT VÉ THEO ĐỊA ĐIỂM</h2>
                    <canvas class="p-5" id="myChart" width="300" height="300"></canvas>
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
$js_array = json_encode($data);
echo "var dataCount = ". $js_array . ";\n";
?>

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
</script>
@endsection