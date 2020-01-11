@extends('layouts.app')
@section('title', 'Product')
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
    <div class="card-header row mx-0">
    <h4 class="mb-0 my-auto col-6">
        List of Product
    </h4>
    <h5 class="mb-0 my-auto text-right col-6">
        <a class="btn btn-success" href="{{ route('product.create') }}"> Add Product</a>
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
            <th>S.No</th>
            <th>Category Name</th>
            <th>Product Name</th>
            <th>Product Code</th>
            <th>HSN Code</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1?>
        @foreach ($products as $product)
                <tr role="row" class="odd">
                  <td>{{  $i++ }}</td>
                  <td>{{ $product->category_det->category_name }}</td>
                  <td>{{ $product->product_name }}</td>
                  <td>{{ $product->product_code }}</td>
                  <td>{{ $product->hsn_code }}</td>
                  <td>
                    <a class="btn btn-primary" href="{{ route('product.edit',$product->id) }}">Edit</a>
                    <button type="button" attributeid="{{$product->id}}" class="btn btn-danger delete">Remove</button>
                </td>
              </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script>
    $(document).on('click','.delete',function(){
        var product_id = $(this).attr("attributeid");
        var confirm_msg = confirm("Are You Sure ?");
        if(confirm_msg){
            $.ajax({
                type:"get",
                url:"{{url('get-delete-product')}}",
                data:{'product_id': product_id},
                success:function(res){
                    if(res == 0){
                        window.location.reload();
                    }else{
                        alert("Please Check the Details");
                    }
                }
            });
        }
    });
</script>
@endsection