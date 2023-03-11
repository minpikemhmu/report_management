@extends('template')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <h6 style="font-weight: bold;color:black">Product Sub Category Management</h6>
            <a href="{{ route('product_sub_cateogories.index') }}" class="btn btn-sm btn-dark"><i class="fa-solid fa-arrow-left-long"></i>
                back</a>
        </div>
        <div class="card mx-auto mb-5 mt-3">
            <div class="row m-3">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <span class="">Add a new Product Sub Category</span>
                    <form method="POST" action="{{ route('product_sub_cateogories.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name">Product Sub Category Name</label>
                            <input name="name" type="text" class="form-control" id="name"
                                placeholder="Product Sub Category Name" value="{{ old('name') }}">
                            <div class="form-control-feedback text-danger"> {{ $errors->first('name') }} </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>

                </div>
            </div>
        </div>
    </div>
@endsection
