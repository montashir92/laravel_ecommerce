@extends('backend.layouts.admin_master')
@section('admin_content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Manage Approved Order</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Approved</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-list"></i> Approved Order List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Order No</th>
                                    <th>Total Amount</th>
                                    <th>Payment Method</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                
                                
                                <tr class="{{ $order->id }}">
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>#{{ $order->order_no }}</td>
                                    <td>$<?php echo number_format($order->order_total, 2); ?></td>
                                    <td>
                                        {{ $order->payment->payment_method }}
                                        @if($order->payment->payment_method == "bkash")
                                        (Transaction : {{ $order->payment->transaction_no }})
                                        @endif
                                    </td>
                                    <td>
                                        @if($order->status == 0)
                                        <span class="badge badge-warning">Unapproved</span>
                                        @elseif($order->status == 1)
                                        <span class="badge badge-success">Approved</span>
                                        @endif
                                    </td>
                                    <td>
                                        
                                        <a href="{{ route('admin.order.details', $order->id) }}" title="Details" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                        
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                            
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>

@endsection


@section('admin_script')
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection
