@extends('admin.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Plan </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('plan') }}">Plan</a></li>
            <li class="breadcrumb-item active">Add Plan </li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Add Plan</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="#" enctype="multipart/form-data" name="addProduct" id="addPlan">
              {{ csrf_field() }}

              <div class="card-body">

                <div class="alert alert-danger print-error-msg" style="display:none">
                  <ul></ul>
                </div>

  


                <div class="form-group row ">
                  <div class="col-sm-2 mt-1">
                    <label for="txtName"> Plan Name </label>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" id="txtName" name="name" value="{{old('name')}}" class="form-control {{ ($errors->any() && $errors->first('name')) ? 'is-invalid' : '' }}" placeholder="Enter Product Name" onkeyup="ToLower(this)">

                    @if($errors->any())
                    <p class="invalid-feedback">{{$errors->first('name')}}</p>
                    @endif
                  </div>
                </div>

                <div class="form-group col-sm-12 row">

                  <label for="Price" class="col-sm-2 mt-1 col-form-label ">Price</label>
                  <div class="col-sm-3">
                    <input type="text" name="price" id="price" value="" class="form-control {{ ($errors->any() && $errors->first('price')) ? 'is-invalid' : '' }}  " placeholder="Enter price">
                    @if($errors->any())
                    <p class="invalid-feedback">{{$errors->first('price')}}</p>
                    @endif
                  </div>

                  <br>



                </div>

 
             <div class="form-group col-sm-12 row">

<label for="Price" class="col-sm-2 mt-1 col-form-label ">Description</label>
<div class="col-sm-3">
  <input type="text" name="description" id="description" value="" class="form-control {{ ($errors->any() && $errors->first('description')) ? 'is-invalid' : '' }}  " placeholder="Enter description">
  @if($errors->any())
  <p class="invalid-feedback">{{$errors->first('description')}}</p>
  @endif
</div>

<br>








                <div class="row col-sm-12">
                <br>

                  <table id="product_image_tbl" class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr>
                    
                        <td class="text-left"><b>Feature</b> </td>
                      
                        <td></td>
                      </tr>
                    </thead>
                    <tbody>



                      <td class="text-right">
                       <input type="text" name="product_image[0][plan_feature]" value="" placeholder="Enter Feature" class="form-control"></td>

                
                      <td class="text-center"><button type="button" onclick="$('#image-row0').remove();" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Remove"><i class="fa fa-minus-circle"></i></button></td>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="1"></td>
                        <td class="text-center"><button type="button" data-toggle="tooltip" title="" class="btn btn-primary addProductImgRow" data-counter="1" data-original-title="Add Image"><i class="fa fa-plus-circle"></i></button></td>
                      </tr>
                    </tfoot>
                  </table>


                </div>






              </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-primary " onclick="history.go(-1);">Cancel </button>
          </div>
          </form>

          <!-- /.card -->

        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])


@endsection

@section('scripts')




<script>
  $(document).ready(function() {

    fetch_related_products();

  });
</script>
@endsection

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script>
  $(document).on("click", ".addProductImgRow", function() {
    var counter = $(this).data('counter');
    $("#product_image_tbl tbody").append('<tr id="image-row' + counter + '"><td class="text-right"><input type="text" name="product_image[' + counter + '][plan_feature]" value="" placeholder="Enter Feature" class="form-control"></td><<td class="text-center"><button type="button" onclick="$(\'#image-row' + counter + '\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td></tr>');
    counter++;
    $(this).data('counter', counter);
    $('[data-toggle="tooltip"]').tooltip();
    $('.select2').select2();
  });



</script>