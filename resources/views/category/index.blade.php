@extends('layouts.app')
@section('title', 'Category')
@section('content')
<div class="clearfix"></div>
 @if ($message = Session::get('success'))
        <div class="alert alert-success ">
            <p>{{ $message }}</p>
        </div>
    @endif
 @if ($message = Session::get('deleted'))
        <div class="alert alert-danger ">
            <p>{{ $message }}</p>
        </div>
    @endif
 @if ($message = Session::get('updated'))
        <div class="alert alert-info ">
            <p>{{ $message }}</p>
        </div>
    @endif
 @if ($message = Session::get('error'))
    <div class="alert alert-info ">
        <p>{{ $message }}</p>
    </div>
@endif
    <div class="card-header row mx-0">
        <h4 class="mb-0 my-auto col-6">
            List of Category
        </h4>
        <h5 class="mb-0 my-auto text-right col-6">
            <a class="btn btn-success" href="{{ route('category.create') }}"> Add Category</a>
        </h5>
    </div>
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>S.No.</th>
                <th>Category Name</th>
                <th>Category Description</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1;?>
                @foreach ($categorys as $category)
                    <tr role="row" class="odd">
                        <td>{{  $i++ }}</td>
                        <td>{{ $category->category_name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                        <form action="{{ route('category.destroy',$category->id) }}" method="POST">
                            <a class="btn btn-primary" href="{{ route('category.edit',$category->id) }}">Edit</a>
                            {{ csrf_field() }}
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
