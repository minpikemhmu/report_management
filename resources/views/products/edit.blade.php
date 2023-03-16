@extends('template')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <h6 style="font-weight: bold;color:black">Product Management</h6>
            <a href="{{ route('products.index') }}" class="btn btn-sm btn-dark"><i class="fa-solid fa-arrow-left-long"></i>
                back</a>
        </div>
        <div class="card mx-auto mb-5 mt-3">
            <div class="row m-3">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <span class="">Update a Product</span>
                    <form method="POST" action="{{ route('products.update', $product) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input name="name" type="text" class="form-control" id="name"
                                aria-describedby="textHelp" placeholder="Enter New Product Name"
                                value="{{ old('name', $product->name ?? '') }}">
                            <div class="form-control-feedback text-danger"> {{ $errors->first('ba_code') }} </div>
                        </div>

                        <div class="form-group">
                            <label for="product_code">Product Code</label>
                            <input name="product_code" type="text" class="form-control" id="product_code"
                                placeholder="Enter New Product Code"
                                value="{{ old('product_code', $product->product_code ?? '') }}">
                            <div class="form-control-feedback text-danger"> {{ $errors->first('product_code') }} </div>
                        </div>

                        <div class="form-group">
                            <label for="brn_code">Product BNR Code</label>
                            <input name="brn_code" type="text" class="form-control" id="brn_code"
                                placeholder="Enter New Product BNR Code"
                                value="{{ old('brn_code', $product->brn_code ?? '') }}">
                            <div class="form-control-feedback text-danger"> {{ $errors->first('brn_code') }} </div>
                        </div>


                        <div class="form-group">
                            <label for="product_brands_id">Product Brand</label>
                            <select class="form-control" id="product_brands_id" name="product_brands_id">
                                <option {{ !$product->product_brands_id ? 'selected' : '' }} value="">Choose the new
                                    Product Brand</option>
                                @foreach ($product_brands as $row)
                                    <option {{ $product->product_brands_id == $row->id  ? "selected" : "" }} value="{{ $row->id }}">
                                        {{ $row->name }}</option>
                                @endforeach
                            </select>
                            <div class="form-control-feedback text-danger"> {{ $errors->first('product_brands_id') }}
                            </div>
                        </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <span class="">&nbsp;</span>

                    <div class="form-group">
                        <label for="product_category_id">Product Category</label>
                        <select class="form-control" id="product_category_id" name="product_category_id">
                            <option {{ !$product->product_category_id ? 'selected' : '' }} value="">Choose the Product Category</option>
                            @foreach ($product_categories as $row)
                                <option {{ $product->product_category_id == $row->id  ? "selected" : "" }} value="{{ $row->id }}">
                                    {{ $row->name }}</option>
                            @endforeach
                        </select>
                        <div class="form-control-feedback text-danger"> {{ $errors->first('product_category_id') }} </div>
                    </div>

                    <div class="form-group">
                        <label for="product_sub_category_id">Product Sub Category</label>
                        <select class="form-control" id="product_sub_category_id" name="product_sub_category_id">
                            <option {{ !$product->product_sub_category_id ? 'selected' : '' }} value="">Choose the Product Sub Category</option>
                            @foreach ($product_sub_categories as $row)
                                <option {{ $product->product_sub_category_id == $row->id  ? "selected" : "" }}
                                    value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                        <div class="form-control-feedback text-danger"> {{ $errors->first('product_sub_category_id') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="product_key_category_id">Product Key Category</label>
                        <select class="form-control" id="product_key_category_id" name="product_key_category_id">
                            <option {{ !$product->product_key_category_id ? 'selected' : '' }} value="">Choose the Product Key Category</option>
                            @foreach ($product_key_categories as $row)
                                <option {{ $product->product_key_category_id == $row->id  ? "selected" : "" }} value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                        <div class="form-control-feedback text-danger"> {{ $errors->first('product_key_category_id') }} </div>
                    </div>

                    <div class="form-group">
                        <label for="size">Product Size</label>
                        <input name="size" type="text" class="form-control" id="size"
                            placeholder="Enter New Product Size" value="{{ old('size', $product->size ?? '') }}">
                        <div class="form-control-feedback text-danger"> {{ $errors->first('size') }} </div>
                    </div>


                    <div>&nbsp;</div>
                    <div>&nbsp;</div>
                    <div>&nbsp;</div>


                    <div class="row">
                        <div class="col-lg-2">&nbsp;</div>
                        <button type="submit" class="btn btn-primary btn-block col-lg-10">Update</button>
                    </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
