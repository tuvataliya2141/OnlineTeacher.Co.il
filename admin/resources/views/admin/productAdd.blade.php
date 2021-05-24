@extends('admin.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Product </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('product') }}">product</a></li>
            <li class="breadcrumb-item active">Add Product </li>
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
              <h3 class="card-title">Add Product</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="#" enctype="multipart/form-data" name="addProduct" id="addProduct">
              {{ csrf_field() }}

              <div class="card-body">

                <div class="alert alert-danger print-error-msg" style="display:none">
                  <ul></ul>
                </div>

                <div class="form-group col-sm-12 row">
                  <label for="txtCategory" class="col-sm-2 mt-1  col-form-label ">Category </label>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <select onchange="get_subcategory(value)" class="custom-select {{ ($errors->any() && $errors->first('category')) ? 'is-invalid' : '' }}" name="category">
                        <option value=""> Select Category </option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}" {{ old('category') == $category->id  ? 'selected' : ''}}> {{$category->name}} </option>
                        @endforeach
                      </select>
                      @if($errors->any())
                      <p class="invalid-feedback">{{$errors->first('category')}}</p>
                      @endif
                    </div>
                  </div>



                </div>

                <div class="form-group col-sm-12 row">
                  <label for="txtCategory" class="col-sm-2 mt-1 col-form-label  ">Sub-Category </label>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <select id="subcategory_id" class="form-control   {{ ($errors->any() && $errors->first('subcategory')) ? 'is-invalid' : '' }}" name="subcategory" id="parent_id">
                        <option value=""> Select SubCategory </option>
                        @foreach($subcategories as $subcategory)
                        <option value="{{$subcategory->id}}" {{ old('subcategory') == $subcategory->id  ? 'selected' : ''}}> {{$subcategory->name}} </option>
                        @endforeach
                      </select>
                      @if($errors->any())
                      <p class="invalid-feedback">{{$errors->first('subcategory')}}</p>
                      @endif
                    </div>
                  </div>

                </div>

                <!-- onchange="fetch_related_products();" -->


                <div class="form-group row ">
                  <div class="col-sm-2 mt-1">
                    <label for="txtName"> Product Name </label>
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

                  <label for="Quantity" class="col-sm-2 mt-1 col-form-label ">Quantity</label>
                  <div class="col-sm-3">
                    <input type="text" name="quantity" id="quantity" value="" class="form-control {{ ($errors->any() && $errors->first('quantity')) ? 'is-invalid' : '' }}  " placeholder="Enter quantity">
                    @if($errors->any())
                    <p class="invalid-feedback">{{$errors->first('quantity')}}</p>
                    @endif
                  </div>

                  <br>



                </div>

                <div class="form-group  col-sm-12 row">
                  <label for="Slug" class="col-sm-2 mt-1 col-form-label ">Slug</label>
                  <div class="col-sm-3">
                    <input type="text" name="slug" id="slug" readonly value="" class="form-control {{ ($errors->any() && $errors->first('slug')) ? 'is-invalid' : '' }}  " placeholder="">
                    @if($errors->any())
                    <p class="invalid-feedback">{{$errors->first('slug')}}</p>
                    @endif
                  </div>
                </div>

                <div class="form-group  col-sm-12 row">
                  <label for="related" class="col-sm-2 mt-1 col-form-label ">Related Products</label>
                  <div class="col-sm-10">
                    <select class="js-example-basic-multiple select2" id="related_products" name="related_products[]" multiple="multiple">
                      <!-- <option value="AL">Alabama</option>
                      <option value="WY">Wyoming</option> -->
                    </select>


                  </div>
                </div>






                <!-- <div class="form-group  col-sm-12 row">
                  <label for="Descrption" class="col-sm-2 mt-1 col-form-label ">Descrption</label>
                  <div class="col-sm-10"> -->
                <!-- <input type="text" name="description" id="description" value="" class="form-control {{ ($errors->any() && $errors->first('description')) ? 'is-invalid' : '' }}  " placeholder="Enter Description"> -->


                <!-- <textarea name="description" id="description" class="form-control {{ ($errors->any() && $errors->first('description')) ? 'is-invalid' : '' }}  " cols="30" rows="10" placeholder="Enter Description">

                    </textarea>
                    @if($errors->any())
                    <p class="invalid-feedback">{{$errors->first('description')}}</p><br>
                    @endif
                  </div>
                </div> -->


                <div class="form-group  col-sm-12 row">
                  <label for="Descrption" class="col-sm-2 mt-1 col-form-label ">Descrption</label>
                  <!-- <div class="card-tools text-right">
                    <button type="button" class="btn btn-tool btn-sm" style="color:#ccc;" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool btn-sm" style="color:#ccc;" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fas fa-times"></i></button>
                  </div> -->


                </div>
                <div class="form-group  col-sm-12 row">
                  <div class="card-body pad">
                    <div class="mb-0">

                      <textarea name="description" class="textarea {{ ($errors->any() && $errors->first('description')) ? 'is-invalid' : '' }}" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 12px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">  </textarea>
                      @if($errors->any())
                      <p class="invalid-feedback">{{$errors->first('description')}}</p>
                      @endif
                    </div>
                    <!-- <p class="text-sm mb-0 text-right">
                                            <button type="submit" class="btn btn-primary">Add</button>  
                                        </p> -->
                  </div>
                </div>






                <div class="row">
                  <table id="product_image_tbl" class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr>
                        <td class="text-left">Image</td>
                        <td class="text-left">Sort Order</td>
                        <td class="text-left">Status</td>
                        <td></td>
                      </tr>
                    </thead>
                    <tbody>
                      <td class="text-left">
                        <label><input type="file" style="display:none" name="image_arr[0]" class="fileUpload" data-row="0">

                          <img class="img-thumbnail" id="productImg0" src="{{asset('public/images/no_image-100x100.png')}}" alt="" title="" data-placeholder="" style="height: 110px; width: 110px;"></label>

                      </td>

                      <td class="text-right">
                        <input type="hidden" name="product_image[0][product_img_id]" value=""><input type="hidden" name="product_image[0][product_img_value]" value=""><input type="text" name="product_image[0][sort_order]" value="" placeholder="Sort Order" class="form-control"></td>

                      <td class="text-right">
                        <select class="form-control" id="status" name="product_image[0][status]">
                          <option value="1">Enable</option>
                          <option value="0">Disable</option>
                        </select></td>
                      <td class="text-center"><button type="button" onclick="$('#image-row0').remove();" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Remove"><i class="fa fa-minus-circle"></i></button></td>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="3"></td>
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
    $("#product_image_tbl tbody").append('<tr id="image-row' + counter + '"><td class="text-left"><label><input type="file" style="display:none" name="image_arr[' + counter + ']" class="fileUpload" data-row="' + counter + '"></lable><img class="img-thumbnail" id="productImg' + counter + '" src="' + BASE_URL + '/public/images/no_image-100x100.png" alt="" title="" ></td><td class="text-right"><input type="hidden" name="product_image[' + counter + '][product_img_id]" value=""><input type="text" name="product_image[' + counter + '][sort_order]" value="" placeholder="Sort Order" class="form-control"></td><td class="text-right"><select class="form-control" id="status" name="product_image[' + counter + '][status]"><option value="1">Enable</option><option value="0">Disable</option></select></td><td class="text-center"><button type="button" onclick="$(\'#image-row' + counter + '\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td></tr>');
    counter++;
    $(this).data('counter', counter);
    $('[data-toggle="tooltip"]').tooltip();
    $('.select2').select2();
  });

  // Product Image Preview
  $(document).on("change", ".fileUpload", function() {
    var row = $(this).data("row");
    console.log("row", row);
    if (this.files && this.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#productImg' + row).attr('src', e.target.result).height(100).width(100);
      }
      reader.readAsDataURL(this.files[0]);
    }
  });

  function ToLower(slug) {
    var t = slug.value;
    s = t.replace(/\s/g, '-').toLowerCase();
    $('#slug').val(s);
  }
</script>