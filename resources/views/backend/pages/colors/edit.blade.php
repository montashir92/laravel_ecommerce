@extends('backend.layouts.admin_master')
@section('admin_content')


  <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Color</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Color</li>
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
                <h3 class="card-title"><i class="fas fa-edit"></i> Update Color</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <form action="{{ route('admin.color.update', $color->id) }}" method="post" id="myForm">
                    @csrf
                    
                    <div class="form-group row">
                      <label for="name" class="col-sm-2 col-form-label">Color Name</label>
                      <div class="col-sm-10">
                          <input type="text" name="name" value="{{ $color->name }}" class="form-control" id="name">
                      </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                          <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Update change</button>
                          <button type="reset" class="btn btn-secondary"><i class="fas fa-times"></i> Clear</button>
                        </div>
                    </div>
                    
                </form>
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

<script type="text/javascript">
$(document).ready(function () {
  
  $('#myForm').validate({
    rules: {
      name: {
        required: true
      }
    },
    messages: {
      name: {
        required: "Please enter a Color Name"
      }
      
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
@endsection

