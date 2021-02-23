@extends('backend.layouts.admin_master')
@section('admin_content')



	<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Draft Customer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Customer</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

   <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-list"></i> Draft Customer List</h3>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Signup Date</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($customerdraft as $customdraft)

                  @php
                  $created = new Carbon\Carbon($customdraft->created_at);
                  $now = Carbon\Carbon::now();
                  $difference = ($created->diff($now)->days < 1)?'today':$created->diffForHumans($now);
                  @endphp
                  
                  <tr class="{{ $customdraft->id }}">
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $customdraft->name }}</td>
                    <td>{{ $customdraft->email }}</td>
                    <td>{{ $customdraft->mobile }}</td>
                    <td>{{ $difference }}</td>
                    <td><span class="badge badge-info">Published</span></td>
                    
                    <td>
                      
                      <a href="{{ route('customers.draft.delete') }}" id="delete" data-token="{{csrf_token()}}" data-id="{{$customdraft->id}}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                      
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