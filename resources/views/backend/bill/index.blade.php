@extends('backend.layouts.master')
@section('title'){{'Bill'}}@endsection
@section('content')
    <div id="layoutSidenav">
        @include('backend.layouts.sideNav')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Quản lý đơn hàng</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Quản lý đơn hàng</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Bảng đơn hàng
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Khách hàng</th>
                                        <th>Sản phẩm</th>
                                        <th>SĐT</th>
                                        <th>Email</th>
                                        <th>Tỉnh/Thành phố</th>
                                        <th>Quận/Huyện</th>
                                        <th>Ngày đặt</th>
                                        <th>Status</th>
                                        <th>Tổng giá</th>
                                        <th>Ghi chú</th>
                                        <th>Hình thức thanh toán</th>
                                        <th>Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bills as $bill)
                                        <tr>
                                            <td>{{$bill->customer->firstname . ' ' . $bill->customer->lastname}}</td>
                                            <td>
                                                @foreach($bill->billItems as $bill_item)
                                                    @foreach($products as $product)
                                                        @if($product->id == $bill_item->product_id)
                                                                {{$product->name}},
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </td>
                                            <td>{{$bill->customer->phone}}</td>
                                            <td>{{$bill->customer->email}}</td>
                                            <td>{{$bill->customer->city}}</td>
                                            <td>{{$bill->customer->district}}</td>
                                            <td>{{$bill->receive_date}}</td>
                                            <td>
                                                @switch($bill->status)
                                                    @case(0)
                                                    Pending
                                                    @break
                                                    @case(1)
                                                    Processing
                                                    @break
                                                    @case(2)
                                                    Done
                                                    @break
                                                @endswitch
                                            </td>
                                            <td>
                                                @php($total = 0)
                                                @foreach($bill->billItems as $bill_item)
                                                   @php($total += $bill_item->total_price)
                                                @endforeach
                                                {{number_format($total)}}đ
                                            </td>
                                            <td>{{$bill->note}}</td>
                                            <td>
                                                @switch($bill->payment_type)
                                                    @case(1)
                                                    Thanh toán trực tiếp
                                                    @break
                                                    @case(2)
                                                    Chuyển khoản
                                                    @break
                                                    @case(3)
                                                    Thanh toán online
                                                    @break
                                                @endswitch</td>
                                            <td class="d-flex">
                                                @can('bill_edit')
                                                    <a class="btn btn-primary mr-1"
                                                       href="{{route('bill.edit',$bill->id)}}">Sửa</a>
                                                @endcan
                                                @can('bill_delete')
                                                    <form action="{{route('bill.destroy',$bill->id)}}"
                                                          method="POST">
                                                        @csrf
                                                        <button class="delete btn btn-danger">Xóa</button>
                                                    </form>
                                                @endcan
                                            </td>
                                        </tr>
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
