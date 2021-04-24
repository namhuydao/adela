<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Invoice</title>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(4) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
<div class="invoice-box">
    <table>
        <tr class="top">
            <td colspan="5">
                <table>
                    <tr>
                        <td class="title">
                            <img src="{{asset('site/images/logo/1.png')}}" style="width: 150px; max-width: 300px"/>
                        </td>
                        <td>
                            Invoice #: {{uniqid()}}<br/>
                            Created: {{\Carbon\Carbon::now()->toFormattedDateString() }}<br/>
                            Due: {{\Carbon\Carbon::now()->addDays(5)->toFormattedDateString() }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="5">
                <table>
                    <tr>
                        <td>
                            Adela, Inc.<br/>
                            19 Ngõ 77 Lãng Yên<br/>
                            Hai Bà Trưng, Hà Nội
                        </td>

                        <td>
                            {{$buyer->firstname . ' ' . $buyer->lastname}}.<br/>
                            {{$buyer->email}}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading">
            <td>Sản phẩm</td>
            <td>Đơn giá</td>
            <td>Số lượng</td>
            <td>Thành tiền</td>
        </tr>
        @php($total = 0)
        @foreach($bill_items as $bill_item)
        <tr class="item">

            <td>@foreach($products as $product)
                    @if($product->id == $bill_item->product_id)
                        {{$product->name}}
                    @endif
                @endforeach</td>
            <td>{{number_format($bill_item->discount_price)}}đ</td>
            <td style="text-align: center">{{$bill_item->quantity}}</td>
            <td>{{number_format($bill_item->total_price)}}đ</td>
            @php($total +=$bill_item->total_price)

        </tr>
        @endforeach

        <tr class="total">
            <td></td>
            <td></td>
            <td></td>
            <td>Tổng: {{number_format($total)}}đ</td>
        </tr>
    </table>
</div>
</body>
</html>
