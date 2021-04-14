@extends('backend.layouts.master')
@section('title'){{'Dashboard'}}@endsection
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div id="layoutSidenav">
        @include('backend.layouts.sideNav')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body"><p style="font-size: 30px; text-align: center">
                                        {{\App\User::count()}} Nhân viên</i>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body"><p style="font-size: 30px; text-align: center">
                                        {{\App\Post::count()}} Bài viết</i>
                                    </p></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body"><p style="font-size: 30px; text-align: center">
                                        {{\App\Product::count()}} Sản phẩm</i>
                                    </p></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-dark text-white mb-4">
                                <div class="card-body"><p style="font-size: 30px; text-align: center">
                                        {{\App\Customer::count()}} Khách hàng</i>
                                    </p></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body"><p style="font-size: 30px; text-align: center">
                                        {{\App\Newsletter::count()}} Liên hệ</i>
                                    </p></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-secondary text-white mb-4">
                                <div class="card-body"><p style="font-size: 30px; text-align: center">
                                        {{\App\Bill::count()}} Đơn hàng</i>
                                    </p></div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-5">
                        <canvas id="myChart"></canvas>
                    </div>
                    <script>

                        const labels = [
                            'January',
                            'February',
                            'March',
                            'April',
                            'May',
                            'June',
                        ];
                        const data = {
                            labels: labels,
                            datasets: [{
                                label: 'My First dataset',
                                backgroundColor: 'rgb(255, 99, 132)',
                                borderColor: 'rgb(255, 99, 132)',
                                data: [0, 10, 5, 2, 20, 30, 45],
                            }]
                        };
                        const config = {
                            type: 'line',
                            data,
                            options: {}
                        };
                            // === include 'setup' then 'config' above ===

                            var myChart = new Chart(
                            document.getElementById('myChart'),
                            config
                            );
                    </script>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Top 3 sản phẩm bán chạy nhất
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Avatar</th>
                                        <th>Tên</th>
                                        <th>Mô tả</th>
                                        <th>Giá gốc</th>
                                        <th>Giá ưu đãi</th>
                                        <th>Danh mục</th>
                                        <th>Tags</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $key => $product)
                                        @if(auth()->user()->id == $product->user->id)
                                            <tr>
                                                <td class="text-center"><img
                                                        src="@if($product->avatar)
                                                        {{asset('backend/images').'/'.$product->avatar}}
                                                        @else
                                                        {{asset('backend/images/product/default.png')}}
                                                        @endif"
                                                        alt="" width="100" height="100"></td>
                                                <td>{{$product->name}}</td>
                                                <td>{{$product->description}}</td>
                                                <td>{{$product->base_price}}</td>
                                                <td>{{$product->discount_price}}</td>
                                                <td>{{$product->category->name}}</td>
                                                <td>
                                                    @foreach($product->tags as $tag)
                                                        {{$tag->name}},
                                                    @endforeach
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            @include('backend.layouts.footer')
        </div>
    </div>
@endsection
