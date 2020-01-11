@extends('layouts.app')
@section('title', 'Product')
@section('content')
<div class="clearfix"></div>
@if($message = Session::get('already'))
    <div class="alert alert-danger">
        <p>{{ $message }} <span class="float-right">X</span></p>
    </div>
@endif

      <div class="card-header row mx-0">
          <h4 class="mb-0 my-auto col-6">
            Add Product               
          </h4>
          <h5 class="mb-0 my-auto text-right col-6">
            <a href="{{ route('product.index') }}" class="btn btn-success">List Of Product</a>                
          </h5>
      </div>
      <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
          <form class="form-horizontal form-label-left form-val" role="form" action="{{ route('product.store') }}" method="POST">
          {{ csrf_field() }}
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Select Category <span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <Select  class="form-control col-md-7 col-xs-12 search-list" name="category_id" required>
                    <option value=""> Select Category </option>
                    @foreach($categorys as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') }}>{{$category->category_name}}</option>
                    @endforeach
                    </select>
                    <span class="error_line">{{$errors->first('category_name')}}</span>
                  </div>
              </div>
              <div class=" form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Product Name <span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="name" class="form-control col-md-7 col-xs-12" name="product_name" onkeypress="return blockSpecialChar(event)" placeholder="Enter Product Name" value="{{ old('product_name') }}" required>
                    <span class="error_line">{{$errors->first('product_name')}}</span>
                  </div>
              </div>
              <div class=" form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Product Code <span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" onkeypress="return blockSpecialChar(event)" name="product_code"  value="{{ old('product_code') }}" placeholder="Enter Product Code">
                    <span class="error_line">{{$errors->first('product_code')}}</span>
                  </div>
              </div>
              <div class=" form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">HSN Code </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text"  class="form-control col-md-7 col-xs-12" onkeypress="return blockSpecialChar(event)" name="hsn"  value="{{ old('hsn') }}" placeholder="Enter HSN Code">
                    <span class="error_line">{{$errors->first('hsn')}}</span>
                  </div>
              </div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{ route('product.index') }}" class="btn btn-danger">Cancel</a>
                </div>
              </div>
            </form>
          </div>
<script type="text/javascript">
$(document).ready(function() {
    $('.dropdown-sr').select2();
});


</script>
@endsection
