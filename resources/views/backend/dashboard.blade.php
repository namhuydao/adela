@extends('backend.layouts.master')
@section('title'){{'Dashboard'}}@endsection
@section('content')
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
                                        {{\App\User::count()}}<i style="padding-left: 10px" class="fas fa-user"></i>
                                    </p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="{{route('user')}}">Xem thông tin chi
                                        tiết</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body"><p style="font-size: 30px; text-align: center">
                                        {{\App\Post::count()}}<i style="padding-left: 10px" class="fad fa-newspaper"></i>
                                    </p></div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="{{route('post')}}">Xem thông tin chi
                                        tiết</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body"><p style="font-size: 30px; text-align: center">
                                        {{\App\Product::count()}}<i style="padding-left: 10px" class="fad fa-shopping-bag"></i>
                                    </p></div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="{{route('product')}}">Xem thông tin chi
                                        tiết</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Bảng sản phẩm
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Avatar</th>
                                        <th>Tên</th>
                                        <th>Mô tả</th>
                                        <th>Người bán</th>
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
                                                <td>{{$product->user->firstname . ' ' . $product->user->lastname}}</td>
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
