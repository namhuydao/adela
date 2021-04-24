@extends(config('core.admin_theme').'.template')
@section('main')
    <?php
    if (\Auth::guard('admin')->user()->super_admin != 1) {
        //  Nếu ko phải super_admin thì truy vấn theo dữ liệu cty đó
        $whereCompany = 'company_id = ' . \Auth::guard('admin')->user()->last_company_id;
    } else {
        $whereCompany = '1 = 1';
    }


    $settings = \App\Models\Setting::whereIn('type', ['web_service'])->pluck('value', 'name')->toArray();
    $next_month = strftime('%m', strtotime(strtotime(date('m')) . " +1 month"));
    $last_month = strftime('%m', strtotime(strtotime(date('m')) . " -1 month"));

    // ====|Min|======|Now|=====|Closed|======|Max|======>
    $bill_warning = \Modules\WebBill\Models\Bill::select('service_id', 'customer_id', 'id', 'created_at', 'total_price', 'exp_price', 'expiry_date', 'domain', 'auto_extend')
        ->whereRaw($whereCompany)
        ->where('status', 1)->where('auto_extend', 1)
        ->where('expiry_date', '<>', Null)->where('expiry_date', '>=', date('Y-m-d', strtotime('-' . $settings['min_day'] . ' day')))
        ->where('expiry_date', '<=', date('Y-m-d', strtotime('+' . $settings['max_day'] . ' day')))->get();


    //  Mặc định lấy ngày đầu tháng
    $start_date = isset($_GET['start_date']) ? $_GET['start_date'] : date('Y-m-01');

    //  Mặc định lấy ngày hôm nay
    $end_date = isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d');

    $where = "created_at >= '" . $start_date . " 00:00:00' AND created_at <= '" . $end_date . " 23:59:59'";
    $whereRegistration = "registration_date >= '" . $start_date . " 00:00:00' AND registration_date <= '" . $end_date . " 23:59:59'";
    if (isset($_GET['admin_id']) && $_GET['admin_id'] != '') {
        $where .= " AND admin_id = " . $_GET['admin_id'];
        $whereRegistration .= " AND admin_id = " . $_GET['admin_id'];
    }
    ?>
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title bold uppercase">
                            Bộ lọc
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <form method="GET" action="" class="col-xs-12 col-md-12">
                        <div class="col-sm-3 col-md-3" style="display: inline-block; float: left;">
                            <div>
                                <?php $field = ['name' => 'admin_id', 'type' => 'select2_ajax_model', 'class' => '', 'label' => 'Nhân viên',
                                    'model' => \App\Models\Admin::class, 'display_field' => 'name', 'object' => 'admin', 'value' => @$_GET['admin_id'], 'where' => $whereCompany];
                                ?>
                                @include(config('core.admin_theme').".form.fields.".$field['type'], ['field' => $field])
                            </div>
                        </div>
                        <div class="col-sm-9 col-md-9" style="display: inline-block; float: left;">
                            <label style="">Từ ngày</label>
                            <input type="date"
                                   style=""
                                   name="start_date" value="{{ $start_date }}">
                            <label style="margin-left: 10px;">Đến ngày</label>
                            <input type="date"
                                   style=""
                                   name="end_date" value="{{ $end_date }}">
                            <input class="loc" type="submit" value="Lọc"
                                   style="padding:7px 0px 7px 0px;width:70px;margin:13px 0 0 10px;border:1px solid #ccc;border-radius: 4px;">
                            <a href="/admin/dashboard" class="loc">Xóa bộ lọc</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-lg-12 col-xl-12 col-lg-12 order-lg-1 order-xl-1">
                <!--begin:: Widgets/Finance Summary-->
                <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title bold uppercase">
                                Tổng quan hệ thống
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-widget12">
                            <div class="kt-widget12__content">
                                <div class="kt-widget12__item thong_ke_so">
                                    <div class="col-sm-3 kt-widget12__info">
                                        <span class="kt-widget12__desc">Tổng HĐ</span>
                                        <span class="kt-widget12__value">{{number_format(@\Modules\WebBill\Models\Bill::whereRaw($whereCompany)->whereRaw($whereRegistration)->count(), 0, '.', '.')}}</span>
                                    </div>

                                    <div class="col-sm-3 kt-widget12__info">
                                        <span class="kt-widget12__desc">Landingpage</span>
                                        <span class="kt-widget12__value">{{number_format(@\Modules\WebBill\Models\Bill::whereRaw($whereCompany)->whereRaw($whereRegistration)->where('service_id', 1)->where('status', 1)->count(), 0, '.', '.')}}</span>
                                    </div>

                                    <div class="col-sm-3 kt-widget12__info">
                                        <span class="kt-widget12__desc">Wordpress</span>
                                        <span class="kt-widget12__value">{{number_format(@\Modules\WebBill\Models\Bill::whereRaw($whereCompany)->whereRaw($whereRegistration)->where('service_id', 5)->where('status', 1)->count(), 0, '.', '.')}}</span>
                                    </div>
                                    <div class="col-sm-3 kt-widget12__info">
                                        <span class="kt-widget12__desc">Hosting</span>
                                        <span class="kt-widget12__value">{{number_format(@\Modules\WebBill\Models\Bill::whereRaw($whereCompany)->whereRaw($whereRegistration)->where('service_id', 2)->where('status', 1)->count(), 0, '.', '.')}}</span>
                                    </div>
                                    <div class="col-sm-3 kt-widget12__info">
                                        <span class="kt-widget12__desc">Tên miền</span>
                                        <span class="kt-widget12__value">{{number_format(@\Modules\WebBill\Models\Bill::whereRaw($whereCompany)->whereRaw($whereRegistration)->where('service_id', 3)->where('status', 1)->count(), 0, '.', '.')}}</span>
                                    </div>
                                    <div class="col-sm-3 kt-widget12__info">
                                        <span class="kt-widget12__desc">Email</span>
                                        <span class="kt-widget12__value">{{number_format(@\Modules\WebBill\Models\Bill::whereRaw($whereCompany)->whereRaw($whereRegistration)->where('service_id', 4)->where('status', 1)->count(), 0, '.', '.')}}</span>
                                    </div>
                                    <div class="col-sm-3 kt-widget12__info">
                                        <span class="kt-widget12__desc">Khác</span>
                                        <span class="kt-widget12__value">{{number_format(@\Modules\WebBill\Models\Bill::whereRaw($whereCompany)->whereRaw($whereRegistration)->where('service_id', 6)->where('status', 1)->count(), 0, '.', '.')}}</span>
                                    </div>
                                </div>
                                <div class="kt-widget12__item thong_ke_so">
                                    <div class="col-sm-3 kt-widget12__info">
                                        <span class="kt-widget12__desc">Tổng khách</span>
                                        <span class="kt-widget12__value">{{number_format(@\Modules\WebBill\Models\Bill::whereRaw($whereCompany)->whereRaw($where)->select('customer_name')->get()->count(), 0, '.', '.')}}</span>
                                    </div>
                                </div>
                                <div class="kt-widget12__item thong_ke_so">
                                    <div class="col-sm-3 kt-widget12__info">
                                        <span class="kt-widget12__desc">Doanh thu tổng</span>
                                        <?php
                                        $doanh_thu = \Modules\WebBill\Models\Bill::whereRaw($whereCompany)->whereRaw($whereRegistration)->sum('total_price');
                                        ?>
                                        <span class="kt-widget12__value">{{number_format($doanh_thu, 0, '.', '.')}}<sup>đ</sup></span>
                                    </div>
                                    <div class="col-sm-3 kt-widget12__info">
                                        <span class="kt-widget12__desc">Doanh thu từ quan hệ / Agency</span>
                                        <span class="kt-widget12__value">--<sup>đ</sup></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end:: Widgets/Finance Summary-->
            </div>

            <div class="col-xs-12 col-lg-12 col-xl-12 col-lg-12 order-lg-1 order-xl-1">
                <!--begin:: Widgets/Finance Summary-->
                <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title bold uppercase">
                                Từ marketing
                            </h3>
                            <?php
                            $nhan_vien_marketing_ids = \App\Models\RoleAdmin::leftJoin('roles', 'roles.id', '=', 'role_admin.role_id')->whereIn('roles.name', [
                                'marketing',
                            ])->pluck('role_admin.admin_id');
                            ?>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-widget12">
                            <div class="kt-widget12__content">
                                <div class="kt-widget12__item thong_ke_so">
                                    <div class="col-sm-3 kt-widget12__info">
                                        <span class="kt-widget12__desc">Tổng HĐ</span>
                                        <span class="kt-widget12__value">{{number_format(@\Modules\WebBill\Models\Bill::whereRaw($whereCompany)->whereRaw($whereRegistration)->where(function ($query) use ($nhan_vien_marketing_ids) {
                                            foreach ($nhan_vien_marketing_ids as $admin_id) {
                                                $query = $query->orWhere('marketer_ids', 'LIKE', '%|' . $admin_id . '|%');
                                            }
                                        })->count(), 0, '.', '.')}}</span>
                                    </div>

                                    <div class="col-sm-3 kt-widget12__info">
                                        <span class="kt-widget12__desc">Landingpage</span>
                                        <span class="kt-widget12__value">{{number_format(@\Modules\WebBill\Models\Bill::whereRaw($whereCompany)->whereRaw($whereRegistration)->where(function ($query) use ($nhan_vien_marketing_ids) {
                                            foreach ($nhan_vien_marketing_ids as $admin_id) {
                                                $query = $query->orWhere('marketer_ids', 'LIKE', '%|' . $admin_id . '|%');
                                            }
                                        })->where('service_id', 1)->where('status', 1)->count(), 0, '.', '.')}}</span>
                                    </div>
                                    <div class="col-sm-3 kt-widget12__info">
                                        <span class="kt-widget12__desc">Wordpress</span>
                                        <span class="kt-widget12__value">{{number_format(@\Modules\WebBill\Models\Bill::whereRaw($whereCompany)->whereRaw($whereRegistration)->where(function ($query) use ($nhan_vien_marketing_ids) {
                                            foreach ($nhan_vien_marketing_ids as $admin_id) {
                                                $query = $query->orWhere('marketer_ids', 'LIKE', '%|' . $admin_id . '|%');
                                            }
                                        })->where('service_id', 5)->where('status', 1)->count(), 0, '.', '.')}}</span>
                                    </div>
                                    <div class="col-sm-3 kt-widget12__info">
                                        <span class="kt-widget12__desc">Hosting</span>
                                        <span class="kt-widget12__value">{{number_format(@\Modules\WebBill\Models\Bill::whereRaw($whereCompany)->whereRaw($whereRegistration)->where(function ($query) use ($nhan_vien_marketing_ids) {
                                            foreach ($nhan_vien_marketing_ids as $admin_id) {
                                                $query = $query->orWhere('marketer_ids', 'LIKE', '%|' . $admin_id . '|%');
                                            }
                                        })->where('service_id', 2)->where('status', 1)->count(), 0, '.', '.')}}</span>
                                    </div>
                                    <div class="col-sm-3 kt-widget12__info">
                                        <span class="kt-widget12__desc">Tên miền</span>
                                        <span class="kt-widget12__value">{{number_format(@\Modules\WebBill\Models\Bill::whereRaw($whereCompany)->whereRaw($whereRegistration)->where(function ($query) use ($nhan_vien_marketing_ids) {
                                            foreach ($nhan_vien_marketing_ids as $admin_id) {
                                                $query = $query->orWhere('marketer_ids', 'LIKE', '%|' . $admin_id . '|%');
                                            }
                                        })->where('service_id', 3)->where('status', 1)->count(), 0, '.', '.')}}</span>
                                    </div>
                                    <div class="col-sm-3 kt-widget12__info">
                                        <span class="kt-widget12__desc">Khác</span>
                                        <span class="kt-widget12__value">{{number_format(@\Modules\WebBill\Models\Bill::whereRaw($whereCompany)->whereRaw($whereRegistration)->where(function ($query) use ($nhan_vien_marketing_ids) {
                                            foreach ($nhan_vien_marketing_ids as $admin_id) {
                                                $query = $query->orWhere('marketer_ids', 'LIKE', '%|' . $admin_id . '|%');
                                            }
                                        })->where('service_id', 6)->where('status', 1)->count(), 0, '.', '.')}}</span>
                                    </div>
                                </div>
                                <div class="kt-widget12__item thong_ke_so">
                                    <div class="col-sm-3 kt-widget12__info">
                                        <span class="kt-widget12__desc">Doanh thu từ Marketing</span>
                                        <?php
                                        $doanh_thu_marketing = \Modules\WebBill\Models\Bill::whereRaw($whereCompany)->whereRaw($whereRegistration)->where(function ($query) use ($nhan_vien_marketing_ids) {
                                            foreach ($nhan_vien_marketing_ids as $admin_id) {
                                                $query = $query->orWhere('marketer_ids', 'LIKE', '%|' . $admin_id . '|%');
                                            }
                                        })->sum('total_price');
                                        ?>
                                        <span class="kt-widget12__value">{{number_format($doanh_thu_marketing, 0, '.', '.')}}<sup>đ</sup> <small>({{ $doanh_thu != 0 ? (int) (($doanh_thu_marketing/$doanh_thu) * 100) : 0 }}%)</small></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end:: Widgets/Finance Summary-->
            </div>

            <div class="col-xl-12 order-lg-2 order-xl-1">
                <div class="kt-portlet kt-portlet--height-fluid kt-portlet--mobile ">
                    <div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title bold uppercase">
                                Nhắc nhở hợp đồng
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-wrapper">
                                <div class="kt-portlet__head-actions" style="display: flex; text-align: center">
                                    <div class="col-sm-6">
                                        <span class="kt-widget12__desc ">Tổng tiền gia hạn cần thu trong tháng này</span><br>
                                        <span class="kt-widget12__value font-weight-bold">{{number_format(\Modules\WebBill\Models\Bill::whereRaw($whereCompany)->where('expiry_date', 'like', date('Y') . '-' . date('m') . '-%')->where('auto_extend', 1)->get()->sum('exp_price'), 0, '.', '.')}}<sup>đ</sup></span>
                                    </div>

                                    <div class="col-sm-6">
                                        <span class="kt-widget12__desc">Tổng tiền gia hạn cần thu trong tháng sau</span><br>
                                        <span class="kt-widget12__value font-weight-bold">{{number_format(\Modules\WebBill\Models\Bill::whereRaw($whereCompany)->select('exp_price')->where('expiry_date', 'like', date('Y') . '-' . $next_month . '-%')->where('auto_extend', 1)->get()->sum('exp_price'), 0, '.', '.')}}<sup>đ</sup></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="kt-portlet__body kt-portlet__body--fit">
                        <!--begin: Datatable -->
                        <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--scroll kt-datatable--loaded"
                             id="kt_datatable_latest_orders" style="">
                            <table class="kt-datatable__table" style=" width: 100%;">
                                <thead class="kt-datatable__head" style="    overflow: unset;">
                                <tr class="kt-datatable__row" style="left: 0px;">
                                    <th class="kt-datatable__cell kt-datatable__cell--sort">
                                        <span style="width: 25px;">STT</span>
                                    </th>
                                    <th class="kt-datatable__cell kt-datatable__cell--sort">
                                        <span style="width: 100px;">Tên khách hàng</span>
                                    </th>
                                    <th class="kt-datatable__cell kt-datatable__cell--sort">
                                        <span style="width: 100px;">Dịch vụ</span></th>
                                    <th class="kt-datatable__cell kt-datatable__cell--sort">
                                        <span style="width: 200px;">Tên miền</span></th>

                                    <th class="kt-datatable__cell kt-datatable__cell--sort">
                                        <span style="width: 100px;">Giá</span>
                                    </th>
                                    <th class="kt-datatable__cell kt-datatable__cell--sort">
                                        <span style="width: 100px;">Ngày hết hạn</span>
                                    </th>
                                    <th class="kt-datatable__cell kt-datatable__cell--sort">
                                        <span style="width: 100px;">Giá gia hạn</span>
                                    </th>
                                    <th class="kt-datatable__cell kt-datatable__cell--sort">
                                        <span style="width: 100px;">Hủy gia hạn</span>
                                    </th>
                                    <th class="kt-datatable__cell kt-datatable__cell--sort">
                                        <span style="width: 50px;">Chi tiết</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="kt-datatable__body ps ps--active-y"
                                       style="">

                                {{--====|Min|===[EXPIRY_DATE]===|Now|=====|Closed|======|Max|======>--}}
                                {{-- Hợp đồng đã hết hạn. --}}
                                @if($bill_warning->count()>0)
                                    @foreach($bill_warning as $k=>$v)
                                        @if(strtotime($v->expiry_date) < time())
                                            <tr data-row="0" class="kt-datatable__row"
                                                style="left: 0px; background: tomato">
                                                <td data-field="ShipDate" class="kt-datatable__cell text-white">
                                                    <span style="width: 25px;"class="text-white">
                                                        <span class="kt-font-bold">{{$k+1}}</span>
                                                    </span>
                                                </td>

                                                <td data-field="ShipDate" class="kt-datatable__cell">
                                                    <span style="width: 100px;"class="text-white">
                                                        <a href="/admin/admin/{{ @$v->customer->id }}"><span
                                                                    class="kt-font-bold text-white  ">{{@$v->customer->name}}</span></a>
                                                    </span>
                                                </td>

                                                <td data-field="ShipDate" class="kt-datatable__cell">
                                                    <span style="width: 100px;"class="text-white">
                                                        <span class="kt-font-bold">{{@$v->service->name_vi}}</span>
                                                    </span>
                                                </td>

                                                <td data-field="ShipDate" class="kt-datatable__cell">
                                                    <span style="width: 200px;"class="text-white">
                                                        <span class="kt-font-bold">{{@$v->domain}}</span>
                                                    </span>
                                                </td>

                                                <td data-field="ShipDate" class="kt-datatable__cell">
                                                    <span style="width: 100px;"class="text-white">
                                                        <span class="kt-font-bold">{{number_format(@$v->total_price, 0, '.', '.')}}đ</span>
                                                    </span>
                                                </td>

                                                <td data-field="ShipDate" class="kt-datatable__cell">
                                                    <span style="width: 100px;"class="text-white">
                                                        <span class="kt-font-bold">{{date('d-m-Y',strtotime(@$v->expiry_date))}}</span>
                                                    </span>
                                                </td>

                                                <td data-field="ShipDate" class="kt-datatable__cell">
                                                    <span style="width: 100px;"class="text-white">
                                                        <span class="kt-font-bold">{{number_format(@$v->exp_price, 0, '.', '.')}}đ</span>
                                                    </span>
                                                </td>

                                                <td data-field="ShipDate" class="kt-datatable__cell">
                                                    <span style="width: 100px;"  class="text-white" >
                                                        <span class="fa fa-times-circle fa-2x cancel-extension text-white"
                                                              data-id="{{$v->id}}" style="cursor: pointer"></span>
                                                    </span>
                                                </td>
                                                <td data-field="ShipDate" class="kt-datatable__cell">
                                                        <span style="width: 50px;">
                                                            <a href="/admin/bill/{{$v->id}}"
                                                               class="btn btn-sm btn-label-brand btn-bold text-white">Xem</a>
                                                        </span>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endif

                                {{--====|Min|======|Now|====[EXPIRY_DATE]====|Closed|======|Max|======>--}}
                                {{--Hợp đồng sát hạn--}}
                                @if($bill_warning->count()>0)
                                    @foreach($bill_warning as $k=>$v)
                                        <?php

                                        //  Khoảng cách từ hnay đến ngày hết hạn expiry_date (đv : ngày)
                                        $day_check = (strtotime($v->expiry_date) - strtotime(date('Y-m-d'))) / (60 * 60 * 24);
                                        ?>
                                        @if(strtotime($v->expiry_date) >= time() && $day_check <= $settings['close_day'])
                                            <tr data-row="0" class="kt-datatable__row"
                                                style="left: 0px; background: LightSalmon">
                                                {{--                                                style="left: 0px; background: LightSalmon">--}}
                                                <td data-field="ShipDate" class="kt-datatable__cell">
                                                    <span style="width: 25px;">
                                                        <span class="kt-font-bold">{{$k+1}}</span>
                                                    </span>
                                                </td>

                                                <td data-field="ShipDate" class="kt-datatable__cell">
                                                    <span style="width: 100px;">
                                                        <a href="/admin/bill/{{$v->id}}"><span
                                                                    class="kt-font-bold ">{{@$v->customer->name}}</span></a>
                                                    </span>
                                                </td>

                                                <td data-field="ShipDate" class="kt-datatable__cell">
                                                    <span style="width: 100px;">
                                                        <span class="kt-font-bold">{{@$v->service->name_vi}}</span>
                                                    </span>
                                                </td>

                                                <td data-field="ShipDate" class="kt-datatable__cell">
                                                    <span style="width: 200px;">
                                                        <span class="kt-font-bold">{{@$v->domain}}</span>
                                                    </span>
                                                </td>

                                                <td data-field="ShipDate" class="kt-datatable__cell">
                                                    <span style="width: 100px;">
                                                        <span class="kt-font-bold">{{number_format(@$v->total_price, 0, '.', '.')}}đ</span>
                                                    </span>
                                                </td>

                                                <td data-field="ShipDate" class="kt-datatable__cell">
                                                    <span style="width: 100px;">
                                                        <span class="kt-font-bold">{{date('d-m-Y',strtotime(@$v->expiry_date))}}</span>
                                                    </span>
                                                </td>

                                                <td data-field="ShipDate" class="kt-datatable__cell">
                                                    <span style="width: 100px;">
                                                        <span class="kt-font-bold">{{number_format(@$v->exp_price, 0, '.', '.')}}đ</span>
                                                    </span>
                                                </td>

                                                <td data-field="ShipDate" class="kt-datatable__cell">
                                                    <span style="width: 100px;">
                                                        <span class="fa fa-times-circle fa-2x cancel-extension text-white"
                                                              data-id="{{$v->id}}" style="cursor: pointer"></span>
                                                    </span>
                                                </td>
                                                <td data-field="ShipDate" class="kt-datatable__cell">
                                                        <span style="width: 50px;">
                                                            <a href="/admin/bill/{{$v->id}}"
                                                               class="btn btn-sm btn-label-brand btn-bold">Xem</a>
                                                        </span>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endif

                                {{--====|Min|======|Now|========|Closed|=====[EXPIRY_DATE]====|Max|======>--}}
                                {{--Báo trước các Hợp đồng tiếp theo hết hạn--}}
                                @if($bill_warning->count()>0)
                                    @foreach($bill_warning as $k=>$v)
                                        <?php
                                        //  Khoảng cách từ hnay đến hạn deadline expiry_date
                                        $day_check = (strtotime($v->expiry_date) - strtotime(date('Y-m-d'))) / (60 * 60 * 24);
                                        ?>
                                        @if($day_check > $settings['close_day'])
                                            <tr data-row="0" class="kt-datatable__row"
                                                style="left: 0px; background: MistyRose;">
                                                <td data-field="ShipDate" class="kt-datatable__cell">
                                                    <span style="width: 25px;">
                                                        <span class="kt-font-bold">{{$k+1}}</span>
                                                    </span>
                                                </td>

                                                <td data-field="ShipDate" class="kt-datatable__cell">
                                                    <span style="width: 100px;">
                                                        <a href="/admin/bill/{{$v->id}}"><span
                                                                    class="kt-font-bold">{{@$v->customer->name}}</span></a>
                                                    </span>
                                                </td>

                                                <td data-field="ShipDate" class="kt-datatable__cell">
                                                    <span style="width: 100px;">
                                                        <span class="kt-font-bold">{{@$v->service->name_vi}}</span>
                                                    </span>
                                                </td>

                                                <td data-field="ShipDate" class="kt-datatable__cell">
                                                    <span style="width: 200px;">
                                                        <span class="kt-font-bold">{{@$v->domain}}</span>
                                                    </span>
                                                </td>

                                                <td data-field="ShipDate" class="kt-datatable__cell">
                                                    <span style="width: 100px;">
                                                        <span class="kt-font-bold">{{number_format(@$v->total_price, 0, '.', '.')}}đ</span>
                                                    </span>
                                                </td>


                                                <td data-field="ShipDate" class="kt-datatable__cell">
                                                    <span style="width: 100px;">
                                                        <span class="kt-font-bold">{{date('d-m-Y',strtotime(@$v->expiry_date))}}</span>
                                                    </span>
                                                </td>

                                                <td data-field="ShipDate" class="kt-datatable__cell">
                                                    <span style="width: 100px;">
                                                        <span class="kt-font-bold">{{number_format(@$v->exp_price, 0, '.', '.')}}đ</span>
                                                    </span>
                                                </td>
                                                <td data-field="ShipDate" class="kt-datatable__cell">
                                                    <span style="width: 100px;">
                                                        <span class="fa fa-times-circle fa-2x cancel-extension"
                                                              data-id="{{$v->id}}" style="cursor: pointer"></span>
                                                    </span>
                                                </td>
                                                <td data-field="ShipDate" class="kt-datatable__cell">
                                                        <span style="width: 50px;">
                                                            <a href="/admin/bill/{{$v->id}}"
                                                               class="btn btn-sm btn-label-brand btn-bold">Xem</a>
                                                        </span>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <!--end: Datatable -->
                        {{--                        <div class="paginate">{{$bill_warning->render()}}</div>--}}
                    </div>

                </div>
            </div>

            {{-- Thống kê Hợp đồng & Tiền theo thời gian --}}
            <div class="col-xl-12 order-lg-2 order-xl-1">
                <div class="kt-portlet kt-portlet--height-fluid kt-portlet--mobile ">
                    <div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title bold uppercase">
                                Thống kê Hợp đồng & Tiền theo thời gian
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body kt-portlet__body--fit">

                        <!--end: Datatable -->
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('custom_head')
    {{--    <link href="https://www.keenthemes.com/preview/metronic/theme/assets/global/css/components.min.css" rel="stylesheet"--}}
    {{--          type="text/css">--}}
    <style type="text/css">
        .kt-datatable__cell > span > a.cate {
            color: #5867dd;
            margin-bottom: 3px;
            background: rgba(88, 103, 221, 0.1);
            height: auto;
            display: inline-block;
            width: auto;
            padding: 0.15rem 0.75rem;
            border-radius: 2px;
        }

        .paginate > ul.pagination > li {
            padding: 5px 10px;
            border: 1px solid #ccc;
            margin: 0 5px;
            cursor: pointer;
        }

        .paginate > ul.pagination span {
            color: #000;
        }

        .paginate > ul.pagination > li.active {
            background: #0b57d5;
            color: #fff !important;
        }

        .paginate > ul.pagination > li.active span {
            color: #fff !important;
        }

        .kt-widget12__desc, .kt-widget12__value {
            text-align: center;
        }

        @-webkit-keyframes chartjs-render-animation {
            from {
                opacity: 0.99 list_user
            }
            to {
                opacity: 1
            }
        }

        @keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }
            to {
                opacity: 1
            }
        }

        .chartjs-render-monitor {
            -webkit-animation: chartjs-render-animation 0.001s;
            animation: chartjs-render-animation 0.001s;
        }

        canvas {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }
    </style>
    <style type="text/css">
        @-webkit-keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }
            to {
                opacity: 1
            }
        }

        @keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }
            to {
                opacity: 1
            }
        }

        .chartjs-render-monitor {
            -webkit-animation: chartjs-render-animation 0.001s;
            animation: chartjs-render-animation 0.001s;
        }

        canvas {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }


        @media (max-width: 768px) {
            .kt-widget12 .kt-widget12__content .thong_ke_so {
                display: inline-block;
            }

            .thong_ke_so .col-sm-3 {
                display: inline-block;
                width: 50%;
                float: left;
                padding: 0;
                margin-bottom: 20px;
            }
        }
    </style>

