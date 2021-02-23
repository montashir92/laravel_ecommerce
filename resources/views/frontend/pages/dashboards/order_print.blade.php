<!DOCTYPE html>
<html>
    <head>
        <title>Customer Invoice</title>
        
        <style type="text/css">
            
            .mytable tr td{
                padding: 10px;
            }
        </style>
    </head>

    <body>
    <center>
        <table class="mytable" width="900" border="1">
            <tr style="text-align: center;">
                <td width="30%">
                    <img src="{{ asset('public/frontend') }}/images/logo/logo.png" alt="IMG-LOGO">
                </td>
                <td width="40%">
                    <h3><strong>FurnishFuniture</strong></h3>
                    <span><strong>Mobile No : </strong>01723344556</span><br>
                    <span><strong>Email : </strong>laraveldevelopment2@gmail.com</span><br>
                    <span><strong>Address : </strong>Uttara sectore-12, Dhaka: 1230</span>
                </td>
                <td width="30%"><strong>Order No : </strong>#{{ $orders->order_no }}</td>
            </tr>

            <tr style="text-align: center;">
                <td><strong>Billing Information</strong></td>
                <td colspan="2" style="text-align: left;">
                    <strong>Name : </strong> {{ $orders->shipping->name }} &nbsp;&nbsp;&nbsp;
                    <strong>Email : </strong> {{ $orders->shipping->email }}<br>
                    <strong>Mobile : </strong> {{ $orders->shipping->mobile }}&nbsp;&nbsp;&nbsp;
                    <strong>Address : </strong> {{ $orders->shipping->address }}<br>
                    <strong>Payment Method : </strong> {{ $orders->payment->payment_method }}
                    @if($orders->payment->payment_method == "bkash")
                    (Transaction No : {{ $orders->payment->transaction_no }})
                    @endif
                </td>
            </tr>

            <tr style="text-align: center;">
                <td colspan="3"><h3><strong>Order Details</strong></h3></td>
            </tr>

            <tr style="text-align: center;">
                <td><strong>Product name & Image</strong></td>
                <td><strong>Color & Size</strong></td>
                <td><strong>Quantity & Price</strong></td>
            </tr>
            @foreach($orders->order_details as $detail)
            <tr style="text-align: center;">
                <td>
                    <img src="{{ asset('images/products/'.$detail->product->image) }}" width="50" height="50" alt="">&nbsp;&nbsp;
                    {{ $detail->product->name }}
                </td>

                <td>
                    <strong>Color : </strong>{{ $detail->color->name }}
                    & 
                    <strong>Size : </strong>{{ $detail->size->name }}
                </td>
                <td>
                    @php
                    $total = $detail->quantity * $detail->product->price;
                    @endphp
                    {{ $detail->quantity }} x ${{ $detail->product->price }} = $<?php echo number_format($total, 2); ?>
                </td>
            </tr>
            @endforeach

            <tr style="text-align: center;">
                <td colspan="2" style="text-align: right;"><strong>Grand Total = </strong></td>
                <td><strong>$<?php echo number_format($orders->order_total, 2); ?> /-</strong></td>
            </tr>
        </table>
    </center>
</body>
</html>
