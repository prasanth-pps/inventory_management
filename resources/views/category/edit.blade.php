@extends('layouts.app')
@section('title', 'Category')
@section('content')
<div class="clearfix"></div>
@if ($message = Session::get('already'))
    <div class="alert alert-danger ">
        <p>{{ $message }}</p>
    </div>
@endif
  <div class="card-header row mx-0">
    <h4 class="mb-0 my-auto col-6">
      Edit Category               
    </h4>
    <h5 class="mb-0 my-auto text-right col-6">
    <a class="btn btn-success" href="{{ route('category.index') }}"> List Of Category</a>
    </h5>
</div>
    <div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <form class="form-horizontal form-label-left" role="form" action="{{ route('category.update',$category->id) }}" method="POST">
    {{ csrf_field() }}
    @method('PUT')
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Category Name <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12 {{ $errors->has('category_name') ? 'has-error' : '' }}">
              <input type="text" id="name" class="form-control col-md-7 col-xs-12" name="category_name" value="{{old('category_name', $category->category_name)}}" required="required">
              <span class="error_line">{{$errors->first('category_name')}}</span>
            </div>
        </div>

        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Description</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <textarea id="textarea" name="description" class="form-control col-md-7 col-xs-12"  placeholder="">{{ $category->description }}</textarea>
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-6 col-md-offset-3">
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('category.index') }}" class="btn btn-danger">Cancel</a>
          </div>
        </div>
      </form>
      </div>
@endsection
