@extends('backend.layouts.master')
@section('title'){{'Edit Bill'}}@endsection
@section('content')
    <div id="layoutSidenav">
        @include('backend.layouts.sideNav')
        <div id="layoutSidenav_content" style="background: #f2f3f8">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Quản lý đơn hàng</h1>
                    <form action="{{route('bill.update', $bill->id)}}" method="POST">
                        @csrf
                        <ol class="breadcrumb mb-4" style="background: white">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Sửa đơn hàng</li>
                            <li class="button"  style="margin-left: auto">
                                <a href="{{route('invoice', $bill->id)}}" class="btn btn-success mr-3">In báo giá</a>
                                <button class="btn btn-primary" type="submit">Lưu</button>
                            </li>
                        </ol>

                        @if(session('success'))
                            <div class="alert alert-success">{{session('success')}}</div>
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <div class="bill bg-light mr-2 p-3" style="border-radius: 5px">
                                    <h3>Thông tin đơn hàng</h3>
                                    <p>Tổng tiền: {{number_format($bill->price)}}đ</p>

                                    <div class="form-group">
                                        <label>Thời gian nhận hàng:</label>
                                        <input value="{{$bill->receive_date}}" type="date" name="receive_date"
                                               class="form-control">
                                        @error('receive_date')
                                        <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Trạng thái:</label>
                                        <select name="status" class="form-control">
                                            <option value="0" @if($bill->status == 0) selected @endif>Pending</option>
                                            <option value="1" @if($bill->status == 1) selected @endif>Processing
                                            </option>
                                            <option value="2" @if($bill->status == 2) selected @endif>Done</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Phương thức thanh toán:</label>
                                        <select name="payment_type" class="form-control">
                                            <option value="1" @if($bill->payment_type == 1) selected @endif>Thanh toán
                                                trực tiếp
                                            </option>
                                            <option value="2" @if($bill->payment_type == 2) selected @endif>Chuyển
                                                khoản
                                            </option>
                                            <option value="3" @if($bill->payment_type == 3) selected @endif>Thanh toán
                                                online
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Ghi chú:</label>
                                        <input value="{{$bill->note}}" type="text" name="note" class="form-control">
                                        @error('note')
                                        <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="receiver bg-light p-3" style="border-radius: 5px">
                                    <h3>Thông tin người nhận hàng</h3>
                                    <div class="form-group">
                                        <label>Họ:</label>
                                        <input value="{{$receiver->lastname}}" type="text" name="receiver_lastname"
                                               class="form-control">
                                        @error('receiver_lastname')
                                        <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Tên:</label>
                                        <input value="{{$receiver->firstname}}" type="text" name="receiver_firstname"
                                               class="form-control">
                                        @error('receiver_firstname')
                                        <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Số điện thoại:</label>
                                        <input value="{{$receiver->phone}}" type="text" name="receiver_phone"
                                               class="form-control">
                                        @error('receiver_phone')
                                        <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Email:</label>
                                        <input value="{{$receiver->email}}" type="text" name="receiver_email"
                                               class="form-control">
                                        @error('receiver_email')
                                        <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Thành phố:</label>
                                        <input value="{{$receiver->city}}" type="text" name="receiver_city"
                                               class="form-control">
                                        @error('receiver_city')
                                        <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Quận/Huyện:</label>
                                        <input value="{{$receiver->district}}" type="text" name="receiver_district"
                                               class="form-control">
                                        @error('receiver_district')
                                        <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="bill bg-light p-3 my-5" style="border-radius: 5px">
                                    <h3>Sản phẩm trong đơn</h3>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Avatar</th>
                                                <th>Tên</th>
                                                <th>Đơn giá</th>
                                                <th>Số lượng</th>
                                                <th>Thành tiền</th>
                                                <th>Hành động</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($bill_items as $bill_item)
                                                <tr>
                                                    <td class="text-center"><img
                                                            src="
                                                        @foreach($products as $product)
                                                            @if($product->id == $bill_item->product_id)
                                                            @if($product->avatar)
                                                            {{asset('backend/images').'/'.$product->avatar}}
                                                            @else
                                                            {{asset('backend/images/product/default.png')}}
                                                            @endif
                                                            @endif
                                                            @endforeach
                                                                "
                                                            alt="" width="100" height="100"></td>
                                                    <td>
                                                        @foreach($products as $product)
                                                            @if($product->id == $bill_item->product_id)
                                                                {{$product->name}}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>{{number_format($bill_item->discount_price)}}đ</td>
                                                    <td>{{$bill_item->quantity}}</td>
                                                    <td>{{number_format($bill_item->total_price)}}đ</td>
                                                    <td>
                                                        <a class="btn btn-primary"
                                                           href="{{route('billItem.edit',$bill_item->id)}}">Sửa</a>
                                                        <a class="btn btn-danger"
                                                           href="{{route('billItem.destroy',$bill_item->id)}}"
                                                        >Xóa
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @if($buyer->id != $receiver->id)
                                <div class="col-md-6">
                                    <div class="buyer bg-light p-3 mb-3" style="border-radius: 5px">
                                        <h3>Thông tin người mua</h3>
                                        <div class="form-group">
                                            <label>Họ:</label>
                                            <input value="{{$buyer->lastname}}" type="text" name="buyer_lastname"
                                                   class="form-control">
                                            @error('buyer_lastname')
                                            <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Tên:</label>
                                            <input value="{{$buyer->firstname}}" type="text"
                                                   name="buyer_firstname"
                                                   class="form-control">
                                            @error('buyer_firstname')
                                            <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Số điện thoại:</label>
                                            <input value="{{$buyer->phone}}" type="text" name="buyer_phone"
                                                   class="form-control">
                                            @error('buyer_phone')
                                            <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Email:</label>
                                            <input value="{{$buyer->email}}" type="text" name="buyer_email"
                                                   class="form-control">
                                            @error('buyer_email')
                                            <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Thành phố:</label>
                                            <input value="{{$buyer->city}}" type="text" name="buyer_city"
                                                   class="form-control">
                                            @error('buyer_city')
                                            <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Quận/Huyện:</label>
                                            <input value="{{$buyer->district}}" type="text" name="buyer_district"
                                                   class="form-control">
                                            @error('buyer_district')
                                            <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </form>
                </div>
            </main>
            @include('backend.layouts.footer')
        </div>
    </div>
@endsection
