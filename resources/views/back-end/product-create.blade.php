@extends('back-end.master')
@section('content')
    <form method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" name="name" class="form-control"   placeholder="Enter Name">
            <div class="alert-danger" >{{$errors->first('name')}}</div>

        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Price</label>
            <input type="text" name="price" class="form-control"  placeholder="Enter Price">
            <div class="alert-danger" >{{$errors->first('price')}}</div>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Describe</label>
            <input type="text" name="describe" class="form-control"  placeholder="Enter Price">
            <div class="alert-danger" >{{$errors->first('describe')}}</div>

        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Image</label>
            <input type="file" name="image" class="form-control"  placeholder="Enter Price">
            <div class="alert-danger" >{{$errors->first('image')}}</div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