@endsection
@push('scripts')
    <script src="{{ url('public/libs/chartjs/js/Chart.bundle.js') }}"></script>
    <script src="{{ url('public/libs/chartjs/js/utils.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script>
        $(document).ready(function () {
            $('#active_service a').click(function (event) {
                event.preventDefault();
                var object = $(this);
                $.ajax({
                    url: '/admin/service_history/ajax-publish',
                    data: {
                        id: object.data('service_history_id')
                    },
                    success: function (result) {
                        if (result.status == true) {
                            toastr.success(result.msg);
                            object.parents('tr').remove();
                        } else {
                            toastr.error(result.msg);
                        }
                    },
                    error: function (e) {
                        console.log(e.message);
                    }
                })
            });
            $('.cancel-extension ').click(function (event) {

                var id = $(this).data('id');
                $.ajax({
                    url: '{{route('dashboard.cancel_extension')}}',
                    data: {
                        id: id
                    },
                    success: function (result) {
                        if (result.status == true) {
                            toastr.success(result.msg);
                            location.reload();
                        } else {
                            toastr.error(result.msg);
                        }
                    },
                    error: function (e) {
                        console.log(e.message);
                    }
                })
            });
        })
    </script>

    <script>
            <?php
            $char = \Modules\WebBill\Models\Bill::whereRaw($whereCompany)->selectRaw('Sum(total_price) as total_price, COUNT(id) as total_bill, MONTH(registration_date) as month')
                ->where('registration_date', '>=', date('Y-m-d 00:00:00', strtotime('-11 month')))->where('registration_date', '<=', date('Y-m-d 23:59:00'))->groupBy(\DB::raw('MONTH(registration_date)'))->orderBy('registration_date', 'asc')->get();

            $admin_ids = \App\Models\RoleAdmin::whereRaw($whereCompany)->where('role_id', '!=', 3)->where('role_id', '!=', 4)->pluck('admin_id');
            $char_user = \App\Models\Admin::whereRaw($whereCompany)->selectRaw('COUNT(id) as total, MONTH(created_at) as month')
                ->where('created_at', '>=', date('Y-m-d 00:00:00', strtotime('-11 month')))->where('created_at', '<=', date('Y-m-d 23:59:00'))->whereNotIn('id', $admin_ids)->groupBy(\DB::raw('MONTH(created_at)'))->orderBy('created_at', 'asc')->get()->toArray();

            if (count($char_user) < 11) {
                $arr = [];
                for ($i = 11; $i > count($char_user); $i--) {
                    $arr[] = 0;
                }
                $char_user = array_merge($arr, $char_user);
            }

            ?>
        var lineChartData = {
                labels: [
                    @foreach($char as $item)
                        'T{{ $item->month }}',
                    @endforeach
                ],
                datasets: [{
                    label: 'Số Hợp đồng',
                    borderColor: window.chartColors.red,
                    backgroundColor: window.chartColors.red,
                    fill: false,
                    data: [
                        //    dữ liệu của số lượng Hợp đồng
                        @foreach($char as $item)
                            '{{ $item->total_bill }}',
                        @endforeach
                    ],
                    yAxisID: 'y-axis-1',
                }, {
                    label: 'Số tiền (đv: triệu)',
                    borderColor: window.chartColors.blue,
                    backgroundColor: window.chartColors.blue,
                    fill: false,
                    data: [
                        //    dữ liệu số tiên thu được theo tháng
                        @foreach($char as $item)
                            '{{ round($item->total_price/1000000) }}',
                        @endforeach
                    ],
                    yAxisID: 'y-axis-2'
                }, {
                    label: 'Số khách mới',
                    borderColor: window.chartColors.green,
                    backgroundColor: window.chartColors.green,
                    fill: false,
                    data: [
                        //    dữ liệu số tiên thu được theo tháng
                        @foreach($char_user as $item)
                            '{{ round($item['total']) }}',
                        @endforeach
                    ],
                    yAxisID: 'y-axis-3'
                }]
            };

        window.onload = function () {
            var ctx = document.getElementById('myChart').getContext('2d');
            window.myLine = Chart.Line(ctx, {
                data: lineChartData,
                options: {
                    responsive: true,
                    hoverMode: 'index',
                    stacked: false,
                    title: {
                        display: true,
                        // text: 'Chart.js Line Chart - Multi Axis'
                    },
                    scales: {
                        yAxes: [{
                            type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                            display: true,
                            position: 'left',
                            id: 'y-axis-1',
                            ticks: {
                                beginAtZero: true,
                            }

                        }, {
                            type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                            display: true,
                            position: 'right',
                            id: 'y-axis-2',
                            ticks: {
                                beginAtZero: true,
                            },
                            // grid line settings
                            gridLines: {
                                drawOnChartArea: false, // only want the grid lines for one axis to show up
                            },
                        }, {
                            type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                            display: true,
                            position: 'left',
                            id: 'y-axis-3',
                            ticks: {
                                beginAtZero: true,
                            },
                            // grid line settings
                            gridLines: {
                                drawOnChartArea: false, // only want the grid lines for one axis to show up
                            },
                        }],
                    }
                }
            });
        };
    </script>
@endpush

